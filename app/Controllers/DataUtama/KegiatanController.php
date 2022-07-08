<?php

namespace App\Controllers\DataUtama;

use App\Controllers\BaseController;

class KegiatanController extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'utama-kegiatan-data';
        return view("blank", $data);
    }

    public function add()
    {
        $data['activeMenu'] = 'utama-kegiatan-tambah';
        return view("blank", $data);
    }
}
