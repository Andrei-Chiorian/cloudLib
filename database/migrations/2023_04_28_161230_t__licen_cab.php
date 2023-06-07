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
        Schema::create('LicenCab', function (Blueprint $table) 
        {            
            $table->unsignedBigInteger('CTem_LicenCab')->index();
            $table->unsignedBigInteger('CFed_LicenCab')->index();
            $table->unsignedBigInteger('CDep_LicenCab')->index();
            $table->unsignedBigInteger('CClu_LicenCab')->index();
            $table->unsignedBigInteger('CCab_LicenCab')->index();           
            $table->string('Fech_LicenCab');           
            $table->string('Infa_LicenCab');
            $table->integer('Impo_LicenCab');
            $table->integer('Envi_LicenCab');
                                
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
