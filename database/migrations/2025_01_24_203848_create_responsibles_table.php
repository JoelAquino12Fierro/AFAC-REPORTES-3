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
        Schema::create('responsibles', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('users');
            $table->unsignedBigInteger('areas');
            $table->unsignedBigInteger('positions');
            $table->timestamps();
        
            $table->foreign('areas')->references('areas')->on('positions_areas')->onDelete('cascade'); 
            $table->foreign('positions')->references('positions')->on('positions_areas')->onDelete('cascade'); 
            $table->foreign('users')->references('id')->on('users')->onDelete('cascade');
        
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responsibles');
    }
};
