<?php

namespace App\Controllers\Peminjaman;

use App\Controllers\BaseController;

class ReqRupatController extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'peminjaman-rupat-req';
        return view("blank", $data);
    }
}
