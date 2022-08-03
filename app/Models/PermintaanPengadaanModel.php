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

    public function getPendingRequest($id_unit, $id_subunit)
    {
        $query = $this->db->query("SELECT count(*) AS total 
        FROM permintaan_pengadaan 
        WHERE id_unit = '$id_unit'
        AND id_subunit = '$id_subunit'
        AND (permintaan_pengadaan.tgl_persetujuan_subbag IS NULL
        OR permintaan_pengadaan.tgl_persetujuan_bag IS NULL)");
        return $query->getFirstRow();
    }

    public function getListPendingRequestUnit($id_unit, $id_subunit)
    {
        $query = $this->db->query("SELECT
            pegawai.nama_pegawai,
            permintaan_pengadaan.tipe_pengadaan,
            permintaan_pengadaan.jenis_kegiatan,
            permintaan_pengadaan.isi_permintaan,
            permintaan_pengadaan.tgl_pengajuan,
            permintaan_pengadaan.status
        FROM permintaan_pengadaan 
        LEFT JOIN pegawai ON permintaan_pengadaan.id_pegawai = pegawai.id
        LEFT JOIN unit ON permintaan_pengadaan.id_unit = unit.id
        LEFT JOIN sub_unit ON permintaan_pengadaan.id_subunit = sub_unit.id
        WHERE permintaan_pengadaan.id_unit = '$id_unit'
        AND permintaan_pengadaan.id_subunit = '$id_subunit'
        AND (permintaan_pengadaan.tgl_persetujuan_subbag IS NULL
        OR permintaan_pengadaan.tgl_persetujuan_bag IS NULL)");
        return $query->getResult();
    }

    public function getAllListPendingRequest()
    {
        switch (session()->get('role')) {
            case session()->get('props')->roleSubPengadaan:
                $where = "WHERE permintaan_pengadaan.tgl_persetujuan_subbag IS NULL";
                break;
            case session()->get('props')->roleKabag:
                $where = "WHERE permintaan_pengadaan.tgl_persetujuan_bag IS NULL";
                break;
        }
        $sql = "SELECT
            permintaan_pengadaan.id,
            unit.nama_unit,
            pegawai.nama_pegawai,
            permintaan_pengadaan.tipe_pengadaan,
            permintaan_pengadaan.jenis_kegiatan,
            permintaan_pengadaan.isi_permintaan,
            permintaan_pengadaan.tgl_pengajuan,
            permintaan_pengadaan.status
        FROM permintaan_pengadaan 
        LEFT JOIN pegawai ON permintaan_pengadaan.id_pegawai = pegawai.id
        LEFT JOIN unit ON permintaan_pengadaan.id_unit = unit.id
        LEFT JOIN sub_unit ON permintaan_pengadaan.id_subunit = sub_unit.id " . $where;
        $query = $this->db->query($sql);
        return $query->getResult();
    }

    public function getTotalPendingRequest()
    {
        $query = $this->db->query("SELECT
            count(*) AS total 
        FROM permintaan_pengadaan 
        LEFT JOIN pegawai ON permintaan_pengadaan.id_pegawai = pegawai.id
        LEFT JOIN unit ON permintaan_pengadaan.id_unit = unit.id
        LEFT JOIN sub_unit ON permintaan_pengadaan.id_subunit = sub_unit.id
        WHERE permintaan_pengadaan.status = 'Belum Disetujui'");
        return $query->getResult();
    }

    public function getRiwayatPengadaan()
    {
        switch (session()->get('role')) {
            case session()->get('props')->roleSubPengadaan:
                $where = "WHERE permintaan_pengadaan.tgl_persetujuan_subbag IS NOT NULL";
                break;
            case session()->get('props')->roleKabag:
                $where = "WHERE permintaan_pengadaan.tgl_persetujuan_bag IS NOT NULL";
                break;
        }
        $sql = "SELECT
            unit.nama_unit,
            pegawai.nama_pegawai,
            permintaan_pengadaan.tipe_pengadaan,
            permintaan_pengadaan.jenis_kegiatan,
            permintaan_pengadaan.isi_permintaan,
            permintaan_pengadaan.tgl_pengajuan,
            permintaan_pengadaan.status
        FROM permintaan_pengadaan 
        LEFT JOIN pegawai ON permintaan_pengadaan.id_pegawai = pegawai.id
        LEFT JOIN unit ON permintaan_pengadaan.id_unit = unit.id
        LEFT JOIN sub_unit ON permintaan_pengadaan.id_subunit = sub_unit.id " . $where;
        $query = $this->db->query($sql);
        return $query->getResult();
    }

    public function getCompleteRequest($id_unit, $id_subunit)
    {
        $query = $this->db->query("SELECT count(*) AS total 
        FROM permintaan_pengadaan 
        WHERE id_unit = '$id_unit'
        AND id_subunit = '$id_subunit'
        AND permintaan_pengadaan.tgl_persetujuan_subbag IS NOT NULL
        AND permintaan_pengadaan.tgl_persetujuan_bag IS NOT NULL");
        return $query->getFirstRow();
    }

    public function getListCompleteRequest($id_unit, $id_subunit)
    {
        $query = $this->db->query("SELECT
            pegawai.nama_pegawai,
            permintaan_pengadaan.tipe_pengadaan,
            permintaan_pengadaan.jenis_kegiatan,
            permintaan_pengadaan.isi_permintaan,
            permintaan_pengadaan.tgl_persetujuan_subbag,
            permintaan_pengadaan.tgl_persetujuan_bag,
            permintaan_pengadaan.tgl_pengajuan
        FROM permintaan_pengadaan 
        LEFT JOIN pegawai ON permintaan_pengadaan.id_pegawai = pegawai.id
        LEFT JOIN unit ON permintaan_pengadaan.id_unit = unit.id
        LEFT JOIN sub_unit ON permintaan_pengadaan.id_subunit = sub_unit.id
        WHERE permintaan_pengadaan.id_unit = '$id_unit'
        AND permintaan_pengadaan.id_subunit = '$id_subunit'
        AND permintaan_pengadaan.tgl_persetujuan_subbag IS NOT NULL
        AND permintaan_pengadaan.tgl_persetujuan_bag IS NOT NULL");
        return $query->getResult();
    }
}
