<section class="banner-section d-flex align-items-center">
   <div class="container">
      <h2 class="pb-0 pt-3 pt-lg-0">Our platform provides customizable solutions for businesses of all sizes, meaning we have a solution for you today and as you grow.</h2>
      <div class="row align-items-end">
         <ul class="nav nav-tabs pricing_tab">
            <li><a class="active" href="#annual_payments" data-toggle="tab">Annual Payments</a></li>
            <li><a href="#monthly_payments" data-toggle="tab">Monthly Payments</a></li>
         </ul>
         <div class="col-lg-12">
            <div id="pricing_tab_div" class="tab-content">
               <div class="tab-pane active in" id="annual_payments">
                  <div class="row align-items-end">
                     <div class="col-lg-6 mb-3 mb-lg-0">
                        <div class="pricing_box">
                           <div class="pricing_box_img">
                              <img src="assets/img/indivisual.png">
                           </div>
                           <div class="pricing_box_header text-center pt-3">
                              <h5>Individuals</h5>
                              <h2>$2500</h2>
                              <span>
                                 <p>Individuals Annual Payments billed annually</p>
                              </span>
                           </div>
                           <p class="p_details">If you buy this subscription plan .we can provide 5000 connect. in which you can buy 5000 search records</p>
							<?php if(empty($this->session->userdata('user_id'))){ ?>
							<button  type="button" class="payments_btn" 
							data-toggle="modal"  data-target="#pricing-popup">Get Started</button><?php }else{?>
							<a href="<?php echo base_url();?>payment-method/<?php echo base64_encode('1');?>" class="payments_btn">Get Started</a>
							<?php } ?>
                        </div>
                     </div>
                     <div class="col-lg-6 mb-3 mb-lg-0">
                        <div class="pricing_box">
                           <div class="pricing_box_img">
                              <img src="assets/img/comp.png">
                           </div>
                           <div class="pricing_box_header text-center pt-3">
                              <h5>Companies</h5>
                              <h2>$3000</h2>
                              <span>
                                 <p>Companies Annual Payments, billed annually</p>
                              </span>
                           </div>
                           <p class="p_details">If you buy this subscription plan .we can provide 15000 connect. in which you can buy 15000 search records and you can create 3 members</p>
                          	<?php if(empty($this->session->userdata('user_id'))){ ?>
							<button  type="button" class="payments_btn" 
							data-toggle="modal"  data-target="#pricing-popup">Get Started</button><?php }else{?>
							<a href="<?php echo base_url();?>payment-method/<?php echo base64_encode('2');?>" class="payments_btn">Get Started</a>
							<?php } ?>

                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane" id="monthly_payments">
                  <div class="row">
                     <div class="col-lg-6 mb-3 mb-lg-0">
                        <div class="pricing_box">
                           <div class="pricing_box_img">
                              <img src="assets/img/indivisual.png">
                           </div>
                           <div class="pricing_box_header text-center pt-3">
                              <h5>Individuals</h5>
                              <h2>$400</h2>
                              <span>
                                 <p>Individuals per month, billed monthly</p>
                              </span>
                           </div>
                           <p class="p_details">If you buy this subscription plan .we can provide 500 connect. in which you can buy 500 search records</p>
                           <?php if(empty($this->session->userdata('user_id'))){ ?>
							<button  type="button" class="payments_btn" 
							data-toggle="modal"  data-target="#pricing-popup">Get Started</button><?php }else{?>
							<a href="<?php echo base_url();?>payment-method/<?php echo base64_encode('3');?>" class="payments_btn">Get Started</a>
							<?php } ?>
                        </div>
                     </div>
                     <div class="col-lg-6 mb-3 mb-lg-0">
                        <div class="pricing_box">
                           <div class="pricing_box_img">
                              <img src="assets/img/comp.png">
                           </div>
                           <div class="pricing_box_header text-center pt-3">
                              <h5>Business</h5>
                              <h2>$600</h2>
                              <span>
                                 <p>per user, per month, billed monthly</p>
                              </span>
                           </div>
                           <p class="p_details">If you buy this subscription plan .we can provide 1000 connect. in which you can buy 1000 search records and you can create 3 members</p>
                           	<?php if(empty($this->session->userdata('user_id'))){ ?>
							<button  type="button" class="payments_btn" 
							data-toggle="modal"  data-target="#pricing-popup">Get Started</button><?php }else{?>
							<a href="<?php echo base_url();?>payment-method/<?php echo base64_encode('4');?>" class="payments_btn">Get Started</a>
							<?php } ?>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div id="pricing-popup" class="modal fade" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header mod-head-cls">
            <h4 class="modal-title text-center">Notification </h4>
            <button type="button" class="close close-btn" data-dismiss="modal">×</button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row">
               <div class="col-md-12">
                 
				   <p>If you want to buy this package.Please <span class= "span-log login_popup_search">LOGIN</span> first 
                  </p>
               </div>
            </div>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>
</section>