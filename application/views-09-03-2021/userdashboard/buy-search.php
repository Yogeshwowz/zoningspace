<!-- Page Wrapper -->
<style>
#example_wrapper {margin-top:83px;}
.ahrefcls {margin-left:10px;}
</style>
<div id="wrapper">
   <!-- Sidebar -->
  <?php $this->view('userdashboard/side-bar'); ?>
   <!-- End of Sidebar -->
   <!-- Content Wrapper -->
   <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
         <!-- Begin Page Content -->
        <div class="container-fluid">
			<table id="example" class="display" style="width:100%">
				<thead>
					<tr>
						<th>Name</th>
						 <!--<th>Package Name</th>-->
						 <th>Date</th>
						 <th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($buySearch as $buySearch){
					$current_date = date('Y-m-d h:i:s');
				?>
						<tr>
						<td><?php echo $buySearch['searchName'] ?></td>
						<!--<td><?php 
						/*if($buySearch['package_id']==1){echo "View Data";}
						if($buySearch['package_id']==2){echo "View Data + Download";}
						if($buySearch['package_id']==3){echo "View Data + Download + Contact Information";}
							//echo $buySearch['package_id'] */?></td>-->
						<td><?php echo $buySearch['orderdate'] ?></td>
						<td>
						<!--<form action="<?php echo base_url();?>view-save-search" method="post" style="float:left;">
							<input type="hidden" name="searchid" id="searchid" value="<?php echo $buySearch['search_id'] ?>" />
							<input type="submit" class="btn btn-success"  value="View" name="viewsaveSearch">
						</form>-->
						<?php  if($buySearch['package_id']!=1){?>
							
						<!--<form action="<?php //echo base_url();?>dashboard/DownloadSearchData" method="post" style="float:left;">
							<input type="hidden" name="searchid" id="searchid" value="<?php //echo $buySearch['search_id'] ?>" />
							<input type="hidden" name="order_id" id="order_id" value="<?php //echo $buySearch['order_id'] ?>" />
							<input type="hidden" name="single_record_id" id="single_record_id" value="<?php //echo $buySearch['single_record_id'] ?>" />
							<input type="submit" class="btn btn-primary ahrefcls"  value="Download" name="DownloadSearch">
						</form>-->

						<?php if($current_date >= $buySearch['show_download_button_date']){
							
							?>
							<input type="button" class="btn btn-primary ahrefcls DownloadSearch"  value="Download" name="DownloadSearch"  searchid="<?php echo $buySearch['search_id'] ?>" order_id="<?php echo $buySearch['order_id'] ?>" single_record_id="<?php echo $buySearch['single_record_id'] ?>" DownloadSearch="DownloadSearch">
							
						<?php 
						}
						} ?>
						</td>
					   
					</tr><?php 
				}?>
				</tbody>
		   
			</table>
         </div>
		</div>
	</div>
</div>
<!-- End of Page Wrapper -->