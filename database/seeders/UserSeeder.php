<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $password = password_hash('lapineda', PASSWORD_DEFAULT);

        $arrUsers = [
            array('dni' => '47334571L', 'email' => 'jo@gabrielfranco.me', 'password' => $password, 'nom' => 'Gabriel', 'cognoms' => 'Franco Villano', 'naixement' => '2001-09-27', 'municipi' => 'Badalona', 'adreca' => 'Carrer Monistrol de Montserrat 2', 'telefon' => '611475442', 'membre' => 'junta'),
        ];

        foreach($arrUsers as $user) {
            User::create($user);
        }

    }
}
