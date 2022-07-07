<?php

namespace App\Controllers\Pengadaan;

use App\Controllers\BaseController;

class CetakanController extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'pengadaan-cetakan';
        return view("blank", $data);
    }
}
