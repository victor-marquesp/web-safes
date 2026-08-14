<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Deposit extends Model {
    
    protected $fillable = [
        'safe_id',
        'coin_id',
        'quantity',
        'value_cents'
    ];

    public function safe() : BelongsTo {
        return $this->belongsTo(Safe::class);
    }

    public function coin(): BelongsTo {
        return $this->belongsTo(Coin::class);
    }

}
