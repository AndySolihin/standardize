<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Dryresin extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'brand_id',
        'nomor_so',
        'kategori',
        'total_hours',
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
    public function standardize(): BelongsTo
    {
        return $this->belongsTo(Standardize::class);
    }
    public function proses(): BelongsTo
    {
        return $this->belongsTo(Proses::class);
    }
    public static function boot()
    {
        parent::boot();

        static::created(function ($dryresin) {
            Standardize::create([
                'dryresin_id' => $dryresin->id,
            ]);
        });
    }

}
