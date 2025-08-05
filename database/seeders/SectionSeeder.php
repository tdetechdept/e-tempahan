<?php  
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    public function run()
    {
        $sections = [
            'Jabatan Penyiaran Malaysia',
            'Jabatan Penerangan Malaysia',
            'Institut Penyiaran dan Penerangan Tun Abdul Razak',
            'Jabatan Komunikasi Komuniti',
        ];

        foreach ($sections as $name) {
            Section::create(['name' => $name]);
        }
    }
}
