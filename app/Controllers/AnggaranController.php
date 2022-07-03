<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AnggaranController extends BaseController
{
    public function index()
    {
        //
    }

    public function umum()
    {
        $data['activeMenu'] = session()->get('props')->menuAnggaranUmum;
        return view("blank", $data);
    }

    public function dipa()
    {
        $data['activeMenu'] = session()->get('props')->menuAnggaranDipa;
        return view("blank", $data);
    }

    public function realisasi()
    {
        $data['activeMenu'] = session()->get('props')->menuAnggaranRealisasi;
        return view("blank", $data);
    }
}
