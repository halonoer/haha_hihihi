<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
    /* Buat header tetap di at as */
    /* Beri jarak pada konten utama agar tidak tertutup header */
    .main-content {
        padding-top: 80px;
        /* Sesuaikan dengan tinggi header */
    }
    </style>
</head>

<body>
    <div class="table-responsive text-nowrap">
        <table class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr style="font-weight: bold;">
                    <td class="sticky-col first-col" style="vertical-align:middle; text-align:center;">No</td>
                    <td class="sticky-col first-col" style="vertical-align:middle; text-align:center;">Ubah</td>
                    <td class="sticky-col first-col" style="vertical-align:middle; text-align:center;">Hapus</td>
                    <td class="sticky-col first-col" style="vertical-align:middle; text-align:center;">No Kendaraan</td>
                    <td class="sticky-col first-col" style="vertical-align:middle; text-align:center;">Jenis Kendaraan
                    </td>
                    <td class="sticky-col first-col" style="vertical-align:middle; text-align:center;">Nama Kendaraan
                    </td>
                    <td class="sticky-col first-col" style="vertical-align:middle; text-align:center;">Pabrik</td>
                    <td class="sticky-col first-col" style="vertical-align:middle; text-align:center;">Tipe Model</td>
                    <td class="sticky-col first-col" style="vertical-align:middle; text-align:center;">Tahun Pembuatan
                    </td>
                    <td class="sticky-col first-col" style="vertical-align:middle; text-align:center;">Bahan Bakar</td>
                    <td class="sticky-col first-col" style="vertical-align:middle; text-align:center;">Nomor Rangka</td>
                    <td class="sticky-col first-col" style="vertical-align:middle; text-align:center;">Nomor Mesin</td>
                    <td class="sticky-col first-col" style="vertical-align:middle; text-align:center;">Nomor Plat</td>
                    <td class="sticky-col first-col" style="vertical-align:middle; text-align:center;">Oddometer</td>
                    <td class="sticky-col first-col" style="vertical-align:middle; text-align:center;">Keterangan</td>
                    <td class="sticky-col first-col" style="vertical-align:middle; text-align:center;">Created By</td>
                    <td class="sticky-col first-col" style="vertical-align:middle; text-align:center;">Created Date</td>
                    <td class="sticky-col first-col" style="vertical-align:middle; text-align:center;">Last Update By
                    </td>
                    <td class="sticky-col first-col" style="vertical-align:middle; text-align:center;">Last Update Date
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php
                // Inisialisasi dan Pengaturan Awal
                include("bissnet.php");
                include("classkendaraan.php");

                $objkendaraan = new kendaraan();
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
                    $datakendaraan = $objkendaraan->Get_data_kendaraan_search($search_keyword, $limit_start, $limit, $link);
                } else {
                    $datakendaraan = $objkendaraan->Get_data_kendaraan_all($limit_start, $limit, $link);
                }
                // $s_keyword = "";
                // $query = "SELECT * FROM biss_kendaraan"; // Sesuaikan nama tabelnya
                // $datakendaraan = mysql_query($query, $link);
                
                $exec_sql = mysql_query($datakendaraan) or die(mysql_error());

                while ($row = mysql_fetch_assoc($exec_sql)) {
                    $in_kendaraanid = $row['kendaraan_id'];
                    $in_nokendaraan = $row['nomor_kendaraan'];
                    $in_jnskendaraan = $row['jenis_kendaraan'];
                    $in_namakendaraan = $row['nama_kendaraan'];
                    $in_pabrikan = $row['pabrikan'];
                    $in_tpmodel = $row['tipe_model'];
                    $in_thnpembuatan = $row['tahun_pembuatan'];
                    $in_bhnbakar = $row['bahan_bakar'];
                    $in_norangka = $row['nomor_rangka'];
                    $in_nomesin = $row['nomor_mesin'];
                    $in_noplat = $row['nomor_plat'];
                    $in_oddomtr = $row['oddometer'];
                    $in_keterangan = $row['keterangan'];
                    $in_createdby = $row['created_by'];
                    $in_createddate = $row['created_date'];
                    $in_lastupdateby = $row['last_update_by'];
                    $in_lastupdatedate = $row['last_update_date'];

                    // Inisialisasi variabel nomor urut
                    // $i = 1;
                    ?>

                <!-- php while ($kendaraan = mysql_fetch_assoc($datakendaraan)):  -->
                <tr style="">
                    <td class="sticky-col first-col" style="vertical-align:middle;text-align:center;font-size:14px;">
                        <?php echo $no++; ?>
                    </td>
                    <!-- Tombol Ubah -->
                    <td class="sticky-col second-col" style="vertical-align:middle; text-align:center;">
                        <a onClick="validasi_akses('ubah', <?php echo $in_kendaraanid; ?>)" href="#">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>


                    <!-- Tombol Hapus -->
                    <td style="vertical-align:middle; text-align:center;">
                        <a href="#"
                            onclick="delete_kendaraan(<?php echo $in_kendaraanid; ?>, '<?php echo $in_nokendaraan; ?>')"
                            class="text-danger delete-link">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>

                    <td style="ventical-align:middle;font-size: 14px;"><?php echo $in_nokendaraan; ?></td>
                    <td style="ventical-align:middle;font-size: 14px;"><?php echo $in_jnskendaraan; ?></td>
                    <td style="ventical-align:middle;font-size: 14px;"><?php echo $in_namakendaraan ?></td>
                    <td style="ventical-align:middle;font-size: 14px;"><?php echo $in_pabrikan ?></td>
                    <td style="ventical-align:middle;font-size: 14px;"><?php echo $in_tpmodel ?></td>
                    <td style="ventical-align:middle;font-size: 14px;"><?php echo $in_thnpembuatan ?></td>
                    <td style="ventical-align:middle;font-size: 14px;"><?php echo $in_bhnbakar ?></td>
                    <td style="ventical-align:middle;font-size: 14px;"><?php echo $in_norangka ?></td>
                    <td style="ventical-align:middle;font-size: 14px;"><?php echo $in_nomesin ?></td>
                    <td style="ventical-align:middle;font-size: 14px;"><?php echo $in_noplat ?></td>
                    <td style="ventical-align:middle;font-size: 14px;"><?php echo $in_oddomtr ?></td>
                    <td style="ventical-align:middle;font-size: 14px;"><?php echo $in_keterangan ?></td>
                    <td style="ventical-align:middle;font-size: 14px;"><?php echo $in_createdby ?></td>
                    <td style="ventical-align:middle;font-size: 14px;">
                        <?php echo date('d/m/Y H:i:s', strtotime($in_createddate)); ?>
                    </td>
                    <td style="ventical-align:middle;font-size: 14px;"><?php echo $in_lastupdateby ?></td>
                    <td style="ventical-align:middle;font-size: 14px;">
                        <?php echo date('d/m/Y H:i:s', strtotime($in_lastupdatedate)); ?>
                    </td>
                </tr>
                <!-- php $i++;  -->
                <!-- php endwhile -->
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php

    if ($search_keyword !== '%%') {
        $query_jumlah = $objkendaraan->Get_total_data_search($search_keyword, $link);
    } else {
        $query_jumlah = $objkendaraan->Get_total_all_data($link);
    }

    $total_records = $query_jumlah;
    ?>

    <p>Total Data : <?php echo $total_records; ?></p>

    <nav class="mb-5">
        <ul class="pagination justify-content-end">
            <?php
            $jumlah_page = ceil($total_records / $limit);
            $jumlah_number = 1;
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




    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->



</body>

</html>
<script language="javascript">
jQuery(document).ready(function($) {

});

function validasi_akses(akses, $in_kendaraanid) {
    var linkfrom = "kendaraan_form.php?md=up&ii=" + in_kendaraanid;
    window.location.replace(linkfrom);
}

function delete_kendaraan(in_kendaraanid, in_nokendaraan, in_erp_user_id, lampiran) {
    var idp = in_kendaraanid;

    var j_det_mode = "";
    swal.fire({
        title: 'apa anda yakin?',
        text: "Menghapus data kendaraan yang anda pilih ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus data'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "POST",
                data: "in_kendaraanid=" + idp + "&in_mode_getdata=false&in_fitur_mode=del",
                url: "kendaraan_proses.php",
                success: function(hasil) {
                    if (result.value) {
                        $.post("kendaraan_proses.php", {
                            in_kendaraanid: in_kendaraanid,
                            in_fitur_mode: 'del'
                        });
                    }
                }
            }) //ajax
        } //if
    }) //then((result))
}
</script>