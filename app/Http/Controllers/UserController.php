<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Tutor;

class UserController extends Controller
{
    
    public function formRenovacio() {

        return view('renovacio', array(
            'title' => 'Renovacio'
        ));

    }

    public function renovacio(Request $request) {

        request()->validate([
            'dni' => ['required', 'unique:users'],
            'email' => ['required', 'unique:users']
        ]);
     
        $password = password_hash($request->input('contrasenya'), PASSWORD_DEFAULT);

        $soci = User::create([
            'dni' => $request->input('dni'),
            'email' => $request->input('email'),
            'password' => $password,
            'nom' => $request->input('nom'),
            'cognoms' => $request->input('cognoms'),
            'naixement' => $request->input('naixement'),
            'municipi' => $request->input('municipi'),
            'adreca' => $request->input('adreca'),
            'telefon' => $request->input('telefon'),
            'membre' => $request->input('adreca')
        ]);

        // Saber si es menor
        if(Carbon::parse( $request->input('naixement') )->age < 18) {

            Tutor::insert([
                'soci' => $soci->id,
                'nom' => $request->input('nomTutor'),
                'cognoms' => $request->input('cognomsTutor'),
                'dni' => $request->input('dniTutor')
            ]);

        }

        $message = "La digitalització del teu compte de l'ASC Districte Apatxe s'ha realitzat correctament " . $request->input('nom') . ", quan l'accés al teu compte sigui funcional t'arribarà un correu electrònic a " . $request->input('email') . ".";
        return view('success', array(
            'title' => 'Renovació correcta',
            'message' => $message
        ));


    }
    
}
