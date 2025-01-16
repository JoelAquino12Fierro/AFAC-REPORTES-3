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
        Schema::create('systems', function (Blueprint $table) {
            $table->id();
            $table->string('systems_name');
            $table->timestamps();
        });

        Schema::create('modules', function(Blueprint $table){
            $table->id();
            $table->string('modules_name');
            $table->timestamps();
        });

        Schema::create('modules_systems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_systems');
            $table->unsignedBigInteger('id_modules');
            $table->timestamps();

            $table->foreign('id_systems')->references('id')->on('systems')->onDelete('cascade');
            $table->foreign('id_modules')->references('id')->on('modules')->onDelete('cascade');
        });

      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('systems');
        Schema::dropIfExists('modules');
        Schema::dropIfExists('modules_systems');
    }
};
