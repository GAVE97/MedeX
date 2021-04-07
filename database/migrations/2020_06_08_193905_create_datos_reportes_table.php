<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosReportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
/*
|--------------------------------------------------------------------------
| Campos requeridos para las SOLICITUDES
|--------------------------------------------------------------------------
*/

        // Antes de migrar con una clave foranea se iene que crear latabla donde 
        // se hará referencia, por eso creamos aqui la migración de la tabla equipos.
        
        Schema::create('marcas', function (Blueprint $table) {
            $table->string('NombreMrk');
            $table->primary('NombreMrk');
            $table->string('Ubicacion');
            $table->string('No_tel');
            $table->string('email');
            $table->timestamps();
            $table->string('imagenMarca');
        });

        Schema::create('mntos', function (Blueprint $table) {
            $table->string('NombreMnto');
            $table->primary('NombreMnto');
            $table->string('Ubicacion');
            $table->string('No_tel');
            $table->string('email');
            $table->timestamps();
            $table->string('imagenMnto');
        });

        Schema::create('equipos', function (Blueprint $table) {
                    
            $table->string('ID_inventario');
            $table->primary('ID_inventario');
            $table->string('Nombre');
            $table->string('Area');
            $table->string('Tipo');
            $table->string('Marca');
            $table->foreign('Marca')->references('NombreMrk')->on('marcas');
            $table->string('Modelo');
            $table->string('Num_de_serie');
            $table->string('Ubicacion');
            $table->string('Estatus');
            $table->date('vencimientoGarantia'); 
            $table->string('Consumo_electrico');
            $table->string('Mnto');
            $table->foreign('Mnto')->references('NombreMnto')->on('mntos');
            $table->string('porcentUso');
            $table->string('prioridad');
            $table->timestamps();
            $table->string('imagenEquipo');
        });

        Schema::create('solicituds', function (Blueprint $table) {
            $table->id();
            $table->string('ID_inv');
            $table->foreign('ID_inv')->references('ID_inventario')->on('equipos');
            $table->string('Nombre');
            $table->string('Marca');
            $table->string('Modelo');
            $table->string('Area');
            $table->string('Tipo');
            $table->string('Num_de_serie');
            $table->string('Ubicacion');
            $table->string('Mnto');
            $table->longText('Descripcion_del_fallo');
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
        Schema::dropIfExists('marcas');
        Schema::dropIfExists('mntos');
        Schema::dropIfExists('equipos');
        Schema::dropIfExists('solicitudes');
    }
}
