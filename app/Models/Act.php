<?php

namespace App\Models;

use App\Models\OfferCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Act extends Model
{
    use HasFactory;

    protected $fillable = [
        'datum', 'titel', 'omschrijving', 'soort', 'tijdsduur', 'bijzonderheden',
        'youtube', 'prijs', 'pl1', 'pl2', 'pl3', 'pl4', 'pl5', 'txt1', 'txt2',
        'txt3', 'txt4', 'txt5', 'volgorde', 'metatitel', 'metadesc', 'metakeys',
        'url', 'cat', 'meerprijs', 'ticker'
    ];

    public function offerCategory()
    {
        return $this->belongsTo(OfferCategory::class, 'cat', 'id');
    }

    public function plaatje1()
    {
        return $this->hasOne(Plaatje::class, 'id', 'pl1');
    }

    public function plaatje2()
    {
        return $this->hasOne(Plaatje::class, 'id', 'pl2');
    }

    public function plaatje3()
    {
        return $this->hasOne(Plaatje::class, 'id', 'pl3');
    }

    public function plaatje4()
    {
        return $this->hasOne(Plaatje::class, 'id', 'pl4');
    }

    public function plaatje5()
    {
        return $this->hasOne(Plaatje::class, 'id', 'pl5');
    }
}