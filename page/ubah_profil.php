<?php
$id = $_GET['id'];

$email_user = $_POST['email_user'];
$password_user = $_POST['password_user'];
$alamat_user = $_POST['alamat_user'];
$telepon_user = $_POST['telepon_user'];

$sql = "UPDATE tb_user SET 
						email_user = '$email_user',
						password_user = '$password_user',
						alamat_user = '$alamat_user', 
						telepon_user = '$telepon_user' WHERE 
						id_user = '$id'";
$result = mysql_query($sql);

if($result){
echo "<script>alert('Selamat, Profil Anda Telah Berhasil Diubah'); window.location = './'</script>";	
}
?>