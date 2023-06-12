<?php
$pro="simpan";
$status="Aktif";
$id_pengguna="";
$nama_pengguna="";
$level="";
$email="";
$telepon="";
$username="";
$password="";
$keterangan="";
//$PATH="ypathcss";
?>  

<script type="text/javascript"> 
function PRINT(pk){ 
win=window.open('pengguna/pengguna_print.php?pk='+pk,'win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 

</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
  $sql="select `id_pengguna` from `$tbpengguna` order by `id_pengguna` desc";
  $jum= getJum($conn,$sql);
  $kd="USR";
		if($jum > 0){
				$d=getField($conn,$sql);
    			$idmax=$d['id_pengguna'];	
				$urut=substr($idmax,3,2)+1;//01
				if($urut<10){$idmax="$kd"."0".$urut;}
				else{$idmax="$kd".$urut;}
			}
		else{$idmax="$kd"."01";}
  $id_pengguna=$idmax;
?>
<?php
if(isset($_GET["pro"]) && $_GET["pro"]=="ubah"){
	$id_pengguna=$_GET["kode"];
	$sql="select * from `$tbpengguna` where `id_pengguna`='$id_pengguna'";
	$d=getField($conn,$sql);
				$id_pengguna=$d["id_pengguna"];
				$id_pengguna0=$d["id_pengguna"];
				$nama_pengguna=$d["nama_pengguna"];
				$level=$d["level"];
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
  <h3>Masukan Data Pengguna</h3>
  <div>
			
<form action="" method="post" enctype="multipart/form-data">
<table class="table table-bordered">
<tr>
<th width="138"><label for="id_pengguna">ID Pengguna</label>
<th width="10">:
<th colspan="2"><b><?php echo $id_pengguna;?></b></tr>
<tr>
<td><label for="nama_pengguna">Nama Pengguna</label>
<td>:<td width="604"><input required name="nama_pengguna" type="text" class="form-control"id="nama_pengguna" value="<?php echo $nama_pengguna;?>" size="25" />
</td></tr>

<tr>
<td><label for="level">Level</label>
<td>:<td colspan="2">
<input type="radio" name="level" id="level"  checked="checked" value="Administrator" <?php if($level=="Administrator"){echo"checked";}?>/>Administrator 
<input type="radio" name="level" id="level" value="Pegawai" <?php if($level=="Pegawai"){echo"checked";}?>/>Pegawai
</td></tr>

<tr>
<td height="24"><label for="email">Email</label>
<td>:<td><input  required name="email" type="email" class="form-control"id="email" value="<?php echo $email;?>" size="25" /></td>
</tr>

<tr>
<td height="24"><label for="telepon">Telepon</label>
<td>:<td><input  required name="telepon" type="number"class="form-control"id="telepon" value="<?php echo $telepon;?>" size="25" />
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
<td colspan="2"><input name="Simpan" type="submit"class="btn btn-primary" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
       
        <input name="id_pengguna" type="hidden" id="id_pengguna" value="<?php echo $id_pengguna;?>" />
        <input name="id_pengguna0" type="hidden" id="id_pengguna0" value="<?php echo $id_pengguna0;?>" />
        <a href="?mnu=pengguna"><input name="Batal" class="btn btn-warning" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
<br />
</div>



<?php  
  $sqlc="select distinct(`status`) from `$tbpengguna` order by `status` asc";
  $jumc=getJum($conn,$sqlc);
		if($jumc <1){
		echo"<h1>Maaf data pengguna belum tersedia</h1>";
		}
	$arrc=getData($conn,$sqlc);
		foreach($arrc as $dc) {						
				$status=$dc["status"];
				 $sql="select * from `$tbpengguna` where  `status`='$status' order by `id_pengguna` desc";
 				 $jum=getJum($conn,$sql);
				?>
<h3>Data Pengguna <?php echo "$status ($jum Pengguna)"?>:</h3>
<div>				
 
| <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $status;?>')"> |
<br>

<table class="table table-bordered">
  <tr bgcolor="#cccccc">
    <th width="3%"><small>No</small></td>
    <th width="10%"><small>ID Pengguna</small></td>
    <th width="20%"><small>Nama Pengguna</small></td>
	<th width="20%"><small>Telepon</small></td>
	<th width="20%"><small>Level</small></td>
	 <th width="20%"><small>Keterangan</small></td>
    <th width="15%"><small>Menu</small></td>
  </tr>
<?php  
		if($jum > 0){
$no = 1;									
	$arr=getData($conn,$sql);
		foreach($arr as $d) {						
				$id_pengguna=$d["id_pengguna"];
				$nama_pengguna=ucwords($d["nama_pengguna"]);
				$level=$d["level"];
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
				<td><small>$id_pengguna</small></td>
				<td><small><a href='mailto:$email' title='$email'><b>$nama_pengguna</b></a></small></td>
				<td><small>$telepon</small></td>		
				<td><small>$level</small></td>
				<td><small><i>$keterangan</i></small></td>
				<td><div align='center'>
<a href='?mnu=pengguna&pro=ubah&kode=$id_pengguna'><img src='ypathicon/ub.png' title='ubah'></a>
<a href='?mnu=pengguna&pro=hapus&kode=$id_pengguna&nama_pengguna=$nama_pengguna'><img src='ypathicon/ha.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama_pengguna pada data pengguna ?..\")'></a></div></td>
				</tr>";
				
			$no++;
			}//for dalam
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data pengguna belum tersedia...</blink></td></tr>";}
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
	$id_pengguna=strip_tags($_POST["id_pengguna"]);
	$id_pengguna0=strip_tags($_POST["id_pengguna0"]);
	$level=strip_tags($_POST["level"]);
	$email=strip_tags($_POST["email"]);
	$telepon=strip_tags($_POST["telepon"]);
	$username=strip_tags($_POST["username"]);
	$nama_pengguna=strip_tags($_POST["nama_pengguna"]);
	$password=strip_tags($_POST["password"]);
	
	
	
if($pro=="simpan"){
 $sql=" INSERT INTO `$tbpengguna` (
`id_pengguna` ,
`nama_pengguna` ,
`level` ,
`email` ,
`telepon` ,
`username` ,
`password` ,
`status` ,
`keterangan`
) VALUES (
'$id_pengguna', 
'$nama_pengguna',
'$level',
'$email',
'$telepon',
'$username',
'$password', 
'Aktif',
'$keterangan'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Data $nama_pengguna berhasil disimpan !');document.location.href='?mnu=pengguna';</script>";}
		else{echo"<script>alert('Data $nama_pengguna gagal disimpan...');document.location.href='?mnu=pengguna';</script>";}
	}
	else{
		$status=strip_tags($_POST["status"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	$sql="update `$tbpengguna` set 
	`nama_pengguna`='$nama_pengguna',
	`level`='$level',
	`email`='$email',
	`telepon`='$telepon' ,
	`username`='$username',
	`password`='$password',
	`status`='$status',
	`keterangan`='$keterangan'
	 where `id_pengguna`='$id_pengguna0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data $nama_pengguna berhasil diubah !');document.location.href='?mnu=pengguna';</script>";}
		else{echo"<script>alert('Data $nama_pengguna gagal diubah...');document.location.href='?mnu=pengguna';</script>";}
	}//else simpan
}
?>

<?php
if(isset($_GET["pro"]) && $_GET["pro"]=="hapus"){
$id_pengguna=$_GET["kode"];
$nama_pengguna=$_GET["nama_pengguna"];
$sql="delete from `$tbpengguna` where `id_pengguna`='$id_pengguna'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data $nama_pengguna berhasil dihapus !');document.location.href='?mnu=pengguna';</script>";}
	else{echo"<script>alert('Data $nama_pengguna gagal dihapus...');document.location.href='?mnu=pengguna';</script>";}
}
?>

