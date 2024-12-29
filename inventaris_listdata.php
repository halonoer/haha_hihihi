<html>
<?php
// $tipe_form = $_GET['jns'];
// $aksesubah = $_GET['ub'];
// $akseshapus = $_GET['del'];
// $aksescetak = $_GET['ct'];
// $user_id = $_GET['uid'];
// $menu_id = $_GET['mn'];

?>

<head>
</head>

<body>

    <div class="table-responsive text-nowrap">
        <table class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr style="font-weight: bold;">
                    <td class="sticky-col first-col" style="vertical-align:middle;text-align:center;">No</td>
                    <td class="sticky-col second-col" style="vertical-align:middle;text-align:center;">Ubah</td>
                    <td style="vertical-align:middle;text-align:center;">Hapus</td>
                    <td style="vertical-align:middle;text-align:center;">No Inventaris</td>
                    <td style="vertical-align:middle;text-align:center;">Jenis Barang</td>
                    <td style="vertical-align:middle;text-align:center;">Nama Barang</td>
                    <td style="vertical-align:middle;text-align:center;">User</td>
                    <td style="vertical-align:middle;text-align:center;">Lokasi Barang</td>
                    <td style="vertical-align:middle;text-align:center;">Unit Kerja</td>
                    <td style="vertical-align:middle;text-align:center;">Dientri Oleh</td>
                    <td style="vertical-align:middle;text-align:center;">Tgl Entri</td>
                    <td style="vertical-align:middle;text-align:center;">Diupdate Oleh</td>
                    <td style="vertical-align:middle;text-align:center;">Tgl Update</td>


                </tr>
            </thead>
            <tbody>
                <?php
                include("bissnet.php");
                include("classinventaris.php");

                $objinventaris = new inventaris();

                $s_keyword = "";

                if (isset($_POST['param_keyword'])) {

                    $s_keyword = $_POST['param_keyword'];

                }

                $page = (isset($_POST['param_page'])) ? $_POST['param_page'] : 1;
                $limit = 10;
                $limit_start = ($page - 1) * $limit;
                $no = $limit_start + 1;

                $search_keyword = '%' . $s_keyword . '%';

                if ($search_keyword !== '%%') {
                    $datainventaris = $objinventaris->ViewDataInventaris_search($search_keyword, $limit_start, $limit, $link);
                } else {
                    $datainventaris = $objinventaris->ViewDataInventaris_all($limit_start, $limit, $link);

                }


                $exec_sql = mysql_query($datainventaris) or die(mysql_error());

                //if ($dewan1->num_rows > 0) {
                while ($row = mysql_fetch_assoc($exec_sql)) {

                    $in_kdbarang = $row['kdbarang'];
                    $in_nodocinventaris = $row['noinventaris'];
                    $in_namajenis = $row['namajns'];
                    $in_namabarang = $row['namabrg'];
                    $in_namaruangan = $row['namaruangan'];
                    $in_namauser = $row['nmuser'];
                    $in_unitkerja = $row['DEPARTMENT_NAME'];
                    $in_created_by = $row['created_by'];
                    $in_created_date = $row['created_date'];
                    $in_last_update_by = $row['last_update_by'];
                    $in_last_update_date = $row['last_update_date'];
                    $in_foto = $row['foto'];
                    ?>

                <tr style="">
                    <td class="sticky-col first-col" style="vertical-align:middle;text-align:center;font-size: 14px;">
                        <?php echo $no++; ?>
                    </td>
                    <td class="sticky-col second-col" style="vertical-align:middle;text-align:center;"><a
                            onclick="validasi_akses('ubah',<?php echo $in_kdbarang; ?> )" href="#"><i
                                class="fas fa-edit"></i>
                    </td>
                    <td style="vertical-align:middle;text-align:center;">
                        <a href="#" onclick="delete_inventaris(<?php echo $in_kdbarang; ?>,'<?php echo $in_nodocinventaris; ?>',
                '<?//php// echo $user_id; ?>','<?php echo $in_foto; ?>')" class="text-danger delete-link"><i
                                class="far fa-trash-alt"></i></a>
                    </td>

                    <!-- ========================================================================================= -->

                    <td style="ventical-align:middle;font-size: 14px;"><?php echo $in_nodocinventaris; ?></td>
                    <td style="vertical-align:middle;font-size: 14px;"><?php echo $in_namajenis; ?></td>
                    <td style="vertical-align:middle;font-size: 14px;"><?php echo $in_namabarang; ?></td>
                    <td style="vertical-align:middle;font-size: 14px;"><?php echo $in_namauser; ?></td>
                    <td style="vertical-align:middle;font-size: 14px;"><?php echo $in_namaruangan; ?></td>
                    <td style="vertical-align:middle;font-size: 14px;"><?php echo $in_unitkerja; ?></td>
                    <td style="vertical-align:middle;font-size: 14px;"><?php echo $in_created_by; ?></td>
                    <td style="vertical-align:middle;font-size: 14px;">
                        <?php echo date('d/m/Y H:i:s', strtotime($in_created_date)); ?>
                    </td>
                    <td style="vertical-align:middle;font-size: 14px;"><?php echo $in_last_update_by; ?></td>
                    <td style="vertical-align:middle;font-size: 14px;">
                        <?php echo date('d/m/Y H:i:s', strtotime($in_last_update_date)); ?>
                    </td>

                </tr>

                <!-- <tr>
                <td colspan='7'>Tidak ada data ditemukan</td>
            </tr> -->
                <?php } ?>
            </tbody>
        </table>
    </div> <!-- overflow x auto -->

    <?php
    if ($search_keyword !== '%%') {

        $query_jumlah = $objinventaris->get_total_data_search($search_keyword, $link);

    } else {

        $query_jumlah = $objinventaris->get_total_all_data($link);

    }
    //$exec_sql = mysql_query($query_jumlah) or die(mysql_error());
    
    //$row = mysql_fetch_array($exec_sql);
    $total_records = $query_jumlah;
    ?>

    <p>Total Data : <?php echo $total_records; ?></p>
    <nav class="mb-5">
        <ul class="pagination justify-content-end">
            <?php
            $jumlah_page = ceil($total_records / $limit);
            $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
            $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1;
            $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page;
            // echo "jml halaman".$jumlah_page;
            // echo "page".$page;
            if ($page == 1) {
                echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
            } else {
                $link_prev = ($page > 1) ? $page - 1 : 1;
                echo '<li class="page-item halaman" id="1"><a class="page-link" href="#">First</a></li>';
                echo '<li class="page-item halaman" id="' . $link_prev . '"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
            }

            for ($i = $start_number; $i <= $end_number; $i++) {
                $link_active = ($page == $i) ? ' active' : '';
                echo '<li class="page-item halaman ' . $link_active . '" id="' . $i . '"><a class="page-link" href="#">' . $i . '</a></li>';
            }

            if ($page == $jumlah_page) {
                echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
            } elseif ($page == 1 && $jumlah_page == 0) {
                echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
            } else {
                $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;
                echo '<li class="page-item halaman" id="' . $link_next . '"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                echo '<li class="page-item halaman" id="' . $jumlah_page . '"><a class="page-link" href="#">Last</a></li>';
            }
            ?>
        </ul>
    </nav>

    <!-- <input name="akses_ubah" id="akses_ubah" type="hidden" class="form-control form-control" style=""
      value="<?php echo $aksesubah; ?>" required />
   <input name="akses_hapus" id="akses_hapus" type="hidden" class="form-control form-control" style=""
      value="<?php echo $akseshapus; ?>" required />
   <input name="akses_cetak" id="akses_cetak" type="hidden" class="form-control form-control" style=""
      value="<?php echo $aksescetak; ?>" required />
   <input name="user_id" id="user_id" type="hidden" class="form-control form-control" style=""
      value="<?php echo $user_id; ?> " required />
   <input name="menu_id" id="menu_id" type="hidden" class="form-control form-control" style=""
      value="<?php echo $menu_id; ?>" required /> -->
</body>

</html>



<script language="javascript">
jQuery(document).ready(function($) {

});



function validasi_akses(akses, in_kdbarang) {

    //  if (akses == 'ubah') {
    //     var akses_ubah = $("[name= 'akses_ubah']").val();

    //     if (akses_ubah == 0) {

    //        swal.fire({
    //           icon: 'warning',
    //           title: 'Pekabiss Alert',
    //           text: 'Anda tidak memiliki akses untuk fitur Ubah data inventaris.'

    //        });

    //     } else if (akses_ubah == 1) {
    var linkform = "inventaris_form.php?md=up&ii=" + in_kdbarang;
    window.location.replace(linkform);
    //     }
    //  }


}


function delete_inventaris(in_kdbarang, in_noinventaris, in_erp_user_id, lampiran) {
    var idp = in_kdbarang;
    //  var akses_hapus = $("[name='akses_hapus']").val();
    var j_det_mode = "";
    //  var user_id = $("[name= 'user_id']").val();
    // var tipe_po = $("[name= 'tipe_po']").val();


    // alert("tipe po : "+tipe_po);

    //  if (akses_hapus == 0) {

    //     swal.fire({
    //        icon: 'warning',
    //        title: 'Pekabiss Alert',
    //        text: 'Anda tidak memiliki akses untuk fitur Hapus data inventaris'

    //     });
    //  } else if (akses_hapus == 1) {


    Swal.fire({
        title: 'Apa anda yakin?',
        text: "Menghapus data inventaris yang Anda pilih ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus data'

    }).then((result) => {
        if (result.value) {

            $.ajax({
                type: "POST",
                data: "in_kdbarang=" + idp + "&in_mode_getdata=false&in_fitur_mode=del",
                url: "inventaris_proses.php",
                success: function(hasil) {
                    var objhasil = JSON.parse(hasil);
                    if (objhasil.sts_proses == "true") {

                        if (lampiran !== "") {
                            $.ajax({

                                method: "POST",
                                url: "upload_proses.php?ip=" + in_kdbarang + "&no=" +
                                    in_noinventaris +
                                    "&us=" + in_erp_user_id + "&ft=inv&md=del&fl=" +
                                    lampiran,
                                contentType: false,
                                cache: false,
                                processData: false,
                                success: function(hasil) {

                                    var objhasil = JSON.parse(hasil);

                                    if (objhasil.sts_proses == "true") {
                                        swal.fire({
                                            icon: 'info',
                                            title: 'Pekabiss Info',
                                            text: "Data Bukti Inventaris berhasil di hapus"

                                        });


                                        linkreload = "listinventaris.php";
                                        window.location.replace(linkreload);

                                        // swal.fire({
                                        //         icon: 'info',
                                        //         title: 'Pekabiss Info',
                                        //         text: "Upload data lampiran berhasil disimpan"

                                        // });  

                                    } else {

                                        swal.fire({
                                            icon: 'warning',
                                            title: 'Pekabiss Alert',
                                            text: "Terjadi permasalahan dihapus data lampiran inventaris"
                                        });
                                    }
                                }


                            });

                        } // namafile !==""
                        else {

                            swal.fire({
                                icon: 'info',
                                title: 'Pekabiss Info',
                                text: "Data dokumen inventaris berhasil dihapus"

                            });

                            linkreload = "listinventaris.php";
                            window.location.replace(linkreload);

                        } // else nmfile == ""




                    } // objhasil = true
                    else {
                        swal.fire({
                            icon: 'warning',
                            title: 'Pekabiss Alert',
                            text: "Proses hapus data dokumen inventaris tidak berhasil"

                        });

                    } // else hasil
                }
            }) // end swal
        } // end result
        else if (result.dismiss === Swal.DismissReason.cancel) {
            // swal.fire(
            // 'Cancelled',
            // 'Proses hapus data dibatalkan',
            // 'error'
            // )
        }
    })

    //  } // hps = 1
}
</script>