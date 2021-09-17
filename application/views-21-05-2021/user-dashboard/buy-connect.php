<div class="page-wrapper chiller-theme toggled">

<?php $this->view('user-dashboard/side-bar'); ?>

  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container">
      <h2 class="text-center">Buy Connects</h2>
	  <form action="<?php echo base_url();?>payment/buy" id="myForm" name="frmupload" method="post" >
					   <div class="form-group">
                           <label for="Upload">Buy Connects:</label>
                            <input type="text" class="form-control groupOfTexbox" id="amount" name="amount" required="">
							 
                        </div>
                       <input type="submit" class="btn btn-primary" name="buy-submit" value="Buy">
                      
                    </form>
      </div>
  </main>
  <!-- page-content" -->
</div>
