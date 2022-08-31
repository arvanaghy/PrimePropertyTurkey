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
							<strong>Import/Excel</strong>
						</div>
					</div>
											
					<section class="card">						
						<div class="col-md-12">						
							<div class="card-body row">
            					<div class="col-md-12">
            						<section class="card">
            						  <!-- .card-body -->
            						  <div class="card-body">
            							<h3 class="card-title"> Import/Excel </h3>
            							<?php
                                            $output = '';
                                            $output .= form_open_multipart('import/save');
                                            $output .= '<div class="row">';
                                            $output .= '<div class="col-lg-12 col-sm-12"><div class="form-group">';
                                            $output .= form_label('Choose file', 'image');
                                            $data = array(
                                                'name' => 'userfile',
                                                'id' => 'userfile',
                                                'class' => 'form-control filestyle',
                                                'value' => '',
                                                'data-icon' => 'false'
                                            );
                                            $output .= form_upload($data);
                                            $output .= '</div> <span style="color:red;">*Please choose an Excel file(.xls or .xlxs) as Input</span></div>';
                                            $output .= '<div class="col-lg-12 col-sm-12"><div class="form-group text-right">';
                                            $data = array(
                                                'name' => 'importfile',
                                                'id' => 'importfile-id',
                                                'class' => 'btn btn-primary',
                                                'value' => 'Import',
                                            );
                                            $output .= form_submit($data, 'Import Data');
                                            $output .= '</div>
                                                                    </div></div>';
                                            $output .= form_close();
                                            echo $output;
                                        ?>
            							
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
