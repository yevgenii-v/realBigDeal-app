<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketStatus extends Model
{
    use HasFactory;

    protected $table = 'status_ticket';

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    const IN_PROGRESS = 1;
    const CLOSED_WITHOUT_SOLUTION = 2;
    const CLOSED_WITH_SOLUTION = 3;

    public function ticket()
    {
        $this->hasMany(Ticket::class);
    }
}
