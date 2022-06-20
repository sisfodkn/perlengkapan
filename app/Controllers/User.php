<?php

namespace App\Controllers;

class User extends BaseController
{
    public function login()
    {
        return view('login');
    }
}
