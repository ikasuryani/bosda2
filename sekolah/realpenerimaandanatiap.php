<?php
    require_once("../dbdansession.php");

    $pesan = ""; 
    $totalterima = 0;
    if(isset($_POST['simpan'])) {
        $id_sekolah = $_SESSION['idsekolah'];
        $saldo = $_POST['saldo'];
        $pendapatan = $_POST['pendapatan'];
        $pusat = $_POST['pusat'];
        $provinsi = $_POST['provinsi'];
        $kab = $_POST['kab'];
        $bantuan = $_POST['bantuan'];
        $sumber = $_POST['sumber'];
        $totalterima = $saldo + $pendapatan + $pusat + $provinsi + $kab + $bantuan + $sumber;
        // print_r($_POST);
        $sql = "INSERT INTO realterima(`id`,`id_sekolah`, `saldo`, `pendapatan`, `pusat`, `provinsi`, `kab`, `bantuan`, `sumber`, `totalterima`, `created_at`) VALUES (NULL, $id_sekolah, $saldo, $pendapatan, $pusat, $provinsi, $kab, $bantuan, $sumber, $totalterima, '". date("Y-m-d h:i:s") . "')";
        
        //echo $sql;
        if(mysql_query($sql)) {
            $pesan = "Berhasil Menambahkan Data";
        } else {
            echo "gagal";
            echo $sql;
            echo mysql_error();
        }
    }
    
    
    

    //$idrkas = -1;
    $tahunx = getdatasekolah($_SESSION['idsekolah'], "`tahunajaranaktif`");
    //ambil header realterima yang paling baru
    $rkas = "SELECT * from rkas where idsekolah = " . $_SESSION['idsekolah'] . " and tahun = '". $tahunx ."' order by id desc limit 1";
    $results = mysql_query($rkas);
    while ($rows = mysql_fetch_assoc($results)) {
        $idrkas = $rows['id'];
        $idketuakomite = $rows['idketuakomite'];
        $idkepsek = $rows['idkepsek'];
        $idbendahara = $rows['idbendahara'];
    }
    
    $total = 0;
    $sqlrealterima = "SELECT * from realterima";
    $resultsqlrealterima = mysql_query($sqlrealterima);
    while ($rows = mysql_fetch_assoc($resultsqlrealterima)) {
          $total += $rows['totalterima'];
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
                        <h1>Realisasi Penerimaan Dana </h1> 
                    </div>
                <!-- </div> -->
            </div>
            
            <div class="row">
            </div>
            <div class="row" id="buatbaru" style="display: block; margin-top: -20px;">
                <br><br>
                
                    <div class="row" style="margin-top: -30px;" align="center">
                <div align="left" style="margin-left: 0px;">
                <h1>Laporan RKAS</h1><br>
                <label>Nama Sekolah:  </label>
                    <label><?php echo getdatasekolah($_SESSION['idsekolah'], "`nama`");?></label>
                <br>
                <label>Desa/Kecamatan:  </label>
                    <label><?php echo getdatasekolah($_SESSION['idsekolah'], "`desakelurahan`") . "/" .getdatasekolah($_SESSION['idsekolah'], "`kecamatan`");?></label>
                <br>
                <label>Kabupaten/Kota:  </label>
                    <label><?php echo getdatasekolah($_SESSION['idsekolah'], "`kotakab`");?></label>
                <br>
                <label>Tahun:  </label>
                    <label><?php echo $tahunx;?></label>
                <br>
                <br>
                </div>
                    <br>
                    <br>
                    <div class="row" id="buatbaru" style="display: block; margin-top: -20px;">
                <center>
                
                <form class="pure-form" method="POST">
                    <table class="pure-table pure-table-form">
                        <tr>
                            <td><label>Saldo Awal </label></td>
                            <td style="width: 1px; ">:</td>
                            <td align="left">Rp. 
                                <input type="number" onchange="updatetotal()" value="0" min="0"  name="saldo" id="saldo" width="1000"></td>
                        </tr>
                        <tr>
                            <td><label>Pendapatan rutin </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">Rp. 
                                <input type="number" onchange="updatetotal()" value="0" min="0"  name="pendapatan" id="pendapatan" width="1000"></td>
                        </tr>
                        <tr>
                            <td colspan="3">Dana Operasional Sekolah (BOS) </td>
                        </tr>
                        <tr>
                            <td><label>&nbsp&nbspPusat</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">Rp. <input type="number" onchange="updatetotal()" value="0" min="0"  name="pusat" id="pusat" width="1000"></td>
                        </tr>
                        <tr>
                            <td><label>&nbsp&nbspProvinsi</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">Rp. <input type="number" onchange="updatetotal()" value="0" min="0" name="provinsi" id="provinsi" width="1000"></td>
                        </tr>
                        <tr>
                            <td><label>&nbsp&nbspKab/Kota</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">Rp. <input type="number" onchange="updatetotal()" value="0" min="0"  name="kab" id="kab" width="1000"></td>
                        </tr>
                        <tr>
                            <td><label>Bantuan Lain</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">Rp. <input type="number" onchange="updatetotal()" value="0" min="0"  name="bantuan" id="bantuan" width="1000"></td>
                        </tr>
                        <tr>
                            <td><label>Sumber Pendapatan lainnya </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">Rp. <input type="number" onchange="updatetotal()" value="0" min="0"  name="sumber" id="sumber" width="1000"></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center"><input type="submit" class="btn-black-grey" name="simpan" value="Simpan Penerimaan Dana"></td>
                        </tr>
                        <?php if($pesan != "") { ?>
                        <tr>
                            <td colspan="3" align="center"><p style="color: green;"><b><?php echo $pesan;?></b></p></td>
                        </tr>
                        <?php } ?>
                    </table>
                </form>
                </center>
                <hr style="margin-right: 15px;">
            </div>

                    <br>
                    <br>
                    <table id="bkutambah" border="1" class="pure-table pure-table-bordered" style="margin-right: 20px;">
                        <thead>
                        <tr align="center" style="vertical-align: middle;">
                            <th rowspan="2">Tanggal</th>
                            <th rowspan="2">Saldo Awal</th>
                            <th rowspan="2">Pendapatan Rutin</th>
                            <th colspan="3">Dana Operasional Sekolah (BOS)</th>
                            <th rowspan="2">Bantuan lain</th>
                            <th rowspan="2">Sumber Pendapatan Lainnya</th>
                            <th rowspan="2">total Penerimaan</th>
                        </tr>
                        <tr>
                            <th>Pusat</th>
                            <th>Provinsi</th>
                            <th>Kab/Kota</th>
                        </tr>
                        </thead>
                    <?php
                    //ambil semua data buat diload di tabel dibawah form
                    $ambilsemua = "SELECT * from realterima where id_sekolah = '".$_SESSION['idsekolah']."' ";
                    $resulta = mysql_query($ambilsemua);
                    echo mysql_error();
                    while ($rowa = mysql_fetch_assoc($resulta)) {
                        $tgls =  $rowa['created_at'];
                        $saldo = $rowa['saldo'];
                        $pendapatan = $rowa['pendapatan'];
                        $pusat = $rowa['pusat'];
                        $provinsi = $rowa['provinsi'];
                        $kab = $rowa['kab'];
                        $bantuan = $rowa['bantuan'];
                        $sumber = $rowa['sumber'];
                        $totalterima = $rowa['totalterima'];
                ?>
                <tr>
                    <td><?php echo $tgls;?></td>
                    <td><?php echo $saldo;?></td>
                    <td><?php echo $pendapatan;?></td>
                    <td><?php echo $pusat;?></td>
                    <td><?php echo $provinsi;?></td>
                    <td><?php echo $kab;?></td>
                    <td><?php echo $bantuan;?></td>
                    <td><?php echo $sumber;?></td>
                    <td><?php echo $totalterima;?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="8" align="right">Total :</td>
                    <td><?php echo $total;?></td>
                </tr>
                    </table>
                <!--    <table id="bkutambah" border="1" class="pure-table pure-table-bordered" style="margin-right: 20px;">
                        <tr align="center" style="vertical-align: middle;">
                            <td>Nomor</td>
                            <td>Realisasi</td>
                            <td>Jumlah Dana</td>
                        </tr>
                        <tr align="center">
                            <td>1</td>
                            <td>Penerimaan Dana</td>
                            <td>Rp. <?php echo $total; ?> </td>
                            
                        </tr>
                        <tr align="center">
                            <td>2</td>
                            <td>Pengeluaran Dana</td>
                            <td>Rp. </td>                            
                        </tr>
                        
                        <tr align="center">
                            <td>3</td>
                            <td>Sisa Dana</td>
                            <td>Rp. </td>                            
                        </tr>
                        <tr>
                    <td colspan="8" align="center">
                    <table>
                        <td>Ketua Komite: <?php echo getuser($idketuakomite)['namalengkapdgngelar'] . " - NIP: " . getuser($idketuakomite)['nipnik'].")";?></td>
                        <td>Kepala Sekolah: <?php echo getuser($idkepsek)['namalengkapdgngelar'] . " - NIP: " . getuser($idketuakomite)['nipnik'];?></td>
                        <td>Bendahara: <?php echo getuser($idbendahara)['namalengkapdgngelar'] . " - NIP: " . getuser($idketuakomite)['nipnik'];?></td>
                    </table>
                    </td>
                </tr> 
                    </table>
                </form> -->
            </div>
            <div class="row" id="lihat" style="display: none; margin-top: -20px;">
                <h1>Lihat Buku Kas Umum Bulan Sebelumnya</h1>
            </div>
            <?php require_once("footer.php");?>
        </div>
        <!--Close Container Div-->
        <!--Grab JS Files-->
        <script src="js/jquery.js" ></script>
        <script src="js/jquery.flexslider.js" ></script>

    </body>
</html>
