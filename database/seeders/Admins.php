<?php

namespace Database\Seeders;  use Illuminate\Support\Str; use Illuminate\Database\Seeder; use Illuminate\Support\Facades\DB; use Carbon\Carbon;   class Admins extends Seeder {     /**      * Run the database seeds.      *      * @return void      */     public function run()     {         DB::table('admins')->insert([             'username' => 'Gellish',             'email' => 'gellishgarnerp@gmail.com',             'password' => bcrypt('Llvaj101'),             'cellphone' => 'N/a',             'Status' => '1',             'created_at' => Carbon::now(),             'updated_at' => Carbon::now(),         ]);     } }

