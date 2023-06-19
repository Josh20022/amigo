<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plaatje extends Model
{
    protected $fillable = [
        'datum', 'titel', 'omschrijving', 'url', 'width', 'height'
    ];
}
