<?php

use Illuminate\Database\Seeder;
use App\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Admin::create([
            'name'  			=> 'thiha',
            'email' 			=> 'thiha@gmail.com',
            'password'  		=> Hash::make("12345678"),
            'is_superadmin'  	=> true
        ]);
    }
}
