<?php
class setting_pekabiss
{


  function get_alias_kata_departemen($id_dept, $link)
  {


    $v_aliaskata = "";

    try {
      $query = "select kata from department where department_id = $id_dept";
      //echo $query;
      // die();
      $cmd = mysql_query($query, $link);
      $hasil = mysql_fetch_assoc($cmd);


      if (empty($hasil["kata"])) {
        $v_aliaskata = "";
      } else {
        $v_aliaskata = $hasil["kata"];
      }


      mysql_free_result($cmd);
      mysql_close();
      //oci_close($link);
      return $v_aliaskata;
    } catch (Exception $ex) {
      $v_aliaskata = "";
      return $v_aliaskata;
    }
  }

  function get_nama_unit_departemen($id_dept, $link)
  {

    $v_nmdept = "";

    try {
      $query = "select department_name  from department where department_id = $id_dept ";

      // echo $query;

      $cmd = mysql_query($query, $link);
      $hasil = mysql_fetch_assoc($cmd);


      if (empty($hasil["department_name"])) {
        $v_nmdept = "";
      } else {
        $v_nmdept = $hasil["department_name"];
      }


      mysql_free_result($cmd);
      mysql_close();
      //oci_close($link);
      return $v_nmdept;
    } catch (Exception $ex) {
      $v_nmdept = "";
      return $v_nmdept;
    }
  }

  function get_nama_departemen($id_dept, $link)
  {

    $v_nmdept = "";

    try {
      $query = "select department_code  from department where department_id = $id_dept ";

      // echo $query;

      $cmd = mysql_query($query, $link);
      $hasil = mysql_fetch_assoc($cmd);


      if (empty($hasil["department_code"])) {
        $v_nmdept = "";
      } else {
        $v_nmdept = $hasil["department_code"];
      }


      mysql_free_result($cmd);
      mysql_close();
      //oci_close($link);
      return $v_nmdept;
    } catch (Exception $ex) {
      $v_nmdept = "";
      return $v_nmdept;
    }
  }


  function get_index_romawi_bulan($idxblnconv)
  {
    $strromawi = "";

    if ($idxblnconv == '01') {
      $strromawi = 'I';
    } else if ($idxblnconv == '02') {
      $strromawi = 'II';
    } else if ($idxblnconv == '03') {
      $strromawi = 'III';
    } else if ($idxblnconv == '04') {
      $strromawi = 'IV';
    } else if ($idxblnconv == '05') {
      $strromawi = 'V';
    } else if ($idxblnconv == '06') {
      $strromawi = 'VI';
    } else if ($idxblnconv == '07') {
      $strromawi = 'VII';
    } else if ($idxblnconv == '08') {
      $strromawi = 'VIII';
    } else if ($idxblnconv == '09') {
      $strromawi = 'IX';
    } else if ($idxblnconv == '10') {
      $strromawi = 'X';
    } else if ($idxblnconv == '11') {
      $strromawi = 'XI';
    } else if ($idxblnconv == '12') {
      $strromawi = 'XII';
    }

    return $strromawi;
  }


  function get_nama_bulan_by_index($idxblnconv)
  {
    $namaperiodebln = "";

    if ($idxblnconv == '01') {
      $namaperiodebln = 'Januari';
    } else if ($idxblnconv == '02') {
      $namaperiodebln = 'Februari';
    } else if ($idxblnconv == '03') {
      $namaperiodebln = 'Maret';
    } else if ($idxblnconv == '04') {
      $namaperiodebln = 'April';
    } else if ($idxblnconv == '05') {
      $namaperiodebln = 'Mei';
    } else if ($idxblnconv == '06') {
      $namaperiodebln = 'Juni';
    } else if ($idxblnconv == '07') {
      $namaperiodebln = 'Juli';
    } else if ($idxblnconv == '08') {
      $namaperiodebln = 'Agustus';
    } else if ($idxblnconv == '09') {
      $namaperiodebln = 'September';
    } else if ($idxblnconv == '10') {
      $namaperiodebln = 'Oktober';
    } else if ($idxblnconv == '11') {
      $namaperiodebln = 'November';
    } else if ($idxblnconv == '12') {
      $namaperiodebln = 'Desember';
    }

    return $namaperiodebln;
  }

  function get_ppn_persen($ppncode, $link)
  {

    $ppn = 0;

    try {
      $query = "select percentage  from ppn where ppn_code = '$ppncode' ";

      // echo $query;

      $cmd = mysql_query($query, $link);
      $hasil = mysql_fetch_assoc($cmd);


      if (empty($hasil["percentage"])) {
        $ppn = 0;
      } else {
        $ppn = $hasil["percentage"];
      }


      mysql_free_result($cmd);
      mysql_close();
      //oci_close($link);
      return $ppn;
    } catch (Exception $ex) {
      $ppn = 0;
      return $ppn;
    }
  }

  function get_query_data_departemen_aktif()
  {

    $sql = " select distinct(department_code) as department_code from department where active_flag = 'Y' order by department_code";


    return $sql;
  }

  function get_query_data_unit_kerja_per_departemen($deptname)
  {

    $sql = " select distinct(DEPARTMENT_NAME) as UNI_KERJA from department where active_flag = 'Y' and DEPARTMENT_CODE = '$deptname' order by department_name ";


    return $sql;
  }


  function eja_tanggal($tanggal)
  {
    $terbilang = "";
    $ratusan = "";
    $puluhan = "";
    $angka = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $bulan_arr = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    // Pisahkan tanggal, bulan, dan tahun
    $tanggal_bulan_tahun = explode("-", $tanggal);
    $tanggal_num = (int) $tanggal_bulan_tahun[0];
    $bulan_num = (int) $tanggal_bulan_tahun[1];
    $tahun = (int) $tanggal_bulan_tahun[2];

    // Konversi tanggal
    if ($tanggal_num < 12) {
      $terbilang = "tanggal " . $angka[$tanggal_num] . " ";
    } elseif ($tanggal_num < 20) {
      $terbilang = "tanggal " . $angka[($tanggal_num - 10)] . " belas" . " ";
    } elseif ($tanggal_num < 100) {
      $terbilang = "tanggal " . $angka[($tanggal_num / 10)] . " puluh " . $angka[($tanggal_num % 10)] . " ";
    }

    // Konversi bulan
    $terbilang .= "bulan " . $bulan_arr[$bulan_num] . " ";

    // Konversi tahun
    if ($tahun < 12) {
      $terbilang .= "tahun " . $angka[$tahun];
    } elseif ($tahun < 20) {
      $terbilang .= "tahun " . $angka[($tahun - 10)] . " belas";
    } elseif ($tahun < 100) {
      $terbilang .= "tahun " . $angka[($tahun / 10)] . " puluh " . $angka[($tahun % 10)];
    } elseif ($tahun < 200) {
      $terbilang .= "tahun " . " seratus" . $angka[($tahun - 100)];
    } elseif ($tahun < 1000) {
      $terbilang .= "tahun " . $angka[($tahun / 100)] . " ratus" . $angka[($tahun % 100)];
    } elseif ($tahun < 2000) {
      $ratusan = intval(substr($tahun, 1, 1)); // Ambil digit ratusan
      $puluhan = intval(substr($tahun, -2)); // Ambil dua digit terakhir

      // Cek apakah digit ratusan valid
      if ($ratusan >= 1 && $ratusan <= 9) {
        $ratusan_alp = ($ratusan == 1) ? " seratus" : $angka[$ratusan] . " ratus";
      } else {
        $ratusan_alp = ""; // Jika tidak valid, atur menjadi string kosong
      }

      // Konversi digit puluhan menjadi teks terbilang
      if ($puluhan < 12) {
        $puluhan_alp = ($puluhan == 10) ? " sepuluh" : $angka[$puluhan];
      } elseif ($puluhan < 20) {
        $puluhan_alp = $angka[$puluhan % 10] . " belas";
      } else {
        $puluhan_alp = $angka[intval(substr($tahun, -2, 1))] . " puluh " . $angka[$puluhan % 10];
      }

      // Gabungkan teks terbilang digit ratusan dan puluhan
      $terbilang .= "tahun seribu " . $ratusan_alp . " " . $puluhan_alp;
    } elseif ($tahun < 10000) {
      $ribuan = intval(substr($tahun, 0, 1)); // Ambil digit ribuan
      $ratusan = intval(substr($tahun, 1, 1)); // Ambil digit ratusan
      $puluhan = intval(substr($tahun, -2)); // Ambil dua digit terakhir

      // Konversi digit ribuan menjadi teks terbilang
      $ribuan_alp = ($ribuan == 1) ? " seribu" : $angka[$ribuan] . " ribu";

      // Konversi digit ratusan menjadi teks terbilang
      if ($ratusan >= 1 && $ratusan <= 9) {
        $ratusan_alp = ($ratusan == 1) ? " seratus" : $angka[$ratusan] . " ratus";
      } else {
        $ratusan_alp = ""; // Jika tidak valid, atur menjadi string kosong
      }

      // Konversi digit puluhan menjadi teks terbilang
      if ($puluhan < 12) {
        $puluhan_alp = ($puluhan == 10) ? " sepuluh" : $angka[$puluhan];
      } elseif ($puluhan < 20) {
        $puluhan_alp = $angka[$puluhan % 10] . " belas";
      } else {
        $puluhan_alp = $angka[intval(substr($tahun, -2, 1))] . " puluh " . $angka[$puluhan % 10];
      }

      // Gabungkan teks terbilang digit ribuan, ratusan, dan puluhan
      if ($ratusan_alp == "") {
        $terbilang .= "tahun " . $ribuan_alp . " " . $ratusan_alp . "" . $puluhan_alp;
      } else {
        $terbilang .= "tahun " . $ribuan_alp . " " . $ratusan_alp . " " . $puluhan_alp;
      }
    }

    return $terbilang;
  }


  function get_nama_hari($tanggal)
  {
    // Konversi format tanggal menjadi format yang dapat diinterpretasikan oleh PHP
    $tanggal_php = date_create_from_format('d-m-Y', $tanggal);

    // Ambil nama hari dalam bahasa Indonesia
    //'l' adalah format untuk mendapatkan nama lengkap dari hari dalam seminggu.
    $nama_hari = date_format($tanggal_php, 'l');

    // Konversi nama hari ke bahasa Indonesia
    $hari_indonesia = '';
    switch ($nama_hari) {
      case 'Monday':
        $hari_indonesia = 'Senin';
        break;
      case 'Tuesday':
        $hari_indonesia = 'Selasa';
        break;
      case 'Wednesday':
        $hari_indonesia = 'Rabu';
        break;
      case 'Thursday':
        $hari_indonesia = 'Kamis';
        break;
      case 'Friday':
        $hari_indonesia = 'Jumat';
        break;
      case 'Saturday':
        $hari_indonesia = 'Sabtu';
        break;
      case 'Sunday':
        $hari_indonesia = 'Minggu';
        break;
    }

    return $hari_indonesia;
  }


  function format_tgl_indo($tanggal)
  {
    // Ubah format tanggal menjadi format PHP DateTime
    $tanggal_input = date_create_from_format('d-m-Y', $tanggal);

    // Array nama bulan dalam bahasa Indonesia
    $bulan_indonesia = array(
      'January' => 'Januari',
      'February' => 'Februari',
      'March' => 'Maret',
      'April' => 'April',
      'May' => 'Mei',
      'June' => 'Juni',
      'July' => 'Juli',
      'August' => 'Agustus',
      'September' => 'September',
      'October' => 'Oktober',
      'November' => 'November',
      'December' => 'Desember'
    );

    // Format tanggal dalam format bahasa Indonesia
    $tanggal_indonesia = date_format($tanggal_input, 'd ') . $bulan_indonesia[date_format($tanggal_input, 'F')] . date_format($tanggal_input, ' Y');

    return $tanggal_indonesia;
  }








}
?>