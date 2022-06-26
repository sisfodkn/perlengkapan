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
                    <h1 class="m-0">Data Jabatan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Jabatan</li>
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
                    <div class="card card-info">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <table id="tableJabatan" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Jabatan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($jabatan as $row) :
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
                                        $idEncryption = openssl_encrypt($row['id'], $ciphering, $encryption_key, $options, $encryption_iv);
                                    ?>
                                        <tr>
                                            <td><?= $row['nama_jabatan']; ?></td>
                                            <td class="text-center">
                                                <a title="Edit" href="<?= base_url("input-jabatan/$idEncryption"); ?>" class="btn btn-info btn-sm">Edit</a>
                                                <a title="Hapus" href="<?= base_url("jabatan/delete/$idEncryption"); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus <?= $row['nama_jabatan']; ?> ?')">Hapus</a>
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