<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['country', 'city', 'place', 'event_type', 'no_of_palace', 'diet', 'contact_no', 'date', 'email', 'name', 'request','user'];
}
