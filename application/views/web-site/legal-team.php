<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/header-image-wrapper.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/citizenship_by_investment.css">
<title>Citizenship by investment in Turkey | Prime Property Turkey Legal Team</title>
<meta name="description"
      content="Getting Turkish Citizenship is a process that must be handled by professionals aware of the current laws and regulations of the program. Our renowned legal team has processed dozens of citizenship applications over the years and received a lot of referrals.">
<link rel="canonical" href="https://www.primepropertyturkey.com/Legal-Team"/>
<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content=https://www.primepropertyturkey.com/Legal-Team">
<meta property="og:title" content="Citizenship by investment in Turkey | Prime Property Turkey Legal Team">
<meta property="og:description"
      content="Getting Turkish Citizenship is a process that must be handled by professionals aware of the current laws and regulations of the program. Our renowned legal team has processed dozens of citizenship applications over the years and received a lot of referrals.">
<meta property="og:image"
      content="https://www.primepropertyturkey.com/assets/web-site/images/base/Prime-Property-Turkey-build-logo.jpg">
<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="https://www.primepropertyturkey.com/Legal-Team">
<meta name="twitter:creator" content="Justin Mays">
<meta name="twitter:image:alt" content="Citizenship by investment in Turkey | Prime Property Turkey Legal Team">
<meta name="twitter:title" content="Citizenship by investment in Turkey | Prime Property Turkey Legal Team">
<meta name="twitter:description"
      content="Getting Turkish Citizenship is a process that must be handled by professionals aware of the current laws and regulations of the program. Our renowned legal team has processed dozens of citizenship applications over the years and received a lot of referrals.">
<meta name="twitter:image"
<meta name="twitter:image"
      content="https://www.primepropertyturkey.com/assets/web-site/images/base/Prime-Property-Turkey-build-logo.jpg">
<style type="text/css">
    @font-face {
        font-family: 'Miller-TextBoldItalic';
        src: url('https://landing.primepropertyturkey.com/fonts/Miller-TextBoldItalic.ttf');
        font-style: normal;
        font-weight: normal;
    }
    .header-image-content h1 {
        font-family: 'Miller-TextBoldItalic' !important;
    }
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

    #theme-background .title {
        font-size: 3rem !important;
        line-height: 3.7rem !important;
        color: darkblue;
        font-weight: 800;
    }
    #theme-background p{
        font-size: 1.7rem !important;
        line-height: 1.8rem !important;
        color: black;
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

    #theme-background #Citizenship-by-investment-BG {
        background: url(./assets/web-site/images/legal-team/main-bg.webp) center !important;
    }

    #main-intro {
        background-color: #f5f4f2;
        font-family: 'Roboto-Regular' !important;
    }

    .features .icons-sec {
        text-align: center;
    }

    .features .icons-sec ul {
        display: inline-block;
        padding: 0;
        margin: 0;
    }

    .features .icons-sec ul li {
        width: 25%;
        float: left;
        list-style: none;
    }

    .features .icons-sec ul li .icon-img {
        margin: 0 0 28px;
        position: relative;
    }

    .features .icons-sec ul li p {
        font-family: 'Roboto-Regular';
        font-size: 19px;
        color: #4f5256;
        line-height: 30px;
        padding: 0 14px;
    }

    .features .icons-sec ul li .icon-img:after {
        content: "";
        position: absolute;
        right: -50px;
        top: 50px;
        width: 100px;
        height: 2px;
        background-color: white;
    }

    .features .icons-sec ul li:last-child .icon-img:after {
        content: "";
        right: 0px;
        top: 0px;
        width: 0px;
        height: 0px;
        background-color: #f5f4f2;
    }

    .our-service .icon{
        position: relative;
        right: 0;
        left: 0;
        top: -50px;
    }
    .our-service .icon img{
        background-color: white;
        border-radius: 50%;
    }
    .our-service .btn-secondary:hover{
        background-color: blue;
        transition: 1s;
    }
    .icon-img img{
        background-color: white;
        border-radius: 50%;
    }
    .embed-responsive {
        height: 245px;
    }

    #Citizenship-by-investment-content .col-lg-3{
        padding-right: 5px !important;
        padding-left: 5px !important;
    }
    @media screen and (max-width: 600px){
        .features .icons-sec ul li {
            width: 100%;
            float: none;
            list-style: none;
        }
        .features .icons-sec ul li .icon-img {
            margin: unset;
            position: unset;
        }
        .features .icons-sec ul li .icon-img:after {
            content: "";
            position: absolute;
            right: unset;
            top: unset;
            width: 0;
            height: 0;
            background-color: unset;
        }
    }
</style>
</head>
<body>
<?php $this->load->view('web-site/includes/top-section'); ?>
<section id="theme-background">
    <div class="header-image-wrapper">
        <div class="bg" id="Citizenship-by-investment-BG"></div>
        <div class="header-image-content offset-bottom">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-3">
                    <img src="<?= base_url(); ?>assets/web-site/images/legal-team/Damla ozkan.webp" class="img-fluid" alt="damla-ozkan" style="-webkit-transform: scaleX(-1);transform: scaleX(-1);">
                </div>
                <div class="col col-md-6">
                    <h1 class="title text-center font-weight-bold mb-5" >Obtain Citizenship by Investment In Turkey</h1>
                    <p class="pb-5 text-center">Purchase Real Estate Worth At least 400.000 USD & Acquire Turkish Citizenship</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="Citizenship-by-investment-content">
    <div class="container-fluid py-4 px-xl-2">
        <div class="row px-xl-2">
            <div class="col-lg-9">
                <div class="card" style="background-color: #eaeaea">
                    <div class="card-body">
                        <div class="card-title h3 text-center font-weight-bold my-4 pb-4">
                            Steps to Obtain Turkish Citizenship Through Real Estate Investment
                        </div>
                        <div class="features mt-5">
                            <div class="icons-sec">
                                <div class="container">
                                    <ul>
                                        <li>
                                            <div class="icon-img"><img src="<?= base_url(); ?>assets/web-site/images/legal-team/upico1.webp" alt="obligation" width="103"
                                                                       height="101"></div>
                                            <p>Invest at least 400.000 USD in a property</p></li>
                                        <li>
                                            <div class="icon-img"><img src="<?= base_url(); ?>assets/web-site/images/legal-team/upico2.webp" alt="obligation" width="103"
                                                                       height="101"></div>
                                            <p>Acquire the Conformity Report</p></li>
                                        <li>
                                            <div class="icon-img"><img src="<?= base_url(); ?>assets/web-site/images/legal-team/upico3.webp" alt="obligation" width="103"
                                                                       height="101"></div>
                                            <p>Residence permit application</p></li>
                                        <li>
                                            <div class="icon-img"><img src="<?= base_url(); ?>assets/web-site/images/legal-team/upico4.webp" alt="obligation" width="103"
                                                                       height="101"></div>
                                            <p>Citizenship Application</p></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body our-service m-2">
                        <h3 class="text-center font-weight-bold my-5">
                            Our Services
                        </h3>
                        <div class="row justify-content-center align-items-center px-2">
                            <div class="col-lg-4 my-2">
                                <div class="card h-100">
                                    <img src="<?= base_url(); ?>assets/web-site/images/legal-team/consultant.webp" alt="consultant"
                                         class="card-img-top">
                                    <div class="icon text-center">
                                        <img src="<?= base_url(); ?>assets/web-site/images/legal-team/downico1.webp" alt="downico1" class="img-fluid">
                                    </div>
                                    <div class="card-body text-center">
                                        <h5 class="card-title pb-3 fw-bold">Real Estate Consultancy Services</h5>
                                        <p class="card-text pb-4 px-3 justify-content-all">Our knowledgeable team of experts can
                                            help you make a secure real estate investment to help open doors for you to acquire
                                            Turkish Citizenship.</p>
                                        <a href="https://www.primepropertyturkey.com" target="_blank" class="btn btn-secondary">Get
                                            More Info
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 my-2">
                                <div class="card">
                                    <img src="<?= base_url(); ?>assets/web-site/images/legal-team/aftersale.webp" alt="aftersale"
                                         class="card-img-top">
                                    <div class="icon text-center">
                                        <img src="<?= base_url(); ?>assets/web-site/images/legal-team/downico2.webp" alt="downico2" class="img-fluid">
                                    </div>
                                    <div class="card-body text-center">
                                        <h5 class="card-title pb-3 fw-bold">After-Sales Services</h5>
                                        <p class="card-text pb-4 px-3 justify-content-all">We have after-sales service for our
                                            clients that include finding tenants for our clients’ rentals through our channels,
                                            assisting in property resale via Power of attorney, property maintenance and interior
                                            design.</p>
                                        <a href="https://www.primepropertyturkey.com/after-sales" target="_blank"
                                           class="btn btn-secondary">Get More Info
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 my-2">
                                <div class="card">
                                    <img src="<?= base_url(); ?>assets/web-site/images/legal-team/resale.webp" alt="resale"
                                         class="card-img-top">
                                    <div class="icon text-center">
                                        <img src="<?= base_url(); ?>assets/web-site/images/legal-team/downico3.webp" alt="downico3" class="img-fluid">
                                    </div>
                                    <div class="card-body text-center">
                                        <h5 class="card-title pb-3 fw-bold">Resale Services</h5>
                                        <p class="card-text pb-4 px-3 justify-content-all">Prime Property Turkey also offers resale
                                            services to clients and allows them to use its platform to upload and advertise their
                                            property for hassle-free selling.</p>
                                        <a href="https://www.primepropertyturkey.com/Resale" target="_blank"
                                           class="btn btn-secondary">Get More Info
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body about-prime m-2 bg-white">
                        <div class="row justify-content-center align-items-center px-2">
                            <div class="col-lg-6">
                                <div class="title h3 py-2 fw-bold text-center text-lg-left">
                                    About Prime Property Turkey
                                </div>
                                <div class="description pb-3 text-danger fst-italic">
                                    With over 10+ years of working in the Turkish real estate market, Prime Property Turkey caters to
                                    foreign investors who are interested in living or investing in Turkey. We offer quality and
                                    personalized real estate consultancy services to cater to our diverse clientele.
                                </div>
                                <div class="post-description pb-3">
                                    No matter what your preferences are, Prime Property Turkey will help you find the property of your
                                    dreams.

                                </div>
                                <div class="signature">
                                </div>
                            </div>
                            <div class="col-lg-6 text-center">
                                <div class="embed-responsive embed-responsive-21by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/WD3HRDN_mUA"
                                            allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body Attorney m-2 bg-white">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-8">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-md-2 text-center text-lg-left">
                                        <img src="<?= base_url(); ?>assets/web-site/images/legal-team/downico1.webp" class="img-fluid d-md-block my-1" alt="downico1">
                                        <img src="<?= base_url(); ?>assets/web-site/images/legal-team/downico2.webp" class="img-fluid d-md-block my-1" alt="downico2">
                                        <img src="<?= base_url(); ?>assets/web-site/images/legal-team/downico3.webp" class="img-fluid d-md-block my-1" alt="downico3">
                                    </div>
                                    <div class="col-md-10">
                                        <h3 class="my-5 text-center text-lg-left">
                                            Meet Our Attorney <span class="text-danger fw-bold"> Damla Ozkan </span>
                                        </h3>
                                        <p class="px-3">
                                            Our attorney, Damla, is fluent in English and Turkish and has catered to Prime Property
                                            Turkey’s diverse
                                            clientele from all over the world. With 50+ citizenship applications completed, Damla can
                                            take care of
                                            your Turkish citizenship process and ensure proper document arrangement for a successful
                                            application.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="<?= base_url(); ?>assets/web-site/images/legal-team/Damla ozkan.webp" alt="Damla ozkan" class="img-fluid">
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
                                    <? }else{ ?>style="border: 0;background-color: transparent;" <? } ?>
                            ><? if (is_afterSaleDisliked()) { ?><span class="pl-2"><i
                                            class="fas fa-thumbs-up"></i></span><? } else { ?><span class="pl-2"><i
                                            class="far fa-thumbs-up"></i></span><? } ?>
                            </button>
                            <button id="Dislike_button"
                                    <? if (is_afterSaleDisliked()){ ?>style="pointer-events: none;border: 0;background-color: transparent;"
                                    <? }else{ ?>style="border: 0;background-color: transparent;"<? } ?> ><? if (is_afterSaleLiked()) { ?>
                                    <span class="pl-2"><i class="fas fa-thumbs-down"></i></span><? } else { ?><span
                                        class="pl-2"><i class="far fa-thumbs-down"></i></span><? } ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card side contact mb-2" id="enquire-gradiant">
                    <? $passed_data['reference_id'] = 'after sale'; ?>
                    <?php $this->load->view('web-site/includes/side-enquire', $passed_data); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('web-site/includes/footer'); ?>
<?php $this->load->view('web-site/includes/foot-load'); ?>

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