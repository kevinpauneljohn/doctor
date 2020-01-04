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
        Role::create(['name' => 'owner']);
        Role::create(['name' => 'co-owner']);
        Role::create(['name' => 'medical doctor']);
        Role::create(['name' => 'HR']);

        Role::create(['name' => 'medical staff']);
        Role::create(['name' => 'employee']);

        Permission::create(['name' => 'view role'])->assignRole('super admin');
        Permission::create(['name' => 'add role'])->assignRole('super admin');
        Permission::create(['name' => 'edit role'])->assignRole('super admin');
        Permission::create(['name' => 'delete role'])->assignRole('super admin');
        Permission::create(['name' => 'assign role to permission'])->assignRole('super admin');

        Permission::create(['name' => 'view permission'])->assignRole('super admin');
        Permission::create(['name' => 'add permission'])->assignRole('super admin');
        Permission::create(['name' => 'edit permission'])->assignRole('super admin');
        Permission::create(['name' => 'delete permission'])->assignRole('super admin');

        Permission::create(['name' => 'view user'])->assignRole('super admin');
        Permission::create(['name' => 'add user'])->assignRole('super admin');
        Permission::create(['name' => 'edit user'])->assignRole('super admin');
        Permission::create(['name' => 'delete user'])->assignRole('super admin');

        Permission::create(['name' => 'view client'])->assignRole('super admin');
        Permission::create(['name' => 'add client'])->assignRole('super admin');
        Permission::create(['name' => 'edit client'])->assignRole('super admin');
        Permission::create(['name' => 'delete client'])->assignRole('super admin');

        Permission::create(['name' => 'view clinic'])->assignRole('super admin');
        Permission::create(['name' => 'add clinic'])->assignRole('super admin');
        Permission::create(['name' => 'edit clinic'])->assignRole('super admin');
        Permission::create(['name' => 'delete clinic'])->assignRole('super admin');

        Permission::create(['name' => 'view terminal'])->assignRole('super admin');
        Permission::create(['name' => 'add terminal'])->assignRole('super admin');
        Permission::create(['name' => 'edit terminal'])->assignRole('super admin');
        Permission::create(['name' => 'delete terminal'])->assignRole('super admin');


        Permission::create(['name' => 'view medical staff'])->assignRole('owner');
        Permission::create(['name' => 'add medical staff'])->assignRole('owner');
        Permission::create(['name' => 'edit medical staff'])->assignRole('owner');
        Permission::create(['name' => 'delete medical staff'])->assignRole('owner');

        Permission::create(['name' => 'view employee'])->assignRole('owner');
        Permission::create(['name' => 'add employee'])->assignRole('owner');
        Permission::create(['name' => 'edit employee'])->assignRole('owner');
        Permission::create(['name' => 'delete employee'])->assignRole('owner');
    }
}
