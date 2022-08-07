<?php

namespace App\Controllers\Riwayat;

use App\Controllers\BaseController;
use App\Models\DistribusiPermintaanPengadaanModel;

class ReqPengadaanController extends BaseController
{
    function __construct()
    {
        $this->distribusiPermintaanPengadaanModel = new DistribusiPermintaanPengadaanModel();
    }

    public function index()
    {
        $data = [
            'activeMenu' => 'riwayat-pengadaan-req',
            'riwayatReqPengadaanList' => $this->distribusiPermintaanPengadaanModel->getRiwayatPengadaan()
        ];
        return view("riwayat/reqPengadaan", $data);
    }
}
