<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add New Lead - Prime Property Turkey</title>
    <?php $this->load->view('template/admin-css');?>
  </head>
  <body>
    <div class="app">
		<?php $this->load->view("template/admin-header"); ?>
		<main class="app-main">
			<div class="wrapper">
				<div class="page">         
					<div class="page-inner">
						<div class="col-lg-12 mb-2">
							<div class="alert alert-primary alert-dismissible fade show row" style="rtant;font-size:18px;">
								<strong>Add Client !</strong>
							</div>
						</div>
					
						<div class="col-md-12">
						<?php echo $this->session->flashdata('message'); ?>
							<section class="card">						
								<div class="col-md-12">
									<div class="card-body pb-5">
										<form class="needs-validation" novalidate="" action="<?php echo base_url("User/add_lead"); ?>" method="POST">
										
											<div class="form-row">
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01"> First Name
													<abbr title="Required">*</abbr>
												  </label>
												  <input type="text" class="form-control" placeholder="First Name" name="first_name" required="">
												</div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationTooltip01">Second Name
                                                        <abbr title="Required">*</abbr>
                                                    </label>
                                                    <input type="text" class="form-control" placeholder="Second Name" name="second_name" required="">
                                                </div>
												
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Email
													<abbr title="Required">*</abbr>
												  </label>
												  <input type="email" class="form-control" placeholder="Email" name="email" required="">
												</div>
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Email Secondary
												  </label>
												  <input type="email" class="form-control" placeholder="Email Secondary" name="email_secondary1">
												</div>
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Mobile
													<abbr title="Required">*</abbr>
												  </label>
												  <input type="text" class="form-control" placeholder="Mobile" id="phone" name="mobile" required="">
												</div>
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Telephone
												  </label>
												  <input type="number" class="form-control" placeholder="Telephone" name="telephone">
												</div>
											<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">City
												  </label>
												  <input type="text" class="form-control" placeholder="City" name="city">
												</div>
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Origin Country
												  <abbr title="Required">*</abbr>
												  </label>
												  <input type="text" class="form-control"  placeholder="Origin Country" name="origin_country" required="">
												</div>
												
													<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Property Ref Id 
												  </label>
												  <input type="text" class="form-control" placeholder="Property Ref Id" name="Referance_id">
												</div>
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Source of Enquire
                                                      <abbr title="Required">*</abbr>
												  </label>
												    <select class="form-control" name="source_of_enquiry"  required="">
														<option value="">Source of Enquire</option>
												        <?php
															$source_of_enquiry=$this->User_Model->get_config("source_of_enquiry");
															foreach($source_of_enquiry as $row_budget)
															{
															?>
														<option  value="<?php echo $row_budget->configValue; ?>"><?php echo $row_budget->configValue; ?></option>
														<?php } ?>
												    </select>
												</div>
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Sale Agent
												  </label>
												  <input type="text" class="form-control" placeholder="Sale agent" name="sale_agent">
												</div>
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Client Status
												  </label>
												  <select class="form-control" name="booking_status">
														<option value="">Choose One</option>
														<option value="After Sales">After Sales</option>
														<option value="Any">Any</option>
														<option value="Awaiting Collection">Awaiting Collection</option>
														<option value="Booked">Booked</option>
														<option value="Booking Request">Booking Request</option>
														<option value="Cancelled">Cancelled</option>
														<option value="Enquiry">Enquiry</option>
														<option value="No Sale">No Sale</option>
														<option value="Post Booking">Post Booking</option>
														<option value="Pursure">Pursure</option>
														<option value="Reserved">Reserved</option>
														<option value="Sales">Sales</option>
														<option value="Sent">Sent</option>
												  </select>
												</div>
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Client Category
													<abbr title="Required">*</abbr>
												  </label>
												  <select class="form-control" name="client_category" required>
														<option value="">Choose One</option>
														<option value=""> </option>
														<option value="Agent">Agent</option>
														<option value="Citizenship">Citizenship</option>
														<option value="Lifestyle Buyer">Lifestyle Buyer</option>
														<option value="Second Home Buyer">Second Home Buyer</option>
														<option value="Serious Investor">Serious Investor</option>
												  </select>
												</div>
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Next Call Date
												  </label>
												  <input type="date" class="form-control" placeholder="Next Call Date" name="next_call_date">
												</div>
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Booking Date
												  </label>
												  <input type="date" class="form-control" placeholder="Booking Date" name="booking_date">
												</div>
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Visiting Date
												  </label>
												  <input type="text" class="form-control" placeholder="Visiting Date" name="visiting_date">
												</div>
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Priority
												  </label>
												  <select class="form-control" name="priority">
														<option value="">Set Priority</option>
														<option value="High">High</option>
														<option value="Medium">Medium</option>
														<option value="Low">Low</option>
												  </select>
												</div>
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Verified
												  </label>
												  <select class="form-control" name="verified">
														<option value="">Choose One</option> 
														<option value="Yes">Yes</option>
														<option value="No">No</option>
												  </select>
												</div>
												<div class="col-md-4 mb-3" style="display:none;">
												  <label for="validationTooltip01">Client Status
												  </label>
												  <select class="form-control" name="client_status">
														<option value="">Choose One</option>
														<option value="Active">Active</option>
														<option value="Inactive">Inactive</option>
												  </select>
												</div>
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Maximum Budget
													<abbr title="Required">*</abbr>
												  </label>
												  <select class="form-control" name="maximum_budget" required>
												      <option value="null">Choose One</option>
												      <?php $budget_row=$this->User_Model->get_config("maximum_budget");
															foreach($budget_row as $row_budget){ ?>
        														<option  value="<?php echo $row_budget->configValue; ?>"><?php echo $row_budget->configValue; ?></option>
														<?php } ?>
												  </select>
												</div>
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Finance Required
												  </label>
												  <select class="form-control" name="finance_required">
														<option value="">Choose One</option> 
														<option value="Yes">Yes</option>
														<option value="No">No</option>
												  </select>
												</div>
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Newsletter Subscribed
												  </label>
												  <select class="form-control" name="newsletter_subscribed">
														<option value="">Choose Option</option>
														<option value="Yes">Yes</option>
														<option value="No">No</option>
												  </select>
												</div>
												<div class="col-md-12 mb-3">
												  <label for="validationTooltip01">Message
												  </label>
												  <textarea class="form-control" placeholder="Message" name="message"></textarea>
												</div>
												<div class="col-md-12 mb-3">
												  <label for="validationTooltip01">Specific Property Ref
												  </label>
												  <textarea class="form-control" placeholder="Specific Property Ref" name="specific_property_ref"></textarea>
												  <?php if(($this->session->userdata('type')!="")){ ?>
												  <input type="hidden" name="Lead_User_id" value="<?php echo $this->session->userdata('id'); ?>">
												  <input type="hidden" name="Lead_Assign_User_id" value="<?php echo $this->session->userdata('id'); ?>">
												  <?php } ?>
												</div>
											</div>
											<div style="float: right;">
												<button class="btn btn-primary" type="submit">Submit</button>
												<button class="btn btn-primary" type="reset">Reset</button>
												<a href="<?php echo base_url("User/dashboard"); ?>" class="btn btn-danger" type="reset">Close</a>
											</div>
										</form>
									</div>
								</div>
							</section>
						</div> 
					</div>
				</div>
			</div>
		</main>
    </div>
    <?php $this->load->view('template/admin-js');?> 
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://www.primepropertyturkey.com/assets/intlTelInput.css">
    <script src="https://www.primepropertyturkey.com/assets/intlTelInput.js"></script>
	<script>
       $("#phone").intlTelInput({
            autoHideDialCode: true,
            geoIpLookup: function(callback) {
                $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                });
            },
            hiddenInput: "mobile",
            initialCountry: "auto",
            placeholderNumberType: "MOBILE",
            separateDialCode: true,
            utilsScript: "https://www.primepropertyturkey.com/assets/utils.js"
        });
	</script>           
  </body>
</html>