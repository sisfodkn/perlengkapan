<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Properties extends BaseConfig
{
    // Tombol
    public $tombol_submit = "Submit";
    public $tombol_reset = "Reset";
    public $tombol_edit = "Edit";
    public $tombol_delete = "Delete";

    // Label
    public $nip = "NIP / NRP";
    public $nama_pegawai = "Nama Pegawai";
    public $pangkat = "Pangkat";
    public $jabatan = "Jabatan";
    public $unit_kerja = "Unit Kerja";
    public $subunit_kerja = "Sub Unit Kerja";
    public $nama_jabatan = "Nama Jabatan";
    public $nama_unit = "Nama Unit";
    public $nama_subunit = "Nama Sub Unit";
    public $nama_atk = "Nama ATK";
    public $kategori_atk = "Kategori ATK";
    public $username = "Username";
    public $password = "Password";
    public $ulangPassword = "Ulangi Password";
    public $role = "Role";

    // Menu Anggaran
    public $menuAnggaranUmum = 'anggaran-umum';
    public $menuAnggaranDipa = 'anggaran-dipa';
    public $menuAnggaranRealisasi = 'anggaran-realisasi';
    public $menuAnggaran = [
        'anggaran-umum',
        'anggaran-dipa',
        'anggaran-realisasi',
    ];

    // Menu Utama
    public $menuPegawai = [
        'utama-pegawai-data',
        'utama-pegawai-tambah',
        'utama-pegawai-ubah',
    ];
    public $menuJabatan = [
        'utama-jabatan-data',
        'utama-jabatan-tambah',
        'utama-jabatan-ubah',
    ];
    public $menuUnit = [
        'utama-unit-data',
        'utama-unit-tambah',
        'utama-unit-ubah',
    ];
    public $menuSubUnit = [
        'utama-subunit-data',
        'utama-subunit-tambah',
        'utama-subunit-ubah',
    ];
    public $menuAtk = [
        'utama-atk-data',
        'utama-atk-tambah',
        'utama-atk-ubah',
    ];
    public $menuKegiatan = [
        'utama-kegiatan-data',
        'utama-kegiatan-tambah',
        'utama-kegiatan-ubah',
    ];
    public $menuUser = [
        'utama-user-data',
        'utama-user-tambah',
        'utama-user-ubah',
    ];
    public $menuUtama = [
        'utama-pegawai-data',
        'utama-pegawai-tambah',
        'utama-pegawai-ubah',
        'utama-jabatan-data',
        'utama-jabatan-tambah',
        'utama-jabatan-ubah',
        'utama-unit-data',
        'utama-unit-tambah',
        'utama-unit-ubah',
        'utama-subunit-data',
        'utama-subunit-tambah',
        'utama-subunit-ubah',
        'utama-atk-data',
        'utama-atk-tambah',
        'utama-atk-ubah',
        'utama-kegiatan-data',
        'utama-kegiatan-tambah',
        'utama-kegiatan-ubah',
        'utama-user-data',
        'utama-user-tambah',
        'utama-user-ubah',
    ];

    // Menu Randis
    public $menuKendaraan = [
        'randis-kendaraan-data',
        'randis-kendaraan-tambah',
        'randis-kendaraan-ubah',
    ];
    public $menuDistRandis = [
        'randis-distrandis-data',
        'randis-distrandis-tambah',
        'randis-distrandis-ubah',
    ];
    public $menuJenisops = [
        'randis-jenisops-data',
        'randis-jenisops-tambah',
        'randis-jenisops-ubah',
    ];
    public $menuRandis = [
        'randis-pendahuluan',
        'randis-kendaraan-data',
        'randis-kendaraan-tambah',
        'randis-kendaraan-ubah',
        'randis-distrandis-data',
        'randis-distrandis-tambah',
        'randis-distrandis-ubah',
        'randis-jenisops-data',
        'randis-jenisops-tambah',
        'randis-jenisops-ubah',
    ];

    // Menu BMN
    public $menuGedung = [
        'bmn-gedung-data',
        'bmn-gedung-tambah',
        'bmn-gedung-ubah',
    ];
    public $menuRuangan = [
        'bmn-ruangan-data',
        'bmn-ruangan-tambah',
        'bmn-ruangan-ubah',
    ];
    public $menuAlat = [
        'bmn-alat-data',
        'bmn-alat-tambah',
        'bmn-alat-ubah',
    ];
    public $menuDistAlat = [
        'bmn-distalat-data',
        'bmn-distalat-tambah',
        'bmn-distalat-ubah',
    ];
    public $menuKatRuangan = [
        'bmn-katruangan-data',
        'bmn-katruangan-tambah',
        'bmn-katruangan-ubah',
    ];
    public $menuBMN = [
        'bmn-pendahuluan',
        'bmn-gedung-data',
        'bmn-gedung-tambah',
        'bmn-gedung-ubah',
        'bmn-ruangan-data',
        'bmn-ruangan-tambah',
        'bmn-ruangan-ubah',
        'bmn-alat-data',
        'bmn-alat-tambah',
        'bmn-alat-ubah',
        'bmn-distalat-data',
        'bmn-distalat-tambah',
        'bmn-distalat-ubah',
        'bmn-katruangan-data',
        'bmn-katruangan-tambah',
        'bmn-katruangan-ubah',
    ];

    // Menu Pengadaan masuk
    public $menuPengadaanReq = [
        'pengadaan-atk-req',
        'pengadaan-cetakan-req'
    ];

    // Menu Pengadaan
    public $menuPengadaan = [
        'pengadaan-atk',
        'pengadaan-cetakan'
    ];

    // Menu Permintaan
    public $menuPermintaan = [
        'permintaan-rupat',
        'permintaan-alat',
        'permintaan-randis'
    ];

    // Menu Pemeliharaan
    public $menuPemeliharaan = [
        'pemeliharaan-gedung',
        'pemeliharaan-randis',
        'pemeliharaan-alat'
    ];
}
