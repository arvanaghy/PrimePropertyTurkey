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
                <div class="col-sm-3"></div>
				<div class="card-box col-sm-6">
                            <h4 class="header-title m-t-0 m-b-30">Update Property</h4>
							<?php
							$success_message = $this->session->flashdata('successful_message');
							$error_message = $this->session->flashdata('error_message');				
							echo"<p class='text-success text-center'><strong> $success_message </strong></p>";
							echo"<p class='text-danger text-center'><strong> $error_message </strong></p>";
							$Property_ID=$this->uri->segment(3);
							$data=$this->User_Model->get_single_property_details($Property_ID);
							foreach ($data as $property_info)
							{
							}
							?>
							<hr>
					  		<?php
							$success_message = $this->session->flashdata('successful_message');
							$error_message = $this->session->flashdata('error_message');				
							echo"<p class='text-success text-center'><strong> $success_message </strong></p>";
							echo"<p class='text-danger text-center'><strong> $error_message </strong></p>";
							?>
					  <div class="modal-body" style="padding:0px!important;">
						<p>
                         <form enctype='multipart/form-data' class="form-horizontal" action="<?php echo base_url("User/Update_Property_details"); ?>" method="POST">
						        <div class="form-group">
                                    <label for="hori-pass1" class="col-sm-4 control-label text-left">Property Title*</label>
                                    <div class="col-sm-8">
                                        <input id="hori-pass1" type="text" placeholder="Property Title*" required="" class="form-control" data-parsley-id="19" name="Title" value="<?php echo $property_info->PropertyTitle; ?>">
                                    </div>
                                </div>
								<div class="form-group">
								    <label for="hori-pass2" class="col-sm-4 control-label text-left">Property Type*</label>
								    
									<div class="col-sm-6">
									     <input type="file" required="" class="form-control" name="userfile">	
									</div>
									
									     <img src="<?php echo $property_info->PropertyImage; ?>" class="img-responsive panel panel-default" style="height:38px;width:80px;">	
									
                                </div>
                                <div class="form-group">
                                    <label for="hori-pass2" class="col-sm-4 control-label text-left">Property Type*</label>
                                    <div class="col-sm-8">
                                        <select name="type" class="form-control">
										     <option value="" >Select Property Type</option>
											 <option value="Residential" <?php if($property_info->PropertyType=="Residential"){echo"selected";} ?>>Residential</option>
											 <option value="Commercial" <?php if($property_info->PropertyType=="Commercial"){echo"selected";} ?>>Commercial</option>
										</select>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label for="hori-pass2" class="col-sm-4 control-label text-left">Property Price
                                        *</label>
                                    <div class="col-sm-8">
                                        <input type="number" required="" placeholder="Property Price*" class="form-control" name="price" value="<?php echo $property_info->PropertyPrice; ?>">
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label for="hori-pass2" class="col-sm-4 control-label text-left">Property Phone
                                        *</label>
                                    <div class="col-sm-8">
                                        <input type="number" required="" placeholder="Property Phone*" class="form-control" name="phone" value="<?php echo $property_info->PropertyPhone; ?>">
                                    </div>
                                </div>
								<div class="form-group">
                                    <label for="hori-pass2" class="col-sm-4 control-label text-left">Property Email
                                        *</label>
                                    <div class="col-sm-8">
                                        <input type="email" required="" placeholder="Property Email" class="form-control" name="email" value="<?php echo $property_info->PropertyEmail; ?>">
                                    </div>
                                </div>
								<div class="form-group">
                                    <label for="hori-pass2" class="col-sm-4 control-label text-left">Property Address
                                        *</label>
                                    <div class="col-sm-8">
                                        <textarea required="" placeholder="Property Address*" class="form-control" name="address"><?php echo $property_info->PropertyAddress; ?></textarea>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="hori-pass2" class="col-sm-4 control-label text-left">Property Description*</label>
                                    <div class="col-sm-8">
                                        
										<textarea required="" placeholder="Property Decription*" class="form-control" name="description"><?php echo $property_info->PropertyDescription; ?></textarea>
                                    </div>
                                </div>
								
                                
                                
                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-8">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Update Property
                                        </button>
                                    </div>
                                </div>
                            </form>
						</p>
					  </div>	
                        </div>
                    <div class="col-sm-3"></div>
                <?php $this->load->view('template/admin-footer.php');?>
                <!-- End Footer -->
            </div>
            <!-- end container -->
        </div>
<?php $this->load->view('template/admin-js.php');?>
<link href="<?php echo base_url("AdminAssets/plugins/summernote/summernote.css");?>" rel="stylesheet" / >                 
<script src="<?php echo base_url("AdminAssets/plugins/summernote/summernote.min.js");?>"></script>
<script>
	$(document).ready(function() {
	$('.summernote').summernote({
					height: 100,                 // set editor height
					minHeight: null,             // set minimum height of editor
					maxHeight: null,             // set maximum height of editor
					focus: false                 // set focus to editable area after initializing summernote
				});
	});
	var postForm = function() {
		var content = $('textarea[name="content"]').html($('.summernote').code());
	}
</script>
    </body>
</html>