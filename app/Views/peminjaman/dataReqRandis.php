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
                    <h1 class="m-0">Peminjaman Kendaraan Dinas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Peminjaman Randis</li>
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
                    <div class="card">
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
                                        <th><?= session()->get('props')->nama_pegawai; ?></th>
                                        <th><?= session()->get('props')->kendaraan; ?></th>
                                        <th><?= session()->get('props')->tgl_peminjaman; ?></th>
                                        <th><?= session()->get('props')->tgl_pengembalian; ?></th>
                                        <th><?= session()->get('props')->keperluan; ?></th>
                                        <th><?= session()->get('props')->status; ?></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($reqRandisList as $row) :
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
                                            <?php switch ($row->status) {
                                                case 0:
                                                    $tgl = "";
                                                    break;
                                                case 1:
                                                    $tgl = date('d M Y', strtotime($row->tgl_persetujuan_subbag));
                                                    break;
                                                case 2:
                                                    $tgl = date('d M Y', strtotime($row->tgl_persetujuan_bag));
                                                    break;
                                                case 3:
                                                    $tgl = date('d M Y', strtotime($row->tgl_persetujuan_karo));
                                                    break;
                                            } ?>
                                            <td><?= date('d M Y', strtotime($row->tgl_pengajuan)); ?></td>
                                            <td><?= $row->nama_pegawai; ?></td>
                                            <td><?= $row->nopol . " - " . $row->merk_kendaraan; ?></td>
                                            <td><?= date('d M Y', strtotime($row->tgl_peminjaman)); ?></td>
                                            <td><?= date('d M Y', strtotime($row->tgl_pengembalian)); ?></td>
                                            <td><?= $row->keperluan; ?></td>
                                            <td class="<?= $row->status == '1' || $row->status == '2' ? 'alert-warning' : 'alert-danger' ?>"><?= $row->keterangan . "<br/>" . $tgl ?></td>
                                            <td class="text-center">
                                                <a title="Disetujui" href="<?= base_url("randis-req-approve/$idEncryption"); ?>" class="btn btn-info btn-sm" onclick="return confirm('Anda yakin ingin Menyetujui ?')"><?= session()->get('props')->tombol_setuju; ?></a>
                                                <a title="Ditolak" href="<?= base_url("randis-req-reject/$idEncryption"); ?>" class="btn btn-danger btn-sm"><?= session()->get('props')->tombol_tolak; ?></a>
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