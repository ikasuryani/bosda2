<?php
    require_once("../dbdansession.php");
    
    $pesan = "";
    
    if(isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $nss = $_POST['nss'];
        $npsn = $_POST['npsn'];
        $bentuk = $_POST['bentuk'];
        $statussekolah = $_POST['status'];
        $alamat = $_POST['alamat'];
        $desakelurahan = $_POST['desakelurahan'];
        $kecamatan = $_POST['kecamatan'];
        $kotakab = $_POST['kotakab'];
        $rtrw = $_POST['rtrw'];
        $namadusun = $_POST['namadusun'];
        $kodepos = $_POST['kodepos'];
        $notelp = $_POST['notelp'];
        $idkepseksekarang = $_POST['idkepseksekarang'];
        $jmlsiswaskrg = $_POST['jmlsiswaskrg'];
        $jmlguruskrg = $_POST['jmlguruskrg'];
        $tahunajaranaktif = $_POST['tahunajaranaktif'];

        $sqlz = "UPDATE `sekolah` SET `nama` = '". $nama."', `nss` = '". $nss."', `npsn` = '".$npsn."', `bentukpendidikan` = '".$bentuk."', `statussekolah` = '".$statussekolah."', `alamat` = '".$alamat."', `desakelurahan` = '".$desakelurahan."', `kecamatan` = '".$kecamatan."', `kotakab` = '".$kotakab."', `rtrw` = '".$rtrw."', `namadusun` = '".$namadusun."', `kodepos` = '".$kodepos."', `notelp` = '".$notelp."', `idkepseksekarang` = '".$idkepseksekarang."', `jmlsiswaskrg` = '".$jmlsiswaskrg."', `jmlguruskrg` = '".$jmlguruskrg."', `tahunajaranaktif` = '".$tahunajaranaktif."', `updated_by` = '" . $_SESSION['iduser'] . "', `updated_at` = '" . date('Y-m-d h:i:s') . "' WHERE `id` = " . $_SESSION['idsekolah'];

        if(mysql_query($sqlz)) {
            $pesan = "Berhasil Mengubah Data";
        } else {
            echo "gagal";
            echo $sqlz;
            echo mysql_error();
        }
    }
    
    //DAPODIK
    $queryd = "SELECT * FROM sekolah where id = " . $_SESSION['idsekolah'];
    $resultd = mysql_query($queryd);
    while($rowd = mysql_fetch_assoc($resultd)) {
        $nama = $rowd['nama'];
        $nss = $rowd['nss'];
        $npsn = $rowd['npsn'];
        $bentuk = $rowd['bentukpendidikan'];
        $statussekolah = $rowd['statussekolah'];
        $alamat = $rowd['alamat'];
        $desakelurahan = $rowd['desakelurahan'];
        $kecamatan = $rowd['kecamatan'];
        $kotakab = $rowd['kotakab'];
        $rtrw = $rowd['rtrw'];
        $namadusun = $rowd['namadusun'];
        $kodepos = $rowd['kodepos'];
        $notelp = $rowd['notelp'];
        $idkepseksekarang = $rowd['idkepseksekarang'];
        $jmlsiswaskrg = $rowd['jmlsiswaskrg'];
        $jmlguruskrg = $rowd['jmlguruskrg'];
        $tahunajaranaktif = $rowd['tahunajaranaktif'];
        $created_at = $rowd['created_at'];
        $created_by = $rowd['created_by'];
        $updated_at = $rowd['updated_at'];
        $updated_by = $rowd['updated_by'];
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
                        <h1>Data Sekolah</h1>
                    </div>
                <!-- </div> -->
            </div>
            
            <div class="sixteen columns row">
                
            </div>
            <div class="row">
            </div>
            <div class="row" id="buatbaru" style="display: block; margin-top: -20px;">
                <!-- <center><h1>Lihat/Ubah data Sekolah</h1></center> -->
                <!-- <br><br> -->
                <center>
                <form class="pure-form" method="POST">
                    <table class="pure-table pure-table-form">
                        <?php if($pesan != "") { ?>
                        <tr>
                            <td colspan="3" align="center"><p style="color: green;"><b><?php echo $pesan;?></b></p></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td><label>ID </label></td>
                            <td style="width: 1px; ">:</td>
                            <td align="left"><label><?php echo $_SESSION['idsekolah'];?></label></td>
                        </tr>
                        <tr>
                            <td><label>Nama </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left"><input type="text" name="nama" size="40" value="<?php echo $nama;?>"></td>
                        </tr>
                        <tr>
                            <td><label>Tahun Ajaran Sekarang </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left"><input type="text" name="tahunajaranaktif" size="40" value="<?php echo $tahunajaranaktif;?>"></td>
                        </tr>
                        <tr>
                            <td><label>Jumlah Siswa </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left"><input type="text" name="jmlsiswaskrg" size="40" value="<?php echo $jmlsiswaskrg;?>"></td>
                        </tr>
                        <tr>
                            <td><label>Jumlah Guru </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left"><input type="text" name="jmlguruskrg" size="40" value="<?php echo $jmlguruskrg;?>"></td>
                        </tr>
                        <tr>
                            <td><label>NSS</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left"><input type="text" name="nss" size="40" value="<?php echo $nss;?>"></td>
                        </tr>
                        <tr>
                            <td><label>NPSN </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left"><input type="text" name="npsn" size="40" value="<?php echo $npsn;?>"></td>
                        </tr>
                        <tr>
                            <td><label>Bentuk Pendidikan </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">
                                <select name="bentuk">
                                    <option <?php if($bentuk == "SD") echo 'selected';?> value="SD">SD</option>
                                    <option <?php if($bentuk == "SMP") echo 'selected';?> value="SMP">SMP</option>
                                    <option <?php if($bentuk == "SDLB") echo 'selected';?> value="SDLB">SDLB</option>
                                    <option <?php if($bentuk == "SMPLB") echo 'selected';?> value="SMPLB">SMPLB</option>
                                    <option <?php if($bentuk == "SMP Terbuka") echo 'selected';?> value="SMP Terbuka">SMP Terbuka</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Status Sekolah </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">
                                <select name="status">
                                    <option <?php if($statussekolah == "Negeri") echo 'selected';?> value="Negeri">Negeri</option>
                                    <option <?php if($statussekolah == "Swasta") echo 'selected';?> value="Swasta">Swasta</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Alamat </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">
                                <textarea cols="37" rows="2" name="alamat"><?php echo $alamat;?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Desa/Kelurahan </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left"><input type="text" name="desakelurahan" size="40" value="<?php echo $desakelurahan;?>"></td>
                        </tr>
                        <tr>
                            <td><label>Kecamatan </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left"><input type="text" name="kecamatan" size="40" value="<?php echo $kecamatan;?>"></td>
                        </tr>
                        <tr>
                            <td><label>Kota/Kabupaten </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left"><input type="text" name="kotakab" size="40" value="<?php echo $kotakab;?>"></td>
                        </tr>
                        <tr>
                            <td><label>RT/Rw </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left"><input type="text" name="rtrw" size="40" value="<?php echo $rtrw;?>"></td>
                        </tr>
                        <tr>
                            <td><label>Nama Dusun </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left"><input type="text" name="namadusun" size="40" value="<?php echo $namadusun;?>"></td>
                        </tr>
                        <tr>
                            <td><label>Kode Pos </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left"><input type="text" name="kodepos" size="40" value="<?php echo $kodepos;?>"></td>
                        </tr>
                        <tr>
                            <td><label>No Telp </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left"><input type="text" name="notelp" size="40" value="<?php echo $notelp;?>"></td>
                        </tr>
                        <tr>
                            <td><label>Kepala Sekolah </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">
                            <select name="idkepseksekarang">
                                <?php
                                    $queryz = "SELECT id, nipnik, namalengkapdgngelar from user where idlembaga = '" . $_SESSION['idsekolah'] ."'";
                                    $resultz = mysql_query($queryz);
                                    while($rowz = mysql_fetch_assoc($resultz)) {
                                        $iduser = $rowz['id'];?>
                                        <option <?php if($idkepseksekarang == $iduser) echo 'selected';?> value="<?php echo $iduser;?>"><?php echo $rowz['nipnik'] . " - " . $rowz['namalengkapdgngelar'];?>
                                        </option>
                                    <?php }
                                ?>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td><label>Data dibuat oleh </label></td>
                            <td style="width: 1px;">:</td>
                            <td><?php echo getuser($created_by)['namapanggilan'] . " (" . getuser($created_by)['jabatan'] . ") at " . $created_at;?></td>
                        </tr>
                        <tr>
                            <td><label>Data diperbarui oleh </label></td>
                            <td style="width: 1px;">:</td>
                            <td><?php echo getuser($updated_by)['namapanggilan']. " (" . getuser($updated_by)['jabatan'] . ") at " . $updated_at;?></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center"><input type="submit" class="btn-black-grey" name="submit" value="Simpan Perubahan"></td>
                        </tr>
                        
                    </table>
                </form>
                </center>
                <!-- <hr style="margin-right: 15px;"> -->
            </div>

            <div class="row" style="margin-top: -30px;" align="center">
                
            </div>
                <?php require_once("footer.php");?>
        </div>
        <!--Close Container Div-->
        <!--Grab JS Files-->
        <script src="js/jquery.js" ></script>
        <script src="js/jquery.flexslider.js" ></script>
        
    </body>
</html>
