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
	    <input type="email" value="<?php echo $this->User_Model->getConfigKey($_REQUEST['ConfigType']);?>" class="form-control" name="configValue">
	<?php } elseif($_REQUEST['ConfigType']=="web_phone"){ ?>
			<input type="text" id="phone" onkeypress="phoneno()" maxlength="10" value="<?php echo $this->User_Model->getConfigKey($_REQUEST['ConfigType']);?>" class="form-control" name="configValue">
	<?php } elseif($_REQUEST['ConfigType']=="web_facebook" or $_REQUEST['ConfigType']=="web_twitter" or $_REQUEST['ConfigType']=="web_instagram"){ ?>
			<input type="url" id="field" onchange="checkURL(this)" value="<?php echo $this->User_Model->getConfigKey($_REQUEST['ConfigType']);?>" class="form-control" name="configValue">
	<!--<p><span class="text-danger text-center"><strong>Note : Without https:// or http:// your social url will not submit.<br>(Example : https://www.example.com)</span></span></p>-->
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
			  <div class="modal-body">
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
			  <div class="modal-body">
				<?php echo $data->image_gallery_Content2; ?>
			  </div>
			</div>
<?php	
}
 ?>