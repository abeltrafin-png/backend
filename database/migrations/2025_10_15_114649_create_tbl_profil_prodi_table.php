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
        Schema::create('tbl_profil_prodi', function (Blueprint $table) {
            $table->id(); // id sebagai auto_increment primary key
            $table->string('nama_prodi', 150);
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('akreditasi', 10)->nullable();
            $table->string('logo', 255)->nullable();
            $table->string('kontak_email', 100)->nullable();
            $table->string('kontak_telepon', 20)->nullable();
            $table->text('alamat')->nullable();
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
        Schema::dropIfExists('tbl_profil_prodi');
    }
};
