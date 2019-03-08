<?php
$id = $_GET['id'];

$query = mysql_query("DELETE FROM tb_transaksi WHERE kode_transaksi='$id'");

if ($query){
	echo "<script>window.location = 'index?p=data_pesanan'</script>";	
} else {
	echo "<script>window.location = 'index?p=data_pesanan'</script>";	
}
?>