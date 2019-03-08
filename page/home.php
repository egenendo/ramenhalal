<?php
if (empty($_SESSION['id_user'])){
$id_user = '';
} else {	
$id_user = $_SESSION['id_user'];
}

$cek_pembayaran = mysql_query("select * from tb_transaksi where id_user='$id_user' and status_pembayaran='0'");
$cek_pembayarann = mysql_num_rows($cek_pembayaran);

if($cek_pembayarann > 0){
	echo "<script>window.location = 'index?p=pembayaran'</script>";
}
?>

<?php
if($cek_pembayarann == 0){
?>
        <div class="container" style="width: 100%;">
           <img src="./images/banner.jpg" alt="Image Alternative text" title="Image Title" style="width: 100%;" />
        </div>
		<hr>
        <div class="gap"></div>
        <div class="container">
            <div class="row" data-gutter="15">
<?php				
$queryy = "select * from tb_hidangan order by id_hidangan desc";
$sqll = mysql_query($queryy) or die(mysql_error());
while($data = mysql_fetch_array($sqll)){ 
$id_hidangan = $data['id_hidangan'];
$nama_hidangan = $data['nama_hidangan'];
$harga_hidangan = $data['harga_hidangan'];
$gambar_hidangan = $data['gambar_hidangan'];
$deskripsi_hidangan = $data['deskripsi_hidangan'];
?>

		<div class="mfp-with-anim mfp-hide mfp-dialog clearfix" id="nav-access">
            <center><font style='font-size: 18px;'>Silahkan Untuk <a href="#nav-login-dialog" data-effect="mfp-move-from-top" class="popup-text">Login</a> Atau <a href="#nav-account-dialog" data-effect="mfp-move-from-top" class="popup-text">Daftar</a> Terlebih Dahulu Sebelum Melakukan Proses Ini</font></center>
        </div>
		
		<div class="mfp-with-anim mfp-hide mfp-dialog clearfix" id="nav-detail-hidangan<?php echo $id_hidangan; ?>">
            <center><img src="./images/<?php echo $gambar_hidangan; ?>" style='width: 100%; height: 300px;'/></center>
			<center><font style='font-size: 18px;'><?php echo $nama_hidangan; ?></font></center><br>
			<center><font style='font-size: 18px;'>Rp, <?php echo number_format($harga_hidangan,0,',','.');?>,-</font></center><br>
			<center><font style='font-size: 18px;'><?php echo $deskripsi_hidangan; ?></font></center>
        </div>

                <div class="col-md-3">
                    <div class="product ">
                        <div class="product-img-wrap">
                            <img src="./images/<?php echo $gambar_hidangan; ?>" style='width: 100%; height: 200px;'/>
                        </div>
                        <div class="product-caption">
                            <a href="#nav-detail-hidangan<?php echo $id_hidangan; ?>" data-effect="mfp-move-from-top" class="popup-text"><h5 class="product-caption-title"><?php echo $nama_hidangan; ?></h5></a>
                            <div class="product-caption-price"><span class="product-caption-price-new">Rp, <?php echo number_format($harga_hidangan,0,',','.');?>,-</span></div>
							<br>
							<?php
							if (empty($_SESSION['id_user'])) 
							{
							?>
							<a href="#nav-access" data-effect="mfp-move-from-top" class="btn btn-primary btn-lg popup-text" style="width: 100%;"><i class="fa fa-shopping-cart"></i> Beli</a>                       
							<?php
							} else {
							?>
							<a class="btn btn-primary btn-lg" href="index?p=proses_beli_hidangan&id=<?php echo $id_hidangan; ?>" style="width: 100%;"><i class="fa fa-shopping-cart"></i> Beli</a>
							<?php
							}
							?>
						</div>
                    </div>
                </div>
<?php
}
?>
            </div>
        </div>
        <div class="gap"></div>
<?php
}
?>