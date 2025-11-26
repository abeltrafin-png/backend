<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tbl_kurikulum', function (Blueprint $table) {
            $table->id(); // Primary key auto increment
            $table->string('kode_matkul', 20);
            $table->string('nama_matkul', 100);
            $table->integer('semester');
            $table->integer('sks');
            $table->text('deskripsi')->nullable();
            $table->timestamps(); // created_at & updated_at otomatis
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_kurikulum');
    }
};