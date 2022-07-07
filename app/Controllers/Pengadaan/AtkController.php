<?php

namespace App\Controllers\Pengadaan;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\PegawaiModel;

class AtkController extends BaseController
{
    function __construct()
    {
        $this->usersModel = new UsersModel;
        $this->pegawaiModel = new PegawaiModel;
    }

    public function index()
    {
        $this->usersModel->getById(session()->get('id'));
        $iduser = session()->get('id');
        $data['activeMenu'] = 'pengadaan-atk';
        return view("blank", $data);
    }

    public function save()
    {
    }
}
