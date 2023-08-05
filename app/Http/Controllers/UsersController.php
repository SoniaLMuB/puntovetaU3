<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //Funcion para redirigir a la vista de usuarios
    public function index(){
        $usuarios=User::all();
        return view('users.users',['usuarios'=>$usuarios]);
    }

    //Funcion para la vista del formulario de registro de usuarios
    public function create(){
        return view('users.addUser');
    }

    //Funcion para almacenar usuarios en la base de datos
    public function store(Request $request){
        //Se validan los campos
        $this->validate($request,[
            'nombre'=>'required',
            'lastname'=>'required',
            'username'=>'required|unique:users',
            'password'=>'required',
            'phone'=>'required',
            'email'=>'required|unique:users',
            'role'=>'required',
            'status'=>'required',
            'imagen'=>'required'
        ]);
        //Se añade el registro a la base de datos
        User::create([
            'name'=>$request->nombre,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'username'=>$request->username,
            'role'=>$request->role,
            'status'=>$request->status,
            'phone'=>$request->phone,
            'image'=>$request->imagen
        ]);
        return redirect()->route('users.index')->with('success','El usuario ha sido registrado correctamente');
    }

    //Funcion para ir a la vista de actualizar usuarios
    public function show($id_usuario){
        //Se busca al usuario por el ID
        $usuario=User::find($id_usuario);
        return view('users.editUser',compact('usuario'));
    }

    //Funcion para actualizar usuario
    public function update(Request $request){
        //Se validan los datos de entrada
        $this->validate($request,[
            'nombre'=>'required',
            'lastname'=>'required',
            'username'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'role'=>'required',
            'status'=>'required',
            'imagen'=>'required'
        ]);

        //Se actualizan los registros en las base de datos
        User::where('id',$request->id)->update([
            'name'=>$request->nombre,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'username'=>$request->username,
            'role'=>$request->role,
            'status'=>$request->status,
            'phone'=>$request->phone,
            'image'=>$request->imagen
        ]);

        return redirect()->route('users.index')->with('success','El usuario se ha actualizado correctamente');
    }

    //Funcion para eliminar el usuario
    public function delete($id_usuario){
        $usuario=User::find($id_usuario)->delete();

        return redirect()->route('users.index')->with('success','El usuario se ha eliminado correctamente');
    }
}
