
<section class="searching-map">
         <div class="container">
      <div class="row">
         
            <div class="col-md-6">
				
            </div>
        </div>
		
		
		<div class="row pb-3">
               <div class="col-md-3 d-flex">
                    <form class="mr-3" action="<?php echo base_url();?>" method="POST" >
				        <textarea  style="display:none;" name="postdata"><?php if(!empty($jsonPostData)) {  echo $jsonPostData; } else{ echo $searchid['search_data'];} ?></textarea>
				        <input  class="btn btn-primary " type="submit" name="submitBtn" value="&#x276E; Back">
				    </form>
                  <!--<a href="view-data2.html" class="btn btn-primary ahrefcls">View Data</a>-->
			     <?php if(isset($searchid['rowcount']) && $searchid['rowcount'] > 0) {?>
                    <form  method="post" class="buyButton" action="<?php echo base_url();?>search-view-data">
                       
                        <textarea  style="display:none;" name="postdata"><?php if(!empty($jsonPostData)) {  echo $jsonPostData; }else{ echo $searchid['search_data'];}  ?></textarea>
					 
					 <input type="submit" class="btn btn-primary" value="View Data" name="viewDataList">
					
                      <?php /* <div class="options">
                         
                          <label class="option">
                             
                             <div class="info">
                                <div class="name">Price</div>
                                <div class="price"><b>$<?php if(!empty($postData['headersearch'])) { echo 10;}else{echo $searchid['rowcount']*30/100;}?></b></div>
                                <div class="description">Tabular data, plus premium vacancy, residential delivery indicator, and building footprint attributes</div>
                             </div>
                          </label>
                        </div>*/ ?>
                   
				   </form>
					 <?php } ?> 
               </div>
               <div class="col-md-6 text-center">
                  <h2 class="pt-3 pt-md-0">Buy Data</h2>
               </div>
            </div>
		<div class="row">
         <div class="col-lg-4">
            
              
                  <div  id="overview">
                    
                        <div class="omg-background-in">
                           <h4 class="title">The Zoningspace Data Store</h4>
                        </div>
                     
                     <h5>Washington, District of Columbia</h5>
                     <div class="basics">
                        <div class="factoid">
                            <div class="d-flex">
                                <h6 class="pr-4">Parcels</h6>
                           <h6><?php if(isset($searchid['rowcount']) && $searchid['rowcount'] > 0) { echo  number_format($searchid['rowcount']);}else{
							   echo 0;
						   }?></h6>
                            </div>
						   <?php if(isset($searchid['rowcount']) && $searchid['rowcount']== 0) {?>
						    <p style="color:#ed5151;">No data is found for the entered address. please enter address within  Washington District of Colombia</p>
						   <?php } ?>
                        </div>
                     </div>
                     <p class="small-lead">
                        Select a product option to add it to your cart.
                        When you've chosen what you need, <a href="#">go to your cart</a>
                        to pay by card and instantly download the data!
                     </p>
					<p class="small-lead">
					Download a 
					<a style="color:#ed5151;" href="javascript:;" class=" DownloadSearchlimit5"  value="Download" name="DownloadSearchlimit5"  searchid="<?php echo $searchid['search_id'] ?>"  single_record_id="<?php echo $searchid['single_record_id'] ?>" DownloadSearchlimit5="DownloadSearchlimit5">sample CSV for Washington, District of Columbia</a>
					</p>
                     <p class="small-lead">
                        See a list of all fields available for this county below.
                        You may also explore Washington County on Landgrid
                        to browse fields and properties on our map.
                     </p>
                     <p class="small-lead">
					 
                      
                     </p>
                   
                  </div>
                  
              
            
         </div>
         <div class="col-lg-8">
		 <div id="map" width="100%" height="100%"> </div>
	

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
           
         </div>
      </div>
   </div>
</section>