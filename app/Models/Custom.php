<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Custom extends Model
{
    use HasFactory;

    public function workcenter(): HasMany
    {
        return $this->hasMany(WorkCenter::class);
    }
    public function proses(): BelongsTo
    {
        return $this->belongsTo(Proses::class);
    }
    public function typeproses(): BelongsTo
    {
        return $this->belongsTo(TypeProses::class);
    }
    public function manhour(): BelongsTo
    {
        return $this->belongsTo(ManHour::class);
    }
    public function kapasitas(): BelongsTo
    {
        return $this->belongsTo(Kapasitas::class);
    }

    public static function boot()
    {
        parent::boot();

        static::created(function ($custom) {
            Kategori::create([
                'custom_id' => $custom->id,
            ]);
        });
    }
}
