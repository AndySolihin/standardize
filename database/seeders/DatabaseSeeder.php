<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\dry_cast_resin;
use App\Models\standardize_work;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(KapasitasSeeder::class);
        $this->call(KategoriProdukSeeder::class);
        $this->call(ProsesSeeder::class);
        $this->call(TipeProsesSeeder::class);
        $this->call(WorkCenterSeeder::class);
        $this->call(ManHourSeeder::class);

    }
}
