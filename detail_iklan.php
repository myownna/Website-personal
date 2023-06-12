<style>
.text-block {
  position: absolute;
  bottom: 20px;
  right: 20px;
  color: white;
  padding-left: 20px;
  padding-right: 20px;
}
</style>

<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
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
				$tanggal_mulai=WKT($d["tanggal_mulai"]);
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$keterangan=$d["keterangan"];
				
			
?>

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
					
                            <div class="carousel-item active"> <a href="#" onclick="buka('pemasangan_iklan/zoom.php?id=<?php echo $id_pem_iklan;?>')"><img class="d-block w-100" src="ypathfile/<?php echo $gambar;?>" height="300" width="400" ></a> 
							
							</div>
								<?php  
$sqlc = "select * from `$tbgambar` where  `id_pem_iklan`='$id_pem_iklan' order by `id_gambar` desc";			
	$arrc=getData($conn,$sqlc);
		foreach($arrc as $dc) {						
				$id_gambar=$dc["id_gambar"];
				$id_pem_iklan=$dc["id_pem_iklan"];
				$gambarx=$dc["gambar"];
				$catatan=$dc["catatan"];
				?>
				<div class="carousel-item"> <a href="#" onclick="buka('gambar/zoom.php?id=<?php echo $id_gambar;?>')"><img class="d-block w-100" src="ypathfile/<?php echo $gambarx;?>" height="300" width="400" alt="<?php echo $catatan;?>" ></a> 
				 <div class="text-block">

    <p><font color="white"><?php echo $catatan;?></font></p>
  </div></div>
		<?php } ?>
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev"> 
						<i class="fa fa-angle-left" aria-hidden="true"></i>
						<span class="sr-only">Previous</span> 
					</a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next"> 
						<i class="fa fa-angle-right" aria-hidden="true"></i> 
						<span class="sr-only">Next</span> 
					</a>
                      
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2><?php echo $judul;?> </h2>
                        <h5> Rp. <?php echo RP($harga);?> </h5>
                        <p class="available-stock"><span> Lokasi : <u><?php echo $lokasi;?></u></span>
                            <p>
                                <h4>Short Description:</h4>
								<i><u>Kategori : <?php echo $kategori;?></u></i><br>
								<i><u>Jenis : <?php echo $jenis;?></u></i>
                                <p><?php echo $deskripsi;?></p>
								<p><?php echo $fasilitas;?></p>
                             
                    </div>
                </div>
            </div>


            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Iklan Lainnya</h1>
                    </div>
                    <div class="featured-products-box owl-carousel owl-theme">
					<?php  

  $sql="select * from `$tbpemasangan_iklan` where   `status` = 'Mulai' order by rand()";		  
	$arr=getData($conn,$sql);
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
				$tanggal_mulai=WKT($d["tanggal_mulai"]);
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$keterangan=$d["keterangan"];
				
				?>
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                     <img src="ypathfile/<?php  echo $gambar;?>" height="300" width="300" alt="Image">
                                    <div class="mask-icon">
                                        <a class="cart" href="?mnu=detail_iklan&kode=<?php  echo $id_pem_iklan;?>">Detail Iklan</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                   <center><h2><b><?php  echo $judul;?></b> </h2></center>
                           <center> <font size="3" color="red"> Rp. <?php  echo RP($harga);?></font></center>
							<center><h6><i><?php  echo $lokasi;?></i></h6></center>
                                </div>
                            </div>
                        </div>
		<?php } ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->



  