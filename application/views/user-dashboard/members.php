<div class="page-wrapper chiller-theme toggled">
   <?php $this->view('user-dashboard/side-bar'); ?>
   <main class="page-content">
        <div class="container">
           <button type="button" class="main_btn" data-toggle="modal" data-target="#myModalMember">Add New Member</button>
		    <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
              <table class="table search-listing" id="example">
                 <thead>
                    <tr>
                       <th scope="col">Name</th>
                       <th scope="col">Email</th>
                       <th scope="col">Password</th>
                       <th scope="col">Action</th>
                    </tr>
                 </thead>
                 <tbody>
        		 <?php if(isset($members)){
        			 foreach($members as $members){
        			 ?>
                    <tr>
                      <td><?php if(!empty($members['name'])) { echo $members['name'];}?></td>
                       <td><?php if(!empty($members['email'])) { echo $members['email'];}?></td>
                       <td><?php if(!empty($members['plain_password'])) { echo $members['plain_password'];}?></td>
                      <td><span class="delete-member" rel="<?php if(!empty($members['userId'])) { echo $members['userId'];}?>">Delete</span></td>
        		 </tr><?php }
        		 }		 ?>
                    
                 </tbody>
              </table>
        	  <!-- Modal -->
        	<div id="myModalMember" class="modal fade" role="dialog">
        	  <div class="modal-dialog">
        		<!-- Modal content-->
        		<div class="modal-content">
        		  <div class="modal-header mod-head-cls">
        			<h4 class="modal-title text-center">New Member</h4>
        			<button type="button" class="close" data-dismiss="modal">&times;</button>
        		  </div>
        		  <div class="modal-body">
        			<div  id="member-form-success" class="alert alert-success alert-dismissible hidecls" role="alert">
        			<span class="alert-icon"><i class="ni ni-like-2"></i></span>
        			<span class="alert-text">New member has been added successfully.</span>
        			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        			<span aria-hidden="true">&times;</span>
        			</button>
        			</div>
        			<div  id="member-form-warning" class="alert alert-warning alert-dismissible  hidecls" role="alert">
        			<span class="alert-icon"><i class="ni ni-like-2"></i></span>
        			<span class="alert-text">This Email is alreadly exist in database .Please try other email id</span>
        			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        			<span aria-hidden="true">&times;</span>
        			</button>
        			</div>
        		    <div  id="member-form-count" class="alert alert-warning alert-dismissible  hidecls" role="alert">
        			<span class="alert-icon"><i class="ni ni-like-2"></i></span>
        			<span class="alert-text">you can add only 3 members</span>
        			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        			<span aria-hidden="true">&times;</span>
        			</button>
        			</div>
        		  
        			<form role="form" novalidate="" id="member-register-frm" method="POST" action="" >
        			<input id="member-name" name="member-name" class="form-control" placeholder="Full name" type="text" autocomplete="off" required>
        			<input id="member-email" name="member-email" class="form-control" placeholder="Email address" type="email" autocomplete="off" required>
        			<input class="form-control" id="member-password" name="member-password" placeholder="Create password" type="password" autocomplete="off" required>
        
        			<input class="form-control" id="mconfirm_password" name="member_password" placeholder="Confirm password" type="password" autocomplete="off" required>
        			<span style="display:none;" class="error-p">password and confirm password does not match</span>
        			<input  type="submit" class="btn form-btn " value="Create Account" name="member-submit" >
        			</form>
        		  </div>
        		</div>
        
        	  </div>
        	</div>
        </div>
   </main>
</div>