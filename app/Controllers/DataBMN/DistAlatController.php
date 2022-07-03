<?php

namespace App\Controllers\DataBMN;

use App\Controllers\BaseController;

class DistAlatController extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'bmn-distalat-data';
        return view("blank", $data);
    }

    public function add()
    {
        $data['activeMenu'] = 'bmn-distalat-tambah';
        return view("blank", $data);
    }
}
