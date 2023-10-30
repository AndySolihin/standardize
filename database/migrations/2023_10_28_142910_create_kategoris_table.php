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
        Schema::create('kategoris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dryresin_id')->nullable()->constrained();
            $table->foreignId('drynonresin_id')->nullable()->constrained();
            $table->foreignId('standard_id')->nullable()->constrained();
            $table->foreignId('custom_id')->nullable()->constrained();
            $table->foreignId('ct_id')->nullable()->constrained();
            $table->foreignId('vt_id')->nullable()->constrained();
            $table->foreignId('repair_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategoris');
    }
};


