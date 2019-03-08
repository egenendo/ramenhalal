            <div class="row" style='font-weight: bolder;'>
                <div class="col-lg-12">
                    <center><h1 class="page-header"><b>Data Detail Pesanan</b></h1></center>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			
			<div class="row" style='font-weight: bolder;'>
                <div class="col-lg-16">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <center>Tabel Data Detail Pesanan</center>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Kode</th>
											<th>Id hidangan</th>
											<th>Nama Hidangan</th>
											<th>Email</th>
											<th>Harga Hidangan</th>
											<th>Jumlah Beli Hidangan</th>
											<th>Total Harga Hidangan</th>
											<th>Tanggal Transaksi</th>
											<th>Jam Transaksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$no = 1;				
									$queryy = "select * from tb_transaksi, tb_user where tb_transaksi.id_user=tb_user.id_user group by kode_transaksi order by id_transaksi desc";
                                    $sqll = mysql_query($queryy) or die(mysql_error());
									while($data = mysql_fetch_array($sqll)){ 
									$id_transaksi = $data['id_transaksi'];
									$kode_transaksi = $data['kode_transaksi'];
									$id_hidangan = $data['id_hidangan'];
									$nama_hidangan = $data['nama_hidangan'];
									$harga_hidangan = $data['harga_hidangan'];
									$jumlah_beli_hidangan = $data['jumlah_beli_hidangan'];
									$total_harga_hidangan = $data['total_harga_hidangan'];
									$email_user = $data['email_user'];
									$tanggal_transaksi = $data['tanggal_transaksi'];
									$jam_transaksi = $data['jam_transaksi'];
									?>
										<tr class="odd gradeX">
                                            <td><center><?php echo $no; ?></center></td>
                                            <td><center><a data-toggle='modal' data-target='#detail_pesanan<?php echo $kode_transaksi;?>' style='cursor: pointer;'><?php echo $kode_transaksi; ?></a></center></td>
											<td><center><?php echo $id_hidangan; ?></center></td>
											<td><center><?php echo $nama_hidangan; ?>
											<!--a data-toggle='modal' data-target='#ubah_pesanan<?php echo $kode_transaksi; ?>' class="btn btn-success">Ubah</a> 
											<a href='index?p=hapus_pesanan&id=<?php echo $kode_transaksi;?>' onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Pesanan <?php echo $kode_transaksi;?> ?');" class="btn btn-danger">Hapus</a>
											--></center></td>
											<td><center><?php echo $email_user; ?></center></td>
											<td><center><?php echo $harga_hidangan; ?></center></td>
											<td><center><?php echo $jumlah_beli_hidangan; ?></center></td>
											<td><center><?php echo $total_harga_hidangan; ?></center></td>
											<td><center><?php echo $tanggal_transaksi; ?></center></td>
											<td><center><?php echo $jam_transaksi ?></center></td>
                                        </tr>

							<!-- Modal -->
                            <div class="modal fade" id="detail_pesanan<?php echo $kode_transaksi;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <center><h4 class="modal-title" id="myModalLabel"><b>Detail Pesanan</b></h4></center>
                                        </div>
                                        <div class="modal-body">
										<div class="form-group">
											<label style='color: #337ab7;'>Kode Transaksi =</label>
                                            <?php echo $kode_transaksi; ?> 
										</div>
										<hr>
										<div class="form-group">
                                            <label style='color: #337ab7;'>Pesanan =</label><br>
									<?php	
									$nos = 1;		
									$queryys = "select * from tb_transaksi, tb_user where tb_transaksi.id_user=tb_user.id_user and kode_transaksi='$kode_transaksi' order by id_transaksi desc";
                                    $sqlls = mysql_query($queryys) or die(mysql_error());
									while($datas = mysql_fetch_array($sqlls)){ 
									$nama_hidangans = $datas['nama_hidangan'];
									$harga_hidangans = $datas['harga_hidangan'];
									$jumlah_beli_hidangans = $datas['jumlah_beli_hidangan'];
									$total_harga_hidangans = $datas['total_harga_hidangan'];
									$total_harga_transaksis = $datas['total_harga_transaksi'];
									$nama_users = $datas['nama_user'];
									$email_users = $datas['email_user'];
									$tanggal_transaksis = $datas['tanggal_transaksi'];
									$jam_transaksis = $datas['jam_transaksi'];
									$tanggal_transaksiss = $hari[date("w", strtotime($tanggal_transaksis))].", ".date("j", strtotime($tanggal_transaksis))." ".$bulan[date("n", strtotime($tanggal_transaksis))]." ".date("Y", strtotime($tanggal_transaksis));						
									?>
											<?php echo $nos; ?>.  <?php echo $nama_hidangans; ?> | Rp, <?php echo number_format($harga_hidangans,0,',','.');?>,- | x<?php echo $jumlah_beli_hidangans; ?> = <?php echo $total_harga_hidangans; ?><br> 
									<?php
									$nos++; }
									?>
										</div>
										<hr>
										<div class="form-group">
											<label style='color: #337ab7;'>Total Harga Pesanan =</label>
                                            Rp, <?php echo number_format($total_harga_transaksis,0,',','.');?>,- 
										</div>
										<hr>
										<div class="form-group">
											<label style='color: #337ab7;'>Nama User =</label>
                                            <?php echo $nama_users; ?>										
										</div>
										<hr>
										<div class="form-group">
											<label style='color: #337ab7;'>Email User =</label>
											<?php echo $email_users; ?>											
										</div>
										<hr>
										<div class="form-group">
											<label style='color: #337ab7;'>Waktu Pesanan =</label>
											<?php echo $tanggal_transaksiss; ?> ( <?php echo $jam_transaksis; ?> )										
										</div>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->											
										
							<!-- Modal -->
                            <div class="modal fade" id="ubah_pesanan<?php echo $kode_transaksi; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <center><h4 class="modal-title" id="myModalLabel">Ubah Pesanan</h4></center>
                                        </div>
                                        <div class="modal-body">
										<?php
										$query = mysql_query("SELECT * FROM tb_transaksi WHERE 
															 kode_transaksi='$kode_transaksi'");
										$data  = mysql_fetch_array($query);
										$status_pembayaran = $data['status_pembayaran'];
										$status_pengiriman = $data['status_pengiriman'];

										if($status_pembayaran == '0'){
											$status_pembayaran = 'Belum Dibayar';
										}
										
										if($status_pembayaran == '1'){
											$status_pembayaran = 'Sudah Dibayar';
										}
										
										if($status_pengiriman == '0'){
											$status_pengiriman = 'Belum Dikirim';
										}
										
										if($status_pengiriman == '1'){
											$status_pengiriman = 'Sudah Dikirim';
										}
										?>
										
										<?php
										$querys = mysql_query("SELECT * FROM tb_transaksi WHERE 
															 kode_transaksi='$kode_transaksi'");
										$datas  = mysql_fetch_array($querys);
										$status_pembayarans = $datas['status_pembayaran'];
										$status_pengirimans = $datas['status_pengiriman'];
										?>
										
										<form method='post' role="form">
										<font style="color: #337ab7;">Status Pembayaran =</font>
										<font><?php echo $status_pembayaran; ?></font><br>
										<input class="form-control" type='text' name="kode_transaksi" id="kode_transaksi" value="<?php echo $kode_transaksi; ?>" style='display: none;'>                                        
										<?php
										if($status_pembayarans == '0'){
										?>
										<button type="submit" name="ubah_pembayaran" class="btn btn-success">Ubah Menjadi Sudah Dibayar</button><hr>
										<?php
										}
										
										if($status_pembayarans == '1'){
										?>
										<hr>
										<?php
										}
										?>
										</form>
										<form method='post' role="form">
										<font style="color: #337ab7;">Status Pengiriman =</font>
										<font><?php echo $status_pengiriman; ?></font><br>
										<input class="form-control" type='text' name="kode_transaksi" id="kode_transaksi" value="<?php echo $kode_transaksi; ?>" style='display: none;'>                                        									
										<?php
										if($status_pengirimans == '0'){
										?>
										<button type="submit" name="ubah_pengiriman" class="btn btn-success">Ubah Menjadi Sudah Dikirim</button>
                                        <?php
										}
										
										if($status_pengirimans == '1'){
										?>
										
										<?php
										}
										?>
										</form>
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

	<?php
	include 'control_pesanan.php';
	?>							

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-Pesanan-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>