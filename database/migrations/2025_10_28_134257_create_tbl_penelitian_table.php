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
        Schema::create('tbl_penelitian', function (Blueprint $table) {
            $table->id('id_penelitian');
            $table->string('nidn', 20)->nullable();
            $table->string('nama_dosen', 100)->nullable();
            $table->string('judul_penelitian', 255)->nullable();
            $table->string('bidang_penelitian', 100)->nullable();
            $table->string('jenis_penelitian', 100)->nullable();
            $table->year('tahun')->nullable();
            $table->integer('lama_kegiatan')->nullable();
            $table->string('sumber_dana', 100)->nullable();
            $table->decimal('jumlah_dana', 15, 2)->nullable();
            $table->text('anggota_peneliti')->nullable();
            $table->string('mitra', 150)->nullable();
            $table->enum('status_penelitian', ['Proposal', 'Berjalan', 'Selesai'])->default('Proposal');
            $table->text('hasil_penelitian')->nullable();
            $table->string('publikasi', 255)->nullable();
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
        Schema::dropIfExists('tbl_penelitian');
    }
};
