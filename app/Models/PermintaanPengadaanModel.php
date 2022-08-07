<?php

namespace App\Models;

use CodeIgniter\Model;

class PermintaanPengadaanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'permintaan_pengadaan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_pegawai',
        'id_unit',
        'id_subunit',
        'tipe_pengadaan',
        'jenis_kegiatan',
        'isi_permintaan',
        'tgl_pengajuan',
        'tgl_persetujuan_subbag',
        'tgl_persetujuan_bag',
        'status'
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
    protected $where = "";

    public function getAllPendingRequest()
    {
        switch (session()->get('role')) {
            case session()->get('props')->roleSubPengadaan:
                $where = "WHERE $this->table.tgl_persetujuan_subbag IS NULL";
                break;
            case session()->get('props')->roleKabag:
                $where = "WHERE $this->table.tgl_persetujuan_subbag IS NULL
                OR $this->table.tgl_persetujuan_bag IS NULL";
                break;
        }
        $sql = "SELECT count(*) AS total 
            FROM $this->table " . $where;
        $query = $this->db->query("$sql");
        return $query->getFirstRow();
    }

    public function getAllCompleteRequest()
    {
        switch (session()->get('role')) {
            case session()->get('props')->roleSubPengadaan:
                $where = "WHERE $this->table.tgl_persetujuan_subbag IS NOT NULL";
                break;
            case session()->get('props')->roleKabag:
                $where = "WHERE $this->table.tgl_persetujuan_subbag IS NOT NULL
                OR $this->table.tgl_persetujuan_bag IS NOT NULL";
                break;
        }
        $sql = "SELECT count(*) AS total 
            FROM $this->table " . $where;
        $query = $this->db->query("$sql");
        return $query->getFirstRow();
    }

    public function getPendingRequest($id_unit, $id_subunit)
    {
        $query = $this->db->query("SELECT count(*) AS total 
        FROM $this->table 
        WHERE id_unit = '$id_unit'
        AND id_subunit = '$id_subunit'
        AND ($this->table.tgl_persetujuan_subbag IS NULL
        OR $this->table.tgl_persetujuan_bag IS NULL)");
        return $query->getFirstRow();
    }

    public function getListPendingRequestUnit($id_unit, $id_subunit)
    {
        $query = $this->db->query("SELECT
            pegawai.nama_pegawai,
            $this->table.tipe_pengadaan,
            $this->table.jenis_kegiatan,
            $this->table.isi_permintaan,
            $this->table.tgl_pengajuan,
            $this->table.status,
            (CASE $this->table.status
                WHEN 0 THEN
                    'Belum Disetujui'
                WHEN 1 THEN
                    'Disetujui Subbag'
                WHEN 2 THEN
                    'Disetujui Kabag'
                WHEN 3 THEN
                    'Disetujui Karoum'
            END) AS keterangan
        FROM $this->table 
        LEFT JOIN pegawai ON $this->table.id_pegawai = pegawai.id
        LEFT JOIN unit ON $this->table.id_unit = unit.id
        LEFT JOIN sub_unit ON $this->table.id_subunit = sub_unit.id
        WHERE $this->table.id_unit = '$id_unit'
        AND $this->table.id_subunit = '$id_subunit'
        AND ($this->table.tgl_persetujuan_subbag IS NULL
        OR $this->table.tgl_persetujuan_bag IS NULL)");
        return $query->getResult();
    }

    public function getAllListPendingRequest()
    {
        switch (session()->get('role')) {
            case session()->get('props')->roleSubPengadaan:
                $where = "WHERE $this->table.tgl_persetujuan_subbag IS NULL";
                break;
            case session()->get('props')->roleKabag:
                $where = "WHERE $this->table.tgl_persetujuan_bag IS NULL";
                break;
        }
        $sql = "SELECT
            $this->table.id,
            unit.nama_unit,
            pegawai.nama_pegawai,
            $this->table.tipe_pengadaan,
            $this->table.jenis_kegiatan,
            $this->table.isi_permintaan,
            $this->table.tgl_pengajuan,
            $this->table.status,
            (CASE $this->table.status
                WHEN 0 THEN
                    'Belum Disetujui'
                WHEN 1 THEN
                    'Disetujui Subbag'
                WHEN 2 THEN
                    'Disetujui Kabag'
                WHEN 3 THEN
                    'Disetujui Karoum'
            END) AS keterangan
        FROM $this->table 
        LEFT JOIN pegawai ON $this->table.id_pegawai = pegawai.id
        LEFT JOIN unit ON $this->table.id_unit = unit.id
        LEFT JOIN sub_unit ON $this->table.id_subunit = sub_unit.id " . $where;
        $query = $this->db->query($sql);
        return $query->getResult();
    }

    public function getTotalPendingRequest()
    {
        $query = $this->db->query("SELECT
            count(*) AS total 
        FROM $this->table 
        LEFT JOIN pegawai ON $this->table.id_pegawai = pegawai.id
        LEFT JOIN unit ON $this->table.id_unit = unit.id
        LEFT JOIN sub_unit ON $this->table.id_subunit = sub_unit.id
        WHERE $this->table.status = '0'");
        return $query->getResult();
    }

    public function getCompleteRequest($id_unit, $id_subunit)
    {
        $query = $this->db->query("SELECT count(*) AS total 
        FROM $this->table 
        WHERE id_unit = '$id_unit'
        AND id_subunit = '$id_subunit'
        AND $this->table.tgl_persetujuan_subbag IS NOT NULL
        AND $this->table.tgl_persetujuan_bag IS NOT NULL");
        return $query->getFirstRow();
    }

    public function getListCompleteRequest($id_unit, $id_subunit)
    {
        $query = $this->db->query("SELECT
            pegawai.nama_pegawai,
            $this->table.tipe_pengadaan,
            $this->table.jenis_kegiatan,
            $this->table.isi_permintaan,
            $this->table.tgl_persetujuan_subbag,
            $this->table.tgl_persetujuan_bag,
            $this->table.tgl_pengajuan
        FROM $this->table 
        LEFT JOIN pegawai ON $this->table.id_pegawai = pegawai.id
        LEFT JOIN unit ON $this->table.id_unit = unit.id
        LEFT JOIN sub_unit ON $this->table.id_subunit = sub_unit.id
        WHERE $this->table.id_unit = '$id_unit'
        AND $this->table.id_subunit = '$id_subunit'
        AND $this->table.tgl_persetujuan_subbag IS NOT NULL
        AND $this->table.tgl_persetujuan_bag IS NOT NULL
        ORDER BY $this->table.tgl_pengajuan DESC");
        return $query->getResult();
    }

    public function findByKegiatan($jenis)
    {
        $query = $this->db->query("SELECT 
            *
        FROM $this->table
        WHERE jenis_kegiatan = '$jenis'");
        return $query->getResult();
    }
}
