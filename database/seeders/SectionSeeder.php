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
            // [
            //     'section_name' => 'UI/UX',
            // ],
            // [
            //     'section_name' => 'IT Support',
            // ],
            // [
            //     'section_name' => 'Database',
            // ],
            // [
            //     'section_name' => 'Marketing',
            // ],
            // [
            //     'section_name' => 'Mobile Developer',
            // ],
            // [
            //     'section_name' => 'Big Data Analyst',
            // ],
            // [
            //     'section_name' => 'Engineering',
            // ],
            // [
            //     'section_name' => 'System Analyst',
            // ],
            // [
            //     'section_name' => 'Sales',
            // ],
            // [
            //     'section_name' => 'Office',
            // ],

            [
                'section_name' => 'Sales Team',
            ],
            [
                'section_name' => 'Marketing Department',
            ],
            [
                'section_name' => 'Customer Support Division',
            ],
            [
                'section_name' => 'Research and Development Unit',
            ],
            [
                'section_name' => 'Human Resources Division',
            ],
            [
                'section_name' => 'Finance Department',
            ],
            [
                'section_name' => 'Information Technology Team',
            ],
            [
                'section_name' => 'Quality Assurance Department',
            ],
            [
                'section_name' => 'Legal Affairs Division',
            ],
            [
                'section_name' => 'Operations Team',
            ],
            [
                'section_name' => 'Project Management Office',
            ],
            [
                'section_name' => 'Product Development Section',
            ],
            [
                'section_name' => 'Logistics Division',
            ],
            [
                'section_name' => 'Public Relations Team',
            ],
            [
                'section_name' => 'Facilities Management Department',
            ],
            [
                'section_name' => 'Training and Development Division',
            ],
            [
                'section_name' => 'Corporate Communications Section',
            ],
            [
                'section_name' => 'Customer Experience Team',
            ],
            [
                'section_name' => 'Safety and Compliance Department',
            ],
            [
                'section_name' => 'Environmental Affairs Division',
            ],
        ];

        Section::insert($section);
    }
}
