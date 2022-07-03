<?php

namespace App\Controllers\DataRandis;

use App\Controllers\BaseController;

class JenisOpsController extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'randis-jenisops-data';
        return view("blank", $data);
    }

    public function add()
    {
        $data['activeMenu'] = 'randis-jenisops-tambah';
        return view("blank", $data);
    }
}
