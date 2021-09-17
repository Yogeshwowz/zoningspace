<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/mysql/payment-method.css">
<?php  
$subplan = base64_decode($this->uri->segment(2)); 
if($subplan==1){ $subplanName = 'View Data';  $amount =25;}
if($subplan==2){ $subplanName = 'View Data + Download';  $amount =50;}
if($subplan==3){ $subplanName = 'View Data + Download + Contact Information';  $amount =150;}
?>
<section class="pricing-table">
   <div class="container">
   <div class="block-heading">
      <h2>Payment Method</h2>
   </div>
   <div class="row justify-content-md-center">
      <div class="col-md-6 col-lg-4">
         <div class="item">
            <div class="heading">
               <h3>Debit/Credit Card</h3>
            </div>
         
            <div class="box2 colo-btn boxcls">
               <input type="radio" name="paymentMethod" autocomplete="off" class="radio-disable radiobtnpayment radio-active" value="stripe"> BUY NOW
            </div>
         </div>
      </div>
      <div class="col-md-6 col-lg-4">
         <div class="item">
            <div class="heading">
               <h3>Paypal</h3>
            </div>
       
            <div class="box2 colo-btn boxcls">
               <input type="radio" name="paymentMethod" autocomplete="off" class="radio-disable radiobtnpayment radio-active " value="paypal"> BUY NOW
            </div>
         </div>
      </div>
   </div>
   <div class="paymethod" style="display:none;" id="stripepaymethod">
     
      <div class="row">
         <div class="col-md-12">
            <div class="col-md-2 float-left-cls" ></div>
            <div class="col-md-7 float-left-cls">
               <form role="form" action="<?php echo base_url(); ?>stripePost" method="post" class="require-validation"
                  data-cc-on-file="false"
                  data-stripe-publishable-key="<?php echo $this->config->item('stripe_key') ?>"
                  id="payment-form">
                  <div class='form-row row'>
                    
                     <div class='col-xs-12 form-group required'>
                        <label class='control-label'>Name on Card</label> <input
                           class='form-control' id="userName" name="userName" size='50' type='text'  maxlength="30">
                     </div>
                  </div>
                   <div class='form-row row'>
                     <div class='col-xs-12 col-md-6 form-group card1 required'>
                        <label class='control-label'>Email</label> <input
                           autocomplete='off' class='form-control' type='email'  value="<?php if(!empty($this->session->userdata('email'))) { echo $this->session->userdata('email'); }?>"  name="emailId" >
                     </div>
                  
                     <div class='col-xs-12 col-md-6 form-group card1 required'>
                        <label class='control-label'>Card Number</label> <input
                           autocomplete='off' class='form-control card-number' size='20'
                           type='text'  maxlength="16">
                     </div>
                  </div>
                  <div class='form-row row'>
                     <div class='col-xs-12 col-md-4 form-group expiration required'>
                        <label class='control-label'>Expiration Month</label> <input
                           class='form-control card-expiry-month' placeholder='MM' size='2'
                           type='text' maxlength="2">
                     </div>
                     <div class='col-xs-12 col-md-4 form-group expiration required'>
                        <label class='control-label'>Expiration Year</label> <input
                           class='form-control card-expiry-year' placeholder='YYYY' size='4'
                           type='text' maxlength="4">
                     </div>
                     <div class='col-xs-12 col-md-4 form-group cvc required'>
                        <label class='control-label'>CVC</label> <input autocomplete='off'
                           class='form-control card-cvc' placeholder='ex. 311' size='4'
                           type='text'>
                     </div>
                  </div>
                  <div class='form-row row'>
                     
                    
                     <div class='col-xs-12 col-md-6 form-group required'>
                        <label class='control-label'>Amount </label> <input readonly required
                           autocomplete='off' id="amount"  name="amount" class='form-control amount' value='<?php if(!empty($_POST['totalamount'])) { echo $_POST['totalamount'];}?>' type='text'>
						   <input  type="hidden" id="searchid"  name="searchid" class='form-control searchid' value='<?php if(!empty($_POST['searchid'])) { echo json_encode($_POST['searchid']);}?>'>
						   <input  type="hidden" id="subscription"  name="subscription" class='form-control subscription' value='<?php if(!empty($_POST['subscription'])) { echo json_encode($_POST['subscription']);}?>'>
						   
						    <input  type="hidden" id="packageamount"  name="packageamount" class='form-control packageamount' value='<?php if(!empty($_POST['packageamount'])) { echo json_encode($_POST['packageamount']);}?>'>
                     </div>
                  </div>
                   
                  <div class='form-row row'>
                     <div class='col-md-12 error form-group hide'>
                        <div class='alert-danger alert'>Please correct the errors and try
                           again.
                        </div>
                     </div>
                  </div>
                 
                  <div class="row">
                     <div class="col-xs-12">
                        
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                     </div>
                  </div>
               </form>
            </div>
            <div class="col-md-3 float-left-cls">
            </div>
         </div>
      </div>
   </div>
   
   <!----- PayPal------ Div----->
   
   
   <div class="paymethod" style="display:none;" id="paypalpaymethod">
     
      <div class="row">
         <div class="col-md-12">
            <div class="col-md-2 float-left-cls" ></div>
			<form role="form" action="<?php echo base_url(); ?>paypal/payment" method="post"  id="paypal-payment-form">
            <div class="col-md-7 float-left-cls">
               <div class='form-row row'>
                     <div class='col-xs-12 col-md-6 form-group required'>
                        <label class='control-label'>Amount </label> <input 
                           autocomplete='off' id="amount"  name="amount" class='form-control amount' value='<?php if(!empty($_POST['totalamount'])) { 
						   //echo $_POST['totalamount'];
						   
						     echo  str_replace(',', '', $_POST['totalamount']);
						   }?>' type='text'>
						   <input  type="text" id="searchid"  name="searchid" class='form-control searchid' value='<?php if(!empty($_POST['searchid'])) { echo json_encode($_POST['searchid']);}?>'>
						   <input  type="text" id="subscription"  name="subscription" class='form-control subscription' value='<?php if(!empty($_POST['subscription'])) { echo json_encode($_POST['subscription']);}?>'>
						   
						    <input  type="text" id="packageamount"  name="packageamount" class='form-control packageamount' value='<?php if(!empty($_POST['packageamount'])) { echo json_encode($_POST['packageamount']);}?>'>
                     </div>
                  </div>
                 
            </div>
            
            </form>
            </div>
            <div class="col-md-3 float-left-cls">
            </div>
         </div>
      </div>
   </div>
</section>
