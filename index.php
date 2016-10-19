<?php

session_start();
//ngecek kalo sudah login ga bisa balik ke halaman login lagi
if (isset($_SESSION['login']) && $_SESSION['login']) {
    header('location:sekolah/index.php');
}

$pesan = "";

$link = mysql_connect('localhost', 'root', '');
// $link = mysql_connect('localhost', 'egov03', 'wsrpl');
if (!$link) {
  die('Could not connect: ' . mysql_error());
}
else {
  //echo 'Connected successfully';
  mysql_select_db('bosda') or die("Database select failed");
  // mysql_select_db('egov03') or die("Database select failed");
}

if (isset($_POST['btnlogin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    //buat ubah password ke bentuk md5
    // $password = md5($password);
    //ambil username dan password dari database
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    //ditampung di result datanya
    $result = mysql_query($sql);
    if (mysql_num_rows($result) > 0) {
        //cek apakah sama username sama passwordnya, kalo iya masuk ke adminhome
        if ($row = mysql_fetch_assoc($result)) {
            //session adminlogin diisi sama username yg saat ini
            $_SESSION['login'] = true;
            $_SESSION['iduser'] = $row['id'];
            $_SESSION['namalengkap'] = $row['namalengkapdgngelar'];
            $_SESSION['nama'] = $row['namapanggilan'];
            $_SESSION['jabatan'] = $row['jabatan'];
            $lembaga = $row['idlembaga'];
            $_SESSION['idsekolah'] = $lembaga;
            $sql2 = "SELECT nama from sekolah where id = '" . $lembaga . "'";
            $result2 = mysql_query($sql2);
            $row2 = mysql_fetch_assoc($result2);
            $_SESSION['namasekolah'] = $row2['nama'];
            header('location: sekolah/index.php');
        }
    }
    else {
      $pesan = "Username dan password tidak ditemukan";
    }
}

?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Login BOS-DA</title>
    <link rel="stylesheet" href="login/css/reset.css">
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="login/css/style.css">
</head>

<body>    
<!-- Mixins-->
<!-- Pen Title-->
<div class="pen-title">
    <h1>Sistem Informasi Bantuan Operasional Sekolah</h1><span style="font-size: 25px;">2016</span>
</div>
<!-- <div class="rerun"><a href="#">Help</a></div> -->
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Login</h1>
    <form method="POST">
      <div class="input-container">
        <input type="text" id="Username" name="username" required="required"/>
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div>

      <div class="input-container">
        <input type="password" id="Password" name="password" required="required"/>
        <label for="Password">Password</label>
        <div class="bar"></div>
      </div>
      
      <div class="button-container">
        <!-- <input type="submit" class="button" name="submit" value="Login"> -->
        <button type="submit" name="btnlogin"><span>Login</span></button>
      </div>
      <div class="footer"><p style="color: red;"><?php echo $pesan;?></p></div>
    </form>
  </div>

</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="login/js/index.js"></script>

</body>
</html>