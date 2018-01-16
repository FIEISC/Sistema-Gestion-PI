<?php

/*Route::get('/registro/admin', function()
{
	$admin = new sigespi\User;
	$admin->nom_docente = 'Naty';
	$admin->no_docente = '220494';
	$admin->email = 'naty_snuff@hotmail.com';
	$admin->password = bcrypt('nath123');
	$admin->rol = 0;
	$admin->c_carr = 'Z';
	$admin->t_proy = 'Z';
	$admin->t_semestre = 0;
	$admin->activo = 1;
	$admin->plantel_id = 1;
	$admin->save();

});*/

//Rutas Administrador!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
Route::get('/admin/login', 'AdminController@login')->name('loginAdmin');

Route::post('/admin/login', 'AdminController@datosLoginAdmin')->name('datosLoginAdmin');

Route::get('/admin/home', 'AdminController@home')->name('homeAdmin');

Route::get('/admin/salir', 'AdminController@salir')->name('salirAdmin');

//Paginas del Administrador!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

Route::get('/admin/validar_coordinador', 'AdminController@validarCoordinador')->name('validarCoordinador');

Route::put('admin/datos/validar_coordinador/{id}', 'AdminController@formValidarCoordinador')->name('formValidarCoordinador');

Route::put('/admin/datos/cambiar_roles/{id}', 'AdminController@datosCambiarRoles')->name('datosCambiarRoles');

Route::get('/admin/reasignar_coordinador', 'AdminController@reasignarCoordinador')->name('reasignarCoordinador');

Route::put('/admin/quitar_coordinador/{id}', 'AdminController@quitarCoordinadorForm')->name('quitarCoordinadorForm');

Route::put('/admin/reasignar_coordinador/{id}', 'AdminController@reasignarCoordinadorForm')->name('reasignarCoordinadorForm');

Route::get('/admin/alta_campus', 'AdminController@altaCampus')->name('altaCampus');

Route::get('/admin/alta_campus/lista', 'AdminController@listaCampus')->name('listaCampus');

Route::post('/admin/alta_campus', 'AdminController@altaCampusForm')->name('altaCampusForm');

Route::get('/admin/editar_campus/{id}', 'AdminController@editarCampus')->name('editarCampus');

Route::put('/admin/editar_campus/datos/{id}', 'AdminController@datosEditarCampus')->name('datosEditarCampus');

/*Planteles*/

Route::get('/admin/alta_planteles', 'AdminController@altaPlanteles')->name('altaPlanteles');

Route::post('/admin/alta_planteles', 'AdminController@altaPlantelesForm')->name('altaPlantelesForm');

/*Carreras*/

Route::get('/admin/campus', 'AdminController@opcionesCampusCrearCarrera')->name('opcionesCampusCrearCarrera');

Route::post('/admin/planteles', 'AdminController@opcionesPlantelesCrearCarrera')->name('opcionesPlantelesCrearCarrera');

Route::post('/admin/alta_carreras/form', 'AdminController@altaCarreras')->name('altaCarreras');

Route::post('/admin/alta_carreras', 'AdminController@altaCarrerasForm')->name('altaCarrerasForm');

Route::get('/admin/campus_carreras', 'AdminController@verCampusCarreras')->name('verCampusCarreras');

Route::post('/admin/planteles_carreras', 'AdminController@verPlantelesCarreras')->name('verPlantelesCarreras');

Route::post('/admin/carreras', 'AdminController@verCarreras')->name('verCarreras');

Route::get('/admin/editar_carrera/{id}', 'AdminController@editarCarrera')->name('editarCarrera');

Route::put('/admin/editar_carrera/datos/{id}', 'AdminController@datosEditarCarrera')->name('datosEditarCarrera');

Route::get('/admin/alta_ciclos', 'AdminController@altaCiclos')->name('altaCiclos');

Route::post('/admin/alta_ciclos', 'AdminController@altaCiclosForm')->name('altaCiclosForm');

Route::get('/admin/lista_ciclos', 'AdminController@listaCiclos')->name('listaCiclos');

Route::get('/admin/editar_ciclo/{id}', 'AdminController@editarCicloActual')->name('editarCicloActual');

Route::put('/admin/editar_ciclo/datos/{id}', 'AdminController@datosEditarCicloActual')->name('datosEditarCicloActual');

Route::put('/admin/baja_ciclo/{id}', 'AdminController@bajaCicloActual')->name('bajaCicloActual');

/*Rutas nuevas administrador*/

Route::get('/admin/elegir_campus', 'AdminController@elegirCampusPlanteles')->name('elegirCampusPlanteles');

Route::post('/admin/elegir_campus/data', 'AdminController@datoElegirCampusPlanteles')->name('datoElegirCampusPlanteles');

Route::get('/admin/editar_plantel/{id}', 'AdminController@modificarDatosPlantel')->name('modificarDatosPlantel');

Route::put('/admin/editar_plantel/data/{id}', 'AdminController@datosPlantelModificar')->name('datosPlantelModificar');

//Rutas del sistema en general!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

Route::get('/campus/registro', 'AuthController@campusRegistro')->name('campusRegistro');

Route::post('/registro', 'AuthController@registro')->name('registro');

Route::post('/registro/datos', 'AuthController@datosRegistro')->name('datosRegistro');

Route::get('/', 'AuthController@login')->name('login');

Route::post('/', 'AuthController@datosLogin')->name('datosLogin');

Route::get('/salir', 'AuthController@salir')->name('salir');

/*Route::get('/alumnos/registro', 'PaginasController@registroAlumnos')->name('registroAlumnos');

Route::post('/alumnos/registro/datos', 'PaginasController@datosRegistroAlumnos')->name('datosRegistroAlumnos');*/

//Rutas del Coordinador Academico!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

Route::get('/coordinador/index', 'CoordinadorController@index')->name('coordinador');

Route::get('/coordinador/asignar_validar_usuarios', 'CoordinadorController@validarAsignarUsuarios')->name('validarAsignarUsuarios');

Route::put('/coordinador/asignar_validar_usuarios/{id}', 'CoordinadorController@formvalidarAsignarUsuarios')->name('formvalidarAsignarUsuarios');

Route::get('/coordinador/asignar_coordinador_carrera/{id}', 'CoordinadorController@asignarCoordinadorCarrera')->name('asignarCoordinadorCarrera');

Route::put('/coordinador/asignar_coordinador_carrera/{id}', 'CoordinadorController@formAsignarCoordinadorCarrera')->name('formAsignarCoordinadorCarrera');

Route::get('/coordinador/baja_reasignacion', 'CoordinadorController@darBajaReasignarCoordinadorCarrera')->name('darBajaReasignarCoordinadorCarrera');

Route::put('/coordinador/baja_docente/{id}', 'CoordinadorController@bajaDocenteForm')->name('bajaDocenteForm');

Route::get('/coordinador/alta_tutores', 'CoordinadorController@altaTutores')->name('altaTutores');

Route::get('/coordinador/alta_tutores/1x1/{id}', 'CoordinadorController@asignarTutores')->name('asignarTutores');

Route::put('/coordinador/alta_tutores/1x1/{id}', 'CoordinadorController@asignarTutoresForm')->name('asignarTutoresForm');

Route::get('/coordinador/protocolos', 'CoordinadorController@verProtocolos')->name('verProtocolosCoordinador');

Route::get('/coordinador/protocolo/{id}', 'CoordinadorController@verProtocoloCoordinador')->name('verProtocoloCoordinador');

Route::put('/coordinador/aceptar_protocolo/{id}', 'CoordinadorController@aceptarProtocolo')->name('aceptarProtocolo');

Route::get('/coordinador/bajaProtocolos', 'CoordinadorController@bajaProtocolos')->name('bajaProtocolosCoordinador');

Route::put('/coordinador/datos/baja_protocolos/{id}', 'CoordinadorController@datosProtocolosBaja')->name('datosProtocolosBaja');

Route::get('/tutor/eliminarProtocolos', 'CoordinadorController@eliminarProtocolos')->name('eliminarProtocolos');

Route::delete('/tutor/eliminarProtocolo/{id}', 'CoordinadorController@datosEliminarProtocolo')->name('datosEliminarProtocolo');

//Rutas Coordinador de Carrera!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

Route::get('/coordinador_carrera/index', 'CoordinadorCarreraController@index')->name('c_carrera');

Route::get('/coordinador_carrera/tutores', 'CoordinadorCarreraController@listaTutores')->name('listaTutores');

Route::get('/coordinador_carrera/protocolos', 'CoordinadorCarreraController@protocolosTutores')->name('protocolosTutores');

Route::get('/coordinador_carrera/protocolo/{id}', 'CoordinadorCarreraController@verProtocolo')->name('verProtocolocc');

/*Route::get('/coordinador_carrera/alta_tutores', 'CoordinadorCarreraController@altaTutoresProyecto')->name('altaTutoresProyecto');

Route::get('/coordinador_carrera/alta_tutores/{id}', 'CoordinadorCarreraController@asignarAltaTutoresProyecto')->name('asignarAltaTutoresProyecto');

Route::put('/coordinador_carrera/alta_tutores/{id}', 'CoordinadorCarreraController@asignarAltaTutoresProyectoForm')->name('asignarAltaTutoresProyectoForm');*/

//Rutas del Tutor de Proyecto!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

Route::get('/tutor/index', 'TutorController@index')->name('tutor');

Route::get('/tutor/elegir_ciclo', 'TutorController@elegirCicloProtocolo')->name('elegirCicloProtocolo');

Route::get('/tutor/crear_protocolo/{id}', 'TutorController@crearProtocolo')->name('crearProtocolo');

Route::post('/tutor/crear_protocolo', 'TutorController@crearProtocoloForm')->name('crearProtocoloForm');

Route::get('/tutor/ver_protocolos', 'TutorController@verProtocolos')->name('verProtocolos');

Route::get('/tutor/ver_protocolo/{id}', 'TutorController@verOnlyProtocolo')->name('verOnlyProtocolo');

Route::get('/tutor/editar_protocolo/{id}', 'TutorController@editarOnlyProtocolo')->name('editarOnlyProtocolo');

Route::put('/tutor/editar_protocolo_datos/{id}', 'TutorController@editarOnlyProtocoloForm')->name('editarOnlyProtocoloForm');

Route::get('/tutor/asignar_docentes', 'TutorController@asignarDocentesProtocolo')->name('asignarDocentesProtocolo');

Route::get('/tutor/asignar_docentes/{id}', 'TutorController@asignarDocentesProtocoloForm')->name('asignarDocentesProtocoloForm');

Route::post('/tutor/asignar_docentes/datos/{id}', 'TutorController@datosAsignarDocentesProtocolo')->name('datosAsignarDocentesProtocolo');

Route::get('/tutor/editar_docentes/{id}', 'TutorController@editarDocentesProtocoloForm')->name('editarDocentesProtocoloForm');

Route::put('/tutor/editar_docentes/datos/{id}', 'TutorController@datosEditarDocentesProtocolo')->name('datosEditarDocentesProtocolo');

/*Route::put('/tutor/baja_protocolo/{id}', 'TutorController@bajaProtocolos')->name('bajaProtocolos');*/

Route::get('/tutor/crear_equipos', 'TutorController@crearEquipos')->name('crearEquipos');

Route::get('/tutor/crear_equipos/form/{id}', 'TutorController@crearEquiposForm')->name('crearEquiposForm');

Route::post('/tutor/datos_crear_equipos', 'TutorController@datosCrearEquipos')->name('datosCrearEquipos');

Route::get('/tutor/asigar_alumnos_equipos/{id}', 'TutorController@asignarAlumnosEquipos')->name('asignarAlumnosEquipos');

Route::put('/tutor/asignar_alumnos_equipos/datos', 'TutorController@datosAsignarAlumnosEquipos')->name('datosAsignarAlumnosEquipos');

Route::get('/tutor/crear_mensaje', 'TutorController@crearMensaje')->name('crearMensaje');

Route::post('/tutor/datos/mensaje', 'TutorController@datosMensaje')->name('datosMensaje');

//Rutas del Docente!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

Route::get('/docente/index', 'DocenteController@index')->name('docente');

Route::get('/docente/protocolos', 'DocenteController@protocolosAsignados')->name('protocolosAsignados');

Route::get('/docente/ver_protocolo/{id}', 'DocenteController@verProtocoloDocente')->name('verProtocoloDocente');

Route::get('/docente/editar_protocolo/{id}', 'DocenteController@editarProtocolo')->name('editarProtocoloDocente');

Route::put('/docente/datos/editar_protocolo/{id}', 'DocenteController@datosEditarProtocolo')->name('datosEditarProtocoloDocente');

Route::get('/docente/info/protocolo/docente/{id}', 'DocenteController@infoDocenteProtocolo')->name('infoDocenteProtocolo');

/*Notificaciones*/

Route::get('/docente/notificaciones', 'NotificacionController@notificaciones')->name('notificaciones');

Route::get('/docente/ver_notificacion/{id}', 'NotificacionController@verNotificacion')->name('verNotificacion');

Route::patch('/docente/notificacion/leida/{id}', 'NotificacionController@leidaNotificacion')->name('leidaNotificacion');

Route::delete('/docente/notificacion/eliminada/{id}', 'NotificacionController@borrarNotificacion')->name('borrarNotificacion');

//Niveles de usuario!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

Route::get('/nca&d', 'PaginasController@nivel1')->name('nivel1');

Route::get('/n2', 'PaginasController@nivel2')->name('nivel2');

Route::get('/ncct&d', 'PaginasController@nivel3')->name('nivel3');

Route::get('/nt&da', 'PaginasController@nivel4')->name('nivel4');

Route::get('/nda', 'PaginasController@nivel5')->name('nivel5');

/*Route::get('/alumnos/info', 'PaginasController@infoAlumnos')->name('infoAlumnos');

Route::post('/alumnos/datos/info', 'PaginasController@datosInfoAlumnos')->name('datosInfoAlumnos');

Route::get('/alumnos/lista_alumnos', 'PaginasController@listaAlumnos')->name('listaAlumnos');

Route::get('/alumnos/protocolo/{id}', 'PaginasController@protocolo')->name('protocolo');

Route::get('/alumnos/pdf/{id}', 'PaginasController@descargarProtocolo')->name('descargarProtocolo');*/


//Rutas alumnos!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

Route::get('/alumno/opciones', 'AlumnoController@opcionesAlumno')->name('opcionesAlumno');

Route::get('/alumno/elegir_plantel', 'AlumnoController@elegirPlantel')->name('elegirPlantel');

/*Route::get('/alumno/registro/{id}', 'AlumnoController@registroAlumno')->name('registroAlumno');
*/
Route::post('/alumno/registro', 'AlumnoController@registroAlumno')->name('registroAlumno');

Route::post('/alumno/registro/datos', 'AlumnoController@datosRegistroAlumno')->name('datosRegistroAlumno');

Route::get('/alumno/elegir_plantel/consulta', 'AlumnoController@elegirPlantelConsulta')->name('elegirPlantelConsulta');

Route::post('/alumno/info', 'AlumnoController@infoAlumno')->name('infoAlumno');

Route::post('/alumno/datos', 'AlumnoController@datosInfoAlumno')->name('datosInfoAlumno');

Route::get('/alumno/protocolo/pdf/{id}', 'AlumnoController@descargarProtocolo')->name('descargarProtocolo');