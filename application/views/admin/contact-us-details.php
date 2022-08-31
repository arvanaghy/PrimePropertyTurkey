<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <title>Contact Us Details</title>
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
                            <?php
							$success_message = $this->session->flashdata('success_message');
							$error_message = $this->session->flashdata('error_message');				
							echo"<p class='text-success text-center'><strong> $success_message </strong></p>";
							echo"<p class='text-danger text-center'><strong> $error_message </strong></p>";
							?>
                            <h4 class="header-title m-t-0 m-b-30">Contact Us Details</h4>

                            <table id="datatable" class="table table-striped dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
										<th>Name</th>
										<th>Phone</th>
										<th>Email</th>
										<th>Subject</th>
										<th>Message</th>
										<th>Date</th>
										<th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
										<?php 
											$counter=0;
											$contact_data=$this->User_Model->get_contact_details("contact");
											foreach ($contact_data as $my_info)
												{
													$counter=$counter+1;
												   $my_info->contactID;
										?>
										<tr>
										<td class="sorting_1"><?php echo $counter;?></td>
										<td><?php echo $my_info->contactUsName;?></td>
										<td><?php echo $my_info->contactPhone;?></td>
										<td><?php echo $my_info->contactEmail;?></td>
										<td><?php echo $my_info->contactSubject;?></td>
										<td><?php echo $my_info->contactMessage;?></td>
										<td><?php echo $my_info->contactDate;?></td>
										<td class="td-actions">
									    <a href="<?php echo base_url("User/DeleteContactID/$my_info->contactID"); ?>" rel="tooltip" title="" class="btn btn-danger btn-simple" data-original-title="Delete">
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