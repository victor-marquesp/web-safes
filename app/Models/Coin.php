<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Coin extends Model
{
    protected $fillable = [
        'name',
        'currency_id',
        'value_cents',
        'icon_path'
    ];

    public function currency() : BelongsTo {
        return $this->belongsTo(Currency::class);
    }
}
