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
        Schema::create('manhours', function (Blueprint $table) {
            $table->id();
            $table->integer("durasi_manhour");
            $table->foreignId('kapasitas_id')->constrained('kapasitas')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('kategori_id')->constrained('kategoris')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('workcenters_id')->constrained('work_centers')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('proses_id')->constrained('proses')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('tipeproses_id')->constrained('tipeproses')->cascadeOnUpdate()->cascadeOnDelete();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manhours');
    }
};
