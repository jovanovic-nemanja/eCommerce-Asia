<?php

namespace App\Model\Ticket;

use Illuminate\Database\Eloquent\Model;

class Ticket_Status extends Model
{
    protected $table = 'ticket_status';
    protected $fillable = [
        'id', 'name', 'state', 'message', 'mode', 'flag', 'sort', 'properties', 'icon_class',
    ];
}
