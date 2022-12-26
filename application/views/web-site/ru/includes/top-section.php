<section id="top-bar">
    <div class="container-fluid">
        <div class="row py-2">
            <div class="col-md-4 d-flex justify-content-md-start justify-content-around">
                <div class="row mb-2 mb-md-0" style="display: inline-flex">
                    <div class="currency d-inline pl-md-3 mx-1">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item">
                                <button style="border: 0; padding: 0;background-color: transparent"
                                        onclick="Change_Currency('USD');"
                                        class="<?php if ($this->session->userdata('currency') == "USD") {
                                            echo "red-text";
                                        } else {
                                            echo "text-reset";
                                        } ?>">
                                    <i class="fas fa-dollar-sign <?php if ($this->session->userdata('currency') == "USD") {
                                        echo "red-text";
                                    } else {
                                        echo "text-reset";
                                    } ?>"></i>
                                </button>
                            </li>
                            <li class="list-group-item">
                                <button style="border: 0; padding: 0;background-color: transparent"
                                        onclick="Change_Currency('EUR');"
                                        class="<?php if ($this->session->userdata('currency') == "EUR") {
                                            echo "red-text";
                                        } else {
                                            echo "text-reset";
                                        } ?>" href="<?php echo base_url("Currency/set_session/EUR"); ?>">
                                    <i class="fas fa-euro-sign <?php if ($this->session->userdata('currency') == "EUR") {
                                        echo "red-text";
                                    } else {
                                        echo "text-reset";
                                    } ?>"></i>
                                </button>
                            </li>
                            <li class="list-group-item">
                                <button style="border: 0; padding: 0;background-color: transparent"
                                        onclick="Change_Currency('GBP');"
                                        class="<?php if ($this->session->userdata('currency') == "GBP") {
                                            echo "red-text";
                                        } else {
                                            echo "text-reset";
                                        } ?>" href="<?php echo base_url("Currency/set_session/GBP"); ?>">
                                    <i class="fas fa-pound-sign <?php if ($this->session->userdata('currency') == "GBP") {
                                        echo "red-text";
                                    } else {
                                        echo "text-reset";
                                    } ?>"></i>
                                </button>
                            </li>
                            <li class="list-group-item">
                                <button style="border: 0; padding: 0;background-color: transparent"
                                        onclick="Change_Currency('TRY');"
                                        class="<?php if ($this->session->userdata('currency') == "TRY") {
                                            echo "red-text";
                                        } else {
                                            echo "text-reset";
                                        } ?>" href="<?php echo base_url("Currency/set_session/TRY"); ?>">
                                    <i class="fas fa-lira-sign <?php if ($this->session->userdata('currency') == "TRY") {
                                        echo "red-text";
                                    } else {
                                        echo "text-reset";
                                    } ?>"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown mx-2">
                        <button class="btn btn-sm btn-light dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                            Язык
                        </button>
                        <div class="dropdown-menu" style="z-index: 9999;">
                            <? if ($this->uri->segment(1)=='ru'){ ?>
                                <button onclick="ChangeToEnglish();" class="dropdown-item">Английский</button>
                           <? } ?>
                        </div>
                    </div>
                    <span class="top-Buying mx-1 d-block d-md-none">
                        <a href="<?= base_url(); ?>ru/buying-online" class="btn red-button">
                        Покупка онлайн
                        </a>
                    </span>
                </div>
            </div>
            <div class="col-md-4 justify-content-center text-center d-none d-md-inline">
                <div class="row mb-2 mb-md-0  justify-content-center" style="display: inline-flex">
                    <div class="crypto d-md-inline d-none mx-1">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item text-warning">
                                <img src="<?= base_url(); ?>assets/web-site/images/base/currency/3838998_bitcoin_cryptocurrency_currency_money_finance_icon.webp"
                                     alt="bitcoin" class="img-fluid" width="17px">
                            </li>
                            <li class="list-group-item">
                                <img src="<?= base_url(); ?>assets/web-site/images/base/currency/4373172_ethereum_logo_logos_icon.webp"
                                     alt="ethereum" class="img-fluid" width="17px">
                            </li>
                            <li class="list-group-item">
                                <img src="<?= base_url(); ?>assets/web-site/images/base/currency/2785456_blockchain_litecoin_icon.webp"
                                     alt="litecoin" class="img-fluid" width="17px">
                            </li>
                            <li class="list-group-item">
                                <span>Оплата биткоинами</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row justify-content-md-end justify-content-center align-items-center">
                    <div class="crypto d-md-none d-inline mx-1">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item text-warning">
                                <a class="text-reset">
                                    <img src="<?= base_url(); ?>assets/web-site/images/base/currency/3838998_bitcoin_cryptocurrency_currency_money_finance_icon.webp"
                                         alt="bitcoin" class="img-fluid" width="17px">
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a class="text-reset">
                                    <img src="<?= base_url(); ?>assets/web-site/images/base/currency/4373172_ethereum_logo_logos_icon.webp"
                                         alt="ethereum" class="img-fluid" width="17px">
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a>
                                    <img src="<?= base_url(); ?>assets/web-site/images/base/currency/2785456_blockchain_litecoin_icon.webp"
                                         alt="litecoin" class="img-fluid" width="17px">
                                </a>
                            </li>
                            <li class="list-group-item">
                                <span>Оплата биткоинами</span>
                            </li>
                        </ul>
                    </div>

                    <span class="top-Buying d-none d-md-inline mx-1">
                        <a href="<?= base_url(); ?>ru/buying-online" class="btn red-button">
                        Покупка онлайн
                        </a>
                    </span>
                    <span class="top-search mx-1">
                        <button class="btn" id="searchToggle">
                            <i class="fas fa-search"></i>
                        </button>
                        <span id="toggle-search">
                            <form action="<?= base_url(); ?>ru/Search" method="POST"
                                  class="form-inline justify-content-around">
                                 <input type="text" autocomplete="off" name="search" id="search" required
                                        placeholder="Enter Search Data" class="form-control-sm" autofocus>
                                 <input type="submit" class="btn red-button btn-sm" value="Поиск">
                           </form>
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark main-menu sticky-top">
    <a class="navbar-brand ml-md-5" href="<?= base_url(); ?>">
        <img src="<?= base_url(); ?>assets/web-site/images/base/masters/logonew.webp" class="img-fluid"
             alt="Prime Property Turkey">
    </a>
    <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon text-white"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mr-md-5">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url(); ?>ru">Главная
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-expanded="false">
                    Недвижимость
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?= base_url(); ?>ru/Properties/Istanbul">Стамбул</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url(); ?>ru/Properties/Fethiye">Фетхие</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url(); ?>ru/Properties/Kalkan">Калкан</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url(); ?>ru/Properties/Kas">Каш</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url(); ?>ru/Properties/Gocek">Гечек</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-expanded="false">
                    Турецкое гражданство
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?= base_url(); ?>ru/citizenship-by-investment-in-turkey">Гражданство за инвестиции</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url(); ?>ru/short-term-residency-permit">Краткосрочный ВНЖ</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url(); ?>ru/short-term-residency-extension">Продление краткосрочного ВНЖ</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url(); ?>ru/frequently-asked-questions-faq">Вопросы и ответы</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-expanded="false">
                    Полезные гайды
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?= base_url(); ?>ru/How-To-Buy-Property-In-Turkey">Руководство для покупателя</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url(); ?>ru/area-guide">Путеводитель по Стамбулу</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>ru/after-sales">После покупки</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>ru/blog">Блог</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-expanded="false">
                    Контакты
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?= base_url(); ?>ru/about-us">О нас</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url(); ?>ru/contact-us">Свяжитесь с нами</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<?php
if ($this->session->flashdata('message') != '') {
    echo $this->session->flashdata('message');
}
?>
<?php
if ($this->session->flashdata('googleSuccess') == 'OK') { ?>
    <div id="toast_message_success"></div>
<?php }
?>
<script type="text/javascript">
    function Change_Currency(value) {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            if (this.responseText) {
                location.reload();
            }
        }
        xhttp.open("POST", "<?= base_url();?>Currency/set_session");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("send_value=" + value);
    }
</script>
<script type="text/javascript">
    function ChangeToEnglish(){
        let pathname = window.location.pathname;
        let confirmPath = pathname.replace('/ru','');
        window.location.href = "https://www.primepropertyturkey.com"+confirmPath;
    }
</script>