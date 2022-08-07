<?php

namespace App\Controllers\Riwayat;

use App\Controllers\BaseController;

class PengadaanController extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'riwayat-pengadaan';
        return view("blank", $data);
    }
}
