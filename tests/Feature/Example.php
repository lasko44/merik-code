<?php

namespace Tests\Feature;

use Tests\TestCase;

class Example extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/admin/component-library/create');

        $response->assertStatus(200);
    }
}
