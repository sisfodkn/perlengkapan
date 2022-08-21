<?php

namespace App\Controllers\Riwayat;

use App\Controllers\BaseController;
use App\Models\PeminjamanRandisModel;

class PeminjamanRandisController extends BaseController
{
    function __construct()
    {
        $this->peminjamanRandisModel = new PeminjamanRandisModel();
    }

    public function index()
    {
        $data = [
            'activeMenu' => 'riwayat-pinjam-randis',
            'riwayatPeminjamanRandisist' => $this->peminjamanRandisModel->getRiwayatPengguna(session()->get('id_pegawai'))
        ];
        return view("riwayat/peminjamanRandis", $data);
    }
}
