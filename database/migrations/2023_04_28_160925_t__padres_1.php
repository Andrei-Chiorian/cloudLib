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
        Schema::create('Padre_1s', function (Blueprint $table) {
            $table->id('Cod_Padres');            
            $table->string('Nomb_Padres');            
            $table->string('Dni_Padres');
            $table->string('Domi_Padres');
            $table->integer('CPos_Padres')->nullable();
            $table->string('Pobl_Padres');
            $table->string('Prov_Padres');
            $table->integer('Tfn1_Padres')->nullable();
            $table->integer('Tfn2_Padres')->nullable();
            $table->string('Emai_Padres')->nullable();
            $table->string('Varios_Padres')->nullable();
            $table->string('Pred_Padres')->nullable();                        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Padres_1');
    }
};
