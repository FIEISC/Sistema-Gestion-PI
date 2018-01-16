<?php

namespace sigespi\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Notifications\DatabaseNotification;

use Auth;

use Alert;

use sigespi\Mensaje;

/*use sigespi\Notifications\MensajeEnviado;*/

class NotificacionController extends Controller
{

	public function __construct()
	{
		return $this->middleware('auth');
	}

    public function notificaciones()
    {
    	$noLeidas = Auth::user()->unreadNotifications;
    	$Leidas = Auth::user()->readNotifications;

    	return view('docente.notificaciones', compact('noLeidas', 'Leidas'));
    }

    public function verNotificacion($id)
    {
    	$mensaje = Mensaje::findOrFail($id);
    	return view('docente.verNotificacion', compact('mensaje'));
    }

    public function leidaNotificacion($id)
    {
        DatabaseNotification::find($id)->markAsRead();

        Alert::success('Notificación marcada como leída', 'Notificación leída');

        return redirect()->back();
    }

    public function borrarNotificacion($id)
    {
    	DatabaseNotification::find($id)->delete();

        Alert::success('Notificación eliminada de la lista', 'Notificación eliminada');

        return redirect()->back();
    }


}
