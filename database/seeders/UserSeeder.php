<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Rido Gusti Illahi',
            'email' => 'rido@example.com',
            'password' => Hash::make('password1'),
            'email_verified_at' => now(),
        ]); 

        User::factory()->create([
            'name' => 'Viktorikus Nokia Laksamana Febrianto',
            'email' => 'viktorikus@example.com',
            'password' => Hash::make('password1'),
            'email_verified_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'Fikriansyah',
            'email' => 'fikriansyah@example.com',
            'password' => Hash::make('password1'),
            'email_verified_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'Farisy Ilman Syarif',
            'email' => 'farisy@example.com',
            'password' => Hash::make('password1'),
            'email_verified_at' => now(),
        ]);
    }
}
