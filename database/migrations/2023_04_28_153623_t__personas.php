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
        Schema::create('Personas', function (Blueprint $table) 
        {
            $table->id('Cod_Personas');
            $table->string('Hue1_Personas')->nullable();
            $table->string('Obse_Personas')->nullable();
            $table->string('Apel_Personas');
            $table->string('Nomb_Personas');
            $table->string('FNac_Personas');
            $table->string('NFot_Personas')->nullable();
            $table->string('Dni_Personas')->unique();
            $table->string('Domi_Personas');
            $table->integer('CPos_Personas')->nullable();
            $table->string('Pobl_Personas');
            $table->string('Prov_Personas');
            $table->integer('Tfn1_Personas')->nullable();
            $table->integer('Tfn2_Personas')->nullable();
            $table->string('Emai_Personas')->nullable();
            $table->foreignId('CPad_Personas')->nullable();
            $table->foreignId('CMad_Personas')->nullable();
            $table->string('FAlt_Personas');
            $table->string('CGru_Personas')->nullable();
            $table->string('Desc_Personas')->nullable();
            $table->string('FDes_Personas')->nullable();
            $table->string('MBaj_Personas')->nullable();
            $table->string('Lopd_Personas')->nullable();               
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Personas');
    }
};
