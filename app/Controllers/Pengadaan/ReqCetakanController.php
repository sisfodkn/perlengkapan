<?php

namespace App\Controllers\Pengadaan;

use App\Controllers\BaseController;

class ReqCetakanController extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'pengadaan-cetakan-req';
        return view("blank", $data);
    }
}
