<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manhour extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     // 'slug',
    //     // 'name',
    // ];

    public function workcenter(): BelongsTo
    {
        return $this->belongsTo(WorkCenter::class);
    }
    public function kapasitas(): BelongsTo
    {
        return $this->belongsTo(Kapasitas::class);
    }
    public function tipeproses(): BelongsTo
    {
        return $this->belongsTo(Tipeproses::class);
    }
    public function proses(): BelongsTo
    {
        return $this->belongsTo(Proses::class);
    }
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    public function dryresin(): HasOne
    {
        return $this->hasOne(Dryresin::class);
    }

}
