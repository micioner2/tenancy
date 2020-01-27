<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voided extends Model
{
    protected $table = 'voided';
    protected $with = ['user', 'soap_type', 'state_type', 'details'];

    protected $fillable = [
        'user_id',
        'external_id',
        'soap_type_id',
        'state_type_id',
        'ubl_version',
        'date_of_issue',
        'date_of_reference',
        'identifier',
        'filename',
        'ticket',
        'has_ticket',
        'has_cdr',
    ];

    protected $casts = [
        'date_of_issue' => 'date',
        'date_of_reference' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function soap_type()
    {
        return $this->belongsTo(SoapType::class);
    }

    public function state_type()
    {
        return $this->belongsTo(StateType::class);
    }

    public function details()
    {
        return $this->hasMany(VoidedDetail::class);
    }

    public function scopeWhereUser($query)
    {
        return $query->where('user_id', auth()->id());
    }

    public function getDownloadExternalXmlAttribute()
    {
        return route('voided.download_external', ['type' => 'xml', 'external_id' => $this->external_id]);
    }

    public function getDownloadExternalPdfAttribute()
    {
        return route('voided.download_external', ['type' => 'pdf', 'external_id' => $this->external_id]);
    }

    public function getDownloadExternalCdrAttribute()
    {
        return route('voided.download_external', ['type' => 'cdr', 'external_id' => $this->external_id]);
    }
}