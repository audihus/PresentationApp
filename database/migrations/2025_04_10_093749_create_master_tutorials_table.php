<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('master_tutorials', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('kode_matkul');
            $table->string('url_presentation')->nullable();
            $table->string('url_finished')->nullable();
            $table->string('creator_email');
            $table->timestamps(); // created_at & updated_at
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_tutorials');
    }
};
