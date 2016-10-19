<?php
$pesan = "";
$idbkkas = 1;
$bkkas = "BUKU KAS UMUM";
require_once("../dbdansession.php");

if (isset($_POST['submit'])) {


    $tanggal = $_POST['tanggal'];
    $kode = $_POST['kode'];
    $bukti = $_POST['bukti'];
    $uraian = $_POST['uraian'];
    $debit = $_POST['debit'];
    $kredit = $_POST['kredit'];


    $sql = "insert into dtlbkkas(tanggal,idbkkas,nokode,nobukti,uraian,penerimaandebit,pengeluarankredit) value('$tanggal','$idbkkas','$kode','$bukti','$uraian','$debit','$kredit')";

    if (mysql_query($sql)) {
        $pesan = "Berhasil Menambah Data";
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
        <?php require_once("style.html"); ?>
    </head>
    <body>
        <div class="container">
            <header class="sixteen columns alpha omega">

                <?php require_once("header-userlogin.php"); ?>

                <?php require_once("nav.php"); ?>

            </header>

            <div class="sixteen columns" style="position: relative; z-index: -1;">
                <!-- <div class="h-border"> -->
                <div class="heading" style="margin-top: 20px; margin-bottom: 20px;">
                    <h1><?php echo $bkkas; ?></h1>
                </div>
                <!-- </div> -->
            </div>

            <div class="sixteen columns row">
                <center>
                    <!-- <h2></h2> -->
                    <!-- <br>
                    <br> -->
                    <button class="btn black-grey" id="btnbuat" onclick="toggle_visibility('buatbaru', 'lihat')">Buat Baru</button>
                    <button class="btn black-grey" id="btnlihat" onclick="toggle_visibility('lihat', 'buatbaru')">Lihat Sebelumnya</button>
                </center>
                <!-- <div class="h-border">
                    <div class="heading">
                        <h2>Bantuan Operasional Sekolah</h2>
                    </div>
                </div>
                
                <div class="focused-text" style="text-align: justify;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; BOS (Bantuan Operasional Sekolah) adalah program pemerintah yang pada dasarnya adalah untuk penyediaan pendanaan biaya operasi nonpersonalia bagi satuan pendidikan dasar sebagai pelaksana program wajib belajar. Namun demikian, ada beberapa jenis pembiayaan investasi dan personalia yang diperbolehkan dibiayai dengan dana BOS. 
                </div> -->
            </div>

            <div class="row">

                <div class="row" id="buatbaru" style="<?php if (isset($_POST["submittahun"])) { ?> display: none;<?php } ?> margin-top: -20px;">
                    <!-- <center><h1>Lihat/Ubah data Sekolah</h1></center> -->
                    <!-- <br><br> -->

                    <center><h1>Tambah Entri <?php echo $bkkas; ?></h1></center>
                    <center>
                        <form class="pure-form" method="POST">
                            <table class="pure-table pure-table-form">
                                <?php if ($pesan != "") { ?>
                                    <tr>
                                        <td colspan="3" align="center"><p style="color: green;"><b><?php echo $pesan; ?></b></p></td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="3" align="center"><p style="color: green;"><b></b></p></td>
                                </tr>

                                <tr>
                                    <td><label>Tanggal </label></td>
                                    <td style="width: 1px;">:</td>
                                    <td align="left"><input type="date" name="tanggal" size="40" value=""></td>
                                </tr>
                                <tr>
                                    <td><label>No. Kode </label></td>
                                    <td style="width: 1px;">:</td>
                                    <td align="left"><input type="text" name="kode" size="40" placeholder="<?php echo "No. Kode"; ?>"></td>
                                </tr>
                                <tr>
                                    <td><label>No. Bukti </label></td>
                                    <td style="width: 1px;">:</td>
                                    <td align="left"><input type="text" name="bukti" size="40" placeholder="<?php echo "No. Bukti"; ?>"></td>
                                </tr>
                                <tr>
                                    <td><label>Uraian </label></td>
                                    <td style="width: 1px;">:</td>
                                    <td align="left"><input type="text" name="uraian" size="40" placeholder="<?php echo "Uraian"; ?>"></td>
                                </tr>
                                <tr>
                                    <td><label>Penerimaan(debit) </label></td>
                                    <td style="width: 1px;">:</td>
                                    <td align="left"><input type="text" name="debit" size="40" placeholder="<?php echo "Penerimaan(debit)"; ?>"></td>
                                </tr>
                                <tr>
                                    <td><label>Penerimaan(kredit) </label></td>
                                    <td style="width: 1px;">:</td>
                                    <td align="left"><input type="text" name="kredit" size="40" placeholder="<?php echo "Penerimaan(kredit)"; ?>"></td>
                                </tr>

                                <tr>
                                    <td><label> </label></td>
                                    <td style="width: 1px;"></td>
                                    <td align="left"><input type="submit" name="submit"  value="<?php echo "Tambah"; ?>"></td>
                                </tr>

                            </table>
                        </form>
                    </center>
                    <!-- <hr style="margin-right: 15px;"> -->
                </div>
                <div class="row" id="lihat" style=" <?php if (!isset($_POST["submittahun"])) { ?> display: none;<?php } ?> margin-top: -20px;">

                    <form method="POST" action="bkumum.php">
                        <label>Nama Sekolah:  </label><label>SDN 001 Surabaya</label><br>
                        <label>Desa/Kecamatan:  </label><label>Kecamatan Tenggilis</label><br>
                        <label>Kabupaten/Kota:  </label><label>Surabaya</label><br>
                        <label>Provinsi:  </label><label>Jawa Timur</label><br>
                        <br><br>
                        <label>Bulan : </label><select name="bulan">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                        </select>
                        <label>Tahun : </label><select name="tahun">
                            <option>2016</option>
                            <option>2017</option>
                            <option>2018</option>
                            <option>2019</option>
                            <option>2020</option>
                            <option>2021</option>
                            <option>2022</option>
                            <option>2023</option>
                        </select>
                        <input type="submit" name="submittahun" value="Submit">
                        <br><br>
                        <?php
                            $where="";
                            if (isset($_POST["submittahun"])) {
                                $where = "and MONTH(dtl.tanggal)=".$_POST['bulan']." and YEAR(dtl.tanggal)=".$_POST['tahun'];
                                
                                echo "<h2>".$_POST['bulan']."/".$_POST['tahun']."</h2><br><br>";
                            }
                            else{
                                echo "<h2>Semua Data</h2><br><br>";
                            }
                        ?>
                        <table id="bkutambah" border="1" class="pure-table pure-table-bordered" style="width: 99%; margin-right: 20px;">
                            <tr align="center" style="vertical-align: middle;">
                                <td>Tanggal</td>
                                <td>No. Kode</td>
                                <td>No. Bukti</td>
                                <td>Uraian</td>
                                <td>Penerimaan (Debit)</td>
                                <td>Pengeluaran (Kredit)</td>
                                <td>Saldo</td>
                            </tr>
                            <?php
                            $queryz = "SELECT dtl.tanggal,dtl.nokode,dtl.nobukti,dtl.uraian,dtl.penerimaandebit,dtl.pengeluarankredit, (dtl.penerimaandebit-dtl.pengeluarankredit) as saldo from dtlbkkas dtl inner join bkkas bk on dtl.idbkkas = bk.id where dtl.idbkkas=$idbkkas and bk.idsekolah = '" . $_SESSION['idsekolah'] . "' $where";
                            $resultz = mysql_query($queryz);
                            while ($rowz = mysql_fetch_assoc($resultz)) {
                                echo"<tr>";
                                echo "<td>" . $rowz['tanggal'] . "</td>";
                                echo "<td>" . $rowz['nokode'] . "</td>";
                                echo "<td>" . $rowz['nobukti'] . "</td>";
                                echo "<td>" . $rowz['uraian'] . "</td>";
                                echo "<td>" . $rowz['penerimaandebit'] . "</td>";
                                echo "<td>" . $rowz['pengeluarankredit'] . "</td>";
                                if ($rowz['saldo'] > 0)
                                    echo "<td>+" . $rowz['saldo'] . "</td>";
                                else
                                    echo "<td>" . $rowz['saldo'] . "</td>";
                                echo"</tr>";
                            }
                            ?>
                            <tr>
                                <td colspan="6" style="text-align: right;">Total</td>
                                <?php
                                $queryz = "SELECT sum(dtl.penerimaandebit-dtl.pengeluarankredit) as saldo from dtlbkkas dtl inner join bkkas bk on dtl.idbkkas = bk.id where dtl.idbkkas=$idbkkas and bk.idsekolah = '" . $_SESSION['idsekolah'] . "' $where";
                                $resultz = mysql_query($queryz);
                                $rowz = mysql_fetch_assoc($resultz);
                                ?>
                                <td ><?php
                                    if ($rowz['saldo'] > 0) {
                                        echo "+";
                                    } echo $rowz['saldo'];
                                    ?></td>
                            </tr>
                        </table>
                    </form>

                </div>
            <?php require_once("footer.php"); ?>
            </div>
            <!--Close Container Div-->
            <!--Grab JS Files-->
            <script src="js/jquery.js" ></script>
            <script src="js/jquery.flexslider.js" ></script>
            <script>
                        $(window)
                                .load(function () {
                                    $('.flexslider')
                                            .flexslider({
                                                animation: "slide"
                                            });
                                });
                        function toggle_visibility(id, id2) {
                            var e = document.getElementById(id);
                            var f = document.getElementById(id2);
                            if (e.id == 'buatbaru-lihat')
                            {
                                e.style.display = 'none';
                                f.style.display = 'block';
                            } else
                            {
                                e.style.display = 'block';
                                f.style.display = 'none';
                            }
                            switchcolor(id);
                        }

                        function switchcolor(id) {
                            var property = document.getElementById('btn-buat');
                            var property2 = document.getElementById('btn-lihat');
                            if (id = 'btn-buat') {
                                property.css.background = "#72be3b";
                                property2.css.background = "#605f5f";
                            } else {
                                property.style.background = "#605f5f";
                                property2.style.background = "#72be3b";
                            }
                        }

                        $("#tambah").click(function (event) {
                            event.preventDefault();
                            $("#bkutambah").append("<tr align=\"center\">" +
                                    "<td><input type=\"text\" name=\"norut\" size=\"15\"></td>" +
                                    "<td><input type=\"text\" name=\"norut\" size=\"10\"></td>" +
                                    "<td><input type=\"text\" name=\"norut\" size=\"10\"></td>" +
                                    "<td><input type=\"text\" name=\"norut\"></td>" +
                                    "<td><input type=\"text\" name=\"norut\"></td>" +
                                    "<td><input type=\"text\" name=\"norut\"></td>" +
                                    "<td><input type=\"text\" name=\"norut\"></td></tr>");
                        });
            </script>
    </body>
</html>
