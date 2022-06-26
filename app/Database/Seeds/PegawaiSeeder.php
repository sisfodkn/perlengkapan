<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    public function run()
    {
        $listData = [
            [
                'nip_nrp' => '8890/P',
                'nama_pegawai' => 'Dr. Ir. Harjo Susmoro, S.Sos., S.H., M.H., M.Tr.Opsla.',
                'pangkat' => 'Laksdya TNI',
                'id_jabatan' => 1,
                'id_unit' => 1
            ],
        ];

        foreach ($listData as $data) {
            $this->db->table('pegawai')->insert($data);
        }
    }
}
