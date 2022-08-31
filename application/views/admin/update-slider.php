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
                            <h4 class="header-title m-t-0 m-b-30">Update <?php echo str_replace('_', ' ',ucfirst($this->uri->segment('4')));?></h4>
							<?php
							echo $success_message = $this->session->flashdata('success_message');
							echo $error_message = $this->session->flashdata('error_message');				
							$image_galleryID=$this->uri->segment(3);
							$data=$this->User_Model->get_single_slider_details($image_galleryID);
							foreach ($data as $page_info)
							{
							}
							
							
							// $path_parts = pathinfo($page_info->image_galleryImage);
							
							?>
							<hr>
							<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url("User/update_gallery_details"); ?>" method="POST">
								<div class="form-group">
                                    <label for="hori-pass1" class="col-sm-3 control-label">Image*</label>
                                    <div class="col-sm-5">
									<?php if($this->uri->segment(4)=="gallery") { ?>
                                        <input type="file" id="file" onchange="return fileValidation()" required class="form-control" name="userfile">
									<?php } else{ ?>
                                        <input type="file" id="file" onchange="return fileValidation()" value="" class="form-control" name="userfile">									
									<?php } ?>
										<input type="hidden" value="<?php echo $image_galleryID; ?>" name="image_galleryID">
                                    </div>
									<div class="col-sm-4">
										<img style="height:80px;width:150px;" class="img-responsive img-thumbnail" src="<?php echo base_url($page_info->image_galleryImage); ?>">
									</div>
                                </div>
								<?php if($this->uri->segment(4)=="home") { ?>
								<?php //print_R($page_info);?>
									<div class="form-group">
										<label for="hori-pass1" class="col-sm-3 control-label text-left">First Title*</label>
										<div class="col-sm-9">
											<input type="text" id="file1" onchange="return fileValidation1()" required="" class="form-control" value="<?php echo $page_info->image_gallery_Content; ?>" name="first_title">
										</div>
									</div>
									<div class="form-group">
										<label for="hori-pass1" class="col-sm-3 control-label text-left">Second Title*</label>
										<div class="col-sm-9">
											<input type="text" required="" class="form-control" value="<?php echo $page_info->image_gallery_Content2; ?>" name="second_title">
										</div>
									</div>
									<div class="form-group">
										<label for="hori-pass1" class="col-sm-3 control-label text-left">Button Link*</label>
										<div class="col-sm-9">
											<input type="text" required="" class="form-control" value="<?php echo $page_info->image_gallery_Content3; ?>" name="button_link">
										</div>
									</div>
									<input type="hidden" name="page_type" value="<?php echo $page_info->image_galleryType; ?>">
								<?php } ?>
								
								<?php if($this->uri->segment(4)=="home_bottom") { ?>
								<?php //print_R($page_info);?>
									<div class="form-group">
										<label for="hori-pass1" class="col-sm-3 control-label text-left">Title*</label>
										<div class="col-sm-9">
											<input type="text" id="file2" onchange="return fileValidation2()" required="" class="form-control" value="<?php echo $page_info->image_gallery_Content; ?>" name="title">
										</div>
									</div>
									<div class="form-group">
										<label for="hori-pass1" class="col-sm-3 control-label text-left">Description*</label>
										<div class="col-sm-9">
											<textarea required="" class="form-control" name="description"><?php echo $page_info->image_gallery_Content2; ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label for="hori-pass1" class="col-sm-3 control-label text-left">Link*</label>
										<div class="col-sm-9">
											<input type="text" required="" class="form-control" value="<?php echo $page_info->image_gallery_Content3; ?>" name="link">
										</div>
									</div>
									<input type="hidden" name="page_type" value="<?php echo $page_info->image_galleryType; ?>">
								<?php } ?>
								
								<?php if($this->uri->segment(4)=="event") { ?>
									
									<div class="form-group">
										<label for="hori-pass1" class="col-sm-3 control-label text-left">Event Title*</label>
										<div class="col-sm-9">
											<input type="text" required="" value="<?php echo $page_info->image_gallery_Content; ?>" class="form-control" name="event_title">
										</div>
									</div>
									<div class="form-group">
										<label for="hori-pass1" class="col-sm-3 control-label text-left">Event Description*</label>
										<div class="col-sm-9">
											<textarea required="" class="form-control" name="event_description">
											<?php echo $page_info->image_gallery_Content2; ?>
											</textarea>
										</div>
									</div>
									<input type="hidden" name="page_type" value="<?php echo $page_info->image_galleryType; ?>">
								<?php } ?>
								
								<?php if($this->uri->segment(4)=="naturopathe") { ?>
								<div class="form-group">
									<label for="hori-pass1" class="col-sm-3 control-label text-left">Naturopathe Name*</label>
									<div class="col-sm-9">
										<input type="text" required="" value="<?php echo $page_info->image_gallery_Content; ?>" class="form-control" name="naturopathe_name">
									</div>
								</div>
								<input type="hidden" name="page_type" value="<?php echo $page_info->image_galleryType; ?>">
								<?php } ?>
								
								<?php if($this->uri->segment(4)=="gallery") { ?>
									<input type="hidden" name="page_type" value="<?php echo $page_info->image_galleryType; ?>">
								<?php } ?>
								
								<?php if($this->uri->segment(4)=="classes") { ?>
									<div class="form-group">
										<label for="hori-pass1" class="col-sm-3 control-label text-left">Classes Name*</label>
										<div class="col-sm-8">
											<input type="text" required="" class="form-control" value="<?php echo $page_info->image_gallery_Content; ?>" name="classes_name">
										</div>
									</div>
									<div class="form-group">
										<label for="hori-pass1" class="col-sm-3 control-label text-left">Classes Time*</label>
										<div class="col-sm-8">
											<input type="text" required="" value="<?php echo $page_info->image_gallery_Content2; ?>" class="form-control" name="classes_time">
										</div>
									</div>
									<input type="hidden" name="page_type" value="<?php echo $page_info->image_galleryType; ?>">
								<?php } ?>
								
                                <div class="form-group pull-right">
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Update
                                        </button>
                                       
                                    </div>
                                </div>
                            </form>
                        </div>
                    <div class="col-sm-3"></div>

                <!-- Footer -->
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