<?php

namespace Tests\Feature\Models;

use App\Models\Exercise;
use App\Models\Language;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LanguageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the name accessor and mutator.
     *
     * @return void
     */
    public function test_name_accessor_and_mutator()
    {
        $language = new Language();

        // Test the mutator (set)
        $language->name = 'jOhN dOe'; // Sets using the mutator
        $this->assertEquals('john doe', $language->getAttributes()['name']); // Directly access the underlying attribute

        // Test the accessor (get)
        $language->name = 'jane';
        $this->assertEquals('Jane', $language->name); // Access via the accessor
    }

    /**
     * Test the exercise relationship.
     *
     * @return void
     */
    public function test_exercise_relationship()
    {
        $language = Language::factory()->create();
        $exercises = Exercise::factory()->count(3)->create(['language_id' => $language->id]);

        $this->assertInstanceOf(Collection::class, $language->exercise);
        $this->assertCount(3, $language->exercise);
        $this->assertTrue($language->exercise->contains($exercises->first()));
    }
}
