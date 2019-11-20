<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ot extends Model
{
    protected $table='ots';
    protected $primaryKey ='id_ot';
    protected $fillable = [
        'cliente_id',
        'tema',
        'campana',
        'departamento',
        'ejecutivores',
        'fechaentrega',
        'tipotrabajo',
        'notificarcorreo',
        'url',
        'file_archivo',
        'total',
        'estado'
    ];

    protected $guarded = [

    ];

    public function clientes()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function items()
    {
        return $this->hasMany('App\Item');
    }


    /*
    public function detalleot()
    {
        return $this->belongsTo('App\DetalleOt');
    }
    */


}
