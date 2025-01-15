<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'name' => 'student'
            ],
            [
                'id' => 2,
                'name' => 'teacher',
            ],
            [
                'id' => 3,
                'name' => 'course admin',
            ],
            [
                'id' => 4,
                'name' => 'site admin'
            ],
            [
                'id' => 5,
                'name' => 'super admin'
            ]
        ];

        UserType::insert($data);
    }
}
