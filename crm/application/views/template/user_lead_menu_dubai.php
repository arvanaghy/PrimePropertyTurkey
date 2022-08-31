<div class="alert alert-secondary row justify-content-start">
    <div class="col-md-2 col-5">
        <div class="dropdown">
            <button class="btn dropdown-toggle <?= (current_url() == base_url("Users/today_call_list_dubai") or current_url() == base_url("Users/today_call_list_dubai_low") ) ? "btn-theme" : "btn-secondary" ; ?>  " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                Today call list
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item <?= (current_url() == base_url("Users/today_call_list_dubai")) ? "btn-theme" : "btn-secondary" ; ?>" href="<?php echo base_url("Users/today_call_list_dubai") ?>">high to low priority</a>
                <a class="dropdown-item <?= (current_url() == base_url("Users/today_call_list_dubai_low")) ? "btn-theme" : "btn-secondary" ; ?>" href="<?php echo base_url("Users/today_call_list_dubai_low") ?>">low to high priority</a>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-5">
        <div class="dropdown">
            <button class="btn dropdown-toggle <?= (current_url() == base_url("Users/previous_next_call_dubai") or current_url() == base_url("Users/previous_next_call_dubai_low") ) ? "btn-theme" : "btn-secondary" ; ?>  " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                Previous next call
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item <?= (current_url() == base_url("Users/previous_next_call_dubai")) ? "btn-theme" : "btn-secondary" ; ?>" href="<?php echo base_url("Users/previous_next_call_dubai") ?>">high to low priority</a>
                <a class="dropdown-item <?= (current_url() == base_url("Users/previous_next_call_dubai_low")) ? "btn-theme" : "btn-secondary" ; ?>" href="<?php echo base_url("Users/previous_next_call_dubai_low") ?>">low to high priority</a>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-5">
        <div class="dropdown">
            <button class="btn dropdown-toggle <?= (current_url() == base_url("Users/future_next_call_dubai") or current_url() == base_url("Users/future_next_call_dubai_low") ) ? "btn-theme" : "btn-secondary" ; ?>  " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                Future next call
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item <?= (current_url() == base_url("Users/future_next_call_dubai")) ? "btn-theme" : "btn-secondary" ; ?>" href="<?php echo base_url("Users/future_next_call_dubai") ?>">high to low priority</a>
                <a class="dropdown-item <?= (current_url() == base_url("Users/future_next_call_dubai_low")) ? "btn-theme" : "btn-secondary" ; ?>" href="<?php echo base_url("Users/future_next_call_dubai_low") ?>">low to high priority</a>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-5">
        <div class="dropdown">
            <button class="btn dropdown-toggle <?= (current_url() == base_url("Users/new_lead_dubai") or current_url() == base_url("Users/new_lead_dubai_low") ) ? "btn-theme" : "btn-secondary" ; ?>  " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                New Leads
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item <?= (current_url() == base_url("Users/new_lead_dubai")) ? "btn-theme" : "btn-secondary" ; ?>" href="<?php echo base_url("Users/new_lead_dubai") ?>">high to low priority</a>
                <a class="dropdown-item <?= (current_url() == base_url("Users/new_lead_dubai_low")) ? "btn-theme" : "btn-secondary" ; ?>" href="<?php echo base_url("Users/new_lead_dubai_low") ?>">low to high priority</a>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-5">
        <div class="dropdown">
            <button class="btn dropdown-toggle <?= (current_url() == base_url("Users/Dubai_pool") or current_url() == base_url("Users/Dubai_pool_low") ) ? "btn-theme" : "btn-secondary" ; ?>  " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                All Leads
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item <?= (current_url() == base_url("Users/Dubai_pool")) ? "btn-theme" : "btn-secondary" ; ?>" href="<?php echo base_url("Users/Dubai_pool") ?>">high to low priority</a>
                <a class="dropdown-item <?= (current_url() == base_url("Users/Dubai_pool_low")) ? "btn-theme" : "btn-secondary" ; ?>" href="<?php echo base_url("Users/Dubai_pool_low") ?>">low to high priority</a>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-5">
        <a href="<?php echo base_url("Users/add_lead"); ?>" class="btn btn-success" > Create Client </a>
    </div>
</div>