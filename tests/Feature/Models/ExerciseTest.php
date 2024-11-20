<?php

namespace Tests\Feature\Models;

use App\Models\Category;
use App\Models\Exercise;
use App\Models\Language;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExerciseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the category relationship.
     *
     * @return void
     */
    public function test_category_relationship()
    {
        $category = Category::factory()->create();
        $exercise = Exercise::factory()->create(['category_id' => $category->id]);

        $this->assertInstanceOf(Category::class, $exercise->category);
        $this->assertEquals($category->id, $exercise->category->id);
    }

    /**
     * Test the language relationship.
     *
     * @return void
     */
    public function test_language_relationship()
    {
        $language = Language::factory()->create();
        $exercise = Exercise::factory()->create(['language_id' => $language->id]);

        $this->assertInstanceOf(Language::class, $exercise->language);
        $this->assertEquals($language->id, $exercise->language->id);
    }

    /**
     * Test mass assignment protection.
     *
     * @return void
     */
    public function test_mass_assignment_protection()
    {
        $data = [
            'id' => 999, // Should be ignored because it's guarded
            'name' => 'Test Exercise',
            'slug' => 'test-exercise',
            'category_id' => 1,
            'language_id' => 1
        ];

        $exercise = Exercise::create($data);

        $this->assertNotEquals(999, $exercise->id); // Ensure 'id' was not overwritten
        $this->assertEquals('Test Exercise', $exercise->name);
    }
}
