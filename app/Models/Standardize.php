<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Standardize extends Model
{
    protected $fillable = [
        'kategori_id',
    ];
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
}

