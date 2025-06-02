<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Category;
use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'image', 'active', 'price', 'category_id'];

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function orders(): HasMany {
        return $this->hasMany(Order::class);
    }

    public function orderDetails(): HasMany {
        return $this->hasMany(OrderDetail::class);
    }
}
