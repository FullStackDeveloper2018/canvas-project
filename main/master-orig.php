<?php 

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

	if (!isset($_SESSION['user_user_id'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user_user_id']);
		header("location: device_groups.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PyLoop</title>
  <!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width,initial-scale=1">

<!--  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> -->

<link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
 <!-- <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">-->
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">

	
  <!-- lightbox -->
  <link rel="stylesheet" href="../dist/css/colorbox.css">
  
  
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!-- Main Header -->
  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>PLP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Py</b>Loop</span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <!--<img src="../dist/img/avatar5.png" class="user-image" alt="User Image">-->
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Welcome Vaspandi</span>
					<i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
<!--                  <a href="#" class="btn btn-default btn-flat">Sign out</a>  -->

		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<p> <a href="device_groups.php?logout='1'" style="color: red;">logout</a> </p>
		<?php endif ?>


                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- /.search form -->
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- Optionally, you can add icons to the links -->
        <li class="treeview menu-open">
          <a href="#"><i></i> <span>Navigation</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu" style="display: block;">
            <li><a  href="/main/index.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="/main/devices.php"><i class="fa fa-tv"></i>All Devices</a></li>
            <li><a href="/main/device_groups.php"><i class="fa fa-th-large"></i>Device Groups</a></li>
            <li><a href="/main/all_playlists.php"><i class="fa fa-play"></i>Playlist</a></li>
			
			<li class="treeview">
			  <a href="#"><i  class="fa fa-folder-open"; ></i> <span>Media</span>
				<span class="pull-right-container">
					<i class="fa fa-angle-down pull-right"></i>
				  </span>
			  </a>
			  <ul class="treeview-menu" style="display: block;">
				<li><a  href="/main/images.php"><i class="fa fa-image"></i>Images</a></li>
				<li><a href="/main/videos.php"><i class="fa fa-video-camera"></i>Videos</a></li>
				<li><a href="/main/webpages.php"><i class="fa  fa-chrome"></i>Webpages</a></li>
			  </ul>
			</li>

			
			
			
          </ul>
        </li>
      </ul>
      
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<!--    <section class="content-header">
      <h1>
        Manage
        <small>Mange your devices</small> 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> PyLoop</a></li>
        <li class="active">Konsole</li>
      </ol>
    </section>  --> 
    <!-- Main content --> 
    <section class="content container-fluid">
      <?php echo $content; ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
<!--  <footer class="main-footer">
    <!-- Default to the left 
    <strong>Author: Vaspandi Nallasamy</strong>
  </footer> -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- REQUIRED JS SCRIPTS -->


<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<!-- colorbox lightbox -->
<script src="../dist/js/jquery.colorbox-min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../bower_components/bootstrap/dist/js/popper.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>


<!-- bootbox -->
<script src="../dist/js/bootbox.min.js"></script>
<script src="../dist/js/bootbox.locales.min.js"></script>

</body>
</html>