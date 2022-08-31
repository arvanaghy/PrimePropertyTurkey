<div class="col-md-4 text-center side-bar my-2">
    <div class="card" style="position: sticky !important;top: 100px;">
        <div class="card-body">
            <div class="card-title">
                <b>
                    <?= $this->session->userdata('username'); ?>
                </b>
            </div>
            <hr>
            <div id="menu_section">
                <ul>
                    <li class="<? if ($this->uri->segment(2)=='Profile'){ echo 'menu_activated';} ?>">
                        <a href="<?= base_url(); ?>User/Profile">
                            <i class="fas fa-user"></i>
                            My Profile
                        </a>
                    </li>
                    <li class="<? if ($this->uri->segment(2)=='Add_Property'){ echo 'menu_activated';} ?>">
                        <a href="<?= base_url(); ?>User/Add_Property">
                            <i class="fa fa-plus-square" aria-hidden="true"></i>
                            Add Property For Sale
                        </a>
                    </li>
                    <li class="<? if ($this->uri->segment(2)=='Properties_In_Progress'){ echo 'menu_activated';} ?>">
                        <a href="<?= base_url(); ?>User/Properties_In_Progress" >
                            <i class="fa fa-spinner" aria-hidden="true"></i>
                            Properties In Progress
                        </a>
                    </li>
                    <li class="<? if ($this->uri->segment(2)=='Published_Properties'){ echo 'menu_activated';} ?>">
                        <a href="<?= base_url(); ?>User/Published_Properties" >
                            <i class="fa fa-certificate" aria-hidden="true"></i>
                            Published Properties
                        </a>
                    </li>
                    <hr width="75%">
                    <li>
                        <a href="<?= base_url();?>User/logout" class="btn btn-danger btn-block text-white">
                            <i class="fas fa-sign-out text-white"></i>
                            LOG OUT
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
