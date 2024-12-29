<?php

// $_SESSION['grup_menu_aktif'] = "kendaraan";
// $_SESSION['menu_aktif'] = "kendaraan subgroup";
include("bissnet.php");

include("top_header_navbar.php");

?>

<div class="content-wrapper">

    <!DOCTYPE html>
    <html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="plugins/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="plugins/googlefont.css" rel="stylesheet">
        <!-- DataTables -->
        <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
        <!-- slider checkbox yes no -->
        <link rel="stylesheet" href="css/slider_yesno.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">


        <!-- Include file jquery.min.js -->
        <script src="datepicker_mynotes_bs4/jquery.min.js"></script>

        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- bs-custom-file-input -->
        <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
        <!-- Select2 -->
        <script src="plugins/select2/js/select2.full.min.js"></script>
        <!-- Include library Datepicker Gijgo -->
        <link href="datepicker_mynotes_bs4/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"
            rel="stylesheet">



        <!-- Include file boootstrap.min.js -->
        <!-- <script src="datepicker_mynotes_bs4/bootstrap/js/bootstrap.min.js"></script> -->
        <!-- Include library Moment JS -->
        <script src="datepicker_mynotes_bs4/moment/moment.min.js"></script>
        <!-- Include library Datepicker Gijgo -->
        <script src="datepicker_mynotes_bs4/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Include file custom.js -->
        <script src="datepicker_mynotes_bs4/custom-js.js"></script>

        <link rel="stylesheet" href="sweetalert2/sweetalert2.min.css">
        <script src="sweetalert2/sweetalert2.all.min.js"></script>

        <!-- DataTables -->
        <!-- <script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script> -->



    </head>

    <body>

        <div class="container-fluid">

            <br>
            <div class="card">
                <div class="card-header" style="">
                    <div class='row'>
                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12" id="coltb">
                            <a class="btn btn-sm btn-info" id="btn_tambah"
                                href="<?php echo "kendaraan_form.php?md=ad"; ?>">Tambah</a>
                            <!-- <input type="button" class="btn btn-info" style="" onclick ="validasi_akses()" name="btntambah" id="btntambah" value="Tambah" /> -->

                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 text-right" style="text-align:right"
                            id="coltb">
                            <h5>Data Kendaraan</h5>

                        </div>

                    </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <div class="row justify-content-end">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

                            <input type="text" name="s_keyword" id="s_keyword" class="form-control"
                                placeholder="Pencarian...">

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <br>
                    <div class="data"></div>
                </div><!-- /.card-body -->
            </div> <!-- /.card -->
        </div> <!-- /.container -->

    </body>

    </html>
</div>
<?php include("footer_navbar.php") ?>
<script>
$(document).ready(function() {
    load_data();
});

function load_data(keyword, page) {
    $.ajax({
        method: "POST",
        url: "kendaraan_listdata.php?jns=ad",
        data: {
            param_keyword: keyword,
            param_page: page
        },

        success: function(hasil) {
            $('.data').html(hasil);
        }
    });
}
$('#s_keyword').keyup(function() {
    var keyword = $("#s_keyword").val();
    load_data(keyword);
});
$(document).on('click', '.halaman', function() {
    var page = $(this).attr("id");
    var keyword = $("#s_keyword").val();
    load_data(keyword, page);
});
</script>