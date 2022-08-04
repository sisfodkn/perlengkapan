<?php

namespace App\Controllers\Peminjaman;

use App\Controllers\BaseController;

class AlatController extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'peminjaman-alat';
        return view("blank", $data);
    }
}
