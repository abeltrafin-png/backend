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
        Schema::create('tbl_pkm', function (Blueprint $table) {
            $table->id('id_pengabdian');
            $table->string('nidn', 20);
            $table->string('nama_dosen', 100);
            $table->string('judul_pengabdian', 255);
            $table->string('bidang_pengabdian', 100)->nullable();
            $table->string('lokasi', 150)->nullable();
            $table->year('tahun')->nullable();
            $table->string('sumber_dana', 100)->nullable();
            $table->decimal('jumlah_dana', 15, 2)->nullable();
            $table->string('mitra', 150)->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('file_laporan', 255)->nullable();
            $table->timestamp('tanggal_input')->useCurrent();
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
        Schema::dropIfExists('tbl_pkm');
    }
};
