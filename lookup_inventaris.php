<?php 

     $tipefilter = $_GET['tp'];
    // $paramfilter = $_GET['pm'];

    // echo "tipe filter : ".$tipefilter;
    // echo "<br>";
    // echo "param filter : ".$paramfilter;
    // echo "<br>";
    

?>

<div class="table-responsive text-nowrap">
                   
                   <table id="lookupitem" class="table table-bordered table-hover table-striped">
                       <thead>
                       <tr style="font-weight: bold;">
                            <!-- <td class="sticky-col first-col" style="vertical-align:middle;text-align:center;">No</td> -->
                            <!-- <td class="sticky-col second-col" style="vertical-align:middle;text-align:center;">Ubah</td>
                            <td style="vertical-align:middle;text-align:center;">Delete</td> -->
                            <td style="vertical-align:middle;text-align:center;">No Inventaris</td>
                            <td style="vertical-align:middle;text-align:center;">Nama Barang</td>
                            <td style="vertical-align:middle;text-align:center;">Jenis Barang</td>
                            <td style="vertical-align:middle;text-align:center;">Unit Kerja</td>
                            <td style="vertical-align:middle;text-align:center;">Ruangan</td>
                            <td style="vertical-align:middle;text-align:center;">Pengguna</td>
                            <td style="vertical-align:middle;text-align:center;">Tahun Reg.</td>
                            <td style="vertical-align:middle;text-align:center;">Ket. Spesifikasi</td>
                            <!-- <td style="vertical-align:middle;text-align:center;">Tgl Update</td> -->
            
            
                             </tr>
                       </thead>
                       <tbody>
                           <?php
                           include('bissnet.php');
                           include("classinventaris.php");

                           $objinventaris = new inventaris();

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
                                if($tipefilter == "all"){
                                    $dataitem =  $objinventaris->ViewDataInventaris_aktif_search($search_keyword,$limit_start,$limit,$link);
                                }
                                // else if($tipefilter == "kelppb"){
                                //     $dataitem =  $objinventaris->getquery_item_for_lookupitem_pbb_search($paramfilter,$search_keyword,$limit_start,$limit,$link);
                                // }
                                // else if($tipefilter == "keljkm"){
                                //     $dataitem =  $objinventaris->getquery_item_for_lookupitem_jadwaldtgmaterial_search($search_keyword,$limit_start,$limit,$link);

                                // }
                           }
                           else {
                                if($tipefilter == "all"){
                                    $dataitem =  $objinventaris->ViewDataInventaris_aktif($limit_start,$limit,$link);
                                }
                                // else if($tipefilter == "kelppb"){
                                //     $dataitem =  $objinventaris->getquery_item_for_lookupitem_pbb_all($paramfilter,$limit_start,$limit,$link);
                                // }
                                // else if($tipefilter == "keljkm"){
                                //     $dataitem =  $objinventaris->getquery_item_for_lookupitem_jadwaldtgmaterial_all($limit_start,$limit,$link);
                                // }
                           }

                          //  echo $dataitem;
                           
                           $exec_sql = mysql_query($dataitem) or die(mysql_error());

                               while ($row = mysql_fetch_assoc($exec_sql)) {
                                   $inv_kdbarang = $row['kdbarang'];
                                   $inv_kdjenis = $row['kdjenis'];
                                   $inv_namajns = $row['namajns'];
                                   $inv_noinventaris = $row['noinventaris'];
                                   $inv_namainventaris = $row['namabrg'];
                                   $inv_nomerseri = $row['nomerseri'];
                                   $inv_thnbeli = $row['thnbeli'];
                                   $inv_ketspesifikasi = $row['ketspesifikasi'];
                                   $inv_unit_pengguna = $row['DEPARTMENT_NAME'];
                                   $inv_kdruangan = $row['kdruangan'];
                                   $inv_namaruangan = $row['namaruangan'];
                                   $inv_namauser = $row['nmuser'];
                                   $inv_pengelola = $row['pengelola'];
                                   $inv_kdgrup = $row['kdgrup'];
                                   $inv_namagrup = $row['namagrupruang'];
                                   $inv_tempat = $row['tempat'];
                                  
                                   

                               ?>
                               <tr class="pilih_inventaris" style="cursor:pointer;" data-kdbarang="<?php echo $inv_kdbarang; ?>"  data-namainventaris="<?php echo $inv_namainventaris; ?>"
                                       data-noinventaris="<?php echo $inv_noinventaris; ?>" data-kdjenis="<?php echo $inv_kdjenis; ?>" data-namajns="<?php echo $inv_namajns; ?>"
                                       data-thnbeli="<?php echo $inv_thnbeli; ?>" data-ketspek="<?php echo $inv_ketspesifikasi; ?>"
                                       data-unitpengguna="<?php echo $inv_unit_pengguna; ?>" data-kdruangan="<?php echo $inv_namaruangan; ?>"
                                       data-pengelola="<?php echo $inv_pengelola; ?>" data-kdgrup="<?php echo $inv_kdgrup; ?>" 
                                       data-namagrup="<?php echo $inv_namagrup; ?>" data-tempat="<?php echo $inv_tempat; ?>" >

                                   <td><?php echo $inv_noinventaris; ?></td>
                                   <td><?php echo $inv_namainventaris; ?></td>
                                   <td><?php echo $inv_namajns; ?></td>
                                   <td><?php echo $inv_unit_pengguna; ?></td>
                                   <td><?php echo $inv_namaruangan; ?></td>
                                   <td><?php echo $inv_namauser; ?></td>
                                   <td><?php echo $inv_thnbeli; ?></td>
                                   <td><?php echo $inv_ketspesifikasi; ?></td>
                                   
                                                                    
                               </tr>
                               <?php } ?>
                       </tbody>
                   </table> 
                   </div> <!-- oferflow x auto -->

                   <?php
        if ($search_keyword !== '%%') {
            if($tipefilter == "all"){
                $total_records =  $objinventaris->get_total_data_inventaris_aktif_search($search_keyword,$link);
            }
            // else if($tipefilter == "kelppb"){
            //     $query_jumlah =  $objinventaris->get_Total_data_item_for_lookupitem_pbb_search($paramfilter,$search_keyword,$link);
            // }
            // else if($tipefilter == "keljkm"){
            //     $query_jumlah =  $objinventaris->get_Total_item_for_lookupitem_jadwaldtgmaterial_search($search_keyword,$link);
            // }
        }
        else{
            if($tipefilter == "all"){
                $total_records =  $objinventaris->get_total_data_inventaris_aktif($link);
            }
            // else if($tipefilter == "kelppb"){
            //     $query_jumlah =  $objinventaris->get_Total_data_item_for_lookupitem_pbb_all($paramfilter,$link);
            // }
            // else if($tipefilter == "keljkm"){
            //     $query_jumlah =  $objinventaris->get_Total_item_for_lookupitem_jadwaldtgmaterial_all($link);
            // }
        }
        //   $exec_sql = mysql_query($query_jumlah) or die(mysql_error());
         
        //   $row = mysql_fetch_assoc($exec_sql);
        //   $total_records = $query_jumlah;
        ?>

<p>Total Data : <?php echo $total_records;    ?> </p>
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
