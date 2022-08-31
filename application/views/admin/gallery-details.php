<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <title>Gallery Details</title>
		<link href="<?php echo base_url("AdminAssets/plugins/datatables/jquery.dataTables.min.css");?>" rel="stylesheet" type="text/css" />
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

                            <h4 class="header-title m-t-0 m-b-30">Gallery Details 
							<span class="pull-right"><a class="btn btn-primary" href="#"  class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Gallery</a></span>
							</h4>
							<?php
							$success_message = $this->session->flashdata('success_message');
							$error_message = $this->session->flashdata('error_message');				
							echo"<p class='text-success text-center'><strong> $success_message </strong></p>";
							echo"<p class='text-danger text-center'><strong> $error_message </strong></p>";
							?>
                            <table id="datatable" class="table table-striped dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
										<th>Image</th>
										<th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
										<?php 
											$counter=1;
											$slider_data=$this->User_Model->get_slider_details("gallery");
											foreach ($slider_data as $my_info)
											{
										?>
										<tr>
										<td class="sorting_1"><?php echo $counter++;?></td>
										<td><img style="height:50px;width:100px;" class="img-responsive img-thumbnail" src="<?php echo base_url($my_info->image_galleryImage);?>"></td>
										<td class="td-actions">
									    <a href="<?php echo base_url("User/delete_gallery_data/$my_info->image_galleryID/gallery"); ?>" rel="tooltip" title="" class="btn btn-danger btn-simple" data-original-title="Delete">
										Delete
									    </a>
										<a href="<?php echo base_url("User/update_slider/$my_info->image_galleryID/gallery"); ?>" rel="tooltip" title="" class="btn btn-success btn-simple" data-original-title="Delete">
										Edit
									    </a>
                                        </td>
										</tr>
										<?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- end col -->
                </div>
                <?php $this->load->view('template/admin-footer.php');?>
            </div>
        </div>
		
					<!-- Modal -->
				<div id="myModal" class="modal fade" role="dialog">
				  <div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content" style="padding: 13px!important;">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add Gallery</h4>
					  </div>
					  		<?php
							$success_message = $this->session->flashdata('successful_message');
							$error_message = $this->session->flashdata('error_message');				
							echo"<p class='text-success text-center'><strong> $success_message </strong></p>";
							echo"<p class='text-danger text-center'><strong> $error_message </strong></p>";
							?>
					  <div class="modal-body" style="padding:0px!important;">
						<p>
						<?php //echo $this->agent->referrer(); ?>
                         <form enctype='multipart/form-data' class="form-horizontal" action="<?php echo base_url("User/add_gallery_details"); ?>" method="POST">
								<div class="form-group">
                                    <label for="hori-pass1" class="col-sm-4 control-label text-left">Gallery Image*</label>
                                    <div class="col-sm-8">
                                        <input type="file" id="file" onchange="return fileValidation()" required="" class="form-control" name="userfile">
										<input type="hidden" name="page_type" value="gallery">
                                    </div>
                                </div>
								<!--<div class="form-group">
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
								</div>-->
                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-8">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Add Gallery
                                        </button>
                                    </div>
                                </div>
                            </form>
						</p>
					  </div>
					</div>

				  </div>
				</div>
		
		
<?php $this->load->view('template/admin-js.php');?>

<!-- Datatables-->
        <script src="<?php echo base_url("AdminAssets/plugins/datatables/jquery.dataTables.min.js");?>"></script>
        <script src="<?php echo base_url("AdminAssets/plugins/datatables/dataTables.bootstrap.js");?>"></script>
        <script src="<?php echo base_url("AdminAssets/plugins/datatables/dataTables.buttons.min.js");?>"></script>
        <script src="<?php echo base_url("AdminAssets/plugins/datatables/buttons.bootstrap.min.js");?>"></script>
        <script src="<?php echo base_url("AdminAssets/plugins/datatables/jszip.min.js");?>"></script>
        <script src="<?php echo base_url("AdminAssets/plugins/datatables/pdfmake.min.js");?>"></script>
        <script src="<?php echo base_url("AdminAssets/plugins/datatables/vfs_fonts.js");?>"></script>
        <script src="<?php echo base_url("AdminAssets/plugins/datatables/buttons.html5.min.js");?>"></script>
        <script src="<?php echo base_url("AdminAssets/plugins/datatables/buttons.print.min.js");?>"></script>
        <script src="<?php echo base_url("AdminAssets/plugins/datatables/dataTables.fixedHeader.min.js");?>"></script>
        <script src="<?php echo base_url("AdminAssets/plugins/datatables/dataTables.keyTable.min.js");?>"></script>
        <script src="<?php echo base_url("AdminAssets/plugins/datatables/dataTables.responsive.min.js");?>"></script>
        <script src="<?php echo base_url("AdminAssets/plugins/datatables/responsive.bootstrap.min.js");?>"></script>
        <script src="<?php echo base_url("AdminAssets/plugins/datatables/dataTables.scroller.min.js");?>"></script>

        <!-- Datatable init js -->
        <script src="<?php echo base_url("AdminAssets/pages/jquery.datatables.init.js");?>"></script>

        <!-- App js -->
        <script src="<?php echo base_url("AdminAssets/js/jquery.core.js");?>"></script>
        <script src="<?php echo base_url("AdminAssets/js/jquery.app.js");?>"></script>

        
        <!-- Datatable init js -->
        <script src="<?php echo base_url("AdminAssets/pages/jquery.datatables.init.js");?>"></script>

		<script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable( { keys: true } );
                $('#datatable-responsive').DataTable();
                $('#datatable-scroller').DataTable( { ajax: "assets/plugins/datatables/json/scroller-demo.json", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );
                var table = $('#datatable-fixed-header').DataTable( { fixedHeader: true } );
            } );
            TableManageButtons.init();
		
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
        </script>
    </body>
</html>