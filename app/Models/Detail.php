<?php

namespace App\Models;

use App\Models\Catalogs\AffectationIgvType;
use App\Models\Catalogs\PriceType;
use App\Models\Catalogs\SystemIscType;
use App\Models\Catalogs\UnitType;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $with = ['unit_type', 'affectation_igv_type', 'system_isc_type', 'price_type'];
    public $timestamps = false;

    protected $fillable = [
        'document_id',
        'item',
        'quantity',
        'unit_value',

        'affectation_igv_type_id',
        'total_base_igv',
        'percentage_igv',
        'total_igv',

        'system_isc_type_id',
        'total_base_isc',
        'percentage_isc',
        'total_isc',

        'total_base_other_taxes',
        'percentage_other_taxes',
        'total_other_taxes',
        'total_taxes',

        'price_type_id',
        'unit_price',

        'total_value',
        'total',

        'attributes',
        'charges',
        'discounts'
    ];

    public function getItemAttribute($value)
    {
        return (is_null($value))?null:(object) json_decode($value);
    }

    public function setItemAttribute($value)
    {
        $this->attributes['item'] = (is_null($value))?null:json_encode($value);
    }

    public function getAttributesAttribute($value)
    {
        return (is_null($value))?null:(object) json_decode($value);
    }

    public function setAttributesAttribute($value)
    {
        $this->attributes['attributes'] = (is_null($value))?null:json_encode($value);
    }

    public function getChargesAttribute($value)
    {
        return (is_null($value))?null:(object) json_decode($value);
    }

    public function setChargesAttribute($value)
    {
        $this->attributes['charges'] = (is_null($value))?null:json_encode($value);
    }

    public function getDiscountsAttribute($value)
    {
        return (is_null($value))?null:(object) json_decode($value);
    }

    public function setDiscountsAttribute($value)
    {
        $this->attributes['discounts'] = (is_null($value))?null:json_encode($value);
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function unit_type()
    {
        return $this->belongsTo(UnitType::class);
    }

    public function affectation_igv_type()
    {
        return $this->belongsTo(AffectationIgvType::class);
    }

    public function system_isc_type()
    {
        return $this->belongsTo(SystemIscType::class);
    }

    public function price_type()
    {
        return $this->belongsTo(PriceType::class);
    }
}