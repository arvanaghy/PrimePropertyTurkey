<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/header-image-wrapper.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/citizenship_by_investment.css">
<title>Real Estate After-Sales Service | Prime Property Turkey</title>
<meta name="description" content="Those who obtain a residence permit further to (j) of the first
                                                paragraph of Article 31 of the Law No. 6458, by investing within the
                                                scope and amount determined by the President">
<link rel="canonical" href="https://www.primepropertyturkey.com/ru/after-sales"/>
<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content=https://www.primepropertyturkey.com/ru/after-sales">
<meta property="og:title" content="After Sales | Prime Property Turkey">
<meta property="og:description" content="Our real estate services do not only end when you sign contracts, but also extend to after sales services.">
<meta property="og:image"
      content="https://www.primepropertyturkey.com/assets/web-site/images/base/Prime-Property-Turkey-build-logo.jpg">
<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="https://www.primepropertyturkey.com/ru/after-sales">
<meta name="twitter:creator" content="Justin Mays">
<meta name="twitter:image:alt" content="After Sales | Prime Property Turkey">
<meta name="twitter:title" content="After Sales | Prime Property Turkey">
<meta name="twitter:description" content="Our real estate services do not only end when you sign contracts, but also extend to after sales services.">
<meta name="twitter:image"
<meta name="twitter:image"
      content="https://www.primepropertyturkey.com/assets/web-site/images/base/Prime-Property-Turkey-build-logo.jpg">
<style type="text/css">
    #enquire-gradiant {
        color: white;
        background-image: linear-gradient(140deg, #466ad8, #012169);
        border: none;
        position: sticky;
        top: 100px;
    }

    #enquire-gradiant .form-control {
        border-radius: 50px;
        font-weight: lighter;
        font-size: 0.9rem;
    }

    #enquire-gradiant #note .form-control {
        border-radius: 20px !important;
    }

    #enquire-gradiant select {
        background-position-x: 90%;
        background-position-y: 5px;
    }

    #enquire-gradiant .btn {
        border-radius: 50px;
        font-weight: bold;
    }

    .side .card-title {
        font-size: 1.5rem;
    }

    #Citizenship-by-investment-content #accordion .card .card-header {
        background-color: white !important;
    }

    #Citizenship-by-investment-content #accordion .card .card-body {
        background-color: white !important;
    }

    .border {
        content: "";
        width: 70%;
        height: 5px;
        border-radius: 50%;
        background-color: #cf142b;
        justify-content: center;
        text-align: center;
        margin: 1% auto;
        border: 0px solid darkred !important;
    }

    #accordion .content {
        padding-top: 20px;
    }

    .col-lg-8 .card-body {
        /*padding-top: 0 !important;*/
    }

    .col-lg-8 .card-title {
        margin-bottom: 0;
    }

    .col-lg-8 .card-title .col {
        padding-right: 1% !important;
        padding-left: 1% !important;
    }

    #theme-background .header-image-wrapper .header-image-content.offset-bottom .title {
        font-size: 30px;
        text-transform: unset;
        line-height: 30px;
        padding-bottom: 40px;
    }

    #theme-background .header-image-wrapper .header-image-content.offset-bottom {
        padding-top: unset;
        padding-bottom: unset;
        min-height: unset;
    }

    #theme-background .header-image-wrapper {
        position: relative;
        overflow: hidden;
        margin-top: unset;
        padding-top: 36px;
    }
</style>
</head>
<body>
<?php $this->load->view('web-site/ru/includes/top-section'); ?>
<section id="theme-background">
    <div class="header-image-wrapper">
        <div class="bg" id="Citizenship-by-investment-BG"></div>
        <div class="mask"></div>
        <div class="header-image-content offset-bottom">
            <h1 class="title text-center font-weight-bold" style="padding-bottom: 20px !important;">Real Estate After-Sales Service</h1>
            <p class="pb-5">
                Our real estate services do not only end when you sign contracts, but also extend to after sales services.
            </p>
        </div>
    </div>
</section>
<section id="Citizenship-by-investment-content">
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-8">
                <div class="card" style="background-color: #eaeaea">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="row p-4">
                                <div class="col">
                                    <a onclick="scrollToAfterSection(this)" id="1" style="cursor: pointer">
                                        <img src="<?= base_url(); ?>assets/web-site/images/base/after-sales/x1.webp"
                                             class="img-fluid" alt="thumbnail rentals">
                                    </a>
                                </div>
                                <div class="col">
                                    <a onclick="scrollToAfterSection(this)" id="2" style="cursor: pointer">
                                        <img src="<?= base_url(); ?>assets/web-site/images/base/after-sales/x2.webp"
                                             class="img-fluid" alt="thumbnail resales">
                                    </a>
                                </div>
                                <div class="col">
                                    <a onclick="scrollToAfterSection(this)" id="3" style="cursor: pointer">
                                        <img src="<?= base_url(); ?>assets/web-site/images/base/after-sales/x3.webp"
                                             class="img-fluid" alt="thumbnail property management">
                                    </a>

                                </div>
                                <div class="col">
                                    <a onclick="scrollToAfterSection(this)" id="4" style="cursor: pointer">
                                        <img src="<?= base_url(); ?>assets/web-site/images/base/after-sales/x4.webp"
                                             class="img-fluid" alt="thumbnail interior design">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card my-3" id="1-section">
                            <div class="card-body text-center">
                                <div class="card-title h2 my-2 text-left">
                                    Rentals
                                </div>
                                <img src="<?= base_url(); ?>assets/web-site/images/base/after-sales/RENTAL.webp"
                                     class="img-fluid mt-2 mb-4" alt="after sales">
                                <div class="content  text-justify my-2">
                                    As Prime Property Turkey, we help you enjoy the benefits of your
                                    investments. A large number of people are moving to Turkey because of
                                    the peaceful environment and perfect weather and some deciding to move
                                    because most companies have turned to remote working.
                                </div>
                                <div class="content text-justify my-2">
                                    If you decide to rent your property. Our company will help you with the
                                    assurance that any maintenance needed is reported to the owner in time
                                    so that the property remains profitable at all times. We will help you
                                    get tenants that pay monthly rentals in time whether you prefer
                                    students, small families, or individuals. We will advertise your
                                    property through all channels and vet the potential tenants before they
                                    move in.
                                </div>
                                <div class="content text-justify my-2">
                                    The percentage of rental income in Turkey ranges from 6% to 9% per year
                                    depending on the location of your property, whether it is in the city
                                    center or a holiday district.
                                </div>
                            </div>
                        </div>
                        <div class="card my-3" id="2-section">
                            <div class="card-body text-center">
                                <div class="card-title h2 my-2 text-left">
                                    Resales
                                </div>
                                <img src="<?= base_url(); ?>assets/web-site/images/base/after-sales/RESALE.webp"
                                     class="img-fluid mt-2 mb-4" alt="Resales">
                                <div class="content  text-justify my-2">
                                    Whether it's a villa or an apartment, resales should not give you a
                                    headache. After buying property in Turkey, you might decide to sell your
                                    property, look no further. Our company has a positive track record of
                                    making sales in a short period of time with prices that will make both
                                    the seller and the buyer happy.
                                </div>
                                <div class="content text-justify my-2">
                                    Whether you are in Turkey or elsewhere, we will help you sell your
                                    property through Power of Attorney (POA). All the processes that are
                                    needed to make your sale necessary, we are here to help you. Prime
                                    Property Turkey will assist you to sell your property through all our
                                    media platforms. We will make sure that your property reaches the
                                    potential buyers at the right time, wherever they are.
                                </div>
                                <div class="content text-justify my-2">
                                    All you need to do is to submit the pictures of the property, the
                                    listing price, and the cash price and we would be glad to resell your
                                    property.
                                </div>
                            </div>

                        </div>
                        <div class="card my-3" id="3-section">
                            <div class="card-body text-center">
                                <div class="card-title h2 my-2 text-left">
                                    Property Management
                                </div>
                                <img src="<?= base_url(); ?>assets/web-site/images/base/after-sales/PMANAGEMENT.webp"
                                     class="img-fluid mt-2 mb-4"
                                     alt="Property Management">
                                <div class="content text-justify  my-2">
                                    Cleaning services and landscape maintenance are also part of the
                                    after-sale service that we provide. You can also trust us with meet and
                                    greet services at your property for times you are not around or when you
                                    have events going on special days.
                                </div>
                                <div class="content text-justify  my-2">
                                    You might also wish to boost your security to 24/7 with guards or CCVT
                                    installation, Prime Property Turkey's After-Sales team will assist you
                                    in connecting with the reputable security companies in the city and
                                    neighborhood your property.
                                </div>
                            </div>
                        </div>
                        <div class="card my-3" id="4-section">
                            <div class="card-body">
                                <div class="card-title h2 my-2 text-left">
                                    Interior Design
                                </div>
                                <img src="<?= base_url(); ?>assets/web-site/images/base/after-sales/IDESIGN.webp"
                                     class="img-fluid mt-2 mb-4" alt="Interior Design">
                                <div class="content  text-justify  my-2">
                                    Be it a home or a business that you buy, giving it furniture makes it
                                    complete. But when you are out of Turkey and you want this need to be
                                    met, that is where we come in.
                                </div>
                                <div class="content  text-justify  my-2">
                                    Prime Property Turkey helps you purchase quality furniture for your
                                    property. We will help you define the design of each room and create
                                    focal points that give your home definitions. We are always in touch
                                    with famous brand furniture distributors who are always well aware of
                                    seasonal designs, keeping us in the niche of what is trending yet of
                                    good prices.
                                </div>
                                <div class="content  text-justify  my-2">
                                    If you wish for any renovations to be done in your home, our team will
                                    assist you with all that you need to be remodeled whether it's a
                                    brand-new apartment or a resale. All the aesthetics that you ever wished
                                    for that makes your house a home will come to reality.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card my-3" style="background-color: #eaeaea">
                    <div class="card-body">
                        <div class="useful px-4 py-2">
                            <strong> Did You Find This Useful ? </strong>
                            <button id="like_button"
                                    <? if (is_afterSaleLiked()){ ?>style="pointer-events: none;border: 0;background-color: transparent;"
                                    <? }else{ ?>style="border: 0;background-color: transparent;" <?}?>
                            ><? if (is_afterSaleDisliked()) { ?><span class="pl-2"><i
                                        class="fas fa-thumbs-up"></i></span><? } else { ?><span class="pl-2"><i
                                        class="far fa-thumbs-up"></i></span><? } ?>
                            </button>
                            <button id="Dislike_button"
                                    <? if (is_afterSaleDisliked()){ ?>style="pointer-events: none;border: 0;background-color: transparent;"
                                    <? }else{ ?>style="border: 0;background-color: transparent;"<?}?> ><? if (is_afterSaleLiked()) { ?>
                                    <span class="pl-2"><i class="fas fa-thumbs-down"></i></span><? }else{ ?><span
                                    class="pl-2"><i class="far fa-thumbs-down"></i></span><?}?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card side contact mb-2" id="enquire-gradiant">
                    <? $passed_data['reference_id'] = 'after sale'; ?>
                    <?php $this->load->view('web-site/includes/side-enquire', $passed_data); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('web-site/ru/includes/footer'); ?>
<?php $this->load->view('web-site/includes/foot-load'); ?>
<script type="text/javascript">
    function scrollToAfterSection(element) {
        let identify = element.id;
        let item = '#' + identify + '-section';
        $([document.documentElement, document.body]).animate({
            scrollTop: $(item).offset().top -100
        }, 2000);
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#like_button").on("click", function () {
            $.ajax({
                url: '<?= base_url(); ?>Like/after_sale',
                method: 'POST',
                data: {value_data_posted: 'fag'},
                dataType: 'json',
                success: function (response) {
                    if (response) {
                        location.reload();
                    } else {
                        location.reload();
                    }
                }
            });
        });
        $("#Dislike_button").on("click", function () {
            $.ajax({
                url: '<?= base_url(); ?>Dislike/after_sale',
                method: 'POST',
                data: {value_data_posted: 'fag'},
                dataType: 'json',
                success: function (response) {
                    if (response) {
                        location.reload();
                    } else {
                        location.reload();
                    }
                }
            });
        });
    });
</script>
</body>
</html>