<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perm = [
    		['name' => 'manage-users', 'display_name'=>'Manage users', 'description' => 'Permission untuk mengakses user'],
    		['name' => 'manage-privilege', 'display_name'=>'Manage privilege', 'description' => 'Permission untuk mengakses privilege'],
    		['name' => 'manage-services', 'display_name'=>'Manage services', 'description' => 'Permission untuk mengakses service'],
    		['name' => 'manage-stock', 'display_name'=>'Manage stock', 'description' => 'Permission untuk mengakses stock'],
            ['name' => 'manage-customer', 'display_name'=>'Manage customer', 'description' => 'Permission untuk mengakses customer']
    	];

    	foreach ($perm as $key => $p) {
    		App\Permission::create($p);
    	}
    }
}
