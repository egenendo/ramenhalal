<?php
if(isset($_POST['tambah_user'])){

$nama_user = $_POST['nama_user'];
$email_user = $_POST['email_user'];
$password_user = $_POST['password_user'];
$id_jenis_kelamin = $_POST['id_jenis_kelamin'];
$alamat_user = $_POST['alamat_user'];
$telepon_user = $_POST['telepon_user'];

$sql = "INSERT INTO tb_user VALUES('','$nama_user','$email_user','$password_user','$id_jenis_kelamin','$alamat_user','$telepon_user')";
$w = mysql_query($sql);

if($result){
echo "<script>alert('Selamat, Anda Telah Berhasil Melakukan Pendaftaran. Silahkan Gunakan Email & Password Anda Untuk Login Ke Dalam Website'); window.location = ''</script>";	
}

}
?>