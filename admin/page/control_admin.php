<?php
if(isset($_POST['tambah_admin'])){

$nama_admin = $_POST['nama_admin'];
$username_admin = $_POST['username_admin'];
$password_admin = $_POST['password_admin'];

$cek_username = mysql_query("select * from tb_admin where username_admin='$username_admin'");
$cek_usernamee = mysql_num_rows($cek_username);

if($cek_usernamee > 0){
echo "<script>alert('Username Tidak Boleh Ada Yang Sama, Mohon Tambahkan Username Lainnya'); window.location = 'index?p=data_admin'</script>";
} 

if($cek_usernamee == 0){
$sql = "INSERT INTO tb_admin VALUES('','$nama_admin','$username_admin','$password_admin')";
$w = mysql_query($sql);
}	

if($w){
echo "<script>alert('Selamat, Data Admin Berhasil Ditambahkan'); window.location = 'index?p=data_admin'</script>";
} 

}
?>

<?php
if(isset($_POST['ubah_admin'])){

$id = $_GET['id'];

$nama_admin = $_POST['nama_admin'];
$password_admin = $_POST['password_admin'];

$sql = "UPDATE tb_admin SET 
						nama_admin = '$nama_admin',
						password_admin = '$password_admin' WHERE 
						username_admin = '$id'";
$result = mysql_query($sql);

if($result){
echo "<script>alert('Selamat, Data Admin Telah Berhasil Diubah'); window.location = 'index?p=data_admin'</script>";	
}

}
?>