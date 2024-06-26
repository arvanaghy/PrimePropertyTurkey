<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <title>Dashboard</title>
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

                            <h4 class="header-title m-t-0 m-b-30">Placement Details <span class="pull-right"><button type="button" class="btn btn-primary waves-effect w-md waves-light m-b-5" data-toggle="modal" data-target="#con-close-modal">Add Placement Details</button></span></h4>
							<?php
							$success_message = $this->session->flashdata('success_message');
							$error_message = $this->session->flashdata('error_message');				
							echo"<p class='text-success text-center'><strong> $success_message </strong></p>";
							echo"<p class='text-danger text-center'><strong> $error_message </strong></p>";
							?>
                            <table id="datatable" class="table table-striped dt-responsive nowrap">
                                <thead>
                                    <tr>
										<th>Sr. No#</th>
										<th>Name</th>
										<th>Decipline</th>
										<th>Department</th>
										<th>Location</th>
										<th>Creation Date</th>
										<th>Action</th>
									</tr>
                                </thead>
                                <tbody>
								<?php 
								$counter=0;
								$placement_data=$this->User_Model->get_placement_details();
								foreach ($placement_data as $my_info)
								{
								$counter=$counter+1;
								$my_info->PlacementID;
								?>
								<tr>
								<td class="sorting_1"><?php echo $counter;?></td>
								<td><?php echo $my_info->PlacementName;?></td>
								<td><?php echo $my_info->PlacementDecipline;?></td>
								<td><?php echo $my_info->PlacementDepartment;?></td>
								<td><?php echo $my_info->PlacementLocation;?></td>
								<td><?php echo $my_info->PlacementDate;?></td>
								<td class="td-actions">
								<a href="<?php echo base_url("User/DeletePlacementID/$my_info->PlacementID"); ?>" rel="tooltip" title="" class="btn btn-danger btn-simple" data-original-title="Delete">
								Delete
								</a>
								</td>
								</tr>
								<?php }?>	
                                </tbody>
                            </table>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->


				
				
			<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
									<form action="<?php echo base_url("User/add_placement_details");?>" method="POST">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Add Placement Details</h4>
                                        </div>
                                        <div class="modal-body">
										
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label">Name</label>
                                                        <input type="text" class="form-control" id="field-1" placeholder="Name" name="Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-2" class="control-label">Decipline</label>
                                                        <input type="text" class="form-control" id="field-2" placeholder="Decipline" name="Decipline">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label">Department</label>
                                                        <input type="text" class="form-control" id="field-1" placeholder="Department" name="Department">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-2" class="control-label">Location</label>
                                                        <input type="text" class="form-control" id="field-2" placeholder="Location" name="Location">
                                                    </div>
                                                </div>
                                            </div>   
                                           
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                            <button type="Submit" class="btn btn-primary waves-effect waves-light">Add Placement</button>
                                        </div>
										</form> 
                                    </div>
                                </div>
                            </div><!-- /.modal -->
				
				
				
				
				
				
				
				
				
				
				
				
				
                <!-- Footer -->
                <?php $this->load->view('template/admin-footer.php');?>
                <!-- End Footer -->
            </div>
            <!-- end container -->
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

        </script>
    </body>
</html>