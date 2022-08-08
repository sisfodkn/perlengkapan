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
            'listPegawai' => $this->pegawaiModel->getPegawaiNoUsers()
        ];
        return view('dataUtama/inputUser', $data);
    }

    public function edit($id)
    {
        $idDecryption = $this->decrypt($id);
        $dataUsers = $this->usersModel->findById($idDecryption);

        if (empty($dataUsers)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data User Tidak ditemukan !');
        }
        $data = [
            'activeMenu'    => 'utama-user-ubah',
            'users'     => $dataUsers
        ];

        return view('dataUtama/inputUser', $data);
    }

    public function save($id)
    {
        $username = $this->request->getVar('username');
        $idPegawai = $this->request->getVar('pegawai');
        $pegawai = $this->pegawaiModel->find($idPegawai);
        $password = $this->request->getVar('password');
        $role = $this->request->getVar('role');
        if ($id == NULL) {
            $this->usersModel->insert([
                'username' => $pegawai['nip_nrp'],
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'role' => $role,
                'id_pegawai' => $idPegawai
            ]);
            return redirect()->to(base_url("input-user"));
        } else {
            $this->usersModel->update($id, [
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'role' => $role
            ]);
            return redirect()->to(base_url("data-user"));
        }
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
                $users = $this->usersModel->findByUsername($this->request->getVar('username'));

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
            'id_pegawai'    => $users->id_pegawai,
            'nip'           => $users->nip_nrp,
            'nama_pegawai'  => $users->nama_pegawai,
            'id_jabatan'    => $users->id_jabatan,
            'nama_jabatan'  => $users->nama_jabatan,
            'id_unit'       => $users->id_unit,
            'nama_unit'     => $users->nama_unit,
            'id_subunit'    => $users->id_subunit,
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
