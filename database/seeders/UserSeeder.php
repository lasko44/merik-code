<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'user_type_id' => 5,
                'name' => 'Super Admin',
                'username' => 'super-admin',
                'profile_photo_path' => 'https://avatar.iran.liara.run/username?username=Super+Admin',
                'email' => 'super-admin@merik-code.com',
                'password' => Hash::make('password'),
            ],
            [
                'id' => 2,
                'user_type_id' => 4,
                'name' => 'Site Admin',
                'username' => 'site-admin',
                'profile_photo_path' => 'https://avatar.iran.liara.run/username?username=Web+Admin',
                'email' => 'site-admin@merik-code.com',
                'password' => Hash::make('password'),
            ],
            [
                'id' => 3,
                'user_type_id' => 3,
                'name' => 'Course Admin',
                'username' => 'course-admin',
                'profile_photo_path' => 'https://avatar.iran.liara.run/username?username=Course+Admin',
                'email' => 'course-admin@merik-code.com',
                'password' => Hash::make('password'),
            ],
            [
                'id' => 4,
                'user_type_id' => 2,
                'name' => 'Teacher',
                'username' => 'teacher',
                'profile_photo_path' => 'https://avatar.iran.liara.run/username?username=Teacher+User',
                'email' => 'teacher@merik-code.com',
                'password' => Hash::make('password'),
            ],
            [
                'id' => 5,
                'user_type_id' => 1,
                'name' => 'Student',
                'username' => 'student',
                'profile_photo_path' => 'https://avatar.iran.liara.run/username?username=Student+User',
                'email' => 'student@merik-code.com',
                'password' => Hash::make('password'),
            ],
        ];

        User::insert($data);
    }
}
