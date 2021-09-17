<!--Start Section-->
<section class="mt-8">
	<div class="banner-1 cover-image sptb-2 sptb-tab bg-background2" data-image-src="<?php echo base_url();?>assets/images/banners/banner1.jpg">
		<div class="header-text mb-0">
			<div class="container">
				<div class="text-center text-white mb-7">
					<h1 class="mb-3">It's Officially a Buyers Market</h1>
					<p>Access DC's Entire Building Inventory by Zoning, Land Area and Other Advanced Characteristics.</p>
				</div>
			</div>
		</div>
	</div>
</section>	
		
<div class="" id="body-nav2">
<!---------------- Start Sections Part  -------------------->                    

        <div class="row py-4 drop-btn">         
            <div class="col-md-5 col-sm-5"></div>
            <div class="col-md-4  col-sm-4">
                            <div class="btn-group mx-auto">
                                <a class="sel-btn dropdown-toggle" data-toggle="dropdown">Step 1</a>
                                <div class="dropdown-menu sel-option">
                                    <a id="zipcodeId"  rel="zip" class="zipcodeCls dropdown-item" data-toggle="modal" data-target="#myModalZipCode">Zipcode(s)</a>
                                    <a  class="dropdown-item" data-toggle="modal" data-target="#myModalUse">Use(s)</a>
                                    <a  class="dropdown-item" rel="zoning" data-toggle="modal" data-target="#myModalZoning">Zoning(s)</a>
                                    <a  class="dropdown-item" data-toggle="modal" data-target="#myModalNeighborhood">Neighbourhood(s)</a> 
                                    <a  class="dropdown-item" data-toggle="modal" data-target="#myModalWard">Ward(s)</a> 
                                    <a  class="dropdown-item" data-toggle="modal" data-target="#myModalTaxDeduction">Homestead Tax Deduction(s)</a>
                                </div>
                            </div>
                        </div>
            <div class="col-md-3  col-sm-3"></div>
        </div>
             
        <div class="row py-4 drop-btn">      
            <div class="col-md-5  col-sm-5"></div>
            <div class="col-md-4  col-sm-4">
                            <div class="btn-group">
                                <a class="sel-btn dropdown-toggle nav-item nav-link" data-toggle="dropdown">Step 2</a>
                                <div class="dropdown-menu sel-option">
                                    <a class="form-check sub-heading checkbox-blue" id="listResults">
                                        <div class="row">
                                            Property Owned By Person
                                           
                                              <div class="custom-control form-control-lg custom-checkbox">  
                                                 <input type="checkbox" class="custom-control-input" value="person" name="propertyCheck[]" id="defaultCheckPerson">
                                                 <label class="custom-control-label" for="defaultCheckPerson"></label>
                                              </div>
                                           
                                        </div>
                                    </a>
                                    <a class="form-check checkbox-blue" id="listResults">
                                        <div class="row">
                                            Property Owned By Business
                                           
                                              <div class="custom-control form-control-lg custom-checkbox">  
                                                 <input type="checkbox" class="custom-control-input" value="business" name="propertyCheck[]" id="defaultCheckBusiness">
                                                 <label class="custom-control-label" for="defaultCheckBusiness"></label>
                                              </div>
                                           
                                        </div>
                                    </a>
                                    <a class="form-check sub-heading checkbox-blue" id="listResults">
                                        <div class="row">
                                            Property Owned By Government
                                           
                                              <div class="custom-control form-control-lg custom-checkbox">  
                                                 <input type="checkbox" class="custom-control-input" value="govt"  name="propertyCheck[]" id="defaultCheckGovernment">
                                                 <label class="custom-control-label" for="defaultCheckGovernment"></label>
                                              </div>
                                        
                                        </div>
                                    </a>
                                    <a class="form-check sub-heading checkbox-blue" id="listResults">
                                        <div class="row">
                                            Owns Multiple Properties 
                                          
                                              <div class="custom-control form-control-lg custom-checkbox">  
                                                 <input type="checkbox" class="custom-control-input" value="" id="defaultCheckMultipleProperties">
                                                 <label class="custom-control-label" for="defaultCheckMultipleProperties"></label>
                                              </div>
                                         
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
            <div class="col-md-3  col-sm3"></div>
        </div>
        
        <div class="row py-4 drop-btn">         
            <div class="col-md-5  col-sm-5"></div>
            <div class="col-md-4  col-sm-4">
                            <div class="btn-group mx-auto">
                                <a class="sel-btn dropdown-toggle" data-toggle="dropdown">Step 3</a>
                                <div class="dropdown-menu sel-option">
                                    <a  class="dropdown-item">
                                        <div class="box2">
                                            <input type="radio" name="selectRange" autocomplete="off" class="radio-disable selectRadioBtn radio-active" value="landRange"> Select Land Range
                                        </div>
                                    </a>
                                    <a  class="dropdown-item">
                                        <div class="box2">
                                            <input type="radio" name="selectRange" autocomplete="off" class="radio-disable selectRadioBtn radio-active" value="saleDate"> Select Sale Date
                                        </div>
                                    </a>
                                    <a  class="dropdown-item">
                                        <div class="box2">
                                             <input type="radio" name="selectRange" autocomplete="off" class="radio-disable selectRadioBtn radio-active" value="squareRange"> Select Square Range
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
            <div class="col-md-3  col-sm-3"></div>
        </div>
        
        <div class="row py-4 drop-btn">
            <div class="col-md-5  col-sm-5"></div>
            <div class="col-md-4  col-sm-4">
                            <div class="btn-group">
                                <a class="sel-btn dropdown-toggle nav-item nav-link" data-toggle="dropdown">Step 4</a>
                                <div class="dropdown-menu sel-option">
                                    <a  class="dropdown-item">
                                        <div class="box2" id="box7">
                                            <input type="radio" name="selectSortBy" autocomplete="off" class="radio-disable radiobtn radio-active" value="owername"> Owner Name
                                        </div>
                                    </a>
                                    <a  class="dropdown-item">
                                        <div class="box2" id="box10">
                                                <input type="radio" name="selectSortBy" autocomplete="off" class="radio-disable radiobtn"  value="zipcode"> Zip
                                        </div>
                                    </a>
                                    <a  class="dropdown-item">
                                        <div class="box2" id="box13">
                                            <input type="radio" name="selectSortBy" autocomplete="off" class="radio-disable radiobtn"  value="zoning">Zoning
                                        </div>
                                    </a> 
                                    <a  class="dropdown-item">
                                        <div class="box2" id="box14">
                                            <input type="radio" name="selectSortBy" autocomplete="off" class="radio-disable radiobtn"  value="neighborhood">Neighbourhood
                                        </div>
                                    </a> 
                                    <a  class="dropdown-item">
                                        <div class="box2" id="box15">
                                            <input type="radio" name="selectSortBy" autocomplete="off" class="radio-disable radiobtn"  value="ward">Ward
                                        </div>
                                    </a>
                                    <a  class="dropdown-item">                                    
                                        <div class="box2" id="box9">
                                            <input type="radio" name="selectSortBy" autocomplete="off" class="radio-disable radiobtn"  value="use">Use(s)
                                        </div>
                                    </a>
                                    <a  class="dropdown-item">
                                        <div class="box2" id="box12">
                                            <input type="radio" name="selectSortBy" autocomplete="off" class="radio-disable radiobtn"  value="tax_deduction">Homestead Tax Deduction
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
            <div class="col-md-3  col-sm-3"></div>
        </div>
        
<!---------------- End Sections Part  --------------------> 


<!----------------Section 3  -------------------->   
    <section class="sptb1 bg-white top-space1" id="advancedsearch">
       <div class="container">
          <div class="row">
             <div class="col-md-12">
    			<div class="row">
    			<div class="col-md-12">
    			  <div class="lrange" id="lrange">
                      <h5 class="sub-heading pt-5">Please Enter A Land Range Between 112 and 12919556</h5>
                      <div class="row pt-4">
                         <div class="col-md-5 col-sm-6">
                            <div class="form-group">
                               <input type="text" class="form-control numbervalidation" id="land_range_start" name="land_range_start" placeholder="Please Enter Start Land Range ">
                               <span class="error-cls" id="error_land_range_start" style="display:none;">Please enter value greater than 112</span>
                            </div>
                         </div>
                         <div class="col-md-1"></div>
                         <div class="col-md-5 col-sm-6">
                            <div class="form-group">
                               <input type="text" class="form-control numbervalidation" id="land_range_end" name="land_range_end" placeholder="Please Enter End Land Range ">
                               <span class="error-cls" id="error_land_range_end" style="display:none;">Please enter value greater than 112 and less than 12919556</span>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="drange" id="drange">
                      <h5 class="sub-heading pt-5">Please Enter A Sale Date Range Between 1900-01-01 and 2019-10-22</h5>
                      <div class="row pt-4">
                         <div class="col-md-5 col-sm-6">
                            <div class="form-group">
                               <input type="text" readonly="" class="form-control" id="from" name="fromSaleDate"  placeholder="" value="">
                            </div>
                         </div>
                         <div class="col-md-1"></div>
                         <div class="col-md-5 col-sm-6">
                            <div class="form-group">
                               <input type="text"  readonly="" class="form-control" id="to" name="toSaleDate" placeholder="">
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="srange" id="sranges">
                      <h5 class="sub-heading pt-5">Please Enter A Square Range Between 4 and 6277</h5>
                      <div class="row pt-4">
                         <div class="col-md-5 col-sm-6">
                            <div class="form-group">
                               <input type="text" class="form-control numbervalidation" id="square_start" name="square_start" placeholder="Please Enter A Start Square Value" >
                               <span class="error-cls" id="error_square_start" style="display:none;">Please enter square value greater than 4</span>
                            </div>
                         </div>
                         <div class="col-md-1"></div>
                         <div class="col-md-5 col-sm-6">
                            <div class="form-group">
                               <input type="text" class="form-control numbervalidation" id="square_end" name="square_end"  placeholder="Please Enter A End Square Value">
                               <span class="error-cls" id="error_square_end" style="display:none;">Please enter square value greater than 4 and less than 6277</span>
                            </div>
                         </div>
                      </div>
                   </div>
    			</div>
    			</div>
             </div>
          </div>
       </div>
    </section>
<!----------------Section 3 End -------------------->  
      
      
      
<!--Section-->
<section class="sptb1 bg-white top-space1" id="advancedsearch">
 <div class="container">
    <div class="row">
       <div class="col-12">
          <input  type="hidden" value="<?php echo base_url();?>" id="baseUrl">
          <div class="row">
             <div class="form-group form-group11">
                <div class="row advanbtn justify-content-center">
                   <div class="col-md-offset-2 col-md-4">
                      <?php 
                         if(!empty($resultUser['visitor_expiry_time']) && ($resultUser['status'])==1 && (empty($this->session->userdata('email')))){ ?>	
                      <button class="btn form-btn viewbtn" type="button"  data-toggle="modal" data-target="#paymentModalCenter">View Data</button>
                      <?php } else {?>
                      <input type="submit" class="btn form-btn viewbtn" name="submitBtn" value="View Data">
                      <?php } 
                         ?>
                   </div>
                   <div class="col-md-4">
                      <a href="<?php echo base_url();?>"><button type="button" class="btn form-btn">Clear All</button></a>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
</section>
<!--/Section-->

<!--Start PopUp Section-->
<div class="form-group form-group11">

<!--PopUp 1-->
    <div class="container">
        <div class="modal" id="myModalZipCode">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header mod-head-cls">
                       <h4 class="modal-title text-center">Choose Zipcode(s)</h4>
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                       <div class="row" id="zipcodeDiv">
                          <?php 
                             foreach($zip as $resultZip){ ?>
                          <div class="col-md-4">
                             <div class="form-check"><?php echo $resultZip["zipcode"];?>
                                <input name="zip[]" class="form-check-input caseZip" type="checkbox" value="<?php echo $resultZip["zipcode"];?>" id="defaultCheck1zip<?php echo $resultZip["zipid"];?>" >
                                <label class="form-check-label" for="defaultCheck1zip<?php echo $resultZip["zipid"];?>">            
                                </label>
                             </div>
                          </div>
                          <?php 
                             }
                             ?>
                       </div>
                    </div>
                    <div class="modal-footer">
                       <div class="row">
                          <div class="col-md-7">
                             <button type="button" class="btn form-btn" data-dismiss="modal" data-toggle="modal" data-target="#myModalUse">Move to screen 2</button>
                          </div>
                          <div class="col-md-5">
                             <button type="button" class="btn form-btn" id="clearZipbtn" rel="zip">Clear Filters</button>
                          </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--PopUp 2-->           
    <div class="container">
    <div class="modal" id="myModalUse">
      <div class="modal-dialog modal-dialog1">
         <div class="modal-content"> 
            <div class="modal-header mod-head-cls">
               <h4 class="modal-title text-center ">Choose Use(s)</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div> 
            <div class="modal-body">
               <div class="row" id="prousecodeDiv">
                  <?php 
                     foreach($pro_use as $resultUse){ ?>
                  <div class="col-md-6">
                     <div class="form-check"><?php echo $resultUse["pro_use"];?>
                        <input name="use[]" class="form-check-input caseProUse" type="checkbox" value="<?php echo $resultUse["pro_use"];?>" id="defaultCheckUse<?php echo $resultUse["id"];?>">
                        <label class="form-check-label" for="defaultCheckUse<?php echo $resultUse["id"];?>">            
                        </label>
                     </div>
                  </div>
                  <?php 
                     }
                     ?>
               </div>
            </div>
            <div class="modal-footer">
               <div class="row">
                  <div class="col-md-7">
                     <button type="button" class="btn form-btn" data-dismiss="modal" data-toggle="modal" data-target="#myModalZoning">Move to screen 3</button>
                  </div>
                  <div class="col-md-5">
                     <button type="button" class="btn form-btn" id="clearProUsebtn" rel="pro_use">Clear Filters</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
    </div>
</div>   

<!--PopUp 3-->
    <div class="container">
    <div class="modal" id="myModalZoning">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header mod-head-cls">
                   <h4 class="modal-title text-center">Choose Zoning(s)</h4>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                   <div class="row" id="zoningcodeDiv">
                      <?php 
                         foreach($zoning as $resultzZoning){ ?>
                      <div class="col-md-4">
                         <div class="form-check"><?php echo $resultzZoning["zoning"];?><input name="zoning[]" class="form-check-input caseZoning" type="checkbox" value="<?php echo $resultzZoning["zoning"];?>" id="defaultCheck1_zon<?php echo $resultzZoning["id"];?>">
                            <label class="form-check-label" for="defaultCheck1_zon<?php echo $resultzZoning["id"];?>">            
                            </label>
                         </div>
                      </div>
                      <?php 
                         }
                         ?>
                   </div>
                </div>
                <div class="modal-footer">
                   <div class="row">
                      <div class="col-md-7">
                         <button type="button" class="btn form-btn" data-dismiss="modal" 
                            data-toggle="modal" data-target="#myModalNeighborhood">Move to screen 4</button>
                      </div>
                      <div class="col-md-5">
                         <button type="button" class="btn form-btn" id="clearZoningbtn" rel="zoning">Clear Filters</button>
                      </div>
                   </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    
<!--PopUp 4-->
    <div class="container">
    <div class="modal" id="myModalNeighborhood">
      <div class="modal-dialog">
         <div class="modal-content"> 
            <div class="modal-header mod-head-cls">
               <h4 class="modal-title text-center">Choose Neighborhood(s)</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div> 
            <div class="modal-body">
               <div class="row" id="neighborhoodcodeDiv">
                  <?php 
                     foreach($neighborhood as $resultNeighborhood){ ?>
                  <div class="col-md-6">
                     <div class="form-check"><?php echo $resultNeighborhood["neighborhood"];?><input name="neighborhood[]" class="form-check-input caseNeighborhood" type="checkbox" value="<?php echo $resultNeighborhood["neighborhood"];?>" id="defaultCheck1_neighborhood<?php echo $resultNeighborhood["id"];?>">
                        <label class="form-check-label" for="defaultCheck1_neighborhood<?php echo $resultNeighborhood["id"];?>"> </label>
                     </div>
                  </div>
                  <?php 
                     }
                     ?>
               </div>
            </div>
            <div class="modal-footer">
               <div class="row">
                  <div class="col-md-7">
                     <button type="button" class="btn form-btn" data-dismiss="modal" data-toggle="modal" data-target="#myModalWard">Move to screen 5</button>
                  </div>
                  <div class="col-md-5">
                     <button type="button" class="btn form-btn" id="clearNeighborhoodbtn">Clear Filters</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
    </div>
</div> 
                                       
<!--PopUp 5-->                                      
    <div class="container">
    <div class="modal" id="myModalWard">
      <div class="modal-dialog modal-dialog2">
         <div class="modal-content"> 
            <div class="modal-header mod-head-cls">
               <h4 class="modal-title text-center">Choose Ward(s)</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div> 
            <div class="modal-body">
               <div class="row" id="wardcodeDiv">
                  <?php 
                     foreach($ward as $resultWard){ ?>
                  <div class="col-md-4">
                     <div class="form-check"><?php echo $resultWard["ward"];?><input name="ward[]" class="form-check-input form-check-input1 caseWard" type="checkbox" value="<?php echo $resultWard["ward"];?>" id="defaultCheck1_ward<?php echo $resultWard["id"];?>">
                        <label class="form-check-label" for="defaultCheck1_ward<?php echo $resultWard["id"];?>">            
                        </label>
                     </div>
                  </div>
                  <?php 
                     }
                        ?>
               </div>
            </div> 
            <div class="modal-footer">
               <div class="row">
                  <div class="col-md-7">
                     <button type="button" class="btn form-btn" data-dismiss="modal" data-toggle="modal" data-target="#myModalTaxDeduction">Move to screen 6</button>
                  </div>
                  <div class="col-md-5">
                     <button type="button" class="btn form-btn" id="clearWardbtn">Clear Filters</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
    </div>
</div> 
                                       
<!--PopUp 6-->                                       
    <div class="container">
        <div class="modal" id="myModalTaxDeduction">
          <div class="modal-dialog modal-dialog2">
                <div class="modal-content">
                        <div class="modal-header mod-head-cls">
                           <h4 class="modal-title text-center">Choose Ward(s)</h4>
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div> 
                    <div class="modal-body">
                       <div class="row" id="tax_deductioncodeDiv">
                          <?php 
                             foreach($tax_deduction as $resultTaxDeduction){ ?>
                          <div class="col-md-12">
                             <div class="form-check"><?php echo $resultTaxDeduction["tax_deduction"];?>
                                <input name="taxDeduction[]" class="form-check-input 
                                   form-check-input2 caseTaxDeduction" type="checkbox" value="<?php echo $resultTaxDeduction["tax_deduction"];?>" id="defaultCheck1_tax_deduction<?php echo $resultTaxDeduction["id"];?>">
                                <label class="form-check-label" for="defaultCheck1_tax_deduction<?php echo $resultTaxDeduction["id"];?>">            
                                </label>
                             </div>
                          </div>
                          <?php 
                             }
                             ?>
                       </div>
                    </div>
                    <div class="modal-footer">
                       <div class="row">
                          <div class="col-md-7">
                             <button type="button" class="btn form-btn" data-dismiss="modal">Move to Next screen </button>
                          </div>
                          <div class="col-md-5">
                             <button type="button" class="btn form-btn" id="clearTaxDeductionbtn">Clear Filters</button>
                          </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!--End PopUp Section-->

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
                  <p>Please login first for save search
                  </p>
               </div>
            </div>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>