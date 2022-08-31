<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forget Password</title>
    <meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="">
	<?php $this->load->view("template/web-css"); ?>
	<style>
		.login-container{
			margin-top: 2%;
			margin-bottom: 2%;
		}
		.login-form-1{
			/*padding: 5%;*/
			box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
			border-radius:3px;
		}
		.login-form-1 h3{
			text-align: center;
			color: #333;
		}
		
		.login-container form{
			/*padding: 10%;*/
		}
		.btnSubmit
		{
			width: 100%;
			border-radius: 3px;
			padding: 1.5%;
			border: none;
			cursor: pointer;
		}
		.login-form-1 .btnSubmit{
			font-weight: 600;
			color: #fff;
			background-color: #006699;
		}
		.login-form-1 .ForgetPwd{
			color: #0062cc;
			font-weight: 600;
			text-decoration: none;
		}

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
                        <li class="breadcrumb-item active" aria-current="page">Forget Password</li>
                    </ol>
                </div>
            </nav>
			
			<div class="container login-container">
				<div class="row">
					<div class="col-md-3">&nbsp;</div>
					<div class="col-md-6 login-form-1 p-5">
						<h2 class="mt-2 text-center">Forget Password</h2>
						<hr>
						<?php echo $this->session->flashdata('message'); ?>
						<form action="<?php //echo base_url("User/user_login"); ?>" method="POST">
							<div class="form-group">
								<input type="text" name="username" class="form-control" placeholder="Mobile *" required />
							</div>
							<div class="form-group">
								<input type="submit" name="login" class="btnSubmit" value="Send" />
							</div>
						</form>
					</div>
					<div class="col-md-3">&nbsp;</div>
				</div>
			</div>
	
        </main>
        <?php $this->load->view("template/web-footer"); ?> 
    </div>
     <?php $this->load->view("template/web-js"); ?>
</body>
</html>