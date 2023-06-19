<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name', 'job_title', 'job_description', 'profile_photo', 'social_link1', 'social_link2', 'social_link3', 'aboutpage_structure_id'
    ];

    public function aboutPageStructure()
    {
        return $this->belongsTo(AboutPageStructure::class, 'aboutpage_structure_id');
    }
}
