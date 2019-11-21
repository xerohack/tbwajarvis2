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
        //$clientes = User::all();
        $ots = Ot::orderBy('id_ot', 'DESC')->paginate(25);
        //$ots = Ot::all();
        //dd($clientes);
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
        $lastid=Ot::create($data)->id_ot;

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

    public function show($id_ot)
    {
        $ot = Ot::findOrFail($id_ot);
        return view('ot.show',compact('ot'));
    }

    public function edit($id_ot)
    {
        $ot = Ot::find($id_ot);
        $clientex = Cliente::where('id_cliente','=',$ot->cliente_id)->get();
        $clientez = $ot->clientes()->where('id_cliente', $ot->cliente_id)->exists();

        $cliente = Cliente::find($ot->cliente_id)->pluck('nombreempresa');
        //dd($ot,$clientex,$cliente);
        $item=Item::where('ot_id','=',$id_ot)->get();
        //$item = $ot->items()->where('caca', $ot->cliente_id)->get();
        //$item = Item::find($ot_id->);

        //dd($ot,$cliente,$item);
        //$item=Item::where('ot_id','=',$id_ot)->get();
        //$cliente = Cliente::where('id_cliente','=',$ot->cliente_id)->get();
        //dd($cliente);
        //return view('ot.edit')->with('ot', $ot);
        return view('ot.edit')->with(compact('ot','cliente','item','clientex'));
    }

    public function update(Request $request, $id_ot )
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

        $ot = Ot::findOrFail($id_ot);
        $ot->fill($request->all());
        $ot->save();

        $data=$request->all();
        $lastid=Ot::create($data)->id_ot;

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

    public function destroy($id_ot)
    {
        $ot = Ot::find($id_ot);
        $ot->condicion='0';
        $ot->update();
        //$ot->delete();

        return redirect()->back()->with('delete','OT eliminada');
    }

    // NUEVA FUNCION PARA LLENAR TABLA ITEM
    public function items($id_ot)
    {
        $item=Item::where('ot_id','=',$id_ot)->get();
        return view('ot.items',compact('item'));
    }

}
