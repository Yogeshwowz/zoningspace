<div class="page-wrapper chiller-theme toggled">
<div class="down_loader" id="loading" style="display:none;">
                <div class="loader_icon">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="loader_text">Please Wait Start Downloading</div>
            </div>
<?php $this->view('user-dashboard/side-bar'); ?>

  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container">
      <h2 class="text-center">Purchased Data</h2>
      <table id="example" class="table table-hover search-listing">
              <thead>
                <tr>
                  <th scope="col">Member Name</th>
                  <th scope="col">Search Name</th>
                  <th scope="col">Search Count</th>
                  <th scope="col">Created Date</th>
                  <th scope="col">View</th>
                  
                </tr>
              </thead>
              <tbody>
			  <?php foreach($buyrecords as $buyrecords){ ?>
                <tr>
				 <td><?php if(!empty($buyrecords['user_id'])) { 
                    $getMemberInfo = $this->Dashboard_model->getMemberInformation($buyrecords['user_id']);
					echo $getMemberInfo['name'];
				 }?></td>
                 <td><?php if(!empty($buyrecords['searchName'])) { echo $buyrecords['searchName']; }?></td>
                  <td><?php if(!empty($buyrecords['Chkallcount'])) { echo $buyrecords['Chkallcount']; }?></td>      
                  <td><?php if(!empty($buyrecords['created_date'])) { echo $buyrecords['created_date']; }?> </td>
                  <td>
				  <a  target="_blank" href="<?php echo  base_url();?>purchased-data-list/<?php echo $buyrecords['search_id'];?>"><i class="fa fa-eye" aria-hidden="true"></i></a> <span class="downloadcsv" rel="<?php if(!empty($buyrecords['search_id'])) { echo $buyrecords['search_id']; }?>"><i class="fa fa-download" aria-hidden="true"></i></span></td>
			  </tr><?php } ?>
                </tbody>
            </table>
             
    </div>
  </main>
  <!-- page-content" -->
</div>
