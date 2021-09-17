<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style type="text/css">
    .login-page{
        margin-top: 118px;
    }

.btn-facebook {
    background-color: #405D9D;
    color: #fff;
}
.btn-twitter {
    background-color: #42AEEC;
    color: #fff;
}
</style>

<div class="container">

<hr>

<div class="card bg-light login-page">
<article class="card-body mx-auto" style="max-width: 400px;">
     <h4 class="card-title mt-3 text-center">Sign In Account</h4>
    <div class="col-md-12">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('danger');
                    if($error)
                    {
                ?>
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
	

	<p class="text-center">Get started with your free account</p>
	<p>
         
       <a href="<?php echo $login_button;?>" class="btn btn-block btn-google"> <i class="fa fa-google"></i>   Login via Google</a>
		 
		 <?php echo $facebook_login_url; ?>
		<!--<a href="" class="btn btn-block btn-facebook"> <i class="fa fa-facebook"></i>   Login via facebook</a>-->
	</p>
	<p class="divider-text">
        <span class="bg-light">OR</span>
    </p>
	<form name="login-frm" method="POST" action="<?php echo base_url(); ?>signin">
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" placeholder="Email address" type="email">
    </div> <!-- form-group// -->

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" name="password" placeholder="Password" type="password">
    </div> <!-- form-group// -->
                                     
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Sign In  </button>
    </div> <!-- form-group// -->      
                                                                     
</form>
<a class="signbtn" href="<?php echo base_url();?>signup">Create an account</a>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->

<br>
<br>
</article>