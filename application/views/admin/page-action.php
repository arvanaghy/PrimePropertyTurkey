<?php
@$Page_name=$this->uri->segment(3);
if(isset($Page_name))
{
	echo"<hr>";
	?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <title><?php echo $Page_name;  ?></title>		
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
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">Manage Content <span class="text-danger">(<?php echo $output = str_replace('_', ' ',ucfirst($this->uri->segment('3')));?>)</span>
						<?php
						if($Page_name=="home")
						{
						?><span class="pull-right"><a href="#"  class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Slider</a></span>
						<?php } 
						if($Page_name=="testimonials") { ?>
							<span class="pull-right"><a href="#"  class="btn btn-primary" data-toggle="modal" data-target="#myTestimonials">Add Testimonials</a></span>
						<?php } ?>
						<?php if($Page_name=="event") { ?>
							<span class="pull-right"><a href="#"  class="btn btn-primary" data-toggle="modal" data-target="#myEvent">Add Event</a></span>
						<?php } ?>
						<?php if($Page_name=="naturopathe") { ?>
							<span class="pull-right"><a href="#"  class="btn btn-primary" data-toggle="modal" data-target="#myNaturopathe">Add Naturopathe</a></span>
						<?php } ?>
						<?php if($Page_name=="classes") { ?>
							<span class="pull-right"><a href="#"  class="btn btn-primary" data-toggle="modal" data-target="#myClasses">Add Classes</a></span>
						<?php } ?>
						</h4>
					    <hr>
						<?php
						$success_message = $this->session->flashdata('success_message');
						$error_message = $this->session->flashdata('error_message');				
						echo"<p class='text-success text-center'><strong> $success_message </strong></p>";
						echo"<p class='text-danger text-center'><strong> $error_message </strong></p>";
						?>	
						<?php	
						if($Page_name=="testimonials")
						{
						?>
                            <div class="row">
                                <div class="col-lg-12">
								    <table class="table">
										<thead>
										  <tr>
										    <th>S.No.</th>
											<th>Image</th>
											<th>Name</th>
											<th>Degisition</th>											
											<th>Description</th>
											<th>Action</th>
										  </tr>
										</thead>
										<tbody>
											<?php 
											$counter=1;
											$trainer_data=$this->User_Model->get_trainer_details();
											foreach ($trainer_data as $trainer_info)
											{
											?>
											<tr>
											    <td><?php echo $counter++; ?></td>
												<td><img class="img-thumbnail" src="<?php echo base_url($trainer_info->Trainer_Image); ?>" height="80px" width="100px"></td>
												<td><?php echo $trainer_info->Trainer_Name; ?></td>
												<td><?php echo $trainer_info->Trainer_Post_Name; ?></td>
												<td><?php echo $trainer_info->Trainer_Faceboook_Link; ?></td>
												<td><a href="<?php echo base_url("User/update_trainer/$trainer_info->Trainer_ID"); ?>" class="btn btn-primary">Update</a>
												<a href="<?php echo base_url("User/delete_trainer/$trainer_info->Trainer_ID"); ?>" class="btn btn-danger">Delete</a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table> 
						<?php	
						}
						if($Page_name=="classes")
						{
						?>
                            <div class="row">
                                <div class="col-lg-12">
								    <table class="table">
										<thead>
										  <tr>
										    <th>S.No.</th>
											<th>Image</th>
											<th>Classes Name</th>
											<th>Classes Time</th>																					
											<th>Action</th>
										  </tr>
										</thead>
										<tbody>
											<?php 
											$counter=1;
											$slider_data=$this->User_Model->get_slider_details($Page_name);
											foreach ($slider_data as $slider_info)
											{
											?>
											<tr>
											    <td><?php echo $counter++; ?></td>
												<td><img class="img-thumbnail" src="<?php echo base_url($slider_info->image_galleryImage); ?>" height="80px" width="100px"></td>
												<td><?php echo $slider_info->image_gallery_Content; ?></td>
												<td><?php echo $slider_info->image_gallery_Content2; ?></td>
												<td><a href="<?php echo base_url("User/update_slider/$slider_info->image_galleryID/classes"); ?>" class="btn btn-primary">Update</a>
												<a href="<?php echo base_url("User/delete_gallery_data/$slider_info->image_galleryID/classes"); ?>" class="btn btn-danger">Delete</a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table> 
                                </div>
                            </div>
						<?php	
						}
						if($Page_name=="event")
						{
						?>
                            <div class="row">
                                <div class="col-lg-12">
								    <table class="table">
										<thead>
										  <tr>
										    <th>S.No.</th>
											<th>Image</th>
											<th>Event Title</th>
											<th>Event Description</th>																					
											<th>Action</th>
										  </tr>
										</thead>
										<tbody>
											<?php 
											$counter=1;
											$slider_data=$this->User_Model->get_slider_details($Page_name);
											foreach ($slider_data as $slider_info)
											{
											?>
											<tr>
											    <td><?php echo $counter++; ?></td>
												<td><img class="img-thumbnail" src="<?php echo base_url($slider_info->image_galleryImage); ?>" height="80px" width="100px"></td>
												<td><?php echo $slider_info->image_gallery_Content; ?></td>
												<td><?php echo $slider_info->image_gallery_Content2; ?></td>
												<td><a href="<?php echo base_url("User/update_slider/$slider_info->image_galleryID/event"); ?>" class="btn btn-primary">Update</a>
												<a href="<?php echo base_url("User/delete_gallery_data/$slider_info->image_galleryID/event"); ?>" class="btn btn-danger">Delete</a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table> 
                                </div>
                            </div>
						<?php	
						}
						if($Page_name=="naturopathe")
						{
						?>
                            <div class="row">
                                <div class="col-lg-12">
								    <table class="table">
										<thead>
										  <tr>
										    <th>S.No.</th>
											<th>Image</th>
											<th>Naturopathe Name</th>																					
											<th>Action</th>
										  </tr>
										</thead>
										<tbody>
											<?php 
											// $Page_name="home";
											$counter=1;
											$slider_data=$this->User_Model->get_slider_details($Page_name);
											foreach ($slider_data as $slider_info)
											{
											?>
											<tr>
											    <td><?php echo $counter++; ?></td>
												<td><img class="img-thumbnail" src="<?php echo base_url($slider_info->image_galleryImage); ?>" height="80px" width="100px"></td>
												<td><?php echo $slider_info->image_gallery_Content; ?></td>
												<td><a href="<?php echo base_url("User/update_slider/$slider_info->image_galleryID/naturopathe"); ?>" class="btn btn-primary">Update</a>
												<a href="<?php echo base_url("User/delete_gallery_data/$slider_info->image_galleryID/naturopathe"); ?>" class="btn btn-danger">Delete</a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table> 
                                </div>
                            </div>
						<?php	
						}
						if($Page_name=="home")
						{
						?>
						    <h3>Manage Slider</h3> 
                            <div class="row well">
                                <div class="col-lg-12">
								    <table class="table">
										<thead>
										  <tr>
										    <th>S.No.</th>
											<th>Image</th>
											<th>First Title</th>																					
											<th>Second Title</th>
											<th>Button Link</th>
											<th>Action</th>
										  </tr>
										</thead>
										<tbody>
											<?php 
											$counter=1;
											$slider_data=$this->User_Model->get_slider_details($Page_name);
											foreach ($slider_data as $slider_info)
											{
											?>
											<tr>
											    <td><?php echo $counter++; ?></td>
												<td><img class="img-thumbnail" src="<?php echo base_url($slider_info->image_galleryImage); ?>" height="80px" width="100px"></td>
												<td><?php echo $slider_info->image_gallery_Content; ?></td>
												<td><?php echo $slider_info->image_gallery_Content2; ?></td>
												<td><?php echo $slider_info->image_gallery_Content3; ?></td>
												<td><a href="<?php echo base_url("User/update_slider/$slider_info->image_galleryID/home"); ?>" class="btn btn-primary">Update</a>
												<a href="<?php echo base_url("User/delete_gallery_data/$slider_info->image_galleryID/home"); ?>" class="btn btn-danger">Delete</a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table> 
                                </div>
                            </div>
							<hr>
							<h3>Manage Box After Slider Bottom <span class="pull-right"><a href="#"  class="btn btn-primary" data-toggle="modal" data-target="#myNewModel">Add New</a></span></h3> 
							<div class="row well">
                                <div class="col-lg-12">
								    <table class="table">
										<thead>
										  <tr>
										    <th>S.No.</th>
											<th>Image</th>
											<th>Title</th>																					
											<th>Description</th>
											<th>Link</th>
											<th>Action</th>
										  </tr>
										</thead>
										<tbody>
											<?php 
											$counter=1;
											$slider_data=$this->User_Model->get_slider_details("home_bottom");
											foreach ($slider_data as $slider_info)
											{
											?>
											<tr>
											    <td><?php echo $counter++; ?></td>
												<td><img class="img-thumbnail" src="<?php echo base_url($slider_info->image_galleryImage); ?>" height="80px" width="100px"></td>
												<td><?php echo $slider_info->image_gallery_Content; ?></td>
												<td><?php echo $slider_info->image_gallery_Content2; ?></td>
												<td><?php echo $slider_info->image_gallery_Content3; ?></td>
												<td><a href="<?php echo base_url("User/update_slider/$slider_info->image_galleryID/home_bottom"); ?>" class="btn btn-primary">Update</a>
												<a href="<?php echo base_url("User/delete_gallery_data/$slider_info->image_galleryID"); ?>" class="btn btn-danger">Delete</a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table> 
                                </div>
                            </div>
						<?php	
						}
						?>					   		
                        </div>
                    </div>
                </div>
				<!-- myTrainer -->
				
				<div id="myTestimonials" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content" style="padding: 13px!important;">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Add Testimonials</h4>
							</div>
							<?php
							echo $success_message = $this->session->flashdata('success_message');
							echo $error_message = $this->session->flashdata('error_message');				
							?>
						  <div class="modal-body" style="padding:0px!important;">
							<p>
							 <form enctype='multipart/form-data' class="form-horizontal" action="<?php echo base_url("User/add_gallery_details"); ?>" method="POST">
									<div class="form-group">
										<label for="hori-pass1" class="col-sm-4 control-label text-left">Image*</label>
										<div class="col-sm-8">
											<input type="file" id="file" onchange="return fileValidation()" required="" class="form-control" name="userfile">
										</div>
									</div>
									<div class="form-group">
										<label for="hori-pass1" class="col-sm-4 control-label text-left">Name*</label>
										<div class="col-sm-8">
											<input type="text" required="" class="form-control" name="name" placeholder="Name">
										</div>
									</div>
									<div class="form-group">
										<label for="hori-pass1" class="col-sm-4 control-label text-left">Degisition*</label>
										<div class="col-sm-8">
											<input type="text" required="" class="form-control" name="degisition" placeholder="Degisition">
										</div>
									</div>
									<div class="form-group">
										<label for="hori-pass1" class="col-sm-4 control-label text-left">Description*</label>
										<div class="col-sm-8">
											<textarea type="text" required="" class="form-control" name="description" placeholder="Description"></textarea>
										</div>
									</div>
									
									<input type="hidden" name="page_type" value="Testimonials">
									<div class="form-group">
										<div class="col-sm-offset-4 col-sm-8">
											<button type="submit" class="btn btn-primary waves-effect waves-light">
												Add Testimonials
											</button>
										</div>
									</div>
								</form>
							</p>
						  </div>
						</div>
					</div>
				</div>
				
				<!-- endmyTrainer -->
				
				
				<!-- myClasses -->
				
				<div id="myClasses" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content" style="padding: 13px!important;">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Add Classes</h4>
							</div>
							<?php
							echo $success_message = $this->session->flashdata('success_message');
							echo $error_message = $this->session->flashdata('error_message');				
							?>
						  <div class="modal-body" style="padding:0px!important;">
							<p>
							 <form enctype='multipart/form-data' class="form-horizontal" action="<?php echo base_url("User/add_gallery_details"); ?>" method="POST">
									<div class="form-group">
										<label for="hori-pass1" class="col-sm-4 control-label text-left">Image*</label>
										<div class="col-sm-8">
											<input type="file" id="file1" onchange="return fileValidation1()" required="" class="form-control" name="userfile">
										</div>
									</div>
									<div class="form-group">
										<label for="hori-pass1" class="col-sm-4 control-label text-left">Classes Name*</label>
										<div class="col-sm-8">
											<input type="text" required="" class="form-control" name="classes_name">
										</div>
									</div>
									<div class="form-group">
										<label for="hori-pass1" class="col-sm-4 control-label text-left">Classes Time*</label>
										<div class="col-sm-8">
											<input type="text" required="" class="form-control" name="classes_time">
										</div>
									</div>
									<input type="hidden" name="page_type" value="classes">
									<div class="form-group">
										<div class="col-sm-offset-4 col-sm-8">
											<button type="submit" class="btn btn-primary waves-effect waves-light">
												Add Classes
											</button>
										</div>
									</div>
								</form>
							</p>
						  </div>
						</div>
					</div>
				</div>
				
				<!--myClasses-->
				
				<!-- myEvent -->
				
				<div id="myEvent" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content" style="padding: 13px!important;">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Add Event</h4>
							</div>
							<?php
							echo $success_message = $this->session->flashdata('success_message');
							echo $error_message = $this->session->flashdata('error_message');				
							?>
							
						  <div class="modal-body" style="padding:0px!important;">
							<p>
							 <form enctype='multipart/form-data' class="form-horizontal" action="<?php echo base_url("User/add_gallery_details"); ?>" method="POST">
									<div class="form-group">
										<label for="hori-pass1" class="col-sm-4 control-label text-left">Image*</label>
										<div class="col-sm-8">
											<input type="file"  id="file2" onchange="return fileValidation2()" required="" class="form-control" name="userfile">
										</div>
									</div>
									<div class="form-group">
										<label for="hori-pass1" class="col-sm-4 control-label text-left">Event Title*</label>
										<div class="col-sm-8">
											<input type="text" required="" class="form-control" name="event_title">
										</div>
									</div>
									<div class="form-group">
										<label for="hori-pass1" class="col-sm-4 control-label text-left">Event Description*</label>
										<div class="col-sm-8">
										<textarea required="" class="form-control" name="event_description"></textarea>
										</div>
									</div>
									<input type="hidden" name="page_type" value="event">
									<div class="form-group">
										<div class="col-sm-offset-4 col-sm-8">
											<button type="submit" class="btn btn-primary waves-effect waves-light">
												Add Event
											</button>
										</div>
									</div>
								</form>
							</p>
						  </div>
						</div>
					</div>
				</div>
				
				<!--myEvent-->
				
				<!-- myNaturopathe -->
				
				<div id="myNaturopathe" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content" style="padding: 13px!important;">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Add Naturopathe</h4>
							</div>
							<?php
							echo $success_message = $this->session->flashdata('success_message');
							echo $error_message = $this->session->flashdata('error_message');				
							?>
						  <div class="modal-body" style="padding:0px!important;">
							<p>
							<form enctype='multipart/form-data' class="form-horizontal" action="<?php echo base_url("User/add_gallery_details"); ?>" method="POST">
								<div class="form-group">
									<label for="hori-pass1" class="col-sm-4 control-label text-left">Image*</label>
									<div class="col-sm-8">
										<input type="file" id="file3" onchange="return fileValidation3()" required="" class="form-control" name="userfile">
									</div>
								</div>
								<div class="form-group">
									<label for="hori-pass1" class="col-sm-4 control-label text-left">Naturopathe Name*</label>
									<div class="col-sm-8">
										<input type="text" required="" class="form-control" name="naturopathe_name">
									</div>
								</div>
								<input type="hidden" name="page_type" value="naturopathe">
								<div class="form-group">
									<div class="col-sm-offset-4 col-sm-8">
										<button type="submit" class="btn btn-primary waves-effect waves-light">
											Add Naturopathe
										</button>
									</div>
								</div>
							</form>
							</p>
						  </div>
						</div>
					</div>
				</div>
				
				<!--myNaturopathe-->
				
				<!-- myNewModel -->
									<!-- Modal -->
				<div id="myNewModel" class="modal fade" role="dialog">
				  <div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content" style="padding: 13px!important;">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add New</h4>
					  </div>
					  		<?php
							echo $success_message = $this->session->flashdata('success_message');
							echo $error_message = $this->session->flashdata('error_message');				
							?>
					  <div class="modal-body" style="padding:0px!important;">
						<p>
                         <form enctype='multipart/form-data' class="form-horizontal" action="<?php echo base_url("User/add_gallery_details"); ?>" method="POST">
								<div class="form-group">
                                    <label for="hori-pass1" class="col-sm-3 control-label text-left">Image*</label>
                                    <div class="col-sm-9">
                                        <input type="file" id="file4" onchange="return fileValidation4()" required="" class="form-control" name="userfile">
										<input type="hidden" name="page_type" value="home_bottom">
                                    </div>
                                </div>
								<div class="form-group">
									<label for="hori-pass1" class="col-sm-3 control-label text-left">Title*</label>
									<div class="col-sm-9">
										<input type="text" value="" required="" class="form-control" name="title">
									</div>
								</div>
								<div class="form-group">
									<label for="hori-pass1" class="col-sm-3 control-label text-left">Description*</label>
									<div class="col-sm-9">
										<textarea type="text" required="" class="form-control" name="description"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="hori-pass1" class="col-sm-3 control-label text-left">Button Link*</label>
									<div class="col-sm-9">
										<input type="text" required="" class="form-control" name="link">
									</div>
								</div>
                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-8">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Add 
                                        </button>
                                    </div>
                                </div>
                            </form>
						</p>
					  </div>
					</div>

				  </div>
				</div>
				<!-- End myNewModel -->
			<!-- Modal -->
				<div id="myModal" class="modal fade" role="dialog">
				  <div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content" style="padding: 13px!important;">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add Slider</h4>
					  </div>
					  		<?php
							echo $success_message = $this->session->flashdata('success_message');
							echo $error_message = $this->session->flashdata('error_message');				
							?>
					  <div class="modal-body" style="padding:0px!important;">
						<p>
                         <form enctype='multipart/form-data' class="form-horizontal" action="<?php echo base_url("User/add_gallery_details"); ?>" method="POST">
								<div class="form-group">
                                    <label for="hori-pass1" class="col-sm-4 control-label text-left">Slider Image*</label>
                                    <div class="col-sm-8">
                                        <input type="file"  id="file5" onchange="return fileValidation5()" required="" class="form-control" name="userfile">
										<input type="hidden" name="page_type" value="home">
                                    </div>
                                </div>
								<div class="form-group">
									<label for="hori-pass1" class="col-sm-4 control-label text-left">First Title*</label>
									<div class="col-sm-8">
										<input type="text" value="" required="" class="form-control" name="first_title">
									</div>
								</div>
								<div class="form-group">
									<label for="hori-pass1" class="col-sm-4 control-label text-left">Second Title*</label>
									<div class="col-sm-8">
										<input type="text" value="" required="" class="form-control" name="second_title">
									</div>
								</div>
								<div class="form-group">
									<label for="hori-pass1" class="col-sm-4 control-label text-left">Button Link*</label>
									<div class="col-sm-8">
										<input type="text" value="" required="" class="form-control" name="button_link">
									</div>
								</div>
                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-8">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Add Slider
                                        </button>
                                    </div>
                                </div>
                            </form>
						</p>
					  </div>
					</div>

				  </div>
				</div>
				
                <?php $this->load->view('template/admin-footer.php');?>
            </div>
        </div>
<?php $this->load->view('template/admin-js.php');?>

<link href="<?php echo base_url("AdminAssets/plugins/summernote/summernote.css");?>" rel="stylesheet" / >                 
<script src="<?php echo base_url("AdminAssets/plugins/summernote/summernote.min.js");?>"></script>
<script>
	$(document).ready(function() {
	$('.summernote').summernote({
					height: 350,                 // set editor height
					minHeight: null,             // set minimum height of editor
					maxHeight: null,             // set maximum height of editor
					focus: false                 // set focus to editable area after initializing summernote
				});
	});
	var postForm = function() {
		var content = $('textarea[name="content"]').html($('.summernote').code());
	}
</script>
<script>
function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

function fileValidation1(){
    var fileInput = document.getElementById('file1');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

function fileValidation2(){
    var fileInput = document.getElementById('file2');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

function fileValidation3(){
    var fileInput = document.getElementById('file3');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

function fileValidation4(){
    var fileInput = document.getElementById('file4');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

function fileValidation5(){
    var fileInput = document.getElementById('file5');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
</script>
    </body>
</html>
<?php
}
	?>