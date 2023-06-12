<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);  
  ?>
<?php
session_start();
error_reporting(0);
require_once"konmysqli.php";

$mnu="";
if(isset($_GET["mnu"])){
	$mnu=$_GET["mnu"];
}

date_default_timezone_set("Asia/Jakarta");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $tittle;?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">


</head>

<body>

    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> Clambi.Ball
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Clambi.Ball
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Clambi.Ball
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Clambi.Ball
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Clambi.Ball
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                   
                    <div class="right-phone-box">
                        <p><b>Call US :- <a href="#"> 08111191848</a></b></p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.php?mnu=home"><img src="images/logo3.png" class="logo3" alt=""></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <?php
if($_SESSION["cstatus"]=="Admin"){	
      echo"
      <li class='nav-item' ";if($mnu=="home"){echo"class='active'";} echo"><a class='nav-link' href='index.php?mnu=home'>Home</a></li>
	  <li class='nav-item' ";if($mnu=="admin"){echo"class='active'";} echo"><a class='nav-link' href='index.php?mnu=admin'>Admin</a></li>
	  <li class='nav-item' ";if($mnu=="pelanggan"){echo"class='active'";} echo"><a class='nav-link' href='index.php?mnu=pelanggan'>Pelanggan</a></li>
	  <li class='nav-item' ";if($mnu=="pemasangan_iklan"){echo"class='active'";} echo"><a class='nav-link' href='index.php?mnu=pemasangan_iklan'>Pemasangan Iklan</a></li>
	   <li class='nav-item' ";if($mnu=="inbox"){echo"class='active'";} echo"><a class='nav-link' href='index.php?mnu=inbox'>Inbox</a></li>
	   <li class='nav-item' ";if($mnu=="logout"){echo"class='active'";} echo"><a class='nav-link' href='index.php?mnu=logout'>Logout</a></li>
	   ";
}
else if($_SESSION["cstatus"]=="Pelanggan"){	
      echo"
	  <li class='nav-item' ";if($mnu=="home"){echo"class='active'";} echo"><a class='nav-link' href='index.php?mnu=home'>Home</a></li>
      <li class='nav-item' ";if($mnu=="profil_pelanggan"){echo"class='active'";} echo"><a class='nav-link' href='index.php?mnu=profil_pelanggan'>Profil Pelanggan</a></li>
	   <li class='dropdown megamenu-fw'>
                           <a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'>List Iklan</a>
                            <ul class='dropdown-menu megamenu-content' role=\menu\>
                                <li>
                                    <div class='row'>
                                        <div class='col-menu col-md-6'>
                                            <h6 class='title'>Jenis</h6>
                                            <div class='content'>
                                                <ul class='menu-col'>
													<li><a href='index.php?mnu=daftar_iklanall'>All</a></li>
                                                    <li><a href='index.php?mnu=daftar_iklan&jen=Ruko'>Ruko</a></li>
                                                    <li><a href='index.php?mnu=daftar_iklan&jen=Kavling'>Kavling</a></li>
													<li><a href='index.php?mnu=daftar_iklan&jen=Cluster'>Cluster</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class='col-menu col-md-6'>
                                            <h6 class='title'>Kategori</h6>
                                            <div class='content'>
                                                <ul class='menu-col'>
												<li><a href='index.php?mnu=daftar_iklanall'>All</a></li>
                                                    <li><a href='index.php?mnu=daftar_iklan2&kat=Dijual'>Dijual</a></li>
                                                    <li><a href='index.php?mnu=daftar_iklan2&kat=Disewakan'>Disewakan</a></li>
                                                    <li><a href='index.php?mnu=daftar_iklan2&kat=Dijual atau Disewakan'>Dijual atau Disewakan</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </li>
                            </ul>
                        </li>
		<li class='nav-item' ";if($mnu=="request_iklan"){echo"class='active'";} echo"><a class='nav-link' href='index.php?mnu=request_iklan'>Request Iklan</a></li>
		<li class='nav-item' ";if($mnu=="_inbox"){echo"class='active'";} echo"><a class='nav-link' href='index.php?mnu=_inbox'>Inbox</a></li>
	    <li class='nav-item' ";if($mnu=="logout"){echo"class='active'";} echo"><a class='nav-link' href='index.php?mnu=logout'>Logout</a></li>";
}
else{
	 echo" <li class='nav-item' ";if($mnu=="home"){echo"class='active'";} echo"><a class='nav-link' href='index.php?mnu=home'>Home</a></li>";
echo"  <li class='dropdown megamenu-fw'>
                           <a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown'>List Iklan</a>
                            <ul class='dropdown-menu megamenu-content' role=\menu\>
                                <li>
                                    <div class='row'>
                                        <div class='col-menu col-md-6'>
                                            <h6 class='title'>Jenis</h6>
                                            <div class='content'>
                                                <ul class='menu-col'>
                                                    <li><a href='index.php?mnu=daftar_iklan&jen=Ruko'>Ruko</a></li>
                                                    <li><a href='index.php?mnu=daftar_iklan&jen=Kavling'>Kavling</a></li>
													<li><a href='index.php?mnu=daftar_iklan&jen=Cluster'>Cluster</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class='col-menu col-md-6'>
                                            <h6 class='title'>Kategori</h6>
                                            <div class='content'>
                                                <ul class='menu-col'>
                                                    <li><a href='index.php?mnu=daftar_iklan2&kat=Dijual'>Dijual</a></li>
                                                    <li><a href='index.php?mnu=daftar_iklan2&kat=Disewakan'>Disewakan</a></li>
                                                    <li><a href='index.php?mnu=daftar_iklan2&kat=Dijual atau Disewakan'>Dijual atau Disewakan</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </li>
                            </ul>
                        </li>";	 
	 echo" <li class='nav-item' ";if($mnu=="login"){echo"class='active'";} echo"><a class='nav-link' href='login.php'>Register/Login</a></li>"; 
	}
      ?>
                    </ul>
                </div>
            </div>
          
        </nav>
    </header>
    
<?php if($mnu=="home" | $mnu==""){?>
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-left">
                <img src="images/sw1.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome ClambiBall</strong></h1>
                            <p class="m-b-40">Solusi cepat dan mudah untuk mengiklankan properti milikmu. <br>  Jangkauan luas seluruh Jabodetabek.</p>
                            <p><a class="btn hvr-hover" href="index.php?mnu=request_iklan">Iklankan Sekarang</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/sw2.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Bingung cari properti yang sesuai?</strong></h1>
                            <p class="m-b-40">Langsung saja, tunggu apalagi.</p>
                            <p><a class="btn hvr-hover" href="index.php?mnu=daftar_iklanall">Lihat Properti</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-right">
                <img src="images/sw4.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Bingung? Ada yang mau ditanyakan?</strong></h1>
                            <p class="m-b-40">Hubungi kami.</p>
                            <p><a class="btn hvr-hover" href="index.php?mnu=_inbox">Hubungi Sekarang</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>

   
<?php } ?>
    <div class="products-box">
        <div class="container">
           <?php 

				
if($mnu=="admin"){require_once"admin/admin.php";}
else if($mnu=="pemasangan_iklan"){require_once"pemasangan_iklan/pemasangan_iklan.php";}
else if($mnu=="request_iklan"){require_once"pemasangan_iklan/request_iklan.php";}
else if($mnu=="gambar"){require_once"gambar/gambar.php";}
else if($mnu=="pelanggan"){require_once"pelanggan/pelanggan.php";}
else if($mnu=="profil_pelanggan"){require_once"pelanggan/profil_pelanggan.php";}
else if($mnu=="profil_pelanggan2"){require_once"pelanggan/profil_pelanggan2.php";}
else if($mnu=="konfirmasi"){require_once"konfirmasi/konfirmasi.php";}
else if($mnu=="_konfirmasi"){require_once"konfirmasi/_konfirmasi.php";}
else if($mnu=="inbox"){require_once"inbox/inbox.php";}
else if($mnu=="daftar_iklan"){require_once"daftar_iklan.php";}
else if($mnu=="daftar_iklan2"){require_once"daftar_iklan2.php";}
else if($mnu=="daftar_iklanall"){require_once"daftar_iklanall.php";}
else if($mnu=="detail_iklan"){require_once"detail_iklan.php";}
else if($mnu=="_inbox"){require_once"_inbox.php";}
else if($mnu=="login"){require_once"login.php";}
else if($mnu=="logout"){require_once"logout.php";}
else {require_once"home.php";}
				
			
 ?>
        </div>
    </div>
	<?php if($mnu=="home" | $mnu==""){}
	else {echo"<br><br>";}
	?>

    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2018 <a href="#">ClambiBall</a> Design By :
            <a href="https://html.design/">ClambiBall</a></p>
    </div>

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

   <?php if($mnu=="home" || $mnu=="_inbox" || $mnu=="daftar_iklan" || $mnu=="daftar_iklan2" || $mnu=="daftar_iklanall" || $mnu=="detail_iklan"  || $mnu=="profil_pelanggan" || $mnu=="profil_pelanggan2" ||  $mnu==""){?>
    <script src="js/jquery-3.2.1.min.js"></script><?php } ?>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>