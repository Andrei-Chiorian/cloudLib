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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('author');
            $table->string('editorial')->nullable();
            $table->string('synopsis')->nullable();
            $table->integer('page_num')->nullable();
            $table->string('book_cond')->nullable();
            $table->string('obser')->nullable();
            $table->string('image')->unique()->nullable();
            $table->string('image2')->unique()->nullable();
            $table->integer('valoration')->nullable();
            $table->foreignId('library_id')->constrained()->onDelete('cascade');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
