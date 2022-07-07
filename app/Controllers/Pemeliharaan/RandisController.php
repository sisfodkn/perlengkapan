<?php

namespace App\Controllers\Pemeliharaan;

use App\Controllers\BaseController;

class RandisController extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'pemeliharaan-randis';
        return view("blank", $data);
    }
}
