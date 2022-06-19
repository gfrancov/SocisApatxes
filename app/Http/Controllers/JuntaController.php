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
                    'title' => 'Cuotes',
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
}
