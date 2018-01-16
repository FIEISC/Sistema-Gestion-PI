<?php

namespace sigespi\Http\Controllers;

use Illuminate\Http\Request;

use sigespi\Protocolo;

use sigespi\User;

use sigespi\Equipo;

use sigespi\Alumno;

use Alert;

use Auth;

class DocenteController extends Controller
{
	function __contruct()
	{
		return $this->middleware('auth');
	}
	
    public function index()
    {
    	return view('docente.index');
    }

    public function protocolosAsignados()
    {
    	$protocolos = Protocolo::all();
    	$docentes = User::all();

    	return view('docente.protocolosAsignados', compact('protocolos', 'docentes'));
    }

    public function verProtocoloDocente($id)
    {
        $protocolo = Protocolo::findOrFail($id);
        return view('docente.verProtocolo', compact('protocolo'));
    }

    public function editarProtocolo($id)
    {
        $protocolo = Protocolo::findOrFail($id);
        return view('docente.editarProtocolo', compact('protocolo'));
    }

    public function datosEditarProtocolo(Request $request, $id)
    {
        Protocolo::findOrFail($id)->update($request->all());
        Alert::success('El protocolo ha sido editado y todos podrán ver los cambios', 'Protocolo Editado');

        return redirect()->route('protocolosAsignados');
    }

    public function infoDocenteProtocolo($id)
    {
        
        //Se pasa el nombre del tutor de proyecto(se pasa una funcion tutorProyecto en el modelo Protocolo que se usa en la vista)
        $protocolo = Protocolo::where('id', '=', $id)->first();

        /*El id que se pasa como parametro es el id del protocolo*/
        $equipo = Equipo::where('user_id', '=', Auth::user()->id)->where('protocolo_id', '=', $id)->first();

        if ($equipo === null) 
        {
            Alert::warning('No estas asignado a un equipo de trabajo', 'No asignado');
            return redirect()->back();
        }

        $alumnos = Alumno::where('equipo_id', '=', $equipo->id)->get();

        return view('docente.infoDocenteProtocolo', compact('equipo', 'alumnos', 'protocolo'));
    }
}


/*    public function infoDocenteProtocolo($id)
    {
        $protocolo = Protocolo::findOrFail($id);

        $equipo = Equipo::where('user_id', '=', Auth::user()->id)->first();

        $alumnos = Alumno::all();

        dd($alumnos);
        return view('docente.infoDocenteProtocolo', compact('protocolo', 'equipo', 'alumnos'));
    }*/