<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   ?>
<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/mysql/custom.css">-->
<section class="top-space">
	<div class="container">
   <div class="row">
   <div class="col-md-12">
              <form action="<?php echo base_url();?>searching" method="POST">
            <input  type="hidden" value="<?php echo base_url();?>" id="baseUrl">
            <div class="row">
            <div class="form-group form-group11">
               <h5 class="text-center heading pt-5">My SQl Interface</h5>
               <div class="row">
	               <div class="form-check sub-heading col-6">
	                  Property Owned By Person
	                  <input class="form-check-input" type="checkbox" value="person" name="propertyCheck[]" id="defaultCheckPerson">
	                  <label class="form-check-label" for="defaultCheckPerson"></label>
	               </div>
	               <div class="form-check sub-heading col-6">
	                  Property Owned By Business
	                  <input class="form-check-input" type="checkbox" value="business" name="propertyCheck[]" id="defaultCheckBusiness">
	                  <label class="form-check-label" for="defaultCheckBusiness">            
	                  </label>
	               </div>
	           </div>
	           <div class="row">
	               <div class="form-check sub-heading col-6">
	                  Property Owned By Government
	                  <input class="form-check-input" type="checkbox" value="govt"  name="propertyCheck[]" id="defaultCheckGovernment">
	                  <label class="form-check-label" for="defaultCheckGovernment">            
	                  </label>
	               </div>
	               <div class="form-check sub-heading col-6">
	                  Owns Multiple Properties
	                  <input class="form-check-input" type="checkbox" value="" id="defaultCheckMultipleProperties">
	                  <label class="form-check-label" for="defaultCheckMultipleProperties">            
	                  </label>
	               </div>
	           </div>
               <div class="row">
                  <div class="col-md-4">
                     <button id="zipcodeId"  rel="zip" type="button" class="btn btn-primary form-btn zipcodeCls " data-toggle="modal" data-target="#myModalZipCode">Select Zipcode(s)</button>
                     <!-- The Modal1 -->
                     <div class="container">
                        <div class="modal" id="myModalZipCode">
                           <div class="modal-dialog modal-lg">
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
											<div class="col-md-4">
												<div class="form-check"><?php echo $resultZip["zipcode"];?>
													<input name="zip[]" class="form-check-input caseZip" type="checkbox" value="<?php echo $resultZip["zipcode"];?>" id="defaultCheck1zip<?php echo $resultZip["zipid"];?>" >
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
											 <div class="offset-md-1 col-md-5">
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
				
				
				</div>
				<div class="col-md-4">
				 <button type="button" class="btn btn-primary form-btn" data-toggle="modal" data-target="#myModalUse">Select Use(s)</button>
				 <!-- The Modal1 -->
					 <div class="container">
						 <div class="modal" id="myModalUse">
							<div class="modal-dialog modal-dialog1">
								 <div class="modal-content">
								 <!-- Modal Header -->
									 <div class="modal-header mod-head-cls">

									 <h4 class="modal-title text-center ">Choose Use(s)</h4>
									 <button type="button" class="close" data-dismiss="modal">&times;</button>
									 </div>
								 <!-- Modal body -->
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
												 </div><?php 
												}
												?>
										 </div>
									</div>
								 <!-- Modal footer -->
								 <div class="modal-footer">
									 <div class="row">
										<div class="offset-md-2 col-md-4">
											<button type="button" class="btn form-btn" data-dismiss="modal" data-toggle="modal" data-target="#myModalZoning">Move to screen 3</button>
										</div>
										<div class="col-md-4">
											<button type="button" class="btn form-btn" id="clearProUsebtn" rel="pro_use">Clear Filters</button>
										</div>
									 </div>
								 </div>
							 </div>
						 </div>
					 </div>
					 </div>
				</div>
				<div class="col-md-4">
				   <button type="button" rel="zoning" class="btn btn-primary form-btn" data-toggle="modal" data-target="#myModalZoning">Select Zoning(s)</button>
				   <!-- The Modal1 -->
				   <div class="container">
					  <div class="modal" id="myModalZoning">
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
							   <!-- Modal footer -->
							   <div class="modal-footer">
								  <div class="row">
									 <div class="offset-md-2 col-md-4">
										<button type="button" class="btn form-btn" data-dismiss="modal" 
										   data-toggle="modal" data-target="#myModalNeighborhood">Move to screen 4</button>
									 </div>
									 <div class="col-md-4">
										<button type="button" class="btn form-btn" id="clearZoningbtn" rel="zoning">Clear Filters</button>
									 </div>
								  </div>
							   </div>
							</div>
						 </div>
					  </div>
				   </div>
				</div>
			   <div class="col-md-4">
				   <button type="button" class="btn btn-primary form-btn" data-toggle="modal" data-target="#myModalNeighborhood">Select Neighbourhood(s)</button>
				   <!-- The Modal1 -->
				   <div class="container">
					  <div class="modal" id="myModalNeighborhood">
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
							   <!-- Modal footer -->
							   <div class="modal-footer">
								  <div class="row">
									 <div class="offset-md-2 col-md-4">
										<button type="button" class="btn form-btn" data-dismiss="modal" data-toggle="modal" data-target="#myModalWard">Move to screen 5</button>
									 </div>
									 <div class="col-md-4">
										<button type="button" class="btn form-btn" id="clearNeighborhoodbtn">Clear Filters</button>
									 </div>
								  </div>
							   </div>
							</div>
						 </div>
					  </div>
				   </div>
				</div>
				<div class="col-md-4">
				   <button type="button" class="btn btn-primary form-btn" data-toggle="modal" data-target="#myModalWard">Select Ward(s)</button>
				   <!-- The Modal1 -->
				   <div class="container">
					  <div class="modal" id="myModalWard">
						 <div class="modal-dialog modal-dialog2">
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
							   <!-- Modal footer -->
							   <div class="modal-footer">
								  <div class="row">
									 <div class="offset-md-2 col-md-4">
										<button type="button" class="btn form-btn" data-dismiss="modal" data-toggle="modal" data-target="#myModalTaxDeduction">Move to screen 6</button>
									 </div>
									 <div class="col-md-4">
										<button type="button" class="btn form-btn" id="clearWardbtn">Clear Filters</button>
									 </div>
								  </div>
							   </div>
							</div>
						 </div>
					  </div>
				   </div>
				</div>
				<div class="col-md-4">
				   <button type="button" class="btn btn-primary form-btn" data-toggle="modal" data-target="#myModalTaxDeduction">Select Homestead Tax Deduction(s)</button>
				   <!-- The Modal1 -->
				   <div class="container">
					  <div class="modal" id="myModalTaxDeduction">
						 <div class="modal-dialog modal-dialog2">
							<div class="modal-content">
							   <!-- Modal Header -->
							   <div class="modal-header mod-head-cls">
								  <h4 class="modal-title text-center">Choose Ward(s)</h4>
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
							   </div>
							   <!-- Modal body -->
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
							   <!-- Modal footer -->
							   <div class="modal-footer">
								  <div class="row">
									 <div class="offset-md-1 col-md-5">
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
         </div>
			<h5 class="text-center sub-heading pt-5">Please Enter A Land Range Between 112 and 12919556</h5>
			<div class="row pt-4">
			   <div class="col-md-5">
				  <div class="form-group">
					 <input type="text" class="form-control numbervalidation" id="land_range_start" name="land_range_start" placeholder="Please Enter Start Land Range ">
					 <span class="error-cls" id="error_land_range_start" style="display:none;">Please enter value greater than 112</span>
				  </div>
			   </div>
			   <div class="col-md-2"></div>
			   <div class="col-md-5">
				  <div class="form-group">
					 <input type="text" class="form-control numbervalidation" id="land_range_end" name="land_range_end" placeholder="Please Enter End Land Range ">
					 <span class="error-cls" id="error_land_range_end" style="display:none;">Please enter value greater than 112 and less than 12919556</span>
				  </div>
			   </div>
			</div>
			<h5 class="text-center sub-heading pt-5">Please Enter A Sale Date Range Between 1900-01-01 and 2019-10-22</h5>
			<div class="row pt-4">
			   <div class="col-md-5">
				  <div class="form-group">
					 <input type="text" readonly="" class="form-control" id="from" name="fromSaleDate"  placeholder="" value="">
				  </div>
			   </div>
			   <div class="col-md-2"></div>
			   <div class="col-md-5">
				  <div class="form-group">
					 <input type="text"  readonly="" class="form-control" id="to" name="toSaleDate" placeholder="">
				  </div>
			   </div>
			</div>
			<h5 class="text-center sub-heading pt-5">Please Enter A Square Range Between 4 and 6277</h5>
			<div class="row pt-4">
			   <div class="col-md-5">
				  <div class="form-group">
					 <input type="text" class="form-control numbervalidation" id="square_start" name="square_start" placeholder="Please Enter A Start Square Value" >
					 <span class="error-cls" id="error_square_start" style="display:none;">Please enter square value greater than 4</span>
				  </div>
			   </div>
			   <div class="col-md-2"></div>
			   <div class="col-md-5">
				  <div class="form-group">
					 <input type="text" class="form-control numbervalidation" id="square_end" name="square_end"  placeholder="Please Enter A End Square Value">
					 <span class="error-cls" id="error_square_end" style="display:none;">Please enter square value greater than 4 and less than 6277</span>
				  </div>
			   </div>
			</div>
          <h5 class="text-center pt-5">Sort By</h5>
            <div class="row">
                     <div class="col-md-4">
                       <div class="box2" id="box7">
                         <p>Owner Name</p>
                       </div>
                     </div>
                     <div class="col-md-4">
                       <div class="box2" id="box8">
                         <p>Permises</p>
                       </div>
                     </div>
                     <div class="col-md-4">
                       <div class="box2" id="box9">
                         <p>Use</p>
                       </div>
                     </div>
                     <div class="col-md-4">
                       <div class="box2" id="box10">
                         <p>Zip</p>
                       </div>
                     </div>
                     <div class="col-md-4">
                       <div class="box2" id="box11">
                         <p>Address Type</p>
                       </div>
                     </div>
                     <div class="col-md-4">
                       <div class="box2" id="box12">
                         <p>Homestead Tax Deduction</p>
                       </div>
                     </div>
                     <div class="col-md-4">
                       <div class="box2" id="box13">
                         <p>Zoning</p>
                       </div>
                     </div>
                     <div class="col-md-4">
                       <div class="box2" id="box14">
                         <p>Neighbourhood</p>
                       </div>
                     </div>
                     <div class="col-md-4">
                       <div class="box2" id="box15">
                         <p>Ward</p>
                       </div>
                     </div>
                     <div class="col-md-4">
                       <div class="box2" id="box16">
                         <p>Land Area</p>
                       </div>
                     </div>
                     <div class="col-md-4">
                       <div class="box2" id="box17">
                         <p>Sale Date</p>
                       </div>
                     </div>
                     <div class="col-md-4">
                       <div class="box2" id="box18">
                         <p>Multiple Properties Owned</p>
                       </div>
                     </div>
                     <div class="col-md-4"></div>
                     <div class="col-md-4">
                       <div class="box2" id="box19">
                         <p>Square</p>
                       </div>
                     </div>
            </div>
            
			 <div class="row">
				<div class="col-md-4">
					<button type="button" class="btn form-btn">Download Data</button>
				</div>
				<div class="col-md-4">
					<input type="submit" class="btn form-btn" name="submitBtn" value="View Data">
				</div>
				<div class="col-md-4">
					<button type="button" class="btn form-btn">Clear All</button>
				</div>
			 </div>
         </div>
         </form>
      
	  
		</div>
	</div>
</div>


</section>
<!--Section-->