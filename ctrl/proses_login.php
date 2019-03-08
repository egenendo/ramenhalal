<?php
session_start();

include ("koneksi.php");
include ("function.php");
date_default_timezone_set('Asia/Jakarta');

$username_admin = $_POST['username_admin'];
$password_admin = $_POST['password_admin'];

$query = mysql_query("select * from tb_admin where username_admin='$username_admin' and password_admin='$password_admin'");
$row = mysql_fetch_array($query);

if (mysql_num_rows($query) > 0) {
	session_start();
    $_SESSION['username_admin'] = $row['username_admin'];
	header('location:../admin');
} else {
	echo "<script>alert('Username / Password Yang Anda Masukkan Salah'); window.location = '../'</script>";
}
?>