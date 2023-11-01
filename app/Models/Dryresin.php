<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Dryresin extends Model
{
    use HasFactory;

    public function manhour(): HasMany
    {
        return $this->hasMany(ManHour::class);
    }

    // protected $fillable = [
    //     // // 'brand_id',
    //     // 'nomor_so',
    //     // 'kategori',
    //     // 'total_hours',
    // ];

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



    // public function brand(): BelongsTo
    // {
    //     return $this->belongsTo(Brand::class);
    // }
    // public function standardize(): BelongsTo
    // {
    //     return $this->belongsTo(Standardize::class);
    // }
    // public function proses(): BelongsTo
    // {
    //     return $this->belongsTo(Proses::class);
    // }
    // public static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($dryresin) {
    //         Kategori::create([
    //             'dryresin_id' => $dryresin->id,
    //         ]);
    //     });
    // }

}
