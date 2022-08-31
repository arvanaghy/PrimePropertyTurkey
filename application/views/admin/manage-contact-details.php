<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <title>Manage Contact Details</title>		
        <link href="<?php echo base_url("AdminAssets/plugins/datatables/buttons.bootstrap.min.css");?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("AdminAssets/plugins/datatables/fixedHeader.bootstrap.min.css");?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("AdminAssets/plugins/datatables/responsive.bootstrap.min.css");?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("AdminAssets/plugins/datatables/scroller.bootstrap.min.css");?>" rel="stylesheet" type="text/css" />
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
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <div class="dropdown pull-right">
                                
                            </div>
                            <?php
							$success_message = $this->session->flashdata('success_message');
							$error_message = $this->session->flashdata('error_message');				
							echo"<p class='text-success text-center'><strong> $success_message </strong></p>";
							echo"<p class='text-danger text-center'><strong> $error_message </strong></p>";
							?>
                            <h4 class="header-title m-t-0 m-b-30">Manage Contact Details </h4>
							<hr>
							<form action="<?php echo base_url("User/update_website_contact"); ?>" method="POST" id="myform">
													<div class="row"> 	
														<div class="col-sm-4 text-right" style="padding-top: 15px;">
														   <label for="Employee"><strong>Select Contact Us Type</strong></label>
														</div>
														<div class="col-sm-6">
															<div class="form-group" style="padding-top: 6px;">
																<select class="form-control custom-select" required="required" name="Contact_type" id="config_type">
																		<option value="">Select Contact Us Type</option>
																		<option value="web_address">Web Address</option>
																		<option value="web_email">Web Email</option>
																		<option value="web_phone">Web Phone</option>
																		<option value="web_website">Web Website</option>
																		<option value="web_map">Google Map</option>
																		<option value="web_facebook">Facebook</option>
																		<option value="web_twitter">Twitter</option>
																		<option value="web_instagram">Instagram</option>
																</select>
															</div>	
														</div>
														<div class="col-sm-4">
															&nbsp;
														</div>
														<div class="col-md-6 text-left">
															<p id="config_value_display"></p>
														</div>
														
													</div>
												</form>
												
				
				 <!--<form enctype='multipart/form-data' class="form-horizontal" action="<?php echo base_url("User/update_image"); ?>" method="POST">
								 <div class="form-group">
                                    <label for="hori-pass1" class="col-sm-4 control-label text-left">Property Image*</label>
                                    <div class="col-sm-8">
                                        <input type="file" required="" class="form-control" name="userfile">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-8">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Add Slider
                                        </button>
                                    </div>
                                </div>
                            </form>	-->			
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
        <script src="<?php echo base_url("AdminAssets/js/jquery.core.js");?>"></script>
        <script src="<?php echo base_url("AdminAssets/js/jquery.app.js");?>"></script>		
		<script type="text/javascript">
		$(document).ready( function () {					
			$("#config_type").change(function() {				
				var config_type = $("#config_type").val();
				if(config_type=="")
				 {
			  $("#config_value_display").load('<?php echo base_url("User/get_ajax_data");?>');
				}
				else
				{
				$("#config_value_display").load('<?php echo base_url("User/get_ajax_data");?>', {"ConfigType": config_type});
				}
			});			
	  }); 
	</script>
    </body>
</html>