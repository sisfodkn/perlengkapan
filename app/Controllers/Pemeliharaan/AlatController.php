<?php

namespace App\Controllers\Pemeliharaan;

use App\Controllers\BaseController;

class AlatController extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'pemeliharaan-alat';
        return view("blank", $data);
    }
}
