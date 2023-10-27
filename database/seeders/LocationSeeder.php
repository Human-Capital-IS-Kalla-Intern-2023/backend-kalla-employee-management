<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Location::factory(10)->create();
        $locations = [
            [
                'location_name' => 'Kalimantan Tengah', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'location_name' => 'Kepulauan Bangka Belitung', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'location_name' => 'Nusa Tenggara Timur', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'location_name' => 'Banten', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'location_name' => 'Gorontalo', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'location_name' => 'Lampung', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'location_name' => 'Kalimantan Timur', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'location_name' => 'Sulawesi Tengah', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'location_name' => 'Sulawesi Barat', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'location_name' => 'Sumatera Barat', 'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],

            // [
            //     "location_name" => "Villa Constitución", 'created_at' => date('Y-m-d H:i:s', time()),
            // 'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Haarlem", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Cambebba", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Rzhev", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Sengkerang Tiga", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Rabat", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Solor", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Montpellier", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Itarana", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Pecatu", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Kowale Oleckie", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Oujiangcha", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Karlskoga", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Kizema", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Mabini", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Saint-Lô", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Nigríta", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Ludwin", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Saba Yoi", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Vällingby", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Kodyma", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Tempuran", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Gbadolite", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Jiajiaying", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Bulungu", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Moch", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Aguilares", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Ciseureuheun", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Saint-Félicien", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Zákupy", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Daguyun", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Kleszczów", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Áyioi Apóstoloi", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Duayaw Nkwanta", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Wanquan", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Tytuvėnėliai", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Singgit", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Novyy Karachay", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Skópelos", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Paris 11", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Kedungwungu", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Cầu Gồ", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Chojnice", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Nu’erbage", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Neuzina", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Saint John", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Belmopan", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Cergy-Pontoise", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Roshchino", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     "location_name" => "Sizhou", 'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ]
        ];

        Location::insert($locations);
    }
}
