<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proses extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'slug',
        // 'name',
    ];

    public function dryresin(): HasMany
    {
        return $this->hasMany(Dryresin::class);
    }
    public function typeproses(): BelongsTo
    {
        return $this->belongsTo(TypeProses::class);
    }
}
