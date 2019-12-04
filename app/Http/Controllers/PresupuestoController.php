<?php

namespace App\Http\Controllers;

use App\Presupuesto;
use Illuminate\Http\Request;

class PresupuestoController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('presupuesto.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Presupuesto $presupuesto)
    {
        //
    }

    public function edit(Presupuesto $presupuesto)
    {
        //
    }

    public function update(Request $request, Presupuesto $presupuesto)
    {
        //
    }

    public function destroy(Presupuesto $presupuesto)
    {
        //
    }
}
