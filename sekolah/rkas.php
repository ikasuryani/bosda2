<?php
    require_once("../dbdansession.php");

    $pesan = "";
    $pesanupdate ="";
    
    if(isset($_POST['submit'])) {
        $nourut = $_POST['nourut'];
        $idrkas = $_POST['idrkas'];
        $idprogram = $_POST['idprogram'];
        $jumlah = $_POST['jumlah'];
        $trisatu = $_POST['trisatu'];
        $tridua = $_POST['tridua'];
        $tritiga = $_POST['tritiga'];
        $triempat = $_POST['triempat'];
        // print_r($_POST);
        $sql = "INSERT INTO dtlrkas (`id`, `idrkas`, `nourut`, `idprogram`, `jumlah`, `trisatu`, `tridua`, `tritiga`, `triempat`, `created_at`) VALUES (NULL, '$idrkas', '$nourut', '$idprogram', '$jumlah', '$trisatu', '$tridua', '$tritiga', '$triempat', '". date("Y-m-d h:i:s") . "')";
        if(mysql_query($sql)) {
            $pesan = "Berhasil Menambahkan Data";
        } else {
            echo "gagal";
            echo $sql;
            echo mysql_error();
        }
    }

    if(isset($_GET['de'])) {
        $querydelete = "DELETE FROM `dtlrkas` WHERE `dtlrkas`.`id` = ". $_GET['de'];

        if(mysql_query($querydelete)) {
            $pesanupdate = "Berhasil Menghapus Data";
        } else {
            echo "gagal";
            echo $querydelete;
            echo mysql_error();
        }
        header("Location: rkas.php");
    }
    $editid="";
    if(isset($_GET['edit'])) {
        $queryedit = "SELECT * from rkas where id = '". $_GET['edit']."'";
        $result = mysql_query($queryedit);
        while ($rows = mysql_fetch_assoc($result)) {
            $editid = $rows['id'];
            $editnourut = $rows['nourut'];
            $editidprogram = $rows['idprogram'];
            $edittrisatu = $rows['trisatu'];
            $edittridua = $rows['tridua'];
            $edittritiga = $rows['tritiga'];
            $edittriempat = $rows['triempat'];
        }
    }
    if(isset($_GET['se'])) {
        $nourut = $_POST['nourut'];
        $idrkas = $_POST['idrkas'];
        $idprogram = $_POST['idprogram'];
        $jumlah = $_POST['jumlah'];
        $trisatu = $_POST['trisatu'];
        $tridua = $_POST['tridua'];
        $tritiga = $_POST['tritiga'];
        $triempat = $_POST['triempat'];
         $sql = "UPDATE dtlrkas set `nourut` = $nourut, `idprogram` = $idprogram, `jumlah` = $jumlah, `trisatu` = $trisatu, `tridua` = $tridua, `tritiga` = $tritiga, `triempat` = $triempat WHERE idrkas = $idrkas";
        if(mysql_query($sql)) {
            $pesanupdate = "Data berhasil diubah";
            $$editid = "";
            $editnourut = "";
            $editidprogram = "";
            $edittrisatu = "";
            $edittridua = "";
            $edittritiga = "";
            $edittriempat = "";
            header("Location: rkas.php");
        } else {
            echo "gagal";
            echo $sql;
            echo mysql_error();
        }

    }

    $idrkas = -1;
    $tahunx = getdatasekolah($_SESSION['idsekolah'], "`tahunajaranaktif`");
    //ambil header rkas yang paling baru
    $rkas = "SELECT * from rkas where idsekolah = " . $_SESSION['idsekolah'] . " and tahun = '". $tahunx ."' order by id desc limit 1";
    $results = mysql_query($rkas);
    while ($rows = mysql_fetch_assoc($results)) {
        $idrkas = $rows['id'];
        $idketuakomite = $rows['idketuakomite'];
        $idkepsek = $rows['idkepsek'];
        $idbendahara = $rows['idbendahara'];
    }

    $nourut = 0;
    //ambil id terakhir dan nntinya di +1
    $query = "SELECT nourut from dtlrkas where idrkas = ".$idrkas." order by nourut desc limit 1";
    $results = mysql_query($query);
    while ($rows = mysql_fetch_assoc($results)) {
        $nourut = $rows['nourut']; 
    }    
    $nourut++;
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
                        <h1>RKAS</h1>
                    </div>
                <!-- </div> -->
            </div>
            
            <div class="sixteen columns row">
                
            </div>
            <div class="row">
            </div>
            <div class="row" id="buatbaru" style="display: block; margin-top: -20px;">
                <center><h1>Rencana Kegiatan dan Anggaran Sekolah</h1></center>
                <br><br>
                <center>
                <?php 
                    if($pesanupdate!="") { ?>
                        <p style="color: green;"><b><?php echo $pesanupdate;?></b></p>
                    <?php }
                ?>
                <?php
                if($editid == "") {
                ?>
                <form class="pure-form" method="POST">
                    <input type="hidden" name="nourut" value="<?php echo $nourut;?>">
                    <input type="hidden" name="idrkas" value="<?php echo $idrkas;?>">
                    <table class="pure-table pure-table-form">
                        <tr>
                            <td><label>No. Urut </label></td>
                            <td style="width: 1px; ">:</td>
                            <td align="left"><label>
                                <?php echo $nourut;?>
                            </label></td>
                        </tr>
                        <tr>
                            <td><label>Kode dan Nama Program </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">
                                <select name="idprogram">
                                    <?php
                                        $ambilinduk = "SELECT * from programsekolah order by nokode asc";
                                        $resulti = mysql_query($ambilinduk);
                                        echo mysql_error();
                                        while ($rowi = mysql_fetch_assoc($resulti)) {
                                            $idi = $rowi['id']; 
                                            $kodei = $rowi['nokode'];
                                            $namai = $rowi['nama'];
                                    ?>
                                    <option value="<?php echo $idi;?>"><?php echo $kodei . " - " . $namai;?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">Dibagi per triwulan </td>
                        </tr>
                        <tr>
                            <td><label>Triwulan 1</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">Rp. 
                            <input type="number" onchange="updatetotal()" value="0" min="0"  name="trisatu" id="trisatu" width="1000"></td>
                        </tr>
                        <tr>
                            <td><label>Triwulan 2</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">Rp. <input type="number" onchange="updatetotal()" value="0" min="0" name="tridua" id="tridua" width="1000"></td>
                        </tr>
                        <tr>
                            <td><label>Triwulan 3</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">Rp. <input type="number" onchange="updatetotal()" value="0" min="0"  name="tritiga" id="tritiga" width="1000"></td>
                        </tr>
                        <tr>
                            <td><label>Triwulan 4</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">Rp. <input type="number" onchange="updatetotal()" value="0" min="0"  name="triempat" id="triempat" width="1000"></td>
                        </tr>
                        <tr>
                            <td><label>Jumlah Dana </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">Rp. <input type="number" onchange="updatetotal()" value="0" min="0"  name="jumlah" id="jumlah" width="1000"></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center"><input type="submit" class="btn-black-grey" name="submit" value="Simpan"></td>
                        </tr>
                        <?php if($pesan != "") { ?>
                        <tr>
                            <td colspan="3" align="center"><p style="color: green;"><b><?php echo $pesan;?></b></p></td>
                        </tr>
                        <?php } ?>
                    </table>
                </form>
                <?php } 
                else {
                ?>
                    <form class="pure-form" method="POST" action="rkas.php?se=1">
                    <input type="hidden" name="nourut" value="<?php echo $editnourut;?>">
                    <input type="hidden" name="idrkas" value="<?php echo $idrkas;?>">
                    <table class="pure-table pure-table-form">
                        <tr>
                            <td><label>No. Urut </label></td>
                            <td style="width: 1px; ">:</td>
                            <td align="left">
                                <input type="text" value="<?php echo $nourut;?>">
                            </td>
                        </tr>
                        <tr>
                            <td><label>Kode dan Nama Program </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">
                                <select name="idprogram">
                                    <?php
                                        $ambilinduk = "SELECT * from programsekolah order by nokode asc";
                                        $resulti = mysql_query($ambilinduk);
                                        echo mysql_error();
                                        while ($rowi = mysql_fetch_assoc($resulti)) {
                                            $idi = $rowi['id']; 
                                            $kodei = $rowi['nokode'];
                                            $namai = $rowi['nama'];
                                    ?>
                                    <option value="<?php echo $idi;?>" <?php if($editidprogram == $idi) {echo 'selected';}?>><?php echo $kodei . " - " . $namai;?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">Dibagi per triwulan </td>
                        </tr>
                        <tr>
                            <td><label>Triwulan 1</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">Rp. 
                            <input type="number" onchange="updatetotal()" value="<?php echo $edittrisatu;?>" min="0"  name="trisatu" id="trisatu" width="1000"></td>
                        </tr>
                        <tr>
                            <td><label>Triwulan 2</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">Rp. <input type="number" onchange="updatetotal()" value="<?php echo $edittridua;?>" min="0" name="tridua" id="tridua" width="1000"></td>
                        </tr>
                        <tr>
                            <td><label>Triwulan 3</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">Rp. <input type="number" onchange="updatetotal()" value="<?php echo $edittritiga;?>" min="0"  name="tritiga" id="tritiga" width="1000"></td>
                        </tr>
                        <tr>
                            <td><label>Triwulan 4</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">Rp. <input type="number" onchange="updatetotal()" value="<?php echo $edittriempat;?>" min="0"  name="triempat" id="triempat" width="1000"></td>
                        </tr>
                        <tr>
                            <td><label>Jumlah Dana </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">Rp. <input type="number" onchange="updatetotal()" value="0" min="0"  name="jumlah" id="jumlah" width="1000"></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center"><input type="submit" class="btn-black-grey" name="submit" value="Simpan Perubahan Data"></td>
                        </tr>
                        <?php if($pesan != "") { ?>
                        <tr>
                            <td colspan="3" align="center"><p style="color: green;"><b><?php echo $pesan;?></b></p></td>
                        </tr>
                        <?php } ?>
                    </table>
                </form>
                <?php } ?>
                </center>
                <hr style="margin-right: 15px;">
            </div>

            <div class="row" style="margin-top: -30px;" align="center">
                <div align="left" style="margin-left: 130px;">
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
                <table class="pure-table pure-table-bordered">
                <thead>
                <tr>
                    <th rowspan="2">No Urut</th>
                    <th rowspan="2">Kode</th>
                    <th rowspan="2">Nama Program</th>
                    <th rowspan="2">Jumlah (dalam Rupiah)</th>
                    <th colspan="4">Triwulan</th>
                    <th rowspan="2">Action</th>
                </tr>
                <tr>
                    <th>I</th>
                    <th>II</th>
                    <th>III</th>
                    <th>IV</th>
                </tr>
                </thead>
                <?php
                    //ambil semua data buat diload di tabel dibawah form
                    $ambilsemua = "SELECT * from dtlrkas where idrkas = '".$idrkas."' order by nourut desc";
                    $resulta = mysql_query($ambilsemua);
                    echo mysql_error();
                    while ($rowa = mysql_fetch_assoc($resulta)) {
                        $id= $rowa['id'];
                        $nouruts = $rowa['nourut']; 
                        $idprogram = $rowa['idprogram'];
                        $kodes = getprogram($idprogram)['nokode'];
                        $namas = getprogram($idprogram)['nama'];
                        $jumlahs = $rowa['jumlah'];
                        $trisatus = $rowa['trisatu'];
                        $triduas = $rowa['tridua'];
                        $tritigas = $rowa['tritiga'];
                        $triempats = $rowa['triempat'];
                        $tgls =  $rowa['created_at'];
                ?>
                <tr>
                    <td><?php echo $nouruts;?></td>
                    <td><?php echo $kodes;?></td>
                    <td><?php echo $namas;?></td>
                    <td><?php echo $jumlahs;?></td>
                    <td><?php echo $trisatus;?></td>
                    <td><?php echo $triduas;?></td>
                    <td><?php echo $tritigas;?></td>
                    <td><?php echo $triempats;?></td>
                    <td><a href="rkas.php?de=<?php echo $id;?>">Hapus</a></td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="9" align="center">
                    <table>
                        <td>Ketua Komite: <?php echo getuser($idketuakomite)['namalengkapdgngelar'] . " - NIP: " . getuser($idketuakomite)['nipnik'];?></td>
                        <td>Kepala Sekolah: <?php echo getuser($idkepsek)['namalengkapdgngelar'] . " - NIP: " . getuser($idketuakomite)['nipnik'];?></td>
                        <td>Bendahara: <?php echo getuser($idbendahara)['namalengkapdgngelar'] . " - NIP: " . getuser($idketuakomite)['nipnik'];?></td>
                    </table>
                    </td>
                </tr> 
                </table>
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
              var trisatu = parseInt(document.getElementById('trisatu').value);
              var tridua = parseInt(document.getElementById('tridua').value);
              var tritiga = parseInt(document.getElementById('tritiga').value);
              var triempat = parseInt(document.getElementById('triempat').value);

              total = trisatu + tridua + tritiga + triempat;
              document.getElementById('jumlah').value = total;
            }
        </script>
    </body>
</html>
