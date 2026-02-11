<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserInfo;
use Faker\Factory as Faker;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = User::all();

        foreach ($users as $user) {
            // Check if user info already exists to avoid duplicates if run multiple times
            if (!UserInfo::where('user_id', $user->id)->exists()) {
                UserInfo::create([
                    'user_id' => $user->id,
                    'overview' => $faker->paragraph(3),
                    'position' => substr($faker->jobTitle, 0, 50),
                    'experience' => substr($faker->company, 0, 50),
                    'School' => substr($faker->city . ' University', 0, 50),
                    'degree' => substr($faker->jobTitle, 0, 50),
                    'from' => $faker->year,
                    'to' => $faker->year,
                    'education' => $faker->sentence,
                    'location' => $faker->city . ', ' . $faker->country,
                    'skills' => implode(', ', $faker->words(4)),
                    'portfolio' => null,
                ]);
            }
        }
    }
}
