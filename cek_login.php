   <!-- sweet alert notification -->
   <link rel="stylesheet" href="sweetalert2/sweetalert2.css">
  <script src="sweetalert2/sweetalert2.min.js"></script>
<?php

// mengaktifkan session pada php
session_start();

// echo"masuk cek login";
// die();

// menghubungkan php dengan koneksi database
include('bissnet.php');
include('classuserlogin.php');
include('classuserlogindetail.php');


$objuserlogin = new user_pekabiss();



 
// menangkap data yang dikirim dari form login
$username = $_POST['usnm'];
$password = $_POST['pass'];
$pswd = md5($password);
 
 
// menyeleksi data user dengan username dan password yang sesuai
$stsvaluserlogin=$objuserlogin->validasi_login_user($username, $pswd, $link);
// echo $stsvaluserlogin;
// die();
//$query = "select * from user_login where username='$username' and password_user='$pswd'";
//$result = mysql_query($query,$link);
// menghitung jumlah data yang ditemukan
//$cek = mysql_num_rows($result);
 
// cek apakah username dan password di temukan pada database
if($stsvaluserlogin == 'true'){
	

	$vardatauser = $objuserlogin->getdatafromdb_byusername($username,$link); 
	$_SESSION['pkb_id_user'] = $vardatauser['iduser'];
	$_SESSION['pkb_id_gaslap'] = $vardatauser['gaslapid'];	
	$_SESSION['pkb_nama_user'] =$vardatauser['nmuser'];
	$_SESSION['pkb_username'] =$vardatauser['usrname'];
	$_SESSION['pkb_id_departemen'] =$vardatauser['iddept'];
	$_SESSION['pkb_id_unit'] =$vardatauser['idunit'];
	$_SESSION['pkb_nama_unit'] =$vardatauser['nmunit'];
	$_SESSION['pkb_level_user'] =$vardatauser['level'];
	$_SESSION['pkb_erp_user_id'] =$vardatauser['erp_user_id'];
	$_SESSION['nama_atasan'] =$vardatauser['nama_atasan'];
	$_SESSION['pkb_erp_user_name'] =$vardatauser['erp_user_name'];
	
	$_SESSION['grup_menu_aktif'] = "-";
	$_SESSION['menu_aktif'] = "-";
	$_SESSION['subgrup_menu_aktif'] = "-";
	
	//$objuserdet = new user_login_detail();

	// $stsuserapptardisiapkan = $objuserdet->get_akses_fitur_user_bymenu($vardatauser['iduser'],'mntar','app_buat', $link);
	// $stsuserapptardiperiksa = $objuserdet->get_akses_fitur_user_bymenu($vardatauser['iduser'],'mntar','app_periksa', $link);
	// $stsuserappsardilaksanakan = $objuserdet->get_akses_fitur_user_bymenu($vardatauser['iduser'],'mnsasaranunitkerja','app_buat', $link);
	// $stsuserapppemriskdisiapkan = $objuserdet->get_akses_fitur_user_bymenu($vardatauser['iduser'],'mnpemantauanrisiko','app_buat', $link);
	// $stsuserapppemriskdiperiksa = $objuserdet->get_akses_fitur_user_bymenu($vardatauser['iduser'],'mnpemantauanrisiko','app_periksa', $link);
	// $stsuserapppemsardibuat = $objuserdet->get_akses_fitur_user_bymenu($vardatauser['iduser'],'mnpemantauansasaran','app_buat', $link);

	// $_SESSION['mr_tar_app_disiapkan'] = $stsuserapptardisiapkan;
	// $_SESSION['mr_tar_app_diperiksa'] = $stsuserapptardiperiksa;
	// $_SESSION['mr_sar_app_dilaksanakan'] = $stsuserappsardilaksanakan;
	// $_SESSION['mr_pemrisk_app_disiapkan'] = $stsuserapppemriskdisiapkan;
	// $_SESSION['mr_pemrisk_app_diperiksa'] = $stsuserapppemriskdiperiksa;
	// $_SESSION['mr_pemsar_app_dibuat'] = $stsuserapppemsardibuat;
	
	/* echo "Login berhasil";
	echo "<BR>";
	die(); */
	
	header("location:home.php");
	// cek jika user login sebagai admin
		
}else{

	echo  "<script type='text/javascript'>
	setTimeout(function () { 
	  swal.fire({
			icon: 'error',
			  title: 'Biss Alert..',
			  text:  'Gagal melakukan login. cek kembali username atau password anda..',
			  type: 'error',
			  timer: 3200,
			  showConfirmButton: true
		  });   
	},10);  
	window.setTimeout(function(){ 
	  window.location.replace('index.php');
	} ,3000); 
	</script>";

	// echo"<script>window.alert('Gagal melakukan login. cek kembali username atau password anda..')
	// window.location.href='index.php'</script>";
}
 
?>