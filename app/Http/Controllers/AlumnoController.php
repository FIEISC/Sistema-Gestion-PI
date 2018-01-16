<?php
namespace sigespi\Http\Controllers;
use Illuminate\Http\Request;
use sigespi\Http\Requests\RegistroAlumnoRequest;
use sigespi\Ciclo;
use sigespi\Plantel;
use sigespi\User;
use sigespi\Carrera;
use sigespi\Alumno;
use sigespi\Protocolo;
use sigespi\Equipo;
use Alert;
use PDF;
class AlumnoController extends Controller
{
    public function opcionesAlumno()
    {
        return view('alumnos.opcionesAlumno');
    }
    public function elegirPlantel()
    {
        $planteles = Plantel::all();
        return view('alumnos.elegirPlantel', compact('planteles'));
    }
    public function registroAlumno(Request $request)
    {
        $plantel_id = $request->input('plantel_id');
        $plantel = Plantel::findOrFail($plantel_id);
        $ciclo = Ciclo::where('activo', '=', 1)->first();
        $carreras = Carrera::where('plantel_id', $plantel_id)->get();
        return view('alumnos.registroAlumno', compact('ciclo', 'plantel', 'carreras'));
    }
    public function datosRegistroAlumno(RegistroAlumnoRequest $request)
    {
        //dd($request->all());
    /*    $this->validate($request, [
            'nom_alumno' => 'required',
            'email' => 'required'
            ]);*/
    
        Alumno::create($request->all());
        Alert::success('Ya estas registrado en el sistema', 'Registro Exitoso');
        return redirect()->route('elegirPlantel');
    }
    public function elegirPlantelConsulta()
    {
        $planteles = Plantel::all();
        return view('alumnos.elegirPlantelConsulta', compact('planteles')); 
    }
    public function infoAlumno(Request $request)
    {
        $plantel_id = $request->input('plantel_id');
        $ciclo = Ciclo::where('activo', '=', 1)->first();
        //$carreras = Carrera::where('plantel_id', '=', $plantel)->get();
        $carreras = Carrera::where('plantel_id', '=', $plantel_id)->get();
        return view('alumnos.infoAlumno', compact('ciclo', 'carreras'));
    }
    public function datosInfoAlumno(Request $request)
    {
        //Datos recogidos del formulario!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $semestre = $request->input('semestre');
        $carrera = $request->input('carrera');
        
        //Datos que se pasan a la vista para ver la informacion de los alumnos!!!!!!!!!!!!!!!!
        $alumnos = Alumno::orderBy('equipo_id', 'ASC')->where('semestre', '=', $semestre)->where('carrera_id', '=', $carrera)->get();
       
        $protocolo = Protocolo::where('semestre', '=', $semestre)->where('carrera_id', '=', $carrera)->first();

        /*dd($protocolo);*/

        if($protocolo == null)
        {
            Alert::info('No se ha creado un protocolo todavia', 'Protocolo no encontrado');
            return redirect()->route('opcionesAlumno');
        }

        $equipos = Equipo::where('protocolo_id', '=', $protocolo->id)->get();
        return view('alumnos.listaAlumnos', compact('alumnos', 'protocolo', 'equipos'));
    }
     public function descargarProtocolo($id)
    {
        $protocolo = Protocolo::findOrFail($id);
        $pdf = PDF::loadView('alumnos.protocolo', ['protocolo' => $protocolo]);
        return $pdf->download('protocolo.pdf');
    }
}