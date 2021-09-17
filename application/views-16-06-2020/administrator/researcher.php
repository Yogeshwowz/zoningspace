<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         <i class="fa fa-users"></i> Researcher Management
         <small></small>
      </h1>
   </section>
   <section class="content">
      
      <div class="row">
         <div class="col-xs-12">
            <div class="box admin-box">
               <!-- /.box-header -->
               <div class="box-body table-responsive">
                  <div class="col-md-12 add-research-div">
					<div class="alert alert-danger alert-dismissible " id="researcher-error" style="display:none;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  This Email is already Exist .Please try other emaiil
					</div>
                     <form id="my_form_researcher" action="" method="post" role="form" novalidate="" >
					   <div class="form-group">
                           <label for="name">Name:</label>
                           <input type="text" class="form-control" id="fname" name="fname" required="true">
                        </div>
                        <div class="form-group">
                           <label for="email">Email address:</label>
                           <input type="email" class="form-control" id="emailid" name="emailid" required="true" >
                        </div>
                         <div class="form-group">
                           <label for="pass">Password:</label>
                           <input type="password" class="form-control" id="password" name="password" required="true" >
                        </div>
						<input  type="submit" class="btn btn-primary" name="researcher-submit" value="Save Searcher">
                     </form>
                  </div>
                  <table id="example" class="display table table-hover table-downs" style="width:100%">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Password</th>
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
									   <td><?php echo $record->plain_password; ?></td>
									  <!-- <td class="text-center">
										  <?php if($record->status == 1){ ?>
										  <a class="btn btn-sm btn-primary researcher_enabled_user"  id ="<?php 
											 echo $record->id; ?>" rel="disabled"  href='#'>Enabled</a>
										  <?php }else{ ?> 
										  <a class="btn btn-sm btn-warning researcher_disabled_user" id ="<?php echo $record->id ; ?>" rel="enabled" href='#'>Disabled</a>
										  <?php } ?>
										  <a class="btn btn-sm btn-primary researcher_delete"  id ="<?php 
											 echo $record->id; ?>"  href='#'>Delete</a>
									   </td>-->
									   <td class="text-center">
											<?php if($record->status == 0){ ?>
															   <a class="btn btn-sm btn-primary enabled_user"  user_id="<?php 
															   echo $record->userId; ?>" rel="disabled"  href='<?php echo base_url(); ?>administrator/enable/<?php echo $record->userId; ?>?table=<?php echo base64_encode('users'); ?>'>Enabled</a>
																<?php }else{ ?> 
																<a class="btn btn-sm btn-warning disabled_user" user_id="<?php echo$record->userId; ?>" rel="enabled" href='<?php echo base_url(); ?>administrator/disable/<?php echo $record->userId; ?>?table=<?php echo base64_encode('users'); ?>'>Disabled</a>
																
																<?php } ?>
																<a class="btn btn-sm btn-primary researcher_delete"  id ="<?php 
											 echo $record->userId; ?>"  href='#'>Delete</a>
															   
										  
										</td>
									   
									</tr><?php
								}
                           } ?>
                     </tbody>
                  </table>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
      </div>
   </section>
</div>