<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contact Us</title>
    <meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="">
	<?php $this->load->view("template/web-css"); ?>
		<style>
		
	/* Conatct start */

        .header-title
        {
          text-align: center;
          color:#00bfff;
        }

        #tip 
        {
            display:none;  
        }

        .fadeIn
        {
          animation-duration: 3s;
        }

        .form-control
        {
        	border-radius:0px;
        	border:1px solid #EDEDED;
        }

        .form-control:focus
        {
        	border:1px solid #00bfff;
        }

        .textarea-contact
        {
        	resize:none; 
        }

        .btn-send
        {
        	border-radius: 0px;
        	border:1px solid #006699;
        	background:#006699;
        	color:#fff;
			border-radius:5px;			
        }

        .btn-send:hover
        {
        	border:1px solid white;
        	background:black;
        	color:white;
        	transition:background 0.5s;
			border-radius:5px;
        }

        .second-portion
        {
        	margin-top:50px; 
        }

		.box > .icon { text-align: center; position: relative; }
		.box > .icon > .image { position: relative; z-index: 2; margin: auto; width: 88px; height: 88px; border: 8px solid white; line-height: 88px; border-radius: 50%; background: #006699; vertical-align: middle; }
		.box > .icon:hover > .image { background: #333; }
		.box > .icon > .image > i { font-size: 36px !important; color: #fff !important; }
		.box > .icon:hover > .image > i { color: white !important; }
		.box > .icon > .info { margin-top: -24px;border-radius: 5px; background: rgba(0, 0, 0, 0.04); border: 1px solid #e0e0e0; padding: 35px 0 10px 0; min-height:163px;}
		.box > .icon:hover > .info { background: rgba(0, 0, 0, 0.04); border-color: #e0e0e0; color: white; }
		.box > .icon > .info > h3.title { font-size: 18px; color: #222; font-weight: 700; }
		.box > .icon > .info > p { font-size: 13px; color: #666; line-height: 1.5em; margin: 20px;}
		.box > .icon:hover > .info > h3.title, .box > .icon:hover > .info > p, .box > .icon:hover > .info > .more > a { color: #222; }
		.box > .icon > .info > .more a {  font-size: 12px; color: #222; line-height: 12px; text-transform: uppercase; text-decoration: none; }
		.box > .icon:hover > .info > .more > a { color: #fff; padding: 6px 8px; background-color: #63B76C; }
		.box .space { height: 30px; }

		@media only screen and (max-width: 768px)
		{
			.contact-form
			{
				margin-top:25px; 
			}

			.btn-send
			{
				width: 100%;
				padding:10px; 
			}

			.second-portion
			{
				margin-top:25px; 
			}
		}
	/* Conatct end */
	</style>
</head>
<body>
    <div class="page-wrapper">
	    <?php $this->load->view("template/web-menu"); ?>
        <main class="main">		
		
			<nav aria-label="breadcrumb" class="breadcrumb-nav mb-1" style="background-color:black;padding:20px;">
                <div class="container">
                    <ol class="breadcrumb" style="border-radius: 6px;">
                        <li class="breadcrumb-item"><a href="#"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Conatct Us</li>
                    </ol>
                </div>
            </nav>
			
			
			

<div class="container animated fadeIn">

  <div class="row">
      <div class="container second-portion">
	<div class="row">
        <!-- Boxes de Acoes -->
    	<div class="col-xs-12 col-sm-6 col-lg-4">
			<div class="box">							
				<div class="icon">
					<div class="image"><i class="fa fa-envelope" aria-hidden="true"></i></div>
					<div class="info">
						<h3 class="title">MAIL & WEBSITE</h3>
						<p>
							<i class="fa fa-envelope" aria-hidden="true"></i> &nbsp <?php echo $this->User_Model->getConfigKey("web_email");?>
							<br>
							<br>
							<i class="fa fa-globe" aria-hidden="true"></i> &nbsp <?php echo $this->User_Model->getConfigKey("web_website");?>
						</p>
					
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div>
			
        <div class="col-xs-12 col-sm-6 col-lg-4">
			<div class="box">							
				<div class="icon">
					<div class="image"><i class="fa fa-mobile" aria-hidden="true"></i></div>
					<div class="info">
						<h3 class="title">CONTACT</h3>
    					<p>
							<i class="fa fa-mobile" aria-hidden="true"></i> &nbsp (+91)-<?php echo $this->User_Model->getConfigKey("web_phone");?>
							<br>
							<br>
							<i class="fa fa-mobile" aria-hidden="true"></i> &nbsp  (+91)-<?php echo $this->User_Model->getConfigKey("web_phone");?>
						</p>
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div>
			
        <div class="col-xs-12 col-sm-6 col-lg-4">
			<div class="box">							
				<div class="icon">
					<div class="image"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
					<div class="info">
						<h3 class="title">ADDRESS</h3>
    					<p>
							 <i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp <?php echo $this->User_Model->getConfigKey("web_address");?>
						</p>
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div>		    
		<!-- /Boxes de Acoes -->
		
		<!--My Portfolio  dont Copy this -->
	    
	</div>
</div>
    <div class="col-sm-12 row mt-5 mb-5" id="parent">
    	<div class="col-sm-7">
    	<iframe width="100%" height="390px;" frameborder="0" style="border:0" src="<?php echo $this->User_Model->getConfigKey("web_map");?>" allowfullscreen></iframe>
    	</div>

    	<div class="col-sm-5">
    		<form action="form.php" class="contact-form" method="post">
	
		        <div class="form-group">
		          <input type="text" class="form-control" name="name" placeholder="Name" required="" autofocus="">
		        </div>
		    
		    
		        <div class="form-group form_left">
		          <input type="email" class="form-control" name="email" placeholder="Email" required="">
		        </div>
		    
		      <div class="form-group">
		           <input type="text" class="form-control" name="phone" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" placeholder="Mobile No." required="">
		      </div>
		      <div class="form-group">
		      <textarea class="form-control textarea-contact" rows="5" name="address" placeholder="Type Your Message/Feedback here..." required=""></textarea>
		      <br>
	      	  <button class="btn btn-default btn-send"> <span class="glyphicon glyphicon-send"></span> Send </button>
		      </div>
     		</form>
    	</div>
    </div>
  </div>



</div>
		
				
        </main>
        <?php $this->load->view("template/web-footer"); ?> 
    </div>
     <?php $this->load->view("template/web-js"); ?>
</body>
</html>