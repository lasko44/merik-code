<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'username' => $this->faker->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    public function student(): static
    {
        return $this->state(function (array $attributes){
            return [
                'user_type_id' => 1
            ];
        });
    }

    public function teacher(): static
    {
        return $this->state(function (array $attributes){
            return [
                'user_type_id' => 2
            ];
        });
    }

    public function courseAdmin(): static
    {
        return $this->state(function (array $attributes){
            return [
                'user_type_id' => 3
            ];
        });
    }

    public function admin(): static
    {
        $adminTypeIds = [4, 5];
        $randomId = Arr::random($adminTypeIds);

        return $this->state(function (array $attributes) use ($randomId) {
            return [
                'user_type_id' => $randomId
            ];
        });
    }

    public function notSiteAdmin(): static
    {
        $nonSiteAdminIds = [1, 2, 3];
        $randomId = Arr::random($nonSiteAdminIds);

        return $this->state(function (array $attributes) use ($randomId) {
            return [
                'user_type_id' => $randomId
            ];
        });
    }

    public function siteAdmin(): static
    {
        return $this->state(function (array $attributes){
            return [
                'user_type_id' => 4
            ];
        });
    }

    public function superAdmin(): static
    {
        return $this->state(function (array $attributes){
            return [
                'user_type_id' => 5
            ];
        });
    }
}
