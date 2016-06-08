<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Tri</title>
        <meta charset="utf-8">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400' rel='stylesheet' type='text/css'>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="css/flexslider.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width; initial-scale=1.0">
        <style>
            .profile div{
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <header class="sixteen columns alpha omega"> 
                <br>
                <br>
                <h2>Endang Sukamti - Pengurus BOS SMPN 1 Surabaya</h2>
                <nav class="main-nav sixteen columns">

                    <ul class="ten columns alpha">
                        <li><a href="index.html">Beranda</a></li>
                        <li><a href="profil.html">Profil</a></li>
                        <li><a href="dapodik.html">Dapodik Sekolah</a></li>
                        <li><a href="laporan.html">Laporan Penggunaan Dana</a></li>

                    </ul>

                    <!--Close Social Div-->
                </nav>
            </header>



            <!--  <section class="sixteen columns feature">
                <div class="flexslider">
                  <ul class="slides">
                    <li> <img src="img/feature-1.png" alt=""> </li>
                    <li> <img src="img/feature-1.png" alt=""> </li>
                  </ul>
                </div>
                Close Flexslider Div
              </section>-->
            <div class="sixteen columns">
                <div class="h-border">
                    <div class="heading">
                        <h1>PROFIL</h1>
                    </div>
                    <!--Close "Heading" Div-->
                </div>
                <!--Close H-border Div-->
            </div>


            <div class="row">
                <center>
                    <img style="height: 180px;" src='img/fp.jpg'><br>
                    <br>
                    <div class='profile' style="color: black;">
                        <div> Endang Sukamti</div>
                        <div>Pengurus BOS SMPN 1 Surabaya</div>
                        <div class=""> <a href="#" ><img  style="height: 30px;" src="img/out.png"> </a></div>
                    </div>
                </center>
            </div>
            <footer class="row">
                <div class="eight columns omega">
                    <p>&copy 2016 <a href="#">Workshop Rekayasa Perangkat Lunak</a></p>
                </div>
                <!--    <nav class="eight columns alpha">
                      <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="portfolio.html">Work</a></li>
                        <li><a href="contact.html">Hire me</a></li>
                        <li><a href="blog.html">Blog</a></li>
                      </ul>
                    </nav>-->
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
        </script>
    </body>
</html>
