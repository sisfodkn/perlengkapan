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
                    <h1>Realisasi Anggaran</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Realisasi Anggaran</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-success">
                        <?php
                        $realisasiPerkantoran = 2597260609;
                        $paguPerkantoran = $realisasiPerkantoran + 9052685391;
                        $realisasiBMN = 3837800;
                        $paguBMN = $realisasiBMN + 31762200;
                        $realisasiUmum = 600000;
                        $paguUmum = $realisasiUmum + 18938000;
                        $realisasiTotal = $realisasiPerkantoran + $realisasiBMN + $realisasiUmum;
                        $paguTotal = $paguPerkantoran + $paguBMN + $paguUmum;
                        ?>
                        <div class="card-header">
                            <h3 class="card-title">Triwulan 1 Tahun 2022 - Realisasi <?= number_format((float) ($realisasiBMN / $paguBMN) * 100, 2, '.', '') . "%" ?></h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="text-center"><b>2876.EBA.994<br />Layanan Perkantoran (Bagian PPBJ)</b></div>
                                    <canvas id="pieChartTW1-perkantoran" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    <?php $realisasi = 2597260609;
                                    $pagu = $realisasi + 9052685391 ?>
                                    <div class="text-center"><b>Realisasi <?= number_format((float) ($realisasiPerkantoran / $paguPerkantoran) * 100, 2, '.', '') . "%" ?></b></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-center"><b>2876.EBA.956<br />Layanan BMN</b></div>
                                    <canvas id="pieChartTW1-bmn" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    <?php $realisasi = 3837800;
                                    $pagu = $realisasi + 31762200 ?>
                                    <div class="text-center"><b>Realisasi <?= number_format((float) ($realisasiBMN / $paguBMN) * 100, 2, '.', '') . "%" ?></b></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-center"><b>2876.EBA.952<br />Layanan Umum</b></div>
                                    <canvas id="pieChartTW1-umum" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    <?php $realisasi = 600000;
                                    $pagu = $realisasi + 18938000 ?>
                                    <div class="text-center"><b>Realisasi <?= number_format((float) ($realisasiUmum / $paguUmum) * 100, 2, '.', '') . "%" ?></b></div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="card card-success">
                        <?php
                        $realisasiPerkantoran = 5389105424;
                        $paguPerkantoran = $realisasiPerkantoran + 6260840576;
                        $realisasiBMN = 8312800;
                        $paguBMN = $realisasiBMN + 27287200;
                        $realisasiUmum = 1675385;
                        $paguUmum = $realisasiUmum + 17862615;
                        $realisasiTotal = $realisasiPerkantoran + $realisasiBMN + $realisasiUmum;
                        $paguTotal = $paguPerkantoran + $paguBMN + $paguUmum;
                        ?>
                        <div class="card-header">
                            <h3 class="card-title">Triwulan 2 Tahun 2022 - Realisasi <?= number_format((float) ($realisasiBMN / $paguBMN) * 100, 2, '.', '') . "%" ?></h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="text-center"><b>2876.EBA.994<br />Layanan Perkantoran (Bagian PPBJ)</b></div>
                                    <canvas id="pieChartTW2-perkantoran" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    <div class="text-center"><b>Realisasi <?= number_format((float) ($realisasiPerkantoran / $paguPerkantoran) * 100, 2, '.', '') . "%" ?></b></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-center"><b>2876.EBA.956<br />Layanan BMN</b></div>
                                    <canvas id="pieChartTW2-bmn" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    <div class="text-center"><b>Realisasi <?= number_format((float) ($realisasiBMN / $paguBMN) * 100, 2, '.', '') . "%" ?></b></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-center"><b>2876.EBA.952<br />Layanan Umum</b></div>
                                    <canvas id="pieChartTW2-umum" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    <div class="text-center"><b>Realisasi <?= number_format((float) ($realisasiUmum / $paguUmum) * 100, 2, '.', '') . "%" ?></b></div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
echo view('base/footer');
?>