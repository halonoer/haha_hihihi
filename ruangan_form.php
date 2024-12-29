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
            include("classruangan.php");
    
            // $id_user =  $_SESSION['pkb_id_user'];
            // $nama_user =  $_SESSION['pkb_nama_user']; 
            // $kd_dept_user =  $_SESSION['pkb_id_departemen']; // id dept = nama dept versi departemen
            // $nm_unit_user = $_SESSION['pkb_nama_unit']; 
            // //echo "Nama unit : ".$po_nm_unit;
            // $id_unit_user =  $_SESSION['pkb_id_unit']; 
            // $level_user =  $_SESSION['pkb_level_user'];
            // $erp_user_id =  $_SESSION['pkb_erp_user_id'];
        
    
            // $po_doc_type_id = $_GET['op'];
            
    
            $ru_fitur_mode = $_GET['md'];
    
            $ru_kdruangan = 0;
            $ru_mode = "";
             
    
                                 
            $menu_id = "mnjadwaldtgmat";
    // echo "ini op : ".$op;
    
         
       
        if ($ru_fitur_mode == "ad"){
            // $ru_mode = "add";
            $ru_kdruangan = 0;
            $objruangan = new ruangan();
            $ru_kdruangan = $objruangan->increamentkoderuangan($link);
       //echo "ini kode grup ruang : ".$ru_kdruangan;
            
            
         }
         elseif ($ru_fitur_mode == "up"){
            // $ru_mode = "edit";
            $ru_kdruangan =$_GET['ir']; 
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
   <script src="dist/js/demo.js"></script>
   <!-- Select2 -->
   <script src="plugins/select2/js/select2.full.min.js"></script>
   <!-- cehckbox toggle bootstrap -->
   <script src="js/bootstrap4-toggle.min.js"></script>


   <!-- Include library Datepicker Gijgo -->
   <link href="datepicker_mynotes_bs4/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">
   <!-- Include file boootstrap.min.js -->
   <!-- <script src="datepicker_mynotes_bs4/bootstrap/js/bootstrap.min.js"></script> -->
   <!-- Include library Moment JS -->
   <script src="datepicker_mynotes_bs4/moment/moment.min.js"></script>
   <!-- Include library Datepicker Gijgo -->
   <script src="datepicker_mynotes_bs4/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
   <!-- Include file custom.js -->
   <script src="datepicker_mynotes_bs4/custom-js.js"></script>


   <!-- DataTables -->
   <script src="plugins/datatables/jquery.dataTables.js"></script>
   <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

   <link rel="stylesheet" href="sweetalert2/sweetalert2.min.css">
   <script src="sweetalert2/sweetalert2.all.min.js"></script>
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
               <h3 class="card-title">Ruangan</h3>
            </div><!-- /.card-header -->

            <div class="card-body" style="font-size: 14px;align:center;">

               <div class='row justify-content-center' style="">
                  <!-- row all -->
                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" id="coltb">
                     <!-- col all -->

                     <div class='row'>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="coltb">
                           <div class="form-group">
                              <label for="lblnocuti">Kode Ruangan<span style="color:red;"> * </span></label>
                              <input name="ru_fitur_mode" id="ru_fitur_mode" type="hidden" class="form-control "
                                 style="" value="<?php echo $ru_fitur_mode; ?>" required />
                              <!-- <input name="ru_user_name" id="ru_user_name" type="hidden" class="form-control " style=""
                                 value="<?php echo $nama_user; ?>" required />
                              <input name="ru_erp_user_id" id="ru_erp_user_id" type="hidden" class="form-control "
                                 style="" value="<?php echo $erp_user_id; ?>" required /> -->
                              <input name="ru_stsdoc_old" id="ru_stsdoc_old" type="hidden" class="form-control "
                                 style="" value="" required />
                              <input name="ru_kdruangan" type="text" class="form-control "
                                 style="background-color:white;" value="<?php echo $ru_kdruangan; ?>" required
                                 readonly />
                           </div> <!-- div /form group -->
                        </div> <!-- div /col -->
                     </div><!-- /.row  -->

                     <div class='row'>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" id="coltb">
                           <div class="form-group">
                              <label for="lblnocuti" style="">Grup Ruangan</label>
                              <input name="ru_kdgrupruangan" id="ru_kdgrupruangan" style="background-color:white;"
                                 type="text" class="form-control " style="" value="" required readonly />
                           </div> <!-- div /form group -->
                        </div> <!-- div /col -->
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" id="coltb">
                           <div class="form-group">
                              <label for="lblnocuti" style="color:white;">_</label>
                              <!-- <input name="ru_kdgrupruangan" id="ru_kdgrupruangan" type="hidden" class="form-control "
                                    style="" value="" required /> -->
                              <div class="input-group">
                                 <input name="ru_namagrupruangan" id="ru_namagrupruangan" type="text"
                                    class="form-control" style="background-color:white;"
                                    placeholder="Pilih Grup Ruangan..." value="" required readonly="readonly" />
                                 <div class="input-group-append">
                                    <?php //if($ru_fitur_mode == "ad") { ?>
                                    <a class="btn btn-warning" id="btnlookupgrupruangan" name="btnlookupgrupruangan"
                                       style="cursor:pointer;padding-top:10px;" data-toggle="modal"
                                       style="cursor:pointer;padding-top:10px;" data-target="#myModalGrupruangan"><i
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
                              <!-- <input name="ru_kdgrupruangan" id="ru_kdgrupruangan" type="hidden" class="form-control "
                                    style="" value="" required /> -->
                              <div class="input-group">
                                 <input name="ru_namaunit" id="ru_namaunit" type="text" class="form-control"
                                    style="background-color:white;" placeholder="Pilih Unit..." value="" required
                                    readonly="readonly" />
                                 <input name="ru_idunit" id="ru_idunit" type="hidden" style="" class="form-control"
                                    value="" required />
                                 <div class="input-group-append">
                                    <?php //if($ru_fitur_mode == "ad") { ?>
                                    <a class="btn btn-warning" id="btnlookupunit" name="btnlookupunit"
                                       style="cursor:pointer;padding-top:10px;" data-toggle="modal"
                                       style="cursor:pointer;padding-top:10px;" data-target="#myModalUnit"><i
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
                              <label for="lblnocuti" style="">Nama Ruangan</label>
                              <input name="ru_namaruangan" id="ru_namaruangan" type="text"
                                 style="font-size: 14px;background-color:white;" class="form-control" value=""
                                 required />
                           </div> <!-- div /form group -->
                        </div> <!-- div /col -->
                     </div><!-- /.row  -->

                     <div class='row'>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="coltb">
                           <div class="form-group">
                              <label for="lblnocuti" style="">Keterangan</label>
                              <textarea class="form-control form-control-sm" name="ru_keterangan" id="ru_keterangan"
                                 rows="3"><?php //echo $ppb_note;?></textarea>
                           </div> <!-- div /form group -->
                        </div> <!-- div /col -->
                     </div><!-- /.row -->

                  </div> <!-- div /col all-->
               </div><!-- /.row all -->
            </div><!-- /.card-body -->

            <div class="card-footer clearfix">
               <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:center;" id="coltb">
                     <input type="button" class="btn btn-success" style="" onclick="proses_data()" name="btnsave"
                        id="btnsave" value="Simpan" />
                     <input type="button" class="btn btn-secondary" style="" name="btnbatal" id="btnbatal" value="Batal"
                        onClick="refreshform()" />
                     <input type="button" class="btn btn-warning" style="" name="btnback" id="btnback" value="Kembali"
                        onClick="backform()" />
                  </div> <!-- div /col -->
               </div><!-- /.row  -->
            </div><!-- /.card-footer-->

         </div><!-- /.card -->



      </div><!-- /.container-fluid -->
   </form>

</body>

</html>


<!-- Modal Lookup Grup Ruangan -->
<div class="modal fade" id="myModalGrupruangan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog  modal-xl">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Data Grup Ruangan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                  aria-hidden="true">&times;</span></button>

         </div>
         <div class="modal-body" style="width:95%;">
            <div class="row justify-content-end">
               <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

                  <input type="text" name="s_keyword" id="s_keyword" class="form-control" placeholder="Pencarian...">

               </div><!-- /.col -->
            </div><!-- /.row -->
            </br>
            <div class="datagrupruangan"></div>

         </div><!-- /div modal-body -->
      </div><!-- /div modal-content -->
   </div><!-- /div modal-dialog -->
</div><!-- /div modal -->



<!-- Modal Lookup Unit -->
<div class="modal fade" id="myModalUnit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog  modal-xl">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Data Unit</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                  aria-hidden="true">&times;</span></button>

         </div>
         <div class="modal-body" style="width:95%;">
            <div class="row justify-content-end">
               <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

                  <input type="text" name="s_keyword_unit" id="s_keyword_unit" class="form-control"
                     placeholder="Pencarian...">

               </div><!-- /.col -->
            </div><!-- /.row -->
            </br>
            <div class="dataunit"></div>

         </div><!-- /div modal-body -->
      </div><!-- /div modal-content -->
   </div><!-- /div modal-dialog -->
</div><!-- /div modal -->


<script>
//modal grupruangan
$(document).on('click', '.pilih_grupruang', function(e) {

   document.getElementById("ru_kdgrupruangan").value = $(this).attr(
   'data-kdgrupruang'); //need_date.toLocaleString();
   document.getElementById("ru_namagrupruangan").value = $(this).attr('data-namagrupruangan');


   $('#myModalGrupruangan').modal('hide');

});

$('#myModalGrupruangan').on('show.bs.modal', function(e) {
   load_data();

   function load_data(keyword, page) {
      $.ajax({
         method: "POST",
         url: "lookup_grup_ruangan.php",
         data: {
            param_keyword: keyword,
            param_page: page
         },
         success: function(hasil) {
            $('.datagrupruangan').html(hasil);
         }
      });
   }
});


//modal unit
$(document).on('click', '.pilih_unit', function(e) {

   document.getElementById("ru_idunit").value = $(this).attr('data-idunit');
   document.getElementById("ru_namaunit").value = $(this).attr('data-namaunit');


   $('#myModalUnit').modal('hide');

});

$('#myModalUnit').on('show.bs.modal', function(e) {
   load_data_unit();

   function load_data_unit(keyword, page) {
      $.ajax({
         method: "POST",
         url: "lookup_unit.php",
         data: {
            param_keyword: keyword,
            param_page: page
         },
         success: function(hasil) {
            $('.dataunit').html(hasil);
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
         url: "lookup_grup_ruangan.php",
         data: {
            param_keyword: keyword,
            param_page: page
         },
         success: function(hasil) {
            $('.datagrupruangan').html(hasil);
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

   //load unit
   load_data_unit();

   function load_data_unit(keyword, page) {
      $.ajax({
         method: "POST",
         url: "lookup_unit.php",
         data: {
            param_keyword: keyword,
            param_page: page
         },
         success: function(hasil) {
            $('.dataunit').html(hasil);
         }
      });

   }


   $('#s_keyword_unit').keyup(function() {

      var keyword = $("#s_keyword_unit").val();
      load_data_unit(keyword);
   });
   $(document).on('click', '.halaman', function() {
      var page = $(this).attr("id");
      var keyword = $("#s_keyword_unit").val();
      load_data_unit(keyword, page);
   });

});

//===========================================================================================================================
// proses CRUD
//===========================================================================================================================

$(document).ready(function() {

   var ru_fitur_mode = $("[name= 'ru_fitur_mode']").val();
   var ru_kdruangan = $("[name= 'ru_kdruangan']").val();

   console.log("ruangan mode 1 : " + ru_fitur_mode);
   console.log("ready mode");

   if (ru_fitur_mode == "up") {
      console.log("masuk up");
      get_data_ruangan();


   } else if (ru_fitur_mode == "ad") {

      clear_entrian();

   }



});

function clear_entrian() {

   // console.log("masuk clear detail");
   var sysdate = new Date();

   // console.log("tgl : "+sysdate);
   $("[name= 'ru_kdgrupruangan']").val("");
   $("[name= 'ru_namagrupruangan']").val("");
   $("[name= 'ru_namaunit']").val("");
   $("[name= 'ru_idunit']").val("");
   $("[name= 'ru_namaruangan']").val("");
   $("[name= 'ru_keterangan']").val("");


} // clear detil

function refreshform() {

   var ru_fitur_mode = $("[name= 'ru_fitur_mode']").val();
   var ru_kdruangan = $("[name= 'ru_kdruangan']").val();


   //console.log("batal ppb_id = "+pr_id);

   if (ru_fitur_mode == "ad") {

      window.location = "ruangan_form.php?md=ad";

   } else if (ru_fitur_mode == "up") {
      window.location = "ruangan_form.php?ir=" + ru_kdruangan + "&md=up";
   }
}


function backform() {

   var ru_fitur_mode = $("[name= 'ru_fitur_mode']").val();
   var ru_kdruangan = $("[name= 'ru_kdruangan']").val();
   //alert("fitur mode = ".pr_fitur_mode);

   if (ru_kdruangan !== 0 && ru_fitur_mode == "ad") {
      // cancel_entrian_po("kembali");

      Swal.fire({
         title: 'Pekabiss Alert',
         text: "Entrian anda belum tersimpan, Apakah Anda yakin akan membatalkan entrian data dokumen grup ruangan ini ?",
         icon: 'question',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         cancelButtonText: 'Tidak',
         confirmButtonText: 'Ya'

      }).then((result) => {

         if (result.value) {
            //alert("Proses delete detil ppb ID "+v_ppb_detil_id);
            window.location = "listruangan.php";

         }
      }) // end ajax    

   } else {
      //alert("tipe PPB : "+tipepr);
      window.location = "listruangan.php";


   }

   // alert("pr type : "+pr_doc_type_id);

}


function proses_data() {

   var ru_kdruangan = $("[name= 'ru_kdruangan']").val();
   var ru_namaruangan = $("[name= 'ru_namaruangan']").val();
   var ru_idunit = $("[name= 'ru_idunit']").val();
   var ru_keterangan = $("[name= 'ru_keterangan']").val();
   var ru_kdgrupruangan = $("[name= 'ru_kdgrupruangan']").val();

   var ru_fitur_mode = $("[name= 'ru_fitur_mode']").val();
   var ru_user_name = $("[name= 'ru_user_name']").val();
   var ru_erp_user_id = $("[name= 'ru_erp_user_id']").val();



   var ru_mode_getdata = "false";

   var sts_validasi = "";
   var psn_error = "";


   if (ru_namaruangan == "") {
      psn_error = "Entrikan Nama Ruangan";
      sts_validasi = "false";
      console.log("sts validasi : false");
   } else if (ru_idunit == "") {
      psn_error = "Entrikan Unit";
      sts_validasi = "false";
      console.log("sts validasi : false");
   } else if (ru_kdgrupruangan == "") {
      psn_error = "Entrikan Grup Ruangan";
      sts_validasi = "false";
      console.log("sts validasi : false");
   } else {
      psn_error = "";
      sts_validasi = "true";
   } // end else validasi
   console.log("kode grup ruang : " + ru_kdruangan);
   console.log("Grup Ruangan mode : " + ru_fitur_mode);
   console.log("Grup Ruangan mode getdata : " + ru_mode_getdata);

   if (sts_validasi == "false") {
      Swal.fire({
         icon: 'warning',
         title: 'Pekabiss Alert',
         text: psn_error

      });
   } else {

      $.ajax({
         type: "POST",
         data: "ru_kdruangan=" + ru_kdruangan +
            "&ru_namaruangan=" + ru_namaruangan +
            "&ru_idunit=" + ru_idunit +
            "&ru_keterangan=" + ru_keterangan +
            "&ru_kdgrupruangan=" + ru_kdgrupruangan +
            "&ru_fitur_mode=" + ru_fitur_mode +
            "&ru_user_name=" + ru_user_name +
            "&ru_mode_getdata=" + ru_mode_getdata,
         url: "ruangan_proses.php",
         success: function(hasil) {
            var objhasil = JSON.parse(hasil);

            //  console.log("Sts proses  : "+objhasil.sts_proses);
            //  console.log("PO  : "+objhasil.po_id);
            //  console.log("no po  : "+objhasil.po_nodoc);


            console.log("objhasil : " + hasil);
            console.log("Sts Proses : " + objhasil.sts_proses);

            if (objhasil.sts_proses == "true") {
               console.log("masuk sts proses ==  true");
               ru_kdruangan = objhasil.ru_kdruangan;
               $("[name= 'ru_kdruangan']").val(ru_kdruangan);

               swal.fire({
                  icon: 'info',
                  title: 'Pekabiss Info',
                  text: "Data Grup Ruangan berhasil disimpan"

               });

               linkreload = "ruangan_form.php?md=up&ir=" + ru_kdruangan;
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


function get_data_ruangan() {

   // $("[name= 'po_id']").val('78889');
   // $("[name= 'po_mode']").val("edit");

   var ru_kdruangan = $("[name= 'ru_kdruangan']").val();
   var ru_mode_getdata = "true";
   var ru_fitur_mode = $("[name= 'ru_fitur_mode']").val();

   console.log("id ruangan :" + ru_kdruangan);
   console.log("mode :" + ru_mode_getdata);
   // console.log("akses atasan : "+ppb_akses_app_atspeminta);

   $.ajax({
      type: "POST",
      data: "ru_kdruangan=" + ru_kdruangan + "&ru_mode_getdata=" + ru_mode_getdata + "&ru_fitur_mode=" +
         ru_fitur_mode,
      url: "ruangan_proses.php",
      success: function(hasil) {
         var objhasil = JSON.parse(hasil);


         $("[name= 'ru_kdruangan']").val(objhasil.kdruangan);
         $("[name= 'ru_kdgrupruangan']").val(objhasil.kdgrup);
         $("[name= 'ru_namagrupruangan']").val(objhasil.namagrupruang);
         $("[name= 'ru_namaruangan']").val(objhasil.namaruangan);
         $("[name= 'ru_idunit']").val(objhasil.unitid);
         $("[name= 'ru_namaunit']").val(objhasil.unitname);
         $("[name= 'ru_keterangan']").val(objhasil.keterangan);
         console.log("namagrup :" + $("[name= 'ru_namagrupruangan']").val(objhasil.namagrupruang));

      }
   });
}
</script>