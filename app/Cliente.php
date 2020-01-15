<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes';
    protected $primaryKey='id';
    protected $fillable =[
        'nombrecliente',
        'apellidocliente',
        'emailcliente',
        'telefonocliente',
        'areacliente',
        'nombreempresa',
        'rutempresa',
        'giroempresa',
        'direccionempresa',
        'tipouser'

    ];

    public function ots(){
        return $this->hasMany('App\Ot');
    }
}
