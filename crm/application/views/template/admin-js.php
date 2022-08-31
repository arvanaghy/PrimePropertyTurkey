<script src="<?php echo base_url("assets/vendor/jquery/jquery.min.js");?>"></script>
<script src="<?php echo base_url("assets/vendor/bootstrap/js/popper.min.js");?>"></script>
<script src="<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.min.js");?>"></script>
<script src="<?php echo base_url("assets/vendor/stacked-menu/stacked-menu.min.js");?>"></script>
<script src="<?php echo base_url("assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js");?>"></script>
<script src="<?php echo base_url("assets/vendor/flatpickr/flatpickr.min.js");?>"></script>
<script src="<?php echo base_url("assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js");?>"></script>
<script src="<?php echo base_url("assets/vendor/chart.js/Chart.min.js");?>"></script>
<script src="<?php echo base_url("assets/javascript/main.min.js");?>"></script>
<script src="<?php echo base_url("assets/javascript/pages/easypiechart-demo.js");?>"></script>
<script src="<?php echo base_url("assets/javascript/pages/dashboard-demo.js");?>"></script>
<script type="text/javascript">
var urlmenu = document.getElementById('user_list');
urlmenu.onchange = function() {
window.open(  this.options[ this.selectedIndex ].value );
};

function assign_lead_record(data)
	{			
	    $("#show_assign_data").load('<?php echo base_url("User/assign_lead_record"); ?>', {"assign_id": data});					
	}
</script>

<script>
    function view_lead_cat(data)
	{			
	   //alert(data); 
	   $("#show_lead_cat").load('<?php echo base_url("User/get_lead_cat"); ?>', {"type": data});					
	}
</script>

<script>
    function view_lead_cats(data)
	{			
	   //alert(data); 
	   $("#show_lead_cat").load('<?php echo base_url("Users/get_lead_cats"); ?>', {"types": data});					
	}
</script>

<!-- Sale Modal -->
	<div class="modal modal-alert fade" id="AssignLeadModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalAlertLabel" aria-hidden="true">
		<div class="modal-dialog modal-md" role="document">
		  <div class="modal-content">
		      <div id="show_assign_data"></div>
		  </div>
		</div>
	</div>
<!-- Sale nmodal -->