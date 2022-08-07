<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DistribusiPermintaanPengadaanModel;
use App\Models\PegawaiModel;
use App\Models\PeminjamanRandisModel;
use App\Models\PermintaanPengadaanModel;

class HomeController extends BaseController
{
    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
        $this->permintaanPengadaanModel = new PermintaanPengadaanModel();
        $this->peminjamanRandisModel = new PeminjamanRandisModel();
        $this->distribusiPermintaanPengadaanModel = new DistribusiPermintaanPengadaanModel();
    }
    public function index()
    {
        if (
            session()->get('role') == session()->get('props')->roleKabag ||
            session()->get('role') == session()->get('props')->roleSubPengadaan
        ) {
            $totalPengadaanMasuk = $this->permintaanPengadaanModel->getAllPendingRequest();
            $totalPengadaanPerluDikirim = $this->distribusiPermintaanPengadaanModel->getTotalPendingStatus();
            $listStatusPengadaan = $this->distribusiPermintaanPengadaanModel->getAllPendingStatus();
        } else {
            $totalPengadaanMasuk = "";
            $totalPengadaanPerluDikirim = "";
            $listStatusPengadaan = "";
        }
        $data = [
            'activeMenu'            => 'dashboard',
            // Dashboard Pengadaan
            'totalPengadaanMasuk'   => $totalPengadaanMasuk,
            'totalPengadaanPerluDikirim' => $totalPengadaanPerluDikirim,
            'listStatusPengadaan' => $listStatusPengadaan,

            // Dashboard Pengadaan untuk User
            // Pengadaan
            'permintaan'            => $this->distribusiPermintaanPengadaanModel->getAllPendingUnit(session()->get('id_unit'), session()->get('id_subunit')),
            'totalReqPengadaanUser' => $this->distribusiPermintaanPengadaanModel->getTotalPendingUnit(session()->get('id_unit'), session()->get('id_subunit')),
            'totalCompletePengadaanUser' => $this->permintaanPengadaanModel->getCompleteRequest(session()->get('id_unit'), session()->get('id_subunit')),

            // Peminjaman
            'pinjamRandis' => $this->peminjamanRandisModel->getListPendingRequest(session()->get('id_pegawai')),
            'totalReqPeminjamanRandis' => $this->peminjamanRandisModel->getTotalPendingRequest(session()->get('id_pegawai')),
            'totalCompletePeminjamanRandis' => $this->peminjamanRandisModel->getTotalCompleteRequest(session()->get('id_pegawai')),
        ];
        return view("home", $data);
    }
    public function randis()
    {
        $data['activeMenu'] = 'randis-pendahuluan';
        return view("blank", $data);
    }
    public function bmn()
    {
        $data['activeMenu'] = 'bmn-pendahuluan';
        return view("blank", $data);
    }

    public function terima($id)
    {
        $idDecryption = $this->decrypt($id);
        $dataDist = $this->distribusiPermintaanPengadaanModel->find($idDecryption);

        $now = date("Y/m/d H:i:s");
        $this->distribusiPermintaanPengadaanModel->update($idDecryption, [
            'tgl_terima' => $now,
            'status' => '3'
        ]);
        return redirect()->to(base_url("/"));
    }
}
