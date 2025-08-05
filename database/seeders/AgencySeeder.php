<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agency;

class AgencySeeder extends Seeder
{
    public function run()
    {
        $agencies = [
            'Pertubuhan Berita Nasional Malaysia',
            'Perbadanan Kemajuan Filem Nasional Malaysia',
            'Suruhanjaya Komunikasi dan Multimedia Malaysia',
            'My Creative Ventures',
        ];

        foreach ($agencies as $name) {
            Agency::create(['name' => $name]);
        }
    }
}
