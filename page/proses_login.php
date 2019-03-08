<?php
session_start();

include ("../ctrl/koneksi.php");
include ("../ctrl/function.php");
date_default_timezone_set('Asia/Jakarta');

$email_user = $_POST['email_user'];
$password_user = $_POST['password_user'];

$query = mysql_query("select * from tb_user where email_user='$email_user' and password_user='$password_user'");
$row = mysql_fetch_array($query);

if (mysql_num_rows($query) > 0) {
	session_start();
    $_SESSION['id_user'] = $row['id_user'];
	header('location:../');
} else {
	echo "<script>alert('Username / Password Yang Anda Masukkan Salah'); window.location = '../'</script>";
}
?>