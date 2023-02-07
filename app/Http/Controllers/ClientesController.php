<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\Mascotas;
use Session;

class ClientesController extends Controller
{
    public function listclientes()
    {
      //$consulta=Personas::orderBy('idpersona','DESC')->take(1)->get();
      //return view ('listpersonas');

      $consulta=Clientes::select('idclientes','nombre','apellido','documento','celular','email')
      ->orderBy('idclientes')
      ->get();
      return view('listclientes')->with('consulta',$consulta);

      
    }
    public function crearclientes()
    {
      return view ('crearclientes');

      
    }

    public function guardarclientes(Request $request)
    {
      $this->validate($request,[
        //'ide'=>'required|numeric',
        //'ide'=>'required|regex:/^[E][M][P][-][0-9]{5}$/',
        //'nombre'=>'required|alpha',
        'nombre'=>'required|regex:/^[A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
        'apellido'=>'required|regex:/^[A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
        'email'=>'required|email',
        'documento'=>'required|regex:/^[0-9]{10}$/',
        'celular'=>'required|regex:/^[0-9]{10}$/',
        //'precio'=>'required|regex:/^[0-9]+[.][0-9]{2}$/'
        //'precio'=>'required|regex:/^[0-9]*[.][0-9]{2}$/'
        
      ]);

      $Personas=new Clientes;
      $Personas->nombre=$request->nombre;
      $Personas->apellido=$request->apellido;
      $Personas->documento=$request->documento;
      $Personas->email=$request->email;
      $Personas->celular=$request->celular;
      
      $Personas->save();

    
      Session::flash('mensaje',"El cliente ha sido guardado corectamente");
      return redirect()->route('listclientes');

    }
    public function mensaje()
    {
      return "hola bienvenido";
    }

    public function borrarclientes($idp)
    {
        //----------------
        $buscarempleado=Mascotas::where('idclientes',$idp)->get();
      $cuantos=count($buscarempleado);
      if($cuantos==0)
      {
        $empleados=Clientes::find($idp)->forceDelete();
        /*return view('mensaje')->with('proceso',"Borrar empleados")
                            ->with('mensaje',"El empleado ha sido borrado corectamente")
                            ->with('error',1);*/
        Session::flash('mensaje',"La cliente ha sido borrado corectamente");
        return redirect()->route('listclientes');
      }else{
        /*return view('mensaje')->with('proceso',"Borrar empleados")
                            ->with('mensaje',"El empleado No se puede eliminar por que tiene otros datos asociados")
                            ->with('error',0);*/
        Session::flash('mensaje',"El cliente No se puede eliminar por que tiene otros datos asociados");
        return redirect()->route('listclientes');
      }
       
    }

    public function actualizarclientes($idp){
        $consulta=Clientes::select('idclientes','nombre','apellido','documento','email','celular')
        ->where('idclientes',$idp)
        ->get();
        //$departamentos=departamentos::orderBy('nombre')->get();
        return view('actualizarclientes')->with('consulta',$consulta[0]);
      }

      public function guardarcambioclientes(Request $request){
        $this->validate($request,[
            'nombre'=>'required|regex:/^[A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
            'apellido'=>'required|regex:/^[A-Z,a-z, ,á,é,í,ó,ú,ü]+$/',
            'email'=>'required|email',
            'documento'=>'required|regex:/^[0-9]{10}$/',
            'celular'=>'required|regex:/^[0-9]{10}$/',
        ]);
  
        $empleados=Clientes::find($request->idclientes);
        $empleados->nombre=$request->nombre;
        $empleados->apellido=$request->apellido;
        $empleados->email=$request->email;
        $empleados->celular=$request->celular;
        $empleados->documento=$request->documento;
        
        $empleados->save();
  
        /*return view('mensaje')->with('proceso',"Madificar empleados")
                              ->with('mensaje',"El empleado $request->nombre $request->apellido ha sido modificado corectamente")
                              ->with('error',1);*/
        Session::flash('mensaje',"El cliente $request->nombre $request->apellido ha sido modificado correctamente");
        return redirect()->route('listclientes');
      }
}
