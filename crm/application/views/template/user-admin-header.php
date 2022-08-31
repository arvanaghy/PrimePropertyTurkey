
    <style>
		.btn-theme{background-color:green!important;color:white;}
		.left_active{background-color: green!important;color: white!important;padding-bottom:5px;}
	</style>
    <header class="app-header">
        <div class="top-bar">
            <div class="top-bar-brand">
                <a href="#">
                    <img src="https://www.primepropertyturkey.com/assets/web-site/images/logo-new%20kopya.png" height="52" class="img-responsive" alt="">
                </a>
            </div>

            <div class="top-bar-list">
                <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
                    <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="Menu" aria-controls="navigation">
						<span class="hamburger-box">
						  <span class="hamburger-inner"></span>
						</span>
                    </button>
                </div>
            </div>
            <div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
                <ul class="header-nav nav">
                    <!-- .nav-item -->
                    <li class="nav-item header-nav-dropdown">
                        <a href="<?php echo base_url("User/logout"); ?>" class="text-white">Logout</a>
                    </li>
                </ul>

            </div>
        </div>
    </header>
      
		<aside class="app-aside">
			<div class="aside-content p-1">
				<header class="aside-header d-block d-md-none">
					<button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside">
					  <span class="user-avatar user-avatar-lg">
						<img src="https://www.primepropertyturkey.com/assets/web-site/images/logo-new%20kopya.png" alt="">
					  </span>
					</button>
				</header>

			  <section class="aside-menu has-scrollable">
				<nav id="stacked-menu" class="stacked-menu">
					<select class="custom-select d-block w-100" id="user_list" required="">
						<?php 
    				    if($this->session->userdata('admin_user_type')!=""){
    				        $user_row=$this->Users_Model->get_user_single_record($this->session->userdata('admin_user_type'));
    				    ?>
    				    <option value="<?php echo $this->session->userdata('admin_user_type'); ?>"><?php echo $user_row->name; ?></option>
    				    <?php } ?>
					</select>
					<hr>
					<ul class="menu">
						<li class="menu-item">
						  <a href="<?php echo base_url("Users/dashboard"); ?>" class="menu-link <?php if(current_url()==base_url("Users/dashboard")){ echo"left_active"; }?>">
							<span class="menu-icon oi oi-dashboard"></span>
							<span class="menu-text">Dashboard</span>
                              <span class="badge badge-pill badge-danger">+<?= $this->Users_Model->usersBadgeNewLead(1); ?></span>
                              <span class="badge badge-pill badge-info" style="margin-left: 2.2rem;margin-right: 2.2rem;">+<?= $this->Users_Model->usersBadgeNewLead(2); ?></span>
						  </a>
						</li>
						<li class="menu-item">
						  <a href="<?php echo base_url("Users/sold_pool"); ?>" class="menu-link <?php if(current_url()==base_url("Users/sold_pool")){ echo"left_active"; }?>">
							<span class="menu-icon oi oi-dashboard"></span>
							<span class="menu-text">Sold Pool</span>
						  </a>
						</li>
						<li class="menu-item">
						  <a href="<?php echo base_url("Users/uninterested_pool"); ?>" class="menu-link <?php if(current_url()==base_url("Users/uninterested_pool")){ echo"left_active"; }?>">
							<span class="menu-icon oi oi-dashboard"></span>
							<span class="menu-text">Uninterested Pool</span>
						  </a>
						</li>
                        <li class="menu-item">
                            <a href="<?php echo base_url("Users/Dubai_pool"); ?>" class="menu-link <?php if(current_url()==base_url("Users/Dubai_pool")){ echo"left_active"; }?>">
                                <span class="menu-icon oi oi-dashboard"></span>
                                <span class="menu-text">Dubai Pool</span>
                                <span class="badge badge-pill badge-danger">+<?= $this->Users_Model->usersBadgeNewLeadDubai(1); ?></span>
                                <span class="badge badge-pill badge-info" style="margin-left: 2.2rem;margin-right: 2.2rem;">+<?= $this->Users_Model->usersBadgeNewLeadDubai(2); ?></span>
                            </a>
                        </li>
						<li class="menu-item">
						  <a href="<?php echo base_url("import"); ?>" class="menu-link <?php if(current_url()==base_url("import")){ echo"left_active"; }?>">
							<span class="menu-icon oi oi-dashboard"></span>
							<span class="menu-text">Import Excel</span>
						  </a>
						</li>
						<li class="menu-item">
						  <a href="<?php echo base_url("Users/change_password"); ?>" class="menu-link <?php if(current_url()==base_url("Users/change_password")){ echo"left_active"; }?>">
							<span class="menu-icon oi oi-dashboard"></span>
							<span class="menu-text">Change Password</span>
						  </a>
						</li>
						<li class="menu-item">
						  <a href="<?php echo base_url("User/logout"); ?>" class="menu-link <?php if(current_url()==base_url("User/logout")){ echo"left_active"; }?>">
							<span class="menu-icon oi oi-dashboard"></span>
							<span class="menu-text">Logout</span>
						  </a>
						</li>
					</ul>
					<hr>
					<div class="btn-group btn-group-toggle" data-toggle="buttons">
						<label class="btn btn-secondary active" style="font-size: 12px;font-weight:bold;" onclick="view_lead_cats('user-Today');">
						  <input type="radio" name="options" id="option1" autocomplete="off" checked=""> Today</label>
						<label class="btn btn-secondary" style="font-size: 12px;font-weight:bold;" onclick="view_lead_cats('user-This Month');">
						  <input type="radio" name="options" id="option2" autocomplete="off"> This Month</label>
						<label class="btn btn-secondary" style="font-size: 12px;font-weight:bold;" onclick="view_lead_cats('user-This Year');">
						  <input type="radio" name="options" id="option3" autocomplete="off"> This Year</label>
					</div>
	
					<?php 
    				if($this->session->userdata('admin_user_type')!=""){
    				?>
    				<div id="show_lead_cat">
        				<section class="card card-fluid">
    						<div class="">
    							<table class="table table-bordered">
    								<thead class="bg-secondary"  style="font-size:11px;">
    									<tr>
    										<th>CONSULTANT </th>
    										<th>CALLS</th>
    										<th>SPEAKS</th>
    									</tr>
    								</thead>
    								<tbody>
    								<?php 
    								$activity_row=$this->Users_Model->get_user_today_lead_activity();
    								foreach($activity_row as $row_activity){ ?>
    									<tr>
    										<td><?php echo $row_activity->name; ?></td>
    										<td><?php echo $row_activity->called; ?></td>
    										<td><?php echo $row_activity->spoken; ?></td>
    									</tr>
    								<?php } ?>
    								</tbody>
    							</table>
    						</div>
    					</section>
    				</div>
    				<?php } ?>
				</nav>
			  </section>
			</div>
		</aside>