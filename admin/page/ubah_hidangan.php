					<?php
					if(empty($_GET['id'])){
					include '404.php';
					} else {
					?>
					
					<?php
					$id = $_GET['id'];
                    $query = mysql_query("SELECT * FROM tb_hidangan WHERE 
														id_hidangan='$id'");
                    $data  = mysql_fetch_array($query);
					$id_hidangan = $data['id_hidangan'];
					$nama_hidangan = $data['nama_hidangan'];
					$harga_hidangan = $data['harga_hidangan'];
					$gambar_hidangan = $data['gambar_hidangan'];
					$deskripsi_hidangan = $data['deskripsi_hidangan'];
					
					if($id_hidangan == $id){					
                    ?>

			<div class="row" style='font-weight: bolder;'>
                <div class="col-lg-12">
                    <center><h1 class="page-header" style='color: #337ab7; font-size: 30px; font-weight: bold;'>Ubah Hidangan</h1></center>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" style='font-weight: bolder;'>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style='font-size: 18px;'>
                            <center>Form Ubah Hidangan</center>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form method='post' enctype="multipart/form-data" role="form">
										<div class="form-group">
											<label>Nama</label>
											<input class="form-control" type="text" name="nama_hidangan" id="nama_hidangan" value="<?php echo $nama_hidangan; ?>" autofocus required autocomplete='off' />
										</div>
										<div class="form-group">
											<label>Harga</label>
											<input class="form-control" type="number" name="harga_hidangan" id="harga_hidangan" value="<?php echo $harga_hidangan; ?>" required autocomplete='off' />
										</div>
										<div class="form-group">
											<label>Gambar</label><br>
											<img src="../images/<?php echo $gambar_hidangan; ?>" alt="" style='width: 125px; height: 125px;'>
											<input class="form-control" type="file" name="gambar_hidangan" id="gambar_hidangan" autocomplete='off' />
										</div>
										<div class="form-group">
											<label>Deskripsi</label>
											<textarea class="form-control" type="text" name="deskripsi_hidangan" id="deskripsi_hidangan" required autocomplete='off'><?php echo $deskripsi_hidangan; ?></textarea>
										</div>
                                        <center><button type="submit" name="ubah_hidangan" class="btn btn-success">Ubah</button>
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
	include 'control_hidangan.php';
	?>
			
	<!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-Hidangan-2.js"></script>

			<?php
			} else {
			include "404.php";
			}
			?>
			
			<?php
			}
			?>	