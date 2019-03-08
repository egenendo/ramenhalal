<?php
$id = $_GET['id'];
$id_user = $_SESSION['id_user'];

$queryy = "select * from tb_hidangan where id_hidangan='$id'";
$sqll = mysql_query($queryy) or die(mysql_error());
$data = mysql_fetch_array($sqll);
$nama_hidangans = $data['nama_hidangan'];
$harga_hidangans = $data['harga_hidangan'];
$gambar_hidangans = $data['gambar_hidangan'];

$cek_tmp_transaksi = mysql_query("select * from tb_tmp_transaksi where id_hidangan='$id' and id_user='$id_user'");
$cek_tmp_transaksii = mysql_num_rows($cek_tmp_transaksi);
$datas = mysql_fetch_array($cek_tmp_transaksi);
$jumlah_beli_hidangan = $datas['jumlah_beli_hidangan'];
$total_harga_hidangan = $datas['total_harga_hidangan'];

$jumlah_beli_hidangann = $jumlah_beli_hidangan+1;
$total_harga_hidangann = $total_harga_hidangan+$harga_hidangans;

if($cek_tmp_transaksii == 0){
$sql = "INSERT INTO tb_tmp_transaksi VALUES('','$id','1','$harga_hidangans','$id_user')";
$w = mysql_query($sql);
}

if($cek_tmp_transaksii > 0){
$sql = "UPDATE tb_tmp_transaksi SET 
						jumlah_beli_hidangan = '$jumlah_beli_hidangann',
						total_harga_hidangan = '$total_harga_hidangann' WHERE 
						id_hidangan = '$id' AND 
						id_user = '$id_user'";
$w = mysql_query($sql);	
}

if($w){
echo "<script>window.location = 'index?p=keranjang'</script>";	
}
?>