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
      <h2 class="text-center">View Purchased Data</h2>
      <table id="example" class="table table-hover search-listing">
              <thead>
                <tr>
                  <th scope="col">Address</th>
                  <th scope="col">Search Count</th>
                  <th scope="col">Zip</th>
                  <th scope="col">Land Area</th>
                  <th scope="col">View</th>
                  
                </tr>
              </thead>
              <tbody>
			  <?php foreach($buyrecords as $buyrecords){ ?>
                <tr>
                 <td><?php if(!empty($buyrecords['correct_address'])) { echo $buyrecords['correct_address']; }?></td>
                  <td><?php if(!empty($buyrecords['pro_use'])) { echo $buyrecords['pro_use']; }?></td>      
                  <td><?php if(!empty($buyrecords['zip'])) { echo $buyrecords['zip']; }?> </td>
				   <td><?php if(!empty($buyrecords['land_area'])) { echo $buyrecords['land_area']; }?> </td>
                  <td>
				  <a target="_blank" href="<?php echo  base_url();?>view-purchased-record/<?php 
				  echo base64_encode($buyrecords['id']);?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
				  
				  </td>
			  </tr><?php } ?>
                </tbody>
            </table>
             
    </div>
  </main>
  <!-- page-content" -->
</div>
