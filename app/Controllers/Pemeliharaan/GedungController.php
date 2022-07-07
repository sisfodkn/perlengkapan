<?php

namespace App\Controllers\Pemeliharaan;

use App\Controllers\BaseController;

class GedungController extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'pemeliharaan-gedung';
        return view("blank", $data);
    }
}
