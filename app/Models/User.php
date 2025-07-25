<?php

namespace App\Models;

use App\Enum\RolesEnum;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable implements MustVerifyEmail {
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.P
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
        'profile_picture',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected static function boot() {
        parent::boot();

        // Clear avatar cache when user model is updated
        static::updated(function ($user) {
            if ($user->isDirty('profile_picture')) {
                Cache::forget("user_{$user->id}_avatar");
            }
        });
    }

    /**
     * This relationship will handle both accepted and pending projects.
     * - If you want accepted projects, you can filter by `accepted` status.
     * - If you want pending invitations, you can filter by `pending` status.
     */
    public function projectInvitations() {
        return $this->belongsToMany(Project::class, 'project_user', 'user_id', 'project_id')
            ->withPivot('status', 'role')
            ->withTimestamps();
    }

    // Relationship for accepted project invitations
    public function acceptedProjects() {
        return $this->belongsToMany(Project::class, 'project_user', 'user_id', 'project_id')
            ->wherePivot('status', 'accepted')
            ->withTimestamps();
    }

    public function projects() {
        return $this->belongsToMany(Project::class, 'project_user')
            ->where('project_user.status', 'accepted')
            ->whereIn('project_user.role', [RolesEnum::ProjectManager->value, RolesEnum::ProjectMember->value])
            ->withPivot('role')
            ->withTimestamps();
    }
}
