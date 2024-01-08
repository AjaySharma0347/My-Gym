<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\ScheduledClass;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
        ]);

        User::factory()->create([
            'name' => 'luigi',
            'email' => 'luigi@gmail.com',
        ]);

        $user = User::factory()->create([
            'name' => 'mario',
            'email' => 'mario@gmail.com',
        ]);

        ScheduledClass::factory(5)->create([
            'instructor_id' => $user->id,
        ]);
    }
}
