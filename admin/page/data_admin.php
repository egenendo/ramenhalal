            <div class="row" style='font-weight: bolder;'>
                <div class="col-lg-12">
                    <center><h1 class="page-header"><b>Data Admin</b></h1></center>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			
			<a data-toggle='modal' data-target='#tambah_admin' class="btn btn-primary" style='width: 100%; margin-bottom: 20px; font-weight: bolder;'>Tambah</a>
            <div class="row" style='font-weight: bolder;'>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <center>Tabel Data Admin</center>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nama</th>
											<th>Pengaturan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$no = 1;				
									$queryy = "select * from tb_admin order by id_admin desc";
                                    $sqll = mysql_query($queryy) or die(mysql_error());
									while($data = mysql_fetch_array($sqll)){ 
									$nama_admin = $data['nama_admin'];
									$username_admin = $data['username_admin'];
									$password_admin = $data['password_admin'];
									?>
										<tr class="odd gradeX">
                                            <td><center><?php echo $no; ?></center></td>
                                            <td><center><a data-toggle='modal' data-target='#detail_admin<?php echo $username_admin;?>' style='cursor: pointer;'><?php echo $nama_admin; ?></a></center></td>
											<?php
											$cek_session = $_SESSION['username_admin'];
											if($username_admin == $cek_session){
											?>
											<td><center>
											<a href='index?p=ubah_admin&id=<?php echo $username_admin;?>' class="btn btn-success">Ubah</a> 
											<a href='index?p=hapus_admin&id=<?php echo $username_admin;?>' onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Admin <?php echo $nama_admin;?> ?');" class="btn btn-danger">Hapus</a>
											</center></td>
											<?php
											} else {
											?>
											<td><center>
											<span style="cursor: not-allowed;"><a href='index?p=ubah_admin&id=<?php echo $username_admin;?>' class="btn btn-success" disabled>Ubah</a></span>
											<span style="cursor: not-allowed;"><a href='index?p=hapus_admin&id=<?php echo $username_admin;?>' onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Admin <?php echo $nama_admin;?> ?');" class="btn btn-danger" disabled>Hapus</a></span>
											</center></td>
											<?php
											}
											?>
                                        </tr>
										
							<!-- Modal -->
                            <div class="modal fade" id="detail_admin<?php echo $username_admin;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <center><h4 class="modal-title" id="myModalLabel"><b>Detail User</b></h4></center>
                                        </div>
                                        <div class="modal-body">
										<div class="form-group">
											<label style='color: #337ab7;'>Nama =</label>
                                            <?php echo $nama_admin; ?> 
										</div>
										<hr>
										<div class="form-group">
                                            <label style='color: #337ab7;'>Username =</label>
											<?php echo $username_admin; ?> 
										</div>
										<?php
											$cek_session = $_SESSION['username_admin'];
											if($username_admin == $cek_session){
										?>
										<hr>
                                        <div class="form-group">
                                            <label style='color: #337ab7;'>Password =</label>
											<?php echo $password_admin; ?> 
										</div>
										<?php
											} else {
										?>
										
										<?php
											}
										?>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
									
									<?php
									$no++; }
									?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			
							<!-- Modal -->
                            <div class="modal fade" id="tambah_admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <center><h4 class="modal-title" id="myModalLabel"><b>Tambah Admin</b></h4></center>
                                        </div>
                                        <div class="modal-body">
										<form method='post' role="form">
										<div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" type='text' name="nama_admin" id="nama_admin" placeholder="Ketik Nama Disini ..." autofocus required autocomplete='off'>
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" type='text' name="username_admin" id="username_admin" placeholder="Ketik Username Disini ..." required autocomplete='off'>
                                        </div>
										<div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" type='text' name="password_admin" id="password_admin" placeholder="Ketik Password Disini ..." required autocomplete='off'>
                                        </div>
                                        <center><button type="submit" name="tambah_admin" class="btn btn-primary">Tambah</button>
                                        <button type="reset" class="btn btn-danger">Batal</button></center>
                                    </form>									
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->	

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
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
