<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('certificate_data', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->string('tingkat_lomba')->default('-');
            $table->string('tingkat_kegiatan')->default('-');
            $table->string('prestasi')->default('-');
            $table->string('status_keikutsertaan')->default('-');
            $table->string('jabatan')->default('-');
            $table->string('deskripsi_detail')->default('-');
            $table->integer('points')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates_data');
    }
};