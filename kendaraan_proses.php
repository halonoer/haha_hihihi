<?php
include("bissnet.php");
include("classkendaraan.php");
include("classsetting.php");
// header('Content-Type: application/json');

$objkendaraan = new kendaraan();
$hasil['pesanproses'] = "";
$sts_proses_kendaraan = "";
$stsredundan = "";
$stsvalselfname = "";
// Menyimpan ID kendaraan yang dikirimkan lewat form.
$in_kendaraanid = $_POST['in_kendaraanid'];
// Menyimpan status apakah akan mengambil data (true) atau tidak (false).
$in_mode_getdata = $_POST['in_mode_getdata'];
// Menyimpan mode operasi (seperti "add", "edit", "delete").
$in_fitur_mode = $_POST['in_fitur_mode'];

// kode ini akan mengambil data kendaraan berdasarkan ID yang diberikan.
// Fungsi Get_data_kendaraan digunakan untuk mengambil data kendaraan dari database berdasarkan ID yang diberikan ($kendaraanid).
// Setelah data berhasil diambil, data kendaraan disimpan dalam array $hasil, yang kemudian bisa dikirim kembali sebagai respons (misalnya, dalam format JSON).
if ($in_mode_getdata == "true") {
    $datakendaraan = $objkendaraan->Get_database_kendaraan($in_kendaraanid, $link);
    var_dump($datakendaraan);

    $hasil['kendaraan_id'] = $datakendaraan['kendaraan_id'];
    $hasil['nomor_kendaraan'] = $datakendaraan['nomor_kendaraan'];
    $hasil['jenis_kendaraan'] = $datakendaraan['jenis_kendaraan'];
    $hasil['nama_kendaraan'] = $datakendaraan['nama_kendaraan'];
    $hasil['pabrikan'] = $datakendaraan['pabrikan'];
    $hasil['tipe_model'] = $datakendaraan['tipe_model'];
    $hasil['tahun_pembuatan'] = $datakendaraan['tahun_pembuatan'];
    $hasil['bahan_bakar'] = $datakendaraan['bahan_bakar'];
    $hasil['nomor_rangka'] = $datakendaraan['nomor_rangka'];
    $hasil['nomor_mesin'] = $datakendaraan['nomor_mesin'];
    $hasil['nomor_plat'] = $datakendaraan['nomor_plat'];
    $hasil['oddometer'] = $datakendaraan['oddometer'];
    $hasil['keterangan'] = $datakendaraan['keterangan'];
    // $hasil['created_by'] = $datakendaraan['created_by'];
    // $hasil['created_date'] = $datakendaraan['created_date'];
    // $hasil['last_update_by'] = $datakendaraan['last_update_by'];
    // $hasil['last_update_date'] = $datakendaraan['last_update_date'];
} else if ($in_mode_getdata == "false") {

    if ($in_fitur_mode <> "del") {
        // $in_kendaraanid = $_POST['in_kendaraanid'];
        $in_nokendaraan = $_POST['in_nokendaraan'];
        $in_jnskendaraan = $_POST['in_jnskendaraan'];
        $in_namakendaraan = $_POST['in_namakendaraan'];
        $in_pabrikan = $_POST['in_pabrikan'];
        $in_tpmodel = $_POST['in_tpmodel'];
        $in_thnpembuatan = $_POST['in_thnpembuatan'];
        $in_bahanbakar = $_POST['in_bahanbakar'];
        $in_norangka = $_POST['in_norangka'];
        $in_nomesin = $_POST['in_nomesin'];
        $in_noplat = $_POST['in_noplat'];
        $in_oddomtr = $_POST['in_oddomtr'];
        $in_keterangan = $_POST['in_keterangan'];
        // $in_created_by = $_POST['in_created_by'];
        // $in_created_date = $_POST['in_created_date'];
        // $in_last_update_by = $_POST['in_last_update_by'];
        // $in_last_update_date = $_POST['in_last_update_date'];

        $objkendaraan = new kendaraan();
        $objsetting = new setting_pekabiss();

        if ($in_fitur_mode == "ad") {
            $stsvalincrementid = "";
            $stsvalnokendaraan = "";
            // $datajnskendaraan = $objkendaraan->getjeniskendaraan($jnskendaraan, $link);
            $in_jnskendaraan = $datakendaraan['prefix'];

            $periodebln = date('Y') . '-' . date('m');

            $in_kendaraanid = $objkendaraan->Increment_kendaraanid($link); // ID kendaraan baru
            error_log("Kendaraan ID: " . $in_kendaraanid);
            $in_nokendaraan = $objkendaraan->Increment_nokendaraan("prefix", date('Y'), $link); // No kendaraan baru
            error_log("No Kendaraan: " . $in_nokendaraan);

            $stsvalincrementid = $objkendaraan->Validasikendaraanid($in_kendaraanid, $link);


            if ($stsvalincrementid == "true") {
                $in_kendaraanid = $objkendaraan->Increment_kendaraanid($link);
            }

            $stsvalnokendaraan = $objkendaraan->Validasinomerkendaraan($link, $in_nomesin, $in_norangka, $in_noplat);

            if ($stsvalnokendaraan == "false") {
                // echo "POS MODE : ".$pos_mode." masuk scope add";
                $sts_proses_kendaraan = $objkendaraan->Insert_kendaraan(
                    $in_kendaraanid,
                    $in_nokendaraan,
                    $in_jnskendaraan,
                    $in_pabrikan,
                    $in_tpmodel,
                    $in_namakendaraan,
                    $in_thnpembuatan,
                    $in_bahanbakar,
                    $in_norangka,
                    $in_nomesin,
                    $in_noplat,
                    $in_oddomtr,
                    $in_keterangan,
                    $in_lastupdateby,
                    $in_lastupdatedate,
                    $link
                );
                //echo "hasil status insert : ".$sts_proses_inventaris;
                if ($sts_proses_kendaraan == "true") {
                    $hasil['in_kendaraanid'] = $in_kendaraanid;
                    $hasil['sts_proses'] = $sts_proses_kendaraan;
                    $hasil['pesanproses'] = "Proses simpan data kendaraan berhasil disimpan.";
                } else if ($sts_proses_kendaraan == "false") {
                    $hasil['pesanproses'] = "proses simpan data kendaraan tidak berhasil";
                    $hasil['sts_proses'] = 'false';
                }
            } else {
                $hasil['pesanproses'] = "data No kendaraan yang anda entry sudah ada";
                $hasil['sts_proses'] = "false";
            }
        } else if ($in_fitur_mode == "up") {
            $stsredundan = $objkendaraan->validasi_redudansi_nomer($in_kendaraanid, $in_nokendaraan, $link);
            $stsvalselfname = $objkendaraan->validasinomer_byKode($kode, $no, $link);
            if ($stsredundan == "true" and $stsvalselfname == "false") {
                $stserrnama = "true";
            } else if ($stsredundan == "true" and $stsvalselfname == "true") {
                $stserrnama = "false";
            } elseif ($stsredundan == "false" and $stsvalselfname == "true") {
                $stserrnama = "false";
            } elseif ($stsredundan == "false" and $stsvalselfname == "false") {
                $stserrnama = "false";
            }
            if ($stserrnama == "false") {
                $sts_proses_kendaraan = $objkendaraan->Update_kendaraan(
                    $in_kendaraanid,
                    $in_nokendaraan,
                    $in_jnskendaraan,
                    $in_pabrikan,
                    $in_tpmodel,
                    $in_namakendaraan,
                    $in_thnpembuatan,
                    $in_bahanbakar,
                    $in_norangka,
                    $in_nomesin,
                    $in_noplat,
                    $in_oddomtr,
                    $in_keterangan,
                    $in_lastupdateby,
                    $in_lastupdatedate,
                    $link
                );
                if ($sts_proses_kendaraan == "true") {
                    $hasil['in_kendaraanid'] = $in_kendaraanid;
                    $hasil['sts_proses'] = $in_proses_kendaraan;
                    $hasil['pesanproses'] = "Proses simpan data kendaraan berhasil disimpan";
                } else if ($sts_proses_kendaraan == "false") {
                    $hasil['pesanproses'] = "Proses simpan data kendaraan tidak berhasil";
                    $hasil['sts_proses'] = "false";
                }
            } else {
                $hasil['pesanproses'] = "Data Nama Kendaraan yang anda entry sudah ada";
                $hasil['sts_proses'] = "false";
            }
        }// $in_fitur_mode = edit

    } // $in_fitur_mode <> del
    else if ($in_fitur_mode == "del") {
        $objkendaraan = new kendaraan();
        $sts_proses_kendaraan = $objkendaraan->Deletekendaraan($in_kendaraanid, $link);

        $hasil['sts_proses'] = $sts_proses_kendaraan;
    }// $in_fitur_mode = del

}// $in_fitur_mode_getdata = false


echo json_encode($hasil);

?>