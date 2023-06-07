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
        Schema::create('LicenLin', function (Blueprint $table) 
        {
            
            $table->foreignId('CTem_LicenLin')->references('CTem_LicenCab')->on('T_LicenCab')->onDelete('cascade');
            $table->foreignId('CFed_LicenLin')->references('CFed_LicenCab')->on('T_LicenCab')->onDelete('cascade');
            $table->foreignId('CDep_LicenLin')->references('CDep_LicenCab')->on('T_LicenCab')->onDelete('cascade');
            $table->foreignId('CClu_LicenLin')->references('CClu_LicenCab')->on('T_LicenCab')->onDelete('cascade');
            $table->foreignId('CCab_LicenLin')->references('CCab_LicenCab')->on('T_LicenCab')->onDelete('cascade');
            $table->foreignId('CPer_LicenLin')->references('Cod_Personas')->on('T_Personas')->onDelete('cascade');
            $table->string('Lice_LicenLin');
            $table->string('Fech_LicenLin');
            $table->integer('Usua_LicenLin');
            $table->string('Clav_LicenLin');
            $table->string('Reci_LicenLin');
            $table->integer('FeRe_LicenLin');
            $table->integer('Entr_LicenLin');
            $table->integer('FeEn_LicenLin');                        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('T_LicenLin');
    }
};
