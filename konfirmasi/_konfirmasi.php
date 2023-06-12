<?php
$tanggal=WKT(date("Y-m-d"));
$jam=date("H:i:s");
$bukti_bayar0="avatar.jpg";
$pro="simpan";
$status="Konfirmasi";
$id_konfirmasi="";
$id_pelanggan="";
$id_pem_iklan="";
$nominal="";
$pesan="";
$keterangan="";

?>


<script type="text/javascript"> 
function PRINT(pk){ 
win=window.open('konfirmasi/konfirmasi_print.php?pk='+pk,'win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 

</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>


<?php
  $sql="select `id_konfirmasi` from `$tbkonfirmasi` order by `id_konfirmasi` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="KNF".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_konfirmasi"];
   
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
  $id_konfirmasi=$idmax;
?>


<?php
	$id_pem_iklan=$_GET["id"];
	$sql="select * from `$tbpemasangan_iklan` where `id_pem_iklan`='$id_pem_iklan'";
	$d=getField($conn,$sql);
				$id_pem_iklan=$d["id_pem_iklan"];
				$id_pem_iklan0=$d["id_pem_iklan"];
				$id_pelanggan=$d["id_pelanggan"];
				$judul=$d["judul"];
				$deskripsi=$d["deskripsi"];
				$harga=$d["harga"];
				$lokasi=$d["lokasi"];
				$fasilitas=$d["fasilitas"];
				$statusx=$d["status"];
				$tanggal=WKT($d["tanggal"]);
				$jam=$d["jam"];
				$tanggal_mulai=WKT($d["tanggal_mulai"]);
				$durasi=$d["durasi"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$keterangan=$d["keterangan"];
	
?>

<h3>Order <?php echo $id_pem_iklan; ?></h3>
<hr>
<table width="100%">
	<tr>
		<th width="20%"><label for="id_pem_iklan">ID Pemasangan Iklan</label>
		<th width="1%">:
		<td colspan="2"><?php echo $id_pem_iklan; ?>
	</tr>
	
	<tr>
		<th width="20%"><label for="id_pelanggan">Nama Pelanggan</label>
		<th width="1%">:
		<td colspan="2"><?php echo getPelanggan($conn,$id_pelanggan); ?> - <?php echo $id_pelanggan; ?> 
	</tr>
    
    
	<tr>
<th height="24"><label for="judul">Judul</label>
<th>:<td><small><?php echo $judul;?>

<tr>
<th height="24"><label for="harga">Harga</label>
<th>:<td><small>Rp. <?php echo RP($harga);?>

</tr>
	<tr>
		<th width="20%"><label for="tanggal">Waktu Pemasangan</label>
		<th width="1%">:
		<td colspan="2"><?php echo "$tanggal $jam Wib (Status $statusx)"; ?>
	</tr>
</tr>
	<tr>
		<th width="20%"><label for="tanggal_mulai">Tanggal Mulai</label>
		<th width="1%">:
		<td colspan="2"><?php echo "$tanggal_mulai"; ?>
	</tr>
	
	<tr>
		<th width="20%"><label for="durasi">Durasi</label>
		<th width="1%">:
		<td colspan="2"><?php echo "$durasi"; ?>
	</tr>



</table>
<hr>
<?php
if(isset($_GET["pro"]) && $_GET["pro"]=="ubah"){
	$id_konfirmasi=$_GET["kode"];
	$sql="select * from `$tbkonfirmasi` where `id_konfirmasi`='$id_konfirmasi'";
	$d=getField($conn,$sql);
				$id_konfirmasi=$d["id_konfirmasi"];
				$id_konfirmasi0=$d["id_konfirmasi"];
				$id_pem_iklan=$d["id_pem_iklan"];
				$nominal=$d["nominal"];
				$pesan=$d["pesan"];
				$tanggal=$d["tanggal"];
				$jam=$d["jam"];
				$bukti_bayar=$d["bukti_bayar"];
				$bukti_bayar0=$d["bukti_bayar"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
				$pro="ubah";		
}
?>

	<?php
	if($durasi=="1 Bulan"){$nominal=25000;}
	else if($durasi=="3 Bulan"){$nominal=65000;}
	else if($durasi=="6 Bulan"){$nominal=110000;}
	else { $nominal=200000;}
	
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
  <h3>Masukan Data Konfirmasi</h3>
  <div>
			
<form action="" method="post" enctype="multipart/form-data">
<table class="table table-bordered" >
<tr>
<th width="20%"><label for="id_konfirmasi">ID Konfirmasi</label>
<th width="1%">:
<th colspan="2"><b><?php echo $id_konfirmasi;?></b></tr>

<tr>
<td><label for="nominal">Nominal</label>
<td>:<td colspan="2"><input required  style="width: 450px;" class="form-control" name="nominal" type="number" id="nominal" value="<?php echo $nominal;?>" size="25" />
</td></tr>

<tr>
<td height="24"><label for="pesan">Pesan</label>
<td>:<td>
<textarea name="pesan" class="form-control" style="width: 650px;"  cols="55" rows="2"><?php echo $pesan;?></textarea>
</td>
</tr>
<tr>
  <td height="24"><label for="bukti_bayar">Struk Bukti Transfer</label>
    <td>:<td colspan="2">
        <input class="form-control" name="bukti_bayar" type="file" id="bukti_bayar" size="20" /> 
      => <a href='#' onclick='buka("konfirmasi/zoom.php?id=<?php echo $id_konfirmasi;?>")'><?php echo $bukti_bayar0;?></a></td>
</tr>

<tr>
<td>
<td>
<td colspan="2"><input name="Simpan" type="submit" class="btn btn-primary" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
		<input name="bukti_bayar0" type="hidden" id="bukti_bayar0" value="<?php echo $bukti_bayar0;?>" />
		<input name="id_pem_iklan" type="hidden" id="id_pem_iklan" value="<?php echo $id_pem_iklan;?>" />
        <input name="id_konfirmasi" type="hidden" id="id_konfirmasi" value="<?php echo $id_konfirmasi;?>" />
        <input name="id_konfirmasi0" type="hidden" id="id_konfirmasi0" value="<?php echo $id_konfirmasi0;?>" />
        <a href="?mnu=konfirmasi&id=<?php echo $id_pem_iklan;?>"><input name="Batal" class="btn btn-warning" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
<br />
		
 
| <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $id_pem_iklan;?>')"> |
<br>

<table class="table table-bordered">
  <tr bgcolor="#cccccc">
    <th width="3%"><small>No</small></td>
    <th width="10%"><small>Struk</small></td>
	<th width="20%"><small>Pembayaran</small></td>
	 <th width="20%"><small>Keterangan</small></td>
  </tr>
<?php  
  $sql="select * from `$tbkonfirmasi` where  `id_pem_iklan`='$id_pem_iklan' order by `id_konfirmasi` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
$no = 1;
//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql);
		foreach($arr as $d) {						
				$id_konfirmasi=$d["id_konfirmasi"];
				$tanggal=WKT($d["tanggal"]);
				$jam=$d["jam"];
				$id_pelanggan=$d["id_pelanggan"];
				$pelanggan=getPelanggan($conn,$d["id_pelanggan"]);
				$id_pem_iklan=$d["id_pem_iklan"];
				$nominal=$d["nominal"];
				$bukti_bayar=$d["bukti_bayar"];
				$bukti_bayar0=$d["bukti_bayar"];
				$pesan=$d["pesan"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
				
			
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td><small>$no</small></td>
				<td><div align='center'>";
echo"<a href='#' onclick='buka(\"konfirmasi/zoom.php?id=$id_konfirmasi\")'>
<img src='$YPATH/$bukti_bayar' width='40' height='40' /></a></div>";
				echo"</td>	
				<td><small><b>$id_konfirmasi</b><br> $tanggal Jam $jam Wib
	<br> <small>Nominal TF: <u>Rp. ".RP($nominal)."</u></i> <i>Pesan: $pesan</small>			
				<td><small>$status <i>#$keterangan</i> </small></td>
		
				</tr>";
				
			$no++;
			}//for dalam
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data konfirmasi belum tersedia...</blink></td></tr>";}
?>
</table>

<?php
echo"</div>";
?>


</div>

<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id_konfirmasi=strip_tags($_POST["id_konfirmasi"]);
	$id_konfirmasi0=strip_tags($_POST["id_konfirmasi0"]);
	$tanggal=date("Y-m-d");
	$jam=date("H:i:s");
	$id_pelanggan=strip_tags($_POST["id_pelanggan"]);
	$id_pem_iklan=strip_tags($_POST["id_pem_iklan"]);
	$nominal=strip_tags($_POST["nominal"]);
	$pesan=strip_tags($_POST["pesan"]);
	$bukti_bayar0=strip_tags($_POST["bukti_bayar0"]);
	if ($_FILES["bukti_bayar"] != "") {
		move_uploaded_file($_FILES["bukti_bayar"]["tmp_name"],"$YPATH/".$_FILES["bukti_bayar"]["name"]);
		$bukti_bayar=$_FILES["bukti_bayar"]["name"];
		} 
	else {$bukti_bayar=$bukti_bayar0;}
	if(strlen($bukti_bayar)<1){$bukti_bayar=$bukti_bayar0;}
	$status=strip_tags($_POST["status"]);
	if($status=="Valid"){
		$sql="update `$tbpemasangan_iklan` set status='Approve' where `id_pem_iklan`='$id_pem_iklan'";
		$up=process($conn,$sql);
	}
	$keterangan=strip_tags($_POST["keterangan"]);
	
	
if($pro=="simpan"){
 $sql=" INSERT INTO `$tbkonfirmasi` (
`id_konfirmasi` ,
`tanggal` ,
`jam` ,
`id_pelanggan` ,
`id_pem_iklan` ,
`nominal` ,
`pesan` ,
`bukti_bayar` ,
`status` ,
`keterangan`
) VALUES (
'$id_konfirmasi', 
'$tanggal',
'$jam',
'$id_pelanggan', 
'$id_pem_iklan',
'$nominal',
'$pesan',
'$bukti_bayar',
'Konfirmasi',
'-'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Data $id_konfirmasi berhasil disimpan !');document.location.href='?mnu=_konfirmasi&id=$id_pem_iklan';</script>";}
		else{echo"<script>alert('Data $id_konfirmasi gagal disimpan...');document.location.href='?mnu=_konfirmasi&id=$id_pem_iklan';</script>";}
	}
	}
?>
