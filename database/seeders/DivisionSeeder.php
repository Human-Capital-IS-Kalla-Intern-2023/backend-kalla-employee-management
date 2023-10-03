<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Division::factory(10)->create();
        $division = [
            [
                'division_name' => 'CICT',
            ],
            [
                'division_name' => 'Produksi',
            ],
            [
                'division_name' => 'Database',
            ],
            [
                'division_name' => 'Marketing',
            ],
            [
                'division_name' => 'HCBP',
            ],
            [
                'division_name' => 'Umum',
            ],
            [
                'division_name' => 'Personalia',
            ],
            [
                'division_name' => 'Keuangan',
            ],
            [
                'division_name' => 'Pabrik',
            ],
            [
                'division_name' => 'Perencanaan',
            ],
        ];

        Division::insert($division);
    }
}
