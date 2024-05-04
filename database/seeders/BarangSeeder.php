<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Barang')->insert([
            [
                'KodeBarang' => '1',
                'NamaBarang' => 'Teh olong',
                'Qty'=> '3',
                'Harga' => 10.000,
                'position_id' => 1
            ],
            [
                'KodeBarang' => '2',
                'NamaBarang' => 'Coklat',
                'Qty'=> '5',
                'Harga' => 25.000,
                'position_id' => 2
            ],
            [
                'KodeBarang' => '3',
                'NamaBarang' => 'Strawberry',
                'Qty'=> '5',
                'Harga' => 23.000,
                'position_id' => 3
            ],
        ]);
    }
}
