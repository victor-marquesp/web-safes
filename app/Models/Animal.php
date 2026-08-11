<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    /** @use HasFactory<\Database\Factories\AnimalFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'icon_path'
    ];

    public function safers() {
        return $this->hasMany(Safer::class);
    }
}
