<?php

use Illuminate\Database\Seeder;
use App\Cliente;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create(
            [
                'nombrecliente'=>'Cliente Uno',
                'apellidocliente'=>'Uno',
                'emailcliente'=>'uno@uno.cl',
                'telefonocliente'=>'987654321',
                'areacliente'=>'encargado de uno',
                'nombreempresa'=>'Empresa UNO',
                'rutempresa'=>'18987654-1',
                'giroempresa'=>'prueba',
                'direccionempresa'=>'prueba 123',
            ]
        );

        Cliente::create(
            [
                'nombrecliente'=>'DOS Cliente',
                'apellidocliente'=>'DOS',
                'emailcliente'=>'dos@dos.cl',
                'telefonocliente'=>'987654321',
                'areacliente'=>'encargado de dos',
                'nombreempresa'=>'Empresa DOS',
                'rutempresa'=>'17987654-1',
                'giroempresa'=>'giro empresa dos',
                'direccionempresa'=>'direccion 321',
            ]
        );

        Cliente::create(
            [
                'nombrecliente'=>'TERCER Cliente',
                'apellidocliente'=>'Tres',
                'emailcliente'=>'3tr@ts.cl',
                'telefonocliente'=>'998654321',
                'areacliente'=>'encargado de 3',
                'nombreempresa'=>'TERCERA empresa',
                'rutempresa'=>'15987654-1',
                'giroempresa'=>'giro empresa 3',
                'direccionempresa'=>'direccion #9876',
            ]
        );
    }
}
