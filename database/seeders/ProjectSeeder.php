<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $project = Project::factory()->create([
            'name' => 'Management Project',
            'description' => 'Merupakan Tugas Akhir Mata Kuliah IFB-202 Pemrograman Website Lanjut',
            'due_date' => '2025-06-11 23:59:59',
            'status' => 'completed',
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => '2025-05-11 00:00:01',
            'updated_at' => '2025-06-11 23:59:58',
        ]);

        // Ambil user dengan id 31, 32, 33, 34
        $users = User::whereIn('id', [31, 32, 33, 34])->get();

        // Tambahkan ke project sebagai anggota
        foreach ($users as $user) {
            $project->acceptedUsers()->attach($user->id, [
                'role' => 'project_member', // atau role sesuai sistem kamu
                'status' => 'accepted',
            ]);
        }
    }
}
