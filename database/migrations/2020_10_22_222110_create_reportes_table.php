<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();                       
            $table->string('ID_inv');                       //comienzan los datos extraidos del modelo equipos
            $table->foreign('ID_inv')->references('ID_inventario')->on('equipos');
            $table->string('Nombre');
            $table->string('Marca');
            $table->string('Modelo');
            $table->string('Area');
            $table->string('Tipo');
            $table->string('Num_de_serie');
            $table->string('Ubicacion');
            $table->string('Mnto');          //terminan los datos referentes al equipo médico como unidad
            $table->string('tipo_de_servicio');
	        $table->string('origen_del_fallo');
	        $table->string('falla_detectada');
            $table->longText('actividades_realizadas'); 
            $table->string('Materiales');
            $table->string('Artículos_de_limpieza'); 
            $table->string('Equipos_de_medicion'); 
            $table->string('simuladores'); 
            $table->string('Herramienta');
            $table->string('estado_del_servicio');
            $table->string('nombre_Mnto');
            $table->string('servDoneBy');
            $table->string('Acciones');
            $table->longText('Observaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportes');
    }
}
