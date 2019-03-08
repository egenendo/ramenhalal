<?php
if(isset($_POST['tambah_hidangan'])){

   if(isset($_FILES['gambar_hidangan'])){
	  $time = time(); 
      $file_name = $_FILES['gambar_hidangan']['name'];
      $file_size = $_FILES['gambar_hidangan']['size'];
      $file_tmp = $_FILES['gambar_hidangan']['tmp_name'];
      $file_type = $_FILES['gambar_hidangan']['type'];
	  $arr = explode(".", $file_name);
	  $file_ext = strtolower(array_pop($arr));   
      $fileName = array_shift($arr);
	  $gambar_hidangan = $time.$file_name;
	  
	  $nama_hidangan = $_POST['nama_hidangan'];
	  $harga_hidangan = $_POST['harga_hidangan'];
	  $deskripsi_hidangan = $_POST['deskripsi_hidangan'];
	  
      $expensions = array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
		 echo "<script>alert('Ekstensi Gambar Tidak Diperbolehkan, Mohon Pilih Gambar Dengan Ekstensi JPEG, JPG, atau PNG'); window.location = 'index?p=data_hidangan'</script>";
      } else {
	  $sql = "INSERT INTO tb_hidangan VALUES('','$nama_hidangan','$harga_hidangan','$gambar_hidangan','$deskripsi_hidangan')";
	  $w = mysql_query($sql);
	  
         move_uploaded_file($file_tmp,"../images/".$gambar_hidangan);
         echo "<script>alert('Selamat, Data Hidangan Berhasil Ditambahkan'); window.location = 'index?p=data_hidangan'</script>";
	  }
   }

}
?>

<?php
if(isset($_POST['ubah_hidangan'])){

$id = $_GET['id'];

$nama_hidangan = $_POST['nama_hidangan'];
$harga_hidangan = $_POST['harga_hidangan'];
$gambar_hidangans = $_FILES['gambar_hidangan']['tmp_name'];
$deskripsi_hidangan = $_POST['deskripsi_hidangan'];

if(empty($gambar_hidangans)){
	$sql = "UPDATE tb_hidangan SET 
							nama_hidangan = '$nama_hidangan',
							harga_hidangan = '$harga_hidangan',
							deskripsi_hidangan = '$deskripsi_hidangan' WHERE 
							id_hidangan = '$id'";
	$result = mysql_query($sql);

	if($result){
	echo "<script>alert('Selamat, Data Hidangan Berhasil Diubah'); window.location = 'index?p=data_hidangan'</script>";	
	}
} else {
   if(isset($_FILES['gambar_hidangan'])){
	  $time = time(); 
      $file_name = $_FILES['gambar_hidangan']['name'];
      $file_size = $_FILES['gambar_hidangan']['size'];
      $file_tmp = $_FILES['gambar_hidangan']['tmp_name'];
      $file_type = $_FILES['gambar_hidangan']['type'];
	  $arr = explode(".", $file_name);
	  $file_ext = strtolower(array_pop($arr));   
      $fileName = array_shift($arr);
	  $gambar_hidangan = $time.$file_name;
	  
      $expensions = array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
		 echo "<script>alert('Ekstensi Gambar Tidak Diperbolehkan, Mohon Pilih Gambar Dengan Ekstensi JPEG, JPG, atau PNG'); window.location = 'index?p=data_hidangan'</script>";
      } else {
	  $sql = "UPDATE tb_hidangan SET 
						nama_hidangan = '$nama_hidangan',
						harga_hidangan = '$harga_hidangan',
						gambar_hidangan = '$gambar_hidangan',
						deskripsi_hidangan = '$deskripsi_hidangan' WHERE 
						id_hidangan = '$id'";
	  $w = mysql_query($sql);
	  
         move_uploaded_file($file_tmp,"../images/".$gambar_hidangan);
         echo "<script>alert('Selamat, Data Hidangan Berhasil Diubah'); window.location = 'index?p=data_hidangan'</script>";
	  }
   } 
}

}
?>