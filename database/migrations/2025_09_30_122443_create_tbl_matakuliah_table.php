<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_matakuliah', function (Blueprint $table) {
            $table->id();
            $table->string('kode_matkul', 20);
            $table->string('nama_matkul', 100);
            $table->integer('semester');
            $table->integer('sks');
            $table->text('deskripsi')->nullable();
            $table->unsignedBigInteger('dosen_id')->nullable();
            $table->foreign('dosen_id')->references('id')->on('tbl_dosen')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_matakuliah');
    }
};
