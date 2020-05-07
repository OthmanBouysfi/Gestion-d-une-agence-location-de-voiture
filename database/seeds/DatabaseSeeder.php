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
        $this->call(AdminSeeder::class);
        //factory(App\User::class, 10)->create();
        //factory(App\Car::class, 10)->create();
        //factory(App\Command::class, 10)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
