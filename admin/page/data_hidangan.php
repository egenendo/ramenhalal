            <div class="row" style='font-weight: bolder;'>
                <div class="col-lg-12">
                    <center><h1 class="page-header"><b>Data Hidangan</b></h1></center>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			
			<a data-toggle='modal' data-target='#tambah_hidangan' class="btn btn-primary" style='width: 100%; margin-bottom: 20px; font-weight: bolder;'>Tambah</a>
            <div class="row" style='font-weight: bolder;'>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <center>Tabel Data Hidangan</center>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nama</th>
											<th>Gambar</th>
											<th>Pengaturan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$no = 1;				
									$queryy = "select * from tb_hidangan order by id_hidangan desc";
                                    $sqll = mysql_query($queryy) or die(mysql_error());
									while($data = mysql_fetch_array($sqll)){ 
									$id_hidangan = $data['id_hidangan'];
									$nama_hidangan = $data['nama_hidangan'];
									$harga_hidangan = $data['harga_hidangan'];
									$gambar_hidangan = $data['gambar_hidangan'];
									$deskripsi_hidangan = $data['deskripsi_hidangan'];
									?>
										<tr class="odd gradeX">
                                            <td><center><?php echo $no; ?></center></td>
                                            <td><center><a data-toggle='modal' data-target='#detail_hidangan<?php echo $id_hidangan;?>' style='cursor: pointer;'><?php echo $nama_hidangan; ?></a></center></td>
											<td><center><img src="../images/<?php echo $gambar_hidangan; ?>" alt="" style='width: 100px; height: 100px;'></center></td>
											<td><center>
											<a href='index?p=ubah_hidangan&id=<?php echo $id_hidangan;?>' class="btn btn-success">Ubah</a> 
											<a href='index?p=hapus_hidangan&id=<?php echo $id_hidangan;?>&idi=<?php echo $gambar_hidangan;?>' onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Hidangan <?php echo $nama_hidangan;?> ?');" class="btn btn-danger">Hapus</a>
											</center></td>
                                        </tr>
										
							<!-- Modal -->
                            <div class="modal fade" id="detail_hidangan<?php echo $id_hidangan;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <center><h4 class="modal-title" id="myModalLabel"><b>Detail Hidangan</b></h4></center>
                                        </div>
                                        <div class="modal-body">
										<div class="form-group">
											<label style='color: #337ab7;'>Nama =</label>
                                            <?php echo $nama_hidangan; ?> 
										</div>
										<hr>
										<div class="form-group">
                                            <label style='color: #337ab7;'>Harga =</label>
											Rp, <?php echo number_format($harga_hidangan,0,',','.');?>,-
										</div>
										<hr>
                                        <div class="form-group">
                                            <label style='color: #337ab7;'>Gambar =</label>
											<img src="../images/<?php echo $gambar_hidangan; ?>" alt="" style='width: 175px; height: 175px;'>
										</div>
										<hr>
										<div class="form-group">
                                            <label style='color: #337ab7;'>Deskripsi =</label>
											<?php echo $deskripsi_hidangan; ?> 
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
                            <div class="modal fade" id="tambah_hidangan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <center><h4 class="modal-title" id="myModalLabel"><b>Tambah Hidangan</b></h4></center>
                                        </div>
                                        <div class="modal-body">
										<form method='post' enctype="multipart/form-data" role="form">
										<div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" type='text' name="nama_hidangan" id="nama_hidangan" placeholder="Ketik Nama Disini ..." autofocus required autocomplete='off'>
                                        </div>
										<div class="form-group">
                                            <label>Harga</label>
                                            <input class="form-control" type='number' name="harga_hidangan" id="harga_hidangan" placeholder="Ketik Harga Disini ..." required autocomplete='off'>
                                        </div>
                                        <div class="form-group">
                                            <label>Gambar</label>
                                            <input class="form-control" type='file' name="gambar_hidangan" id="gambar_hidangan" required autocomplete='off'>
                                        </div>
										<div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea class="form-control" type='text' name="deskripsi_hidangan" id="deskripsi_hidangan" placeholder="Ketik Deskripsi Disini ..." required autocomplete='off'></textarea>
                                        </div>
                                        <center><button type="submit" name="tambah_hidangan" class="btn btn-primary">Tambah</button>
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

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
