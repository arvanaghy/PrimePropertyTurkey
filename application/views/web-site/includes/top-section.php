<!-- Google Tag Manager (noscript) -->
<!--<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N243V5Z"-->
<!--                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>-->
<!-- End Google Tag Manager (noscript) -->
<section id="top-bar">
    <div class="container-fluid">
        <div class="row py-2">
            <div class="col-md-4 d-flex justify-content-md-start justify-content-around">
                <div class="row mb-2 mb-md-0" style="display: inline-flex">
                    <div class="currency d-inline pl-md-3 mx-1">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item">
                                <a rel="nofollow" href="<?php echo base_url("Currency/set_session/USD"); ?>" class="<?php if($this->session->userdata('currency')=="USD"){ echo "red-text"; }else{ echo "text-reset";} ?>" >
                                    <i class="fas fa-dollar-sign <?php if($this->session->userdata('currency')=="USD"){ echo "red-text"; }else{ echo "text-reset";} ?>"></i>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a rel="nofollow" class="<?php if($this->session->userdata('currency')=="EUR"){ echo "red-text"; }else{ echo "text-reset";} ?>" href="<?php echo base_url("Currency/set_session/EUR"); ?>" >
                                    <i class="fas fa-euro-sign <?php if($this->session->userdata('currency')=="EUR"){ echo "red-text"; }else{ echo "text-reset";} ?>"></i>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a rel="nofollow" class="<?php if($this->session->userdata('currency')=="GBP"){ echo "red-text"; }else{ echo "text-reset";} ?>" href="<?php echo base_url("Currency/set_session/GBP"); ?>" >
                                    <i class="fas fa-pound-sign <?php if($this->session->userdata('currency')=="GBP"){ echo "red-text"; }else{ echo "text-reset";} ?>"></i>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a rel="nofollow" class="<?php if($this->session->userdata('currency')=="TRY"){ echo "red-text"; }else{ echo "text-reset";} ?>" href="<?php echo base_url("Currency/set_session/TRY"); ?>" >
                                    <i class="fas fa-lira-sign <?php if($this->session->userdata('currency')=="TRY"){ echo "red-text"; }else{ echo "text-reset";} ?>"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <span class="top-Buying mx-1 d-block d-md-none">
                        <a href="<?= base_url();?>buying-online" class="btn red-button">
                        BUYING ONLINE
                        </a>
                    </span>
                </div>
            </div>
            <div class="col-md-4 justify-content-center text-center d-none d-md-inline">
                <div class="row mb-2 mb-md-0  justify-content-center" style="display: inline-flex">
                    <div class="crypto d-md-inline d-none mx-1  ">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item text-warning">
                                    <img src="<?= base_url();?>assets/web-site/images/base/currency/3838998_bitcoin_cryptocurrency_currency_money_finance_icon.webp" alt="bitcoin" class="img-fluid" width="17px">
                            </li>
                            <li class="list-group-item">
                                    <img src="<?= base_url();?>assets/web-site/images/base/currency/4373172_ethereum_logo_logos_icon.webp" alt="ethereum" class="img-fluid" width="17px">
                            </li>
                            <li class="list-group-item">
                                    <img src="<?= base_url();?>assets/web-site/images/base/currency/2785456_blockchain_litecoin_icon.webp" alt="litecoin" class="img-fluid" width="17px">
                            </li>
                            <li class="list-group-item">
                                <span>Accepted Here</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row justify-content-md-end justify-content-center align-items-center">
                    <? if ($this->session->has_userdata('username') && $this->session->has_userdata('user_info'))   { ?>
                    <span class="user-top-login mx-1">
                        <a href="<?= base_url();?>user" class="">
                            <i class="fas fa-users"></i>
                            <span class="d-none d-md-inline">
                                    <?= $this->session->userdata('user_info');  ?>
                            </span>
                        </a>
                    </span>
                    <? }else{ ?>
                        <span class="user-top-login mx-1">
                        <a href="<?= base_url();?>User/UserLogin" class="">
                            <i class="fas fa-users"></i>
                            <span class="d-none d-md-inline">
                                    Login / Register
                            </span>
                        </a>
                    </span>
                   <? } ?>
                    <div class="crypto d-md-none d-inline mx-1  ">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item text-warning">
                                <a  class="text-reset" >
                                    <img src="<?= base_url();?>assets/web-site/images/base/currency/3838998_bitcoin_cryptocurrency_currency_money_finance_icon.webp" alt="bitcoin" class="img-fluid" width="17px">
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a  class="text-reset" >
                                    <img src="<?= base_url();?>assets/web-site/images/base/currency/4373172_ethereum_logo_logos_icon.webp" alt="ethereum" class="img-fluid" width="17px">
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a >
                                    <img src="<?= base_url();?>assets/web-site/images/base/currency/2785456_blockchain_litecoin_icon.webp" alt="litecoin" class="img-fluid" width="17px">
                                </a>
                            </li>
                            <li class="list-group-item">
                                <span>Accepted Here</span>
                            </li>
                        </ul>
                    </div>

                    <span class="top-Buying d-none d-md-inline mx-1">
                        <a href="<?= base_url();?>buying-online" class="btn red-button">
                        BUYING ONLINE
                        </a>
                    </span>
                    <span class="top-search mx-1">
                        <button class="btn" id="searchToggle">
                            <i class="fas fa-search"></i>
                        </button>
                        <span id="toggle-search">
                            <form action="<?= base_url(); ?>Properties/Search" method="POST" class="form-inline justify-content-around">
                                 <input type="text" autocomplete="off" name="search" id="search" required placeholder="Enter Search Data" class="form-control-sm" autofocus>
                                 <input type="submit" class="btn red-button btn-sm" value="Search">
                           </form>
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark main-menu sticky-top">
    <a class="navbar-brand ml-md-5" href="<?= base_url();?>" >
        <img src="<?= base_url();?>assets/web-site/images/base/masters/logonew.webp" class="img-fluid" alt="Prime Property Turkey">
    </a>
    <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon text-white"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mr-md-5">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url();?>" >Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-expanded="false">
                    Properties
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?= base_url();?>Properties/Istanbul">Istanbul</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url();?>Properties/Fethiye">Fethiye</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url();?>Properties/Kalkan">Kalkan</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url();?>Properties/Kas">Kas</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url();?>Properties/Gocek">Gocek</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-expanded="false">
                    Turkish Citizenship
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?= base_url();?>Citizenship-by-investment-in-turkey">Citizenship By Investment</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url();?>short-term-residency-permit">Short - Term Residency Permit</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url();?>short-term-residency-extension">Short - Term Residency Extension</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url();?>frequently-asked-questions-faq">FAQ's</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown"  role="button" data-toggle="dropdown"
                   aria-expanded="false">
                    Guides
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?= base_url();?>How-To-Buy-Property-In-Turkey">Buyer Guide</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url();?>area-guide">Area Guide</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url();?>after-sales">After Sales</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url();?>Resale">Resale</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url();?>blog">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url();?>news">News</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-expanded="false">
                    Contact
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?= base_url();?>about-us">About Us</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url();?>contact-us">Contact Us</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<?php
    if ($this->session->flashdata('message')!=''){
        echo $this->session->flashdata('message');
    }
    ?>
<?php
    if ($this->session->flashdata('googleSuccess')=='OK'){ ?>
        <div id="toast_message_success"></div>
<?php } ?>
