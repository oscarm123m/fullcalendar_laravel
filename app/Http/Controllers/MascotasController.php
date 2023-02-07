<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascotas;
use App\Models\Clientes;
use Session;

class MascotasController extends Controller
{

    public function prueba()
    {
      return view ('prueba');

      
    }

    public function listmascotas()
    {
      $sessionusuario=session('sessionusuario');
      if($sessionusuario=="")
        {
          Session::flash('mensaje',"Inicia ession antes de continuar");
          return redirect()->route('login');
            
        }

      $consulta=Mascotas::join('clientes','mascotas.idclientes','=','clientes.idclientes')
      ->select('mascotas.idmascotas','mascotas.nombre','mascotas.identificador','clientes.nombre as nom','mascotas.tipo','clientes.apellido as ape')
      ->orderBy('mascotas.idmascotas')
      ->get();
      return view('listmascotas')->with('consulta',$consulta);
    }

    public function mensaje()
    {
      return "hola trabajador";
    }

    public function crearmascotas()
    {
      $consulta=Mascotas::orderBy('idmascotas','DESC')->take(1)->get();
      $departamentos=Clientes::orderBy('nombre')->get();
      return view ('crearmascotas')->with('departamentos',$departamentos);

      
    }

    public function guardarmascotas(Request $request)
    {
      $this->validate($request,[
        //'ide'=>'required|numeric',
        //'ide'=>'required|regex:/^[E][M][P][-][0-9]{5}$/',
        //'nombre'=>'required|alpha',
        'nombre'=>'required',
        'identificador'=>'required|alpha_dash',
        'iddue'=>'required|numeric',
        //'celular'=>'required|integer'
        'idmas'=>'required|alpha_dash',
        //'precio'=>'required|regex:/^[0-9]+[.][0-9]{2}$/'
        //'precio'=>'required|regex:/^[0-9]*[.][0-9]{2}$/'
        
      ]);
      $empleados=new Mascotas;
      $empleados->nombre=$request->nombre;
      $empleados->identificador=$request->identificador;
      $empleados->idclientes=$request->iddue;
      $empleados->tipo=$request->idmas;
      $empleados->save();

      /*return view('mensaje')->with('proceso',"Alta de empleados")
                            ->with('mensaje',"El empleado $request->nombre $request->apellido ha sido de alta corectamente")
                            ->with('error',1);*/
      //return "registro guardao";
      Session::flash('mensaje',"La mascota $request->nombre ha sido creada corectamente");
      return redirect()->route('listmascotas');

    }

    
    public function borrarmascotas($ide)
    {
        $empleados=Mascotas::find($ide)->forceDelete();
        /*return view('mensaje')->with('proceso',"Borrar empleados")
                            ->with('mensaje',"El empleado ha sido borrado corectamente")
                            ->with('error',1);*/
        Session::flash('mensaje',"La mascota ha sido borrado corectamente");
        return redirect()->route('listmascotas');
      
    }

    public function actualizarmascotas($ide){
      $consulta=Mascotas::join('clientes','mascotas.idclientes','=','clientes.idclientes')
      ->select('mascotas.idmascotas','mascotas.nombre','mascotas.identificador','clientes.idclientes as idcli','mascotas.tipo','clientes.nombre as nom','clientes.apellido as apel')
      ->where('idmascotas',$ide)
      ->get();
      $clientes=Clientes::orderBy('idclientes')->get();
      return view('actualizarmascotas')->with('consulta',$consulta[0])->with('clientes',$clientes);
    }

    public function guardarcambiomascotas(Request $request){
      $this->validate($request,[
        'nombre'=>'required',
        'identificador'=>'required|alpha_dash',
        'iddue'=>'required|numeric',
        'idmas'=>'required|alpha_dash',
      ]);

      $empleados=Mascotas::find($request->idmascotas);
      $empleados->nombre=$request->nombre;
      $empleados->identificador=$request->identificador;
      $empleados->idclientes=$request->iddue;
      $empleados->tipo=$request->idmas;
      $empleados->save();

      /*return view('mensaje')->with('proceso',"Madificar empleados")
                            ->with('mensaje',"El empleado $request->nombre $request->apellido ha sido modificado corectamente")
                            ->with('error',1);*/
      Session::flash('mensaje',"La mascota $request->nombre  ha sido modificado correctamente");
      return redirect()->route('listmascotas');
    }
}
