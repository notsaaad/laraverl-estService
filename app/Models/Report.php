<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;
    protected $fillable = ['description', 'type', 'user_id'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
