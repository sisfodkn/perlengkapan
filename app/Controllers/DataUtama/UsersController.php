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
        $dataUsers = $this->usersModel->getById($idDecryption);

        if (empty($dataUsers)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data User Tidak ditemukan !');
        }
        $data = [
            'activeMenu'    => 'utama-user-ubah',
            'users'     => $dataUsers
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
                $users = $this->usersModel->getByUsername($this->request->getVar('username'));

                // Stroing session values
                $this->setUserSession($users);

                // Redirecting to dashboard after login
                return redirect()->to(base_url('/'));
            }
        }
        return view('login');
    }

    private function setUserSession($users)
    {
        $data = [
            'id'            => $users->id,
            'username'      => $users->username,
            'role'          => $users->role,
            'nip'           => $users->nip_nrp,
            'nama_pegawai'  => $users->nama_pegawai,
            'nama_jabatan'  => $users->nama_jabatan,
            'nama_unit'     => $users->nama_unit,
            'nama_subunit'  => $users->nama_subunit,
            'props'         => $this->prop,
            'isLoggedIn'    => true,
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
