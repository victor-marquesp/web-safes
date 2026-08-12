<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Currency extends Model {

    protected $fillable = [
        'name',
        'description',
        'icon_path'
    ];

    public function coins() : HasMany {
        return $this->hasMany(Coin::class);
    }

    public function safes() : HasMany {
        return $this->hasMany(Safe::class);
    }   

}
