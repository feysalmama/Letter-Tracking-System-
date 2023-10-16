<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\AdminSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use App\Models\LetterType;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        
        
        $faker = Faker::create();
        // Create and insert letter types using Faker
        for ($i = 1; $i <= 3; $i++) {
            LetterType::create([
                'name' => $faker->word, // Generate a random word as the type name
                'description' => $faker->sentence, // Generate a random sentence as the description
            ]);
        }
        for ($i = 1; $i <= 3; $i++) {
            Department::create([
                'name' => $faker->word, // Generate a random word as the type name
                'description' => $faker->sentence, // Generate a random sentence as the description
            ]);
        }


    }
}
