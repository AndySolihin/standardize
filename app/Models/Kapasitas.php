<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kapasitas extends Model
{
    use HasFactory;

    public function dryresin(): BelongsTo
    {
        return $this->belongsTo(dryresin::class);
    }
    public function drynonresin(): BelongsTo
    {
        return $this->belongsTo(Drynonresin::class);
    }
    public function standard(): BelongsTo
    {
        return $this->belongsTo(Standard::class);
    }
    public function cutsom(): BelongsTo
    {
        return $this->belongsTo(Custom::class);
    }
    public function ct(): BelongsTo
    {
        return $this->belongsTo(Ct::class);
    }
    public function vt(): BelongsTo
    {
        return $this->belongsTo(Vt::class);
    }
    public function repair(): BelongsTo
    {
        return $this->belongsTo(Repair::class);
    }
}
