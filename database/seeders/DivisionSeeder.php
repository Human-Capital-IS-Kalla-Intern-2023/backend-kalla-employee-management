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
        $division = [
            [
                'division_name' => 'CICT',
            ],
            [
                'division_name' => 'CICT',
            ],
            [
                'division_name' => 'Database',
            ],
            [
                'division_name' => 'Marketing',
            ],
            [
                'division_name' => 'CICT',
            ],
            [
                'division_name' => 'CICT',
            ],
            [
                'division_name' => 'CICT',
            ],
            [
                'division_name' => 'CICT',
            ],
            [
                'division_name' => 'CICT',
            ],
            [
                'division_name' => 'CICT',
            ],
        ];

        Division::insert($division);
    }
}
