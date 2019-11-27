<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Admins::class);
        $this->call(Users::class);
        $this->call(UsersTableSeeder::class);
        $this->call(permission::class);
        $this->call(MessagesTableSeeder::class);
    }
}
