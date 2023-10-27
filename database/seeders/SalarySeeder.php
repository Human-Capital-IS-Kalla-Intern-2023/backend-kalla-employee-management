<?php

namespace Database\Seeders;

use App\Models\Salary;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        $salaries = [
            // [
            //     'salary_name' => 'Gaji Tetap',
            //     'company_id' => rand(1, 20),
            //     'is_active' => 1,
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'salary_name' => 'Gaji Per Jam',
            //     'company_id' => rand(1, 20),
            //     'is_active' => 1,
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'salary_name' => 'Gaji Komisi',
            //     'company_id' => rand(1, 20),
            //     'is_active' => 1,
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'salary_name' => 'Gaji Variabel',
            //     'company_id' => rand(1, 20),
            //     'is_active' => 1,
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'salary_name' => 'Gaji Kinerja',
            //     'company_id' => rand(1, 20),
            //     'is_active' => 1,
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'salary_name' => 'Gaji Tanggal Merah',
            //     'company_id' => rand(1, 20),
            //     'is_active' => 1,
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'salary_name' => 'Gaji Mingguan',
            //     'company_id' => rand(1, 20),
            //     'is_active' => 1,
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'salary_name' => 'Gaji Tetap Plus Bonus',
            //     'company_id' => rand(1, 20),
            //     'is_active' => 1,
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'salary_name' => 'Gaji Ganda',
            //     'company_id' => rand(1, 20),
            //     'is_active' => 1,
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'salary_name' => 'Gaji Partisipasi Saham',
            //     'company_id' => rand(1, 20),
            //     'is_active' => 1,
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'salary_name' => 'Gaji Hari Raya',
            //     'company_id' => rand(1, 20),
            //     'is_active' => 1,
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],


            [
                'salary_name' => 'Gaji Pokok', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Bonus', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Transportasi', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Makan', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Insentif Penjualan', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Kesehatan', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Pendidikan', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Hari Tua', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Lembur', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Anak', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Komisi Penjualan', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Kesejahteraan', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Seragam', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Transportasi Umum', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Insentif Produktivitas', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Perumahan', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Kerja Malam', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Pensiun', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Bonus Natal', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Liburan', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Anak Sekolah', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Perjalanan Dinas', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Insentif Kreativitas', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Lintas Kota', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Bonus Tahun Baru', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Cuti Sakit', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Penghasilan', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Bonus Kinerja Tahunan', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Bencana', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Bahasa', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Kemajuan Karir', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Bonus Kesetiaan', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Keluarga', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Gigi', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Olahraga', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Bonus Khusus', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Relokasi', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Insentif Kehadiran', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Lembaga Pendidikan', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Kesehatan Mental', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Terjemahan', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Bonus Inovasi', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Perawatan Anak', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Lintas Bahasa', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Telekomunikasi', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Bonus Kreatifitas Seni', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Mobilitas', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Perlindungan', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Bonus Prestasi Ekstra', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Keselamatan Kerja', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],
            [
                'salary_name' => 'Tunjangan Biaya Pelatihan', 'company_id' => rand(1, 20),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),

            ],

        ];

        Salary::insert($salaries);


        // foreach (range(1, 20) as $salary) {
        //     Salary::create([
        //         'salary_name' => 'Gaji pokok',
        //         'company_id' => rand(1, 20),
        //         'is_active' => 1,
        //         'created_at' => date('Y-m-d H:i:s', time()),
        //         'updated_at' => date('Y-m-d H:i:s', time()),
        //     ]);
        // }
    }
}
