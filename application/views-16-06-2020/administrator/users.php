<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> User Management
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
					<th>Email</th>
					<th>Created Date</th>
					<th class="text-center">Actions</th>
					</tr>
					</thead>
					<tbody>
					  <?php
							if(!empty($userRecords)){
								foreach($userRecords as $record){ ?>
									<tr>
										<td><?php echo $record->name ?></td>
										<td><?php echo $record->email ?></td>
										<td><?php echo date("d-m-Y", strtotime($record->createdDtm)) ?></td>
										<td class="text-center">
											<?php if($record->status == 0){ ?>
															   <a class="btn btn-sm btn-primary enabled_user"  user_id="<?php 
															   echo $record->userId; ?>" rel="disabled"  href='<?php echo base_url(); ?>administrator/enable/<?php echo $record->userId; ?>?table=<?php echo base64_encode('users'); ?>'>Enabled</a>
																<?php }else{ ?> 
																<a class="btn btn-sm btn-warning disabled_user" user_id="<?php echo$record->userId; ?>" rel="enabled" href='<?php echo base_url(); ?>administrator/disable/<?php echo $record->userId; ?>?table=<?php echo base64_encode('users'); ?>'>Disabled</a>
																<?php } ?>
															   
										  
										</td>
									</tr><?php
								}
							} ?>
					</tbody>
     
				</table>
                </div><!-- /.box-body -->
               </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>

