<?php

include 'bissnet.php';
class kendaraan
{
    // kendaraan_id
    // jenis_kendaraan
    // pabrikan
    // tipe_model
    // nomor_kendaraan
    // nama_kendaraan
    // tahun_pembuatan
    // bahan_bakar
    //  nomor_rangka
    // nomor_mesin 
    // nomor_plat
    // oddometer
    // keterangan
    // created_by
    // created_date
    // last_update_by
    // last_update_date

    /**
     * Validasi nomor rangka kendaraan.
     * @param string $norangka Nomor rangka kendaraan yang akan divalidasi.
     * @param resource $link Koneksi database MySQL.
     * @return string "true" jika valid, "false" jika tidak valid.
     */

    // kendaraan_id
    private $kendaraanid;
    // jenis_kendaraan
    private $jnskendaraan;
    // pabrikan 
    private $pabrikan;
    // tipe_model
    private $tpmodel;
    // nomor_kendaraan
    private $nokendaraan;
    // nama_kendaraan
    private $namakendaraan;
    // tahun_pembuatan
    private $thnpembuatan;
    // bahan_bakar
    private $bhnbakar;
    //  nomor_rangka
    private $norangka;
    // nomor_mesin
    private $nomesin;
    // nomor_plat
    private $noplat;
    // oddometer
    private $oddomtr;
    // keterangan
    private $keterangan;
    // created_by 
    private $createdby;
    // created_date 
    private $createddate;
    // last_update_by
    private $lastupdateby;
    // last_update_date
    private $lastupdatedate;


    // Insert_kendaraan (sudah)
    // Update_kendaraan (sudah)
    // Update_oddo_kendaraan (sudah)
    // Deletekendaraan (sudah)
    // Get_query_kendaraan (sudah)
    // Get_total_data_kendaraan (sudah)
    // Increment_kendaraanid (sudah)
    // Increment_nokendaraan (sudah)
    // Validasikendaraanid (sudah)
    // Validasinomerplat (sudah)
    // Validasinomermesin (sudah)
    // Validasinomerrangka (sudah)
    // Validasinomerkendaraan (sudah)
    // Get_data_kendaraan (sudah)


    // untuk validasi di input ✅
    function Validasikendaraanid($kode, $link)
    {
        $valid = '';
        try {
            // mengubah idkendaraan ke kode
            $query = "SELECT kendaraan_id from biss_kendaraan where lower(kendaraan_id) = lower('$kode')";
            // echo $query;
            $exec_sql = mysql_query($query) or die(mysql_error());
            $hasil = mysql_fetch_assoc($exec_sql);

            if (empty($hasil["kendaraan_id"])) {
                $valid = 'false';
            } else {
                if (strtolower($hasil['kendaraan_id']) == strtolower($kode)) {
                    $valid = "True";
                } else {
                    $valid = 'false';
                }
            }

            return $valid;
            // mysql_close();
        } catch (Exception $ex) {
            $valid = 'false';
            return $valid;
            // mysql_close();
        }
    }

    // untuk validasi nomer plat kendaraan ✅   
    function validasi_noplat($kode, $link)
    {
        $valid = '';
        try {
            // Query untuk memeriksa apakah nomor plat ada di database
            $query = "SELECT nomor_plat FROM biss_kendaraan WHERE LOWER(nomor_plat) = LOWER('$kode')";

            // Eksekusi query
            $exec_sql = mysql_query($query, $link) or die(mysql_error());
            $hasil = mysql_fetch_assoc($exec_sql);

            // Validasi hasil query
            if (empty($hasil["nomor_plat"])) {
                $valid = 'false';
            } else {
                if (strtolower($hasil['nomor_plat']) == strtolower($kode)) {
                    $valid = 'true';
                } else {
                    $valid = 'false';
                }
            }

            // Tutup koneksi (jika perlu)
            // mysql_close($link);

            return $valid;

        } catch (Exception $ex) {
            // Penanganan jika terjadi kesalahan
            $valid = 'false';
            // mysql_close($link); // Tutup koneksi meski ada error
            return $valid;
        }
    }

    // untuk validasi nomer mesin kendaraan ✅ 
    function Validasinomermesin($kode, $link)
    {
        $valid = '';
        try {
            // Query untuk memeriksa apakah nomor mesin ada di database
            $query = "SELECT nomor_mesin FROM biss_kendaraan WHERE LOWER(nomor_mesin) = LOWER('$kode')";

            // Eksekusi query
            $exec_sql = mysql_query($query, $link) or die(mysql_error());
            $hasil = mysql_fetch_assoc($exec_sql);

            // Validasi hasil query
            if (empty($hasil["nomor_mesin"])) {
                $valid = 'false';
            } else {
                if (strtolower($hasil['nomor_mesin']) == strtolower($kode)) {
                    $valid = 'true';
                } else {
                    $valid = 'false';
                }
            }

            // Tutup koneksi (jika perlu)
            // mysql_close($link);

            return $valid;

        } catch (Exception $ex) {
            // Penanganan jika terjadi kesalahan
            $valid = 'false';
            // mysql_close($link); // Tutup koneksi meski ada error
            return $valid;
        }
    }
    // untuk validasi nomer rangka kendaraan ✅ 
    function Validasinomerrangka($kode, $link)
    {
        $valid = '';
        try {
            // Query untuk memeriksa apakah nomor rangka ada di database
            $query = "SELECT nomor_rangka FROM biss_kendaraan WHERE LOWER(nomor_rangka) = LOWER('$kode')";

            // Eksekusi query
            $exec_sql = mysql_query($query, $link) or die(mysql_error());
            $hasil = mysql_fetch_assoc($exec_sql);

            // Validasi hasil query
            if (empty($hasil["nomor_rangka"])) {
                $valid = 'false';
            } else {
                if (strtolower($hasil['nomor_rangka']) == strtolower($kode)) {
                    $valid = 'true';
                } else {
                    $valid = 'false';
                }
            }

            // Tutup koneksi (jika perlu)
            // mysql_close($link);

            return $valid;

        } catch (Exception $ex) {
            // Penanganan jika terjadi kesalahan
            $valid = 'false';
            // mysql_close($link); // Tutup koneksi meski ada error
            return $valid;
        }
    }


    // , $no, $kode, $link
    function Validasinomerkendaraan($link, $nomesin, $norangka, $noplat)
    {
        $valid = '';
        try {
            $query = "SELECT kendaraan_id FROM biss_kendaraan WHERE lower(nomer_mesin) = lower('$nomesin') OR lower(nomor_rangka) = lower('$norangka') OR lower(nomer_plat) = lower('$noplat')";

            $exec_sql = mysql_query($query, $link) or die(mysql_error());

            if (!$exec_sql) {
                throw new Exception("Error executing query: " . mysql_error());
            }

            $hasil = mysql_fetch_assoc($exec_sql);

            if (empty($hasil)) {
                $valid = 'true';
            } else {
                $valid = 'false';
            }

            mysql_free_result($exec_sql);
            mysql_close($link);
            return $valid;

        } catch (Exception $ex) {
            $valid = 'false';
            mysql_close($link);
            return $valid;
        }
    }

    function validasi_redudansi_nomer($no, $kode, $link)
    {
        $valid = '';
        try {
            $query = "SELECT nomor_kendaraan from biss_kendaraan where lower(nomor_kendaraan) = lower('$no') and lower(kendaraanid) <>lower($kode)";

            $exec_sql = mysql_query($query) or die(mysql_error());
            $hasil = mysql_fetch_assoc($exec_sql);

            if (empty($hasil["nomor_kendaraan"])) {
                $valid = 'false';
            } else {
                if (strtolower($hasil['nomor_kendaraan']) == strtolower($kode)) {
                    $valid = 'true';
                } else {
                    $valid = 'false';
                }
            }
            return $valid;
        } catch (Exception $ex) {
            $valid = "false";
            return $valid;
        }
    }

    // Insert kendaraan dengan validasi dan increment
    // function Insert_kendaraan($kendaraanid, $nokendaraan, $jnskendaraan, $pabrikan, $tpmodel, $namakendaraan, $thnpembuatan, $bhnbakar, $norangka, $nomesin, $noplat, $oddomtr, $keterangan, $createdby, $createddate, $link)
    // {
    //     try {
    //         // Increment kendaraan ID
    //         $kendaraanid = $this->Increament_kendaraanid($link);

    //         // Increment nomor kendaraan
    //         $nokendaraan = $this->Increment_nokendaraan('KND', date('Y'), $link);

    //         // Validasi sebelum insert
    //         if ($this->Validasikendaraanid($kendaraanid, $link) == 'false' && $this->Validasinomerkendaraan($link, $nomesin, $norangka, $noplat) == 'true') {
    //             $query = "INSERT INTO biss_kendaraan (kendaraan_id, jenis_kendaraan, pabrikan, tipe_model, nomor_kendaraan, nama_kendaraan, tahun_pembuatan, bahan_bakar, nomor_rangka, nomor_mesin, nomor_plat, oddometer, keterangan, created_by, created_date) ";
    //             $query .= "VALUES ('$kendaraanid', '$jnskendaraan', '$pabrikan', '$tpmodel', '$nokendaraan', '$namakendaraan', '$thnpembuatan', '$bhnbakar', '$norangka', '$nomesin', '$noplat', '$oddomtr', '$keterangan', '$createdby', '$createddate')";

    //             $cmd = mysql_query($query, $link);

    //             $sts = $cmd ? 'true' : 'false';
    //             mysql_close($link);
    //             return $sts;
    //         } else {
    //             return 'false';
    //         }
    //     } catch (Exception $ex) {
    //         return 'false';
    //     }
    // }

    public function Insert_kendaraan($kendaraanid, $nokendaraan, $jnskendaraan, $pabrikan, $tpmodel, $namakendaraan, $thnpembuatan, $bhnbakar, $norangka, $nomesin, $noplat, $oddomtr, $keterangan, $createdby, $createddate, $link)
    {
        try {
            // Query untuk menyisipkan data kendaraan
            $query = "INSERT INTO biss_kendaraan (
                kendaraan_id, no_kendaraan, jenis_kendaraan, pabrikan, tipe_model, nama_kendaraan, tahun_pembuatan, bahan_bakar, 
                nomor_rangka, nomor_mesin, nomor_plat, oddometer, keterangan, created_by, created_date
            ) VALUES (
                '$kendaraanid', '$nokendaraan', '$jnskendaraan', '$pabrikan', '$tpmodel', '$namakendaraan', '$thnpembuatan', '$bhnbakar',
                '$norangka', '$nomesin', '$noplat', '$oddomtr', '$keterangan', '$createdby', '$createddate'
            )";

            // Eksekusi query
            $result = mysql_query($query, $link);

            // $result = mysql_query($query, $link) or die(mysql_error());

            // Jika berhasil
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            // Tangani kesalahan
            return false;
        }
    }


    // memasukkan data (kendaraan_form.php)
    function Update_kendaraan($kendaraanid, $jnskendaraan, $pabrikan, $tpmodel, $nokendaraan, $namakendaraan, $thnpembuatan, $bhnbakar, $norangka, $nomesin, $noplat, $oddomtr, $keterangan, $lastupdateby, $lastupdatedate, $link)
    {
        try {
            $query = "UPDATE biss_kendaraan 
          SET kendaraan_id = '$kendaraanid', jenis_kendaraan = '$jnskendaraan', pabrikan = '$pabrikan', 
              tipe_model = '$tpmodel', nomor_kendaraan = '$nokendaraan', nama_kendaraan = '$namakendaraan', 
              tahun_pembuatan = '$thnpembuatan', bahan_bakar = '$bhnbakar', nomor_rangka = '$norangka', 
              nomor_mesin = '$nomesin', nomor_plat = '$noplat', oddometer = '$oddomtr', 
              keterangan = '$keterangan', last_update_by = '$lastupdateby', last_update_date = '$lastupdatedate' 
          WHERE kendaraan_id = '$kendaraanid'";


            $query = $query . "WHERE kendaraan_id = '$kendaraanid'";
            $cmd = mysql_query($query, $link);

            if (!$cmd) {
                $sts = 'false';
            } else {
                $sts = 'true';
            }

            return $sts;
            // mysql_close();
        } catch (Exception $ex) {
            $sts = "false";
            return $sts;
        }
    }

    function Update_oddo_kendaraan($kendaraanid, $oddomtr, $link)
    {
        try {
            $query = "UPDATE biss_kendaraan 
          SET oddometer = '$oddomtr' 
          WHERE kendaraan_id = '$kendaraanid'";


            $query = $query . "WHERE kendaraan_id - '$kendaraanid'";
            $cmd = mysql_query($query, $link);

            if (!$cmd) {
                $sts = 'false';
            } else {
                $sts = 'true';
            }

            return $sts;
            // mysql_close();
        } catch (Exception $ex) {
            $sts = "false";
            return $sts;
        }
    }

    //✅
    function Deletekendaraan($kode, $link)
    {
        try {
            $query = "DELETE FROM biss_kendaraan WHERE kendaraan_id = '$kode'";
            $cmd = mysql_query($query, $link) or die(mysql_error());

            if (!$cmd) {
                $sts = 'false';
            } else {
                $sts = 'true';
            }

            return $sts;
            // mysql_close();
        } catch (Exception $ex) {
            $sts = "false";
            return $sts;
            // mysql_close();
        }
    }


    // ✅
    function Increment_kendaraanid($link)
    {
        $nomax = 0;

        try {
            // Query untuk mendapatkan nilai maksimal dari kendaraan_id
            $query = "SELECT MAX(kendaraan_id) AS nomer FROM biss_kendaraan";

            // Eksekusi query
            $cmd = mysql_query($query, $link) or die(mysql_error());

            // Ambil hasil query
            $hasil = mysql_fetch_assoc($cmd);

            // Tentukan nilai kendaraan_id berikutnya
            if (empty($hasil["nomer"])) {
                $nomax = 1; // Jika tidak ada data, mulai dari 1
            } else {
                $nomax = $hasil["nomer"] + 1; // Increment nilai maksimal
            }

            // Bebaskan hasil query dari memori
            mysql_free_result($cmd);

            // Kembalikan nilai kendaraan_id berikutnya
            return $nomax;

            // Tutup koneksi (opsional jika dibutuhkan)
            // mysql_close();

        } catch (Exception $ex) {
            // Jika terjadi kesalahan, kembalikan nilai default
            mysql_free_result($cmd); // Bebaskan memori
            return $nomax;

        }
    }

    // // Fungsi untuk mendapatkan jenis kendaraan
    // public function getjeniskendaraan()
    // {
    //     $jenisKendaraanMap = array(
    //         'sepeda motor' => 'MTR',
    //         'mobil' => 'CAR',
    //         'truk' => 'TRK',
    //         'bus' => 'BUS'
    //     );

    //     return $jenisKendaraanMap;
    // }



    // Fungsi untuk increment nomor kendaraan
    public function Increment_nokendaraan($jenisKendaraan, $tahun, $link)
    {
        // Mendapatkan mapping jenis kendaraan
        $jenisKendaraanMap = $this->getjeniskendaraan();

        // Validasi apakah jenis kendaraan ada di dalam map
        if (!array_key_exists($jenisKendaraan, $jenisKendaraanMap)) {
            echo "Error: Jenis kendaraan tidak valid.";
            return null;
        }

        // Ambil prefix berdasarkan jenis kendaraan
        $prefix = $jenisKendaraanMap[$jenisKendaraan];

        // Dapatkan kendaraan_id baru
        $kendaraanId = $this->Increment_kendaraanid($link);

        // Format nomor kendaraan: PREFIX-TAHUN-ID
        $noKendaraan = sprintf("%s-%s-%04d", $tahun, $kendaraanId);

        return $noKendaraan;
    }




    // buat tabel kendaraan_listdata.php dan listkendaraan.php
    function Get_database_kendaraan($kode, $link)
    {
        // Inisialisasi array untuk menyimpan hasil data
        $data = array();

        // Query untuk mengambil data kendaraan berdasarkan kendaraan_id
        // k = kendaraan
        $query = "SELECT * FROM biss_kendaraan where lower(kendaraanid) = lower('$kode')";

        // Eksekusi query menggunakan mysqli_query
        $cmd = mysql_query($query, $link);

        // Cek apakah query berhasil dijalankan
        while ($hasil = mysql_fetch_assoc($cmd)) {
            $data['kendaraan_id'] = $hasil['kendaraan_id'];
            $data['jenis_kendaraan'] = $hasil['jenis_kendaraan'];
            $data['pabrikan'] = $hasil['pabrikan'];
            $data['pabrikan'] = $hasil['pabrikan'];
            $data['tipe_model'] = $hasil['tipe_model'];
            $data['nomor_kendaraan'] = $hasil['nomor_kendaraan'];
            $data['nama_kendaraan'] = $hasil['nama_kendaraan'];
            $data['tahun_pembuatan'] = $hasil['tahun_pembuatan'];
            $data['bahan_bakar'] = $hasil['bahan_bakar'];
            $data['nomor_rangka'] = $hasil['nomor_rangka'];
            $data['nomor_mesin'] = $hasil['nomor_mesin'];
            $data['nomor_plat'] = $hasil['nomor_plat'];
            $data['oddometer'] = $hasil['oddometer'];
            $data['keterangan'] = $hasil['keterangan'];
            $data['created_by'] = $hasil['created_by'];
            $data['created_date'] = $hasil['created_date'];
            $data['last_update_by'] = $hasil['last_update_by'];
            $data['last_update_date'] = $hasil['last_update_date'];


            // 'jenis_kendaraan' => $hasil['jenis_kendaraan'],
            //         'pabrikan' => $hasil['pabrikan'],
            //         'tipe_model' => $hasil['tipe_model'],
            //         'nomor_kendaraan' => $hasil['nomor_kendaraan'],
            //         'nama_kendaraan' => $hasil['nama_kendaraan'],
            //         'tahun_pembuatan' => $hasil['tahun_pembuatan'],
            //         'bahan_bakar' => $hasil['bahan_bakar'],
            //         'nomor_rangka' => $hasil['nomor_rangka'],
            //         'nomor_mesin' => $hasil['nomor_mesin'],
            //         'nomor_plat' => $hasil['nomor_plat'],
            //         'oddometer' => $hasil['oddometer'],
            //         'keterangan' => $hasil['keterangan'],
            //         'created_by' => $hasil['created_by'],
            //         'created_date' => date("d-m-Y H:i:s", strtotime($hasil['created_date'])),
            //         'last_update_by' => $hasil['last_update_by'],
            //         'last_update_date' => date("d-m-Y H:i:s", strtotime($hasil['last_update_date']))
        }

        // Mengembalikan hasil data
        return $data;
    }

    // buat tabel kendaraan_listdata.php dan listkendaraan.php
    function Get_data_kendaraan_all($limit_start, $limit, $link)
    {
        $query = "SELECT * FROM biss_kendaraan ORDER BY created_date DESC LIMIT $limit_start,$limit";
        return $query;
    }

    function Get_data_kendaraan_search($search_keyword, $limit_start, $limit, $link)
    {
        $query = "SELECT * FROM biss_kendaraan WHERE 
                    kendaraan_id LIKE '$search_keyword' OR 
                    jenis_kendaraan LIKE '$search_keyword' OR 
                    pabrikan LIKE '$search_keyword' OR 
                    tipe_model LIKE '$search_keyword' OR 
                    nomor_kendaraan LIKE '$search_keyword' OR 
                    nama_kendaraan LIKE '$search_keyword' OR 
                    tahun_pembuatan LIKE '$search_keyword' OR 
                    bahan_bakar LIKE '$search_keyword' OR 
                    nomor_rangka LIKE '$search_keyword' OR 
                    nomor_mesin LIKE '$search_keyword' OR 
                    nomor_plat LIKE '$search_keyword' OR 
                    oddometer LIKE '$search_keyword' OR 
                    keterangan LIKE '$search_keyword' OR 
                    created_by LIKE '$search_keyword' 
                ORDER BY created_date DESC, last_update_date DESC LIMIT $limit_start, $limit";

        return $query;
    }

    // buat tabel kendaraan_listdata.php dan listkendaraan.php
    function Get_total_all_data($link)
    {
        $query = "SELECT COUNT(kendaraan_id) as jumlah FROM biss_kendaraan";
        $exec_sql = mysql_query($query, $link);
        $hasil = mysql_fetch_assoc($exec_sql);
        return $hasil["jumlah"] ? $hasil["jumlah"] : 0;
    }

    // buat tabel kendaraan_listdata.php dan listkendaraan.php
    function Get_total_data_search($search_keyword, $link)
    {
        $valid = '';
        try {
            $query = "SELECT COUNT(kendaraan_id) as jumlah from biss_kendaraan where kendaraan_id like '$search_keyword' or jenis_kendaraan like '$search_keyword' or nama_kendaraan like '$search_keyword' or pabrikan like '$search_keyword' or tipe_model like '$search_keyword' or tahun_pembuatan like '$search_keyword' or bahan_bakar like '$search_keyword' or nomor_rangka like '$search_keyword' or nomor_mesin like '$search_keyword' or nomor_plat like '$search_keyword' or oddometer like '$search_keyword' or keterangan like '$search_keyword'";

            $exec_sql = mysql_query($query) or die(mysql_error());

            $hasil = mysql_fetch_assoc($exec_sql);

            if (empty($hasil["jumlah"])) {
                $totalhsl = 0;
            } else {
                $totalhsl = $hasil["jumlah"];
            }
            return $totalhsl;

        } catch (Exception $ex) {
            $totalhsl = 0;
            return $totalhsl;
        }
    }


    function validasinomer_byKode($kode, $no, $link)
    {
        $valid = '';
        try {
            $query = "select nomor_kendaraan from biss_kendaraan where lower(nokendaraan)= lower('$no') and lower(kendaraanid) = lower('$kode')";
            $exec_sql = mysql_query($query) or die(mysql_error());
            $hasil = mysql_fetch_assoc(($exec_sql));

            if (empty($hasil["nomer_kendaraan"])) {
                $valid = 'false';
            } else {
                if (strtolower($hasil['nomer_kendaraan']) == strlower($no)) {
                    $valid = 'true';
                } else {
                    $valid = 'false';
                }
            }

            return $valid;

        } catch (Exception $ex) {
            $valid = 'false';
            return $valid;
        }
    }
}

?>