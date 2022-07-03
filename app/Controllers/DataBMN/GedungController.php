<?php

namespace App\Controllers\DataBMN;

use App\Controllers\BaseController;

class GedungController extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'bmn-gedung-data';
        return view("blank", $data);
    }

    public function add()
    {
        $data['activeMenu'] = 'bmn-gedung-tambah';
        return view("blank", $data);
    }
}
