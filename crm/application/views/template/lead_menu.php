<div class="alert alert-secondary row justify-content-start">
    <div class="col-md-2 col-5">
        <div class="dropdown">
            <button class="btn dropdown-toggle <?= (current_url() == base_url("User/today_call_list") or current_url() == base_url("User/today_call_list_low") or current_url() == base_url("User/today_call_list_high") ) ? "btn-theme" : "btn-secondary" ; ?>  " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                Today call list
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item <?= (current_url() == base_url("User/today_call_list")) ? "btn-theme" : "btn-secondary" ; ?>" href="<?php echo base_url("User/today_call_list") ?>">Normal Newest->Oldest</a>
                <a class="dropdown-item <?= (current_url() == base_url("User/today_call_list_high")) ? "btn-theme" : "btn-secondary" ; ?>" href="<?php echo base_url("User/today_call_list_high") ?>">high to low priority</a>
                <a class="dropdown-item <?= (current_url() == base_url("User/today_call_list_low")) ? "btn-theme" : "btn-secondary" ; ?>" href="<?php echo base_url("User/today_call_list_low") ?>">low to high priority</a>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-5">
        <div class="dropdown">
            <button class="btn dropdown-toggle <?= (current_url() == base_url("User/previous_next_call") or current_url() == base_url("User/previous_next_call_low") or current_url() == base_url("User/previous_next_call_high") ) ? "btn-theme" : "btn-secondary" ; ?>  " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                Previous next call
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item <?= (current_url() == base_url("User/previous_next_call")) ? "btn-theme" : "btn-secondary" ; ?>" href="<?php echo base_url("User/previous_next_call") ?>">Normal Newest->Oldest</a>
                <a class="dropdown-item <?= (current_url() == base_url("User/previous_next_call_high")) ? "btn-theme" : "btn-secondary" ; ?>" href="<?php echo base_url("User/previous_next_call_high") ?>">high to low priority</a>
                <a class="dropdown-item <?= (current_url() == base_url("User/previous_next_call_low")) ? "btn-theme" : "btn-secondary" ; ?>" href="<?php echo base_url("User/previous_next_call_low") ?>">low to high priority</a>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-5">
        <div class="dropdown">
            <button class="btn dropdown-toggle <?= (current_url() == base_url("User/future_next_call") or current_url() == base_url("User/future_next_call_low") or current_url() == base_url("User/future_next_call_high") ) ? "btn-theme" : "btn-secondary" ; ?>  " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                Future next call
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item <?= (current_url() == base_url("User/future_next_call")) ? "btn-theme" : "btn-secondary" ; ?>" href="<?php echo base_url("User/future_next_call") ?>">Normal Newest->Oldest</a>
                <a class="dropdown-item <?= (current_url() == base_url("User/future_next_call_high")) ? "btn-theme" : "btn-secondary" ; ?>" href="<?php echo base_url("User/future_next_call_high") ?>">high to low priority</a>
                <a class="dropdown-item <?= (current_url() == base_url("User/future_next_call_low")) ? "btn-theme" : "btn-secondary" ; ?>" href="<?php echo base_url("User/future_next_call_low") ?>">low to high priority</a>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-5">
        <div class="dropdown">
            <button class="btn dropdown-toggle <?= (current_url() == base_url("User/new_lead") or current_url() == base_url("User/new_lead_low") or current_url() == base_url("User/new_lead_high") ) ? "btn-theme" : "btn-secondary" ; ?>  " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                New Leads
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item <?= (current_url() == base_url("User/new_lead")) ? "btn-theme" : "btn-secondary" ; ?>" href="<?php echo base_url("User/new_lead") ?>">Normal Newest->Oldest</a>
                <a class="dropdown-item <?= (current_url() == base_url("User/new_lead_high")) ? "btn-theme" : "btn-secondary" ; ?>" href="<?php echo base_url("User/new_lead_high") ?>">high to low priority</a>
                <a class="dropdown-item <?= (current_url() == base_url("User/new_lead_low")) ? "btn-theme" : "btn-secondary" ; ?>" href="<?php echo base_url("User/new_lead_low") ?>">low to high priority</a>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-5">
        <div class="dropdown">
            <button class="btn dropdown-toggle <?= (current_url() == base_url("User/dashboard") or current_url() == base_url("User/dashboard_low")  or current_url() == base_url("User/dashboard_high")) ? "btn-theme" : "btn-secondary" ; ?>  " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                All Leads
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item <?= (current_url() == base_url("User/dashboard")) ? "btn-theme" : "btn-secondary" ; ?>" href="<?php echo base_url("User/dashboard") ?>">Normal Newest->Oldest</a>
                <a class="dropdown-item <?= (current_url() == base_url("User/dashboard_high")) ? "btn-theme" : "btn-secondary" ; ?>" href="<?php echo base_url("User/dashboard_high") ?>">high to low priority</a>
                <a class="dropdown-item <?= (current_url() == base_url("User/dashboard_low")) ? "btn-theme" : "btn-secondary" ; ?>" href="<?php echo base_url("User/dashboard_low") ?>">low to high priority</a>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-5">
        <a href="<?php echo base_url("User/add_lead"); ?>" class="btn btn-success" > Create Client </a>
    </div>
</div>


