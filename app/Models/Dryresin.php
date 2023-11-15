<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Dryresin extends Model
{
    use HasFactory;
    protected $fillable = [
        'kd_manhour',
        'nama_product',
        'kategori',
        'total_hour',
        'ukuran_kapasitas',
        'nomor_so',
        'coil_lv',
        'coil_hv',
        'potong_leadwire',
        'potong_isolasi',
        'hv_moulding',
        'hv_casting',
        'hv_demoulding',
        'lv_bobbin',
        'lv_moulding',
        'touch_up',
        'type_susun_core',
        'wiring',
        'instal_housing',
        'bongkar_housing',
        'pembuatan_cu_link',
        'others',
        'accesories',
        'potong_isolasi_fiber',
        'routine_test',
    ];

    public function manhour(): BelongsTo
    {
        return $this->belongsTo(Manhour::class);
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
    public static function boot()
    {
        parent::boot();

        static::created(function ($dryresin) {
            Standardize::create([
                'dryresin_id' => $dryresin->id,
            ]);
        });

        self::creating(function ($dryresin) {
            $nomorSo = $dryresin->nomor_so;
            $namaProduct = $dryresin->kategori;
            $ukuranKapasitas = $dryresin->ukuran_kapasitas;

            $nomorSo = str_replace(['/', '-'], '', $nomorSo);

            $kdManhour = $namaProduct . '' .  $ukuranKapasitas . '' . $nomorSo;

            $dryresin->kd_manhour = $kdManhour;
        });
    }
}
