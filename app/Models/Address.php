<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'addressable_type',
        'addressable_id',
        'address_line_1',
        'address_line_2',
        'city',
        'county',
        'postcode',
        'latitude',
        'longitude',
    ];

    public function addressable()
    {
        return $this->morphTo();
    }

    public function property()
    {
        return $this->hasOne(Property::class);
    }
}
