<?php

$tanggal=WKT(date("Y-m-d"));
$jam=date("H:i:s");
$pro="simpan";
$status="0";
$id_pelanggan="";
$pesan="";
$kategori="";
$keterangan="";
//$PATH="ypathcss";
?> 

<script type="text/javascript"> 
function PRINT(pk){ 
win=window.open('inbox/inbox_print.php?pk='+pk,'win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 

</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
if(isset($_GET["pro"]) && $_GET["pro"]=="ubah"){
	$id_inbox=$_GET["kode"];
	$sql="select * from `$tbinbox` where `id_inbox`='$id_inbox'";
	$d=getField($conn,$sql);
				$id_inbox=$d["id_inbox"];
				$id_inbox0=$d["id_inbox"];
				$id_pelanggan=$d["id_pelanggan"];
				$pesan=$d["pesan"];
				$tanggal=WKT($d["tanggal"]);
				$jam=$d["jam"];
				$kategori=$d["kategori"];
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
  <h3>Masukan Data Inbox</h3>
  <div>
			
<form action="" method="post" enctype="multipart/form-data">
<table class="table">
<tr>
<td height="24"><label for="id_pelanggan">Pilih Pelanggan</label>
<td>:<td><select name="id_pelanggan" class="form-control" id="id_pelanggan">
  <?php  
  echo"<option value='$id_pelanggan' ";echo">$id_pelanggan</option>";
  $sql="select * from `$tbpelanggan`";
$arr=getData($conn,$sql);
		foreach($arr as $d) {							
				$id_pelanggan0=$d["id_pelanggan"];
				$nama_pelanggan=$d["nama_pelanggan"];
		echo"<option value='$id_pelanggan0' ";if($id_pelanggan0==$id_pelanggan){echo"selected";} echo">$nama_pelanggan ($id_pelanggan0)</option>";
		}
?>
</select></td>
</tr>
<tr>
<td height="24"><label for="pesan">Pesan</label>
<td>:<td>
<textarea name="pesan" cols="55" class="form-control" rows="2"><?php echo $pesan;?></textarea>
</td>
</tr>

<?php
if(isset($_GET["pro"]) && $_GET["pro"]=="ubah"){?>

<tr>
<td><label for="status">Status</label>
<td>:<td colspan="2">
<input type="radio" name="status" id="status"  checked="checked" value="Read" <?php if($status=="Read"){echo"checked";}?>/>Read 
<input type="radio" name="status" id="status" value="Unread" <?php if($status=="Unread"){echo"checked";}?>/>Unread
</td></tr>

<tr>
<td height="24"><label for="keterangan">Keterangan</label>
<td>:<td>
<textarea name="keterangan" cols="55" class="form-control" rows="2"><?php echo $keterangan;?></textarea>
</td>
</tr>
<?php } ?>
<tr>
<td>
<td>
<td colspan="2"><input name="Simpan" type="submit" class="btn btn-primary" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_inbox" type="hidden" id="id_inbox" value="<?php echo $id_inbox;?>" />
        <input name="id_inbox0" type="hidden" id="id_inbox0" value="<?php echo $id_inbox0;?>" />
        <a href="?mnu=inbox"><input name="Batal" class="btn btn-danger" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
<br />
</div>



<?php  
  $sqlc="select distinct(`id_pelanggan`) from `$tbinbox` order by `id_pelanggan` asc";
  $jumc=getJum($conn,$sqlc);


		if($jumc <1){
		echo"<h1>Maaf data inbox belum tersedia</h1>";
		}
	$arrc=getData($conn,$sqlc);
		foreach($arrc as $dc) {						
				$id_pelanggan=$dc["id_pelanggan"];
				$pelanggan=getPelanggan($conn,$dc["id_pelanggan"]);
				$sql="select * from `$tbinbox` where  `id_pelanggan`='$id_pelanggan' order by `id_inbox` desc";
  $jum=getJum($conn,$sql);
				?>
				<?php
	$sqlx="select `status` from `$tbinbox` where `status`='Unread' and `id_pelanggan`='$id_pelanggan'  order by `id_pelanggan` asc";
  $jumx=getJum($conn,$sqlx);
  ?>
<h3>Data Inbox <?php echo "$pelanggan ($jum Inbox $jumx Unread)"?>:</h3>
<div>				
 
| <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $id_pelanggan;?>')"> |
<br>

<table class="table">
  <tr bgcolor="#cccccc">
    <th width="3%"><small>No</small></td>
    <th width="20%"><small>Pesan</small></td>
	<th width="20%"><small>Kategori</small></td>
	 <th width="20%"><small>Keterangan</small></td>
    <th width="15%"><small>Menu</small></td>
  </tr>
<?php  
		if($jum > 0){
//--------------------------------------------------------------------------------------------
$batas   = 10;
$page=1;
if(isset($_GET['page'])){
	$page = $_GET['page'];
}
if(empty($page)){$posawal  = 0;$page = 1;}
else{$posawal = ($page-1) * $batas;}


$sql2 = $sql." LIMIT $posawal,$batas";
$no = $posawal+1;
//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {						
				$id_inbox=$d["id_inbox"];
				$id_pelanggan=$d["id_pelanggan"];
				$nama_pelanggan=getPelanggan($conn,$d["id_pelanggan"]);
				$pesan=$d["pesan"];
				$tanggal=WKT($d["tanggal"]);
				$jam=$d["jam"];
				$kategori=$d["kategori"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
				
			
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td><small>$no</small></td>
				<td><small> $tanggal $jam  <br> <i>$pesan</i></small></td>
				<td><small>$kategori</small></td>
				<td><small>$keterangan</small></td>
				<td><div align='center'>";
				if($status=="Unread"){
				echo"<a href='?mnu=inbox&pro=read&kode=$id_inbox'><font color='red'>Belum Dibaca</font></a>";}
				else if($status=="Dikirim CS"){
				echo"Dikirim CS";}
				else {echo"<font color='green'>Sudah Dibaca</a>";}
				echo"</div></td>
				</tr>";
				
			$no++;
			}//for dalam
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data inbox belum tersedia...</blink></td></tr>";}
?>
</table>

<?php
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=1;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=inbox'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=inbox'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=inbox'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
echo "<p align=center>Total data <b>$jmldata</b> item</p>";

echo"</div>";
}//for atas
?>


</div>

<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id_pelanggan=strip_tags($_POST["id_pelanggan"]);
	$pesan=strip_tags($_POST["pesan"]);
	$tanggal=date("Y-m-d");
	$jam=date("H:i:s");
	$kategori=strip_tags($_POST["kategori"]);
	
	
	
if($pro=="simpan"){
 $sql=" INSERT INTO `$tbinbox` (
`id_pelanggan` ,
`pesan` ,
`tanggal` ,
`jam` ,
`kategori` ,
`status` ,
`keterangan`
) VALUES (
'$id_pelanggan',
'$pesan',
'$tanggal', 
'$jam',
'CS',
'Dikirim CS',
'$keterangan'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Data $id_pelanggan berhasil disimpan !');document.location.href='?mnu=inbox';</script>";}
		else{echo"<script>alert('Data $id_pelanggan gagal disimpan...');document.location.href='?mnu=inbox';</script>";}
	}
	else{
	$id_inbox=strip_tags($_POST["id_inbox"]);
	$id_inbox0=strip_tags($_POST["id_inbox0"]);
	$status=strip_tags($_POST["status"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	$sql="update `$tbinbox` set 
	`id_pelanggan`='$id_pelanggan',
	`pesan`='$pesan',
	`kategori`='$kategori',
	`status`='$status',
	`keterangan`='$keterangan'
	 where `id_inbox`='$id_inbox0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data $id_pelanggan berhasil diubah !');document.location.href='?mnu=inbox';</script>";}
		else{echo"<script>alert('Data $id_pelanggan gagal diubah...');document.location.href='?mnu=inbox';</script>";}
	}//else simpan
}
?>

<?php
$id_inbox=strip_tags($_POST["id_inbox"]);
$id_inbox0=strip_tags($_POST["id_inbox0"]);
$status=strip_tags($_POST["status"]);

if(isset($_GET["pro"]) && $_GET["pro"]=="read"){
$id_inbox=$_GET["kode"];
$sql="update `$tbinbox` set 
	`status`='Read'
	 where `id_inbox`='$id_inbox'";
$read=process($conn,$sql);
	if($read) {echo "<script>alert('Pesan sudah dibaca');document.location.href='?mnu=inbox';</script>";}
	else{echo"<script>alert('Pesan gagal dibaca');document.location.href='?mnu=inbox';</script>";}
}
?>
