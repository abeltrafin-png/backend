<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // tambahkan ini untuk DB::raw()

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_informasi', function (Blueprint $table) {
            $table->id('id_informasi');
            $table->enum('kategori', ['berita', 'pengumuman', 'agenda']);
            $table->string('judul', 200);
            $table->text('isi');
            $table->dateTime('tanggal_publish')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('penulis', 100);
            $table->string('lampiran', 255)->nullable(); // bisa digunakan untuk file/foto opsional
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps(); // otomatis membuat created_at & updated_at
        });
    }

    /**
     * Hapus tabel jika rollback.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_informasi');
    }
};
