<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::insert([
            [
                'nama' => 'Kopi Susu',
                'harga' => 18000,
            ],
            [
                'nama' => 'Kopi Gula Aren',
                'harga' => 20000,
            ],
            [
                'nama' => 'Americano',
                'harga' => 15000,
            ],
            [
                'nama' => 'Cappuccino',
                'harga' => 22000,
            ],
            [
                'nama' => 'Matcha Latte',
                'harga' => 25000,
            ],
        ]);
    }
}
