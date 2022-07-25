<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'yb_tkt_event';
    protected $fillable = [
        'EventID',
        'EventName',
        'StartDate',
        'EndDate'
    ];
}
