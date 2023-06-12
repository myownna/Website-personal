
	<style>
body2 {
  margin: 0 auto;
  max-width: 400px;
  padding: 0 20px;
}

.container2 {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container2::after {
  content: "";
  clear: both;
  display: table;
}

.container2 img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container2 img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
</style>

<?php
	$sql="select * from `$tbinbox` where `id_pelanggan`='".$_SESSION['cid']."'";
	$d=getField($conn,$sql);
				$id_inbox=$d["id_inbox"];
				$id_inbox0=$d["id_inbox"];
				$id_pelanggan=$d["id_pelanggan"];
				$pelanggan=getPelanggan($conn,$d["id_pelanggan"]);
				$pesan=$d["pesan"];
				$tanggal=$d["tanggal"];
				$jam=$d["jam"];
				$kategori=$d["kategori"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
			
?>
    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <div class="contact-info-left">
                        <h2>CONTACT INFO</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>Address: Michael I. Days 3756 <br>Preston Street Wichita,<br> KS 67213 </p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+1-888705770">+1-888 705 770</a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">contactinfo@gmail.com</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>Kirim Pesan</h2>
                        <p>Silahkan chat kami disini jika ada yang ingin ditanyakan.</p>
                        <form  action="" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" readonly placeholder="<?php echo $_SESSION['cnama'];?> - <?php echo $_SESSION['cid'];?>" >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                              
                             
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" id="pesan" name="pesan" placeholder="Tulis Pesan Disini" rows="4"  required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="submit-button text-center">
                                        <button class="btn hvr-hover" id="submit" name="Simpan" type="submit">Kirim</button>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<body>	
<center><h2>Chat Messages</h2></center>

 <div class="col-md-6" style="float:none;margin:auto;">
	

<?php  
		$sql="select * from `$tbinbox` where  `id_pelanggan`='".$_SESSION['cid']."'  order by `tanggal` asc";	
	$arr=getData($conn,$sql);
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
				?>
				
<?php if ($kategori=="Pelanggan"){?>
<div class="container2">
  <img src="ypathfile/avatar.jpg" alt="Avatar" style="width:100%;">
  <p align="right"><?php echo $pesan;?></p>
  <span class="time-right"><?php echo "$nama_pelanggan - $id_pelanggan";?>, <?php echo "$tanggal $jam";?></span>
</div>
<?php } 
else {?>
<div class="container2 darker">
  <img src="ypathfile/avatar2.jpg" alt="Avatar" class="right" style="width:100%;">
  <p ><?php echo $pesan;?></p>
  <span class="time-left">Customer Service, <?php echo "$tanggal $jam";?></span>
</div>
<?php }?>
		<?php } ?>
	</div>
</body>	
<?php
if(isset($_POST["Simpan"])){
	$id_pelanggan=$_SESSION["cid"];
	$pesan=strip_tags($_POST["pesan"]);
	$tanggal=date("Y-m-d");
	$jam=date("H:i:s");
	$kategori=strip_tags($_POST["kategori"]);
	
	

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
'Pelanggan',
'Unread',
'-'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Pesan berhasil dikirim');document.location.href='?mnu=_inbox';</script>";}
		else{echo"<script>alert('Pesan gagal dikirim');document.location.href='?mnu=_inbox';</script>";}
	
}
?>


 