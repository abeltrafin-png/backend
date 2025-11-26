<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_project_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_project', 255);
            $table->text('deskripsi')->nullable();
            $table->enum('status', ['ongoing', 'completed', 'cancelled'])->default('ongoing');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->foreign('mahasiswa_id')->references('id')->on('tbl_mahasiswa')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_project_mahasiswa');
    }
};
