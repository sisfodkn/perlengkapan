<?php

namespace App\Controllers\DataRandis;

use App\Controllers\BaseController;

class DistRandisController extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'randis-distrandis-data';
        return view("blank", $data);
    }

    public function add()
    {
        $data['activeMenu'] = 'randis-distrandis-tambah';
        return view("blank", $data);
    }
}
