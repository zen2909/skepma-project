<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type'); // Jenis sertifikat
            $table->year('year'); // Tahun
            $table->string('status')->default('pending');
            $table->integer('points')->default(0); // Poin
            $table->string('file_path'); // Lokasi file
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('certificates');
    }
};