<?php
    require_once("../dbdansession.php");

    $pesan = "";
    $pesanupdate = "";

    if(isset($_GET['h'])) {
        $querydelete = "DELETE FROM `rapbs` WHERE `rapbs`.`id` = ". $_GET['ids'];

        if(mysql_query($querydelete)) {
            $pesanupdate = "Berhasil Menghapus Data";
        } else {
            echo "gagal";
            echo $querydelete;
            echo mysql_error();
        }
        header("Location: rapbs.php");
    }

    if(isset($_GET['src']) && $_GET['src'] == 'n') {
        $pesanupdate = "Data RAPBS tahun ajaran ini sudah ada";
    }

    if(isset($_POST['update'])) {
        $jmlpendrutin = $_POST['pendrutin'];
        $jmlsisathnlalu = $_POST['sisatahunlalu'];
        $jmlbospusat = $_POST['bospusat'];
        $jmlbosprov = $_POST['bosprov'];
        $jmlboskota = $_POST['boskota'];
        $jmldanadekon = $_POST['dadek'];
        $jmldanatugas = $_POST['dtp'];
        $jmldanakhusus = $_POST['dak'];
        $jmllainlain = $_POST['lainlain'];
        $namasumberlain1 = $_POST['sumberlain1'];
        $namasumberlain2 = $_POST['sumberlain2'];
        $jmlsumberlain1 = $_POST['nilaisl1'];
        $jmlsumberlain2 = $_POST['nilaisl2'];
        $jmlpkomplulusan = $_POST['pkl'];
        $jmlpstandarisi = $_POST['psi'];
        $jmlpstandarproses = $_POST['psp'];
        $jmlppendidik = $_POST['pptk'];
        $jmlpsarana = $_POST['psps'];
        $jmlpstandarkelola = $_POST['pspl'];
        $jmlpstandarbiaya = $_POST['pspb'];
        $jmlpisistemnilai = $_POST['pisp'];

        $sqlz = "UPDATE `rapbs` SET `jmlpendrutin` = '". $jmlpendrutin."', `jmlsisathnlalu` = '". $jmlsisathnlalu."', `jmlbospusat` = '".$jmlbospusat."', `jmlbosprov` = '".$jmlbosprov."', `jmlboskota` = '".$jmlboskota."', `jmldanadekon` = '".$jmldanadekon."', `jmldanatugas` = '".$jmldanatugas."', `jmldanakhusus` = '".$jmldanakhusus."', `jmllainlain` = '".$jmllainlain."', `namasumberlain1` = '".$namasumberlain1."', `namasumberlain2` = '".$namasumberlain2."', `jmlsumberlain1` = '".$jmlsumberlain1."', `jmlsumberlain2` = '".$jmlsumberlain2."', `jmlpkomplulusan` = '".$jmlpkomplulusan."', `jmlpstandarisi` = '".$jmlpstandarisi."', `jmlpstandarproses` = '".$jmlpstandarproses."', `jmlppendidik` = '".$jmlppendidik."', `jmlpsarana` = '".$jmlpsarana."', `jmlpstandarkelola` = '".$jmlpstandarkelola."', `jmlpstandarbiaya` = '".$jmlpstandarbiaya."', `jmlpisistemnilai` = '".$jmlpisistemnilai."', `updated_by` = '" . $_SESSION['iduser'] . "', `updated_at` = '" . date('Y-m-d h:i:s') . "' WHERE `id` = " . $_POST['id'];

        if(mysql_query($sqlz)) {
            $pesanupdate = "Berhasil Mengubah Data";
        } else {
            echo "gagal";
            echo $sqlz;
            echo mysql_error();
        }
    }

    if(isset($_POST['pilihtahun'])) {
        $tahunx = $_POST['tahunajaran'];
        // echo $tahunx;
    } else {
        $tahunx = getdatasekolah($_SESSION['idsekolah'], "`tahunajaranaktif`");
        $querydc = "SELECT tahunajaran FROM rapbs where idsekolah = " . $_SESSION['idsekolah'] . " and tahunajaran='". $tahunx."' limit 1" ;
        $resultdc = mysql_query($querydc);
        if(mysql_num_rows($resultdc) <= 0) {
            //brrti yg tahun itu nda ada, cek apa ada tahun lainnya
            $querydc = "SELECT * FROM rapbs where idsekolah = " . $_SESSION['idsekolah'] . " limit 1" ;
            $resultdc = mysql_query($querydc);
            if(mysql_num_rows($resultdc) <= 0) {
                //nggak ada juga tahun lainnya, suruh buat
                header("Location:rapbsn.php?src=rapbs");
            }
            else {
                //ada, ambil dan tampilin
                while($rowdc = mysql_fetch_assoc($resultdc)) {
                    $tahunx = $rowdc['tahunajaran'];
                }
            }
        }
    }

    $pesan = "menampilkan RAPBS tahun ". $tahunx;
    $queryd = "SELECT * FROM rapbs where idsekolah = " . $_SESSION['idsekolah'] . " and tahunajaran='". $tahunx."' limit 1" ;
    $resultd = mysql_query($queryd);
    while($rowd = mysql_fetch_assoc($resultd)) {
        $idskrg = $rowd['id'];
        $namasekolah = getdatasekolah($_SESSION['idsekolah'], "`nama`");
        $desakelurahan = getdatasekolah($_SESSION['idsekolah'], "`desakelurahan`");
        $kecamatan = getdatasekolah($_SESSION['idsekolah'], "`kecamatan`");
        $kotakab = getdatasekolah($_SESSION['idsekolah'], "`kotakab`");
        $pendrutin = $rowd['jmlpendrutin'];
        $sisatahunlalu = $rowd['jmlsisathnlalu'];
        $bospusat = $rowd['jmlbospusat'];
        $bosprov = $rowd['jmlbosprov'];
        $boskota = $rowd['jmlboskota'];
        $dadek = $rowd['jmldanadekon'];
        $dtp = $rowd['jmldanatugas'];
        $dak = $rowd['jmldanakhusus'];
        $lainlain = $rowd['jmllainlain'];
        $sumberlain1 = $rowd['namasumberlain1'];
        $sumberlain2 = $rowd['namasumberlain2'];
        $nilaisl1 = $rowd['jmlsumberlain1'];
        $nilaisl2 = $rowd['jmlsumberlain2'];
        $pkl = $rowd['jmlpkomplulusan'];
        $psi = $rowd['jmlpstandarisi'];
        $psp = $rowd['jmlpstandarproses'];
        $pptk = $rowd['jmlppendidik'];
        $psps = $rowd['jmlpsarana'];
        $pspl = $rowd['jmlpstandarkelola'];
        $pspb = $rowd['jmlpstandarbiaya'];
        $pisp = $rowd['jmlpisistemnilai'];
        $idketuakomite = $rowd['idketuakomite'];
        $idkepsek = $rowd['idkepsek'];
        $idbendahara = $rowd['idbendahara'];
        $created_at = $rowd['created_at'];
        $totalterima = $pendrutin + $sisatahunlalu + $bospusat + $bosprov + $boskota + $dadek + $dtp + $dak + $lainlain + $nilaisl1 + $nilaisl2;
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
                <?php require_once("nav.php");?>

            </header>
            
            <div class="sixteen columns" style="position: relative; z-index: -1;">
                <!-- <div class="h-border"> -->
                    <div class="heading" style="margin-top: 20px; margin-bottom: 20px;">
                        <h1>RAPBS</h1>
                    </div>
                <!-- </div> -->
            </div>
            
            <div class="sixteen columns row">
                <center>
                    <h2>RENCANA ANGGARAN PENDAPATAN DAN BELANJA SEKOLAH</h2>
                    <br>
                    <br>
                    <br>

                    <a href="rapbsn.php" class="btn blue" style="margin: 2px" id="btnbuat">Buat Baru</a>
                    <a href="cetaklaporan.php" class="btn blue" style="margin: 2px" id="btnbuat">Cetak</a>
                    <a href="rapbs.php?act=hapus&ids=<?php echo $idskrg;?>" class="btn red" style="margin:2px" id="btnhapus">Hapus</a>
                    <?php if($pesanupdate != "") { ?>
                        <br><br><br>
                    <label style="color: green;"><b><?php echo $pesanupdate;?> </b></label>
                    <?php } ?>
                </center>
                <br>
                <?php if(isset($_GET['act']) == 'hapus') {?>
                <div align='center'>
                    <p>Apakah anda yakin ingin menghapus RAPBS sekolah tahun ajaran <?php echo $tahunx." ?";?></p>
                    <a href="rapbs.php?h=y&ids=<?php echo $_GET['ids'];?>">Ya</a>
                    <a href="rapbs.php">Tidak</a>
                </div>
                <?php } ?>
            </div>
            <div class="row">
            </div>
            <div class="row" id="buatbaru" style="display: block; margin-top: -20px;">
                <br>
                <form method="POST">
                <input type="hidden" name="id" value="<?php echo $idskrg; ?>">
                    <label>Tahun Ajaran:  </label>
                        <select name="tahunajaran">
                        <?php 
                            $querythn = "SELECT DISTINCT tahunajaran from rapbs where idsekolah = " . $_SESSION['idsekolah'];
                            $resultthn = mysql_query($querythn);
                            while($rowthn = mysql_fetch_assoc($resultthn))
                            {
                                $tahunxa = $rowthn['tahunajaran'];
                        ?>
                            <option value="<?php echo $tahunxa;?>"><?php echo $tahunxa;?></option>
                        <?php } ?>
                        </select>&nbsp;<button href="rapbs.php">Pilih</button>
                    <br>
                    <label>Nama Sekolah:  </label>
                        <label><?php echo $namasekolah;?></label>
                    <br>
                    <label>Desa/Kecamatan:  </label>
                        <label><?php echo $desakelurahan . " / " . $kecamatan;?></label>
                    <br>
                    <label>Kabupaten/Kota:  </label>
                        <label><?php echo $kotakab;?></label>
                    <br>
                    <br>
                    <label style="color:green;"><?php echo $pesan;?></label><br><br>
                    <table border="1" class="pure-table pure-table-bordered" style="margin-right: 20px;">
                        <tr align="center">
                            <td colspan="4">PENERIMAAN</td>
                            <td colspan="3">RENCANA BELANJA</td>
                        </tr>
                        <tr align="center">
                            <td>No. Urut</td>
                            <td>No. Kode</td>
                            <td>Uraian</td>
                            <td>Jumlah</td>

                            <td>No. Kode</td>
                            <td>Uraian</td>
                            <td>Jumlah</td>
                        </tr>
                        <tr align="center">
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>

                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                        </tr>
                        <tr>
                            <td align="center"><b>I</b></td>
                            <td align="center"><b>1</b></td>
                            <td><b>Sisa Tahun Lalu</b></td>
                            <td><input type="number" onchange="updatetotal()" name="sisatahunlalu" id="sisatahunlalu" value="<?php echo $sisatahunlalu;?>"></td>
                            <td>&nbsp;</td>
                            <td><b>Program Sekolah</b></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td align="center">1</td>
                            <td>Pengembangan Kompetensi Lulusan</td>
                            <td><input type="text" name="pkl" value="<?php echo $pkl;?>"></td>
                        </tr>
                        <tr>
                            <td align="center"><b>II</b></td>
                            <td align="center"><b>2</b></td>
                            <td><b>Pendapatan Rutin</b></td>
                            <td><input type="number" onchange="updatetotal()" name="pendrutin" id="pendrutin" value="<?php echo $pendrutin;?>"></td>
                            <td align="center">2</td>
                            <td>Pengembangan Standar Isi</td>
                            <td><input type="text" name="psi" value="<?php echo $psi;?>"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td align="center">3</td>
                            <td>Pengembangan Standar Proses</td>
                            <td><input type="text" name="psp" value="<?php echo $psp;?>"></td>
                        </tr>
                        <tr>
                            <td align="center"><b>III</b></td>
                            <td align="center"><b>3</b></td>
                            <td><b>Bantuan Operasional Sekolah (BOS)</b></td>
                            <td>&nbsp;</td>
                            <td align="center">4</td>
                            <td>Pengembangan Pendidik dan Tenaga Kependidikan</td>
                            <td><input type="text" name="pptk" value="<?php echo $pptk;?>"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">3.1</td>
                            <td>BOS Pusat</td>
                            <td><input type="number" onchange="updatetotal()" name="bospusat" id="bospusat" value="<?php echo $bospusat;?>"></td>
                            <td align="center">5</td>
                            <td>Pengembangan Sarana dan Prasarana Sekolah</td>
                            <td><input type="text" name="psps" value="<?php echo $psps;?>"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">3.2</td>
                            <td>BOS Provinsi</td>
                            <td><input type="number" onchange="updatetotal()" name="bosprov" id="bosprov" value="<?php echo $bosprov;?>"></td>
                            <td align="center">6</td>
                            <td>Pengembangan Standar Pengelolaan</td>
                            <td><input type="text" name="pspl" value="<?php echo $pspl;?>"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">3.3</td>
                            <td>BOS Kabupaten/Kota</td>
                            <td><input type="number" onchange="updatetotal()" name="boskota" id="boskota" value="<?php echo $boskota;?>"></td>
                            <td align="center">7</td>
                            <td>Pengembangan Standar Pembiayaan</td>
                            <td><input type="text" name="pspb" value="<?php echo $pspb;?>"></td>
                        </tr>
                        <tr>
                            <td align="center"><b>IV</b></td>
                            <td align="center"><b>4</b></td>
                            <td><b>Bantuan</b></td>
                            <td>&nbsp;</td>
                            <td align="center">8</td>
                            <td>Pengembangan dan Implementasi Sistem Penilaian</td>
                            <td><input type="text" name="pisp" value="<?php echo $pisp;?>"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">4.1</td>
                            <td>Dana dekonsentrasi</td>
                            <td><input type="number" onchange="updatetotal()" name="dadek" id="dadek" value="<?php echo $dadek;?>"></td>
                            <!-- <td rowspan="7">&nbsp;</td> -->
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">4.2</td>
                            <td>Dana Tugas Pembantuan</td>
                            <td><input type="number" onchange="updatetotal()" name="dtp" id="dtp" value="<?php echo $dtp;?>"></td>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">4.3</td>
                            <td>Dana Alokasi Khusus</td>
                            <td><input type="number" onchange="updatetotal()" name="dak" id="dak" value="<?php echo $dak;?>"></td>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">4.2</td>
                            <td>Lain-lain (bantuan luar negeri/hibah)*</td>
                            <td><input type="number" onchange="updatetotal()" name="lainlain" id="lainlain" value="<?php echo $lainlain;?>"></td>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center"><b>V</b></td>
                            <td align="center"><b>5</b></td>
                            <td><b>Sumber Pendapatan Lainnya</b></td>
                            <td>&nbsp;</td>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">5.1</td>
                            <td><input type="text" name="sumberlain1" value="<?php echo $sumberlain1;?>"></td>
                            <td><input type="number" onchange="updatetotal()" name="nilaisl1" id="nilaisl1" value="<?php echo $nilaisl1;?>"></td>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">5.2</td>
                            <td><input type="text" name="sumberlain2" value="<?php echo $sumberlain2;?>"></td>
                            <td><input type="number" onchange="updatetotal()" name="nilaisl2" id="nilaisl2" value="<?php echo $nilaisl2;?>"></td>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3">Jumlah Penerimaan</td>
                            <td><input type="text" id="total" value="<?php echo $totalterima;?> "/></td>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="7">*sebutkan jika ada</td>
                        </tr>
                        <tr>
                        <td colspan="7" align="center">
                        <table>
                            <td>Ketua Komite: <?php echo getuser($idketuakomite)['namalengkapdgngelar'] . " - NIP: " . getuser($idketuakomite)['nipnik'].")";?></td>
                            <td>Kepala Sekolah: <?php echo getuser($idkepsek)['namalengkapdgngelar'] . " - NIP: " . getuser($idketuakomite)['nipnik'];?></td>
                            <td>Bendahara: <?php echo getuser($idbendahara)['namalengkapdgngelar'] . " - NIP: " . getuser($idketuakomite)['nipnik'];?></td>
                        </table>
                        </td>
                        </tr>
                        <tr>
                            <td colspan="7" align="center">
                                <input type="submit" class="btn black-grey" name="update" value="Simpan Perubahan RAPBS">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
           
            <?php require_once("footer.php");?>
        </div>
        <!--Close Container Div-->
        <!--Grab JS Files-->
        <script src="js/jquery.js" ></script>
        <script src="js/jquery.flexslider.js" ></script>
        <script>
            function updatetotal() {
                var total = 0;
              var sisatahunlalu = parseInt(document.getElementById('sisatahunlalu').value);
              var pendrutin = parseInt(document.getElementById('pendrutin').value);
              var bospusat = parseInt(document.getElementById('bospusat').value);
              var bosprov = parseInt(document.getElementById('bosprov').value);
              var boskota = parseInt(document.getElementById('boskota').value);
              var dadek = parseInt(document.getElementById('dadek').value);
              var dtp = parseInt(document.getElementById('dtp').value);
              var dak = parseInt(document.getElementById('dak').value);
              var lainlain = parseInt(document.getElementById('lainlain').value);
              var nilaisl1 = parseInt(document.getElementById('nilaisl1').value);
              var nilaisl2 = parseInt(document.getElementById('nilaisl2').value);
              total = pendrutin + sisatahunlalu + bospusat + bosprov + boskota + dadek + dtp + dak + lainlain + nilaisl1 + nilaisl2;
              document.getElementById('total').value = total;
            }
        </script>
    </body>
</html>