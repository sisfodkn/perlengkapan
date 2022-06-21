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
                    <a href="#" class="nav-link <?php if (in_array($activeMenu, ['struktur-umum', 'struktur-dipa', 'struktur-realisasi'])) echo "active" ?>">
                        <i class="nav-icon fa-solid fa-folder-tree"></i>
                        <p>
                            Struktur Anggaran
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if ($activeMenu == 'struktur-umum') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Umum</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if ($activeMenu == 'struktur-dipa') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>DIPA 2022</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if ($activeMenu == 'struktur-realisasi') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Realisasi Anggaran</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?php if (in_array($activeMenu, ['utama-pegawai', 'utama-jabatan', 'utama-unit', 'utama-kegiatan', 'utama-user'])) echo "active" ?>">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Data Utama
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if ($activeMenu == 'utama-pegawai') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Pegawai</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link <?php if ($activeMenu == 'utama-pegawai-data') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Pegawai</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link <?php if ($activeMenu == 'utama-pegawai-tambah') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Pegawai</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if ($activeMenu == 'utama-jabatan') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Jabatan</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link <?php if ($activeMenu == 'utama-jabatan-data') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Jabatan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link <?php if ($activeMenu == 'utama-jabatan-tambah') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Jabatan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if ($activeMenu == 'utama-unit') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Unit Kerja</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link <?php if ($activeMenu == 'utama-unit-data') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Unit Kerja</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link <?php if ($activeMenu == 'utama-unit-tambah') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Unit Kerja</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if ($activeMenu == 'utama-kegiatan') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Kegiatan</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link <?php if ($activeMenu == 'utama-kegiatan-data') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Kegiatan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link <?php if ($activeMenu == 'utama-kegiatan-tambah') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah Kegiatan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if ($activeMenu == 'utama-user') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>User</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link <?php if ($activeMenu == 'utama-user-data') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data User</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link <?php if ($activeMenu == 'utama-user-tambah') echo "active" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tambah User</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?php if (in_array($activeMenu, ['randis-pendahuluan', 'randis-data', 'randis-distribusi', 'randis-jenis'])) echo "active" ?>">
                        <i class="nav-icon fa-solid fa-car"></i>
                        <p>
                            Data Kendaraan Dinas
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if ($activeMenu == 'randis-pendahuluan') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Pendahuluan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if ($activeMenu == 'randis-data') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Kendaraan Dinas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if ($activeMenu == 'randis-distribusi') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Distribusi Randis</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if ($activeMenu == 'randis-jenis') echo "active" ?>">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Jenis Operasional</p>
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