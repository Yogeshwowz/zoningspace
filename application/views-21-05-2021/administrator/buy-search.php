<style> .ahrefcls {margin-left:10px;} .export-data{    margin-left: 10px;}
table.dataTable thead .sorting, table.dataTable thead .sorting_asc, table.dataTable thead .sorting_desc, table.dataTable thead .sorting_asc_disabled, table.dataTable thead .sorting_desc_disabled{
    background-position: 20% 60% !important;
}
table.dataTable thead .sorting.taction, table.dataTable thead .sorting_asc.taction, table.dataTable thead .sorting_desc.taction, table.dataTable thead .sorting_asc_disabled.taction, table.dataTable thead .sorting_desc_disabled.taction{
    background-image:none !important;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Requested Data
        <small></small>
      </h1>
    </section>
    <section class="content">
       <div class="row">
            <div class="col-xs-12">
              <div class="box admin-box">
                <!-- /.box-header -->
                <div class="box-body table-responsive">
               <table id="example" class="display table table-hover" style="width:100%">
					<thead>
					<tr>
						<th>Name</th>
						<th>Researcher Name</th>
						<th>Date</th>
						<th class="taction">Action</th>
					</tr>
					</thead>
					<tbody>
				<?php foreach($buySearch as $buySearch){?>
						<tr>
						<td><?php echo $buySearch['searchName'] ?></td>
					    <td><?php 
						$getname = $this->administrator_model->getassigned_researcher($buySearch['reseacher_id']); 

						echo ucfirst($getname['name']);
						?></td>
						<td><?php if(!empty($buySearch['created_date'])) { echo $buySearch['created_date']; }?> </td>
						<td>
							<!--<form action="<?php echo base_url();?>dashboard/DownloadSearchData" method="post" style="float:left;">
							<input type="hidden" name="searchid" id="searchid" value="<?php //echo $buySearch['search_id'] ?>" />
							<input type="hidden" name="order_id" id="order_id" value="<?php //echo $buySearch['order_id'] ?>" />
							<input type="hidden" name="single_record_id" id="single_record_id" value="<?php //echo $buySearch['single_record_id'] ?>" />
							<input type="submit" class="btn btn-primary ahrefcls"  value="Download" name="DownloadSearch">
							</form>-->
							<!--<input type="button" class="btn btn-primary ahrefcls DownloadSearch"  value="Download" name="DownloadSearch"  searchid="<?php //echo $buySearch['search_id'] ?>" order_id="<?php //echo $buySearch['search_id'] ?>" single_record_id="<?php e//cho $buySearch['single_record_id'] ?>" DownloadSearch="DownloadSearch">
							<!--<a class="btn btn-warning export-data"  href='<?php //echo base_url(); ?>administrator/import'>Import Data</a>-->

							<span class="btn btn-success downloadcsv" rel="<?php if(!empty($buySearch['search_id'])) { echo $buySearch['search_id']; }?>"><i class="fa fa-download" aria-hidden="true"></i>&nbsp;&nbsp; Download</span>




							<?php if($this->session->userdata('role')==1){?>
							<button class="btn btn-warning assigned-reseacher" data-toggle="modal" data-target="#myAssignedReseacher" rel="<?php echo $buySearch['search_id'] ?>"><i class="fa fa-users"></i>&nbsp;&nbsp;Assigned Researcher</button>
							<?php } ?>
						</td>
					   
					</tr><?php 
				}?>
				</tbody>
     
				</table>
                </div><!-- /.box-body -->
               </div><!-- /.box -->
            </div>
        </div>
		<!-- Modal -->
		<div id="myAssignedReseacher" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Assigned Researcher</h4>
			  </div>
			  <div class="modal-body">
				<div class="form-group">
				<label for="sel-re">Select Researcher</label>
				<select class="form-control select_reseacher" id="select_reseacher">
				<option value="">Select Researcher</option>
				<?php foreach($getreseacher as $getreseacher){?>
				<option value="<?php echo $getreseacher->userId;?>">
				<?php echo $getreseacher->name;?>(<?php echo $getreseacher->email;?>)
				</option>
				<?php } ?>
				</select>
				</div>
				<div class="form-group">
				<input type="hidden" name="orderid" id="orderid" value="" >
				 <button type="button" class="btn btn-success" id="reseacher-submit"  >Submit</button>
				</div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
			</div>

		  </div>
		</div>
    </section>
</div>

