<?php
$id = $_GET['id'];

$query = mysql_query("SELECT * FROM tb_admin WHERE 
											 username_admin='$id'");
$data  = mysql_fetch_array($query);
$username_admin = $data['username_admin'];

$cek_session = $_SESSION['username_admin'];

if($username_admin == $cek_session){

$query = mysql_query("DELETE FROM tb_admin WHERE username_admin='$id'");

if ($query){
	session_destroy();
	echo "<script>window.location = './'</script>";	
}
} else {
include "404.php";
}
?>