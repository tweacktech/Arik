<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkPayment extends Model
{
    use HasFactory;
       protected $fillable = [
        'name',
        'phone',
        'parking_space_id',
        'payment_reference',
        'email',
        'amount',
        'status',
    ];

}
