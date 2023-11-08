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
            $table->foreignId('workcenters_id')->constrained('work_centers');
            $table->foreignId('proses_id')->constrained('proses');
            $table->foreignId('tipeproses_id')->constrained('tipeproses');
            $table->foreignId('kapasitas_id')->constrained('kapasitas');
            $table->foreignId('kategori_id')->constrained('kategoris');
            $table->string("nama_workcenter");
            $table->string("nama_proses");
            $table->string("nama_tipeproses");
            $table->string("ukuran_kapasitas");
            $table->string("nama_kategoriproduk");



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
