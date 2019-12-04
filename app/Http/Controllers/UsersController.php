<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        //$users = User::all();
        $users = User::orderBy('id', 'DESC')->paginate(25);
        //dd($users);
        return view('admin.users.index')->with('users', $users);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        //dd($request);
        $user = new User($request->all());
        //dd($user);
        $user->password = bcrypt($request->password);
        $user->save();
        flash('Usuario creado exitosamente')->success();
        //$users = User::all();
        return redirect()->route('users.index');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->fill($request->all());

        $user->save();
        flash('El usuario '. $user->email .' a sido actualizado exitosamente')->success();
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if($id == Auth::user()->id) {
            flash('El usuario '. $user->email .' no se puede eliminar')->error();
        }
        else{
        $user->delete();
        flash('El usuario '. $user->email .' a sido eliminado exitosamente')->warning();
        }
        //dd($id);
        return redirect()->route('users.index');
    }
}
