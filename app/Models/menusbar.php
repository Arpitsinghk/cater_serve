<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menusbar extends Model
{
    use HasFactory;
    protected $fillable = ['menu_id', 'dish', 'dish_details', 'price', 'image', 'status'];

    public function menu()
{
    return $this->belongsTo(menus::class, 'menu_id'); // Make sure 'event_id' matches your database
}
}
