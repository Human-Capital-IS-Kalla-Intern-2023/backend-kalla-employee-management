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

        // Section::factory(10)->create();
        $section = [
            [
                'section_name' => 'UI/UX',
            ],
            [
                'section_name' => 'IT Support',
            ],
            [
                'section_name' => 'Database',
            ],
            [
                'section_name' => 'Marketing',
            ],
            [
                'section_name' => 'Mobile Developer',
            ],
            [
                'section_name' => 'Big Data Analyst',
            ],
            [
                'section_name' => 'Engineering',
            ],
            [
                'section_name' => 'System Analyst',
            ],
            [
                'section_name' => 'Sales',
            ],
            [
                'section_name' => 'Office',
            ],
        ];

        Section::insert($section);
    }
}
