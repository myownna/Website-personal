
								<?php
$item="";				
 if(isset($_POST["Cari"])){
	  $item=$_POST["item"];
 }
?> 	
	<div class="shop-box-inner">
        <div class="container">
            <div class="row">
                 <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="" method="post" enctype="multipart/form-data">
                                <input class="form-control" name="item" id="item" placeholder="Search here..." type="text">
                                <button type="submit" name="Cari" id="Cari"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                        
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Jenis</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                     
                                <a href="?mnu=daftar_iklan&jen=Ruko" class="list-group-item list-group-item-action">Ruko</a>
                                <a href="?mnu=daftar_iklan&jen=Kavling" class="list-group-item list-group-item-action">Kavling </a>
								<a href="?mnu=daftar_iklan&jen=Cluster" class="list-group-item list-group-item-action">Cluster </a>
								
                            </div>
                        </div>
                     
                        <div class="filter-brand-left">
                            <div class="title-left">
                                <h3>Kategori</h3>
                            </div>
                            <div class="brand-box">
                                <ul>
                                  <li> <a href="?mnu=daftar_iklan2&kat=Dijual" class="list-group-item list-group-item-action">Dijual</a> </li>
                                 <li><a href="?mnu=daftar_iklan2&kat=Disewakan" class="list-group-item list-group-item-action">Disewakan</a> </li>
                                <li><a href="?mnu=daftar_iklan2&kat=Dijual atau Disewakan" class="list-group-item list-group-item-action">Dijual atau Disewakan</a> </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                               <a href="?mnu=daftar_iklanall"><b><u> View all advertisement </u></b></a>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
										<?php  

					$kat=$_GET["kat"];
  $sql="select * from `$tbpemasangan_iklan` where   `status` = 'Mulai' and `kategori` = '$kat'  order by `id_pem_iklan` desc";	

 if(isset($_POST["Cari"])){
	  $item=$_POST["item"];
	  $sql="select * from `$tbpemasangan_iklan` where  `judul` like '%$item%'  order by rand()";	

  				 }		  
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
				
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                           <div class="products-single fix">
                        <div class="box-img-hover">
						<div class="type-lb">
                                                       <p class="sale"><?php echo $tanggal;?></p>
                                                    </div>
                           
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
                                      
                                      
					<?php   }	?>
                                     
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="list-view">
								<?php  

			
  $sql="select * from `$tbpemasangan_iklan` where   `status` = 'Mulai'  order by `id_pem_iklan` desc";

 if(isset($_POST["Cari"])){
	  $item=$_POST["item"];
	  $sql="select * from `$tbpemasangan_iklan` where  `judul` like '%$item%' and  `status` = 'Mulai' order by rand()";	

  				 }		  
	$arr=getData($conn,$sql);
		foreach($arr as $d) {						
				$id_pem_iklan=$d["id_pem_iklan"];
				$id_pelanggan = $d["id_pelanggan"];
				$judul=strtoupper($d["judul"]);
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
                                    <div class="list-view-box">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <div class="type-lb">
                                                            <p class="new"><?php echo $tanggal;?></p>
                                                        </div>
                                                        <img src="ypathfile/<?php  echo $gambar;?>" class="img-fluid" alt="Image">
                                                 
                          
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <div class="why-text full-width">
                                                    <h4><?php  echo $judul;?></h4>
                                                    <h5> Rp. <?php  echo RP($harga);?></h5>
													<h6> Rp. <?php  echo $lokasi;?></h6>
                                                    <a class="btn hvr-hover" href="?mnu=detail_iklan&kode=<?php  echo $id_pem_iklan;?>">Detail Iklan</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
		<?php } ?>
                                   
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>