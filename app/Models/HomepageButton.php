<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageButton extends Model
{
    use HasFactory;
    protected $fillable = ['label', 'url'];
}
