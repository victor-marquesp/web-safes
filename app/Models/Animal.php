<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Animal extends Model
{
    /** @use HasFactory<\Database\Factories\AnimalFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'icon_path'
    ];

    public function safes() : HasMany {
        return $this->hasMany(Safe::class);
    }
}
