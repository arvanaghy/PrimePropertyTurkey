    <style>
		.btn-theme{background-color:green!important;color:white;}
		.left_active{background-color: green!important;color: white!important;padding-bottom:5px;}
        .page-inner .card .col-md-12{
            padding-right: 0 !important;
            padding-left: 0 !important;
        }
        .page-inner .card .card-body{
            padding:0.2rem !important;
        }
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
					    <?php if($this->session->userdata('type')=="1"){ ?>
    						<option value="">... Select Member ... </option>
    						<?php $user_row=$this->User_Model->get_crm_user_list();
    							foreach($user_row as $row_user){ ?>
    							<option value="<?php echo base_url("Users/open_user/$row_user->user_id"); ?>"><?php echo $row_user->name; ?></option>
    						<?php } ?>
						<?php } ?>
						<?php if($this->session->userdata('type')=="2"){ ?>
    				        <option value="<?php echo $this->session->userdata('type'); ?>"><?php echo $this->session->userdata('name'); ?></option>
    				    <?php } ?>
					</select>
					<hr>
					<ul class="menu">
						<li class="menu-item">
						  <a href="<?php echo base_url("User/dashboard"); ?>" class="menu-link <?php if(current_url()==base_url("User/dashboard")){ echo"left_active"; }?>">
							<span class="menu-icon oi oi-dashboard"></span>
							<span class="menu-text text-left ">Dashboard</span>
                              <?php if($this->session->userdata('type')=="2"){ ?>
                              <span class="badge badge-pill badge-danger">+<?= $this->User_Model->userBadgeNewLead(1); ?></span>
                              <span class="badge badge-pill badge-info" style="margin-left: 2.2rem;margin-right: 2.2rem;">+<?= $this->User_Model->userBadgeNewLead(2); ?></span>
                              <? }elseif($this->session->userdata('type')=="1"){?>
                                  <span class="badge badge-pill badge-danger">+<?= $WebComeNewLeadCount = $this->User_Model->getWebComeNewLeadCount(); ?></span>
                              <? }  ?>
						  </a>
						</li>
						<li class="menu-item">
						  <a href="<?php echo base_url("User/sold_pool"); ?>" class="menu-link <?php if(current_url()==base_url("User/sold_pool")){ echo"left_active"; }?>">
							<span class="menu-icon oi oi-dashboard"></span>
							<span class="menu-text">Sold Pool</span>
						  </a>
						</li>
						<li class="menu-item">
						  <a href="<?php echo base_url("User/uninterested_pool"); ?>" class="menu-link <?php if(current_url()==base_url("User/uninterested_pool")){ echo"left_active"; }?>">
							<span class="menu-icon oi oi-dashboard"></span>
							<span class="menu-text">Uninterested Pool</span>
						  </a>
						</li>
                        <li class="menu-item">
                            <a href="<?php echo base_url("User/Dubai_pool"); ?>" class="menu-link <?php if(current_url()==base_url("User/dubai_pool")){ echo"left_active"; }?>">
                                <span class="menu-icon oi oi-dashboard"></span>
                                <span class="menu-text">Dubai Pool</span>
                                <? if($this->session->userdata('type')=="2"){ ?>
                                <span class="badge badge-pill badge-danger">+<?= $this->User_Model->userBadgeNewLeadDubai(1); ?></span>
                                <span class="badge badge-pill badge-info" style="margin-left: 2.2rem;margin-right: 2.2rem;">+<?= $this->User_Model->userBadgeNewLeadDubai(2); ?></span>
                                <? } ?>
                            </a>
                        </li>
						
    					<?php 
    				    if($this->session->userdata('type')=="1"){
    				    ?>
    				    <li class="menu-item">
						  <a href="<?php echo base_url("User/manage_leads"); ?>" class="menu-link <?php if(current_url()==base_url("User/manage_leads")){ echo"left_active"; }?>">
							<span class="menu-icon oi oi-dashboard"></span>
							<span class="menu-text">Manage Leads</span>
						  </a>
						</li>
                        <li class="menu-item">
                            <a href="<?php echo base_url("User/manage_dubai_leads"); ?>" class="menu-link <?php if(current_url()==base_url("User/manage_dubai_leads")){ echo"left_active"; }?>">
                                <span class="menu-icon oi oi-dashboard"></span>
                                <span class="menu-text">Manage Duabi Leads</span>
                            </a>
                            </li>
						
						<li class="menu-item">
						  <a href="<?php echo base_url("User/add_user"); ?>" class="menu-link <?php if(current_url()==base_url("User/add_user")){ echo"left_active"; }?>">
							<span class="menu-icon oi oi-dashboard"></span>
							<span class="menu-text">Manage User</span>
						  </a>
						</li>
						<li class="menu-item">
						  <a href="<?php echo base_url("User/manage_news_letter"); ?>" class="menu-link <?php if(current_url()==base_url("User/manage_news_letter")){ echo"left_active"; }?>">
							<span class="menu-icon oi oi-dashboard"></span>
							<span class="menu-text">Manage News Letter</span>
						  </a>
						</li>
					    <?php
					    } 
					        if($this->session->userdata('type')=="2"){
					    ?>
    					    <li class="menu-item">
    						  <a href="<?php echo base_url("User/manage_user_news_letter"); ?>" class="menu-link <?php if(current_url()==base_url("User/manage_user_news_letter")){ echo"left_active"; }?>">
    							<span class="menu-icon oi oi-dashboard"></span>
    							<span class="menu-text">Manage News Letter</span>
    						  </a>
    						</li>
					    <?php } ?>
					    <li class="menu-item">
						  <a href="<?php echo base_url("import"); ?>" class="menu-link <?php if(current_url()==base_url("import")){ echo"left_active"; }?>">
							<span class="menu-icon oi oi-dashboard"></span>
							<span class="menu-text">Import Excel</span>
						  </a>
						</li>
					    <li class="menu-item">
						  <a href="<?php echo base_url("User/change_password"); ?>" class="menu-link <?php if(current_url()==base_url("User/change_password")){ echo"left_active"; }?>">
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
						<!--<li class="menu-item has-child">
						  <a href="#" class="menu-link">
							<span class="menu-icon oi oi-people"></span>
							<span class="menu-text">Clients</span>
						  </a>
						  <ul class="menu">
							<li class="menu-item">
							  <a href="user-profile.html" class="menu-link">Client1</a>
							</li>
							<li class="menu-item">
							  <a href="user-activities.html" class="menu-link">Client2</a>
							</li>
						  </ul>
						</li>

						<li class="menu-item">
						  <a href="index.html" class="menu-link">
							<span class="menu-icon oi oi-dashboard"></span>
							<span class="menu-text">Sale Performance Table</span>
						  </a>
						</li>-->
					</ul>
					<hr>
					
	
					<?php 
    				    if($this->session->userdata('type')=="1"){
    				?>
    				<div class="btn-group btn-group-toggle" data-toggle="buttons">
						<label class="btn btn-secondary active" style="font-size: 12px;font-weight:bold;" onclick="view_lead_cat('Today');">
						  <input type="radio" name="options" autocomplete="off" checked=""> Today</label>
						<label class="btn btn-secondary" style="font-size: 12px;font-weight:bold;" onclick="view_lead_cat('This Month');">
						  <input type="radio" name="options" autocomplete="off"> This Month</label>
						<label class="btn btn-secondary" style="font-size: 12px;font-weight:bold;" onclick="view_lead_cat('This Year');">
						  <input type="radio" name="options" autocomplete="off"> This Year</label>
					</div>
    				<div id="show_lead_cat">
    				    <section class="card card-fluid">
            				<div class="">
            					<table class="table table-bordered">
            						<thead class="bg-secondary" style="font-size:11px;">
            							<tr>
            								<th>CONSULTANT </th>
            								<th>CALLS</th>
            								<th>SPEAKS</th>
            							</tr>
            						</thead>
            						<tbody>
            						<?php 
            						$activity_row=$this->User_Model->get_today_lead_activity();
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
					
					<?php 
    				    if($this->session->userdata('type')=="2"){
    				?>
    				<div class="btn-group btn-group-toggle" data-toggle="buttons">
						<label class="btn btn-secondary active" style="font-size: 12px;font-weight:bold;" onclick="view_lead_cat('user-Today');">
						  <input type="radio" name="options" autocomplete="off" checked=""> Today</label>
						<label class="btn btn-secondary" style="font-size: 12px;font-weight:bold;" onclick="view_lead_cat('user-This Month');">
						  <input type="radio" name="options" autocomplete="off"> This Month</label>
						<label class="btn btn-secondary" style="font-size: 12px;font-weight:bold;" onclick="view_lead_cat('user-This Year');">
						  <input type="radio" name="options" autocomplete="off"> This Year</label>
					</div>
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
    								$activity_row=$this->User_Model->get_user_today_lead_activity();
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
		