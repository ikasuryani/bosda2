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
            
            <div class="sixteen columns" style="position: relative; z-index: -1;">
                <!-- <div class="h-border"> -->
                    <div class="heading" style="margin-top: 20px; margin-bottom: 20px;">
                        <h1>Laporan Rencana Realisasi</h1><br>
                        <label>Tahun: <?php echo getdatasekolah($_SESSION['idsekolah'], "`tahunajaranaktif`");?></label>
                    </div>
                <!-- </div> -->
            </div>
            <div class="row">
            </div>
            <div class="row" id="buatbaru" style="display: block; margin-top: -20px;">
                <br><br>
                    <div class="text" style="margin-right: 100px;">
                        <label>I. Rencana Realisasi</label><br> 
                    </div>
                    <a href="printrr.php"><button class="btn black-grey" id="btncetakpdf" style='float: right; margin-bottom: 20px; margin-top: -30px; margin-right: 20px;'>Cetak PDF</button></a>
                    <br>
                    <br>
                    <table id="bkutambah" border="1" class="pure-table pure-table-bordered" width="99%" style="margin-right: 20px;">
                        <tr align="center" style="vertical-align: middle;">
                            <td colspan="3">Rencana</td>
                            <td colspan="3">Realisasi</td>
                        </tr>
                        <tr align="center">
                            <td>No Kode</td>
                            <td>Uraian</td>
                            <td>Jumlah</td>
                            <td>No Kode</td>
                            <td>Uraian</td>
                            <td>Jumlah</td>
                        </tr>
                        <tr align="center">
                            <?php 
                                $sql = "select dtlrkas.idprogram as pro, dtlrkas.jumlah as jum, realkeluar.idprogram as gram, realkeluar.totalkeluar as lah from dtlrkas INNER join realkeluar on dtlrkas.idprogram = realkeluar.idprogram";
                                $res = mysql_query($sql);
                                while($row = mysql_fetch_assoc($res)) {?>
                                    <tr><td><?php echo getprogram($row['pro'])['nokode'];?></td>
                                    <td><?php echo getprogram($row['pro'])['nama'];?></td>
                                    <td><?php echo $row['jum'];?></td>
                                    <td><?php echo getprogram($row['gram'])['nokode'];?></td>
                                    <td><?php echo getprogram($row['gram'])['nama'];?></td>
                                    <td><?php echo $row['lah'];?></td></tr>
                                <?php }
                            ?>
                        </tr>
                    </table>
            </div>
            <div class="row" id="buatbaru" style="display: block; margin-top: -20px;">
                <br><br>
                <form>
                    <div class="text" style="margin-right: 100px;">
                        <label>II. Rencana Belum Realisasi</label><br> 
                    </div>
                    <br>
                    <br>
                    <table id="bkutambah" border="1" class="pure-table pure-table-bordered" style="margin-right: 20px;" width="49%">
                        <tr align="center" style="vertical-align: middle;">
                            <td colspan="3">Rencana</td>
                        </tr>
                        <tr align="center">
                            <td>No Kode</td>
                            <td>Uraian</td>
                            <td>Jumlah</td>
                        </tr>
                        <?php 
                            $sql = "select dtlrkas.idprogram as pro, dtlrkas.jumlah as jum, realkeluar.idprogram as gram, realkeluar.totalkeluar as lah from dtlrkas LEFT join realkeluar on dtlrkas.idprogram = realkeluar.idprogram";
                            $res = mysql_query($sql);
                            while($row = mysql_fetch_assoc($res)) {
                                if(is_null($row['gram'])) {
                            ?>
                                <tr><td><?php echo getprogram($row['pro'])['nokode'];?></td>
                                <td><?php echo getprogram($row['pro'])['nama'];?></td>
                                <td><?php echo $row['jum'];?></td>
                            <?php } }
                        ?>
                    </table>
                </form>
            </div>  
            <div class="row" id="buatbaru" style="display: block; margin-top: -20px;" >
                <br><br>
                <form>
                    <div class="text" style="margin-right: 100px;">
                        <label>III. Realisasi Tak Terencana</label><br> 
                    </div>
                    <br>
                    <br>
                    <table id="bkutambah" border="1" class="pure-table pure-table-bordered" style="margin-right: 20px;" width="49%">
                        <tr align="center" style="vertical-align: middle;">
                            <td colspan="3">Realisasi</td>  
                        </tr>
                        <tr align="center">
                            <td>No Kode</td>
                            <td>Uraian</td>
                            <td>Jumlah</td>
                        </tr>
                        <?php 
                            $sql = "select dtlrkas.idprogram as pro, dtlrkas.jumlah as jum, realkeluar.idprogram as gram, realkeluar.totalkeluar as lah from realkeluar LEFT join dtlrkas on dtlrkas.idprogram = realkeluar.idprogram";
                            $res = mysql_query($sql);
                            while($row = mysql_fetch_assoc($res)) {
                                if(is_null($row['pro'])) {
                            ?>
                                <tr><td><?php echo getprogram($row['gram'])['nokode'];?></td>
                                <td><?php echo getprogram($row['gram'])['nama'];?></td>
                                <td><?php echo $row['lah'];?></td>
                            <?php } } ?>
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
