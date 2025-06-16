<?php

namespace App\Models;

use App\Models\Order;
use App\Models\ServiceField;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderFieldAnswer extends Model
{
    use HasFactory;
        protected $fillable = [
        'order_id',
        'field_id',
        'value',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function field()
    {
        return $this->belongsTo(ServiceField::class, 'field_id');
    }
}
