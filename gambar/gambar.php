<?php
$pro="simpan";
$id_gambar="";
$id_pem_iklan="";
$gambar0="avatar.jpg";
$catatan="";
//$PATH="ypathcss";
?>  

<script type="text/javascript"> 
function PRINT(pk){ 
win=window.open('gambar/gambar_print.php?pk='+pk,'win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 

</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>


<?php
	$id_pem_iklan=$_GET["id"];
	$sql="select * from `$tbpemasangan_iklan` where `id_pem_iklan`='$id_pem_iklan'";
	$d=getField($conn,$sql);
				$id_pem_iklan=$d["id_pem_iklan"];
				$id_pem_iklan0=$d["id_pem_iklan"];
				$id_pelanggan=$d["id_pelanggan"];
				$judul=$d["judul"];
				$jenis=$d["jenis"];
				$kategori=$d["kategori"];
				$deskripsi=$d["deskripsi"];
				$harga=$d["harga"];
				$lokasi=$d["lokasi"];
				$fasilitas=$d["fasilitas"];
				$status=$d["status"];
				$tanggal=WKT($d["tanggal"]);
				$jam=$d["jam"];
				$tanggal_mulai=WKT($d["tanggal_mulai"]);
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$keterangan=$d["keterangan"];
	
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
  <h3>Masukan Gambar Iklan</h3>
  <div>
			
<form action="" method="post" enctype="multipart/form-data">
<table width="607" class="table table-bordered">

<tr>
<td width="142"><label for="id_pelanggan">Pelanggan</label>
<td width="10">:<td width="439"><?php echo getPelanggan($conn,$id_pelanggan);?>
</td></tr>
<tr>
<td><label for="judul">Judul</label>
<td>:<td><?php echo $judul;?>
</td></tr>

<tr>
<td><label for="tanggal_mulai">Tanggal Mulai</label>
<td>:<td><?php echo $tanggal_mulai;?>
</td></tr>

</table>
</form>
<?php
if(isset($_GET["pro"]) && $_GET["pro"]=="ubah"){
	$id_gambar=$_GET["kode"];
	$sql="select * from `$tbgambar` where `id_gambar`='$id_gambar'";
	$d=getField($conn,$sql);
				$id_gambar=$d["id_gambar"];
				$id_gambar0=$d["id_gambar"];
				$id_pem_iklan=$d["id_pem_iklan"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$catatan=$d["catatan"];
				
				$pro="ubah";		
}
?>

<form action="" method="post" enctype="multipart/form-data">
<table width="709" class="table table-bordered">


<tr>
  <td width="266" height="24"><label for="gambar">Gambar</label>
    <td width="11">:<td width="416" colspan="2">
        <input class="form-control" name="gambar" type="file" id="gambar" size="20" /> 
      => <a href='#' onclick='buka("gambar/zoom.php?id=<?php echo $id_gambar;?>")'><?php echo $gambar0;?></a></td>
</tr>

<tr>
<td height="24"><label for="catatan">Catatan</label>
<td>:<td>
<textarea name="catatan" class="form-control" cols="55" rows="2"><?php echo $catatan;?></textarea>
</td>
</tr>

<tr>
<td>
<td>
<td colspan="2"><input name="Simpan" type="submit"class="btn btn-primary" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_pem_iklan" type="hidden" id="id_pem_iklan" value="<?php echo $id_pem_iklan;?>" />
        <input name="gambar0" type="hidden" id="gambar0" value="<?php echo $gambar0;?>" />
        <input name="id_gambar" type="hidden" id="id_gambar" value="<?php echo $id_gambar;?>" />
        <input name="id_gambar0" type="hidden" id="id_gambar0" value="<?php echo $id_gambar0;?>" />
        <a href="?mnu=gambar&id=<?php echo $id_pem_iklan;?>"><input name="Batal" class="btn btn-warning" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
<br />
 
| <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $id_pem_iklan;?>')"> |
<br>

<table class="table table-bordered">
  <tr bgcolor="#cccccc">
    <th width="3%"><small>No</small></td>
	<th width="10%"><small>Gambar</small></td>
	 <th width="20%"><small>Catatan</small></td>
    <th width="15%"><small>Menu</small></td>
  </tr>
<?php  
$sql = "select * from `$tbgambar` where  `id_pem_iklan`='$id_pem_iklan' order by `id_gambar` desc";
	$jum = getJum($conn, $sql);
		if($jum > 0){
$no = 1;								
	$arr=getData($conn,$sql);
		foreach($arr as $d) {						
				$id_gambar=$d["id_gambar"];
				$id_pem_iklan=$d["id_pem_iklan"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$catatan=$d["catatan"];
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td><small>$no</small></td>
				<td><div align='center'>";
echo"<a href='#' onclick='buka(\"gambar/zoom.php?id=$id_gambar\")'>
<img src='$YPATH/$gambar' width='40' height='40' /></a></div>";
				echo"</td>		
				<td><small><i>$catatan</i></small></td>
				<td><div align='center'>
<a href='?mnu=gambar&id=$id_pem_iklan&pro=ubah&kode=$id_gambar'><img src='ypathicon/ub.png' title='ubah'></a>
<a href='?mnu=gambar&id=$id_pem_iklan&pro=hapus&kode=$id_gambar&id_pem_iklan=$id_pem_iklan'><img src='ypathicon/ha.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $id_pem_iklan pada data gambar ?..\")'></a></div></td>
				</tr>";
				
			$no++;
			}//for dalam
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data gambar belum tersedia...</blink></td></tr>";}
?>
</table>

<?php
echo"</div>";
?>


</div>

<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id_pem_iklan=strip_tags($_POST["id_pem_iklan"]);
	$gambar0=strip_tags($_POST["gambar0"]);
	if ($_FILES["gambar"] != "") {
		move_uploaded_file($_FILES["gambar"]["tmp_name"],"$YPATH/".$_FILES["gambar"]["name"]);
		$gambar=$_FILES["gambar"]["name"];
		} 
	else {$gambar=$gambar0;}
	if(strlen($gambar)<1){$gambar=$gambar0;}
	$catatan=strip_tags($_POST["catatan"]);
	
	
if($pro=="simpan"){
 $sql=" INSERT INTO `$tbgambar` (
`id_pem_iklan` ,
`gambar` ,
`catatan`
) VALUES (
'$id_pem_iklan',
'$gambar',
'$catatan'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Data $id_pem_iklan berhasil disimpan !');document.location.href='?mnu=gambar&id=$id_pem_iklan';</script>";}
		else{echo"<script>alert('Data $id_pem_iklan gagal disimpan...');document.location.href='?mnu=gambar&id=$id_pem_iklan';</script>";}
	}
	else{
		$id_gambar=strip_tags($_POST["id_gambar"]);
		$id_gambar0=strip_tags($_POST["id_gambar0"]);
		
	
	$sql="update `$tbgambar` set 
	`gambar`='$gambar',
	`catatan`='$catatan'
	 where `id_gambar`='$id_gambar0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data $id_pem_iklan berhasil diubah !');document.location.href='?mnu=gambar&id=$id_pem_iklan';</script>";}
		else{echo"<script>alert('Data $id_pem_iklan gagal diubah...');document.location.href='?mnu=gambar&id=$id_pem_iklan';</script>";}
	}//else simpan
}
?>

<?php
if(isset($_GET["pro"]) && $_GET["pro"]=="hapus"){
$id_gambar=$_GET["kode"];
$id_pem_iklan=$_GET["id_pem_iklan"];
$sql="delete from `$tbgambar` where `id_gambar`='$id_gambar'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data $id_pem_iklan berhasil dihapus !');document.location.href='?mnu=gambar&id=$id_pem_iklan';</script>";}
	else{echo"<script>alert('Data $id_pem_iklan gagal dihapus...');document.location.href='?mnu=gambar&id=$id_pem_iklan';</script>";}
}
?>

