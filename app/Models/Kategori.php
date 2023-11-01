<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;


    

    // public static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($kategori) {
    //         Standardize::create([
    //             'kategori_id' => $kategori->id,
    //         ]);
    //     });
    // }
}

