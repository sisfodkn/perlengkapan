<?php

namespace App\Controllers\DataBMN;

use App\Controllers\BaseController;

class KatRuanganController extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'bmn-katruangan-data';
        return view("blank", $data);
    }

    public function add()
    {
        $data['activeMenu'] = 'bmn-katruangan-tambah';
        return view("blank", $data);
    }
}
