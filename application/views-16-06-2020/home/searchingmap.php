<style>
#overview { margin: 37px 0px 0px 25px;}
.submitmapcls { margin: 0 0 0 24px;}
</style>

<section class="homepage searching-map">
   <div class="container-fluid">
      <div class="row">
            <div class="col-md-12">
                <div class="block-heading">
                    <h2>Buy Data</h2>
                </div>
				<form action="<?php echo base_url();?>" method="POST" >
				 <textarea  style="display:none;" name="postdata"><?php if(!empty($jsonPostData)) {  echo $jsonPostData; } ?></textarea>
				 <input  class="btn btn-primary submitmapcls" type="submit" name="submitBtn" value="Back">
				</form>
            </div>
         <div class="col-md-3">
            
              
                  <div  id="overview">
                    
                        <div class="omg-background-in">
                           <h2 class="title">The Reallist Data Store</h2>
                        </div>
                     
                     <h3>Washington County, columbia</h3>
                     <div class="basics">
                        <div class="factoid">
                           <h4>Parcels</h4>
                           <h4><?php if(isset($searchid['rowcount'])) { echo  number_format($searchid['rowcount']);}?></h4>
                        </div>
                     </div>
                     <p class="small-lead">
                        Select a product option to add it to your cart.
                        When you've chosen what you need, <a href="#">go to your cart</a>
                        to pay by card and instantly download the data!
                     </p>
					<p class="small-lead">
					Download a 
					<a style="color:#ed5151;" href="javascript:;" class=" DownloadSearchlimit5"  value="Download" name="DownloadSearchlimit5"  searchid="<?php echo $searchid['search_id'] ?>"  single_record_id="<?php echo $searchid['single_record_id'] ?>" DownloadSearchlimit5="DownloadSearchlimit5">sample CSV for Washington County, columbia</a>
					</p>
                     <p class="small-lead">
                        See a list of all fields available for this county below.
                        You may also explore Washington County on Landgrid
                        to browse fields and properties on our map.
                     </p>
                     <p class="small-lead">
					 
                      
                     </p>
                     
                        <form class="buyButton">
                           <div class="tools">
                              <h4>Products</h4>
                              <?php 
        				 	if(empty($this->session->userdata('email'))){ ?>	
        					<button class="btn btn-primary ahrefcls" type="button"  data-toggle="modal" data-target="#paymentModalCenter">Add to Cart</button>
        				<?php } else {
							 if(isset($searchid['rowcount']) && $searchid['rowcount']==0) { ?>
							 <button class="btn btn-primary ahrefcls" type="button"  data-toggle="modal" data-target="#paymentModalCenter1">Add to Cart</button>
							<?php }else {
							?>
        					 <a href="<?php echo base_url();?>/dashboard/addcart/<?php echo $searchid['search_id']?>" class="btn btn-primary ahrefcls">Add to Cart </a>
        				<?php } 
						}
        				  ?>
							 
							  
                           </div>
                           <div class="options">
                             
                              <label class="option">
                                 
                                 <div class="info">
                                    <div class="name">Price</div>
                                    <div class="price"><b>$<?php echo $searchid['rowcount']*30/100;?></b></div>
                                    <div class="description">Tabular data, plus premium vacancy, residential delivery indicator, and building footprint attributes</div>
                                 </div>
                              </label>
                            
                             
                           </div>
                        </form>
                  </div>
                  
              
            
         </div>
         <div class="col-md-9">
		 <iframe
  width="100%"
  height="900"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps?q=Colombia&output=embed" allowfullscreen>
</iframe>
<form action="#" method="POST" id="formPost" style="visibility: hidden;">

							<div class="row" style="visiable">
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
						
<p  name="jsonPostData" id="jsonPostData"><?php if(!empty($jsonPostData)) {  echo $jsonPostData; } ?></p>
</form>

<div id="paymentModalCenter" class="modal fade" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header mod-head-cls" style=
		 "background-color: #ed5151 !important;">
            <h4 class="modal-title text-center" >Notification </h4>
            <button type="button" class="close close-btn" data-dismiss="modal">×</button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row">
               <div class="col-md-12">
                  <p>If you want to buy this data .Please login first 
                  </p>
               </div>
            </div>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>

<div id="paymentModalCenter1" class="modal fade" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header mod-head-cls" style=
		 "background-color: #ed5151 !important;">
            <h4 class="modal-title text-center" >Notification </h4>
            <button type="button" class="close close-btn" data-dismiss="modal">×</button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row">
               <div class="col-md-12">
                  <p>Your parcels value is zero. Please try other filter for data 
                  </p>
               </div>
            </div>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>
            <!--<div id="myChart"></div>-->
            <!--<script>
               ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"]; // must load maps and first map we are going to render
               zingchart.loadModules('maps, maps-usa_wa', function(e) {
               zingchart.render({
               id: 'myChart',
               data: {
                 shapes: [{
                   type: 'zingchart.maps',
                   options: {
               zooming: false,
               panning: false,
               scrolling: false,
               name: 'usa_wa',
               items: ['SJ','WA','OK','FE','ST','PE','SA','IS','SN','CH','DO','LI','SP','CM','JE','KT','KG','KI','GA','AD','WH','GR','MA','TH','PI','YA','BE','FR','WL','CL','GF','AS','PA','LE','Wk','CO','CA','Sk','KL'],
               style: {
                       items: {
                 CL: {
               		backgroundColor: '#E57373',
               			label: {
               			  text: 'Columbia',
               			  fontColor: '#B71C1C',
               			  fontFamily: 'Georgia',
               			  fontSize: 12
               			},
               		hoverState: {
               			backgroundColor: '#E57373'
               		}
                 }
                       }
                     }
                   }
                 }]
               },
               height: 800,
               width: 1200
               });
               });
            </script>-->
         </div>
      </div>
   </div>
</section>