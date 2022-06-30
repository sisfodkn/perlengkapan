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
                    <h1><?php echo ($activeMenu == 'utama-atk-tambah') ? "Tambah" : "Ubah"; ?> ATK</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Tambah ATK</li>
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
                        <?php
                        $id = null;
                        $nama = null;
                        $kategori = null;
                        if ($activeMenu == 'utama-atk-ubah') {
                            $id = $atk['id'];
                            $nama = $atk['nama_atk'];
                            $kategori = $atk['kategori_atk'];
                        } ?>
                        <form id="inputAtkForm" class="form-horizontal" action="<?= $id != null ? base_url("save-atk/$id") : base_url('save-atk') ?>" method="post">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="namaAtk" class="col-sm-2 col-form-label"><?= session()->get('props')->nama_atk; ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="namaAtk" name="namaAtk" value="<?php if ($nama != null) echo $nama; ?>" placeholder="<?= session()->get('props')->nama_atk; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kategoriAtk" class="col-sm-2 col-form-label"><?= session()->get('props')->kategori_atk; ?></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="kategoriAtk" name="kategoriAtk" aria-label="Kategori">
                                            <option value="ATK" <?php if ($kategori == 'ATK') echo 'selected'; ?>>ATK</option>
                                            <option value="Cetakan" <?php if ($kategori == 'Cetakan') echo 'selected'; ?>>Cetakan</option>
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