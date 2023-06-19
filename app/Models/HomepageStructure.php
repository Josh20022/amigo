<?php

namespace App\Models;

use App\Models\HomepageText;
use App\Models\HomepageImage;
use App\Models\HomepageButton;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomepageStructure extends Model
{
    use HasFactory;

    protected $fillable = [
        'header_text_id', 'title_text_id', 'button1_id', 'button2_id'
    ];

    public function headerText()
    {
        return $this->belongsTo(HomepageText::class, 'header_text_id');
    }

    public function titleText()
    {
        return $this->belongsTo(HomepageText::class, 'title_text_id');
    }

    public function button1()
    {
        return $this->belongsTo(HomepageButton::class, 'button1_id');
    }

    public function button2()
    {
        return $this->belongsTo(HomepageButton::class, 'button2_id');
    }

    public function images()
    {
        return $this->hasMany(HomepageImage::class);
    }

    public function qualityTitle()
    {
        return $this->belongsTo(HomepageText::class, 'quality_title_id');
    }

    public function quality1()
    {
        return $this->belongsTo(HomepageText::class, 'quality_1_id');
    }
    
    public function quality2()
    {
        return $this->belongsTo(HomepageText::class, 'quality_2_id');
    }
    
    public function quality3()
    {
        return $this->belongsTo(HomepageText::class, 'quality_3_id');
    }
    
    public function quality4()
    {
        return $this->belongsTo(HomepageText::class, 'quality_4_id');
    }
    
    public function quality5()
    {
        return $this->belongsTo(HomepageText::class, 'quality_5_id');
    }

    public function referenceTitle()
    {
        return $this->belongsTo(HomepageText::class, 'reference_title_id');
    }
}
