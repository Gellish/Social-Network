<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class permission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'Post-Create',
            'for' => 'post',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name' => 'Post-Update',
            'for' => 'post',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name' => 'Post-Delete',
            'for' => 'post',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name' => 'Post-Publish',
            'for' => 'post',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name' => 'User-Create',
            'for' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name' => 'User-Update',
            'for' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name' => 'User-Delete',
            'for' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name' => 'Tag-Crud',
            'for' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('permissions')->insert([
            'name' => 'Category-Crud',
            'for' => 'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
