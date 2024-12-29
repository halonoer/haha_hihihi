<?php

class ruangan
{


	private $kdruangan;
	private $nmruangan;
	private $grupruang;
	private $keterangan;
	private $entri;
	private $created_date;
	private $updby;
	private $tglupd;
	private $sqlquery;
	/*private $strcon;*/



	function setruangan($kode, $grup, $nama, $entri, $usrupd, $ket)
	{
		$this->kdruangan = $kode;
		$this->nmruangan = $nama;
		$this->grupruang = $grup;
		$this->entri = $entri;
		$this->updby = $usrupd;
		$this->keterangan = $ket;

	}

	/*function getkoneksistring(){
				  /*$this->strcon=$link;
				  return $this->strcon;
				  
				  
			  }*/

	function getvarruangan()
	{
		$var = array();

		$var['kdruangan'] = $this->kdruangan;
		$var['nmruangan'] = $this->nmruangan;
		$var['grupruang'] = $this->grupruang;
		$var['entri'] = $this->entri;
		$var['created_date'] = $this->created_date;
		$var['updby'] = $this->updby;
		$var['tglupd'] = $this->update_date;
		$var['keterangan'] = $this->keterangan;
		return $var;
	}

	function validasikode($kode, $link)
	{
		$valid = '';
		try {
			$query = "select kdruangan from biss_ruangan where lower(kdruangan) = lower('$kode')";
			$exec_sql = mysql_query($query) or die(mysql_error());
			$hasil = mysql_fetch_assoc($exec_sql);

			if (empty($hasil["kdruangan"])) {
				$valid = 'false';
			} else {
				if (strtolower($hasil['kdruangan']) == strtolower($kode)) {
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

	function validasinama($nama, $link)
	{
		$valid = '';
		try {
			$query = "select namaruangan from biss_ruangan where lower(namaruangan) = lower('$nama')";
			$exec_sql = mysql_query($query) or die(mysql_error());
			$hasil = mysql_fetch_assoc($exec_sql);

			if (empty($hasil["namaruangan"])) {
				$valid = 'false';
			} else {
				if (strtolower($hasil['namaruangan']) == strtolower($nama)) {
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

	function validasikode_nama($kode, $nama, $link)
	{
		$valid = '';
		try {
			$query = "select namaruangan from biss_ruangan where lower(kdruangan) = lower('$kode') and lower(namaruangan) = lower('$nama')";
			$exec_sql = mysql_query($query) or die(mysql_error());
			$hasil = mysql_fetch_assoc($exec_sql);

			if (empty($hasil["namaruangan"])) {
				$valid = 'false';
			} else {
				if (strtolower($hasil['namaruangan']) == strtolower($nama)) {
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

	function validasi_redudansi_nama($kode, $nama, $link)
	{
		$valid = '';

		try {
			$query = "select namaruangan from biss_ruangan where lower(namaruangan) = lower('$nama') and lower(kdruangan) <> lower('$kode') ";

			$exec_sql = mysql_query($query) or die(mysql_error());
			$hasil = mysql_fetch_assoc($exec_sql);

			if (empty($hasil["namaruangan"])) {
				$valid = 'false';
			} else {
				if (strtolower($hasil['namaruangan']) == strtolower($nama)) {
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


	function insertruangan($kode, $grup, $nama, $user, $ket, $unitid, $link)
	{

		try {
			$query = "insert into biss_ruangan (kdruangan, kdgrup,namaruangan, created_by, created_date, keterangan, unit_id) values ('$kode','$grup','$nama', '$user',sysdate(), '$ket',$unitid)";
			//echo $query;
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


	function updateruangan($kode, $grup, $nama, $user, $ket, $unitid, $link)
	{
		try {
			$query = "update biss_ruangan  set namaruangan = '$nama', kdgrup='$grup', last_update_by = '$user',unit_id = $unitid , last_update_date = sysdate(), keterangan = '$ket'";
			$query = $query . " where kdruangan = '$kode'";
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

	function deleteruangan($kode, $link)
	{
		try {
			$query = "delete from biss_ruangan where kdruangan = '$kode' ";
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

		$query = "select * from vu_ruangan where lower(kdruangan) = lower('$kode')";
		// echo $query;
		$cmd = mysql_query($query, $link);

		while ($hasil = mysql_fetch_assoc($cmd)) {

			$data['kdruangan'] = $hasil['kdruangan'];
			$data['kdgrup'] = $hasil['kdgrup'];
			$data['namagrupruang'] = $hasil['namagrupruang'];
			$data['namaruangan'] = $hasil['namaruangan'];
			$data['unitname'] = $hasil['DEPARTMENT_NAME'];
			$data['entri'] = $hasil['created_by'];
			$data['created_date'] = $hasil['created_date'];
			$data['updby'] = $hasil['last_update_by'];
			$data['tglupd'] = $hasil['last_update_date'];
			$data['keterangan'] = $hasil['keterangan'];
			$data['unitid'] = $hasil['unit_id'];


		}
		//echo $data['unitname'];
		return $data;
	}

	function ViewDataRuangan_all($limit_start, $limit, $link)
	{

		$query = " select * from vu_ruangan order by kdruangan desc
			 LIMIT $limit_start,$limit";

		return $query;
	}

	function ViewDataRuangan_search($search_keyword, $limit_start, $limit, $link)
	{

		$query = " select * from vu_ruangan 
					where kdruangan like '$search_keyword' or kdgrup like '$search_keyword' or namaruangan like '$search_keyword'
					LIMIT $limit_start,$limit ";

		return $query;
	}

	function get_total_data_search($search_keyword, $link)
	{
		$valid = '';
		try {
			$query = "select count(kdruangan) as jumlah from biss_ruangan where kdruangan like '$search_keyword' or kdgrup like '$search_keyword' or namaruangan like '$search_keyword' ";

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

	function get_total_all_data($link)
	{
		$valid = '';
		try {
			$query = "select count(kdruangan) as jumlah from biss_ruangan ";
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

	function increamentkoderuangan($link)
	{
		$valid = '';

		$query = "select max(substr(kdruangan,3,4)) as nomer from biss_ruangan";

		$cmd = mysql_query($query, $link);
		$hasil = mysql_fetch_assoc($cmd);

		if (empty($hasil["nomer"])) {
			//echo "masuk scope empty hasil";
			$v_nomax = "0001";
			$v_strno = "R-" . $v_nomax;
		} else {
			$v_nomax = $hasil["nomer"];

			$v_digitno = strlen(intval($v_nomax));
			//   echo "v_nomax : ".$v_nomax;
			//   echo "<br>";
			//   echo "digit : ".$v_digitno;

			if ($v_digitno == 1 and $v_nomax < 9) {
				$v_nomax = $v_nomax + 1;
				$v_strno = "R-" . "000" . $v_nomax;
			} else if ($v_digitno == 1 and $v_nomax == 9) {
				$v_nomax = $v_nomax + 1;
				$v_strno = "R-" . "000" . $v_nomax;
			} else if ($v_digitno == 2 and $v_nomax < 99) {
				$v_nomax = $v_nomax + 1;
				$v_strno = "R-" . "00" . $v_nomax;
			} else if ($v_digitno == 2 and $v_nomax == 99) {
				$v_nomax = $v_nomax + 1;
				$v_strno = "R-" . "00" . $v_nomax;
			} else if ($v_digitno == 3 and $v_nomax < 999) {
				$v_nomax = $v_nomax + 1;
				$v_strno = "R-" . "0" . $v_nomax;
			} else if ($v_digitno == 3 and $v_nomax == 999) {
				$v_nomax = $v_nomax + 1;
				$v_strno = "R-" . "0" . $v_nomax;
			} else if ($v_digitno == 4 and $v_nomax < 9999) {
				$v_nomax = $v_nomax + 1;
				$v_strno = "R-" . $v_nomax;
			} else if ($v_digitno == 4 and $v_nomax == 9999) {
				$v_nomax = $v_nomax + 1;
				$v_strno = "R-" . $v_nomax;
			}
		}


		//  echo "no : ".$v_strno;
		return $v_strno;

		mysql_close();
		//oci_close($link);

	}

	//ruangan function lookup======================================================================================================
	function get_data_ruangan_for_lookup_ruangan_search($search_keyword, $limit_start, $limit, $link)
	{

		$sql = "select *
            FROM vu_ruangan
            where kdruangan like '$search_keyword' or namaruangan like '$search_keyword' or DEPARTMENT_NAME like '$search_keyword' 
            ORDER BY namaruangan asc LIMIT $limit_start,$limit";

		return $sql;
	}

	function get_data_ruangan_for_lookup_ruangan_all($limit_start, $limit, $link)
	{

		$sql = " select *
		     FROM vu_ruangan 
 			 ORDER BY namaruangan asc LIMIT $limit_start,$limit";

		return $sql;
	}

	function get_Total_data_ruangan_for_lookup_ruangan_search($search_keyword, $link)
	{

		$sql = " select count(kdruangan) as jumlah
            FROM vu_ruangan 
            where kdruangan like '$search_keyword' or namaruangan like '$search_keyword' or DEPARTMENT_NAME like '$search_keyword'";

		return $sql;
	}

	function get_Total_data_ruangan_for_lookup_ruangan_all($link)
	{

		$sql = " select count(kdruangan) as jumlah
			FROM vu_ruangan ";

		return $sql;
	}

}
?>