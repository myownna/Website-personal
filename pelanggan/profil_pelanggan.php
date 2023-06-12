 <script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<br><br>
<h2 class="wow fadeInUp" data-wow-delay="0.3s"><font color="red"><center>
      <u>Profil Pelanggan<u></center></font></h2>
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
       
       
       
<tr>
<th width="20%"><label for="id_pelanggan">ID Pelanggan</label>
<th width="1%">:
<th colspan="2"><b><?php echo $id_pelanggan;?></b></tr>
<tr>
<td><label for="nama_pelanggan">Nama Pelanggan</label>
<td>:<td width="213"><?php echo $nama_pelanggan;?>
</td>
</tr>

<tr>
<td height="24"><label for="telepon">Telepon</label>
<td>:<td><?php echo $telepon;?>
</td>
</tr>

<tr>
<td height="24"><label for="email">Email</label>
<td>:<td><?php echo $email;?>
</td>
</tr>
</tr>
<tr>
<td height="24"><label for="alamat">Alamat</label>
<td>:<td>
<?php echo $alamat;?>
</td>
</tr>
<tr>
<td height="24"><label for="username">Username</label>
<td>:<td><?php echo $username;?></td>
</tr>

<tr>
<td height="24"><label for="password">Password</label>
<td>:<td><?php echo md5($password);?></td>
</tr>

       
       <tr>
         <td align="left" valign="top">
          <td>
          <td colspan="2" align="left">	<a href="?mnu=profil_pelanggan2"><input name="Simpan" type="button" class="btn btn-primary" id="Simpan" value="Ubah Profil" /></a>
               
        </td></tr>
     </table>
   </div>
 </form>
</div>

<div align="center">
  </div>
  <br><br><br>