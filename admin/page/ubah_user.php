					<?php
					if(empty($_GET['id'])){
					include '404.php';
					} else {
					?>
					
					<?php
					$id = $_GET['id'];
                    $query = mysql_query("SELECT * FROM tb_user, tb_jenis_kelamin WHERE 
														tb_user.id_jenis_kelamin=tb_jenis_kelamin.id_jenis_kelamin AND
														id_user='$id'");
                    $data  = mysql_fetch_array($query);
					$id_user = $data['id_user'];
					$nama_user = $data['nama_user'];
					$email_user = $data['email_user'];
					$password_user = $data['password_user'];
					$jenis_kelamin = $data['jenis_kelamin'];
					$alamat_user = $data['alamat_user'];
					$telepon_user = $data['telepon_user'];
					
					if($id_user == $id){					
                    ?>

			<div class="row" style='font-weight: bolder;'>
                <div class="col-lg-12">
                    <center><h1 class="page-header" style='color: #337ab7; font-size: 30px; font-weight: bold;'>Ubah User</h1></center>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" style='font-weight: bolder;'>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style='font-size: 18px;'>
                            <center>Form Ubah User</center>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form method='post' role="form">
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
                                        <center><button type="submit" name="ubah_user" class="btn btn-success">Ubah</button>
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
	include 'control_user.php';
	?>
			
	<!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-User-2.js"></script>

			<?php
			} else {
			include "404.php";
			}
			?>
			
			<?php
			}
			?>	