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
                        <h1>RAPBS</h1>
                    </div>
                <!-- </div> -->
            </div>
            
            <div class="sixteen columns row">
                <center>
                    <h2>RENCANA ANGGARAN PENDAPATAN DAN BELANJA SEKOLAH</h2>
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
                <center><h1>Buat Baru RAPBS</h1></center>
                <br><br>
                <form>
                    <label>Tahun Ajaran:  </label><label>2016</label><br>
                    <label>Nama Sekolah:  </label><label>SDN 001 Surabaya</label><br>
                    <label>Desa/Kecamatan:  </label><label>Kecamatan Tenggilis</label><br>
                    <label>Kabupaten/Kota:  </label><label>Surabaya</label><br>
                    <label>Provinsi:  </label><label>Jawa Timur</label><br>
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
                            <td><input type="text" name="sisatahunlalu"></td>
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
                            <td><input type="text" name="pendrutin"></td>
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
                            <td><input type="text" name="bospusat"></td>
                            <td align="center">5</td>
                            <td>Pengembangan Sarana dan Prasarana Sekolah</td>
                            <td><input type="text" name="psps"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">3.2</td>
                            <td>BOS Provinsi</td>
                            <td><input type="text" name="bosprov"></td>
                            <td align="center">6</td>
                            <td>Pengembangan Standar Pengelolaan</td>
                            <td><input type="text" name="pspl"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">3.3</td>
                            <td>BOS Kabupaten/Kota</td>
                            <td><input type="text" name="boskota"></td>
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
                            <td><input type="text" name="dadek"></td>
                            <!-- <td rowspan="7">&nbsp;</td> -->
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">4.2</td>
                            <td>Dana Tugas Pembantuan</td>
                            <td><input type="text" name="dtp"></td>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">4.3</td>
                            <td>Dana Alokasi Khusus</td>
                            <td><input type="text" name="dak"></td>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">4.2</td>
                            <td>Lain-lain (bantuan luar negeri/hibah)*</td>
                            <td><input type="text" name="lainlain"></td>
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
                            <td><input type="text" name="nilaisl1"></td>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">5.2</td>
                            <td><input type="text" name="sumberlain2"></td>
                            <td><input type="text" name="nilaisl2"></td>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3">Jumlah Penerimaan</td>
                            <td><label id="totalterima">Rp 0,-</label></td>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="6">*sebutkan jika ada</td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="row" id="lihat" style="display: none; margin-top: -20px;">
                <h1>Cari RAPBS Sebelumnya</h1>
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
        </script>
    </body>
</html>
