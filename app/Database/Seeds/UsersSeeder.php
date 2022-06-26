<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $listData = [
            [
                'username' => 'admin',
                'password' => password_hash("admin", PASSWORD_DEFAULT),
                'role' => 'Administrator'
            ]
        ];

        foreach ($listData as $data) {
            $this->db->table('users')->insert($data);
        }
    }
}
