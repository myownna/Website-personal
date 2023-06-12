<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
$YPATH="../ypathfile/";
error_reporting(0);
  ?>



 
<?php
	$id_pemesanan=$_GET["pk"];
	$sql="select * from `$tbpemesanan` where `id_pemesanan`='$id_pemesanan'";
	$d=getField($conn,$sql);
				$id_pemesanan=$d["id_pemesanan"];
				$id_pemesanan0=$d["id_pemesanan"];
				$tanggal=WKT($d["tanggal"]);
				$jam=$d["jam"];
				$id_pelanggan=$d["id_pelanggan"];
				$pengiriman=$d["pengiriman"];
				$tanggal_mulai=WKT($d["tanggal_mulai"]);
				$tanggal_selesai=WKT($d["tanggal_selesai"]);
				$durasi=$tanggal_selesai-$tanggal_mulai;
				$total=$d["total"];
				$status=$d["status"];
				$id_pengguna=$d["id_pengguna"];
				$keterangan=$d["keterangan"];
	
?>

	
	
    <div id="accordion">
  <h3>Laporan Detail Konfirmasi</h3>
  <div>
			
<form action="" method="post" enctype="multipart/form-data">
<table class="table table-bordered" >
<tr>
<th width="222"><label for="id_pemesanan">ID Pemesanan</label>
<th width="13">:
<th width="419" colspan="2"><b><?php echo $id_pemesanan;?></b></tr>


<tr>
<td height="24"><label for="id_pelanggan">Pelanggan</label>
<td>:<td><?php echo getPelanggan($conn,$id_pelanggan);?>
</td>
</tr>


<tr>
<td height="24"><label for="pengiriman">Pengiriman</label>
<td>:<td><?php echo $pengiriman;?>
</td>
</tr>

<tr>
<td height="24"><label for="tanggal_mulai">Tanggal Mulai</label>
<td>:<td><?php echo $tanggal_mulai;?>
</td>
</tr>

<tr>
<td height="24"><label for="tanggal_selesai">Tanggal Selesai</label>
<td>:<td><?php echo $tanggal_selesai;?>
</td>
</tr>
<tr>
<td height="24"><label for="durasi">Durasi</label>
<td>:<td><?php echo $durasi;?> hari
</td>
</tr>
<tr>
<td height="24"><label for="status">Status</label>
<td>:<td><?php echo $status;?>
</td>
</tr>

<tr>
<td height="24"><label for="keterangan">Keterangan</label>
<td>:<td><?php echo $keterangan;?>
</td>
</tr>

</table>
</form>
 

<table width="98%" border="0">
  <tr>
  <th width="3%">No</td>
   <th width="10%">ID Konfirmasi</td>
	<th width="20%">Pelanggan</td>
	<th width="20%">Nominal</td>
	<th width="20%">Pesan</td>
	<th width="20%">Bukti Bayar</td>
	 <th width="20%">Keterangan</td>
  </tr>
<?php  
 $sql="select * from `$tbkonfirmasi` where  `id_pemesanan`='$id_pemesanan' order by `id_konfirmasi` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_konfirmasi=$d["id_konfirmasi"];
				$tanggal=WKT($d["tanggal"]);
				$jam=$d["jam"];
				$id_pelanggan=$d["id_pelanggan"];
				$pelanggan=getPelanggan($conn,$d["id_pelanggan"]);
				$id_pemesanan=$d["id_pemesanan"];
				$nominal=$d["nominal"];
				$bukti_bayar=$d["bukti_bayar"];
				$bukti_bayar0=$d["bukti_bayar"];
				$pesan=$d["pesan"];
				$id_pengguna=$d["id_pengguna"];
				$pengguna=getPengguna($conn,$d["id_pengguna"]);
				$status=$d["status"];
				$keterangan=$d["keterangan"];
				
			
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$id_konfirmasi <br> <small> $tanggal $jam </small></td>
				<td>$id_pelanggan</td>	
				<td>Rp. ".RP($nominal)."</td>
				<td>$pesan</td>		
				<td><div align='center'>";
echo"<a href='#' onclick='buka(\"konfirmasi/zoom.php?id=$id_konfirmasi\")'>
<img src='$YPATH/$bukti_bayar' width='40' height='40' /></a></div>";
				echo"</td>				
				<td>$status -$keterangan #$pengguna <br> </td>
				</tr>";
				}
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data $item belum tersedia...</blink></td></tr>";}
	
	echo"</table>";
	?>