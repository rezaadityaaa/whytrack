<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BahanBaku;

class BahanBakuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BahanBaku::insert([
            [
                'nama'       => 'Kopi Arabika',
                'satuan'     => 'kg',
                'stok'       => 20,
                'created_by' => 1,
                'updated_by' => null,
            ],
            [
                'nama'       => 'Gula Pasir',
                'satuan'     => 'kg',
                'stok'       => 15,
                'created_by' => 1,
                'updated_by' => null,
            ],
            [
                'nama'       => 'Susu UHT',
                'satuan'     => 'liter',
                'stok'       => 10,
                'created_by' => 1,
                'updated_by' => null,
            ],
            [
                'nama'       => 'Coklat Bubuk',
                'satuan'     => 'kg',
                'stok'       => 8,
                'created_by' => 1,
                'updated_by' => null,
            ],
            [
                'nama'       => 'Matcha Powder',
                'satuan'     => 'kg',
                'stok'       => 5,
                'created_by' => 1,
                'updated_by' => null,
            ],
        ]);
    }
}
