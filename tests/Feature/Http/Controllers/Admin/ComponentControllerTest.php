<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Facades\ComponentUtil;
use App\Models\Component;
use App\Models\User;
use App\Rules\FileExists;
use App\Rules\IsVueFile;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Mockery;
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

    public function test_store_good_data(): void
    {
        // Create an admin user
        $user = User::factory()->admin()->create();

        // Fake session
        Session::start();

        // Define request data
        $requestData = [
            'path' => 'valid.vue',
            'name' => 'valid.vue',
            'description' => 'A valid Vue component.',
        ];

        // Mock the File facade
        File::shouldReceive('exists')
            ->andReturnUsing(function ($path) {
                // Return true only for the specific file being tested
                if ($path === '../resources/js/Shared/valid.vue') {
                    return true;
                }

                // Return false for all other paths
                return false;
            });

        // Act as the admin user
        $response = $this->actingAs($user)
            ->post(route('component-library.store'), $requestData);

        // Assert redirection
        $response->assertRedirect(route('component-library.index'));

        // Assert session flash message
        $response->assertSessionHas('message', 'component updated');

        // Assert the database contains the new component
        $this->assertDatabaseHas('components', [
            'path' => 'valid.vue',
            'name' => 'valid.vue',
            'description' => 'A valid Vue component.',
        ]);
    }
}
