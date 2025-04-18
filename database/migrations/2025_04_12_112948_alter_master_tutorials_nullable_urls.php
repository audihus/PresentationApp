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
            $table->string('url_presentation')->nullable()->change();
            $table->string('url_finished')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('master_tutorials', function (Blueprint $table) {
            $table->string('url_presentation')->nullable(false)->change();
            $table->string('url_finished')->nullable(false)->change();
        });
    }
};
