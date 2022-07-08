<?php

namespace App\Controllers\Permintaan;

use App\Controllers\BaseController;

class RupatController extends BaseController
{
    public function index()
    {
        $data['activeMenu'] = 'permintaan-rupat';
        return view("blank", $data);
    }
}
