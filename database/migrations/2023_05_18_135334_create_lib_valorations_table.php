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
        Schema::create('lib_valorations', function (Blueprint $table) {
            $table->id();
            $table->foreignid('user_id')->constrained()->onDelete('cascade');;
            $table->foreignid('library_id')->constrained()->onDelete('cascade');;         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lib_valorations');
    }
};
