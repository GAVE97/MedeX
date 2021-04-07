<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $fillable = ['ID_inventario', 'Nombre', 'Area', 'Tipo', 'Marca', 'Modelo','Num_de_serie', 'Ubicacion', 'Estatus', 'vencimientoGarantia',
    'Consumo_electrico', 'Mnto', 'imagenEquipo'];
    
    protected $primaryKey = 'ID_inventario';
    
    public $incrementing = false;

    protected $keyType = 'string';

    public function Solicitud()
    {
        return $this->hasMany('App\Solicitud','ID_inv');
    }

    public function Reporte()
    {
        return $this->hasMany('App\Reporte','ID_inv');
    }

    public function Bitacora()
    {
        return $this->hasMany('App\Bitacora','Equipo');
    }

    public function Marca()
    {
        return $this->belongsTo('App\Marca','NombreMrk');
    }

    public function Mnto()
    {
        return $this->belongsTo('App\Mnto','NombreMnto');
    }
}
