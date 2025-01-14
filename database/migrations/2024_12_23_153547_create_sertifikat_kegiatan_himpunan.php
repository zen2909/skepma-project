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
        Schema::create('sertifikat_kegiatan_himpunan', function (Blueprint $table) {
            $table->id();
            $table->string("jabatan");
            $table->string("deskripsi_detail");
            $table->integer("poin");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sertifikat_kegiatan_himpunan');
    }
};