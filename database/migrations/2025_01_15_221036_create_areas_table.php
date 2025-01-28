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
        // Tabla de area
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('areas_name');
            $table->timestamps(); //create and update
        });

        // Tabla de cargo=positions

        Schema::create('positions', function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('positions_areas', function(Blueprint $table){
            $table->unsignedBigInteger('areas');
            $table->unsignedBigInteger('positions');
            $table->timestamps();

            $table->foreign('areas')->references('id')->on('areas')->onDelete('cascade');
            $table->foreign('positions')->references('id')->on('positions')->onDelete('cascade');
        });


        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions_areas');
        Schema::dropIfExists('areas');
        Schema::dropIfExists('positions');
        
    }
};
