<?php

namespace Database\Seeders;

// Make sure to add this line if it's not already there
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\RoomTypeSeeder; // Assuming you have this one too

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class, // <-- Make sure this line is present and uncommented
            RoomTypeSeeder::class,   // <-- Keep this if you want room types seeded
            // Add other seeders here if you have them, e.g.,
            // SomeOtherSeeder::class,
            \Database\Seeders\RoomSeeder::class,
        ]);
    }
}