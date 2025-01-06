<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Facades\ComponentUtil;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DirectoryControllerTest extends TestCase
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
        $mockComponentDirectories = ['directory1', 'directory2'];
        ComponentUtil::shouldReceive('getComponentDirectories')
            ->andReturn($mockComponentDirectories);

        $user = User::factory()->admin()->create();
        $response = $this->actingAs($user)->get(route('directory.index'));
        $response->assertStatus(200);

        $user = User::factory()->notSiteAdmin()->create();
        $response = $this->actingAs($user)->get(route('directory.index'));
        $response->assertStatus(404);
    }
}
