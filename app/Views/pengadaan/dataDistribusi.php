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
                    <h1 class="m-0">Distribusi Pengadaan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Distribusi Pengadaan</li>
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
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">
                                <h3 class="card-title"></h3>
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <table id="tableReqAtk" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><?= session()->get('props')->tgl_pengajuan; ?></th>
                                        <th><?= session()->get('props')->nama_subunit; ?></th>
                                        <th><?= session()->get('props')->tipe_pengadaan; ?></th>
                                        <th><?= session()->get('props')->jenis_kegiatan; ?></th>
                                        <th><?= session()->get('props')->daftar_permintaan; ?></th>
                                        <th><?= session()->get('props')->tgl_kirim; ?></th>
                                        <th><?= session()->get('props')->status; ?></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($dataDistList as $row) :
                                        // Storingthe cipher method 
                                        $ciphering = "AES-128-CTR";
                                        // Using OpenSSl Encryption method 
                                        $iv_length = openssl_cipher_iv_length($ciphering);
                                        $options   = 0;
                                        // Non-NULL Initialization Vector for encryption 
                                        $encryption_iv = '1234567891011121';
                                        // Storing the encryption key 
                                        $encryption_key = "SisfoDKN";
                                        // Using openssl_encrypt() function to encrypt the data 
                                        $idEncryption = openssl_encrypt($row->id, $ciphering, $encryption_key, $options, $encryption_iv);
                                    ?>
                                        <tr>
                                            <td><?= date('d M Y', strtotime($row->tgl_pengajuan)); ?></td>
                                            <td><?= $row->nama_subunit; ?></td>
                                            <td><?= $row->tipe_pengadaan; ?></td>
                                            <td><?= $row->jenis_kegiatan; ?></td>
                                            <td><?= $row->isi_permintaan; ?></td>
                                            <td><?= $row->tgl_kirim == null ? '' : date('d M Y', strtotime($row->tgl_kirim)) ?></td>
                                            <td class="<?= $row->status == '2' ? 'alert-success' : 'alert-warning' ?>"><?= $row->keterangan; ?></td>
                                            <td class="text-center">
                                                <?php if ($row->status == 0) : ?>
                                                    <a title="Kirim" href="<?= base_url("distribusi-pengadaan-kirim/$idEncryption"); ?>" class="btn btn-info btn-sm" onclick="return confirm('Anda yakin ingin Dikirim ?')"><?= session()->get('props')->tombol_kirim; ?></a>
                                                <?php else : ?>
                                                    <a title="Terkirim" href="<?= base_url("distribusi-pengadaan-terkirim/$idEncryption"); ?>" class="btn btn-info btn-sm" onclick="return confirm('Anda yakin sudah Terkirim ?')"><?= session()->get('props')->tombol_terkirim; ?></a>
                                                <?php endif; ?>
                                            </td>
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