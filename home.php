 <center> <h1><u>Iklan Terbaru </u></h1></center>
 <div class="row">
 <?php  

$sql="select * from `$tbpemasangan_iklan` where   `status` = 'Mulai' order by `id_pem_iklan` desc limit 0,6";	
	  
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
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          
                    <div class="shop-cat-box">
                        <img src="ypathfile/<?php echo $gambar;?>" height="300" width="300" alt="" />
                        <a class="btn hvr-hover" href="?mnu=detail_iklan&kode=<?php  echo $id_pem_iklan;?>"><?php echo $judul;?></a>
                    </div>
                    
                </div>
                <?php } ?>
            </div>