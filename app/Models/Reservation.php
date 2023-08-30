<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
       protected $fillable = [
        'parking_space_id',
        'booking_start_time',
        'booking_start_date',
        'booking_end_time',
        'booking_end_date',
        'email',
        'amount',
    ];

}
