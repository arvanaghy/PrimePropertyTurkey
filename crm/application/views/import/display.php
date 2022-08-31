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
							<strong>Excel file:Dispaly</strong>
						</div>
					</div>
											
					<section class="card">						
						<div class="col-md-12">						
							<div class="card-body row">
            					<div class="col-md-12">
            						<section class="card">
            						  <!-- .card-body -->
            						  <div class="card-body">
            							<h3 class="card-title">Excel file:Dispaly</h3>
                                        <div class="table-responsive">
                                            <table class="table table-hover tablesorter">
                                                <thead>
                                                    <tr>
                                                        <th class="header">Name</th>
                                                        <th class="header">Phone</th>                           
                                                        <th class="header">Email</th>                      
                                                        <th class="header">Country</th>
                                                        <th class="header">City</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (isset($employeeInfo) && !empty($employeeInfo)) {
                                                        foreach ($employeeInfo as $key => $element) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $element['first_name']; ?></td>   
                                                                <td><?php echo $element['mobile']; ?></td> 
                                                                <td><?php echo $element['email']; ?></td>                       
                                                                <td><?php echo $element['country']; ?></td>
                                                                <td><?php echo $element['city']; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr>
                                                            <td colspan="5">There is no employee.</td>    
                                                        </tr>
                                                    <?php } ?>
                                        
                                                </tbody>
                                            </table>
                                        </div> 
            							
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

