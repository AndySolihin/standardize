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
        Schema::create('dryresins', function (Blueprint $table) {
            $table->id();
            $table->string('kd_manhour')->unique();
            $table->string('nama_product')->default('Dry Cast Resin');
            $table->string('kategori')->default('5');
            $table->string('nomor_so');
            $table->string('ukuran_kapasitas');
            $table->integer('total_hour');
            $table->foreignId('manhour_id')->nullable()->constrained('manhours')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('coil_lv', 100)->nullable();
            $table->string('coil_hv', 100)->nullable();
            $table->string('potong_leadwire', 100)->nullable();
            $table->string('potong_isolasi', 100)->nullable();
            $table->string('hv_moulding', 100)->nullable();
            $table->string('hv_casting', 100)->nullable();
            $table->string('hv_demoulding', 100)->nullable();
            $table->string('lv_bobbin', 100)->nullable();
            $table->string('lv_moulding', 100)->nullable();
            $table->string('touch_up', 100)->nullable();
            $table->string('type_susun_core', 100)->nullable();
            $table->string('wiring', 100)->nullable();
            $table->string('instal_housing', 100)->nullable();
            $table->string('bongkar_housing', 100)->nullable();
            $table->string('pembuatan_cu_link', 100)->nullable();
            $table->string('others', 100)->nullable();
            $table->string('accessories', 100)->nullable();
            $table->string('potong_isolasi_fiber', 100)->nullable();
            $table->string('routine_test', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dryresins');
    }
};


