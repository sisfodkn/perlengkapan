<?php

namespace App\Controllers\Permintaan;

use App\Controllers\BaseController;

class AlatController extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'permintaan-alat';
        return view("blank", $data);
    }
}
