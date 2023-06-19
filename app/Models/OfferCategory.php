<?php

namespace App\Models;

use App\Models\Act;
use App\Models\Offer;
use App\Models\Plaatje;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OfferCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'datum', 'titel', 'pl', 'volgorde', 'url', 'omschrijving', 'metatitel',
        'metadesc', 'metakeys', 'hoofdcat'
    ];

    public function acts()
    {
        return $this->hasMany(Act::class, 'cat');
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class, 'hoofdcat', 'id');
    }

    public function plaatje()
    {
        return $this->hasOne(Plaatje::class, 'id', 'pl');
    }
}
