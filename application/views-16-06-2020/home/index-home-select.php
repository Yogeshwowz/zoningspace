<!--Start Section-->
<form action="<?php echo base_url()?>searching" method="post">
<section class="homepage">
	<div class="banner-1 cover-image sptb-2 sptb-tab bg-background2" data-image-src="<?php echo base_url();?>assets/images/banners/banner1.jpg">
		<div class="header-text mb-0">
			<div class="container">
				<div class="text-center text-white mb-7">
					<h1 class="mb-3">It's Officially a Buyers Market</h1>
					<p>Access DC's Entire Building Inventory by Zoning, Land Area and Other Advanced Characteristics.</p>
				</div>
			</div>
			
			<div class="container" id="body-nav2">
<!---------------- Start Sections Part  -------------------->  


        <div class="row py-4">
            <div class="col-md-4">
                <button id="zipcodeId"  rel="zip" type="button" class="btn form-btn zipcodeCls  common-select-cls" data-toggle="modal" data-target="#myModalZipCode">Select Zipcode(s)</button>
            </div>
            <div class="col-md-4">
                <button type="button"  id="selectUseId"  rel="selectUse"  class="btn form-btn common-select-cls" data-toggle="modal" data-target="#myModalUse">Select Use(s)</button>
            </div>
            <div class="col-md-4">
                <button type="button"  id="zoningId" rel="zoning" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#myModalZoning">Select Zoning(s)</button>
            </div>
            <div class="col-md-4">
                <button type="button"   id="selectNeighbourhoodId" rel="selectNeighbourhood" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#myModalNeighborhood">Select Neighbourhood(s)</button>
            </div>
            <div class="col-md-4">
                <button type="button"  id="selectWardId"  rel="selectWard" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#myModalWard">Select Ward(s)</button>
            </div>
            <div class="col-md-4">
                <button type="button" id="selectTaxDeductionId"  rel="selectTaxDeduction" class="btn form-btn common-select-cls" data-toggle="modal" data-target="#myModalTaxDeduction">Select Homestead Tax Deduction(s)</button>
            </div>
        </div>
             
        <div class="row py-4 drop-btn">     
            <div class="col-md-3  col-sm-6 col-xs-10">
    			<select class="form-control select2-show-search-property" data-placeholder="Select Owner Entity Type" multiple="multiple" name="propertyCheck[]">
					<option value="person"  id="defaultCheckPerson"> Property Owned By Person</option>
					<option value="business" id="defaultCheckBusiness"> Property Owned By Business</option>
					<option value="govt"   id="defaultCheckGovernment"> Property Owned By Government</option>
					<option value="5" id="defaultCheckMultipleProperties" >Owns Multiple Properties </option>
    			</select>
            </div>
            <div class="col-md-3">
                <div class="box2 colo-btn m-0">
                    <input type="radio" name="selectRange" autocomplete="off" class="radio-disable selectRadioBtn radio-active" value="landRange"> Select Land Range
                </div>
            </div>
            <div class="col-md-3">
              <div class="box2 colo-btn m-0">
                 <input type="radio" name="selectRange" autocomplete="off" class="radio-disable selectRadioBtn radio-active" value="saleDate"> Select Sale Date
              </div>
            </div>
            <div class="col-md-3">
              <div class="box2 colo-btn m-0">
                 <input type="radio" name="selectRange" autocomplete="off" class="radio-disable selectRadioBtn radio-active" value="squareRange"> Select Square Range
              </div>
            </div>
        </div>
        <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
		<div class="col-md-9">
		  <div class="lrange" id="lrange">
              <h5 class="sub-heading pt-5">Please Enter A Land Range Between 112 and 12919556</h5>
              <div class="row py-4 ">
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
              <div class="row py-4">
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
              <div class="row py-4">
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
        
<h5 class="text-center pt-5">Sort By</h5>
 <div class="row sortbysection justify-content-center">
    <div class="col-md-3">
        <div class="colo-btn sortbybox togglesortby">
            <input type="radio" name="selectSortBy" autocomplete="off" class="radio-disable radiobtn radio-active" value="owername"> Owner Name
        </div>
    </div>
    <div class="col-md-3">
        <div class="colo-btn sortbybox togglesortby">
            <input type="radio" name="selectSortBy" autocomplete="off" class="radio-disable radiobtn"  value="zipcode"> Zip
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="colo-btn sortbybox togglesortby">
            <input type="radio" name="selectSortBy" autocomplete="off" class="radio-disable radiobtn"  value="zoning">Zoning
        </div>
    </div>
    <div class="col-md-3">
        <div class="colo-btn sortbybox togglesortby">
            <input type="radio" name="selectSortBy" autocomplete="off" class="radio-disable radiobtn"  value="neighborhood">Neighbourhood
        </div>
    </div>
    <div class="col-md-4">
        <div class="colo-btn sortbybox togglesortby">
            <input type="radio" name="selectSortBy" autocomplete="off" class="radio-disable radiobtn"  value="ward">Ward
        </div>
    </div>
    <div class="col-md-4">
        <div class="colo-btn sortbybox togglesortby">
            <input type="radio" name="selectSortBy" autocomplete="off" class="radio-disable radiobtn"  value="use">Use(s)
        </div>
    </div>
    <div class="col-md-4">
        <div class="box2 colo-btn sortbybox togglesortby">
            <input type="radio" name="selectSortBy" autocomplete="off" class="radio-disable radiobtn"  value="tax_deduction">Homestead Tax Deduction
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
                   <div class="col-md-2">
				 <?php 
				 	if(!empty($resultUser['visitor_expiry_time']) && ($resultUser['status'])==1 && (empty($this->session->userdata('email')))){ ?>	
					<button class="btn form-btn viewbtn" type="button"  data-toggle="modal" data-target="#paymentModalCenter">View Data</button>
				<?php } else {?>
					<input type="submit" class="btn form-btn viewbtn" name="submitBtn" value="View Data">
				<?php } 
				  ?>
				</div>



				<div class="col-md-2">
					<a href="https://crizalinfo.com/realstate/home/clientselecthomepage"><button type="button" class="btn form-btn">Clear All</button></a>
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
                             <button type="button" rel="selectUse" class="btn form-btn model-next-cls" data-dismiss="modal" data-toggle="modal" data-target="#myModalUse">Next<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span></button>
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
                        <button type="button" rel="zip" class="btn form-btn model-next-cls" class="btn form-btn" id="" data-dismiss="modal"  data-toggle="modal" data-target="#myModalZipCode"><span><i class="fa fa-angle-double-left" aria-hidden="true"></i></span>Back</button>
                  </div>
                  <div class="col-md-4">
                     <button type="button" class="btn form-btn" id="clearProUsebtn" rel="pro_use">Clear Filters</button>
                  </div>
                  <div class="col-md-4">
                     <button type="button" rel="zoning" class="btn form-btn model-next-cls" data-dismiss="modal" data-toggle="modal" data-target="#myModalZoning">Next<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span></button>
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
                             <button type="button" rel="selectUse" class="btn form-btn model-next-cls"  class="btn form-btn" id="" data-dismiss="modal" data-toggle="modal" data-target="#myModalUse"><span><i class="fa fa-angle-double-left" aria-hidden="true"></i></span>Back</button>
                        </div>
                        <div class="col-md-4">
                         <button type="button" class="btn form-btn" id="clearZoningbtn" rel="zoning">Clear Filters</button>
                        </div>
                        <div class="col-md-4">
                         <button type="button" rel="selectNeighbourhood" class="btn form-btn model-next-cls" data-dismiss="modal" 
                            data-toggle="modal" data-target="#myModalNeighborhood">Next<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span></button>
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
                            <button type="button" rel="zoning" class="btn form-btn model-next-cls" id="" data-dismiss="modal" data-toggle="modal" data-target="#myModalZoning"><span><i class="fa fa-angle-double-left" aria-hidden="true"></i></span>Back</button>
                        </div>
                      <div class="col-md-4">
                         <button type="button" class="btn form-btn" id="clearNeighborhoodbtn">Clear Filters</button>
                      </div>
                      <div class="col-md-4">
                         <button type="button"  rel="selectWard" class="btn form-btn model-next-cls" data-dismiss="modal" data-toggle="modal" data-target="#myModalWard">Next<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span></button>
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
                             <button type="button"  rel="selectNeighbourhood"  class="btn form-btn model-next-cls" id="" data-dismiss="modal" data-toggle="modal" data-target="#myModalNeighborhood"><span><i class="fa fa-angle-double-left" aria-hidden="true"></i></span>Back</button>
                  </div>
                  <div class="col-md-4">
                     <button type="button" class="btn form-btn" id="clearWardbtn">Clear Filters</button>
                  </div>
                  <div class="col-md-4">
                     <button type="button" rel="selectTaxDeduction"  class="btn form-btn model-next-cls" data-dismiss="modal" data-toggle="modal" data-target="#myModalTaxDeduction">Next<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span></button>
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
                             <button type="button" rel="selectWard"  class="btn form-btn model-next-cls"  id="" data-dismiss="modal" data-toggle="modal" data-target="#myModalWard"><span><i class="fa fa-angle-double-left" aria-hidden="true"></i></span>Back</button>
                          </div>
                          <div class="col-md-4">
                             <button type="button" class="btn form-btn" id="clearTaxDeductionbtn">Clear Filters</button>
                          </div>
                          <div class="col-md-4">
                             <button type="button" class="btn form-btn model-next-cls" data-dismiss="modal">Next<span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span></button>
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