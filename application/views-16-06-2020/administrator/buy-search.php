<style> .ahrefcls {margin-left:10px;} .export-data{    margin-left: 10px;}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Orders
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
						 <th>Package Name</th>
						 <th>Date</th>
						 <th>Action</th>
					</tr>
					</thead>
					<tbody>
				<?php foreach($buySearch as $buySearch){?>
						<tr>
						<td><?php echo $buySearch['searchName'] ?></td>
						<td><?php 
						if($buySearch['package_id']==1){echo "View Data";}
						if($buySearch['package_id']==2){echo "View Data + Download";}
						if($buySearch['package_id']==3){echo "View Data + Download + Contact Information";}
							//echo $buySearch['package_id'] ?></td>
						<td><?php echo $buySearch['orderdate'] ?></td>
						<td>
							<!--<form action="<?php echo base_url();?>dashboard/DownloadSearchData" method="post" style="float:left;">
							<input type="hidden" name="searchid" id="searchid" value="<?php //echo $buySearch['search_id'] ?>" />
							<input type="hidden" name="order_id" id="order_id" value="<?php //echo $buySearch['order_id'] ?>" />
							<input type="hidden" name="single_record_id" id="single_record_id" value="<?php //echo $buySearch['single_record_id'] ?>" />
							<input type="submit" class="btn btn-primary ahrefcls"  value="Download" name="DownloadSearch">
							</form>-->
							<input type="button" class="btn btn-primary ahrefcls DownloadSearch"  value="Download" name="DownloadSearch"  searchid="<?php echo $buySearch['search_id'] ?>" order_id="<?php echo $buySearch['order_id'] ?>" single_record_id="<?php echo $buySearch['single_record_id'] ?>" DownloadSearch="DownloadSearch">
							<!--<a class="btn btn-warning export-data"  href='<?php echo base_url(); ?>administrator/import'>Import Data</a>-->
						</td>
					   
					</tr><?php 
				}?>
				</tbody>
     
				</table>
                </div><!-- /.box-body -->
               </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>

