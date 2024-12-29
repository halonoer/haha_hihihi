<html>
<?php
//    if (session_id() == "" ) 	{
//     session_start();
//   }

//   if (!$_SESSION['pkb_id_user']){
//     session_destroy();
//     header('location:error_session_page.php');
//     }

//     else {
include("bissnet.php");
include("header_form_asset.php");
// include("classuserlogin.php");
// include("classuserlogindetail.php");
include("classkendaraan.php");

// $id_user =  $_SESSION['pkb_id_user'];
// $nama_user =  $_SESSION['pkb_nama_user']; 
// $kd_dept_user =  $_SESSION['pkb_id_departemen']; // id dept = nama dept versi departemen
// $nm_unit_user = $_SESSION['pkb_nama_unit']; 
// //echo "Nama unit : ".$po_nm_unit;
// $id_unit_user =  $_SESSION['pkb_id_unit']; 
// $level_user =  $_SESSION['pkb_level_user'];
// $erp_user_id =  $_SESSION['pkb_erp_user_id'];


// $po_doc_type_id = $_GET['op'];


$in_fitur_mode = $_GET['md'];

$in_kendaraanid = 0;
$in_nokendaraan = "";
$in_mode = "";



$menu_id = "mnjadwaldtgmat";
// echo "ini op : ".$op;



if ($in_fitur_mode == "ad") {
    // $in_mode = "add";
    // Jika mode tambah, ID kendaraan biasanya akan dihasilkan oleh database
    $in_kendaraanid = 0; // ID kendaraan awal (jika Anda ingin mulai dari 1 atau sesuai ID terakhir di DB)
    $in_nokendaraan = ""; // Nomer kendaraan bisa dikosongkan dulu
    $objkendaraan = new kendaraan();
    //$in_kdbarang = $objinventaris->incrementkdbarang($link);
    //echo "ini kode grup ruang : ".$in_kdbarang;


} elseif ($in_fitur_mode == "up") {
    // Mode edit kendaraan
    if (isset($_GET['ii']) && is_numeric($_GET['ii'])) {
        $in_kendaraanid = (int) $_GET['ii']; // Pastikan ID berupa angka
    } else {
        die("Parameter ID kendaraan tidak valid.");
    }
}

// var_dump($in_kendaraanid);
// var_dump($in_nokendaraan);
// }
?>

<head>
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
    <!-- cehckbox toggle bootstrap -->
    <link rel="stylesheet" href="css/bootstrap4-toggle.min.css" />


    <!-- Include file jquery.min.js -->
    <script src="datepicker_mynotes_bs4/jquery.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="dist/js/demo.js"></script> -->
    <!-- Select2 -->
    <!-- <script src="plugins/select2/js/select2.full.min.js"></script> -->
    <!-- cehckbox toggle bootstrap -->
    <script src="js/bootstrap4-toggle.min.js"></script>


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
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

    <!-- jQuery -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->


    <!-- numeric format on js -->
    <script src="js/numeral.min.js"></script>

    <!-- for upload file to server  filestyle -->
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script src="js/jquery.media.js"></script>
</head>

<body>
    <div class="content-header" style="background-color:#F4F6F9;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark text-lg"></h1>

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <!-- <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="list_jadwaldtgmaterial.php"></a></li>
                        </ol> -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div> <!-- /.content-header -->
    <!-- 
    // kendaraan_id - nomor_kendaraan x
    // pabrikan x
    // nomor_rangka x
    // nomor_mesin x
    // tahun_pembuatan x
    // tipe_model x
    // nomor_plat x
    // oddometer x
    // nama_kendaraan x
    // jenis_kendaraan x
    // bahan_bakar x 
    // keterangan x
    -->
    <form action="" class="form_jnskendaraan" method="POST">
        <div class="container-fluid">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Kendaraan</h3>
                </div><!-- /.card-header -->

                <div class="card-body" style="font-size:14px;">
                    <div class="row justify-content-center" style="">
                        <!-- row all -->
                        <div class="col-lg-12 col-md-10 col-sm-12 col-xs-12" id="coltb">
                            <!-- col all -->
                            <div class="container-fluid ">
                                <div class="row">

                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12" id="coltb">
                                        <!-- No Kendaraan -->
                                        <div class="form-group">
                                            <label for="in_nokendaraan">No Kendaraan<span style="color:red;"> *
                                                </span></label>
                                            <input name="in_kendaraanid" id="in_kendaraanid" type="hidden"
                                                class="form-control " style="" value="<?php echo $in_kendaraanid; ?>"
                                                required />
                                            <input name="in_fitur_mode" id="in_fitur_mode" type="hidden"
                                                class="form-control " style="" value="<?php echo $in_fitur_mode; ?>"
                                                required />
                                            <input name="in_stsdoc_old" id="in_stsdoc_old" type="hidden"
                                                class="form-control " style="" value="" required />
                                            <input name="in_nokendaraan" id="in_nokendaraan" type="text"
                                                class="form-control " style="background-color:white;"
                                                value="<?php echo $in_nokendaraan; ?>" readonly required />
                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->

                                    <!-- Nomor Plat -->
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="lblnocuti" style="">Nomor Plat</label>
                                            <input name="in_noplat" id="in_noplat" type="text"
                                                style="font-size: 14px;background-color:white;" class="form-control"
                                                value="" required />
                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->

                                    <!-- Nomor Rangka -->
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="lblnocuti" style="">Nomor Rangka</label>
                                            <input name="in_norangka" id="in_norangka" type="text"
                                                style="font-size: 14px;background-color:white;" class="form-control"
                                                value="" required />
                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->

                                    <!-- Nomor Mesin -->
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="lblnocuti" style="">Nomor Mesin</label>
                                            <input name="in_nomesin" id="in_nomesin" type="text"
                                                style="font-size: 14px;background-color:white;" class="form-control"
                                                value="" required />
                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->
                                </div><!-- row -->
                                <div class="row">

                                    <!-- tahun Kendaraan -->
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="lblnocuti" style="">Tahun Pembuatan</label>
                                            <input name="in_thnpembuatan" id="in_thnpembuatan" type="text"
                                                style="font-size: 14px;background-color:white;" class="form-control"
                                                value="" required />
                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->

                                    <!-- Tipe Model -->
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="lblnocuti" style="">Tipe Model</label>
                                            <input name="in_tpmodel" id="in_tpmodel" type="text"
                                                style="font-size: 14px;background-color:white;" class="form-control"
                                                value="" required />
                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->

                                    <!-- Pabrik -->
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="lblnocuti" style="">Pabrikan</label>
                                            <input name="in_pabrikan" id="in_pabrikan" type="text"
                                                style="font-size: 14px;background-color:white;" class="form-control"
                                                value="" required />
                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->


                                    <!-- Oddometer -->
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="lblnocuti" style="">Oddometer</label>
                                            <input name="in_oddomtr" id="in_oddomtr" type="text"
                                                style="font-size: 14px;background-color:white;" class="form-control"
                                                value="" required />
                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->
                                </div><!-- row -->
                                <div class="row">

                                    <!-- Nama Kendaraan -->
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="coltb">
                                        <div class="form-group">
                                            <label for="lblnocuti" style="">Nama Kendaraan</label>
                                            <input name="in_namakendaraan" id="in_namakendaraan" type="text"
                                                style="font-size: 14px;background-color:white;" class="form-control"
                                                value="" required />
                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->

                                    <!-- Jenis Kendaraan -->
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="lblnocuti">Jenis Kendaraan</label>
                                            <select class="form-control" name="in_jnskendaraan" id="in_jnskendaraan"
                                                required>
                                                <option value="">Pilih</option>
                                                <option value="mtr">Sepeda Motor</option>
                                                <option value="car">Mobil</option>
                                                <option value="bus">Bus</option>
                                                <option value="truk">Truk</option>
                                            </select>
                                        </div><!-- div /form group -->
                                    </div> <!-- div /col -->

                                    <!-- Bahan Bakar -->
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12" id="coltb">
                                        <div class="form-group">
                                            <label for="lblnocuti" style="">Bahan Bakar</label>
                                            <input name="in_bahanbakar" id="in_bahanbakar" type="text"
                                                style="font-size: 14px;background-color:white;" class="form-control"
                                                value="" required />
                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->
                                </div><!-- /.row  -->

                                <!-- Keterangan -->
                                <div class='row'>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="coltb">
                                        <div class="form-group">
                                            <label for="lblnocuti">Keterangan</label>
                                            <textarea name="in_keterangan" id="in_keterangan" class="form-control"
                                                style="font-size: 14px; background-color: white; width: 100%; height: 100px;"
                                                required></textarea>
                                        </div><!-- div /form group -->
                                    </div><!-- div /col -->
                                </div><!-- /.row -->

                            </div>

                        </div>
                    </div>
                </div><!-- card-body -->

                <div class="card-footer clearfix">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:center;" id="coltb">

                            <input type="button" class="btn btn-success" style="" onClick="proses_data()" name="btnsave"
                                id="btnsave" value="Simpan" />

                            <input type="button" class="btn btn-secondary" style="" name="btnbatal" id="btnbatal"
                                value="Batal" onClick="refreshform()" />

                            <input type="button" class="btn btn-warning" style="" name="btnback" id="btnback"
                                value="Kembali" onClick="backform()" />
                        </div> <!-- div /col -->
                    </div><!-- /.row  -->
                </div><!-- /.card-footer-->
            </div><!-- card card-outline card-info -->
        </div><!-- container-fluid -->
    </form>

</body>

</html>
<Script>
$(document).ready(function() {
    var in_fitur_mode = $("[name='in_fitur_mode']").val();
    var in_kendaraanid = $("[name='in_kendaraanid']").val();

    console.log("Fitur Mode:", in_fitur_mode);
    console.log("Kendaraan ID:", in_kendaraanid);

    // Cek mode fitur
    if (in_fitur_mode === "up") {
        console.log("Masuk mode update");
        get_data_kendaraan();
    } else if (in_fitur_mode === "ad") {
        console.log("Masuk mode add");
        clear_entrian();

    } else {
        console.warn("Mode tidak dikenali:", in_fitur_mode);
    }
});

// Berfungsi untuk membersihkan form dengan cara mengosongkan nilai input.
function clear_entrian() {
    var sysdate = new Date();
    $("[name= 'in_kendaraanid']").val("");
    $("[name= 'in_nokendaraan']").val("");
    $("[name= 'in_pabrikan']").val("");
    $("[name= 'in_norangka']").val("");
    $("[name= 'in_nomesin']").val("");
    $("[name= 'in_thnpembuatan']").val("");
    $("[name= 'in_bahanbakar']").val("");
    $("[name= 'in_noplat']").val("");
    $("[name= 'in_oddomtr']").val("");
    $("[name= 'in_namakendaraan']").val("");
    $("[name= 'in_jnskendaraan']").val(""); // Untuk dropdown
    $("[name= 'in_keterangan']").val(""); // Untuk teks keterangan
} // clear detil

// Mengarahkan ulang halaman berdasarkan kondisi fitur mode.
function refreshform() {
    var in_fitur_mode = $("[name='in_fitur_mode']").val();
    var in_kendaraanid = $("[name='in_kendaraanid']").val();

    // pengecekan
    if (!in_fitur_mode) {
        console.error("Fitur mode tidak ditemukan!");
        return;
    }

    // Kondisi untuk fitur mode "ad"
    if (in_fitur_mode == "ad") {
        window.location = "kendaraan_form.php?md=ad";
    }
    // Kondisi untuk fitur mode "up"
    else if (in_fitur_mode == "up") {
        window.location = "kendaraan_form.php?ii=" + in_kendaraanid + "&md=up";
    }
}

// Memberikan konfirmasi jika pengguna membatalkan entri data.
function backform() {
    var in_fitur_mode = $("[name= 'in_fitur_mode']").val();
    var in_kendaraanid = $("[name = 'in_kendaraanid']").val();

    if (in_kendaraanid !== 0 && in_fitur_mode == "ad") {

        swal.fire({
            title: 'Pekabis Alert',
            text: "entrian anda belum tersimpan, apakah anda yakin akan membatalkan entrian data dokumen kendaraan ini ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Tidak',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.value) {
                window.location = "listkendaraan.php";
            }
        });
    } else {
        window.location = "listkendaraan.php";
    }
}

function proses_data() {

    // Ambil nilai dari form
    var in_kendaraanid = $("[name='in_kendaraanid']").val();
    var in_nokendaraan = $("[name='in_nokendaraan']").val();
    var in_pabrikan = $("[name='in_pabrikan']").val();
    var in_norangka = $("[name='in_norangka']").val();
    var in_nomesin = $("[name='in_nomesin']").val();
    var in_noplat = $("[name='in_noplat']").val();
    var in_tpmodel = $("[name='in_tpmodel']").val();
    var in_bahanbakar = $("[name='in_bahanbakar']").val();
    var in_thnpembuatan = $("[name='in_thnpembuatan']").val();
    var in_oddomtr = $("[name='in_oddomtr']").val();
    var in_namakendaraan = $("[name='in_namakendaraan']").val();
    var in_jnskendaraan = $("[name='in_jnskendaraan']").val();
    var in_bahanbakar = $("[name='in_bahanbakar']").val();
    var in_keterangan = $("[name='in_keterangan']").val();

    var in_fitur_mode = $("[name='in_fitur_mode']").val();
    // var in_user_name = $("[name='in_user_name']").val();
    // var in_erp_user_id = $("[name='in_in_erp_user_id']").val();

    var in_mode_getdata = "false";

    var sts_validasi = "";
    var psn_error = "";

    // Validasi Input
    if (in_noplat === "") {
        psn_error = "Entrian nomer plat belum diisi.";
        sts_validasi = "false";
    } else if (in_norangka === "") {
        psn_error = "Entrian nomor rangka belum diisi.";
        sts_validasi = "false";
    } else if (in_nomesin === "") {
        psn_error = "Entrian nomor mesin belum diisi.";
        sts_validasi = "false";
    } else if (in_jnskendaraan === "") {
        psn_error = "Entrian jenis kendaraan belum diisi.";
        sts_validasi = "false";
    } else if (in_thnpembuatan === "") {
        psn_error = "Entrian tahun pembuatan belum diisi.";
        sts_validasi = "false";
    } else {
        psn_error = "";
        sts_validasi = "true";
    } // end else validasi

    console.log("Fitur Mode:", in_fitur_mode);
    console.log("Kendaraan ID:", in_kendaraanid);
    console.log("Nomer Kendaraan:", in_nokendaraan);
    console.log("Pabrikan:", in_pabrikan);
    console.log("Nomor Rangka:", in_norangka);
    console.log("Tipe Mode : ", in_tpmodel);
    console.log("Nomor Mesin:", in_nomesin);
    console.log("Tahun Pembuatan:", in_thnpembuatan);
    console.log("Bahan Bakar: ", in_bahanbakar);
    console.log("Nomor Plat:", in_noplat);
    console.log("Oddometer:", in_oddomtr);
    console.log("Nama Kendaraan:", in_namakendaraan);
    console.log("Jenis Kendaraan:", in_jnskendaraan);
    console.log("Bahan Bakar:", in_bahanbakar);
    console.log("Keterangan:", in_keterangan);
    console.log("kendaraan mode getdata : " + in_mode_getdata);
    // console.log("Hasil dari server:", hasil);

    if (sts_validasi === "false") {
        Swal.fire({
            icon: 'warning',
            title: 'Pekabis Alert',
            text: psn_error
        });
    } else {
        $.ajax({
            type: "POST",
            data: "in_kendaraanid=" + in_kendaraanid +
                "&in_nokendaraan=" + in_nokendaraan +
                "&in_tpmodel=" + in_tpmodel +
                "$in_bahanbakar" + in_bahanbakar +
                "&in_pabrikan=" + in_pabrikan +
                "&in_norangka=" + in_norangka +
                "&in_nomesin=" + in_nomesin +
                "&in_thnpembuatan=" + in_thnpembuatan +
                "&in_noplat=" + in_noplat +
                "&in_oddomtr=" + in_oddomtr +
                "&in_namakendaraan=" + in_namakendaraan +
                "&in_jnskendaraan=" + in_jnskendaraan +
                "&in_bahanbakar=" + in_bahanbakar +
                "&in_keterangan=" + in_keterangan +
                "&in_fitur_mode=" + in_fitur_mode +
                "&in_mode_getdata=" + in_mode_getdata,
            url: "kendaraan_proses.php",

            success: function(hasil) {
                console.log("Response dari server (sebelum parsing):", hasil);
                var objhasil = JSON.parse(hasil);
                console.log("objhasil : " + objhasil);
                console.log("Sts Proses : " + objhasil.sts_proses);

                if (objhasil.sts_proses === "true") {
                    console.log("masuk sts proses == true");
                    in_kendaraanid = objhasil.in_kendaraanid;
                    $("[name='in_kendaraanid']").val(in_kendaraanid);

                    Swal.fire({
                        icon: 'success',
                        title: 'Pekabis Info',
                        text: "Data Kendaraan berhasil disimpan"
                    });
                    linkreload = "kendaraan_form.php?md=up&ii=" + in_kendaraanid;
                    window.location.replace(linkreload);

                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Pekabis Alert',
                        text: objhasil.pesanproses,
                    });
                }
            }
        });
    } // end sts validasi = true

    console.log("Data diproses");
} // proses_data

function get_data_kendaraan() {
    var in_kendaraanid = $("[name= 'in_kendaraanid']").val();
    var in_mode_getdata = "true";
    var in_fitur_mode = $("[name= 'in_fitur_mode']").val();

    console.log("No Kendaraan :" + in_kendaraanid);
    console.log("mode :" + in_mode_getdata);
    console.log("Fungsi get_data_kendaraan dipanggil");

    $.ajax({
        type: "POST",
        data: "in_kendaraanid=" + in_kendaraanid +
            "&in_mode_getdata=" + in_mode_getdata +
            "&in_fitur_mode=" + in_fitur_mode,
        url: "kendaraan_proses.php",
        success: function(hasil) {
            var objhasil = JSON.parse(hasil);

            $("name= 'in_kendaraanid").val(objhasil.kendaraanid);
            $("[name= 'in_nokendaraan']").val(objhasil.nokendaraan);
            $("[name= 'in_pabrikan']").val(objhasil.pabrikan);
            $("[name= 'in_norangka']").val(objhasil.norangka);
            $("[name= 'in_nomesin']").val(objhasil.nomesin);
            $("[name= 'in_noplat']").val(objhasil.noplat);
            $("[name= 'in_thnpembuatan']").val(objhasil.thnpembuatan);
            $("[name= 'in_tpmodel']").val(objhasil.tpmodel);
            $("[name= 'in_bahanbakar']").val(objhasil.bahanbakar);
            $("[name= 'in_oddomtr']").val(objhasil.oddomtr);
            $("[name= 'in_namakendaraan']").val(objhasil.namakendaraan);
            $("[name= 'in_jnskendaraan']").val(objhasil.jnskendaraan);
            $("[name= 'in_bahanbakar']").val(objhasil.bahanbakar);
            $("[name= 'in_keterangan']").val(objhasil.keterangan);

            var nodoc = document.getElementById("in_nokendaraan").value;
            var newnodoc = nodoc.replaceAll("/", "_");
        }
    });
}
</script>