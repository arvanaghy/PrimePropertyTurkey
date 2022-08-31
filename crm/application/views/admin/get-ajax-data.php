<?php
    if(isset($_REQUEST['types']))
    {
        // echo $_REQUEST['types'];
        
        if($_REQUEST['types']=="user-Today"){ ?>
            <section class="card card-fluid">
				<div class="">
					<table class="table table-bordered">
						<thead class="bg-secondary" style="font-size:11px;">
							<tr>
								<th>CONSULTANT </th>
								<th>CALLS</th>
								<th>SPEAKS</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$activity_row=$this->Users_Model->get_user_today_lead_activity();
						foreach($activity_row as $row_activity){ ?>
							<tr>
								<td><?php echo $row_activity->name; ?></td>
								<td><?php echo $row_activity->called; ?></td>
								<td><?php echo $row_activity->spoken; ?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</section>
        <?php }
        
        if($_REQUEST['types']=="user-This Month"){ ?>
            <section class="card card-fluid">
				<div class="">
					<table class="table table-bordered">
						<thead class="bg-secondary" style="font-size:11px;">
							<tr>
								<th>CONSULTANT </th>
								<th>CALLS</th>
								<th>SPEAKS</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$activity_row=$this->Users_Model->get_user_month_lead_activity();
						foreach($activity_row as $row_activity){ ?>
							<tr>
								<td><?php echo $row_activity->name; ?></td>
								<td><?php echo $row_activity->called; ?></td>
								<td><?php echo $row_activity->spoken; ?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</section>
        <?php }
        
        if($_REQUEST['types']=="user-This Year"){ ?>
            <section class="card card-fluid">
				<div class="">
					<table class="table table-bordered">
						<thead class="bg-secondary" style="font-size:11px;">
							<tr>
								<th>CONSULTANT </th>
								<th>CALLS</th>
								<th>SPEAKS</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$activity_row=$this->Users_Model->get_user_year_lead_activity();
						foreach($activity_row as $row_activity){ ?>
							<tr>
								<td><?php echo $row_activity->name; ?></td>
								<td><?php echo $row_activity->called; ?></td>
								<td><?php echo $row_activity->spoken; ?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</section>
        <?php }
    }
?>

<?php
    if(isset($_REQUEST['type']))
    {
        // echo $_REQUEST['type'];
        if($_REQUEST['type']=="Today"){ ?>
            <section class="card card-fluid">
				<div class="">
					<table class="table table-bordered">
						<thead class="bg-secondary" style="font-size:11px;">
							<tr>
								<th>CONSULTANT </th>
								<th>CALLS</th>
								<th>SPEAKS</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$activity_row=$this->User_Model->get_today_lead_activity();
						foreach($activity_row as $row_activity){ ?>
							<tr>
								<td><?php echo $row_activity->name; ?></td>
								<td><?php echo $row_activity->called; ?></td>
								<td><?php echo $row_activity->spoken; ?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</section>
        <?php }
        
        if($_REQUEST['type']=="This Month"){ ?>
            <section class="card card-fluid">
				<div class="">
					<table class="table table-bordered">
						<thead class="bg-secondary" style="font-size:11px;">
							<tr>
								<th>CONSULTANT </th>
								<th>CALLS</th>
								<th>SPEAKS</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$activity_row=$this->User_Model->get_month_lead_activity();
						foreach($activity_row as $row_activity){ ?>
							<tr>
								<td><?php echo $row_activity->name; ?></td>
								<td><?php echo $row_activity->called; ?></td>
								<td><?php echo $row_activity->spoken; ?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</section>
        <?php }
        
        if($_REQUEST['type']=="This Year"){ ?>
            <section class="card card-fluid">
				<div class="">
					<table class="table table-bordered">
						<thead class="bg-secondary" style="font-size:11px;">
							<tr>
								<th>CONSULTANT </th>
								<th>CALLS</th>
								<th>SPEAKS</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$activity_row=$this->User_Model->get_year_lead_activity();
						foreach($activity_row as $row_activity){ ?>
							<tr>
								<td><?php echo $row_activity->name; ?></td>
								<td><?php echo $row_activity->called; ?></td>
								<td><?php echo $row_activity->spoken; ?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</section>
        <?php }
        
        if($_REQUEST['type']=="user-Today"){ ?>
            <section class="card card-fluid">
				<div class="">
					<table class="table table-bordered">
						<thead class="bg-secondary" style="font-size:11px;">
							<tr>
								<th>CONSULTANT </th>
								<th>CALLS</th>
								<th>SPEAKS</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$activity_row=$this->User_Model->get_user_today_lead_activity();
						foreach($activity_row as $row_activity){ ?>
							<tr>
								<td><?php echo $row_activity->name; ?></td>
								<td><?php echo $row_activity->called; ?></td>
								<td><?php echo $row_activity->spoken; ?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</section>
        <?php }
        
        if($_REQUEST['type']=="user-This Month"){ ?>
            <section class="card card-fluid">
				<div class="">
					<table class="table table-bordered">
						<thead class="bg-secondary" style="font-size:11px;">
							<tr>
								<th>CONSULTANT </th>
								<th>CALLS</th>
								<th>SPEAKS</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$activity_row=$this->User_Model->get_user_month_lead_activity();
						foreach($activity_row as $row_activity){ ?>
							<tr>
								<td><?php echo $row_activity->name; ?></td>
								<td><?php echo $row_activity->called; ?></td>
								<td><?php echo $row_activity->spoken; ?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</section>
        <?php }
        
        if($_REQUEST['type']=="user-This Year"){ ?>
            <section class="card card-fluid">
				<div class="">
					<table class="table table-bordered">
						<thead class="bg-secondary" style="font-size:11px;">
							<tr>
								<th>CONSULTANT </th>
								<th>CALLS</th>
								<th>SPEAKS</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$activity_row=$this->User_Model->get_user_year_lead_activity();
						foreach($activity_row as $row_activity){ ?>
							<tr>
								<td><?php echo $row_activity->name; ?></td>
								<td><?php echo $row_activity->called; ?></td>
								<td><?php echo $row_activity->spoken; ?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</section>
        <?php }
    }
?>


<?php
if(isset($_REQUEST['ConfigType']))
{ 
//echo $_REQUEST['ConfigType'];
?>
    <h3 class="text-center" style="color: black;font-weight:bold;">
	<?php
	echo ucwords(str_replace('_', 'site ', $_REQUEST['ConfigType']));?>
	</h3>
	<?php if($_REQUEST['ConfigType']=="web_address" or $_REQUEST['ConfigType']=="web_website" or $_REQUEST['ConfigType']=="web_map"){ ?>
		<textarea class="form-control" name="configValue" rows="7" required="required" style="color: black;"><?php echo $this->User_Model->getConfigKey($_REQUEST['ConfigType']);?></textarea>
	<?php } elseif($_REQUEST['ConfigType']=="web_email"){ ?>
	    <input type="email"onblur="validateEmail(this);" value="<?php echo $this->User_Model->getConfigKey($_REQUEST['ConfigType']);?>" class="form-control" name="configValue">
	<?php } elseif($_REQUEST['ConfigType']=="web_phone"){ ?>
			<!--<input type="tel" value="<?php echo $this->User_Model->getConfigKey($_REQUEST['ConfigType']);?>" class="form-control" name="configValue">-->
	<script>
    function check(e,value){
    //Check Charater
        var unicode=e.charCode? e.charCode : e.keyCode;
        if (value.indexOf(".") != -1)if( unicode == 46 )return false;
        if (unicode!=8)if((unicode<48||unicode>57)&&unicode!=46)return false;
    }
    function checkLength(){
    var fieldLength = document.getElementById('txtF').value.length;
    //Suppose u want 4 number of character
    if(fieldLength <= 10){
        return true;
    }
    else
    {
        var str = document.getElementById('txtF').value;
        str = str.substring(0, str.length - 1);
    document.getElementById('txtF').value = str;
    }
    }
</script>
  <input class="form-control"  oninvalid="setCustomValidity('Please enter on valid mobile no. ')" required value="<?php echo $this->User_Model->getConfigKey($_REQUEST['ConfigType']);?>" placeholder="Phone" name="configValue" type="tel" maxlength="10" minlength="10" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" />
    <p id="s"></p>
	<?php } elseif($_REQUEST['ConfigType']=="web_facebook" or $_REQUEST['ConfigType']=="web_youtube" or $_REQUEST['ConfigType']=="web_instagram" or $_REQUEST['ConfigType']=="web_linkedin" or $_REQUEST['ConfigType']=="web_other"){ ?>
			<input type="url" id="field" onchange="checkURL(this)" value="<?php echo $this->User_Model->getConfigKey($_REQUEST['ConfigType']);?>" class="form-control" name="configValue">
	<?php } ?>
	<br>
	<div class="col-sm-12">		  
		<div class="pull-right">
		<button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
		</div>
	</div>
	<script>        
        function phoneno(){          
            $('#phone').keypress(function(e) {
                var a = [];
                var k = e.which;

                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0))
                    e.preventDefault();
            });
        }
		
		// just for the demos, avoids form submit
		jQuery.validator.setDefaults({
		  debug: true,
		  success: "valid"
		});
		$( "#myform" ).validate({
		  rules: {
			field: {
			  required: true,
			  url: true
			}
		  }
		});

		function checkURL(url) {
			var string = url.value;
			
			if (!~string.indexOf("https")) {
				string = "https://" + string;
			}
			
			url.value = string;
			return url;
		}
		
		 function validateEmail(emailField){
                var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        
                if (reg.test(emailField.value) == false) 
                {
                    alert('Invalid Email Address');
                    return false;
                }
        
                return true;
        
        }
    </script>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
	<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
<?php }
?>


<?php
if(isset($_REQUEST['open_recod']))
{ 
	$id=$_REQUEST['open_recod'];
	$data=$this->User_Model->get_single_slides($id);
?>
			<!-- Modal content-->
			<div class="modal-content">
			  <div style="padding:5px;background-color:#FF5722;color:white;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="text-center"><strong><?php echo $data->image_gallery_Content; ?></strong></h4>
			  </div>
			  <div class="modal-body" style="word-wrap: break-word;max-height:500px;overflow-y: scroll;">
				<?php echo $data->image_gallery_Content2; ?>
			  </div>
			</div>
<?php	
}
 ?>
 
 
 <?php
if(isset($_REQUEST['open_event']))
{ 
	$id=$_REQUEST['open_event'];
	$data=$this->User_Model->get_single_slides($id);
?>
			<!-- Modal content-->
			<div class="modal-content">
			  <div style="padding:5px;background-color:#FF5722;color:white;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="text-center"><strong><?php echo $data->image_gallery_Content; ?></strong></h4>
			  </div>
			  <div class="modal-body" style="word-wrap: break-word;text-align:justify;max-height:500px;overflow-y: scroll;">
				<?php echo $data->image_gallery_Content2; ?>
			  </div>
			</div>
<?php	
}
 ?>
 
<?php
if(isset($_REQUEST['category_id']))
{ 
	$id=$_REQUEST['category_id'];
	$cat_data=$this->User_Model->get_single_sub_category($id);
	echo'<select required="" class="form-control" name="sub_category">';
	foreach ($cat_data as $cat_row)
	{
	?>
	<option value="<?php echo $cat_row->Subcategory_id; ?>"><?php echo $cat_row->Subcategory_Title; ?></option>
	<?php } echo"</select>"; 
}
?>


<?php 
    if(isset($_REQUEST['raising_sale_id'])){
?>
 <form action="<?php echo base_url("User/add_raising_sale_details"); ?>" method="POST">        
        <input type="hidden" name="raising_sale_id" value="<?php echo $_REQUEST['raising_sale_id']; ?>">
        <div class="modal-header">
			  <h5 class="modal-title">
				<i class="fa fa-trophy text-success mr-1"></i> Raise Booking</h5>
				<span class="pull-right">
				<button type="Submit" class="btn btn-success">Save</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</span>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="col-md-4 mb-1">
					  <label for="validationTooltip01">Client Name
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="text" class="form-control" placeholder="Client Name" name="client_name" required="">
					</div>

					<div class="col-md-4 mb-1">
					  <label for="validationTooltip01">Finance in Place ?
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="text" class="form-control" placeholder="Finance in Place" name="finance_in_place" required="">
					</div>
					
					<div class="col-md-4 mb-1">
					  <label for="validationTooltip01">Is decision maker present
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="text" class="form-control" placeholder="Is decision maker present" name="is_decision_maker_present" required="">
					</div>
					
					<div class="col-md-4 mb-1">
					  <label for="validationTooltip01">Notes
						<abbr title="Required">*</abbr>
					  </label>
					  <textarea class="form-control" placeholder="Notes" name="notes" required=""></textarea>
					</div>
					
					<div class="col-md-4 mb-1">
					  <label for="validationTooltip01">Budget
					  <abbr title="Required">*</abbr>
					  </label>
					  <input type="text" class="form-control" placeholder="Budget" name="budget" required="">
					</div>
					
					<div class="col-md-4 mb-1">
					  <label for="validationTooltip01">Date of deparature
					  <abbr title="Required">*</abbr>
					  </label>
					  <input type="date" class="form-control" placeholder="Date Of Deparature" name="date_of_deparature" required="">
					</div>
					
					<div class="col-md-4 mb-1">
					  <label for="validationTooltip01">Meeting Date
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="date" class="form-control" placeholder="Meeting Date" name="meeting_date" required="">
					</div>
					
					<div class="col-md-4 mb-1">
					  <label for="validationTooltip01">Meeting Time
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="time" class="form-control" placeholder="Meeting Time" name="meeting_time" required="">
					</div>
					
					<div class="col-md-4 mb-1">
					  <label for="validationTooltip01">Meeting Place
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="text" class="form-control" placeholder="Meeting Place" name="meeting_place" required="">
					</div>
					
					<div class="col-md-4 mb-1">
					  <label for="validationTooltip01">Min No. of bedrooms
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="text" class="form-control" placeholder="Min No. of bedrooms" name="min_no_of_bedrooms" required="">
					</div>
					
					<div class="col-md-4 mb-1">
					  <label for="validationTooltip01">Source of Inquiry
						<abbr title="Required">*</abbr>
					  </label>
					    <select class="form-control" name="source_of_enquiry" required="">
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
					
					<div class="col-md-4 mb-1">
					  <label for="validationTooltip01">All Cash Payment
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="text" class="form-control" placeholder="All Cash Payment" name="all_cash_payment" required="">
					</div>
					
					<div class="col-md-4 mb-1">
					  <label for="validationTooltip01">Ready to Buy Now ?
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="text" class="form-control" placeholder="Ready To Buy Now" name="ready_to_buy_now" required="">
					</div>
					
					<div class="col-md-4 mb-1">
					  <label for="validationTooltip01">Phone Numbers
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="text" class="form-control" placeholder="Phone Numbers" name="phone_numbers" required="">
					</div>
					
					<div class="col-md-4 mb-1">
					  <label for="validationTooltip01">Client Email
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="email" class="form-control" placeholder="Client Email" name="client_email" required="">
					</div>
					
					<div class="col-md-4 mb-1">
					  <label for="validationTooltip01">Place of Story
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="text" class="form-control" placeholder="Place of Story" name="place_of_story" required="">
					</div>
					
					<div class="col-md-4 mb-1">
					  <label for="validationTooltip01">Date of Arrival
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="date" class="form-control" placeholder="Date of Arrival" name="date_of_arrival" required="">
					</div>
					
					<div class="col-md-4 mb-1">
					  <label for="validationTooltip01">Customer Profile Character Profile
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="text" class="form-control" placeholder="Customer Profile Character Profile" name="customer_profile_character_profile" required="">
					</div>
					
					<div class="col-md-4 mb-1">
					  <label for="validationTooltip01">Requirements
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="text" class="form-control" placeholder="Requirements" name="requirements" required="">
					</div>
					
					<div class="col-md-4 mb-1">
					  <label for="validationTooltip01">Min. No. of bedrooms
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="text" class="form-control" placeholder="Min. No. of bedrooms" name="min_no_of_bedrooms" required="">
					</div>
					
					<div class="col-md-4 mb-1">
					  <label for="validationTooltip01">Purpose of Purchase
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="text" class="form-control" placeholder="Purpose of Purchase" name="purpose_of_purchase" required="">
					</div>
					
					
					<div class="col-md-4 mb-1">
					  <label for="validationTooltip01">Suggested route & Stratgy
						<abbr title="Required">*</abbr>
					  </label>
					  <textarea class="summernote" placeholder="Suggested route & Stratgy" name="suggested_route_stratgy"></textarea>
					</div>
					
					<div class="col-md-4 mb-1">
					  <label for="validationTooltip01">Ideal prospects
						<abbr title="Required">*</abbr>
					  </label>
					  <textarea class="summernote" placeholder="Ideal prospects" name="ideal_prospects"></textarea>
					</div>
					
					<div class="col-md-4 mb-1">
					  <label for="validationTooltip01">Other Notes
						<abbr title="Required">*</abbr>
					  </label>
					  <textarea class="summernote" placeholder="Other Notes" name="other_notes"></textarea>
					</div>
										
					<div class="col-md-8 mb-1">
					  <label for="validationTooltip01">Most Important requirement
						<abbr title="Required">*</abbr>
					  </label>
					  <textarea class="form-control" placeholder="Most Important requirement" name="most_important_requirement" required=""></textarea>
					</div>
					
					<div class="col-md-4 mb-1">
					  <label for="validationTooltip01">Send To
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="email" class="form-control" placeholder="Email" name="send_to_email" required="">
					</div>
				</div>
			</div>
		</form>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.11/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bs4-summernote@0.8.10/dist/summernote-bs4.min.js"></script>
<script>
$(document).ready(function() {
  $('.summernote').summernote();
});
</script>
<?php
    }
?>



<?php 
if(isset($_REQUEST['sale_id'])){
?>
 <form action="<?php echo base_url("User/add_sale_details"); ?>" method="POST">
     <input type="hidden" name="Sale_Lead_Id" value="<?php echo $_REQUEST['sale_id']; ?>">
			<div class="modal-header">
			  <h5 class="modal-title">
				<i class="fa fa-trophy text-success mr-1"></i> Sale Model</h5>	
				<span class="pull-right">
				<button type="submit" class="btn btn-success">Save</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</span>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead class="bg-secondary">
						  <tr>
							<th>SALE&nbsp;DETAILS</th>
							<th>UNIT&nbsp;DETAILS</th>
							<th>PAYMENT&nbsp;DETAILS</th>
							<th>AFTER&nbsp;SALES&nbsp;FORM</th>
						  </tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<div class="form-row">
										<div class="col-md-12 mb-1">
										  <label for="validationTooltip01"><strong>Project Name</strong>
											<abbr title="Required">*</abbr>
										  </label>
										  <input type="text" class="form-control" id="validationTooltip01" placeholder="Project Name" name="Sale_project_name" required="">
										</div>

										<div class="col-md-12 mb-1">
										  <label for="validationTooltip01"><strong>Sale Price</strong>
											<abbr title="Required">*</abbr>
										  </label>
										  <input type="number" class="form-control" id="validationTooltip01" placeholder="Sale Price" name="Sale_project_price" required="">
										</div>
										
										<div class="col-md-12 mb-1">
										  <label for="validationTooltip01"><strong>Sale Price Currency</strong>
											<abbr title="Required">*</abbr>
										  </label>
										  <input type="text" class="form-control" id="validationTooltip01" placeholder="Sale Price Currency" name="sale_price_currency" required="">
										</div>
										
										<div class="col-md-12 mb-1">
										  <label for="validationTooltip01"><strong>Reservation Date</strong>
											<abbr title="Required">*</abbr>
										  </label>
										  <input type="date" class="form-control" id="validationTooltip01" placeholder="Reservation Date" name="Sale_reservation_date" required="">
										</div>
										
										<div class="col-md-12 mb-1">
										  <label for="validationTooltip01"><strong>Reservation Deposite Token&nbsp;</strong>
										  <abbr title="Required">*</abbr>
										  </label>
										  <input type="text" class="form-control" id="validationTooltip01" placeholder="Reservation Deposite Token" name="Sale_reservation_deposite_token" required="">
										</div>
										
										<div class="col-md-12 mb-1">
										  <label for="validationTooltip01"><strong>Reservation&nbsp;Deposite Currency</strong>
										  <abbr title="Required">*</abbr>
										  </label>
										  <input type="text" class="form-control" id="validationTooltip01" placeholder="Reservation Deposite Currency" name="Sale_reservation_deposite_currency" required="">
										</div>
										
										<div class="col-md-12 mb-1">
										  <label for="validationTooltip01"><strong>Commission %</strong>
											<abbr title="Required">*</abbr>
										  </label>
										  <input type="text" class="form-control" id="validationTooltip01" placeholder="Commission" name="Sale_commission" required="">
										</div>
										
										<div class="col-md-12 mb-1">
										  <label for="validationTooltip01"><strong>Notes</strong>
											<abbr title="Required">*</abbr>
										  </label>
										  <textarea class="form-control" id="validationTooltip01" name="sale_notes" placeholder="Notes" required=""></textarea>
										</div>
									</div>
								</td>
								<td>
									<div class="form-row">
										<div class="col-md-12 mb-1">
										  <label for="validationTooltip01"><strong>Types and numbers of flats purchesed</strong>
											<abbr title="Required">*</abbr>
										  </label>
										  <input type="text" class="form-control" id="validationTooltip01" placeholder="Types and numbers of flats purchesed" name="Sale_types_numbers_flats_purchesed" required="">
										</div>

										<div class="col-md-12 mb-1">
										  <label for="validationTooltip01"><strong>Blocks Purchased in</strong>
											<abbr title="Required">*</abbr>
										  </label>
										  <input type="text" class="form-control" id="validationTooltip01" placeholder="Blocks Purchased in" name="Sale_blocks_purchased_in" required="">
										</div>
										
										<div class="col-md-12 mb-1">
										  <label for="validationTooltip01"><strong>Floors purchased in</strong>
											<abbr title="Required">*</abbr>
										  </label>
										  <input type="text" class="form-control" id="validationTooltip01" placeholder="Floors purchased in" name="Sale_floors_purchased_in" required="">
										</div>
										
										<div class="col-md-12 mb-1">
										  <label for="validationTooltip01"><strong>Unit Number Purchased</strong>
											<abbr title="Required">*</abbr>
										  </label>
										  <input type="text" class="form-control" id="validationTooltip01" placeholder="Unit Number Purchased" name="Sale_unit_number_purchased" required="">
										</div>
										<div class="col-md-12 mb-1">
										  <label for="validationTooltip01"><strong>Notes</strong>
											<abbr title="Required">*</abbr>
										  </label>
										  <textarea class="form-control" id="validationTooltip01" name="Sale_unit_notes" placeholder="Notes" required=""></textarea>
										</div>
									</div>
								</td>
								<td>
									<div class="form-row">
										<div class="col-md-12 mb-1">
										  <label for="validationTooltip01"><strong>Down Payment Date</strong>
											<abbr title="Required">*</abbr>
										  </label>
										  <input type="date" class="form-control" id="validationTooltip01" placeholder="Sale Down Payment Date" name="Sale_down_payment_date" required="">
										</div>

										<div class="col-md-12 mb-1">
										  <label for="validationTooltip01"><strong>Down Payment Amount</strong>
											<abbr title="Required">*</abbr>
										  </label>
										  <input type="number" class="form-control" id="validationTooltip01" placeholder="Down Payment Amount" name="Sale_down_payment_amount" required="">
										</div>
										
										<div class="col-md-12 mb-1">
										  <label for="validationTooltip01"><strong>Down Payment Currency</strong>
											<abbr title="Required">*</abbr>
										  </label>
										  <input type="text" class="form-control" id="validationTooltip01" placeholder="Down Payment Currency" name="Sale_down_payment_currency" required="">
										</div>
										
										<div class="col-md-12 mb-1">
										  <label for="validationTooltip01"><strong>Installment Plan Agreed Notes</strong>
											<abbr title="Required">*</abbr>
										  </label>
										  <textarea class="form-control" id="validationTooltip01" placeholder="Installment Plan Agreed Notes" name="Sale_installment_plan_agreed_notes" required=""></textarea>
										</div>
									</div>
								</td>
								<td>
									<div class="form-row">
										<div class="col-md-12 mb-1">
										  <label for="validationTooltip01"><strong>POA</strong>
											<abbr title="Required">*</abbr>
										  </label>
										    <div class="form-group">
											  <div class="custom-control custom-control-inline custom-radio">
												<input type="radio" class="custom-control-input" name="Sale_POA" value="Done" id="rd1">
												<label class="custom-control-label" for="rd1">Done</label>
											  </div>
											  <div class="custom-control custom-control-inline custom-radio">
												<input type="radio" class="custom-control-input" name="Sale_POA" value="None" id="rd2">
												<label class="custom-control-label" for="rd2">None</label>
											  </div>
											</div>
										</div>

										<div class="col-md-12 mb-1">
										  <label for="validationTooltip01"><strong>Contact</strong>
											<abbr title="Required">*</abbr>
										  </label>
										    <div class="form-group">
											  <div class="custom-control custom-control-inline custom-radio">
												<input type="radio" class="custom-control-input" name="Sale_contact" value="Signed" id="rd3">
												<label class="custom-control-label" for="rd3">Signed</label>
											  </div>
											  <div class="custom-control custom-control-inline custom-radio">
												<input type="radio" class="custom-control-input" name="Sale_contact" value="Not Signed" id="rd4">
												<label class="custom-control-label" for="rd4">Not Signed</label>
											  </div>
											</div>
										</div>
										
										<div class="col-md-12 mb-1">
										  <label for="validationTooltip01"><strong>Delivery date of unit</strong>
											<abbr title="Required">*</abbr>
										  </label>
										  <div class="form-group">
											  <div class="custom-control custom-control-inline custom-radio">
												<input type="radio" class="custom-control-input" name="Sale_delivery_date_unit" value="Signed"id="rd5">
												<label class="custom-control-label" for="rd5">Signed</label>
											  </div>
											  <div class="custom-control custom-control-inline custom-radio">
												<input type="radio" class="custom-control-input" name="Sale_delivery_date_unit" value="Not Signed" id="rd6">
												<label class="custom-control-label" for="rd6">Not Signed</label>
											  </div>
											</div>
										</div>
										
										<div class="col-md-12 mb-1">
										  <label for="validationTooltip01"><strong>Keys Obtained</strong>
											<abbr title="Required">*</abbr>
										  </label>
										    <div class="form-group">
											  <div class="custom-control custom-control-inline custom-radio">
												<input type="radio" class="custom-control-input" name="Sale_keys_obtained" value="No" id="rd7">
												<label class="custom-control-label" for="rd7">No</label>
											  </div>
											  <div class="custom-control custom-control-inline custom-radio">
												<input type="radio" class="custom-control-input" name="Sale_keys_obtained" value="Yes" id="rd8">
												<label class="custom-control-label" for="rd8">Yes</label>
											  </div>
											  <div class="custom-control custom-control-inline custom-radio">
												<input type="radio" class="custom-control-input" name="Sale_keys_obtained" value="With Client" id="rd9">
												<label class="custom-control-label" for="rd9">&nbsp;With&nbsp;Client</label>
											  </div>
											</div>
										</div>
										
										<div class="col-md-12 mb-1">
										  <label for="validationTooltip01"><strong>Subscriptions</strong>
											<abbr title="Required">*</abbr>
										  </label>
										  <div class="form-group">
											  <div class="custom-control custom-control-inline custom-radio">
												<input type="radio" class="custom-control-input" name="Sale_subscriptions" value="Done" id="rd10">
												<label class="custom-control-label" for="rd10">Done</label>
											  </div>
											  <div class="custom-control custom-control-inline custom-radio">
												<input type="radio" class="custom-control-input" name="Sale_subscriptions" value="Not Done" id="rd11">
												<label class="custom-control-label" for="rd11">Not Done</label>
											  </div>
											</div>
										</div>
										
										<div class="col-md-12 mb-1">
										  <label for="validationTooltip01"><strong>Title deed delivered</strong>
											<abbr title="Required">*</abbr>
										  </label>
										  <div class="form-group">
											  <div class="custom-control custom-control-inline custom-radio">
												<input type="radio" class="custom-control-input" name="Sale_title_deed_delivered" value="given_to_client" id="rd12">
												<label class="custom-control-label" for="rd13">Given to client</label>
											  </div>
											  <div class="custom-control custom-control-inline custom-radio">
												<input type="radio" class="custom-control-input" name="Sale_title_deed_delivered" value="original_with_us" id="rd13">
												<label class="custom-control-label" for="rd13">Original with us </label>
											  </div>
											</div>
										</div>
										
										<div class="col-md-12 mb-1">
										  <label for="validationTooltip01">Notes
											<abbr title="Required">*</abbr>
										  </label>
										  <textarea class="form-control" id="validationTooltip01" placeholder="Notes" name="Sale_after_notes" required=""></textarea>
										</div>
									</div>
								</td>
							</tr>
						<tbody>
					</table>
				</div>
			</div>
			</form>
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead class="bg-secondary">
					  <tr>
						<th>SALE&nbsp;DETAILS</th>
						<th>UNIT&nbsp;DETAILS</th>
						<th>PAYMENT&nbsp;DETAILS</th>
						<th>AFTER&nbsp;SALES&nbsp;FORM</th>
						<th>ACTION</th>
					  </tr>
					</thead>
					<tbody>
					<?php 
					$sale_counter=1;
					$sale_data=$this->User_Model->get_sale_list($_REQUEST['sale_id']);
					foreach($sale_data as $sale_row)
					{
					    // print_r($sale_row);
					?>
						<tr>
						    <td><?php echo $sale_counter++; ?></td>
							<td>
								<p><strong>Project Name -</strong> <?php echo $sale_row->Sale_project_name; ?></p>
								<p><strong>Sale Price -</strong> <?php echo $sale_row->Sale_project_price; ?></p>
								<p><strong>Sale Price Currency -</strong> <?php echo $sale_row->Sale_price_currency; ?></p>
								<p><strong>Reservation Date -</strong> <?php echo $sale_row->Sale_reservation_date; ?></p>
								<p><strong>Reservation Deposite Token -</strong> <?php echo $sale_row->Sale_reservation_deposite_token; ?></p>
								<p><strong>Reservation Deposite Currency -</strong> <?php echo $sale_row->Sale_reservation_deposite_currency; ?></p>
								<p><strong>Commission % -</strong> <?php echo $sale_row->Sale_commission; ?></p>
								<p><strong>Notes -</strong> <?php echo $sale_row->Sale_notes; ?></p>
							</td>
							<td>
								<p><strong>Types and numbers of flats purchesed -</strong> <?php echo $sale_row->Sale_types_numbers_flats_purchesed; ?></p>
								<p><strong>Blocks Purchased in -</strong> <?php echo $sale_row->Sale_blocks_purchased_in; ?></p>
								<p><strong>Floors purchased in -</strong> <?php echo $sale_row->Sale_floors_purchased_in; ?></p>
								<p><strong>Unit Number Purchased -</strong> <?php echo $sale_row->Sale_unit_number_purchased; ?></p>
								<p><strong>Notes -</strong> <?php echo $sale_row->Sale_unit_notes; ?></p>
							</td>
							<td>
								<p><strong>Down Payment Date -</strong> <?php echo $sale_row->Sale_down_payment_date; ?></p>
								<p><strong>Down Payment Amount -</strong> <?php echo $sale_row->Sale_down_payment_amount; ?></p>
								<p><strong>Down Payment Currency -</strong> <?php echo $sale_row->Sale_down_payment_currency; ?></p>
								<p><strong>Installment Plan Agreed Notes -</strong> <?php echo $sale_row->Sale_installment_plan_agreed_notes; ?></p>
							</td>
							<td>
								<p><strong>POA -</strong> <?php echo $sale_row->Sale_POA; ?></p>
								<p><strong>Contact  -</strong> <?php echo $sale_row->Sale_contact; ?></p>
								<p><strong>Delivery date of unit -</strong> <?php echo $sale_row->Sale_delivery_date_unit; ?></p>
								<p><strong>Keys Obtained -</strong> <?php echo $sale_row->Sale_keys_obtained; ?></p>
								<p><strong>Subscriptions -</strong> <?php echo $sale_row->Sale_subscriptions; ?></p>
								<p><strong>Title deed delivered  -</strong> <?php echo $sale_row->Sale_title_deed_delivered; ?></p>
								<p><strong>Notes -</strong> <?php echo $sale_row->Sale_after_notes; ?></p>
							</td>
						<tr>
				    <?php } ?>
					</tbody>
				</table>
			</div>
<?php
}
?>
 
 
<?php 
if(isset($_REQUEST['lead_id'])){
    $row=$this->User_Model->get_single_lead($_REQUEST['lead_id']);
    //print_r($row);
?>
    <form action="<?php echo base_url("User/update_lead_data"); ?>" method="POST">        
        <input type="hidden" name="lead_id" value="<?php echo $_REQUEST['lead_id']; ?>">
        <div class="modal-header">
			  <h5 class="modal-title">
				<i class="fa fa-trophy text-success mr-1"></i> Update Lead</h5>
				<span class="pull-right">
				<button type="Submit" class="btn btn-success">Save</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</span>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="col-md-4 mb-3">
					  <label for="validationTooltip01">First Name
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="text" class="form-control" value="<?php echo $row->first_name; ?>" placeholder="First Name" name="first_name" required="">
					</div>

					<div class="col-md-4 mb-3">
					  <label for="validationTooltip01">Second Name
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="text" class="form-control" value="<?php echo $row->second_name; ?>" placeholder="Second Name" name="second_name" required="">

					</div>
					
					<div class="col-md-4 mb-3">
					  <label for="validationTooltip01">Email
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="email" class="form-control" value="<?php echo $row->email; ?>" placeholder="Email" name="email" required="">

					</div>
					
					<div class="col-md-12 mb-3">
					  <label for="validationTooltip01">Message
					  </label>
					  <textarea class="form-control" placeholder="Message" name="message"><?php echo $row->message; ?></textarea>

					</div>
					
					<div class="col-md-4 mb-3">
					  <label for="validationTooltip01">Email Secondary1
					  </label>
					  <input type="email" class="form-control" placeholder="Email Secondary1" name="email_secondary1" value="<?php echo $row->email_secondary1; ?>">

					</div>

					<div class="col-md-4 mb-3">
					  <label for="validationTooltip01">Email Secondary2
					  </label>
					  <input type="eamil" class="form-control" placeholder="Email Secondary2" name="email_secondary2" value="<?php echo $row->email_secondary2; ?>">

					</div>
					
					<div class="col-md-4 mb-3">
					  <label for="validationTooltip01">Telephone
					  </label>
					  <input type="text" class="form-control" placeholder="Telephone" name="telephone" value="<?php echo $row->telephone; ?>">

					</div>
					
					<div class="col-md-4 mb-3">
					  <label for="validationTooltip01">Mobile
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="text" class="form-control" placeholder="Mobile" name="mobile" required="" value="<?php echo $row->mobile; ?>">
					</div>

					<div class="col-md-4 mb-3">
					  <label for="validationTooltip01">Address
					  </label>
					  <textarea class="form-control" placeholder="Address" name="address"><?php echo $row->address; ?></textarea>

					</div>
					
					<div class="col-md-4 mb-3">
					  <label for="validationTooltip01">Origin Country
					  </label>
					  <input type="text" class="form-control"  placeholder="Origin Country" name="origin_country" value="<?php echo $row->origin_country; ?>">

					</div>
					
					<div class="col-md-4 mb-3">
					  <label for="validationTooltip01">Country
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="text" class="form-control" placeholder="Country" name="country" required="" value="<?php echo $row->country; ?>">

					</div>

					<div class="col-md-4 mb-3">
					  <label for="validationTooltip01">City
					  </label>
					  <input type="text" class="form-control" placeholder="City" name="city" value="<?php echo $row->city; ?>">

					</div>
					
					<div class="col-md-4 mb-3">
					  <label for="validationTooltip01">Area
					  </label>
					  <input type="text" class="form-control" placeholder="Area" name="area" value="<?php echo $row->area; ?>">

					</div>
					<? if ($row->source_of_enquiry != 'dubai_pool'){ ?>
					<div class="col-md-4 mb-3">
					  <label for="validationTooltip01">Source of enquiry
						<abbr title="Required">*</abbr>
					  </label>
					    <select class="form-control" name="source_of_enquiry"  required="">
					        <?php
                            $source_of_enquiry_data=$this->User_Model->get_config("source_of_enquiry");
								foreach($source_of_enquiry_data as $source_of_enquiry_row)
								{
								?>
									<option <?php if($row->source_of_enquiry == $source_of_enquiry_row->configValue){ echo"selected"; } ?> value="<?php echo $source_of_enquiry_row->configValue; ?>"><?php echo $source_of_enquiry_row->configValue; ?></option>
							<?php } ?>
					    </select>
					</div>
                    <? }else{ ?>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltip01">Source of enquiry
                            <abbr title="Required">*</abbr>
                        </label>
                        <input type="text" class="form-control" name="source_of_enquiry" value="<?= $row->source_of_enquiry ?>" disabled>
                    </div>
                    <? } ?>
                    <? if ($row->Referance_id != 'dubai_pool'){ ?>

					<div class="col-md-4 mb-3">
					  <label for="validationTooltip01">Property Ref Id
					  </label>
					  <input type="text" class="form-control" placeholder="Property Ref Id" name="Referance_id" value="<?php echo $row->Referance_id; ?>">
					</div>
                    <? }else{ ?>
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltip01">Source of enquiry
                                <abbr title="Required">*</abbr>
                            </label>
                            <input type="text" class="form-control" placeholder="Property Ref Id" name="Referance_id" value="<?php echo $row->Referance_id; ?>" disabled>
                        </div>
                    <? } ?>
					
					<div class="col-md-4 mb-3">
					  <label for="validationTooltip01">Sale agent
					  </label>
					  <input type="text" class="form-control" placeholder="Sale agent" name="sale_agent" value="<?php echo $row->sale_agent; ?>">

					</div>
					
					<div class="col-md-4 mb-3">
					  <label for="validationTooltip01">Next Call Date
					  </label>
					  <input type="date" class="form-control" placeholder="Next Call Date" name="next_call_date" value="<?php echo $row->next_call_date; ?>">

					</div>
					
					<div class="col-md-4 mb-3">
					  <label for="validationTooltip01">Booking Date
					  </label>
					  <input type="date" class="form-control" placeholder="Booking Date" name="booking_date" value="<?php echo $row->booking_date; ?>">

					</div>
					
					<div class="col-md-4 mb-3">
					  <label for="validationTooltip01">Priority
					  </label>
					  <select class="form-control" name="priority">
							<option <?php if($row->priority=='High'){ echo"selected"; } ?> value="High">High</option>
							<option <?php if($row->priority=='Medium'){ echo"selected"; } ?> value="Medium">Medium</option>
							<option <?php if($row->priority=='Low'){ echo"selected"; } ?> value="Low">Low</option>
					  </select>

					</div>
					
					<div class="col-md-4 mb-3">
					  <label for="validationTooltip01">Client Status
					  </label>
					  <select class="form-control" name="booking_status">
					      <?php 
								$status_row=$this->User_Model->get_config("crm_lead_status");
								foreach($status_row as $row_status)
								{
								?>
									<option  <?php if($row->booking_status==$row_status->configValue){ echo"selected"; } ?> value="<?php echo $row_status->configValue; ?>"><?php echo $row_status->configValue; ?></option>
							<?php } ?>
					  </select>

					</div>
					
					<div class="col-md-4 mb-3">
					  <label for="validationTooltip01">Client Category
						<abbr title="Required">*</abbr>
					  </label>
					  <select class="form-control" name="client_category" required>
					        <?php 
								$source_row=$this->User_Model->get_config("crm_source_category");
								foreach($source_row as $row_source)
								{
								?>
									<option <?php if($row->client_category==$row_source->configValue){ echo"selected"; } ?> value="<?php echo $row_source->configValue; ?>"><?php echo $row_source->configValue; ?></option>
							<?php } ?>
					  </select>

					</div>
					
					<div class="col-md-4 mb-3">
					  <label for="validationTooltip01">Verified
					  </label>
					  <select class="form-control" name="verified">
							<option <?php if($row->verified=='Yes'){ echo"selected"; } ?> value="Yes">Yes</option>
							<option <?php if($row->verified=='No'){ echo"selected"; } ?> value="No">No</option>
					  </select>

					</div>
					
					<div class="col-md-4 mb-3" style="display:none;">
					  <label for="validationTooltip01">Client Status
						<abbr title="Required">*</abbr>
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
							<option value="">Choose One</option>
							<?php 
								$budget_data=$this->User_Model->get_config("maximum_budget");
								foreach($budget_data as $budget_row)
								{
								?>
									<option <?php if($row->maximum_budget==$budget_row->configValue){ echo"selected"; } ?> value="<?php echo $budget_row->configValue; ?>"><?php echo $budget_row->configValue; ?></option>
							<?php } ?>
					  </select>

					</div>
					
					<div class="col-md-4 mb-3">
					  <label for="validationTooltip01">Finance Required
					  </label>
					  <select class="form-control" name="finance_required">
							<option <?php if($row->finance_required=='Yes'){ echo"selected"; } ?> value="Yes">Yes</option>
							<option <?php if($row->finance_required=='No'){ echo"selected"; } ?> value="No">No</option>
					  </select>

					</div>
					
					<div class="col-md-4 mb-3">
					  <label for="validationTooltip01">Newsletter Subscribed
					  </label>
					  <select class="form-control" name="newsletter_subscribed">
							<option <?php if($row->newsletter_subscribed=='Yes'){ echo"selected"; } ?> value="Yes">Yes</option>
							<option <?php if($row->newsletter_subscribed=='No'){ echo"selected"; } ?> value="No">No</option>
					  </select>
					</div>
					
					<div class="col-md-4 mb-3">
						  <label for="validationTooltip01">Visiting Date
						  </label>
						  <input type="text" class="form-control" placeholder="Visiting Date" name="visiting_date" value="<?= $row->visiting_date; ?>">
						</div>
					
					<div class="col-md-8 mb-3">
					  <label for="validationTooltip01">Specific Property Ref
					  </label>
					  <textarea class="form-control" placeholder="Specific Property Ref" name="specific_property_ref"><?php echo $row->specific_property_ref; ?></textarea>

					</div>
				</div>
			</div>
		</form>
<?php
}
?>


<?php 
if(isset($_REQUEST['user_id'])){
    $row=$this->User_Model->get_user_single_record($_REQUEST['user_id']);
    //print_r($row);
?>
    <form action="<?php echo base_url("User/update_user_data"); ?>" method="POST">        
        <input type="hidden" name="user_id" value="<?php echo $_REQUEST['user_id']; ?>">
        <div class="modal-header">
			  <h5 class="modal-title">
				<i class="fa fa-trophy text-success mr-1"></i> Update User</h5>
				<span class="pull-right">
				<button type="Submit" class="btn btn-success">Save</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</span>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="col-md-12 mb-3">
					  <label for="validationTooltip01">First Name
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="text" class="form-control" value="<?php echo $row->name; ?>" placeholder="Name" name="name" required="">
					</div>

					<div class="col-md-12 mb-3">
					  <label for="validationTooltip01">Mobile
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="text" class="form-control" value="<?php echo $row->mobile; ?>" placeholder="Mobile" name="mobile" required="">

					</div>
					
					<div class="col-md-12 mb-3">
					  <label for="validationTooltip01">Email
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="email" class="form-control" value="<?php echo $row->email; ?>" placeholder="Email" name="email" required="">

					</div>
					
					<div class="col-md-12 mb-3">
					  <label for="validationTooltip01">Password
						<abbr title="Required">*</abbr>
					  </label>
					  <input type="password" class="form-control" placeholder="Password" name="password" required="" value="<?php echo $row->password; ?>">
					</div>

				</div>
			</div>
		</form>
<?php
}
?>



<?php 
if(isset($_REQUEST['assign_id'])){
    $row = explode(',', $_REQUEST['assign_id']);
    $user_id=$row['0'];
    $user_id=$row['1'];
   // $row=$this->User_Model->get_user_single_record($_REQUEST['user_id']);
    //print_r($row);
?>
    <form action="<?php echo base_url("User/assign_user_lead"); ?>" method="POST">        
        <input type="hidden" name="lead_id" value="<?php echo $row['0']; ?>">
        <div class="modal-header">
			  <h5 class="modal-title">
				<i class="fa fa-trophy text-success mr-1"></i> Assign Lead</h5>
				<span class="pull-right">
				<button type="Submit" class="btn btn-success">Save</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</span>
			</div>
			<div class="modal-body">
				<div class="form-row">
				  <div class="col-md-12 mb-1">
					  <label for="validationTooltip01">Assign To</label>  <br>
					  <select name="assign_user_id" class="form-control">
							<?php 
    							$user_row=$this->User_Model->get_crm_user_list();
    							foreach($user_row as $row_user)
    							{
    							?>
    							<option <?php if($row_user->user_id==$row['1']){echo"selected";} ?> value="<?php echo $row_user->user_id; ?>"><?php echo $row_user->name; ?></option>
    						<?php } ?>
					  </select>
					</div>
				</div>
			</div>
		</form>
<?php
}
?>
