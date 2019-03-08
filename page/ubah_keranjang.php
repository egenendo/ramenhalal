<?php
$id = $_GET['id'];

$jumlah_beli_hidangan = $_POST['jumlah_beli_hidangan'];

$queryy = "select * from tb_tmp_transaksi where id_tmp_transaksi='$id'";
$sqll = mysql_query($queryy) or die(mysql_error());
$data = mysql_fetch_array($sqll);
$id_hidangan = $data['id_hidangan'];

$queryys = "select * from tb_hidangan where id_hidangan='$id_hidangan'";
$sqlls = mysql_query($queryys) or die(mysql_error());
$datas = mysql_fetch_array($sqlls);
$harga_hidangans = $datas['harga_hidangan'];

$total_harga_hidangans = $jumlah_beli_hidangan*$harga_hidangans;

$sql = "UPDATE tb_tmp_transaksi SET 
						jumlah_beli_hidangan = '$jumlah_beli_hidangan',
						total_harga_hidangan = '$total_harga_hidangans' WHERE 
						id_tmp_transaksi = '$id'";
$result = mysql_query($sql);

if($result){
echo "<script>alert('Selamat, Keranjang Anda Telah Berhasil Diubah'); window.location = 'index?p=keranjang'</script>";	
}
?>