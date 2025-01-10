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
        Schema::create('reporte', function (Blueprint $table) {
            $table->id();
            $table->string('folio')->unique();
            $table->date('application_date');
            $table->date('report_date');
            $table->string('area');
            $table->string('system');
            $table->string('type_report');
            $table->unsignedBigInteger('reporting_user');
            $table->string('actions');
            $table->text('description')->nullable();
            $table->string('evidence')->nullable(); //string de la ruta de la imagen
            $table->timestamps();

            $table->foreign('reporting_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reporte');
    }
};
