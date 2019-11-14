<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable =[
        'nombrecliente',
        'apellidocliente',
        'emailcliente',
        'telefonocliente',
        'areacliente',
        'nombreempresa',
        'rutempresa',
        'giroempresa',
        'direccionempresa'
    ];
    protected $guarded =[
    ];
}
