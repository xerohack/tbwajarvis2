<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create(
            [
                'rut' => '11.111.111-1',
                'nombre' => 'admin',
                'apellido' => 'admin2',
                'area' => 'administracion',
                'cargo' => 'administrador',
                'rol' => 'usuario-admin',
                'email' => 'admin@tbwa.cl',
                'password' => bcrypt('12341234'),
            ]
        );

        /* DB::table('users')->insert([
            'rut' => '11111111-1',
            'nombre' => 'admin',
            'apellido' => 'admin2',
            'cargo' => 'administrador',
            'rol' => 'usuario-admin',
            'email' => 'admin@tbwa.cl',
            'password' => bcrypt('12341234'),
        ]); */
        /* DB::table('users')->insert([
            'nombre' => 'francisco',
            'email' => 'francisco@bbrave.cl',
            'password' => bcrypt('francisco1234'),
        ]); */
    }
}
