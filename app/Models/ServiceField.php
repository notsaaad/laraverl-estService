<?php

namespace App\Models;

use App\Models\Service;
use App\Models\OrderFieldAnswer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceField extends Model
{
    use HasFactory;
        protected $fillable = [
        'service_id',
        'label',
        'type',
        'options',
        'required',
    ];

    protected $casts = [
        'options' => 'array',
        'required' => 'boolean',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function answers()
    {
        return $this->hasMany(OrderFieldAnswer::class, 'field_id');
    }
}
