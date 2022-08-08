<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url(); ?>/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url(); ?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>/dist/js/pages/dashboard.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->
<script>
    $(function() {
        $("#tableReqPengadaan").DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $("#tableReqPeminjamanRandis").DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $("#tableReqPengadaanDone").DataTable({
            "responsive": true,
            "lengthChange": false,
            "ordering": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#tableReqPengadaanDone_wrapper .col-md-6:eq(0)');
        $('#tablePegawai').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $('#tableJabatan').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $('#tableUnit').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $('#tableSubUnit').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $('#tableATK').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $('#tableUser').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $('#tableRandisJabatan').DataTable({
            "paging": true,
            "pageLength": 5,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $('#tableRandisKabag').DataTable({
            "paging": true,
            "pageLength": 5,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $('#tableRandisSubbag').DataTable({
            "paging": true,
            "pageLength": 5,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $('#tableRandisPerkantoran').DataTable({
            "paging": true,
            "pageLength": 5,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $('#tableRiwayatReqPengadaan').DataTable({
            "paging": true,
            "pageLength": 10,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $('#tableStatusPengadaan').DataTable({
            "paging": true,
            "pageLength": 5,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<script>
    $(function() {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvasTW1Perkantoran = $('#pieChartTW1-perkantoran').get(0).getContext('2d')
        var pieChartCanvasTW1BMN = $('#pieChartTW1-bmn').get(0).getContext('2d')
        var pieChartCanvasTW1Umum = $('#pieChartTW1-umum').get(0).getContext('2d')
        var pieChartCanvasTW2Perkantoran = $('#pieChartTW2-perkantoran').get(0).getContext('2d')
        var pieChartCanvasTW2BMN = $('#pieChartTW2-bmn').get(0).getContext('2d')
        var pieChartCanvasTW2Umum = $('#pieChartTW2-umum').get(0).getContext('2d')
        var pieDataTW1Perkantoran = {
            labels: [
                'Realisasi',
                'Sisa Anggaran',
            ],
            datasets: [{
                data: [2597260609, 9052685391],
                backgroundColor: ['#f56954', '#00a65a'],
            }]
        }
        var pieDataTW1BMN = {
            labels: [
                'Realisasi',
                'Sisa Anggaran',
            ],
            datasets: [{
                data: [3837800, 31762200],
                backgroundColor: ['#f56954', '#00a65a'],
            }]
        }
        var pieDataTW1Umum = {
            labels: [
                'Realisasi',
                'Sisa Anggaran',
            ],
            datasets: [{
                data: [600000, 18938000],
                backgroundColor: ['#f56954', '#00a65a'],
            }]
        }
        var pieDataTW2Perkantoran = {
            labels: [
                'Realisasi',
                'Sisa Anggaran',
            ],
            datasets: [{
                data: [5389105424, 6260840576],
                backgroundColor: ['#f56954', '#00a65a'],
            }]
        }
        var pieDataTW2BMN = {
            labels: [
                'Realisasi',
                'Sisa Anggaran',
            ],
            datasets: [{
                data: [8312800, 27287200],
                backgroundColor: ['#f56954', '#00a65a'],
            }]
        }
        var pieDataTW2Umum = {
            labels: [
                'Realisasi',
                'Sisa Anggaran',
            ],
            datasets: [{
                data: [1675385, 17862615],
                backgroundColor: ['#f56954', '#00a65a'],
            }]
        }
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(pieChartCanvasTW1Perkantoran, {
            type: 'pie',
            data: pieDataTW1Perkantoran,
            options: pieOptions
        })
        new Chart(pieChartCanvasTW1BMN, {
            type: 'pie',
            data: pieDataTW1BMN,
            options: pieOptions
        })
        new Chart(pieChartCanvasTW1Umum, {
            type: 'pie',
            data: pieDataTW1Umum,
            options: pieOptions
        })
        new Chart(pieChartCanvasTW2Perkantoran, {
            type: 'pie',
            data: pieDataTW2Perkantoran,
            options: pieOptions
        })
        new Chart(pieChartCanvasTW2BMN, {
            type: 'pie',
            data: pieDataTW2BMN,
            options: pieOptions
        })
        new Chart(pieChartCanvasTW2Umum, {
            type: 'pie',
            data: pieDataTW2Umum,
            options: pieOptions
        })
    })
</script>

<!-- jquery-validation -->
<script src="<?php echo base_url(); ?>/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- Page specific script -->
<script>
    $(function() {
        //Date and time picker
        $('#tglPengajuan').datetimepicker({
            format: 'L'
        });
        $('#tglPeminjaman').datetimepicker({
            format: 'L'
        });
        $('#tglPengembalian').datetimepicker({
            format: 'L'
        });
        $('#inputPegawaiForm').validate({
            rules: {
                nip: {
                    required: true
                },
                namaPegawai: {
                    required: true
                },
                jabatan: {
                    required: true
                },
                unit: {
                    required: true
                }
            },
            messages: {
                nip: {
                    required: "NIP/NRP wajib diisi!"
                },
                namaPegawai: {
                    required: "Nama Pegawai wajib diisi!"
                },
                jabatan: {
                    required: "Jabatan wajib diisi!"
                },
                unit: {
                    required: "Unit Kerja wajib diisi!"
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
        $('#inputJabatanForm').validate({
            rules: {
                namaJabatan: {
                    required: true
                }
            },
            messages: {
                namaJabatan: {
                    required: "Nama Jabatan wajib diisi!"
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
        $('#inputUnitForm').validate({
            rules: {
                namaUnit: {
                    required: true
                }
            },
            messages: {
                namaUnit: {
                    required: "Nama Unit wajib diisi!"
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
        $('#inputSubUnitForm').validate({
            rules: {
                namaSubUnit: {
                    required: true
                }
            },
            messages: {
                namaSubUnit: {
                    required: "Nama Sub Unit wajib diisi!"
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
        $('#inputAtkForm').validate({
            rules: {
                namaAtk: {
                    required: true
                }
            },
            messages: {
                namaAtk: {
                    required: "Nama ATK wajib diisi!"
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
</body>

</html>