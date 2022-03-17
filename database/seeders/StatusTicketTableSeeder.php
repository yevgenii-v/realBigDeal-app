<?php

namespace Database\Seeders;

use App\Models\TicketStatus;
use Illuminate\Database\Seeder;

class StatusTicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TicketStatus::create([
            'name' => 'In Progress',
        ]);

        TicketStatus::create([
            'name' => 'Closed without solution',
        ]);

        TicketStatus::create([
            'name' => 'Closed with solution',
        ]);
    }
}
