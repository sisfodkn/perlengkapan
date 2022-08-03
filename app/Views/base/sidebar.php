<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>" class="brand-link">
        <img src="<?php echo base_url(); ?>/dist/img/logo-wtn.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light" style="padding-left: 3px;">SILAPER</span>
        <br />
        <!-- <span class="brand-text font-weight-light" style="padding-left: 50px;">Perlengkapan</span>
        <br />
        <span class="brand-text font-weight-light" style="padding-left: 50px;">Terpadu</span> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block"><?= session()->get('nama_pegawai') ?></a>
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
                <li class="nav-item <?php if (in_array($activeMenu, session()->get('props')->menuAnggaran)) echo "menu-open" ?>">
                    <a href="#" class="nav-link <?php if (in_array($activeMenu, session()->get('props')->menuAnggaran)) echo "active" ?>">
                        <i class="nav-icon fa-solid fa-folder-tree"></i>
                        <p>
                            Struktur Anggaran
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('anggaran-umum'); ?>" style="padding-left: 30px;" class="nav-link <?php if ($activeMenu == session()->get('props')->menuAnggaranUmum) echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Umum</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('anggaran-dipa'); ?>" style="padding-left: 30px;" class="nav-link <?php if ($activeMenu == session()->get('props')->menuAnggaranDipa) echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>DIPA 2022</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('realisasi-anggaran'); ?>" style="padding-left: 30px;" class="nav-link <?php if ($activeMenu == session()->get('props')->menuAnggaranRealisasi) echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Realisasi Anggaran</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php if (session()->get('role') == 'Administrator') : ?>
                    <li class="nav-item <?php if (in_array($activeMenu, session()->get('props')->menuUtama)) echo "menu-open" ?>">
                        <a href="#" class="nav-link <?php if (in_array($activeMenu, session()->get('props')->menuUtama)) echo "active" ?>">
                            <i class="nav-icon fa-solid fa-users"></i>
                            <p>
                                Data Utama
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item <?php if (in_array($activeMenu, session()->get('props')->menuPegawai)) echo "menu-open" ?>">
                                <a style="padding-left: 30px;" class="nav-link <?php if (in_array($activeMenu, session()->get('props')->menuPegawai)) echo "active" ?>">
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
                            <li class="nav-item <?php if (in_array($activeMenu, session()->get('props')->menuJabatan)) echo "menu-open" ?>">
                                <a style="padding-left: 30px;" class="nav-link <?php if (in_array($activeMenu, session()->get('props')->menuJabatan)) echo "active" ?>">
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
                            <li class="nav-item <?php if (in_array($activeMenu, session()->get('props')->menuUnit)) echo "menu-open" ?>">
                                <a style="padding-left: 30px;" class="nav-link <?php if (in_array($activeMenu, session()->get('props')->menuUnit)) echo "active" ?>">
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
                            <li class="nav-item <?php if (in_array($activeMenu, session()->get('props')->menuSubUnit)) echo "menu-open" ?>">
                                <a style="padding-left: 30px;" class="nav-link <?php if (in_array($activeMenu, session()->get('props')->menuSubUnit)) echo "active" ?>">
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
                            <li class="nav-item <?php if (in_array($activeMenu, session()->get('props')->menuAtk)) echo "menu-open" ?>">
                                <a style="padding-left: 30px;" class="nav-link <?php if (in_array($activeMenu, session()->get('props')->menuAtk)) echo "active" ?>">
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
                            <li class="nav-item <?php if (in_array($activeMenu, session()->get('props')->menuKegiatan)) echo "menu-open" ?>">
                                <a style="padding-left: 30px;" class="nav-link <?php if (in_array($activeMenu, session()->get('props')->menuKegiatan)) echo "active" ?>">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Kegiatan</p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a style="padding-left: 40px;" href="<?php echo base_url('data-kegiatan'); ?>" class="nav-link <?php if (in_array($activeMenu, ['utama-kegiatan-data', 'utama-kegiatan-ubah'])) echo "active" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data Kegiatan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="padding-left: 40px;" href="<?php echo base_url('input-kegiatan'); ?>" class="nav-link <?php if ($activeMenu == 'utama-kegiatan-tambah') echo "active" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tambah Kegiatan</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item <?php if (in_array($activeMenu, session()->get('props')->menuUser)) echo "menu-open" ?>">
                                <a style="padding-left: 30px;" class="nav-link <?php if (in_array($activeMenu, session()->get('props')->menuUser)) echo "active" ?>">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>User</p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a style="padding-left: 40px;" href="<?php echo base_url('data-user'); ?>" class="nav-link <?php if (in_array($activeMenu, ['utama-user-data', 'utama-user-ubah'])) echo "active" ?>">
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
                    <li class="nav-item <?php if (in_array($activeMenu, session()->get('props')->menuRandis)) echo "menu-open" ?>">
                        <a href="#" class="nav-link <?php if (in_array($activeMenu, session()->get('props')->menuRandis)) echo "active" ?>">
                            <i class="nav-icon fa-solid fa-car"></i>
                            <p>
                                Data Kendaraan Dinas
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('pendahuluan-randis'); ?>" style="padding-left: 30px;" class="nav-link <?php if ($activeMenu == 'randis-pendahuluan') echo "active" ?>">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Pendahuluan</p>
                                </a>
                            </li>
                            <li class="nav-item <?php if (in_array($activeMenu, session()->get('props')->menuKendaraan)) echo "menu-open" ?>">
                                <a href="#" style="padding-left: 30px;" class="nav-link <?php if (in_array($activeMenu, session()->get('props')->menuKendaraan)) echo "active" ?>">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Kendaraan Dinas</p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a style="padding-left: 40px;" href="<?php echo base_url('data-randis'); ?>" class="nav-link <?php if (in_array($activeMenu, ['randis-kendaraan-data', 'randis-kendaraan-ubah'])) echo "active" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data Randis</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="padding-left: 40px;" href="<?php echo base_url('input-randis'); ?>" class="nav-link <?php if ($activeMenu == 'randis-kendaraan-tambah') echo "active" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tambah Randis</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item <?php if (in_array($activeMenu, session()->get('props')->menuDistRandis)) echo "menu-open" ?>">
                                <a href="#" style="padding-left: 30px;" class="nav-link <?php if (in_array($activeMenu, session()->get('props')->menuDistRandis)) echo "active" ?>">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Distribusi Randis</p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a style="padding-left: 40px;" href="<?php echo base_url('data-dist-randis'); ?>" class="nav-link <?php if (in_array($activeMenu, ['randis-distrandis-data', 'randis-distrandis-ubah'])) echo "active" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data Distribusi Randis</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="padding-left: 40px;" href="<?php echo base_url('input-dist-randis'); ?>" class="nav-link <?php if ($activeMenu == 'randis-distrandis-tambah') echo "active" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tambah Distribusi Randis</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item <?php if (in_array($activeMenu, session()->get('props')->menuJenisops)) echo "menu-open" ?>">
                                <a href="#" style="padding-left: 30px;" class="nav-link <?php if (in_array($activeMenu, session()->get('props')->menuJenisops)) echo "active" ?>">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Jenis Operasional</p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a style="padding-left: 40px;" href="<?php echo base_url('data-jenisops'); ?>" class="nav-link <?php if (in_array($activeMenu, ['randis-jenisops-data', 'randis-jenisops-ubah'])) echo "active" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data Jenis Ops</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="padding-left: 40px;" href="<?php echo base_url('input-jenisops'); ?>" class="nav-link <?php if ($activeMenu == 'randis-jenisops-tambah') echo "active" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tambah Jenis Ops</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item <?php if (in_array($activeMenu, session()->get('props')->menuBMN)) echo "menu-open" ?>">
                        <a href="#" class="nav-link <?php if (in_array($activeMenu, session()->get('props')->menuBMN)) echo "active" ?>">
                            <i class="nav-icon fa-solid fa-folder-tree"></i>
                            <p>
                                Data BMN
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('pendahuluan-bmn'); ?>" style="padding-left: 30px;" class="nav-link <?php if ($activeMenu == 'bmn-pendahuluan') echo "active" ?>">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Pendahuluan</p>
                                </a>
                            </li>
                            <li class="nav-item <?php if (in_array($activeMenu, session()->get('props')->menuGedung)) echo "menu-open" ?>">
                                <a href="#" style="padding-left: 30px;" class="nav-link <?php if (in_array($activeMenu, session()->get('props')->menuGedung)) echo "active" ?>">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Gedung</p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a style="padding-left: 40px;" href="<?php echo base_url('data-gedung'); ?>" class="nav-link <?php if ($activeMenu == 'bmn-gedung-data') echo "active" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data Gedung</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="padding-left: 40px;" href="<?php echo base_url('input-gedung'); ?>" class="nav-link <?php if ($activeMenu == 'bmn-gedung-tambah') echo "active" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tambah Gedung</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item <?php if (in_array($activeMenu, session()->get('props')->menuRuangan)) echo "menu-open" ?>">
                                <a href="#" style="padding-left: 30px;" class="nav-link <?php if (in_array($activeMenu, session()->get('props')->menuRuangan)) echo "active" ?>">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Ruangan</p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a style="padding-left: 40px;" href="<?php echo base_url('data-ruangan'); ?>" class="nav-link <?php if ($activeMenu == 'bmn-ruangan-data') echo "active" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data Ruangan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="padding-left: 40px;" href="<?php echo base_url('input-ruangan'); ?>" class="nav-link <?php if ($activeMenu == 'bmn-ruangan-tambah') echo "active" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tambah Ruangan</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item <?php if (in_array($activeMenu, session()->get('props')->menuAlat)) echo "menu-open" ?>">
                                <a href="#" style="padding-left: 30px;" class="nav-link <?php if (in_array($activeMenu, session()->get('props')->menuAlat)) echo "active" ?>">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Peralatan & Mesin</p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a style="padding-left: 40px;" href="<?php echo base_url('data-alat'); ?>" class="nav-link <?php if ($activeMenu == 'bmn-alat-data') echo "active" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data Peralatan & Mesin</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="padding-left: 40px;" href="<?php echo base_url('input-alat'); ?>" class="nav-link <?php if ($activeMenu == 'bmn-alat-tambah') echo "active" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tambah Peralatan & Mesin</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item <?php if (in_array($activeMenu, session()->get('props')->menuDistAlat)) echo "menu-open" ?>">
                                <a href="#" style="padding-left: 30px;" class="nav-link <?php if (in_array($activeMenu, session()->get('props')->menuDistAlat)) echo "active" ?>">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Distribusi Alat & Mesin</p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a style="padding-left: 40px;" href="<?php echo base_url('data-distalat'); ?>" class="nav-link <?php if ($activeMenu == 'bmn-distalat-data') echo "active" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data Dist Alat & Mesin</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="padding-left: 40px;" href="<?php echo base_url('input-distalat'); ?>" class="nav-link <?php if ($activeMenu == 'bmn-distalat-tambah') echo "active" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tambah Dist Alat & Mesin</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item <?php if (in_array($activeMenu, session()->get('props')->menuKatRuangan)) echo "menu-open" ?>">
                                <a href="#" style="padding-left: 30px;" class="nav-link <?php if (in_array($activeMenu, session()->get('props')->menuKatRuangan)) echo "active" ?>">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Kategori Ruangan</p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a style="padding-left: 40px;" href="<?php echo base_url('data-katruangan'); ?>" class="nav-link <?php if ($activeMenu == 'bmn-katruangan-data') echo "active" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data Kat Ruangan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a style="padding-left: 40px;" href="<?php echo base_url('input-katruangan'); ?>" class="nav-link <?php if ($activeMenu == 'bmn-katruangan-tambah') echo "active" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Tambah Kat Ruangan</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if (
                    session()->get('role') == 'Karoum' ||
                    session()->get('role') == 'Kabag PPBJ' ||
                    session()->get('role') == 'Sub Pengadaan' ||
                    session()->get('role') == 'Sub Rumga' ||
                    session()->get('role') == 'Sub BMN'
                ) : ?>
                    <li class="nav-header">Permintaan Masuk</li>
                    <?php if (
                        session()->get('role') == 'Karoum' ||
                        session()->get('role') == 'Kabag PPBJ' ||
                        session()->get('role') == 'Sub Pengadaan'
                    ) : ?>
                        <li class="nav-item <?php if (in_array($activeMenu, session()->get('props')->menuPengadaanReq)) echo "menu-open" ?>">
                            <a href="#" class="nav-link <?php if (in_array($activeMenu, session()->get('props')->menuPengadaanReq)) echo "active" ?>">
                                <i class="nav-icon fa-solid fa-comment-dots"></i>
                                <p>
                                    Pengadaan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a style="padding-left: 30px;" href="<?php echo base_url('pengadaan-atk-req'); ?>" class="nav-link <?php if ($activeMenu == 'pengadaan-atk-req') echo "active" ?>">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>ATK</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a style="padding-left: 30px;" href="<?php echo base_url('pengadaan-cetakan-req'); ?>" class="nav-link <?php if ($activeMenu == 'pengadaan-cetakan-req') echo "active" ?>">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Cetakan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if (session()->get('role') != 'Administrator') : ?>
                    <li class="nav-header">Permintaan Layanan</li>
                    <li class="nav-item <?php if (in_array($activeMenu, session()->get('props')->menuPengadaan)) echo "menu-open" ?>">
                        <a href="#" class="nav-link <?php if (in_array($activeMenu, session()->get('props')->menuPengadaan)) echo "active" ?>">
                            <i class="nav-icon fa-solid fa-inbox"></i>
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
                    <li class="nav-item <?php if (in_array($activeMenu, session()->get('props')->menuPermintaan)) echo "menu-open" ?>">
                        <a href="#" class="nav-link <?php if (in_array($activeMenu, session()->get('props')->menuPermintaan)) echo "active" ?>">
                            <i class="nav-icon fa-solid fa-inbox"></i>
                            <p>
                                Permintaan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a style="padding-left: 30px;" href="<?php echo base_url('permintaan-rupat'); ?>" class="nav-link <?php if ($activeMenu == 'permintaan-rupat') echo "active" ?>">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Ruang Rapat</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a style="padding-left: 30px;" href="<?php echo base_url('permintaan-alat'); ?>" class="nav-link <?php if ($activeMenu == 'permintaan-alat') echo "active" ?>">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Alat & Mesin</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a style="padding-left: 30px;" href="<?php echo base_url('permintaan-randis'); ?>" class="nav-link <?php if ($activeMenu == 'permintaan-randis') echo "active" ?>">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Kendaraan Dinas</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item <?php if (in_array($activeMenu, session()->get('props')->menuPemeliharaan)) echo "menu-open" ?>">
                        <a href="#" class="nav-link <?php if (in_array($activeMenu, session()->get('props')->menuPemeliharaan)) echo "active" ?>">
                            <i class="nav-icon fa-solid fa-inbox"></i>
                            <p>
                                Pemeliharaan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a style="padding-left: 30px;" href="<?php echo base_url('pemeliharaan-gedung'); ?>" class="nav-link <?php if ($activeMenu == 'pemeliharaan-gedung') echo "active" ?>">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Gedung/Ruangan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a style="padding-left: 30px;" href="<?php echo base_url('pemeliharaan-randis'); ?>" class="nav-link <?php if ($activeMenu == 'pemeliharaan-randis') echo "active" ?>">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Kendaraan Dinas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a style="padding-left: 30px;" href="<?php echo base_url('pemeliharaan-alat'); ?>" class="nav-link <?php if ($activeMenu == 'pemeliharaan-alat') echo "active" ?>">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>Alat & Mesin</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <hr />
    <!-- /.sidebar -->
</aside>