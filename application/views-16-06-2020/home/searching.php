<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/mysql/style.css">

<div class="container" id="clo">
<?php if(empty($this->session->userdata('user_id'))){ ?>
          <button class="btn pur-btn"  data-toggle="modal" data-target="#buypaymentModalCenter">Purchase Data</button>
        <?php } else{?>
    <button class="btn pur-btn" onclick="buysearch()">Purchase Data<span class="pur-msg">You can check multiple data from checkbox</span></button>
	<?php } ?>
	<?php if(empty($_POST['simplesearch'])) { ?><a  id="filterbtn" class="btn btn-sm btn-dark" href="#"></i>Filters<i class="fa fa-angle-down filtericon" aria-hidden="true"></i></a>
	<?php } else{?>
	<a  style="visibility: hidden;" id="filterbtn" class="btn btn-sm btn-dark" href="#"></i>Filters<i class="fa fa-angle-down filtericon" aria-hidden="true"></i></a>
	<?php } ?>
      <?php  
      $success = $this->session->flashdata('payment_success');
      if($success){ ?>
      <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <?php echo $this->session->flashdata('payment_success'); ?>
      </div>
      <?php } ?>
</div>
<form action="<?php echo base_url();?>searching" method="POST" id="formPost">
<div id="filterbody" class="expandable">
   
  
   <div class="container">
    	<h2>Filters</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">

                    <div class="form-check ">
                      <div class="row">
              				  <div class="col-10"> Property Owned By Person </div>
                        <div class="col-1">
                          <div class="custom-control form-control-lg custom-checkbox">
                    				<input class="custom-control-input" type="checkbox" value="person" name="propertyCheck[]" id="defaultCheckPerson" <?php if(!empty($postData['propertyCheck'])) { if(in_array('person', $postData['propertyCheck'])) { echo "checked";} } ?>>
                     				<label class="custom-control-label" for="defaultCheckPerson"></label>
                          </div>
                        </div>
                      </div>
            		    </div>
      						<div class="form-check">
                    <div class="row">
        							<div class="col-10"> Property Owned By Business </div>
                      <div class="col-1">
                        <div class="custom-control form-control-lg custom-checkbox">
            							<input class="custom-control-input" type="checkbox" value="business" name="propertyCheck[]" id="defaultCheckBusiness" <?php if(!empty($postData['propertyCheck'])) { if(in_array('business', $postData['propertyCheck'])) { echo "checked";} } ?>>
            							<label class="custom-control-label" for="defaultCheckBusiness"></label>
                        </div>
                      </div>
                    </div>
      						</div>
      						<div class="form-check">
                    <div class="row">
        							<div class="col-10"> Property Owned By Government </div>
                      <div class="col-1">
                        <div class="custom-control form-control-lg custom-checkbox">
          							<input class="custom-control-input" type="checkbox" value="govt"  name="propertyCheck[]" id="defaultCheckGovernment" <?php if(!empty($postData['propertyCheck'])) { if(in_array('govt', $postData['propertyCheck'])) { echo "checked";} } ?>>
          							<label class="custom-control-label" for="defaultCheckGovernment"></label>
                        </div>
                      </div>
                    </div>
      						</div>
      						<div class="form-check">
                    <div class="row">
        							<div class="col-10"> Owns Multiple Properties </div>
                      <div class="col-1">
                        <div class="custom-control form-control-lg custom-checkbox">
          							<input class="custom-control-input" type="checkbox" value="property_owns_multiple" id="defaultCheck4" name="property_owns_multiple" <?php if(!empty($postData['property_owns_multiple'])) {   echo "checked"; } ?>>
          							<label class="custom-control-label" for="defaultCheck4"></label>
                        </div>
                      </div>
                    </div>
					<p  name="jsonPostData" id="jsonPostData"><?php if(!empty($jsonPostData)) {  echo $jsonPostData; } ?></p>
      						</div>

            		</div>
               
            </div>
            <div class="col-md-3">
            	<ul class="selectbtn">
					<li class="btncolor">
						<a  class="btn" data-toggle="modal" data-toggle="modal" data-target="#myModalZipCode">Select Zipcode(s)</a>  						
					</li>
					<li class="btncolor">
						<a  class="btn" data-toggle="modal" data-toggle="modal" data-target="#myModalUse">Select Use(s)</a>  		
					</li>
					<li class="btncolor">
						<a  class="btn" data-toggle="modal" data-toggle="modal" data-target="#myModalZoning">Select Zoning(s)</a> 						
					</li>
					<li class="btncolor">
						<a  class="btn" data-toggle="modal" data-toggle="modal" data-target="#myModalNeighborhood">Select Neighbourhood(s)</a> 
					</li>
					<li class="btncolor">
						<a  class="btn" data-toggle="modal" data-toggle="modal" data-target="#myModalWard">Select Ward(s)</a> 
					</li>
					<li class="btncolor">
						<a  class="btn" data-toggle="modal" data-toggle="modal" data-target="#myModalTaxDeduction">Select Homestead Tax Deduction(s)</a> 
					</li>
				</ul>
            </div>
            <div class="col-md-3">
            	<ul>
					<li class="sidebar-dropdown">
						<a href="#">
						<span> <h5>Land Range</h5></span>
						</a>
						<div class="sidebar-submenu">
							<div class="row">
								<div class="form-group">
									<input type="text" class="form-control numbervalidation" id="land_range_start" name="land_range_end" placeholder="Start Land Range" value="<?php if(!empty($postData['land_range_start'])) { echo $postData['land_range_start']; } ?>">
									<span class="error-cls" id="error_land_range_start" style="display:none;">Please enter value greater than 112</span>
								</div>
								<div class="form-group">
									<input type="text" class="form-control numbervalidation" id="land_range_end" name="land_range_end" placeholder="Please Enter End Land Range" value="<?php if(!empty($postData['land_range_end'])) { echo $postData['land_range_end']; } ?>">
									<span class="error-cls" id="error_land_range_end" style="display:none;">Please enter value greater than 112 and less than 12919556</span>
								</div>
							</div>
						</div>
					</li>
					<li class="sidebar-dropdown">
					<a href="#">
					<span> <h5>Sale Date Range</h5></span>
					</a>
						<div class="sidebar-submenu">
							<div class="row">
								<div class="form-group">
									<input type="text" readonly="" class="form-control" id="from" name="fromSaleDate"  placeholder="" value="<?php if(!empty($postData['fromSaleDate'])) { echo $postData['fromSaleDate']; } ?>">
								</div>
								<div class="form-group">
									<input type="text"  readonly="" class="form-control" id="to" name="toSaleDate" placeholder="" value="<?php if(!empty($postData['toSaleDate'])) { echo $postData['toSaleDate']; } ?>">
								</div>
							</div>
						</div>
					</li>
					<!--<li class="sidebar-dropdown">
					<a href="#">
					<span> <h5>Square Range</h5></span>
					</a>
						<div class="sidebar-submenu">
							<div class="row">
								<div class="form-group">
									<input type="text" class="form-control numbervalidation" id="square_start" name="square_start" placeholder="Start Square Value" value="<?php //if(!empty($postData['square_start'])) { echo $postData['square_start']; } ?>">
									<span class="error-cls" id="error_square_start" style="display:none;">Please enter square value greater than 4</span>
								</div>
								<div class="form-group">
									<input type="text" class="form-control numbervalidation" id="square_end" name="square_end"  placeholder="End Square Value" value="<?php //if(!empty($postData['square_end'])) { echo $postData['square_end']; } ?>">
									<span class="error-cls" id="error_square_end" style="display:none;">Please enter square value greater than 4 and less than 6277</span>
								</div>
							</div>
						</div>
					</li>-->
					<li class="sidebar-dropdown">
					<a href="#">
					<span> <h5>Sort By</h5></span>
					</a>
					<div class="sidebar-submenu">
							<div class="row">
							<div class="form-group">
							    <select class="form-control selectboxcls" id="selectSortBy" name="selectSortBy">
										<option value="" >--Select Zipcode(s)--</option>
										<option value="owername" <?php if(!empty($postData['selectSortBy'])) { if($postData['selectSortBy']=='owername') { echo "selected";}}  ?>>Ower Name</option>
										<option value="zipcode" <?php if(!empty($postData['selectSortBy'])) { if($postData['selectSortBy']=='zipcode') { echo "selected";}}  ?>>Zipcode</option>
										<option value="use" <?php if(!empty($postData['selectSortBy'])) { if($postData['selectSortBy']=='use') { echo "selected";}}  ?>>Use(s)</option>
										<option value="zoning" <?php if(!empty($postData['selectSortBy'])) { if($postData['selectSortBy']=='zoning') { echo "selected";}}  ?>>Zoning</option>	
										<option value="neighborhood" <?php if(!empty($postData['selectSortBy'])) { if($postData['selectSortBy']=='neighborhood') { echo "selected";}}  ?>>Neighbourhood</option>	
										<option value="ward" <?php if(!empty($postData['selectSortBy'])) { if($postData['selectSortBy']=='ward') { echo "selected";}}  ?>>Ward</option>									
										<option value="tax_deduction"  <?php if(!empty($postData['selectSortBy'])) { if($postData['selectSortBy']=='tax_deduction') { echo "selected";}}  ?>>Tax Deduction</option>									
							    </select>
							</div>
							<div class="form-group">
							    <select class="form-control selectboxcls" id="SortBy" name="SortBy">
								<option value="asc" <?php if(!empty($postData['SortBy'])) { if($postData['SortBy']=='asc') { echo "selected";}}  ?>>Asc</option>
								<option value="desc" <?php if(!empty($postData['SortBy'])) { if($postData['SortBy']=='desc') { echo "selected";}}  ?>>Desc</option>
																	
							    </select>
							</div>
							</div>
						</div>
					</li>
        		</ul>
                
            </div>
            <div class="col-md-3 ">
                
    <!--            <div class="map-range w-100 mt-2">-->
				<!--    <span class="text-white">Within</span>-->
				<!--    <input type="number" name="miles" class="search-mile px-2" placeholder="Enter miles">-->
				<!--    <span class="text-white">From</span>-->
    <!--	        </div>-->
    <!--	        <input type="text" class="form-control input-lg mt-3" id="searchboxForAddress"  name="searchboxForAddress" placeholder="Enter Loaction, Landmark" autocomplete="off" >-->
    <!--	        <div class="form-group  mb-0 search_data">-->
				<!--	<div class="serachdatadivForAddress">-->
				<!--		<ul id="resultsForAddress"></ul>-->
				<!--		<span id="loadingForAddress">Loading Please wait...</span>-->
				<!--	</div>-->
				<!--</div>-->
    <!--			<button type="submit" class="btn btn-lg btn-block btn-primary br-tr-md-0 br-br-md-0" name="submitBtn"><i class="fa fa-search" aria-hidden="true"></i></button>-->
                
			    <div class="box2 colo-btn">
                         <input type="radio" name="selectRange" autocomplete="off" class="radio-disable selectRadioBtn radio-active" value="squareRange"> View Additionals Filters
                </div>
    						    
            	<!--<h5>Sort By</h5>-->
                           <!-- <ul>
								<li class="btncolor">
									<button class="btn">Select Zipcode(s)</button>      
								</li>
								<li class="btncolor">
									<button class="btn">Select Use(s)</button>  
								</li>
								<li class="btncolor">
									<button class="btn">Select Zoning(s)</button>       
								</li>
								<li class="btncolor">
									<button class="btn">Select Neighbourhood(s)</button>  
								</li>
								<li class="btncolor">
									<button class="btn">Select Ward(s)</button>       
								</li>
								<li class="btncolor">
									<button class="btn">Select Homestead Tax Deduction(s)</button>  
								</li>
							</ul>-->
							<?php /*<div class="form-group">
							    <select class="form-control selectboxcls" id="selectSortBy" name="selectSortBy">
										<option value="" >--Select Zipcode(s)--</option>
										<option value="owername" <?php if(!empty($postData['selectSortBy'])) { if($postData['selectSortBy']=='owername') { echo "selected";}}  ?>>Ower Name</option>
										<option value="zipcode" <?php if(!empty($postData['selectSortBy'])) { if($postData['selectSortBy']=='zipcode') { echo "selected";}}  ?>>Zipcode</option>
										<option value="use" <?php if(!empty($postData['selectSortBy'])) { if($postData['selectSortBy']=='use') { echo "selected";}}  ?>>Use(s)</option>
										<option value="zoning" <?php if(!empty($postData['selectSortBy'])) { if($postData['selectSortBy']=='zoning') { echo "selected";}}  ?>>Zoning</option>	
										<option value="neighborhood" <?php if(!empty($postData['selectSortBy'])) { if($postData['selectSortBy']=='neighborhood') { echo "selected";}}  ?>>Neighbourhood</option>	
										<option value="ward" <?php if(!empty($postData['selectSortBy'])) { if($postData['selectSortBy']=='ward') { echo "selected";}}  ?>>Ward</option>									
										<option value="tax_deduction"  <?php if(!empty($postData['selectSortBy'])) { if($postData['selectSortBy']=='tax_deduction') { echo "selected";}}  ?>>Tax Deduction</option>									
							    </select>
							</div>
							<div class="form-group">
							    <select class="form-control selectboxcls" id="SortBy" name="SortBy">
								<option value="asc" <?php if(!empty($postData['SortBy'])) { if($postData['SortBy']=='asc') { echo "selected";}}  ?>>Asc</option>
								<option value="desc" <?php if(!empty($postData['SortBy'])) { if($postData['SortBy']=='desc') { echo "selected";}}  ?>>Desc</option>
																	
							    </select>
							</div>*/ ?>
            </div>
        
		<div class="row py-4 search_additionals_filters" id="additionals_filters" style="display:none;">
		<div class="col-md-3 mar-bot">
			<p class="ranage-slider-p">
			<label for="square">Square:</label>
			<input type="text" id="square" readonly class="range-slider-text" name="square" value="<?php if(!empty($postData['square'])) { echo $postData['square']; } ?>">
			</p>
			<div id="square_slider_range"></div>
		</div>

		<div class="col-md-3 mar-bot">
			<p class="ranage-slider-p">
			<label for="lot">Lot:</label>
			<input type="text" id="lot" readonly class="range-slider-text" name="lot" value="<?php if(!empty($postData['lot'])) { echo $postData['lot']; } ?>">
			</p>
			<div id="lot_slider_range"></div>
		</div>

		<div class="col-md-3 mar-bot">
			<p class="ranage-slider-p">
			<label for="amount">Sale Price:</label>
			<input type="text" id="sale-price" readonly class="range-slider-text" name="sale_price" value="<?php if(!empty($postData['sale_price'])) { echo $postData['sale_price']; } ?>">
			</p>
			<div id="sale-price-slider-range"></div>
		</div>
		<div class="col-md-3 mar-bot">
			<p class="ranage-slider-p">
			<label for="object_id">Object ID:</label>
			<input type="text" id="object_id" readonly s class="range-slider-text" name="object_id" value="<?php if(!empty($postData['object_id'])) { echo $postData['object_id']; } ?>">
			</p>
			<div id="object_slider_range"></div>
		</div>
		<div class="col-md-3 mar-bot">
			<p class="ranage-slider-p">
			<label for="price_par_square_feet">Square Feet Price:</label>
			<input type="text" id="price_par_square_feet" readonly style="width:137px;" class="range-slider-text" name="price_par_square_feet" value="<?php if(!empty($postData['price_par_square_feet'])) { echo $postData['price_par_square_feet']; } ?>">
			</p>
			<div id="price_par_square_feet_slider_range"></div>
		</div>
		<div class="col-md-3 mar-bot">
			<p class="ranage-slider-p">
			<label for="tax_record">Tax Record:</label>
			<input type="text" id="tax_record" readonly style="width:137px;" class="range-slider-text" name="tax_record" value="<?php if(!empty($postData['tax_record'])) { echo $postData['tax_record']; } ?>">
			</p>
			<div id="tax_record_slider_range"></div>
		</div>
		<div class="col-md-3 mar-bot">
			<p class="ranage-slider-p"> 
			<label for="taxable_value_total">Taxable Value:</label>
			<input type="text" id="taxable_value_total" readonly style="width:137px;" class="range-slider-text" name="taxable_value_total" value="<?php if(!empty($postData['taxable_value_total'])) { echo $postData['taxable_value_total']; } ?>">
			</p>
			<div id="taxable_value_total_slider_range"></div>
		</div>
		<div class="col-md-3 mar-bot">
			<p class="ranage-slider-p">
			<label for="year_built">Year Built:</label>
			<input type="text" id="year_built" readonly style="width:137px;" class="range-slider-text" name="year_built" value="<?php if(!empty($postData['year_built'])) { echo $postData['year_built']; } ?>">
			</p>
			<div id="year_built_slider_range"></div>
		</div>
		<div class="col-md-2 mar-bot">
			<!--<p class="ranage-slider-p">
			<label for="year_renovated">Year Renovated:</label>
			<input type="text" id="year_renovated" readonly style="width:137px;" class="range-slider-text" name="year_renovated">
			</p>
			<div id="year_renovated_slider_range"></div>-->
			<select class="form-control select2-show-search border-bottom-0" data-placeholder="Number of Families" name="year_renovated">
				<option value="0" selected>Year Renovated</option>
				<?php for($i=1900; $i <=2020; $i++){?>
					<option value="<?php echo $i;?>" <?php if(!empty($postData['year_renovated'])) { if($i==$postData['year_renovated']) { echo "selected";}}  ?>><?php echo $i;?></option><?php 
				}?>
				
			</select>
		</div>
		<div class="col-md-2 mar-bot">
			<!--<p class="ranage-slider-p">
			<label for="families">Number of Families:</label>
			<input type="text" id="number_of_families" readonly style="width: 100px;" class="range-slider-text" name="number_of_families">
			</p>
			<div id="number_of_families_slider_range"></div>-->
			<select class="form-control select2-show-search border-bottom-0" data-placeholder="Number of Families" name="number_of_families">
				<option value="0" selected>Number of Families</option>
				<?php for($i=1; $i <=500; $i++){?>
					<option value="<?php echo $i;?>" <?php if(!empty($postData['number_of_families'])) { if($i==$postData['number_of_families']) { echo "selected";}}  ?>><?php echo $i;?></option><?php 
				}?>
				
			</select>

		</div>

		<div class="col-md-2 mar-bot">
			<!--<p class="ranage-slider-p">
			<label for="beds">Beds:</label>
			<input type="text" id="beds" readonly style="width: 100px;" class="range-slider-text" name="beds">
			</p>
			<div id="beds_slider_range"></div>-->
			<select class="form-control select2-show-search border-bottom-0" data-placeholder="Select Beds" name="beds">
				<option value="0" selected>Beds</option>
				<?php for($i=1; $i <=20; $i++){?>
					<option value="<?php echo $i;?>" <?php if(!empty($postData['beds'])) { if($i==$postData['beds']) { echo "selected";}}  ?>><?php echo $i;?></option><?php 
				}?>
				
			</select>
		</div>
		<div class="col-md-2 mar-bot">
			<!--<p class="ranage-slider-p">
			<label for="bath">Bath:</label>
			<input type="text" id="bath" readonly style="width: 100px;" class="range-slider-text" name="bath">
			</p>
			<div id="bath_slider_range"></div>-->
			<select class="form-control select2-show-search border-bottom-0" data-placeholder="Select Bath" name="bath">
				<option value="0" selected>Bath</option>
				<?php for($i=1; $i <=20; $i++){?>
					<option value="<?php echo $i;?>" <?php if(!empty($postData['bath'])) { if($i==$postData['bath']) { echo "selected";}}  ?>><?php echo $i;?></option><?php 
				}?>
				
			</select>
		</div>
		<div class="col-md-2 mar-bot">
			<!--<p class="ranage-slider-p">
			<label for="squareFeet">Square Feet:</label>
			<input type="text" id="squareFeet" readonly style="width: 100px;" class="range-slider-text" name="squareFeet">
			</p>
			<div id="squareFeet_slider_range"></div>-->
			<select class="form-control select2-show-search border-bottom-0" data-placeholder="Select Square Feet" name="squareFeet">
				<option value="0" selected>Square Feet</option>
				<?php for($i=1; $i <=20; $i++){?>
					<option value="<?php echo $i;?>" <?php if(!empty($postData['squareFeet'])) { if($i==$postData['squareFeet']) { echo "selected";}}  ?>><?php echo $i;?></option><?php 
				}?>
				
			</select>
		</div>

		</div>
	
		
		</div>

	
	
	<div class="row justify-content-center">
          
		  <input type="hidden"  name="getuserid" value="<?php if(!empty($this->session->userdata('user_id'))) { echo $this->session->userdata('user_id'); }  ?>" id="getuserid">
		  <input type="hidden"  name="simplesearch" value="<?php if(!empty($postData['simplesearch'])) { echo $postData['simplesearch']; }  ?>" id="simplesearch">
		  <input type="hidden"  name="searchbox" value="<?php if(!empty($postData['searchbox'])) { echo $postData['searchbox']; }  ?>" id="searchbox">
		  <input type="submit" class="btn searchbtncls" name="submitBtn" value="Search" id="searchbtn">
          <button class="btn"  type="button" id="btnclose">Close</button>
           <?php if(empty($this->session->userdata('user_id'))){ ?>
          <button  id= "saveSearchbtnloginc" class="btn" type="button"  data-toggle="modal" data-target="#paymentModalCenter">Save Search</button>
        <?php } else{?>
            <input type="button" class="btn" name="saveSearchbtn" value="Save Search" id="saveSearchbtn">
           <?php } ?>
        </div>
    </div>
	
</div>

        <div class="container">
			<div class="modal modal1" id="myModalZipCode">
			   <div class="modal-dialog">
				  <div class="modal-content">
					 <!-- Modal Header -->
					 <div class="modal-header mod-head-cls">
						<h4 class="modal-title text-center">Choose Zipcode(s)</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					 </div>
					 <!-- Modal body -->
					<div class="modal-body">
						<div class="row" id="zipcodeDiv">
						<?php 
							foreach($zip as $resultZip){ ?>
								<div class="col-md-5">
									<div class="form-check"><?php echo $resultZip["zipcode"];?>
										<input name="zip[]" class="form-check-input caseZip" <?php if(!empty($postData['zip'])) { if(in_array($resultZip["zipcode"], $postData['zip'])) { echo "checked";} } ?> type="checkbox" value="<?php echo $resultZip["zipcode"];?>" id="defaultCheck1zip<?php echo $resultZip["zipid"];?>" >
										<label class="form-check-label" for="defaultCheck1zip<?php echo $resultZip["zipid"];?>">            
										</label>
									</div>        
								</div><?php 
							}
						?>
						</div>
					</div>
						 <!-- Modal footer -->
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
			<div class="modal modal1" id="myModalUse">
							<div class="modal-dialog">
								 <div class="modal-content">
								 <!-- Modal Header -->
									 <div class="modal-header mod-head-cls">
									 <h4 class="modal-title text-center">Choose Use(s)</h4>
									 <button type="button" class="close" data-dismiss="modal">&times;</button>
									 </div>
								 <!-- Modal body -->
									 <div class="modal-body">
										 <div class="row" id="prousecodeDiv">
											 <?php 
												foreach($pro_use as $resultUse){ ?>
												 <div class="col-md-5">
													 <div class="form-check"><?php echo $resultUse["pro_use"];?>
														<input name="use[]" class="form-check-input caseProUse"  <?php if(!empty($postData['use'])) { if(in_array($resultUse["pro_use"], $postData['use'])) { echo "checked";} } ?> type="checkbox" value="<?php echo $resultUse["pro_use"];?>" id="defaultCheckUse<?php echo $resultUse["id"];?>">
														<label class="form-check-label" for="defaultCheckUse<?php echo $resultUse["id"];?>">            
														</label>
													 </div>        
												 </div><?php 
												}
												?>
										 </div>
									</div>
								 <!-- Modal footer -->
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
			 <div class="modal modal1" id="myModalZoning">
						 <div class="modal-dialog">
							<div class="modal-content">
							   <!-- Modal Header -->
							   <div class="modal-header mod-head-cls">
								  <h4 class="modal-title text-center">Choose Zoning(s)</h4>
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
							   </div>
							   <!-- Modal body -->
							   <div class="modal-body">
								  <div class="row" id="zoningcodeDiv">
									 <?php 
										foreach($zoning as $resultzZoning){ ?>
									 <div class="col-md-5">
										<div class="form-check"><?php echo $resultzZoning["zoning"];?><input name="zoning[]" class="form-check-input caseZoning" type="checkbox" value="<?php echo $resultzZoning["zoning"];?>" id="defaultCheck1_zon<?php echo $resultzZoning["id"];?>"   <?php if(!empty($postData['zoning'])) { if(in_array($resultzZoning["zoning"], $postData['zoning'])) { echo "checked";} } ?>>
										   <label class="form-check-label" for="defaultCheck1_zon<?php echo $resultzZoning["id"];?>">            
										   </label>
										</div>
									 </div>
									 <?php 
										}
										?>
								  </div>
							   </div>
							   <!-- Modal footer -->
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
			 <div class="modal modal1" id="myModalNeighborhood">
						 <div class="modal-dialog">
							<div class="modal-content">
							   <!-- Modal Header -->
							   <div class="modal-header mod-head-cls">
								  <h4 class="modal-title text-center">Choose Neighborhood(s)</h4>
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
							   </div>
							   <!-- Modal body -->
							   <div class="modal-body">
								 <div class="row" id="neighborhoodcodeDiv">
										<?php 
										   foreach($neighborhood as $resultNeighborhood){ ?>
											<div class="col-md-5">
											   <div class="form-check"><?php echo $resultNeighborhood["neighborhood"];?><input name="neighborhood[]" class="form-check-input caseNeighborhood" type="checkbox" value="<?php echo $resultNeighborhood["neighborhood"];?>" id="defaultCheck1_neighborhood<?php echo $resultNeighborhood["id"];?>"  <?php if(!empty($postData['neighborhood'])) { if(in_array($resultNeighborhood["neighborhood"], $postData['neighborhood'])) { echo "checked";} } ?>>
												  <label class="form-check-label" for="defaultCheck1_neighborhood<?php echo $resultNeighborhood["id"];?>"> </label>
											   </div>
											</div>
										<?php 
										   }
										   ?>
									 </div>
								</div>
							   <!-- Modal footer -->
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
			<div class="modal modal1" id="myModalWard">
						 <div class="modal-dialog">
							<div class="modal-content">
							   <!-- Modal Header -->
							   <div class="modal-header mod-head-cls">
								  <h4 class="modal-title text-center">Choose Ward(s)</h4>
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
							   </div>
							   <!-- Modal body -->
							   <div class="modal-body">
								  <div class="row" id="wardcodeDiv">
										<?php 
										foreach($ward as $resultWard){ ?>
											<div class="col-md-5">
											   <div class="form-check"><?php echo $resultWard["ward"];?><input name="ward[]" class="form-check-input caseWard" type="checkbox" value="<?php echo $resultWard["ward"];?>" id="defaultCheck1_ward<?php echo $resultWard["id"];?>" <?php if(!empty($postData['ward'])) { if(in_array($resultWard["ward"], $postData['ward'])) { echo "checked";} } ?>>
												  <label class="form-check-label" for="defaultCheck1_ward<?php echo $resultWard["id"];?>">            
												  </label>
											   </div>
											</div>
											<?php 
										}
										   ?>
									 </div>
								 
							   </div>
							   <!-- Modal footer -->
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
			<div class="modal modal1" id="myModalTaxDeduction">
				<div class="modal-dialog">
					<div class="modal-content">
							   <!-- Modal Header -->
					   <div class="modal-header mod-head-cls">
						  <h4 class="modal-title text-center">Choose Homestead Tax Deduction(s)</h4>
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
					   </div>
					   <!-- Modal body -->
					   <div class="modal-body">
						 
							 <div class="row" id="tax_deductioncodeDiv">
								<?php 
								   foreach($tax_deduction as $resultTaxDeduction){ ?>
								<div class="col-md-5">
								   <div class="form-check"><?php echo $resultTaxDeduction["tax_deduction"];?>
									  <input name="taxDeduction[]" class="form-check-input caseTaxDeduction" type="checkbox" value="<?php echo $resultTaxDeduction["tax_deduction"];?>" id="defaultCheck1_tax_deduction<?php echo $resultTaxDeduction["id"];?>" <?php if(!empty($postData['taxDeduction'])) { if(in_array($resultTaxDeduction["tax_deduction"], $postData['taxDeduction'])) { echo "checked";} } ?>>
									  <label class="form-check-label" for="defaultCheck1_tax_deduction<?php echo $resultTaxDeduction["id"];?>">            
									  </label>
								   </div>
								</div>
								<?php 
								   }
								   ?>
							 </div>
						  
					   </div>
					   <!-- Modal footer -->
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
				
		</form>		



        <!------- Start Body Code ------->

	<div class="container-fluid" id="b-table">
		<table class="table table-responsive" id='postsList'>
			<thead>
	        	<tr>
		            <th scope="col" onclick="buysearch()">#</th>
		            <th scope="col">Owner Name</th>
		            <th scope="col">Zip</th>
		            <th scope="col" class="w-set1">Property Owned By</th>
		            <th scope="col">Tax Deduction</th>
		            <th scope="col">Zoning</th>
		            <th scope="col">Premises</th>
		            <!--<th scope="col">Use</th>
		            <th scope="col">Land Area</th>-->
		            <th scope="col">Sale Date</th>
		            <!--<th scope="col">Square</th>-->
		            <th scope="col" class="w-set1">View more</th>
                <th scope="col" class="w-set2">Owner Contact Info</th>
	        	</tr>
	        </thead>
			<tbody></tbody>
		</table>

		<!-- Paginate -->
		<div id='pagination' class="text-center my-5 v-page"></div>


			<!-- The Modal -->

	<div id="exampleModal" class="modal fade bs-example-modal-lg center" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	    	<!-- Modal header -->
	      <div class="modal-header mod-head-cls">
	      	<h4 class="modal-title text-center">Users Information</h4>
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
	          ×
	        </button>
	        <h4 class="modal-title" id="classModalLabel">
	             
	            </h4>
	      </div>
	      <div class="modal-body">
	        <table id="classTable" class="table table-bordered">
	          <thead>
	          </thead>
	          <tbody>
	            <tr>
	              <td>OWNER NAME</td>
	              <td id="owernameid"></td>
	            </tr>
	            <tr>  
	              <td>PREMISES</td>
	               <td id="premisesid"></td>
	            </tr>
	            <tr>
		            <td>ZIP</td>
		           <td id="zipid"></td>
	            </tr>
	            <tr>  
	              <td>Use Type</td>
	            	<td id="use_typeid"></td>
	            </tr>
	            <tr>  
	              <td>Address</td>
	            	<td id="addressid"></td>
	            </tr>
	            <tr>  
	              <td>TAX DEDUCTION</td>
	             <td id="taxid"></td>
	            </tr>
	             <tr>  
	              <td>ZONING</td>
	              <td id="zoningid"></td>
	            </tr>
	             <tr>  
	              <td>ward</td>
	              <td id="wardid"></td>
	            </tr>
	            <tr>  
	              <td>Neighborhood</td>
	              <td id="neighborhoodid"></td>
	            </tr>
	             <tr>  
	              <td>SQUARE</td>
	              <td id="squareid"></td>
	            </tr>
	            <tr>  
	              <td>Land Area</td>
	              <td id="land_areaid"></td>
	            </tr>
	             <tr>  
	              <td>SALE DATE</td>
	              <td id="saledateid"></td>
	            </tr>
	            <tr>  
	              <td>Sale Price</td>
	              <td id="sale_priceid"></td>
	            </tr>
	            <tr>  
	              <td>Recordation Date</td>
	              <td id="recordation_dateid"></td>
	            </tr>
	             <tr>  
	              <td>Total Tax Assessment 2019</td>
	              <td id="total_tax_assessment_2019id"></td>
	            </tr>
	             <tr>  
	              <td>Number of Families</td>
	              <td id="number_of_familiesid"></td>
	            </tr>
	             <tr>  
	              <td>Property By</td>
	            	<td id="propertybyid"></td>
	            </tr>
	            <tr>  
	              <td>Beds</td>
	              <td id="bedsid"></td>
	            </tr>
	            <tr>  
	              <td>bath</td>
	              <td id="bathid"></td>
	            </tr>
	            <tr>  
	              <td>Square Feet</td>
	              <td id="square_feetid"></td>
	            </tr>
	            <tr>  
	              <td>Price Per Square Feet</td>
	              <td id="price_per_square_feetid"></td>
	            </tr>
	             <tr>  
	              <td>Year Built</td>
	              <td id="year_builtid"></td>
	            </tr>
	            <tr>  
	              <td>Year Renovated</td>
	              <td id="year_renovatedid"></td>
	            </tr>
	            <tr>  
	              <td>Tax Record</td>
	              <td id="tax_recordid"></td>
	            </tr>
	              <tr>  
	              <td>Taxable Value Total</td>
	              <td id="taxable_value_totalid"></td>
	            </tr>
	          </tbody>
	        </table>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal">
	          Close
	        </button>
	      </div>
	    </div>
	  </div>
	</div>
	</div>
	


  <div class="modal modal1" id="myModalSaveSearch">
         <div class="modal-dialog">
          <div class="modal-content">
           <!-- Modal Header -->
           <div class="modal-header mod-head-cls">
            <h4 class="modal-title text-center">Save Search</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
           </div>
           <!-- Modal body -->
          <div class="modal-body">
            <div class="row" id="myModalSaveSearch">
                <div class="form-group">
                <label for="searchName">Search Name:</label>
                <input type="text" class="form-control" id="searchName" name="searchName">
                 <p id="error-save-search" style="display:none;">Please enter search name</p>
                </div>

              </div>
            <button type="button" class="btn btn-primary" name="saveSearchdatabtn"  id="saveSearchdatabtn">Save Search</button>
          </div>
             <!-- Modal footer -->
         
          </div>
        </div>
      </div>

   <div class="modal modal1" id="myModalSaveSearchmessage">
         <div class="modal-dialog">
          <div class="modal-content">
           <!-- Modal Header -->
           <div class="modal-header mod-head-cls">
            <h4 class="modal-title text-center">Save Search</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
           </div>
           <!-- Modal body -->
          <div class="modal-body">
            <div class="row">
                        <div class="col-md-12">
                          <p>Your search has been added successfully.you can check this search on dashboard  
						  
                           </p>
                        
                      </div>
              </div>
          
          </div>
             <!-- Modal footer -->
             <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
          </div>
        </div>
      </div>

    <div id="paymentModalCenter" class="modal modal1 loginclsme" role="dialog">
                               <div class="modal-dialog">
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
	
	<div id="buypaymentModalCenter" class="modal modal1 loginclsme" role="dialog">
                               <div class="modal-dialog">
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
									<p>We are sorry. Your session has been expired. Please purchase any of our plans to resume access to our data. Thank you 
									   &nbsp;&nbsp;&nbsp;
									   <a class="btn-link" href="#" data-toggle="modal" data-target="#myModalRegistration" onClick ="openRegistration();">Create an account</a>
									</p>
								 </div>
							  </div>
							  <!----------Login Div----------->
							  <div class="row">
								 <div class="card login-page my-4">
									<article class="card-body mx-auto" style="max-width: 350px;">
									   <h4 class="card-title mt-3 text-center">Sign in Account</h4>
									   <div class="col-md-12">
										  <?php
											 $this->load->helper('form');
											 $error = $this->session->flashdata('danger');
											 if($error){ ?>
												  <div class="alert alert-danger alert-dismissable">
													 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
													 <?php echo $this->session->flashdata('danger'); ?>                    
												  </div>
										  <?php } ?>
										  <?php  
											 $success = $this->session->flashdata('success');
											 if($success)
											 {
											 ?>
												  <div class="alert alert-success alert-dismissable">
													 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
													 <?php echo $this->session->flashdata('success'); ?>
												  </div>
										  <?php } ?>
										  <div class="row">
											 <div class="col-md-12">
												<?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
											 </div>
										  </div>
									   </div>
									   <p class="text-center">Get started with your account</p>
									   <p>
										  <a href="<?php echo $login_button;?>" class="btn btn-block btn-google"> <i class="fa fa-google"></i>   Login via Google</a>
										   <?php echo $facebook_login_url; ?>
										  <!--<a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>-->
									   </p>
									   <p class="divider-text">
										  <span class="bg-light">OR</span>
									   </p>
										<div class="alert alert-warning alert-dismissible fade show" role="alert" id="login-error" style="display:none;">
										Email and Password are invalid. Please try again with valid credentials
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
										</div>
									   <form id="my_form_login" action="" method="post" role="form" novalidate="" name="login-frm">
										  <div class="form-group input-group">
											 <div class="input-group-prepend">
												<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
											 </div>
											 <input id="login-email" name="email" class="form-control" placeholder="Email address" type="email" required="true">
										  </div>
										  <!-- form-group// -->
										  <div class="form-group input-group">
											 <div class="input-group-prepend">
												<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
											 </div>
											 <input id="login-pass" class="form-control" name="password" placeholder="Password" type="password" required="true">
										  </div>
										  <!-- form-group// -->
										  <div class="form-group">
											 <input type="submit" class="btn btn-primary btn-block" value="Sign In" name="sign-in" id="">
										  </div>
										  <!-- form-group// -->      
									   </form>
									</article>
								 </div>
								 <!-- card.// -->
							  </div>
						   </div>
						   <!-- Modal footer -->
						</div>
					

                  </div>
    </div>
	
	 