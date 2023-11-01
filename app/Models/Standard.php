<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Standard extends Model
{
    use HasFactory;

    public function manhour(): HasMany
    {
        return $this->hasMany(ManHour::class);
    }

    // public function workcenter(): HasMany
    // {
    //     return $this->hasMany(WorkCenter::class);
    // }
    // public function proses(): BelongsTo
    // {
    //     return $this->belongsTo(Proses::class);
    // }
    // public function typeproses(): BelongsTo
    // {
    //     return $this->belongsTo(TypeProses::class);
    // }
    // public function manhour(): BelongsTo
    // {
    //     return $this->belongsTo(ManHour::class);
    // }
    // public function kapasitas(): BelongsTo
    // {
    //     return $this->belongsTo(Kapasitas::class);
    // }

    // public static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($standard) {
    //         Kategori::create([
    //             'standard_id' => $standard->id,
    //         ]);
    //     });
    // }
}
