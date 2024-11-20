<?php

namespace Tests\Feature\Models;

use App\Models\User;
use Database\Seeders\UserTypeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the fillable attributes of the User model.
     *
     * @return void
     */
    public function testUserType(): void
    {
        $this->seed(UserTypeSeeder::class);
        $data = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password123'),
            'user_type_id' => 1
        ];

        $user = User::create($data);

        $this->assertNotEmpty($user->userType);
        $this->assertEquals('student', $user->userType->name);
        $this->assertEquals('johndoe@example.com', $user->email);
    }
}
