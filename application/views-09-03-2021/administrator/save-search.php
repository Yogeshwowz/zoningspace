<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         <i class="fa fa-users"></i> User Save Search Management
         <small></small>
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box admin-box">
               <!-- /.box-header -->
               <div class="box-body table-responsive">
                 
                  <table id="example" class="display table table-hover table-downs" style="width:100%">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Search Name</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           if(!empty($userRecords)){
								foreach($userRecords as $record){ ?>
									<tr>
									   <td><?php echo $record->name; ?></td>
									   <td><?php echo $record->email; ?></td>
									   <td><?php echo $record->searchName; ?></td>
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