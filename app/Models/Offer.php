<?php

namespace App\Models;

use App\Models\Plaatje;
use App\Models\OfferCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'datum',
        'titel',
        'pl',
        'banner',
        'volgorde',
        'url',
        'omschrijving',
        'metatitel',
        'metadesc',
        'metakeys',
        'hoofdcat'
    ];

    public function offerCategories()
    {
        return $this->hasMany(OfferCategory::class, 'hoofdcat');
    }

    public function plaatje()
    {
        return $this->hasOne(Plaatje::class, 'id', 'pl');
    }

    public function bannerplaatje()
    {
        return $this->hasOne(Plaatje::class, 'id', 'banner');
    }
}
