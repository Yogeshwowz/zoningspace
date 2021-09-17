<?php $url= explode('/',$_SERVER['REQUEST_URI']); ?>
<style>
.dash-menu-active {color:#fff !important;}

</style>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php if(!empty($pageTitle)) { echo $pageTitle; } ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="<?php echo base_url(); ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/admin/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/admin/css/custom.css" rel="stylesheet" type="text/css" />
	
   
    
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>RealEstate</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>RealEstate</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               
                  <span class="hidden-xs">Welcome <?php if(!empty($this->session->userdata('name'))) { echo $this->session->userdata('name');}?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                
                  <!-- Menu Footer-->
                 
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="<?php echo base_url(); ?>dashboard" class="<?php if(in_array('dashboard',$url)) { echo "dash-menu-active";}?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>
			<?php if(!empty($this->session->userdata('role')) && $this->session->userdata('role')==1) {?>
            <li>
              <a href="<?php echo base_url(); ?>administrator/users" class="<?php if(in_array('users',$url)) { echo "dash-menu-active";}?>">
                <i class="fa fa-users"></i>
                <span>Users</span>
              </a>
            </li>
			<li>
              <a  href="<?php echo base_url(); ?>administrator/visit-user" class="<?php if(in_array('visit-user',$url)) { echo "dash-menu-active";}?>">
                <i class="fa fa-users"></i>
                <span>Visit Users</span>
              </a>
            </li>
			<li>
              <a href="<?php echo base_url(); ?>administrator/researcher" class="<?php if(in_array('researcher',$url)) { echo "dash-menu-active";}?>">
                <i class="fa fa-users"></i>
                <span>Researcher</span>
              </a>
            </li>
			<?php } ?>
			<li>
              <a href="<?php echo base_url(); ?>administrator/buysearch" class="<?php if(in_array('buysearch',$url)) { echo "dash-menu-active";}?>">
                <i class="fa fa-users"></i>
                <span>Buy Search</span>
              </a>
            </li>
          <li>
              <a href="<?php echo base_url(); ?>logout">
                <i class="fa fa-users"></i>
                <span>Logout</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>