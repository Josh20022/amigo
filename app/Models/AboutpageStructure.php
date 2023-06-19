<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutpageStructure extends Model
{
    use HasFactory;

    public function title()
    {
        return $this->belongsTo(AboutPageText::class, 'title_id');
    }

    public function description1()
    {
        return $this->belongsTo(AboutPageText::class, 'description1_id');
    }

    public function description2()
    {
        return $this->belongsTo(AboutPageText::class, 'description2_id');
    }

    public function teamTitle()
    {
        return $this->belongsTo(AboutPageText::class, 'team_title_id');
    }

    public function teams()
    {
        return $this->hasMany(Team::class, 'aboutpage_structure_id');
    }
    
}
