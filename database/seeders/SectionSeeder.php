<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $section = [
            [
                'section_name' => 'UI/UX',
            ],
            [
                'section_name' => 'IT Support',
            ],
        ];

        Section::insert($section);
    }
}
