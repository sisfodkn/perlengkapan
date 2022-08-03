<?php

namespace App\Controllers\Pengadaan;

use App\Controllers\BaseController;
use App\Models\PermintaanPengadaanModel;

class ReqAtkController extends BaseController
{
    function __construct()
    {
        $this->permintaanPengadaanModel = new PermintaanPengadaanModel();
    }

    public function index()
    {
        $data = [
            'activeMenu' => 'pengadaan-atk-req',
            'reqAtkList' => $this->permintaanPengadaanModel->getAllListPendingRequest(),
            'riwayatReqAtkList' => $this->permintaanPengadaanModel->getRiwayatPengadaan()
        ];
        return view("pengadaan/dataReqAtk", $data);
    }

    public function save($id)
    {
        $idDecryption = $this->decrypt($id);
        $dataReqAtk = $this->permintaanPengadaanModel->find($idDecryption);

        $now = date("Y/m/d H:i:s");
        switch (session()->get('role')) {
            case session()->get('props')->roleSubPengadaan:
                $this->permintaanPengadaanModel->update($idDecryption, [
                    'tgl_persetujuan_subbag' => $now,
                    'status' => 'Disetujui Subbag Pengadaan'
                ]);
                break;
            case session()->get('props')->roleKabag:
                $this->permintaanPengadaanModel->update($idDecryption, [
                    'tgl_persetujuan_subbag' => $now,
                    'tgl_persetujuan_bag' => $now,
                    'status' => 'Disetujui Kabag PPBJ'
                ]);
                break;
        }
        return redirect()->to(base_url("pengadaan-atk-req"));
    }
}
