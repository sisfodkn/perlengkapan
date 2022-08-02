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
                    <h1><?php echo ($activeMenu == 'randis-jenisops-tambah') ? "Tambah" : "Ubah"; ?> Jenis Operasional</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tambah Jenis Operasional</li>
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
                        <?php if ($activeMenu == 'randis-jenisops-ubah') $id = $jenisOps['id'] ?>
                        <form id="inputJenisOpsForm" class="form-horizontal" action="<?= $activeMenu == 'randis-jenisops-ubah' ? base_url("save-jenisops/$id") : base_url('save-jenisops') ?>" method="post">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="jenisOps" class="col-sm-2 col-form-label"><?= session()->get('props')->jenis_operasional; ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="jenisOps" name="jenisOps" value="<?php if ($activeMenu == 'randis-jenisops-ubah') echo $jenisOps['jenis_operasional']; ?>" placeholder="<?= session()->get('props')->jenis_operasional; ?>">
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