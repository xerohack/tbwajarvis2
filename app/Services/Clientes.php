<?php
namespace App\Services;
use App\Cliente;

class Clientes
{
    public function get()
    {
        $clientes = Cliente::get();
        $clientesArray[''] = 'Seleccione';
        foreach ($clientes as $cliente) {
            $clientesArray[$cliente->id] = $cliente->nombreempresa;
        }
        return $clientesArray;
    }
}
