<?php
    require_once("../tcpdf_min_6_2_8/tcpdf_min/tcpdf.php");
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    require_once("../dbdansession.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once("style.html");?>
    </head>
    <body>
        <?php
            $pdf->AddPage();
            $html = '<h1>Laporan Rencana Realisasi</h1><br>
                        <label>Tahun:'.getdatasekolah($_SESSION['idsekolah'], "`tahunajaranaktif`").'</label><br>';
                    
            $html .= '<label>I. Rencana Realisasi</label><br> <table>
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
                </tr>';
                $sql = "select dtlrkas.idprogram as pro, dtlrkas.jumlah as jum, realkeluar.idprogram as gram, realkeluar.totalkeluar as lah from dtlrkas INNER join realkeluar on dtlrkas.idprogram = realkeluar.idprogram";
                        $res = mysql_query($sql);
                        while($row = mysql_fetch_assoc($res)) {
                            $html .= '<tr><td>'. getprogram($row['pro'])['nokode'].'</td>
                            <td>'. getprogram($row['pro'])['nama'].'</td>
                            <td>'. $row['jum'].'</td>
                            <td>'. getprogram($row['gram'])['nokode'].'</td>
                            <td>'. getprogram($row['gram'])['nama'].'</td>
                            <td>'. $row['lah'].'</td></tr>';
                        }
                $html .= '</table></form></div>
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
                        </tr>';
                            $sql = "select dtlrkas.idprogram as pro, dtlrkas.jumlah as jum, realkeluar.idprogram as gram, realkeluar.totalkeluar as lah from dtlrkas LEFT join realkeluar on dtlrkas.idprogram = realkeluar.idprogram";
                            $res = mysql_query($sql);
                            while($row = mysql_fetch_assoc($res)) {
                                if(is_null($row['gram'])) {
                            $html .= '
                                <tr><td>'. getprogram($row['pro'])['nokode'] .'</td>
                                <td>'.getprogram($row['pro'])['nama'] .'</td>
                                <td>'.$row['jum'] .'</td>';
                            } }
                    $html .= '</table></form></div>  
            <div class="row" >
                <br><br>
                <form>
                    <div class="text" style="margin-right: 100px;">
                        <label>III. Realisasi Tak Terencana</label><br> 
                    </div>
                    <br>
                    <br>
                    <table border="1">
                        <tr align="center" style="vertical-align: middle;">
                            <td colspan="3">Realisasi</td>  
                        </tr>
                        <tr align="center">
                            <td>No Kode</td>
                            <td>Uraian</td>
                            <td>Jumlah</td>
                        </tr>';
                            $sql = "select dtlrkas.idprogram as pro, dtlrkas.jumlah as jum, realkeluar.idprogram as gram, realkeluar.totalkeluar as lah from realkeluar LEFT join dtlrkas on dtlrkas.idprogram = realkeluar.idprogram";
                            $res = mysql_query($sql);
                            while($row = mysql_fetch_assoc($res)) {
                                if(is_null($row['pro'])) {
                            $html .= '
                                <tr><td>'. getprogram($row['gram'])['nokode'].'</td>
                                <td>'. getprogram($row['gram'])['nama'].'</td>
                                <td>'. $row['lah'] .'</td>';
                            } }
                    $html .= '</table></form></div>';
        // $conn->close();
        $pdf->writehtml($html, true, false, true, false, '');
        $pdf->lastPage();
        ob_end_clean();
        $pdf->Output('Laporan Admin2.pdf', 'I');
        ?>
    </body>
</html>