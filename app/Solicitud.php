<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
   
    public function Equipo()
    {
        return $this->belongsTo('App\Equipo','ID_inventario');
    }
}
