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
        Schema::create('tbl_alumni', function (Blueprint $table) {
            $table->string('NIM')->primary();
            $table->string('nama', 100);
            $table->integer('angkatan');
            $table->string('jurusan', 100);
            $table->string('pekerjaan', 150)->nullable();
            $table->text('kisah_sukses')->nullable();
            $table->text('foto_url')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
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
        Schema::dropIfExists('tbl_alumni');
    }
};
