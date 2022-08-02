<?php
$data['activeMenu'] = $activeMenu;
echo view('base/header');
echo view('base/navbar');
echo view('base/sidebar', $data);
?>

<?php
$flagUbah = false;
if ($activeMenu == 'randis-distrandis-ubah') $flagUbah = true;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo ($activeMenu == 'randis-distrandis-tambah') ? "Tambah" : "Ubah"; ?> Distribusi Kendaraan Dinas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Distribusi Kendaraan Dinas</li>
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
                        <?php if ($activeMenu == 'randis-distrandis-ubah') {
                            $id = $distRandis['id'];
                        }
                        ?>
                        <form id="inputDistRandisForm" class="form-horizontal" action="<?= $flagUbah ? base_url("save-dist-randis/$id") : base_url('save-dist-randis') ?>" method="post">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="idPegawai" class="col-sm-2 col-form-label"><?= session()->get('props')->nama_pegawai; ?></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="idPegawai" name="idPegawai" aria-label="<?= session()->get('props')->nama_pegawai; ?>">
                                            <option value=""></option>
                                            <?php
                                            foreach ($listPegawai as $dataPegawai) :
                                            ?>
                                                <option value="<?= $dataPegawai->id; ?>" <?php if ($flagUbah) echo $distRandis['id_pegawai'] == $dataPegawai->id ? 'selected' : '' ?>><?= $dataPegawai->nama_pegawai . ' &mdash; ' . $dataPegawai->nama_jabatan . ' &mdash; ' . $dataPegawai->nama_unit; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="idRandis" class="col-sm-2 col-form-label"><?= session()->get('props')->kendaraan; ?></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="idRandis" name="idRandis" aria-label="<?= session()->get('props')->kendaraan; ?>">
                                            <option value=""></option>
                                            <?php
                                            foreach ($listRandis as $dataRandis) :
                                            ?>
                                                <option value="<?= $dataRandis->id; ?>" <?php if ($flagUbah) echo $distRandis['id_kendaraan_dinas'] == $dataRandis->id ? 'selected' : '' ?>><?= $dataRandis->nopol . ' &mdash; ' . $dataRandis->merk_kendaraan; ?></option>
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