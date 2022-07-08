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
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $totalReqPengadaan->total; ?><sup style="font-size: 20px"> Permintaan</sup></h3>

              <p>Total Pengadaan Tertunda</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $totalCompletePengadaan->total; ?><sup style="font-size: 20px"> Permintaan</sup></h3>

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
              <h3>44</h3>

              <p>User Registrations</p>
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
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
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
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Permintaan Pengadaan Tertunda</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tableReqPengadaan" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th><?= session()->get('props')->nama_pegawai; ?></th>
                    <th><?= session()->get('props')->tipe_pengadaan; ?></th>
                    <th><?= session()->get('props')->jenis_kegiatan; ?></th>
                    <th><?= session()->get('props')->daftar_permintaan; ?></th>
                    <th><?= session()->get('props')->tgl_pengajuan; ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($permintaan as $row) :
                  ?>
                    <tr>
                      <td><?= $row->nama_pegawai; ?></td>
                      <td><?= $row->tipe_pengadaan; ?></td>
                      <td><?= $row->jenis_kegiatan; ?></td>
                      <td><?= $row->isi_permintaan; ?></td>
                      <td><?= $row->tgl_pengajuan; ?></td>
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
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Permintaan Pengadaan Selesai</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tableReqPengadaan" class="table table-bordered table-hover">
                <thead>
                  <tr>
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
                      <td><?= $row->nama_pegawai; ?></td>
                      <td><?= $row->tipe_pengadaan; ?></td>
                      <td><?= $row->jenis_kegiatan; ?></td>
                      <td><?= $row->isi_permintaan; ?></td>
                      <td><?= $row->tgl_persetujuan; ?></td>
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