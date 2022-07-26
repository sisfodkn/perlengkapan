<?php
$data = [
    'activeMenu'    => $activeMenu
];
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
                    <h1>Permintaan ATK</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Permintaan ATK</li>
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
                        <form id="inputUserForm" class="form-horizontal" action="<?= base_url('save-pengadaan-atk') ?>" method="post">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="namaPegawai" class="col-sm-2 col-form-label"><?= session()->get('props')->nama_pegawai; ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="namaPegawai" name="namaPegawai" value="<?= session()->get('nama_pegawai'); ?>" placeholder="<?= session()->get('props')->nama_pegawai; ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="unitKerja" class="col-sm-2 col-form-label"><?= session()->get('props')->unit_kerja; ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="unitKerja" name="unitKerja" value="<?= session()->get('nama_unit'); ?>" placeholder="<?= session()->get('props')->unit_kerja; ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="subUnitKerja" class="col-sm-2 col-form-label"><?= session()->get('props')->subunit_kerja; ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="subUnitKerja" name="subUnitKerja" value="<?= session()->get('nama_subunit'); ?>" placeholder="<?= session()->get('props')->subunit_kerja; ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="kegiatan" class="col-sm-2 col-form-label"><?= session()->get('props')->kegiatan; ?></label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="kegiatan" name="kegiatan" aria-label="Kegiatan">
                                            <option value=""></option>
                                            <?php
                                            foreach ($listKegiatan as $dataKegiatan) :
                                            ?>
                                                <option value="<?= $dataKegiatan['jenis_kegiatan']; ?>"><?= $dataKegiatan['jenis_kegiatan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="tglPengajuan" class="col-sm-2 col-form-label"><?= session()->get('props')->tgl_pengajuan; ?></label>
                                    <div class="col-sm-10 input-group date" id="tglPengajuan" data-target-input="nearest">
                                        <input type="text" id="tglPengajuan" name="tglPengajuan" class="form-control datetimepicker-input" data-target="#tglPengajuan" />
                                        <div class="input-group-append" data-target="#tglPengajuan" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="daftarPermintaan" class="col-sm-2 col-form-label"><?= session()->get('props')->daftar_permintaan; ?></label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="daftarPermintaan" name="daftarPermintaan" rows="5" placeholder="Masukkan Daftar Permintaan"></textarea>
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