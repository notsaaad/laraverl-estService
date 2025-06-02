<?php

namespace App\Models;

use App\Models\User;
use App\Models\Service;
use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'total_price', 'user_id', 'service_id', 'description', 'status'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function service(): BelongsTo {
        return $this->belongsTo(Service::class);
    }

    public function details(): HasMany {
        return $this->hasMany(OrderDetail::class, 'orders_id');
    }
}
