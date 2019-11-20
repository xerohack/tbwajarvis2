<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleOt extends Model
{
    protected $table='detalle_ot';
    protected $primaryKey ='id_ot';
    public $timestamps =false;

    protected $fillable = [
        'id_ot',
        'id_item',
        'cantidad_item',
        'valor_item'
    ];

    protected $guarded = [

    ];
}
