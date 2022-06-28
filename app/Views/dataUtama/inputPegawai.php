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
                    <h1><?php echo ($activeMenu == 'utama-jabatan-tambah') ? "Tambah" : "Ubah"; ?> Jabatan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Jabatan</li>
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
                        <?php if ($activeMenu == 'utama-jabatan-ubah') $id = $jabatan['id'] ?>
                        <form id="inputJabatanForm" class="form-horizontal" action="<?= $activeMenu == 'utama-jabatan-ubah' ? base_url("save-jabatan/$id") : base_url('save-jabatan') ?>" method="post">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="namaJabatan" class="col-sm-2 col-form-label">Nama Jabatan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="namaJabatan" name="namaJabatan" value="<?php if ($activeMenu == 'utama-jabatan-ubah') echo $jabatan['nama_jabatan']; ?>" placeholder="Nama Jabatan">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
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