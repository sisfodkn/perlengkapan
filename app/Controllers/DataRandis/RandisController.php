<?php

namespace App\Controllers\DataRandis;

use App\Controllers\BaseController;

class RandisController extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'randis-kendaraan-data';
        return view("blank", $data);
    }

    public function add()
    {
        $data['activeMenu'] = 'randis-kendaraan-tambah';
        return view("blank", $data);
    }
}
