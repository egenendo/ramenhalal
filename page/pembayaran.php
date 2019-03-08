<?php
$id_user = $_SESSION['id_user'];

$cek_pembayaran = mysql_query("select * from tb_transaksi where id_user='$id_user' and status_pembayaran='0'");
$cek_pembayarann = mysql_num_rows($cek_pembayaran);

if($cek_pembayarann > 0){
	
$queryy = "select * from tb_transaksi where id_user='$id_user' and status_pembayaran='0' order by id_transaksi desc";
$sqll = mysql_query($queryy) or die(mysql_error());
$data = mysql_fetch_array($sqll);
$kode_transaksi = $data['kode_transaksi'];
?>

        <div class="container">
            <header class="page-header">
                <center><font style='font-size: 25px; font-weight: bolder;'>Tagihan Pembayaran</font></center>
				<center><font style='font-size: 15px; font-weight: bolder;'>Kode = <?php echo $kode_transaksi; ?></font></center>
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
                            </tr>
                        </thead>
                        <tbody>
<?php		
$queryys = "select * from tb_transaksi where id_user='$id_user' and status_pembayaran='0' order by id_transaksi desc";
$sqlls = mysql_query($queryys) or die(mysql_error());
while($datas = mysql_fetch_array($sqlls)){ 
$id_transaksi = $datas['id_transaksi'];
$kode_transaksi = $datas['kode_transaksi'];
$id_hidangan = $datas['id_hidangan'];
$nama_hidangan = $datas['nama_hidangan'];
$harga_hidangan = $datas['harga_hidangan'];
$gambar_hidangan = $datas['gambar_hidangan'];
$deskripsi_hidangan = $datas['deskripsi_hidangan'];
$jumlah_beli_hidangan = $datas['jumlah_beli_hidangan'];
$total_harga_hidangan = $datas['total_harga_hidangan'];
$total_harga_transaksi = $datas['total_harga_transaksi'];
?>

		<div class="mfp-with-anim mfp-hide mfp-dialog clearfix" id="nav-detail-hidangan<?php echo $id_hidangan; ?>">
            <center><img src="./images/<?php echo $gambar_hidangan; ?>" style='width: 100%; height: 300px;'/></center>
			<center><font style='font-size: 18px;'><?php echo $nama_hidangan; ?></font></center><br>
			<center><font style='font-size: 18px;'>Rp, <?php echo number_format($harga_hidangan,0,',','.');?>,-</font></center><br>
			<center><font style='font-size: 18px;'><?php echo $deskripsi_hidangan; ?></font></center>
        </div>

                            <tr>
								<td class="table-shopping-cart-title"><a href="#nav-detail-hidangan<?php echo $id_hidangan; ?>" data-effect="mfp-move-from-top" class="popup-text"><?php echo $nama_hidangan; ?></a>
                                </td>
                                <td class="table-shopping-cart-img">
                                        <img src="./images/<?php echo $gambar_hidangan; ?>" />
                                </td>
                                <td>Rp, <?php echo number_format($harga_hidangan,0,',','.');?>,-</td>
                                <td><?php echo $jumlah_beli_hidangan; ?></td>
                                <td>
                                    Rp, <?php echo number_format($total_harga_hidangan,0,',','.');?>,-
                                </td>
                            </tr>
<?php
}
?>
                        </tbody>
                    </table>
                    <div class="gap gap-small"></div>
                </div>
                <div class="col-md-12">
                    <ul class="shopping-cart-total-list">
                        <center><li><span style='font-size: 18px; font-weight: bolder;'>Total Semua Harga =</span><span style='font-size: 18px; font-weight: bolder;'> Rp, <?php echo number_format($total_harga_transaksi,0,',','.');?>,-</span>
                        </li></center>
                    </ul>
                </div>
				<div class="gap"></div>
				<div class="gap"></div>
				<div class="col-md-12">
                    <font style='font-size: 15px; font-weight: bolder;'>Cara Melakukan Pembayaran =</font>
                </div>
            </div>
        </div>
		<div class="gap"></div>
		<?php
		}
		
		if($cek_pembayarann == 0){
		?>
		<div class="container">
            <div class="text-center"><i class="fa fa-file-o empty-cart-icon"></i>
                <p class="lead">Tidak Ada Tagihan Pembayaran</p>
            </div>
            <div class="gap"></div>
        </div>
		<?php
		}
		?>