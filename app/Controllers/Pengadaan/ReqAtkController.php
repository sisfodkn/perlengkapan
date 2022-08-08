<?php

namespace App\Controllers\Pengadaan;

use App\Controllers\BaseController;
use App\Models\DistribusiPermintaanPengadaanModel;
use App\Models\PermintaanPengadaanModel;

class ReqAtkController extends BaseController
{
    function __construct()
    {
        $this->permintaanPengadaanModel = new PermintaanPengadaanModel();
        $this->distribusiPermintaanPengadaanModel = new DistribusiPermintaanPengadaanModel();
    }

    public function index()
    {
        $data = [
            'activeMenu' => 'pengadaan-atk-req',
            'reqAtkList' => $this->permintaanPengadaanModel->getAllListPendingRequest()
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
                    'status' => '1'
                ]);
                // $this->distribusiPermintaanPengadaanModel->insert([
                //     'id_permintaan_pengadaan' => $idDecryption
                // ]);
                break;
            case session()->get('props')->roleKabag:
                if (empty($dataReqAtk['tgl_persetujuan_subbag'])) {
                    $this->permintaanPengadaanModel->update($idDecryption, [
                        'tgl_persetujuan_subbag' => $now,
                        'tgl_persetujuan_bag' => $now,
                        'status' => '2'
                    ]);
                    $this->distribusiPermintaanPengadaanModel->insert([
                        'id_permintaan_pengadaan' => $idDecryption,
                        'status' => '0'
                    ]);
                } else {
                    $this->permintaanPengadaanModel->update($idDecryption, [
                        'tgl_persetujuan_bag' => $now,
                        'status' => '2'
                    ]);
                    $dataReq = $this->distribusiPermintaanPengadaanModel->findByReqId($idDecryption);
                    $this->distribusiPermintaanPengadaanModel->update($dataReq->id, [
                        'status' => '0'
                    ]);
                }
                break;
        }
        return redirect()->to(base_url("pengadaan-atk-req"));
    }
}
