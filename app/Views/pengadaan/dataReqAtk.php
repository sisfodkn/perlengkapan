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
                    <h1 class="m-0">Permintaan Pengadaan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Permintaan Pengadaan</li>
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
                    <div class="card card-warning">
                        <div class="card-header" style="background-color:#DAF7A6">
                            <h3 class="card-title">
                                <h3 class="card-title">Permintaan Masuk</h3>
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <table id="tableReqAtk" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><?= session()->get('props')->tgl_pengajuan; ?></th>
                                        <th><?= session()->get('props')->nama_unit; ?></th>
                                        <th><?= session()->get('props')->nama_pegawai; ?></th>
                                        <th><?= session()->get('props')->tipe_pengadaan; ?></th>
                                        <th><?= session()->get('props')->jenis_kegiatan; ?></th>
                                        <th><?= session()->get('props')->daftar_permintaan; ?></th>
                                        <th><?= session()->get('props')->status; ?></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($reqAtkList as $row) :
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
                                            <td><?= $row->nama_unit; ?></td>
                                            <td><?= $row->nama_pegawai; ?></td>
                                            <td><?= $row->tipe_pengadaan; ?></td>
                                            <td><?= $row->jenis_kegiatan; ?></td>
                                            <td><?= $row->isi_permintaan; ?></td>
                                            <td class="<?= $row->status == '1' ? 'alert-warning' : 'alert-danger' ?>"><?= $row->keterangan; ?></td>
                                            <td class="text-center">
                                                <a title="Disetujui" href="<?= base_url("atk-req-approve/$idEncryption"); ?>" class="btn btn-info btn-sm" onclick="return confirm('Anda yakin ingin Menyetujui ?')"><?= session()->get('props')->tombol_setuju; ?></a>
                                                <a title="Ditolak" href="<?= base_url("atk-req-reject/$idEncryption"); ?>" class="btn btn-danger btn-sm"><?= session()->get('props')->tombol_tolak; ?></a>
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