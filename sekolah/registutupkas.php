<?php
    require_once("../dbdansession.php");
    $pesan = "";
    if(isset($_POST['submit'])) {
        $tgl1 = $_POST['tgl1'];
        $nama = $_POST['nama'];
        $tgl2 = $_POST['tgl2'];
        $totalpenerimaan = $_POST['totalpenerimaan'];
        $totalpengeluaran = $_POST['totalpengeluaran'];
        $saldobuku = $_POST['saldobuku'];
        $saldokas = $_POST['saldokas'];
        $saldobanksuratdll = $_POST['subjumlah3'];
        // $k100 = $_POST['k100'];
        // $k50 = $_POST['k50'];
        // $k20 = $_POST['k20'];
        // $k10 = $_POST['k10'];
        // $k5 = $_POST['k5'];
        // $k1 = $_POST['k1'];
        // $l10 = $_POST['l10'];
        // $l5 = $_POST['l5'];
        // $l2 = $_POST['l2'];
        // $l1 = $_POST['l1'];
        $jk100 = $_POST['jk100'];
        $jk50 = $_POST['jk50'];
        $jk20 = $_POST['jk20'];
        $jk10 = $_POST['jk10'];
        $jk5 = $_POST['jk5'];
        $jk2 = $_POST['jk2'];
        $jk1 = $_POST['jk1'];
        $jl10 = $_POST['jl10'];
        $jl5 = $_POST['jl5'];
        $jl2 = $_POST['jl2'];
        $jl1 = $_POST['jl1'];
        // $t100 = $k100 * $jk100;
        // $t50 = $k50 * $jk50;
        // $t20 = $k20 * $jk20;
        // $t10 = $k10 * $jk10;
        // $t5 = $l5 * $jl5;
        // $t2 = $l2 * $jl2;
        // $t1 = $l1 * $jl1;
        // $total1 = $t100 + $t50 + $t20 + $t10 + $t5 + $t2 + $t1;
        // $tl10 = $l10 * $jl10;
        // $tl5 = $l5 * $jl5;
        // $tl2= $l2 * $jl2;
        // $tl1 = $l1 * $jl1;
        // $total2 = $t1000 + $t500 + $t200 + $t100;
        $saldobanksuratdll = $_POST['subjumlah3'];
        $idsekolah = $_SESSION['idsekolah'];
        $perbedaan = $_POST['perbedaan'];
        $penjelasan = $_POST['penjelasan'];
        // $sql = "INSERT INTO registertutupkas (`id`, `idsekolah`, `tanggaltutupkas`, `namapenutup`,
        //  `tanggaltutuplalu`, `jmlpenerimaan`, `jmlpengeluaran`, `saldokas`,
        //  `lbr100`, `lbr50`, `lbr20`, `lbr10`, `lbr5`, `lbr2`, `lbr1`,
        //   `koin1000`, `koin500`, `koin200`, `koin100`, `saldobanksuratdll`, `perbedaan`,
        //    `penjelasanperbedaan`, `idbendahara`, `idkepsek`, `created_at`) 
        // VALUES (NULL, '$idsekolah', '$tgl1', '$nama', '$tgl2', '$totalpenerimaan', '$totalpengeluaran', 
        //     '$saldokas', '$t100', '$t50', '$t20', $t10, '$t5', '$t2', '$t1', '$tl10',
        //     '$stl5', '$stl2', '$stl1', '$saldobanksuratdll', '$perbedaan', '$penjelasan', 1, 1, '". date("Y:m:d h:i:s") ."')";
        $sql = "INSERT INTO registertutupkas (`id`, `idsekolah`, `tgltutupkas`, `namapenutup`,
         `tgltutuplalu`, `jmlpenerimaan`, `jmlpengeluaran`, `saldokas`,
         `lbr100`, `lbr50`, `lbr20`, `lbr10`, `lbr5`, `lbr2`, `lbr1`,
          `koin1000`, `koin500`, `koin200`, `koin100`, `saldobanksuratdll`, `perbedaan`,
           `penjelasanperbedaan`, `idbendahara`, `idkepsek`, `created_at`) 
        VALUES (NULL, '$idsekolah', '$tgl1', '$nama', '$tgl2', '$totalpenerimaan', '$totalpengeluaran', 
            '$saldokas', '$jk100', '$jk50', '$jk20', $jk10, '$jk5', '$jk2', '$jk1', '$jl10', '$jl5', '$jl2', '$jl1', '$saldobanksuratdll', '$perbedaan', '$penjelasan', 1, 1, '". date("Y:m:d h:i:s") ."')";
        if(mysql_query($sql)) {
            $pesan = "Berhasil Menambahkan Data";
        } else {
            echo "gagal";
            echo $sql;
            echo mysql_error();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>BOSDA - WSRPL EGov Project</title>
        <?php require_once("style.html");?>
    </head>
    <body>
        <div class="container">
            <header class="sixteen columns alpha omega">

                <?php require_once("header-userlogin.php");?>
                <!-- <span class="fa fa-caret-down" title="Toggle dropdown menu"></span> -->
                <?php require_once("nav.php");?>

            </header>
            
            <div class="sixteen columns" style="position: relative; z-index: -1;">
                <!-- <div class="h-border"> -->
                    <div class="heading" style="margin-top: 20px; margin-bottom: 20px;">
                        <h1>Register Penutupan Kas</h1>
                    </div>
                <!-- </div> -->
            </div>
            
            <div class="sixteen columns row">
                <center>
                    <!-- <button class="btn black-grey" id="btnbuat" onclick="toggle_visibility('buatbaru', 'lihat')">Buat Baru</button>
                    <button class="btn black-grey" id="btnlihat" onclick="toggle_visibility('lihat', 'buatbaru')">Lihat Sebelumnya</button> -->
                </center>
            </div>
            <div class="row">
            </div>
            <div class="row" id="buatbaru" style="display: block; margin-top: -20px;">
                <center>
                    <h1>Buat Baru Register Penutupan Kas</h1>
                    <label style="color: green;"><b><?php if($pesan != "") {echo $pesan;}?></b></label>
                </center>
                <br><br>
                <center>
                <form class="pure-form" method="POST">
                    <table class="pure-table pure-table-form">
                        <tr>
                            <td><label>Tanggal Penutupan Kas</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left"><input type="date" name="tgl1" size="42"></td>
                        </tr>
                        <tr>
                            <td><label>Nama Penutup Kas (Pemegang Kas) </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left"><input type="text" name="nama" size="42"></td>
                        </tr>
                        <tr>
                            <td><label>Tanggal Penutupan Kas yang Lalu  </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left"><input type="date" name="tgl2" size="42"></td>
                        </tr>
                        <tr>
                            <td><label>Jumlah Total Penerimaan (D)  </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">Rp.&nbsp;&nbsp;<input type="text" name="totalpenerimaan" size="38"></td>
                        </tr>
                        <tr>
                            <td><label>Jumlah Total Pengeluaran (K)  </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">Rp.&nbsp;&nbsp;<input type="text" name="totalpengeluaran" size="38"></td>
                        </tr>
                        <tr>
                            <td><label><b>Saldo Buku (A = D - K)</b></label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">Rp.&nbsp;&nbsp;<input type="text" name="saldobuku" size="38"></td>
                        </tr>
                        <tr>
                            <td><label><b>Saldo Kas (B)</b></label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">Rp.&nbsp;&nbsp;<input type="text" name="saldokas" size="38"></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                            <br>
                            <label>Saldo kas B terdiri dari:</label></td>
                        </tr>
                        <tr>
                            <td><label>Lembaran uang kertas Rp 100.000,-</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="right"><input type="text" name="jk100" maxlength="4" size="4">
                            <label>&nbsp;&nbsp;Lembar = &nbsp;Rp.&nbsp;&nbsp;&nbsp;</label>
                            <input type="number" name="k100" size="20"></td>
                        </tr>
                        <tr>
                            <td><label>Lembaran uang kertas Rp 50.000,-</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="right"><input type="text" name="jk50" maxlength="4" size="4">
                            <label>&nbsp;&nbsp;Lembar = &nbsp;Rp.&nbsp;&nbsp;&nbsp;</label>
                            <input type="number" name="k50" size="20"></td>
                        </tr>
                        <tr>
                            <td><label>Lembaran uang kertas Rp 20.000,-</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="right"><input type="text" name="jk20" maxlength="4" size="4">
                            <label>&nbsp;&nbsp;Lembar = &nbsp;Rp.&nbsp;&nbsp;&nbsp;</label>
                            <input type="number" name="k20" size="20"></td>
                        </tr>
                        <tr>
                            <td><label>Lembaran uang kertas Rp 10.000,-</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="right"><input type="text" name="jk10" maxlength="4" size="4">
                            <label>&nbsp;&nbsp;Lembar = &nbsp;Rp.&nbsp;&nbsp;&nbsp;</label>
                            <input type="number" name="k10" size="20"></td>
                        </tr>
                        <tr>
                            <td><label>Lembaran uang kertas Rp 5.000,-</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="right"><input type="text" name="jk5" maxlength="4" size="4">
                            <label>&nbsp;&nbsp;Lembar = &nbsp;Rp.&nbsp;&nbsp;&nbsp;</label>
                            <input type="number" name="k5" size="20"></td>
                        </tr>
                        <tr>
                            <td><label>Lembaran uang kertas Rp 2.000,-</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="right"><input type="text" name="jk2" maxlength="4" size="4">
                            <label>&nbsp;&nbsp;Lembar = &nbsp;Rp.&nbsp;&nbsp;&nbsp;</label>
                            <input type="number" name="k2" size="20"></td>
                        </tr>
                        <tr>
                            <td><label>Lembaran uang kertas Rp 1.000,-</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="right">
                                <input type="text" name="jk1" maxlength="4" size="4">
                                <label>&nbsp;&nbsp;Lembar = &nbsp;Rp.&nbsp;&nbsp;&nbsp;</label>
                                <input type="number" name="k1" size="20">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" align="right">
                                <b><label>Sub Jumlah (1) Rp.&nbsp;&nbsp;</label></b>
                                <input type="text" name="subjumlah1" size="22">
                            </td>
                        </tr>
                        <tr>
                            <td><label>Keping uang logam Rp 1.000,-</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="right"><input type="text" name="jl10" maxlength="4" size="4">
                            <label>&nbsp;&nbsp;Keping = &nbsp;Rp.&nbsp;&nbsp;&nbsp;</label>
                            <input type="number" name="l10" size="20"></td>
                        </tr>
                        <tr>
                            <td><label>Keping uang logam Rp 500,-</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="right"><input type="text" name="jl5" maxlength="4" size="4">
                            <label>&nbsp;&nbsp;Keping = &nbsp;Rp.&nbsp;&nbsp;&nbsp;</label>
                            <input type="number" name="l5" size="20"></td>
                        </tr>
                        <tr>
                            <td><label>Keping uang logam Rp 200,-</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="right"><input type="text" name="jl2" maxlength="4" size="4">
                            <label>&nbsp;&nbsp;Keping = &nbsp;Rp.&nbsp;&nbsp;&nbsp;</label>
                            <input type="number" name="l2" size="20"></td>
                        </tr>
                        <tr>
                            <td><label>Keping uang logam Rp 100,-</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="right"><input type="text" name="jl1" maxlength="4" size="4">
                            <label>&nbsp;&nbsp;Keping = &nbsp;Rp.&nbsp;&nbsp;&nbsp;</label>
                            <input type="number" name="l1" size="20"></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="right">
                                <b><label>Sub Jumlah (2) Rp.&nbsp;&nbsp;</label></b>
                                <input type="text" name="subjumlah2" size="22">
                            </td>
                        </tr>
                        <tr>
                            <td>Saldo Bank, Surat Berharga, dll</td>
                            <td colspan="2" align="right">
                                <b><label>Sub Jumlah (3) Rp.&nbsp;&nbsp;</label></b>
                                <input type="text" name="subjumlah3" size="22">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" align="right">
                                <b><label>Jumlah (1 + 2 + 3) Rp.&nbsp;&nbsp;</label></b>
                                <input type="text" name="jumlah" size="22">
                            </td>
                        </tr>
                        <tr>
                            <td>Perbedaan (A - B)</td>
                            <td colspan="2" align="right">
                                <b><label>Rp.&nbsp;&nbsp;</label></b>
                                <input type="text" name="perbedaan" size="22">
                            </td>
                        </tr>
                        <tr>
                            <td>Penjelasan Perbedaan</td>
                            <td colspan="2" align="right">
                                <textarea name="penjelasan" rows="2" cols="50"></textarea>
                            </td>
                        </tr>
                    </table>
                <td colspan="3" align="center"><input type="submit" class="btn-black-grey" name="submit" value="Simpan"></td>
                </center>
                </form>
            </div>
            <div class="row" id="lihat" style="display: none; margin-top: -20px;">
                <h1>Register Tutup Kas Sebelumnya</h1>
                
            </div>
            <?php require_once("footer.php");?>
        </div>
        <!--Close Container Div-->
        <!--Grab JS Files-->
        <script src="js/jquery.js" ></script>
        <script src="js/jquery.flexslider.js" ></script>
        <script type="text/javascript">
            function toggle_visibility(id, id2) {
               var e = document.getElementById(id);
               var f = document.getElementById(id2);
               if(e.id == 'buatbaru-lihat')
                {
                    e.style.display = 'none';
                    f.style.display = 'block';
                }
               else
               {
                  e.style.display = 'block';
                  f.style.display = 'none';
               }
               switchcolor(id);
            }
        </script>
    </body>
</html>
