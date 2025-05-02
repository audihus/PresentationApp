<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('master_tutorials', function (Blueprint $table) {
            $table->string('nama_matkul')->after('kode_matkul')->ullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('master_tutorials', function (Blueprint $table) {
            $table->dropColumn('nama_matkul');
        });
    }
};
