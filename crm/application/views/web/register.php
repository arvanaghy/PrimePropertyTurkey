<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Plan</title>
    <meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="">
	<?php $this->load->view("template/web-css"); ?>
	<style>
		.login-container{
			margin-top: 2%;
			margin-bottom: 2%;
		}
		.login-form-1{
			/*padding: 5%;*/
			box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
			border-radius:3px;
		}
		.login-form-1 h3{
			text-align: center;
			color: #333;
		}
		
		.login-container form{
			/*padding: 10%;*/
		}
		.btnSubmit
		{
			width: 100%;
			border-radius: 3px;
			padding: 1.5%;
			border: none;
			cursor: pointer;
		}
		.login-form-1 .btnSubmit{
			font-weight: 600;
			color: #fff;
			background-color: #006699;
		}
		.login-form-1 .ForgetPwd{
			color: #0062cc;
			font-weight: 600;
			text-decoration: none;
		}

	</style>
</head>
<body onload="myFunction()">
    <div class="page-wrapper">
	    <?php $this->load->view("template/web-menu"); ?>
        <main class="main">		
		
			<nav aria-label="breadcrumb" class="breadcrumb-nav mb-1" style="background-color:black;padding:20px;">
                <div class="container">
                    <ol class="breadcrumb" style="border-radius: 6px;">
                        <li class="breadcrumb-item"><a href="#"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Register</li>
                    </ol>
                </div>
            </nav>
            
         

			
			<div class="container login-container">
				<div class="row">
					<div class="col-md-3">&nbsp;</div>
					<div class="col-md-6 login-form-1">
						<h2 class="mt-1 text-center">Register</h2>
						<hr>
						<?php echo $this->session->flashdata('message'); ?>
						<form enctype='multipart/form-data' action="<?php echo base_url("User/register"); ?>" method="POST">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Name / नाम : *" name="name" required />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="email" class="form-control" placeholder="Email Id / ईमेल :  " name="email" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="number" min="0" class="form-control" placeholder="Mobile No / मोबाइल न0 : *" name="phone" required />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="password" class="form-control" placeholder="Password / पासवर्ड : *" name="password" required />
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea class="form-control" placeholder="Address / पता :" name="address" /></textarea>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<select class="form-control" name="state">
										<option value="">Select State/ प्रदेश :</option>
										<option value="Uttar Pradesh">Uttar Pradesh</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<select class="form-control" name="city">
										<option value="">Select City / शहर :</option>
										<option value="Lucknow">Lucknow</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="number" class="form-control" placeholder="Pin code / पिन कोड : *" name="pin" required />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Referal ID/ रेफेरल :" name="ref_id" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="date" class="form-control"  id="theDate" placeholder="Date of Joining / दिनाँक:" name="join_date" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Bank Name / बैंक नाम :" name="bank_name" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Account Number / खाता संख्या :" name="account_no" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="IFSC Code / IFSC कोड :" name="ifsc_code" />
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Nominee Name / नामांकित व्यक्ति का नाम:" name="nominee_name" />
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Relation Of Nominee / नामांकित व्यक्ति का संबंध:" name="nominee_relation" />
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="File" class="form-control" name="profile_image" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" class="btnSubmit" name="register" value="Register" />
						</div>							
						</form>
					</div>
					<div class="col-md-3">&nbsp;</div>
				</div>
			</div>
		


		
				
        </main>
        <?php $this->load->view("template/web-footer"); ?> 
    </div>
     <?php $this->load->view("template/web-js"); ?>
<script>
    var date = new Date();

var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;

var today = year + "-" + month + "-" + day;


document.getElementById('theDate').value = today;
</script>
</body>
</html>