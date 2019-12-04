<?php

namespace App\Http\Controllers;

use App\Oc;
use Illuminate\Http\Request;

class OcController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('oc.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Oc $oc)
    {
        //
    }

    public function edit(Oc $oc)
    {
        //
    }

    public function update(Request $request, Oc $oc)
    {
        //
    }

    public function destroy(Oc $oc)
    {
        //
    }
}
