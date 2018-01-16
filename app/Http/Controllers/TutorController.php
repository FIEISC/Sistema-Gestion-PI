<?php

namespace sigespi\Http\Controllers;

use Illuminate\Http\Request;

use sigespi\Notifications\MensajeEnviado;

use sigespi\Ciclo;

use sigespi\Carrera;

use sigespi\Protocolo;

use sigespi\User;

use sigespi\Equipo;

use sigespi\Alumno;

use sigespi\Mensaje;

use Alert;

use Auth;

use DB;

class TutorController extends Controller
{
  function __construct()
  {
    return $this->middleware('auth');
  }
  
    public function index()
    {
      return view('tutor.index');
    }

    public function elegirCicloProtocolo()
    {
      $ciclos = Ciclo::all();

      return view('tutor.elegirCicloProtocolo', compact('ciclos'));
    }

    public function crearProtocolo($id)
   {
       //dd($id);   
       $ciclo = Ciclo::findOrFail($id);
       $carrera = Carrera::where('grupo', '=', Auth::user()->t_proy)->first();

       if ($carrera === null) 
       {
         Alert::info('Crear la carrera, por favor ponerse en contacto con el administrador', 'Carrera no encontrada');

         return redirect()->back();
       }
       return view('tutor.crearProtocolo', compact('ciclo', 'carrera'));
   }

   public function crearProtocoloForm(Request $request)
   {
    
   Protocolo::create([
   'nom_protocolo' => $request->input('nom_protocolo'),
   'universidad' => $request->input('universidad'),
   'facultad' => $request->input('facultad'),
   'carrera' => $request->input('carrera'),
   'introduccion' => $request->input('introduccion'),
   'antecedentes' => $request->input('antecedentes'),
   'objetivos' => $request->input('objetivos'),
   'obj_particulares' => $request->input('obj_particulares'),
   'justificacion' => $request->input('justificacion'),
   'herramientas' => $request->input('herramientas'),
   'entregables' => $request->input('entregables'),
   'preguntas_guia' => $request->input('preguntas_guia'),
   'semestre' => $request->input('semestre'),

   'fec_ini' => $request->input('fec_ini'),
   'fec_fin' => $request->input('fec_fin'),

   'carrera_id' => $request->input('carrera_id'),
   'ciclo_id' => $request->input('ciclo_id'),
   'user_id' => $request->input('user_id')
  ]);

       Alert::success('Ahora prodrás asignar docentes al protocolo', 'Protocolo creado exitosamente!');
       return redirect()->route('verProtocolos');
   }

   public function verProtocolos()
   {   
       //$protocolos = Protocolo::all();

       $protocolos = Protocolo::where('user_id', '=', Auth::user()->id)->where('activo', '=', 1)->get();

       return view('tutor.verProtocolos', compact('protocolos'));
   }

   public function verOnlyProtocolo($id)
   {
    $protocolo = Protocolo::findOrFail($id);

    return view('tutor.verOnlyProtocolo', compact('protocolo'));
   }

   public function editarOnlyProtocolo($id)
   {
        $protocolo = Protocolo::findOrFail($id);
        return view('tutor.editarOnlyProtocolo', compact('protocolo'));
   }

   public function editarOnlyProtocoloForm(Request $request, $id)
   {
       $protocolo = Protocolo::findOrFail($id);

       Protocolo::findOrFail($id)->update($request->all());

       Alert::success('El protocolo ha sido editado, y podrá ver los cambios', 'Protocolo Editado!');

       return redirect()->route('verProtocolos');
   }

   public function asignarDocentesProtocolo()
   {
       //$protocolos = Protocolo::all();

       $protocolos = Protocolo::where('user_id', '=', Auth::user()->id)->where('activo', '=', 1)->get();

       return view('tutor.asignarDocentesProtocolo', compact('protocolos'));
   }

   public function asignarDocentesProtocoloForm($id)
   {
      $protocolo = Protocolo::findOrFail($id);
      $users = User::where('rol', '>', 1)->orderBy('nom_docente', 'ASC')->pluck('nom_docente', 'id');
      return view('tutor.asignarDocentesProtocoloForm', compact('protocolo', 'users'));
   }

   public function datosAsignarDocentesProtocolo(Request $request, $id)
   {
      if ($request->input('users') == null) 
      {
        Alert::warning('Por favor elige docentes', 'Elegir docentes!');
        return redirect()->back();
      }

      $protocolo = Protocolo::find($id);
      $protocolo->manyUsers()->sync($request->get('users', []));
      
      Alert::success('Los docentes han sido asignados a este protocolo', 'Docentes asignados!');
      return redirect()->route('asignarDocentesProtocolo');
   }

   public function editarDocentesProtocoloForm($id)
   {
      $protocolo = Protocolo::findOrFail($id);
      $users = User::where('rol', '>', 1)->orderBy('nom_docente', 'ASC')->pluck('nom_docente', 'id');
       return view('tutor.editarDocentesProtocoloForm', compact('protocolo', 'users'));
   }

    public function datosEditarDocentesProtocolo(Request $request, $id)
   {
      if ($request->input('users') == null) 
      {
        Alert::warning('Por favor elige docentes', 'Elegir docentes!');
        return redirect()->back();
      }
      
      $protocolo = Protocolo::find($id);
      $protocolo->manyUsers()->sync($request->get('users', []));
      
      Alert::info('Se modificó la asignación de docentes en el protocolo ', 'Docentes Modificados');
      return redirect()->route('asignarDocentesProtocolo');
   }


/*Modulo para crear equipos de trabajo*/
   public function crearEquipos()
   {
       //$protocolos = Protocolo::all();

       $protocolos = Protocolo::where('user_id', '=', Auth::user()->id)->where('activo', '=', 1)->get();
       $equipos = Equipo::all();
       $alumnos = Alumno::all();
       return view('tutor.crearEquipos', compact('protocolos', 'equipos', 'alumnos'));
   }

   public function crearEquiposForm($id)
   {
       $protocolo = Protocolo::findOrFail($id);
       $tutores = User::all();
       return view('tutor.crearEquiposForm', compact('protocolo', 'tutores'));
   }

   public function datosCrearEquipos(Request $request)
   {
      Equipo::create($request->all());

      Alert::success('Se ha creado un nuevo equipo', 'Equipo creado exitosamente!');

      return redirect()->route('crearEquipos');
   }

   public function asignarAlumnosEquipos($id)
   {
       //dd($id);
       $equipo = Equipo::findOrFail($id);
       $alumnos = Alumno::all();
       return view('tutor.asignarAlumnosEquipos', compact('equipo', 'alumnos'));
   }

   public function datosAsignarAlumnosEquipos(Request $request)
   {
      //dd($request->all());
      $alumno_id = $request->input('alumno_id');
      $equipo_id = $request->input('equipo_id');

      Alumno::where('id', $alumno_id)->update(['equipo_id' => $equipo_id]);

      Alert::success('El alumno ha sido asignado al equipo', 'Alumno Asignado');

      return redirect()->route('crearEquipos');
   }

/*//////////////////////////////MENSAJES//////////////////////////////////////////////////*/

/*El tutor de proyecto puede enviar mensajes privados a los docentes asignados al protocolo*/
   public function crearMensaje()
   {
       $protocolos = Protocolo::all();
       return view('tutor.crearMensaje', compact('protocolos'));
   }

   public function datosMensaje(Request $request)
   {

      $this->validate($request, [
        
        'rx_user' => 'required|exists:users,id',
        'asunto' => 'required',
        'mensaje' => 'required',
        ]);

        $mensaje = Mensaje::create([
        'tx_user' => Auth::user()->id,
        'rx_user' => $request->input('rx_user'),
        'asunto' => $request->input('asunto'),
        'mensaje' => $request->input('mensaje'),
        ]);

      $rx_user = User::find($request->input('rx_user'));

      $rx_user->notify(new MensajeEnviado($mensaje));

      Alert::success('Tu mensaje fué enviado', 'Mensaje enviado!');
      return redirect()->route('crearMensaje');
   }

/*   public function bajaProtocolos(Request $request, $id)
   {    
       //dd($id);
       $activo = $request->input('activo');
       DB::table('protocolos')->where('id', $id)->update(['activo' => $activo]);
       
       Alert::success('Protocolo dado de baja exitosamente', 'Baja Exitosa');
       //alert()->success('Protocolo dado de baja exitosamente', 'Baja Exitosa');
       return redirect()->route('verProtocolos');
   }*/

}














































