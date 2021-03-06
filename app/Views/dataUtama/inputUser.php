<?php
$data = [
    'activeMenu'    => $activeMenu
];
echo view('base/header');
echo view('base/navbar');
echo view('base/sidebar', $data);
?>

<?php
$flagUbah = false;
if ($activeMenu == 'utama-user-ubah') $flagUbah = true;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo ($activeMenu == 'utama-user-tambah') ? "Tambah" : "Ubah"; ?> User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Tambah User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php
                        $role = null;
                        if ($activeMenu == 'utama-user-ubah') {
                            $id = $users->id;
                            $role = $users->role;
                        } ?>
                        <form id="inputUserForm" class="form-horizontal" action="<?= $flagUbah ? base_url("save-user/$id") : base_url('save-user') ?>" method="post">
                            <div class="card-body">
                                <?php if ($flagUbah) : ?>
                                    <div class="form-group row">
                                        <label for="username" class="col-sm-2 col-form-label"><?= session()->get('props')->username; ?></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="username" name="username" value="<?= $users->username; ?>" placeholder="<?= session()->get('props')->username; ?>" disabled>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="pegawai" class="col-sm-2 col-form-label"><?= session()->get('props')->nama_pegawai; ?></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="pegawai" name="pegawai" value="<?= $users->nama_pegawai; ?>" placeholder="<?= session()->get('props')->nama_pegawai; ?>" disabled>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="form-group row">
                                        <label for="pegawai" class="col-sm-2 col-form-label"><?= session()->get('props')->nama_pegawai; ?></label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="pegawai" name="pegawai" aria-label="<?= session()->get('props')->nama_pegawai; ?>">
                                                <option value=""></option>
                                                <?php
                                                foreach ($listPegawai as $dataPegawai) :
                                                ?>
                                                    <option value="<?= $dataPegawai->id ?>"><?= $dataPegawai->nama_pegawai; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php endif ?>

                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label"><?= session()->get('props')->password; ?></label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" name="password" value="" placeholder="<?= session()->get('props')->password; ?>">
                                    </div>
                                </div>
                                <?php if ($flagUbah) : ?>
                                    <div class="form-group row">
                                        <label for="ulangPassword" class="col-sm-2 col-form-label"><?= session()->get('props')->ulangPassword; ?></label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="ulangPassword" name="ulangPassword" value="" placeholder="<?= session()->get('props')->ulangPassword; ?>">
                                        </div>
                                    </div>
                                <?php endif ?>

                                <div class="form-group row">
                                    <label for="role" class="col-sm-2 col-form-label"><?= session()->get('props')->role; ?></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="role" name="role" aria-label="Role">
                                            <option value="User" <?php if ($role == 'User') echo 'selected'; ?>>User</option>
                                            <option value="Administrator" <?php if ($role == 'Administrator') echo 'selected'; ?>>Administrator</option>
                                            <option value="Karoum" <?php if ($role == 'Karoum') echo 'selected'; ?>>Karoum</option>
                                            <option value="Kabag PPBJ" <?php if ($role == 'Kabag PPBJ') echo 'selected'; ?>>Kabag PPBJ</option>
                                            <option value="Sub Pengadaan" <?php if ($role == 'Sub Pengadaan') echo 'selected'; ?>>Sub Pengadaan</option>
                                            <option value="Sub BMN" <?php if ($role == 'Sub BMN') echo 'selected'; ?>>Sub BMN</option>
                                            <option value="Sub Rumga" <?php if ($role == 'Sub Rumga') echo 'selected'; ?>>Sub Rumga</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><?= session()->get('props')->tombol_submit; ?></button>
                                <button type="reset" class="btn btn-secondary"><?= session()->get('props')->tombol_reset; ?></button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
echo view('base/footer');
?>