<?php
    require_once("../dbdansession.php");
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
                        <h1>Laporan Keuangan per Triwulan</h1>
                    </div>
                <!-- </div> -->
            </div>
            
            <div class="sixteen columns row">
            </div>
            <div class="row">
            </div>
            <div class="row" id="buatbaru" style="display: block; margin-top: -20px;">
                <form method="POST" action="lapdanabos.php">
                    <label>Nama Sekolah:  </label>
                    <label><?php echo getdatasekolah($_SESSION['idsekolah'], "`nama`");?></label>
                    <br>
                    <label>Desa/Kecamatan:  </label>
                        <label><?php echo getdatasekolah($_SESSION['idsekolah'], "`desakelurahan`") . "/" .getdatasekolah($_SESSION['idsekolah'], "`kecamatan`");?></label>
                    <br>
                    <label>Kabupaten/Kota:  </label>
                        <label><?php echo getdatasekolah($_SESSION['idsekolah'], "`kotakab`");?></label>
                    <br><br>
                    <label>Triwulan : </label><select name="bulan">
                        <option value="1">1 (Januari - Maret)</option>
                        <option value="2">2 (April - Juni)</option>
                        <option value="3">3 (Juli - Agustus)</option>
                        <option value="4">4 (September - Desember)</option>
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
                            switch ($_POST['bulan']) {
                                case '1':
                                    $where = "and MONTH(dtl.tanggal) BETWEEN 1 and 3 and YEAR(dtl.tanggal)=".$_POST['tahun'];
                                    break;
                                case '2':
                                    $where = "and MONTH(dtl.tanggal) BETWEEN 4 and 6 and YEAR(dtl.tanggal)=".$_POST['tahun'];
                                    break;
                                case '3':
                                    $where = "and MONTH(dtl.tanggal) BETWEEN 7 and 9 and YEAR(dtl.tanggal)=".$_POST['tahun'];
                                    break;
                                case '4':
                                    $where = "and MONTH(dtl.tanggal) BETWEEN 10 and 12 and YEAR(dtl.tanggal)=".$_POST['tahun'];
                                    break;
                            }
                            
                            echo "<h2>Triwulan ".$_POST['bulan']."/".$_POST['tahun']."</h2><br><br>";
                        }
                        else{
                            echo "<h2>Semua Data</h2><br><br>";
                        }
                    ?>
                    <table id="bkutambah" border="1" class="pure-table pure-table-bordered" style="width: 99%; margin-right: 20px;">
                        <tr align="center" style="vertical-align: middle;">
                            <td>Tanggal</td>
                            <td>Jenis Buku Kas</td>
                            <td>No. Kode</td>
                            <td>No. Bukti</td>
                            <td>Uraian</td>
                            <td>Penerimaan (Debit)</td>
                            <td>Pengeluaran (Kredit)</td>
                            <td>Saldo</td>
                        </tr>
                        <?php
                        $queryz = "SELECT dtl.tanggal, bk.jenis, dtl.nokode,dtl.nobukti,dtl.uraian,dtl.penerimaandebit,dtl.pengeluarankredit, (dtl.penerimaandebit-dtl.pengeluarankredit) as saldo from dtlbkkas dtl inner join bkkas bk on dtl.idbkkas = bk.id where bk.idsekolah = '" . $_SESSION['idsekolah'] . "' $where";
                        $resultz = mysql_query($queryz);
                        while ($rowz = mysql_fetch_assoc($resultz)) {
                            echo"<tr>";
                            echo "<td>" . $rowz['tanggal'] . "</td>";
                            echo "<td>" . $rowz['jenis'] . "</td>";
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
                            <td colspan="7" style="text-align: right;">Total</td>
                            <?php
                            $queryz = "SELECT sum(dtl.penerimaandebit-dtl.pengeluarankredit) as saldo from dtlbkkas dtl inner join bkkas bk on dtl.idbkkas = bk.id where bk.idsekolah = '" . $_SESSION['idsekolah'] . "' $where";
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
            <?php require_once("footer.php");?>
        </div>
        <!--Close Container Div-->
        <!--Grab JS Files-->
        <script src="js/jquery.js" ></script>
        <script src="js/jquery.flexslider.js" ></script>
    </body>
</html>
