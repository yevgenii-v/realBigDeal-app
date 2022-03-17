<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('name', 'Administrator')->first();
        $supportRole = Role::where('name', 'Support')->first();
        $managerRole = Role::where('name', 'Manager')->first();
        $customerRole = Role::where('name', 'Customer')->first();

        $admin = User::create([
            'name'      => 'Admin',
            'email'     => 'admin@rbd-shop.loc',
            'password'  => Hash::make('adminsecret'),
            ]);

        $support = User::create([
            'name'      => 'Support',
            'email'     => 'support@rbd-shop.loc',
            'password'  => Hash::make('supportsecret'),
            ]);

        $manager = User::create([
            'name'      => 'Manager',
            'email'     => 'manager@rbd-shop.loc',
            'password'  => Hash::make('managersecret'),
            ]);

        $customer = User::create([
            'name'      => 'Customer',
            'email'     => 'customer@rbd-shop.loc',
            'password'  => Hash::make('customersecret'),
            ]);

        $admin->roles()->attach($adminRole);
        $support->roles()->attach($supportRole);
        $manager->roles()->attach($managerRole);
        $customer->roles()->attach($customerRole);
    }


}
