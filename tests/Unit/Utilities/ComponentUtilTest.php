<?php

namespace Tests\Unit\Utilities;

use App\Utilities\ComponentUtil;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\File;
use Mockery;
use Mockery\LegacyMockInterface;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class ComponentUtilTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Clear any previous facade instances and set up a new mock
        Facade::clearResolvedInstance('file');
        File::swap($this->mockFileFacade());
    }

    private function mockFileFacade(): Filesystem|(MockInterface&LegacyMockInterface)
    {
        $mock = Mockery::mock('Illuminate\Filesystem\Filesystem');

        // Mock directories method
        $mock->shouldReceive('directories')
            ->with('../resources/js/Shared/')
            ->andReturn([
                '../resources/js/Shared/dir1',
                '../resources/js/Shared/dir2'
            ]);

        // Mock files method for base directory
        $mock->shouldReceive('files')
            ->with('../resources/js/Shared/')
            ->andReturn([
                new \SplFileInfo('../resources/js/Shared/file1.vue'),
                new \SplFileInfo('../resources/js/Shared/file2.js'),
            ]);

        // Mock files method for dir1
        $mock->shouldReceive('files')
            ->with('../resources/js/Shared/dir1')
            ->andReturn([
                new \SplFileInfo('../resources/js/Shared/dir1/file1.vue'),
            ]);

        // Mock files method for dir2
        $mock->shouldReceive('files')
            ->with('../resources/js/Shared/dir2')
            ->andReturn([
                new \SplFileInfo('../resources/js/Shared/dir2/file2.txt'),
            ]);

        return $mock;
    }

    public function testGetComponentDirectoriesNoPath()
    {
        // Expected output
        $expected = [
            [
                "name" => "dir1/",
                "type" => "directory"
            ],
            [
                "name" => "file1.vue",
                "type" => "file"
            ]
        ];

        $componentUtil = new ComponentUtil();
        $result = $componentUtil->getComponentDirectories();

        $this->assertEquals($expected, $result);
    }


    protected function tearDown(): void
    {
        // Close Mockery-
        Mockery::close();
        parent::tearDown();
    }
}
