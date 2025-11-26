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
        Schema::table('tbl_alumni', function (Blueprint $table) {
            $table->index('angkatan');
        });

        Schema::table('tbl_tracer_alumni', function (Blueprint $table) {
            $table->index('nim');
            $table->index('tahun_lulus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_alumni', function (Blueprint $table) {
            $table->dropIndex(['angkatan']);
        });

        Schema::table('tbl_tracer_alumni', function (Blueprint $table) {
            $table->dropIndex(['nim']);
            $table->dropIndex(['tahun_lulus']);
        });
    }
};
