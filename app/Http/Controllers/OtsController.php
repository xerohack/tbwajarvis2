<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Ot;
use App\Item;

use Illuminate\Http\Request;

class OtsController extends Controller
{
    public function index()
    {
        $ots = Ot::orderBy('id', 'DESC')->paginate(20);
        $clientes = Cliente::all();
        /* $ots->each(function($ots){
        $ots->clientes;
        }); */

        return view('ot.index')->with('ots', $ots, 'clientes',$clientes);
    }

    public function create()
    {
        //clientes se llama desde una funcion en app/Services/Cliente
        return view('ot.create');
    }

    public function store(Request $request)
    {
        //dd($request);
        $cliente=Cliente::find($request->cliente_id);

        $data=$request->all();
        $lastid=Ot::create($data)->id;

        if(count($request->nombreitem) > 0)
        {
        foreach($request->nombreitem as $item=>$v)
            {
            $data2=array(
                'ot_id'=>$lastid,
                'nombreitem'=>$request->nombreitem[$item],
                'cantidaditem'=>$request->cantidaditem[$item],
                'valoritem'=>$request->valoritem[$item],
                'detalleitem'=>$request->detalleitem[$item],
                'comentarioitem'=>$request->comentarioitem[$item]
            );
        Item::insert($data2);
            }
        }

        $cliente->save();
        flash('¡OT creada exitosamente!')->success();
        return redirect()->back();
    }

    public function show($id)
    {
/*         $ots = Ot::findOrFail($id);
        return view('ot.show',compact('ots')); */
    }

    public function edit($id)
    {
        $ot = Ot::find($id);
        $ot->cliente;
        $clientes = Cliente::all()->pluck('nombreempresa','id');
        $item = Item::where('ot_id','=',$ot->id)->get();

        return view ('ot.edit')
            ->with('clientes',$clientes)
            ->with('item',$item)
            ->with('ot',$ot);
    }

    public function update(Request $request, $id)
    {
        $ot = Ot::find($id);
        $ot->fill($request->all());
        $ot->save();

        $cliente = Cliente::find($request->cliente_id);
        $cliente->update();

        $cont=0;
        while($cont < count($request->iditem))
        {
            $arrayitem=array(
            'ot_id' => $id,
            'nombreitem' => $request->nombreitem[$cont],
            'cantidaditem' => $request->cantidaditem[$cont],
            'valoritem' => $request->valoritem[$cont],
            'detalleitem' => $request->detalleitem[$cont],
            'comentarioitem' => $request->comentarioitem[$cont]
            );
            //$item->update();
            $newitem = Item::find($request->iditem[$cont]);
            $newitem->fill($arrayitem);
            $newitem->save();

            $cont = $cont + 1;
        }

        flash('¡OT actualizada exitosamente!')->success();
        return redirect()->back();
    }

    public function destroy($id)
    {
        //dd($id);
        $ot = Ot::find($id);
        $ot->condicion='0';
        $ot->update();

        flash('¡OT eliminada exitosamente!')->error();
        return redirect()->back();
    }

    // NUEVA FUNCION PARA LLENAR TABLA ITEM
    public function items($id)
    {
        $item=Item::where('ot_id','=',$id)->get();
        return view('ot.items',compact('item'));
    }

}

