<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class UsersController extends BaseController
{
    public function index()
    {
        //
    }

    public function login()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'username' => 'required|max_length[20]|',
                'password' => 'required|max_length[100]|validateUser[username,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => "Username & Password salah",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                $username = $this->request->getVar('username');
                session()->setFlashdata('username', $username);
                return view('login', [
                    "validation" => $this->validator,
                ]);
            } else {
                $model = new UsersModel();

                $user = $model->where('username', $this->request->getVar('username'))
                    ->first();

                // Stroing session values
                $this->setUserSession($user);

                // Redirecting to dashboard after login
                return redirect()->to(base_url('/'));
            }
        }
        return view('login');
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'username' => $user['username'],
            "role" => $user['role'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }
}
