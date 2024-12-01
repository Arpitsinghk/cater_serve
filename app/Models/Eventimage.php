<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventimage extends Model
{
    use HasFactory;
    protected $fillable = ['event_id','image','status'];

    public function event()
{
    return $this->belongsTo(Event::class, 'event_id'); // Make sure 'event_id' matches your database
}
}
