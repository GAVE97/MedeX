<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mnto extends Model
{
    protected $fillable = ['NombreMnto', 'Ubicacion', 'No_tel', 'email', 'imagenMnto'];
    
    protected $primaryKey = 'NombreMnto';
    
    public $incrementing = false;

    protected $keyType = 'string';

    public function Equipo()
    {
        return $this->hasMany('App\Equipo','Mnto');
    }
}
