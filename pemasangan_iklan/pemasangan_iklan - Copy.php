<?php
$tanggal=WKT(date("Y-m-d"));
$jam=date("H:i:s");
$pro="simpan";
$gambar0="avatar.jpg";
$gambar20="avatar.jpg";
$gambar30="avatar.jpg";
$gambar40="avatar.jpg";
$gambar50="avatar.jpg";
$gambar60="avatar.jpg";
$gambar70="avatar.jpg";
$gambar80="avatar.jpg";
$gambar90="avatar.jpg";
$gambar100="avatar.jpg";
$id_pelanggan="";
$judul="";
$deskripsi="";
$harga="";
$lokasi="";
$fasilitas="";
$status="Request";
$tanggal_expire=WKT(date("Y-m-d"));
$keterangan="";
//$PATH="ypathcss";
?>


<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal_expire").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    
<script type="text/javascript">
var xmlHttp;

function showUp(str){ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null){
 alert ("Browser tidak support HTTP Request");
 return;
 } 
var url="getPelanggan.php";
url=url+"?q="+str;
url=url+"&sid="+Math.random();
xmlHttp.onreadystatechange=SC1;
xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}

function SC1() { 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
 document.getElementById("txtHint").innerHTML=xmlHttp.responseText ;
 } 
}

function GetXmlHttpObject(){
var xmlHttp=null;
try{xmlHttp=new XMLHttpRequest();}
catch (e){
	try{xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");}
 	catch (e){xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");}
 }
return xmlHttp;
}
</script>
<script type="text/javascript"> 
function PRINT(pk){ 
win=window.open('pemasangan_iklan/pemasangan_iklan_print.php?pk='+pk,'win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, fasilitas=0'); } 

</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>


<?php
  $sql="select `id_pem_iklan` from `$tbpemasangan_iklan` order by `id_pem_iklan` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="PIK".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_pem_iklan"];
   
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
  $id_pem_iklan=$idmax;
?>
<?php
if(isset($_GET["pro"]) && $_GET["pro"]=="ubah"){
	$id_pem_iklan=$_GET["kode"];
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
				$tanggal_expire=WKT($d["tanggal_expire"]);
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$gambar2=$d["gambar2"];
				$gambar20=$d["gambar2"];
				$gambar3=$d["gambar3"];
				$gambar30=$d["gambar3"];
				$gambar4=$d["gambar4"];
				$gambar40=$d["gambar4"];
				$gambar5=$d["gambar5"];
				$gambar50=$d["gambar5"];
				$gambar6=$d["gambar6"];
				$gambar60=$d["gambar6"];
				$gambar7=$d["gambar7"];
				$gambar70=$d["gambar7"];
				$gambar8=$d["gambar8"];
				$gambar80=$d["gambar8"];
				$gambar9=$d["gambar9"];
				$gambar90=$d["gambar9"];
				$gambar10=$d["gambar10"];
				$gambar100=$d["gambar10"];
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
  <h3>Input Data Pemasangan Iklan</h3>
  <div>
			
<form action="" method="post" enctype="multipart/form-data">
<table class="table table-bordered">
<tr>
<th width="211"><label for="id_pem_iklan">ID Pemasangan Iklan</label>
<th width="31">:
<th colspan="2"><b><?php echo $id_pem_iklan;?></b></tr>
<tr>
<td><label for="id_pelanggan">Pelanggan</label>
<td>:
<td width="353"><select name="id_pelanggan" class="form-control" style="width: 250px;" onChange="showUp(this.value)">
<?php
echo "<option value='$id_pelanggan' ";
echo "> $id_pelanggan</option>";
$s = "select * from `tb_pelanggan`";
$q = getData($conn, $s);
foreach ($q as $d) {
	$id_pelanggan0 = $d["id_pelanggan"];
	$nama_pelanggan = $d["nama_pelanggan"];
	echo "<option value='$id_pelanggan0' ";
	if ($id_pelanggan0 == $id_pelanggan) {
		echo "selected";
	}
	echo "> $nama_pelanggan - $id_pelanggan0  </option>";
}
?>
</select>
<div id="txtHint"></div>
</td>
</tr>
<tr>
<td><label for="judul">Judul</label>
<td>:<td width="464"><input required name="judul" class="form-control" type="text" id="judul" value="<?php echo $judul;?>" size="25" />
</td>
</tr>
<tr>
<td><label for="jenis">Jenis</label>
<td>:<td colspan="2">
<input type="radio" name="jenis" id="jenis"  checked="checked" value="Ruko" <?php if($jenis=="Ruko"){echo"checked";}?>/>Ruko 
<input type="radio" name="jenis" id="jenis" value="Kavling" <?php if($jenis=="Kavling"){echo"checked";}?>/>Kavling
<input type="radio" name="jenis" id="jenis" value="Cluster" <?php if($jenis=="Cluster"){echo"checked";}?>/>Cluster
</td></tr>

<tr>
<td><label for="kategori">Jenis</label>
<td>:<td colspan="2">
<input type="radio" name="kategori" id="kategori"  checked="checked" value="Dijual" <?php if($kategori=="Dijual"){echo"checked";}?>/>Dijual 
<input type="radio" name="kategori" id="kategori" value="Disewakan" <?php if($kategori=="Disewakan"){echo"checked";}?>/>Disewakan
<input type="radio" name="kategori" id="kategori" value="Dijual atau Disewakan" <?php if($kategori=="Dijual atau Disewakan"){echo"checked";}?>/>Dijual atau Disewakan
</td></tr>
<tr>
<td height="24"><label for="deskripsi">Deskripsi</label>
<td>:<td><textarea name="deskripsi" cols="25" required="required" class="form-control" id="deskripsi"><?php echo $deskripsi;?></textarea></td>
</tr>

<tr>
<td height="24"><label for="harga">Harga</label>
<td>:<td><input  required name="harga" type="number" class="form-control" id="harga" value="<?php echo $harga;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="lokasi">Lokasi</label>
<td>:<td><input  required name="lokasi" type="text" class="form-control" id="lokasi" value="<?php echo $lokasi;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="fasilitas">Fasilitas</label>
<td>:<td>
<textarea name="fasilitas" cols="55" class="form-control" rows="2"><?php echo $fasilitas;?></textarea>
</td>
</tr>


<tr>
<td height="24"><label for="tanggal_expire">Tanggal Expire</label>
<td>:<td><input  required name="tanggal_expire" class="form-control" type="text" id="tanggal_expire" value="<?php echo $tanggal_expire;?>" size="25" />
</td>
</tr>


<tr>
  <td height="24"><label for="gambar">Thumbnail</label>
    <td>:<td colspan="2">
        <input class="form-control" name="gambar" type="file" id="gambar" size="20" /> 
      => <a href='#' onclick='buka("pemasangan_iklan/zoom.php?id=<?php echo $id_pem_iklan;?>")'><?php echo $gambar0;?></a></td>
</tr>

<tr>
  <td height="24"><label for="gambar2">Gambar 2</label>
    <td>:<td colspan="2">
        <input class="form-control" name="gambar2" type="file" id="gambar2" size="20" /> 
      => <a href='#' onclick='buka("pemasangan_iklan/zoom.php?id=<?php echo $id_pem_iklan;?>")'><?php echo $gambar20;?></a></td>
</tr>


<tr>
  <td height="24"><label for="gambar3">Gambar 3</label>
    <td>:<td colspan="2">
        <input class="form-control" name="gambar3" type="file" id="gambar3" size="20" /> 
      => <a href='#' onclick='buka("pemasangan_iklan/zoom.php?id=<?php echo $id_pem_iklan;?>")'><?php echo $gambar30;?></a></td>
</tr>


<tr>
  <td height="24"><label for="gambar4">Gambar 4</label>
    <td>:<td colspan="2">
        <input class="form-control" name="gambar4" type="file" id="gambar4" size="20" /> 
      => <a href='#' onclick='buka("pemasangan_iklan/zoom.php?id=<?php echo $id_pem_iklan;?>")'><?php echo $gambar40;?></a></td>
</tr>


<tr>
  <td height="24"><label for="gambar5">Gambar 5</label>
    <td>:<td colspan="2">
        <input class="form-control" name="gambar5" type="file" id="gambar5" size="20" /> 
      => <a href='#' onclick='buka("pemasangan_iklan/zoom.php?id=<?php echo $id_pem_iklan;?>")'><?php echo $gambar50;?></a></td>
</tr>


<tr>
  <td height="24"><label for="gambar6">Gambar 6</label>
    <td>:<td colspan="2">
        <input class="form-control" name="gambar6" type="file" id="gambar6" size="20" /> 
      => <a href='#' onclick='buka("pemasangan_iklan/zoom.php?id=<?php echo $id_pem_iklan;?>")'><?php echo $gambar60;?></a></td>
</tr>


<tr>
  <td height="24"><label for="gambar7">Gambar 7</label>
    <td>:<td colspan="2">
        <input class="form-control" name="gambar7" type="file" id="gambar7" size="20" /> 
      => <a href='#' onclick='buka("pemasangan_iklan/zoom.php?id=<?php echo $id_pem_iklan;?>")'><?php echo $gambar70;?></a></td>
</tr>


<tr>
  <td height="24"><label for="gambar8">Gambar 8</label>
    <td>:<td colspan="2">
        <input class="form-control" name="gambar8" type="file" id="gambar8" size="20" /> 
      => <a href='#' onclick='buka("pemasangan_iklan/zoom.php?id=<?php echo $id_pem_iklan;?>")'><?php echo $gambar80;?></a></td>
</tr>


<tr>
  <td height="24"><label for="gambar9">Gambar 9</label>
    <td>:<td colspan="2">
        <input class="form-control" name="gambar9" type="file" id="gambar9" size="20" /> 
      => <a href='#' onclick='buka("pemasangan_iklan/zoom.php?id=<?php echo $id_pem_iklan;?>")'><?php echo $gambar90;?></a></td>
</tr>


<tr>
  <td height="24"><label for="gambar10">Gambar 10</label>
    <td>:<td colspan="2">
        <input class="form-control" name="gambar10" type="file" id="gambar10" size="20" /> 
      => <a href='#' onclick='buka("pemasangan_iklan/zoom.php?id=<?php echo $id_pem_iklan;?>")'><?php echo $gambar100;?></a></td>
</tr>


<?php
if(isset($_GET["pro"]) && $_GET["pro"]=="ubah"){?>
<tr>
<td><label for="status">Status</label>
<td>:<td colspan="2">
<input type="radio" name="status" id="status"  checked="checked" value="Request" <?php if($status=="Request"){echo"checked";}?>/>Request 
<input type="radio" name="status" id="status" value="Approve" <?php if($status=="Approve"){echo"checked";}?>/>Approve
<input type="radio" name="status" id="status" value="Expire" <?php if($status=="Expire"){echo"checked";}?>/>Expire
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
<td colspan="2"><input name="Simpan" type="submit" id="Simpan" class="btn btn-primary" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
       <input name="gambar0" type="hidden" id="gambar0" value="<?php echo $gambar0;?>" />
	    <input name="gambar20" type="hidden" id="gambar20" value="<?php echo $gambar20;?>" />
		<input name="gambar30" type="hidden" id="gambar30" value="<?php echo $gambar30;?>" />
		<input name="gambar40" type="hidden" id="gambar40" value="<?php echo $gambar40;?>" />
		<input name="gambar50" type="hidden" id="gambar50" value="<?php echo $gambar50;?>" />
		<input name="gambar60" type="hidden" id="gambar60" value="<?php echo $gambar60;?>" />
		<input name="gambar70" type="hidden" id="gambar70" value="<?php echo $gambar70;?>" />
		<input name="gambar80" type="hidden" id="gambar80" value="<?php echo $gambar80;?>" />
		<input name="gambar90" type="hidden" id="gambar90" value="<?php echo $gambar90;?>" />
		<input name="gambar100" type="hidden" id="gambar100" value="<?php echo $gambar100;?>" />
        <input name="id_pem_iklan" type="hidden" id="id_pem_iklan" value="<?php echo $id_pem_iklan;?>" />
        <input name="id_pem_iklan0" type="hidden" id="id_pem_iklan0" value="<?php echo $id_pem_iklan0;?>" />
        <a href="?mnu=pemasangan_iklan"><input name="Batal" type="button" class="btn btn-warning" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
<br />
</div>



<?php  
  $sqlc="select distinct(`status`) from `$tbpemasangan_iklan` order by `status` asc";
  $jumc=getJum($conn,$sqlc);
		if($jumc <1){
		echo"<h1>Maaf data Pemasangan Iklan belum tersedia</h1>";
		}
	$arrc=getData($conn,$sqlc);
		foreach($arrc as $dc) {						
				$status=$dc["status"];
				  $sql="select * from `$tbpemasangan_iklan` where  `status`='$status' order by `id_pem_iklan` desc";
  $jum=getJum($conn,$sql);
				?>
<h3>Data Pemasangan Iklan <?php echo "$status ($jum Iklan)"?>:</h3>
<div>				
 
| <img src='ypathicon/print.png' title='PRINT' OnClick="PRINT('<?php echo $status;?>')"> |
<br>

<table class="table table-bordered">
  <tr bgcolor="#cccccc">
    <th width="3%"><small>No</small></td>
    <th width="20%"><small>Gambar</small></td>
    <th width="20%"><small>Pelanggan</small></td>
    <th width="30%"><small>Judul Iklan</small></td>
   <th width="20%"><small>Lokasi & Fasilitas</small></td>
	<th width="20%"><small>Tanggal Expire</small></td>
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
				$id_pem_iklan=$d["id_pem_iklan"];
				$id_pelanggan = $d["id_pelanggan"];
				$judul=strtoupper($d["judul"]);
				$jenis=$d["jenis"];
				$kategori=$d["kategori"];
				$deskripsi=$d["deskripsi"];
				$harga=$d["harga"];
				$lokasi=$d["lokasi"];
				$fasilitas=$d["fasilitas"];
				$status=$d["status"];
				$tanggal=WKT($d["tanggal"]);
				$jam=$d["jam"];
				$tanggal_expire=WKT($d["tanggal_expire"]);
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$gambar2=$d["gambar2"];
				$gambar20=$d["gambar2"];
				$gambar3=$d["gambar3"];
				$gambar30=$d["gambar3"];
				$gambar4=$d["gambar4"];
				$gambar40=$d["gambar4"];
				$gambar5=$d["gambar5"];
				$gambar50=$d["gambar5"];
				$gambar6=$d["gambar6"];
				$gambar60=$d["gambar6"];
				$gambar7=$d["gambar7"];
				$gambar70=$d["gambar7"];
				$gambar8=$d["gambar8"];
				$gambar80=$d["gambar8"];
				$gambar9=$d["gambar9"];
				$gambar90=$d["gambar9"];
				$gambar10=$d["gambar10"];
				$gambar100=$d["gambar10"];
				$keterangan=$d["keterangan"];
				
					$sql0 = "select * from `$tbpelanggan` where `id_pelanggan`='$id_pelanggan'";
					$d0 = getField($conn, $sql0);
					$nama_pelanggan= $d0["nama_pelanggan"];
					$alamat = $d0["alamat"];
				
			
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td><small>$no</small></td>
				<td><div align='center'>";
echo"<a href='#' onclick='buka(\"pemasangan_iklan/zoom.php?id=$id_pem_iklan\")'>
<img src='$YPATH/$gambar' width='40' height='40' /></a>

<a href='#' onclick='buka(\"pemasangan_iklan/zoom.php?id=$id_pem_iklan\")'>
<img src='$YPATH/$gambar2' width='40' height='40' /></a>

<a href='#' onclick='buka(\"pemasangan_iklan/zoom.php?id=$id_pem_iklan\")'>
<img src='$YPATH/$gambar3' width='40' height='40' /></a>

<a href='#' onclick='buka(\"pemasangan_iklan/zoom.php?id=$id_pem_iklan\")'>
<img src='$YPATH/$gambar4' width='40' height='40' /></a>

<a href='#' onclick='buka(\"pemasangan_iklan/zoom.php?id=$id_pem_iklan\")'>
<img src='$YPATH/$gambar5' width='40' height='40' /></a>

<a href='#' onclick='buka(\"pemasangan_iklan/zoom.php?id=$id_pem_iklan\")'>
<img src='$YPATH/$gambar6' width='40' height='40' /></a>

<a href='#' onclick='buka(\"pemasangan_iklan/zoom.php?id=$id_pem_iklan\")'>
<img src='$YPATH/$gambar7' width='40' height='40' /></a>

<a href='#' onclick='buka(\"pemasangan_iklan/zoom.php?id=$id_pem_iklan\")'>
<img src='$YPATH/$gambar8' width='40' height='40' /></a>

<a href='#' onclick='buka(\"pemasangan_iklan/zoom.php?id=$id_pem_iklan\")'>
<img src='$YPATH/$gambar9' width='40' height='40' /></a>

<a href='#' onclick='buka(\"pemasangan_iklan/zoom.php?id=$id_pem_iklan\")'>
<img src='$YPATH/$gambar10' width='40' height='40' /></a>
</div>";
				echo"</td>
				<td><small><b>$nama_pelanggan</b> <br><i>$alamat</i></small></td>
				<td><small><b> $judul </b> ($id_pem_iklan)
				<br> Jenis : $jenis, Kategori : $kategori
				<br> <i>Rp. ".RP($harga)."</i>
				<br> #$deskripsi <i>Direquest pada $tanggal $jam WIB </i></small></td>
				<td><small>Lokasi di <u><b>$lokasi</b></u>
				<br> Fasilitas : $fasilitas</small></td>
				<td><small>$tanggal_expire</small></td>
				<td><small>$status #$keterangan</small></td>
				<td><div align='center'>
				<a href='?mnu=konfirmasi&id=$id_pem_iklan'><img src='ypathicon/11.png' title='Detail Pembayaran'></a>
<a href='?mnu=pemasangan_iklan&pro=ubah&kode=$id_pem_iklan'><img src='ypathicon/ub.png' title='ubah'></a>
<a href='?mnu=pemasangan_iklan&pro=hapus&kode=$id_pem_iklan&judul=$judul'><img src='ypathicon/ha.png' title='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $judul pada data pemasangan_iklan ?..\")'></a></div></td>
				</tr>";
				
			$no++;
			}//for dalam
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data pemasangan_iklan belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=pemasangan_iklan'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=pemasangan_iklan'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=pemasangan_iklan'>Next »</a></span>";
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
	$id_pem_iklan=strip_tags($_POST["id_pem_iklan"]);
	$id_pem_iklan0=strip_tags($_POST["id_pem_iklan0"]);
	$id_pelanggan=strip_tags($_POST["id_pelanggan"]);
	$deskripsi=strip_tags($_POST["deskripsi"]);
	$judul=strip_tags($_POST["judul"]);
	$jenis=strip_tags($_POST["jenis"]);
	$kategori=strip_tags($_POST["kategori"]);
	$harga=strip_tags($_POST["harga"]);
	$lokasi=strip_tags($_POST["lokasi"]);
	$fasilitas=strip_tags($_POST["fasilitas"]);
	$tanggal=date("Y-m-d");
	$jam=date("H:i:s");
	$tanggal_expire=BAL(strip_tags($_POST["tanggal_expire"]));
	$gambar0=strip_tags($_POST["gambar0"]);
	if ($_FILES["gambar"] != "") {
		move_uploaded_file($_FILES["gambar"]["tmp_name"],"$YPATH/".$_FILES["gambar"]["name"]);
		$gambar=$_FILES["gambar"]["name"];
		} 
	else {$gambar=$gambar0;}
	if(strlen($gambar)<1){$gambar=$gambar0;}
	
	$gambar20=strip_tags($_POST["gambar20"]);
	if ($_FILES["gambar2"] != "") {
		move_uploaded_file($_FILES["gambar2"]["tmp_name"],"$YPATH/".$_FILES["gambar2"]["name"]);
		$gambar2=$_FILES["gambar2"]["name"];
		} 
	else {$gambar2=$gambar20;}
	if(strlen($gambar2)<1){$gambar2=$gambar20;}
	
	$gambar30=strip_tags($_POST["gambar30"]);
	if ($_FILES["gambar3"] != "") {
		move_uploaded_file($_FILES["gambar3"]["tmp_name"],"$YPATH/".$_FILES["gambar3"]["name"]);
		$gambar3=$_FILES["gambar3"]["name"];
		} 
	else {$gambar3=$gambar30;}
	if(strlen($gambar3)<1){$gambar3=$gambar30;}
	
	$gambar40=strip_tags($_POST["gambar40"]);
	if ($_FILES["gambar4"] != "") {
		move_uploaded_file($_FILES["gambar4"]["tmp_name"],"$YPATH/".$_FILES["gambar4"]["name"]);
		$gambar4=$_FILES["gambar4"]["name"];
		} 
	else {$gambar4=$gambar40;}
	if(strlen($gambar4)<1){$gambar4=$gambar40;}
	
	$gambar50=strip_tags($_POST["gambar50"]);
	if ($_FILES["gambar5"] != "") {
		move_uploaded_file($_FILES["gambar5"]["tmp_name"],"$YPATH/".$_FILES["gambar5"]["name"]);
		$gambar5=$_FILES["gambar5"]["name"];
		} 
	else {$gambar5=$gambar50;}
	if(strlen($gambar5)<1){$gambar5=$gambar50;}
	
	$gambar60=strip_tags($_POST["gambar60"]);
	if ($_FILES["gambar6"] != "") {
		move_uploaded_file($_FILES["gambar6"]["tmp_name"],"$YPATH/".$_FILES["gambar6"]["name"]);
		$gambar6=$_FILES["gambar6"]["name"];
		} 
	else {$gambar6=$gambar60;}
	if(strlen($gambar6)<1){$gambar6=$gambar60;}
	
	$gambar70=strip_tags($_POST["gambar70"]);
	if ($_FILES["gambar7"] != "") {
		move_uploaded_file($_FILES["gambar7"]["tmp_name"],"$YPATH/".$_FILES["gambar7"]["name"]);
		$gambar7=$_FILES["gambar7"]["name"];
		} 
	else {$gambar7=$gambar70;}
	if(strlen($gambar7)<1){$gambar7=$gambar70;}
	
	$gambar80=strip_tags($_POST["gambar80"]);
	if ($_FILES["gambar8"] != "") {
		move_uploaded_file($_FILES["gambar8"]["tmp_name"],"$YPATH/".$_FILES["gambar8"]["name"]);
		$gambar8=$_FILES["gambar8"]["name"];
		} 
	else {$gambar8=$gambar80;}
	if(strlen($gambar8)<1){$gambar8=$gambar80;}
	
	$gambar90=strip_tags($_POST["gambar90"]);
	if ($_FILES["gambar9"] != "") {
		move_uploaded_file($_FILES["gambar9"]["tmp_name"],"$YPATH/".$_FILES["gambar9"]["name"]);
		$gambar9=$_FILES["gambar9"]["name"];
		} 
	else {$gambar9=$gambar90;}
	if(strlen($gambar9)<1){$gambar9=$gambar90;}
	
	$gambar100=strip_tags($_POST["gambar100"]);
	if ($_FILES["gambar10"] != "") {
		move_uploaded_file($_FILES["gambar10"]["tmp_name"],"$YPATH/".$_FILES["gambar10"]["name"]);
		$gambar10=$_FILES["gambar10"]["name"];
		} 
	else {$gambar10=$gambar100;}
	if(strlen($gambar10)<1){$gambar10=$gambar100;}
	
if($pro=="simpan"){
 $sql=" INSERT INTO `$tbpemasangan_iklan` (
`id_pem_iklan` ,
`id_pelanggan` ,
`judul` ,
`jenis` ,
`kategori` ,
`deskripsi` ,
`harga` ,
`lokasi` ,
`fasilitas` ,
`status` ,
`tanggal` ,
`jam` ,
`tanggal_expire` ,
`gambar` ,
`gambar2` ,
`gambar3` ,
`gambar4` ,
`gambar5` ,
`gambar6` ,
`gambar7` ,
`gambar8` ,
`gambar9` ,
`gambar10` ,
`keterangan`
) VALUES (
'$id_pem_iklan', 
'$id_pelanggan',
'$judul',
'$jenis',
'$kategori',
'$deskripsi',
'$harga',
'$lokasi',
'$fasilitas',
'Request',
'$tanggal',
'$jam',
'$tanggal_expire',
'$gambar',
'$gambar2',
'$gambar3',
'$gambar4',
'$gambar5',
'$gambar6',
'$gambar7',
'$gambar8',
'$gambar9',
'$gambar10',
'$keterangan'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Data $judul berhasil disimpan !');document.location.href='?mnu=pemasangan_iklan';</script>";}
		else{echo"<script>alert('Data $judul gagal disimpan...');document.location.href='?mnu=pemasangan_iklan';</script>";}
	}
	else{
		$status=strip_tags($_POST["status"]);
		$keterangan=strip_tags($_POST["keterangan"]);
	$sql="update `$tbpemasangan_iklan` set 
	`id_pelanggan`='$id_pelanggan',
	`judul`='$judul',
	`jenis`='$jenis',
	`kategori`='$kategori',
	`deskripsi`='$deskripsi',
	`harga`='$harga' ,
	`lokasi`='$lokasi',
	`fasilitas`='$fasilitas',
	`status`='$status',
	`tanggal_expire`='$tanggal_expire',
	`gambar`='$gambar',
	`gambar2`='$gambar2',
	`gambar3`='$gambar3',
	`gambar4`='$gambar4',
	`gambar5`='$gambar5',
	`gambar6`='$gambar6',
	`gambar7`='$gambar7',
	`gambar8`='$gambar8',
	`gambar9`='$gambar9',
	`gambar10`='$gambar10',
	`keterangan`='$keterangan'
	 where `id_pem_iklan`='$id_pem_iklan0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data $judul berhasil diubah !');document.location.href='?mnu=pemasangan_iklan';</script>";}
		else{echo"<script>alert('Data $judul gagal diubah...');document.location.href='?mnu=pemasangan_iklan';</script>";}
	}//else simpan
}
?>

<?php
if(isset($_GET["pro"]) && $_GET["pro"]=="hapus"){
$id_pem_iklan=$_GET["kode"];
$judul=$_GET["judul"];
$sql="delete from `$tbpemasangan_iklan` where `id_pem_iklan`='$id_pem_iklan'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data $judul berhasil dihapus !');document.location.href='?mnu=pemasangan_iklan';</script>";}
	else{echo"<script>alert('Data $judul gagal dihapus...');document.location.href='?mnu=pemasangan_iklan';</script>";}
}
?>

