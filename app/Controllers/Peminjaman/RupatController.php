<?php

namespace App\Controllers\Peminjaman;

use App\Controllers\BaseController;

class RupatController extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'peminjaman-rupat';
        return view("blank", $data);
    }
}
