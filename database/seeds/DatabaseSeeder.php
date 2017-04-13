<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
    	$this->call(RoleSeeder::class);
    	$this->call(PermissionSeeder::class);
        // $this->call(CarsSeeder::class);
    	$user = \App\User::find(1);
    	$role = \App\Role::find(1);
    	$user->attachRole($role);
    	$permission = \App\Permission::all();
    	foreach ($permission as $key => $p) {
    		$role->attachPermission($p);
    	}
    }
}
