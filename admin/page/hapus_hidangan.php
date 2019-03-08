<?php
$id = $_GET['id'];
$idi = $_GET['idi'];

$query = mysql_query("DELETE FROM tb_hidangan WHERE id_hidangan='$id'");

unlink('../images/'.$idi.'');

if ($query){
	echo "<script>window.location = 'index?p=data_hidangan'</script>";	
} else {
	echo "<script>window.location = 'index?p=data_hidangan'</script>";	
}
?>