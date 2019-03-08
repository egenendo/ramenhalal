            <div class="row" style='font-weight: bolder;'>
                <div class="col-lg-12">
                    <center><h1 class="page-header"><b>Data User</b></h1></center>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			
			<a data-toggle='modal' data-target='#tambah_user' class="btn btn-primary" style='width: 100%; margin-bottom: 20px; font-weight: bolder;'>Tambah</a>
            <div class="row" style='font-weight: bolder;'>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <center>Tabel Data User</center>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nama Lengkap</th>
											<th>Email</th>
											<th>Pengaturan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$no = 1;				
									$queryy = "select * from tb_user, tb_jenis_kelamin where tb_user.id_jenis_kelamin=tb_jenis_kelamin.id_jenis_kelamin order by id_user desc";
                                    $sqll = mysql_query($queryy) or die(mysql_error());
									while($data = mysql_fetch_array($sqll)){ 
									$id_user = $data['id_user'];
									$nama_user = $data['nama_user'];
									$email_user = $data['email_user'];
									$password_user = $data['password_user'];
									$jenis_kelamin = $data['jenis_kelamin'];
									$alamat_user = $data['alamat_user'];
									$telepon_user = $data['telepon_user'];
									?>
										<tr class="odd gradeX">
                                            <td><center><?php echo $no; ?></center></td>
                                            <td><center><a data-toggle='modal' data-target='#detail_user<?php echo $id_user;?>' style='cursor: pointer;'><?php echo $nama_user; ?></a></center></td>
											<td><center><?php echo $email_user; ?></center></td>
											<td><center>
											<a href='index?p=ubah_user&id=<?php echo $id_user;?>' class="btn btn-success">Ubah</a> 
											<a href='index?p=hapus_user&id=<?php echo $id_user;?>' onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus User <?php echo $nama_user;?> ?');" class="btn btn-danger">Hapus</a>
											</center></td>
                                        </tr>
										
							<!-- Modal -->
                            <div class="modal fade" id="detail_user<?php echo $id_user;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <center><h4 class="modal-title" id="myModalLabel"><b>Detail User</b></h4></center>
                                        </div>
                                        <div class="modal-body">
										<div class="form-group">
											<label style='color: #337ab7;'>Nama Lengkap =</label>
                                            <?php echo $nama_user; ?> 
										</div>
										<hr>
										<div class="form-group">
                                            <label style='color: #337ab7;'>Email =</label>
											<?php echo $email_user; ?> 
										</div>
										<hr>
                                        <div class="form-group">
                                            <label style='color: #337ab7;'>Password =</label>
											<?php echo $password_user; ?> 
										</div>
										<hr>
										<div class="form-group">
                                            <label style='color: #337ab7;'>Jenis Kelamin =</label>
											<?php echo $jenis_kelamin; ?> 
										</div>
										<hr>
										<div class="form-group">
                                            <label style='color: #337ab7;'>Alamat Lengkap =</label>
											<?php echo $alamat_user; ?> 
										</div>
										<hr>
										<div class="form-group">
                                            <label style='color: #337ab7;'>Nomor Handphone =</label>
											<?php echo $telepon_user; ?> 
										</div>
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
                            <div class="modal fade" id="tambah_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <center><h4 class="modal-title" id="myModalLabel"><b>Tambah User</b></h4></center>
                                        </div>
                                        <div class="modal-body">
										<form method='post' role="form">
										<div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input class="form-control" type='text' name="nama_user" id="nama_user" placeholder="Ketik Nama Lengkap Disini ..." autofocus required autocomplete='off'>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type='email' name="email_user" id="email_user" placeholder="Ketik Email Disini ..." required autocomplete='off'>
                                        </div>
										<div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" type='text' name="password_user" id="password_user" placeholder="Ketik Password Disini ..." required autocomplete='off'>
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
                                            <textarea class="form-control" type='text' name="alamat_user" id="alamat_user" placeholder="Ketik Alamat Lengkap Disini ..." required autocomplete='off'></textarea>
                                        </div>
										<div class="form-group">
                                            <label>Nomor Handphone</label>
                                            <input class="form-control" type='number' name="telepon_user" id="telepon_user" placeholder="Ketik Nomor Handphone Disini ..." required autocomplete='off'>
                                        </div>
                                        <center><button type="submit" name="tambah_user" class="btn btn-primary">Tambah</button>
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

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
