<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;

class HomeController extends BaseController
{
    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
    }
    public function index()
    {
        $data = [
            'activeMenu'    => 'dashboard',
            'totalPegawai'    => $this->pegawaiModel->getCountAll()
        ];
        return view("home", $data);
    }
    public function randis()
    {
        $data['activeMenu'] = 'randis-pendahuluan';
        return view("blank", $data);
    }
    public function bmn()
    {
        $data['activeMenu'] = 'bmn-pendahuluan';
        return view("blank", $data);
    }
}
