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
                        <h1>RKAS</h1>
                    </div>
                <!-- </div> -->
            </div>
            
            <div class="sixteen columns row">
                <center>
                    <h2>RENCANA KEGIATAN DAN ANGGARAN SEKOLAH</h2>
                    <br>
                    <br>
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
                <center><h1>Buat Baru RKAS</h1></center>
                <br><br>
                <form>
                    <label>Tahun Ajaran:  </label><label>2016</label><br>
                    <label>Nama Sekolah:  </label><label>SDN 001 Surabaya</label><br>
                    <label>Desa/Kecamatan:  </label><label>Kecamatan Tenggilis</label><br>
                    <label>Kabupaten/Kota:  </label><label>Surabaya</label><br>
                    <label>Provinsi:  </label><label>Jawa Timur</label><br>
                    <label>Triwulan:  </label><label>3</label><br>
                    <br>
                    <label>Sumber dana:  </label><label>BOS</label><br>
                    <br>
                    <br>
                    <table id="rkastambah" border="1" class="pure-table pure-table-bordered" style="margin-right: 20px;">
                        <tr align="center" style="vertical-align: middle;">
                            <td rowspan="2">No. Urut</td>
                            <td rowspan="2">No. Kode</td>
                            <td rowspan="2">Uraian</td>
                            <td rowspan="2">Jumlah</td>
                            <td colspan="4">Triwulan</td>
                            <td rowspan="3"></td>
                        </tr>
                        <tr align="center">
                            <td>I</td>
                            <td>II</td>
                            <td>III</td>
                            <td>IV</td>
                        </tr> 
                        <tr align="center">
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>

                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                        </tr>
                        <tr align="center">
                            <td><input type="text" name="norut" size="5"></td>
                            <td><input type="text" name="norut" size="5"></td>
                            <td width="300px"><input type="text" name="norut" size="36"></td>
                            <td><input type="text" name="norut"></td>
                            <td><input type="text" name="norut" size="10"></td>
                            <td><input type="text" name="norut" size="10"></td>
                            <td><input type="text" name="norut" size="10"></td>
                            <td><input type="text" name="norut" size="10"></td>
                            <!-- <td width="60px"><input type="checkbox" name="norut"></td>
                            <td width="60px"><input type="checkbox" name="norut"></td>
                            <td width="60px"><input type="checkbox" name="norut"></td>
                            <td width="60px"><input type="checkbox" name="norut"></td> -->
                            <td><button id="tambah">+</button></td>
                        </tr>
                        
                    </table>
                </form>
            </div>
            <div class="row" id="lihat" style="display: none; margin-top: -20px;">
                <h1>Cari RKAS Sebelumnya</h1>
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
                $("#rkastambah").append("<tr align=\"center\">"+
                            "<td><input type=\"text\" name=\"norut\"></td>" + 
                            "<td><input type=\"text\" name=\"norut\"></td>" +
                            "<td width=\"300px\"><input type=\"text\" name=\"norut\"></td>" +
                            "<td><input type=\"text\" name=\"norut\"></td>" +
                            "<td width=\"60px\"><input type=\"checkbox\" name=\"norut\"></td>" +
                            "<td width=\"60px\"><input type=\"checkbox\" name=\"norut\"></td>" +
                            "<td width=\"60px\"><input type=\"checkbox\" name=\"norut\"></td>" +
                            "<td width=\"60px\"><input type=\"checkbox\" name=\"norut\"></td></tr>");
            }); 
        </script>
    </body>
</html>
