<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(StatusTicketTableSeeder::class);

        User::factory(100)->create();
        Ticket::factory(100)->create();
//        $customerRole = Role::where('id', 1)->first();

        // Populate the pivot table
        User::where('id', '>', 4)->each(function ($user) {
            $user->roles()->attach(Role::where('name', 'Customer')->first());
        });
    }
}
