<?php

namespace App\Models;

use App\Models\References;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Reference\Reference;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class testimonials extends Model
{
    use HasFactory;
    protected $fillable = [
        'fotos','stars','text', 'name', 'function'
    ];
    
    public function reference()
    {
        return $this->belongsTo(References::class, 'testimonial_id', 'id');
    }
}
