<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Safer extends Model
{
    /** @use HasFactory<\Database\Factories\SaferFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'savings',
        'description'
    ];
    
    public function animal() {
        return $this->belongsTo(Animal::class);
    }
}
