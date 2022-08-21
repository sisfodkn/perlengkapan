<?php

namespace App\Controllers\Riwayat;

use App\Controllers\BaseController;
use App\Models\PeminjamanRandisModel;

class ReqPeminjamanRandisController extends BaseController
{
    function __construct()
    {
        $this->peminjamanRandisModel = new PeminjamanRandisModel();
    }

    public function index()
    {
        $data = [
            'activeMenu' => 'riwayat-peminjaman-randis-req',
            'riwayatReqPeminjamanRandisist' => $this->peminjamanRandisModel->getAllRiwayat()
        ];
        return view("riwayat/reqPeminjamanRandis", $data);
    }
}
