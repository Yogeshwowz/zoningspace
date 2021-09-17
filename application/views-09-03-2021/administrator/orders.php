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
					<th>Order Id</th>
					<th>Client Name</th>
					<th>Email</th>
					<th>Search Name</th>
					<th>Package</th>
					<th>Amount</th>
					<th>Created Date</th>
					</tr>
					</thead>
					<tbody>
					  <?php
							if(!empty($userRecords)){
								foreach($userRecords as $record){ ?>
									<tr>
										<td><?php echo $record->order_id; ?></td>
										<td><?php echo $record->name; ?></td>
										<td><?php echo $record->email; ?></td>
										<td><?php echo $record->searchName; ?></td>
										<td><?php 
											if($record->package_id==1){ echo "View Data";}
											if($record->package_id==2){ echo "View Data + Download";}
											if($record->package_id==3){ echo "View Data + Download + Contact Information";}
										?></td>
										<td>$<?php echo $record->amount; ?></td>
										<td><?php echo date("d-m-Y", strtotime($record->created_date)) ?></td>
									
										
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

