<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Repair extends Model
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

    //     static::created(function ($repair) {
    //         Kategori::create([
    //             'repair_id' => $repair->id,
    //         ]);
    //     });
    // }
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($repair) {
    //         $lastCustomId = static::latest('kd_manhour')->value('kd_manhour');
    //         if (!$lastCustomId) {
    //             $lastCustomId = '00000000000000';
    //         }
    //         $repair->kd_manhour = static::incrementCustomId($lastCustomId);
    //     });
    // }

    // public static function incrementCustomId($lastCustomId)
    // {
    //     $lastNumber = intval($lastCustomId);
    //     $newNumber = $lastNumber + 1;

    //     // Memastikan panjang tetap 14 digit dengan mengisi nol di depan
    //     $newCustomId = str_pad($newNumber, 14, '0', STR_PAD_LEFT);

    //     return $newCustomId;
    // }
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($repair) {
    //         $customId = static::generateCustomId();
    //         $repair->kd_manhour = $customId;
    //     });
    // }

    // public static function generateCustomId()
    // {
    //     $latestRepair = static::latest('kd_manhour')->first();

    //     if (!$latestRepair) {
    //         return 'CustomID0001'; // Atur format awal sesuai kebutuhan Anda
    //     }

    //     $lastCustomId = $latestRepair->kd_manhour;
    //     // Ekstrak angka dari ID terakhir
    //     $lastNumber = preg_replace('/\D/', '', $lastCustomId);
    //     // Tambahkan 1 ke angka terakhir
    //     $newNumber = $lastNumber + 1;
    //     // Format ulang ID sesuai kebutuhan Anda
    //     $newCustomId = 'CustomID' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);

    //     return $newCustomId;
    // }
}
