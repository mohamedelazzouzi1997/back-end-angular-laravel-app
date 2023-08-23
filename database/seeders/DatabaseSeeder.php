<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        for ($i=0; $i < 50; $i++) {
            # code...
            Book::create([
                'title' => fake()->name,
                'description' => fake()->text,
                'price' => rand(1,1000),
            ]);
        }
    }
}