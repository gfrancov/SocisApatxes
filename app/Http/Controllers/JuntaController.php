<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Tutor;
use App\Models\Cuota;

class JuntaController extends Controller
{
    public function cuotes() {

        if( auth()->check() ){

            if( auth()->user()->membre == 'junta' ) {

                // Current year
                $thisYear = date('Y');

                // Get data
                $cuotesPagades = DB::table('users')
                    ->join('cuotas', 'users.id', '=', 'cuotas.soci')
                    ->where('any', '=', $thisYear)
                    ->select('users.id', 'users.nom', 'users.cognoms', 'users.dni', 'cuotas.any')
                    ->get();
                
                $cuotesNoPagades = DB::table('users')
                    ->whereNotIn('users.id', DB::table('cuotas')->select('soci') )
                    ->select('users.id', 'users.nom', 'users.cognoms', 'users.dni')
                    ->get();

                return view('junta.cuotes', array(
                    'title' => 'Gestió Cuotes',
                    'pagades' => $cuotesPagades,
                    'noPagades' => $cuotesNoPagades
                ));
                
            } else {
                return redirect()->to('/inici');
            }

        } else {
            return redirect()->to('/acces');
        }

    }

    public function cuotaPagada($idUsuari) {

        if( auth()->check() ){

            if( auth()->user()->membre == 'junta' ) {

                DB::table('cuotas')->insert([
                    'soci' => $idUsuari,
                    'any' => date('Y')
                ]);

                return redirect()->to('/junta/cuotes');

                
            } else {
                return redirect()->to('/inici');
            }

        } else {
            return redirect()->to('/acces');
        }

    }

    public function testBootstrap() {
        return view('test');
    }
    public function testBootstrapModular() {
        return view('testModular', array(
            'title' => 'Inci'
        ));
    }

    public function eliminarCuota($idUsuari) {

        if( auth()->check() ){

            if( auth()->user()->membre == 'junta' ) {

                DB::table('cuotas')->insert([
                    'soci' => $idUsuari,
                    'any' => date('Y')
                ]);

                return redirect()->to('/junta/cuotes');

                
            } else {
                return redirect()->to('/inici');
            }

        } else {
            return redirect()->to('/acces');
        }
        
    }

    public function colonies() {

        if( auth()->check() ){

            if( auth()->user()->membre == 'junta' ) {

                // Current year
                $thisYear = date('Y');

                // Get data
                $coloniesPagades = DB::table('esdeveniments')
                    ->join('assistents', 'esdeveniments.id', '=', 'assistents.esdeveniment')
                    ->join('users', 'users.id', '=', 'assistents.soci')
                    ->where('esdeveniments.nom', '=', 'Colonies 2022')
                    ->where('assistents.estatus', '=', 'confirmat')
                    ->select('users.id', 'users.nom', 'users.cognoms', 'users.dni', 'assistents.estatus')
                    ->get();
                
                // Get data
                $coloniesConfirmades = DB::table('esdeveniments')
                ->join('assistents', 'esdeveniments.id', '=', 'assistents.esdeveniment')
                ->join('users', 'users.id', '=', 'assistents.soci')
                ->where('esdeveniments.nom', '=', 'Colonies 2022')
                ->where('assistents.estatus', '=', 'pendent')
                ->select('users.id', 'users.nom', 'users.cognoms', 'users.dni', 'assistents.estatus')
                ->get();
                                
                $coloniesNoPagades = DB::table('users')
                    ->whereNotIn('users.id', DB::table('assistents')->select('soci') )
                    ->select('users.id', 'users.nom', 'users.cognoms', 'users.dni')
                    ->get();

                return view('junta.colonies', array(
                    'title' => 'Gestió colonies',
                    'pagades' => $coloniesPagades,
                    'confirmades' => $coloniesConfirmades,
                    'noPagades' => $coloniesNoPagades
                ));
                
            } else {
                return redirect()->to('/inici');
            }

        } else {
            return redirect()->to('/acces');
        }

    }
}
