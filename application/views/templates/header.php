<?php $url= explode('/',$_SERVER['REQUEST_URI']); ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
      <title>Zoning Space</title>
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css" />
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/tachyons-animate.css" />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css" />
   </head>
   <body>
      <nav class="navbar navbar-expand-md main-nav" id="header">
         <div class="container">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">
            <img class="logo-white" src="<?php echo base_url(); ?>assets/img/logo-white.png" />
            <img class="logo-blue" src="<?php echo base_url(); ?>assets/img/logo-blue.png" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
            <img class="logo-white" src="<?php echo base_url(); ?>assets/img/toggle-white.svg">
            <img class="logo-blue" src="<?php echo base_url(); ?>assets/img/toggle-blue.svg">
            </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav ml-auto" id="ui-div">
                  <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>">Home</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Our Data</a></li>
                  <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>pricing">Pricing</a></li>
				  <?php if(empty($this->session->userdata('user_id'))){ ?>
					<li class="nav-item" id="login-li"><a class="nav-link" data-toggle="modal" data-target="#login_popup" href="#">Login</a></li><?php }?>
					<?php if(!empty($this->session->userdata('user_id'))){ ?>
					<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>dashboard">My Account</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>logout">Logout</a></li><?php }?>
               </ul>
            </div>
         </div>
      </nav>
	  <!-- Login Modal -->
      <div class="modal fade" id="login_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-body p-0">
                  <div class="user_forms d-flex flex-column justify-content-center align-items-center">
                     <div class="user_forms_body">
                        <button type="button" class="close close_form" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                        </button>
                        <ul class="nav nav-tabs">
                           <li><a href="#social_form" data-toggle="tab">SOCIAL</a></li>
                           <li  class="active"><a class="active" href="#login_form" data-toggle="tab">LOGIN</a></li>
                           <li><a href="#register_form" data-toggle="tab">REGISTER</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                           <div class="tab-pane fade" id="social_form">
                              <form >
                                 <h6 class="text-center pb-3">SOCIAL PROFILES</h6>
                                 <a href="#" class="google btn">
                                    <h5 class="m-0"><i class="fa fa-google-plus"></i> Login with Google+</h5>
                                 </a>
                                 <!--<a href="#" class="fb btn">-->
                                 <!--   <h5 class="m-0"><i class="fa fa-facebook"></i> Login with Facebook</h5>-->
                                 <!--</a>-->
                              </form>
                           </div>
                           <div class="tab-pane active in" id="login_form">
                              <form  class="logincls123" id="login-frm" method="POST" action="" role="form" novalidate="">
							  <div  id="login-form-warning" class="alert alert-warning alert-dismissible  hidecls" role="alert">
									<span class="alert-icon"><i class="ni ni-like-2"></i></span>
									<span class="alert-text">Invaild Email and Password .Please try again</span>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								
								
								
									<input class="mb-2" type="email" name="login_email" placeholder="Email" required="true" id="login_email">
                                    <input class="mb-2" type="password" name="login_password" id="login_password" placeholder="Password" required="true">
                                    <div class="float-right">
                                        <p id="forget-p-btn">Forget Your Password?</p>
                                    </div>
                                   
									 <input  type="submit" class="login_btn main-btn1" value="Login" name="login-submit" >
									<?php 
									if($url[2]=='') { $logintype='1';}
									else if(in_array('search-view-data',$url)) { $logintype ='2';}else{$logintype='';}
									?>
									 <input type="hidden" class="mb-2" id="login-type" name="login-type"  value="<?php if(isset($logintype)) { echo $logintype;}?>"> 
                              </form>
							  <form  class="hidecls" id="forgot-frm" method="POST" action="" role="form" novalidate="">
								<div  id="forgot-form-warning" class="alert alert-warning alert-dismissible  hidecls" role="alert">
									<span class="alert-icon"><i class="ni ni-like-2"></i></span>
									<span class="alert-text">Invaild Email.Please try again</span>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div  id="forgot-form-success" class="alert alert-success alert-dismissible hidecls" role="alert">
								<span class="alert-icon"><i class="ni ni-like-2"></i></span>
								<span class="alert-text">Password has been update.New password has been send on register  Email</span>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								</button>
								</div>
									<input class="mb-2" type="email" name="forgot_email" placeholder="Email" required  id="forgot_email">
									<div class="float-right">
                                        <p id="login-p-btn">Login?</p>
                                    </div>
                                   <input  type="submit" class="login_btn main-btn1" value="Forgot" name="forgot-submit" >
								</form>
							  
							  
							  
							  
                           </div>
                           <div class="tab-pane fade" id="register_form">
								<div  id="reg-form-success" class="alert alert-success alert-dismissible hidecls" role="alert">
								<span class="alert-icon"><i class="ni ni-like-2"></i></span>
								<span class="alert-text">Thank You for Registration. Please verify using the link sent to your email and login with your Credentails!</span>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								</button>
								</div>
								<div  id="reg-form-warning" class="alert alert-warning alert-dismissible  hidecls" role="alert">
								<span class="alert-icon"><i class="ni ni-like-2"></i></span>
								<span class="alert-text">This Email is alreadly exist in database .Please try other email id</span>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
								</div>
                              <form role="form" novalidate="" id="register-frm" method="POST" action="" >
								<input id="reg-name" name="reg-name" class="mb-2" placeholder="Full name" type="text" autocomplete="off" required>
								<input id="reg-email" name="reg-email" class="mb-2" placeholder="Email address" type="email" autocomplete="off" required>
								<input class="mb-2" id="reg-password" name="reg-password" placeholder="Create password" type="password" autocomplete="off" required>
								
								<input class="mb-2" id="confirm_password" name="confirm_password" placeholder="Confirm password" type="password" autocomplete="off" required>
								<span style="display:none;" class="error-p">password and confirm password does not match</span>
                               <input  type="submit" class="btn btn-primary btn-block" value="Create Account" name="reg-submit" >
							   <?php 
								if($url[2]=='') { $regtype='1';}
								else if(in_array('search-view-data',$url)) { $regtype ='2';}else{$regtype='';}
							   ?>
							   <input type="hidden" class="mb-2" id="reg-type" name="reg-type"  value="<?php if(isset($regtype)) { echo $regtype;}?>">
							  </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
	  <input type="hidden" id="baseUrl" name="baseUrl" value="<?php echo base_url();?>" >
	  <input type="hidden" id="usersessionid" name="usersessionid" value="<?php echo $this->session->userdata('user_id');?>" >