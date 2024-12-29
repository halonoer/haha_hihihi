<?php
include("bissnet.php");
include("classinventaris.php");
include("classsetting.php");
$objinventaris = new inventaris();
$hasil['pesanproses'] = "";
$sts_proses_inventaris = "";
$stsredundan = "";
$stsvalselfname = "";
$in_kdbarang = $_POST['in_kdbarang'];
$in_mode_getdata = $_POST['in_mode_getdata'];
$in_fitur_mode = $_POST['in_fitur_mode'];
// echo "kode jenis : ".$in_kdbarang;
// echo "mode data : ".$in_mode_getdata;

//echo "POS MODE GETDATA : ".$pos_mode_getdata;


if ($in_mode_getdata == "true") {


    // echo "kode jenis : ".$in_kdbarang;
    $datainventaris = $objinventaris->getdatafromdb($in_kdbarang, $link);
    // echo "SQL : ".$query;

    $hasil['kdbarang'] = $datainventaris['kdbarang'];
    $hasil['kdjenis'] = $datainventaris['kdjenis'];
    $hasil['namajns'] = $datainventaris['namajns'];
    $hasil['noinv'] = $datainventaris['noinv'];
    $hasil['nmbrg'] = $datainventaris['nmbrg'];
    $hasil['noseri'] = $datainventaris['noseri'];
    $hasil['mboard'] = $datainventaris['mboard'];
    $hasil['processor'] = $datainventaris['processor'];
    $hasil['ram'] = $datainventaris['ram'];
    $hasil['hdd'] = $datainventaris['hdd'];
    $hasil['entri'] = $datainventaris['entri'];
    $hasil['created_date'] = $datainventaris['created_date'];
    $hasil['updby'] = $datainventaris['updby'];
    $hasil['tglupd'] = $datainventaris['tglupd'];
    $hasil['thnbeli'] = $datainventaris['thnbeli'];
    $hasil['kondisi'] = $datainventaris['kondisi'];
    $hasil['ketspek'] = $datainventaris['ketspek'];
    $hasil['nmuser'] = $datainventaris['nmuser'];
    $hasil['lan'] = $datainventaris['lan'];
    $hasil['kdunit'] = $datainventaris['kdunit'];
    $hasil['nmunit'] = $datainventaris['nmunit'];
    $hasil['tempat'] = $datainventaris['tempat'];
    $hasil['kdruangan'] = $datainventaris['kdruangan'];
    $hasil['namaruangan'] = $datainventaris['namaruangan'];
    $hasil['pengelola'] = $datainventaris['pengelola'];
    $hasil['foto'] = $datainventaris['foto'];


    //echo $hasil['kdbarang'];
} // $pos_mode_getdata == true
else if ($in_mode_getdata == "false") {

    if ($in_fitur_mode <> "del") {


        $in_kdbarang = $_POST['in_kdbarang'];
        $in_kdjenis = $_POST['in_kdjenis'];
        $in_noinventaris = $_POST['in_noinventaris'];
        $in_namabrg = $_POST['in_namabrg'];
        $in_nomerseri = $_POST['in_nomerseri'];
        $in_motherboard = $_POST['in_motherboard'];
        $in_processor = $_POST['in_processor'];
        $in_ram = $_POST['in_ram'];
        $in_harddisk = $_POST['in_harddisk'];
        $in_thnbeli = $_POST['in_thnbeli'];
        $in_kondisi = $_POST['in_kondisi'];
        $in_ketspesifikasi = $_POST['in_ketspesifikasi'];
        $in_nmuser = $_POST['in_nmuser'];
        $in_lancard = $_POST['in_lancard'];
        $in_kdunit = $_POST['in_kdunit'];
        $in_tempat = $_POST['in_tempat'];
        $in_kdruangan = $_POST['in_kdruangan'];
        $in_pengelola = $_POST['in_pengelola'];
        $in_foto = $_POST['in_foto'];
        $in_user_name = $_POST['in_user_name'];



        $objinventaris = new inventaris();
        $objsetting = new setting_pekabiss();

        if ($in_fitur_mode == "ad") {
            $stsvalincreamentid = "";
            $stsvalnoinventaris = "";
            $dataprefix = $objinventaris->getdataprefix($in_kdjenis, $link);
            $in_prefix = $dataprefix['prefix'];
            // echo "data prefix".$in_prefix;

            $periodebln = date('Y') . '-' . date('m');
            // $idx_rom_bln = $objsetting->get_index_romawi_bulan(substr($periodebln,-2));
            $in_kdbarang = $objinventaris->incrementkdbarang($link);
            $in_noinventaris = $objinventaris->increament_nodoc_inventaris($in_prefix, $in_thnbeli, $link);

            $stsvalincreamentid = $objinventaris->validasikdbarang($in_kdbarang, $link);

            if ($stsvalincreamentid == "true") {
                $in_kdbarang = $objinventaris->incrementkdbarang($link);
            }


            $stsvalnoinventaris = $objinventaris->validasinoinventaris($in_noinventaris, $link);
            //echo "status validasi no investaris".$stsvalnoinventaris;
            if ($stsvalnoinventaris == "false") {

                // echo "POS MODE : ".$pos_mode." masuk scope add";
                $sts_proses_inventaris = $objinventaris->insertinventaris(
                    $in_kdbarang,
                    $in_kdjenis,
                    $in_noinventaris,
                    $in_namabrg,
                    $in_nomerseri,
                    $in_motherboard,
                    $in_processor,
                    $in_ram,
                    $in_harddisk,
                    $in_user_name,
                    $in_thnbeli,
                    $in_kondisi,
                    $in_ketspesifikasi,
                    $in_nmuser,
                    $in_lancard,
                    $in_kdunit,
                    $in_tempat,
                    $in_kdruangan,
                    $in_pengelola,
                    $in_foto,
                    $link
                );
                //echo "hasil status insert : ".$sts_proses_inventaris;
                if ($sts_proses_inventaris == "true") {
                    $hasil['in_kdbarang'] = $in_kdbarang;
                    $hasil['sts_proses'] = $sts_proses_inventaris;
                    $hasil['pesanproses'] = "Proses simpan data inventaris berhasil disimpan";
                } else if ($sts_proses_inventaris == "false") {
                    $hasil['pesanproses'] = "Proses simpan data inventaris tidak berhasil";
                    $hasil['sts_proses'] = "false";
                }
            } else {
                $hasil['pesanproses'] = "Data No inventaris yang anda entry sudah ada";
                $hasil['sts_proses'] = "false";

            }
            // $hasil['pesanproses'] =  $sts_proses_inventaris;
            //  echo "Sts Proses : ".$sts_proses_inventaris;





        }// $in_fitur_mode = add
        else if ($in_fitur_mode == "up") {
            // echo "masuk update";
            $stsredundan = $objinventaris->validasi_redudansi_nomer($in_kdbarang, $in_noinventaris, $link);
            $stsvalselfname = $objinventaris->validasinomer_byKode($in_kdbarang, $in_noinventaris, $link);
            if ($stsredundan == "true" and $stsvalselfname == "false") {
                $stserrnama = "true";
            } else if ($stsredundan == "true" and $stsvalselfname == "true") {
                $stserrnama = "false";
            } else if ($stsredundan == "false" and $stsvalselfname == "true") {
                $stserrnama = "false";
            } else if ($stsredundan == "false" and $stsvalselfname == "false") {
                $stserrnama = "false";
            }
            if ($stserrnama == "false") {
                $sts_proses_inventaris = $objinventaris->updateinventaris(
                    $in_kdbarang,
                    $in_kdjenis,
                    $in_noinventaris,
                    $in_namabrg,
                    $in_nomerseri,
                    $in_motherboard,
                    $in_processor,
                    $in_ram,
                    $in_harddisk,
                    $in_user_name,
                    $in_thnbeli,
                    $in_kondisi,
                    $in_ketspesifikasi,
                    $in_nmuser,
                    $in_lancard,
                    $in_kdunit,
                    $in_tempat,
                    $in_kdruangan,
                    $in_pengelola,
                    $in_foto,
                    $link
                );
                if ($sts_proses_inventaris == "true") {
                    $hasil['in_kdbarang'] = $in_kdbarang;
                    $hasil['sts_proses'] = $sts_proses_inventaris;
                    $hasil['pesanproses'] = "Proses simpan data inventaris berhasil disimpan";

                } else if ($sts_proses_inventaris == "false") {
                    $hasil['pesanproses'] = "Proses simpan data inventaris tidak berhasil";
                    $hasil['sts_proses'] = "false";
                }
            } else {
                $hasil['pesanproses'] = "Data Nama inventaris yang anda entry sudah ada";
                $hasil['sts_proses'] = "false";
            }


        }// $in_fitur_mode = edit

    } // $in_fitur_mode <> del
    else if ($in_fitur_mode == "del") {
        $objinventaris = new inventaris();

        $sts_proses_inventaris = $objinventaris->deleteinventaris($in_kdbarang, $link);

        $hasil['sts_proses'] = $sts_proses_inventaris;



    } // $in_fitur_mode = del

}// $in_fitur_mode_getdata = false

echo json_encode($hasil);
?>