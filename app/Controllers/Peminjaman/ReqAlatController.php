<?php

namespace App\Controllers\Peminjaman;

use App\Controllers\BaseController;

class ReqAlatController extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'peminjaman-alat-req';
        return view("blank", $data);
    }
}
