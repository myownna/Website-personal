<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
$YPATH="../ypathfile/";

  ?>

<?php
	$nip=$_GET["pk"];
	$sql="select * from `$tbpegawai` where `nip`='$nip'";
	$d=getField($conn,$sql);
				$nip=$d["nip"];
				$nip0=$d["nip"];
				$nama_pegawai=$d["nama_pegawai"];
				$divisi=$d["divisi"];
				$email=$d["email"];
				$telepon=$d["telepon"];
				$username=$d["username"];
				$password=$d["password"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
	
?>

	
    <div id="accordion">
  <h3>Detail Foto Pegawai</h3>
  <div>
			
<form action="" method="post" enctype="multipart/form-data">
<table width="607" class="table table-bordered">

<tr>
<td width="142"><label for="nip">NIP</label>
<td width="10">:<td width="439"><?php echo $nip;?>
</td></tr>
<tr>
<td><label for="nama_pegawai">Nama Pegawai</label>
<td>:<td><?php echo $nama_pegawai;?>
</td></tr>

<tr>
<td><label for="divisi">Divisi</label>
<td>:<td><?php echo $divisi;?>
</td></tr>

<tr>
<td height="24"><label for="email">Kontak</label>
<td>:<td><?php echo "$email, Telp. $telepon";?></td>
</tr>


</table>
</form>

 

<table width="98%" border="0">
  <tr>
    <th width="3%"><small>No</small></td>
    <th width="10%"><small>Foto</small></td>
	 <th width="20%"><small>Catatan</small></td>
  </tr>
<?php  
$sql = "select * from `$tbfoto` where  `nip`='$nip' order by `id_foto` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_foto=$d["id_foto"];
				$nip=$d["nip"];
				$foto=$d["foto"];
				$foto0=$d["foto"];
				$catatan=$d["catatan"];
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td><small>$no</small></td>
				<td><div align='center'>";
echo"<a href='#' onclick='buka(\"foto/zoom.php?id=$id_foto\")'>
<img src='$YPATH/$foto' width='40' height='40' /></a></div>";
				echo"</td>		
				<td><small><i>$catatan</i></small></td>
				</tr>";
				}
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data belum tersedia...</blink></td></tr>";}
	
	echo"</table>";
	?>