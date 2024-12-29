<?php

// if (session_id() == "") {
//   session_start();
// }

// if (!$_SESSION['pkb_id_user']) {
//   session_destroy();
//   header('location:error_session_page.php');
// } else {

// $grupmenuaktif = "";
// $subgrupmenuaktif = "";
// $menuaktif = "";

// if (!$_SESSION['grup_menu_aktif']) {
//   $grupmenuaktif = "";
// } else {
//   $grupmenuaktif = $_SESSION['grup_menu_aktif'];
// }

// if (!$_SESSION['subgrup_menu_aktif']) {
//   $subgrupmenuaktif = "";
// } else {
//   $subgrupmenuaktif = $_SESSION['subgrup_menu_aktif'];
// }

// if (!$_SESSION['menu_aktif']) {
//   $menuaktif = "";
// } else {
//   $menuaktif = $_SESSION['menu_aktif'];
// }

// $biss_id_user = $_SESSION['pkb_id_user'];
// $biss_nama_user = $_SESSION['pkb_nama_user'];
// $biss_gaslap_id = $_SESSION['pkb_id_gaslap'];
// // $_SESSION['pkb_username'];
// $biss_kd_dept = $_SESSION['pkb_id_departemen'];
// $biss_nm_unit = $_SESSION['pkb_nama_unit'];
// $biss_id_unit = $_SESSION['pkb_id_unit'];
// $biss_level_user = $_SESSION['pkb_level_user'];
// $biss_erp_user_id = $_SESSION['pkb_erp_user_id'];


//Menggabungkan dengan file koneksi yang telah kita buat

if (isset($_GET['pd'])) {
  $periodebln = $_GET['pd'];
  $periodethn = substr($periodebln, 0, 4);
  $idxbln = substr($periodebln, -2);
} else {
  $periodethn = date('Y');
  $idxbln = date('m'); //   '09' ; 
  $periodebln = date('Y') . '-' . date('m');// '2020-09'; 

}

$namaperiodebln = "";
// echo $periodethn." == ".$periodebln;

if ($idxbln == '01') {
  $namaperiodebln = 'Januari';
} else if ($idxbln == '02') {
  $namaperiodebln = 'Februari';
} else if ($idxbln == '03') {
  $namaperiodebln = 'Maret';
} else if ($idxbln == '04') {
  $namaperiodebln = 'April';
} else if ($idxbln == '05') {
  $namaperiodebln = 'Mei';
} else if ($idxbln == '06') {
  $namaperiodebln = 'Juni';
} else if ($idxbln == '07') {
  $namaperiodebln = 'Juli';
} else if ($idxbln == '08') {
  $namaperiodebln = 'Agustus';
} else if ($idxbln == '09') {
  $namaperiodebln = 'September';
} else if ($idxbln == '10') {
  $namaperiodebln = 'Oktober';
} else if ($idxbln == '11') {
  $namaperiodebln = 'November';
} else if ($idxbln == '12') {
  $namaperiodebln = 'Desember';
}

// setup notifikasi PPB
$totalnotifikasi = 0;
$tot_ppb_stok_blm_app_manager = 0;
$tot_ppb_nonstok_blm_app_manager = 0;
$tot_ppb_investasi_blm_app_manager = 0;
$tot_ppb_sparepart_blm_app_manager = 0;
$tot_po_blm_app_manager = 0;
$tot_ppb_blm_app_ang = 0;
$tot_ppb_blm_app_keu = 0;
$tot_ppb_blm_app_daan = 0;

$tot_po_blm_app = 0;
$tot_phpb_blm_app = 0;



include("bissnet.php");
// include("classppb.php");
// include("classpophpb.php");
// include("classpjpperbaikan.php");
// include("classspk.php");
// include("classpjprealisasibiaya.php");
// include("classbonbarang.php");

//  include("classuserlogindetail.php");

// echo "Level : ".$biss_level_user." = ";
//  echo "DEPT : ".$biss_kd_dept;
// $objppb = new ppb_pekabiss();
// $objpo = new po_phpb();
// $objperbaikan = new pjp_perbaikan();
// $objspk = new spk();
// $objrealpjp = new pjp_realisasi_biaya();
// $objmb = new bon_barang();

// if ($biss_level_user == "SUPERADMIN") {

//   $tot_ppb_stok_blm_app_manager = $objppb->get_total_ppb_belum_app_by_tipe_status("1", "230039", $link);
//   $tot_ppb_nonstok_blm_app_manager = $objppb->get_total_ppb_belum_app_by_tipe_status("2", "230039", $link);
//   $tot_ppb_investasi_blm_app_manager = $objppb->get_total_ppb_belum_app_by_tipe_status("3", "230039", $link);
//   $tot_ppb_sparepart_blm_app_manager = $objppb->get_total_ppb_belum_app_by_tipe_status("4", "230039", $link);

//   $tot_ppb_blm_app_ang = $objppb->get_total_ppb_belum_app_by_status("230227", $link);
//   $tot_ppb_blm_app_keu = $objppb->get_total_ppb_belum_app_by_status("230458", $link);
//   $tot_ppb_blm_app_daan = $objppb->get_total_ppb_belum_app_by_status("230228", $link);

//   $tot_po_blm_app1 = $objpo->get_total_po_belum_app_by_status("230459", $link);
//   $tot_po_blm_app = $objpo->get_total_po_belum_app_by_status("230227", $link);

// } // level superadmin
// else if ($biss_level_user == "MANAGER") {
//   $tot_ppb_stok_blm_app_manager = $objppb->get_total_ppb_belum_app_manager_by_tipe_status_dept("1", $biss_kd_dept, "230039", $link);
//   $tot_ppb_nonstok_blm_app_manager = $objppb->get_total_ppb_belum_app_manager_by_tipe_status_dept("2", $biss_kd_dept, "230039", $link);
//   $tot_ppb_investasi_blm_app_manager = $objppb->get_total_ppb_belum_app_manager_by_tipe_status_dept("3", $biss_kd_dept, "230039", $link);
//   $tot_ppb_sparepart_blm_app_manager = $objppb->get_total_ppb_belum_app_manager_by_tipe_status_dept("4", $biss_kd_dept, "230039", $link);

//   if ($biss_kd_dept == "DEPARTEMEN KEUANGAN") {
//     $tot_ppb_blm_app_keu = $objppb->get_total_ppb_belum_app_by_status("230458", $link);
//   } else if ($biss_kd_dept == "DEPARTEMEN PENGADAAN") {
//     $tot_ppb_blm_app_daan = $objppb->get_total_ppb_belum_app_by_status("230228", $link);
//     $tot_po_blm_app_manager = $objpo->get_total_po_belum_app_by_status("230227", $link);
//   }
// } // level manager
// else if ($biss_level_user == "KARYAWAN" && $biss_nm_unit == "ACCOUNTING / KEUANGAN") {
//   $tot_ppb_blm_app_ang = $objppb->get_total_ppb_belum_app_by_status("230227", $link);
// }


// if ($tot_ppb_stok_blm_app_manager > 0) {
//   $totalnotifikasi = $totalnotifikasi + $tot_ppb_stok_blm_app_manager;
// }

// if ($tot_ppb_nonstok_blm_app_manager > 0) {
//   $totalnotifikasi = $totalnotifikasi + $tot_ppb_nonstok_blm_app_manager;
// }

// if ($tot_ppb_investasi_blm_app_manager > 0) {
//   $totalnotifikasi = $totalnotifikasi + $tot_ppb_investasi_blm_app_manager;
// }

// if ($tot_ppb_sparepart_blm_app_manager > 0) {
//   $totalnotifikasi = $totalnotifikasi + $tot_ppb_sparepart_blm_app_manager;
// }

// if ($tot_ppb_blm_app_ang > 0) {
//   $totalnotifikasi = $totalnotifikasi + $tot_ppb_blm_app_ang;
// }

// if ($tot_ppb_blm_app_keu > 0) {
//   $totalnotifikasi = $totalnotifikasi + $tot_ppb_blm_app_keu;
// }

// if ($tot_ppb_blm_app_daan > 0) {
//   $totalnotifikasi = $totalnotifikasi + $tot_ppb_blm_app_daan;
// }

// if ($tot_po_blm_app > 0) {
//   $totalnotifikasi = $totalnotifikasi + $tot_po_blm_app;
// }

// if ($tot_po_blm_app_manager > 0) {
//   $totalnotifikasi = $totalnotifikasi + $tot_po_blm_app_manager;
// }

// include_once("classuserlogindetail.php");
// $objuser = new user_login_detail();

//////////////////////////////// NOTIF OP Stok ///////////////////////////////
// echo "<BR>";
// echo $totalnotifikasi;
// echo "<BR>";

// $objpo = new po_phpb();

// $aksesmnpostok = "";
// $aksesmnpostok = $objuser->validasiaksesmenu($biss_id_user, "mnpostok", $link);
// $tot_postok_blm_review = 0;
// $tot_postok_blm_app = 0;
// $tot_postok_blm_app1 = 0;



// if ($aksesmnpostok == "true") {
//   $user_akses_postok = $objuser->getdatafromdb_bymenu("mnpostok", $biss_id_user, $link);
//   $akses_postok_app_rev = $user_akses_postok['approve1'];
//   $akses_postok_app = $user_akses_postok['approve3'];
//   $akses_postok_app1 = $user_akses_postok['approve2'];



//   if ($akses_postok_app_rev == 1) {


//     $tot_postok_blm_review = $objpo->get_total_po_blm_approval("1", "230039", $link);

//     if ($tot_postok_blm_review > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_postok_blm_review;
//     }
//   }

//   if ($akses_postok_app1 == 1) {


//     $tot_postok_blm_app1 = $objpo->get_total_po_blm_approval("1", "230459", $link);

//     if ($tot_postok_blm_app1 > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_postok_blm_app1;
//     }
//   }

//   if ($akses_postok_app == 1) {


//     $tot_postok_blm_app = $objpo->get_total_po_blm_approval("1", "230227", $link);

//     if ($tot_postok_blm_app > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_postok_blm_app;
//     }
//   }


// }


// //////////////////////////////// NOTIF OP Non Stok ///////////////////////////////
// $aksesmnpons = "";
// $aksesmnpons = $objuser->validasiaksesmenu($biss_id_user, "mnpononstok", $link);
// $tot_pons_blm_review = 0;
// $tot_pons_blm_app = 0;
// $tot_pons_blm_app1 = 0;

// if ($aksesmnpons == "true") {
//   $user_akses_postok = $objuser->getdatafromdb_bymenu("mnpononstok", $biss_id_user, $link);
//   $akses_pons_app_rev = $user_akses_postok['approve1'];
//   $akses_pons_app = $user_akses_postok['approve3'];
//   $akses_pons_app1 = $user_akses_postok['approve2'];



//   if ($akses_pons_app_rev == 1) {


//     $tot_pons_blm_review = $objpo->get_total_po_blm_approval("3", "230039", $link);

//     if ($tot_pons_blm_review > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_pons_blm_review;
//     }
//   }

//   if ($akses_pons_app1 == 1) {


//     $tot_pons_blm_app1 = $objpo->get_total_po_blm_approval("3", "230459", $link);

//     if ($tot_pons_blm_app1 > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_pons_blm_app1;
//     }
//   }

//   if ($akses_pons_app == 1) {

//     $tot_pons_blm_app = $objpo->get_total_po_blm_approval("3", "230227", $link);

//     if ($tot_pons_blm_app > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_pons_blm_app;
//     }
//   }



// }

// //////////////////////////////// NOTIF PHPB ///////////////////////////////
// $aksesmnphpb = "";
// $aksesmnphpb = $objuser->validasiaksesmenu($biss_id_user, "mnphpb", $link);
// $tot_phpb_blm_review = 0;
// $tot_phpb_blm_app = 0;
// $tot_phpb_blm_app1 = 0;

// if ($aksesmnphpb == "true") {
//   $user_akses_phpb = $objuser->getdatafromdb_bymenu("mnphpb", $biss_id_user, $link);
//   $akses_phpb_app_rev = $user_akses_phpb['approve1'];
//   $akses_phpb_app = $user_akses_phpb['approve3'];
//   $akses_phpb_app1 = $user_akses_phpb['approve2'];

//   if ($akses_phpb_app_rev == 1) {


//     $tot_phpb_blm_review = $objpo->get_total_po_blm_approval("2", "230039", $link);

//     if ($tot_phpb_blm_review > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_phpb_blm_review;
//     }
//   }

//   if ($akses_phpb_app1 == 1) {

//     $tot_phpb_blm_app1 = $objpo->get_total_po_blm_approval("2", "230459", $link);

//     if ($tot_phpb_blm_app1 > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_phpb_blm_app1;
//     }
//   }

//   if ($akses_phpb_app == 1) {

//     $tot_phpb_blm_app = $objpo->get_total_po_blm_approval("2", "230227", $link);

//     if ($tot_phpb_blm_app > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_phpb_blm_app;
//     }
//   }


// }

// //////////////////////////////// NOTIF OP Sparepart ///////////////////////////////
// $aksesmnpospr = "";
// $aksesmnpospr = $objuser->validasiaksesmenu($biss_id_user, "mnposparepart", $link);
// $tot_pospr_blm_review = 0;
// $tot_pospr_blm_app = 0;
// $tot_pospr_blm_app1 = 0;

// if ($aksesmnpospr == "true") {
//   $user_akses_pospr = $objuser->getdatafromdb_bymenu("mnposparepart", $biss_id_user, $link);
//   $akses_pospr_app_rev = $user_akses_pospr['approve1'];
//   $akses_pospr_app = $user_akses_pospr['approve3'];
//   $akses_pospr_app1 = $user_akses_pospr['approve2'];

//   if ($akses_pospr_app_rev == 1) {


//     $tot_pospr_blm_review = $objpo->get_total_po_blm_approval("4", "230039", $link);

//     if ($tot_pospr_blm_review > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_pospr_blm_review;
//     }
//   }

//   if ($akses_pospr_app1 == 1) {


//     $tot_pospr_blm_app1 = $objpo->get_total_po_blm_approval("4", "230459", $link);

//     if ($tot_pospr_blm_app1 > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_pospr_blm_app1;
//     }
//   }

//   if ($akses_pospr_app == 1) {


//     $tot_pospr_blm_app = $objpo->get_total_po_blm_approval("4", "230227", $link);

//     if ($tot_pospr_blm_app > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_pospr_blm_app;
//     }
//   }


// }

// //////////////////////////////// NOTIF OP Investasi ///////////////////////////////
// $aksesmnpoinv = "";
// $aksesmnpoinv = $objuser->validasiaksesmenu($biss_id_user, "mnpoinvestasi", $link);
// $tot_poinv_blm_review = 0;
// $tot_poinv_blm_app = 0;
// $tot_poinv_blm_app1 = 0;

// if ($aksesmnpoinv == "true") {
//   $user_akses_poinv = $objuser->getdatafromdb_bymenu("mnpoinvestasi", $biss_id_user, $link);
//   $akses_poinv_app_rev = $user_akses_poinv['approve1'];
//   $akses_poinv_app = $user_akses_poinv['approve3'];
//   $akses_poinv_app1 = $user_akses_poinv['approve2'];

//   if ($akses_poinv_app_rev == 1) {


//     $tot_poinv_blm_review = $objpo->get_total_po_blm_approval("5", "230039", $link);

//     if ($tot_poinv_blm_review > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_poinv_blm_review;
//     }
//   }

//   if ($akses_poinv_app1 == 1) {


//     $tot_poinv_blm_app1 = $objpo->get_total_po_blm_approval("5", "230459", $link);

//     if ($tot_poinv_blm_app1 > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_poinv_blm_app1;
//     }
//   }

//   if ($akses_poinv_app == 1) {


//     $tot_poinv_blm_app = $objpo->get_total_po_blm_approval("5", "230227", $link);

//     if ($tot_poinv_blm_app > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_poinv_blm_app;
//     }
//   }


// }
//  echo "<BR>";
//  echo $tot_postok_blm_review;
//  echo $tot_postok_blm_app;
//  echo $tot_pons_blm_review;
//  echo $tot_pons_blm_app;
//  echo $tot_pospr_blm_review;
//  echo $tot_pospr_blm_app;
//  echo $tot_poinv_blm_review;
//  echo $tot_poinv_blm_app;
//  echo "<BR>";
//  echo '====';
//  echo $totalnotifikasi;
//  echo "<BR>";


// cek akses notifikasi untuk Barang Datang
// $aksesmnbd = "";
// $aksesmnbd = $objuser->validasiaksesmenu($biss_id_user, "mnbarangdatang", $link);
// $tot_bd_blm_app = 0;

// if ($aksesmnbd == "true") {
//   $user_akses = $objuser->getdatafromdb_bymenu("mnbarangdatang", $biss_id_user, $link);
//   $akses_app_bd = $user_akses['approve2'];

//   if ($akses_app_bd == 1) {
//     include("classinvcoming.php");
//     $objbd = new inv_coming();

//     $tot_bd_blm_app = $objbd->get_total_bd_blm_approved($link);

//     if ($tot_bd_blm_app > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_bd_blm_app;
//     }
//   }

// }
// //////////////////////////////////////////// NOTIF BTB S ///////////////////

// $aksesmnbtbstok = "";
// $aksesmnbtbstok = $objuser->validasiaksesmenu($biss_id_user, "mnbtbstok", $link);
// $tot_btbstok_blm_review = 0;
// $tot_btbstok_blm_app = 0;

// include("classinventoryin.php");
// $objbtb = new inventory_in();

// if ($aksesmnbtbstok == "true") {
//   $user_akses_btbs = $objuser->getdatafromdb_bymenu("mnbtbstok", $biss_id_user, $link);
//   $akses_app_rev = $user_akses_btbs['approve1'];
//   $akses_app_gud = $user_akses_btbs['approve2'];
//   // $akses_app_user  = $user_akses_btbs['approve3'];



//   if ($akses_app_rev == 1) {


//     $tot_btbstok_blm_review = $objbtb->get_total_btb_blm_approval("1", "230039", $link);

//     if ($tot_btbstok_blm_review > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_btbstok_blm_review;
//     }
//   }

//   if ($akses_app_gud == 1) {


//     $tot_btbstok_blm_app = $objbtb->get_total_btb_blm_approval("1", "230459", $link);

//     if ($tot_btbstok_blm_app > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_btbstok_blm_app;
//     }
//   }


// }

// ////////////////////////////////////// BTB SPAREPART /////////////////////

// $aksesmnbtbpart = "";
// $aksesmnbtbpart = $objuser->validasiaksesmenu($biss_id_user, "mnbtbsparepart", $link);
// $tot_btbpart_blm_review = 0;
// $tot_btbpart_blm_app = 0;

// if ($aksesmnbtbpart == "true") {
//   $user_akses_btbpart = $objuser->getdatafromdb_bymenu("mnbtbsparepart", $biss_id_user, $link);
//   $akses_app_btbpart_rev = $user_akses_btbpart['approve1'];
//   $akses_app_btbpart_gud = $user_akses_btbpart['approve2'];
//   // $akses_app_user  = $user_akses_btbs['approve3'];



//   if ($akses_app_btbpart_rev == 1) {


//     $tot_btbpart_blm_review = $objbtb->get_total_btb_blm_approval("4", "230039", $link);

//     if ($tot_btbpart_blm_review > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_btbpart_blm_review;
//     }
//   }

//   if ($akses_app_btbpart_gud == 1) {


//     $tot_btbpart_blm_app = $objbtb->get_total_btb_blm_approval("4", "230459", $link);

//     if ($tot_btbpart_blm_app > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_btbpart_blm_app;
//     }
//   }


// }


// ////////////////////////////////// BTB NS //////////////////

// $aksesmnbtbns = "";
// $aksesmnbtbns = $objuser->validasiaksesmenu($biss_id_user, "mnbtbnonstok", $link);
// $tot_btbns_blm_review = 0;
// $tot_btbns_blm_app = 0;
// $tot_btbns_blm_user = 0;

// if ($aksesmnbtbns == "true") {
//   $user_akses_btbns = $objuser->getdatafromdb_bymenu("mnbtbnonstok", $biss_id_user, $link);
//   $akses_app_btbns_rev = $user_akses_btbns['approve1'];
//   $akses_app_btbns_gud = $user_akses_btbns['approve2'];
//   $akses_app_btbns_user = $user_akses_btbns['approve3'];



//   if ($akses_app_btbns_rev == 1) {


//     $tot_btbns_blm_review = $objbtb->get_total_btb_blm_approval("3", "230039", $link);

//     if ($tot_btbns_blm_review > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_btbns_blm_review;
//     }
//   }

//   if ($akses_app_btbns_gud == 1) {


//     $tot_btbns_blm_app = $objbtb->get_total_btb_blm_approval("3", "230459", $link);

//     if ($tot_btbns_blm_app > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_btbns_blm_app;
//     }
//   }

//   if ($akses_app_btbns_user == 1) {


//     $tot_btbns_blm_user = $objbtb->get_total_btb_blm_approval("3", "230227", $link);

//     if ($tot_btbns_blm_user > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_btbns_blm_user;
//     }
//   }


// }


// ////////////////////////////////// BTB INVESTASI //////////////////

// $aksesmnbtbinves = "";
// $aksesmnbtbinves = $objuser->validasiaksesmenu($biss_id_user, "mnbtbinvestasi", $link);
// $tot_btbinves_blm_review = 0;
// $tot_btbinves_blm_app = 0;
// $tot_btbinves_blm_user = 0;

// if ($aksesmnbtbinves == "true") {
//   $user_akses_btbinves = $objuser->getdatafromdb_bymenu("mnbtbinvestasi", $biss_id_user, $link);
//   $akses_app_btbinves_rev = $user_akses_btbinves['approve1'];
//   $akses_app_btbinves_gud = $user_akses_btbinves['approve2'];
//   $akses_app_btbinves_user = $user_akses_btbinves['approve3'];



//   if ($akses_app_btbinves_rev == 1) {


//     $tot_btbinves_blm_review = $objbtb->get_total_btb_blm_approval("5", "230039", $link);

//     if ($tot_btbinves_blm_review > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_btbinves_blm_review;
//     }
//   }

//   if ($akses_app_btbinves_gud == 1) {


//     $tot_btbinves_blm_app = $objbtb->get_total_btb_blm_approval("5", "230459", $link);

//     if ($tot_btbinves_blm_app > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_btbinves_blm_app;
//     }
//   }

//   if ($akses_app_btbinves_user == 1) {


//     $tot_btbinves_blm_user = $objbtb->get_total_btb_blm_approval("5", "230227", $link);

//     if ($tot_btbinves_blm_user > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_btbinves_blm_user;
//     }
//   }





// } // end aksesmnbtbinves

//   //////////////////////////////////////////// NOTIF Bon Barang ///////////////////

//   $aksesmnbonbarang = "";
//   $aksesmnbonbarang = $objuser->validasiaksesmenu($biss_id_user, "mnbonbarang", $link);

//   $tot_bonbarang_blm_app = 0;

//   if ($aksesmnbonbarang == "true") {
//     $user_akses_bonbarang = $objuser->getdatafromdb_bymenu("mnbonbarang", $biss_id_user, $link);
//     $tot_bonbarang_blm_app = $user_akses_bonbarang['approve1'];

//     if ($tot_bonbarang_blm_app == 1) {
//       if (($biss_id_unit == 18 || $biss_id_unit == 28) && $biss_level_user === "KARYAWAN") {
//         $tot_bonbarang_blm_app = $objmb->get_total_bon_barang_blm_app_by_user(1, "230039", $biss_erp_user_id,$link);
//       } else {
//         $tot_bonbarang_blm_app = $objmb->get_total_bon_barang_blm_app(1, "230039", $link);
//       }
//       if ($tot_bonbarang_blm_app > 0) {
//         $totalnotifikasi = $totalnotifikasi + $tot_bonbarang_blm_app;
//       }
//     }
//   } // end aksesmnbonbarang

//   //////////////////////////////////////////// NOTIF Bon Produk ///////////////////

//   $aksesmnbonproduk = "";
//   $aksesmnbonproduk = $objuser->validasiaksesmenu($biss_id_user, "mnbonproduk", $link);

//   $tot_bonproduk_blm_app = 0;

//   if ($aksesmnbonproduk == "true") {
//     $user_akses_bonbarang = $objuser->getdatafromdb_bymenu("mnbonproduk", $biss_id_user, $link);
//     $tot_bonproduk_blm_app = $user_akses_bonbarang['approve1'];

//     if ($tot_bonproduk_blm_app == 1) {
//       if (($biss_id_unit == 18 || $biss_id_unit == 28) && $biss_level_user === "KARYAWAN") {
//         $tot_bonproduk_blm_app = $objmb->get_total_bon_barang_blm_app_by_user(2, "230039", $biss_erp_user_id,$link);
//       } else {
//         $tot_bonproduk_blm_app = $objmb->get_total_bon_barang_blm_app(2, "230039", $link);
//       }

//       if ($tot_bonproduk_blm_app > 0) {
//         $totalnotifikasi = $totalnotifikasi + $tot_bonproduk_blm_app;
//       }
//     }
//   } // end aksesmnbonproduk

// //////////////////////////////////////////// NOTIF realisasi promosi rutin ///////////////////

// $aksesmnrealpromrutin = "";
// $aksesmnrealpromrutin = $objuser->validasiaksesmenu($biss_id_user, "mnrealisasipromosirutin", $link);
// $tot_realprom_rutin_draft = 0; // pengajuan
// $tot_realprom_rutin_review = 0; // review
// $tot_realprom_rutin_persetujuan = 0; // persetujuan 

// include("classrealisasipromosi.php");
// $objrealprom = new realisasi_promosi();

// if ($aksesmnrealpromrutin == "true") {
//   $user_akses = $objuser->getdatafromdb_bymenu("mnrealisasipromosirutin", $biss_id_user, $link);
//   $rp_akses_app_realprom_rutin_draft = $user_akses['approve1'];
//   $rp_akses_app_realprom_rutin_review = $user_akses['approve2'];
//   $rp_akses_app_realprom_rutin_persetujuan = $user_akses['approve3'];



//   if ($rp_akses_app_realprom_rutin_draft == 1) {

//     if ($biss_gaslap_id == "0" || $biss_gaslap_id == "") {
//       $tot_realprom_rutin_draft = $objrealprom->get_total_realisasi_promosi_blm_approval('230229', 'NEW', $link);

//       if ($tot_realprom_rutin_draft > 0) {
//         $totalnotifikasi = $totalnotifikasi + $tot_realprom_rutin_draft;
//       }
//     } else {
//       $tot_realprom_rutin_draft = $objrealprom->get_total_realisasi_promosi_blm_approval_pergaslap($biss_gaslap_id, '230229', 'NEW', $link);

//       if ($tot_realprom_rutin_draft > 0) {
//         $totalnotifikasi = $totalnotifikasi + $tot_realprom_rutin_draft;
//       }
//     }

//   }

//   if ($rp_akses_app_realprom_rutin_review == 1) {

//     if ($biss_gaslap_id == "0" || $biss_gaslap_id == "") {
//       $tot_realprom_rutin_review = $objrealprom->get_total_realisasi_promosi_blm_approval('230229', 'DRAFT', $link);

//       if ($tot_realprom_rutin_review > 0) {
//         $totalnotifikasi = $totalnotifikasi + $tot_realprom_rutin_review;
//       }
//     } else {
//       $tot_realprom_rutin_review = $objrealprom->get_total_realisasi_promosi_blm_approval_pergaslap($biss_gaslap_id, '230229', 'DRAFT', $link);

//       if ($tot_realprom_rutin_review > 0) {
//         $totalnotifikasi = $totalnotifikasi + $tot_realprom_rutin_review;
//       }

//     }
//   }

//   if ($rp_akses_app_realprom_rutin_persetujuan == 1) {

//     if ($biss_gaslap_id == "0" || $biss_gaslap_id == "") {
//       $tot_realprom_rutin_persetujuan = $objrealprom->get_total_realisasi_promosi_blm_approval('230229', 'REVIEW', $link);

//       if ($tot_realprom_rutin_persetujuan > 0) {
//         $totalnotifikasi = $totalnotifikasi + $tot_realprom_rutin_persetujuan;
//       }
//     } else {
//       $tot_realprom_rutin_persetujuan = $objrealprom->get_total_realisasi_promosi_blm_approval_pergaslap($biss_gaslap_id, '230229', 'REVIEW', $link);

//       if ($tot_realprom_rutin_persetujuan > 0) {
//         $totalnotifikasi = $totalnotifikasi + $tot_realprom_rutin_persetujuan;
//       }
//     }
//   }


// } // end akses realisasi promosi rutin

// //////////////////////////////////////////// NOTIF realisasi promosi non rutin ///////////////////

// $aksesmnrealpromnonrutin = "";
// $aksesmnrealpromnonrutin = $objuser->validasiaksesmenu($biss_id_user, "mnrealisasipromosinonrutin", $link);
// $tot_realprom_non_rutin_draft = 0; // pengajuan
// $tot_realprom_non_rutin_review = 0; // review
// $tot_realprom_non_rutin_persetujuan = 0; // persetujuan 

// if ($aksesmnrealpromnonrutin == "true") {
//   $user_akses = $objuser->getdatafromdb_bymenu("mnrealisasipromosinonrutin", $biss_id_user, $link);
//   $rp_akses_app_realprom_non_rutin_draft = $user_akses['approve1'];
//   $rp_akses_app_realprom_non_rutin_review = $user_akses['approve2'];
//   $rp_akses_app_realprom_non_rutin_persetujuan = $user_akses['approve3'];



//   if ($rp_akses_app_realprom_non_rutin_draft == 1) {

//     if ($biss_gaslap_id == "0" || $biss_gaslap_id == "") {
//       $tot_realprom_non_rutin_draft = $objrealprom->get_total_realisasi_promosi_blm_approval('230230', 'NEW', $link);

//       if ($tot_realprom_non_rutin_draft > 0) {
//         $totalnotifikasi = $totalnotifikasi + $tot_realprom_non_rutin_draft;
//       }
//     } else {
//       $tot_realprom_non_rutin_draft = $objrealprom->get_total_realisasi_promosi_blm_approval_pergaslap($biss_gaslap_id, '230230', 'NEW', $link);

//       if ($tot_realprom_non_rutin_draft > 0) {
//         $totalnotifikasi = $totalnotifikasi + $tot_realprom_non_rutin_draft;
//       }
//     }
//   }

//   if ($rp_akses_app_realprom_non_rutin_review == 1) {

//     if ($biss_gaslap_id == "0" || $biss_gaslap_id == "") {
//       $tot_realprom_non_rutin_review = $objrealprom->get_total_realisasi_promosi_blm_approval('230230', 'DRAFT', $link);

//       if ($tot_realprom_non_rutin_review > 0) {
//         $totalnotifikasi = $totalnotifikasi + $tot_realprom_non_rutin_review;
//       }
//     } else {
//       $tot_realprom_non_rutin_review = $objrealprom->get_total_realisasi_promosi_blm_approval_pergaslap($biss_gaslap_id, '230230', 'DRAFT', $link);

//       if ($tot_realprom_non_rutin_review > 0) {
//         $totalnotifikasi = $totalnotifikasi + $tot_realprom_non_rutin_review;
//       }
//     }
//   }

//   if ($rp_akses_app_realprom_non_rutin_persetujuan == 1) {

//     if ($biss_gaslap_id == "0" || $biss_gaslap_id == "") {
//       $tot_realprom_non_rutin_persetujuan = $objrealprom->get_total_realisasi_promosi_blm_approval('230230', 'REVIEW', $link);

//       if ($tot_realprom_non_rutin_persetujuan > 0) {
//         $totalnotifikasi = $totalnotifikasi + $tot_realprom_non_rutin_persetujuan;
//       }
//     } else {
//       $tot_realprom_non_rutin_persetujuan = $objrealprom->get_total_realisasi_promosi_blm_approval_pergaslap($biss_gaslap_id, '230230', 'REVIEW', $link);

//       if ($tot_realprom_non_rutin_persetujuan > 0) {
//         $totalnotifikasi = $totalnotifikasi + $tot_realprom_non_rutin_persetujuan;
//       }
//     }
//   }


// } // end akses realisasi promosi non rutin

// ////////////////////////////////// PJP NOTIF //////////////////
// $aksesmnpjp = "";
// $aksesmnpjp = $objuser->validasiaksesmenu($biss_id_user, "mnpjp", $link);

// $tot_pjp_blm_app_atasan_peminta = 0;
// $tot_pjp_blm_app_manager = 0;
// if ($aksesmnpjp == "true") {

//   include('classpjp.php');
//   $objpjp = new pjp();


//   if ($biss_level_user == "SUPERADMIN") {
//     $tot_pjp_blm_app_atasan_peminta = $objpjp->get_total_pjp_blm_approval('NEW', $link);
//   } else if ($biss_level_user == "MANAGER") {
//     $tot_pjp_blm_app_manager = $objpjp->get_total_pjp_blm_app_manager_by_dept($biss_kd_dept, 'NEW', $link);
//   }

//   if ($tot_pjp_blm_app_atasan_peminta > 0) {
//     $totalnotifikasi = $totalnotifikasi + $tot_pjp_blm_app_atasan_peminta;
//   }
//   if ($tot_pjp_blm_app_manager > 0) {
//     $totalnotifikasi = $totalnotifikasi + $tot_pjp_blm_app_manager;
//   }

// } // end akses mnpjp

// ////////////////////////////////// PERBAIKAN PJP SPK NOTIF FOR TEKINFO //////////////////
// $aksesmnperbaikanpjpti = "";
// $aksesmnspkti = "";
// $aksesmnlpjpjpti = "";

// $tot_perbaikanpjpti_blm_app_disiapkan = 0;
// $tot_perbaikanpjpti_blm_app_diperiksa = 0;
// $tot_perbaikanpjpti_blm_app_disetujui = 0;
// $tot_perbaikanpjpti_blm_app_diterima = 0;

// $tot_spkti_blm_app_diperiksa = 0;
// $tot_spkti_blm_app_disetujui = 0;

// $tot_pj_real_ti_blm_app_diperiksa = 0;
// $tot_pj_real_ti_blm_app_disetujui_pengelola = 0;


//   if ($biss_kd_dept == "DEPARTEMEN ISM DAN STRATEGI BISNIS" && $biss_id_unit == 42) {
//     $aksesmnperbaikanpjpti = $objuser->validasiaksesmenu($biss_id_user, "mnpjpperbaikanti", $link);
//     $aksesmnspkti = $objuser->validasiaksesmenu($biss_id_user, "mnspkti", $link);
//     $aksesmnlpjpjpti = $objuser->validasiaksesmenu($biss_id_user, "mnpjprealisasibiayati", $link);

//     if ($aksesmnperbaikanpjpti == "true") {
//       //        include ("classpjpperbaikan.php");
// //        $objperbaikan = new pjp_perbaikan();

//       if ($biss_level_user == "KARYAWAN" || $biss_level_user == "SUPERADMIN") {
//         $tot_perbaikanpjpti_blm_app_disiapkan = $objperbaikan->get_total_pjp_perbaikan_blm_approval_by_pengelola("TEKNOLOGI INFORMASI", "NEW", $link);
//         $tot_perbaikanpjpti_blm_app_diperiksa = $objperbaikan->get_total_pjp_perbaikan_blm_approval_by_pengelola("TEKNOLOGI INFORMASI", "DRAFT", $link);

//         if ($tot_perbaikanpjpti_blm_app_disiapkan > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_perbaikanpjpti_blm_app_disiapkan;
//         }


//         if ($tot_perbaikanpjpti_blm_app_diperiksa > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_perbaikanpjpti_blm_app_diperiksa;
//         }

//       }

//       if ($biss_level_user == "MANAGER" || $biss_level_user == "SUPERADMIN") {
//         $tot_perbaikanpjpti_blm_app_disetujui = $objperbaikan->get_total_pjp_perbaikan_blm_approval_by_pengelola("TEKNOLOGI INFORMASI", "APPROVED", $link);

//         if ($tot_perbaikanpjpti_blm_app_disetujui > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_perbaikanpjpti_blm_app_disetujui;
//         }

//       }

//       if ($biss_level_user == "SUPERADMIN") {
//         $tot_perbaikanpjpti_blm_app_diterima = $objperbaikan->get_total_pjp_perbaikan_blm_approval_terima_by_peminta("TEKNOLOGI INFORMASI", $biss_id_unit, $biss_level_user, $link);

//         if ($tot_perbaikanpjpti_blm_app_diterima > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_perbaikanpjpti_blm_app_diterima;
//         }

//       }

//       //$tot_perbaikanpjp_blm_app_disiapkan = $objperbaikan->get_total_pjp_perbaikan_blm_approval_by_pengelola("TEKNOLOGI INFORMASI", "REVIEW",$link);




//     }

//     if ($aksesmnspkti == "true") {
//       //        include ("classspk.php");
// //        $objspk = new spk();

//       if ($biss_level_user == "KARYAWAN" || $biss_level_user == "SUPERADMIN") {
//         $tot_spkti_blm_app_diperiksa = $objspk->get_total_spk_blm_approval_by_pengelola("TEKNOLOGI INFORMASI", "NEW", $link);

//         if ($tot_spkti_blm_app_diperiksa > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_spkti_blm_app_diperiksa;
//         }

//       }

//       if ($biss_level_user == "MANAGER" || $biss_level_user == "SUPERADMIN") {
//         $tot_spkti_blm_app_disetujui = $objspk->get_total_spk_blm_approval_by_pengelola("TEKNOLOGI INFORMASI", "REVIEW", $link);

//         if ($tot_spkti_blm_app_disetujui > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_spkti_blm_app_disetujui;
//         }

//       }





//     }

//     if ($aksesmnlpjpjpti == "true") {
//       //        include ("classpjprealisasibiaya.php");
// //        $objrealpjp = new pjp_realisasi_biaya();

//       if ($biss_level_user == "KARYAWAN" || $biss_level_user == "SUPERADMIN") {
//         $tot_pj_real_ti_blm_app_diperiksa = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("TEKNOLOGI INFORMASI", "NEW", $link);

//         if ($tot_pj_real_ti_blm_app_diperiksa > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_pj_real_ti_blm_app_diperiksa;
//         }

//       }

//       if ($biss_level_user == "MANAGER" || $biss_level_user == "SUPERADMIN") {
//         $tot_pj_real_ti_blm_app_disetujui_pengelola = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("TEKNOLOGI INFORMASI", "REVIEW", $link);

//         if ($tot_pj_real_ti_blm_app_disetujui_pengelola > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_pj_real_ti_blm_app_disetujui_pengelola;
//         }

//       }





//     }


//   } else if ($biss_kd_dept !== "DEPARTEMEN ISM DAN STRATEGI BISNIS" && $biss_id_unit !== 42) {
//     $aksesmnperbaikanpjpti = $objuser->validasiaksesmenu($biss_id_user, "mnpjpperbaikanti", $link);
//     ;

//     if ($aksesmnperbaikanpjpti == "true") {
//       //        include ("classpjpperbaikan.php");
// //        $objperbaikan = new pjp_perbaikan();

//       $tot_perbaikanpjpti_blm_app_diterima = $objperbaikan->get_total_pjp_perbaikan_blm_approval_terima_by_peminta("TEKNOLOGI INFORMASI", $biss_id_unit, $biss_level_user, $link);

//       if ($tot_perbaikanpjpti_blm_app_diterima > 0) {
//         $totalnotifikasi = $totalnotifikasi + $tot_perbaikanpjpti_blm_app_diterima;
//       }
//     }


//   }

//   ////////////////////////////////// PERBAIKAN PJP SPK NOTIF FOR HARTEK //////////////////

//   $aksesmnperbaikanpjphar = "";
//   $aksesmnspkhar = "";
//   $aksesmnlpjpjphar = "";

//   $tot_perbaikanpjphar_blm_app_disiapkan = 0;
//   $tot_perbaikanpjphar_blm_app_diperiksa = 0;
//   $tot_perbaikanpjphar_blm_app_disetujui = 0;
//   $tot_perbaikanpjphar_blm_app_diterima = 0;

//   $tot_spkhar_blm_app_diperiksa = 0;
//   $tot_spkhar_blm_app_disetujui = 0;

//   $tot_pj_real_har_blm_app_diperiksa = 0;
//   $tot_pj_real_har_blm_app_disetujui_pengelola = 0;
//   $tot_pj_real_har_blm_app_review_daan = 0;
//   $tot_pj_real_har_blm_app_kadep_daan = 0;


//   if (($biss_kd_dept == "DEPARTEMEN PRODUKSI" && $biss_id_unit == 32 && $biss_level_user == "KARYAWAN") || ($biss_kd_dept == "DEPARTEMEN PRODUKSI" && $biss_level_user == "MANAGER")) {
//     $aksesmnperbaikanpjphar = $objuser->validasiaksesmenu($biss_id_user, "mnpjpperbaikanhartek", $link);
//     $aksesmnspkhar = $objuser->validasiaksesmenu($biss_id_user, "mnspkhartek", $link);
//     $aksesmnlpjpjphar = $objuser->validasiaksesmenu($biss_id_user, "mnpjprealisasibiayahartek", $link);

//     if ($aksesmnperbaikanpjphar == "true") {


//       if ($biss_level_user == "KARYAWAN") {
//         $tot_perbaikanpjphar_blm_app_disiapkan = $objperbaikan->get_total_pjp_perbaikan_blm_approval_by_pengelola("HARTEK", "NEW", $link);
//         $tot_perbaikanpjphar_blm_app_diperiksa = $objperbaikan->get_total_pjp_perbaikan_blm_approval_by_pengelola("HARTEK", "DRAFT", $link);

//         if ($tot_perbaikanpjphar_blm_app_disiapkan > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_perbaikanpjphar_blm_app_disiapkan;
//         }

//         if ($tot_perbaikanpjphar_blm_app_diperiksa > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_perbaikanpjphar_blm_app_diperiksa;
//         }
//       }

//       if ($biss_level_user == "MANAGER") {
//         $tot_perbaikanpjphar_blm_app_disetujui = $objperbaikan->get_total_pjp_perbaikan_blm_approval_by_pengelola("HARTEK", "APPROVED", $link);

//         if ($tot_perbaikanpjphar_blm_app_disetujui > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_perbaikanpjphar_blm_app_disetujui;
//         }


//       }

//       //$tot_perbaikanpjp_blm_app_disiapkan = $objperbaikan->get_total_pjp_perbaikan_blm_approval_by_pengelola("TEKNOLOGI INFORMASI", "REVIEW",$link);

//     }

//     if ($aksesmnspkhar == "true") {


//       if ($biss_level_user == "KARYAWAN") {
//         $tot_spkhar_blm_app_diperiksa = $objspk->get_total_spk_blm_approval_by_pengelola("HARTEK", "NEW", $link);

//         if ($tot_spkhar_blm_app_diperiksa > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_spkhar_blm_app_diperiksa;
//         }

//       }

//       if ($biss_level_user == "MANAGER") {
//         $tot_spkhar_blm_app_disetujui = $objspk->get_total_spk_blm_approval_by_pengelola("HARTEK", "REVIEW", $link);

//         if ($tot_spkhar_blm_app_disetujui > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_spkhar_blm_app_disetujui;
//         }

//       }


//     }

//     if ($aksesmnlpjpjphar == "true") {


//       if ($biss_level_user == "KARYAWAN") {
//         $tot_pj_real_har_blm_app_diperiksa = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("HARTEK", "NEW", $link);

//         if ($tot_pj_real_har_blm_app_diperiksa > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_pj_real_har_blm_app_diperiksa;
//         }


//       }

//       if ($biss_level_user == "MANAGER") {
//         $tot_pj_real_har_blm_app_disetujui_pengelola = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("HARTEK", "REVIEW", $link);

//         if ($tot_pj_real_har_blm_app_disetujui_pengelola > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_pj_real_har_blm_app_disetujui_pengelola;
//         }


//       }



//     }


//   } else if ($biss_id_unit !== 32 && $biss_level_user !== "SUPERADMIN") {
//     $aksesmnperbaikanpjphar = $objuser->validasiaksesmenu($biss_id_user, "mnpjpperbaikanhartek", $link);
//     ;

//     if ($aksesmnperbaikanpjphar == "true") {

//       $tot_perbaikanpjphar_blm_app_diterima = $objperbaikan->get_total_pjp_perbaikan_blm_approval_terima_by_peminta("HARTEK", $biss_id_unit, $biss_level_user, $link);

//       if ($tot_perbaikanpjphar_blm_app_diterima > 0) {
//         $totalnotifikasi = $totalnotifikasi + $tot_perbaikanpjphar_blm_app_diterima;
//       }

//     }

//   } else if ($biss_level_user == "SUPERADMIN") {
//     $tot_perbaikanpjphar_blm_app_disiapkan = $objperbaikan->get_total_pjp_perbaikan_blm_approval_by_pengelola("HARTEK", "NEW", $link);
//     $tot_perbaikanpjphar_blm_app_diperiksa = $objperbaikan->get_total_pjp_perbaikan_blm_approval_by_pengelola("HARTEK", "DRAFT", $link);
//     $tot_perbaikanpjphar_blm_app_disetujui = $objperbaikan->get_total_pjp_perbaikan_blm_approval_by_pengelola("HARTEK", "APPROVED", $link);

//     if ($tot_perbaikanpjphar_blm_app_disiapkan > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_perbaikanpjphar_blm_app_disiapkan;
//     }
//     if ($tot_perbaikanpjphar_blm_app_diperiksa > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_perbaikanpjphar_blm_app_diperiksa;
//     }

//     if ($tot_perbaikanpjphar_blm_app_disetujui > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_perbaikanpjphar_blm_app_disetujui;
//     }

//     $tot_spkhar_blm_app_diperiksa = $objspk->get_total_spk_blm_approval_by_pengelola("HARTEK", "NEW", $link);
//     $tot_spkhar_blm_app_disetujui = $objspk->get_total_spk_blm_approval_by_pengelola("HARTEK", "REVIEW", $link);

//     if ($tot_spkhar_blm_app_diperiksa > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_spkhar_blm_app_diperiksa;
//     }

//     if ($tot_spkhar_blm_app_disetujui > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_spkhar_blm_app_disetujui;
//     }

//     $tot_pj_real_har_blm_app_diperiksa = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("HARTEK", "NEW", $link);
//     $tot_pj_real_har_blm_app_disetujui_pengelola = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("HARTEK", "REVIEW", $link);

//     if ($tot_pj_real_har_blm_app_diperiksa > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_pj_real_har_blm_app_diperiksa;
//     }

//     if ($tot_pj_real_har_blm_app_disetujui_pengelola > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_pj_real_har_blm_app_disetujui_pengelola;
//     }

//     $tot_perbaikanpjphar_blm_app_diterima = $objperbaikan->get_total_pjp_perbaikan_blm_approval_terima_by_peminta("HARTEK", $biss_id_unit, $biss_level_user, $link);

//     if ($tot_perbaikanpjphar_blm_app_diterima > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_perbaikanpjphar_blm_app_diterima;
//     }

//   }



//   ////////////////////////////////// PERBAIKAN PJP SPK NOTIF FOR UMUM //////////////////

//   $aksesmnperbaikanpjpumm = "";
//   $aksesmnspkumm = "";
//   $aksesmnlpjpjpumm = "";

//   $tot_perbaikanpjpumm_blm_app_disiapkan = 0;
//   $tot_perbaikanpjpumm_blm_app_diperiksa = 0;
//   $tot_perbaikanpjpumm_blm_app_disetujui = 0;
//   $tot_perbaikanpjpumm_blm_app_diterima = 0;

//   $tot_spkumm_blm_app_diperiksa = 0;
//   $tot_spkumm_blm_app_disetujui = 0;

//   $tot_pj_real_umm_blm_app_diperiksa = 0;
//   $tot_pj_real_umm_blm_app_disetujui_pengelola = 0;


//   if (($biss_kd_dept == "DEPARTEMEN SDM DAN UMUM" && $biss_id_unit == 34 && $biss_level_user == "KARYAWAN") || ($biss_kd_dept == "DEPARTEMEN SDM DAN UMUM" && $biss_level_user == "MANAGER")) {
//     $aksesmnperbaikanpjpumm = $objuser->validasiaksesmenu($biss_id_user, "mnpjpperbaikanumum", $link);
//     ;
//     $aksesmnspkumm = $objuser->validasiaksesmenu($biss_id_user, "mnspkumum", $link);
//     $aksesmnlpjpjpumm = $objuser->validasiaksesmenu($biss_id_user, "mnpjprealisasibiayaumum", $link);

//     if ($aksesmnperbaikanpjpumm == "true") {


//       if ($biss_level_user == "KARYAWAN") {
//         $tot_perbaikanpjpumm_blm_app_disiapkan = $objperbaikan->get_total_pjp_perbaikan_blm_approval_by_pengelola("UMUM", "NEW", $link);
//         $tot_perbaikanpjpumm_blm_app_diperiksa = $objperbaikan->get_total_pjp_perbaikan_blm_approval_by_pengelola("UMUM", "DRAFT", $link);

//         if ($tot_perbaikanpjpumm_blm_app_disiapkan > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_perbaikanpjpumm_blm_app_disiapkan;
//         }

//         if ($tot_perbaikanpjpumm_blm_app_diperiksa > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_perbaikanpjpumm_blm_app_diperiksa;
//         }

//       }

//       if ($biss_level_user == "MANAGER") {
//         $tot_perbaikanpjpumm_blm_app_disetujui = $objperbaikan->get_total_pjp_perbaikan_blm_approval_by_pengelola("UMUM", "APPROVED", $link);

//         if ($tot_perbaikanpjpumm_blm_app_disetujui > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_perbaikanpjpumm_blm_app_disetujui;
//         }


//       }

//       //$tot_perbaikanpjp_blm_app_disiapkan = $objperbaikan->get_total_pjp_perbaikan_blm_approval_by_pengelola("TEKNOLOGI INFORMASI", "REVIEW",$link);

//     }

//     if ($aksesmnspkumm == "true") {


//       if ($biss_level_user == "KARYAWAN") {
//         $tot_spkumm_blm_app_diperiksa = $objspk->get_total_spk_blm_approval_by_pengelola("UMUM", "NEW", $link);

//         if ($tot_spkumm_blm_app_diperiksa > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_spkumm_blm_app_diperiksa;
//         }

//       }

//       if ($biss_level_user == "MANAGER") {
//         $tot_spkumm_blm_app_disetujui = $objspk->get_total_spk_blm_approval_by_pengelola("UMUM", "REVIEW", $link);

//         if ($tot_spkumm_blm_app_disetujui > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_spkumm_blm_app_disetujui;
//         }


//       }


//     }

//     if ($aksesmnlpjpjpumm == "true") {


//       if ($biss_level_user == "KARYAWAN") {
//         $tot_pj_real_umm_blm_app_diperiksa = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("UMUM", "NEW", $link);

//         if ($tot_pj_real_umm_blm_app_diperiksa > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_pj_real_umm_blm_app_diperiksa;
//         }


//       }

//       if ($biss_level_user == "MANAGER") {
//         $tot_pj_real_umm_blm_app_disetujui_pengelola = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("UMUM", "REVIEW", $link);

//         if ($tot_pj_real_umm_blm_app_disetujui_pengelola > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_pj_real_umm_blm_app_disetujui_pengelola;
//         }
//       }

//     }


//   } else if ($biss_id_unit !== 34 && $biss_level_user !== "SUPERADMIN") {
//     $aksesmnperbaikanpjpumm = $objuser->validasiaksesmenu($biss_id_user, "mnpjpperbaikanumum", $link);
//     ;

//     if ($aksesmnperbaikanpjpumm == "true") {
//       $tot_perbaikanpjpumm_blm_app_diterima = $objperbaikan->get_total_pjp_perbaikan_blm_approval_terima_by_peminta("UMUM", $biss_id_unit, $biss_level_user, $link);

//       if ($tot_perbaikanpjpumm_blm_app_diterima > 0) {
//         $totalnotifikasi = $totalnotifikasi + $tot_perbaikanpjpumm_blm_app_diterima;
//       }

//     }

//   } else if ($biss_level_user == "SUPERADMIN") {
//     $tot_perbaikanpjpumm_blm_app_disiapkan = $objperbaikan->get_total_pjp_perbaikan_blm_approval_by_pengelola("UMUM", "NEW", $link);
//     $tot_perbaikanpjpumm_blm_app_diperiksa = $objperbaikan->get_total_pjp_perbaikan_blm_approval_by_pengelola("UMUM", "DRAFT", $link);
//     $tot_perbaikanpjpumm_blm_app_disetujui = $objperbaikan->get_total_pjp_perbaikan_blm_approval_by_pengelola("UMUM", "APPROVED", $link);
//     $tot_perbaikanpjpumm_blm_app_diterima = $objperbaikan->get_total_pjp_perbaikan_blm_approval_terima_by_peminta("UMUM", $biss_id_unit, $biss_level_user, $link);

//     if ($tot_perbaikanpjpumm_blm_app_disiapkan > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_perbaikanpjpumm_blm_app_disiapkan;
//     }
//     if ($tot_perbaikanpjpumm_blm_app_diperiksa > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_perbaikanpjpumm_blm_app_diperiksa;
//     }
//     if ($tot_perbaikanpjpumm_blm_app_disetujui > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_perbaikanpjpumm_blm_app_disetujui;
//     }
//     if ($tot_perbaikanpjpumm_blm_app_diterima > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_perbaikanpjpumm_blm_app_diterima;
//     }

//     $tot_spkumm_blm_app_diperiksa = $objspk->get_total_spk_blm_approval_by_pengelola("UMUM", "NEW", $link);
//     $tot_spkumm_blm_app_disetujui = $objspk->get_total_spk_blm_approval_by_pengelola("UMUM", "REVIEW", $link);

//     if ($tot_spkumm_blm_app_diperiksa > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_spkumm_blm_app_diperiksa;
//     }
//     if ($tot_spkumm_blm_app_disetujui > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_spkumm_blm_app_disetujui;
//     }

//     $tot_pj_real_umm_blm_app_diperiksa = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("UMUM", "NEW", $link);
//     $tot_pj_real_umm_blm_app_disetujui_pengelola = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("UMUM", "REVIEW", $link);

//     if ($tot_pj_real_umm_blm_app_diperiksa > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_pj_real_umm_blm_app_diperiksa;
//     }
//     if ($tot_pj_real_umm_blm_app_disetujui_pengelola > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_pj_real_umm_blm_app_disetujui_pengelola;
//     }

//     $tot_perbaikanpjpumm_blm_app_diterima = $objperbaikan->get_total_pjp_perbaikan_blm_approval_terima_by_peminta("UMUM", $biss_id_unit, $biss_level_user, $link);

//     if ($tot_perbaikanpjpumm_blm_app_diterima > 0) {
//       $totalnotifikasi = $totalnotifikasi + $tot_perbaikanpjpumm_blm_app_diterima;
//     }
//   }

//   ////////////////////////////////// LPJ PJP NOTIF FOR PENGADAAN //////////////////
//   $aksesmnlpjpjpti_daan = "";
//   $aksesmnlpjpjphar_daan = "";
//   $aksesmnlpjpjpumm_daan = "";

//   $tot_pj_real_ti_blm_app_check_daan = 0;
//   $tot_pj_real_ti_blm_app_review_daan = 0;
//   $tot_pj_real_ti_blm_app_kadep_daan = 0;
//   $tot_pj_real_umm_blm_app_check_daan = 0;
//   $tot_pj_real_umm_blm_app_review_daan = 0;
//   $tot_pj_real_umm_blm_app_kadep_daan = 0;

//   $tot_pj_real_har_blm_app_check_daan = 0;
//   $tot_pj_real_har_blm_app_review_daan = 0;
//   $tot_pj_real_har_blm_app_kadep_daan = 0;


//   if (($biss_kd_dept == "DEPARTEMEN PENGADAAN" && $biss_id_unit == 7) || $biss_level_user == "SUPERADMIN") {
//     $aksesmnlpjpjpti_daan = $objuser->validasiaksesmenu($biss_id_user, "mnpjprealisasibiayati", $link);
//     ;
//     $aksesmnlpjpjphar_daan = $objuser->validasiaksesmenu($biss_id_user, "mnpjprealisasibiayahartek", $link);
//     $aksesmnlpjpjpumm_daan = $objuser->validasiaksesmenu($biss_id_user, "mnpjprealisasibiayaumum", $link);

//     if ($aksesmnlpjpjpti_daan == "true") {
//       if ($biss_level_user == "KARYAWAN") {
//         $tot_pj_real_ti_blm_app_check_daan = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("TEKNOLOGI INFORMASI", "APPROVE1", $link);
//         $tot_pj_real_ti_blm_app_review_daan = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("TEKNOLOGI INFORMASI", "CHECK1", $link);

//         if ($tot_pj_real_ti_blm_app_check_daan > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_pj_real_ti_blm_app_check_daan;
//         }

//         if ($tot_pj_real_ti_blm_app_review_daan > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_pj_real_ti_blm_app_review_daan;
//         }

//       } else if ($biss_level_user == "MANAGER") {
//         $tot_pj_real_ti_blm_app_kadep_daan = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("TEKNOLOGI INFORMASI", "CHECK2", $link);

//         if ($tot_pj_real_ti_blm_app_kadep_daan > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_pj_real_ti_blm_app_kadep_daan;
//         }

//       } else if ($biss_level_user == "SUPERADMIN") {
//         $tot_pj_real_ti_blm_app_check_daan = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("TEKNOLOGI INFORMASI", "APPROVE1", $link);
//         $tot_pj_real_ti_blm_app_review_daan = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("TEKNOLOGI INFORMASI", "CHECK1", $link);
//         $tot_pj_real_ti_blm_app_kadep_daan = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("TEKNOLOGI INFORMASI", "CHECK2", $link);

//         if ($tot_pj_real_ti_blm_app_check_daan > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_pj_real_ti_blm_app_check_daan;
//         }

//         if ($tot_pj_real_ti_blm_app_review_daan > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_pj_real_ti_blm_app_review_daan;
//         }
//         if ($tot_pj_real_ti_blm_app_kadep_daan > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_pj_real_ti_blm_app_kadep_daan;
//         }

//       }
//     }

//     if ($aksesmnlpjpjphar_daan == "true") {
//       if ($biss_level_user == "KARYAWAN") {
//         $tot_pj_real_har_blm_app_check_daan = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("HARTEK", "APPROVE1", $link);
//         $tot_pj_real_har_blm_app_review_daan = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("HARTEK", "CHECK1", $link);

//         if ($tot_pj_real_har_blm_app_check_daan > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_pj_real_har_blm_app_check_daan;
//         }

//         if ($tot_pj_real_har_blm_app_review_daan > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_pj_real_har_blm_app_review_daan;
//         }

//       } else if ($biss_level_user == "MANAGER") {
//         $tot_pj_real_har_blm_app_kadep_daan = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("HARTEK", "CHECK2", $link);

//         if ($tot_pj_real_har_blm_app_kadep_daan > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_pj_real_har_blm_app_kadep_daan;
//         }
//       } else if ($biss_level_user == "SUPERADMIN") {
//         $tot_pj_real_har_blm_app_check_daan = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("HARTEK", "APPROVE1", $link);
//         $tot_pj_real_har_blm_app_review_daan = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("HARTEK", "CHECK1", $link);
//         $tot_pj_real_har_blm_app_kadep_daan = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("HARTEK", "CHECK2", $link);

//         if ($tot_pj_real_har_blm_app_check_daan > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_pj_real_har_blm_app_check_daan;
//         }

//         if ($tot_pj_real_har_blm_app_review_daan > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_pj_real_har_blm_app_review_daan;
//         }
//         if ($tot_pj_real_har_blm_app_kadep_daan > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_pj_real_har_blm_app_kadep_daan;
//         }
//       }
//     }

//     if ($aksesmnlpjpjpumm_daan == "true") {
//       if ($biss_level_user == "KARYAWAN") {
//         $tot_pj_real_umm_blm_app_check_daan = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("UMUM", "APPROVE1", $link);
//         $tot_pj_real_umm_blm_app_review_daan = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("UMUM", "CHECK1", $link);

//         if ($tot_pj_real_umm_blm_app_check_daan > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_pj_real_umm_blm_app_check_daan;
//         }

//         if ($tot_pj_real_umm_blm_app_review_daan > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_pj_real_umm_blm_app_review_daan;
//         }

//       } else if ($biss_level_user == "MANAGER") {
//         $tot_pj_real_umm_blm_app_kadep_daan = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("UMUM", "CHECK2", $link);

//         if ($tot_pj_real_umm_blm_app_kadep_daan > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_pj_real_umm_blm_app_kadep_daan;
//         }

//       } else if ($biss_level_user == "SUPERADMIN") {
//         $tot_pj_real_umm_blm_app_check_daan = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("UMUM", "APPROVE1", $link);
//         $tot_pj_real_umm_blm_app_review_daan = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("UMUM", "CHECK1", $link);
//         $tot_pj_real_umm_blm_app_kadep_daan = $objrealpjp->get_total_realisasi_biaya_blm_approval_by_pengelola("UMUM", "CHECK2", $link);

//         if ($tot_pj_real_umm_blm_app_check_daan > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_pj_real_umm_blm_app_check_daan;
//         }

//         if ($tot_pj_real_umm_blm_app_review_daan > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_pj_real_umm_blm_app_review_daan;
//         }
//         if ($tot_pj_real_umm_blm_app_kadep_daan > 0) {
//           $totalnotifikasi = $totalnotifikasi + $tot_pj_real_umm_blm_app_kadep_daan;
//         }
//       }
//     }
//   }

//   //////////////////////////////////////////// NOTIF Nota retur penjualan ///////////////////

//   $aksesmnnotareturpenjualan = "";
//   $aksesmnnotareturpenjualan = $objuser->validasiaksesmenu($biss_id_user, "mnnotareturpenjualan", $link);
//   $tot_app_nota_retur_penjualan_persetujuan = 0; // persetujuan

//   include("classnotareturpenjualan.php");
//   $objnotareturpenjualan = new nota_retur_penjualan();

//   if ($aksesmnnotareturpenjualan == "true") {
//     $user_akses = $objuser->getdatafromdb_bymenu("mnnotareturpenjualan", $biss_id_user, $link);
//     $nrp_akses_app_nota_retur_penjualan_persetujuan = $user_akses['approve1'];



//     if ($nrp_akses_app_nota_retur_penjualan_persetujuan == 1) {

//       $tot_app_nota_retur_penjualan_persetujuan = $objnotareturpenjualan->get_total_nota_retur_penjualan_blm_approval('NEW', $link);

//       if ($tot_app_nota_retur_penjualan_persetujuan > 0) {
//         $totalnotifikasi = $totalnotifikasi + $tot_app_nota_retur_penjualan_persetujuan;
//       }


//     }


//   } // end akses nota retur penjualan


//   //////////////////////////////////////////// NOTIF kontrak distributor ///////////////////

//   include("classkontrakdistributor.php");
//   $objkontrakdistributor = new kontrak_distributor();

//   $aksesmnkontrakdistributor = "";
//   $aksesmnkontrakdistributor = $objuser->validasiaksesmenu($biss_id_user, "mnkontrakdistributor", $link);
//   $tot_kontrak_distributor_review = 0; // pengajuan
//   $tot_kontrak_distributor_appsm = 0; // review
//   $tot_kontrak_distributor_applegal = 0; // persetujuan 
//   $tot_kontrak_distributor_approved = 0; // persetujuan 

//   if ($aksesmnkontrakdistributor == "true") {
//     $user_akses = $objuser->getdatafromdb_bymenu("mnkontrakdistributor", $biss_id_user, $link);
//     $kd_kontrak_distributor_review = $user_akses['approve1'];
//     $kd_kontrak_distributor_appsm = $user_akses['approve2'];
//     $kd_kontrak_distributor_applegal = $user_akses['approve3'];
//     $kd_kontrak_distributor_approved = $user_akses['approve4'];



//     if ($kd_kontrak_distributor_review == 1) {
//       $tot_kontrak_distributor_review = $objkontrakdistributor->get_total_kontrak_distributor_blm_approval('DRAFT', $link);

//       if ($tot_kontrak_distributor_review > 0) {
//         $totalnotifikasi = $totalnotifikasi + $tot_kontrak_distributor_review;
//       }
//     }

//     if ($kd_kontrak_distributor_appsm == 1) {
//       $tot_kontrak_distributor_appsm = $objkontrakdistributor->get_total_kontrak_distributor_blm_approval('REVIEW', $link);

//       if ($tot_kontrak_distributor_appsm > 0) {
//         $totalnotifikasi = $totalnotifikasi + $tot_kontrak_distributor_appsm;
//       }
//     }

//     if ($kd_kontrak_distributor_applegal == 1) {
//       $tot_kontrak_distributor_applegal = $objkontrakdistributor->get_total_kontrak_distributor_blm_approval('APP. SM', $link);

//       if ($tot_kontrak_distributor_applegal > 0) {
//         $totalnotifikasi = $totalnotifikasi + $tot_kontrak_distributor_applegal;
//       }
//     }

//     if ($kd_kontrak_distributor_approved == 1) {
//       $tot_kontrak_distributor_approved = $objkontrakdistributor->get_total_kontrak_distributor_blm_approval('APP. LEGAL', $link);

//       if ($tot_kontrak_distributor_approved > 0) {
//         $totalnotifikasi = $totalnotifikasi + $tot_kontrak_distributor_approved;
//       }
//     }


//   } // end akses kontrak distributor



//   //////////////////////////////////////////// NOTIF ADENDUM KONTRAK DISTRIBUTOR ///////////////////

//   include("classadendumkontrakdistributor.php");
//   $objaddkontrakdistributor = new adendum_kontrak_distributor();

//   $aksesmnkontrakdistributor = "";
//   $aksesmnkontrakdistributor = $objuser->validasiaksesmenu($biss_id_user, "mnadendumkontrakdistributor", $link);
//   $tot_add_kontrak_distributor_review = 0; // pengajuan
//   $tot_add_kontrak_distributor_appsm = 0; // review
//   $tot_add_kontrak_distributor_applegal = 0; // persetujuan 
//   $tot_add_kontrak_distributor_approved = 0; // persetujuan 

//   if ($aksesmnkontrakdistributor == "true") {
//     $user_akses = $objuser->getdatafromdb_bymenu("mnadendumkontrakdistributor", $biss_id_user, $link);
//     $kda_add_kontrak_distributor_review = $user_akses['approve1'];
//     $kda_add_kontrak_distributor_appsm = $user_akses['approve2'];
//     $kda_add_kontrak_distributor_applegal = $user_akses['approve3'];
//     $kda_add_kontrak_distributor_approved = $user_akses['approve4'];



//     if ($kda_add_kontrak_distributor_review == 1) {
//       $tot_add_kontrak_distributor_review = $objaddkontrakdistributor->get_total_add_kontrak_distributor_blm_approval('DRAFT', $link);

//       if ($tot_add_kontrak_distributor_review > 0) {
//         $totalnotifikasi = $totalnotifikasi + $tot_add_kontrak_distributor_review;
//       }
//     }

//     if ($kda_add_kontrak_distributor_appsm == 1) {
//       $tot_add_kontrak_distributor_appsm = $objaddkontrakdistributor->get_total_add_kontrak_distributor_blm_approval('REVIEW', $link);

//       if ($tot_add_kontrak_distributor_appsm > 0) {
//         $totalnotifikasi = $totalnotifikasi + $tot_add_kontrak_distributor_appsm;
//       }
//     }

//     if ($kda_add_kontrak_distributor_applegal == 1) {
//       $tot_add_kontrak_distributor_applegal = $objaddkontrakdistributor->get_total_add_kontrak_distributor_blm_approval('APP. SM', $link);

//       if ($tot_add_kontrak_distributor_applegal > 0) {
//         $totalnotifikasi = $totalnotifikasi + $tot_add_kontrak_distributor_applegal;
//       }
//     }

//     if ($kda_add_kontrak_distributor_approved == 1) {
//       $tot_add_kontrak_distributor_approved = $objaddkontrakdistributor->get_total_add_kontrak_distributor_blm_approval('APP. LEGAL', $link);

//       if ($tot_add_kontrak_distributor_approved > 0) {
//         $totalnotifikasi = $totalnotifikasi + $tot_add_kontrak_distributor_approved;
//       }
//     }


//   } // end akses adendum kontrak distributor


//  echo "<BR>";
//  echo $totalnotifikasi;
//  echo "<BR>";


// } // tutup session
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>::: Pekabiss :::</title>
    <link rel="icon" type="image/png" href="images/bg_logosmall_h3.png" />
    <!-- Tell the browser to be responsive to screen width
  <meta name="viewport" content="width=device-width, initial-scale=1">
  Font Awesome
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  Ionicons
  <link rel="stylesheet" href="plugins/ionicons.min.css">
  Tempusdominus Bbootstrap 4
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  iCheck
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  JQVMap
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  Theme style
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  overlayScrollbars
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  Daterange picker
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  summernote
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  Google Font: Source Sans Pro
  <link href="plugins/googlefont.css" rel="stylesheet"> -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-success navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="home.php" class="nav-link">Petrokimia Kayaku Bussiness Integrated System</a>
                    <!-- <span class="brand-text font-weight-dark" ><h4 style="color:white;">Petrokimia Kayaku Bussiness Integrated System</h4></span> -->
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
            </ul>

            <!-- SEARCH FORM -->
            <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <!-- <?php //if($totalnotifikasi > 0 ){ ?> -->
                        <span class="badge badge-warning navbar-badge"><?php echo $totalnotifikasi; ?></span>
                        <!-- <?php // } ?> -->
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <span class="dropdown-item dropdown-header"><?php if ($totalnotifikasi > 0) {
              echo "Ada " . $totalnotifikasi;
            } else if ($totalnotifikasi == 0) {
              echo "Tidak ada";
            } ?>
                            Notifikasi untuk Anda </span>
                        <div class="dropdown-divider"></div>


                        <?php if ($tot_ppb_stok_blm_app_manager > 0) { ?>
                        <a href="listppb.php?pr=1" class="dropdown-item" style="font-size: 14px;" data-toggle="tooltip"
                            data-placement="bottom"
                            title="<?php echo $tot_ppb_stok_blm_app_manager; ?> dok. PPB Stok Belum Persetujuan">
                            <i
                                class="fas fa-file-powerpoint"></i>&nbsp;&nbsp;<?php echo $tot_ppb_stok_blm_app_manager; ?>
                            dok. PPB Stok Belum Persetujuan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>

                        <?php if ($tot_ppb_nonstok_blm_app_manager > 0) { ?>
                        <a href="listppb.php?pr=2" class="dropdown-item" style="font-size: 14px;" data-toggle="tooltip"
                            data-placement="bottom"
                            title="<?php echo $tot_ppb_nonstok_blm_app_manager; ?> dok. PPB Non Stok Belum Persetujuan">
                            <i
                                class="fas fa-file-powerpoint"></i>&nbsp;&nbsp;<?php echo $tot_ppb_nonstok_blm_app_manager; ?>
                            dok. PPB Non Stok Belum Persetujuan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>

                        <?php if ($tot_ppb_investasi_blm_app_manager > 0) { ?>
                        <a href="listppb.php?pr=3" class="dropdown-item" style="font-size: 14px;" data-toggle="tooltip"
                            data-placement="bottom"
                            title="<?php echo $tot_ppb_investasi_blm_app_manager; ?> dok. PPB Investasi Belum Persetujuan">
                            <i
                                class="fas fa-file-powerpoint"></i>&nbsp;&nbsp;<?php echo $tot_ppb_investasi_blm_app_manager; ?>
                            dok. PPB Investasi Belum Persetujuan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>

                        <?php if ($tot_ppb_sparepart_blm_app_manager > 0) { ?>
                        <a href="listppb.php?pr=4" class="dropdown-item" style="font-size: 14px;" data-toggle="tooltip"
                            data-placement="bottom"
                            title="<?php echo $tot_ppb_sparepart_blm_app_manager; ?> dok. PPB Sparepart Belum Persetujuan">
                            <i
                                class="fas fa-file-powerpoint"></i>&nbsp;&nbsp;<?php echo $tot_ppb_sparepart_blm_app_manager; ?>
                            dok. PPB Sparepart Belum Persetujuan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>

                        <?php if ($tot_po_blm_app_manager > 0) { ?>
                        <a href="listpophpb.php?op=6" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_po_blm_app_manager; ?> dok. OP/PHPB Belum Persetujuan">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_po_blm_app_manager; ?> dok.
                            OP/PHPB Belum Persetujuan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>

                        <?php if ($tot_ppb_blm_app_ang > 0) { ?>
                        <a href="listppb.php?pr=5" class="dropdown-item" style="font-size: 14px;" data-toggle="tooltip"
                            data-placement="bottom"
                            title="<?php echo $tot_ppb_blm_app_ang; ?> dok. PPB Belum Persetujuan Anggaran">
                            <i class="fas fa-tasks"></i>&nbsp;&nbsp;<?php echo $tot_ppb_blm_app_ang; ?> dok. PPB Belum
                            Persetujuan Anggaran</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>

                        <?php if ($tot_ppb_blm_app_keu > 0) { ?>
                        <a href="listppb.php?pr=6" class="dropdown-item" style="font-size: 14px;" data-toggle="tooltip"
                            data-placement="bottom"
                            title="<?php echo $tot_ppb_blm_app_ang; ?> dok. PPB Belum Persetujuan Keuangan">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_ppb_blm_app_keu; ?> dok. PPB
                            Belum Persetujuan Keuangan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>

                        <?php if ($tot_ppb_blm_app_daan > 0) { ?>
                        <a href="listppb.php?pr=7" class="dropdown-item" style="font-size: 14px;" data-toggle="tooltip"
                            data-placement="bottom"
                            title="<?php echo $tot_ppb_blm_app_daan; ?> dok. PPB Belum Persetujuan Pengadaan">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_ppb_blm_app_daan; ?> dok. PPB
                            Belum Persetujuan Pengadaan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>

                        <?php if ($tot_po_blm_app > 0) { ?>
                        <a href="listpophpb.php?op=6" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_po_blm_app; ?> dok. OP/PHPB Belum Persetujuan">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_po_blm_app; ?> dok. OP/PHPB
                            Belum Persetujuan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_postok_blm_review > 0) { ?>
                        <a href="listpophpb.php?op=1" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_postok_blm_review; ?> dok. OP Stok Belum Review">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_postok_blm_review; ?> dok. OP
                            Stok Belum Review</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_postok_blm_app1 > 0) { ?>
                        <a href="listpophpb.php?op=1" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_postok_blm_app1; ?> dok. OP Stok Belum Diperiksa">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_postok_blm_app1; ?> dok. OP
                            Stok Belum Diperiksa</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_postok_blm_app > 0) { ?>
                        <a href="listpophpb.php?op=6" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_postok_blm_app; ?> dok. OP Stok Belum Persetujuan">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_postok_blm_app; ?> dok. OP Stok
                            Belum Persetujuan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>

                        <?php if ($tot_pons_blm_review > 0) { ?>
                        <a href="listpophpb.php?op=3" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_pons_blm_review; ?> dok. OP Non Stok Belum Review">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_pons_blm_review; ?> dok. OP Non
                            Stok Belum Review</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_pons_blm_app1 > 0) { ?>
                        <a href="listpophpb.php?op=3" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_pons_blm_app1; ?> dok. OP Non Stok Belum Diperiksa">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_pons_blm_app1; ?> dok. OP Non
                            Stok Belum Diperiksa</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_pons_blm_app > 0) { ?>
                        <a href="listpophpb.php?op=6" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_pons_blm_app; ?> dok. OP Non Stok Belum Persetujuan">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_pons_blm_app; ?> dok. OP Non
                            Stok Belum Persetujuan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>

                        <?php if ($tot_phpb_blm_review > 0) { ?>
                        <a href="listpophpb.php?op=2" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_phpb_blm_review; ?> dok. PHPB Belum Review">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_phpb_blm_review; ?> dok. PHPB
                            Belum Review</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_phpb_blm_app1 > 0) { ?>
                        <a href="listpophpb.php?op=2" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_phpb_blm_app1; ?> dok. PHPB Belum Diperiksa">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_phpb_blm_app1; ?> dok. PHPB
                            Belum Review</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_phpb_blm_app > 0) { ?>
                        <a href="listpophpb.php?op=6" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_phpb_blm_app; ?> dok. PHPB Belum Persetujuan">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_phpb_blm_app; ?> dok. PHPB
                            Belum Persetujuan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_pospr_blm_review > 0) { ?>
                        <a href="listpophpb.php?op=4" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_pospr_blm_review; ?> dok. OP Sparepart Belum Review">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_pospr_blm_review; ?> dok. OP
                            Sparepart Belum Review</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_pospr_blm_app1 > 0) { ?>
                        <a href="listpophpb.php?op=4" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_pospr_blm_app1; ?> dok. OP Sparepart Belum Diperiksa">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_pospr_blm_app1; ?> dok. OP
                            Sparepart Belum Diperiksa</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_pospr_blm_app > 0) { ?>
                        <a href="listpophpb.php?op=6" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_pospr_blm_app; ?> dok. OP Sparepart Belum Persetujuan">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_pospr_blm_app; ?> dok. OP
                            Sparepart Belum Persetujuan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_poinv_blm_review > 0) { ?>
                        <a href="listpophpb.php?op=5" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_poinv_blm_review; ?> dok. OP Investasi Belum Review">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_poinv_blm_review; ?> dok. OP
                            Investasi Belum Review</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_poinv_blm_app1 > 0) { ?>
                        <a href="listpophpb.php?op=5" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_poinv_blm_app1; ?> dok. OP Investasi Belum Diperiksa">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_poinv_blm_app1; ?> dok. OP
                            Investasi Belum Diperiksa</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_poinv_blm_app > 0) { ?>
                        <a href="listpophpb.php?op=6" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_poinv_blm_app; ?> dok. OP Investasi Belum Persetujuan">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_poinv_blm_app; ?> dok. OP
                            Investasi Belum Persetujuan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>

                        <?php if ($tot_bd_blm_app > 0) { ?>
                        <a href="listbd.php?st=230039" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_bd_blm_app; ?> dok. BD Belum Persetujuan">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_bd_blm_app; ?> dok. BD Belum
                            Persetujuan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_btbstok_blm_review > 0) { ?>
                        <a href="listbtb.php?op=1&st=230039" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_btbstok_blm_review; ?> dok. BTB Stok Belum Review">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_btbstok_blm_review; ?> dok. BTB
                            Stok Belum Review</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_btbstok_blm_app > 0) { ?>
                        <a href="listbtb.php?op=1&st=230459" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_btbstok_blm_app; ?> dok. BTB Stok Belum Persetujuan">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_btbstok_blm_app; ?> dok. BTB
                            Stok Belum Persetujuan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_btbpart_blm_review > 0) { ?>
                        <a href="listbtb.php?op=4&st=230039" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_btbpart_blm_review; ?> dok. BTB Sparepart Belum Review">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_btbpart_blm_review; ?> dok. BTB
                            Sparepart Belum Review</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_btbpart_blm_app > 0) { ?>
                        <a href="listbtb.php?op=4&st=230459" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_btbpart_blm_app; ?> dok. BTB Sparepart Belum Persetujuan">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_btbpart_blm_app; ?> dok. BTB
                            Sparepart Belum Persetujuan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_btbns_blm_review > 0) { ?>
                        <a href="listbtb.php?op=2,3&st=230039" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_btbns_blm_review; ?> dok. BTB NS Belum Review">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_btbns_blm_review; ?> dok. BTB
                            NS Belum Review</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_btbns_blm_app > 0) { ?>
                        <a href="listbtb.php?op=2,3&st=230459" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_btbns_blm_app; ?> dok. BTB NS Belum Persetujuan Gudang">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_btbns_blm_app; ?> dok. BTB NS
                            Belum Persetujuan Gudang</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_btbns_blm_user > 0) { ?>
                        <a href="listbtb.php?op=2,3&st=230227" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_btbns_blm_user; ?> dok. BTB NS Belum Persetujuan Peminta">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_btbns_blm_user; ?> dok. BTB NS
                            Belum Persetujuan Peminta</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_btbinves_blm_review > 0) { ?>
                        <a href="listbtb.php?op=5&st=230039" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_btbinves_blm_review; ?> dok. BTB Investasi Belum Review">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_btbinves_blm_review; ?> dok.
                            BTB Investasi Belum Review </a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_btbinves_blm_app > 0) { ?>
                        <a href="listbtb.php?op=5&st=230459" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_btbinves_blm_app; ?> dok. BTB Investasi Belum Persetujuan Gudang">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_btbinves_blm_app; ?> dok. BTB
                            Investasi Blm Persetujuan Gudang</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_btbinves_blm_user > 0) { ?>
                        <a href="listbtb.php?op=5&&st=230227" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_btbinves_blm_user; ?> dok. BTB Investasi Belum Persetujuan Peminta">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_btbinves_blm_user; ?> dok. BTB
                            Investasi Blm Persetujuan Peminta</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_bonbarang_blm_app > 0) { ?>
                        <a href="listbonbarang.php?tipe=bb&st=230039" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_bonbarang_blm_app; ?> dok. Bon Barang Belum Approve">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_bonbarang_blm_app; ?> dok. Bon
                            Barang
                            Belum Approve</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_bonproduk_blm_app > 0) { ?>
                        <a href="listbonbarang.php?tipe=bp&st=230039" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_bonproduk_blm_app; ?> dok. Bon Produk Belum Approve">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_bonproduk_blm_app; ?> dok. Bon
                            Produk
                            Belum Approve</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_realprom_rutin_draft > 0) { ?>
                        <a href="listrealisasipromosi.php?trp=1&not=1" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_realprom_rutin_draft; ?> dok. Realisasi Promosi Rutin Belum Pengajuan">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_realprom_rutin_draft; ?> dok.
                            Realisasi Promosi Rutin Belum Pengajuan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_realprom_rutin_review > 0) { ?>
                        <a href="listrealisasipromosi.php?trp=1&not=2" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_realprom_rutin_review; ?> dok. Realisasi Promosi Rutin Belum Review">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_realprom_rutin_review; ?> dok.
                            Realisasi Promosi Rutin Belum Review</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_realprom_rutin_persetujuan > 0) { ?>
                        <a href="listrealisasipromosi.php?trp=1&not=3" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_realprom_rutin_persetujuan; ?> dok. Realisasi Promosi Rutin Belum Persetujuan">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_realprom_rutin_persetujuan; ?>
                            dok. Realisasi Promosi Rutin Belum Persetujuan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>

                        <?php if ($tot_realprom_non_rutin_draft > 0) { ?>
                        <a href="listrealisasipromosi.php?trp=2&not=1" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_realprom_non_rutin_draft; ?> dok. Realisasi Promosi Non Rutin Belum Pengajuan">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_realprom_non_rutin_draft; ?>
                            dok. Realisasi Promosi Non Rutin Belum Pengajuan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_realprom_non_rutin_review > 0) { ?>
                        <a href="listrealisasipromosi.php?trp=2&not=2" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_realprom_non_rutin_review; ?> dok. Realisasi Promosi Non Rutin Belum Review">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_realprom_non_rutin_review; ?>
                            dok. Realisasi Promosi Non Rutin Belum Review</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_realprom_non_rutin_persetujuan > 0) { ?>
                        <a href="listrealisasipromosi.php?trp=2&not=3" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_realprom_non_rutin_persetujuan; ?> dok. Realisasi Promosi Non Rutin Belum Persetujuan">
                            <i
                                class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_realprom_non_rutin_persetujuan; ?>
                            dok. Realisasi Promosi Non Rutin Belum Persetujuan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_pjp_blm_app_atasan_peminta > 0) { ?>
                        <a href="listpjp.php?not=1" class="dropdown-item" style="font-size: 14px;" data-toggle="tooltip"
                            data-placement="bottom"
                            title="<?php echo $tot_pjp_blm_app_atasan_peminta; ?> dok. PJP Belum Persetujuan Atasan Peminta">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_pjp_blm_app_atasan_peminta; ?>
                            dok. PJP Blm Persetujuan Atasan Peminta</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_pjp_blm_app_manager > 0) { ?>
                        <a href="listpjp.php?not=1" class="dropdown-item" style="font-size: 14px;" data-toggle="tooltip"
                            data-placement="bottom"
                            title="<?php echo $tot_pjp_blm_app_manager; ?> dok. PJP Belum Persetujuan Atasan Peminta">
                            <i class="fas fa-user-check"></i>&nbsp;&nbsp;<?php echo $tot_pjp_blm_app_manager; ?> dok.
                            PJP Blm Persetujuan Atasan Peminta</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_perbaikanpjpti_blm_app_disiapkan > 0) { ?>
                        <a href="listpjpperbaikan.php?pl=2&not=1" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_perbaikanpjpti_blm_app_disiapkan; ?> dok. Perbaikan PJP (TI) Belum Persetujuan PIC Perbaikan">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_perbaikanpjpti_blm_app_disiapkan; ?>
                            dok. Perbaikan PJP (TI) Belum Persetujuan PIC Perbaikan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_perbaikanpjpti_blm_app_diperiksa > 0) { ?>
                        <a href="listpjpperbaikan.php?pl=2&not=2" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_perbaikanpjpti_blm_app_diperiksa; ?> dok. Perbaikan PJP (TI) Belum Persetujuan Atasan PIC Perbaikan">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_perbaikanpjpti_blm_app_diperiksa; ?>
                            dok. Perbaikan PJP (TI) Belum Persetujuan Atasan PIC Perbaikan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_perbaikanpjpti_blm_app_disetujui > 0) { ?>
                        <a href="listpjpperbaikan.php?pl=2&not=4" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_perbaikanpjpti_blm_app_disetujui; ?> dok. Perbaikan PJP (TI) Belum Persetujuan Kadep Pengelola">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_perbaikanpjpti_blm_app_disetujui; ?>
                            dok. Perbaikan PJP (TI) Belum Persetujuan Kadep Pengelola</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_perbaikanpjpti_blm_app_diterima > 0) { ?>
                        <a href="listpjpperbaikan.php?pl=2&not=3" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_perbaikanpjpti_blm_app_diterima; ?> dok. Perbaikan PJP (TI) Belum Persetujuan Peminta">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_perbaikanpjpti_blm_app_diterima; ?>
                            dok. Perbaikan PJP (TI) Belum Persetujuan Peminta</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_perbaikanpjphar_blm_app_disiapkan > 0) { ?>
                        <a href="listpjpperbaikan.php?pl=1&not=1" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_perbaikanpjphar_blm_app_disiapkan; ?> dok. Perbaikan PJP (Hartek) Belum Persetujuan PIC Perbaikan">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_perbaikanpjphar_blm_app_disiapkan; ?>
                            dok. Perbaikan PJP (Hartek) Belum Persetujuan PIC Perbaikan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_perbaikanpjphar_blm_app_diperiksa > 0) { ?>
                        <a href="listpjpperbaikan.php?pl=1&not=2" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_perbaikanpjphar_blm_app_diperiksa; ?> dok. Perbaikan PJP (Hartek) Belum Persetujuan Atasan PIC Perbaikan">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_perbaikanpjphar_blm_app_diperiksa; ?>
                            dok. Perbaikan PJP (Hartek) Belum Persetujuan Atasan PIC Perbaikan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_perbaikanpjphar_blm_app_disetujui > 0) { ?>
                        <a href="listpjpperbaikan.php?pl=1&not=4" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_perbaikanpjphar_blm_app_disetujui; ?> dok. Perbaikan PJP (Hartek) Belum Persetujuan Kadep Pengelola">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_perbaikanpjphar_blm_app_disetujui; ?>
                            dok. Perbaikan PJP (Hartek) Belum Persetujuan Kadep Pengelola</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_perbaikanpjphar_blm_app_diterima > 0) { ?>
                        <a href="listpjpperbaikan.php?pl=1&not=3" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_perbaikanpjphar_blm_app_diterima; ?> dok. Perbaikan PJP (Hartek) Belum Persetujuan Peminta">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_perbaikanpjphar_blm_app_diterima; ?>
                            dok. Perbaikan PJP (Hartek) Belum Persetujuan Peminta</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_perbaikanpjpumm_blm_app_disiapkan > 0) { ?>
                        <a href="listpjpperbaikan.php?pl=3&not=1" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_perbaikanpjpumm_blm_app_disiapkan; ?> dok. Perbaikan PJP (Umum) Belum Persetujuan PIC Perbaikan">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_perbaikanpjpumm_blm_app_disiapkan; ?>
                            dok. Perbaikan PJP (Umum) Belum Persetujuan PIC Perbaikan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_perbaikanpjpumm_blm_app_diperiksa > 0) { ?>
                        <a href="listpjpperbaikan.php?pl=3&not=2" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_perbaikanpjpumm_blm_app_diperiksa; ?> dok. Perbaikan PJP (Umum) Belum Persetujuan Atasan PIC Perbaikan">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_perbaikanpjpumm_blm_app_diperiksa; ?>
                            dok. Perbaikan PJP (Umum) Belum Persetujuan Atasan PIC Perbaikan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_perbaikanpjpumm_blm_app_disetujui > 0) { ?>
                        <a href="listpjpperbaikan.php?pl=3&not=4" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_perbaikanpjpumm_blm_app_disetujui; ?> dok. Perbaikan PJP (Hartek) Belum Persetujuan Kadep Pengelola">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_perbaikanpjpumm_blm_app_disetujui; ?>
                            dok. Perbaikan PJP (Umum) Belum Persetujuan Kadep Pengelola</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_perbaikanpjpumm_blm_app_diterima > 0) { ?>
                        <a href="listpjpperbaikan.php?pl=3&not=3" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_perbaikanpjpumm_blm_app_diterima; ?> dok. Perbaikan PJP (Hartek) Belum Persetujuan Peminta">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_perbaikanpjpumm_blm_app_diterima; ?>
                            dok. Perbaikan PJP (Umum) Belum Persetujuan Peminta</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_pj_real_ti_blm_app_diperiksa > 0) { ?>
                        <a href="listpjprealisasibiaya.php?pl=2&not=1" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_pj_real_ti_blm_app_diperiksa; ?> dok. Pertanggungjawaban biaya PJP (TI) Belum Persetujuan PIC Pengelola ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_pj_real_ti_blm_app_diperiksa; ?>
                            dok. Pertanggungjawaban biaya PJP (TI) Belum Persetujuan PIC Pengelola</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_pj_real_ti_blm_app_disetujui_pengelola > 0) { ?>
                        <a href="listpjprealisasibiaya.php?pl=2&not=2" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_pj_real_ti_blm_app_disetujui_pengelola; ?> dok. Pertanggungjawaban biaya PJP (TI) Belum Persetujuan Kadep Pengelola ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_pj_real_ti_blm_app_disetujui_pengelola; ?>
                            dok. Pertanggungjawaban biaya PJP (TI) Belum Persetujuan Kadep Pengelola</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_pj_real_ti_blm_app_check_daan > 0) { ?>
                        <a href="listpjprealisasibiaya.php?pl=2&not=3" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_pj_real_ti_blm_app_check_daan; ?> dok. Pertanggungjawaban biaya PJP (TI) Belum Persetujuan Staf Pengadaan ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_pj_real_ti_blm_app_check_daan; ?>
                            dok. Pertanggungjawaban biaya PJP (TI) Belum Persetujuan Staf Pengadaan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_pj_real_ti_blm_app_review_daan > 0) { ?>
                        <a href="listpjprealisasibiaya.php?pl=2&not=4" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_pj_real_ti_blm_app_review_daan; ?> dok. Pertanggungjawaban biaya PJP (TI) Belum Persetujuan Kabag Pengadaan ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_pj_real_ti_blm_app_review_daan; ?>
                            dok. Pertanggungjawaban biaya PJP (TI) Belum Persetujuan Kabag Pengadaan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_pj_real_ti_blm_app_kadep_daan > 0) { ?>
                        <a href="listpjprealisasibiaya.php?pl=2&not=5" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_pj_real_ti_blm_app_kadep_daan; ?> dok. Pertanggungjawaban biaya PJP (TI) Belum Persetujuan Kadep Pengadaan ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_pj_real_ti_blm_app_kadep_daan; ?>
                            dok. Pertanggungjawaban biaya PJP (TI) Belum Persetujuan Kadep Pengadaan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_pj_real_har_blm_app_diperiksa > 0) { ?>
                        <a href="listpjprealisasibiaya.php?pl=1&not=1" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_pj_real_har_blm_app_diperiksa; ?> dok. Pertanggungjawaban biaya PJP (HARTEK) Belum Persetujuan PIC Pengelola ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_pj_real_har_blm_app_diperiksa; ?>
                            dok. Pertanggungjawaban biaya PJP (HARTEK) Belum Persetujuan PIC Pengelola</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_pj_real_har_blm_app_disetujui_pengelola > 0) { ?>
                        <a href="listpjprealisasibiaya.php?pl=1&not=2" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_pj_real_har_blm_app_disetujui_pengelola; ?> dok. Pertanggungjawaban biaya PJP (HARTEK) Belum Persetujuan Kadep Pengelola ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_pj_real_har_blm_app_disetujui_pengelola; ?>
                            dok. Pertanggungjawaban biaya PJP (HARTEK) Belum Persetujuan Kadep Pengelola</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_pj_real_har_blm_app_check_daan > 0) { ?>
                        <a href="listpjprealisasibiaya.php?pl=1&not=3" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_pj_real_har_blm_app_check_daan; ?> dok. Pertanggungjawaban biaya PJP (HARTEK) Belum Persetujuan Staf Pengadaan ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_pj_real_har_blm_app_check_daan; ?>
                            dok. Pertanggungjawaban biaya PJP (HARTEK) Belum Persetujuan Staf Pengadaan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_pj_real_har_blm_app_review_daan > 0) { ?>
                        <a href="listpjprealisasibiaya.php?pl=1&not=4" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_pj_real_har_blm_app_review_daan; ?> dok. Pertanggungjawaban biaya PJP (HARTEK) Belum Persetujuan Kabag Pengadaan ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_pj_real_har_blm_app_review_daan; ?>
                            dok. Pertanggungjawaban biaya PJP (HARTEK) Belum Persetujuan Kabag Pengadaan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_pj_real_har_blm_app_kadep_daan > 0) { ?>
                        <a href="listpjprealisasibiaya.php?pl=1&not=5" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_pj_real_har_blm_app_kadep_daan; ?> dok. Pertanggungjawaban biaya PJP (HARTEK) Belum Persetujuan Kadep Pengadaan ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_pj_real_har_blm_app_kadep_daan; ?>
                            dok. Pertanggungjawaban biaya PJP (HARTEK) Belum Persetujuan Kadep Pengadaan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_pj_real_umm_blm_app_diperiksa > 0) { ?>
                        <a href="listpjprealisasibiaya.php?pl=3&not=1" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_pj_real_umm_blm_app_diperiksa; ?> dok. Pertanggungjawaban biaya PJP (UMUM) Belum Persetujuan PIC Pengelola ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_pj_real_umm_blm_app_diperiksa; ?>
                            dok. Pertanggungjawaban biaya PJP (UMUM) Belum Persetujuan PIC Pengelola</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_pj_real_umm_blm_app_disetujui_pengelola > 0) { ?>
                        <a href="listpjprealisasibiaya.php?pl=3&not=2" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_pj_real_umm_blm_app_disetujui_pengelola; ?> dok. Pertanggungjawaban biaya PJP (UMUM) Belum Persetujuan Kadep Pengelola ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_pj_real_umm_blm_app_disetujui_pengelola; ?>
                            dok. Pertanggungjawaban biaya PJP (UMUM) Belum Persetujuan Kadep Pengelola</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_pj_real_umm_blm_app_check_daan > 0) { ?>
                        <a href="listpjprealisasibiaya.php?pl=3&not=3" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_pj_real_umm_blm_app_check_daan; ?> dok. Pertanggungjawaban biaya PJP (UMUM) Belum Persetujuan Staf Pengadaan ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_pj_real_umm_blm_app_check_daan; ?>
                            dok. Pertanggungjawaban biaya PJP (UMUM) Belum Persetujuan Staf Pengadaan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_pj_real_umm_blm_app_review_daan > 0) { ?>
                        <a href="listpjprealisasibiaya.php?pl=3&not=4" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_pj_real_umm_blm_app_review_daan; ?> dok. Pertanggungjawaban biaya PJP (UMUM) Belum Persetujuan Kabag Pengadaan ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_pj_real_umm_blm_app_review_daan; ?>
                            dok. Pertanggungjawaban biaya PJP (UMUM) Belum Persetujuan Kabag Pengadaan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_pj_real_umm_blm_app_kadep_daan > 0) { ?>
                        <a href="listpjprealisasibiaya.php?pl=3&not=5" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_pj_real_umm_blm_app_kadep_daan; ?> dok. Pertanggungjawaban biaya PJP (UMUM) Belum Persetujuan Kadep Pengadaan ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_pj_real_umm_blm_app_kadep_daan; ?>
                            dok. Pertanggungjawaban biaya PJP (UMUM) Belum Persetujuan Kadep Pengadaan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_spkti_blm_app_diperiksa > 0) { ?>
                        <a href="listspk.php?pl=2&not=1" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_spkti_blm_app_diperiksa; ?> dok. SPK (TI) Belum Persetujuan PIC Pengelola ">
                            <i class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_spkti_blm_app_diperiksa; ?>
                            dok. SPK (TI) Belum Persetujuan PIC Pengelola</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_spkti_blm_app_disetujui > 0) { ?>
                        <a href="listspk.php?pl=2&not=2" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_spkti_blm_app_disetujui; ?> dok. SPK (TI) Belum Persetujuan Kadep Pengelola ">
                            <i class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_spkti_blm_app_disetujui; ?>
                            dok. SPK (TI) Belum Persetujuan Kadep Pengelola</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_spkhar_blm_app_diperiksa > 0) { ?>
                        <a href="listspk.php?pl=1&not=1" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_spkhar_blm_app_diperiksa; ?> dok. SPK (HARTEK) Belum Persetujuan PIC Pengelola ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_spkhar_blm_app_diperiksa; ?>
                            dok. SPK (HARTEK) Belum Persetujuan PIC Pengelola</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_spkhar_blm_app_disetujui > 0) { ?>
                        <a href="listspk.php?pl=1&not=2" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_spkhar_blm_app_disetujui; ?> dok. SPK (HARTEK) Belum Persetujuan Kadep Pengelola ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_spkhar_blm_app_disetujui; ?>
                            dok. SPK (HARTEK) Belum Persetujuan Kadep Pengelola</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_spkumm_blm_app_diperiksa > 0) { ?>
                        <a href="listspk.php?pl=3&not=1" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_spkumm_blm_app_diperiksa; ?> dok. SPK (UMUM) Belum Persetujuan PIC Pengelola ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_spkumm_blm_app_diperiksa; ?>
                            dok. SPK (UMUM) Belum Persetujuan PIC Pengelola</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_spkumm_blm_app_disetujui > 0) { ?>
                        <a href="listspk.php?pl=3&not=2" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_spkumm_blm_app_disetujui; ?> dok. SPK (UMUM) Belum Persetujuan Kadep Pengelola ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_spkumm_blm_app_disetujui; ?>
                            dok. SPK (UMUM) Belum Persetujuan Kadep Pengelola</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_app_nota_retur_penjualan_persetujuan > 0) { ?>
                        <a href="listnotareturpenjualan.php?stn=1" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_app_nota_retur_penjualan_persetujuan; ?> dok. SPK (UMUM) Belum Persetujuan Kadep Pengelola ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_app_nota_retur_penjualan_persetujuan; ?>
                            dok. Nota Retur Penjualan Belum Approve Persetujuan</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_kontrak_distributor_review > 0) { ?>
                        <a href="listkontrakdistributor.php?stn=1" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_kontrak_distributor_review; ?> dok. Kontrak Distributor Belum di Review ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_kontrak_distributor_review; ?>
                            dok. Kontrak Distributor Belum di Review</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_kontrak_distributor_appsm > 0) { ?>
                        <a href="listkontrakdistributor.php?stn=2" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_kontrak_distributor_appsm; ?> dok. Kontrak Distributor Belum Approved SM ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_kontrak_distributor_appsm; ?>
                            dok. Kontrak Distributor Belum Approved SM</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_kontrak_distributor_applegal > 0) { ?>
                        <a href="listkontrakdistributor.php?stn=3" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_kontrak_distributor_applegal; ?> dok. Adendum Kontrak Distributor Belum Approved Legal ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_kontrak_distributor_applegal; ?>
                            dok. Adendum Kontrak Distributor Belum Approved Legal</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_kontrak_distributor_approved > 0) { ?>
                        <a href="listkontrakdistributor.php?stn=4" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_kontrak_distributor_approved; ?> dok. Adendum Kontrak Distributor Belum Approved Direksi ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_kontrak_distributor_approved; ?>
                            dok. Adendum Kontrak Distributor Belum Approved Direksi</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>

                        <?php if ($tot_add_kontrak_distributor_review > 0) { ?>
                        <a href="listadendumkontrakdistributor.php?stn=1" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_add_kontrak_distributor_review; ?> dok. Adendum Kontrak Distributor Belum di Review ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_add_kontrak_distributor_review; ?>
                            dok. Adendum Kontrak Distributor Belum di Review</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_add_kontrak_distributor_appsm > 0) { ?>
                        <a href="listadendumkontrakdistributor.php?stn=2" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_add_kontrak_distributor_appsm; ?> dok. Adendum Kontrak Distributor Belum Approved SM ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_add_kontrak_distributor_appsm; ?>
                            dok. Adendum Kontrak Distributor Belum Approved SM</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_add_kontrak_distributor_applegal > 0) { ?>
                        <a href="listadendumkontrakdistributor.php?stn=3" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_add_kontrak_distributor_applegal; ?> dok. Adendum Kontrak Distributor Belum Approved Legal ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_add_kontrak_distributor_applegal; ?>
                            dok. Adendum Kontrak Distributor Belum Approved Legal</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <?php if ($tot_add_kontrak_distributor_approved > 0) { ?>
                        <a href="listadendumkontrakdistributor.php?stn=4" class="dropdown-item" style="font-size: 14px;"
                            data-toggle="tooltip" data-placement="bottom"
                            title="<?php echo $tot_add_kontrak_distributor_approved; ?> dok. Adendum Kontrak Distributor Belum Approved Direksi ">
                            <i
                                class="far fa-calendar-check"></i>&nbsp;&nbsp;<?php echo $tot_add_kontrak_distributor_approved; ?>
                            dok. Adendum Kontrak Distributor Belum Approved Direksi</a>
                        <div class="dropdown-divider"></div>
                        <?php } ?>
                        <!-- <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> -->
                    </div>

                </li>


                <!-- Logout Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user-lock"></i>

                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <br>
                        <!-- <div class="dropdown-divider"></div> -->
                        <a href="change_password.php" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <i class="fas fa-passport"></i>
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        <p>Change Password</p>
                                    </h3>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <br>
                        <div class="dropdown-divider"></div>
                        <!-- <a href="#" class="dropdown-item"> -->
                        <!-- Message Start -->
                        <!-- <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div> -->
                        <!-- Message End -->
                        <!-- </a> -->
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">Logout</a>
                    </div>
                </li>
                <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-warning elevation-4">
            <!-- Brand Logo -->
            <a href="home.php" class="brand-link navbar-success">
                <img src="images/bg_logosmall_h3.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: 30">
                <span class="brand-text font-weight-dark">
                    <h style="color:white;">PeKaBiss</h>
                </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <!-- <div class="image">
          <img src="" class="img-circle elevation-2" alt="User Image">
        </div> -->
                    <div class="info">
                        <a href="#" class="d-block">
                            <? php//echo $_SESSION['pkb_nama_user']; ?>
                        </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent text-sm" data-widget="treeview"
                        role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview">
                            <a href="home.php" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    HOME
                                    <!-- <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span> -->
                                </p>
                            </a>
                        </li>


                        <!-- <li class="nav-item has-treeview <?php if ($grupmenuaktif == "dashboard") {
              echo "menu-open";
            } else {
              echo "";
            } ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  DASHBOARD
                  <i class="right fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="dashboardpenjualan.php" class="nav-link <?php if ($menuaktif == "penjualan") {
                    echo "active";
                  } else {
                    echo "";
                  } ?>">
                    <i class="fas fa-chart-pie"></i>
                    <p>Penjualan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="dashboardpenjualanregional.php" class="nav-link <?php if ($menuaktif == "penjualan regional") {
                    echo "active";
                  } else {
                    echo "";
                  } ?>">
                    <i class="fas fa-chart-pie"></i>
                    <p>Penjualan Regional</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="dashboardinvproduk.php" class="nav-link <?php if ($menuaktif == "inventory produk") {
                    echo "active";
                  } else {
                    echo "";
                  } ?>">
                    <i class="fas fa-chart-pie"></i>
                    <p>Inventory Produk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="dashboardkeuangan.php" class="nav-link <?php if ($menuaktif == "keuangan") {
                    echo "active";
                  } else {
                    echo "";
                  } ?>">
                    <i class="fas fa-chart-pie"></i>
                    <p>Keuangan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="dashboardpengadaan.php" class="nav-link <?php if ($menuaktif == "pengadaan") {
                    echo "active";
                  } else {
                    echo "";
                  } ?>">
                    <i class="fas fa-chart-pie"></i>
                    <p>Pengadaan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="dashboardinvmaterial.php" class="nav-link <?php if ($menuaktif == "inventory material") {
                    echo "active";
                  } else {
                    echo "";
                  } ?>">
                    <i class="fas fa-chart-pie"></i>
                    <p>Inventory Material</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="dashboardproduksi.php" class="nav-link <?php if ($menuaktif == "produksi") {
                    echo "active";
                  } else {
                    echo "";
                  } ?>">
                    <i class="fas fa-chart-pie"></i>
                    <p>Produksi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="dashboardsdm.php" class="nav-link <?php if ($menuaktif == "sdm") {
                    echo "active";
                  } else {
                    echo "";
                  } ?>">
                    <i class="fas fa-chart-pie"></i>
                    <p>SDM</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="dashboardquality.php" class="nav-link <?php if ($menuaktif == "quality") {
                    echo "active";
                  } else {
                    echo "";
                  } ?>">
                    <i class="fas fa-chart-pie"></i>
                    <p>Quality</p>
                  </a>
                </li>
              </ul>
            </li> -->

                        <!-- menu master -->
                        <!-- <li class="nav-item has-treeview <?php if ($grupmenuaktif == "penjualan") {
              echo "menu-open";
            } else {
              echo "";
            } ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-truck-moving"></i>
                <p> PENJUALAN
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right"></span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="listdatacustomer.php" class="nav-link <?php if ($menuaktif == "profil customer") {
                    echo "active";
                  } else {
                    echo "";
                  } ?>">
                    <i class="fas fa-arrows-alt"></i>
                    <p>Profil Customer</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="listretailkios.php" class="nav-link <?php if ($menuaktif == "master retail") {
                    echo "active";
                  } else {
                    echo "";
                  } ?>">
                    <i class="fas fa-arrows-alt"></i>
                    <p>Retail (Kios)</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="listinquirystokproduk.php" class="nav-link <?php if ($menuaktif == "inquiry stok produk") {
                    echo "active";
                  } else {
                    echo "";
                  } ?>">
                    <i class="fas fa-arrows-alt"></i>
                    <p>Inquiry Stok Produk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="listtargetomzet.php" class="nav-link  <?php if ($menuaktif == "target omzet") {
                    echo "active";
                  } else {
                    echo "";
                  } ?>">
                    <i class="fas fa-arrows-alt"></i>
                    <p>Target Omzet</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="listnotareturpenjualan.php" class="nav-link  <?php if ($menuaktif == "Nota Retur Penjualan") {
                    echo "active";
                  } else {
                    echo "";
                  } ?>">
                    <i class="fas fa-arrows-alt"></i>
                    <p>Nota Retur Penjualan</p>
                  </a>
                </li>
                <li class="nav-item has-treeview  <?php if ($subgrupmenuaktif == "kontrakpenjualan") {
                  echo "menu-open";
                } else {
                  echo "";
                } ?>">
                  <a href="#" class="nav-link ">
                    <i class="fas fa-arrows-alt"></i>
                    <p>Kontrak Penjualan
                      <i class="fas fa-angle-left right"></i>
                      <span class="badge badge-info right"></span>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="listkontrakdistributor.php" class="nav-link  <?php if ($menuaktif == "Kontrak Distributor") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-chevron-circle-right"></i>
                        <p>Kontrak Distributor</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="listadendumkontrakdistributor.php" class="nav-link  <?php if ($menuaktif == "Adendum Kontrak Distributor") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-chevron-circle-right"></i>
                        <p>Adendum Kontrak Distributor</p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="listmonitoringkontrakdistributor.php" class="nav-link  <?php if ($menuaktif == "monitoringkontrakdistributor") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-chevron-circle-right"></i>
                        <p>Monitoring Kontrak Distributor</p>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item has-treeview  <?php if ($subgrupmenuaktif == "laporanpenjualan") {
                  echo "menu-open";
                } else {
                  echo "";
                } ?>">
                  <a href="#" class="nav-link ">
                    <i class="fas fa-arrows-alt"></i>
                    <p>Laporan Penjualan
                      <i class="fas fa-angle-left right"></i>
                      <span class="badge badge-info right"></span>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="listlaporanpenjualanperfaktur_report.php" class="nav-link <?php if ($menuaktif == "report penjualan perfaktur") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-chevron-circle-right"></i>
                        <p>Rekapitulasi Penjualan</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="listlaporanpenjualanperproduk_report.php" class="nav-link <?php if ($menuaktif == "report penjualan perproduk") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-chevron-circle-right"></i>
                        <p>Penjualan Produk</p>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item has-treeview  <?php if ($subgrupmenuaktif == "benih") {
                  echo "menu-open";
                } else {
                  echo "";
                } ?>">
                  <a href="#" class="nav-link ">
                    <i class="fas fa-arrows-alt"></i>
                    <p>Benih
                      <i class="fas fa-angle-left right"></i>
                      <span class="badge badge-info right"></span>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="listretailbenih.php?gp=1" class="nav-link <?php if ($menuaktif == "distributor benih") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-chevron-circle-right"></i>
                        <p>Distributor Benih</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="listretailbenih.php?gp=2" class="nav-link <?php if ($menuaktif == "retail benih") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-chevron-circle-right"></i>
                        <p>Retail (Kios) Benih</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="listinquirystokbenihretail.php" class="nav-link <?php if ($menuaktif == "inquiry benih retail") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-chevron-circle-right"></i>
                        <p>Inquiry Benih Retail</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="listmonitoringstokbenihretail.php" class="nav-link <?php if ($menuaktif == "monitoring benih") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-chevron-circle-right"></i>
                        <p>Monitoring Kadaluarsa</p>
                      </a>
                    </li>
                  </ul>
                </li>

              </ul>
            </li> -->

                        <!-- menu master -->
                        <!-- <li class="nav-item has-treeview <?php if ($grupmenuaktif == "pembelian") {
              echo "menu-open";
            } else {
              echo "";
            } ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p> PEMBELIAN
                  <i class="fas fa-angle-left right"></i>

                </p>
              </a>
              <ul class="nav nav-treeview ">
                <li class="nav-item">
                  <a href="dashboardpembelian.php" class="nav-link <?php if ($menuaktif == "dashboardpembelian") {
                    echo "active";
                  } else {
                    echo "";
                  } ?>">
                    <i class="fas fa-chart-pie"></i>
                    <p>Dashboard</p>
                  </a>
                </li>
                <li class="nav-item <?php if ($subgrupmenuaktif == "ppb") {
                  echo "menu-open";
                } else {
                  echo "";
                } ?>">
                  <a href="#" class="nav-link">
                    <i class="fas fa-cube"></i>
                    <p> PPB
                      <i class="fas fa-angle-left right"></i>
                      <span class="badge badge-info right"></span>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="listppb.php?pr=1" class="nav-link <?php if ($menuaktif == "ppbstock") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-dot-circle"></i>
                        <p>PPB Stock</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="listppb.php?pr=2" class="nav-link <?php if ($menuaktif == "ppbns") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-dot-circle"></i>
                        <p>PPB Non Stock</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="listppb.php?pr=3" class="nav-link <?php if ($menuaktif == "ppbinves") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-dot-circle"></i>
                        <p>PPB Investasi</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="listppb.php?pr=4" class="nav-link <?php if ($menuaktif == "ppbsparepart") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-dot-circle"></i>
                        <p>PPB Sparepart</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="listppb.php?pr=5" class="nav-link <?php if ($menuaktif == "ppbappanggaran") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-dot-circle"></i>
                        <p>PPB Review Anggaran</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="listppb.php?pr=6" class="nav-link <?php if ($menuaktif == "ppbappkeu") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-dot-circle"></i>
                        <p>PPB Persetujuan Keuntansi</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="listppb.php?pr=7" class="nav-link <?php if ($menuaktif == "ppbappdaan") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-dot-circle"></i>
                        <p>PPB Persetujuan Pengadaan</p>
                      </a>
                    </li>
                    <li class="nav-item <?php if ($subgrupmenuaktif == "laporanpembelian") {
                      echo "menu-open";
                    } else {
                      echo "";
                    } ?>">
                      <a href="#" class="nav-link">
                        <i class="fas fa-dot-circle"></i>
                        <p>Laporan PPB
                          <i class="fas fa-angle-left right"></i>
                          <span class="badge badge-info right"></span>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="laporan_realisasi_permintaan_pembelian.php" class="nav-link <?php if ($menuaktif == "laprealisasippb") {
                            echo "active";
                          } else {
                            echo "";
                          } ?>">
                            <i class="fas fa-list"></i>
                            <p>Laporan Realisasi PPB</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="laporan_rekapitulasi_item_permintaan_pembelian.php" class="nav-link <?php if ($menuaktif == "laprekapitulasippb") {
                            echo "active";
                          } else {
                            echo "";
                          } ?>">
                            <i class="fas fa-list"></i>
                            <p>Laporan Rekapitulasi PPB</p>
                          </a>
                        </li>

                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
              <ul class="nav nav-treeview ">
                <li class="nav-item <?php if ($subgrupmenuaktif == "pophpb") {
                  echo "menu-open";
                } else {
                  echo "";
                } ?>">
                  <a href="#" class="nav-link">
                    <i class="fas fa-cube"></i>
                    <p>OP/PHPB
                      <i class="fas fa-angle-left right"></i>
                      <span class="badge badge-info right"></span>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="listpophpb.php?op=2" class="nav-link <?php if ($menuaktif == "phpb") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-dot-circle"></i>
                        <p>PHPB</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="listpophpb.php?op=1" class="nav-link <?php if ($menuaktif == "postock") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-dot-circle"></i>
                        <p>OP Stok</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="listpophpb.php?op=3" class="nav-link <?php if ($menuaktif == "pons") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-dot-circle"></i>
                        <p>OP Non Stok</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="listpophpb.php?op=4" class="nav-link <?php if ($menuaktif == "posparepart") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-dot-circle"></i>
                        <p>OP Sparepart</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="listpophpb.php?op=5" class="nav-link <?php if ($menuaktif == "poinves") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-dot-circle"></i>
                        <p>OP Investasi</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="listpophpb.php?op=6" class="nav-link <?php if ($menuaktif == "pophpbblmapp") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-dot-circle"></i>
                        <p>OP/PHPB Belum persetujuan</p>
                      </a>
                    </li>
                    <li class="nav-item <?php if ($subgrupmenuaktif == "laporanpo") {
                      echo "menu-open";
                    } else {
                      echo "";
                    } ?>">
                      <a href="#" class="nav-link">
                        <i class="fas fa-dot-circle"></i>
                        <p>Laporan PO
                          <i class="fas fa-angle-left right"></i>
                          <span class="badge badge-info right"></span>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="laporan_realisasi_pembelian.php" class="nav-link <?php if ($menuaktif == "laprealisasipo") {
                            echo "active";
                          } else {
                            echo "";
                          } ?>">
                            <i class="fas fa-list"></i>
                            <p>Laporan Realisasi OP</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="laporan_rekapitulasi_item_po.php" class="nav-link <?php if ($menuaktif == "laprekappo") {
                            echo "active";
                          } else {
                            echo "";
                          } ?>">
                            <i class="fas fa-list"></i>
                            <p>Laporan Rekapitulasi Item OP</p>
                          </a>
                        </li>

                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="listposhipping.php" class="nav-link <?php if ($menuaktif == "poshiping") {
                    echo "active";
                  } else {
                    echo "";
                  } ?>">
                    <i class="fas fa-cube"></i>
                    <p>Dok. OP</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="listhistorihargamaterial.php" class="nav-link <?php if ($menuaktif == "historihrgpo") {
                    echo "active";
                  } else {
                    echo "";
                  } ?>">
                    <i class="fas fa-cube"></i>
                    <p>Histori Harga Pembelian</p>
                  </a>
                </li>

              </ul>



            </li> -->

                        <!-- <li class="nav-item has-treeview <?php //if($grupmenuaktif == "penjualan"){ echo "menu-open";}else{echo "";} ?>">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-truck-moving"></i>
              <p>  PENJUALAN
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a> -->

                        <!-- menu pengajuan -->
                        <!-- <li class="nav-item has-treeview <?php if ($grupmenuaktif == "inventorymaterial") {
              echo "menu-open";
            } else {
              echo "";
            } ?>">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-dolly-flatbed"></i>
                <p> INVENTORY MATERIAL
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right"></span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="dashboardwarehousematerial.php" class="nav-link <?php if ($menuaktif == "dashboardwarehousematerial") {
                    echo "active";
                  } else {
                    echo "";
                  } ?>">
                    <i class="fas fa-chart-pie"></i>
                    <p>Dashboard</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="listinquirystokmaterial.php" class="nav-link <?php if ($menuaktif == "inquirystokmat") {
                    echo "active";
                  } else {
                    echo "";
                  } ?>">
                    <i class="fas fa-box-open"></i>
                    <p>Inquiry Stok Material</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="listbd.php" class="nav-link <?php if ($menuaktif == "bd") {
                    echo "active";
                  } else {
                    echo "";
                  } ?>">
                    <i class="fas fa-box-open"></i>
                    <p>Barang Datang (BD)</p>
                  </a>
                </li>
                <li class="nav-item has-treeview  <?php if ($subgrupmenuaktif == "btb") {
                  echo "menu-open";
                } else {
                  echo "";
                } ?>">
                  <a href="#" class="nav-link ">
                    <i class="fas fa-box-open"></i>
                    <p>Bukti Terima Barang (BTB)
                      <i class="fas fa-angle-left right"></i>
                      <span class="badge badge-info right"></span>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="listbtb.php?op=1" class="nav-link <?php if ($menuaktif == "btbstok") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-dot-circle"></i>
                        <p>BTB Stok</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="listbtb.php?op=2,3" class="nav-link <?php if ($menuaktif == "btbns") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-dot-circle"></i>
                        <p>BTB Non Stok</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="listbtb.php?op=4" class="nav-link <?php if ($menuaktif == "btbsparepart") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-dot-circle"></i>
                        <p>BTB Sparepart</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="listbtb.php?op=5" class="nav-link <?php if ($menuaktif == "btbinves") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-dot-circle"></i>
                        <p>BTB Investasi</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item has-treeview <?php if ($subgrupmenuaktif == "penjadwalanmaterial") {
                  echo "menu-open";
                } else {
                  echo "";
                } ?>">
                  <a href="#" class="nav-link">
                    <i class="fas fa-box-open"></i>
                    <p>Penjadwalan Material
                      <i class="fas fa-angle-left right"></i>
                      <span class="badge badge-info right"></span>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="listjadwaldtgmaterial.php" class="nav-link <?php if ($menuaktif == "jadwalmaterial") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-dot-circle"></i>
                        <p>Jadwal Kedatangan</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="listrealisasidtgmaterial.php" class="nav-link <?php if ($menuaktif == "realisasidtgmaterial") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-dot-circle"></i>
                        <p>Realisasi Kedatangan</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="listmonitoringjdwdtgmat.php" class="nav-link <?php if ($menuaktif == "monitoringkedatanganmaterial") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-dot-circle"></i>
                        <p>Monitoring Kedatangan Material</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="listbonbarang.php?tipe=bb" class="nav-link <?php if ($menuaktif == "bonbarang") {
                    echo "active";
                  } else {
                    echo "";
                  } ?>">
                    <i class="fas fa-box-open"></i>
                    <p>Bon Barang</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="listbonbarang.php?tipe=bp" class="nav-link <?php if ($menuaktif == "bonproduk") {
                    echo "active";
                  } else {
                    echo "";
                  } ?>">
                    <i class="fas fa-box-open"></i>
                    <p>Bon Produk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="listbpb.php" class="nav-link <?php if ($menuaktif == "bpb") {
                    echo "active";
                  } else {
                    echo "";
                  } ?>">
                    <i class="fas fa-box-open"></i>
                    <p>Bukti Penyerahan Barang (BPB)</p>
                  </a>
                </li> -->
                        <!-- <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modul 2.2</p>
                </a>
              </li> -->
                        <!-- <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Verifikasi Cuti</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Klaim Kesehatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Verifikasi Klaim Kesehatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lembur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hitung Lembur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SPPD</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Slip Gaji</p>
                </a>
              </li> -->
                        <!-- </ul>
            </li> -->
                        <!-- menu akuntansi -->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-balance-scale"></i>
                                <p>
                                    AKUNTANSI
                                    <i class="right fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="listpricelist.php" class="nav-link ">
                                        <i class="fas fa-angle-double-right"></i>
                                        <p>Daftar Harga Jual</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="listmonitoringuangmuka.php" class="nav-link">
                                        <i class="fas fa-angle-double-right"></i>
                                        <p>Monitoring Uang Muka</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="listcetakbtb.php" class="nav-link <">
                                        <i class="fas fa-angle-double-right"></i>
                                        <p>Cetak Form BTB</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                        <a href="listgrupruangan.php" class="nav-link <?php if ($menuaktif == "grup ruangan") {
                          echo "active";
                        } else {
                          echo "";
                        } ?>">
                        <i class="fas fa-angle-right"></i>
                          <p>Grup Ruangan</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="listruangan.php" class="nav-link  <?php if ($menuaktif == "ruangan") {
                          echo "active";
                        } else {
                          echo "";
                        } ?>">
                        <i class="fas fa-angle-right"></i>
                          <p>Ruangan</p>
                        </a>
                        </li>
                      <li class="nav-item">
                        <a href="listinventaris.php" class="nav-link  <?php if ($menuaktif == "inventaris subgroup") {
                          echo "active";
                        } else {
                          echo "";
                        } ?>">
                        <i class="fas fa-angle-right"></i>
                          <p>Inventaris</p>
                        </a>
                        </li> -->

                            </ul>
                        </li>
                        <!-- menu master -->
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fab fa-invision"></i>
                                <p> INVENTARIS
                                    <i class="fas fa-angle-left right"></i>
                                    <!-- <span class="badge badge-info right"></span> -->
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="listjenisbarang.php" class="nav-link">
                                        <i class="fas fa-angle-right"></i>
                                        <p>Jenis Barang</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="listgrupruangan.php" class="nav-link">
                                        <i class="fas fa-angle-right"></i>
                                        <p>Grup Ruangan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="listruangan.php" class="nav-link  ">
                                        <i class="fas fa-angle-right"></i>
                                        <p>Ruangan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="listinventaris.php" class="nav-link ">
                                        <i class="fas fa-angle-right"></i>
                                        <p>Inventaris</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="listkendaraan.php" class="nav-link ">
                                        <i class="fas fa-angle-right"></i>
                                        <p>Kendaraan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="listjenismesin.php" class="nav-link ">
                                        <i class="fas fa-angle-right"></i>
                                        <p>Jenis Mesin / Bangunan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="listmesin.php" class="nav-link ">
                                        <i class="fas fa-angle-right"></i>
                                        <p>Mesin / Equipment / Bangunan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- menu marketing -->
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tags"></i>
                                <p> MARKETING
                                    <i class="fas fa-angle-left right"></i>
                                    <!-- <span class="badge badge-info right"></span> -->
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="listgaslap.php" class="nav-link ">
                                        <i class="fas fa-crosshairs"></i>
                                        <p>Petugas Lapangan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="listpromotion.php" class="nav-link">
                                        <i class="fas fa-crosshairs"></i>
                                        <p>Kegiatan Promosi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="listsaldogaslap.php" class="nav-link  ">
                                        <i class="fas fa-crosshairs"></i>
                                        <p>Saldo Gaslap</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="listmutasisaldogaslap.php" class="nav-link  <?php if ($menuaktif == "mutasi saldo gaslap") {
                    echo "active";
                  } else {
                    echo "";
                  } ?>">
                                        <i class="fas fa-crosshairs"></i>
                                        <p>Mutasi Saldo Gaslap</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- menu pjp -->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-medkit"></i>
                                <p> JASA PEKERJAAN
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="listpjp.php" class="nav-link">
                                        <i class="fab fa-wpforms"></i>
                                        <p>PJP</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="laporan_data_pjp.php" class="nav-link ">
                                        <i class="fab fa-wpforms"></i>
                                        <p>Laporan Data PJP</p>
                                    </a>
                                </li>
                                <li class="nav-item has-treeview ">
                                    <a href="#" class="nav-link ">
                                        <i class="fab fa-wpforms"></i>
                                        <p>Hartek
                                            <i class="fas fa-angle-left right"></i>
                                            <span class="badge badge-info right"></span>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="dashboardpjp.php?pl=1" class="nav-link">
                                                <i class="fas fa-chart-pie"></i>
                                                <p>Dashboard</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="listpjpperbaikan.php?pl=1" class="nav-link">
                                                <i class="fas fa-chevron-circle-right"></i>
                                                <p>Perbaikan PJP</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="listspk.php?pl=1" class="nav-link">
                                                <i class="fas fa-chevron-circle-right"></i>
                                                <p>Surat Perintah Kerja (SPK)</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="listpjprealisasibiaya.php?pl=1" class="nav-link">
                                                <i class="fas fa-chevron-circle-right"></i>
                                                <p>Pertanggungjawaban Biaya</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="fas fa-chevron-circle-right"></i>
                                                <p> Laporan
                                                    <i class="fas fa-angle-left right"></i>
                                                    <span class="badge badge-info right"></span>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="laporan_perbaikan_pjp.php?pl=1" class="nav-link">
                                                        <i class="fas fa-dot-circle"></i>
                                                        <p>Data Perbaikan PJP</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="laporan_spk.php?pl=1" class="nav-link">
                                                        <i class="fas fa-dot-circle"></i>
                                                        <p>Data SPK</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="laporan_pertanggungjawaban_pjp.php?pl=1" class="nav-link">
                                                        <i class="fas fa-dot-circle"></i>
                                                        <p>Data Pertanggung Jawaban</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="laporan_history_perbaikan_aset.php?pl=1" class="nav-link">
                                                        <i class="fas fa-dot-circle"></i>
                                                        <p>Histori Perbaikan Aset</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="laporan_pemakaian_part.php?pl=1" class="nav-link">
                                                        <i class="fas fa-dot-circle"></i>
                                                        <p>Penggunaan Material / Jasa</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="laporan_history_harga.php?pl=1" class="nav-link">
                                                        <i class="fas fa-dot-circle"></i>
                                                        <p>History Harga Part</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link ">
                                        <i class="fab fa-wpforms"></i>
                                        <p>Teknologi Informasi
                                            <i class="fas fa-angle-left right"></i>
                                            <span class="badge badge-info right"></span>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="dashboardpjp.php?pl=2" class="nav-link">
                                                <i class="fas fa-chart-pie"></i>
                                                <p>Dashboard</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="listpjpperbaikan.php?pl=2" class="nav-link">
                                                <i class="fas fa-chevron-circle-right"></i>
                                                <p>Perbaikan PJP</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="listspk.php?pl=2" class="nav-link">
                                                <i class="fas fa-chevron-circle-right"></i>
                                                <p>Surat Perintah Kerja (SPK)</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="listpjprealisasibiaya.php?pl=2" class="nav-link">
                                                <i class="fas fa-chevron-circle-right"></i>
                                                <p>Pertanggungjawaban Biaya</p>
                                            </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="#" class="nav-link">
                                                <i class="fas fa-chevron-circle-right"></i>
                                                <p> Laporan
                                                    <i class="fas fa-angle-left right"></i>
                                                    <span class="badge badge-info right"></span>
                                                </p>
                                            </a>
                                            <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="laporan_perbaikan_pjp.php?pl=2" class="nav-link <?php if ($menuaktif == "lapperbaikanti") {
                            echo "active";
                          } else {
                            echo "";
                          } ?>">
                            <i class="fas fa-dot-circle"></i>
                            <p>Data Perbaikan PJP</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="laporan_spk.php?pl=2" class="nav-link <?php if ($menuaktif == "lapspkti") {
                            echo "active";
                          } else {
                            echo "";
                          } ?>">
                            <i class="fas fa-dot-circle"></i>
                            <p>Data SPK</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="laporan_pertanggungjawaban_pjp.php?pl=2" class="nav-link <?php if ($menuaktif == "lappertanggungjawabanti") {
                            echo "active";
                          } else {
                            echo "";
                          } ?>">
                            <i class="fas fa-dot-circle"></i>
                            <p>Data Pertanggung Jawaban</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="laporan_history_perbaikan_aset.php?pl=2" class="nav-link <?php if ($menuaktif == "laphistoryperbaikanasetti") {
                            echo "active";
                          } else {
                            echo "";
                          } ?>">
                            <i class="fas fa-dot-circle"></i>
                            <p>Histori Perbaikan Aset</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="laporan_pemakaian_part.php?pl=2" class="nav-link <?php if ($menuaktif == "lappenggunaanmaterialti") {
                            echo "active";
                          } else {
                            echo "";
                          } ?>">
                            <i class="fas fa-dot-circle"></i>
                            <p>Penggunaan Material / Jasa</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="laporan_history_harga.php?pl=2" class="nav-link <?php if ($menuaktif == "laphistoryhargapartti") {
                            echo "active";
                          } else {
                            echo "";
                          } ?>">
                            <i class="fas fa-dot-circle"></i>
                            <p>History Harga Part</p>
                          </a>
                        </li>
                      </ul>
                    </li>
                  </ul> -->
                                        </li>
                                        <!-- <li class="nav-item has-treeview  <?php if ($subgrupmenuaktif == "jasapekerjaanumum") {
                      echo "menu-open";
                    } else {
                      echo "";
                    } ?>">
                  <a href="#" class="nav-link ">
                    <i class="fab fa-wpforms"></i>
                    <p>Umum
                      <i class="fas fa-angle-left right"></i>
                      <span class="badge badge-info right"></span>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="dashboardpjp.php?pl=3" class="nav-link <?php if ($menuaktif == "dashboardpjpumum") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-chart-pie"></i>
                        <p>Dashboard</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="listpjpperbaikan.php?pl=3" class="nav-link <?php if ($menuaktif == "perbaikanumum") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-chevron-circle-right"></i>
                        <p>Perbaikan PJP</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="listspk.php?pl=3" class="nav-link <?php if ($menuaktif == "spkumum") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-chevron-circle-right"></i>
                        <p>Surat Perintah Kerja (SPK)</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="listpjprealisasibiaya.php?pl=3" class="nav-link <?php if ($menuaktif == "pjrealumum") {
                        echo "active";
                      } else {
                        echo "";
                      } ?>">
                        <i class="fas fa-chevron-circle-right"></i>
                        <p>Pertanggungjawaban Biaya</p>
                      </a>
                    </li>
                    <li class="nav-item <?php if ($subgrupmenuaktif == "lapumum") {
                      echo "menu-open";
                    } else {
                      echo "";
                    } ?>">
                      <a href="#" class="nav-link">
                        <i class="fas fa-chevron-circle-right"></i>
                        <p> Laporan
                          <i class="fas fa-angle-left right"></i>
                          <span class="badge badge-info right"></span>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="laporan_perbaikan_pjp.php?pl=3" class="nav-link <?php if ($menuaktif == "lapperbaikanumum") {
                            echo "active";
                          } else {
                            echo "";
                          } ?>">
                            <i class="fas fa-dot-circle"></i>
                            <p>Data Perbaikan PJP</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="laporan_spk.php?pl=3" class="nav-link <?php if ($menuaktif == "lapspkumum") {
                            echo "active";
                          } else {
                            echo "";
                          } ?>">
                            <i class="fas fa-dot-circle"></i>
                            <p>Data SPK</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="laporan_pertanggungjawaban_pjp.php?pl=3" class="nav-link <?php if ($menuaktif == "lappertanggungjawabanumum") {
                            echo "active";
                          } else {
                            echo "";
                          } ?>">
                            <i class="fas fa-dot-circle"></i>
                            <p>Data Pertanggung Jawaban</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="laporan_history_perbaikan_aset.php?pl=3" class="nav-link <?php if ($menuaktif == "laphistoryperbaikanasetumum") {
                            echo "active";
                          } else {
                            echo "";
                          } ?>">
                            <i class="fas fa-dot-circle"></i>
                            <p>Histori Perbaikan Aset</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="laporan_pemakaian_part.php?pl=3" class="nav-link <?php if ($menuaktif == "lappenggunaanmaterialumum") {
                            echo "active";
                          } else {
                            echo "";
                          } ?>">
                            <i class="fas fa-dot-circle"></i>
                            <p>Penggunaan Material / Jasa</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="laporan_history_harga.php?pl=3" class="nav-link <?php if ($menuaktif == "laphistoryhargapartumum") {
                            echo "active";
                          } else {
                            echo "";
                          } ?>">
                            <i class="fas fa-dot-circle"></i>
                            <p>History Harga Part</p>
                          </a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li> -->



                                    </ul>
                                </li>




                                <!-- tak terpakai -->
                                <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/advanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advanced Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/editors.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Editors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validation</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DataTables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jsGrid</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/invoice.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/profile.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/e_commerce.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>E-commerce</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/projects.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Projects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project_add.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project_edit.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Edit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project_detail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Detail</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/contacts.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contacts</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Extras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/login.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Login</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/register.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/forgot-password.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Forgot Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/recover-password.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Recover Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lockscreen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Legacy User Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/language-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Language Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/404.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 404</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/500.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 500</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/pace.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pace</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/blank.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blank Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="starter.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Starter Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documentation</p>
            </a>
          </li>
          <li class="nav-header">MULTI LEVEL EXAMPLE</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Level 1
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Level 2
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li> -->
                            </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>