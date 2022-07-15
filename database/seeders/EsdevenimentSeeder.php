<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Esdeveniment;

class EsdevenimentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrEsdeveniments = [
            array('nom' => 'Colonies 2022', 'ubicacio' => 'Masia Mas Po Canyadó', 'data' => '2022-10-1'),
        ];

        foreach($arrEsdeveniments as $esdeveniment) {
            Esdeveniment::insert($esdeveniment);
        }
    }
}
