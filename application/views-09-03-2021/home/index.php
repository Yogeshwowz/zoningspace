<section class="banner-section">
         <div class="container">
            <div class="text-center pt-2 pb-3">
               <h2 class="m-0">The City's Complete Property Inventory</h2>
               <p class="m-0">Searchable By Parameters That Are Important to Investors.</p>
            </div>
            <div class="row">
               <div class="col-lg-4">
                  <div class="banner_box">
                     <h4 class="m-0">Insightful Property Lists</h4>
                     <p class="py-1 m-0">Discover All Property Within District That Fits Your Parameters Contact Owners Directly.</p>
                  </div>
                  <div class="banner_ani_box">
                     <img class="dokachar img-fluid" src="assets/img/banner-bg-img.png">
                     <div class="bbox1 hide-cls boxcls" rel="1">
                        <div class="main_box2">
                           <img class="img-fluid pin_icon animated bounceIn a3 d2 ease-out-quart" src="assets/img/pin-icon.svg">
                           <img class="img-fluid pin_icon animated bounceIn a3 d4 ease-out-quart" src="assets/img/pin-icon.svg">
                           <img class="img-fluid pin_icon animated bounceIn a3 d-1 ease-out-quart" src="assets/img/pin-icon.svg">
                           <img class="img-fluid pin_icon animated bounceIn a3 d-2 ease-out-quart" src="assets/img/pin-icon.svg">
                           <a href="#" class="animated bounceIn d-2 ease-out-quart hide_text">MU4 Properties </a>                                
                        </div>
                     </div>
                     <div class="bbox2 hide-cls boxcls" rel="0">
                        <div class="main_box2 mx-auto">
                           <img class="img-fluid pin_icon animated bounceIn a3 d2 ease-out-quart" src="assets/img/pin-icon.svg">
                           <img class="img-fluid pin_icon animated bounceIn a3 d4 ease-out-quart" src="assets/img/pin-icon.svg">
                           <img class="img-fluid pin_icon animated bounceIn a3 d-1 ease-out-quart" src="assets/img/pin-icon.svg">
                           <img class="img-fluid pin_icon animated bounceIn a3 d-2 ease-out-quart" src="assets/img/pin-icon.svg">
                           <a href="#" class="animated bounceIn d-2 ease-out-quart hide_text">Single Family Land Use </a>
                        </div>
                     </div>
                     <div class="bbox3 hide-cls boxcls" rel="0">
                        <div class="main_box2">
                           <img class="img-fluid pin_icon animated bounceIn a3 d2 ease-out-quart" src="assets/img/pin-icon.svg">
                           <img class="img-fluid pin_icon animated bounceIn a3 d4 ease-out-quart" src="assets/img/pin-icon.svg">
                           <img class="img-fluid pin_icon animated bounceIn a3 d-1 ease-out-quart" src="assets/img/pin-icon.svg">
                           <img class="img-fluid pin_icon animated bounceIn a3 d-2 ease-out-quart" src="assets/img/pin-icon.svg">
                           <a href="#" class="animated bounceIn d-2 ease-out-quart hide_text">MU4+ Single Family Land Use</a>                                
                        </div>
                     </div>
                     <div class="bbox4 hide-cls boxcls" rel="0">
                        <div class="main_box2 mx-auto">
                           <img class="img-fluid pin_icon animated bounceIn a3 d2 ease-out-quart" src="assets/img/pin-icon.svg">
                           <img class="img-fluid pin_icon animated bounceIn a3 d4 ease-out-quart" src="assets/img/pin-icon.svg">
                           <img class="img-fluid pin_icon animated bounceIn a3 d-1 ease-out-quart" src="assets/img/pin-icon.svg">
                           <img class="img-fluid pin_icon animated bounceIn a3 d-2 ease-out-quart" src="assets/img/pin-icon.svg">
                           <a href="#" class="animated bounceIn d-2 ease-out-quart hide_text">Land Area Between 3000 And 5000 Square Feet</a>
                        </div>
                     </div>
                  </div>
               </div>
             
			    <div class="col-lg-8 z_100 pt-3 pt-lg-0">
				 <form  target="_blank" action="<?php echo base_url()?>view-data" method="post">
                  <div class="row">
                     <div class="col-md-3">
                        <button type="button" id="zoningId" rel="zoning" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#myModalZoning">Zoning</button>
                     </div>
                     <div class="col-md-3">
                        <button type="button" id="selectUseId" rel="selectUse" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#myModalUse">Land Use</button>
                     </div>
                     <div class="col-md-3">
                        <button id="zipcodeId" rel="zip" type="button" class="btn form-btn zipcodeCls common-select-cls" data-toggle="modal" data-target="#myModalZipCode">Zip Code</button>
                     </div>
                     <div class="col-md-3">
                        <button type="button" id="divlandRange" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#land_area">Land Area</button>
                     </div>
                     <div class="col-md-3">
                        <button type="button" id="selectNeighbourhoodId" rel="selectNeighbourhood" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#myModalNeighborhood">Neighborhood(s)</button>
                     </div>
                     <div class="col-md-3">
                        <button type="button" id="selectWardId" rel="selectWard" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#myModalWard">Ward(s)</button>
                     </div>
                     <div class="col-md-3">
                        <button type="button" id="selectTaxDeductionId" rel="selectTaxDeduction" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#myModalTaxDeduction">Homestead Tax Deduction(s)</button>
                     </div>
                     <div class="col-md-3">
                        <button type="button" id="divsaleDate" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#last_sale_date">Last Sale Date</button>
                     </div>
                  </div>
                  <div class="row py-2">
                     <div class="col-xl-9 col-lg-9">
                        <div class="search-background bg-transparent w-100">
                           <div class="form row">
                              <div class="col-md-2 col-3">
                                 <span>Within</span>
                              </div>
                              <div class="col-md-3 col-6 px-md-0">
                                 <input type="text" name="miles" class="search-mile form-control numberdecimalcls" placeholder="Enter miles" />
                              </div>
                              <div class="col-md-1 col-3">
                                 <span>From</span>
                              </div>
                              <div class="col-md-6 location-search">
                                 <input class="form-control input-lg autocompletegoogleaddress" id="autocomplete" name="searchboxForAddress" placeholder="Enter your address" onFocus="geolocate()" value="" type="text" />
								<input type="hidden" name="lat"  id="lat" >
								<input type="hidden" name="lng"  id="lng" >
								<input type="hidden" name="place_id"  id="place_id" >
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-4">
                        <div class="box2 filterbtn m-0" id="view_add_filter">
                           <input type="radio" name="selectRange" autocomplete="off" class="radio-disable selectRadioBtn radio-active text-white" value="squareRange" /> View Additionals Filters
                           <span class="pl-2"><i class="fa fa-sort-desc filter-icon" aria-hidden="true"></i></span>
                        </div>
                     </div>
                  </div>
                  <div  class="hide"  id="additionals_filters">
                     <div class="row animated slideInDown a4 ease-out-quart">
                        <!---------------------------------- Start View Additional Filters Buttons-------------------->
                        <div class="col-md-4">
                           <button type="button" id="saleprice" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#sale_price">Sale Price</button>
                        </div>
                        <div class="col-md-4">
                           <button type="button" id="taxablevalue" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#taxable_value">Taxable Value</button>
                        </div>
                        <div class="col-md-4">
                           <button type="button" id="entercount" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#count">Count</button>
                        </div>
                        <div class="col-md-4">
                           <button type="button" id="squarefeet" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#square_feet">Square Feet</button>
                        </div>
                        <div class="col-md-4">
                           <button type="button" id="pricepersquarefeet" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#price_per_square_feet">Price Per Square Feet</button>
                        </div>
                        <div class="col-md-4">
                           <button type="button" id="yearrenovated" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#year_renovated">Year Renovated</button>
                        </div>
                        <div class="col-md-4">
                           <button type="button" id="yearbuilt" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#year_built">Year Built</button>
                        </div>
                        <!---------------------------------- Add Drop Down Box-------------------->
                        <div class="col-md-4 mar-bot">
						<select class="form-control select2-show-search border-bottom-0" data-placeholder="Select Beds" name="beds">
						<?php if(empty($postData['beds'])) { ?><option value="0"  selected>Beds</option><?php } else {?><option value="0" ><?php } ?>
						<?php for($i=1; $i <=20; $i++){?>
							<option value="<?php echo $i;?>" <?php if(!empty($postData['beds'])) { if($postData['beds']==$i) { echo "selected";} } ?>><?php echo $i;?></option><?php 
						}?>
					</select>
						   
                        </div>
                        <div class="col-md-4 mar-bot">
							<select class="form-control select2-show-search border-bottom-0" data-placeholder="Select Bath" name="bath">
							<?php if(empty($postData['bath'])) { ?><option value="0"  selected>Baths</option><?php } else {?><option value="0" ><?php } ?>
							<?php for($i=1; $i <=20; $i++){?>
							<option value="<?php echo $i;?>" <?php if(!empty($postData['bath'])) { if($postData['bath']==$i) { echo "selected";} } ?>><?php echo $i;?></option><?php 
							}?>
							</select>
                        </div>
                        <!--------------------- End Here------------------------------------>
                     </div>
                  </div>
                  <div class="row pt-2">
                     <div class="form-check sub-heading col-md-6 col-sm-6 checkbox-blue">
                        <div class="row">
                           <div class="col-10 text-align-left">Property Owned By Person</div>
                           <div class="col-1">
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" value="person" name="propertyCheck[]" id="defaultCheckPerson" />
                                 <label class="custom-control-label" for="defaultCheckPerson"></label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-check sub-heading col-md-6 col-sm-6 checkbox-blue">
                        <div class="row">
                           <div class="col-10 text-align-left">Property Owned By Business</div>
                           <div class="col-1">
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" value="business" name="propertyCheck[]" id="defaultCheckBusiness" />
                                 <label class="custom-control-label" for="defaultCheckBusiness"></label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-check sub-heading col-md-6 col-sm-6 checkbox-blue">
                        <div class="row">
                           <div class="col-10 text-align-left">Property Owned By Government</div>
                           <div class="col-1">
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" value="govt" name="propertyCheck[]" id="defaultCheckGovernment" />
                                 <label class="custom-control-label" for="defaultCheckGovernment"></label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-check sub-heading col-md-6 col-sm-6 checkbox-blue">
                        <div class="row">
                           <div class="col-10 text-align-left">Owns Multiple Properties</div>
                           <div class="col-1">
                              <div class="custom-control custom-checkbox">
                                 <input type="checkbox" class="custom-control-input" value="property_owns_multiple" id="defaultCheckMultipleProperties" name="property_owns_multiple" />
                                 <label class="custom-control-label" for="defaultCheckMultipleProperties"></label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row pt-2 justify-content-center">
                     <div class="col-md-3">
                        
						<input type="hidden"  name="mappage" value="1">
						  <input type="submit" class="btn form-btn viewbtn" name="submitBtn" value="View Data">
                     </div>
                     <div class="col-md-3">
                        <a href="<?php echo base_url();?>"><button type="button" class="btn form-btn clear_all">Clear All</button></a>
                     </div>
                  </div>
				  
	   <!--Start PopUp Section-->
      <div class="form-group form-group11 mb-0" id="filter_popup">
         <!--PopUp 1-->
         <div class="container">
            <div class="modal" id="myModalZipCode">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header mod-head-cls">
                        <h4 class="modal-title text-center">Choose Zipcode(s)</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                     </div>
                     <div class="modal-body">
                        <div class="row" id="zipcodeDiv">
                          <?php foreach($zip as $resultZip){ ?>
								  <div class="col-md-4">
									 <div class="form-check"><?php echo $resultZip["zipcode"];?>
										<input name="zip[]" class="form-check-input caseZip"  type="checkbox" value="<?php echo $resultZip["zipcode"];?>" id="defaultCheck1zip<?php echo $resultZip["zipid"];?>"  <?php if(!empty($postData['zip'])) { if(in_array($resultZip["zipcode"], $postData['zip'])) { echo "checked";} } ?> >
										<label class="form-check-label" for="defaultCheck1zip<?php echo $resultZip["zipid"];?>">            
										</label>
									 </div>
								  </div><?php 
                             }?>
                       </div>
					 </div>
                     <div class="modal-footer">
                        <div class="row w-100">
                           <div class="col-md-4"></div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn" id="clearZipbtn" rel="zip">Clear Filters</button>
                           </div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn model-next-cls enter-cls" data-dismiss="modal">
                              Enter<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                              </button>
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
                        <h4 class="modal-title text-center">Choose Use(s)</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                     </div>
                     <div class="modal-body">
                        <div class="row" id="prousecodeDiv">
							<?php  foreach($pro_use as $resultUse){ ?>
								  <div class="col-md-6">
									 <div class="form-check"><?php echo $resultUse["pro_use"];?>
										<input name="use[]" class="form-check-input caseProUse" type="checkbox" value="<?php echo $resultUse["pro_use"];?>" id="defaultCheckUse<?php echo $resultUse["id"];?>"  <?php if(!empty($postData['use'])) { if(in_array($resultUse["pro_use"], $postData['use'])) { echo "checked";} } ?>>
										<label class="form-check-label" for="defaultCheckUse<?php echo $resultUse["id"];?>">            
										</label>
									 </div>
								  </div><?php 
							} ?>
					</div>
					 </div>
                     <div class="modal-footer">
                        <div class="row w-100">
                           <div class="col-md-4"></div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn" id="clearProUsebtn" rel="pro_use">Clear Filters</button>
                           </div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn model-next-cls 
							  enter-cls" data-dismiss="modal" data-dismiss="modal" >
                              Enter<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                              </button>
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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                     </div>
                     <div class="modal-body">
							<div class="row" id="zoningcodeDiv">
								<?php 
								 foreach($zoning as $resultzZoning){ ?>
									<div class="col-md-4">
										<div class="form-check">
										<?php echo $resultzZoning["zoning"];?><input name="zoning[]" class="form-check-input caseZoning" 	type="checkbox" value="<?php echo $resultzZoning["zoning"];?>" id="defaultCheck1_zon<?php echo $resultzZoning["id"];?>"   <?php if(!empty($postData['zoning'])) { if(in_array($resultzZoning["zoning"], $postData['zoning'])) { echo "checked";} } ?>>
											<label class="form-check-label" for="defaultCheck1_zon<?php 	echo $resultzZoning["id"];?>">            
											</label>
										</div>
									</div><?php 
								}?>
							</div>
					 </div>
                     <div class="modal-footer">
                        <div class="row w-100">
                           <div class="col-md-4"></div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn" id="clearZoningbtn" rel="zoning">Clear Filters</button>
                           </div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn model-next-cls enter-cls" data-dismiss="modal" data-dismiss="modal">
                              Enter<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--PopUp 4-->
         <div class="container">
            <div class="modal" id="land_area">
               <div class="modal-dialog modal-dialog2">
                  <div class="modal-content">
                     <div class="modal-header mod-head-cls">
                        <h4 class="modal-title text-center">Please Enter A Land Area</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input type="text" class="form-control numbervalidation" id="land_range_start" name="land_range_start" placeholder="Min" value="" />
                                 <span class="error-cls" id="error_land_range_start" style="display: none;">Please enter value greater than 112</span>
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input type="text" class="form-control numbervalidation" id="land_range_end" name="land_range_end" placeholder="Max" value="" />
                                 <span class="error-cls" id="error_land_range_end" style="display: none;">Please enter value greater than start land range and less than 12919556</span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <div class="row w-100">
                           <div class="col-md-4"></div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn" id="clearland_rangebtn">Clear Filters</button>
                           </div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn model-next-cls enter-cls" data-dismiss="modal" data-dismiss="modal">
                              Enter<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--PopUp 5-->
         <div class="container">
            <div class="modal" id="myModalNeighborhood">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header mod-head-cls">
                        <h4 class="modal-title text-center">Choose Neighborhood(s)</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                     </div>
                     <div class="modal-body">
						<div class="row" id="neighborhoodcodeDiv">
							<?php foreach($neighborhood as $resultNeighborhood){ ?>
								<div class="col-md-6">
								<div class="form-check"><?php echo $resultNeighborhood["neighborhood"];?><input name="neighborhood[]" class="form-check-input caseNeighborhood" type="checkbox" value="<?php echo $resultNeighborhood["neighborhood"];?>" id="defaultCheck1_neighborhood<?php echo $resultNeighborhood["id"];?>"   <?php if(!empty($postData['neighborhood'])) { if(in_array($resultNeighborhood["neighborhood"], $postData['neighborhood'])) { echo "checked";} } ?>>
								<label class="form-check-label" for="defaultCheck1_neighborhood<?php echo $resultNeighborhood["id"];?>"> </label>
								</div>
								</div><?php 
							} ?>
						</div>
					 </div>
                     <div class="modal-footer">
                        <div class="row w-100">
                           <div class="col-md-4"></div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn" id="clearNeighborhoodbtn">Clear Filters</button>
                           </div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn model-next-cls enter-cls" data-dismiss="modal" data-dismiss="modal">
                              Enter<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--PopUp 6-->
         <div class="container">
            <div class="modal" id="myModalWard">
               <div class="modal-dialog modal-dialog2">
                  <div class="modal-content">
                     <div class="modal-header mod-head-cls">
                        <h4 class="modal-title text-center">Choose Ward(s)</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                     </div>
                     <div class="modal-body">
						<div class="row" id="wardcodeDiv">
						<?php  foreach($ward as $resultWard){ ?>
								<div class="col-md-4">
									<div class="form-check"><?php echo $resultWard["ward"];?><input name="ward[]" class="form-check-input form-check-input1 caseWard" type="checkbox" value="<?php echo $resultWard["ward"];?>" id="defaultCheck1_ward<?php echo $resultWard["id"];?>"  <?php if(!empty($postData['ward'])) { if(in_array($resultWard["ward"], $postData['ward'])) { echo "checked";} } ?>>
									<label class="form-check-label" for="defaultCheck1_ward<?php echo $resultWard["id"];?>">            
									</label>
									</div>
								</div><?php 
							} ?>
						</div>
					 </div>
                     <div class="modal-footer">
                        <div class="row w-100">
                           <div class="col-md-4"></div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn" id="clearWardbtn">Clear Filters</button>
                           </div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn model-next-cls enter-cls" data-dismiss="modal" data-dismiss="modal">
                              Enter<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--PopUp 7-->
         <div class="container">
            <div class="modal" id="myModalTaxDeduction">
               <div class="modal-dialog modal-dialog2">
                  <div class="modal-content">
                     <div class="modal-header mod-head-cls">
                        <h4 class="modal-title text-center">Select Homestead Tax Deduction(s)</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                     </div>
                     <div class="modal-body">
                         <div class="row" id="tax_deductioncodeDiv">
                          <?php foreach($tax_deduction as $resultTaxDeduction){ ?>
								  <div class="col-md-12">
									 <div class="form-check"><?php echo $resultTaxDeduction["tax_deduction"];?>
										<input name="taxDeduction[]" class="form-check-input 
										   form-check-input2 caseTaxDeduction" type="checkbox" value="<?php echo $resultTaxDeduction["tax_deduction"];?>" id="defaultCheck1_tax_deduction<?php echo $resultTaxDeduction["id"];?>"    <?php if(!empty($postData['taxDeduction'])) { if(in_array($resultTaxDeduction["tax_deduction"], $postData['taxDeduction'])) { echo "checked";} } ?>>
										<label class="form-check-label" for="defaultCheck1_tax_deduction<?php echo $resultTaxDeduction["id"];?>">            
										</label>
									 </div>
								  </div><?php 
                             } ?>
                       </div>
                     </div>
                     <div class="modal-footer">
                        <div class="row w-100">
                           <div class="col-md-4"></div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn" id="clearTaxDeductionbtn">Clear Filters</button>
                           </div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn model-next-cls enter-cls" data-dismiss="modal" data-dismiss="modal">
                              Enter<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--PopUp 8-->
         <div class="container">
            <div class="modal" id="last_sale_date">
               <div class="modal-dialog modal-dialog2">
                  <div class="modal-content">
                     <div class="modal-header mod-head-cls">
                        <h4 class="modal-title text-center">Please Enter A Sale Date Range</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input readonly type="text" class="form-control" id="from" name="fromSaleDate" placeholder="Start Date" autocomplete="off" />
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input readonly type="text" class="form-control" id="to" name="toSaleDate" placeholder="End Date" autocomplete="off" />
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <div class="row w-100">
                           <div class="col-md-4"></div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn" id="clearTaxDeductionbtn">Clear Filters</button>
                           </div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn model-next-cls enter-cls" data-dismiss="modal">
                              Enter<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--PopUp 9-->
         <div class="container">
            <div class="modal" id="sale_price">
               <div class="modal-dialog modal-dialog2">
                  <div class="modal-content">
                     <div class="modal-header mod-head-cls">
                        <h4 class="modal-title text-center">Please Enter Sale Price Range</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input type="text" class="form-control numbervalidation" id="sale_price_start" name="sale_price_start" placeholder="Min" value="" />
                                 <span class="error-cls" id="error_sale_price_start" style="display: none;">Enter Start Sale Price</span>
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input type="text" class="form-control numbervalidation" id="sale_price_end" name="sale_price_end" placeholder="Max" value="" />
                                 <span class="error-cls" id="error_sale_price_end" style="display: none;">Enter End Sale Price</span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <div class="row w-100">
                           <div class="col-md-4"></div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn" id="clearsale_pricebtn">Clear Filters</button>
                           </div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn model-next-cls enter-cls" data-dismiss="modal">
                              Enter<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--PopUp 10-->
         <div class="container">
            <div class="modal" id="taxable_value">
               <div class="modal-dialog modal-dialog2">
                  <div class="modal-content">
                     <div class="modal-header mod-head-cls">
                        <h4 class="modal-title text-center">Please Enter Taxable Value Range</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input type="text" class="form-control numbervalidation" id="taxable_value_start" name="taxable_value_start" placeholder="Enter Start Taxable Value" value="" />
                                 <span class="error-cls" id="error_taxable_value_start" style="display: none;">Enter Start Taxable Value</span>
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input type="text" class="form-control numbervalidation" id="taxable_value_end" name="taxable_value_end" placeholder="Enter End Taxable Value" value="" />
                                 <span class="error-cls" id="error_taxable_value_end" style="display: none;">Enter End Taxable Value</span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <div class="row w-100">
                           <div class="col-md-4"></div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn" id="cleartaxable_valuebtn">Clear Filters</button>
                           </div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn model-next-cls enter-cls" data-dismiss="modal">
                              Enter<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--PopUp 11-->
         <div class="container">
            <div class="modal" id="count">
               <div class="modal-dialog modal-dialog2">
                  <div class="modal-content">
                     <div class="modal-header mod-head-cls">
                        <h4 class="modal-title text-center">Please Enter Number of Units Range</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input type="text" class="form-control numbervalidation" id="count_start" name="count_start" placeholder="Number of Units" value="" />
                                 <span class="error-cls" id="error_count_start" style="display: none;">Number of Units</span>
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input type="text" class="form-control numbervalidation" id="count_end" name="count_end" placeholder="Number of Units" value="" />
                                 <span class="error-cls" id="error_count_end" style="display: none;">Number of Units</span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <div class="row w-100">
                           <div class="col-md-4"></div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn" id="clearcountbtn">Clear Filters</button>
                           </div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn model-next-cls enter-cls" data-dismiss="modal">
                              Enter<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--PopUp 12-->
         <div class="container">
            <div class="modal" id="square_feet">
               <div class="modal-dialog modal-dialog2">
                  <div class="modal-content">
                     <div class="modal-header mod-head-cls">
                        <h4 class="modal-title text-center">Please Enter Square Feet Range</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input type="text" class="form-control numbervalidation" id="square_feet_start" name="square_feet_start" placeholder="Enter Start Square Feet" value="" />
                                 <span class="error-cls" id="error_square_feet_start" style="display: none;">Enter Start Square Feet</span>
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input type="text" class="form-control numbervalidation" id="square_feet_end" name="square_feet_end" placeholder="Enter End Square Feet" value="" />
                                 <span class="error-cls" id="error_square_feet_end" style="display: none;">Enter End Square Feet</span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <div class="row w-100">
                           <div class="col-md-4"></div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn" id="clearsquare_feetbtn">Clear Filters</button>
                           </div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn model-next-cls enter-cls" data-dismiss="modal">
                              Enter<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--PopUp 13-->
         <div class="container">
            <div class="modal" id="price_per_square_feet">
               <div class="modal-dialog modal-dialog2">
                  <div class="modal-content">
                     <div class="modal-header mod-head-cls">
                        <h4 class="modal-title text-center">Please Enter Price Per Square Feet Range</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input type="text" class="form-control numbervalidation" id="price_per_square_feet_start" name="price_per_square_feet_start" placeholder="Min" value="" />
                                 <span class="error-cls" id="error_price_per_square_feet_start" style="display: none;">Enter Start Price Per Square Feet</span>
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input type="text" class="form-control numbervalidation" id="price_per_square_feet_end" name="price_per_square_feet_end" placeholder="Max" value="" />
                                 <span class="error-cls" id="error_price_per_square_feet_end" style="display: none;">Enter End Price Per Square Feet</span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <div class="row w-100">
                           <div class="col-md-4"></div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn" id="clearprice_per_square_feetbtn">Clear Filters</button>
                           </div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn model-next-cls enter-cls" data-dismiss="modal">
                              Enter<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--PopUp 14-->
         <div class="container">
            <div class="modal" id="year_renovated">
               <div class="modal-dialog modal-dialog2">
                  <div class="modal-content">
                     <div class="modal-header mod-head-cls">
                        <h4 class="modal-title text-center">Please Enter Year Renovated Range</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input type="text" class="form-control numbervalidation" id="year_renovated_start" name="year_renovated_start" placeholder="Min" value="" />
                                 <span class="error-cls" id="error_year_renovated_start" style="display: none;">Enter Start Year Renovated</span>
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input type="text" class="form-control numbervalidation" id="year_renovated_end" name="year_renovated_end" placeholder="Max" value="" />
                                 <span class="error-cls" id="error_year_renovated_end" style="display: none;">Enter End Year Renovated</span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <div class="row w-100">
                           <div class="col-md-4"></div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn" id="clearyear_renovatedbtn">Clear Filters</button>
                           </div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn model-next-cls enter-cls" data-dismiss="modal">
                              Enter<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--PopUp 15-->
         <div class="container">
            <div class="modal" id="year_built">
               <div class="modal-dialog modal-dialog2">
                  <div class="modal-content">
                     <div class="modal-header mod-head-cls">
                        <h4 class="modal-title text-center">Please Enter Year Built Range</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input maxlength="4" type="text" class="form-control numbervalidation" id="year_built_start" name="year_built_start" placeholder="Min" value="" />
                                 <span class="error-cls" id="error_year_built_start" style="display: none;">Enter Start Year Built</span>
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input maxlength="4" type="text" class="form-control numbervalidation" id="year_built_end" name="year_built_end" placeholder="Max" value="" />
                                 <span class="error-cls" id="error_year_built_end" style="display: none;">Enter End Year Built</span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <div class="row w-100">
                           <div class="col-md-4"></div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn" id="clearyear_builtbtn">Clear Filters</button>
                           </div>
                           <div class="col-md-4">
                              <button type="button" class="btn form-btn model-next-cls enter-cls" data-dismiss="modal">
                              Enter<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--End PopUp Section-->
				  </form>
               </div>
            
			</div>
         
		 </div>
     </section>