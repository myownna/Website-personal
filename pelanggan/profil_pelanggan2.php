 <script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>
<br><br>
<h2 class="wow fadeInUp" data-wow-delay="0.3s"><font color="red"><center><u>Ubah Profil Pelanggan<u></center></font></h2>
 <div align="center">

  <?php
	$id_pelanggan=$_SESSION["cid"];
	$sql="select * from `$tbpelanggan` where `id_pelanggan`='$id_pelanggan'";
	$d=getField($conn,$sql);
				$id_pelanggan=$d["id_pelanggan"];
				$id_pelanggan0=$d["id_pelanggan"];
				$nama_pelanggan=$d["nama_pelanggan"];
				$alamat=$d["alamat"];
				$username=$d["username"];
				$password=$d["password"];
				$telepon=$d["telepon"];
				$email=$d["email"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
				

?>
   
 </div>
<form action="" method="post" enctype="multipart/form-data">
   <div align="center">
     <table class="table table-condensed">
       
       
<form action="" method="post" enctype="multipart/form-data">
<table class="table table-condensed">
<tr>
<th width="20%"><label for="id_pelanggan">ID Pelanggan</label>
<th width="1%">:
<th colspan="2"><b><?php echo $id_pelanggan;?></b></tr>
<tr>
<td><label for="nama_pelanggan">Nama Pelanggan</label>
<td>:<td width="213"><input required name="nama_pelanggan" type="text" id="nama_pelanggan" class="form-control" value="<?php echo $nama_pelanggan;?>" size="25" />
</td>

</tr>

<tr>
<td height="24"><label for="telepon">Telepon</label>
<td>:<td><input  required name="telepon" type="number" id="telepon" class="form-control" value="<?php echo $telepon;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="email">Email</label>
<td>:<td><input  required name="email" type="email" id="email" class="form-control" value="<?php echo $email;?>" size="25" />
</td>
</tr>

</tr>
<tr>
<td height="24"><label for="alamat">Alamat</label>
<td>:<td>
<textarea name="alamat" class="form-control" cols="55" rows="2"><?php echo $alamat;?></textarea>
</td>
</tr>

<tr>
<td height="24"><label for="username">Username</label>
<td>:<td><input required  name="username" type="text" id="username" class="form-control" value="<?php echo $username;?>" size="25" /></td>
</tr>

<tr>
<td height="24"><label for="password">Password</label>
<td>:<td><input  required   name="password" placeholder="Minimal 8 Karakter" type="password" id="password" class="form-control" value="<?php echo $password;?>" size="25" /></td>
</tr>

       
       <tr>
         <td align="left" valign="top">
          <td>
          <td colspan="2" align="left">	<input name="Simpan" type="submit"  class="btn btn-primary" id="Simpan" value="Ubah Profil" />
            <a href="?mnu=profil_pelanggan"><input name="Batal"  class="btn btn-danger" type="button" id="Batal" value="Batal" /></a>
        </td></tr>
     </table>
   </div>
 </form>

<?php
if(isset($_POST["Simpan"])){
	$id_pelanggan0=strip_tags($_SESSION["cid"]);
	$username=strip_tags($_POST["username"]);
	$nama_pelanggan=strip_tags($_POST["nama_pelanggan"]);
	$password=strip_tags($_POST["password"]);
	$telepon=strip_tags($_POST["telepon"]);
	$email=strip_tags($_POST["email"]);
	$alamat=strip_tags($_POST["alamat"]);
	$status=strip_tags($_POST["status"]);
	$keterangan=strip_tags($_POST["keterangan"]);

$sql="update `$tbpelanggan` set 
	`nama_pelanggan`='$nama_pelanggan',
	`username`='$username',
	`password`='$password',
	`telepon`='$telepon' ,
	`alamat`='$alamat' ,
	`email`='$email'
	 where `id_pelanggan`='$id_pelanggan0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $nama_pelanggan Berhasil Diubah ');document.location.href='?mnu=profil_pelanggan';</script>";}
	else{echo"<script>alert('Data $nama_pelanggan  Gagal Diubah, Silahkan Menggunakan Username Yang Lain');document.location.href='?mnu=profil_pelanggan';</script>";}
	}//else simpan

?>
<div align="center">
  </div>
  <br><br><br>