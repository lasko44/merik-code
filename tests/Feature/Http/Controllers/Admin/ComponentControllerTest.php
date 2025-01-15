<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Facades\ComponentUtil;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ComponentControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
        $this->withoutVite();
    }


    public function test_index(): void
    {
        //Super Admin Should Work
        $user = User::factory()->superAdmin()->create();
        $response = $this->actingAs($user)->get(route('component-library.index'));
        $response->assertStatus(200);

        //Site Admin Should Work
        $user = User::factory()->siteAdmin()->create();
        $response = $this->actingAs($user)->get(route('component-library.index'));
        $response->assertStatus(200);

        //Course Admin Should Fail 404
        $user = User::factory()->courseAdmin()->create();
        $response = $this->actingAs($user)->get(route('component-library.index'));
        $response->assertStatus(404);

        //Teacher Should Fail 404
        $user = User::factory()->courseAdmin()->create();
        $response = $this->actingAs($user)->get(route('component-library.index'));
        $response->assertStatus(404);

        //Student Should Fail 404
        $user = User::factory()->courseAdmin()->create();
        $response = $this->actingAs($user)->get(route('component-library.index'));
        $response->assertStatus(404);

    }

    public function test_create(): void
    {
        // Mock the facade's return value
        $mockComponentDirectories = ['directory1', 'directory2'];
        ComponentUtil::shouldReceive('getComponentDirectories')
            ->andReturn($mockComponentDirectories);

        $user = User::factory()->superAdmin()->create();
        $response = $this->actingAs($user)->get(route('component-library.create'));
        $response->assertOk();

        $user = User::factory()->siteAdmin()->create();
        $response = $this->actingAs($user)->get(route('component-library.create'));
        $response->assertOk();

        $user = User::factory()->courseAdmin()->create();
        $response = $this->actingAs($user)->get(route('component-library.create'));
        $response->assertStatus(404);

        $user = User::factory()->teacher()->create();
        $response = $this->actingAs($user)->get(route('component-library.create'));
        $response->assertStatus(404);

        $user = User::factory()->student()->create();
        $response = $this->actingAs($user)->get(route('component-library.create'));
        $response->assertStatus(404);
    }
}
