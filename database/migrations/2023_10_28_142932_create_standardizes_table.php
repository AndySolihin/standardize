<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('standardizes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dryresin_id')->nullable()->constrained('dryresins')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('drynonresin_id')->nullable()->constrained('drynonresins')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('standard_id')->nullable()->constrained('standards')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('custom_id')->nullable()->constrained('customs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('ct_id')->nullable()->constrained('cts')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('vt_id')->nullable()->constrained('vts')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('repair_id')->nullable()->constrained('repairs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standardizes');
    }
};

