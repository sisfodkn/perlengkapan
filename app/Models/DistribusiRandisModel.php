<?php

namespace App\Models;

use CodeIgniter\Model;

class DistribusiRandisModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'distribusi_randis';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_kendaraan_dinas',
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
            $this->table.id,
            $this->table.id_kendaraan_dinas,
            $this->table.id_pegawai,
            pegawai.nama_pegawai,
            jabatan.nama_jabatan,
            kendaraan_dinas.nopol,
            kendaraan_dinas.merk_kendaraan
        FROM
            $this->table
        JOIN kendaraan_dinas ON kendaraan_dinas.id = $this->table.id_kendaraan_dinas
        JOIN pegawai ON pegawai.id = $this->table.id_pegawai
        JOIN jabatan ON jabatan.id = pegawai.id_jabatan");
        return $query->getResult();
    }

    public function getDataDist($idRandis, $idPegawai)
    {
        $query = $this->db->query("SELECT
            *
        FROM
            $this->table
        WHERE id_kendaraan_dinas = '$idRandis'
        AND id_pegawai = '$idPegawai'");
        return $query->getFirstRow();
    }
}
