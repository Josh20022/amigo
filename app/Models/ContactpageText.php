<?php

namespace App\Models;

use App\Models\ContactpageStructure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactpageText extends Model
{
    use HasFactory;

    protected $fillable = [
        'section', 'text'
    ];
}
