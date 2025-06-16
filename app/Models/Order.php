<?php

namespace App\Models;

use App\Models\User;
use App\Models\Service;
use App\Models\OrderFieldAnswer;
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
    public function answers()
    {
        return $this->hasMany(OrderFieldAnswer::class);
    }

    public function getAnswers(){
      return $this->answers()->with('field')->get()->map(function ($answer) {
          return [
              'label' => $answer->field->label,
              'value' => $answer->field->type === 'checkbox' && is_string($answer->value)
                  ? implode(', ', json_decode($answer->value, true))
                  : $answer->value,
          ];
      });
    }


    public function tech()
    {
        return $this->belongsTo(User::class, 'tech_id');
    }
  }
