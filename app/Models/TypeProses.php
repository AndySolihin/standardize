<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TypeProses extends Model
{
    // use HasFactory;

    // protected $fillable = [
    //     // 'slug',
    //     // 'name',
    // ];

    public function manhour(): HasMany
    {
        return $this->hasMany(Manhour::class);
    }
}
