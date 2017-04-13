<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = New \App\Role;
    	$role->name = 'admin';
    	$role->display_name = 'Administrator';
    	$role->description = 'Role untuk admin';
    	$role->save();
    }
}
