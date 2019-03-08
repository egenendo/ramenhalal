<?php
if(isset($_POST['ubah_pembayaran'])){

$kode_transaksi = $_POST['kode_transaksi'];

$sql = "UPDATE tb_transaksi SET 
						status_pembayaran = '1' WHERE 
						kode_transaksi = '$kode_transaksi'";
$result = mysql_query($sql);

if($result){
echo "<script>alert('Selamat, Status Pembayaran Berhasil Diubah'); window.location = 'index?p=data_pesanan'</script>";	
}

}
?>

<?php
if(isset($_POST['ubah_pengiriman'])){

$kode_transaksi = $_POST['kode_transaksi'];

$sql = "UPDATE tb_transaksi SET 
						status_pengiriman = '1' WHERE 
						kode_transaksi = '$kode_transaksi'";
$result = mysql_query($sql);

if($result){
echo "<script>alert('Selamat, Status Pengiriman Berhasil Diubah'); window.location = 'index?p=data_pesanan'</script>";	
}

}
?>