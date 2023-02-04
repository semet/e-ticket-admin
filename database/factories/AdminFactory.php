<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'Lombodocia',
            'username' => 'Bolamlombok',
            'email' => 'bolamlombok@gmail.com',
            'phone' => '08888888888888',
            'password' => bcrypt('secret'),
            'email_verified_at' => now()
        ];
    }
}
