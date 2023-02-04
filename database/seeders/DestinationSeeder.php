<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Destination::factory()->createMany([
            [
                'id' => Str::uuid(),
                'name' => 'Kedai Sawah Sembalun',
                'price' => '200000',
                'thumbnail' => '',
                'status' => 'ready',
                'description' => fake()->paragraph(3, true),
                'location' => 'Sembalun, Lombok Utara',
                'type' => 'a',
                'seat_count' => 8
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Internationl Circuit Mandalika',
                'price' => '800000',
                'thumbnail' => '',
                'status' => 'ready',
                'description' => fake()->paragraph(3, true),
                'location' => 'Lombok International Circuit',
                'type' => 'b',
                'seat_count' => 14
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Kosaido',
                'price' => '800000',
                'thumbnail' => '',
                'status' => 'not ready',
                'description' => fake()->paragraph(3, true),
                'location' => 'Kosaido',
                'type' => 'b',
                'seat_count' => 0
            ]
        ]);
    }
}
