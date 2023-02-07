<?php

namespace App\Http\Controllers;
use App\Models\Mascotas;
use App\Models\Citas;
use Session;

use Illuminate\Http\Request;

class CitasController extends Controller
{
    /*public function calendario()
    {
      //return view ('calendario');
      $mascotas=Mascotas::orderBy('nombre')->get();
      return view ('calendario')->with('mascotas',$mascotas);
      
    }*/

    public function listcitas()
    {
      //$consulta=Personas::orderBy('idpersona','DESC')->take(1)->get();
      //return view ('listpersonas');

      $consulta=Citas::join('mascotas','citas.idmascotas','=','mascotas.idmascotas')
      ->select('citas.idcitas','citas.start','citas.end','mascotas.nombre as nom')
      ->orderBy('citas.idcitas')
      ->get();
      return view('listcitas')->with('consulta',$consulta); 
    }

    public function crearcitas()
    {
      $consulta=Citas::orderBy('idcitas','DESC')->take(1)->get();
      $mascotas=Mascotas::orderBy('nombre')->get();
      return view ('crearcitas')->with('mascotas',$mascotas);
    }

    /*public function byProject($id){
      return Level::where('project_id',$id)->get();
    }*/
    public function end($region)
  {   
      return Citas::where('start', $region)->get();
  }
  public function borrarcitas($idp)
    {
        $empleados=Citas::find($idp)->forceDelete();
        /*return view('mensaje')->with('proceso',"Borrar empleados")
                            ->with('mensaje',"El empleado ha sido borrado corectamente")
                            ->with('error',1);*/
        Session::flash('mensaje',"La cita ha sido borrada corectamente");
        return redirect()->route('listcitas');
      
    }

    public function guardarcitas(Request $request)
    {
      $this->validate($request,[
        'idmascotas'=>'required',
        'start'=>'required',
        'end'=>'required',
        
      ]);

      $Personas=new Citas;
      $Personas->start=$request->start;
      $Personas->end=$request->end;
      $Personas->idmascotas=$request->idmascotas;
      
      $Personas->save();

    
      Session::flash('mensaje',"La cita ha sido guardada corectamente");
      return redirect()->route('listcitas');

    }

    public function actualizarcitas($idp){
      $consulta=Citas::join('mascotas','citas.idmascotas','=','mascotas.idmascotas')
      ->select('citas.idcitas','citas.start','citas.end','citas.nombre as nom')
      ->where('idcitas',$idp)
      ->get();
      $mascotas=Mascotas::orderBy('idmascotas')->get();
      return view('actualizarcitas')->with('consulta',$consulta[0])->with('mascotas',$mascotas);
    }

    /*public function calendario()
    {
      //return view ('calendario');
      $mascotas=Mascotas::orderBy('nombre')->get();
      return view ('calendario')->with('mascotas',$mascotas);
      
    }*/
    public function store1(Request $request)
    {
      //return view ('calendario');
      $this->validate($request,[
        'start'=>'required',
        'end'=>'required',
        'idmascotas'=>'required',
        
      ]);
      $empleados=new Citas;
      $empleados->start=$request->start;
      $empleados->end=$request->end;
      $empleados->idmascotas=$request->idmascotas;
      $empleados->save();
      
    }

    public function show1(Citas $citas){
        $citas=Citas::all();
        return response()->json($citas);
    }
    public function index(Request $request)
    {
  
        if($request->ajax()) {
       
             $data = Citas::whereDate('start', '>=', $request->start)
                       ->whereTime('end',   '<=', $request->end)
                       ->get(['idcitas', 'idmascotas', 'start', 'end']);
  
             return response()->json($data);
        }
  
        return view('calendario');
    }
    

    
}
