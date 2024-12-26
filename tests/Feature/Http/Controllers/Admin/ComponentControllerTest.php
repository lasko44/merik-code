<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Facades\ComponentUtil;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ComponentControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite(); //Fixes it :D
    }


    public function test_index(): void
    {
        $response = $this->get(route('component-library.index'));

        $response->assertStatus(200);
    }

    public function test_create(): void
    {
        // Mock the facade's return value
        $mockComponentDirectories = ['directory1', 'directory2'];
        ComponentUtil::shouldReceive('getComponentDirectories')
            ->once()
            ->andReturn($mockComponentDirectories);

        // Call the route
        $response = $this->get(route('component-library.create'));

        // Ensure response status is OK
        $response->assertOk();
    }
}
