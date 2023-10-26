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
            //     'company_id' => rand(1, 10),
            //     'is_active' => 1,
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'salary_name' => 'Gaji Per Jam',
            //     'company_id' => rand(1, 10),
            //     'is_active' => 1,
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'salary_name' => 'Gaji Komisi',
            //     'company_id' => rand(1, 10),
            //     'is_active' => 1,
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'salary_name' => 'Gaji Variabel',
            //     'company_id' => rand(1, 10),
            //     'is_active' => 1,
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'salary_name' => 'Gaji Kinerja',
            //     'company_id' => rand(1, 10),
            //     'is_active' => 1,
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'salary_name' => 'Gaji Tanggal Merah',
            //     'company_id' => rand(1, 10),
            //     'is_active' => 1,
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'salary_name' => 'Gaji Mingguan',
            //     'company_id' => rand(1, 10),
            //     'is_active' => 1,
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'salary_name' => 'Gaji Tetap Plus Bonus',
            //     'company_id' => rand(1, 10),
            //     'is_active' => 1,
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'salary_name' => 'Gaji Ganda',
            //     'company_id' => rand(1, 10),
            //     'is_active' => 1,
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'salary_name' => 'Gaji Partisipasi Saham',
            //     'company_id' => rand(1, 10),
            //     'is_active' => 1,
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            // [
            //     'salary_name' => 'Gaji Hari Raya',
            //     'company_id' => rand(1, 10),
            //     'is_active' => 1,
            //     'created_at' => date('Y-m-d H:i:s', time()),
            //     'updated_at' => date('Y-m-d H:i:s', time()),
            // ],
            [
                'salary_name' => 'Gaji Pokok', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Transportasi', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Makan', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Bonus Kinerja', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Lembur', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Keluarga', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Kesehatan', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Insentif Penjualan', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Pendidikan', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Bonus Tahunan', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Perumahan', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Komisi Penjualan', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Anak', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Lainnya', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Bonus Proyek', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Transportasi Umum', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Kesejahteraan', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Uang Makan Lembur', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Bonus Referensi Karyawan', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Hadir', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Kedisiplinan', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Insentif Inovasi', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Kesehatan Mental', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Bonus Tim', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Transportasi Dinas', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Kesehatan Gigi', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Bonus Loyalitas', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Uang Penghargaan', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Waktu Luang', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Bonus Penampilan', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Kesejahteraan Sosial', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Perjalanan', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Penelitian', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Bonus Keselamatan Kerja', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Uang Penghematan', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Kesehatan Mata', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Bonus Penyelesaian Proyek', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Pekerjaan Malam', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Pengembangan Karir', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Bonus Kreativitas', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Dinas Luar', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Uang Kehadiran', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Bonus Kualitas Produk', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Kesejahteraan Keluarga', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Karyawan Teladan', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Bonus Pencapaian Target', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Beasiswa', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Bonus Proyek Strategis', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Bencana Alam', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Uang Hadiah', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Bonus Keunggulan Tim', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],
            [
                'salary_name' => 'Tunjangan Lainnya', 'company_id' => rand(1, 10),
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time()),
            ],

        ];

        Salary::insert($salaries);


        // foreach (range(1, 20) as $salary) {
        //     Salary::create([
        //         'salary_name' => 'Gaji pokok',
        //         'company_id' => rand(1, 10),
        //         'is_active' => 1,
        //         'created_at' => date('Y-m-d H:i:s', time()),
        //         'updated_at' => date('Y-m-d H:i:s', time()),
        //     ]);
        // }
    }
}
