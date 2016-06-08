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
                        <h1>Register Penutupan Kas</h1>
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
            </div>
            <div class="row" id="buatbaru" style="display: block; margin-top: -20px;">
                <center><h1>Buat Baru Register Penutupan Kas</h1></center>
                <br><br>
                <center>
                <form class="pure-form">
                    <table class="pure-table pure-table-form">
                        <tr>
                            <td><label>Tanggal Penutupan Kas</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left"><input type="text" name="tgl1" size="42"></td>
                        </tr>
                        <tr>
                            <td><label>Nama Penutup Kas (Pemegang Kas) </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left"><input type="text" name="tgl1" size="42"></td>
                        </tr>
                        <tr>
                            <td><label>Tanggal Penutupan Kas yang Lalu  </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left"><input type="text" name="tgl1" size="42"></td>
                        </tr>
                        <tr>
                            <td><label>Jumlah Total Penerimaan (D)  </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">Rp.&nbsp;&nbsp;<input type="text" name="tgl1" size="38"></td>
                        </tr>
                        <tr>
                            <td><label>Jumlah Total Pengeluaran (K)  </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">Rp.&nbsp;&nbsp;<input type="text" name="tgl1" size="38"></td>
                        </tr>
                        <tr>
                            <td><label><b>Saldo Buku (A = D - K)</b></label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">Rp.&nbsp;&nbsp;<input type="text" name="tgl1" size="38"></td>
                        </tr>
                        <tr>
                            <td><label><b>Saldo Kas (B)</b></label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">Rp.&nbsp;&nbsp;<input type="text" name="tgl1" size="38"></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                            <br>
                            <label>Saldo kas B terdiri dari:</label></td>
                        </tr>
                        <tr>
                            <td><label>Lembaran uang kertas Rp 100.000,-</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="right"><input type="text" name="tgl1" maxlength="4" size="4">
                            <label>&nbsp;&nbsp;Lembar = &nbsp;Rp.&nbsp;&nbsp;&nbsp;</label>
                            <input type="number" name="" size="20"></td>
                        </tr>
                        <tr>
                            <td><label>Lembaran uang kertas Rp 50.000,-</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="right"><input type="text" name="tgl1" maxlength="4" size="4">
                            <label>&nbsp;&nbsp;Lembar = &nbsp;Rp.&nbsp;&nbsp;&nbsp;</label>
                            <input type="number" name="" size="20"></td>
                        </tr>
                        <tr>
                            <td><label>Lembaran uang kertas Rp 20.000,-</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="right"><input type="text" name="tgl1" maxlength="4" size="4">
                            <label>&nbsp;&nbsp;Lembar = &nbsp;Rp.&nbsp;&nbsp;&nbsp;</label>
                            <input type="number" name="" size="20"></td>
                        </tr>
                        <tr>
                            <td><label>Lembaran uang kertas Rp 10.000,-</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="right"><input type="text" name="tgl1" maxlength="4" size="4">
                            <label>&nbsp;&nbsp;Lembar = &nbsp;Rp.&nbsp;&nbsp;&nbsp;</label>
                            <input type="number" name="" size="20"></td>
                        </tr>
                        <tr>
                            <td><label>Lembaran uang kertas Rp 5.000,-</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="right"><input type="text" name="tgl1" maxlength="4" size="4">
                            <label>&nbsp;&nbsp;Lembar = &nbsp;Rp.&nbsp;&nbsp;&nbsp;</label>
                            <input type="number" name="" size="20"></td>
                        </tr>
                        <tr>
                            <td><label>Lembaran uang kertas Rp 2.000,-</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="right"><input type="text" name="tgl1" maxlength="4" size="4">
                            <label>&nbsp;&nbsp;Lembar = &nbsp;Rp.&nbsp;&nbsp;&nbsp;</label>
                            <input type="number" name="" size="20"></td>
                        </tr>
                        <tr>
                            <td><label>Lembaran uang kertas Rp 1.000,-</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="right">
                                <input type="text" name="tgl1" maxlength="4" size="4">
                                <label>&nbsp;&nbsp;Lembar = &nbsp;Rp.&nbsp;&nbsp;&nbsp;</label>
                                <input type="number" name="" size="20">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" align="right">
                                <b><label>Sub Jumlah (1) Rp.&nbsp;&nbsp;</label></b>
                                <input type="text" name="" size="22">
                            </td>
                        </tr>
                        <tr>
                            <td><label>Keping uang logam Rp 1.000,-</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="right"><input type="text" name="tgl1" maxlength="4" size="4">
                            <label>&nbsp;&nbsp;Keping = &nbsp;Rp.&nbsp;&nbsp;&nbsp;</label>
                            <input type="number" name="" size="20"></td>
                        </tr>
                        <tr>
                            <td><label>Keping uang logam Rp 500,-</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="right"><input type="text" name="tgl1" maxlength="4" size="4">
                            <label>&nbsp;&nbsp;Keping = &nbsp;Rp.&nbsp;&nbsp;&nbsp;</label>
                            <input type="number" name="" size="20"></td>
                        </tr>
                        <tr>
                            <td><label>Keping uang logam Rp 200,-</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="right"><input type="text" name="tgl1" maxlength="4" size="4">
                            <label>&nbsp;&nbsp;Keping = &nbsp;Rp.&nbsp;&nbsp;&nbsp;</label>
                            <input type="number" name="" size="20"></td>
                        </tr>
                        <tr>
                            <td><label>Keping uang logam Rp 100,-</label></td>
                            <td style="width: 1px;">:</td>
                            <td align="right"><input type="text" name="tgl1" maxlength="4" size="4">
                            <label>&nbsp;&nbsp;Keping = &nbsp;Rp.&nbsp;&nbsp;&nbsp;</label>
                            <input type="number" name="" size="20"></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="right">
                                <b><label>Sub Jumlah (2) Rp.&nbsp;&nbsp;</label></b>
                                <input type="text" name="" size="22">
                            </td>
                        </tr>
                        <tr>
                            <td>Saldo Bank, Surat Berharga, dll</td>
                            <td colspan="2" align="right">
                                <b><label>Sub Jumlah (3) Rp.&nbsp;&nbsp;</label></b>
                                <input type="text" name="" size="22">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" align="right">
                                <b><label>Jumlah (1 + 2 + 3) Rp.&nbsp;&nbsp;</label></b>
                                <input type="text" name="" size="22">
                            </td>
                        </tr>
                        <tr>
                            <td>Perbedaan (A - B)</td>
                            <td colspan="2" align="right">
                                <b><label>Rp.&nbsp;&nbsp;</label></b>
                                <input type="text" name="" size="22">
                            </td>
                        </tr>
                        <tr>
                            <td>Penjelasan Perbedaan</td>
                            <td colspan="2" align="right">
                                <textarea name="penjelasan" rows="2" cols="50"></textarea>
                            </td>
                        </tr>
                    </table>
                </form>
                </center>
            </div>
            <div class="row" id="lihat" style="display: none; margin-top: -20px;">
                <h1>Lihat Buku Kas Umum Bulan Sebelumnya</h1>
            </div>
            <footer class="row" style="margin-left: 20px; margin-right: 15px;">
                
                <div class="sixteen columns omega">
                    <center>&copy; 2016 Workshop Rekayasa Perangkat Lunak</center>
                </div>
                
            </footer>
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

            function switchcolor(id) {
                var property = document.getElementById('btn-buat');
                var property2 = document.getElementById('btn-lihat');
                if (id = 'btn-buat') {
                    property.css.background = "#72be3b";
                    property2.css.background = "#605f5f";
                }
                else {
                    property.style.background = "#605f5f";
                    property2.style.background = "#72be3b";
                }
            }

            $("#tambah").click(function(event){
                event.preventDefault();
                $("#bkutambah").append("<tr align=\"center\">"+
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
