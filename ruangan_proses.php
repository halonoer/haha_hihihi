<?php
    include("bissnet.php");
    include("classruangan.php");
    include("classsetting.php");

    $hasil['pesanproses'] = "";
    $sts_proses_ruangan = "";
    $stsredundan = "";
    $stsvalselfname = "";
    $ru_kdruangan = $_POST['ru_kdruangan'];
    $ru_mode_getdata = $_POST['ru_mode_getdata'];
    $ru_fitur_mode = $_POST['ru_fitur_mode'];
    // echo "kode jenis : ".$ru_kdruangan;
    // echo "mode data : ".$ru_mode_getdata;
      
    //echo "POS MODE GETDATA : ".$pos_mode_getdata;


    if($ru_mode_getdata == "true"){

        $objruangan = new ruangan();
        // echo "kode jenis : ".$ru_kdruangan;
        $dataruangan = $objruangan->getdatafromdb($ru_kdruangan,$link);
        // echo "SQL : ".$query;

                $hasil['kdruangan']  = $dataruangan['kdruangan'];
				$hasil['kdgrup']  = $dataruangan['kdgrup'];
				$hasil['namagrupruang']  = $dataruangan['namagrupruang'];
				$hasil['namaruangan']  = $dataruangan['namaruangan'];
				$hasil['unitname'] = $dataruangan['unitname'];
				$hasil['entri'] = $dataruangan['entri'];
				$hasil['created_date'] = $dataruangan['created_date'];
				$hasil['updby']  = $dataruangan['updby'];
				$hasil['tglupd'] = $dataruangan['tglupd'];
				$hasil['keterangan'] = $dataruangan['keterangan'];
				$hasil['unitid'] = $dataruangan['unitid'];
                
//echo $hasil['kdruangan'];
    } // $pos_mode_getdata == true
    else if($ru_mode_getdata == "false"){

        if($ru_fitur_mode <> "del"){

            $ru_kdgrupruangan = $_POST['ru_kdgrupruangan'];
            $ru_namaruangan = $_POST['ru_namaruangan'];
            $ru_idunit = $_POST['ru_idunit'];
            $ru_keterangan = $_POST['ru_keterangan'];
            $ru_user_name = $_POST['ru_user_name'];
            
            
                
            $objruangan = new ruangan();
            $objsetting = new setting_pekabiss();

            if($ru_fitur_mode == "ad"){
                $stsvalincreamentid = "";
                $stsvalnamaruangan = "";
                $periodebln = date('Y').'-'.date('m');
                $idx_rom_bln = $objsetting->get_index_romawi_bulan(substr($periodebln,-2));
                $ru_kdruangan = $objruangan->increamentkoderuangan($link);

                $stsvalincreamentid = $objruangan->validasikode($ru_kdruangan, $link);

                if($stsvalincreamentid == "true"){
                    $ru_kdruangan = $objruangan->increamentkoderuangan($link);
                }
                

                $stsvalnamaruangan = $objruangan->validasinama($ru_namaruangan, $link);
                if($stsvalnamaruangan == "false"){

                // echo "POS MODE : ".$pos_mode." masuk scope add";
                $sts_proses_ruangan = $objruangan->insertruangan($ru_kdruangan, $ru_kdgrupruangan, $ru_namaruangan, $ru_user_name, $ru_keterangan, $ru_idunit, $link);
                //echo "hasil status insert : ".$sts_proses_ruangan;
                if($sts_proses_ruangan == "true"){
                    $hasil['ru_kdruangan'] =  $ru_kdruangan;
                    $hasil['sts_proses'] =  $sts_proses_ruangan;
                    $hasil['pesanproses'] = "Proses simpan data ruangan berhasil disimpan"; 
                }
                else if ($sts_proses_ruangan == "false"){
                     $hasil['pesanproses'] = "Proses simpan data ruangan tidak berhasil"; 
                    $hasil['sts_proses'] = "false";
                }
            }
            else {
                $hasil['pesanproses'] = "Data Nama ruangan yang anda entry sudah ada"; 
                $hasil['sts_proses'] = "false";

            }
                // $hasil['pesanproses'] =  $sts_proses_ruangan;
                //  echo "Sts Proses : ".$sts_proses_ruangan;
                
              

                

            }// $ru_fitur_mode = add
            else if($ru_fitur_mode == "up"){
                // echo "masuk update";
                $stsredundan = $objruangan->validasi_redudansi_nama($ru_kdruangan,$ru_namaruangan, $link);
                $stsvalselfname = $objruangan->validasikode_nama($ru_kdruangan,$ru_namaruangan, $link);
                if ($stsredundan == "true" and $stsvalselfname == "false"){
					$stserrnama = "true";	
				}
				else if ($stsredundan == "true" and $stsvalselfname == "true"){
					$stserrnama = "false";
				}
				else if ($stsredundan == "false" and $stsvalselfname == "true"){
					$stserrnama = "false";
				}
				else if ($stsredundan == "false" and $stsvalselfname == "false"){
					$stserrnama = "false";
				}
                    if($stserrnama == "false"){
                        $sts_proses_ruangan = $objruangan->updateruangan($ru_kdruangan, $ru_kdgrupruangan, $ru_namaruangan, $ru_user_name, $ru_keterangan, $ru_idunit, $link);
                        if($sts_proses_ruangan == "true"){  
                                $hasil['ru_kdruangan'] =  $ru_kdruangan;
                                $hasil['sts_proses'] =  $sts_proses_ruangan;
                                $hasil['pesanproses'] = "Proses simpan data ruangan berhasil disimpan"; 
        
                        }
                        else if ($sts_proses_ruangan == "false"){
                             $hasil['pesanproses'] = "Proses simpan data ruangan tidak berhasil"; 
                            $hasil['sts_proses'] = "false";
                        }
                    }
                    else {
                        $hasil['pesanproses'] = "Data Nama ruangan yang anda entry sudah ada"; 
                        $hasil['sts_proses'] = "false";
                    }
               

            }// $ru_fitur_mode = edit

        } // $ru_fitur_mode <> del
        else if($ru_fitur_mode == "del"){
            $objruangan = new ruangan();

            $sts_proses_ruangan = $objruangan->deleteruangan($ru_kdruangan, $link);
                
            $hasil['sts_proses'] =  $sts_proses_ruangan; 
           

            
        } // $ru_fitur_mode = del

    }// $ru_fitur_mode_getdata = false

    echo json_encode($hasil);
?>