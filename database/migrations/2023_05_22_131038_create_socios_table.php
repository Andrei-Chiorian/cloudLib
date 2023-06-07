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
        Schema::create('socios', function (Blueprint $table) {
            $table->foreignId('CPer_Socios')->references('Cod_Personas')->on('personas')->onDelete('cascade');
            $table->id('Cod_Socios');
            $table->foreignId('CClu_Socios')->references('Cod_Clubs')->on('clubs')->onDelete('cascade');
            $table->string('CCuo_Socios');
            $table->string('SoFu_Socios');
            $table->string('FAlt_Socios');
            $table->string('Carg_Socios');
            $table->string('FBaj_Socios')->nullable();
            $table->string('Moti_Socios')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socios');
    }
};
