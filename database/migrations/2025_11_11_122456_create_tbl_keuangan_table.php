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
        Schema::create('tbl_keuangan', function (Blueprint $table) {
            $table->id('id_keuangan');
            $table->string('nama_peraturan', 150);
            $table->text('deskripsi');
            $table->string('file_dokumen', 255)->nullable();
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
        Schema::dropIfExists('tbl_keuangan');
    }
};
