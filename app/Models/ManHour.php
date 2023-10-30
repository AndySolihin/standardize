<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ManHour extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'slug',
        // 'name',
    ];

    public function typeproses(): BelongsTo
    {
        return $this->belongsTo(TypeProses::class);
    }
}
