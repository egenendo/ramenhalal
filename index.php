<?php 
session_start();

if (empty($_SESSION['id_user'])){
$id_user_session = '';
} else {	
$id_user_session = $_SESSION['id_user'];
}

include "ctrl/koneksi.php";
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Ramen Halal</title>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="keywords" content="Template, html, premium, themeforest" />
    <meta name="description" content="TheBox - premium e-commerce template">
    <meta name="author" content="Tsoy">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='http://fonts.googleapis.com/css?family=Roboto:500,300,700,400italic,400' rel='stylesheet' type='text/css'>
    <!-- <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'> -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'> -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="other/css/bootstrap.css">
    <link rel="stylesheet" href="other/css/font-awesome.css">
    <link rel="stylesheet" href="other/css/styles.css">
    <link rel="stylesheet" href="other/css/mystyles.css">

</head>

<body style='font-family: cursive;'>
    <div class="global-wrapper clearfix" id="global-wrapper">
		<div class="mfp-with-anim mfp-hide mfp-dialog clearfix" id="nav-profil<?php echo $id_user_session; ?>">
		<?php
		$queryy = "select * from tb_user, tb_jenis_kelamin where tb_user.id_jenis_kelamin=tb_jenis_kelamin.id_jenis_kelamin and id_user='$id_user_session'";
		$sqll = mysql_query($queryy) or die(mysql_error());
		$data = mysql_fetch_array($sqll);
		$nama_user = $data['nama_user'];
		$email_user = $data['email_user'];
		$password_user = $data['password_user'];
		$jenis_kelamin = $data['jenis_kelamin'];
		$alamat_user = $data['alamat_user'];
		$telepon_user = $data['telepon_user'];
		?>
            <center><h3 class="widget-title">Ubah Profil</h3></center>
            <hr />
            <form action="index?p=ubah_profil&id=<?php echo $id_user_session; ?>" method="post" role="form">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input class="form-control" type="text" name="nama_user" id="nama_user" value="<?php echo $nama_user; ?>" required autocomplete='off' readonly />
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email_user" id="email_user" value="<?php echo $email_user; ?>" autofocus required autocomplete='off' />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="text" name="password_user" id="password_user" value="<?php echo $password_user; ?>" required autocomplete='off' />
                </div>
				<div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input class="form-control" type="text" name="jenis_kelamin" id="jenis_kelamin" value="<?php echo $jenis_kelamin; ?>" required autocomplete='off' readonly />
                </div>
				<div class="form-group">
                    <label>Alamat Lengkap</label>
                    <textarea class="form-control" type="text" name="alamat_user" id="alamat_user" required autocomplete='off'><?php echo $alamat_user; ?></textarea>
                </div>
				<div class="form-group">
                    <label>Nomor Handphone</label>
                    <input class="form-control" type="number" name="telepon_user" id="telepon_user" value="<?php echo $telepon_user; ?>" required autocomplete='off' />
                </div>
                <center><input class="btn btn-primary" type="submit" value="Ubah" /></center>
            </form>
        </div>
        <div class="mfp-with-anim mfp-hide mfp-dialog clearfix" id="nav-login-dialog">
            <center><h3 class="widget-title">Form Login</h3></center>
            <hr />
            <form action="page/proses_login" method="post" role="form">
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email_user" id="email_user" placeholder="Ketik Email Disini ..." autofocus required autocomplete='off' />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="text" name="password_user" id="password_user" placeholder="Ketik Password Disini ..." required autocomplete='off' />
                </div>
                <center><input class="btn btn-primary" type="submit" value="Login" /></center>
            </form>
        </div>
        <div class="mfp-with-anim mfp-hide mfp-dialog clearfix" id="nav-account-dialog">
            <center><h3 class="widget-title">Form Daftar</h3></center>
            <hr />
            <form method='post' role="form">
				<div class="form-group">
                    <label>Nama Lengkap</label>
                    <input class="form-control" type="text" name="nama_user" id="nama_user" placeholder="Ketik Nama Lengkap Disini ..." autofocus required autocomplete='off' />
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email_user" id="email_user" placeholder="Ketik Email Disini ..." required autocomplete='off' />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="text" name="password_user" id="password_user" placeholder="Ketik Password Disini ..." required autocomplete='off' />
                </div>
				<div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" name="id_jenis_kelamin" id="id_jenis_kelamin" required autocomplete='off'>
					<option value='' hidden='true'>Pilih Jenis Kelamin</option>
					<?php  
					$sql = 'select * from tb_jenis_kelamin order by id_jenis_kelamin ASC';
					$result = mysql_query($sql);
					while($data = mysql_fetch_array($result)){
					$id_jenis_kelamin = $data['id_jenis_kelamin'];
					$jenis_kelamin = $data['jenis_kelamin'];
					?>
					<option value='<?php echo $id_jenis_kelamin; ?>'><?php echo $jenis_kelamin; ?></option>
					<?php }?>
					</select>
                </div>
				<div class="form-group">
                    <label>Alamat Lengkap</label>
                    <textarea class="form-control" type="text" name="alamat_user" id="alamat_user" placeholder="Ketik Alamat Lengkap Disini ..." required autocomplete='off'></textarea>
                </div>
				<div class="form-group">
                    <label>Nomor Handphone</label>
                    <input class="form-control" type="number" name="telepon_user" id="telepon_user" placeholder="Ketik Nomor Handphone Disini ..." required autocomplete='off' />
                </div>
                <center><input class="btn btn-primary" name="tambah_user" type="submit" value="Daftar" /></center>
            </form>
        </div>
        <div class="mfp-with-anim mfp-hide mfp-dialog clearfix" id="nav-pwd-dialog">
            <h3 class="widget-title">Password Recovery</h3>
            <p>Enter Your Email and We Will Send the Instructions</p>
            <hr />
            <form>
                <div class="form-group">
                    <label>Your Email</label>
                    <input class="form-control" type="text" />
                </div>
                <input class="btn btn-primary" type="submit" value="Recover Password" />
            </form>
        </div>
        <nav class="navbar navbar-inverse navbar-main yamm">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#main-nav-collapse" area_expanded="false"><span class="sr-only">Main Menu</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="./">
                        <font style='color: white;'>Ramen Halal</font>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="main-nav-collapse">
                    <ul class="nav navbar-nav navbar-right">
						<?php
						if (empty($_SESSION['id_user'])) 
						{
						?>
                        <li><a href="#nav-login-dialog" data-effect="mfp-move-from-top" class="popup-text">Login</a>
                        </li>
                        <li><a href="#nav-account-dialog" data-effect="mfp-move-from-top" class="popup-text">Daftar</a>
                        </li>
						<?php
						} else {
						?>
						<li><a href="#nav-profil<?php echo $id_user_session; ?>" data-effect="mfp-move-from-top" class="popup-text">Profil</a>
                        </li>
						<li><a href="page/proses_logout">Logout</a>
                        </li>
						<?php
						}
						?>
                        <li class="dropdown">
							<?php
							if (empty($_SESSION['id_user'])) 
							{
							?>
							<a href="#nav-access" data-effect="mfp-move-from-top" class="fa fa-shopping-cart popup-text"></a>
							<?php
							} else {
							?>
							<?php
							$total_keranjang = 0;	
							$queryy = "select * from tb_tmp_transaksi where id_user='$id_user_session'";
							$sqll = mysql_query($queryy) or die(mysql_error());
							while($data = mysql_fetch_array($sqll)){
							$jumlah_beli_hidangan = $data['jumlah_beli_hidangan'];
							$total_keranjang += $jumlah_beli_hidangan;
							}
							?>
                            <a class="fa fa-shopping-cart" href="index?p=keranjang"> <?php echo $total_keranjang;?></a>
							<?php
							}
							?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
		
	<?php
	include 'page/proses_daftar.php';
	?>	

		<!--content-->
		<?php
        $pages_dir = 'page';
		if(!empty($_GET['p'])){
			$pages = scandir($pages_dir, 0);
			unset($pages[0], $pages[1]);
			$p = $_GET['p'].'.php';
			if(in_array($p, $pages)){
				include($pages_dir.'/'.$p);
				} else {
					include($pages_dir.'/404.php');
				}
			} else {
				include($pages_dir.'/home.php');
			}
			?>
		<!--//content-->	

        <footer class="main-footer">
            <div class="container">
                <div class="row row-col-gap" data-gutter="60">
                    <div class="col-md-6">
                        <h4 class="widget-title-sm">Tentang Kami</h4>
                        <p>Outlet "Ra.Men" pertama kali didirikan di Surabaya pada tahun 2014. Dengan menyajikan menu utama berupa mie ramen berbagai varian, seperti Plain Ramen, Chicken Katsu Ramen, Meatballs Ramen, Seafood Ramen, dan Deluxe Ramen.
						<br><br>Selain menu mie ramen, kami juga menyediakan berbagai jenis Sushi, dan Purin (puding khas Jepang), yang semuanya diolah dari bahan-bahan pilihan, sehingga kesegarannya tetap terjamin.
						<br><br>Ra.Men menyajikan kualitas cita rasa berkelas dengan harga yang tetap terjangkau, dan menjadikan outlet Ra.Men sebagai outlet dengan konsep "Ramen Kaki Lima" seperti yang banyak ditemui di negara asalnya, sehingga dapat dinikmati semua orang dan setiap saat.</p>
                    </div>
					<div class="col-md-6">
                        <h4 class="widget-title-sm">Lokasi</h4>
                        <p>Jl. Gayungsari Barat no. 84, Surabaya</p>
						<div class="mapouter"><div class="gmap_canvas"><iframe width="450" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=Ra.Men%20Jl.%20Gayungsari%20Barat%20no.%2084&t=&z=19&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net">embedgooglemap.net</a></div><style>.mapouter{text-align:right;height:300px;width:450px;}.gmap_canvas {overflow:hidden;background:none!important;height:300px;width:450px;}</style></div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
				<?php
				$copyright = date('Y');
				?>
                    <div class="col-md-6">
                        <p class="copyright-text">Copyright &copy; <a href="./">Ramen Halal</a> <?php echo $copyright;?>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="other/js/jquery.js"></script>
    <script src="other/js/bootstrap.js"></script>
    <script src="other/js/icheck.js"></script>
    <script src="other/js/ionrangeslider.js"></script>
    <script src="other/js/jqzoom.js"></script>
    <script src="other/js/card-payment.js"></script>
    <script src="other/js/owl-carousel.js"></script>
    <script src="other/js/magnific.js"></script>
    <script src="other/js/custom.js"></script>





</body>

</html>
