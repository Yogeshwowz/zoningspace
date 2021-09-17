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
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item"><a class="nav-link" href="#">OUR DATA</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">PRICING</a></li>
                  <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#login_popup" href="#">LOGIN</a></li>
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
                                 <a href="#" class="fb btn">
                                    <h5 class="m-0"><i class="fa fa-facebook"></i> Login with Facebook</h5>
                                 </a>
                              </form>
                           </div>
                           <div class="tab-pane active in" id="login_form">
                            <div class="alert alert-warning alert-dismissible" role="alert" id="login-error" style="display:none;">
										Email and Password are invalid. Please try again with valid credentials
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
										</div>
									   <form id="my_form_login" action="" method="post" role="form" novalidate="" name="login-frm">
										  <div class="form-group input-group">
											
											 <input id="login-email" name="email" class="form-control" placeholder="Email address" type="email" required="true">
										  </div>
										  <!-- form-group// -->
										  <div class="form-group input-group">
											 
											 <input id="login-pass" class="form-control" name="password" placeholder="Password" type="password" required="true">
										  </div>
										 <input type="submit" class="btn btn-primary btn-block" value="Sign In" name="sign-in">
										</form>
									
								 
                           </div>
                           <div class="tab-pane fade" id="register_form">
                             <article class="card-body mx-auto" style="max-width: 350px;">
									   <h4 class="card-title mt-3 text-center">Create Account</h4>
										<div class="alert alert-warning alert-dismissible" role="alert" id="reg-error-2" style="display:none;">
										This Email is already exists .Please try again this other Email Id
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
										</div>
										
										<div class="alert alert-primary alert-dismissible " role="alert" id="reg-msg-1" style="display:none;">
										User has been added successfully. You can login with your valid credentials
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
										</div>
											
											<form id="my_form_registrattion" action="" method="post" role="form" novalidate="" name="register-frm">
											<div class="form-group input-group">
											
											<input name="name" class="form-control" placeholder="Full name" type="text" required="true" id="fullname">
											</div> <!-- form-group// -->
											<div class="form-group input-group">
											
											<input name="email" class="form-control" placeholder="Email address" type="email" required="true" id="reg-email">
											</div> 
											<div class="form-group input-group">
											<input class="form-control" name="password" placeholder="Create password" type="password" required="true" id="reg-password">
											</div> 
											<div class="form-group input-group">
											<input class="form-control" name="confirm_password" placeholder="Confirm password" type="password" required="true" id="reg-confirm-password">
											</div> 
											<p id="reg-error-passnomatch" style="display:none;">password and confirm password does not match</p>	
											
											<input  type="submit" class="btn btn-primary login_btn" name="reg-submit" value="Create Account">
											 </form>
									</article>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <input type="hidden" id="baseUrl" name="baseUrl" value="<?php echo base_url();?>" >