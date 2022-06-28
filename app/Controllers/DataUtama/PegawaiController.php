<?php

namespace App\Controllers\DataUtama;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;

class PegawaiController extends BaseController
{
    function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
    }

    public function index()
    {
        $data = [
            'activeMenu'    => 'utama-pegawai-data',
            'pegawai'       => $this->pegawaiModel->getAll()
        ];
        return view("dataUtama/dataPegawai", $data);
    }
}
