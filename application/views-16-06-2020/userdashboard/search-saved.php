<!-- Page Wrapper -->
<style>
#example_wrapper {margin-top:40px;}
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
            <div class="col-md-12">
			<table id="example" class="display" style="width:100%">
				<thead>
					<tr>
						<th>Name</th>
						 <th>Date</th>
						 <th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($savedSearch as $savedSearch){?>
						<tr>
						<td><?php echo $savedSearch['searchName'] ?></td>
						<td><?php echo $savedSearch['created_date'] ?></td>
						<td class="d-flex">
						<form action="<?php echo base_url();?>view-save-search" method="post" style="float:left;">
							<input type="hidden" name="searchid" id="searchid" value="<?php echo $savedSearch['search_id'] ?>" />
							<input type="submit" class="btn btn-success"  value="View" name="viewsaveSearch">
						</form>
						<a href="<?php echo base_url();?>dashboard/addcart/<?php echo $savedSearch['search_id'];?>" class="btn btn-primary ahrefcls">Buy </a>
						</td>
					   
					</tr><?php 
				}?>
				</tbody>
		   
			</table>
			</div>
         </div>
		</div>
	</div>
</div>
<!-- End of Page Wrapper -->