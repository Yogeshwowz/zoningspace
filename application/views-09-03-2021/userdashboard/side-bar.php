<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center text-white"  href="<?php echo base_url(); ?>user-dashboard">
          <div class="sidebar-brand-icon">
            <i class="fa fa-user" aria-hidden="true"></i>
         </div>
         <div class="sidebar-brand-text mx-3"><?php if(!empty($this->session->userdata('email'))) { echo $this->session->userdata('email'); }?></div>
    </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
         <a class="nav-link" href="<?php echo base_url();?>user-dashboard">
         <i class="fa fa-tachometer" aria-hidden="true"></i>
         <span>Dashboard</span></a>
    </li>
    <!--<li class="nav-item">
         <a class="nav-link" href="<?php echo base_url();?>search-saved">
         <i class="fa fa-cogs" aria-hidden="true"></i>
         <span>Saved Search</span></a>
    </li>-->
	  <li class="nav-item">
         <a class="nav-link" href="<?php echo base_url();?>buy-search">
         <i class="fa fa-search-plus" aria-hidden="true"></i>
         <span>Purchased Data</span></a>
      </li>
      <!-- <li class="nav-item">
         <a class="nav-link" href="#">
          <i class="fas fa-user fa-sm fa-fw text-gray-400"></i>
           <span>Profile</span></a>
         </li>-->
</ul>