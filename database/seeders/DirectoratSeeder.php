<?php

namespace Database\Seeders;

use App\Models\Directorat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DirectoratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $directorats = [
            [
                'directorat_name' => 'Direktorat Keuangan',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Direktorat Sumber Daya Manusia',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Direktorat Pemasaran dan Penjualan',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Direktorat Produksi',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Direktorat Teknologi Informasi',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Direktorat Riset dan Pengembangan',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Direktorat Legal dan Kepatuhan',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Direktorat Pengembangan Bisnis',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Direktorat Hubungan Masyarakat',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Direktorat Layanan Pelanggan',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],


            [
                'directorat_name' => 'Human Resources',

                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Finance',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Marketing',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Sales',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Information Technology',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Research and Development',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Operations',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Customer Support',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Quality Assurance',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Legal Affairs',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Supply Chain',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Production',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Public Relations',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Facilities Management',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Project Management',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Safety and Compliance',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Environmental Affairs',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Strategic Planning',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Business Development',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'directorat_name' => 'Internal Audit',
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            // [
            //     'directorat_name' => 'Corporate Communications',
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'directorat_name' => 'Product Management',
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'directorat_name' => 'Customer Experience',
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'directorat_name' => 'Public Affairs',
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'directorat_name' => 'Training and Development',
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'directorat_name' => 'Corporate Social Responsibility',
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'directorat_name' => 'Digital Marketing',
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'directorat_name' => 'E-commerce',
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'directorat_name' => 'Information Security',
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'directorat_name' => 'Human Resources',
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'directorat_name' => 'Finance',
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'directorat_name' => 'Marketing',
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'directorat_name' => 'Sales',
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'directorat_name' => 'Information Technology',
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'directorat_name' => 'Research and Development',
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'directorat_name' => 'Operations',

            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'directorat_name' => 'Customer Support',
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'directorat_name' => 'Quality Assurance',
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'directorat_name' => 'Legal Affairs',
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'directorat_name' => 'Supply Chain',
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'directorat_name' => 'Production',
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'directorat_name' => 'Public Relations',
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'directorat_name' => 'Facilities Management',
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'directorat_name' => 'Project Management',
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'directorat_name' => 'Safety and Compliance',
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'directorat_name' => 'Environmental Affairs',
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],

        ];

        Directorat::insert($directorats);
    }
}
