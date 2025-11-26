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
        Schema::table('tbl_tracer_alumni', function (Blueprint $table) {
            $table->string('posisi', 100)->nullable()->after('gaji_awal');
            $table->decimal('gaji', 10, 2)->nullable()->after('posisi');
            $table->string('lokasi', 150)->nullable()->after('gaji');
            $table->string('periode_berkerja', 50)->nullable()->after('lokasi');
            $table->text('komentar')->nullable()->after('periode_berkerja');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_tracer_alumni', function (Blueprint $table) {
            $table->dropColumn(['posisi', 'gaji', 'lokasi', 'periode_berkerja', 'komentar']);
        });
    }
};
