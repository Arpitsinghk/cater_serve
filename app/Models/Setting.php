<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['key', 'value', 'status','type'];

    public static function getValue($key)
    {
        return self::where('key', $key)->value('value');
    }
}