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
        "name",
        "description",
        'first_date',
        'first_date_day_name',
        'first_date_week_parity',
        'begin_hour',
        'end_hour',
        'do_every_day',
        'do_every_week',
        'do_every_two_weeks'
    ];
}
