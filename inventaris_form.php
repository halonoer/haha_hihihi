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
                include("classinventaris.php");
        
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
        
                $in_kdbarang = 0;
                $in_noinventaris = "";
                $in_mode = "";
                
        
                                    
                $menu_id = "mnjadwaldtgmat";
        // echo "ini op : ".$op;
        
            
        
            if ($in_fitur_mode == "ad"){
                // $in_mode = "add";
                $in_kdbarang = 0;
                $in_noinventaris = "";
                $objinventaris = new inventaris();
                //$in_kdbarang = $objinventaris->incrementkdbarang($link);
        //echo "ini kode grup ruang : ".$in_kdbarang;
                
                
            }
            elseif ($in_fitur_mode == "up"){
                // $in_mode = "edit";
                $in_kdbarang =$_GET['ii']; 
            }
        
            
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

        <form name="form_jnsbarang" method="post" action="">
            <div class="container-fluid">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Inventaris</h3>
                    </div><!-- /.card-header -->

                    <div class="card-body" style="font-size: 14px;">
                        <div class='row justify-content-center' style="">
                            <!-- row all -->
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" id="coltb">
                                <!-- col all -->

                                <div class='row'>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="coltb">
                                        <div class="form-group">
                                            <label for="lblnocuti">No Barang<span style="color:red;">
                                                    *</span></label>
                                            <input name="in_kdbarang" id="in_kdbarang" type="hidden"
                                                class="form-control" value="<?php echo $in_kdbarang; ?>" required />
                                            <input name="in_fitur_mode" id="in_fitur_mode" type="hidden"
                                                class="form-control" value="<?php echo $in_fitur_mode; ?>" required />
                                            <input name="in_stsdoc_old" id="in_stsdoc_old" type="hidden"
                                                class="form-control" value="" required />
                                            <input name="in_noinventaris" id="in_noinventaris" type="text"
                                                class="form-control" style="background-color:white;"
                                                value="<?php echo $in_noinventaris; ?>" readonly required />
                                        </div><!-- div /form group -->
                                    </div> <!-- div /col -->
                                </div><!-- /.row  -->

                                <div class='row'>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" id="coltb">
                                        <div class="form-group">
                                            <label for="lblnocuti" style="">Jenis Barang</label>
                                            <input name="in_kdjenis" id="in_kdjenis" type="text" class="form-control "
                                                style="" value="" required readonly />
                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->

                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" id="coltb">
                                        <div class="form-group">
                                            <label for="lblnocuti" style="color:white;">_</label>
                                            <!-- <input name="in_kdgrupruangan" id="in_kdgrupruangan"   type="hidden" class="form-control "
                                        style="" value="" required /> -->
                                            <div class="input-group">
                                                <input name="in_namajenisbarang" id="in_namajenisbarang" type="text"
                                                    class="form-control" style="background-color:white;"
                                                    placeholder="Pilih Jenis Barang..." value="" required
                                                    readonly="readonly" />
                                                <div class="input-group-append">
                                                    <?php //if($pos_fitur_mode == "ad") { ?>
                                                    <a class="btn btn-warning" id="btnlookupgrupruangan"
                                                        name="btnlookupgrupruangan"
                                                        style="cursor:pointer;padding-top:10px;" data-toggle="modal"
                                                        data-target="#myModalJenisBarang"><i
                                                            class="fas fa-file-powerpoint"></i></a>
                                                    <?php //} ?>
                                                </div><!-- div input group append-->
                                            </div> <!-- div /input group -->
                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->
                                </div><!-- /.row  -->

                                <div class='row'>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="coltb">
                                        <div class="form-group">
                                            <label for="lblnocuti" style="">Nama Barang</label>
                                            <input name="in_namabrg" id="in_namabrg" type="text"
                                                style="font-size: 14px;background-color:white;" class="form-control"
                                                value="" required />
                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->
                                </div><!-- /.row -->

                                <div class='row'>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="coltb">
                                        <div class="form-group">
                                            <label for="lblnocuti" style="">No Seri Barang</label>
                                            <input name="in_nomerseri" id="in_nomerseri" type="text"
                                                style="font-size: 14px;background-color:white;" class="form-control"
                                                value="" />
                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->
                                </div><!-- /.row -->

                                <div class='row'>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="coltb">
                                        <div class="form-group">
                                            <label for="lblnocuti" style="">Motherboard</label>
                                            <input name="in_motherboard" id="in_motherboard" type="text"
                                                style="font-size: 14px;background-color:white;" class="form-control"
                                                value="" />
                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->
                                </div><!-- /.row -->

                                <div class='row'>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="coltb">
                                        <div class="form-group">
                                            <label for="lblnocuti" style="">Processors</label>
                                            <input name="in_processor" id="in_processor" type="text"
                                                style="font-size: 14px;background-color:white;" class="form-control"
                                                value="" />
                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->
                                </div><!-- /.row -->

                                <div class='row'>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="coltb">
                                        <div class="form-group">
                                            <label for="lblnocuti" style="">RAM</label>
                                            <input name="in_ram" id="in_ram" type="text"
                                                style="font-size: 14px;background-color:white;" class="form-control"
                                                value="" />
                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->
                                </div><!-- /.row -->

                                <div class='row'>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="coltb">
                                        <div class="form-group">
                                            <label for="lblnocuti" style="">Hardisk</label>
                                            <input name="in_harddisk" id="in_harddisk" type="text"
                                                style="font-size: 14px;background-color:white;" class="form-control"
                                                value="" required />
                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->
                                </div><!-- /.row -->

                                <div class='row'>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="coltb">
                                        <div class="form-group">
                                            <label for="lblnocuti" style="">LAN Card</label>
                                            <input name="in_lancard" id="in_lancard" type="text"
                                                style="font-size: 14px;background-color:white;" class="form-control"
                                                value="" required />
                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->
                                </div><!-- /.row -->

                                <div class='row'>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="coltb">
                                        <div class="form-group">
                                            <label for="lblnocuti" style="">Tahun Beli</label>
                                            <input name="in_thnbeli" id="in_thnbeli" type="text"
                                                style="font-size: 14px;background-color:white;" class="form-control"
                                                value="" required />
                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->
                                </div><!-- /.row -->

                                <div class='row'>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="coltb">
                                        <div class="form-group">
                                            <label for="lblnocuti" style="">Kondisi</label>
                                            <label for="asterik"
                                                style="color:#F00; text-align:center; vertical-align:text-top;">*</label>
                                            <select class="form-control" name="in_kondisi" id="in_kondisi" required>
                                                <option></option>
                                                <option value="baik"
                                                    <?php //if($uslog_lvluser == "USER"){echo "selected";} else {echo "";}?>>
                                                    Baik</option>
                                                <option value="rusak"
                                                    <?php //if($uslog_lvluser == "USER"){echo "selected";} else {echo "";}?>>
                                                    Rusak</option>
                                            </select>
                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->
                                </div><!-- /.row -->

                                <div class='row'>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="coltb">
                                        <div class="form-group">
                                            <label for="lblnocuti" style="">User / Pengguna</label>
                                            <div class="input-group">
                                                <input name="in_nmuser" id="in_nmuser" type="text" class="form-control"
                                                    style="background-color:white;font-size: 14px;" value="" required
                                                    placeholder="Nama Pengguna" />
                                            </div> <!-- div /input group -->
                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->
                                </div><!-- /.row -->

                                <div class='row'>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="coltb">
                                        <div class="form-group">
                                            <label for="lblnocuti">Lokasi Barang</label>
                                            <input name="in_tempat" id="in_tempat" type="text" class="form-control "
                                                style="" value="" />
                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->
                                </div><!-- /.row  -->

                                <div class='row'>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" id="coltb">
                                        <div class="form-group">
                                            <label for="lblnocuti" style="">Lokasi Barang</label>
                                            <input name="in_kdruangan" id="in_kdruangan" type="text"
                                                class="form-control " style="" value="" style="background-color:white;"
                                                readonly />
                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" id="coltb">
                                        <div class="form-group">
                                            <label for="lblnocuti" style="color:white;">_</label>
                                            <!-- <input name="in_kdgrupruangan" id="in_kdgrupruangan" type="hidden" class="form-control "
                                        style="" value="" required /> -->
                                            <div class="input-group">
                                                <input name="in_namaruangan" id="in_namaruangan" type="text"
                                                    class="form-control" style="background-color:white;"
                                                    placeholder="Pilih Ruangan..." value="" required
                                                    readonly="readonly" />
                                                <div class="input-group-append">
                                                    <?php //if($pos_fitur_mode == "ad") { ?>
                                                    <a class="btn btn-warning" id="btnlookupgrupruangan"
                                                        name="btnlookupgrupruangan"
                                                        style="cursor:pointer;padding-top:10px;" data-toggle="modal"
                                                        style="cursor:pointer;padding-top:10px;"
                                                        data-target="#myModalRuangan"><i
                                                            class="fas fa-file-powerpoint"></i></a>
                                                    <?php //} ?>
                                                </div><!-- div input group append-->
                                            </div> <!-- div /input group -->
                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->
                                </div><!-- /.row  -->

                                <div class='row'>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="coltb">
                                        <div class="form-group">
                                            <label for="lblnocuti" style="">Unit</label>

                                            <div class="input-group">
                                                <input name="in_namaunit" id="in_namaunit" type="text"
                                                    class="form-control" style="background-color:white;"
                                                    placeholder="Pilih Unit..." value="" required readonly="readonly" />
                                                <input name="in_kdunit" id="in_kdunit" type="hidden" style=""
                                                    class="form-control" value="" required />
                                            </div> <!-- div /input group -->
                                        </div> <!-- div /form group -->

                                    </div> <!-- div /col -->
                                </div><!-- /.row  -->

                                <div class='row'>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="coltb">
                                        <div class="form-group">
                                            <label for="lblnocuti">Keterangan Spesifikasi</label>
                                            <textarea class="form-control form-control-sm" name="in_ketspesifikasi"
                                                id="in_ketspesifikasi" rows="3"><?php //echo $ppb_note;?></textarea>

                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->
                                </div><!-- /.row -->

                                <div class='row'>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="coltb">
                                        <div class="form-group">
                                            <label for="lblnocuti">Pengelola</label>
                                            <select class="form-control" name="in_pengelola" id="in_pengelola" required>
                                                <option></option>
                                                <option value="TI"
                                                    <?php //if($uslog_lvluser == "USER"){echo "selected";} else {echo "";}?>>
                                                    TEKNOLOGI INFORMASI</option>
                                                <option value="HARTEK"
                                                    <?php //if($uslog_lvluser == "USER"){echo "selected";} else {echo "";}?>>
                                                    HARTEK</option>
                                                <option value="UMUM"
                                                    <?php //if($uslog_lvluser == "USER"){echo "selected";} else {echo "";}?>>
                                                    UMUM</option>
                                            </select>
                                        </div> <!-- div /form group -->
                                    </div> <!-- div /col -->
                                </div><!-- /.row -->

                                <div class='row'>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="">
                                        <div class=" form-group" style="vertical-align: bottom;">
                                            <label for="lblnocuti" style="">Foto</label>
                                            <!--      <div class="input-group">
                                        <a class="btn btn-warning" id ="btnuploadfile" name="btnuploadfile" style="cursor:pointer;" data-toggle="modal" data-target="#myModaluploadfile">Upload File&nbsp;&nbsp;<i class="fas fa-cloud-upload-alt"></i></a> -->

                                            <!-- </div> div /input group   -->
                                            <div class="input-group">

                                                <div class="custom-file">
                                                    <input type="file" style="cursor:pointer;" name="in_foto"
                                                        id="in_foto">
                                                    <label class="custom-file-label" style="cursor:pointer;"
                                                        for="in_foto" id="textfile"></label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text"
                                                        style="cursor:pointer;background-color:#FFC107;"
                                                        onClick="proses_upload()">Upload</span>
                                                </div>
                                            </div>
                                        </div> <!-- div /form group -->
                                    </div><!-- div /col -->
                                </div> <!-- div row -->

                                <div class='row'>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="" style="">
                                        <img id="foto" width='350' height='350' />
                                        <!-- <a style ="text-align:center;" class="media" href="localhost/biss/inv/5_002_KS_PK_2333.jpg"></a> -->
                                    </div><!-- div /col -->
                                </div><!-- /.row -->

                            </div> <!-- div /col all-->
                        </div><!-- /.row all -->
                    </div><!-- /.card-body -->

                    <div class="card-footer clearfix">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:center;" id="coltb">
                                <input type="button" class="btn btn-success" style="" onclick="proses_data()"
                                    name="btnsave" id="btnsave" value="Simpan" />
                                <input type="button" class="btn btn-secondary" style="" name="btnbatal" id="btnbatal"
                                    value="Batal" onClick="refreshform()" />
                                <input type="button" class="btn btn-warning" style="" name="btnback" id="btnback"
                                    value="Kembali" onClick="backform()" />
                            </div> <!-- div /col -->
                        </div><!-- /.row  -->
                    </div><!-- /.card-footer-->

                </div><!-- /.card -->
            </div><!-- /.container-fluid -->
        </form>

    </body>

    </html>

    <!-- Modal Lookup Jenis Barang -->
    <div class="modal fade" id="myModalJenisBarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog  modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Data Jenis Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>

                </div>
                <div class="modal-body" style="width:95%;">
                    <div class="row justify-content-end">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

                            <input type="text" name="s_keyword" id="s_keyword" class="form-control"
                                placeholder="Pencarian...">

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    </br>
                    <div class="datajenisbarang"></div>

                </div><!-- /div modal-body -->
            </div><!-- /div modal-content -->
        </div><!-- /div modal-dialog -->
    </div><!-- /div modal -->

    <!-- Modal Lookup Ruangan -->
    <div class="modal fade" id="myModalRuangan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog  modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Data Ruangan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>

                </div>
                <div class="modal-body" style="width:95%;">
                    <div class="row justify-content-end">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

                            <input type="text" name="s_keyword_ruangan" id="s_keyword_ruangan" class="form-control"
                                placeholder="Pencarian...">

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    </br>
                    <div class="dataruangan"></div>

                </div><!-- /div modal-body -->
            </div><!-- /div modal-content -->
        </div><!-- /div modal-dialog -->
    </div><!-- /div modal -->

    <script>
//js file upload
bsCustomFileInput.init();

//modal grupruangan
$(document).on('click', '.pilih_jenisbarang', function(e) {

    document.getElementById("in_kdjenis").value = $(this).attr('data-kdjenis'); //need_date.toLocaleString();
    document.getElementById("in_namajenisbarang").value = $(this).attr('data-namajenis');

    $('#myModalJenisBarang').modal('hide');

});

$('#myModalJenisBarang').on('show.bs.modal', function(e) {
    load_data();

    function load_data(keyword, page) {
        $.ajax({
            method: "POST",
            url: "lookup_jenisbarang.php",
            data: {
                param_keyword: keyword,
                param_page: page
            },
            success: function(hasil) {
                $('.datajenisbarang').html(hasil);
            }
        });
    }
});

//modal ruangan
$(document).on('click', '.pilih_ruangan', function(e) {

    document.getElementById("in_kdruangan").value = $(this).attr(
        'data-kdruangan'); //need_date.toLocaleString();
    document.getElementById("in_namaruangan").value = $(this).attr('data-namaruangan');
    document.getElementById("in_kdunit").value = $(this).attr('data-unitid');
    document.getElementById("in_namaunit").value = $(this).attr('data-unitname');

    $('#myModalRuangan').modal('hide');

});

$('#myModalRuangan').on('show.bs.modal', function(e) {
    load_data();

    function load_data(keyword, page) {
        $.ajax({
            method: "POST",
            url: "lookup_ruangan.php",
            data: {
                param_keyword: keyword,
                param_page: page
            },
            success: function(hasil) {
                $('.dataruangan').html(hasil);
            }
        });
    }
});



//load data modal
$(document).ready(function() {

    //load grup ruangan
    load_data();

    function load_data(keyword, page) {
        $.ajax({
            method: "POST",
            url: "lookup_jenisbarang.php",
            data: {
                param_keyword: keyword,
                param_page: page
            },
            success: function(hasil) {
                $('.datajenisbarang').html(hasil);
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
    //================================================================================

    //load ruangan
    load_data_ruangan();

    function load_data_ruangan(keyword, page) {
        $.ajax({
            method: "POST",
            url: "lookup_ruangan.php",
            data: {
                param_keyword: keyword,
                param_page: page
            },
            success: function(hasil) {
                $('.dataruangan').html(hasil);
            }
        });

    }


    $('#s_keyword_ruangan').keyup(function() {

        var keyword = $("#s_keyword_ruangan").val();
        load_data_ruangan(keyword);
    });
    $(document).on('click', '.halaman', function() {
        var page = $(this).attr("id");
        var keyword = $("#s_keyword_ruangan").val();
        load_data_ruangan(keyword, page);
    });


});

//===========================================================================================================================
// proses CRUD
//===========================================================================================================================

$(document).ready(function() {

    var in_fitur_mode = $("[name= 'in_fitur_mode']").val();
    var in_kdbarang = $("[name= 'in_kdbarang']").val();

    console.log("    mode 1 : " + in_fitur_mode);
    console.log("ready mode");

    if (in_fitur_mode == "up") {
        console.log("masuk up");
        get_data_inventaris();


    } else if (in_fitur_mode == "ad") {

        clear_entrian();

    }



});

function clear_entrian() {

    // console.log("masuk clear detail");
    var sysdate = new Date();


    // console.log("tgl : "+sysdate);
    // $("[name= 'in_kdbarang']").val("");
    $("[name= 'in_kdjenis']").val("");
    $("[name= 'in_namajenisbarang']").val("");
    $("[name= 'in_noinventaris']").val("");
    $("[name= 'in_namabrg']").val("");
    $("[name= 'in_nomerseri']").val("");
    $("[name= 'in_motherboard']").val("");
    $("[name= 'in_processor']").val("");
    $("[name= 'in_ram']").val("");
    $("[name= 'in_harddisk']").val("");
    $("[name= 'in_thnbeli']").val("");
    document.getElementById('in_kondisi').getElementsByTagName('option')[0].selected = 'selected';
    // $("[name= 'in_kondisi_throw']").val("");
    $("[name= 'in_ketspesifikasi']").val("");
    $("[name= 'in_nmuser']").val("");
    $("[name= 'in_lancard']").val("");
    $("[name= 'in_kdunit']").val("");
    $("[name= 'in_namaunit']").val("");
    $("[name= 'in_tempat']").val("");
    $("[name= 'in_kdruangan']").val("");
    $("[name= 'in_namaruangan']").val("");
    // $("[name= 'in_pengelola']").val("");
    document.getElementById('in_pengelola').getElementsByTagName('option')[0].selected = 'selected';


} // clear detil

function refreshform() {

    var in_fitur_mode = $("[name= 'in_fitur_mode']").val();
    var in_kdbarang = $("[name= 'in_kdbarang']").val();


    //console.log("batal ppb_id = "+pr_id);

    if (in_fitur_mode == "ad") {

        window.location = "inventaris_form.php?md=ad";

    } else if (in_fitur_mode == "up") {
        window.location = "inventaris_form.php?ii=" + in_kdbarang + "&md=up";
    }
}


function backform() {

    var in_fitur_mode = $("[name= 'in_fitur_mode']").val();
    var in_kdbarang = $("[name= 'in_kdbarang']").val();
    //alert("fitur mode = ".pr_fitur_mode);

    if (in_kdbarang !== 0 && in_fitur_mode == "ad") {
        // cancel_entrian_po("kembali");

        Swal.fire({
            title: 'Pekabiss Alert',
            text: "Entrian anda belum tersimpan, Apakah Anda yakin akan membatalkan entrian data dokumen inventaris ini ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Tidak',
            confirmButtonText: 'Ya'

        }).then((result) => {

            if (result.value) {
                //alert("Proses delete detil ppb ID "+v_ppb_detil_id);
                window.location = "listinventaris.php";

            }
        }) // end ajax    

    } else {
        //alert("tipe PPB : "+tipepr);
        window.location = "listinventaris.php";


    }

    // alert("pr type : "+pr_doc_type_id);

}


function proses_data() {

    var in_kdbarang = $("[name= 'in_kdbarang']").val();
    var in_kdjenis = $("[name= 'in_kdjenis']").val();
    var in_noinventaris = $("[name= 'in_noinventaris']").val();
    var in_namabrg = $("[name= 'in_namabrg']").val();
    var in_nomerseri = $("[name= 'in_nomerseri']").val();
    var in_motherboard = $("[name= 'in_motherboard']").val();
    var in_processor = $("[name= 'in_processor']").val();
    var in_ram = $("[name= 'in_ram']").val();
    var in_harddisk = $("[name= 'in_harddisk']").val();
    var in_nmuser = $("[name= 'in_nmuser']").val();
    var in_thnbeli = $("[name= 'in_thnbeli']").val();
    var in_kondisi = $("[name= 'in_kondisi']").val();
    var in_ketspesifikasi = $("[name= 'in_ketspesifikasi']").val();
    var in_lancard = $("[name= 'in_lancard']").val();
    var in_kdunit = $("[name= 'in_kdunit']").val();
    var in_tempat = $("[name= 'in_tempat']").val();
    var in_kdruangan = $("[name= 'in_kdruangan']").val();
    var in_pengelola = $("[name= 'in_pengelola']").val();
    var in_foto = $("[name= 'in_foto']").val();

    var in_fitur_mode = $("[name= 'in_fitur_mode']").val();
    var in_user_name = $("[name= 'in_user_name']").val();
    var in_erp_user_id = $("[name= 'in_erp_user_id']").val();



    var in_mode_getdata = "false";

    var sts_validasi = "";
    var psn_error = "";


    if (in_kdjenis == "") {
        psn_error = "Entrikan Jenis Barang";
        sts_validasi = "false";
        console.log("sts validasi : false");
    } else if (in_thnbeli == "") {
        psn_error = "Entrikan Tahun Beli";
        sts_validasi = "false";
        console.log("sts validasi : false");
    } else if (in_kondisi == "") {
        psn_error = "Entrikan Kondisi Barang";
        sts_validasi = "false";
        console.log("sts validasi : false");
    } else if (in_nmuser == "") {
        psn_error = "Entrikan User Pengguna";
        sts_validasi = "false";
        console.log("sts validasi : false");
    } else if (in_kdruangan == "") {
        psn_error = "Entrikan Lokasi Barang";
        sts_validasi = "false";
        console.log("sts validasi : false");
    } else {
        psn_error = "";
        sts_validasi = "true";
    } // end else validasi
    console.log("kode barang : " + in_kdbarang);
    console.log("inventaris mode : " + in_fitur_mode);
    console.log("inventaris mode getdata : " + in_mode_getdata);

    if (sts_validasi == "false") {
        Swal.fire({
            icon: 'warning',
            title: 'Pekabiss Alert',
            text: psn_error

        });
    } else {

        $.ajax({
            type: "POST",
            data: "in_kdbarang=" + in_kdbarang +
                "&in_kdjenis=" + in_kdjenis +
                "&in_noinventaris=" + in_noinventaris +
                "&in_namabrg=" + in_namabrg +
                "&in_nomerseri=" + in_nomerseri +
                "&in_motherboard=" + in_motherboard +
                "&in_processor=" + in_processor +
                "&in_ram=" + in_ram +
                "&in_harddisk=" + in_harddisk +
                "&in_nmuser=" + in_nmuser +
                "&in_thnbeli=" + in_thnbeli +
                "&in_kondisi=" + in_kondisi +
                "&in_ketspesifikasi=" + in_ketspesifikasi +
                "&in_lancard=" + in_lancard +
                "&in_kdunit=" + in_kdunit +
                "&in_tempat=" + in_tempat +
                "&in_kdruangan=" + in_kdruangan +
                "&in_pengelola=" + in_pengelola +
                "&in_foto=" + in_foto +
                "&in_fitur_mode=" + in_fitur_mode +
                "&in_user_name=" + in_user_name +
                "&in_mode_getdata=" + in_mode_getdata,
            url: "inventaris_proses.php",
            success: function(hasil) {
                var objhasil = JSON.parse(hasil);

                //  console.log("Sts proses  : "+objhasil.sts_proses);
                //  console.log("PO  : "+objhasil.in_kdbarang);
                //  console.log("no po  : "+objhasil.po_nodoc);

                console.log("objhasil : " + hasil);
                console.log("Sts Proses : " + objhasil.sts_proses);

                if (objhasil.sts_proses == "true") {
                    console.log("masuk sts proses ==  true");
                    in_kdbarang = objhasil.in_kdbarang;
                    $("[name= 'in_kdbarang']").val(in_kdbarang);

                    swal.fire({
                        icon: 'info',
                        title: 'Pekabiss Info',
                        text: "Data Inventaris berhasil disimpan"

                    });

                    linkreload = "inventaris_form.php?md=up&ii=" + in_kdbarang;
                    window.location.replace(linkreload);

                    // get_data_po_shipping();
                    //clear_entrian_detail();
                } else {
                    swal.fire({
                        icon: 'warning',
                        title: 'Pekabiss Alert',
                        text: objhasil.pesanproses

                    });

                }

                //alert();

                //console.log("hasil pr_id : "+objhasil.ppb_id+" - no doc : "+objhasil.ppb_nodoc+" proses : "+objhasil.pesanproses);

            }
        });

    } // end sts validasi = true

} // proses_data


function get_data_inventaris() {

    // $("[name= 'in_kdbarang']").val('78889');
    // $("[name= 'po_mode']").val("edit");

    var in_kdbarang = $("[name= 'in_kdbarang']").val();
    var in_mode_getdata = "true";
    var in_fitur_mode = $("[name= 'in_fitur_mode']").val();


    console.log("id ruangan :" + in_kdbarang);
    console.log("mode :" + in_mode_getdata);
    // console.log("akses atasan : "+ppb_akses_app_atspeminta);

    $.ajax({
        type: "POST",
        data: "in_kdbarang=" + in_kdbarang + "&in_mode_getdata=" + in_mode_getdata + "&in_fitur_mode=" +
            in_fitur_mode,
        url: "inventaris_proses.php",
        success: function(hasil) {
            var objhasil = JSON.parse(hasil);

            $("[name= 'in_kdbarang']").val(objhasil.kdbarang);
            $("[name= 'in_kdjenis']").val(objhasil.kdjenis);
            $("[name= 'in_namajenisbarang']").val(objhasil.namajns);

            $("[name= 'in_namabrg']").val(objhasil.nmbrg)
            $("[name= 'in_noinventaris']").val(objhasil.noinv);
            $("[name= 'in_nomerseri']").val(objhasil.noseri);
            $("[name= 'in_motherboard']").val(objhasil.mboard);
            $("[name= 'in_processor']").val(objhasil.processor);
            $("[name= 'in_ram']").val(objhasil.ram);
            $("[name= 'in_harddisk']").val(objhasil.hdd);
            $("[name= 'in_thnbeli']").val(objhasil.thnbeli);
            $("[name= 'in_ketspesifikasi']").val(objhasil.ketspek);
            $("[name= 'in_nmuser']").val(objhasil.nmuser);
            $("[name= 'in_kondisi']").val(objhasil.kondisi);
            // document.getElementById("in_kondisi").value = in_kondisi;
            $("[name= 'in_pengelola']").val(objhasil.pengelola);

            $("[name= 'in_lancard']").val(objhasil.lan);
            $("[name= 'in_kdunit']").val(objhasil.kdunit);
            $("[name= 'in_namaunit']").val(objhasil.nmunit);
            $("[name= 'in_tempat']").val(objhasil.tempat);
            $("[name= 'in_kdruangan']").val(objhasil.kdruangan);
            $("[name= 'in_namaruangan']").val(objhasil.namaruangan);

            var nodoc = document.getElementById("in_noinventaris").value;
            var newnodoc = nodoc.replaceAll("/", "_");

            document.getElementById("foto").src = "https://pekabiss.petrokayaku.com/biss/inv/" +
                in_kdbarang +
                "_" + newnodoc + ".jpg";
            // document.getElementById("foto").src = "https://localhost/biss/inv/"+in_kdbarang+"_"+newnodoc+".jpg";

            // console.log("nomor inventaris :" + nodoc.replace("/", "_"));

        }
    });
}

function proses_data() {

    var in_kdbarang = $("[name= 'in_kdbarang']").val();
    var in_kdjenis = $("[name= 'in_kdjenis']").val();
    var in_noinventaris = $("[name= 'in_noinventaris']").val();
    var in_namabrg = $("[name= 'in_namabrg']").val();
    var in_nomerseri = $("[name= 'in_nomerseri']").val();
    var in_motherboard = $("[name= 'in_motherboard']").val();
    var in_processor = $("[name= 'in_processor']").val();
    var in_ram = $("[name= 'in_ram']").val();
    var in_harddisk = $("[name= 'in_harddisk']").val();
    var in_nmuser = $("[name= 'in_nmuser']").val();
    var in_thnbeli = $("[name= 'in_thnbeli']").val();
    var in_kondisi = $("[name= 'in_kondisi']").val();
    var in_ketspesifikasi = $("[name= 'in_ketspesifikasi']").val();
    var in_lancard = $("[name= 'in_lancard']").val();
    var in_kdunit = $("[name= 'in_kdunit']").val();
    var in_tempat = $("[name= 'in_tempat']").val();
    var in_kdruangan = $("[name= 'in_kdruangan']").val();
    var in_pengelola = $("[name= 'in_pengelola']").val();
    var in_foto = $("[name= 'in_foto']").val();

    var in_fitur_mode = $("[name= 'in_fitur_mode']").val();
    var in_user_name = $("[name= 'in_user_name']").val();
    var in_erp_user_id = $("[name= 'in_erp_user_id']").val();



    var in_mode_getdata = "false";

    var sts_validasi = "";
    var psn_error = "";


    if (in_kdjenis == "") {
        psn_error = "Entrikan Jenis Barang";
        sts_validasi = "false";
        console.log("sts validasi : false");
    } else if (in_thnbeli == "") {
        psn_error = "Entrikan Tahun Beli";
        sts_validasi = "false";
        console.log("sts validasi : false");
    } else if (in_kondisi == "") {
        psn_error = "Entrikan Kondisi Barang";
        sts_validasi = "false";
        console.log("sts validasi : false");
    } else if (in_nmuser == "") {
        psn_error = "Entrikan User Pengguna";
        sts_validasi = "false";
        console.log("sts validasi : false");
    } else if (in_kdruangan == "") {
        psn_error = "Entrikan Lokasi Barang";
        sts_validasi = "false";
        console.log("sts validasi : false");
    } else {
        psn_error = "";
        sts_validasi = "true";
    } // end else validasi
    console.log("kode barang : " + in_kdbarang);
    console.log("inventaris mode : " + in_fitur_mode);
    console.log("inventaris mode getdata : " + in_mode_getdata);

    if (sts_validasi == "false") {
        Swal.fire({
            icon: 'warning',
            title: 'Pekabiss Alert',
            text: psn_error

        });
    } else {

        $.ajax({
            type: "POST",
            data: "in_kdbarang=" + in_kdbarang +
                "&in_kdjenis=" + in_kdjenis +
                "&in_noinventaris=" + in_noinventaris +
                "&in_namabrg=" + in_namabrg +
                "&in_nomerseri=" + in_nomerseri +
                "&in_motherboard=" + in_motherboard +
                "&in_processor=" + in_processor +
                "&in_ram=" + in_ram +
                "&in_harddisk=" + in_harddisk +
                "&in_nmuser=" + in_nmuser +
                "&in_thnbeli=" + in_thnbeli +
                "&in_kondisi=" + in_kondisi +
                "&in_ketspesifikasi=" + in_ketspesifikasi +
                "&in_lancard=" + in_lancard +
                "&in_kdunit=" + in_kdunit +
                "&in_tempat=" + in_tempat +
                "&in_kdruangan=" + in_kdruangan +
                "&in_pengelola=" + in_pengelola +
                "&in_foto=" + in_foto +
                "&in_fitur_mode=" + in_fitur_mode +
                "&in_user_name=" + in_user_name +
                "&in_mode_getdata=" + in_mode_getdata,
            url: "inventaris_proses.php",
            success: function(hasil) {
                var objhasil = JSON.parse(hasil);

                //  console.log("Sts proses  : "+objhasil.sts_proses);
                //  console.log("PO  : "+objhasil.in_kdbarang);
                //  console.log("no po  : "+objhasil.po_nodoc);

                console.log("objhasil : " + hasil);
                console.log("Sts Proses : " + objhasil.sts_proses);

                if (objhasil.sts_proses == "true") {
                    console.log("masuk sts proses ==  true");
                    in_kdbarang = objhasil.in_kdbarang;
                    $("[name= 'in_kdbarang']").val(in_kdbarang);

                    swal.fire({
                        icon: 'info',
                        title: 'Pekabiss Info',
                        text: "Data Inventaris berhasil disimpan"

                    });

                    linkreload = "inventaris_form.php?md=up&ii=" + in_kdbarang;
                    window.location.replace(linkreload);

                    // get_data_po_shipping();
                    //clear_entrian_detail();
                } else {
                    swal.fire({
                        icon: 'warning',
                        title: 'Pekabiss Alert',
                        text: objhasil.pesanproses

                    });

                }

                //alert();

                //console.log("hasil pr_id : "+objhasil.ppb_id+" - no doc : "+objhasil.ppb_nodoc+" proses : "+objhasil.pesanproses);

            }
        });

    } // end sts validasi = true

} // proses_data
    </script>