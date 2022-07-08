<?php

namespace App\Controllers\Permintaan;

use App\Controllers\BaseController;

class RandisController extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'permintaan-randis';
        return view("blank", $data);
    }
}
