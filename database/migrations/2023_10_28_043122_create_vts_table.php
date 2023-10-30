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
        Schema::create('vts', function (Blueprint $table) {
            $table->id();
            $table->string('kd_manhour', 14)->unique();
            $table->string('nama_product')->default('VT')->index();
            $table->foreignId('kapasitas_id')->constrained();
            $table->foreignId('work_center_id')->constrained();
            $table->foreignId('proses_id')->constrained();
            $table->foreignId('typeproses_id')->constrained();
            $table->foreignId('man_hour_id')->constrained();
            $table->string('nomor_so')->index();
            $table->integer('total_hour')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vts');
    }
};
