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
                <div class="col-md-8">
                    <div class="card card-info">
                        <div class="card-header">
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php if ($activeMenu == 'utama-user-ubah') $id = $user->id ?>
                        <form id="inputUserForm" class="form-horizontal" action="<?= $flagUbah ? base_url("save-user/$id") : base_url('save-user') ?>" method="post">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="username" class="col-sm-2 col-form-label"><?= session()->get('props')->username; ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="username" name="username" value="<?php if ($flagUbah) echo $user->username; ?>" placeholder="<?= session()->get('props')->username; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="pegawai" class="col-sm-2 col-form-label"><?= session()->get('props')->nama_pegawai; ?></label>
                                    <div class="col-sm-10">
                                        <input type="autocomplete" class="form-control" id="pegawai" name="pegawai" value="<?php if ($flagUbah) echo $user->nama_pegawai; ?>" placeholder="<?= session()->get('props')->nama_pegawai; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label"><?= session()->get('props')->password; ?></label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" name="password" value="" placeholder="<?= session()->get('props')->password; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ulangPassword" class="col-sm-2 col-form-label"><?= session()->get('props')->ulangPassword; ?></label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="ulangPassword" name="ulangPassword" value="" placeholder="<?= session()->get('props')->ulangPassword; ?>">
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
echo view('base/footer', $data);
?>