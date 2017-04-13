<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = New \App\User;
    	$user->name = 'Dipo';
    	$user->username = 'admin';
    	$user->email = 'admin@admin.com';
    	$user->password = bcrypt('masuklah');
    	$user->save();
    }
}
