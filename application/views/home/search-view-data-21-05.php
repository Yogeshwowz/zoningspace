<style>
    .filter_sidebar_body .custom-control-label::before {background-color: #dadada;}
    .filter_sidebar_body .custom-control-input {top: 6px;right: 10px;}
</style>
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
            <button class="open_filter"><span class="title_icon"><i class="fa fa-sliders pl-1" aria-hidden="true"></i></span><span class="title_text">Filters <i class="fa fa-sliders pl-1" aria-hidden="true"></i></span></button>
			<div id="add_to_cart_div" >
            
			<?php if(empty($this->session->userdata('user_id'))){ ?>
			<button  type="button" class="add_to_cart" 
			data-toggle="modal" id="add_to_cart_btn" data-target="#add-to-cart-popup"><span class="title_icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span><span class="title_text">Buy Search</span></button>
			<button  type="button" id="save-search-popup-btn" data-toggle="modal" data-target="#save-search-popup" class="save_search"><span class="title_icon"><i class="fa fa-bookmark" aria-hidden="true"></i></span><span class="title_text">Save This Search</span></button><?php }else{ 
			if(!empty($usersInformation['subscription'])){?>
				<button  type="button" class="add_to_cart" id="add_to_cart_subscription"><span class="title_icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span><span class="title_text">Buy Search</span></button><?php 
				} else { ?>
				<a  class="add_to_cart"  href="<?php echo base_url();?>pricing"><span class="title_icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span><span class="title_text">Buy Search</span></a>
			<?php } ?>
			<button type="button" id="save-search-model-id" data-toggle="modal" data-target="#save-search-model-popup" class="save_search"><span class="title_icon"><i class="fa fa-bookmark" aria-hidden="true"></i></span><span class="title_text">Save This Search</span></button>
			<?php } ?>
			
			</div>
            <div class="filter_sidebar"></div>
            <div class="search_filter_list for-desktop" >
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
    				 <?php 
    				if(!empty($postData['ward'])){
    				foreach($postData['ward'] as $ward_d){?>
    					<div class="remove-ward-div-<?php echo $ward_d; ?> csf">
    					<input style="display:none;" name="ward-d[]"  rel="<?php echo $ward_d;?>" class="ward-d">
    					 <?php echo $ward_d;?>
    					   <span aria-hidden="true" class="remove-ward" rel="<?php echo $ward_d;?>">×</span>
    					</div><?php }
    				}	
    				?>
    				<?php 
    				if(!empty($postData['taxDeduction'])){
    				foreach($postData['taxDeduction'] as $taxDeduction_d){?>
    					<div class="remove-taxDeduction-div-<?php echo $taxDeduction_d; ?> csf">
    					<input style="display:none;" name="taxDeduction-d[]"  rel="<?php echo $taxDeduction_d;?>" class="taxDeduction-d">
    					 <?php echo $taxDeduction_d;?>
    					   <span aria-hidden="true" class="remove-taxDeduction" rel="<?php echo $taxDeduction_d;?>">×</span>
    					</div><?php }
    				}	
    				?>
    				 <?php 
    				if(!empty($postData['neighborhood'])){
    				foreach($postData['neighborhood'] as $neighborhood_d){?>
    					<div class="remove-neighborhood-div-<?php echo $neighborhood_d; ?> csf">
    					<input style="display:none;" name="neighborhood-d[]"  rel="<?php echo $neighborhood_d;?>" class="neighborhood-d">
    					 <?php echo $neighborhood_d;?>
    					   <span aria-hidden="true" class="remove-neighborhood" rel="<?php echo $neighborhood_d;?>">×</span>
    					</div><?php }
    				}	
    				?>
    				<?php if(!empty($postData['fromSaleDate']) && !empty($postData['toSaleDate'])) {?>
    				<div class="remove-additionals-filters-div csf saledatecls">		
    				Sale Date Range:<br><?php echo $postData['fromSaleDate'];?><br><?php echo $postData['toSaleDate'];?><span aria-hidden="true" class="remove-sale-date">×</span></div>
    				<?php }?>
    				
    				<?php if(!empty($postData['sale_price_start']) && !empty($postData['sale_price_end'])) {?>
    				<div class="remove-additionals-filters-div csf salepricecls">Sale Price Range:<br><?php echo $postData['sale_price_start'];?><br><?php echo $postData['sale_price_end'];?><span aria-hidden="true" class="remove-sale-price">×</span></div>
    				<?php }?>
    				<?php if(!empty($postData['taxable_value_start']) && !empty($postData['taxable_value_end'])) {?>
    				<div class="remove-additionals-filters-div csf taxablevaluecls">Taxable Value Range:<br><?php echo $postData['taxable_value_start'];?><br><?php echo $postData['taxable_value_end'];?><span aria-hidden="true" class="remove-taxable-value">×</span></div>
    				<?php }?>
    				<?php if(!empty($postData['count_start']) && !empty($postData['count_end'])) {?>
    				<div class="remove-additionals-filters-div csf unitrangecls">Number Of Units:<br><?php echo $postData['count_start'];?>-<?php echo $postData['count_end'];?><span aria-hidden="true" class="remove-unitrange">×</span></div>
    				<?php }?>
    				<?php if(!empty($postData['square_feet_start']) && !empty($postData['square_feet_end'])) {?>
    				<div class="remove-additionals-filters-div csf squarefeetcls">Square Foot Range :<br><?php echo $postData['square_feet_start'];?>-<?php echo $postData['square_feet_end'];?><span aria-hidden="true" class="remove-squarefeet">×</span>					</div>
    				<?php }?>
    				<?php if(!empty($postData['price_per_square_feet_start']) && !empty($postData['price_per_square_feet_end'])) {?>
    				<div class="remove-additionals-filters-div csf pricepersquarefeetcls">Price Per Square Foot :<br><?php echo $postData['price_per_square_feet_start'];?>-<?php echo $postData['price_per_square_feet_end'];?><span aria-hidden="true" class="remove-pricepersquarefeet">×</span></div>
    				<?php }?>
    				<?php if(!empty($postData['year_renovated_start']) && !empty($postData['year_renovated_end'])) {?>
    				<div class="remove-additionals-filters-div csf yearrenovatedcls">Year Renovated Range :<br><?php echo $postData['year_renovated_start'];?>-<?php echo $postData['year_renovated_end'];?><span aria-hidden="true" class="remove-yearrenovated">×</span></div>
    				<?php }?>
    				<?php if(!empty($postData['year_built_start']) && !empty($postData['year_built_end'])) {?>
    				<div class="remove-additionals-filters-div csf yearbuiltcls">Year Built Range :<br><?php echo $postData['year_built_start'];?>-<?php echo $postData['year_built_end'];?><span aria-hidden="true" class="remove-yearbuilt">×</span></div>
    				<?php }?>
    				<?php 
    				if(!empty($postData['propertyCheck'])){
    				foreach($postData['propertyCheck'] as $propertyCheck){?>
    					<div class="remove-propertyCheck-div csf">
    					<input style="display:none;" name="propertyCheck-d[]" rel="<?php echo $propertyCheck;?>" class="propertyCheck-d">
    					 <?php 
    					 if($propertyCheck=='person'){  echo 'Person';}
    					 if($propertyCheck=='business'){  echo 'Business';}
    					 if($propertyCheck=='govt'){  echo 'Government';}
    					 if($propertyCheck=='property_owns_multiple'){  echo 'Owns Multiple';}
    					?>
    					   <span aria-hidden="true" class="remove-propertyCheck" rel="<?php echo $propertyCheck;?>">×</span>
    					</div><?php }
    				}	
    				?>
    				<?php 
    				if(!empty($postData['beds'])){
    				?>
    					<div class="remove-beds-div-<?php echo $postData['beds'];?> csf">					<input type="hidden" name="beds-d[]" rel="<?php echo $postData['beds'];?>" class="beds-d">Beds:<?php echo $postData['beds'];?><span aria-hidden="true" class="remove-beds" rel="<?php echo $postData['beds'];?>">×</span>					</div><?php 
    				}	
    				?>
    			
    				<?php 
    				if(!empty($postData['bath'])){
    				?>
    					<div class="remove-bath-div-<?php echo $postData['bath'];?> csf">					<input type="hidden" name="bath-d[]" rel="<?php echo $postData['bath'];?>" class="bath-d">Bath:<?php echo $postData['bath'];?><span aria-hidden="true" class="remove-bath" rel="<?php echo $postData['bath'];?>">×</span>					</div><?php 
    				}	
    				?>
    				
    					<?php 
    				if(!empty($postData['searchboxForAddress'])){
    				?>
    					<div class="remove-searchboxForAddress-div csf">					<input type="hidden" name="searchboxForAddress-d[]" rel="<?php echo $postData['searchboxForAddress'];?>" class="searchboxForAddress-d">Address:<?php echo $postData['searchboxForAddress'];?><span aria-hidden="true" class="remove-searchboxForAddress" rel="<?php echo $postData['miles'];?>">×</span>					</div><?php 
    				}	
    				?>
    					<?php 
    				if(!empty($postData['miles'])){
    				?>
    					<div class="remove-miles-div csf">					
    					<input type="hidden" name="miles-d[]" rel="<?php echo $postData['miles'];?>" class="zoning-d">Miles:<?php echo $postData['miles'];?><span aria-hidden="true" class="remove-miles" rel="<?php echo $postData['miles'];?>">×</span>					</div><?php 
    				}	
    				?>
                </div>
            </div>
			<h6>Select a Record and add it to your cart. When you've chosen what you need, go to your cart to pay by card and instantly download the data!</h6>
			<p>You can SAVE you search list of all records available for this county below. You may also explore Washington County to browse fields and properties.</p>
			<form role="form" action="<?php echo base_url();?>search-view-data" method="post" id="search-form">
			
			<!------ Hidden Filed------------->
			<input type="hidden" name="allcount" id="allcount" value="">
			<input type="hidden" name="connects" id="connects" value="<?php if(!empty($usersInformation['connects'])){ echo $usersInformation['connects']; }?>">
			
			<input type="hidden" name="Chkallcount" id="Chkallcount" value="0">
			<input type="hidden" name="Chkall" id="Chkall" value="0">
			<!--------- End Here------------------------------------>
			
			<section class="search_result_page">
 
            <div class="filter_sidebar_body non-active">
			
                    <span class="close_filter"><i class="fa fa-times" aria-hidden="true"></i></span>
                    <h4>Search Filters</h4>
                    <div class="row pt-3">
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
                          <div class="col-3">
                             <span>Within</span>
                          </div>
                          <div class="col-6 px-md-0">
                             <input type="text" id="miles" name="miles" class="search-mile form-control numberdecimalcls" placeholder="Enter miles" value="<?php if(!empty($postData['miles']))  { echo $postData['miles']; }?>">
                          </div>
                          <div class="col-3">
                             <span>From</span>
                          </div>
                          <div class="col-md-12 location-search">
                             <input class="form-control input-lg autocompletegoogleaddress" id="autocomplete"   name="searchboxForAddress" placeholder="Enter your address" onfocus="geolocate()" value="<?php if(!empty($postData['searchboxForAddress']))  { echo $postData['searchboxForAddress']; }?>" type="text">
							
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
                           <button type="button" id="entercount" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#count">Number of units</button>
                        </div>
                        <div class="col-md-12">
                           <button type="button" id="squarefeet" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#square_feet">Square Foot</button>
                        </div>
                        <div class="col-md-12">
                           <button type="button" id="pricepersquarefeet" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#price_per_square_feet">Price Per Square Foot</button>
                        </div>
                        <div class="col-md-12">
                           <button type="button" id="yearrenovated" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#year_renovated">Year Renovated</button>
                        </div>
                        <div class="col-md-12">
                           <button type="button" id="yearbuilt" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#year_built">Year Built</button>
                        </div>
                        <!---------------------------------- Add Drop Down Box-------------------->
                        <div class="col-md-12">
                           <select class="form-control select2-show-search "  name="beds" id="beds">
							<?php if(empty($postData['beds'])) { ?><option value="0"  selected>Beds</option><?php } else {?><option value="0" ><?php } ?>
							<?php for($i=1; $i <=20; $i++){?>
							<option value="<?php echo $i;?>" <?php if(!empty($postData['beds'])) { if($postData['beds']==$i) { echo "selected";} } ?>><?php echo $i;?></option><?php 
							}?>
                           </select>
                        </div>
                        <div class="col-md-12">
                           <select class="form-control select2-show-search " data-placeholder="Select Bath" name="bath" id="bath">
                              <?php if(empty($postData['bath'])) { ?><option value="0"  selected>Baths</option><?php } else {?><option value="0" ><?php } ?>
							<?php for($i=1; $i <=20; $i++){?>
							<option value="<?php echo $i;?>" <?php if(!empty($postData['bath'])) { if($postData['bath']==$i) { echo "selected";} } ?>><?php echo $i;?></option><?php 
							}?>
                           </select>
                        </div>
						
					<div class="col-md-12">
                            <div class="row">
                               <div class="col-10 text-align-left">Property Owned By Person</div>
                               <div class="col-1">
                                    <div class="custom-control custom-checkbox">
                                         <input type="checkbox" class="propertycls custom-control-input" value="person" name="propertyCheck[]" id="defaultCheckPerson" <?php if(!empty($postData['propertyCheck'])) { if(in_array('person', $postData['propertyCheck'])) { echo "checked";} } ?>>
                                         <label class="custom-control-label" for="defaultCheckPerson"></label>
                                    </div>
                               </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                               <div class="col-10 text-align-left">Property Owned By Business</div>
                                <div class="col-1">
                                    <div class="custom-control custom-checkbox">
                                         <input type="checkbox" class="propertycls custom-control-input" value="business" name="propertyCheck[]" id="defaultCheckBusiness" <?php if(!empty($postData['propertyCheck'])) { if(in_array('business', $postData['propertyCheck'])) { echo "checked";} } ?>>
                                         <label class="custom-control-label" for="defaultCheckBusiness"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                               <div class="col-10 text-align-left">Property Owned By Government</div>
                                <div class="col-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="propertycls custom-control-input" value="govt" name="propertyCheck[]" id="defaultCheckGovernment" <?php if(!empty($postData['propertyCheck'])) { if(in_array('govt', $postData['propertyCheck'])) { echo "checked";} } ?>>
                                        <label class="custom-control-label" for="defaultCheckGovernment"></label>
                                    </div>
                               </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                               <div class="col-10 text-align-left">Owns Multiple Properties</div>
                                <div class="col-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="propertycls custom-control-input"  name="propertyCheck[]" value="property_owns_multiple" id="defaultCheckMultipleProperties" name="property_owns_multiple" <?php if(!empty($postData['property_owns_multiple'])) {   echo "checked"; } ?>>
                                        <label class="custom-control-label" for="defaultCheckMultipleProperties"></label>
                                    </div>
                                </div>
                            </div>
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
                     
                    <div class="row py-3">
                        <div class="search_filter_list for-mobile" >
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
            				 <?php 
            				if(!empty($postData['ward'])){
            				foreach($postData['ward'] as $ward_d){?>
            					<div class="remove-ward-div-<?php echo $ward_d; ?> csf">
            					<input style="display:none;" name="ward-d[]"  rel="<?php echo $ward_d;?>" class="ward-d">
            					 <?php echo $ward_d;?>
            					   <span aria-hidden="true" class="remove-ward" rel="<?php echo $ward_d;?>">×</span>
            					</div><?php }
            				}	
            				?>
            				<?php 
            				if(!empty($postData['taxDeduction'])){
            				foreach($postData['taxDeduction'] as $taxDeduction_d){?>
            					<div class="remove-taxDeduction-div-<?php echo $taxDeduction_d; ?> csf">
            					<input style="display:none;" name="taxDeduction-d[]"  rel="<?php echo $taxDeduction_d;?>" class="taxDeduction-d">
            					 <?php echo $taxDeduction_d;?>
            					   <span aria-hidden="true" class="remove-taxDeduction" rel="<?php echo $taxDeduction_d;?>">×</span>
            					</div><?php }
            				}	
            				?>
            				 <?php 
            				if(!empty($postData['neighborhood'])){
            				foreach($postData['neighborhood'] as $neighborhood_d){?>
            					<div class="remove-neighborhood-div-<?php echo $neighborhood_d; ?> csf">
            					<input style="display:none;" name="neighborhood-d[]"  rel="<?php echo $neighborhood_d;?>" class="neighborhood-d">
            					 <?php echo $neighborhood_d;?>
            					   <span aria-hidden="true" class="remove-neighborhood" rel="<?php echo $neighborhood_d;?>">×</span>
            					</div><?php }
            				}	
            				?>
            				<?php if(!empty($postData['fromSaleDate']) && !empty($postData['toSaleDate'])) {?>
            				<div class="remove-additionals-filters-div csf saledatecls">		
            				Sale Date Range:<br><?php echo $postData['fromSaleDate'];?><br><?php echo $postData['toSaleDate'];?><span aria-hidden="true" class="remove-sale-date">×</span></div>
            				<?php }?>
            				
            				<?php if(!empty($postData['sale_price_start']) && !empty($postData['sale_price_end'])) {?>
            				<div class="remove-additionals-filters-div csf salepricecls">Sale Price Range:<br><?php echo $postData['sale_price_start'];?><br><?php echo $postData['sale_price_end'];?><span aria-hidden="true" class="remove-sale-price">×</span></div>
            				<?php }?>
            				<?php if(!empty($postData['taxable_value_start']) && !empty($postData['taxable_value_end'])) {?>
            				<div class="remove-additionals-filters-div csf taxablevaluecls">Taxable Value Range:<br><?php echo $postData['taxable_value_start'];?><br><?php echo $postData['taxable_value_end'];?><span aria-hidden="true" class="remove-taxable-value">×</span></div>
            				<?php }?>
            				<?php if(!empty($postData['count_start']) && !empty($postData['count_end'])) {?>
            				<div class="remove-additionals-filters-div csf unitrangecls">Number Of Units:<br><?php echo $postData['count_start'];?>-<?php echo $postData['count_end'];?><span aria-hidden="true" class="remove-unitrange">×</span></div>
            				<?php }?>
            				<?php if(!empty($postData['square_feet_start']) && !empty($postData['square_feet_end'])) {?>
            				<div class="remove-additionals-filters-div csf squarefeetcls">Square Foot Range :<br><?php echo $postData['square_feet_start'];?>-<?php echo $postData['square_feet_end'];?><span aria-hidden="true" class="remove-squarefeet">×</span>					</div>
            				<?php }?>
            				<?php if(!empty($postData['price_per_square_feet_start']) && !empty($postData['price_per_square_feet_end'])) {?>
            				<div class="remove-additionals-filters-div csf pricepersquarefeetcls">Price Per Square Foot :<br><?php echo $postData['price_per_square_feet_start'];?>-<?php echo $postData['price_per_square_feet_end'];?><span aria-hidden="true" class="remove-pricepersquarefeet">×</span></div>
            				<?php }?>
            				<?php if(!empty($postData['year_renovated_start']) && !empty($postData['year_renovated_end'])) {?>
            				<div class="remove-additionals-filters-div csf yearrenovatedcls">Year Renovated Range :<br><?php echo $postData['year_renovated_start'];?>-<?php echo $postData['year_renovated_end'];?><span aria-hidden="true" class="remove-yearrenovated">×</span></div>
            				<?php }?>
            				<?php if(!empty($postData['year_built_start']) && !empty($postData['year_built_end'])) {?>
            				<div class="remove-additionals-filters-div csf yearbuiltcls">Year Built Range :<br><?php echo $postData['year_built_start'];?>-<?php echo $postData['year_built_end'];?><span aria-hidden="true" class="remove-yearbuilt">×</span></div>
            				<?php }?>
            				<?php 
            				if(!empty($postData['propertyCheck'])){
            				foreach($postData['propertyCheck'] as $propertyCheck){?>
            					<div class="remove-propertyCheck-div csf">
            					<input style="display:none;" name="propertyCheck-d[]" rel="<?php echo $propertyCheck;?>" class="propertyCheck-d">
            					 <?php 
            					 if($propertyCheck=='person'){  echo 'Person';}
            					 if($propertyCheck=='business'){  echo 'Business';}
            					 if($propertyCheck=='govt'){  echo 'Government';}
            					 if($propertyCheck=='property_owns_multiple'){  echo 'Owns Multiple';}
            					?>
            					   <span aria-hidden="true" class="remove-propertyCheck" rel="<?php echo $propertyCheck;?>">×</span>
            					</div><?php }
            				}	
            				?>
            				<?php 
            				if(!empty($postData['beds'])){
            				?>
            					<div class="remove-beds-div-<?php echo $postData['beds'];?> csf">					<input type="hidden" name="beds-d[]" rel="<?php echo $postData['beds'];?>" class="beds-d">Beds:<?php echo $postData['beds'];?><span aria-hidden="true" class="remove-beds" rel="<?php echo $postData['beds'];?>">×</span>					</div><?php 
            				}	
            				?>
            			
            				<?php 
            				if(!empty($postData['bath'])){
            				?>
            					<div class="remove-bath-div-<?php echo $postData['bath'];?> csf">					<input type="hidden" name="bath-d[]" rel="<?php echo $postData['bath'];?>" class="bath-d">Bath:<?php echo $postData['bath'];?><span aria-hidden="true" class="remove-bath" rel="<?php echo $postData['bath'];?>">×</span>					</div><?php 
            				}	
            				?>
            				
            					<?php 
            				if(!empty($postData['searchboxForAddress'])){
            				?>
            					<div class="remove-searchboxForAddress-div csf">					<input type="hidden" name="searchboxForAddress-d[]" rel="<?php echo $postData['searchboxForAddress'];?>" class="searchboxForAddress-d">Address:<?php echo $postData['searchboxForAddress'];?><span aria-hidden="true" class="remove-searchboxForAddress" rel="<?php echo $postData['miles'];?>">×</span>					</div><?php 
            				}	
            				?>
            					<?php 
            				if(!empty($postData['miles'])){
            				?>
            					<div class="remove-miles-div csf">					
            					<input type="hidden" name="miles-d[]" rel="<?php echo $postData['miles'];?>" class="zoning-d">Miles:<?php echo $postData['miles'];?><span aria-hidden="true" class="remove-miles" rel="<?php echo $postData['miles'];?>">×</span>					</div><?php 
            				}	
            				?>
                        </div>
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
                                 <input type="text" class="form-control numbervalidation" id="land_range_start" name="land_range_start" placeholder="Min" value="<?php if(!empty($postData['land_range_start'])) { echo $postData['land_range_start']; } ?>" />
                                 <span class="error-cls" id="error_land_range_start" style="display: none;">Please enter value greater than 112</span>
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input type="text" class="form-control numbervalidation" id="land_range_end" name="land_range_end" placeholder="Max" value="<?php if(!empty($postData['land_range_end'])) { echo $postData['land_range_end']; } ?>" />
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
                                 <input  type="text" class="form-control" id="from" name="fromSaleDate" placeholder="Start Date" autocomplete="off"  value="<?php if(!empty($postData['fromSaleDate']))  { echo $postData['fromSaleDate']; }?>"/>
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input  type="text" class="form-control" id="to" name="toSaleDate" placeholder="End Date" autocomplete="off"   value="<?php if(!empty($postData['toSaleDate'])) { echo $postData['toSaleDate'];}?>"/>
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
                                 <input type="text" class="form-control numbervalidation" id="sale_price_start" name="sale_price_start" placeholder="Min" value="<?php if(!empty($postData['sale_price_start'])){ echo $postData['sale_price_start'];}?>" />
                                 <span class="error-cls" id="error_sale_price_start" style="display: none;">Enter Start Sale Price</span>
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input type="text" class="form-control numbervalidation" id="sale_price_end" name="sale_price_end" placeholder="Max" value="<?php if(!empty($postData['sale_price_end'])){ echo $postData['sale_price_end'];}?>" />
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
                                 <input type="text" class="form-control numbervalidation" id="taxable_value_start" name="taxable_value_start" placeholder="Enter Start Taxable Value" value="<?php if(!empty($postData['taxable_value_start'])){ echo $postData['taxable_value_start'];}?>" />
                                 <span class="error-cls" id="error_taxable_value_start" style="display: none;">Enter Start Taxable Value</span>
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input type="text" class="form-control numbervalidation" id="taxable_value_end" name="taxable_value_end" placeholder="Enter End Taxable Value" value="<?php if(!empty($postData['taxable_value_end'])){ echo $postData['taxable_value_end'];}?>" />
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
                                 <input type="text" class="form-control numbervalidation" id="count_start" name="count_start" placeholder="Number of Units" value="<?php if(!empty($postData['count_start'])){ echo $postData['count_start'];}?>" />
                                 <span class="error-cls" id="error_count_start" style="display: none;">Number of Units</span>
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input type="text" class="form-control numbervalidation" id="count_end" name="count_end" placeholder="Number of Units" value="<?php if(!empty($postData['count_end'])){ echo $postData['count_end'];}?>" />
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
                        <h4 class="modal-title text-center">Please Enter Square Foot Range</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input type="text" class="form-control numbervalidation" id="square_feet_start" name="square_feet_start" placeholder="Enter Start Square Feet" value="<?php if(!empty($postData['square_feet_start'])){ echo $postData['square_feet_start'];}?>" />
                                 <span class="error-cls" id="error_square_feet_start" style="display: none;">Enter Start Square Foot</span>
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input type="text" class="form-control numbervalidation" id="square_feet_end" name="square_feet_end" placeholder="Enter End Square Feet" value="<?php if(!empty($postData['square_feet_end'])){ echo $postData['square_feet_end'];}?>" />
                                 <span class="error-cls" id="error_square_feet_end" style="display: none;">Enter End Square Foot</span>
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
                        <h4 class="modal-title text-center">Please Enter Price Per Square Foot Range</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input type="text" class="form-control numbervalidation" id="price_per_square_feet_start" name="price_per_square_feet_start" placeholder="Min" value="<?php if(!empty($postData['price_per_square_feet_start'])){ echo $postData['price_per_square_feet_start'];}?>" />
                                 <span class="error-cls" id="error_price_per_square_feet_start" style="display: none;">Enter Start Price Per Square Foot</span>
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input type="text" class="form-control numbervalidation" id="price_per_square_feet_end" name="price_per_square_feet_end" placeholder="Max" value="<?php if(!empty($postData['price_per_square_feet_end'])){ echo $postData['price_per_square_feet_end'];}?>" />
                                 <span class="error-cls" id="error_price_per_square_feet_end" style="display: none;">Enter End Price Per Square Foot</span>
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
                                 <input type="text" class="form-control numbervalidation" id="year_renovated_start" name="year_renovated_start" placeholder="Min" value="<?php if(!empty($postData['year_renovated_start'])){ echo $postData['year_renovated_start'];}?>" />
                                 <span class="error-cls" id="error_year_renovated_start" style="display: none;">Enter Start Year Renovated</span>
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input type="text" class="form-control numbervalidation" id="year_renovated_end" name="year_renovated_end" placeholder="Max" value="<?php if(!empty($postData['year_renovated_end'])){ echo $postData['year_renovated_end'];}?>" />
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
                                 <input maxlength="4" type="text" class="form-control numbervalidation" id="year_built_start" name="year_built_start" placeholder="Min" value="<?php if(!empty($postData['year_built_start'])){ echo $postData['year_built_start'];}?>" />
                                 <span class="error-cls" id="error_year_built_start" style="display: none;">Enter Start Year Built</span>
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <div class="form-group">
                                 <input maxlength="4" type="text" class="form-control numbervalidation" id="year_built_end" name="year_built_end" placeholder="Max" value="<?php if(!empty($postData['year_built_end'])){ echo $postData['year_built_end'];}?>" />
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
				<input type="hidden" name="lat"  id="lat"   value="<?php if(!empty($postData['lat']))  { echo $postData['lat']; }?>">
				<input type="hidden" name="lng"  id="lng"  value="<?php if(!empty($postData['lng']))  { echo $postData['lng']; }?>">
				<input type="hidden" name="place_id"  id="place_id"  value="<?php if(!empty($postData['place_id']))  { echo $postData['place_id']; }?>">
</form>

		<div class="row">
	       
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