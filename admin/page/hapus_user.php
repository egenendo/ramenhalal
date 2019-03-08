<?php
$id = $_GET['id'];

$query = mysql_query("DELETE FROM tb_user WHERE id_user='$id'");

if ($query){
	echo "<script>window.location = 'index?p=data_user'</script>";	
} else {
	echo "<script>window.location = 'index?p=data_user'</script>";	
}
?>