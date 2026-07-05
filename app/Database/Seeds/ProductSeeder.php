<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // membuat data
        $data = [
            [
                'nama' => 'INDOMIE GORENG TELUR KOMPLIT',
                'harga'  => 10000,
                'jumlah' => 5,
                'foto' => 'indomie_goreng.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'NASI GORENG SPESIAL',
                'harga'  => 15000,
                'jumlah' => 7,
                'foto' => 'Nasi_Goreng_Spesial.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'ESPRESSO COFFEE',
                'harga'  => 4000,
                'jumlah' => 5,
                'foto' => 'espresso.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama' => 'ES TEH MANIS',
                'harga'  => 3000,
                'jumlah' => 5,
                'foto' => 'es_teh.jpg',
                'created_at' => date("Y-m-d H:i:s"),
            ],
        ];

        foreach ($data as $item) {
            // insert semua data ke tabel
            $this->db->table('product')->insert($item);
        }
    }
}