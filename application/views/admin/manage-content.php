<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <title>Dashboard</title>
		
        <?php $this->load->view('template/admin-css.php');?>
    </head>
    <body>
	<?php $this->load->view('template/admin-header.php');?>
        <div class="wrapper">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                      <br>
                    </div>
                </div>

<div class="row">
                   

                    <div class="col-lg-12">
                        <div class="card-box">
                            

                            <h4 class="header-title m-t-0 m-b-30">Manage Content</h4>
							<hr>
							<?php
							$success_message = $this->session->flashdata('success_message');
							$error_message = $this->session->flashdata('error_message');				
							echo"<p class='text-success text-center'><strong> $success_message </strong></p>";
							echo"<p class='text-danger text-center'><strong> $error_message </strong></p>";
							?>
                            <form class="form-horizontal" role="form" data-parsley-validate="" novalidate="">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Select Page Name&nbsp;<strong class="text-danger">*&nbsp;</strong>:</label>
                                    <div class="col-sm-10">
                <select class="form-control" id="dropdown_selector">
					<option value="">Select Page Name</option>
					<option value="Home">Home</option>
					<option value="About">About</option>
					<option value="Course Features">Course Features</option>
					<option value="Training">Training</option>
					<option value="Manpower Supply">Manpower Supply</option>
					<option value="Engineering Projects">Engineering Projects</option>					
					<option value="Piping Design Engineering">Piping Design Engineering</option>
					<option value="Electrical Design Engineering">Electrical Design Engineering</option>
					<option value="Piping Stress Engineering">Piping Stress Engineering</option>
					<option value="Mechenical Equipment Design Engineering">Mechenical Equipment Design Engineering</option>
					<option value="Civil & Structural Engineering">Civil & Structural Engineering</option>
					<option value="Process Design Engineering">Process Design Engineering</option>
					<option value="HVAC Design Engineering">HVAC Design Engineering</option>         
                </select>
                                    </div>
                                </div>
                                <div id="selectedDetails"></div>
                            </form>
                        </div>
                    </div><!-- end col -->
					
                </div>


                <!-- Footer -->
                <?php $this->load->view('template/admin-footer.php');?>
                <!-- End Footer -->
            </div>
            <!-- end container -->
        </div>
<?php $this->load->view('template/admin-js.php');?>
      <script>
$(document).ready( function ()
{
	$('#dropdown_selector').change(function()
	{
		var option = $(this).find('option:selected').val();
		if(option=="")
					 {
		$("#selectedDetails").load('<?php echo base_url("User/page_action");?>');
				    }
					else
					{
        $("#selectedDetails").load('<?php echo base_url("User/page_action");?>', {"Page_value": option});
					}
	});
});
	</script>
	
    </body>
</html>