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
		<?php $this->load->view("template/admin-header"); ?>
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
							<strong>Manage User</strong>
						</div>
					</div>
											
					<section class="card">						
						<div class="col-md-12">						
							<div class="card-body row">
						
								<div class="col-md-9">
					
						<div class="card">
							<div class="table-responsive">
							  <!-- .table -->
							  <table class="table">
								<!-- thead -->
								<thead>
								  <tr>
								    <th> S.No.</th>
								    <th class="text-center"> Action</th>
								    <th class="text-center"> Status</th>
									<th> Name</th>
									<th> Phone</th>
									<th> Email(Username)</th>
									<th> Password</th>
									<!--<th> Created Date </th>-->
								  </tr>
								</thead>
								<!-- /thead -->
								<!-- tbody -->
								<tbody>
								<?php
								$rows=$this->User_Model->get_user_list(); 
								$counter=1;
								foreach($rows as $row){
								    //print_r($row);
								?> 
								  <tr>
									<td class="align-middle"><?php echo $counter++ ?></td>
									<td class="align-middle text-center">
									  <a href="#" onclick="view_details('<?php echo $row->user_id ; ?>');" data-toggle="modal" data-target="#UserModal" class="btn btn-sm btn-secondary">
										<i class="fa fa-pencil-alt"></i>
										<span class="sr-only">Edit</span>
									  </a>
									</td>
									<td>
									<?php 
									 if($row->type==2){echo'<span class="badge badge-success badge-md">Admin</span>';}else{echo'<span class="badge badge-danger badge-md">Super Admin</span>';}
									?>
									</td>
									<td><?php echo $row->name; ?></td>
									<td class="align-middle"> <?php echo $row->mobile; ?> </td>
									<td class="align-middle"> <?php echo $row->email; ?> </td>
									<td class="align-middle"> <?php echo $row->password; ?> </td>
									<!--<td class="align-middle"> <?php //echo $row->register_date; ?> </td>-->
								  </tr>
								<?php } ?> 
								 
								</tbody>
								<!-- /tbody -->
							  </table>
							  <!-- /.table -->
                    </div>
                    <!-- /.table-responsive -->
						</div>
					</div>
					
					<div class="col-md-3">
						<section class="card">
						  <!-- .card-body -->
						  <div class="card-body">
							<h3 class="card-title"> Add User </h3>
							<!-- form .needs-validation -->
							<form class="needs-validation" novalidate="" action="<?php echo base_url("User/add_user"); ?>" method="POST">
							  <!-- .form-row -->
							  <div class="form-row">
								<!-- form grid -->
								<div class="col-md-12 mb-3">
								  <label for="validationTooltip01">Name
									<abbr title="Required">*</abbr>
								  </label>
								  <input type="text" class="form-control" id="validationTooltip01" placeholder="Name" name="name" required="">
								  <!--<div class="valid-tooltip"> Valid! </div>-->
								</div>
								<!-- /form grid -->
								<div class="col-md-12 mb-3">
								  <label for="validationTooltip01">Phone
									<abbr title="Required">*</abbr>
								  </label>
								  <input type="number" class="form-control" id="validationTooltip01" placeholder="Phone" name="phone" required="">
								  <!--<div class="valid-tooltip"> Valid! </div>-->
								</div>
								
								<div class="col-md-12 mb-3">
								  <label for="validationTooltip01">Email&nbsp;(Username)
									<abbr title="Required">*</abbr>
								  </label>
								  <input type="email" class="form-control" id="validationTooltip01" placeholder="Email" name="email" required="">
								  <!--<div class="valid-tooltip"> Valid! </div>-->
								</div>
								
								<div class="col-md-12 mb-3">
								  <label for="validationTooltip01">Password
									<abbr title="Required">*</abbr>
								  </label>
								  <input type="password" class="form-control" placeholder="Password" name="password" required="">
								  <!--<div class="valid-tooltip"> Valid! </div>-->
								</div>
								
								<!--<div class="col-md-12 mb-3">-->
								<!--  <label for="validationTooltip01">Password-->
								<!--	<abbr title="Required">*</abbr>-->
								<!--  </label>-->
    				<!--				  <select class="form-control" name="gender">-->
    				<!--					<option value="">Gender</option>-->
    				<!--					<option value="Male">Male</option>-->
    				<!--					<option value="Female">Female</option>-->
    				<!--					<option value="Other">Other</option>-->
    				<!--			      </select>-->
								<!--</div>-->
							  </div>
							  <!-- /.form-row -->
							  <!-- .form-actions -->
							  <div style="float: right;">
								<button class="btn btn-success" type="submit" name="register">Add User</button>
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

	<!-- Sale Modal -->
	<div class="modal modal-alert fade" id="UserModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalAlertLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
		      <div id="show_user_data"></div>
		  </div>
		</div>
	</div>
	<!-- Sale nmodal -->
	
    <?php $this->load->view('template/admin-js');?>
	<script>
		function view_details(data)
			{			
			   $("#show_user_data").load('<?php echo base_url("User/get_user_data"); ?>', {"user_id": data});					
			}
			
	</script>
  </body>
</html>
