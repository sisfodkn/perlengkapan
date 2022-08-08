<?php

namespace App\Controllers\Peminjaman;

use App\Controllers\BaseController;
use App\Models\PeminjamanRandisModel;
use App\Models\RandisModel;

class ReqRandisController extends BaseController
{
    function __construct()
    {
        $this->peminjamanRandisModel = new PeminjamanRandisModel();
        $this->randisModel = new RandisModel();
    }

    public function index()
    {
        $data = [
            'activeMenu' => 'peminjaman-randis-req',
            'reqRandisList' => $this->peminjamanRandisModel->getAllListPendingRequest()
        ];
        return view("peminjaman/dataReqRandis", $data);
    }

    public function save($id)
    {
        $idDecryption = $this->decrypt($id);
        $dataReqRandis = $this->peminjamanRandisModel->find($idDecryption);

        $now = date("Y/m/d H:i:s");
        switch (session()->get('role')) {
            case session()->get('props')->roleSubBMN:
                $this->peminjamanRandisModel->update($idDecryption, [
                    'tgl_persetujuan_subbag' => $now,
                    'status' => '1'
                ]);
                break;
            case session()->get('props')->roleKabag:
                if (empty($dataReqRandis['tgl_persetujuan_subbag'])) {
                    $this->peminjamanRandisModel->update($idDecryption, [
                        'tgl_persetujuan_subbag' => $now,
                        'tgl_persetujuan_bag' => $now,
                        'status' => '2'
                    ]);
                } else {
                    $this->peminjamanRandisModel->update($idDecryption, [
                        'tgl_persetujuan_bag' => $now,
                        'status' => '2'
                    ]);
                }
                break;
            case session()->get('props')->roleKaro:
                if (empty($dataReqRandis['tgl_persetujuan_subbag'])) {
                    $this->peminjamanRandisModel->update($idDecryption, [
                        'tgl_persetujuan_subbag' => $now,
                        'tgl_persetujuan_bag' => $now,
                        'tgl_persetujuan_karo' => $now,
                        'status' => '3'
                    ]);
                } else if (empty($dataReqRandis['tgl_persetujuan_bag'])) {
                    $this->peminjamanRandisModel->update($idDecryption, [
                        'tgl_persetujuan_bag' => $now,
                        'tgl_persetujuan_karo' => $now,
                        'status' => '3'
                    ]);
                } else {
                    $this->peminjamanRandisModel->update($idDecryption, [
                        'tgl_persetujuan_karo' => $now,
                        'status' => '3'
                    ]);
                }
                $this->randisModel->update($dataReqRandis['id_randis'], [
                    'status' => '1'
                ]);
                break;
        }
        return redirect()->to(base_url("peminjaman-randis-req"));
    }
}
