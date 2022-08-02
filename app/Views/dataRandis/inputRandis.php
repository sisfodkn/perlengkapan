<?php
$data['activeMenu'] = $activeMenu;
echo view('base/header');
echo view('base/navbar');
echo view('base/sidebar', $data);
?>

<?php
$flagUbah = false;
if ($activeMenu == 'randis-kendaraan-ubah') $flagUbah = true;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo ($activeMenu == 'randis-kendaraan-tambah') ? "Tambah" : "Ubah"; ?> Kendaraan Dinas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Kendaraan Dinas</li>
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
                        <?php if ($activeMenu == 'randis-kendaraan-ubah') $id = $randis['id'] ?>
                        <form id="inputRandisForm" class="form-horizontal" action="<?= $flagUbah ? base_url("save-randis/$id") : base_url('save-randis') ?>" method="post">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nopol" class="col-sm-2 col-form-label"><?= session()->get('props')->nopol; ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nopol" name="nopol" value="<?php if ($flagUbah) echo $randis['nopol']; ?>" placeholder="<?= session()->get('props')->nopol; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tahun" class="col-sm-2 col-form-label"><?= session()->get('props')->tahun_pengadaan; ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="tahun" name="tahun" value="<?php if ($flagUbah) echo $randis['tahun_pengadaan']; ?>" placeholder="<?= session()->get('props')->tahun_pengadaan; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="merk" class="col-sm-2 col-form-label"><?= session()->get('props')->merk_kendaraan; ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="merk" name="merk" value="<?php if ($flagUbah) echo $randis['merk_kendaraan']; ?>" placeholder="<?= session()->get('props')->merk_kendaraan; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tipe" class="col-sm-2 col-form-label"><?= session()->get('props')->tipe_kendaraan; ?></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="tipe" name="tipe" aria-label="<?= session()->get('props')->tipe_kendaraan; ?>">
                                            <option value=""></option>
                                            <option value="motor" <?php if ($flagUbah) echo $randis['tipe_kendaraan'] == 'motor' ? 'selected' : '' ?>>Sepeda Motor</option>
                                            <option value="mobil" <?php if ($flagUbah) echo $randis['tipe_kendaraan'] == 'mobil' ? 'selected' : '' ?>>Mobil dan Sejenisnya</option>
                                            <option value="bus" <?php if ($flagUbah) echo $randis['tipe_kendaraan'] == 'bus' ? 'selected' : '' ?>>Bus dan Sejenisnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenisOps" class="col-sm-2 col-form-label"><?= session()->get('props')->jenis_operasional; ?></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="jenisOps" name="jenisOps" aria-label="<?= session()->get('props')->jenis_operasional; ?>">
                                            <option value=""></option>
                                            <?php
                                            foreach ($listJenisOps as $dataJenisOps) :
                                            ?>
                                                <option value="<?= $dataJenisOps['id']; ?>" <?php if ($flagUbah) echo $randis['id_jenis_operasional'] == $dataJenisOps['id'] ? 'selected' : '' ?>><?= $dataJenisOps['jenis_operasional']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="keterangan" class="col-sm-2 col-form-label"><?= session()->get('props')->keterangan; ?></label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="keterangan" name="keterangan" rows="5" placeholder="<?= session()->get('props')->keterangan; ?>"><?php if ($flagUbah) echo $randis['keterangan']; ?></textarea>
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