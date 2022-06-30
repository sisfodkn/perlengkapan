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
                    <h1 class="m-0">Data User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data User</li>
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
                        <div class="card-body">
                            <table id="tableUser" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><?= session()->get('props')->username; ?></th>
                                        <th><?= session()->get('props')->nama_pegawai; ?></th>
                                        <th><?= session()->get('props')->role; ?></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($users as $row) :
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
                                            <td><?= $row->username; ?></td>
                                            <td><?= $row->nama_pegawai; ?></td>
                                            <td><?= $row->role; ?></td>
                                            <td class="text-center">
                                                <a title="Edit" href="<?= base_url("input-user/$idEncryption"); ?>" class="btn btn-info btn-sm"><?= session()->get('props')->tombol_edit; ?></a>
                                                <a title="Hapus" href="<?= base_url("user/delete/$idEncryption"); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus Username <?= $row->username ?> ?')"><?= session()->get('props')->tombol_delete; ?></a>
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