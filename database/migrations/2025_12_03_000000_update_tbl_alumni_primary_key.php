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
            // Removed dropping of 'id' column since it doesn't exist in original schema
            // if (Schema::hasColumn('tbl_alumni', 'id')) {
            //     $table->dropColumn('id');
            // }
            // Drop existing primary key if any, so we can set NIM as primary key
            $sm = Schema::getConnection()->getDoctrineSchemaManager();
            $indexes = $sm->listTableIndexes('tbl_alumni');
            foreach ($indexes as $index) {
                if ($index->isPrimary()) {
                    $table->dropPrimary();
                    break;
                }
            }
            // Set 'NIM' as primary key
            $table->primary('NIM');
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
            // Readd id column as big incrementing primary key
            $table->bigIncrements('id')->first();
            // Drop 'NIM' primary key
            $table->dropPrimary('NIM');
            // Set 'id' as primary key
            $table->primary('id');
        });
    }
};
