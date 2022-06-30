<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>" class="brand-link">
        <img src="<?php echo base_url(); ?>/dist/img/logo-wtn.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light" style="padding-left: 3px;">Layanan</span>
        <br />
        <span class="brand-text font-weight-light" style="padding-left: 50px;">Perlengkapan</span>
        <br />
        <span class="brand-text font-weight-light" style="padding-left: 50px;">Terpadu</span>
    </a>


    <?php
    $menuUtama = [
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
        'utama-user-data',
        'utama-user-tambah'
    ];
    $menuPegawai = [
        'utama-pegawai-data',
        'utama-pegawai-tambah',
        'utama-pegawai-ubah'
    ];
    $menuJabatan = [
        'utama-jabatan-data',
        'utama-jabatan-tambah',
        'utama-jabatan-ubah'
    ];
    $menuUnit = [
        'utama-unit-data',
        'utama-unit-tambah',
        'utama-unit-ubah'
    ];
    $menuSubUnit = [
        'utama-subunit-data',
        'utama-subunit-tambah',
        'utama-subunit-ubah'
    ];
    $menuAtk = [
        'utama-atk-data',
        'utama-atk-tambah',
        'utama-atk-ubah'
    ];
    $menuKegiatan = [
        'utama-kegiatan-data',
        'utama-kegiatan-tambah'
    ];
    $menuUser = [
        'utama-user-data',
        'utama-user-tambah'
    ];

    $menuPengadaan = [
        'pengadaan-atk',
        'pengadaan-cetakan'
    ];
    ?>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>" class="nav-link <?php if ($activeMenu == 'dashboard') echo "active" ?>">
                        <i class="nav-icon fa-solid fa-gauge-high"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">Data & Informasi</li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?php if (in_array($activeMenu, [
                                                    'struktur-umum',
                                                    'struktur-dipa',
                                                    'struktur-realisasi'
                                                ])) echo "active" ?>">
                        <i class="nav-icon fa-solid fa-folder-tree"></i>
                        <p>
                            Struktur Anggaran
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" style="padding-left: 30px;" class="nav-link <?php if ($activeMenu == 'struktur-umum') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Umum</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" style="padding-left: 30px;" class="nav-link <?php if ($activeMenu == 'struktur-dipa') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>DIPA 2022</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" style="padding-left: 30px;" class="nav-link <?php if ($activeMenu == 'struktur-realisasi') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Realisasi Anggaran</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?php if (in_array($activeMenu, $menuUtama)) echo "menu-open" ?>">
                    <a href="#" class="nav-link <?php if (in_array($activeMenu, $menuUtama)) echo "active" ?>">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Data Utama
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item <?php if (in_array($activeMenu, $menuPegawai)) echo "menu-open" ?>">
                            <a style="padding-left: 30px;" class="nav-link <?php if (in_array($activeMenu, $menuPegawai)) echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Pegawai</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="<?php echo base_url('data-pegawai'); ?>" class="nav-link <?php if (in_array($activeMenu, ['utama-pegawai-data', 'utama-pegawai-ubah'])) echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Pegawai</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="<?php echo base_url('input-pegawai'); ?>" class="nav-link <?php if ($activeMenu == 'utama-pegawai-tambah') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Pegawai</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?php if (in_array($activeMenu, $menuJabatan)) echo "menu-open" ?>">
                            <a style="padding-left: 30px;" class="nav-link <?php if (in_array($activeMenu, $menuJabatan)) echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Jabatan</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="<?php echo base_url('data-jabatan'); ?>" class="nav-link <?php if (in_array($activeMenu, ['utama-jabatan-data', 'utama-jabatan-ubah'])) echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Jabatan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="<?php echo base_url('input-jabatan'); ?>" class="nav-link <?php if ($activeMenu == 'utama-jabatan-tambah')  echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Jabatan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?php if (in_array($activeMenu, $menuUnit)) echo "menu-open" ?>">
                            <a style="padding-left: 30px;" class="nav-link <?php if (in_array($activeMenu, $menuUnit)) echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Unit Kerja</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="<?php echo base_url('data-unit'); ?>" class="nav-link <?php if (in_array($activeMenu, ['utama-unit-data', 'utama-unit-ubah'])) echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Unit Kerja</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="<?php echo base_url('input-unit'); ?>" class="nav-link <?php if ($activeMenu == 'utama-unit-tambah') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Unit Kerja</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?php if (in_array($activeMenu, $menuSubUnit)) echo "menu-open" ?>">
                            <a style="padding-left: 30px;" class="nav-link <?php if (in_array($activeMenu, $menuSubUnit)) echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Sub Unit Kerja</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="<?php echo base_url('data-subunit'); ?>" class="nav-link <?php if (in_array($activeMenu, ['utama-subunit-data', 'utama-subunit-ubah'])) echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Sub Unit Kerja</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="<?php echo base_url('input-subunit'); ?>" class="nav-link <?php if ($activeMenu == 'utama-subunit-tambah') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Sub Unit Kerja</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?php if (in_array($activeMenu, $menuAtk)) echo "menu-open" ?>">
                            <a style="padding-left: 30px;" class="nav-link <?php if (in_array($activeMenu, $menuAtk)) echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>ATK</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="<?php echo base_url('data-atk'); ?>" class="nav-link <?php if (in_array($activeMenu, ['utama-atk-data', 'utama-atk-ubah'])) echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data ATK</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="<?php echo base_url('input-atk'); ?>" class="nav-link <?php if ($activeMenu == 'utama-atk-tambah') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah ATK</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?php if (in_array($activeMenu, $menuKegiatan)) echo "menu-open" ?>">
                            <a style="padding-left: 30px;" class="nav-link <?php if (in_array($activeMenu, $menuKegiatan)) echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Kegiatan</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="<?php echo base_url('data-kegiatan'); ?>" class="nav-link <?php if ($activeMenu == 'utama-kegiatan-data') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Kegiatan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="#" class="nav-link <?php if ($activeMenu == 'utama-kegiatan-tambah') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Kegiatan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?php if (in_array($activeMenu, $menuUser)) echo "menu-open" ?>">
                            <a style="padding-left: 30px;" class="nav-link <?php if (in_array($activeMenu, $menuUser)) echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>User</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="<?php echo base_url('data-user'); ?>" class="nav-link <?php if ($activeMenu == 'utama-user-data') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data User</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="<?php echo base_url('input-user'); ?>" class="nav-link <?php if ($activeMenu == 'utama-user-tambah') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah User</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?php if (in_array($activeMenu, [
                                                    'randis-pendahuluan',
                                                    'randis-data',
                                                    'randis-data-data',
                                                    'randis-data-tambah',
                                                    'randis-distribusi',
                                                    'randis-distribusi-data',
                                                    'randis-distribusi-tambah',
                                                    'randis-jenis',
                                                    'randis-jenis-data',
                                                    'randis-jenis-tambah'
                                                ])) echo "active" ?>">
                        <i class="nav-icon fa-solid fa-car"></i>
                        <p>
                            Data Kendaraan Dinas
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" style="padding-left: 30px;" class="nav-link <?php if ($activeMenu == 'randis-pendahuluan') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Pendahuluan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" style="padding-left: 30px;" class="nav-link <?php if ($activeMenu == 'randis-data') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Kendaraan Dinas</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="#" class="nav-link <?php if ($activeMenu == 'randis-data-data') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Randis</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="#" class="nav-link <?php if ($activeMenu == 'randis-data-tambah') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Randis</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" style="padding-left: 30px;" class="nav-link <?php if ($activeMenu == 'randis-distribusi') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Distribusi Randis</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="#" class="nav-link <?php if ($activeMenu == 'randis-distribusi-data') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Distribusi Randis</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="#" class="nav-link <?php if ($activeMenu == 'randis-distribusi-tambah') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Distribusi Randis</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" style="padding-left: 30px;" class="nav-link <?php if ($activeMenu == 'randis-jenis') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Jenis Operasional</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="#" class="nav-link <?php if ($activeMenu == 'randis-jenis-data') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Jenis Ops</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="#" class="nav-link <?php if ($activeMenu == 'randis-jenis-tambah') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Jenis Ops</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?php if (in_array($activeMenu, [
                                                    'bmn-pendahuluan',
                                                    'bmn-gedung',
                                                    'bmn-gedung-data',
                                                    'bmn-gedung-tambah',
                                                    'bmn-ruangan',
                                                    'bmn-ruangan-data',
                                                    'bmn-ruangan-tambah',
                                                    'bmn-alat',
                                                    'bmn-alat-data',
                                                    'bmn-alat-tambah',
                                                    'bmn-distribusi',
                                                    'bmn-distribusi-data',
                                                    'bmn-distribusi-tambah',
                                                    'bmn-kategori-ruangan',
                                                    'bmn-kategori-ruangan-data',
                                                    'bmn-kategori-ruangan-tambah',
                                                ])) echo "active" ?>">
                        <i class="nav-icon fa-solid fa-folder-tree"></i>
                        <p>
                            Data BMN
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" style="padding-left: 30px;" class="nav-link <?php if ($activeMenu == 'bmn-pendahuluan') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Pendahuluan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" style="padding-left: 30px;" class="nav-link <?php if ($activeMenu == 'bmn-gedung') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Gedung</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="#" class="nav-link <?php if ($activeMenu == 'bmn-gedung-data') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Gedung</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="#" class="nav-link <?php if ($activeMenu == 'bmn-gedung-tambah') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Gedung</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" style="padding-left: 30px;" class="nav-link <?php if ($activeMenu == 'bmn-ruangan') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Ruangan</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="#" class="nav-link <?php if ($activeMenu == 'bmn-ruangan-data') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Ruangan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="#" class="nav-link <?php if ($activeMenu == 'bmn-ruangan-tambah') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Ruangan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" style="padding-left: 30px;" class="nav-link <?php if ($activeMenu == 'bmn-alat') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Peralatan & Mesin</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="#" class="nav-link <?php if ($activeMenu == 'bmn-alat-data') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Peralatan & Mesin</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="#" class="nav-link <?php if ($activeMenu == 'bmn-alat-tambah') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Peralatan & Mesin</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" style="padding-left: 30px;" class="nav-link <?php if ($activeMenu == 'bmn-distribusi') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Distribusi Alat & Mesin</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="#" class="nav-link <?php if ($activeMenu == 'bmn-distribusi-data') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Dist Alat & Mesin</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="#" class="nav-link <?php if ($activeMenu == 'bmn-distribusi-tambah') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Dist Alat & Mesin</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" style="padding-left: 30px;" class="nav-link <?php if ($activeMenu == 'bmn-kategori-ruangan') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Kategori Ruangan</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="#" class="nav-link <?php if ($activeMenu == 'bmn-kategori-ruangan-data') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Kat Ruangan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a style="padding-left: 40px;" href="#" class="nav-link <?php if ($activeMenu == 'bmn-kategori-ruangan-tambah') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Kat Ruangan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Permintaan Layanan</li>
                <li class="nav-item <?php if (in_array($activeMenu, $menuPengadaan)) echo "menu-open" ?>">
                    <a href="#" class="nav-link <?php if (in_array($activeMenu, $menuPengadaan)) echo "active" ?>">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Pengadaan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a style="padding-left: 30px;" href="<?php echo base_url('pengadaan-atk'); ?>" class="nav-link <?php if ($activeMenu == 'pengadaan-atk') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>ATK</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a style="padding-left: 30px;" href="<?php echo base_url('pengadaan-cetakan'); ?>" class="nav-link <?php if ($activeMenu == 'pengadaan-cetakan') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Cetakan</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>