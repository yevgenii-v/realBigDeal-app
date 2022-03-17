<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketAnswer extends Model
{
    use HasFactory;

    protected $table = 'conversations';

    protected $fillable = [
        'message',
        'user_id',
        'ticket_id',
    ];

    public function ticket()
    {
        $this->belongsTo(Ticket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
