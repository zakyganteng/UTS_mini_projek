<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('positions')->insert([
            [
                'code' => 'Ks',
                'name' => 'Kosong',
                'description' => 'Stock barang kosong'
            ],
            [
                'code' => 'AD',
                'name' => 'Ada',
                'description' => 'Stock Barang tersedia'
            ],
            [
                'code' => 'SD',
                'name' => 'Sedikit',
                'description' => 'Stock Barang hambir habis'
            ],
        ]);
    }
}
