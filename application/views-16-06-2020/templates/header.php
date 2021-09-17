<?php $url= explode('/',$_SERVER['REQUEST_URI']); ?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
   <head>
      <!-- Meta data -->
      <meta charset="UTF-8">
      <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content="Reallist" name="description">
      <meta content="Reallist" name="author">
      <meta name="keywords" content="Reallist"/>
      <!-- Favicon -->
      <link rel="icon" href="favicon.ico" type="image/x-icon" />
      <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
      <!-- Title -->
      <title>Reallist</title>
      <!-- Bootstrap Css -->
      <link href="<?php echo base_url(); ?>/assets/plugins/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet" />
      <!-- Style css -->
      <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet" />
      <!-- Font-awesome  Css -->
      <link href="<?php echo base_url(); ?>/assets/css/icons.css" rel="stylesheet"/>
      <!--Horizontal Menu-->
      <link href="<?php echo base_url(); ?>/assets/plugins/horizontal-menu/horizontal.css" rel="stylesheet" />
      <!--Select2 Plugin -->
      <link href="<?php echo base_url(); ?>/assets/plugins/select2/select2.min.css" rel="stylesheet" />
      <!-- Cookie css -->
      <!-- Owl Theme css-->
      <link href="<?php echo base_url(); ?>/assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet" />
      <!-- Custom scroll bar css-->
      <link href="<?php echo base_url(); ?>/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />
      <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" />
      <!-- Color skin-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/mysql/custom.css">
      <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>/assets/skins/color-skins/color15.css" />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/mysql/userdashboard/css/sb-admin-2.css">
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	  <?php if(in_array('searching-map',$url)) { ?><script src="https://cdn.zingchart.com/zingchart.min.js"></script><?php } ?>
   </head>
  <style type='text/css'>
	.modelblock{  display: block !important;}
	.modelblock-1{ display: block !important; }
</style>
   <?php 
      $this->load->model('Advancedsearch_Model');
      $resultUser = $this->Advancedsearch_Model->getUserIpAddress();
      if(!empty($resultUser['visitor_expiry_time']) && ($resultUser['status'])==0){ ?>
   <script>
      //var countDownDate = <?php echo strtotime('mar 11, 2020 13:37:25') ?> * 1000;
      var countDownDate = <?php echo strtotime($resultUser['visitor_expiry_time']) ?> * 1000;
      var now = <?php echo time() ?> * 1000;
      var x = setInterval(function() {
      now = now + 1000;
      var distance = countDownDate - now;
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
      document.getElementById("demo").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
      // If the count down is over, write some text 
      if (distance < 0) {
      clearInterval(x);
      
      console.log('EXPIRED');
      //alert('EXPIRED');
      document.getElementById("demo").innerHTML = "EXPIRED";
      checkUserexpired();
      return false;
      }
      }, 1000);
   </script><?php
      } ?>
   <body>
      <!--Loader-->
      <div id="global-loader">
         <img src="<?php echo base_url(); ?>/assets/images/loader.svg" class="loader-img" alt="">
      </div>
      <!--Topbar-->
      <div class="header-main">
         <!--/Topbar-->
         <!-- Header -->
         <div class="horizontal-header clearfix ">
            <div class="container">
               <a id="horizontal-navtoggle" class="animated-arrow"><span></span></a>
               <span class="smllogo"><img src="<?php echo base_url(); ?>/assets/images/brand/logo.png" width="120" alt=""/></span>
               <a href="tel:245-6325-3256" class="callusbtn"><i class="fa fa-phone" aria-hidden="true"></i></a>
            </div>
         </div>
         <!--/Header -->
         <!--Start Horizontal-main -->
         <div class="horizontal-main bg-dark-transparent clearfix">
            <div class="horizontal-mainwrapper container clearfix">
               <div class="desktoplogo">
                  <a href="<?php echo  base_url();?>"><img src="<?php echo base_url(); ?>/assets/images/brand/logo1.png" alt=""></a>
               </div>
               <div class="desktoplogo-1">
                  <a href="<?php echo  base_url();?>"><img src="<?php echo base_url(); ?>/assets/images/brand/logo1.png" alt=""></a>
               </div>
               <!--Nav-->
               <nav class="horizontalMenu clearfix d-md-flex">

                  <ul class="horizontalMenu-list">
                    <li class="navbar-left" aria-haspopup="true">
                      <form action="<?php echo base_url();?>searching" method="post" class="header-searchbar">
    						<div class="search-background bg-transparent w-100">
    							<div class="form row no-gutters">
    								<div class="col-md-9 form-group bg-white ">
    									<input type="text" class="form-control input-lg" id="searchbox"  name="searchbox" placeholder="Enter Loaction, Landmark" autocomplete="off" >
    									<input type="hidden"  name="simplesearch" value="1">
    								</div>
    										
    								<div class=" col-md-3 mb-0">
									<?php if(!empty($resultUser['visitor_expiry_time']) && ($resultUser['status'])==1 && (empty($this->session->userdata('email')))){ ?>	
										<button class="btn btn-lg btn-block btn-primary br-tr-md-0 br-br-md-0" type="button"  data-toggle="modal" data-target="#paymentModalCenter"><i class="fa fa-search" aria-hidden="true"></i></button>
									<?php } else {?>
										<button type="submit" class="btn btn-lg btn-block btn-primary br-tr-md-0 br-br-md-0" name="submitBtn"><i class="fa fa-search" aria-hidden="true"></i></button><?php
										}
									?>
    								</div>
    								<div class="form-group  mb-0 search_data">
        								<div class="serachdatadiv">
        									<ul id="results"></ul>
        									<span id="loading">Loading Please wait...</span>
        								</div>
    								</div>
    							</div>
    						</div>
    					</form>
    				</li>
                     <li class="navbar-left" aria-haspopup="true"><a href="<?php echo base_url(); ?>" class="active">Home</a>
                     </li>
                     <li class="navbar-left" aria-haspopup="true"><a href="#">About Us </a></li>
                     <!--<li aria-haspopup="true"><a href="widgets.html">Widgets</a></li>-->
                     <li class="navbar-left" aria-haspopup="true"><a href="#"> Contact Us <span class="hmarrow"></span></a></li>
                     <li class="navbar-left" aria-haspopup="true"><a href="<?php echo base_url(); ?>subscription"> Subscription <span class="hmarrow"></span></a></li>
                     <?php 
                        if(empty($this->session->userdata('email'))){?>
                     <li class="navbar-left" aria-haspopup="true"><a href="<?php echo base_url(); ?>signin">Login</a>
                     <li class="navbar-left" aria-haspopup="true"><a href="<?php echo base_url(); ?>signup">Register</a>
                        <?php 
                           }else{
                                ?>
                     <li class="navbar-left" aria-haspopup="true"><a href="<?php echo base_url(); ?>cart">cart</a>
                     <li class="navbar-left">
                        <div class="dropdown show">
                           <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
                           <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <a class="dropdown-item" href="<?php echo base_url(); ?>user-dashboard">Dashboard</a>
                              <a class="dropdown-item" href="<?php echo base_url(); ?>login/logout">Logout</a>
                           </div>
                        </div>
                     </li>
                     <?php
                        }?>
                     <li aria-haspopup="true" class="d-lg-none mt-5 pb-5 mt-lg-0">
                        <span><a class="btn btn-secondary" href="#">Post Property Ad</a></span>
                     </li>
                  </ul>
               </nav>
               <!--Nav-->
            </div>
         </div>
      </div>
      <!--/Horizontal-main -->
      <p id="demo"></p>
      <input type="hidden" name="baseUrl" id="baseUrl" value="<?php echo base_url();?>" >
      <!--Sthiddenart Section-->
      <?php 
         $urlPath = $_SERVER['REQUEST_URI'];
         $UrlPAthArray =  explode('/',$urlPath);
         if(in_array('signin',$UrlPAthArray) || in_array('signup',$UrlPAthArray) || in_array('payment',$UrlPAthArray) || in_array('subscription',$UrlPAthArray) || in_array('dashboard',$UrlPAthArray)){
         
         }else{
         	if(empty($this->session->userdata('email'))){
         		if(!empty($resultUser['visitor_expiry_time']) && ($resultUser['status'])==1){ ?>	
				  <div class="modal show" id="myModalcheckuserIp" aria-modal="true" style="padding-right: 15px; display: none;">
				  
					 <div class="modal-dialog modal-lg">
						<div class="modal-content">
						   <!-- Modal Header -->
						   <div class="modal-header mod-head-cls" style="background-color: #ed5151 !important;">
							  <h4 class="modal-title text-center" >Notification </h4>
							  <button type="button" class="close close-btn" data-dismiss="modal">×</button>
						   </div>
						   <!-- Modal body -->
						   <div class="modal-body">
							  <div class="row">
								 <div class="col-md-12">
									<p>We are sorry. Your session has been expired. Please purchase any of our plans to resume access to our data. Thank you 
									   &nbsp;&nbsp;&nbsp;
									   <a class="btn-link" href="#" data-toggle="modal" data-target="#myModalRegistration" onClick ="openRegistration();">Create an account</a>
									</p>
								 </div>
							  </div>
							  <!----------Login Div----------->
							  <div class="row">
								 <div class="card login-page my-4">
									<article class="card-body mx-auto" style="max-width: 350px;">
									   <h4 class="card-title mt-3 text-center">Sign in Account</h4>
									   <div class="col-md-12">
										  <?php
											 $this->load->helper('form');
											 $error = $this->session->flashdata('danger');
											 if($error){ ?>
												  <div class="alert alert-danger alert-dismissable">
													 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
													 <?php echo $this->session->flashdata('danger'); ?>                    
												  </div>
										  <?php } ?>
										  <?php  
											 $success = $this->session->flashdata('success');
											 if($success)
											 {
											 ?>
												  <div class="alert alert-success alert-dismissable">
													 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
													 <?php echo $this->session->flashdata('success'); ?>
												  </div>
										  <?php } ?>
										  <div class="row">
											 <div class="col-md-12">
												<?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
											 </div>
										  </div>
									   </div>
									   <p class="text-center">Get started with your account</p>
									   <p>
										  <a href="<?php echo $login_button;?>" class="btn btn-block btn-google"> <i class="fa fa-google"></i>   Login via Google</a>
										   <?php echo $facebook_login_url; ?>
										  <!--<a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>-->
									   </p>
									   <p class="divider-text">
										  <span class="bg-light">OR</span>
									   </p>
										<div class="alert alert-warning alert-dismissible fade show" role="alert" id="login-error" style="display:none;">
										Email and Password are invalid. Please try again with valid credentials
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
										</div>
									   <form id="my_form_login" action="" method="post" role="form" novalidate="" name="login-frm">
										  <div class="form-group input-group">
											 <div class="input-group-prepend">
												<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
											 </div>
											 <input id="login-email" name="email" class="form-control" placeholder="Email address" type="email" required="true">
										  </div>
										  <!-- form-group// -->
										  <div class="form-group input-group">
											 <div class="input-group-prepend">
												<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
											 </div>
											 <input id="login-pass" class="form-control" name="password" placeholder="Password" type="password" required="true">
										  </div>
										  <!-- form-group// -->
										  <div class="form-group">
											 <input type="submit" class="btn btn-primary btn-block" value="Sign In" name="sign-in" id="">
										  </div>
										  <!-- form-group// -->      
									   </form>
									</article>
								 </div>
								 <!-- card.// -->
							  </div>
						   </div>
						   <!-- Modal footer -->
						</div>
					 </div>
				  </div> <?php
				}
			}
        }
         ?>
		 
		 
		 
		   
		
		    <div class="modal show" id="myModalRegistration" aria-modal="true" style="display:none;">
					 <div class="modal-dialog">
						<div class="modal-content">
						   <!-- Modal Header -->
						   <div class="modal-header mod-head-cls" style="background-color: #ed5151 !important;">
							  <h4 class="modal-title text-center" >Registration </h4>
							  <button type="button" class="close close-btn" data-dismiss="modal">×</button>
						   </div>
						   <!-- Modal body -->
						   <div class="modal-body">
							 <!----------Login Div----------->
							  <div class="row">
								 <div class="card login-page my-4">
									<article class="card-body mx-auto" style="max-width: 350px;">
									   <h4 class="card-title mt-3 text-center">Create Account</h4>
										<div class="alert alert-warning alert-dismissible fade show" role="alert" id="reg-error-2" style="display:none;">
										This Email is already exists .Please try again this other Email Id
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
										</div>
										
										<div class="alert alert-primary alert-dismissible fade show" role="alert" id="reg-msg-1" style="display:none;">
										User has been added successfully. You can login with your valid credentials
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
										</div>
											
											<form id="my_form_registrattion" action="" method="post" role="form" novalidate="" name="register-frm">
											<div class="form-group input-group">
											<div class="input-group-prepend">
											<span class="input-group-text"> <i class="fa fa-user"></i> </span>
											</div>
											<input name="name" class="form-control" placeholder="Full name" type="text" required="true" id="fullname">
											</div> <!-- form-group// -->
											<div class="form-group input-group">
											<div class="input-group-prepend">
											<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
											</div>
											<input name="email" class="form-control" placeholder="Email address" type="email" required="true" id="reg-email">
											</div> <!-- form-group// -->

											<div class="form-group input-group">
											<div class="input-group-prepend">
											<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
											</div>
											<input class="form-control" name="password" placeholder="Create password" type="password" required="true" id="reg-password">
											</div> <!-- form-group// -->
											<div class="form-group input-group">
											<div class="input-group-prepend">
											<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
											</div>
											<input class="form-control" name="confirm_password" placeholder="Confirm password" type="password" required="true" id="reg-confirm-password">
											</div> <!-- form-group// -->  
											<p id="reg-error-passnomatch" style="display:none;">password and confirm password does not match</p>	
											<div class="form-group">
											<input  type="submit" class="btn btn-primary btn-block" name="reg-submit" value="Create Account">
											</div> <!-- form-group// -->      
											<p class="text-center"><b>Have an account?</b> <a href="#" data-toggle="modal" data-target="#myModalcheckuserIp"  onClick ="openLogin();" style="color: red;"><b>Log In</b></a> </p>                                                                
											</form>
									</article>
								 </div>
								 <!-- card.// -->
							  </div>
						   </div>
						   <!-- Modal footer -->
						</div>
					 </div>
				  </div> 