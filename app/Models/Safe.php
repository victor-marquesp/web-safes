<?php

namespace App\Models;

use App\Enums\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Safe extends Model
{
    /** @use HasFactory<\Database\Factories\SafeFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'animal_id',
        'currency_id',
        'description'
    ];

    protected $guarded = [
        'user_id'
    ];

    protected $casts = [
        'state' => State::class
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
    
    public function animal() : BelongsTo {
        return $this->belongsTo(Animal::class);
    }

    public function currency() : BelongsTo {
        return $this->belongsTo(Currency::class);
    }

    public function deposits() : HasMany {
        return $this->hasMany(Deposit::class);
    }
}
