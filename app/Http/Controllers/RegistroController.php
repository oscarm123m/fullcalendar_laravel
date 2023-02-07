<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Users;
use Session;

class RegistroController extends Controller
{
    public function registrardatos(Request $request)
    {
      $this->validate($request,[
        //'ide'=>'required|numeric',
        //'ide'=>'required|regex:/^[E][M][P][-][0-9]{5}$/',
        //'nombre'=>'required|alpha',
        'nombre'=>'required|regex:/^[A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
        //'apellido'=>'required|regex:/^[A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
        'email'=>'required|email',
        //'celular'=>'required|integer'
        'password'=>'required',
        'passwordrepetir'=>'required',
        //'celular'=>'required|regex:/^[0-9]{10}$/',
        //'precio'=>'required|regex:/^[0-9]+[.][0-9]{2}$/'
        //'precio'=>'required|regex:/^[0-9]*[.][0-9]{2}$/'
        
      ]);
      $pass1= $request->password;
      $pass2= $request->passwordrepetir;
      if ($pass1==$pass2) {
        $passwordEncriptado=Hash::make($request->password);
        $Personas=new Users;
        $Personas->name=$request->nombre;
        $Personas->email=$request->email;
        $Personas->password=$passwordEncriptado;
        
        $Personas->save();

      
        Session::flash('mensaje',"El usuario ha sido guardado corectamente");
        return redirect()->route('login');
      } else {
        Session::flash('mensaje',"ERROR AL GUARDAR");
        return redirect()->route('registro');
      }
      

      

    }
}
