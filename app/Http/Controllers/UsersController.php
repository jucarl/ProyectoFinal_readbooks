<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Libro;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autores = User::all();
        if (Auth::user()->is_admin == 1)
            return view('Admin.indiceUsers', compact('autores'));
        else
            return view('user.autores', compact('autores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.nuevoUsuario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        if(request('is_admin') == 'on')
            $admin = 1;
        else
            $admin = 0;

        $user = new user;
        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->is_admin = $admin;

        $user->save();

        return redirect('/autores')->with('success', 'Usuario Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $autor, $id)
    {
        $librosautor = User::find($id);//->toSql();
        //dd($id,$librosautor);
        return view('user.autor',compact('librosautor','autor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,$id)
    {
        $user = User::find($id);
        return view('Admin.nuevoUsuario',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user,$id)
    {
        $user = User::find($id);
        
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'same:password_confirmation'
        ]);
        
        if(request('is_admin')== null)
            $user->is_admin = False;
            
        else
            $user->is_admin = True;


        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));

        $user->save();

        return redirect('/autores')->with('success', 'Usuario Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('info', 'Usuario Eliminado');
    }
}
