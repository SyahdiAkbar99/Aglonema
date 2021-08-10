<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2021 All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Aglonema</b>
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
<script src="<?= base_url('assets/admin/js/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/admin/js/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/admin/js/bootstrap.bundle.min.js') ?>"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/admin/js/Chart.min.js') ?>"></script>

<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/admin/js/jquery.knob.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/admin/js/moment.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/daterangepicker.js') ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/admin/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/admin/js/summernote-bs4.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/admin/js/jquery.overlayScrollbars.min.js') ?>"></script>

<!-- zoomsl -->
<script type="text/javascript" src="<?= base_url('assets/admin/js/zoomsl.min.js') ?>">

</script>
<!-- Datatables -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>

<!-- AdminLTE App -->
<script src="<?= base_url('assets/admin/js/adminlte.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/admin/js/demo.js') ?>"></script>

<script src="<?= base_url('assets/admin/js/script.js'); ?>"></script>

<script type="text/javascript">
    //Button Export Data Tanaman Menu
    $(document).ready(function() {
        $('#data-tanaman').DataTable({
            dom: 'lBfrtip',
            autoWidth: true,
            lengthMenu: [
                [3, 5, 10, 25, 50, -1],
                [3, 5, 10, 25, 50, "All"]
            ],
            buttons: [{
                    className: 'btn-danger btn-round btn-sm mr-2',
                    extend: 'pdfHtml5',
                    text: 'Cetak (PDF) <i class="fa fa-file-pdf-o"></i>',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7],
                    },
                    title: 'Data Tanaman'
                },
                {
                    className: 'btn-success btn-round btn-sm mr-2',
                    extend: 'excelHtml5',
                    text: 'Cetak (Excel) <i class="fa fa-file-excel-o"></i>',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7],
                    },
                    title: 'Data Tanaman'
                }
            ],
            select: {
                style: "multi"
            }
        });
    });

    //Edit Modal Data Tanaman
    $(document).ready(function() {
        // Untuk sunting
        $('#edit-data-tanaman').on('show.bs.modal', function(event) {
            // Tombol dimana modal di tampilkan
            var div = $(event.relatedTarget);
            var modal = $(this);

            // Isi nilai pada field
            modal.find('#id').attr("value", div.data('id'));
            modal.find('#kode').attr("value", div.data('kode'));
            modal.find('#nama').attr("value", div.data('nama'));
            modal.find('#image').attr("value", div.data('image'));
            modal.find('#jenis').attr("value", div.data('jenis'));
            modal.find('#berat').attr("value", div.data('berat'));
            modal.find('#warna').attr("value", div.data('warna'));
            modal.find('#jumlah').attr("value", div.data('jumlah'));
            modal.find('#harga').attr("value", div.data('harga'));
        });
    });

    // $(document).ready(function() {
    //     $("#jumlah-barang").on("change", function() {
    //         var harga = parseInt($("#hargaSatuan").val());
    //         var jumlah = parseInt($("#jumlah-barang").val());
    //         var totalharbar = harga * jumlah;
    //         $("#totalHargaBarang").val(totalharbar);
    //     });
    // });

    // $(document).ready(function() {
    //     $("#Digunakan").on("change", function() {
    //         var jumlah = parseInt($("#jumlah-barang").val());
    //         var digunakan = parseInt($("#Digunakan").val());
    //         var tersedia = jumlah - digunakan;
    //         $("#Tersedia").val(tersedia);
    //     });
    // });

    $(function() {
        $(".upl-tf").imagezoomsl({
            classmagnifier: "magnifier",

            classcursorshade: "cursorshade",

            classstatusdiv: "statusdiv",

            classtextdn: "textdn",

            classtracker: "tracker",

            // shows the magnifying glass container
            cursorshade: true,

            // cursor type
            magnifycursor: 'crosshair',

            // background color of the magnifying glass container
            cursorshadecolor: '#fff',

            // opacity of the magnifying glass container
            cursorshadeopacity: 0.3,

            // border styles
            cursorshadeborder: '1px solid black',

            // z-index property
            zindex: '',

            // zoom step
            stepzoom: 3,

            // zoom range 
            zoomrange: [3, 3],

            // start zoom level
            zoomstart: 2,

            // disables the scrolling of the document with the mouse wheel when the cursor is over the image
            disablewheel: true,

            showstatus: true,

            showstatustime: 2000,

            statusdivborder: '1px solid black',

            statusdivbackground: '#C0C0C0',

            statusdivpadding: '4px',

            statusdivfont: 'bold 13px Arial',

            statusdivopacity: 0.8,

            textdnbackground: '#fff',

            textdnpadding: '10px',

            textdnfont: '13px/20px cursive',

            scrollspeedanimate: 5,

            zoomspeedanimate: 7,

            loopspeedanimate: 2.5,

            magnifierspeedanimate: 350

        });
    });
</script>
</body>

</html>