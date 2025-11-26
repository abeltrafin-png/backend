<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Update foto paths from 'storage/foto-dosen/' to 'foto-dosen/'
        DB::table('tbl_dosen')
            ->where('foto', 'like', 'storage/foto-dosen/%')
            ->update([
                'foto' => DB::raw("REPLACE(foto, 'storage/foto-dosen/', 'foto-dosen/')")
            ]);
    }

    public function down(): void
    {
        // Revert foto paths from 'foto-dosen/' back to 'storage/foto-dosen/'
        DB::table('tbl_dosen')
            ->where('foto', 'like', 'foto-dosen/%')
            ->update([
                'foto' => DB::raw("CONCAT('storage/', foto)")
            ]);
    }
};
