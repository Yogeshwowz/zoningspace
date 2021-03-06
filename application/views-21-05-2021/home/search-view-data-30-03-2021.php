<section class="View-listing">
	<div class="down_loader" id="loading" style="display:none;">
                <div class="loader_icon">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="loader_text">Please Wait Start Downloading</div>
            </div>
         <div class="container">
            <button class="open_filter">Filters <i class="fa fa-sliders pl-1" aria-hidden="true"></i></button>
			<div id="add_to_cart_div" >
            
			<?php if(empty($this->session->userdata('user_id'))){ ?>
			<button  type="button" class="add_to_cart" 
			data-toggle="modal" id="add_to_cart_btn" data-target="#add-to-cart-popup">Buy Search</button>
			<button  type="button" id="save-search-popup-btn" data-toggle="modal" data-target="#save-search-popup" class="save_search">Save This Search</button><?php }else{ 
			if(!empty($usersInformation['subscription'])){?>
				<button  type="button" class="add_to_cart" id="add_to_cart_subscription">Buy Search</button><?php 
				} else { ?>
				<a  class="add_to_cart"  href="<?php echo base_url();?>pricing">Buy Search</a>
			<?php } ?>
			<button type="button" id="save-search-model-id" data-toggle="modal" data-target="#save-search-model-popup" class="save_search">Save This Search</button>
			<?php } ?>
			
			</div>
			<div class="search_filter_list" >
                <h6>Search Filters</h6>
				<div id="search_filter_list">
				<?php 
				if(!empty($postData['zoning'])){
				foreach($postData['zoning'] as $z){?>
					<div class="remove-zoning-div csf">
					<input style="display:none;" name="zoning-d[]" rel="<?php echo $z;?>" class="zoning-d">
					 <?php echo $z;?>
					   <span aria-hidden="true" class="remove-zoning" rel="<?php echo $z;?>">×</span>
					</div><?php }
				}	
				?>
               <?php 
				if(!empty($postData['use'])){
				foreach($postData['use'] as $use){?>
					<div class="remove-use-div csf">
					<input style="display:none;" name="use-d[]" rel="<?php echo $use;?>" class="use-d">
					 <?php echo $use;?>
					   <span aria-hidden="true" class="remove-use" rel="<?php echo $use;?>">×</span>
					</div><?php }
				}	
				?>
				 <?php 
				if(!empty($postData['zip'])){
				foreach($postData['zip'] as $zip_code){?>
					<div class="remove-zip-div csf">
					<input style="display:none;" name="zip-d[]" rel="<?php echo $zip_code;?>" class="zip-d">
					 <?php echo $zip_code;?>
					   <span aria-hidden="true" class="remove-zip" rel="<?php echo $zip_code;?>">×</span>
					</div><?php }
				}	
				?>
				<?php if(!empty($postData['land_range_start']) && !empty($postData['land_range_end'])) {?>
				<div class="remove-additionals-filters-div csf landareacls">
				Land Area Range:<br><?php echo $postData['land_range_start'];?>-<?php echo $postData['land_range_end'];?><span aria-hidden="true" class="remove-landarea">×</span>
				</div><?php } ?>
            </div>
            </div>
            <div class="filter_sidebar"></div>
			<h6>Select a Record and add it to your cart. When you've chosen what you need, go to your cart to pay by card and instantly download the data!</h6>
			<p>You can SAVE you search list of all records available for this county below. You may also explore Washington County to browse fields and properties.</p>
			<form role="form" action="<?php echo base_url();?>search-view-data" method="post" id="search-form">
			
			<!------ Hidden Filed------------->
			<input type="text" name="allcount" id="allcount" value="">
			<input type="text" name="connects" id="connects" value="<?php if(!empty($usersInformation['connects'])){ echo $usersInformation['connects']; }?>">
			<input type="text" name="radio_search_hidden" id="radio_search_hidden" value="2">
			<input type="text" name="Chkallcount" id="Chkallcount" value="">
			<!--------- End Here------------------------------------>
			
			<section class="search_result_page">
 
            <div class="filter_sidebar_body non-active">
			
                    <span class="close_filter"><i class="fa fa-times" aria-hidden="true"></i></span>
                    <h4>Search Filters</h4>
                    <div class="row">
                         <div class="col-md-12">
                            <button type="button" id="zoningId" rel="zoning" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#myModalZoning" data-backdrop="static" data-keyboard="false">Zoning</button>
                         </div>
                         <div class="col-md-12">
                            <button type="button" id="selectUseId" rel="selectUse" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#myModalUse">Land Use</button>
                         </div>
                         <div class="col-md-12">
                            <button id="zipcodeId" rel="zip" type="button" class="btn form-btn zipcodeCls common-select-cls" data-toggle="modal" data-target="#myModalZipCode">Zip Code</button>
                         </div>
                         <div class="col-md-12">
                            <button type="button" id="divlandRange" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#land_area">Land Area</button>
                         </div>
                         <div class="col-md-12">
                            <button type="button" id="selectNeighbourhoodId" rel="selectNeighbourhood" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#myModalNeighborhood">Neighborhood(s)</button>
                         </div>
                         <div class="col-md-12">
                            <button type="button" id="selectWardId" rel="selectWard" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#myModalWard">Ward(s)</button>
                         </div>
                         <div class="col-md-12">
                            <button type="button" id="selectTaxDeductionId" rel="selectTaxDeduction" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#myModalTaxDeduction">Homestead Tax Deduction(s)</button>
                         </div>
                         <div class="col-md-12">
                            <button type="button" id="divsaleDate" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#last_sale_date">Last Sale Date</button>
                         </div>
                          <div class="col-md-3">
                             <span>Within</span>
                          </div>
                          <div class="col-md-6 col-6 px-md-0">
                             <input type="text" name="miles" class="search-mile form-control numberdecimalcls" placeholder="Enter miles">
                          </div>
                          <div class="col-md-3">
                             <span>From</span>
                          </div>
                          <div class="col-md-12 location-search">
                             <input class="form-control input-lg autocompletegoogleaddress" id="autocomplete" name="searchboxForAddress" placeholder="Enter your address" onfocus="geolocate()" value="" type="text">
                          </div>
                        <div class="col-md-12">
                            <div class="box2 filterbtn m-0" id="view_add_filter">
                               <input type="radio" name="selectRange" autocomplete="off" class="radio-disable selectRadioBtn radio-active text-white" value="squareRange"> View Additionals Filters
                               <span class="pl-2"><i class="fa fa-sort-desc filter-icon" aria-hidden="true"></i></span>
                            </div>
                        </div>                        
                    </div>
                    <div class="hide" id="additionals_filters">
                     <div class="row animated slideInDown a4 ease-out-quart">
                        <!---------------------------------- Start View Additional Filters Buttons-------------------->
                        <div class="col-md-12">
                           <button type="button" id="saleprice" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#sale_price">Sale Price</button>
                        </div>
                        <div class="col-md-12">
                           <button type="button" id="taxablevalue" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#taxable_value">Taxable Value</button>
                        </div>
                        <div class="col-md-12">
                           <button type="button" id="entercount" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#count">Count</button>
                        </div>
                        <div class="col-md-12">
                           <button type="button" id="squarefeet" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#square_feet">Square Feet</button>
                        </div>
                        <div class="col-md-12">
                           <button type="button" id="pricepersquarefeet" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#price_per_square_feet">Price Per Square Feet</button>
                        </div>
                        <div class="col-md-12">
                           <button type="button" id="yearrenovated" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#year_renovated">Year Renovated</button>
                        </div>
                        <div class="col-md-12">
                           <button type="button" id="yearbuilt" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#year_built">Year Built</button>
                        </div>
                        <!---------------------------------- Add Drop Down Box-------------------->
                        <div class="col-md-12">
                           <select class="form-control select2-show-search "  name="beds">
							<?php if(empty($postData['beds'])) { ?><option value="0"  selected>Beds</option><?php } else {?><option value="0" ><?php } ?>
							<?php for($i=1; $i <=20; $i++){?>
							<option value="<?php echo $i;?>" <?php if(!empty($postData['beds'])) { if($postData['beds']==$i) { echo "selected";} } ?>><?php echo $i;?></option><?php 
							}?>
                           </select>
                        </div>
                        <div class="col-md-12">
                           <select class="form-control select2-show-search " data-placeholder="Select Bath" name="bath">
                              <?php if(empty($postData['bath'])) { ?><option value="0"  selected>Baths</option><?php } else {?><option value="0" ><?php } ?>
							<?php for($i=1; $i <=20; $i++){?>
							<option value="<?php echo $i;?>" <?php if(!empty($postData['bath'])) { if($postData['bath']==$i) { echo "selected";} } ?>><?php echo $i;?></option><?php 
							}?>
                           </select>
                        </div>
                        <!--------------------- End Here------------------------------------>
                     </div>
                  </div>
                     <div class="row pt-2 justify-content-center">
                         <div class="col-md-12">
                           <button type="button" class="btn form-btn search-filter">View Data</button>
                         </div>
                         <div class="col-md-12">
                            <a href="<?php echo base_url();?>search-view-data"><button type="button" class="btn form-btn clear_all">Clear All</button></a>
                         </div>
                     </div>
                </div>
				  <textarea  style="display:none;" name="postdata"><?php if(!empty($jsonPostData)) {  echo $jsonPostData; }?></textarea>
           

        <!--Start PopUp Section-->
      <div class="form-group form-group11 mb-0" id="filter_popup">
         <!--PopUp 1-->
         <div class="container">
            <div class="modal" id="myModalZipCode">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header mod-head-cls">
                        <h4 class="modal-title text-center">Choose Zipcode(s)</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                     </div>
                     <div class="modal-body">
                        <div class="row" id="zipcodeDiv">
                          <?php foreach($zip as $resultZip){ ?>
								  <div class="col-md-3">
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
                              <button type="button" class="btn form-btn model-next-cls enter-cls search-filter " data-dismiss="modal">
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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
							  enter-cls search-filter" data-dismiss="modal" data-dismiss="modal" >
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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                     </div>
                     <div class="modal-body">
							<div class="row" id="zoningcodeDiv">
								<?php 
								 foreach($zoning as $resultzZoning){ ?>
									<div class="col-md-3">
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
                              <button rel="zoning" type="button" class="btn form-btn model-next-cls enter-cls search-filter" data-dismiss="modal" data-dismiss="modal">
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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
                              <button type="button" class="btn form-btn model-next-cls enter-cls search-filter-input" rel="landarea">
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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
                              <button type="button" class="btn form-btn model-next-cls enter-cls search-filter" data-dismiss="modal" data-dismiss="modal">
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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                     </div>
                     <div class="modal-body">
						<div class="row" id="wardcodeDiv">
						<?php  foreach($ward as $resultWard){ ?>
								<div class="col-md-3">
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
                              <button type="button" class="btn form-btn model-next-cls enter-cls search-filter" data-dismiss="modal" data-dismiss="modal">
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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                     </div>
                     <div class="modal-body">
                         <div class="row" id="tax_deductioncodeDiv">
                          <?php foreach($tax_deduction as $resultTaxDeduction){ ?>
								  <div class="col-md-6">
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
                              <button type="button" class="btn form-btn model-next-cls enter-cls search-filter" data-dismiss="modal" data-dismiss="modal">
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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input  type="text" class="form-control" id="from" name="fromSaleDate" placeholder="Start Date" autocomplete="off" />
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input  type="text" class="form-control" id="to" name="toSaleDate" placeholder="End Date" autocomplete="off" />
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <div class="row w-100">
                           <div class="col-md-4"></div>
                           <div class="col-md-4">
                              <button  id="clearsale_datebtn" type="button" class="btn form-btn" >Clear Filters</button>
                           </div>
                           <div class="col-md-4">
                              <button   rel="saledate" type="button" class="btn form-btn model-next-cls enter-cls search-filter-input">
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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
                              <button rel="saleprice" type="button" class="btn form-btn model-next-cls enter-cls search-filter-input">
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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
                             <button rel="taxablevalue" type="button" class="btn form-btn model-next-cls enter-cls search-filter-input">
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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
                              <button rel="unitrange" type="button" class="btn form-btn model-next-cls enter-cls search-filter-input">
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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
                              <button rel="squarefeet" type="button" class="btn form-btn model-next-cls enter-cls search-filter-input">
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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
                              <button rel="pricepersquarefeet" type="button" class="btn form-btn model-next-cls enter-cls search-filter-input" >
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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
                              <button rel="yearrenovated" type="button" class="btn form-btn model-next-cls enter-cls search-filter-input" >
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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
                              <button rel="yearbuilt" type="button" class="btn form-btn model-next-cls enter-cls search-filter-input" >
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
				<input type="hidden" name="lat"  id="lat" >
				<input type="hidden" name="lng"  id="lng" >
				<input type="hidden" name="place_id"  id="place_id" >
</form>

		<div class="row">
	        <div class="col-md-6">
	            <span class="buy_sdata"><input  class="radio_search"  type="radio" id="allSearch" name="radio_search_txt" value="1"><label for="allSearch">Buy All Search Data</label></span>
	            <span class="buy_sdata"><input checked class="radio_search" type="radio" id="multipleSelected " name="radio_search_txt" value="2"><label for="multipleSelected">Buy Multiple Selected Search Data</label></span>
	        </div>
	        <div class="col-md-6">
                <div class="connect_details">
	                <b>Connects-</b> <span id="connect_span"><?php if(!empty($usersInformation['connects'])){ echo $usersInformation['connects']; }else{echo"0";}?></span>  &nbsp;&nbsp;And&nbsp;&nbsp;   <b>Search Records-</b> <span id="record_span">0</span>
                </div>
	        </div>
	    </div>
            <table class="table table-hover search-listing" id="postsList">
              <thead>
                <tr>
                  <th id="thcheckbox" scope="col"><input  class="CheckAll" id="CheckAll_1" type="checkbox" name="check" value=""></th>
                  <th scope="col">Address</th>
                  <th scope="col">Zoning</th>
                  <th scope="col">Land Use</th>
                  <th scope="col">Zip Code</th>
                  <th scope="col">Land Area</th>
                  <th scope="col">Action</th>
                 </tr>
              </thead>
              <tbody>
                
              </tbody>
            </table>
           <div id='pagination_search' class="text-center my-5 v-page"></div>
         </div>
<!----Popup------>

<div id="save-search-popup" class="modal fade" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header mod-head-cls">
            <h4 class="modal-title text-center" >Notification </h4>
            <button type="button" class="close close-btn" data-dismiss="modal">×</button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row">
               <div class="col-md-12">
                  <p>If you want to save this search.Please <span class= "span-log login_popup_search" id="login_popup_search">LOGIN</span> first 
                  </p>
               </div>
            </div>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>
<div id="save-search-model-popup" class="modal fade" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title text-center" >Notification </h4>
            <button type="button" class="close close-btn" data-dismiss="modal">×</button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row">
				<div class="col-md-12">
			   <div  id="save-search-success" class="alert alert-success alert-dismissible hidecls" role="alert">
				<span class="alert-icon"><i class="ni ni-like-2"></i></span>
				<span class="alert-text">Your search save has been saved successfully</span>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>
                  <p>Now you can save this search
                  </p>
				 
					<input class="form-control" type="text" name="searchName" placeholder="Save Search" required="true" id="searchName">
                    <input id="save-search-submit" type="submit" class="btn btn-success" value="Save Search" name="save-search-submit">
				
               </div>
            </div>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>
<div id="add-to-cart-popup" class="modal fade" role="dialog">
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
                  <p>If you want to buy this search.Please <span class= "span-log login_popup_search">LOGIN</span> first 
                  </p>
               </div>
            </div>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>
<div id="add-to-cart-popup-subscription" class="modal fade" role="dialog">
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
                  <p>You can not buy this search .Beacuse your connects is less than search records count
                  </p>
               </div>
            </div>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>

<!---- End Here---->		 
		 
		 
 </section>