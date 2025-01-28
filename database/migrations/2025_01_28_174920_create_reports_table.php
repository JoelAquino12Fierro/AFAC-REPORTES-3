<?php

use App\Models\types_report;
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
        Schema::create('types_reports', function (Blueprint $table) {
            $table->id();
            $table->string('name_types_reports');
            $table->timestamps();
        });

        

        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('folio')->unique(); //Folio
            $table->date('application_date'); //Fecha creación
            $table->unsignedBigInteger('areas'); //Area
            $table->unsignedBigInteger('systems'); //Sistema
            $table->unsignedBigInteger('types_reports'); //Tipo
            $table->unsignedBigInteger('reporting_user'); //usuario
            $table->text('description');
            $table->string('evidence')->nullable(); //string de la ruta de la imagen
            $table->date('report_date'); //Fecha del reporte (generacion)
            
            // Segunda parte del reporte
            $table->unsignedBigInteger('modules_systems')->nullable(); //Relacion de la llave forane de modulos
            $table->string('descriptionA')->nullable();
            $table->string('evidenceA')->nullable();
            $table->unsignedBigInteger('responsibles')->nullable(); //Responsable (Puede ser o no un usuario)
            $table->boolean('status')->default('0'); // Estatus que por defecto se asigna 0 
            $table->timestamps();

            // Llaves foranes
            $table->foreign('reporting_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('systems')->references('id')->on('systems')->onDelete('cascade');
            $table->foreign('areas')->references('id')->on('areas')->onDelete('cascade');
            $table->foreign('types_reports')->references('id')->on('types_reports')->onDelete('cascade');
            $table->foreign('modules_systems')->references('systems')->on('modules_systems')->onDelete('cascade');
            $table->foreign('responsibles')->references('users')->on('responsibles')->onDelete('cascade'); //Relacion con los responsables
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
