<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['username'=>'admin','name' => 'Admin','email' => 'admin@mail.com','password' => bcrypt('ADMIN')]);
        //creating 10 test users
        // factory(User::class,10)->create();
    }
}
