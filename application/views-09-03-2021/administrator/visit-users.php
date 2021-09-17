<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         <i class="fa fa-users"></i> Visitor Users
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
                           <th>Visitor IP Address</th>
                           <th>Start Time</th>
                           <th>Expiry Time</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           if(!empty($userRecords)){
								foreach($userRecords as $record){ ?>
									<tr>
									   <td><?php echo $record->ip_address ?></td>
									   <td><?php echo $record->visitor_start_time ?></td>
									   <td><?php echo $record->visitor_expiry_time ?></td>
									   <td><a class="btn btn-sm btn-primary visit_user_delete"  id ="<?php echo $record->id; ?>"  href='#'>Delete</a></td>
									</tr> <?php
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