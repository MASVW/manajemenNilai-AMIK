<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            StudentSeeder::class,
            SubjectSeeder::class,
        ]);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'samuelzakaria28@gmail.com',
            'password' => 'password',
        ]);
    }
}
