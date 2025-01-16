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
        Schema::create('types_reports', function(Blueprint $table){
            $table->id();
            $table->string('name_types_reports');
        });

        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('folio')->unique(); //Folio
            $table->date('application_date'); //Fecha creación
            $table->date('report_date'); //Fecha del reporte (generacion)
            $table->string('actions');  //
            $table->text('description')->nullable();
            $table->string('evidence')->nullable(); //string de la ruta de la imagen
            $table->unsignedBigInteger('areas'); //Area
            $table->unsignedBigInteger('systems'); //Sistema
            $table->unsignedBigInteger('types_reports'); //Tipo
            $table->unsignedBigInteger('reporting_user'); //usuario
            $table->timestamps();

            $table->foreign('reporting_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('systems')->references('id')->on('systems')->onDelete('cascade');
            $table->foreign('areas')->references('id')->on('areas')->onDelete('cascade');
            $table->foreign('types_reports')->references('id')->on('types_reports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
        Schema::dropIfExists('types_reports');
    }
};
