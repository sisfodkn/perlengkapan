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
                    <h1><?php echo ($activeMenu == 'bmn-ruangan-tambah') ? "Tambah" : "Ubah"; ?> Ruangan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Ruangan</li>
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
                        <?php if ($activeMenu == 'bmn-ruangan-ubah') $id = $ruangan['id'] ?>
                        <form id="inputRuanganForm" class="form-horizontal" action="<?= $activeMenu == 'bmn-ruangan-ubah' ? base_url("save-ruangan/$id") : base_url('save-ruangan') ?>" method="post">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="kodeRuangan" class="col-sm-2 col-form-label"><?= session()->get('props')->kode_ruangan; ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="kodeRuangan" name="kodeRuangan" value="<?php if ($activeMenu == 'bmn-ruangan-ubah') echo $ruangan['kode_ruangan']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="namaRuangan" class="col-sm-2 col-form-label"><?= session()->get('props')->nama_ruangan; ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="namaRuangan" name="namaRuangan" value="<?php if ($activeMenu == 'bmn-ruangan-ubah') echo $ruangan['nama_ruangan']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="idGedung" class="col-sm-2 col-form-label"><?= session()->get('props')->nama_gedung; ?></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="idGedung" name="idGedung" aria-label="<?= session()->get('props')->nama_gedung; ?>">
                                            <?php
                                            foreach ($listGedung as $data) :
                                                $selected = "";
                                                if (isset($ruangan)) {
                                                    if ($ruangan['id_gedung'] == $data['id'])
                                                        $selected = "selected";
                                                }
                                            ?>
                                                <option value="<?= $data['id']; ?>" <?php echo $selected; ?>><?= $data['nama_gedung']; ?></option>
                                            <?php endforeach; ?>
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