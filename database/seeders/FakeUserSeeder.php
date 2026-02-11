<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use App\Models\UserPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FakeUserSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Create 10 fake users
        for ($i = 0; $i < 10; $i++) {
            $firstName = $faker->firstName;
            $lastName = $faker->lastName;
            $username = strtolower($firstName . $lastName . $faker->numberBetween(1, 100));
            
            $user = User::create([
                'username' => $username, // Alice, Alex, etc.
                'firstname' => $firstName,
                'lastname' => $lastName,
                'email' => $uniqueEmail = $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'gender' => $faker->randomElement(['male', 'female']),
                'address' => $faker->city . ', ' . $faker->country,
                // 'bio' => $faker->sentence, // No bio column in users table
            ]);

            // Create 3 posts for each user
            for ($j = 0; $j < 3; $j++) {
                UserPost::create([
                    'user_id' => $user->id,
                    'title' => $faker->sentence(6),
                    'body' => $faker->paragraph(3),
                    'posted_by' => $username,
                ]);
            }
        }
    }
}
