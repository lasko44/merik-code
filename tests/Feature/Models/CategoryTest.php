<?php

namespace Tests\Feature\Models;

use App\Models\Category;
use App\Models\Exercise;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_exercise_relationship()
    {
        // Create a category
        $category = Category::factory()->create();

        // Create exercises associated with the category
        $exercises = Exercise::factory()->count(3)->create([
            'category_id' => $category->id,
        ]);

        // Assert that the exercises are correctly associated with the category
        $this->assertInstanceOf(Exercise::class, $category->exercise->first());
        $this->assertCount(3, $category->exercise);
        $this->assertTrue($category->exercise->contains($exercises->first()));
    }
}
