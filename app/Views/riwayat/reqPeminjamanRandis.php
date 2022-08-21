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
                    <h1 class="m-0">Riwayat Peminjaman Kendaraan Dinas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Riwayat</li>
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
                            <table id="tableRiwayatReqPeminjamanRandis" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><?= session()->get('props')->tgl_pengajuan; ?></th>
                                        <th><?= session()->get('props')->nama_pegawai; ?></th>
                                        <th><?= session()->get('props')->kendaraan; ?></th>
                                        <th><?= session()->get('props')->tgl_peminjaman; ?></th>
                                        <th><?= session()->get('props')->tgl_pengembalian; ?></th>
                                        <th><?= session()->get('props')->keperluan; ?></th>
                                        <th><?= session()->get('props')->status; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($riwayatReqPeminjamanRandisist as $rowRiwayat) :
                                    ?>
                                        <tr>
                                            <?php
                                            $tgl = date('d M Y', strtotime($rowRiwayat->tgl_persetujuan_karo)); ?>
                                            <td><?= date('d M Y', strtotime($rowRiwayat->tgl_pengajuan)); ?></td>
                                            <td><?= $rowRiwayat->nama_pegawai; ?></td>
                                            <td><?= $rowRiwayat->nopol . " - " . $rowRiwayat->merk_kendaraan; ?></td>
                                            <td><?= date('d M Y', strtotime($rowRiwayat->tgl_peminjaman)); ?></td>
                                            <td><?= date('d M Y', strtotime($rowRiwayat->tgl_pengembalian)); ?></td>
                                            <td><?= $rowRiwayat->keperluan; ?></td>
                                            <td class="alert-success"><?= $rowRiwayat->keterangan . "<br/>" . $tgl ?></td>
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