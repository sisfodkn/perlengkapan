<?php
$data['activeMenu'] = $activeMenu;
echo view('base/header');
echo view('base/navbar');
echo view('base/sidebar', $data);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo ($activeMenu == 'utama-subunit-tambah') ? "Tambah" : "Ubah"; ?> Sub Unit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Sub Unit</li>
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
                        <?php if ($activeMenu == 'utama-subunit-ubah') $id = $subUnit['id'] ?>
                        <form id="inputSubUnitForm" class="form-horizontal" action="<?= $activeMenu == 'utama-subunit-ubah' ? base_url("save-subunit/$id") : base_url('save-subunit') ?>" method="post">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="namaSubUnit" class="col-sm-2 col-form-label"><?= session()->get('props')->namaSubUnit; ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="namaSubUnit" name="namaSubUnit" value="<?php if ($activeMenu == 'utama-subunit-ubah') echo $subUnit['nama_subunit']; ?>" placeholder="<?= session()->get('props')->namaSubUnit; ?>">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><?= session()->get('props')->submit; ?></button>
                                <button type="reset" class="btn btn-secondary"><?= session()->get('props')->reset; ?></button>
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