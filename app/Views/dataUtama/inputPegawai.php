<?php
$data['activeMenu'] = $activeMenu;
echo view('base/header');
echo view('base/navbar');
echo view('base/sidebar', $data);
?>

<?php
$flagUbah = false;
if ($activeMenu == 'utama-pegawai-ubah') $flagUbah = true;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo ($activeMenu == 'utama-pegawai-tambah') ? "Tambah" : "Ubah"; ?> Pegawai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tambah Pegawai</li>
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
                        <?php if ($activeMenu == 'utama-pegawai-ubah') $id = $pegawai['id'] ?>
                        <form id="inputPegawaiForm" class="form-horizontal" action="<?= $flagUbah ? base_url("save-pegawai/$id") : base_url('save-pegawai') ?>" method="post">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nip" class="col-sm-2 col-form-label"><?= session()->get('props')->nip; ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nip" name="nip" value="<?php if ($flagUbah) echo $pegawai['nip_nrp']; ?>" placeholder="<?= session()->get('props')->nip; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="namaPegawai" class="col-sm-2 col-form-label"><?= session()->get('props')->nama_pegawai; ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="namaPegawai" name="namaPegawai" value="<?php if ($flagUbah) echo $pegawai['nama_pegawai']; ?>" placeholder="<?= session()->get('props')->nama_pegawai; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pangkat" class="col-sm-2 col-form-label"><?= session()->get('props')->pangkat; ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="pangkat" name="pangkat" value="<?php if ($flagUbah) echo $pegawai['pangkat']; ?>" placeholder="<?= session()->get('props')->pangkat; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jabatan" class="col-sm-2 col-form-label"><?= session()->get('props')->nama_jabatan; ?></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="jabatan" name="jabatan" aria-label="<?= session()->get('props')->nama_jabatan; ?>">
                                            <option value=""></option>
                                            <?php
                                            foreach ($listJabatan as $dataJabatan) :
                                            ?>
                                                <option value="<?= $dataJabatan['id']; ?>" <?php if ($flagUbah) echo $pegawai['id_jabatan'] == $dataJabatan['id'] ? 'selected' : '' ?>><?= $dataJabatan['nama_jabatan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="unit" class="col-sm-2 col-form-label"><?= session()->get('props')->nama_unit; ?></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="unit" name="unit" aria-label="<?= session()->get('props')->nama_unit; ?>">
                                            <option value=""></option>
                                            <?php
                                            foreach ($listUnit as $dataUnit) :
                                            ?>
                                                <option value="<?= $dataUnit['id']; ?>" <?php if ($flagUbah) echo $pegawai['id_unit'] == $dataUnit['id'] ? 'selected' : '' ?>><?= $dataUnit['nama_unit']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="subUnit" class="col-sm-2 col-form-label"><?= session()->get('props')->nama_subunit; ?></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="subUnit" name="subUnit" aria-label="<?= session()->get('props')->nama_subunit; ?>">
                                            <option value=""></option>
                                            <?php
                                            foreach ($listSubUnit as $dataSubUnit) :
                                            ?>
                                                <option value="<?= $dataSubUnit['id']; ?>" <?php if ($flagUbah) echo $pegawai['id_subunit'] == $dataSubUnit['id'] ? 'selected' : '' ?>><?= $dataSubUnit['nama_subunit']; ?></option>
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