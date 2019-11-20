<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table='items';
    protected $primaryKey ='id_item';
    protected $fillable = [
    'ot_id',
    'nombreitem',
    'cantidaditem',
    'valoritem',
    'detalleitem'
    ];

    public function ot(){
        return $this->belongsTo('App\Ot');
    }

}
