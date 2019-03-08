					<?php
					if(empty($_GET['id'])){
					include '404.php';
					} else {
					?>
					
					<?php
					$id = $_GET['id'];
                    $query = mysql_query("SELECT * FROM tb_admin WHERE 
										 username_admin='$id'");
                    $data  = mysql_fetch_array($query);
					$nama_admin = $data['nama_admin'];
					$username_admin = $data['username_admin'];
					$password_admin = $data['password_admin'];
					
					if($username_admin == $id){					
                    ?>
					
					<?php
					$cek_session = $_SESSION['username_admin'];
					if($username_admin == $cek_session){
					?>

			<div class="row" style='font-weight: bolder;'>
                <div class="col-lg-12">
                    <center><h1 class="page-header" style='color: #337ab7; font-size: 30px; font-weight: bold;'>Ubah Admin</h1></center>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" style='font-weight: bolder;'>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style='font-size: 18px;'>
                            <center>Form Ubah Admin</center>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form method='post' role="form">
										<div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" type='text' name="nama_admin" id="nama_admin" value='<?php echo $nama_admin; ?>' autofocus required autocomplete='off'>
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" type='text' name="username_admin" id="username_admin" value='<?php echo $username_admin; ?>' required autocomplete='off' readonly>
                                        </div>
										<div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" type='text' name="password_admin" id="password_admin" value='<?php echo $password_admin; ?>' required autocomplete='off'>
                                        </div>
                                        <center><button type="submit" name="ubah_admin" class="btn btn-success">Ubah</button>
                                        <button type="reset" class="btn btn-danger">Batal</button></center>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			
	<?php
	include 'control_admin.php';
	?>
			
	<!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-Admin-2.js"></script>
	
			<?php
			} else {
			include "404.php";
			}
			?>

			<?php
			} else {
			include "404.php";
			}
			?>
			
			<?php
			}
			?>	