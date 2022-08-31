<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <title>Update Testimonials</title>
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
                            <h4 class="header-title m-t-0 m-b-30">Update Testimonials <?php echo str_replace('_', ' ',ucfirst($this->uri->segment('4')));?></h4>
							<?php
							echo $success_message = $this->session->flashdata('success_message');
							echo $error_message = $this->session->flashdata('error_message');				
							
							$trainer_ID=$this->uri->segment(3);
							$page_info=$this->User_Model->get_single_trainer_details($trainer_ID);
							// print_r($page_info);
							?>
							<hr>
							<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url("User/update_gallery_details"); ?>" method="POST">
								<div class="form-group">
                                    <label for="hori-pass1" class="col-sm-3 control-label">Image*</label>
                                    <div class="col-sm-6">
                                        <input type="file" value="" id="file" onchange="return fileValidation()" class="form-control" name="userfile">
										<input type="hidden" value="<?php echo $page_info->Trainer_ID; ?>" name="trainer_id">
                                        <input type="hidden" name="page_type" value="trainer">
									</div>
									<div class="col-sm-3">
										<img style="height:80px;width:150px;" class="img-responsive img-thumbnail" src="<?php echo base_url($page_info->Trainer_Image); ?>">
									</div>
                                </div>
								
									<div class="form-group">
										<label for="hori-pass1" class="col-sm-3 control-label text-left">Name*</label>
										<div class="col-sm-9">
											<input type="text" required="" class="form-control" value="<?php echo $page_info->Trainer_Name; ?>" name="trainer_name">
										</div>
									</div>
									<div class="form-group">
										<label for="hori-pass1" class="col-sm-3 control-label text-left">Degisition*</label>
										<div class="col-sm-9">
											<input type="text" required="" class="form-control" value="<?php echo $page_info->Trainer_Post_Name; ?>" name="trainer_post_name">
										</div>
									</div>
									<div class="form-group">
										<label for="hori-pass1" class="col-sm-3 control-label text-left">Description*</label>
										<div class="col-sm-9">
										    <textarea type="text" required="" class="form-control" name="trainer_faceboook_link" placeholder="Description"><?php echo $page_info->Trainer_Faceboook_Link; ?></textarea>
										</div>
									</div>
									
									<div class="form-group pull-right">
										<div class="col-sm-8">
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