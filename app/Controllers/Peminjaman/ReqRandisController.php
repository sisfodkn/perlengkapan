<?php

namespace App\Controllers\Peminjaman;

use App\Controllers\BaseController;

class ReqRandisController extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'peminjaman-randis-req';
        return view("blank", $data);
    }
}
