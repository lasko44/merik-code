<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Utilities\ComponentUtil\ComponentUtilFacade;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Inertia\Testing\Assert;
use Tests\TestCase;

class ComponentControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_index(): void
    {
        $response = $this->get(route('component-library.index'));

        $response->assertStatus(200);
    }

    public function test_create(): void
    {
        // Mock the facade's return value
        $mockComponentDirectories = ['directory1', 'directory2'];
        ComponentUtilFacade::shouldReceive('getComponentDirectories')
            ->once()
            ->andReturn($mockComponentDirectories);

        // Call the route
        $response = $this->get(route('component-library.create'));

        // Ensure response status is OK
        $response->assertOk();
    }
}
