<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Project;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $tasks = [
            ['Setup laravel project & struckture folder', 'membuat laravel project', 'medium', 32],
            ['Setup role & permission menggunakan Spatie', 'membuat role & permission', 'high', 33],
            ['Buat seeder untuk user default (Admin, Manager, Anggota)', 'membuat seeder', 'low', 34],
            ['Buat middleware untuk cek role dan permission', 'membuat middleware', 'high', 35],
            ['Endpoint untuk manajemen user & edit profil', 'membuat endpoint user', 'medium', 32],
            ['CRUD Project', 'membuat CRUD', 'high', 34],
            ['CRUD Task', 'membuat CRUD', 'high', 35],
            ['implementasi logika assign task dan update status', 'membuat logika task', 'high', 32],
            ['Endpoint komentar task', 'membuat endpoint komentar', 'low', 33],
            ['Endpoint dashboard ringkasan (jumlah proyek, task, status)', 'membuat endpoint dashboard', 'medium', 34],
            ['Buat seeder untuk dummy project dan task', 'membuat seeder data dummy', 'low', 35],
            ['Setup frontend dengan Vue + TypeScript', 'membuat frontend', 'high', 32],
            ['Layout halaman (Header, Sidebar, Footer)', 'membuat laravel project', 'medium', 33],
            ['Implementasi halaman', 'membuat login, register, dashboard, profil user', 'high', 34],
            ['Implementasi UI', 'membuat frontend crud proyek, crud task, Kanban board', 'medium', 32],
        ];

        $project = Project::where('name', 'Management Project')->first();

        foreach ($tasks as $task) {
            Task::create([
                'name' => $task[0],
                'description' => $task[1],
                'priority' => $task[2],
                'assigned_user_id' => $task[3],
                'created_by' => 1,
                'updated_by' => 1,
                'status_id' => 3,
                'project_id' => $project->id,
            ]);
        }
    }
}
