<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = ['service_id', 'orders_id', 'item'];

    public function service(): BelongsTo {
        return $this->belongsTo(Service::class);
    }

    public function order(): BelongsTo {
        return $this->belongsTo(Order::class, 'orders_id');
    }
}
