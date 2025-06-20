<?php

namespace App\Models;

use App\Models\Job;
use App\Models\Order;
use App\Models\Report;
use App\Models\Wallet;
// use Illuminate\Auth\Authenticatable;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['name', 'email','password', 'phone', 'image','role','job_id', 'address', 'gender'];

    public function orders(): HasMany {
        return $this->hasMany(Order::class);
    }

    public function wallet() {
        return $this->hasOne(Wallet::class);
    }

    public function invoices(): HasMany {
        return $this->hasMany(Invoice::class);
    }

    public function reports(): HasMany {
        return $this->hasMany(Report::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function handledOrders()
    {
        return $this->hasMany(Order::class, 'tech_id');
    }
}
