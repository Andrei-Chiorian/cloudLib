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
        Schema::create('clubs', function (Blueprint $table) {
            $table->id('Cod_Clubs');
            $table->string('NReg_Clubs');
            $table->string('Nomb_Clubs');
            $table->string('RSoc_Clubs');
            $table->string('Nif_Clubs');
            $table->string('Domi_Clubs');
            $table->string('CPos_Clubs');
            $table->string('Pobl_Clubs');
            $table->string('Prov_Clubs');
            $table->string('Cont_Clubs');
            $table->string('Tel1_Clubs');
            $table->string('Tel2_Clubs');
            $table->string('Fax_Clubs');
            $table->string('Emai_Clubs');
            $table->string('Logo_Clubs')->nullable();
            $table->string('Obse_Clubs');
            $table->string('NoBa_Clubs');
            $table->string('Banc_Clubs');
            $table->string('Ofic_Clubs');
            $table->string('DiCo_Clubs');
            $table->string('NCta_Clubs');
            $table->string('TfBa_Clubs');
            $table->string('FPte_Clubs');
            $table->string('FSec_Clubs');
            $table->string('FVo1_Clubs');
            $table->string('FVo2_Clubs');
            $table->string('FVo3_Clubs');
            $table->string('FVo4_Clubs')->nullable();
            $table->string('FVo5_Clubs')->nullable();
            $table->string('FVo6_Clubs')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clubs');
    }
};
