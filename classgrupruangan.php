<?php

class grupruang
{


	private $kdgrup;
	private $nmgrup;
	private $entri;
	private $created_date;
	private $updby;
	private $tglupd;
	private $sqlquery;
	/*private $strcon;*/



	function setgrupruang($kode, $nama, $entri, $usrupd)
	{
		$this->kdgrup = $kode;
		$this->nmgrup = $nama;
		$this->entri = $entri;
		$this->updby = $usrupd;

	}

	/*function getkoneksistring(){
				  /*$this->strcon=$link;
				  return $this->strcon;
				  
				  
			  }*/

	function getvargrupruang()
	{
		$var = array();

		$var['kdgrup'] = $this->kdgrup;
		$var['nmgrup'] = $this->nmgrup;
		$var['entri'] = $this->entri;
		$var['created_date'] = $this->created_date;
		$var['updby'] = $this->updby;
		$var['tglupd'] = $this->update_date;

		return $var;
	}

	function validasikode($kode, $link)
	{
		$valid = '';

		try {
			$query = "select kdgrup from biss_grupruang where lower(kdgrup) = lower('$kode')";
			$exec_sql = mysql_query($query) or die(mysql_error());
			$hasil = mysql_fetch_assoc($exec_sql);


			if (empty($hasil["kdgrup"])) {
				$valid = 'false';
			} else {
				if (strtolower($hasil['kdgrup']) == strtolower($kode)) {
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

			$query = "select namagrupruang from biss_grupruang where lower(namagrupruang) = lower('$nama')";
			$exec_sql = mysql_query($query) or die(mysql_error());
			$hasil = mysql_fetch_assoc($exec_sql);

			if (empty($hasil["namagrupruang"])) {
				$valid = 'false';
			} else {
				if (strtolower($hasil['namagrupruang']) == strtolower($nama)) {
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
			$query = "select namagrupruang from biss_grupruang where lower(kdgrup) = lower('$kode') and lower(namagrupruang) = lower('$nama')";
			$exec_sql = mysql_query($query) or die(mysql_error());
			$hasil = mysql_fetch_assoc($exec_sql);


			if (empty($hasil["namagrupruang"])) {
				$valid = 'false';
			} else {
				if (strtolower($hasil['namagrupruang']) == strtolower($nama)) {
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
			$query = "select namagrupruang from biss_grupruang where lower(namagrupruang) = lower('$nama') and lower(kdgrup) <> lower('$kode') ";
			$exec_sql = mysql_query($query) or die(mysql_error());
			$hasil = mysql_fetch_assoc($exec_sql);


			if (empty($hasil["namagrupruang"])) {
				$valid = 'false';
			} else {
				if (strtolower($hasil['namagrupruang']) == strtolower($nama)) {
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


	function insertgrupruang($kode, $nama, $user, $link)
	{

		try {
			$query = "insert into biss_grupruang (kdgrup, namagrupruang, created_by, created_date) values ('$kode','$nama', '$user',sysdate())";
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


	function updategrupruang($kode, $nama, $user, $link)
	{

		try {
			$query = "update biss_grupruang  set namagrupruang = '$nama', last_update_by = '$user', last_update_date = sysdate()";
			$query = $query . " where kdgrup = '$kode'";

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

	function deletegrupruang($kode, $link)
	{

		try {
			$query = "delete from biss_grupruang where kdgrup = '$kode' ";
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

		$query = "select * from biss_grupruang where lower(kdgrup) = lower('$kode')";

		$cmd = mysql_query($query, $link);

		while ($hasil = mysql_fetch_assoc($cmd)) {

			$data['kdgrup'] = $hasil['kdgrup'];
			$data['namagrup'] = $hasil['namagrupruang'];
			$data['entri'] = $hasil['created_by'];
			$data['created_date'] = $hasil['created_date'];
			$data['updby'] = $hasil['last_update_by'];
			$data['tglupd'] = $hasil['last_update_date'];

		}

		return $data;
	}

	function ViewDataGrupRuang_all($limit_start, $limit, $link)
	{

		$query = " select * from biss_grupruang order by kdgrup desc
			 LIMIT $limit_start,$limit";

		return $query;
	}

	function ViewDataGrupRuang_search($search_keyword, $limit_start, $limit, $link)
	{

		$query = " select * from biss_grupruang 
					where kdgrup like '$search_keyword' or namagrupruang like '$search_keyword'
					LIMIT $limit_start,$limit ";

		return $query;
	}

	function get_total_data_search($search_keyword, $link)
	{

		$totalhsl = 0;

		try {
			$query = "select count(kdgrup) as jumlah from biss_grupruang where kdgrup like '$search_keyword' or namagrupruang like '$search_keyword' ";

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
		$totalhsl = 0;

		try {
			$query = "select count(kdgrup) as jumlah from biss_grupruang ";
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

	function increamentkodegrupruang($link)
	{
		$valid = '';

		$query = "select max(substr(kdgrup,4,2)) as nomer from biss_grupruang";

		$cmd = mysql_query($query, $link);
		$hasil = mysql_fetch_assoc($cmd);

		if (empty($hasil["nomer"])) {
			//echo "masuk scope empty hasil";
			$v_nomax = "01";
			$v_strno = "GR-" . $v_nomax;
		} else {
			$v_nomax = $hasil["nomer"];

			$v_digitno = strlen(intval($v_nomax));

			if ($v_digitno == 1 and $v_nomax < 9) {
				$v_nomax = $v_nomax + 1;
				$v_strno = "GR-" . "0" . $v_nomax;
			} else if ($v_digitno == 1 and $v_nomax == 9) {
				$v_nomax = $v_nomax + 1;
				$v_strno = "GR-" . "0" . $v_nomax;
			} else if ($v_digitno == 2 and $v_nomax < 99) {
				$v_nomax = $v_nomax + 1;
				$v_strno = "GR-" . $v_nomax;
			} else if ($v_digitno == 2 and $v_nomax == 99) {
				$v_nomax = $v_nomax + 1;
				$v_strno = "GR-" . $v_nomax;
			}

			return $v_strno;
			mysql_close();
		}
	}

	//grup ruangan function lookup======================================================================================================
	function get_data_grup_ruangan_for_lookup_grup_ruangan_search($search_keyword, $limit_start, $limit, $link)
	{

		$sql = "select *
            FROM biss_grupruang 
            where kdgrup like '$search_keyword' or namagrupruang like '$search_keyword' 
            ORDER BY namagrupruang asc LIMIT $limit_start,$limit";

		return $sql;
	}

	function get_data_grup_ruangan_for_lookup_grup_ruangan_all($limit_start, $limit, $link)
	{

		$sql = " select *
		     FROM biss_grupruang 
 			 ORDER BY namagrupruang asc LIMIT $limit_start,$limit";

		return $sql;
	}

	function get_Total_data_grup_ruangan_for_lookup_grup_ruangan_search($search_keyword, $link)
	{

		$sql = " select count(kdgrup) as jumlah
            FROM biss_grupruang 
            where kdgrup like '$search_keyword' or namagrupruang like '$search_keyword' ";

		return $sql;
	}

	function get_Total_data_grup_ruangan_for_lookup_grup_ruangan_all($link)
	{

		$sql = " select count(kdgrup) as jumlah
			FROM biss_grupruang ";

		return $sql;
	}
}
?>