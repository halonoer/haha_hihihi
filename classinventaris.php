<?php

class inventaris
{


	private $kbrg;
	private $noinv;
	private $kdjns;
	private $entri;
	private $created_date;
	private $updby;
	private $tglupd;
	private $kdunit;
	private $nmbrg;
	private $noseri;
	private $mboard;
	private $ram;
	private $hdisk;
	private $proc;
	private $thnbeli;
	private $kondisi;
	private $lan;
	private $nmusr;
	private $ketspek;
	private $tempat;
	private $kdruangan;

	/*private $strcon;*/



	/*	function setjenisbarang($kode, $nama, $usrentri, $usrupd){
										  $this->kdjns=$kode;
										  $this->nmjns=$nama;
										  $this->entri=$entri;
										  $this->updby=$usrupd;	
										  
									  }*/

	/*function getkoneksistring(){
											 /*$this->strcon=$link;
											 return $this->strcon;
											 
											 
										 }*/

	/*function getvarjenisbarang(){
										 $var = array();
										 
										 $var['kdjns']=$this->kdjns;
										 $var['nmjns']=$this->nmjns;
										 $var['entri']=$this->entri;
										 $var['created_date']=$this->created_date;
										 $var['updby']=$this->updby;
										 $var['tglupd']=$this->created_date;
										 
										 return $var;
									 }*/

	function validasikdbarang($kode, $link)
	{
		$valid = '';
		try {
			$query = "select kdbarang from biss_inventaris where lower(kdbarang) = lower('$kode')";
			// echo $query;
			$exec_sql = mysql_query($query) or die(mysql_error());
			$hasil = mysql_fetch_assoc($exec_sql);

			if (empty($hasil["kdbarang"])) {
				$valid = 'false';
			} else {
				if (strtolower($hasil['kdbarang']) == strtolower($kode)) {
					$valid = 'true';
				} else {
					$valid = 'false';
				}
			}

			return $valid;
			mysql_close();

		} catch (Exception $ex) {
			$valid = 'false';
			return $valid;
			mysql_close();
		}

	}

	function validasinoinventaris($kode, $link)
	{
		$valid = '';
		try {
			$query = "select noinventaris from biss_inventaris where lower(noinventaris) = lower('$kode')";
			// echo $query;
			$exec_sql = mysql_query($query) or die(mysql_error());
			$hasil = mysql_fetch_assoc($exec_sql);

			if (empty($hasil["noinventaris"])) {
				$valid = 'false';
			} else {
				if (strtolower($hasil['noinventaris']) == strtolower($kode)) {
					$valid = 'true';
				} else {
					$valid = 'false';
				}
			}

			return $valid;
			mysql_close();

		} catch (Exception $ex) {
			$valid = 'false';
			return $valid;
			mysql_close();
		}

	}

	function validasinomer_byKode($kode, $no, $link)
	{
		$valid = '';
		try {
			$query = "select noinventaris from biss_inventaris where lower(noinventaris) = lower('$no') and lower(kdbarang) = lower('$kode')";
			$exec_sql = mysql_query($query) or die(mysql_error());
			$hasil = mysql_fetch_assoc($exec_sql);

			if (empty($hasil["noinventaris"])) {
				$valid = 'false';
			} else {
				if (strtolower($hasil['noinventaris']) == strtolower($no)) {
					$valid = 'true';
				} else {
					$valid = 'false';
				}
			}

			return $valid;
			mysql_close();

		} catch (Exception $ex) {
			$valid = 'false';
			return $valid;
			mysql_close();
		}
	}

	function validasi_redudansi_nomer($no, $kode, $link)
	{
		$valid = '';
		try {
			$query = "select noinventaris from biss_inventaris where lower(noinventaris) = lower('$no') and lower(kdbarang) <> lower('$kode')";

			$exec_sql = mysql_query($query) or die(mysql_error());
			$hasil = mysql_fetch_assoc($exec_sql);

			if (empty($hasil["noinventaris"])) {
				$valid = 'false';
			} else {
				if (strtolower($hasil['noinventaris']) == strtolower($kode)) {
					$valid = 'true';
				} else {
					$valid = 'false';
				}
			}

			return $valid;
			mysql_close();

		} catch (Exception $ex) {
			$valid = 'false';
			return $valid;
			mysql_close();
		}

	}

	function insertinventaris($nobrg, $jns, $nodoc, $brg, $seri, $mb, $prs, $mem, $hdd, $user, $thn, $stskon, $ket, $usrnm, $lancard, $unit, $tmp, $kdruang, $pengelola, $foto, $link)
	{
		try {
			$query = "insert into biss_inventaris (kdbarang,kdjenis, noinventaris, namabrg, nomerseri, motherboard,processor, ram, harddisk, 
				created_by, created_date, thnbeli, kondisi, ketspesifikasi, nmuser, lancard, kdunit, tempat, kdruangan,pengelola,foto) 
				values ($nobrg,'$jns','$nodoc','$brg','$seri', '$mb', '$prs','$mem','$hdd',
				'$user',sysdate(), '$thn','$stskon','$ket','$usrnm','$lancard','$unit', '$tmp', '$kdruang', '$pengelola', '$foto')";
			//$query= $query." values ('$kode','$nama', '$user',sysdate)";

			$cmd = mysql_query($query, $link);

			if (!$cmd) {
				$sts = 'false';
			} else {
				$sts = 'true';

			}

			return $sts;
			mysql_close();
		} catch (Exception $ex) {
			$sts = "false";
			return $sts;
		}
	}


	function updateinventaris($nobrg, $jns, $nodoc, $brg, $seri, $mb, $prs, $mem, $hdd, $user, $thn, $stskon, $ket, $usrnm, $lancard, $unit, $tmp, $kdruang, $pengelola, $foto, $link)
	{

		try {
			$query = "update biss_inventaris  set  kdunit = '$unit', noinventaris = '$nodoc', kdjenis = '$jns', namabrg = '$brg', nomerseri = '$seri', 
			motherboard = '$mb', processor = '$prs', ram = '$mem', harddisk = '$hdd',  last_update_by = '$user', last_update_date = sysdate(), thnbeli = '$thn', 
			kondisi = '$stskon', ketspesifikasi = '$ket', nmuser = '$usrnm', lancard = '$lancard', tempat = '$tmp' , kdruangan = '$kdruang', pengelola = '$pengelola', foto = '$foto' ";
			$query = $query . " where kdbarang = '$nobrg'";
			$cmd = mysql_query($query, $link);

			if (!$cmd) {
				$sts = 'false';
			} else {
				$sts = 'true';

			}

			return $sts;
			mysql_close();
		} catch (Exception $ex) {
			$sts = "false";
			return $sts;
		}
	}

	function deleteinventaris($kode, $link)
	{
		try {
			$query = "delete from biss_inventaris where kdbarang = '$kode' ";
			$cmd = mysql_query($query, $link) or die(mysql_error());

			if (!$cmd) {
				$sts = 'false';
			} else {
				$sts = 'true';

			}

			return $sts;
			mysql_close();

		} catch (Exception $ex) {
			$sts = "false";
			return $sts;
			mysql_close();
		}
	}


	function getquery()
	{
		return $this->sqlquery;
	}

	function getdatafromdb($kode, $link)
	{
		$data = array();

		$query = "select * from vu_inventaris where lower(kdbarang) = lower('$kode')";
		$cmd = mysql_query($query, $link);

		while ($hasil = mysql_fetch_assoc($cmd)) {

			$data['kdbarang'] = $hasil['kdbarang'];
			$data['kdjenis'] = $hasil['kdjenis'];
			$data['namajns'] = $hasil['namajns'];
			$data['namajns'] = $hasil['namajns'];
			$data['prefix'] = $hasil['prefix'];
			$data['noinv'] = $hasil['noinventaris'];
			$data['nmbrg'] = $hasil['namabrg'];
			$data['noseri'] = $hasil['nomerseri'];
			$data['mboard'] = $hasil['motherboard'];
			$data['processor'] = $hasil['processor'];
			$data['ram'] = $hasil['ram'];
			$data['hdd'] = $hasil['harddisk'];
			$data['entri'] = $hasil['created_by'];
			$data['created_date'] = $hasil['created_date'];
			$data['updby'] = $hasil['last_update_by'];
			$data['tglupd'] = $hasil['last_update_date'];
			$data['thnbeli'] = $hasil['thnbeli'];
			$data['kondisi'] = $hasil['kondisi'];
			$data['ketspek'] = $hasil['ketspesifikasi'];
			$data['nmuser'] = $hasil['nmuser'];
			$data['lan'] = $hasil['lancard'];
			$data['kdunit'] = $hasil['kdunit'];
			$data['nmunit'] = $hasil['DEPARTMENT_NAME'];
			$data['tempat'] = $hasil['tempat'];
			$data['kdruangan'] = $hasil['kdruangan'];
			$data['namaruangan'] = $hasil['namaruangan'];
			$data['pengelola'] = $hasil['pengelola'];
			$data['foto'] = $hasil['foto'];
		}



		return $data;
	}

	function ViewDataInventaris_all($limit_start, $limit, $link)
	{

		$query = " select * from vu_inventaris order by created_date desc
			 LIMIT $limit_start,$limit";

		return $query;
	}

	function ViewDataInventaris_search($search_keyword, $limit_start, $limit, $link)
	{

		$query = " select * from vu_inventaris 
					where kdruangan like '$search_keyword' or kdbarang like '$search_keyword' or kdjenis like '$search_keyword'
					or namajns like  '$search_keyword' or noinventaris like '$search_keyword' 
					or namabrg like '$search_keyword' or nomerseri like '$search_keyword'
					or motherboard like '$search_keyword' or processor like '$search_keyword' or ram like '$search_keyword'
					or harddisk like '$search_keyword' or thnbeli like '$search_keyword' or lancard like '$search_keyword'
					or DEPARTMENT_NAME like '$search_keyword' or nmuser like '$search_keyword' or tempat like '$search_keyword' or namaruangan like '$search_keyword'
					or pengelola like '$search_keyword'
					order by created_date desc
					LIMIT $limit_start,$limit ";
		// echo $query;
		return $query;
	}

	function ViewDataInventaris_aktif($limit_start, $limit, $link)
	{

		$query = " select * from vu_inventaris where lower(kondisi) = 'baik' order by created_date desc
			 LIMIT $limit_start,$limit";

		return $query;
	}

	function ViewDataInventaris_aktif_search($search_keyword, $limit_start, $limit, $link)
	{

		$query = " select * from vu_inventaris 
					where  lower(kondisi) = 'baik' and (kdruangan like '$search_keyword' or kdbarang like '$search_keyword' or kdjenis like '$search_keyword'
					or namajns like  '$search_keyword' or noinventaris like '$search_keyword' 
					or namabrg like '$search_keyword' or nomerseri like '$search_keyword'
					or motherboard like '$search_keyword' or processor like '$search_keyword' or ram like '$search_keyword'
					or harddisk like '$search_keyword' or thnbeli like '$search_keyword' or lancard like '$search_keyword'
					or DEPARTMENT_NAME like '$search_keyword' or nmuser like '$search_keyword' or tempat like '$search_keyword'
					or pengelola like '$search_keyword')
					LIMIT $limit_start,$limit ";
		// echo $query;
		return $query;
	}
	function get_total_all_data($link)
	{
		$valid = '';
		try {
			$query = "select count(kdbarang) as jumlah from biss_inventaris ";

			$exec_sql = mysql_query($query) or die(mysql_error());

			$hasil = mysql_fetch_assoc($exec_sql);

			if (empty($hasil["jumlah"])) {
				//echo "masuk scope empty hasil";
				$totalhsl = 0;

			} else {
				$totalhsl = $hasil["jumlah"];
			}


			return $totalhsl;
			mysql_close();

		} catch (Exception $ex) {
			$totalhsl = 0;
			return $totalhsl;
			mysql_close();
		}
	}

	function get_total_data_search($search_keyword, $link)
	{
		$valid = '';
		try {
			$query = "select count(kdbarang) as jumlah from vu_inventaris where kdruangan like '$search_keyword' or 
		kdbarang like '$search_keyword' or kdjenis like '$search_keyword' or namajns like  '$search_keyword'
		or noinventaris like '$search_keyword' or namabrg like '$search_keyword' or nomerseri like '$search_keyword'
		or motherboard like '$search_keyword' or processor like '$search_keyword' or ram like '$search_keyword'
		or harddisk like '$search_keyword' or thnbeli like '$search_keyword' or lancard like '$search_keyword'
		or DEPARTMENT_NAME like '$search_keyword' or nmuser like '$search_keyword' or tempat like '$search_keyword' or namaruangan like '$search_keyword'
		or pengelola like '$search_keyword'";

			$exec_sql = mysql_query($query) or die(mysql_error());

			$hasil = mysql_fetch_assoc($exec_sql);

			if (empty($hasil["jumlah"])) {
				//echo "masuk scope empty hasil";
				$totalhsl = 0;

			} else {
				$totalhsl = $hasil["jumlah"];
			}


			return $totalhsl;
			mysql_close();

		} catch (Exception $ex) {
			$totalhsl = 0;
			return $totalhsl;
			mysql_close();
		}
	}

	function get_total_data_inventaris_aktif($link)
	{
		$valid = '';
		try {
			$query = "select count(kdbarang) as jumlah from vu_inventaris where  lower(kondisi) = 'baik' ";

			$exec_sql = mysql_query($query) or die(mysql_error());

			$hasil = mysql_fetch_assoc($exec_sql);

			if (empty($hasil["jumlah"])) {
				//echo "masuk scope empty hasil";
				$totalhsl = 0;

			} else {
				$totalhsl = $hasil["jumlah"];
			}


			return $totalhsl;
			mysql_close();

		} catch (Exception $ex) {
			$totalhsl = 0;
			return $totalhsl;
			mysql_close();
		}
	}


	function get_total_data_inventaris_aktif_search($search_keyword, $link)
	{
		$valid = '';
		try {
			$query = "select count(kdbarang) as jumlah from vu_inventaris where  lower(kondisi) = 'baik' and (kdruangan like '$search_keyword' or 
			kdbarang like '$search_keyword' or kdjenis like '$search_keyword' or namajns like  '$search_keyword'
			or noinventaris like '$search_keyword' or namabrg like '$search_keyword' or nomerseri like '$search_keyword'
			or motherboard like '$search_keyword' or processor like '$search_keyword' or ram like '$search_keyword'
			or harddisk like '$search_keyword' or thnbeli like '$search_keyword' or lancard like '$search_keyword'
			or DEPARTMENT_NAME like '$search_keyword' or nmuser like '$search_keyword' or tempat like '$search_keyword' 
			or pengelola like '$search_keyword') ";

			$exec_sql = mysql_query($query) or die(mysql_error());

			$hasil = mysql_fetch_assoc($exec_sql);

			if (empty($hasil["jumlah"])) {
				//echo "masuk scope empty hasil";
				$totalhsl = 0;

			} else {
				$totalhsl = $hasil["jumlah"];
			}


			return $totalhsl;
			mysql_close();

		} catch (Exception $ex) {
			$totalhsl = 0;
			return $totalhsl;
			mysql_close();
		}
	}

	function incrementkdbarang($link)
	{
		$nomax = 0;

		try {
			$query = "select max(kdbarang) as nomer from biss_inventaris";
			//mysql_select_db($dbname);
			$cmd = mysql_query($query, $link) or die(mysql_error());

			$hasil = mysql_fetch_assoc($cmd);

			if (empty($hasil["nomer"])) {
				$nomax = 1;
			} else {
				$nomax = $hasil["nomer"];
				$nomax = $nomax + 1;
			}


			mysql_free_result($cmd);
			return $nomax;
			mysql_close();
			//oci_close($link);

		} catch (Exception $ex) {
			$nomax = 1;
			return $nomax;
		}
	}

	function getdataprefix($kdjns, $link)
	{
		$data = array();

		$query = "select * from biss_jenisbarang where lower(kdjenis) = lower('$kdjns')";
		$cmd = mysql_query($query, $link);

		while ($hasil = mysql_fetch_assoc($cmd)) {
			$data['prefix'] = $hasil['prefix'];
		}



		return $data;
	}
	function increament_nodoc_inventaris($prefix_jnsbarang, $thnbeli, $link)
	{

		$v_strno = "/" . $prefix_jnsbarang . "/PK/" . $thnbeli;
		$v_nomax = "";
		$v_digitno = 0;

		try {
			$query = "select max(SUBSTRING(noinventaris,1,3)) as nomer from vu_inventaris where prefix = '$prefix_jnsbarang' ";
			// echo $query;
			$cmd = mysql_query($query, $link);
			$hasil = mysql_fetch_assoc($cmd);

			if (empty($hasil["nomer"])) {
				//echo "masuk scope empty hasil";
				$v_nomax = "001";
				$v_strno = $v_nomax . $v_strno;
			} else {
				$v_nomax = $hasil["nomer"];

				$v_digitno = strlen(intval($v_nomax));
				/*echo "v_nomax : ".$v_nomax;
																																			  echo "<br>";
																																			  echo "digit : ".$v_digitno;*/

				if ($v_digitno == 1 and $v_nomax < 9) {
					$v_nomax = $v_nomax + 1;
					$v_strno = "00" . $v_nomax . $v_strno;
				} else if ($v_digitno == 1 and $v_nomax == 9) {
					$v_nomax = $v_nomax + 1;
					$v_strno = "0" . $v_nomax . $v_strno;
				} else if ($v_digitno == 2 and $v_nomax < 99) {
					$v_nomax = $v_nomax + 1;
					$v_strno = "0" . $v_nomax . $v_strno;
				} else if ($v_digitno == 2 and $v_nomax == 99) {
					$v_nomax = $v_nomax + 1;
					$v_strno = "0" . $v_nomax . $v_strno;
				} else if ($v_digitno == 3 and $v_nomax < 999) {
					$v_nomax = $v_nomax + 1;
					$v_strno = $v_nomax . $v_strno;
				} else if ($v_digitno == 3 and $v_nomax == 999) {
					$v_nomax = $v_nomax + 1;
					$v_strno = $v_nomax . $v_strno;
				}



				// JAGA JAGA BARANGKALI NANTI JADI 5 DIGIT
				//   if($v_digitno == 1 and $v_nomax < 9) {
				// 		$v_nomax = $v_nomax +1 ;
				// 		$v_strno = "0000".$v_nomax.$v_strno;  
				// 	}
				//    else if ($v_digitno == 1 and $v_nomax == 9) {
				// 		$v_nomax = $v_nomax +1 ;
				// 		$v_strno = "000".$v_nomax.$v_strno;  
				// 	}
				//    else if ($v_digitno == 2 and $v_nomax < 99) {
				// 		$v_nomax = $v_nomax +1 ;
				// 		$v_strno = "000".$v_nomax.$v_strno;  
				// 	}
				//    else if ($v_digitno == 2 and $v_nomax == 99) {
				// 		$v_nomax = $v_nomax +1 ;
				// 		$v_strno = "00".$v_nomax.$v_strno;  
				// 	}
				// 	else if ($v_digitno == 3 and $v_nomax < 999) {
				// 		$v_nomax = $v_nomax +1 ;
				// 		$v_strno = "00".$v_nomax.$v_strno;  
				// 	}
				// 	else if ($v_digitno == 3 and $v_nomax == 999) {
				// 		$v_nomax = $v_nomax +1 ;
				// 		$v_strno = "0".$v_nomax.$v_strno;  
				// 	}
				// 	else if ($v_digitno == 4 and $v_nomax < 9999) {
				// 		$v_nomax = $v_nomax +1 ;
				// 		$v_strno = "0".$v_nomax.$v_strno;  
				// 	}
				// 	else if ($v_digitno == 4 and $v_nomax < 99999) {
				// 		$v_nomax = $v_nomax +1 ;
				// 		$v_strno = $v_nomax.$v_strno;  
				// 	}
			}



			return $v_strno;

			mysql_free_result($cmd);

			mysql_close();
			//oci_close($link);

		} catch (Exception $ex) {
			$v_nomax = "00001";
			return $v_nomax . $v_strno;
		}

	}

	function update_lampiran_inventaris($kdbarang, $user_id, $namafile, $link)
	{
		try {

			$query = "update biss_inventaris set foto =  '$namafile', last_update_by = '$user_id', last_update_date = sysdate()";
			$query = $query . " where kdbarang = $kdbarang";

			$cmd = mysql_query($query, $link) or die(mysql_error());


			if (!$cmd) {
				$sts = 'false';
			} else {
				$sts = 'true';

			}

			return $sts;
			mysql_close();

		} catch (Exception $ex) {
			$sts = "false";
			return $sts;
			mysql_close();
		}


	}
}
?>