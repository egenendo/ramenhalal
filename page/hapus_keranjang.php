<?php
$id = $_GET['id'];

$query = mysql_query("DELETE FROM tb_tmp_transaksi WHERE id_tmp_transaksi='$id'");

if ($query){
	echo "<script>window.location = 'index?p=keranjang'</script>";	
} else {
	echo "<script>window.location = 'index?p=keranjang'</script>";	
}
?>