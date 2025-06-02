<?php

namespace App\Models;

use App\Models\Bill;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = ['bill_id', 'user_id', 'amount', 'status'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function bill(): BelongsTo {
        return $this->belongsTo(Bill::class);
    }
}
