<?php
    require_once("../dbdansession.php");

    $pesan = "";

    if(isset($_GET['src']) && $_GET['src'] == 'rapbs') { 
        $pesan = "Mengalihkan ke halaman buat baru karena tidak ada data RAPBS sekolah ditemukan";
    }

    $tahunx = getdatasekolah($_SESSION['idsekolah'], 'tahunajaranaktif');
    $querydc = "SELECT tahunajaran FROM rapbs where idsekolah = " . $_SESSION['idsekolah'] . " and tahunajaran='". $tahunx."'" ;
    $resultdc = mysql_query($querydc);
    if(mysql_num_rows($resultdc) > 0) {
        header("Location: rapbs.php?src=n");
    }

    //ambil data sekolah untuk header yang input
    $queryd = "SELECT * FROM sekolah where id = " . $_SESSION['idsekolah'];
    $resultd = mysql_query($queryd);
    while($rowd = mysql_fetch_assoc($resultd)) {
        $namasekolah = $rowd['nama'];
        $desakelurahan = $rowd['desakelurahan'];
        $kecamatan = $rowd['kecamatan'];
        $kotakab = $rowd['kotakab'];
        $idkepsek = $rowd['idkepseksekarang'];
        $tahunajaranaktif = $rowd['tahunajaranaktif'];
    }

    //simpan rapbs
    if(isset($_POST['submit'])) {
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
        $idketuakomite = $_POST['idketuakomite'];
        $idkepsek = $_POST['idkepsek'];
        $idbendahara = $_POST['idbendahara'];


        $insert = "INSERT INTO `rapbs` (`id`, `tahunajaran`, `idsekolah`, `jmlsisathnlalu`, `jmlpendrutin`, `jmlbospusat`, `jmlbosprov`, `jmlboskota`, `jmldanadekon`, `jmldanatugas`, `jmldanakhusus`, `jmllainlain`, `namasumberlain1`, `namasumberlain2`, `jmlsumberlain1`, `jmlsumberlain2`, `jmlpkomplulusan`, `jmlpstandarisi`, `jmlpstandarproses`, `jmlppendidik`, `jmlpsarana`, `jmlpstandarkelola`, `jmlpstandarbiaya`, `jmlpisistemnilai`, `idketuakomite`, `idkepsek`, `idbendahara`, `created_at`) VALUES (NULL, '".$tahunajaranaktif."', '".$_SESSION['idsekolah']."', '".$jmlsisathnlalu."', '".$jmlpendrutin."', '".$jmlbospusat."', '".$jmlbosprov."', '".$jmlboskota."', '".$jmldanadekon."', '".$jmldanatugas."', '".$jmldanakhusus."', '".$jmllainlain."', '".$namasumberlain1."', '".$namasumberlain2."', '".$jmlsumberlain1."', '".$jmlsumberlain2."', '".$jmlpkomplulusan."', '".$jmlpstandarisi."', '".$jmlpstandarproses."', '".$jmlppendidik."', '".$jmlpsarana."', '".$jmlpstandarkelola."', '".$jmlpstandarbiaya."', '".$jmlpisistemnilai."', '".$idketuakomite."', '".$idkepsek."', '".$idbendahara."', '". date('Y-m-d h:i:s') ."')";

        if(mysql_query($insert)) {
            $pesan = "Berhasil Menambahkan Data";
            header("Location: rapbs.php");
        } else {
            echo "gagal";
            echo $insert;
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
                </center>
            </div>
            <div class="row">
            </div>
            <div class="row" id="buatbaru" style="display: block; margin-top: -20px;">
                <?php if($pesan != "") { ?>
                    <p style="color: green;"><b><?php echo $pesan;?></b></p>
                <?php } ?>
                <center><h1>Buat Baru RAPBS</h1></center>
                <br><br>
                <form method="POST">
                    <label>Tahun Ajaran:  </label>
                        <label><?php echo $tahunajaranaktif;?></label>
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
                    <table border="1" class="pure-table pure-table-bordered" style="margin-right: 20px;">
                        <tr align="center">
                            <td colspan="4">PENERIMAAN</td>
                            <td colspan="3">&nbsp;</td>
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
                            <td><input type="number" onchange="updatetotal()" name="sisatahunlalu" id="sisatahunlalu" value="0"></td>
                            <td>&nbsp;</td>
                            <td><b>Program Sekolah</b></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td align="center">1</td>
                            <td>Pengembangan Kompetensi Lulusan</td>
                            <td><input type="text" name="pkl"></td>
                        </tr>
                        <tr>
                            <td align="center"><b>II</b></td>
                            <td align="center"><b>2</b></td>
                            <td><b>Pendapatan Rutin</b></td>
                            <td><input type="number" onchange="updatetotal()" name="pendrutin" id="pendrutin" value="0"></td>
                            <td align="center">2</td>
                            <td>Pengembangan Standar Isi</td>
                            <td><input type="text" name="psi"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                            <td align="center">3</td>
                            <td>Pengembangan Standar Proses</td>
                            <td><input type="text" name="psp"></td>
                        </tr>
                        <tr>
                            <td align="center"><b>III</b></td>
                            <td align="center"><b>3</b></td>
                            <td><b>Bantuan Operasional Sekolah (BOS)</b></td>
                            <td>&nbsp;</td>
                            <td align="center">4</td>
                            <td>Pengembangan Pendidik dan Tenaga Kependidikan</td>
                            <td><input type="text" name="pptk"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">3.1</td>
                            <td>BOS Pusat</td>
                            <td><input type="number" onchange="updatetotal()" name="bospusat" id="bospusat" value="0"></td>
                            <td align="center">5</td>
                            <td>Pengembangan Sarana dan Prasarana Sekolah</td>
                            <td><input type="text" name="psps"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">3.2</td>
                            <td>BOS Provinsi</td>
                            <td><input type="number" onchange="updatetotal()" name="bosprov" id="bosprov" value="0"></td>
                            <td align="center">6</td>
                            <td>Pengembangan Standar Pengelolaan</td>
                            <td><input type="text" name="pspl"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">3.3</td>
                            <td>BOS Kabupaten/Kota</td>
                            <td><input type="number" onchange="updatetotal()" name="boskota" id="boskota" value="0"></td>
                            <td align="center">7</td>
                            <td>Pengembangan Standar Pembiayaan</td>
                            <td><input type="text" name="pspb"></td>
                        </tr>
                        <tr>
                            <td align="center"><b>IV</b></td>
                            <td align="center"><b>4</b></td>
                            <td><b>Bantuan</b></td>
                            <td>&nbsp;</td>
                            <td align="center">8</td>
                            <td>Pengembangan dan Implementasi Sistem Penilaian</td>
                            <td><input type="text" name="pisp"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">4.1</td>
                            <td>Dana dekonsentrasi</td>
                            <td><input type="number" onchange="updatetotal()" name="dadek" id="dadek" value="0"></td>
                            <!-- <td rowspan="7">&nbsp;</td> -->
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">4.2</td>
                            <td>Dana Tugas Pembantuan</td>
                            <td><input type="number" onchange="updatetotal()" name="dtp" id="dtp" value="0"></td>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">4.3</td>
                            <td>Dana Alokasi Khusus</td>
                            <td><input type="number" onchange="updatetotal()" name="dak" id="dak" value="0"></td>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">4.2</td>
                            <td>Lain-lain (bantuan luar negeri/hibah)*</td>
                            <td><input type="number" onchange="updatetotal()" name="lainlain" id="lainlain" value="0"></td>
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
                            <td><input type="text" name="sumberlain1"></td>
                            <td><input type="number" onchange="updatetotal()" name="nilaisl1" id="nilaisl1" value="0"></td>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">5.2</td>
                            <td><input type="text" name="sumberlain2"></td>
                            <td><input type="number" onchange="updatetotal()" name="nilaisl2" id="nilaisl2" value="0"></td>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3">Jumlah Penerimaan</td>
                            <td><input type="text" name="totalterima" id="totalterima" value="0"></td>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="6">*sebutkan jika ada</td>
                        </tr>
                        <tr>
                        <td colspan="7" align="center">
                        <table>
                            <td>Ketua Komite: 
                                    <select name="idketuakomite">
                                        <?php
                                            $queryz = "SELECT id, nipnik, namalengkapdgngelar from user where idlembaga = '" . $_SESSION['idsekolah'] ."' and jabatan = 'Komite Sekolah'";
                                            $resultz = mysql_query($queryz);
                                            while($rowz = mysql_fetch_assoc($resultz)) {
                                                $iduser = $rowz['id'];?>
                                                <option value="<?php echo $iduser;?>"><?php echo $rowz['nipnik'] . " - " . $rowz['namalengkapdgngelar'];?>
                                                </option>
                                            <?php }
                                        ?>
                                    </select>
                            </td>
                            <td>Kepala Sekolah: 
                                    <select name="idkepsek">
                                        <?php
                                            $queryz = "SELECT id, nipnik, namalengkapdgngelar from user where idlembaga = '" . $_SESSION['idsekolah'] ."' and jabatan = 'Kepala Sekolah'";
                                            $resultz = mysql_query($queryz);
                                            while($rowz = mysql_fetch_assoc($resultz)) {
                                                $iduser = $rowz['id'];?>
                                                <option value="<?php echo $iduser;?>"><?php echo $rowz['nipnik'] . " - " . $rowz['namalengkapdgngelar'];?>
                                                </option>
                                            <?php }
                                        ?>
                                    </select>
                            </td>
                            <td>Bendahara: 
                                    <select name="idbendahara">
                                        <?php
                                            $queryz = "SELECT id, nipnik, namalengkapdgngelar from user where idlembaga = '" . $_SESSION['idsekolah'] ."' and jabatan = 'Bendahara'";
                                            $resultz = mysql_query($queryz);
                                            while($rowz = mysql_fetch_assoc($resultz)) {
                                                $iduser = $rowz['id'];?>
                                                <option value="<?php echo $iduser;?>"><?php echo $rowz['nipnik'] . " - " . $rowz['namalengkapdgngelar'];?>
                                                </option>
                                            <?php }
                                        ?>
                                    </select>
                            </td>
                        </table>
                        </td>
                        </tr>
                        <tr>
                            <td colspan="7" align="center">
                                <input type="submit" class="btn black-grey" name="submit" value="Simpan RAPBS">
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
              document.getElementById('totalterima').value = total;
            }
        </script>
        </script>
    </body>
</html>
