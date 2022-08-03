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
                    <h1><?php echo ($activeMenu == 'bmn-gedung-tambah') ? "Tambah" : "Ubah"; ?> Gedung</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Gedung</li>
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
                        <?php if ($activeMenu == 'bmn-gedung-ubah') $id = $gedung['id'] ?>
                        <form id="inputGedungForm" class="form-horizontal" action="<?= $activeMenu == 'bmn-gedung-ubah' ? base_url("save-gedung/$id") : base_url('save-gedung') ?>" method="post">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="namaGedung" class="col-sm-2 col-form-label"><?= session()->get('props')->nama_gedung; ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="namaGedung" name="namaGedung" value="<?php if ($activeMenu == 'bmn-gedung-ubah') echo $gedung['nama_gedung']; ?>" placeholder="<?= session()->get('props')->nama_gedung; ?>">
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