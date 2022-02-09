<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'password'  => '42746',
                'role'      => 'supervisor',
                'nama_user' => 'Hasim'
            ],
            [
                'password'  => '98526',
                'role'      => 'supervisor',
                'nama_user' => 'Wulan'
            ],
            [
                'password'  => '72462',
                'role'      => 'admin',
                'nama_user' => 'Rahma'
            ],
            [
                'password'  => '6464786',
                'role'      => 'admin',
                'nama_user' => 'Ningrum'
            ],
        ];

        $this->db->table('user')->insertBatch($data);
    }
}
