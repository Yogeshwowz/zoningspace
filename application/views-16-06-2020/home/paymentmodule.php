<style type="text/css">
   .pricing-table{min-height: 503px;}
   .pricing-table ul {list-style: none;padding: 0;}
   .pricing-table li {padding: 7px 0;}
   .pricing-table i.fa-times {color: #ff0000;padding-right: 10px;}
   .pricing-table i.fa-check {color: #00adf0;padding-right: 10px;}
   .pricing-table{background-color: #eeeeee50;font-family: 'Montserrat', sans-serif;}
   .pricing-table .block-heading {padding-top: 120px;margin-bottom: 40px;text-align: center;}
   .pricing-table .block-heading h2 {color: #3b99e0;}
   .pricing-table .block-heading p {text-align: center;max-width: 420px;margin: auto;opacity: 0.7;}
   .pricing-table .heading {text-align: center;padding-bottom: 10px;border-bottom: 1px solid rgba(0, 0, 0, 0.1);}
   .pricing-table .item {background-color: #ffffff;box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);border-top: 2px solid #5ea4f3;padding: 30px;
   overflow: hidden;position: relative;}
   .pricing-table .col-md-5:not(:last-child) .item {margin-bottom: 30px;}
   .pricing-table .item button {font-weight: 600;}
   .pricing-table .item:hover {transform: scale(1.02);transition: 0.7s;}
   .pricing-table .ribbon {width: 160px;height: 32px;font-size: 12px;text-align: center;color: #fff;font-weight: bold;box-shadow: 0px 2px 3px rgba(136, 136, 136, 0.25);
   background: #4dbe3b;transform: rotate(45deg);position: absolute;right: -42px;top: 20px;padding-top: 7px;}
   .pricing-table .item p {text-align: center;margin-top: 20px;opacity: 0.7;}
   .pricing-table .features .feature {font-weight: 600;}
   .pricing-table .features h4 {text-align: center;font-size: 18px;padding: 5px;}
   .pricing-table .price h4 {margin: 15px 0;font-size: 45px;text-align: center;color: #2288f9;}
   .pricing-table .buy-now button {text-align: center;margin: auto;font-weight: 600;padding: 9px 0;}
   .paymethod {padding: 50px 0;}
   .paymethod h2{color: #3b99e0;}
   .paymethod i {font-size: 60px;cursor: pointer;color: #007bff;}
   .paymethod i:hover{color: #0069d9;}

.float-left-cls
{
   float:left
}
.hide {display:none;}
</style>

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
               <h3>Stripe</h3>
            </div>
            <!--<div class="features">
               <ul>
               <li><i class="fa fa-times" aria-hidden="true"></i>Contrary to popular belief, Lorem Ipsum is not</li>
               <li><i class="fa fa-times" aria-hidden="true"></i>discovered the undoubtable source.</li>
               <li><i class="fa fa-times" aria-hidden="true"></i>The standard chunk of Lorem Ipsum used since</li>
               <li><i class="fa fa-times" aria-hidden="true"></i>It uses a dictionary of over 200 Latin words</li>
               <li><i class="fa fa-times" aria-hidden="true"></i>to generate Lorem Ipsum which looks reasonable</li>
               </ul>
               </div>-->
            <!--<div class="price"><h4>$25</h4></div>-->
            <!--<button class="btn btn-block btn-outline-primary pay" type="submit"  data-toggle="modal" data-target="#exampleModalCenter">BUY NOW</button>-->
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
            <!--<div class="features">
               <ul>
                 <li><i class="fa fa-check" aria-hidden="true"></i>Contrary to popular belief, Lorem Ipsum is not</li>
                 <li><i class="fa fa-check" aria-hidden="true"></i>discovered the undoubtable source.</li>
                 <li><i class="fa fa-times" aria-hidden="true"></i>The standard chunk of Lorem Ipsum used since</li>
                 <li><i class="fa fa-times" aria-hidden="true"></i>It uses a dictionary of over 200 Latin words</li>
                 <li><i class="fa fa-times" aria-hidden="true"></i>to generate Lorem Ipsum which looks reasonable</li>
               </ul>
               </div>-->
            <!--<div class="price"><h4>$50</h4></div>-->
            <!-- <button class="btn btn-block btn-primary pay" type="submit"  data-toggle="modal" data-target="#exampleModalCenter">BUY NOW</button>-->
            <div class="box2 colo-btn boxcls">
               <input type="radio" name="paymentMethod" autocomplete="off" class="radio-disable radiobtnpayment radio-active " value="paypal"> BUY NOW
            </div>
         </div>
      </div>
   </div>
   <div class="paymethod" style="display:none;" id="stripepaymethod">
      <!--<div class="row">
         <div class="col-md-3 text-center">
           <h2>Payment Methods</h2>
         </div>
         <div class="col-md-3 text-center"><i class="fa fa-cc-paypal" aria-hidden="true"></i></div>
         <div class="col-md-3 text-center"><i class="fa fa-credit-card" aria-hidden="true"></i></div>
         <div class="col-md-3 text-center"><i class="fa fa-cc-mastercard" aria-hidden="true"></i></div>
         </div>-->
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
                        <label class='control-label'>Subscription Plan</label> <input
                           class='form-control' id="subscriptionPlan" name="subscriptionPlan" size='50' 
                           type='text'  maxlength="30" readonly  value="<?php if(!empty($subplan)) { echo $subplanName; }?>">
                     </div>
                     <div class='col-xs-12 form-group required'>
                        <label class='control-label'>Name on Card</label> <input
                           class='form-control' id="userName" name="userName" size='50' type='text'  maxlength="30">
                     </div>
                  </div>
                   <div class='form-row row'>
                     <div class='col-xs-12 col-md-6 form-group card1 required'>
                        <label class='control-label'>Email</label> <input
                           autocomplete='off' class='form-control' type='email'  value="<?php if(!empty($this->session->userdata('email'))) { echo $this->session->userdata('email'); }?>" readonly name="emailId" >
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
                     
                     <div class='col-xs-12  col-md-6 form-group required'>
                        <label class='control-label'>Subscription Plan(Months) </label> 
                        <select id="subscriptionPlanMonth"  name="subscriptionPlanMonth" class='form-control'>
                           <?php 
                           for ($x = 1; $x <= 10; $x++) { ?>
                              <option value="<?php echo $x;?>"><?php echo $x;?></option>
                            <?php }
                        ?>
                        </select>
                     </div>
                     <div class='col-xs-12 col-md-6 form-group required'>
                        <label class='control-label'>Amount </label> <input readonly required
                           autocomplete='off' id="amount"  name="amount" class='form-control amount' value='<?php if(!empty($amount)) { echo $amount;}?>' type='text'>
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
                        <input type='hidden' name="paymentplan" value="<?php echo $this->uri->segment(2);?>">
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
</section>
