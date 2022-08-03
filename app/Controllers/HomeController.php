<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;
use App\Models\PermintaanPengadaanModel;

class HomeController extends BaseController
{
    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
        $this->permintaanPengadaanModel = new PermintaanPengadaanModel;
    }
    public function index()
    {
        $data = [
            'activeMenu'            => 'dashboard',
            'permintaan'            => $this->permintaanPengadaanModel->getListPendingRequestUnit(session()->get('id_unit'), session()->get('id_subunit')),
            'totalReqPengadaan'     => $this->permintaanPengadaanModel->getPendingRequest(session()->get('id_unit'), session()->get('id_subunit')),
            'selesai'               => $this->permintaanPengadaanModel->getListCompleteRequest(session()->get('id_unit'), session()->get('id_subunit')),
            'totalCompletePengadaan' => $this->permintaanPengadaanModel->getCompleteRequest(session()->get('id_unit'), session()->get('id_subunit')),
            'totalPengadaanMasuk'   => $this->permintaanPengadaanModel->getPendingRequest(session()->get('id_unit'), session()->get('id_subunit')),
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
