<?php

namespace sigespi\Http\Controllers;

use Illuminate\Http\Request;

use sigespi\User;

use sigespi\Protocolo;

use sigespi\Ciclo;

use DB;

use Alert;

use Auth;

class CoordinadorController extends Controller
{
    function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        return view('coordinador.index');
    }
    
    //Para activar la cuenta de los usuarios!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public function validarAsignarUsuarios()
    {
        /*$docentes = User::where('activo', 0)->where('plantel_id', Auth::user()->id)->get();*/
        $docentes = User::all();
        $noactivos = User::where('activo', '=', 0)->get();
        /*Para pasar solo los coordinadores de carrera y asi poder ocultar el boton de 'asignar' cuando esten todos los coordinadores asignados*/
        $coordinadores_carr = User::where('rol', '=', 2)->get();

        return view('coordinador.validarAsignarUsuarios', compact('docentes', 'noactivos', 'coordinadores_carr'));
    }
 /*Datos para activar la cuenta de los usuarios(docentes) en el sistema*/
    public function formvalidarAsignarUsuarios(Request $request, $id)
    {
        DB::table('users')->where('id', $id)->update([
            'activo' => $request->input('activo')]);
        
        Alert::success('El docente ha sido dado de alta en el sistema', 'Docente activado!');
        return redirect()->route('validarAsignarUsuarios');
    }
    
   //Para asignar a los coordinadores de carrera!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public function asignarCoordinadorCarrera($id)
    {
        $docente = User::findOrFail($id);
        return view('coordinador.asignarCoordinadorCarrera', compact('docente'));
    }
    
    public function formAsignarCoordinadorCarrera(Request $request, $id)
    {
      /*Variable que recoge el valor del campo c_carr que tiene el usuario actualmente autentificado, este valor puede ser A, B, C o D*/
        $c_carr = $request->input('c_carr');

        /* Variable que recoge los valores de los roles que ahora tendrá en este caso los roles son ‘2 y 4’ */
        $roles = implode(',', $request->input('rol'));
        
         /* Si el valor que llegue del formulario esta vacio, manda un mensaje de alerta */
        if ($c_carr == null) 
        {
            return redirect()->back()->with('info', 'Elige una carrera');
        }

        DB::table('users')->where('id', $id)->update(['c_carr' => $c_carr, 'rol' => $roles]);
        if ($c_carr == 'A') 
        {
        
        Alert::success('Ahora es Coordinador de la carrera Ing. Mecánico Electricista ', 'Coordinador de Carrera asignado');
        }

        elseif ($c_carr == 'B') 
        {
            Alert::success('Ahora es Coordinador de la carrera Ing. en Tecnologías Electrónicas ', 'Coordinador de Carrera asignado');
        }

        elseif ($c_carr == 'C') 
        {
            Alert::success('Ahora es Coordinador de la carrera Ing. en Mecatrónica ', 'Coordinador de Carrera asignado');
        }

        elseif ($c_carr == 'D') 
        {
            Alert::success('Ahora es Coordinador de la carrera Ing. en Sistemas Computacionales ', 'Coordinador de Carrera asignado');
        }

        return redirect()->route('validarAsignarUsuarios');
    }

    //Para dar de baja o reasignar coordinadores de carrrera!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public function darBajaReasignarCoordinadorCarrera()
    { 
        $docentes = User::orderBy('c_carr', 'ASC')->get();

        $coordinadores_carr = User::where('rol', '=', 2)->get();
/*
        if (count($coordinadores_carr) === 0) 
        {
            return "No hay coordinadores";
        }

        else
        {
            return "Hay al menos uno";
        }
*/
        return view('coordinador.darBajaReasignarCoordinadorCarrera', compact('docentes', 'coordinadores_carr'));
    }

    public function bajaDocenteForm(Request $request, $id)
    {
        DB::table('users')->where('id', $id)->update(['activo' => $request->input('activo')]);
        
        Alert::success('Para darlo de alta de nuevo, ir a la sección "Activar y Asignar"', 'Docente dado de baja');

        return redirect()->route('darBajaReasignarCoordinadorCarrera');
    }

    //Alta de tutores!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    public function altaTutores()
    {
        $docentes = User::orderBy('c_carr', 'ASC')->get();
        $tutores = User::orderBy('t_semestre', 'ASC')->get();
        
        /*Para verificar verificar si hay coordinadores de carrera dados de alta y que esten activados*/
        $coordinadores_carr = User::where('rol', '=', 2)->get();

    /*    if (count($coordinadores_carr) === 0) 
        {
            return "No hay";
        }

        elseif (count($coordinadores_carr) === 4) 
        {
            return "Estan todos los coordin de carrera";
        }
        else
        {
            return "Si hay";
        }*/

        return view('coordinador.altaTutores', compact('docentes', 'tutores', 'coordinadores_carr'));
    }

    public function asignarTutores($id)
    {
        $cc = User::findOrFail($id);
        //$tutores = User::all();
        //Para pasar todos los tutores menos el cc elegido
        $tutores = User::where('id', '!=', $id)->get();
        $ciclo = Ciclo::where('activo', '=', 1)->first();
        
        /*Condicion (mensaje) por si no se ha agregado un ciclo escolar*/
        if ($ciclo === null) 
        {
            Alert::info('No hay ciclos en el sistemas, pongase en contacto con el administrador', 'No hay ciclo');
            return redirect()->back();
        }
        return view('coordinador.asignarTutores', compact('tutores', 'cc', 'ciclo'));
    }

    public function asignarTutoresForm(Request $request, $id)
    {
        //dd($request->all());

        $roles = implode(',', $request->input('rol'));
        $t_semestre = $request->input('t_semestre');
        $t_proy = $request->input('t_proy');

        DB::table('users')->where('id', $id)->update(['t_proy' => $t_proy, 'rol' => $roles, 't_semestre' => $t_semestre]);
        

        Alert::success('Fué asignado como tutor de proyecto', 'Tutor asignado');

        return redirect()->route('altaTutores');
    }

    //Ver Protocolos!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    public function verProtocolos()
    {
        $protocolos = Protocolo::all();

        return view('coordinador.verProtocolos', compact('protocolos'));
    }

    public function verProtocoloCoordinador($id)
    {
        $protocolo = Protocolo::findOrFail($id);

        return view('coordinador.verProtocolo', compact('protocolo'));
    }

    public function aceptarProtocolo(Request $request, $id)
    {

        $aceptado = $request->input('aceptado');

        DB::table('protocolos')->where('id', $id)->update(['aceptado' => $aceptado]);

        Alert::success('Protocolo dado aceptado exitosamente', 'Protocolo aceptado');
       return redirect()->route('verProtocolosCoordinador');
    }

    public function bajaProtocolos()
    {   
        $protocolos = Protocolo::all();

        return view('coordinador.bajaProtocolos', compact('protocolos'));
    }

    public function datosProtocolosBaja(Request $request, $id)
    {
        //dd($id);
        $activo = $request->input('activo');
        DB::table('protocolos')->where('id', $id)->update(['activo' => $activo]);
        Alert::success('Protocolo dado de baja exitosamente', 'Baja Exitosa');
       return redirect()->route('bajaProtocolosCoordinador');
    }

    public function eliminarProtocolos()
    {
        $protocolos = Protocolo::all();

        return view('coordinador.eliminarProtocolos', compact('protocolos'));
    }

    public function datosEliminarProtocolo(Request $request, $id)
    {
        DB::table('protocolos')->where('id', $id)->delete();
        Alert::success('Protocolo eliminado exitosamente', 'Eliminación Exitosa!');
       return redirect()->route('eliminarProtocolos');

    }
}
