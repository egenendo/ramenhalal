        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; font-weight: bolder;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./">RAMEN HALAL</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
						<?php
						$cek_session = $_SESSION['username_admin'];				
						$queryy = "select * from tb_admin where username_admin='$cek_session'";
                        $sqll = mysql_query($queryy) or die(mysql_error());
						$data = mysql_fetch_array($sqll); 
						$nama_admin = $data['nama_admin'];
						?>
                    <a style='cursor: text; border-bottom: 1px solid black;'><b>Hallo, <font style='color: #f44336;'><?php echo $nama_admin; ?></font></b></a>
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index?p=data_admin"><i class="fa fa-user fa-fw"></i> Admin</a>
                        </li>
                        <li>
                            <a href="index?p=data_user"><i class="fa fa-group fa-fw"></i> User</a>
                        </li>
                        <li>
                            <a href="index?p=data_hidangan"><i class="fa fa-spoon fa-fw"></i> Hidangan</a>
                        </li>
						<li>
                            <a href="index?p=data_pesanan"><i class="fa fa-file fa-fw"></i> Pesanan</a>
                        </li>
						<li>
							<a href="index?p=data_detil_pesanan"><i class="fa fa-file fa-fw"></i> Detail Pesanan</a>
						</li>
						<li>
                            <a href="../ctrl/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
		
	<!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>