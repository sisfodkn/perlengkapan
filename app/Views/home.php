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
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <?php if (
        session()->get('role') == session()->get('props')->roleKabag ||
        session()->get('role') == session()->get('props')->roleSubPengadaan
      ) : ?>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Dashboard Pengadaan</h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box" style="background-color:#DAF7A6">
                      <div class="inner">
                        <h3><?= $totalPengadaanMasuk->total; ?><sup style="font-size: 20px"> Permintaan</sup></h3>

                        <p>Belum Direspon</p>
                      </div>
                      <a href="<?php echo base_url('pengadaan-atk-req'); ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <?php if (
                    session()->get('role') == session()->get('props')->roleSubPengadaan
                  ) : ?>
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box" style="background-color:#FFC300">
                        <div class="inner">
                          <h3><?= $totalPengadaanPerluDikirim->total; ?><sup style="font-size: 20px"> Permintaan</sup></h3>

                          <p>Perlu Dikirim</p>
                        </div>
                        <a href="<?php echo base_url('distribusi-pengadaan'); ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                      </div>
                    </div>
                  <?php endif; ?>

                  <div class="col-12">
                    <div class="card-header bg-success">
                      <h3 class="card-title">Status Pengadaan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="tableStatusPengadaan" class="table table-bordered table-hover">
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
                          foreach ($listStatusPengadaan as $row) :
                          ?>
                            <tr>
                              <?php if (!empty($row->tgl_persetujuan_bag)) {
                                $tgl_persetujuan = date('d M Y', strtotime($row->tgl_persetujuan_bag));
                              } else if (!empty($row->tgl_persetujuan_subbag)) {
                                $tgl_persetujuan = date('d M Y', strtotime($row->tgl_persetujuan_subbag));
                              } else {
                                $tgl_persetujuan = "";
                              } ?>
                              <?php if (!empty($row->tgl_terima)) {
                                $tgl_distribusi = date('d M Y', strtotime($row->tgl_terima));
                              } else if (!empty($row->tgl_terkirim)) {
                                $tgl_distribusi = date('d M Y', strtotime($row->tgl_terkirim));
                              } else if (!empty($row->tgl_kirim)) {
                                $tgl_distribusi = date('d M Y', strtotime($row->tgl_kirim));
                              } else {
                                $tgl_distribusi = "";
                              } ?>
                              <td><?= date('d M Y', strtotime($row->tgl_pengajuan)); ?></td>
                              <td><?= $row->nama_subunit; ?></td>
                              <td><?= $row->tipe_pengadaan; ?></td>
                              <td><?= $row->jenis_kegiatan; ?></td>
                              <td><?= $row->isi_permintaan; ?></td>
                              <td class="<?= $row->status_persetujuan == '2' ? 'alert-success' : 'alert-warning' ?>"><?= $row->keterangan_persetujuan . "<br/>" . $tgl_persetujuan . ""; ?></td>
                              <td class="<?= $row->status_kirim == '2' ? 'alert-success' : 'alert-warning' ?>"><?= $row->keterangan_kirim . "<br/>" . $tgl_distribusi . ""; ?></td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      <?php endif; ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Dashboard User</h5>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box" style="background-color:#DAF7A6">
                    <div class="inner">
                      <h3><?= $totalReqPengadaanUser->total; ?><sup style="font-size: 20px"> Permintaan</sup></h3>

                      <p>Pengadaan Diproses</p>
                    </div>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box" style="background-color:#FFC300">
                    <div class="inner">
                      <h3><?= $totalReqPeminjamanRandis->total; ?><sup style="font-size: 20px"> Permintaan</sup></h3>

                      <p>Peminjaman Randis</p>
                    </div>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-12">
                  <div class="card-header" style="background-color: #DAF7A6">
                    <h3 class="card-title">Permintaan Pengadaan</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="tableReqPengadaan" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th><?= session()->get('props')->tgl_pengajuan; ?></th>
                          <th><?= session()->get('props')->nama_subunit; ?></th>
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
                        foreach ($permintaan as $row) :
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
                          <?php if (empty($row->status_kirim)) {
                            if ($row->status_persetujuan == '0') {
                              $tgl = '';
                            } else if ($row->status_persetujuan == '1') {
                              $tgl = date('d M Y', strtotime($row->tgl_persetujuan_subbag));
                            } else if ($row->status_persetujuan == '2') {
                              $tgl = date('d M Y', strtotime($row->tgl_persetujuan_bag));
                            }
                          } else {
                            if ($row->status_kirim == '0') {
                              $tgl = date('d M Y', strtotime($row->tgl_persetujuan_bag));
                            } else if ($row->status_kirim == '1') {
                              $tgl = date('d M Y', strtotime($row->tgl_kirim));
                            } else if ($row->status_kirim == '2') {
                              $tgl = date('d M Y', strtotime($row->tgl_terkirim));
                            }
                          }
                          ?>
                          <tr>
                            <td><?= date('d M Y', strtotime($row->tgl_pengajuan)); ?></td>
                            <td><?= $row->nama_subunit; ?></td>
                            <td><?= $row->nama_pegawai; ?></td>
                            <td><?= $row->tipe_pengadaan; ?></td>
                            <td><?= $row->jenis_kegiatan; ?></td>
                            <td><?= $row->isi_permintaan; ?></td>
                            <td class="alert-warning"><?= $row->keterangan . "<br/>" . $tgl; ?></td>
                            <td class="text-center">
                              <?php if (!empty($row->tgl_terkirim)) : ?>
                                <a title="Terima" href="<?= base_url("terima-distribusi-pengadaan/$idEncryption"); ?>" class="btn btn-info btn-sm" onclick="return confirm('Anda yakin Sudah Menerima ?')"><?= session()->get('props')->tombol_terima; ?></a>
                              <?php endif; ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- ./col -->
                <div class="col-12">
                  <div class="card-header" style="background-color:#FFC300">
                    <h3 class="card-title">Peminjaman Randis</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="tableReqPeminjamanRandis" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th><?= session()->get('props')->tgl_pengajuan; ?></th>
                          <th><?= session()->get('props')->nama_pegawai; ?></th>
                          <th><?= session()->get('props')->randis; ?></th>
                          <th><?= session()->get('props')->tgl_peminjaman; ?></th>
                          <th><?= session()->get('props')->tgl_pengembalian; ?></th>
                          <th><?= session()->get('props')->keperluan; ?></th>
                          <th><?= session()->get('props')->status; ?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($pinjamRandis as $row) :
                        ?>
                          <tr>
                            <td><?= date('d M Y', strtotime($row->tgl_pengajuan)); ?></td>
                            <td><?= $row->nama_pegawai; ?></td>
                            <td><?= $row->nopol . ' - ' . $row->merk_kendaraan; ?></td>
                            <td><?= $row->tgl_peminjaman; ?></td>
                            <td><?= $row->tgl_pengembalian; ?></td>
                            <td><?= $row->keperluan; ?></td>
                            <td class="<?= $row->status == '1' ? 'alert-warning' : 'alert-danger' ?>"><?= $row->keterangan; ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
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