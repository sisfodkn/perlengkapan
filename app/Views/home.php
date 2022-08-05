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
        <div class="row" style="border-top:1px solid #4f5962;">
          <div class="col-lg-12 col-6">
            <h4 class="m-0 pt-3">Dashboard Pengadaan</h4>
            <br />
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $totalPengadaanMasuk->total; ?><sup style="font-size: 20px"> Permintaan</sup></h3>

                <p>Total Permintaan Belum Direspon</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url('pengadaan-atk-req'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $totalPengadaanSelesai->total; ?><sup style="font-size: 20px"> Permintaan</sup></h3>

                <p>Total Permintaan Sudah Direspon</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url('pengadaan-atk-req'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php endif; ?>
        <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row" style="border-top:1px solid #4f5962;">
          <div class="col-lg-12 col-6">
            <h4 class="m-0 pt-3">Dashboard User</h4>
            <br />
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $totalReqPengadaanUser->total; ?><sup style="font-size: 20px"> Permintaan</sup></h3>

                <p>Total Pengadaan Tertunda</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $totalCompletePengadaanUser->total; ?><sup style="font-size: 20px"> Permintaan</sup></h3>

                <p>Total Pengadaan Selesai</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $totalReqPeminjamanRandis->total; ?><sup style="font-size: 20px"> Permintaan</sup></h3>

                <p>Total Peminjaman Randis Tertunda</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $totalCompletePeminjamanRandis->total; ?><sup style="font-size: 20px"> Permintaan</sup></h3>

                <p>Total Peminjaman Randis Selesai</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="col-12">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Permintaan Pengadaan Tertunda</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tableReqPengadaan" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th><?= session()->get('props')->tgl_pengajuan; ?></th>
                      <th><?= session()->get('props')->nama_pegawai; ?></th>
                      <th><?= session()->get('props')->tipe_pengadaan; ?></th>
                      <th><?= session()->get('props')->jenis_kegiatan; ?></th>
                      <th><?= session()->get('props')->daftar_permintaan; ?></th>
                      <th><?= session()->get('props')->status; ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($permintaan as $row) :
                    ?>
                      <tr>
                        <td><?= date('d M Y', strtotime($row->tgl_pengajuan)); ?></td>
                        <td><?= $row->nama_pegawai; ?></td>
                        <td><?= $row->tipe_pengadaan; ?></td>
                        <td><?= $row->jenis_kegiatan; ?></td>
                        <td><?= $row->isi_permintaan; ?></td>
                        <td class="<?= $row->status == '1' ? 'alert-warning' : 'alert-danger' ?>"><?= $row->keterangan; ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-12">
            <div class="card card-success collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Permintaan Pengadaan Selesai</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tableReqPengadaanDone" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th><?= session()->get('props')->tgl_pengajuan; ?></th>
                      <th><?= session()->get('props')->nama_pegawai; ?></th>
                      <th><?= session()->get('props')->tipe_pengadaan; ?></th>
                      <th><?= session()->get('props')->jenis_kegiatan; ?></th>
                      <th><?= session()->get('props')->daftar_permintaan; ?></th>
                      <th><?= session()->get('props')->tgl_persetujuan; ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($selesai as $row) :
                    ?>
                      <tr>
                        <td><?= date('d M Y', strtotime($row->tgl_pengajuan)); ?></td>
                        <td><?= $row->nama_pegawai; ?></td>
                        <td><?= $row->tipe_pengadaan; ?></td>
                        <td><?= $row->jenis_kegiatan; ?></td>
                        <td><?= $row->isi_permintaan; ?></td>
                        <td><?= date('d M Y', strtotime($row->tgl_persetujuan_bag)); ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-12">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Peminjaman Randis Tertunda</h3>
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
            <!-- /.card -->
          </div>
          <div class="col-12">
            <div class="card card-success collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Peminjaman Randis Selesai</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tableReqPengadaanDone" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th><?= session()->get('props')->tgl_pengajuan; ?></th>
                      <th><?= session()->get('props')->nama_pegawai; ?></th>
                      <th><?= session()->get('props')->randis; ?></th>
                      <th><?= session()->get('props')->tgl_peminjaman; ?></th>
                      <th><?= session()->get('props')->tgl_pengembalian; ?></th>
                      <th><?= session()->get('props')->keperluan; ?></th>
                      <th><?= session()->get('props')->tgl_persetujuan; ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($pinjamRandisSelesai as $row) :
                    ?>
                      <tr>
                        <td><?= date('d M Y', strtotime($row->tgl_pengajuan)); ?></td>
                        <td><?= $row->nama_pegawai; ?></td>
                        <td><?= $row->nopol . ' - ' . $row->merk_kendaraan; ?></td>
                        <td><?= $row->tgl_peminjaman; ?></td>
                        <td><?= $row->tgl_pengembalian; ?></td>
                        <td><?= $row->keperluan; ?></td>
                        <td><?= date('d M Y', strtotime($row->tgl_persetujuan_karo)); ?></td>
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
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
echo view('base/footer');
?>