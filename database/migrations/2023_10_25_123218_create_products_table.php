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
            // $table->foreignId('brand_id')->nullable()->constrained();
            $table->string('nomor_so')->index();;
            $table->string('kategori')->index();
            $table->decimal('total_hours', 15, 2)->nullable();
            // $table->foreignId('proses_id')->constrained();
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
