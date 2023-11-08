<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $csvFile = database_path('seeders\csv\man_hour.csv'); // Tentukan jalur ke file CSV Anda

        $csvData = array_map('str_getcsv', file($csvFile));

        $header = array_shift($csvData); // Mengambil header

        foreach ($csvData as $row) {
            $data = array_combine($header, $row);

            DB::table('manhours')->insert([
                'durasi_manhour' => $data['durasi_manhour'], // Sesuaikan dengan nama kolom Anda
                'workcenters_id' => $data['workcenters_id'], // Sesuaikan dengan nama kolom Anda
                'proses_id' => $data['proses_id'], // Sesuaikan dengan nama kolom Anda
                'tipeproses_id' => $data['tipeproses_id'], // Sesuaikan dengan nama kolom Anda
                'kapasitas_id' => $data['kapasitas_id'], // Sesuaikan dengan nama kolom Anda
                'kategori_id' => $data['kategori_id'], // Sesuaikan dengan nama kolom Anda
                'nama_workcenter' => $data['nama_workcenter'], // Sesuaikan dengan nama kolom Anda
                'nama_proses' => $data['nama_proses'], // Sesuaikan dengan nama kolom Anda
                'nama_tipeproses' => $data['nama_tipeproses'], // Sesuaikan dengan nama kolom Anda
                'ukuran_kapasitas' => $data['ukuran_kapasitas'], // Sesuaikan dengan nama kolom Anda
                'nama_kategoriproduk' => $data['nama_kategoriproduk'], // Sesuaikan dengan nama kolom Anda
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
