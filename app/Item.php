<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table='items';
    protected $primaryKey ='id';
    protected $fillable = [
    'ot_id',
    'nombreitem',
    'cantidaditem',
    'valoritem',
    'detalleitem',
    'comentarioitem'
    ];

    public function ot(){
        return $this->belongsTo('App\Ot');
    }

}
