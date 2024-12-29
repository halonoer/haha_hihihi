<html>
<?php
    $tipe_form = $_GET['jns'];
    // $aksesubah = $_GET['ub'];
    // $akseshapus = $_GET['del'];
    // $aksescetak = $_GET['ct'];
    // $user_id = $_GET['uid'];
    // $menu_id = $_GET['mn'];

?>

<head>
</head>

<body>

   <div class="table-responsive text-nowrap">
      <table class="table table-striped table-bordered" style="width:100%">
         <thead>
            <tr style="font-weight: bold;">
               <td class="sticky-col first-col" style="vertical-align:middle;text-align:center;">No</td>
               <td class="sticky-col second-col" style="vertical-align:middle;text-align:center;">Ubah</td>
               <td style="vertical-align:middle;text-align:center;">Hapus</td>
               <td style="vertical-align:middle;text-align:center;">Kode Ruangan</td>
               <td style="vertical-align:middle;text-align:center;">Grup Ruangan</td>
               <td style="vertical-align:middle;text-align:center;">Nama Ruangan</td>
               <td style="vertical-align:middle;text-align:center;">Unit Kerja</td>
               <td style="vertical-align:middle;text-align:center;">Dientri Oleh</td>
               <td style="vertical-align:middle;text-align:center;">Tgl Entri</td>
               <td style="vertical-align:middle;text-align:center;">Diupdate Oleh</td>
               <td style="vertical-align:middle;text-align:center;">Tgl Update</td>


            </tr>
         </thead>
         <tbody>
            <?php
            include("bissnet.php");
            include("classruangan.php");

            $objruangan = new ruangan();

            $s_keyword="";
            
            if (isset($_POST['param_keyword'])) {
                
                $s_keyword = $_POST['param_keyword'];
                
            }
            
            $page = (isset($_POST['param_page']))? $_POST['param_page'] : 1;
            $limit = 10; 
            $limit_start = ($page - 1) * $limit;
            $no = $limit_start + 1;

            $search_keyword = '%'. $s_keyword .'%';

            if ($search_keyword !== '%%') {
                $dataruangan =  $objruangan->ViewDataRuangan_search($search_keyword,$limit_start,$limit,$link);
            }
            else {
                $dataruangan =  $objruangan->ViewDataRuangan_all($limit_start,$limit,$link);
  
            }

            $exec_sql = mysql_query($dataruangan) or die(mysql_error());
           
            //if ($dewan1->num_rows > 0) {
                while ($row = mysql_fetch_assoc($exec_sql)) {
              
                    $ru_kdruangan = $row['kdruangan'];
                    $ru_kdgrup = $row['kdgrup'];
                    $ru_namagrupruang = $row['namagrupruang'];
                    $ru_namaruangan = $row['namaruangan'];
                    $ru_unitkerja = $row['DEPARTMENT_NAME'];
                    $ru_created_by = $row['created_by'];
                    $ru_created_date = $row['created_date'];         
                    $ru_last_update_by = $row['last_update_by'];
                    $ru_last_update_date = $row['last_update_date'];  
                  
        ?>
            <?php 
            
         ?>
            <tr style="">
               <td class="sticky-col first-col" style="vertical-align:middle;text-align:center;font-size: 14px;">
                  <?php echo $no++; ?></td>
               <td class="sticky-col second-col" style="vertical-align:middle;text-align:center;"><a
                     onclick="validasi_akses('ubah','<?php echo $ru_kdruangan; ?>' )" href="#"><i
                        class="fas fa-edit"></i></td>
               <td style="vertical-align:middle;text-align:center;">
                  <a href="#" onclick="delete_ruangan('<?php echo $ru_kdruangan; ?>')"
                     class="text-danger delete-link"><i class="far fa-trash-alt"></i></a>
               </td>

               <!-- ========================================================================================= -->

               <td style="vertical-align:middle;font-size: 14px;"><?php echo $ru_kdruangan; ?></td>
               <td style="vertical-align:middle;font-size: 14px;"><?php echo $ru_namagrupruang;?></td>
               <td style="vertical-align:middle;font-size: 14px;"><?php echo $ru_namaruangan;?></td>
               <td style="vertical-align:middle;font-size: 14px;"><?php echo $ru_unitkerja;?></td>
               <td style="vertical-align:middle;font-size: 14px;"><?php echo $ru_created_by; ?></td>
               <td style="vertical-align:middle;font-size: 14px;">
                  <?php echo date('d/m/Y H:i:s',strtotime($ru_created_date)); ?></td>
               <td style="vertical-align:middle;font-size: 14px;"><?php echo $ru_last_update_by; ?></td>
               <td style="vertical-align:middle;font-size: 14px;">
                  <?php echo date('d/m/Y H:i:s',strtotime($ru_last_update_date)); ?></td>

            </tr>

            <!-- <tr>
                <td colspan='7'>Tidak ada data ditemukan</td>
            </tr> -->
            <?php } ?>
         </tbody>
      </table>
   </div> <!-- overflow x auto -->

   <?php
        if ($search_keyword !== '%%') {
          
            $query_jumlah = $objruangan->get_total_data_search($search_keyword, $link);
         
        }
        else{
          
            $query_jumlah = $objruangan->get_total_all_data($link);
          
                }
          //$exec_sql = mysql_query($query_jumlah) or die(mysql_error());
         
          //$row = mysql_fetch_array($exec_sql);
          $total_records = $query_jumlah;
        ?>

   <p>Total Data : <?php echo $total_records; ?></p>
   <nav class="mb-5">
      <ul class="pagination justify-content-end">
         <?php
              $jumlah_page = ceil($total_records / $limit);
              $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
              $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
              $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;
        
              if($page == 1){
                echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
              } else {
                $link_prev = ($page > 1)? $page - 1 : 1;
                echo '<li class="page-item halaman" id="1"><a class="page-link" href="#">First</a></li>';
                echo '<li class="page-item halaman" id="'.$link_prev.'"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
              }

              for($i = $start_number; $i <= $end_number; $i++){
                $link_active = ($page == $i)? ' active' : '';
                echo '<li class="page-item halaman '.$link_active.'" id="'.$i.'"><a class="page-link" href="#">'.$i.'</a></li>';
              }

              if($page == $jumlah_page){
                echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
              } else {
                $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
                echo '<li class="page-item halaman" id="'.$link_next.'"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                echo '<li class="page-item halaman" id="'.$jumlah_page.'"><a class="page-link" href="#">Last</a></li>';
              }
            ?>
      </ul>
   </nav>
<!-- 
   <input name="akses_ubah" id="akses_ubah" type="hidden" class="form-control form-control" style=""
      value="<?php echo $aksesubah; ?>" required />
   <input name="akses_hapus" id="akses_hapus" type="hidden" class="form-control form-control" style=""
      value="<?php echo $akseshapus; ?>" required />
   <input name="akses_cetak" id="akses_cetak" type="hidden" class="form-control form-control" style=""
      value="<?php echo $aksescetak; ?>" required /> -->
   <!-- <input name="user_id" id="user_id" type="hidden" class="form-control form-control" style=""
      value="<?php echo $user_id; ?>" required /> -->
   <!-- <input name="menu_id" id="menu_id" type="hidden" class="form-control form-control" style=""
      value="<?php echo $menu_id; ?>" required /> -->

</body>

</html>



<script language="javascript">
jQuery(document).ready(function($) {

});



function validasi_akses(akses, ruanganid) {

  //  if (akses == 'ubah') {
  //     var akses_ubah = $("[name= 'akses_ubah']").val();

  //     if (akses_ubah == 0) {

  //        swal.fire({
  //           icon: 'warning',
  //           title: 'Pekabiss Alert',
  //           text: 'Anda tidak memiliki akses untuk fitur Ubah data ruangan.'

  //        });

  //     } else if (akses_ubah == 1) {
  //        var linkform = "ruangan_form.php?md=up&ir=" + ruanganid;
  //        window.location.replace(linkform);
  //     }
  //  }
   var linkform = "ruangan_form.php?md=up&ir=" + ruanganid;
         window.location.replace(linkform);
}


function delete_ruangan(ru_kdruangan) {
  //  var idp = ru_kdruangan;
  //  var akses_hapus = $("[name='akses_hapus']").val();
  //  var j_det_mode = "";
   var user_id = $("[name= 'user_id']").val();
   // var tipe_po = $("[name= 'tipe_po']").val();


   // alert("tipe po : "+tipe_po);

  //  if (akses_hapus == 0) {

  //     swal.fire({
  //        icon: 'warning',
  //        title: 'Pekabiss Alert',
  //        text: 'Anda tidak memiliki akses untuk fitur Hapus data ruangan'

  //     });
  //  } else if (akses_hapus == 1) {


      Swal.fire({
         title: 'Apa anda yakin?',
         text: "Menghapus data ruangan yang Anda pilih ?",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Ya, Hapus data'

      }).then((result) => {
         if (result.value) {

            $.ajax({
               type: "POST",
               data: "ru_kdruangan=" + idp + "&ru_mode_getdata=false&ru_fitur_mode=del",
               url: "ruangan_proses.php",
               success: function(hasil) {
                  var objhasil = JSON.parse(hasil);
                  if (objhasil.sts_proses == "true") {
                     swal.fire({
                        icon: 'info',
                        title: 'Pekabiss Info',
                        text: "Data dokumen ruangan berhasil dihapus"

                     });

                     linkreload = "listruangan.php";
                     window.location.replace(linkreload);

                  } // objhasil = true
                  else {
                     swal.fire({
                        icon: 'warning',
                        title: 'Pekabiss Alert',
                        text: "Proses hapus data dokumen ruangan tidak berhasil"

                     });

                  } // else hasil
               }
            }) // end swal
         } // end result
         else if (result.dismiss === Swal.DismissReason.cancel) {
            // swal.fire(
            // 'Cancelled',
            // 'Proses hapus data dibatalkan',
            // 'error'
            // )
         }
      })

  //  } // hps = 1
}
</script>