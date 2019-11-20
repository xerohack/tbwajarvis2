<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\User;
use App\Ot;
use App\Item;
use Carbon\Carbon;

use Illuminate\Http\Request;


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

    public function show($id)
    {
        //
    }

    public function edit($id_ot)
    {
        $ot = Ot::find($id_ot);
        return view('ots.edit')->with('ot', $ot);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

}
