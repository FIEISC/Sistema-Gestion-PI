<?php

namespace sigespi\Http\Controllers;

use Illuminate\Http\Request;

use sigespi\Http\Requests\RegistroRequest;

use sigespi\Http\Requests\LoginRequest;

use sigespi\User;

use sigespi\Plantel;

use sigespi\Campus;

use Auth;

use Alert;

class AuthController extends Controller
{
    public function campusRegistro()
    {
        $campus = Campus::all();
        return view('auth.campusRegistro', compact('campus'));
    }

    public function registro(Request $request)
    {
        $campus_id = $request->input('campus_id');
        $planteles = Plantel::where('campus_id', $campus_id)->get();
        
    	return view('auth.registro', compact('planteles'));
    }

    public function datosRegistro(RegistroRequest $request)
    {
        //dd($request->all());
    	User::create([  
            'nom_docente' => $request->input('nom_docente'),
            'no_docente' => $request->input('no_docente'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'plantel_id' => $request->input('plantel_id')
    		]);

        /*return redirect()->route('login')->with('info2', 'Registro exitoso, ponte en contacto con el coordinador académico para la activación de tu cuenta.');*/

        Alert::success('Ponte en contacto con el coordinador académico para la activación de tu cuenta', 'Registro Exitoso');
        
        return redirect()->route('login');
    }

    public function login()
    {
    	return view('auth.login');
    }

    public function datosLogin(LoginRequest $request)
    {
         $no_docente = $request->input('no_docente');
         $password = $request->input('password');

         if (!Auth::attempt(['no_docente' => $no_docente, 'password' => $password, 'activo' => 1])) 
         {
             /*return redirect()->back()->with('info', 'Datos Incorrectos o tu cuenta no ha sido activada, por favor verifica tus datos');*/
             Alert::warning('Tu cuenta no ha sido activada o tus datos son incorrectos, por favor verifica tus datos', 'Ingreso negado');

             return redirect()->route('login');
         }

      
       if (Auth::check()) 
       {
        
        $user = Auth::user();
        $roles = $user->rol;
        $rol = explode(',', $roles);

        if ($rol[0] == 1 && $rol[1] == 4) 
        {
            return redirect()->route('nivel1');
        }
        elseif ($rol[0] == 2 && $rol[1] == 4) 
        {
            return redirect()->route('nivel2');
        }

        elseif ($rol[0] == 2 && $rol[1] == 3 && $rol[2] == 4) 
        {
            return redirect()->route('nivel3');
        }

        elseif ($rol[0] == 3 && $rol[1] == 4) 
        {
            return redirect()->route('nivel4');
        }

        elseif ($rol[0] == 4) 
        {
            return redirect()->route('nivel5');
        }

       }
    }

    public function salir()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
