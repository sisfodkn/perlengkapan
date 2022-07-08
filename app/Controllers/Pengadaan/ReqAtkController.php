<?php

namespace App\Controllers\Pengadaan;

use App\Controllers\BaseController;

class ReqAtkController extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'pengadaan-atk-req';
        return view("blank", $data);
    }
}
