<?php
$pro="simpan";
$status="Aktif";
$id_pelanggan="";
$nama_pelanggan="";
$alamat="";
$email="";
$telepon="";
$username="";
$password="";
$keterangan="";

//$PATH="ypathcss";
?>

<script type="text/javascript"> 
function PRINT(pk){ 
win=window.open('pelanggan/pelanggan_print.php?pk='+pk,'win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 

</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
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
?>
<?php
if(isset($_GET["pro"]) && $_GET["pro"]=="ubah"){
	$id_pelanggan=$_GET["kode"];
	$sql="select * from `$tbpelanggan` where `id_pelanggan`='$id_pelanggan'";
	$d=getField($conn,$sql);
				$id_pelanggan=$d["id_pelanggan"];
				$id_pelanggan0=$d["id_pelanggan"];
				$nama_pelanggan=$d["nama_pelanggan"];
				$alamat=$d["alamat"];
				$email=$d["email"];
				$telepon=$d["telepon"];
				$username=$d["username"];
				$password=$d["password"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
				
				$pro="ubah";		
}
?>
 <link rel="stylesheet" href="jsacordeon/jquery-ui.css">
  <link rel="stylesheet" href="resources/demos/style.css">
<script src="jsacordeon/jquery-1.12.4.js"></script>
  <script src="jsacordeon/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion({
      collapsible: true
    });
  } );
  </script>
	
	
    <div id="accordion">
  <h3>Masukan Data Pelanggan</h3>
  <div>
			
<form action="" method="post" enctype="multipart/form-data">
<table class="table table-bordered" >
<tr>
<th width="134"><label for="id_pelanggan">ID Pelanggan</label>
<th width="10">:
<th colspan="2"><b><?php echo $id_pelanggan;?></b></tr>
<tr>
<td><label for="nama_pelanggan">Nama Pelanggan</label>
<td>:<td width="525"><input required name="nama_pelanggan" type="text" class="form-control"id="nama_pelanggan" value="<?php echo $nama_pelanggan;?>" size="25" /></td>
</tr>

<tr>
<td height="24"><label for="alamat">Alamat</label>
<td>:<td><textarea name="alamat" cols="25" required="required" class="form-control" id="alamat"><?php echo $alamat;?></textarea></td>
</tr>

<tr>
<td height="24"><label for="email">Email</label>
<td>:<td><input  required name="email" type="email" class="form-control"id="email" value="<?php echo $email;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="telepon">Telepon</label>
<td>:<td><input  required name="telepon" type="number" class="form-control"id="telepon" value="<?php echo $telepon;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="username">Username</label>
<td>:<td><input required  name="username" type="text" class="form-control"id="username" value="<?php echo $username;?>" size="25" /></td>
</tr>

<tr>
<td height="24"><label for="password">Password</label>
<td>:<td><input  required   name="password" type="password" class="form-control"id="password" value="<?php echo $password;?>" size="25" /></td>
</tr>
<?php
if(isset($_GET["pro"]) && $_GET["pro"]=="ubah"){?>
<tr>
<td><label for="status">Status</label>
<td>:<td colspan="2">
<input type="radio" name="status" id="status"  checked="checked" value="Aktif" <?php if($status=="Aktif"){echo"checked";}?>/>Aktif 
<input type="radio" name="status" id="status" value="Tidak Aktif" <?php if($status=="Tidak Aktif"){echo"checked";}?>/>Tidak Aktif
</td></tr>

<tr>
<td height="24"><label for="keterangan">Keterangan</label>
<td>:<td>
<textarea name="keterangan" class="form-control" cols="55" rows="2"><?php echo $keterangan;?></textarea>
</td>
</tr>
<?php } ?>
<tr>
<td>
<td>
<td colspan="2"><input name="Simpan" type="submit" class="btn btn-primary" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
       
        <input name="id_pelanggan" type="hidden" id="id_pelanggan" value="<?php echo $id_pelanggan;?>" />
        <input name="id_pelanggan0" type="hidden" id="id_pelanggan0" value="<?php echo $id_pelanggan0;?>" />
        <a href="?mnu=pelanggan"><input name="Batal" class="btn btn-warning" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
<br />
</div>



<?php  
  $sqlc="select distinct(`status`) from `$tbpelanggan` order by `status` asc";
  $jumc=getJum($conn,$sqlc);
		if($jumc <1){
		echo"<h1>Maaf data pelanggan belum tersedia</h1>";
		}
	$arrc=getData($conn,$sqlc);
		foreach($arrc as $dc) {						
				$status=$dc["status"];
				$sql="select * from `$tbpelanggan` where  `status`='$status' order by `id_pelanggan` desc";
  $jum=getJum($conn,$sql);
				?>
<h3>Data Pelanggan <?php echo "$status ($jum Pelanggan)"?>:</h3>
<div>				
 
| <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $status;?>')"> |
<br>

<table class="table table-bordered">
  <tr bgcolor="#cccccc">
    <th width="3%"><small>No</small></td>
    <th width="10%"><small>ID Pelanggan</small></td>
    <th width="20%"><small>Nama Pelanggan</small></td>
	<th width="20%"><small>Alamat</small></td>
	 <th width="20%"><small>Telepon</small></td>
	 <th width="20%"><small>Keterangan</small></td>
    <th width="15%"><small>Menu</small></td>
  </tr>
<?php  
		if($jum > 0){
$no = 1;								
	$arr=getData($conn,$sql);
		foreach($arr as $d) {						
				$id_pelanggan=$d["id_pelanggan"];
				$nama_pelanggan=ucwords($d["nama_pelanggan"]);
				$alamat=$d["alamat"];
				$email=$d["email"];
				$telepon=$d["telepon"];
				$username=$d["username"];
				$password=$d["password"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
				
			
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td><small>$no</small></td>
				<td><small>$id_pelanggan</small></td>
				<td><small><a href='mailto:$email' title='$email'><b>$nama_pelanggan</b></a></small></td>
				<td><small>$alamat</small></td>
				<td><small>$telepon</small></td>		
				<td><small>$keterangan</small></td>
				<td><div align='center'>
<a href='?mnu=pelanggan&pro=ubah&kode=$id_pelanggan'><img src='ypathicon/ub.png' title='ubah'></a>
<a href='?mnu=pelanggan&pro=hapus&kode=$id_pelanggan&nama_pelanggan=$nama_pelanggan'><img src='ypathicon/ha.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama pada data pelanggan ?..\")'></a></div></td>
				</tr>";
				
			$no++;
			}//for dalam
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data pelanggan belum tersedia...</blink></td></tr>";}
?>
</table>

<?php
echo"</div>";
}//for atas
?>


</div>

<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id_pelanggan=strip_tags($_POST["id_pelanggan"]);
	$id_pelanggan0=strip_tags($_POST["id_pelanggan0"]);
	$alamat=strip_tags($_POST["alamat"]);
	$email=strip_tags($_POST["email"]);
	$telepon=strip_tags($_POST["telepon"]);
	$username=strip_tags($_POST["username"]);
	$nama_pelanggan=strip_tags($_POST["nama_pelanggan"]);
	$password=strip_tags($_POST["password"]);
	
	
	
if($pro=="simpan"){
 $sql=" INSERT INTO `$tbpelanggan` (
`id_pelanggan` ,
`nama_pelanggan` ,
`alamat` ,
`email` ,
`telepon` ,
`username` ,
`password` ,
`status` ,
`keterangan`
) VALUES (
'$id_pelanggan', 
'$nama_pelanggan',
'$alamat',
'$email',
'$telepon',
'$username',
'$password', 
'Aktif',
'$keterangan'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Data $nama_pelanggan berhasil disimpan !');document.location.href='?mnu=pelanggan';</script>";}
		else{echo"<script>alert('Data $nama_pelanggan gagal disimpan...');document.location.href='?mnu=pelanggan';</script>";}
	}
	else{
		$status=strip_tags($_POST["status"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	$sql="update `$tbpelanggan` set 
	`nama_pelanggan`='$nama_pelanggan',
	`alamat`='$alamat',
	`email`='$email',
	`telepon`='$telepon' ,
	`username`='$username',
	`password`='$password',
	`status`='$status',
	`keterangan`='$keterangan'
	 where `id_pelanggan`='$id_pelanggan0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data $nama_pelanggan berhasil diubah !');document.location.href='?mnu=pelanggan';</script>";}
		else{echo"<script>alert('Data $nama_pelanggan gagal diubah...');document.location.href='?mnu=pelanggan';</script>";}
	}//else simpan
}
?>

<?php
if(isset($_GET["pro"]) && $_GET["pro"]=="hapus"){
$id_pelanggan=$_GET["kode"];
$nama_pelanggan=$_GET["nama_pelanggan"];
$sql="delete from `$tbpelanggan` where `id_pelanggan`='$id_pelanggan'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data $nama_pelanggan berhasil dihapus !');document.location.href='?mnu=pelanggan';</script>";}
	else{echo"<script>alert('Data $nama_pelanggan gagal dihapus...');document.location.href='?mnu=pelanggan';</script>";}
}
?>

