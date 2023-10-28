<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Standardize extends Model
{
    protected $fillable = [
        'dryresin_id',
    ];
    public function dryresin(): BelongsTo
    {
        return $this->belongsTo(Dryresin::class);
    }
}
