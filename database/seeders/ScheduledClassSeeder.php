<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\ScheduledClass;
use Illuminate\Database\Seeder;

class ScheduledClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ScheduledClass::factory(5)->create([
            'instructor_id' => User::firstWhere('role', 'instructor'),
        ]);
    }
}
