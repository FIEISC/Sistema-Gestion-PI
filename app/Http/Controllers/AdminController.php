<?php

namespace sigespi\Http\Controllers;

use Illuminate\Http\Request;

use sigespi\Http\Requests\LoginAdminRequest;

use Auth;

use Alert;

use sigespi\User;

use sigespi\Campus;

use sigespi\Plantel;

use sigespi\Carrera;

use sigespi\Ciclo;

use DB;

class AdminController extends Controller
{
    //Restriccion de las paginas del administrador, excepto el login y datos del login!!!!!!!!!!
	function __construct()
	{
		return $this->middleware('auth', ['except' => ['login', 'datosLoginAdmin']]);
	}
/*Redirecciona al home del administrador*/    
	public function home()
	{
		return view('admin.home');
	}
/*Redirecciona al login del administrador*/
    public function login()
    {
    	return view('admin.login');
    }

    public function datosLoginAdmin(LoginAdminRequest $request)
    {
    	$no_docente = $request->input('no_docente');
    	$password = $request->input('password');

    	if (!Auth::attempt(['no_docente' => $no_docente, 'password' => $password, 'activo' => 1, 'rol' => 0, 'c_carr' => 'Z'])) 
    	{
    		return redirect()->back()->with('info', 'Datos Incorrectos');
    	}
    	else
    	{
    		return redirect()->route('home')->with('info', 'Bienvenido Administrador');
    	}
    }

    public function salir()
    {
    	Auth::logout();

    	return redirect()->route('login');
    }


    //Paginas del Administrador!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

   //Envia a la pagina para validar usuarios(Validar al Coordinador academico), y pasa todos los usuarios desde la BD!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public function validarCoordinador()
    {
    	$docentes = User::all();
        /*Pasa al coordinador academico para validar que ya este registrado en el sistema y se pueda
        hacer una condicion para no mostrar el boton "asignar" en la vista cuando ya este registrado*/
        $coordinador = User::where('rol', '=', 1)->first();

    	return view('admin.paginas.validarCoordinador', compact('docentes', 'coordinador'));
    }

//Datos del formulario para activar a los usuarios(coordinador academico), se pasa como parametro el id del usuario!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
     public function formValidarCoordinador(Request $request, $id)
        {
          DB::table('users')->where('id', $id)->update([
            'activo' => $request->input('activo'),
            ]);
          
          Alert::success('El usuario ha sido activado', 'Usuario Activado');
          return redirect()->route('validarCoordinador');
        
        }
//Datos del formulario para dar de alta como Coordinador Academico a un usuario, se pasa como parametro el id del usuario!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
      public function datosCambiarRoles(Request $request, $id)
        {
            $roles = implode(',', $request->input('rol'));

            DB::table('users')->where('id', $id)->update(['rol' => $roles]);
            
            Alert::success('El usuario ha sido dada de alta como Coordinador Académico', 'Coordinador Académico asignado');
            return redirect()->route('validarCoordinador');

        }
//Envia a la pagina para quitar y reasignar a el coordinador academico y se pasan todos los usuarios desde la BD!!!!!!!!!!!!!!!
        public function reasignarCoordinador()
        {
            $docentes = User::all();

            //$coordinador = User::where('rol', 1)->first();

            return view('admin.paginas.reasignarCoordinador', compact('docentes'));
        }

//Datos del formulario para quitar al coordinador academico, se pasa como parametro el id del usuario!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        public function quitarCoordinadorForm(Request $request, $id)
        {
           $roles = implode(',', $request->input('rol'));
           DB::table('users')->where('id', $id)->update(['rol' => $roles]);

           return redirect()->route('reasignarCoordinador');
        }
//Datos del formulario para reasignar a otro coordinador academico!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        public function reasignarCoordinadorForm(Request $request, $id)
        {
            $roles = implode(',', $request->input('rol'));
            DB::table('users')->where('id', $id)->update(['rol' => $roles]);

            return redirect()->route('reasignarCoordinador');
        }

        //Dada de alta a los campus de la universidad

        public function altaCampus()
        {
            return view('admin.paginas.altaCampus');
        }

           public function altaCampusForm(Request $request)
        {
            $this->validate($request,
                [
                'nom_campus' => 'required',
                'delegacion' => 'required',
                'nom_universidad' => 'required',
                ]);

            $nom_campus = strtoupper($request->input('nom_campus'));
            $delegacion = strtoupper($request->input('delegacion'));
            $nom_universidad = strtoupper($request->input('nom_universidad'));

            Campus::create(['nom_campus' => $nom_campus, 'delegacion' => $delegacion, 'nom_universidad' => $nom_universidad]);
            
            Alert::success('El campus ha sido dado de alta exitosamente', 'Campus registrado');

            return redirect()->route('altaCampus');
        }

        public function listaCampus()
        {
            $campus = Campus::all();

            return view('admin.paginas.listaCampus', compact('campus'));
        }

        public function editarCampus($id)
        {
            $campus = Campus::findOrFail($id);

            return view('admin.paginas.editarCampus', compact('campus'));
        }

        public function datosEditarCampus(Request $request, $id)
        {
            DB::table('campus')->where('id', $id)->update([
            'nom_campus' => $request->input('nom_campus'),
            'delegacion' => $request->input('delegacion'),
            'nom_universidad' => $request->input('nom_universidad')
            ]);

            Alert::success('El campus ha sido modificado exitosamente', 'Campus modificado');

            return redirect()->route('listaCampus');
        }

        //Dada de alta de los planteles

        public function altaPlanteles()
        {
            $campus = Campus::all();

            return view('admin.paginas.altaPlanteles', compact('campus'));
        }

        public function altaPlantelesForm(Request $request)
        {
            $this->validate($request, [
                'nom_plantel' => 'required',
                'siglas' => 'required',
                'campus_id' => 'required'
                ]);

            $nom_plantel = strtoupper($request->input('nom_plantel'));
            $siglas = strtoupper($request->input('siglas'));
            $campus_id = $request->input('campus_id');

            Plantel::create(['nom_plantel' => $nom_plantel, 'siglas' => $siglas, 'campus_id' => $campus_id]);

            Alert::success('El plantel ha sido dado de alta exitosamente', 'Plantel registrado');

            return redirect()->route('altaPlanteles');
        }

        /*Elegir campus para ver los planteles que tiene*/

        public function elegirCampusPlanteles()
        {
            $campus = Campus::all();
            return view('admin.paginas.opcionesCampusPlanteles', compact('campus'));
        }

/*Dato del campus para mostrar los planteles que tiene y mostrarlos en una lista*/
        public function datoElegirCampusPlanteles(Request $request)
        {
           $campus_id = $request->input('campus_id');
           $planteles = Plantel::where('campus_id', $campus_id)->get();

            return view('admin.paginas.listaPlanteles', compact('planteles'));

        }

        /*Modificar la informacion del plantel*/

        public function modificarDatosPlantel($id)
        {
           $plantel = Plantel::findOrFail($id);
           $campus = Campus::all();

           return view('admin.paginas.modificarDatosPlantel', compact('plantel', 'campus'));
        }

        public function datosPlantelModificar(Request $request, $id)
        {
            /*dd($request->all());*/

            $plantel = Plantel::findOrFail($id);

            DB::table('planteles')->where('id', $id)->update([
            'nom_plantel' => $request->input('nom_plantel'),
            'siglas' => $request->input('siglas'),
            'campus_id' => $request->input('campus_id')
            ]);
            
            Alert::success('El plantel ha sido modificado exitosamente', 'Plantel modificado');
            return redirect()->route('altaPlanteles');


        }

        //Dada de alta de las carreras!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        
        public function opcionesCampusCrearCarrera()
        {
            $campus = Campus::all();

            return view('admin.paginas.opcionesCampusCrearCarrera', compact('campus'));
        }

        public function opcionesPlantelesCrearCarrera(Request $request)
        {
            $campus_id = $request->input('campus_id');
            $planteles = Plantel::where('campus_id', $campus_id)->get();

            return view('admin.paginas.opcionesPlantelesCrearCarrera', compact('planteles'));
        }

        public function altaCarreras(Request $request)
        {
            $plantel_id = $request->input('plantel_id');
            $plantel = Plantel::where('id', $plantel_id)->first();

            return view('admin.paginas.altaCarreras', compact('plantel'));
        }
        
        /*Datos del formulario para crear la carrera*/
        public function altaCarrerasForm(Request $request)
        {
            $this->validate($request, [
                 'nom_carrera' => 'required',
                 'siglas' => 'required',
                 'grupo' => 'required',
                 'plantel_id' => 'required'
                ]);
            
            $nom_carrera = strtoupper($request->input('nom_carrera'));
            $siglas = strtoupper($request->input('siglas'));
            $grupo = strtoupper($request->input('grupo'));
            $plantel_id = $request->input('plantel_id');

            Carrera::create(['nom_carrera' => $nom_carrera, 'siglas' => $siglas, 'grupo' => $grupo, 'plantel_id' => $plantel_id]);
            
            Alert::success('Carrera creada para el plantel', 'Carrera creada!');
            return redirect()->route('opcionesCampusCrearCarrera');
        }

        /*Ver lista de campus para ver la carreras de  cada plantel*/

        public function verCampusCarreras()
        {
            $campus = Campus::all();
            return view('admin.paginas.opcionesCampusCarreras', compact('campus'));

        }
        
        /*Lista de planteles del campus previamente seleccionado*/
        public function verPlantelesCarreras(Request $request)
        {
            $campus = $request->input('campus_id');
            $planteles = Plantel::where('campus_id', $campus)->get();

            return view('admin.paginas.opcionesPlantelesCarreras', compact('planteles'));
        }
        
        /*Lista de todas las carreras del plantel previamente seleccionado*/
        public function verCarreras(Request $request)
        {
            $plantel = $request->input('plantel_id');
            $carreras = Carrera::where('plantel_id', $plantel)->get();
            
            return view('admin.paginas.listaCarreras', compact('carreras'));
        }

        /*Formulario para editar la carrera*/

        public function editarCarrera($id)
        {
            $carrera = Carrera::where('id', $id)->first();
    
            return view('admin.paginas.editarCarrera', compact('carrera'));
        }
        
        /*Datos del formulario para editar la carrera*/
        public function datosEditarCarrera(Request $request, $id)
        {
            DB::table('carreras')->where('id', $id)->update([
            'nom_carrera' => $request->input('nom_carrera'),
            'siglas' => $request->input('siglas'),
            'grupo' => $request->input('grupo'),
            ]);
          
          Alert::success('La carrera ha sido editada exitosamente', 'Carrera editada');
          return redirect()->route('verCampusCarreras');
        }

     //Dada de alta de los ciclos escolares!!!!!!!!!!!!!!!!!!!!!!!!!
        public function altaCiclos()
        {
            $ciclo_actual = Ciclo::where('activo', 1)->first();

            return view('admin.paginas.altaCiclos', compact('ciclo_actual'));
        }

        public function altaCiclosForm(Request $request)
        {
            /*dd($request->all());*/

            $nom_ciclo = strtoupper($request->input('nom_ciclo'));
            $ciclo = $request->input('ciclo');
            $fec_ini = $request->input('fec_ini');
            $fec_fin = $request->input('fec_fin');

            /*Ciclo::create($request->all());*/

            Ciclo::create(['nom_ciclo' => $nom_ciclo, 'ciclo' => $ciclo, 'fec_ini' => $fec_ini, 'fec_fin' => $fec_fin]);
            
            Alert::success('El ciclo ha sido registrado en el sistema');

            return redirect()->route('listaCiclos');
        }

        public function listaCiclos()
        {
            $ciclos = Ciclo::all();

            return view('admin.paginas.listaCiclos', compact('ciclos', 'ciclo_inactivo'));
        }

        public function editarCicloActual($id)
        {
            $ciclo = Ciclo::where('id', $id)->first();

            return view('admin.paginas.editarCicloActual', compact('ciclo'));
        }

        public function datosEditarCicloActual(Request $request, $id)
        {
            DB::table('ciclos')->where('id', $id)->update([
            'nom_ciclo' => $request->input('nom_ciclo'),
            'ciclo' => $request->input('ciclo'),
            'fec_ini' => $request->input('fec_ini'),
            'fec_fin' => $request->input('fec_fin'),
            ]);
          
          Alert::success('El ciclo escolar ha sido editado exitosamente', 'Ciclo escolar editado');

          return redirect()->route('listaCiclos');
        }

        public function bajaCicloActual(Request $request, $id)
        {
            DB::table('ciclos')->where('id', $id)->update([
            'activo' => $request->input('activo')
            ]);

            Alert::success('El ciclo escolar ha sido de baja exitosamente', 'Ciclo escolar dado de baja');

          return redirect()->route('altaCiclos');
        }

}






