<?php
$id = $_GET['id'];
$huruf_transaksi = 'RH';
$waktu_transaksi = date('dmyHis');
$kode_transaksi = $huruf_transaksi.$waktu_transaksi;
$total_semua_harga = $_POST['total_semua_harga'];

$queryy = "select * from tb_tmp_transaksi where id_user='$id'";
$sqll = mysql_query($queryy) or die(mysql_error());
while($data = mysql_fetch_array($sqll)){
$id_hidangan = $data['id_hidangan'];
$jumlah_beli_hidangan = $data['jumlah_beli_hidangan'];
$total_harga_hidangan = $data['total_harga_hidangan'];

$queryys = "select * from tb_hidangan where id_hidangan='$id_hidangan'";
$sqlls = mysql_query($queryys) or die(mysql_error());
while($datas = mysql_fetch_array($sqlls)){
$nama_hidangan = $datas['nama_hidangan'];
$harga_hidangan = $datas['harga_hidangan'];
$gambar_hidangan = $datas['gambar_hidangan'];
$deskripsi_hidangan = $datas['deskripsi_hidangan'];

$sql = "INSERT INTO tb_transaksi VALUES('','$kode_transaksi','$id_hidangan','$nama_hidangan','$harga_hidangan','$gambar_hidangan','$deskripsi_hidangan','$jumlah_beli_hidangan','$total_harga_hidangan','$total_semua_harga','$id',now(),now(),'0','0')";
$w = mysql_query($sql);	
}
}

if($w){
$ww = mysql_query("DELETE FROM tb_tmp_transaksi WHERE id_user='$id'");	
}

if($ww){
echo "<script>window.location = 'index?p=pembayaran'</script>";
} 
?>