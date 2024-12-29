<?php
	
	class jenisbarang {
		
		
		private $kdjns;
		private $nmjns;
		private $entri;
		private $created_date;
		private $updby;
		private $tglupd;
		private $sqlquery;
		/*private $strcon;*/
		
		
		
		function setjenisbarang($kode, $nama, $usrentri, $usrupd){
			$this->kdjns=$kode;
			$this->nmjns=$nama;
			$this->entri=$entri;
			$this->updby=$usrupd;	
			
		}
		
		/*function getkoneksistring(){
				/*$this->strcon=$link;
				return $this->strcon;
				
				
			}*/
				
		function getvarjenisbarang(){
			$var = array();
			
			$var['kdjns']=$this->kdjns;
			$var['nmjns']=$this->nmjns;
			$var['entri']=$this->entri;
			$var['created_date']=$this->created_date;
			$var['updby']=$this->updby;
			$var['tglupd']=$this->update_date;
			
			return $var;
		}
		
		function validasikode($kode, $link){
			$valid = '';
			try {
			$query = "select kdjenis from biss_jenisbarang where lower(kdjenis) = lower('$kode')";
			$exec_sql = mysql_query($query) or die(mysql_error());
            $hasil = mysql_fetch_assoc($exec_sql);
			
            if (empty($hasil["kdjenis"])){
                $valid = 'false';
            }
            else {
                if (strtolower($hasil['kdjenis']) == strtolower($kode)){
                    $valid = 'true';
                }
                else {
                    $valid = 'false';
                }
            }
			
            return $valid;
            mysql_close();
        
           }
           catch(Exception $ex){
            $valid = 'false';
            return $valid;
               mysql_close();
           }
			
		}
		
		function validasinama($nama, $link){
			$valid = '';
			try {
			$query = "select namajns from biss_jenisbarang where lower(namajns) = lower('$nama')";
			$exec_sql = mysql_query($query) or die(mysql_error());
            $hasil = mysql_fetch_assoc($exec_sql);
			
            if (empty($hasil["namajns"])){
                $valid = 'false';
            }
            else {
                if (strtolower($hasil['namajns']) == strtolower($nama)){
                    $valid = 'true';
                }
                else {
                    $valid = 'false';
                }
            }
			
            return $valid;
            mysql_close();
        
           }
           catch(Exception $ex){
            $valid = 'false';
            return $valid;
               mysql_close();
           }
			
		}

		function validasiprefix($prefix, $link){
			$valid = '';
			try {
			$query = "select prefix from biss_jenisbarang where lower(prefix) = lower('$prefix')";
			$exec_sql = mysql_query($query) or die(mysql_error());
            $hasil = mysql_fetch_assoc($exec_sql);
			
            if (empty($hasil["prefix"])){
                $valid = 'false';
            }
            else {
                if (strtolower($hasil['prefix']) == strtolower($prefix)){
                    $valid = 'true';
                }
                else {
                    $valid = 'false';
                }
            }
			
            return $valid;
            mysql_close();
        
           }
           catch(Exception $ex){
            $valid = 'false';
            return $valid;
               mysql_close();
           }
			
		}
		
		function validasikode_nama($kode, $nama, $link){
			$valid = '';
			try {
			$query = "select namajns from biss_jenisbarang where lower(kdjenis) = lower('$kode') and lower(namajns) = lower('$nama')";
			$exec_sql = mysql_query($query) or die(mysql_error());
            $hasil = mysql_fetch_assoc($exec_sql);
			
            if (empty($hasil["namajns"])){
                $valid = 'false';
            }
            else {
                if (strtolower($hasil['namajns']) == strtolower($nama)){
                    $valid = 'true';
                }
                else {
                    $valid = 'false';
                }
            }
			
            return $valid;
            mysql_close();
        
           }
           catch(Exception $ex){
            $valid = 'false';
            return $valid;
               
           }
		}
		
		function validasikode_prefix($kode, $prefix, $link){
			$valid = '';
			try {
			$query = "select prefix from biss_jenisbarang where lower(kdjenis) = lower('$kode') and lower(prefix) = lower('$prefix')";
			$exec_sql = mysql_query($query) or die(mysql_error());
            $hasil = mysql_fetch_assoc($exec_sql);
			
            if (empty($hasil["prefix"])){
                $valid = 'false';
            }
            else {
                if (strtolower($hasil['prefix']) == strtolower($prefix)){
                    $valid = 'true';
                }
                else {
                    $valid = 'false';
                }
            }
			
            return $valid;
            mysql_close();
        
           }
           catch(Exception $ex){
            $valid = 'false';
            return $valid;
               
           }
		}

		function validasi_redudansi_nama($kode, $nama, $link){
			$valid = '';
			try {
			$query = "select namajns from biss_jenisbarang where lower(namajns) = lower('$nama') and lower(kdjenis) <> lower('$kode') ";
			// echo $query;
			$exec_sql = mysql_query($query) or die(mysql_error());
			$hasil = mysql_fetch_assoc($exec_sql);
			
            if (empty($hasil["namajns"])){
                $valid = 'false';
            }
            else {
                if (strtolower($hasil['namajns']) == strtolower($nama)){
                    $valid = 'true';
                }
                else {
                    $valid = 'false';
                }
            }
			
            return $valid;
            mysql_close();
        
           }
           catch(Exception $ex){
            $valid = 'false';
            return $valid;
           }
		}
		
		function validasi_redudansi_prefix($kode, $prefix, $link){
			$valid = '';
			try {
			$query = "select prefix from biss_jenisbarang where lower(prefix) = lower('$prefix') and lower(kdjenis) <> lower('$kode') ";
			// echo $query;
			$exec_sql = mysql_query($query) or die(mysql_error());
			$hasil = mysql_fetch_assoc($exec_sql);
			
            if (empty($hasil["prefix"])){
                $valid = 'false';
            }
            else {
                if (strtolower($hasil['prefix']) == strtolower($prefix)){
                    $valid = 'true';
                }
                else {
                    $valid = 'false';
                }
            }
			
            return $valid;
            mysql_close();
        
           }
           catch(Exception $ex){
            $valid = 'false';
            return $valid;
           }
		}
		
		function insertjenisbarang($kode, $nama, $prefix, $user, $link){
			try{
				$query= "insert into biss_jenisbarang (kdjenis, namajns, prefix, created_by, created_date) values ('$kode','$nama',upper('$prefix'), '$user',sysdate())";
				//$query= $query." values ('$kode','$nama', '$user',sysdate)";
				//echo $query;
				$cmd = mysql_query($query, $link);
                
                if (!$cmd){
                $sts = 'false';
                }
                else { 
                $sts = 'true'; 
    
                }
    
                return $sts;
                mysql_close();
                } 
                catch(Exception $ex){
                $sts = "false";
                return $sts;
                }
		}
		
		
		function updatejenisbarang($kode, $nama, $prefix, $user, $link){
			try{
				$query= "update biss_jenisbarang  set namajns = '$nama', prefix= upper('$prefix'), last_update_by = '$user', last_update_date = sysdate()
				where kdjenis = '$kode'";
				// echo $query;
				$cmd = mysql_query($query, $link);
                
                if (!$cmd){
                $sts = 'false';
                }
                else { 
                $sts = 'true'; 
    
                }
    
                return $sts;
                mysql_close();
                } 
                catch(Exception $ex){
                $sts = "false";
                return $sts;
                }
		}
		
		function deletejenisbarang($kode, $link){
			try{
			$query= "delete from biss_jenisbarang where kdjenis = '$kode' ";
			$cmd = mysql_query($query, $link);
                
			if (!$cmd){
			$sts = 'false';
			}
			else { 
			$sts = 'true'; 

			}

			return $sts;
			mysql_close();
			} 
			catch(Exception $ex){
			$sts = "false";
			return $sts;
			}
		}
		
		
		function getquery(){
			return $this->sqlquery;	
		}
		
		function getdatafromdb($kode,$link){
			$data = array();
			
			$query = "select * from biss_jenisbarang where lower(kdjenis) = lower('$kode')";
			//echo $query;
			$cmd = mysql_query($query, $link);
			
			while ($hasil = mysql_fetch_assoc($cmd)){
				
				$data['kdjenis']  = $hasil['kdjenis'];
				$data['namajns']  = $hasil['namajns'];
				$data['prefix']  = $hasil['prefix'];
				$data['entri'] = $hasil['created_by'];
				$data['created_date'] = $hasil['created_date'];
				$data['updby']  = $hasil['last_update_by'];
				$data['tglupd'] = $hasil['last_update_date'];
				
			}
			//echo $data['namajns'];
			return $data;
		}


		function ViewDataJenisBarang_all($limit_start,$limit,$link){

			$query = " select * from biss_jenisbarang order by kdjenis desc
			 LIMIT $limit_start,$limit";

			return $query;	
		}
  
		function ViewDataJenisBarang_search($search_keyword,$limit_start,$limit,$link){

			$query = " select * from biss_jenisbarang 
					where kdjenis like '$search_keyword' or namajns like '$search_keyword'
					LIMIT $limit_start,$limit ";

				return $query;	
		}
  
  function get_total_data_search($search_keyword, $link){
			$valid = '';
			try {
			$query = "select count(kdjenis) as jumlah from biss_jenisbarang where  kdjenis like '$search_keyword' or namajns like '$search_keyword'";
			$exec_sql = mysql_query($query) or die(mysql_error());
             
			$hasil = mysql_fetch_assoc($exec_sql);
		   
			 if (empty($hasil["jumlah"]) ){
			   //echo "masuk scope empty hasil";
			   $totalhsl = 0;
		   
			   }
			   else {
				   $totalhsl = $hasil["jumlah"];}
   
		   
		   return $totalhsl;
		   mysql_close();
   
	   }
	   catch(Exception $ex){
		   $totalhsl =0;
		   return $totalhsl;
		   mysql_close();
	   }
		}
  
  	function get_total_all_data($link){
			$valid = '';
			try {
			$query = "select count(kdjenis) as jumlah from biss_jenisbarang ";
			
			$exec_sql = mysql_query($query) or die(mysql_error());
             
			$hasil = mysql_fetch_assoc($exec_sql);
		   
			 if (empty($hasil["jumlah"]) ){
			   //echo "masuk scope empty hasil";
			   $totalhsl = 0;
		   
			   }
			   else {$totalhsl = $hasil["jumlah"];}
   
		   
		   return $totalhsl;
		   mysql_close();
   
	   }
	   catch(Exception $ex){
		   $totalhsl =0;
		   return $totalhsl;
		   mysql_close();
	   }
  }

  function increamentkodejenisbarang($link){
	$valid = '';
	
	$query = "select max(substr(kdjenis,3,2)) as nomer from biss_jenisbarang";
	
	$cmd = mysql_query($query, $link);
	$hasil = mysql_fetch_assoc($cmd);

	if (empty($hasil["nomer"]) ){
		//echo "masuk scope empty hasil";
		$v_nomax = "01";
		$v_strno = "J-".$v_nomax;
	}
	else {
		$v_nomax = $hasil["nomer"];
	   
		$v_digitno = strlen(intval($v_nomax));

		 if ($v_digitno == 1 and $v_nomax < 9) {
			  $v_nomax = $v_nomax +1 ;
			  $v_strno = "J-"."0".$v_nomax;  
		  }
		  else if ($v_digitno == 1 and $v_nomax == 9) {
			  $v_nomax = $v_nomax +1 ;
			  $v_strno = "J-".$v_nomax;  
		  }
		  else if ($v_digitno == 2 and $v_nomax < 99) {
			  $v_nomax = $v_nomax +1 ;
			  $v_strno = "J-".$v_nomax;  
		  }
		  else if ($v_digitno == 2 and $v_nomax == 99) {
			  $v_nomax = $v_nomax +1 ;
			  $v_strno = "J-".$v_nomax;  
		  }
	
	}
	return $v_strno;
	mysql_close();
}

//grup ruangan function lookup======================================================================================================
function get_data_jenisbarang_for_lookup_jenisbarang_search($search_keyword,$limit_start,$limit,$link){
			
    $sql = "select *
            FROM biss_jenisbarang 
            where kdjenis like '$search_keyword' or namajns like '$search_keyword' 
            ORDER BY kdjenis asc LIMIT $limit_start,$limit";
                            
            return $sql;
}

function get_data_jenisbarang_for_lookup_jenisbarang_all($limit_start,$limit,$link){

    $sql = " select *
		     FROM biss_jenisbarang 
 			 ORDER BY kdjenis asc LIMIT $limit_start,$limit";
                
            return $sql;
}

function get_Total_data_jenisbarang_for_lookup_jenisbarang_search($search_keyword,$link){

    $sql = " select count(kdjenis) as jumlah
            FROM biss_jenisbarang 
            where kdjenis like '$search_keyword' or namajns like '$search_keyword' ";
                            
            return $sql;
}

function get_Total_data_jenisbarang_for_lookup_jenisbarang_all($link){

    $sql = " select count(kdjenis) as jumlah
			FROM biss_jenisbarang ";
                            
            return $sql;
}

}
?>