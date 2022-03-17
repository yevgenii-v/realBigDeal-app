<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Customer']);
        Role::create(['name' => 'Manager']);
        Role::create(['name' => 'Support']);
        Role::create(['name' => 'Administrator']);
    }
}
