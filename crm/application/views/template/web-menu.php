		<header class="header">
            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <ul class="menu sf-arrows">
                            <li><a <?php if(current_url()==base_url()){ ?>class="active" <?php } ?> href="<?php echo base_url(); ?>">Home</a></li>
                            <li><a <?php if(current_url()==base_url("about-us")){ ?>class="active" <?php } ?> href="<?php echo base_url("about-us"); ?>">About</a></li>
                            <li><a <?php if(current_url()==base_url("plan")){ ?>class="active" <?php } ?> href="<?php echo base_url("plan"); ?>">Plan</a></li>
                            <li><a <?php if(current_url()==base_url("contact-us")){ ?>class="active" <?php } ?> href="<?php echo base_url("contact-us"); ?>">Contact</a></li>
                        </ul>
                    </div>
                    <div class="header-center">
                        <a href="<?php echo base_url(); ?>" class="logo">
                            <img src="<?php echo base_url("assets/images/prime.png");?>" alt="Logo">
                        </a>
                    </div>
                    <div class="header-right">
					    &nbsp;&nbsp;&nbsp;&nbsp;
						<a href="<?php echo base_url("user_login"); ?>" class="btn btn-success btn-sm">Login</a>&nbsp;&nbsp;
						<a href="<?php echo base_url("register"); ?>" class="btn btn-primary btn-sm">Register</a>
						&nbsp;&nbsp;
                        <button class="mobile-menu-toggler" type="button">
                            <i class="icon-menu"></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>