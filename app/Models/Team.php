<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

  

    /**

     * Write code on Method

     *

     * @return response()

     */

    protected $fillable = [

        'name', 'post','profile','facebook','twitter','instagram'

    ];}
