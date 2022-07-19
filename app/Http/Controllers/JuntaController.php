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
                $thisYear = "2022";

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

                return view('junta.socis.cuotes', array(
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

                // Current year
                $thisYear = "2022";

                DB::table('cuotas')->insert([
                    'soci' => $idUsuari,
                    'any' => $thisYear
                ]);

                return redirect()->to('/junta/cuotes');

                
            } else {
                return redirect()->to('/inici');
            }

        } else {
            return redirect()->to('/acces');
        }

    }

    public function llistatSocis() {

                if( auth()->check() ){

            if( auth()->user()->membre == 'junta' ) {

                $allSocis = User::all();

                return view('junta.socis.llistat', array(
                    'title' => 'Llistat de socis',
                    'socis' => $allSocis
                ));
                
            } else {
                return redirect()->to('/inici');
            }

        } else {
            return redirect()->to('/acces');
        }

    }

    public function gestionarSoci($soci) {

        if( auth()->check() ){

            if( auth()->user()->membre == 'junta' ) {

                $sociSelec = User::where('id', '=', $soci)->get();

                return view('junta.socis.gestionarSoci', array(
                    'title' => 'Gestionar Soci',
                    'soci' => $sociSelec[0]
                ));
                
            } else {
                return redirect()->to('/inici');
            }

        } else {
            return redirect()->to('/acces');
        }

    }

    public function activarSoci($idSoci) {

        if( auth()->check() ){

            if( auth()->user()->membre == 'junta' ) {

                User::where('id', '=', $idSoci)->update(array(
                    'inhabilitat' => 0
                ));

                return redirect()->to('/junta/socis');
                
            } else {
                return redirect()->to('/inici');
            }

        } else {
            return redirect()->to('/acces');
        }

    }

    public function inhabilitarSoci($idSoci) {

        if( auth()->check() ){

            if( auth()->user()->membre == 'junta' ) {

                User::where('id', '=', $idSoci)->update(array(
                    'inhabilitat' => 1
                ));

                return redirect()->to('/junta/socis');
                
            } else {
                return redirect()->to('/inici');
            }

        } else {
            return redirect()->to('/acces');
        }

    }

    public function actualitzarSoci($idSoci) {

    }

}
