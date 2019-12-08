<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'super admin']);
        Role::create(['name' => 'admin']);

        Permission::create(['name' => 'view role'])->assignRole('super admin');
        Permission::create(['name' => 'add role'])->assignRole('super admin');
        Permission::create(['name' => 'edit role'])->assignRole('super admin');
        Permission::create(['name' => 'delete role'])->assignRole('super admin');
    }
}
