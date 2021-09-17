<div class="page-wrapper chiller-theme toggled">
 <?php $this->view('user-dashboard/side-bar'); ?>
  <main class="page-content">
    <div class="container-fluid">
      <h2 class="text-center">Welcome</h2>
      <div class="row pt-3">
          <div class="col-md-4">
                <div class="ud_item">
                    <span class="active_pak"><?php if(!empty($records['subscription'])){ ?>Your Active Plan<?php } else{ ?> No Active plan <?php } ?></span>
                    <h5><?php if(!empty($records['subscription'])){
					   if($records['subscription']==1){
						   echo "Annual "."Individuals";
					   }
					   if($records['subscription']==2){
						   echo "Annual "."Companies";
					   }
					   if($records['subscription']==3){
						   echo "Monthly "."Individuals";
					   }
						if($records['subscription']==4){
						   echo "Monthly "."Companies";
					   }					   
					}?></h5>
                    <h2>
					<?php if(!empty($records['packageamount']) && $records['packageamount'] >0){ ?>
					
					<span class="up_dollor">$</span><?php if(!empty($records['packageamount'])){
						echo $records['packageamount'];
					}?><?php } else { ?><span class="up_dollor">$0</span>
					<?php } ?>
					</h2>
                    <p>&nbsp;</p>
                </div>
          </div>
          <div class="col-md-4">
                <div class="ud_item">
                    <h5>Pending Connects</h5>
                    <h2><?php if(!empty($records['connects'])){
						echo $records['connects'];
					}else{echo 0;}?></h2>
                    <p>Expiry Date :- <?php if(!empty($records['expired_date'])){
						echo $date = date('d,M Y', strtotime($records['expired_date']));
					}?></p>
                </div>
          </div>
          <div class="col-md-4">
                <div class="ud_item">
                    <h5>Save Search</h5>
                    <h2><?php if(!empty($saverecords)){
						echo count($saverecords);
					}else{ echo 0;}?></h2>
                    <p>&nbsp;</p>
                </div>
          </div>
      </div>
    </div>
  </main>
  <!-- page-content" -->
</div>
