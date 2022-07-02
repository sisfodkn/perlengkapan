<?php

namespace App\Controllers\DataUtama;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\PegawaiModel;

class UsersController extends BaseController
{
    function __construct()
    {
        $this->prop = new \Config\Properties();
        $this->usersModel = new UsersModel;
        $this->pegawaiModel = new PegawaiModel;
    }


    public function index()
    {
        $data = [
            'activeMenu'    => 'utama-user-data',
            'users'       => $this->usersModel->getAll()
        ];
        return view("dataUtama/dataUser", $data);
    }

    public function add()
    {
        $data = [
            'activeMenu'    => 'utama-user-tambah',
            'listPegawai' => $this->pegawaiModel->findColumn('nama_pegawai')
        ];
        return view('dataUtama/inputUser', $data);
    }

    public function edit($id)
    {
        $idDecryption = $this->decrypt($id);
        $dataUser = $this->usersModel->getById($idDecryption);

        if (empty($dataUser)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data User Tidak ditemukan !');
        }
        $data = [
            'activeMenu'    => 'utama-user-ubah',
            'user'     => $dataUser
        ];

        return view('dataUtama/inputUser', $data);
    }

    public function login()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'username' => 'required|max_length[20]|',
                'password' => 'required|max_length[100]|validateUsers[username,password]',
            ];

            $errors = [
                'password' => [
                    'validateUsers' => "Username & Password salah",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                $username = $this->request->getVar('username');
                session()->setFlashdata('username', $username);
                return view('login', [
                    "validation" => $this->validator,
                ]);
            } else {
                $user = $this->usersModel->where('username', $this->request->getVar('username'))
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
            'role' => $user['role'],
            'props' => $this->prop,
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
