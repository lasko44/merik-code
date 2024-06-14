<?php

namespace Database\Seeders;

use App\Models\Exercise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'id' => 1,
            'name' => 'Test Exercise',
            'slug' => 'test-exercise',
            'category_id' => 1,
            'language_id' => 1
        ];
        Exercise::insert($data);
    }
}
