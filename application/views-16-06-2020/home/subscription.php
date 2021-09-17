 <style type="text/css">
.pricing-table{padding-bottom: 30px;}
.pricing-table ul {list-style: none;padding: 0;}
.pricing-table li {padding: 7px 0;}
.pricing-table i.fa-times {color: #ff0000;padding-right: 10px;}
.pricing-table i.fa-check {color: #00adf0;padding-right: 10px;}
.pricing-table{background-color: #eeeeee50;font-family: 'Montserrat', sans-serif;}
.pricing-table .block-heading {padding-top: 50px;margin-bottom: 40px;text-align: center;}
.pricing-table .block-heading h2 {color: #3b99e0;}
.pricing-table .block-heading p {text-align: center;max-width: 420px;margin: auto;opacity: 0.7;}
.pricing-table .heading {text-align: center;padding-bottom: 10px;border-bottom: 1px solid rgba(0, 0, 0, 0.1);}
.pricing-table .item {background-color: #ffffff;box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);border-top: 2px solid #5ea4f3;padding: 30px;
  overflow: hidden;position: relative;}
.pricing-table .col-md-5:not(:last-child) .item {margin-bottom: 30px;}
.pricing-table .item button {font-weight: 600;}
.pricing-table .item:hover {transform: scale(1.02);transition: 0.7s;}
.pricing-table .ribbon {width: 160px;height: 32px;font-size: 12px;text-align: center;color: #fff;font-weight: bold;box-shadow: 0px 2px 3px rgba(136, 136, 136, 0.25);background: #4dbe3b;transform: rotate(45deg);position: absolute;right: -42px;top: 20px;padding-top: 7px;}
.pricing-table .item p {text-align: center;margin-top: 20px;opacity: 0.7;}
.pricing-table .features .feature {font-weight: 600;}
.pricing-table .features h4 {text-align: center;font-size: 18px;padding: 5px;}
.pricing-table .price h4 {margin: 15px 0;font-size: 45px;text-align: center;color: #2288f9;}
.pricing-table .buy-now button {text-align: center;margin: auto;font-weight: 600;padding: 9px 0;}
.paymethod {padding: 50px 0;}
.paymethod h2{color: #3b99e0;}
.paymethod i {font-size: 60px;cursor: pointer;color: #007bff;}
.paymethod i:hover{color: #0069d9;}
.pricing-table:hover {box-shadow: none;}
 </style>
 <section class="pricing-table">
        <div class="container">
            <div class="block-heading">
              <h2>Pricing Table</h2>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-5 col-lg-4">
                    <div class="item">
                        <div class="heading">
                            <h3>View Data</h3>
                        </div>
                        <div class="features">
                            <ul>
                                <li><i class="fa fa-check" aria-hidden="true"></i>Search the Data </li>
                                <li><i class="fa fa-check" aria-hidden="true"></i>View Data </li>
                            <li><i class="fa fa-times" aria-hidden="true"></i>Download the Spreadsheet</li>
                            <li><i class="fa fa-times" aria-hidden="true"></i>Owner Contact Information</li>
                            <!--<li><i class="fa fa-times" aria-hidden="true"></i>The standard chunk of Lorem Ipsum used since</li>
                            <li><i class="fa fa-times" aria-hidden="true"></i>It uses a dictionary of over 200 Latin words</li>
                            <li><i class="fa fa-times" aria-hidden="true"></i>to generate Lorem Ipsum which looks reasonable</li>-->
                          </ul>
                        </div>
                        <div class="price"><h4>$25</h4></div>
                        <?php if(empty($this->session->userdata('email'))){ ?>
                            <button class="btn btn-block btn-outline-primary pay" type="submit"  data-toggle="modal" data-target="#paymentModalCenter">BUY NOW</button>
                      <?php  } else {?>
                       <!-- <a href="<?php echo base_url(); ?>payment/<?php echo base64_encode('1')?>"><button class="btn btn-block btn-outline-primary pay" type="submit"  data-toggle="modal" data-target="#exampleModalCenter">BUY NOW</button></a>-->
						<a href="<?php echo base_url(); ?>signin"> <button class="btn btn-block btn-primary pay" type="submit">BUY NOW</button></a>
                        <?php } ?>
                        </div>
                    
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="item">
                       
                        <div class="heading">
                            <h3>View Data + Download</h3>
                        </div>
                        <div class="features">
                            <ul>
                                <li><i class="fa fa-check" aria-hidden="true"></i>Search the Data </li>
                              <li><i class="fa fa-check" aria-hidden="true"></i>View Data</li>
                              <li><i class="fa fa-check" aria-hidden="true"></i>Download the Spreadsheet</li>
                              <li><i class="fa fa-times" aria-hidden="true"></i>Owner Contact Information</li>
                              <!--<li><i class="fa fa-times" aria-hidden="true"></i>The standard chunk of Lorem Ipsum used since</li>
                              <li><i class="fa fa-times" aria-hidden="true"></i>It uses a dictionary of over 200 Latin words</li>
                              <li><i class="fa fa-times" aria-hidden="true"></i>to generate Lorem Ipsum which looks reasonable</li>-->
                            </ul>
                        </div>
                        <div class="price"><h4>$50</h4></div>
                         <?php if(empty($this->session->userdata('email'))){ ?>
                          <button class="btn btn-block btn-primary pay" type="submit"  data-toggle="modal" data-target="#paymentModalCenter">BUY NOW</button>
                         <?php }else{?>
                       <!--<a href="<?php echo base_url(); ?>payment/<?php echo base64_encode('2')?>"> <button class="btn btn-block btn-primary pay" type="submit"  data-toggle="modal" data-target="#exampleModalCenter">BUY NOW</button></a>-->
					    <a href="<?php echo base_url(); ?>signin"> <button class="btn btn-block btn-primary pay" type="submit">BUY NOW</button></a>
                     <?php } ?>
                    </div>
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="item">
                        <div class="heading">
                            <h3>View Data + Download + Contact Information</h3>
                        </div>
                        <div class="features">
                            <ul>
                                <li><i class="fa fa-check" aria-hidden="true"></i>Search the Data </li>
                              <li><i class="fa fa-check" aria-hidden="true"></i>View data </li>
                              <li><i class="fa fa-check" aria-hidden="true"></i>Download the Spreadsheet</li>
                              <li><i class="fa fa-check" aria-hidden="true"></i>Owner contact information</li>
                              <!--<li><i class="fa fa-check" aria-hidden="true"></i>It uses a dictionary of over 200 Latin words</li>
                              <li><i class="fa fa-check" aria-hidden="true"></i>to generate Lorem Ipsum which looks reasonable</li>-->
                            </ul>
                        </div>
                        <div class="price"><h4>$150</h4></div>
                        <?php if(empty($this->session->userdata('email'))){ ?>
                            <button class="btn btn-block btn-primary pay" type="submit"  data-toggle="modal" data-target="#paymentModalCenter">BUY NOW</button>
                         <?php }else{?>
                        <!--<a href="<?php echo base_url(); ?>payment/<?php echo base64_encode('3')?>"><button class="btn btn-block btn-outline-primary pay" type="submit"  data-toggle="modal" data-target="#exampleModalCenter">BUY NOW</button></a>-->
						<a href="<?php echo base_url(); ?>signin"> <button class="btn btn-block btn-primary pay" type="submit">BUY NOW</button></a>
                      <?php } ?>
                    </div>
                </div>
            </div>
          <!--<div class="paymethod">
              <div class="row">
                <div class="col-md-3 text-center">
                  <h2>Payment Methods</h2>
                </div>
                <div class="col-md-3 text-center"><i class="fa fa-cc-paypal" aria-hidden="true"></i></div>
                <div class="col-md-3 text-center"><i class="fa fa-credit-card" aria-hidden="true"></i></div>
                <div class="col-md-3 text-center"><i class="fa fa-cc-mastercard" aria-hidden="true"></i></div>
              </div>
          </div>-->
        </div>
    </section>


        <div id="paymentModalCenter" class="modal fade" role="dialog">
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
                          <p>Please login first for subscription plan
                          </p>
                        
                      </div>
                      </div>
                    </div>
                       <!-- Modal footer -->
                       
                    </div>
                  </div>
                </div>