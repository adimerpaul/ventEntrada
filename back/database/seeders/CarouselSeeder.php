<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('carousels')->insert([
            [
                'url' => 'https://www.youtube.com/watch?v=1q8mz9VQxZ8',
                'image' => 'flash_full_preventa.jpg',
            ],
            [
                'url' => 'https://www.youtube.com/watch?v=1q8mz9VQxZ8',
                'image' => 'full_cartelera_ryf.jpg',
            ],
            [
                'url' => 'https://www.youtube.com/watch?v=1q8mz9VQxZ8',
                'image' => 'gotg3_full_cartelera.jpg',
            ],
            [
                'url' => 'https://www.youtube.com/watch?v=1q8mz9VQxZ8',
                'image' => 'sirenita_full_cartelera.jpg',
            ],
            [
                'url' => 'https://www.youtube.com/watch?v=1q8mz9VQxZ8',
                'image' => 'sp_full_cartelera.jpg',
            ],
            [
                'url' => 'https://www.youtube.com/watch?v=1q8mz9VQxZ8',
                'image' => 'tf_full_cartelera.jpg',
            ],
        ]);
    }
}
