<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageText extends Model
{
    use HasFactory;

    protected $fillable = ['section', 'text'];

    public function structure()
    {
        return $this->hasOne(HomepageStructure::class, 'quality_title_id')
                    ->orWhere('quality_1_id', $this->id)
                    ->orWhere('quality_2_id', $this->id)
                    ->orWhere('quality_3_id', $this->id)
                    ->orWhere('quality_4_id', $this->id)
                    ->orWhere('quality_5_id', $this->id)
                    ->orWhere('reference_title_id', $this->id);
    }
}
