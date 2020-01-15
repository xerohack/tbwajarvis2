<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ot extends Model
{
    protected $table='ots';
    protected $primaryKey ='id';
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
        'comentariot',
        'facturable',
        'total',
        'estado',
        'condicion'
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function item()
    {
        return $this->hasMany('App\Item');
    }

}
