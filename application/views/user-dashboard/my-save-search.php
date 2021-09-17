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
      <h2 class="text-center">Save Search List</h2>
      <table id="example" class="table table-hover search-listing">
              <thead>
                <tr>
                  <th scope="col">Member Name</th>
                  <th scope="col">Search Name</th>
                  <th scope="col">Search Count</th>
                  <th scope="col">Created Date</th>
                  <th scope="col">Action</th>
                  
                </tr>
              </thead>
              <tbody>
			  <?php foreach($saverecords as $saverecords){ ?>
                <tr>
				 <td><?php if(!empty($saverecords['user_id'])) { 
                    $getMemberInfo = $this->Dashboard_model->getMemberInformation($saverecords['user_id']);
					echo $getMemberInfo['name'];
				 }?></td>
                 <td><?php if(!empty($saverecords['searchName'])) { echo $saverecords['searchName']; }?></td>
                  <td><?php if(!empty($saverecords['rowcount'])) { echo $saverecords['rowcount']; }?></td>      
                  <td><?php if(!empty($saverecords['created_date'])) { echo $saverecords['created_date']; }?> </td>
                  <td>
				  <a  target="_blank" href="<?php echo  base_url();?>search-view-data"></a>
				    <form  target="_blank" method="post" class="buyButton" action="<?php echo base_url();?>search-view-data">
                           
                            <textarea  style="display:none;" name="postdata"><?php if(!empty($saverecords['search_data'])) {  echo $saverecords['search_data']; }  ?></textarea>
						 <button class="btn" type="submit"  value="View Data" name="viewSearchList"><i class="fa fa-eye" aria-hidden="true"></i></button>
						</form>
				  
				  
				  
				  </td>
			  </tr><?php } ?>
                </tbody>
            </table>
             
    </div>
  </main>
  <!-- page-content" -->
</div>
