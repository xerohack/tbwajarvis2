<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
//use Illuminate\Http\Response;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderBy('id', 'DESC')->paginate(25);
        //dd($clientes);
        return view('admin.clientes.index')->with('clientes', $clientes);
    }

    public function create()
    {
        //$clientes = Cliente::all()->pluck('nombrecliente');
        //return view('ot.create')->with('cliente',$clientes);
        return view('cliente.create');
    }

    public function store(Request $request)
    {
        //dd($request);
        $cliente = new Cliente($request->all());
        //dd($user);
        $cliente->save();
        flash('Cliente creado exitosamente')->success();
        //$users = User::all();
        return redirect()->route('ots.create');
    }

    public function show(Cliente $id)
    {
        //
    }

    public function edit(Cliente $id)
    {
        $cliente = Cliente::find($id);
        return view('admin.clientes.edit')->with('cliente', $cliente);
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);

        $cliente->fill($request->all());

        $cliente->save();
        flash('El cliente '. $cliente->nombrecliente .' a sido actualizado exitosamente')->success();
        return redirect()->route('clientes.index');
    }

    public function destroy(Cliente $id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        flash('El cliente '. $cliente->nombrecliente .' a sido eliminado exitosamente')->warning();
        //dd($id);
        return redirect()->route('clientes.index');
    }
}
