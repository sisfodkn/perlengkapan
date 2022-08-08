<?php
$data['activeMenu'] = $activeMenu;
echo view('base/header');
echo view('base/navbar');
echo view('base/sidebar', $data);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Riwayat Pengadaan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Riwayat Pengadaan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">
                                <h3 class="card-title"></h3>
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <table id="tableRiwayatReqPengadaan" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><?= session()->get('props')->tgl_pengajuan; ?></th>
                                        <th><?= session()->get('props')->nama_subunit; ?></th>
                                        <th><?= session()->get('props')->tipe_pengadaan; ?></th>
                                        <th><?= session()->get('props')->jenis_kegiatan; ?></th>
                                        <th><?= session()->get('props')->daftar_permintaan; ?></th>
                                        <th><?= session()->get('props')->status_persetujuan; ?></th>
                                        <th><?= session()->get('props')->status_kirim; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($riwayatPengadaanList as $rowRiwayat) :
                                    ?>
                                        <tr>
                                            <?php if (!empty($rowRiwayat->tgl_persetujuan_bag)) {
                                                $tgl_persetujuan = date('d M Y', strtotime($rowRiwayat->tgl_persetujuan_bag));
                                            } else if (!empty($rowRiwayat->tgl_persetujuan_subbag)) {
                                                $tgl_persetujuan = date('d M Y', strtotime($rowRiwayat->tgl_persetujuan_subbag));
                                            } else {
                                                $tgl_persetujuan = "";
                                            } ?>
                                            <?php if (!empty($rowRiwayat->tgl_terima)) {
                                                $tgl_distribusi = date('d M Y', strtotime($rowRiwayat->tgl_terima));
                                            } else if (!empty($rowRiwayat->tgl_terkirim)) {
                                                $tgl_distribusi = date('d M Y', strtotime($rowRiwayat->tgl_terkirim));
                                            } else if (!empty($rowRiwayat->tgl_kirim)) {
                                                $tgl_distribusi = date('d M Y', strtotime($rowRiwayat->tgl_kirim));
                                            } else {
                                                $tgl_distribusi = "";
                                            } ?>
                                            <td><?= date('d M Y', strtotime($rowRiwayat->tgl_pengajuan)); ?></td>
                                            <td><?= $rowRiwayat->nama_subunit; ?></td>
                                            <td><?= $rowRiwayat->tipe_pengadaan; ?></td>
                                            <td><?= $rowRiwayat->jenis_kegiatan; ?></td>
                                            <td><?= $rowRiwayat->isi_permintaan; ?></td>
                                            <td class="<?= $rowRiwayat->status_persetujuan == '2' ? 'alert-success' : 'alert-warning' ?>"><?= $rowRiwayat->keterangan_persetujuan . "<br/>" . $tgl_persetujuan . ""; ?></td>
                                            <td class="<?= $rowRiwayat->status_kirim == '3' ? 'alert-success' : 'alert-warning' ?>"><?= $rowRiwayat->keterangan_kirim . "<br/>" . $tgl_distribusi . ""; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
echo view('base/footer');
?>