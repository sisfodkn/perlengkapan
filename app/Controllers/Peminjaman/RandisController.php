<?php

namespace App\Controllers\Peminjaman;

use App\Controllers\BaseController;

class RandisController extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'peminjaman-randis';
        return view("blank", $data);
    }
}
