<?php
$id_user = $_SESSION['id_user'];
$cek_keranjang = mysql_query("select * from tb_tmp_transaksi where id_user='$id_user'");
$cek_keranjangg = mysql_num_rows($cek_keranjang);

if($cek_keranjangg == 0){
?>

        <div class="container">
            <div class="text-center"><i class="fa fa-cart-arrow-down empty-cart-icon"></i>
                <p class="lead">Keranjang Belanjamu Masih Kosong</p>
            </div>
            <div class="gap"></div>
        </div>
		
<?php
}

if($cek_keranjangg > 0){
?>

        <div class="container">
            <header class="page-header">
                <center><font style='font-size: 25px; font-weight: bolder;'>Keranjang Belanja</font></center>
            </header>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table table-shopping-cart">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Gambar</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
<?php	
$total_semua_harga = 0;	
$queryys = "select * from tb_tmp_transaksi where id_user='$id_user' order by id_tmp_transaksi desc";
$sqlls = mysql_query($queryys) or die(mysql_error());
while($datas = mysql_fetch_array($sqlls)){ 
$id_tmp_transaksi = $datas['id_tmp_transaksi'];
$id_hidangan = $datas['id_hidangan'];
$jumlah_beli_hidangan = $datas['jumlah_beli_hidangan'];
$total_harga_hidangan = $datas['total_harga_hidangan'];
$total_semua_harga += $total_harga_hidangan;
			
$queryy = "select * from tb_hidangan where id_hidangan='$id_hidangan'";
$sqll = mysql_query($queryy) or die(mysql_error());
while($data = mysql_fetch_array($sqll)){ 
$nama_hidangans = $data['nama_hidangan'];
$harga_hidangans = $data['harga_hidangan'];
$gambar_hidangans = $data['gambar_hidangan'];
$deskripsi_hidangans = $data['deskripsi_hidangan'];
?>

		<div class="mfp-with-anim mfp-hide mfp-dialog clearfix" id="nav-detail-hidangan<?php echo $id_hidangan; ?>">
            <center><img src="./images/<?php echo $gambar_hidangans; ?>" style='width: 100%; height: 300px;'/></center>
			<center><font style='font-size: 18px;'><?php echo $nama_hidangans; ?></font></center><br>
			<center><font style='font-size: 18px;'>Rp, <?php echo number_format($harga_hidangans,0,',','.');?>,-</font></center><br>
			<center><font style='font-size: 18px;'><?php echo $deskripsi_hidangans; ?></font></center>
        </div>

        <div class="mfp-with-anim mfp-hide mfp-dialog clearfix" id="nav-ubah-keranjang<?php echo $id_tmp_transaksi;?>">
            <center><h3 class="widget-title">Ubah Keranjang</h3></center>
            <hr />
            <form action="index?p=ubah_keranjang&id=<?php echo $id_tmp_transaksi;?>" method="post" role="form">
                <div class="form-group">
                    <center>
                    <img src="./images/<?php echo $gambar_hidangans; ?>" width="200px" height="200px" /><br>
					<?php echo $nama_hidangans; ?>
					</center>
				</div>
				<hr>
                <div class="form-group">
                    <center>
					<label>Jumlah</label>
                    <input class="form-control" type="number" name="jumlah_beli_hidangan" id="jumlah_beli_hidangan" value="<?php echo $jumlah_beli_hidangan; ?>" style='width: 25%;' required autocomplete='off' />
					</center>
				</div>
                <center><input class="btn btn-success" type="submit" value="Ubah" /></center>
            </form>
        </div>

                            <tr>
								<td class="table-shopping-cart-title"><a href="#nav-detail-hidangan<?php echo $id_hidangan; ?>" data-effect="mfp-move-from-top" class="popup-text"><?php echo $nama_hidangans; ?></a>
                                </td>
                                <td class="table-shopping-cart-img">
                                        <img src="./images/<?php echo $gambar_hidangans; ?>" />
                                </td>
                                <td>Rp, <?php echo number_format($harga_hidangans,0,',','.');?>,-</td>
                                <td><?php echo $jumlah_beli_hidangan; ?></td>
                                <td>
                                    Rp, <?php echo number_format($total_harga_hidangan,0,',','.');?>,-
                                </td>
                                <td>
                                    <a href="#nav-ubah-keranjang<?php echo $id_tmp_transaksi;?>" data-effect="mfp-move-from-top" class="btn btn-success popup-text">Ubah</a>
									<a class="btn btn-danger" href="index?p=hapus_keranjang&id=<?php echo $id_tmp_transaksi;?>">Hapus</a>
                                </td>
                            </tr>
<?php
}}
?>
                        </tbody>
                    </table>
                    <div class="gap gap-small"></div>
                </div>
                <div class="col-md-12">
                    <ul class="shopping-cart-total-list">
                        <center><li><span style='font-size: 18px; font-weight: bolder;'>Total Semua Harga =</span><span style='font-size: 18px; font-weight: bolder;'> Rp, <?php echo number_format($total_semua_harga,0,',','.');?>,-</span>
                        </li></center>
                    </ul>
					<form action="index?p=proses_bayar&id=<?php echo $id_user; ?>" method="post" role="form">
					<input class="form-control" type="number" name="total_semua_harga" id="total_semua_harga" value="<?php echo $total_semua_harga; ?>" style='display: none;' />                
					<center><a href='./' class="btn btn-primary">Lanjutkan Ke Pembelian</a>&nbsp;&nbsp;
					<input class="btn btn-warning" type="submit" value="Lanjutkan Ke Pembayaran" /></center>
					</form>
                </div>
            </div>
        </div>
        <div class="gap"></div>

<?php
}
?>