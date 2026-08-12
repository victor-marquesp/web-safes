<?php

namespace App\Models;

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
        'savings',
        'description'
    ];
    
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
