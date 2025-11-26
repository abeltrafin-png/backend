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
        Schema::create('tbl_peraturan', function (Blueprint $table) {
            $table->id('id_peraturan');
            $table->unsignedBigInteger('id_kategori');
            $table->foreign('id_kategori')->references('id_kategori')->on('tbl_kategori_peraturan')->onDelete('cascade');
            $table->string('judul_peraturan', 150);
            $table->text('isi_peraturan');
            $table->string('file_peraturan', 255)->nullable();
            $table->dateTime('tanggal_upload')->useCurrent();
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
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
        Schema::dropIfExists('tbl_peraturan');
    }
};
