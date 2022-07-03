<?php

namespace App\Controllers\DataBMN;

use App\Controllers\BaseController;

class AlatController extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'bmn-alat-data';
        return view("blank", $data);
    }

    public function add()
    {
        $data['activeMenu'] = 'bmn-alat-tambah';
        return view("blank", $data);
    }
}
