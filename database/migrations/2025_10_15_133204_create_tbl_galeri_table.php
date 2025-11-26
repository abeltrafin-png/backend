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
        Schema::create('tbl_galeri', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kegiatan_id')->constrained('tbl_kegiatan')->onDelete('cascade');
            $table->string('file');
            $table->string('tipe')->default('foto');
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('tbl_galeri');
    }
};
