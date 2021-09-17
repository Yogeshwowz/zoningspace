<div class="page-wrapper chiller-theme toggled">

<?php $this->view('user-dashboard/side-bar'); ?>

  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container">
     <section class="pricing-table">
   <div class="container">
   <div class="block-heading">
      <h2>Payment Method</h2>
   </div>
   <div class="row justify-content-md-center">
      <div class="col-md-12">
         <div class="item active">
            <div class="heading">
               <h3>Debit/Credit Card</h3>
            </div>
         
            <div class="box2 colo-btn boxcls">
               <input type="radio" name="paymentMethod" autocomplete="off" class="radio-disable radiobtnpayment radio-active" value="stripe"> BUY NOW
            </div>
         </div>
      </div>
      
   </div>
   <div class="paymethod" style="display:block;" id="stripepaymethod">
     
      <div class="row">
         <div class="col-md-12">
               <form role="form" action="<?php echo base_url(); ?>stripePayment" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="<?php echo $this->config->item('stripe_key') ?>" id="payment-form">
                  <div class='form-row row py-3'>
                     <div class='col-md-12 form-group required'>
                        <label class='control-label'>Name on Card</label> <input
                           required class='form-control' id="userName" name="userName" size='50' type='text'  maxlength="30">
                     </div>
                     <div class='col-md-6 form-group card1 required'>
                        <label class='control-label'>Email</label> <input
                          required  autocomplete='off' class='form-control' type='email'  value="<?php if(!empty($this->session->userdata('email'))) { echo $this->session->userdata('email'); }?>"  name="emailId" >
                     </div>
                  
                     <div class='col-md-6 form-group card1 required'>
                        <label class='control-label'>Card Number</label> <input
                          required  autocomplete='off' class='form-control card-number' size='20'
                           type='text'  maxlength="16">
                     </div>
                     <div class='col-md-4 form-group expiration required'>
                        <label class='control-label'>Expiration Month</label> <input
                           required class='form-control card-expiry-month' placeholder='MM' size='2'
                           type='text' maxlength="2">
                     </div>
                     <div class='col-md-4 form-group expiration required'>
                        <label class='control-label'>Expiration Year</label> <input
                           required class='form-control card-expiry-year' placeholder='YYYY' size='4'
                           type='text' maxlength="4">
                     </div>
                     <div class='col-md-4 form-group cvc required'>
                        <label class='control-label'>CVC</label> <input autocomplete='off'
                           required class='form-control card-cvc' placeholder='ex. 311' size='4'
                           type='text'>
                     </div>
                     <div class='col-md-12 form-group required'>
                        <label class='control-label'>Amount  </label><input readonly 
                           autocomplete='off' id="amount"  name="amount" class='form-control amount1s' value='$<?php echo $amount?>'>
						   <input  type="text" id="packageamount"  name="packageamount" class='form-control' value='<?php echo $amount?>'>
                     </div>
                     <div class='col-md-12 error form-group hide'>
                        <div class='alert-danger alert'>Please correct the errors and try
                           again.
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12">
                        <button class="btn pay_btn" type="submit">Pay Now</button>
                     </div>
                  </div>
               </form>
         </div>
      </div>
   </div>
   
   
  
   </div>
   
</section>

	  
      </div>
  </main>
  <!-- page-content" -->
</div>