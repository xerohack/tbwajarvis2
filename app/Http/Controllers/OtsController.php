<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Ot;
use App\Item;

use Illuminate\Http\Request;

use Validator;


class OtsController extends Controller
{
    public function index()
    {
        $ots = Ot::orderBy('id', 'DESC')->paginate(5);
        $ots->each(function($ots){
            $ots->clientes;
            $ots->items;
        });
        dd($ots);
        //return view('courses')->with('ots', $ots);


        return view('ot.index')->with('ots', $ots);
    }

    public function create()
    {
        $clientes = Cliente::all()->pluck('nombreempresa');

        return view('ot.create')->with('cliente',$clientes);
    }

    public function store(Request $request)
    {
        //return $request;
        //dd($request);
        $cliente=Cliente::find($request->cliente_id);

        $data=$request->all();
        $lastid=Ot::create($data)->id;

        if(count($request->nombreitem) > 0)
        {
        foreach($request->nombreitem as $item=>$v){
            $data2=array(
                'ot_id'=>$lastid,
                'nombreitem'=>$request->nombreitem[$item],
                'cantidaditem'=>$request->cantidaditem[$item],
                'valoritem'=>$request->valoritem[$item],
                'detalleitem'=>$request->detalleitem[$item]
            );
        Item::insert($data2);
      }
        }
        return redirect()->back()->with('success','¡OT creada exitosamente!');
    }

    public function show($id)
    {
        $ot = Ot::findOrFail($id);
        return view('ot.show',compact('ot'));
    }

    public function edit($id)
    {
        $ot = Ot::find($id);
        $clientex = Cliente::where('id','=',$ot->cliente_id)->get();
        $clientez = $ot->clientes()->where('id', $ot->cliente_id)->exists();

        $cliente = Cliente::find($ot->cliente_id)->pluck('nombreempresa');
        //dd($ot,$clientex,$cliente);
        $item=Item::where('ot_id','=',$id)->get();
        //$item = $ot->items()->where('caca', $ot->cliente_id)->get();
        //$item = Item::find($ot_id->);

        //dd($ot,$cliente,$item);
        //$item=Item::where('ot_id','=',$id_ot)->get();
        //$cliente = Cliente::where('id_cliente','=',$ot->cliente_id)->get();
        //dd($cliente);
        //return view('ot.edit')->with('ot', $ot);
        return view('ot.edit')->with(compact('ot','cliente','item','clientex'));
    }

    public function update(Request $request, $id )
    {
        //dd($request,$id_ot);
/*         $item = Item::find($request->item_id);
        $item->fill($request->all());
        $item->save();

        $ot = Ot::find($id_ot);
        $ot->fill($request->all());
        $ot->save();

        $cliente = Cliente::find($request->cliente_id);
        $cliente->fill($request->all());
        $cliente->save();

        return redirect()->route('ot.index')->with('update','Edición Exitosa'); */

        //--------------------------------------------------//

        $cliente=Cliente::findOrFail($request->cliente_id);
        $cliente->fill($request->all());
        $cliente->save();

        $ot = Ot::findOrFail($id);
        $ot->fill($request->all());
        $ot->save();

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
                    'detalleitem'=>$request->detalleitem[$item]
                );
            Item::insert($data2);
            }
        }

        return redirect()->back()->with('success','¡OT creada exitosamente!');

    }

    public function destroy($id)
    {
        $ot = Ot::find($id);
        $ot->condicion='0';
        $ot->update();
        //$ot->delete();

        return redirect()->back()->with('delete','OT eliminada');
    }

    // NUEVA FUNCION PARA LLENAR TABLA ITEM
    public function items($id)
    {
        $item=Item::where('ot_id','=',$id)->get();
        return view('ot.items',compact('item'));
    }

}
