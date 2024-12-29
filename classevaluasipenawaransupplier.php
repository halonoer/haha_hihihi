<?php

class evaluasi_penawaran_supplier
{

    function increament_evaluasi_penawaran_id($link)
    {
        $noid = 0;
        try {
            $query = "select max(evaluasi_penawaran_id) as nomer from biss_eval_penawaran_supplier ";

            $cmd = mysql_query($query, $link);
            $hasil = mysql_fetch_assoc($cmd);

            if (empty($hasil["nomer"])) {
                //echo "masuk scope empty hasil";
                $noid = 1;
            } else {
                $noid = $hasil["nomer"];

                $noid = $noid + 1;


            }
            return $noid;
            mysql_close();

        } catch (Exception $ex) {
            $noid = 1;
            return $noid;
            mysql_close();
        }
    }


    function increament_no_evaluasi_penawaran($idxbln, $idxthn, $link)
    {

        // $v_thn = substr($ppb_period_name,0,4);


        $v_strno = "/" . $idxbln . "/TO/04/BA-EP/JASA/" . $idxthn;
        $v_nomax = "";
        $v_digitno = 0;

        try {
            $query = "select max(SUBSTRING(document_no,1,3)) as nomer from biss_eval_penawaran_supplier
                      where  tahun_pekerjaan = '$idxthn' ";

            // echo "Query : ".$query;

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
                    $v_strno = $v_nomax . $v_strno;
                } else if ($v_digitno == 3 and $v_nomax < 999) {
                    $v_nomax = $v_nomax + 1;
                    $v_strno = $v_nomax . $v_strno;
                } else if ($v_digitno == 3 and $v_nomax == 999) {
                    $v_nomax = $v_nomax + 1;
                    $v_strno = $v_nomax . $v_strno;
                }
                // else if ($v_digitno == 4 and $v_nomax < 9999) {
                //     $v_nomax = $v_nomax +1 ;
                //     $v_strno = $v_nomax.$v_strno;  
                // }
                // else if ($v_digitno == 4 and $v_nomax == 9999) {
                //     $v_nomax = $v_nomax +1 ;
                //     $v_strno = $v_nomax.$v_strno;  
                // }
            }


            // echo "NO PPB : ".$v_strno;

            return $v_strno;

            mysql_free_result($cmd);

            mysql_close();
            //oci_close($link);

        } catch (Exception $ex) {
            $v_nomax = "001";
            return $v_nomax . $v_strno;
        }

    }

    function validasi_evaluasi_penawaran_id($ideval, $link)
    {
        $valid = '';
        try {
            $query = "select evaluasi_penawaran_id from biss_eval_penawaran_supplier where lower(evaluasi_penawaran_id) = lower('$ideval')";
            // echo $query;
            $exec_sql = mysql_query($query) or die(mysql_error());
            $hasil = mysql_fetch_assoc($exec_sql);

            if (empty($hasil["evaluasi_penawaran_id"])) {
                $valid = 'false';
            } else {
                if (strtolower($hasil['evaluasi_penawaran_id']) == strtolower($ideval)) {
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

    function validasi_nomer_evaluasi_penawaran($nomer, $link)
    {
        $valid = '';
        try {
            $query = "select document_no from biss_eval_penawaran_supplier where lower(document_no) = lower('$nomer')";
            // echo $query;
            $exec_sql = mysql_query($query) or die(mysql_error());
            $hasil = mysql_fetch_assoc($exec_sql);

            if (empty($hasil["document_no"])) {
                $valid = 'false';
            } else {
                if (strtolower($hasil['document_no']) == strtolower($nomer)) {
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

    function increament_no_ba_aanwijzing($idxthn, $link)
    {

        // $idxbln, $v_thn = substr($ppb_period_name,0,4);


        $v_strno = "/TO/04/BA-AWJG/JASA/" . $idxthn;
        $v_nomax = "";
        $v_digitno = 0;

        try {
            $query = "select max(SUBSTRING(no_ba_awjg,1,3)) as nomer from biss_eval_penawaran_supplier
                      where  year(awjg_date) = '$idxthn' ";

            // echo "Query : ".$query;

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
                    $v_strno = $v_nomax . $v_strno;
                } else if ($v_digitno == 3 and $v_nomax < 999) {
                    $v_nomax = $v_nomax + 1;
                    $v_strno = $v_nomax . $v_strno;
                } else if ($v_digitno == 3 and $v_nomax == 999) {
                    $v_nomax = $v_nomax + 1;
                    $v_strno = $v_nomax . $v_strno;
                }
                // else if ($v_digitno == 4 and $v_nomax < 9999) {
                //     $v_nomax = $v_nomax +1 ;
                //     $v_strno = $v_nomax.$v_strno;  
                // }
                // else if ($v_digitno == 4 and $v_nomax == 9999) {
                //     $v_nomax = $v_nomax +1 ;
                //     $v_strno = $v_nomax.$v_strno;  
                // }
            }


            // echo "NO PPB : ".$v_strno;

            return $v_strno;

            mysql_free_result($cmd);

            mysql_close();
            //oci_close($link);

        } catch (Exception $ex) {
            $v_nomax = "001";
            return $v_nomax . $v_strno;
        }

    }

    function validasi_nomer_ba_aanwijzing($nomer, $link)
    {
        $valid = '';
        try {
            $query = "select no_ba_awjg from biss_eval_penawaran_supplier where lower(no_ba_awjg) = lower('$nomer')";
            // echo $query;
            $exec_sql = mysql_query($query) or die(mysql_error());
            $hasil = mysql_fetch_assoc($exec_sql);

            if (empty($hasil["no_ba_awjg"])) {
                $valid = 'false';
            } else {
                if (strtolower($hasil['no_ba_awjg']) == strtolower($nomer)) {
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

    function increament_no_ba_kickoff($idxthn, $link)
    {

        // $idxbln, $v_thn = substr($ppb_period_name,0,4);


        $v_strno = "/TO/04/BA-KOF/JASA/" . $idxthn;
        $v_nomax = "";
        $v_digitno = 0;

        try {
            $query = "select max(SUBSTRING(no_ba_kick_off,1,3)) as nomer from biss_eval_penawaran_supplier
                      where  year(kick_off_date) = '$idxthn' ";

            // echo "Query : ".$query;

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
                    $v_strno = $v_nomax . $v_strno;
                } else if ($v_digitno == 3 and $v_nomax < 999) {
                    $v_nomax = $v_nomax + 1;
                    $v_strno = $v_nomax . $v_strno;
                } else if ($v_digitno == 3 and $v_nomax == 999) {
                    $v_nomax = $v_nomax + 1;
                    $v_strno = $v_nomax . $v_strno;
                }
                // else if ($v_digitno == 4 and $v_nomax < 9999) {
                //     $v_nomax = $v_nomax +1 ;
                //     $v_strno = $v_nomax.$v_strno;  
                // }
                // else if ($v_digitno == 4 and $v_nomax == 9999) {
                //     $v_nomax = $v_nomax +1 ;
                //     $v_strno = $v_nomax.$v_strno;  
                // }
            }


            // echo "NO PPB : ".$v_strno;

            return $v_strno;

            mysql_free_result($cmd);

            mysql_close();
            //oci_close($link);

        } catch (Exception $ex) {
            $v_nomax = "001";
            return $v_nomax . $v_strno;
        }

    }

    function validasi_nomer_kickoff($nomer, $link)
    {
        $valid = '';
        try {
            $query = "select no_ba_kick_off from biss_eval_penawaran_supplier where lower(no_ba_kick_off) = lower('$nomer')";
            // echo $query;
            $exec_sql = mysql_query($query) or die(mysql_error());
            $hasil = mysql_fetch_assoc($exec_sql);

            if (empty($hasil["no_ba_kick_off"])) {
                $valid = 'false';
            } else {
                if (strtolower($hasil['no_ba_kick_off']) == strtolower($nomer)) {
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

    function increament_no_undangan_kickoff($idxthn, $link)
    {

        // $idxbln, $v_thn = substr($ppb_period_name,0,4);


        $v_strno = "/TO/04/UND-KOF/JASA/" . $idxthn;
        $v_nomax = "";
        $v_digitno = 0;

        try {
            $query = "select max(SUBSTRING(no_undangan_kickoff,1,3)) as nomer from biss_eval_penawaran_supplier
                      where  year(undangan_kickoff_date) = '$idxthn' ";

            // echo "Query : ".$query;

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
                    $v_strno = $v_nomax . $v_strno;
                } else if ($v_digitno == 3 and $v_nomax < 999) {
                    $v_nomax = $v_nomax + 1;
                    $v_strno = $v_nomax . $v_strno;
                } else if ($v_digitno == 3 and $v_nomax == 999) {
                    $v_nomax = $v_nomax + 1;
                    $v_strno = $v_nomax . $v_strno;
                }
                // else if ($v_digitno == 4 and $v_nomax < 9999) {
                //     $v_nomax = $v_nomax +1 ;
                //     $v_strno = $v_nomax.$v_strno;  
                // }
                // else if ($v_digitno == 4 and $v_nomax == 9999) {
                //     $v_nomax = $v_nomax +1 ;
                //     $v_strno = $v_nomax.$v_strno;  
                // }
            }


            // echo "NO PPB : ".$v_strno;

            return $v_strno;

            mysql_free_result($cmd);

            mysql_close();
            //oci_close($link);

        } catch (Exception $ex) {
            $v_nomax = "001";
            return $v_nomax . $v_strno;
        }

    }

    function validasi_nomer_undangan_kickoff($nomer, $link)
    {
        $valid = '';
        try {
            $query = "select no_undangan_kickoff from biss_eval_penawaran_supplier where lower(no_undangan_kickoff) = lower('$nomer')";
            // echo $query;
            $exec_sql = mysql_query($query) or die(mysql_error());
            $hasil = mysql_fetch_assoc($exec_sql);

            if (empty($hasil["no_undangan_kickoff"])) {
                $valid = 'false';
            } else {
                if (strtolower($hasil['no_undangan_kickoff']) == strtolower($nomer)) {
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

    function increament_no_spkm($idxthn, $link)
    {

        // $v_thn = substr($ppb_period_name,0,4);


        $v_strno = "/TO/04/SPKM/JASA/" . $idxthn;
        $v_nomax = "";
        $v_digitno = 0;

        try {
            $query = "select max(SUBSTRING(no_spmk,1,3)) as nomer from biss_eval_penawaran_supplier
                      where  year(spkm_date) = '$idxthn' ";

            // echo "Query : ".$query;

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
                    $v_strno = $v_nomax . $v_strno;
                } else if ($v_digitno == 3 and $v_nomax < 999) {
                    $v_nomax = $v_nomax + 1;
                    $v_strno = $v_nomax . $v_strno;
                } else if ($v_digitno == 3 and $v_nomax == 999) {
                    $v_nomax = $v_nomax + 1;
                    $v_strno = $v_nomax . $v_strno;
                }
                // else if ($v_digitno == 4 and $v_nomax < 9999) {
                //     $v_nomax = $v_nomax +1 ;
                //     $v_strno = $v_nomax.$v_strno;  
                // }
                // else if ($v_digitno == 4 and $v_nomax == 9999) {
                //     $v_nomax = $v_nomax +1 ;
                //     $v_strno = $v_nomax.$v_strno;  
                // }
            }


            // echo "NO PPB : ".$v_strno;

            return $v_strno;

            mysql_free_result($cmd);

            mysql_close();
            //oci_close($link);

        } catch (Exception $ex) {
            $v_nomax = "001";
            return $v_nomax . $v_strno;
        }

    }

    function validasi_nomer_spmk($nomer, $link)
    {
        $valid = '';
        try {
            $query = "select no_spmk from biss_eval_penawaran_supplier where lower(no_spmk) = lower('$nomer')";
            // echo $query;
            $exec_sql = mysql_query($query) or die(mysql_error());
            $hasil = mysql_fetch_assoc($exec_sql);

            if (empty($hasil["no_spmk"])) {
                $valid = 'false';
            } else {
                if (strtolower($hasil['no_spmk']) == strtolower($nomer)) {
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

    function increament_no_hasil_tender($idxthn, $link)
    {

        // $v_thn = substr($ppb_period_name,0,4);


        $v_strno = "/TO/04/HSL-TENDER/JASA/" . $idxthn;
        $v_nomax = "";
        $v_digitno = 0;

        try {
            $query = "select max(SUBSTRING(no_hsl_tender,1,3)) as nomer from biss_eval_penawaran_supplier
                      where  year(hasil_tender_date) = '$idxthn' ";

            // echo "Query : ".$query;

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
                    $v_strno = $v_nomax . $v_strno;
                } else if ($v_digitno == 3 and $v_nomax < 999) {
                    $v_nomax = $v_nomax + 1;
                    $v_strno = $v_nomax . $v_strno;
                } else if ($v_digitno == 3 and $v_nomax == 999) {
                    $v_nomax = $v_nomax + 1;
                    $v_strno = $v_nomax . $v_strno;
                }
                // else if ($v_digitno == 4 and $v_nomax < 9999) {
                //     $v_nomax = $v_nomax +1 ;
                //     $v_strno = $v_nomax.$v_strno;  
                // }
                // else if ($v_digitno == 4 and $v_nomax == 9999) {
                //     $v_nomax = $v_nomax +1 ;
                //     $v_strno = $v_nomax.$v_strno;  
                // }
            }


            // echo "NO PPB : ".$v_strno;

            return $v_strno;

            mysql_free_result($cmd);

            mysql_close();
            //oci_close($link);

        } catch (Exception $ex) {
            $v_nomax = "001";
            return $v_nomax . $v_strno;
        }

    }

    function validasi_no_hasil_tender($nomer, $link)
    {
        $valid = '';
        try {
            $query = "select no_hsl_tender from biss_eval_penawaran_supplier where lower(no_hsl_tender) = lower('$nomer')";
            // echo $query;
            $exec_sql = mysql_query($query) or die(mysql_error());
            $hasil = mysql_fetch_assoc($exec_sql);

            if (empty($hasil["no_hsl_tender"])) {
                $valid = 'false';
            } else {
                if (strtolower($hasil['no_hsl_tender']) == strtolower($nomer)) {
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

    function increament_no_ba_buka_penawaran($idxthn, $link)
    {

        // $v_thn = substr($ppb_period_name,0,4);


        $v_strno = "/TO/04/BA-PWNG/JASA/" . $idxthn;
        $v_nomax = "";
        $v_digitno = 0;

        try {
            $query = "select max(SUBSTRING(no_ba_buka_penawaran,1,3)) as nomer from biss_eval_penawaran_supplier
                      where  year(ba_buka_penawaran_date) = '$idxthn' ";

            // echo "Query : ".$query;

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
                    $v_strno = $v_nomax . $v_strno;
                } else if ($v_digitno == 3 and $v_nomax < 999) {
                    $v_nomax = $v_nomax + 1;
                    $v_strno = $v_nomax . $v_strno;
                } else if ($v_digitno == 3 and $v_nomax == 999) {
                    $v_nomax = $v_nomax + 1;
                    $v_strno = $v_nomax . $v_strno;
                }
                // else if ($v_digitno == 4 and $v_nomax < 9999) {
                //     $v_nomax = $v_nomax +1 ;
                //     $v_strno = $v_nomax.$v_strno;  
                // }
                // else if ($v_digitno == 4 and $v_nomax == 9999) {
                //     $v_nomax = $v_nomax +1 ;
                //     $v_strno = $v_nomax.$v_strno;  
                // }
            }


            // echo "NO PPB : ".$v_strno;

            return $v_strno;

            mysql_free_result($cmd);

            mysql_close();
            //oci_close($link);

        } catch (Exception $ex) {
            $v_nomax = "001";
            return $v_nomax . $v_strno;
        }

    }

    function validasi_nomer_buka_penawaran($nomer, $link)
    {
        $valid = '';
        try {
            $query = "select no_ba_buka_penawaran from biss_eval_penawaran_supplier where lower(no_ba_buka_penawaran) = lower('$nomer')";
            // echo $query;
            $exec_sql = mysql_query($query) or die(mysql_error());
            $hasil = mysql_fetch_assoc($exec_sql);

            if (empty($hasil["no_ba_buka_penawaran"])) {
                $valid = 'false';
            } else {
                if (strtolower($hasil['no_ba_buka_penawaran']) == strtolower($nomer)) {
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

    function insert_evaluasi_penawaran_supplier(
        $evalid,
        $nodoc,
        $tgldoc,
        $nmpekerjaan,
        $thnpekerjaan,
        $kelpekerjaan,
        $jnshrg,
        $lamapekerjaan,
        $sathari,
        $pertimbangan,
        $hrganggaran,
        $hrgkisaran,
        $noawjg,
        $tglawjg,
        $ruangawjg,
        $nohsltender,
        $nokickoff,
        $nospmk,
        $ket,
        $entriby,
        $link
    ) {

        // $nohsltender, $nokickoff,   $nospmk,
        $strcoltglawjg = "";
        $strparamtglawjg = "";

        try {

            if ($tglawjg !== "") {
                $strcoltglawjg = ",awjg_date,";
                $strparamtglawjg = ",'date('Y-m-d H:i', strtotime($tglawjg))',";
            } else {
                $strcoltglawjg = "";
                $strparamtglawjg = "";
            }

            $query = "insert into biss_eval_penawaran_supplier (evaluasi_penawaran_id, document_no, document_date, nama_pekerjaan, tahun_pekerjaan, kelompok_pekerjaan, jenis_harga, 
                                                            lama_pekerjaan, satuan_hari,pertimbangan_pengajuan, harga_anggaran, harga_kisaran,  no_ba_awjg, tempat_awjg, $strcoltglawjg  
                                                            no_hsl_tender, no_ba_kick_off, no_spmk, statusdoc, keterangan, created_by, created_date, last_update_by, last_update_date)
                                                    values ($evalid, '$nodoc', '$tgldoc', '$nmpekerjaan', '$thnpekerjaan','$kelpekerjaan','$jnshrg', 
                                                            $lamapekerjaan, '$sathari', '$pertimbangan',$hrganggaran,$hrgkisaran, '$noawjg','$ruangawjg', $strparamtglawjg 
                                                            '$nohsltender','$nokickoff','$nospmk',  'NEW', '$ket',  '$entriby',sysdate(),'$entriby',sysdate() )";

            // no_hsl_tender,no_ba_kick_off,no_spmk,
            // '$ruangawjg', '$nohsltender','$nokickoff', '$nospmk', 
            //$query= $query." values ('$kode','$nama', '$user',sysdate)";
            //    echo $query;
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


    function update_evaluasi_penawaran_supplier(
        $evalid,
        $nodoc,
        $tgldoc,
        $nmpekerjaan,
        $thnpekerjaan,
        $kelpekerjaan,
        $jnshrg,
        $lamapekerjaan,
        $sathari,
        $pertimbangan,
        $hrganggaran,
        $hrgkisaran,
        $noawjg,
        $ruangawjg,
        $tglawjg,
        $nohsltender,
        $tglhsltender,
        $nokickoff,
        $tglkickoff,
        $ruangkickoff,
        $nospmk,
        $tglspmk,
        $tglawalkerja,
        $tglakhirkerja,
        $tempatbukapnwrn,
        $tglbukapnwrn,
        $ket,
        $stsdoc,
        $updby,
        $link
    ) {

        $strupdatetanggal = "";

        if ($tglawjg !== "") {
            $tglawjg = date('Y-m-d H:i', strtotime($tglawjg));
            $strupdatetanggal = " awjg_date = '$tglawjg', ";
        }

        if ($tglhsltender !== "") {
            $tglhsltender = date('Y-m-d', strtotime($tglhsltender));
            $strupdatetanggal = $strupdatetanggal . " hasil_tender_date ='$tglhsltender' , ";
        }

        if ($tglkickoff !== "") {
            $tglkickoff = date('Y-m-d H:i', strtotime($tglkickoff));
            $strupdatetanggal = $strupdatetanggal . " kick_off_date = '$tglkickoff', ";
        }

        if ($tglspmk !== "") {
            $tglspmk = date('Y-m-d', strtotime($tglspmk));
            $strupdatetanggal = $strupdatetanggal . " spkm_date = '$tglspmk' , ";
        }


        if ($tglawalkerja !== "") {
            $tglawalkerja = date('Y-m-d', strtotime($tglawalkerja));
            $strupdatetanggal = $strupdatetanggal . " awal_pengerjaan_date = '$tglawalkerja', ";
        }

        if ($tglakhirkerja !== "") {
            $tglakhirkerja = date('Y-m-d', strtotime($tglakhirkerja));
            $strupdatetanggal = $strupdatetanggal . " akhir_pengerjaan_date = '$tglakhirkerja', ";
        }

        if ($tglbukapnwrn !== "") {
            $tglbukapnwrn = date('Y-m-d', strtotime($tglbukapnwrn));
            $strupdatetanggal = $strupdatetanggal . " ba_buka_penawaran_date = '$tglbukapnwrn', ";
        }

        try {
            $query = " update biss_eval_penawaran_supplier set  nama_pekerjaan= '$nmpekerjaan', document_no='$nodoc', document_date='$tgldoc', tahun_pekerjaan='$thnpekerjaan', kelompok_pekerjaan='$kelpekerjaan', 
                                            jenis_harga='$jnshrg', lama_pekerjaan=$lamapekerjaan, satuan_hari='$sathari',pertimbangan_pengajuan='$pertimbangan',harga_anggaran=$hrganggaran,tempat_buka_penawaran = '$tempatbukapnwrn',
                                            harga_kisaran= $hrgkisaran,  no_ba_awjg='$noawjg', tempat_awjg='$ruangawjg',no_hsl_tender='$nohsltender',no_ba_kick_off='$nokickoff',tempat_kick_off='$ruangkickoff', no_spmk='$nospmk', 
                                            keterangan='$ket', statusdoc='$stsdoc'," . $strupdatetanggal . " last_update_by = '$updby', last_update_date =sysdate()
                      where evaluasi_penawaran_id = $evalid ";


            //$query= $query." values ('$kode','$nama', '$user',sysdate)";
            //  echo $query;
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

    function update_status_evaluasi_penawaran($tipeapp, $stsdoc, $evalid, $updby, $link)
    {
        try {

            $nmkolom_by = "";
            $nmkolom_date = "";

            if ($tipeapp == "app_review") {
                $nmkolom_by = "review_by";
                $nmkolom_date = "review_date";
            } else if ($tipeapp == "app_prepare") {
                $nmkolom_by = "prepare_by";
                $nmkolom_date = "prepare_date";
            } else if ($tipeapp == "app_approved") {
                $nmkolom_by = "approved_by";
                $nmkolom_date = "approved_date";
            } else if ($tipeapp == "app_approved_user") {
                $nmkolom_by = "approved_user_by";
                $nmkolom_date = "approved_user_date";
            } else if ($tipeapp == "app_approved_keu") {
                $nmkolom_by = "approved_keu_by";
                $nmkolom_date = "approved_keu_date";
            }
            // else if($tipeapp == "app_atasan_pengelola"){
            //     $nmkolom_by = "app_atasan_pengelola_by";
            //     $nmkolom_date = "app_atasan_pengelola_date";
            // }
            // else if($tipeapp == "app_terima_peminta"){
            //     $nmkolom_by = "app_terima_peminta_by";
            //     $nmkolom_date = "app_terima_peminta_date";
            // }


            $query = "update biss_eval_penawaran_supplier  set statusdoc = '$stsdoc', $nmkolom_by =  '$updby', $nmkolom_date = sysdate(),
                        LAST_UPDATE_BY = '$updby', LAST_UPDATE_DATE = sysdate()
                    where evaluasi_penawaran_id = $evalid ";

            //  echo "SQL : ".$query;
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

    function update_lampiran_evaluasi_penawaran($evalid, $nmuser, $namafile, $link)
    {
        try {

            $query = "update biss_eval_penawaran_supplier set lampiran =  '$namafile', LAST_UPDATE_BY = '$nmuser', LAST_UPDATE_DATE = sysdate()";
            $query = $query . " where evaluasi_penawaran_id = $evalid ";

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

    function update_kesimpulan_pemenang($evalid, $link)
    {
        try {


            $query = "update biss_eval_penawaran_supplier set 
                vendor_id = (select vendor_id from vu_eval_penawaran_supplier_detail where subtotal_score =
                                   (select max(subtotal_score) as max_score from vu_eval_penawaran_supplier_detail where evaluasi_penawaran_id = $evalid) ),
                harga_pekerjaan = (select  harga_kesepakatan
                                    from vu_eval_penawaran_supplier_detail where subtotal_score =
                                   (select max(subtotal_score) as max_score from vu_eval_penawaran_supplier_detail where evaluasi_penawaran_id = $evalid) ),
                waktu_pekerjaan = ( select waktu_pelaksanaan
                                    from vu_eval_penawaran_supplier_detail where subtotal_score =
                                   (select max(subtotal_score) as max_score from vu_eval_penawaran_supplier_detail where evaluasi_penawaran_id = $evalid) ),
                max_score = (select subtotal_score
                                    from vu_eval_penawaran_supplier_detail where subtotal_score =
                                   (select max(subtotal_score) as max_score from vu_eval_penawaran_supplier_detail where evaluasi_penawaran_id = $evalid) )
                 where evaluasi_penawaran_id = $evalid ";

            //  echo $query;
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

    function update_no_hasil_tender($evalid, $nohsltender, $tglhasiltender, $link)
    {
        try {

            $strkolom = "";
            // echo "tanggal : ".$tglhasiltender;

            if ($tglhasiltender !== "") {
                $tglhasiltender = date('Y-m-d', strtotime($tglhasiltender));
                $strkolom = ", hasil_tender_date = '" . $tglhasiltender . "'";
            }

            $query = "update biss_eval_penawaran_supplier set no_hsl_tender = '$nohsltender' $strkolom where evaluasi_penawaran_id = $evalid ";

            //echo $query;
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

    function update_no_spmk($evalid, $nospmk, $link)
    {
        try {

            $strkolom = "";

            // if($tglhasiltender !== ""){
            //       $tglhasiltender = date('Y-m-d', strtotime($tglhasiltender));
            //       $strkolom = ", hasil_tender_date = ".$tglhasiltender;
            // }

            $query = "update biss_eval_penawaran_supplier set no_spmk = '$nospmk', spkm_date = sysdate() where evaluasi_penawaran_id = $evalid ";

            //  echo $query;
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

    function update_no_ba_aanwijzing($evalid, $noawjg, $link)
    {
        try {

            $strkolom = "";

            // if($tglhasiltender !== ""){
            //       $tglhasiltender = date('Y-m-d', strtotime($tglhasiltender));
            //       $strkolom = ", hasil_tender_date = ".$tglhasiltender;
            // }

            $query = "update biss_eval_penawaran_supplier set no_ba_awjg = '$noawjg'where evaluasi_penawaran_id = $evalid ";

            //  echo $query;
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

    function update_no_ba_kickoff($evalid, $nokickoff, $link)
    {
        try {

            $strkolom = "";

            // if($tglhasiltender !== ""){
            //       $tglhasiltender = date('Y-m-d', strtotime($tglhasiltender));
            //       $strkolom = ", hasil_tender_date = ".$tglhasiltender;
            // }

            $query = "update biss_eval_penawaran_supplier set no_ba_kick_off = '$nokickoff' where evaluasi_penawaran_id = $evalid ";

            //  echo $query;
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

    function update_no_undangan_kickoff($evalid, $noundkickoff, $link)
    {
        try {

            $strkolom = "";



            $query = "update biss_eval_penawaran_supplier set no_undangan_kickoff = '$noundkickoff', undangan_kickoff_date = sysdate() where evaluasi_penawaran_id = $evalid  ";

            //  echo $query;
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

    function update_no_buka_penawaran($evalid, $nobukapnwrn, $link)
    {
        try {

            $strkolom = "";

            // if($tglhasiltender !== ""){
            //       $tglhasiltender = date('Y-m-d', strtotime($tglhasiltender));
            //       $strkolom = ", hasil_tender_date = ".$tglhasiltender;
            // }

            $query = "update biss_eval_penawaran_supplier set no_ba_buka_penawaran = '$nobukapnwrn', ba_buka_penawaran_date = sysdate() where evaluasi_penawaran_id = $evalid ";

            //  echo $query;
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


    function delete_evaluasi_penawaran_supplier($evalid, $link)
    {

        $query = "delete from biss_eval_penawaran_supplier where evaluasi_penawaran_id=$evalid";
        $cmd = mysql_query($query, $link);

        try {
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

    function get_query_data_evaluasi_penawaran_supplier($filterquery, $search_keyword, $limit_start, $limit)
    {

        $sql = "select * from vu_eval_penawaran_supplier ";

        if ($filterquery == "SEARCH") {
            $sql = $sql . " where (document_no like '$search_keyword' or nama_pekerjaan like '$search_keyword'
                    or tahun_pekerjaan like '$search_keyword'  or kelompok_pekerjaan like '$search_keyword' or jenis_harga like '$search_keyword' 
                    or lama_pekerjaan like '$search_keyword' or satuan_hari like '$search_keyword' or harga_anggaran like '$search_keyword' or harga_kisaran like '$search_keyword'
                    or kesimpulan like '$search_keyword' or no_ba_awjg like '$search_keyword' or no_hsl_tender like '$search_keyword' or no_ba_kick_off like '$search_keyword' 
                    or no_spmk like '$search_keyword' or keterangan like '$search_keyword' or vendor_code_name like '$search_keyword' )";
        }

        $sql = $sql . " ORDER BY tahun_pekerjaan DESC, document_no DESC, document_date DESC LIMIT $limit_start, $limit ";
        return $sql;

    }

    function get_query_data_evaluasi_penawaran_supplier_by_statusdoc($filterquery, $stsdoc, $search_keyword, $limit_start, $limit)
    {

        $sql = "select * from vu_eval_penawaran_supplier where statusdoc = '$stsdoc'  ";

        if ($filterquery == "SEARCH") {
            $sql = $sql . " and (document_no like '$search_keyword' or nama_pekerjaan like '$search_keyword'
                    or tahun_pekerjaan like '$search_keyword'  or kelompok_pekerjaan like '$search_keyword' or jenis_harga like '$search_keyword' 
                    or lama_pekerjaan like '$search_keyword' or satuan_hari like '$search_keyword' or harga_anggaran like '$search_keyword' or harga_kisaran like '$search_keyword'
                    or kesimpulan like '$search_keyword' or no_ba_awjg like '$search_keyword' or no_hsl_tender like '$search_keyword' or no_ba_kick_off like '$search_keyword' 
                    or no_spmk like '$search_keyword' or keterangan like '$search_keyword' or vendor_code_name like '$search_keyword' )";
        }

        $sql = $sql . " ORDER BY tahun_pekerjaan DESC, document_no DESC, document_date DESC LIMIT $limit_start, $limit ";
        return $sql;

    }

    function get_query_total_data_evaluasi_penawaran_supplier($filterquery, $search_keyword, $link)
    {

        try {
            $sql = "select count(evaluasi_penawaran_id) as jumlah from vu_eval_penawaran_supplier  ";

            if ($filterquery == "SEARCH") {
                $sql = $sql . " where (document_no like '$search_keyword' or nama_pekerjaan like '$search_keyword'
                    or tahun_pekerjaan like '$search_keyword'  or kelompok_pekerjaan like '$search_keyword' or jenis_harga like '$search_keyword' 
                    or lama_pekerjaan like '$search_keyword' or satuan_hari like '$search_keyword' or harga_anggaran like '$search_keyword' or harga_kisaran like '$search_keyword'
                    or kesimpulan like '$search_keyword' or no_ba_awjg like '$search_keyword' or no_hsl_tender like '$search_keyword' or no_ba_kick_off like '$search_keyword' 
                    or no_spmk like '$search_keyword' or keterangan like '$search_keyword'  )";
            }

            $exec_sql = mysql_query($sql) or die(mysql_error());

            $hasil = mysql_fetch_assoc($exec_sql);

            if (empty($hasil["jumlah"])) {
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

    function get_query_total_data_evaluasi_penawaran_supplier_by_statusdoc($filterquery, $stsdoc, $search_keyword, $link)
    {

        try {
            $sql = "select count(evaluasi_penawaran_id) as jumlah from vu_eval_penawaran_supplier where statusdoc = '$stsdoc' ";

            if ($filterquery == "SEARCH") {
                $sql = $sql . " and (document_no like '$search_keyword' or nama_pekerjaan like '$search_keyword'
                    or tahun_pekerjaan like '$search_keyword'  or kelompok_pekerjaan like '$search_keyword' or jenis_harga like '$search_keyword' 
                    or lama_pekerjaan like '$search_keyword' or satuan_hari like '$search_keyword' or harga_anggaran like '$search_keyword' or harga_kisaran like '$search_keyword'
                    or kesimpulan like '$search_keyword' or no_ba_awjg like '$search_keyword' or no_hsl_tender like '$search_keyword' or no_ba_kick_off like '$search_keyword' 
                    or no_spmk like '$search_keyword' or keterangan like '$search_keyword'  )";
            }

            $exec_sql = mysql_query($sql) or die(mysql_error());

            $hasil = mysql_fetch_assoc($exec_sql);

            if (empty($hasil["jumlah"])) {
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

    function get_data_evaluasi_penawran_supplier($evalid, $link)
    {
        $data = array();

        $query = "select e.*, DAYOFWEEK(awjg_date) as hari_awjg, DAYOFWEEK(kick_off_date) as hari_kickoff, DAYOFWEEK(ba_buka_penawaran_date) as hari_buka_penawaran from vu_eval_penawaran_supplier e where evaluasi_penawaran_id = '$evalid'";
        //        echo $query;
        $cmd = mysql_query($query, $link);

        while ($hasil = mysql_fetch_assoc($cmd)) {

            $data['evaluasi_penawaran_id'] = $hasil['evaluasi_penawaran_id'];
            $data['nama_pekerjaan'] = $hasil['nama_pekerjaan'];
            $data['document_no'] = $hasil['document_no'];
            $data['document_date'] = date("d-m-Y h:i:s a", strtotime($hasil['document_date']));
            $data['tahun_pekerjaan'] = $hasil['tahun_pekerjaan'];
            $data['kelompok_pekerjaan'] = $hasil['kelompok_pekerjaan'];
            $data['jenis_harga'] = $hasil['jenis_harga'];
            $data['lama_pekerjaan'] = $hasil['lama_pekerjaan'];
            $data['satuan_hari'] = $hasil['satuan_hari'];
            $data['pertimbangan_pengajuan'] = $hasil['pertimbangan_pengajuan'];
            $data['harga_anggaran'] = $hasil['harga_anggaran'];
            $data['harga_kisaran'] = $hasil['harga_kisaran'];
            $data['kesimpulan'] = $hasil['kesimpulan'];
            $data['no_ba_awjg'] = $hasil['no_ba_awjg'];
            $data['awjg_date'] = $hasil['awjg_date'];
            $data['tempat_awjg'] = $hasil['tempat_awjg'];
            $data['no_hsl_tender'] = $hasil['no_hsl_tender'];
            $data['hasil_tender_date'] = $hasil['hasil_tender_date'];
            $data['no_ba_kick_off'] = $hasil['no_ba_kick_off'];
            $data['kick_off_date'] = $hasil['kick_off_date'];
            $data['tempat_kick_off'] = $hasil['tempat_kick_off'];
            $data['no_spmk'] = $hasil['no_spmk'];
            $data['spkm_date'] = $hasil['spkm_date'];
            $data['no_undangan_kickoff'] = $hasil['no_undangan_kickoff'];
            $data['undangan_kickoff_date'] = $hasil['undangan_kickoff_date'];
            $data['awal_pengerjaan_date'] = $hasil['awal_pengerjaan_date'];
            $data['akhir_pengerjaan_date'] = $hasil['akhir_pengerjaan_date'];
            $data['vendor_id'] = $hasil['vendor_id'];
            $data['harga_pekerjaan'] = $hasil['harga_pekerjaan'];
            $data['waktu_pekerjaan'] = $hasil['waktu_pekerjaan'];
            $data['vendor_code'] = $hasil['vendor_code'];
            $data['vendor_name'] = $hasil['vendor_name'];
            $data['vendor_code_name'] = $hasil['vendor_code_name'];
            $data['keterangan'] = $hasil['keterangan'];
            $data['statusdoc'] = $hasil['statusdoc'];
            $data['prepare_by'] = $hasil['prepare_by'];
            $data['prepare_date'] = date("d-m-Y", strtotime($hasil['prepare_date']));
            $data['review_by'] = $hasil['review_by'];
            $data['review_date'] = date("d-m-Y", strtotime($hasil['review_date']));
            $data['approved_by'] = $hasil['approved_by'];
            $data['approved_date'] = date("d-m-Y", strtotime($hasil['approved_date']));
            $data['no_ba_buka_penawaran'] = $hasil['no_ba_buka_penawaran'];
            $data['ba_buka_penawaran_date'] = $hasil['ba_buka_penawaran_date'];
            $data['tempat_buka_penawaran'] = $hasil['tempat_buka_penawaran'];
            $data['created_by'] = $hasil['created_by'];
            $data['created_date'] = $hasil['created_date'];
            $data['last_update_by'] = $hasil['last_update_by'];
            $data['last_update_date'] = $hasil['last_update_date'];
            $data['hari_awjg'] = $hasil['hari_awjg'];
            $data['hari_kickoff'] = $hasil['hari_kickoff'];
            $data['hari_buka_penawaran'] = $hasil['hari_buka_penawaran'];
            // $data['tgl_pjp'] = date("d-m-Y", strtotime($hasil['tgl_pjp']));

            // $data['dept_peminta'] = $hasil['dept_peminta'];

            $data['lampiran'] = $hasil['lampiran'];


        }
        //echo $data['namajns'];
        return $data;
    }



    function get_total_evaluaasi_penawaran_by_status($stsdoc, $link)
    {

        $totalhsl = 0;

        try {

            $query = "select count(evaluasi_penawaran_id) as total
            from biss_eval_penawaran_supplier
            where statusdoc = '$stsdoc'";
            //  echo "Query : ".$query;
            //  die();
            $cmd = mysql_query($query, $link);
            $hasil = mysql_fetch_assoc($cmd);

            if (empty($hasil["total"])) {

                $totalhsl = 0;

            } else {
                $totalhsl = $hasil["total"];
            }

            return $totalhsl;

        } catch (Exception $ex) {
            $totalhsl = 0;
            return $totalhsl;
        }

    }




} // end class evaluasi penawaran


?>