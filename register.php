<?php
session_start();
//error_reporting(0);
require_once"konmysqli.php";

?>
<?php
$status="";
$nama_pelanggan="";
$alamat="";
$telepon="";
$email="";
$keterangan="";
$username="";
$password="";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register <?php echo $tittle;?></title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="reglogin/css/opensans-font.css">
	<link rel="stylesheet" type="text/css" href="reglogin/fonts/line-awesome/css/line-awesome.min.css">
	<!-- Jquery -->
	<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="reglogin/css/style.css"/>
</head>
<body class="form-v4">
	<div class="page-content">
		<div class="form-v4-content">
		
			<div class="form-left">
				<h2>INFOMATION</h2>
				<p class="text-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Et molestie ac feugiat sed. Diam volutpat commodo.</p>
				<p class="text-2"><span>Eu ultrices:</span> Vitae auctor eu augue ut. Malesuada nunc vel risus commodo viverra. Praesent elementum facilisis leo vel.</p>
				<div class="form-left-last">
					<a href="login.php"><input type="submit" name="account" class="account" value="Have An Account"></a>
				</div>
			</div>
			<form class="form-detail" action="" method="post" id="myform">
				<h2>REGISTER FORM</h2>
				
				
					<div class="form-row">
						<label for="nama_pelanggan">Nama</label>
						<input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control">
					</div>
				<br>
				<div class="form-group">
					<div class="form-row form-row-1 ">
						<label for="email">Email</label>
						<input type="email" name="email" id="email" class="form-control" required>
					</div>
					<div class="form-row form-row-1">
						<label for="telepon">Telepon</label>
						<input type="number" name="telepon" id="telepon" class="form-control" required>
					</div>
				</div>
				<br>
					
				<div>
						<label for="alamat">Alamat</label>
						<input  type="text" name="alamat" id="alamat" class="form-control">
					</div>
					<br>
				<div class="form-group">
					<div class="form-row form-row-1 ">
						<label for="username">Username</label>
						<input type="text" name="username" id="username" class="form-control" required>
					</div>
					<div class="form-row form-row-1">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" class="form-control" required>
					</div>
				</div>
				<br>
				<div class="form-row-last">
					<input type="submit" name="Simpan" class="register" value="Register">
				</div>
				<br>
			</form>
			
		</div>
		
	</div>
	
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>


<?php
if(isset($_POST["Simpan"])){
	$id_pelanggan=strip_tags($_POST["id_pelanggan"]);
	$id_pelanggan0=strip_tags($_POST["id_pelanggan0"]);
	$alamat=strip_tags($_POST["alamat"]);
	$nama_pelanggan=strip_tags($_POST["nama_pelanggan"]);
	$telepon=strip_tags($_POST["telepon"]);
	$email=strip_tags($_POST["email"]);
	$status=strip_tags($_POST["status"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	$username=strip_tags($_POST["username"]);
	$password=strip_tags($_POST["password"]);
	
$sql="select `id_pelanggan` from `$tbpelanggan` order by `id_pelanggan` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="PLG".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_pelanggan"];
   
   $bul=substr($idmax,5,2);
   $tah=substr($idmax,3,2);
    if($bul==$bl && $tah==$th){
     $urut=substr($idmax,7,3)+1;
     if($urut<10){$idmax="$kd"."00".$urut;}
     else if($urut<100){$idmax="$kd"."0".$urut;}
     else{$idmax="$kd".$urut;}
    }//==
    else{
     $idmax="$kd"."001";
     }   
   }//jum>0
  else{$idmax="$kd"."001";}
  $id_pelanggan=$idmax;
	
	
 $sql=" INSERT INTO `$tbpelanggan` (
`id_pelanggan` ,
`nama_pelanggan` ,
`alamat` ,
`telepon` ,
`email` ,
`status` ,
`keterangan` ,
`username` ,
`password`
) VALUES (
'$id_pelanggan', 
'$nama_pelanggan',
'$alamat',
'$telepon',
'$email',
'Aktif',
'-',
'$username',
'$password'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Anda berhasil mendaftar, silahkan login untuk memasang iklan!');document.location.href='login.php';</script>";}
		else{echo"<script>alert('Anda gagal mendaftar, data duplikat. Silahkan gunakan username yang lain.');document.location.href='register.php';</script>";}
	}
	
	?>