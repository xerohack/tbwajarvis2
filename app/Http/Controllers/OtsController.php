<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\User;
use App\Ot;
use Illuminate\Http\Request;

class OtsController extends Controller
{
    public function index()
    {
        //$clientes = User::all();
        $ots = Ot::orderBy('id', 'DESC')->paginate(25);
        //dd($clientes);
        return view('ot.index')->with('ots', $ots);
    }

    public function create()
    {
        //$clientes = User::all()->where('rol', 'cliente')->pluck('nombre');
        $clientes = Cliente::all()->pluck('nombrecliente');
        return view('ot.create')->with('cliente',$clientes);
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
