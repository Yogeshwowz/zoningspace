<!--Start Section-->

<section class="homepage mt-0">
	<div class="banner-1 cover-image sptb-2 sptb-tab bg-background2 pt-5" data-image-src="<?php echo base_url();?>assets/images/banners/banner1.jpg">
		<div class="header-text mb-0">
			<div class="container">
				<div class="text-center text-white mb-7">
					<h1 class="mb-3">The City's Complete Property Inventory</h1>
					<p>Searchable By Parameters That Are Important to Investors.</p>
				</div>

    						
    			</div>
    	    </div>
    	    
    	    
			<form action="<?php echo base_url()?>searching-map" method="post">
			<div class="container" id="body-nav2">
<!---------------- Start Sections Part  -------------------->  


        <div class="row py-4">
            <div class="col-md-3">
                <button type="button"  id="zoningId" rel="zoning" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#myModalZoning">Select Zoning(s)</button>
            </div>
            <div class="col-md-3">
                <button type="button"  id="selectUseId"  rel="selectUse"  class="btn form-btn common-select-cls" data-toggle="modal" data-target="#myModalUse">Select Use(s)</button>
            </div>
             <div class="col-md-3">
                <div class="box2 colo-btn">
                    <input type="radio" name="selectRange" autocomplete="off" class="radio-disable selectRadioBtn radio-active" value="landRange"> Land Area
                </div>
            </div>
            <div class="col-md-3">
                <button id="zipcodeId"  rel="zip" type="button" class="btn form-btn zipcodeCls  common-select-cls" data-toggle="modal" data-target="#myModalZipCode">Select Zipcode(s)</button>
            </div>
            <div class="col-md-12">
    		  <div class="lrange" id="lrange">
                  <h5 class="sub-heading pt-5">Please Enter A Land Area Between 112 and 12919556</h5>
                  <div class="row py-4 ">
                     <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                           <input type="text" class="form-control numbervalidation" id="land_range_start" name="land_range_start" placeholder="Please Enter Start Land Area ">
                           <span class="error-cls" id="error_land_range_start" style="display:none;">Please enter value greater than 112</span>
                        </div>
                     </div>
                     <div class="col-md-1"></div>
                     <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                           <input type="text" class="form-control numbervalidation" id="land_range_end" name="land_range_end" placeholder="Please Enter End Land Area ">
                           <span class="error-cls" id="error_land_range_end" style="display:none;">Please enter value greater than 112 and less than 12919556</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
                <button type="button"  id="selectNeighbourhoodId" rel="selectNeighbourhood" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#myModalNeighborhood">Select Neighborhood(s)</button>
            </div>
            <div class="col-md-3">
                <button type="button"  id="selectWardId"  rel="selectWard" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#myModalWard">Select Ward(s)</button>
            </div>
            <div class="col-md-3">
                <button type="button" id="selectTaxDeductionId"  rel="selectTaxDeduction" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#myModalTaxDeduction">Select Homestead Tax Deduction(s)</button>
            </div>
            <div class="col-md-3">
              <div class="box2 colo-btn">
                 <input type="radio" name="selectRange" autocomplete="off" class="radio-disable selectRadioBtn radio-active" value="saleDate">Last Sale Date
              </div>
            </div>
            <div class="col-md-12">   
               <div class="drange" id="drange">
                  <h5 class="sub-heading pt-5">Please Enter A Sale Date Range Between 1900-01-01 and 2019-10-22</h5>
                  <div class="row py-4">
                     <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                           <input type="text" readonly="" class="form-control" id="from" name="fromSaleDate"  placeholder="Please Enter Start Sale Date" value="">
                        </div>
                     </div>
                     <div class="col-md-1"></div>
                     <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                           <input type="text"  readonly="" class="form-control" id="to" name="toSaleDate" placeholder="Please Enter End Sale Date">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
        </div>
        
		<div class="row">
    		<div class="col-xl-9 col-lg-9 col-md-9 d-block mx-auto">
    	       
    				<div class="search-background bg-transparent w-100">
    					<div class="form row no-gutters">
    					            <div class=" col-md-1 mb-0 text-white incenter">
        						        <span>Within</span>
        						    </div>
        						    <!--<input type="number" name="miles" class="search-mile" placeholder="Enter miles" min="1" max="500">-->
        						    <div class=" col-md-2 mb-0 text-white">
            						    <select class="form-control select2-show-search border-bottom-0 search-mile w-50 incenter" data-placeholder="Select Miles" name="miles">
                    						<option value="1" selected>Select Miles</option>
                    					
										<?php for($i=1; $i <=50; $i++){?>
											<option value="<?php echo $i;?>"><?php echo $i;?></option><?php 
										}?>


									  </select>
                			        
									</div>
                			        <div class=" col-md-1 mb-0 text-white incenter">
        						        <span>From</span>
        						    </div>
    						<div class="col-md-8 form-group bg-white location-search">
    							<input type="text" class="form-control input-lg" id="searchboxForAddress"  name="searchboxForAddress" placeholder="Enter Loaction, Landmark" autocomplete="off" >
    							
    						</div>
    						
    						<!--<div class="col-md-3 search-mile">
                                <select class="form-control select2-show-search border-bottom-0" data-placeholder="Select mile" name="Select mile">
            						<option value="0" selected>Select mile</option>
            						<option value="1">10 miles</option>
            						<option value="2">15 miles</option>
            						<option value="3">20 miles</option>
            						<option value="4">25 miles</option>
            						<option value="5">30 miles</option>
            						<option value="6">40 miles</option>
            						<option value="7">50 miles</option>
        				        </select>
                            </div>-->
    								
    						<!--<div class=" col-md-2 mb-0">-->
    						<!--<button type="submit" class="btn btn-lg btn-block btn-primary br-tr-md-0 br-br-md-0" name="submitBtn"><i class="fa fa-search" aria-hidden="true"></i></button>-->
    						<!--</div>-->
    							<div class="form-group  mb-0 search_data">
    								<div class="serachdatadivForAddress">
    									<ul id="resultsForAddress"></ul>
    									<span id="loadingForAddress">Loading Please wait...</span>
    								</div>
    							</div>
    
    					</div>
    				</div>
    			
    		</div>
    		<div class="col-xl-3 col-lg-3 col-md-3 d-block mx-auto">
                      <div class="box2 filterbtn m-0">
                         <input type="radio" name="selectRange" autocomplete="off" class="radio-disable selectRadioBtn radio-active text-white" value="squareRange"> View Additionals Filters<span class="pl-2"><i class="fa fa-sort-desc filter-icon" aria-hidden="true"></i></span>
                      </div>
    		</div>
    	</div>
    	
<div class="row py-4" id="additionals_filters" style="display:none;">
<!--<div class="col-md-3 mar-bot">
	<p class="ranage-slider-p">
	<label for="square">Square:</label>
	<input type="text" id="square" readonly class="range-slider-text" name="square">
	</p>
	<div id="square_slider_range"></div>
</div>

<div class="col-md-3 mar-bot">
	<p class="ranage-slider-p">
	<label for="lot">Lot:</label>
	<input type="text" id="lot" readonly class="range-slider-text" name="lot">
	</p>
	<div id="lot_slider_range"></div>
</div>
-->

<!---------------------------------- Start View Additional Filters Buttons-------------------->

<div class="col-md-4">
    <button type="button"  id="saleprice" class="btn form-btn common-select-cls">Sale Price</button>
    <div class="salepriceinput">
        <div class="row py-4">
             <div class="col-md-6 col-sm-6">
                <div class="form-group">
                   <input type="text" class="form-control numbervalidation" id="land_range_start" name="land_range_start" placeholder="Enter Start Sale Price">
                   <span class="error-cls" id="error_land_range_start" style="display:none;">Enter Start Sale Price</span>
                </div>
             </div>
             <div class="col-md-6 col-sm-6">
                <div class="form-group">
                   <input type="text" class="form-control numbervalidation" id="land_range_end" name="land_range_end" placeholder="Enter End Sale Price">
                   <span class="error-cls" id="error_land_range_end" style="display:none;">Enter End Sale Price</span>
                </div>
             </div>
        </div>
    </div>
</div>

<div class="col-md-4">
    <button type="button"  id="taxablevalue" class="btn form-btn common-select-cls">Taxable Value</button>
    <div class="taxablevalueinput">
        <div class="row py-4">
             <div class="col-md-6 col-sm-6">
                <div class="form-group">
                   <input type="text" class="form-control numbervalidation" id="land_range_start" name="land_range_start" placeholder="Enter Start Taxable Value">
                   <span class="error-cls" id="error_land_range_start" style="display:none;">Enter Start Taxable Value</span>
                </div>
             </div>
             <div class="col-md-6 col-sm-6">
                <div class="form-group">
                   <input type="text" class="form-control numbervalidation" id="land_range_end" name="land_range_end" placeholder="Enter End Taxable Value">
                   <span class="error-cls" id="error_land_range_end" style="display:none;">Enter End Taxable Value</span>
                </div>
             </div>
        </div>
    </div>
</div>

<div class="col-md-4">
    <button type="button"  id="entercount" class="btn form-btn common-select-cls">Count</button>
    <div class="entercountinput">
        <div class="row py-4">
             <div class="col-md-6 col-sm-6">
                <div class="form-group">
                   <input type="text" class="form-control numbervalidation" id="land_range_start" name="land_range_start" placeholder="Enter Start Count">
                   <span class="error-cls" id="error_land_range_start" style="display:none;">Enter Start Count</span>
                </div>
             </div>
             <div class="col-md-6 col-sm-6">
                <div class="form-group">
                   <input type="text" class="form-control numbervalidation" id="land_range_end" name="land_range_end" placeholder="Enter End Count">
                   <span class="error-cls" id="error_land_range_end" style="display:none;">Enter End Count</span>
                </div>
             </div>
        </div>
    </div>
</div>

<div class="col-md-4">
    <button type="button"  id="squarefeet" class="btn form-btn common-select-cls">Square Feet</button>
    <div class="squarefeetinput">
        <div class="row py-4">
             <div class="col-md-6 col-sm-6">
                <div class="form-group">
                   <input type="text" class="form-control numbervalidation" id="land_range_start" name="land_range_start" placeholder="Enter Start Square Feet">
                   <span class="error-cls" id="error_land_range_start" style="display:none;">Enter Start Square Feet</span>
                </div>
             </div>
             <div class="col-md-6 col-sm-6">
                <div class="form-group">
                   <input type="text" class="form-control numbervalidation" id="land_range_end" name="land_range_end" placeholder="Enter End Square Feet">
                   <span class="error-cls" id="error_land_range_end" style="display:none;">Enter End Square Feet</span>
                </div>
             </div>
        </div>
    </div>
</div>

<div class="col-md-4">
    <button type="button"  id="pricepersquarefeet" class="btn form-btn common-select-cls">Price Per Square Feet</button>
    <div class="pricepersquarefeetinput">
        <div class="row py-4">
             <div class="col-md-6 col-sm-6">
                <div class="form-group">
                   <input type="text" class="form-control numbervalidation" id="land_range_start" name="land_range_start" placeholder="Enter Start Price Per Square Feet">
                   <span class="error-cls" id="error_land_range_start" style="display:none;">Enter Start Price Per Square Feet</span>
                </div>
             </div>
             <div class="col-md-6 col-sm-6">
                <div class="form-group">
                   <input type="text" class="form-control numbervalidation" id="land_range_end" name="land_range_end" placeholder="Enter End Price Per Square Feet">
                   <span class="error-cls" id="error_land_range_end" style="display:none;">Enter End Price Per Square Feet</span>
                </div>
             </div>
        </div>
    </div>
</div>

<div class="col-md-4">
    <button type="button"  id="yearrenovated" class="btn form-btn common-select-cls">Year Renovated</button>
    <div class="yearrenovatedinput">
        <div class="row py-4">
             <div class="col-md-6 col-sm-6">
                <div class="form-group">
                   <input type="text" class="form-control numbervalidation" id="land_range_start" name="land_range_start" placeholder="Enter Start Year Renovated">
                   <span class="error-cls" id="error_land_range_start" style="display:none;">Enter Start Year Renovated</span>
                </div>
             </div>
             <div class="col-md-6 col-sm-6">
                <div class="form-group">
                   <input type="text" class="form-control numbervalidation" id="land_range_end" name="land_range_end" placeholder="Enter End Year Renovated">
                   <span class="error-cls" id="error_land_range_end" style="display:none;">Enter End Year Renovated</span>
                </div>
             </div>
        </div>
    </div>
</div>

<div class="col-md-4">
    <button type="button"  id="yearbuilt" class="btn form-btn common-select-cls">Year Built</button>
    <div class="yearbuiltinput">
        <div class="row py-4">
             <div class="col-md-6 col-sm-6">
                <div class="form-group">
                   <input type="text" class="form-control numbervalidation" id="land_range_start" name="land_range_start" placeholder="Enter Start Year Built">
                   <span class="error-cls" id="error_land_range_start" style="display:none;">Enter Start Year Built</span>
                </div>
             </div>
             <div class="col-md-6 col-sm-6">
                <div class="form-group">
                   <input type="text" class="form-control numbervalidation" id="land_range_end" name="land_range_end" placeholder="Enter End Year Built">
                   <span class="error-cls" id="error_land_range_end" style="display:none;">Enter End Year Built</span>
                </div>
             </div>
        </div>
    </div>
</div>

<!---------------------------------- Add Drop Down Box-------------------->

<div class="col-md-4 mar-bot">

	<select class="form-control select2-show-search border-bottom-0" data-placeholder="Select Beds" name="beds">
		<option value="0" selected>Beds</option>
		<?php for($i=1; $i <=20; $i++){?>
			<option value="<?php echo $i;?>"><?php echo $i;?></option><?php 
		}?>
		
	</select>
</div>
<div class="col-md-4 mar-bot">
	
	<select class="form-control select2-show-search border-bottom-0" data-placeholder="Select Bath" name="bath">
		<option value="0" selected>Bath</option>
		<?php for($i=1; $i <=20; $i++){?>
			<option value="<?php echo $i;?>"><?php echo $i;?></option><?php 
		}?>
		
	</select>
</div>

<!--------------------- End Here------------------------------------>

<!---------------------------------- End View Additional Filters Buttons-------------------->

</div>    	
        
           <div class="row pt-3">
	               <div class="form-check sub-heading col-md-3 col-sm-6 checkbox-blue" >
	                	<div class="row">
	                  		<div class="col-10 text-align-left"> Property Owned By Person</div>
	                 		<div class="col-1">
			                	<div class="custom-control form-control-lg custom-checkbox">  
			    					<input type="checkbox" class="custom-control-input" value="person" name="propertyCheck[]" id="defaultCheckPerson">
			    					<label class="custom-control-label" for="defaultCheckPerson"></label>
		    					</div>
	            			</div>
	            		</div>
	               	</div>
	               <div class="form-check sub-heading col-md-3 col-sm-6 checkbox-blue">
	                <div class="row">
	                	<div class="col-10 text-align-left"> Property Owned By Business</div>
		                <div class="col-1">
			                <div class="custom-control form-control-lg custom-checkbox">  
		    					<input type="checkbox" class="custom-control-input" value="business" name="propertyCheck[]" id="defaultCheckBusiness">
		    					<label class="custom-control-label" for="defaultCheckBusiness"></label></div>
			            	</div>
	            	</div>
	               </div>
	               <div class="form-check sub-heading col-md-3 col-sm-6 checkbox-blue">
	                <div class="row">
	                	<div class="col-10 text-align-left"> Property Owned By Government</div>
		                <div class="col-1">
			                <div class="custom-control form-control-lg custom-checkbox">  
		    					<input type="checkbox" class="custom-control-input" value="govt"  name="propertyCheck[]" id="defaultCheckGovernment">
		    					<label class="custom-control-label" for="defaultCheckGovernment"></label></div>
			            	</div>
	            	</div>
	               </div>
	               <div class="form-check sub-heading col-md-3 col-sm-6 checkbox-blue" >
	                <div class="row">
	                	<div class="col-10 text-align-left"> Owns Multiple Properties</div>
		                <div class="col-1">
			                <div class="custom-control form-control-lg custom-checkbox">  
		    					<input type="checkbox" class="custom-control-input" value="property_owns_multiple" id="defaultCheckMultipleProperties" name="property_owns_multiple" >
		    					<label class="custom-control-label" for="defaultCheckMultipleProperties"></label></div>
			            	</div>
	            	</div>
	               </div>
	           </div>   
    </div>

        
<!---------------- End Sections Part  --------------------> 

<!--Section-->
<section class="sptb1 top-space1" id="advancedsearch">
 <div class="container">
    <div class="row">
       <div class="col-12">
          <input  type="hidden" value="<?php echo base_url();?>" id="baseUrl">
          <div class="row">
             <div class="form-group form-group11">
                <div class="row advanbtn justify-content-center">
                    <div class="col-md-2 sort-btn">
                        <select class="form-control select2-show-search border-bottom-0" data-placeholder="Select Sort By" name="selectSortBy">
    						<option value="1" selected>Sort By</option>
    						<option value="owername"> Owner Name</option>
    						<option value="zipcode"> Zip</option>
    						<option value="zoning">Zoning</option>
    						<option value="neighborhood">Neighborhood</option>
    						<option value="ward">Ward</option>
    						<option value="use">Use(s)</option>
    						<option value="tax_deduction">Homestead Tax Deduction</option>
				        </select>
                    </div>
                    
                    <div class="col-md-2">
        				 <?php /* 
        				 	if(!empty($resultUser['visitor_expiry_time']) && ($resultUser['status'])==1 && (empty($this->session->userdata('email')))){ ?>	
        					<button class="btn form-btn viewbtn" type="button"  data-toggle="modal" data-target="#paymentModalCenter">View Data</button>
        				<?php } else {?>
        					<input type="submit" class="btn form-btn viewbtn" name="submitBtn" value="View Data">
        				<?php } */
        				  ?>
						  
						  <input type="hidden"  name="mappage" value="1">
						  <input type="submit" class="btn form-btn viewbtn" name="submitBtn" value="View Data">
				    </div>



				<div class="col-md-2">
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
</div>
			
		</div>
	</div>
</section>	
<!--Start PopUp Section-->
<div class="form-group form-group11 mb-0">

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
                       <div class="row w-100">
                          <div class="col-md-4">
                             
                          </div>
                          <div class="col-md-4">
                             <button type="button" class="btn form-btn" id="clearZipbtn" rel="zip">Clear Filters</button>
                          </div>
                          <div class="col-md-4">
                             <button type="button"  class="btn form-btn model-next-cls enter-cls" >Enter<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span></button>
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
               <div class="row  w-100">
                  <div class="col-md-4">
                      
                  </div>
                  <div class="col-md-4">
                     <button type="button" class="btn form-btn" id="clearProUsebtn" rel="pro_use">Clear Filters</button>
                  </div>
                  <div class="col-md-4">
                     <button type="button"  class="btn form-btn enter-cls">Enter<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span></button>
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
                   <div class="row w-100">
                       <div class="col-md-4">
                             
                        </div>
                        <div class="col-md-4">
                         <button type="button" class="btn form-btn" id="clearZoningbtn" rel="zoning">Clear Filters</button>
                        </div>
                        <div class="col-md-4">
                         <button type="button"  class="btn form-btn model-next-cls enter-cls" >Enter<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span></button>
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
               <div class="row  w-100">
                        <div class="col-md-4">
                           
                        </div>
                      <div class="col-md-4">
                         <button type="button" class="btn form-btn" id="clearNeighborhoodbtn">Clear Filters</button>
                      </div>
                      <div class="col-md-4">
                         <button type="button"   class="btn form-btn model-next-cls enter-cls" >Enter<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span></button>
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
               <div class="row w-100">
                  <div class="col-md-4">
                            
                  </div>
                  <div class="col-md-4">
                     <button type="button" class="btn form-btn" id="clearWardbtn">Clear Filters</button>
                  </div>
                  <div class="col-md-4">
                     <button type="button"   class="btn form-btn model-next-cls enter-cls" >Enter<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span></button>
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
                           <h4 class="modal-title text-center">Select Homestead Tax Deduction(s)</h4>
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
                       <div class="row w-100">
                          <div class="col-md-4">
                             
                          </div>
                          <div class="col-md-4">
                             <button type="button" class="btn form-btn" id="clearTaxDeductionbtn">Clear Filters</button>
                          </div>
                          <div class="col-md-4">
                             <button type="button" class="btn form-btn model-next-cls enter-cls" >Next<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span></button>
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
<div id="paymentModalCenter" class="modal fade" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header mod-head-cls" style="background-color: #ed5151 !important;">
            <h4 class="modal-title text-center" >Notification </h4>
            <button type="button" class="close close-btn" data-dismiss="modal">??</button>
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