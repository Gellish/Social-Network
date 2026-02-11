<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'Gellish',
            'firstname' => 'Gellish Garner',
            'lastname' => 'Mangubat',
            'email' => 'gellishgarnerp@gmail.com',
            'address' => 'maracas lahug cebu city',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('Llvaj101'),
            'gender' => 'male',
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
