<?php

namespace App\Models;

use App\Models\testimonials;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class References extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','logo','url','testimonial_id'
    ];
    public function testimonial()
    {
        return $this->hasOne(testimonials::class, 'id', 'testimonial_id');
    }
}
