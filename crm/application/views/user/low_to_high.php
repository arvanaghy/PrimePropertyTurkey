<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Short By - Low to High</title>
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
		<?php $this->load->view("template/user-admin-header"); ?>
    <main class="app-main">
        <div class="wrapper">
			<div class="page">
				<div class="page-inner">
					<div class="col-lg-12 mb-2">
					    <?php $this->load->view("template/lead_search"); ?>
						<?php echo $this->session->flashdata('message'); ?>
						<div class="alert alert-danger alert-dismissible fade show row" style="color: red!important;font-size:18px;">
							<?php 
        				    if($this->session->userdata('admin_user_type')!=""){
        				        $rows=$this->User_Model->get_user_low_to_high_list();
        				    ?>
        				    <strong>&nbsp;Low to High Enquires - you are viewing results 
							<?php if($this->uri->segment('3')==""){ echo"1"; } else{ echo $this->uri->segment('3')+1; } ?>
							to <?php  echo $this->uri->segment('3')+$total_lead['per_page'];  ?> of <?php  echo $total_lead['total_rows']; ?></strong>
        				    <?php } ?>
						</div>
						<?php $this->load->view("template/user_lead_menu"); ?>
					</div>
					
					
					<?php 
				    if($this->session->userdata('admin_user_type')!=""){
				    ?>
				    <section class="card">						
						<div class="col-md-12">						
							<div class="card-body pb-5">
								<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
										  <tr>
											<th>ID</th>
											<th> INFO</th>
											<th style="width: 170px;"> CLIENT&nbsp;DETAILS</th>
											<th>  </th>
											<th> BOOKING&nbsp;DATE </th>
											<th> </th>
										  </tr>
										</thead>
										<tbody>
											<?php
											$rows=$this->User_Model->get_user_low_to_high_list(); 
											$counter=1;
											foreach($low_to_high_leads as $row){
											?> 
											<tr>
											<form action="<?php echo base_url("User/save_lead_details");?>" method="POST">
												<td class="align-middle"><span class="text-danger"><?php echo $row->Lead_id; ?></span></td>
												<td>
													<strong>Send Quote :</strong> <br>
													<span class="text-danger"><a class="text-danger" href="mailto:<?php echo $row->email; ?>"><?php echo $row->email; ?></a></span><br>
													<span class="text-danger"><?php echo $row->mobile; ?></span><br>
												<strong>Source Of enquire :</strong><br>	 <?php echo $row->source_of_enquiry; ?>
													<br>
												<strong>Ref :</strong><br>	  <?php echo $row->Referance_id; ?>
													<br>
												<strong>Budget :</strong><br>	 <strong><?php echo $row->maximum_budget; ?> </strong>
													<br>
												<strong>Originated Country :</strong><br>	  <strong><?php echo $row->origin_country; ?></strong>
												</td>
												<td class="align-middle">
												    <strong> Client Name :</strong><br>
												<?php echo"$row->first_name $row->second_name"; ?> <br>
											 <!-- Notes :</strong>-->
											 <!--<br>-->
                                                
												<p>
												  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample<?php echo $row->Lead_id; ?>" aria-expanded="false" aria-controls="collapseExample">Show/Hide</button>
												</p>
												<span class="text-right"><a onclick="view_details('<?php echo $row->Lead_id; ?>');" href="#" data-toggle="modal" data-target="#SaleModal" class="btn btn-info btn-sm" style="background-color:#bc8302!important;border:1px solid #db9414;color: #fff;">Sale Details</a></span><br>


												<div class="custom-control custom-checkbox">
													<div class="row">
														<div class="col-md-6 mt-3">
															<input type="checkbox" name="called" value="1" class="custom-control-input" id="ckb77<?php echo $row->Lead_id; ?>">
															<label class="custom-control-label" for="ckb77<?php echo $row->Lead_id; ?>">Called</label>
														</div>
														<div class="col-md-6 mt-3">
															<input type="checkbox" name="spoken" value="1" class="custom-control-input" id="ckb88<?php echo $row->Lead_id; ?>">
															<label class="custom-control-label" for="ckb88<?php echo $row->Lead_id; ?>">Spoken</label>
														</div>
													</div>
												</div>
												
												<!--<div class="col-md-12 mt-2">-->
												<!--<strong>Decline Reallocation Note:</strong>-->
												<!--</div>-->
												</td>
												<td class="align-middle"> 
													
													<div class="col-md-12 mb-1">
													  <label for="validationTooltip01">Source&nbsp;Category
													  </label><br>
														<select name="source_category">
															<option value="">Choose One</option>
															<?php 
															$source_row=$this->User_Model->get_config("crm_source_category");
															foreach($source_row as $row_source)
															{
															?>
																<option <?php if($row->client_category==$row_source->configValue){ echo"selected"; } ?> value="<?php echo $row_source->configValue; ?>"><?php echo $row_source->configValue; ?></option>
															<?php } ?>
														</select>
													</div>
													
													<div class="col-md-12 mb-1">
													  <label for="validationTooltip01">Status</label><br>
													  <select name="client_status">
															<option value="">Choose One</option>
															<?php 
															$status_row=$this->User_Model->get_config("crm_lead_status");
															foreach($status_row as $row_status)
															{
															?>
																<option  <?php if($row->booking_status==$row_status->configValue){ echo"selected"; } ?> value="<?php echo $row_status->configValue; ?>"><?php echo $row_status->configValue; ?></option>
															<?php } ?>
													  </select>
													</div>
													
													<div class="col-md-12 mb-1">
													  <label for="validationTooltip01">Maximum&nbsp;Budget</label><br>
													  <select name="maximum_budget">
															<option value="">Choose One</option>
															<?php 
															$budget_row=$this->User_Model->get_config("maximum_budget");
															foreach($budget_row as $row_budget)
															{
															?>
																<option <?php if($row->maximum_budget==$row_budget->configValue){ echo"selected"; } ?> value="<?php echo $row_budget->configValue; ?>"><?php echo $row_budget->configValue; ?></option>
															<?php } ?>
													  </select>
													</div>
													<div class="col-md-12 mb-1">
														<button type="button" onclick="view_raising_details('<?php echo $row->Lead_id; ?>');" data-toggle="modal" data-target="#RaiseBookingModal" class="btn btn-info btn-sm btn-block">Raise Booking</button>
													</div>
												</td>
												<td class="align-middle"> 
													Next call :<br>
													<input type="date" name="next_call" value="<?php echo $row->next_call_date; ?>">
												<br>	Booking :<br>
													<input type="date" name="booking_date" value="<?php echo $row->booking_date; ?>">
													<br>Visiting Date :<br>
													<input type="text" name="visiting_date" value="<?php echo $row->visiting_date; ?>">
													<br><br>Created :<br>
													<span class="text-danger"><?php echo $row->Lead_created_date; ?></span>
													<input type="hidden" name="lead_id" value="<?php echo $row->Lead_id; ?>">
													
													<div class="custom-control custom-checkbox mt-3">	
    													<div class="col-md-12 mb-1">
    														<input type="checkbox" name="sold_pool" value="1" class="custom-control-input" id="sold_pool1<?php echo $row->Lead_id; ?>">
    														<label class="custom-control-label" for="sold_pool1<?php echo $row->Lead_id; ?>">Sold&nbsp;Pool</label>
    													</div>
    													
    													<div class="col-md-12 mb-1">
    														<input type="checkbox" name="uninterested_pool" value="1" class="custom-control-input" id="uninterested_pool1<?php echo $row->Lead_id; ?>">
    														<label class="custom-control-label" for="uninterested_pool1<?php echo $row->Lead_id; ?>">Uninterested&nbsp;Pool</label>
    													</div>
    												</div>
												</td>
												<td class="align-middle"> 
												
												<div class="col-md-12 mb-1">
												  <label for="validationTooltip01">Consultant</label><br>
												  <select name="consultant">
														<option value="">Choose One</option> 
														<?php 
                                							$user_row=$this->User_Model->get_crm_user_list();
                                							foreach($user_row as $row_user)
                                							{
                                							?>
                                							<option <?php if($row_user->user_id==$row->Lead_Assign_User_id){echo"selected";} ?> value="<?php echo $row_user->user_id; ?>"><?php echo $row_user->name; ?></option>
                                						<?php } ?>
												  </select>
												</div>
												
												<div class="col-md-12 mb-1">
													<label for="validationTooltip01">Priority</label><br>
													<?php //echo $row->priority; ?>
													<select name="priority">
														<option value="">Set Priority</option>
														<option <?php if($row->priority=='High'){ echo"selected"; } ?> value="High">High</option>
														<option <?php if($row->priority=='Medium'){ echo"selected"; } ?> value="Medium">Medium</option>
														<option <?php if($row->priority=='Low'){ echo"selected"; } ?> value="Low">Low</option>
													</select>
												</div>
                                                <button type="submit" class="btn btn-primary btn-sm btn-block">Save</button>
                                                <a href="#" onclick="view_edit_lead_details('<?php echo $row->Lead_id; ?>');" data-toggle="modal" data-target="#EditLeadModal" style="background-color:green;" class="btn btn-success btn-sm btn-block">Update</a>
												<div class="custom-control custom-checkbox" style="display:none;">	
													<div class="col-md-12 mb-1">
														<input type="checkbox" name="apply_changes" value="1" class="custom-control-input" id="ckb11<?php echo $row->Lead_id; ?>">
														<label class="custom-control-label" for="ckb11<?php echo $row->Lead_id; ?>">Apply&nbsp;Changes</label>
													</div>
												</div>
												
												</td>
											</form>
											</tr>
											<tr>
												<td colspan="6" class="collapse" id="collapseExample<?php echo $row->Lead_id; ?>">
													<div>
														<!--<form method="POST" action="<?php //echo base_url("user/add_history_comment"); ?>">-->
														<!--  <div class="form-group">-->
														<!--	<h6 class="text-danger" for="exampleFormControlTextarea1">Create Note</h6>-->
														<!--	<hr color="red">-->
														<!--	<textarea class="form-control summernote" name="comment" rows="3"></textarea>-->
														<!--	<input type="hidden" value="<?php echo $row->Lead_id; ?>" name="lead_id">-->
														<!--	<input type="hidden" value="<?php echo $row->referred_to; ?>" name="referred_to">-->
														<!--  </div>-->
														<!--  <div class="form-group">-->
														<!--	  <button class="btn btn-danger" type='submit'>Save</button>-->
														<!--  </div>-->
														<!--</form>-->
														<div id="" class="success_message ajax_response"></div>
														<form method="post" class="add_details">
														  <div class="form-group">
															<h6 class="text-danger" for="exampleFormControlTextarea1">Create Note</h6>
															<hr color="red">
															<textarea class="form-control summernote" name="comment" rows="3"></textarea>
															<input type="hidden" value="<?php echo $row->Lead_id; ?>" name="lead_id">
															<input type="hidden" value="<?php echo $row->Referance_id; ?>" name="referred_to">
														  </div>
														  <div class="form-group">
															  <button class="btn btn-danger add" type='submit'>Save</button>
														  </div>
														</form>
													  <div class="card card-body" style="height:400px;overflow-y: scroll;">
															<table class="table table-sm">
																  <thead class="bg-secondary">
																	 <tr>
																	  <!--<th scope="col">ID</th>-->
																	  <th scope="col">PROPERTY REFERENCE</th>
																	  <th scope="col">NOTE BY</th>
																	  <th scope="col">NOTE</th>
																	  <th scope="col">CREATED DATE</th>
																	  <!--<th scope="col">OPTION</th>-->
																	</tr>
																  </thead>
																	<?php
																		$history_rows=$this->User_Model->get_crm_history_list($this->session->userdata('admin_user_type'),$row->Lead_id); 
																		$counter=1;
																		
																	?> 
																  
																	<tbody class="table_data">
																		<?php foreach($history_rows as $history_row){ 
																		$user_row=$this->User_Model->get_user_single_record($history_row->History_User_id);
																		?>
																			<tr>
																			  <!--<td><?php //echo $history_row->History_id; ?></td>-->
																			  <td><?php echo $history_row->History_Referance; ?></td>
																			  <td><?php echo $user_row->name; ?></td>
																			  <td><?php echo $history_row->History_Description; ?></td>
																			  <td><?php echo $history_row->History_Date; ?></td>
																			  <!--<td><a href="" class="btn btn-danger btn-sm">Delete</a></td>-->
																			</tr>
																		<?php } ?>
																	</tbody>
															</table>
													  </div>
													</div>
												</td>
											</tr> 
											<?php } ?> 
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</section>
					<p class="pagination"><?php echo $low_to_high_links; ?></p>
				    <?php } ?>
				</div>
            </div>
        </div>
    </main>
</div>
	
	<!-- Sale Modal -->
	<div class="modal modal-alert fade" id="SaleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalAlertLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
		  <div class="modal-content">
		      <div id="show_sale_data"></div>
		  </div>
		</div>
	</div>
	<!-- Sale nmodal -->
	
	<!-- Raise Booking -->
	<div class="modal modal-alert fade" id="RaiseBookingModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalAlertLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
		  <div class="modal-content">
		      <div id="show_raising_sale_data"></div>
		  </div>
		</div>
	</div>
	<!-- Raise Booking -->
    <?php $this->load->view('template/admin-js');?>
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.11/dist/summernote-bs4.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bs4-summernote@0.8.10/dist/summernote-bs4.min.js"></script>
	<script>
		$(document).ready(function() {
		  $('.summernote').summernote();
		});
	</script>
	<script>
		function view_details(data)
			{			
			   $("#show_sale_data").load('<?php echo base_url("User/get_sale_data"); ?>', {"sale_id": data});					
			}
			
			function view_raising_details(data)
			{			
			   $("#show_raising_sale_data").load('<?php echo base_url("User/get_raising_sale_data"); ?>', {"raising_sale_id": data});					
			} 
	</script>

	<script>
        $(document).ready(function(){
            $('.add_details').on('submit', function(event){
              event.preventDefault();
              $.ajax({
               url:"<?php echo base_url("user/add_history_comment"); ?>",
               method:"POST",
               data:$(this).serialize(),
               dataType:"json",
               beforeSend:function(){
                $('.add').attr('disabled', 'disabled');
               },
               success:function(data){
                $('.add').attr('disabled', false);
                if(data.History_Description)
                {
                 var html = '<tr>';
                 html += '<td>'+data.History_Referance+'</td>';
                 html += '<td><?php echo $this->session->userdata('name'); ?></td>';
                 html += '<td>'+data.History_Description+'</td>';
            	 html += '<td>'+data.History_Date+'</td>';
                 $('.table_data').prepend(html);
            	 $('#success_message').fadeIn().html(data);
            	 alert('Note Added Successfully');
            	 $('.add_details')[1].reset(); 
                }
               }
              })
            });
        });
    </script>
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
      $('.summernote').summernote({
        placeholder: 'Enter About Content',
        tabsize: 2,
        height: 200
      });
      var postForm = function() {
			var content = $('textarea[name="content"]').html($('.summernote').code());
		}
	</script>
  </body>
</html>