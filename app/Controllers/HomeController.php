<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;
use App\Models\PeminjamanRandisModel;
use App\Models\PermintaanPengadaanModel;

class HomeController extends BaseController
{
    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
        $this->permintaanPengadaanModel = new PermintaanPengadaanModel;
        $this->peminjamanRandisModel = new PeminjamanRandisModel();
    }
    public function index()
    {
        if (
            session()->get('role') == session()->get('props')->roleKabag ||
            session()->get('role') == session()->get('props')->roleSubPengadaan
        ) {
            $totalPengadaanMasuk = $this->permintaanPengadaanModel->getAllPendingRequest();
            $totalPengadaanSelesai = $this->permintaanPengadaanModel->getAllCompleteRequest();
        } else {
            $totalPengadaanMasuk = "";
            $totalPengadaanSelesai = "";
        }
        $data = [
            'activeMenu'            => 'dashboard',
            // Dashboard Pengadaan
            'totalPengadaanMasuk'   => $totalPengadaanMasuk,
            'totalPengadaanSelesai' => $totalPengadaanSelesai,

            // Dashboard Pengadaan untuk User
            // Pengadaan
            'permintaan'            => $this->permintaanPengadaanModel->getListPendingRequestUnit(session()->get('id_unit'), session()->get('id_subunit')),
            'totalReqPengadaanUser' => $this->permintaanPengadaanModel->getPendingRequest(session()->get('id_unit'), session()->get('id_subunit')),
            'selesai'               => $this->permintaanPengadaanModel->getListCompleteRequest(session()->get('id_unit'), session()->get('id_subunit')),
            'totalCompletePengadaanUser' => $this->permintaanPengadaanModel->getCompleteRequest(session()->get('id_unit'), session()->get('id_subunit')),

            // Peminjaman
            'pinjamRandis' => $this->peminjamanRandisModel->getListPendingRequest(session()->get('id_pegawai')),
            'totalReqPeminjamanRandis' => $this->peminjamanRandisModel->getTotalPendingRequest(session()->get('id_pegawai')),
            'pinjamRandisSelesai' => $this->peminjamanRandisModel->getListCompleteRequest(session()->get('id_pegawai')),
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
}
