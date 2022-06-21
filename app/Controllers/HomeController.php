<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function __construct()
    {
    }
    public function index()
    {
        $data['activeMenu'] = 'dashboard';
        return view("home", $data);
    }
}
