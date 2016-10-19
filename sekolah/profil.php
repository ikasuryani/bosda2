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

            <div class="sixteen columns" style="position: relative; z-index: -1;">
                <!-- <div class="h-border"> -->
                    <div class="heading" style="margin-top: 20px; margin-bottom: 20px;">
                        <h1>Profil</h1>
                    </div>
                <!-- </div> -->
            </div>

            <div class="row">
                <center>
                    <img style="height: 180px;" src='img/fp.jpg'><br>
                    <br>
                    <div class='profile' style="color: black;">
                        <div><?php echo $_SESSION['namalengkap'];?></div><br>
                        <div><?php echo $_SESSION['jabatan'] . " " . $_SESSION['namasekolah'];?></div><br>
                        <div class=""> <a href="../logout.php"><img  style="height: 30px;" src="img/out.png"> </a></div>
                    </div>
                </center>
            </div>
            
            <div class="sixteen columns" style="position: relative; z-index: -1;">

            </div>
            
            <div class="sixteen columns row">
            </div>

            <?php require_once("footer.php");?>
        </div>
        <!--Close Container Div-->
        <!--Grab JS Files-->
        <script src="js/jquery.js" ></script>
        <script src="js/jquery.flexslider.js" ></script>

    </body>
</html>
