<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Tutor;
use App\Models\Cuota;

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

    public function formAcces() {

        return view('login', array(
            'title' => 'Accés'
        ));

    }

    public function acces(Request $request) {

        $dni = $request->input('dni');
        $password = $request->input('contrasenya');

        if(Auth::attempt(['dni' => $dni, 'password' => $password, 'inhabilitat' => 0])) {
            return redirect()->to('/inici');
        } else {
            return back()->withErrors([
                'message' => 'El soci no existeix o encara està sent validat.'
            ]);
        }

    }

    public function inici() {

        if( auth()->check() ){

            // Current year
            $thisYear = '2022';

            // Get data
            $getCuota = DB::table('cuotas')
                ->where('soci', '=', auth()->user()->id )
                ->where('any', '=', $thisYear)
                ->get();

            if(count($getCuota) == 0) {
                $cuota = false;
            } else {
                $cuota = true;
            }

            $getColonies = DB::table('esdeveniments')
                ->join('assistents', 'assistents.esdeveniment', '=', 'esdeveniments.id')
                ->join('users', 'assistents.soci', '=', 'users.id')
                ->where('esdeveniments.nom', '=', 'Colonies 2022')
                ->where('users.id', '=', auth()->user()->id )
                ->get();

            if( count($getColonies) == 0 ) {
                $colonies = 'denegat';
            } else {
                $colonies = $getColonies[0]->estatus;
            }

            return view('testModular', array(
                'title' => 'Inici',
                'cuota' => $cuota,
                'colonies' => $colonies
            ));

        } else {
            return redirect()->to('/acces');
        }

    }

    public function sortir() {

        auth()->logout();

        return redirect()->to('/acces');

    }
    
}
