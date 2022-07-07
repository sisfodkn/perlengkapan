<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'username',
        'password',
        'role',
        'id_pegawai'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getAll()
    {
        $query = $this->db->query("SELECT
            users.id,
            users.username,
            users.role,
            pegawai.nama_pegawai
        FROM users
        JOIN pegawai ON users.id_pegawai = pegawai.id");
        return $query->getResult();
    }

    public function getById($id)
    {
        $query = $this->db->query("SELECT
            users.id,
            users.username,
            users.role,
            pegawai.nama_pegawai
        FROM users
        JOIN pegawai ON users.id_pegawai = pegawai.id
        WHERE users.id = '$id'");
        return $query->getFirstRow();
    }

    public function getByUsername($username)
    {
        $query = $this->db->query("SELECT 
            users.id,
            users.username,
            users.role,
            pegawai.nip_nrp,
            pegawai.nama_pegawai,
            jabatan.nama_jabatan,
            unit.nama_unit,
            sub_unit.nama_subunit
        FROM users
        JOIN        pegawai     ON users.id_pegawai = pegawai.id
        LEFT JOIN   jabatan     ON pegawai.id_jabatan = jabatan.id
        LEFT JOIN   unit        ON pegawai.id_unit = unit.id
        LEFT JOIN   sub_unit    ON pegawai.id_subunit = sub_unit.id
        WHERE users.username = '$username'");
        return $query->getFirstRow();
    }
}
