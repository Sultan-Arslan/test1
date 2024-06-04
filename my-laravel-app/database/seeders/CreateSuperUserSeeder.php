<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateSuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создание ролей "admin", "specialist" и "user" если они еще не существуют
        $adminRole = Role::firstOrCreate([
            'name' => 'admin'
        ], [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $specialistRole = Role::firstOrCreate([
            'name' => 'specialist'
        ], [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $userRole = Role::firstOrCreate([
            'name' => 'user'
        ], [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Массив данных для создания пользователей
        $users = [
            [
                'email' => 'admin@example.com',
                'name' => 'Admin User',
                'phone' => '+7-702-640-4095',
                'password' => 'test12345',
                'role' => 'admin',
            ],
            [
                'email' => 'specialist@example.com',
                'name' => 'Specialist User',
                'phone' => '+7-701-721-1156',
                'password' => 'test12345',
                'role' => 'specialist',
            ],
            [
                'email' => 'user@example.com',
                'name' => 'Regular User',
                'phone' => '+7-778-794-9586',
                'password' => 'test12345',
                'role' => 'user',
            ],
        ];

        // Создание пользователей и назначение ролей
        foreach ($users as $userData) {
            $user = User::create([
                'email' => $userData['email'],
                'name' => $userData['name'],
                'phone' => $userData['phone'],
                'password' => Hash::make($userData['password']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            // Назначение соответствующей роли пользователю
            if ($userData['role'] === 'admin') {
                $user->assignRole($adminRole);
            } elseif ($userData['role'] === 'specialist') {
                $user->assignRole($specialistRole);
            } elseif ($userData['role'] === 'user') {
                $user->assignRole($userRole);
            }
        }
    }
}
