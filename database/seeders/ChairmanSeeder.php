<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chairman;

class ChairmanSeeder extends Seeder
{
    public function run()
    {
        $chairmen = [
            ['name' => 'Menteri'],
            ['name' => 'Timbalan Menteri'],
            ['name' => 'Ketua Setiausaha'],
            ['name' => 'Timbalan Ketua Setiausaha (TKSU (S))'],
            ['name' => 'Timbalan Ketua Setiausaha (TKSU (T))'],
            ['name' => 'Setiausaha Bahagian Kanan (Pengurusan)'],
            ['name' => 'Setiausaha Bahagian'],
        ];

        foreach ($chairmen as $data) {
            Chairman::create([
                'name' => $data['name'],
                'position' => null,
                'division' => null,
                'office_phone' => null,
            ]);
        }
    }
}
