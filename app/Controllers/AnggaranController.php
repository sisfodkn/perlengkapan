<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AnggaranController extends BaseController
{
    public function index()
    {
        //
    }

    public function dipa()
    {
        $data['activeMenu'] = session()->get('props')->menuAnggaranDipa;
        return view("dataAnggaran/dipa", $data);
    }

    public function realisasi()
    {
        $data['activeMenu'] = session()->get('props')->menuAnggaranRealisasi;
        return view("dataAnggaran/realisasiAnggaran", $data);
    }
}
