<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        "event_name",
        "event_description",
        'event_first_date',
        'event_first_date_day_name',
        'event_first_date_week_parity',
        'event_begin_hour',
        'event_end_hour',
        'event_do_every_day',
        'event_do_every_week',
        'event_do_every_two_weeks'
    ];
}
