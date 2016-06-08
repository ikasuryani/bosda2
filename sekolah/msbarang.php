<?php
    require_once("../dbdansession.php");

    //require_once("../controller/function.php");
    $pesan = "";
    if(isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $idinduk = $_POST['idinduk'];
        $sql = "INSERT INTO barang (`id`, `nama`, `hargastandar`, `created_at`) VALUES (NULL, $nama', '$harga','". date("Y-m-d h:i:s")."')";
        if(mysql_query($sql)) {
            $pesan = "Berhasil Menambahkan Data";
        } else {
            echo "gagal";
            echo $sql;
            echo mysql_error();
        }
    }
    $id = 0;
    //ambil id terakhir dan nntinya di +1
    $query = "SELECT id from barang order by id desc limit 1";
    $results = mysql_query($query);
    while ($rows = mysql_fetch_assoc($results)) {
        $id = $rows['id']; 
    }
    $id++;
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
                        <h1>Master Barang</h1>
                    </div>
                <!-- </div> -->
            </div>
            
            <div class="sixteen columns row">
                
            </div>
            <div class="row">
            </div>
            <div class="row" id="buatbaru" style="display: block; margin-top: -20px;">
                <center><h1>Tambah/Ubah data Barang</h1></center>
                <br><br>
                <center>
                <form class="pure-form" method="POST">
                    <table class="pure-table pure-table-form">
                        <tr>
                            <td><label>ID </label></td>
                            <td style="width: 1px; ">:</td>
                            <td align="left"><label><?php echo $id;?></label></td>
                        </tr>
                        <tr>
                            <td><label>Nama Program </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left"><input type="text" name="nama" size="40"></td>
                        </tr>
                        <tr>
                            <td><label>Harga Standar </label></td>
                            <td style="width: 1px;">:</td>
                            <td align="left">Rp. <input type="number" name="harga" size="40"></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center"><input type="submit" class="btn-black-grey" name="submit" value="Simpan"></td>
                        </tr>
                        <?php if($pesan != "") { ?>
                        <tr>
                            <td colspan="3" align="center"><?php echo $pesan;?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </form>
                </center>
                <hr style="margin-right: 15px;">
            </div>

            <div class="row" style="margin-top: -30px;" align="center">
                <h1>Daftar Barang</h1><br>
                <table class="pure-table pure-table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Harga Standar</th>
                    <th>Tanggal Pembuatan Data</th>
                </tr>
                </thead>
                <?php
                    //ambil semua data buat diload di tabel dibawah form
                    $ambilsemua = "SELECT * from barang order by id asc";
                    $resulta = mysql_query($ambilsemua);
                    echo mysql_error();
                    while ($rowa = mysql_fetch_assoc($resulta)) {
                        $ids = $rowa['id']; 
                        $namas = $rowa['nama'];
                        $harga = $rowa['hargastandar'];
                        $tgl =  $rowa['created_at'];
                ?>
                <tr>
                    <td><?php echo $ids;?></td>
                    <td><?php echo $namas;?></td>
                    <td><?php echo $harga;?></td>
                    <td><?php echo $tgl;?></td>
                </tr>
                <?php } ?>
                </table>
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
