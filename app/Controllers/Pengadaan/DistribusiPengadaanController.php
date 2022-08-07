<?php

namespace App\Controllers\Pengadaan;

use App\Controllers\BaseController;
use App\Models\DistribusiPermintaanPengadaanModel;

class DistribusiPengadaanController extends BaseController
{
    function __construct()
    {
        $this->distribusiPermintaanPengadaanModel = new DistribusiPermintaanPengadaanModel();
    }

    public function index()
    {
        $data = [
            'activeMenu' => 'distribusi-pengadaan',
            'dataDistList' => $this->distribusiPermintaanPengadaanModel->findPendingDistribusi()
        ];
        return view("pengadaan/dataDistribusi", $data);
    }

    public function kirim($id)
    {
        $idDecryption = $this->decrypt($id);
        $dataDist = $this->distribusiPermintaanPengadaanModel->find($idDecryption);

        $now = date("Y/m/d H:i:s");
        $this->distribusiPermintaanPengadaanModel->update($idDecryption, [
            'tgl_kirim' => $now,
            'status' => '1'
        ]);
        return redirect()->to(base_url("distribusi-pengadaan"));
    }

    public function terkirim($id)
    {
        $idDecryption = $this->decrypt($id);
        $dataDist = $this->distribusiPermintaanPengadaanModel->find($idDecryption);

        $now = date("Y/m/d H:i:s");
        $this->distribusiPermintaanPengadaanModel->update($idDecryption, [
            'tgl_terkirim' => $now,
            'status' => '2'
        ]);
        return redirect()->to(base_url("distribusi-pengadaan"));
    }
}
