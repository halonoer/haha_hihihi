<?php
$sql = "";

// echo "PO ID : ".$poid;
// echo "<br>";
// echo "Mode = ".$tipe_form;
?>


<div class="table-responsive text-nowrap">
    <table id="" class="table table-bordered table-hover table-striped">
        <thead>
            <tr class="tabelheader">           
                <th>No</th>
                <th>Nama Unit</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include('bissnet.php');
                include("classunit.php");
                                          
                $objunit = new unit();

            $s_keyword="";
            
            if (isset($_POST['param_keyword'])) {
                
                $s_keyword = $_POST['param_keyword'];
                
            }
            
            $page = (isset($_POST['param_page']))? $_POST['param_page'] : 1;
            $limit = 10; 
            $limit_start = ($page - 1) * $limit;
            $no = $limit_start + 1;

            // echo "Limit Bawah : ".$limit_start;
            // echo "<br>";
            // echo "Page : ".$page;

            $search_keyword = '%'. $s_keyword .'%';

            if ($search_keyword !== '%%') {
                $sql =  $objunit->get_data_unit_for_lookup_unit_search($search_keyword,$limit_start,$limit,$link);
      
            }
            else {
                $dataunit =  $objunit->get_data_unit_for_lookup_unit_all($limit_start,$limit,$link);
                $sql = $dataunit ;

            }
           
            // echo "Query : ".$sql;

            if($sql <> ""){
              $exec_sql = mysql_query($sql) or die(mysql_error());
              while ($row = mysql_fetch_assoc($exec_sql)) {
                $u_idunit = $row['department_id'];
                $u_namaunit = $row['department_name'];      

            ?>
            <tr class="pilih_unit" style="cursor:pointer;" data-idunit="<?php echo $u_idunit; ?>"
                data-namaunit="<?php echo $u_namaunit; ?>">   
                <td><?php echo $no++; ?></td>
                <td><?php echo $u_namaunit; ?></td>
              
              <?php } ?>


            </tr>
            <?php
                                }
                                
                                ?>
        </tbody>
    </table>
</div> <!-- oferflow x auto -->

<?php
      $query_jumlah = "";

        if ($search_keyword !== '%%') {
                $query_jumlah = $objunit->get_Total_data_unit_for_lookup_unit_search($search_keyword,$link);

        }
        else{
                $query_jumlah = $objunit->get_Total_data_unit_for_lookup_unit_all($link);        
        }

        if($query_jumlah <> ""){

          $exec_sql = mysql_query($query_jumlah) or die(mysql_error());
         
          $row = mysql_fetch_assoc($exec_sql);
          $total_records = $row['jumlah'];
        }
        else{
          $total_records = 0;
        }
          
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
