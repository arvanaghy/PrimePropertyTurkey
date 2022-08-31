<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Client</title>
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
								<strong>Add Client&nbsp;!</strong>
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
												  <label for="validationTooltip01">First Name
													<abbr title="Required">*</abbr>
												  </label>
												  <input type="text" class="form-control" placeholder="First Name" name="first_name" required="">
												</div>

												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Second Name
													<abbr title="Required">*</abbr>
												  </label>
												  <input type="text" class="form-control" placeholder="Second Name" name="second_name">

												</div>
												
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Email
													<abbr title="Required">*</abbr>
												  </label>
												  <input type="email" class="form-control" placeholder="Email" name="email" required="">

												</div>
												
												<div class="col-md-12 mb-3">
												  <label for="validationTooltip01">Message
													<abbr title="Required">*</abbr>
												  </label>
												  <textarea class="form-control" placeholder="Message" name="message"></textarea>

												</div>
												
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Email Secondary1
													<abbr title="Required">*</abbr>
												  </label>
												  <input type="email" class="form-control" placeholder="Email Secondary1" name="email_secondary1">

												</div>

												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Email Secondary2
													<abbr title="Required">*</abbr>
												  </label>
												  <input type="eamil" class="form-control" placeholder="Email Secondary2" name="email_secondary2">

												</div>
												
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Telephone
													<abbr title="Required">*</abbr>
												  </label>
												  <input type="number" class="form-control" placeholder="Telephone" name="telephone">

												</div>
												
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Mobile
													<abbr title="Required">*</abbr>
												  </label>
												  <input type="number" class="form-control" placeholder="Mobile" name="mobile" required="">
												</div>

												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Address
													<abbr title="Required">*</abbr>
												  </label>
												  <textarea class="form-control" placeholder="Address" name="address" required=""></textarea>

												</div>
												
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Origin Country
													<abbr title="Required">*</abbr>
												  </label>
												  <input type="text" class="form-control"  placeholder="Origin Country" name="origin_country" required="">

												</div>
												
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Country
													<abbr title="Required">*</abbr>
												  </label>
												  <input type="text" class="form-control" placeholder="Country" name="country" required="">

												</div>

												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">City
													<abbr title="Required">*</abbr>
												  </label>
												  <input type="text" class="form-control" placeholder="City" name="city" required="">

												</div>
												
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Area
													<abbr title="Required">*</abbr>
												  </label>
												  <input type="text" class="form-control" placeholder="Area" name="area" required="">

												</div>
												
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Source of enquiry
													<abbr title="Required">*</abbr>
												  </label>
												    <select class="form-control" name="source_of_enquiry" required>
														<option value="">Source of enquiry</option>
														<option value="Facebook">Facebook</option>
														<option value="Instagram">Instagram</option>
														<option value="Google Adwords">Google Adwords</option>
														<option value="Landing Page - Istanbul">Landing Page - Istanbul</option>
														<option value="Landing Page - South Coast">Landing Page - South Coast</option> 
														<option value="Organic">Organic</option> 
														<option value="Whatsapp Lead">Whatsapp Lead</option>
														<option value="Referral">Referral</option> 
														<option value="Sahibinden">Sahibinden</option> 
														<option value="RightMove">RightMove</option>
														<option value="Linkedin">Linkedin</option> 
														<option value="You Tube">You Tube</option>
												    </select>
												</div>

												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Referred to 
													<abbr title="Required">*</abbr>
												  </label>
												  <input type="text" class="form-control" placeholder="Referred to" name="referred_to">

												</div>
												
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Sale agent
													<abbr title="Required">*</abbr>
												  </label>
												  <input type="text" class="form-control" placeholder="Sale agent" name="sale_agent" required="">

												</div>
												
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Next Call Date
													<abbr title="Required">*</abbr>
												  </label>
												  <input type="date" class="form-control" placeholder="Next Call Date" name="next_call_date" required="">

												</div>
												
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Booking Date
													<abbr title="Required">*</abbr>
												  </label>
												  <input type="date" class="form-control" placeholder="Booking Date" name="booking_date">

												</div>
												
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Priority
													<abbr title="Required">*</abbr>
												  </label>
												  <select class="form-control" name="priority" required>
														<option value="">Set Priority</option>
														<option value="High">High</option>
														<option value="Medium">Medium</option>
														<option value="Low">Low</option>
												  </select>

												</div>
												
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Booking Status
													<abbr title="Required">*</abbr>
												  </label>
												  <select class="form-control" name="booking_status" required>
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
														<option value="Affiliate">Affiliate</option>
														<option value="Lifestyle Buyer">Lifestyle Buyer</option>
														<option value="Second Home Buyer">Second Home Buyer</option>
														<option value="Serious Investor">Serious Investor</option>
												  </select>

												</div>
												
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Verified
													<abbr title="Required">*</abbr>
												  </label>
												  <select class="form-control" name="verified" required>
														<option value="">Choose One</option> 
														<option value="Yes">Yes</option>
														<option value="No">No</option>
												  </select>

												</div>
												
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Client Status
													<abbr title="Required">*</abbr>
												  </label>
												  <select class="form-control" name="client_status" required>
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
														<option value="">Choose One</option>
														<option value="Up to Euro 50k">Up to Euro 50k</option>
														<option value="Up to Euro 100k">Up to Euro 100k</option>
														<option value="Up to Euro 150k">Up to Euro 150k</option>
														<option value="Up to Euro 200k">Up to Euro 200k</option>
														<option value="Up to Euro 300k">Up to Euro 300k</option>
														<option value="Up to Euro 400k">Up to Euro 400k</option>
														<option value="Up to Euro 500k">Up to Euro 500k</option>
														<option value="Up to Euro 750k">Up to Euro 750k</option>
														<option value="Up to Euro 1m">Up to Euro 1m</option>
														<option value="Up to Euro 1.5m">Up to Euro 1.5m</option>
														<option value="Up to Euro 2m">Up to Euro 2m</option>
														<option value="Up to Euro 2m+">Up to Euro 2m+</option>
												  </select>

												</div>
												
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Finance Required
													<abbr title="Required">*</abbr>
												  </label>
												  <select class="form-control" name="finance_required" required>
														<option value="">Choose One</option> 
														<option value="Yes">Yes</option>
														<option value="No">No</option>
												  </select>

												</div>
												
												<div class="col-md-4 mb-3">
												  <label for="validationTooltip01">Newsletter Subscribed
													<abbr title="Required">*</abbr>
												  </label>
												  <select class="form-control" name="newsletter_subscribed">
														<option value="">Client Status</option>
														<option value="High">High</option>
														<option value="Medium">Medium</option>
														<option value="Low">Low</option>
												  </select>

												</div>
												
												<div class="col-md-8 mb-3">
												  <label for="validationTooltip01">Specific Property Ref
													<abbr title="Required">*</abbr>
												  </label>
												  <textarea class="form-control" placeholder="Specific Property Ref" name="specific_property_ref"></textarea>

												</div>

											</div>
											<div style="float: right;">
												<button class="btn btn-primary" type="submit">Submit</button>
												<button class="btn btn-primary" type="reset">Reset</button>
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
  </body>
</html>