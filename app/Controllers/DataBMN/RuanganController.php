<?php

namespace App\Controllers\DataBMN;

use App\Controllers\BaseController;

class RuanganController extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'bmn-ruangan-data';
        return view("blank", $data);
    }

    public function add()
    {
        $data['activeMenu'] = 'bmn-ruangan-tambah';
        return view("blank", $data);
    }
}
