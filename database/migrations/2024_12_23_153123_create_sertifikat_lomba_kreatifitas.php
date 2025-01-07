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
        Schema::create('sertifikat_lomba_kreatifitas', function (Blueprint $table) {
            $table->id();
            $table->string("tingkat_lomba");
            $table->string("prestasi");
            $table->integer("poin");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sertifikat_lomba_kreatifitas');
    }
};