<?php

namespace App\Models;

use App\Models\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsImage extends Model
{
    protected $fillable = ['location',];

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
