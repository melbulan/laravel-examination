<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Property extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'bedrooms',
        'slug',
        'bathrooms',
        'size',
        'description',
        'council_tax_band',
        'price',
        'currency',
        'tenure',
        'property_type_id'
    ];

    public function address()
    {
        return $this->morphOne(Address::class,'addressable');
    }

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class);
    }
}
