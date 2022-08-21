<?php

namespace App\Models;

use CodeIgniter\Model;

class DistribusiPermintaanPengadaanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'distribusi_permintaan_pengadaan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_permintaan_pengadaan',
        'status',
        'tgl_kirim',
        'tgl_terkirim',
        'tgl_terima'
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

    public function findByReqId($reqId)
    {
        $query = $this->db->query("SELECT id
            FROM $this->table
            WHERE $this->table.id_permintaan_pengadaan = $reqId");
        return $query->getFirstRow();
    }

    public function getTotalPendingStatus()
    {
        $query = $this->db->query("SELECT count(*) AS total
            FROM $this->table
            WHERE $this->table.status = 0");
        return $query->getFirstRow();
    }

    public function getAllPendingStatus()
    {
        $sql = "SELECT permintaan_pengadaan.tgl_pengajuan,
            sub_unit.nama_subunit,
            permintaan_pengadaan.tipe_pengadaan,
            permintaan_pengadaan.jenis_kegiatan,
            permintaan_pengadaan.isi_permintaan,
            permintaan_pengadaan.tgl_persetujuan_subbag,
            permintaan_pengadaan.tgl_persetujuan_bag,
            permintaan_pengadaan.status AS status_persetujuan,
            (CASE permintaan_pengadaan.status
                WHEN 0 THEN 'Belum Disetujui'
                WHEN 1 THEN 'Disetujui Subbag'
                WHEN 2 THEN 'Disetujui Kabag'
                WHEN 3 THEN 'Disetujui Karoum'
                ELSE ''
            END) AS keterangan_persetujuan,
            distribusi_permintaan_pengadaan.tgl_kirim,
            distribusi_permintaan_pengadaan.tgl_terkirim,
            distribusi_permintaan_pengadaan.tgl_terima,
            distribusi_permintaan_pengadaan.status AS status_kirim,
            (CASE distribusi_permintaan_pengadaan.status
                WHEN 0 THEN 'Perlu Dikirim'
                WHEN 1 THEN 'Sedang Dikirim'
                WHEN 2 THEN 'Sudah Terkirim'
                WHEN 3 THEN 'Sudah Diterima'
                ELSE 'Belum Dapat Dikirim'
            END) AS keterangan_kirim
        FROM distribusi_permintaan_pengadaan
        JOIN permintaan_pengadaan ON permintaan_pengadaan.id = distribusi_permintaan_pengadaan.id_permintaan_pengadaan
        LEFT JOIN sub_unit ON permintaan_pengadaan.id_subunit = sub_unit.id
        WHERE distribusi_permintaan_pengadaan.tgl_terima IS NULL
        ORDER BY permintaan_pengadaan.tgl_pengajuan DESC";
        $query = $this->db->query($sql);
        return $query->getResult();
    }

    public function findPendingDistribusi()
    {
        $query = $this->db->query("SELECT $this->table.id,
            permintaan_pengadaan.tgl_pengajuan,
            sub_unit.nama_subunit,
            permintaan_pengadaan.tipe_pengadaan,
            permintaan_pengadaan.jenis_kegiatan,
            permintaan_pengadaan.isi_permintaan,
            $this->table.tgl_kirim,
            $this->table.status,
            (CASE $this->table.status
                WHEN 0 THEN 'Perlu Dikirim'
                WHEN 1 THEN 'Sedang Dikirim'
                WHEN 2 THEN 'Sudah Terkirim'
                WHEN 3 THEN 'Sudah Diterima'
                ELSE ''
            END) AS keterangan
            FROM $this->table
            JOIN permintaan_pengadaan ON permintaan_pengadaan.id = $this->table.id_permintaan_pengadaan
            LEFT JOIN pegawai ON permintaan_pengadaan.id_pegawai = pegawai.id
            LEFT JOIN unit ON permintaan_pengadaan.id_unit = unit.id
            LEFT JOIN sub_unit ON permintaan_pengadaan.id_subunit = sub_unit.id
            WHERE $this->table.status = 0
            OR $this->table.status = 1");
        return $query->getResult();
    }

    public function getAllRiwayat()
    {
        $sql = "SELECT permintaan_pengadaan.tgl_pengajuan,
            sub_unit.nama_subunit,
            permintaan_pengadaan.tipe_pengadaan,
            permintaan_pengadaan.jenis_kegiatan,
            permintaan_pengadaan.isi_permintaan,
            permintaan_pengadaan.tgl_persetujuan_subbag,
            permintaan_pengadaan.tgl_persetujuan_bag,
            permintaan_pengadaan.status AS status_persetujuan,
            (CASE permintaan_pengadaan.status
                WHEN 0 THEN 'Belum Disetujui'
                WHEN 1 THEN 'Disetujui Subbag'
                WHEN 2 THEN 'Disetujui Kabag'
                WHEN 3 THEN 'Disetujui Karoum'
                ELSE ''
            END) AS keterangan_persetujuan,
            distribusi_permintaan_pengadaan.tgl_kirim,
            distribusi_permintaan_pengadaan.tgl_terkirim,
            distribusi_permintaan_pengadaan.tgl_terima,
            distribusi_permintaan_pengadaan.status AS status_kirim,
            (CASE distribusi_permintaan_pengadaan.status
                WHEN 0 THEN 'Perlu Dikirim'
                WHEN 1 THEN 'Sedang Dikirim'
                WHEN 2 THEN 'Sudah Terkirim'
                WHEN 3 THEN 'Sudah Diterima'
                ELSE 'Belum Dapat Dikirim'
            END) AS keterangan_kirim
        FROM distribusi_permintaan_pengadaan
        JOIN permintaan_pengadaan ON permintaan_pengadaan.id = distribusi_permintaan_pengadaan.id_permintaan_pengadaan
        LEFT JOIN sub_unit ON permintaan_pengadaan.id_subunit = sub_unit.id
        WHERE distribusi_permintaan_pengadaan.tgl_terima IS NOT NULL
        ORDER BY permintaan_pengadaan.tgl_pengajuan DESC";
        $query = $this->db->query($sql);
        return $query->getResult();
    }

    public function getRiwayatPengguna($id_subunit)
    {
        $sql = "SELECT permintaan_pengadaan.tgl_pengajuan,
            sub_unit.nama_subunit,
            permintaan_pengadaan.tipe_pengadaan,
            permintaan_pengadaan.jenis_kegiatan,
            permintaan_pengadaan.isi_permintaan,
            permintaan_pengadaan.tgl_persetujuan_subbag,
            permintaan_pengadaan.tgl_persetujuan_bag,
            permintaan_pengadaan.status AS status_persetujuan,
            'Disetujui Kabag' AS keterangan_persetujuan,
            distribusi_permintaan_pengadaan.tgl_kirim,
            distribusi_permintaan_pengadaan.tgl_terkirim,
            distribusi_permintaan_pengadaan.tgl_terima,
            distribusi_permintaan_pengadaan.status AS status_kirim,
            'Sudah Diterima' AS keterangan_kirim
        FROM distribusi_permintaan_pengadaan
        JOIN permintaan_pengadaan ON permintaan_pengadaan.id = distribusi_permintaan_pengadaan.id_permintaan_pengadaan
        LEFT JOIN sub_unit ON permintaan_pengadaan.id_subunit = sub_unit.id
        WHERE permintaan_pengadaan.id_subunit = '$id_subunit'
        AND distribusi_permintaan_pengadaan.tgl_terima IS NOT NULL
        AND distribusi_permintaan_pengadaan.status = '3'
        ORDER BY permintaan_pengadaan.tgl_pengajuan DESC";
        $query = $this->db->query($sql);
        return $query->getResult();
    }

    public function getTotalPendingUnit($id_unit, $id_subunit)
    {
        $query = $this->db->query("SELECT count(*) AS total 
            FROM distribusi_permintaan_pengadaan
            RIGHT JOIN permintaan_pengadaan ON permintaan_pengadaan.id = distribusi_permintaan_pengadaan.id_permintaan_pengadaan
            LEFT JOIN unit ON permintaan_pengadaan.id_unit = unit.id
            LEFT JOIN sub_unit ON permintaan_pengadaan.id_subunit = sub_unit.id
            WHERE permintaan_pengadaan.id_unit = '$id_unit'
            AND permintaan_pengadaan.id_subunit = '$id_subunit'
            AND IF(permintaan_pengadaan.tgl_persetujuan_bag IS NULL, 
                permintaan_pengadaan.tgl_persetujuan_bag IS NULL, 
                distribusi_permintaan_pengadaan.tgl_terima IS NULL)");
        return $query->getFirstRow();
    }

    public function getAllPendingUnit($id_unit, $id_subunit)
    {
        $query = $this->db->query("SELECT distribusi_permintaan_pengadaan.id,
            permintaan_pengadaan.tgl_pengajuan,
            sub_unit.nama_subunit,
            pegawai.nama_pegawai,
            permintaan_pengadaan.tipe_pengadaan,
            permintaan_pengadaan.jenis_kegiatan,
            permintaan_pengadaan.isi_permintaan,
            permintaan_pengadaan.tgl_persetujuan_subbag,
            permintaan_pengadaan.tgl_persetujuan_bag,
            distribusi_permintaan_pengadaan.tgl_kirim,
            distribusi_permintaan_pengadaan.tgl_terkirim,
            distribusi_permintaan_pengadaan.tgl_terima,
            permintaan_pengadaan.status AS status_persetujuan,
            distribusi_permintaan_pengadaan.status AS status_kirim,
            (CASE
                WHEN distribusi_permintaan_pengadaan.status IS NULL
                    THEN (CASE
                            WHEN permintaan_pengadaan.status = '0' 
                                THEN 'Belum Disetujui'
                            WHEN permintaan_pengadaan.status = '1' 
                                THEN 'Disetujui Subbag'
                            WHEN permintaan_pengadaan.status = '2' 
                                THEN 'Disetujui Kabag & Menunggu Dikirim'
                        END)
                WHEN distribusi_permintaan_pengadaan.status IS NOT NULL
                    THEN (CASE
                            WHEN distribusi_permintaan_pengadaan.status = '0' 
                                THEN 'Disetujui Kabag & Menunggu Dikirim'
                            WHEN distribusi_permintaan_pengadaan.status = '1' 
                                THEN 'Sedang Dikirim'
                            WHEN distribusi_permintaan_pengadaan.status = '2' 
                                THEN 'Sudah Terkirim'
                        END)
            END) AS keterangan
        FROM distribusi_permintaan_pengadaan
        RIGHT JOIN permintaan_pengadaan ON permintaan_pengadaan.id = distribusi_permintaan_pengadaan.id_permintaan_pengadaan
        LEFT JOIN sub_unit ON permintaan_pengadaan.id_subunit = sub_unit.id
        JOIN pegawai ON pegawai.id = permintaan_pengadaan.id_pegawai
        WHERE permintaan_pengadaan.id_unit = '$id_unit'
        AND permintaan_pengadaan.id_subunit = '$id_subunit'
        AND IF(permintaan_pengadaan.tgl_persetujuan_bag IS NULL, 
                permintaan_pengadaan.tgl_persetujuan_bag IS NULL, 
                distribusi_permintaan_pengadaan.tgl_terima IS NULL)");
        return $query->getResult();
    }
}
