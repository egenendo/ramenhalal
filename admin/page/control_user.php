<?php
if(isset($_POST['tambah_user'])){

$nama_user = $_POST['nama_user'];
$email_user = $_POST['email_user'];
$password_user = $_POST['password_user'];
$id_jenis_kelamin = $_POST['id_jenis_kelamin'];
$alamat_user = $_POST['alamat_user'];
$telepon_user = $_POST['telepon_user'];

$cek_email = mysql_query("select * from tb_user where email_user='$email_user'");
$cek_emaill = mysql_num_rows($cek_email);

$cek_telepon = mysql_query("select * from tb_user where telepon_user='$telepon_user'");
$cek_teleponn = mysql_num_rows($cek_telepon);

if($cek_emaill > 0){
echo "<script>alert('Email Telah Terdaftar, Mohon Coba Dengan Email Yang Lain'); window.location = 'index?p=data_user'</script>";
} 

if($cek_teleponn > 0){
echo "<script>alert('Nomor Handphone Telah Terdaftar, Mohon Coba Dengan Nomor Handphone Yang Lain'); window.location = 'index?p=data_user'</script>";
} 

if($cek_emaill == 0){
if($cek_teleponn == 0){
$sql = "INSERT INTO tb_user VALUES('','$nama_user','$email_user','$password_user','$id_jenis_kelamin','$alamat_user','$telepon_user')";
$w = mysql_query($sql);
}	
}

if($w){
echo "<script>alert('Selamat, Data User Berhasil Ditambahkan'); window.location = 'index?p=data_user'</script>";
} 

}
?>

<?php
if(isset($_POST['ubah_user'])){

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
echo "<script>alert('Selamat, Data User Berhasil Diubah'); window.location = 'index?p=data_user'</script>";	
}

}
?>