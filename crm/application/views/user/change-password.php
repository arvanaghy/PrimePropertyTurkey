<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <?php $this->load->view('template/admin-css');?>
	<style>
		@media (min-width: 992px){
			.modal-lg {
				max-width: 95%;
			}
		}
	</style>
  </head>
<body>
    <div class="app">
		<?php $this->load->view("template/user-admin-header"); ?>
		<?php 
			//print_r($this->session->userdata('id'));
		?>
    <main class="app-main">
        <div class="wrapper">
			<div class="page">
				<div class="page-inner">
					<div class="col-lg-12 mb-2">
						<?php echo $this->session->flashdata('message'); ?>
						<div class="alert alert-danger alert-dismissible fade show row" style="color: red!important;font-size:18px;">
							<strong>Change Password</strong>
						</div>
					</div>
											
					<section class="card">						
						<div class="col-md-12">						
							<div class="card-body row">
            					<div class="col-md-12">
            						<section class="card">
            						  <!-- .card-body -->
            						  <div class="card-body">
            							<h3 class="card-title"> Change Password </h3>
            							<!-- form .needs-validation -->
            							<form class="needs-validation" novalidate="" action="<?php echo base_url("User/change_password_details"); ?>" method="POST">
            							  <!-- .form-row -->
            							  <div class="form-row">
            								<!-- /form grid -->
            								<div class="col-md-12 mb-3">
            								  <label for="validationTooltip01">Old Password
            									<abbr title="Required">*</abbr>
            								  </label>
            								  <input type="password" class="form-control" placeholder="Old Password" name="OldPassword" required="">
            								</div>

            								<div class="col-md-12 mb-3">
            								  <label for="validationTooltip01">New Password
            									<abbr title="Required">*</abbr>
            								  </label>
            								  <input type="password" class="form-control" placeholder="New Password" name="NewPassword" required="">
            								</div>
            								
            								<div class="col-md-12 mb-3">
            								  <label for="validationTooltip01">Confirm Password
            									<abbr title="Required">*</abbr>
            								  </label>
            								  <input type="password" class="form-control" placeholder="Confirm Password" name="ConfirmPassword" required="">
            								</div>
            							  </div>
            							  <!-- /.form-row -->
            							  <!-- .form-actions -->
            							  <div style="float: right;">
            								<button class="btn btn-success" type="submit" name="register">Change Password</button>
            								<button class="btn btn-success" type="reset">Reset</button>
            							  </div>
            							  <!-- /.form-actions -->
            							</form>
            							<!-- /form .needs-validation -->
            						  </div>
            						  <!-- /.card-body -->
            						</section>
            					</div>
								
							</div>
						</div>
					</section>	  
				</div>
            </div>
        </div>
    </main>
</div>

    <?php $this->load->view('template/admin-js');?>
  </body>
</html>
