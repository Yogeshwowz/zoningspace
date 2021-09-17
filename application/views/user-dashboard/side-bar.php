  <?php $url= explode('/',$_SERVER['REQUEST_URI']); ?>
  <a id="show-sidebar" href="#">
    <i class="fa fa-bars" aria-hidden="true"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
        <div id="close-sidebar">
          <i class="fa fa-times" aria-hidden="true"></i>
        </div>
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
          <li  class="<?php if(in_array('dashboard',$url)) { echo "active";}?>">
            <a href="<?php echo base_url();?>dashboard">
              <i class="fa fa-dashcube" aria-hidden="true"></i>
              <span>Dashboard</span>
            </a>
          </li>
		  <?php if(!empty($this->session->userdata('roleId')) && $this->session->userdata('roleId')==2) {
		  if(!empty($records['subscription'])){
					   if($records['subscription']==2 || $records['subscription']==4){ ?>
		   <li class="<?php if(in_array('members',$url)) { echo "active";}?>">
            <a href="<?php echo base_url();?>members">
              <i class="fa fa-user"></i>
              <span>Manage Members</span>
            </a>
          </li>
		<?php }
		  }
		  }		  ?>
          <li class="<?php if(in_array('save-search',$url)) { echo "active";}?>">
            <a href="<?php echo base_url();?>save-search">
              <i class="fa fa-cloud" aria-hidden="true"></i>
              <span>Saved Search</span>
            </a>
          </li>
          <li class="<?php if(in_array('buy-search',$url)) { echo "active";}?>">
            <a href="<?php echo base_url();?>buy-search">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              <span>Purchased Data</span>
            </a>
          </li>
          <!--<li>-->
          <!--  <a href="<?php echo base_url();?>logout">-->
          <!--    <i class="fa fa-sign-out" aria-hidden="true"></i>-->
          <!--    <span>Logout</span>-->
          <!--  </a>-->
          <!--</li>-->
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
  </nav>
  <!-- sidebar-wrapper  -->