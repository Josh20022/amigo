<?php

namespace App\Models;

use App\Models\NewsImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    protected $fillable = ['title', 'description'];

    public function image()
    {
        return $this->hasOne(NewsImage::class);
    }
}

