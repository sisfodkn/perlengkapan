<?php

namespace App\Controllers\Riwayat;

use App\Controllers\BaseController;
use App\Models\DistribusiPermintaanPengadaanModel;

class PengadaanController extends BaseController
{
    function __construct()
    {
        $this->distribusiPermintaanPengadaanModel = new DistribusiPermintaanPengadaanModel();
    }

    public function index()
    {
        $data = [
            'activeMenu' => 'riwayat-pengadaan',
            'riwayatPengadaanList' => $this->distribusiPermintaanPengadaanModel->getRiwayatPengguna(session()->get('id_subunit'))
        ];
        return view("riwayat/pengadaan", $data);
    }
}
