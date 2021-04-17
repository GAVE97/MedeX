<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable =['NombreMrk', 'Ubicacion', 'No_tel', 'email', 'imagenMarca'];
    
    protected $primaryKey = 'NombreMrk';
    
    public $incrementing = false;

    protected $keyType = 'string';

    public function Equipo()
    {
        return $this->hasMany('App\Equipo','Marca');
    }
}
