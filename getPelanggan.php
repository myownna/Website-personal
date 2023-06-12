<?php
error_reporting(0);

include "konmysqli.php";
$id_pelanggan=$_GET["q"];
	$sql = "select * from `$tbpelanggan` where `id_pelanggan`='$id_pelanggan'";
	$d = getField($conn, $sql);
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
?>


<table width="100%">
<tr>

 
<td><label for="id_customer">Nama Pelanggan</label>
<td>:<td><small><?php echo "$nama_pelanggan | $id_pelanggan";?></td>
<tr>
<tr>
<td height="24"><label for="alamat">Alamat</label>
<td>:<td><small><?php echo "$alamat";?>
</td>
</tr>  
<tr>
<td height="24"><label for="email">Kontak</label>
<td>:<td><small><?php echo "$email, $telepon";?>
</td>
</tr>

</table> 
<hr>


	