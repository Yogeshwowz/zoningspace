<style> .ahrefcls {margin-left:10px;} .export-data{    margin-left: 10px;} .alert-primary {
    color: #fff;
    background-color: #3c763d;
    border-color: #ebccd1;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Data Submitted
        <small>	<div class="alert alert-primary alert-dismissible" id="s-message" style="display:none">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					 Import data has been imported successfully.
					</div></small>
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
						 <th>File Name</th>
						 <th>Date</th>
						 <th>Action</th>
					</tr>
					</thead>
					<tbody>
				<?php if(count($export) > 0 ) { foreach($export as $export){?>
						<tr>
						<td><?php echo $export['name'] ?></td>
						<td><?php echo $export['fileName'] ?></td>
						<td><?php echo $export['created_date'] ?></td>
						<td><a class="btn btn-success" href="<?php echo base_url();?>assets/upload/csv/<?php echo $export['fileName'] ?>">Downlaod</a></td>
					
					   
					</tr><?php 
				}
				}else { ?>
					<tr>
						<td colspan="4">No Data found</td>
						</tr>
				<?php 
				}?>
				</tbody>
     
				</table>
                </div><!-- /.box-body -->
               </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>

