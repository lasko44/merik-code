<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Facades\ComponentUtil;
use App\Http\Controllers\Admin\GeminiDocumentController;
use App\Utilities\GeminiAPICaller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use ReflectionClass;
use Tests\TestCase;

class GeminiDocumentControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the successful response of the GeminiDocumentController index endpoint.
     *
     * @return void
     */
    public function test_index_returns_successful_response()
    {
        // Mock the payload for the request
        $payload = 'test-component.vue';
        $fileContents = '<template><div>Example</div></template>';
        $geminiResponse = ['documentedCode' => 'Documented Vue 3 Code.'];

        // Mock the ComponentUtil
        ComponentUtil::shouldReceive('getComponentContents')
            ->once()
            ->with($payload)
            ->andReturn($fileContents);

        // Mock the GeminiAPICaller
        $mockedCaller = Mockery::mock(GeminiAPICaller::class);
        $mockedCaller->shouldReceive('call')
            ->once()
            ->with("Please document this Vue 3 code: \n", $fileContents)
            ->andReturn($geminiResponse['documentedCode']);

        $this->app->instance(GeminiAPICaller::class, $mockedCaller);

        // Make a GET request to the route
        $response = $this->getJson(route('gemini-document.index', ['payload' => $payload]));

        // Assert the response
        $response->assertOk();
        $this->assertEquals('"Documented Vue 3 Code."', $response->content());
    }

    /**
     * Test the error handling of the GeminiDocumentController index endpoint.
     *
     * @return void
     */
    public function test_index_handles_exceptions()
    {
        // Mock the payload for the request
        $payload = 'non-existent-component.vue';

        // Mock the ComponentUtil to throw an exception
        ComponentUtil::shouldReceive('getComponentContents')
            ->once()
            ->with($payload)
            ->andThrow(new \Exception('File not found'));

        // Mock the GeminiAPICaller (not called in this case)
        $mockedCaller = Mockery::mock(GeminiAPICaller::class);
        $this->app->instance(GeminiAPICaller::class, $mockedCaller);

        // Make a GET request to the route
        $response = $this->getJson(route('gemini-document.index', ['payload' => $payload]));

        // Assert the response
        $response->assertStatus(404);
        $response->assertJson([
            'error' => true,
            'error-msg' => 'Failed to retrieve contents.',
        ]);
    }

    /**
     * Helper method to get the private PROMPT constant using Reflection.
     *
     * @return string
     */
    protected function getPrompt()
    {
        $reflection = new ReflectionClass(GeminiDocumentController::class);
        return $reflection->getConstant('PROMPT');
    }
}
