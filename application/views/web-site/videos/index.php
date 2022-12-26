<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/find-property.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/cities-property.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/header-image-wrapper.css">
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/phone-input.css">
<title>YouTube Videos | Prime Property Turkey</title>
<link rel="canonical" href="https://www.primepropertyturkey.com/prime-videos"/>
<meta name="description"
      content="Check out Prime Property Turkey’s extensive collection of videos on all matters regarding real estate and moving to Turkey. You will find a variety of content that showcases what we do through our experts, who have been in the real estate industry for decades.">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="https://www.primepropertyturkey.com/prime-videos">
<meta name="twitter:creator" content="Justin Mays">
<meta name="twitter:image:alt" content="YouTube Videos | Prime Property Turkey">
<meta name="twitter:title"
      content="YouTube Videos | Prime Property Turkey">
<meta name="twitter:description"
      content="">
<meta name="twitter:image" content="<?= base_url(); ?>assets/web-site/images/PrimePropertyTurkeybuildlogo.webp">
<script src="https://www.google.com/recaptcha/api.js"></script>
<style type="text/css">
    .sold-out {
        position: absolute;
        top: 40px;
        left: 20px;
        background-color: red;
        padding: 3px;
        color: white;
        font-size: 0.8rem;
        font-weight: bold;
        border-radius: 5px;
        opacity: 0.85;
    }

    .sold-out-badge {
        position: absolute;
        top: 40px;
        left: 5px;
        font-size: 0.7rem;
        font-weight: bold;
        color: white;
        background-color: red;
        padding: 5px;
        border-radius: 5px;
        opacity: 0.85;
    }

    .is_commercial {
        position: absolute;
        left: 20px;
        top: 50px;
        background-color: #012169;
        color: white;
        padding: 5px 10px;
        border-radius: 10px;
        font-size: 0.7rem;
        font-weight: bold;
        color: white;
        opacity: 0.85;
    }

    .is_commercial-badge {
        background: #012169;
        color: white;

        border-radius: 10px;
        display: block;
        position: absolute;

        opacity: 0.95;
        font-weight: bold;
        font-size: 0.8rem;
        padding: 5px 10px;
        top: 9%;
        left: 3%;
    }

    #price-section .col {
        padding-left: 5px;
        padding-right: 5px;
    }

    #description-section {
        min-height: 120px;
        align-items: center;
    }

    #description-section p {
        margin-bottom: 0;
        padding-bottom: 0;
    }

    #title-section {
        position: absolute;
        top: 188px;
        left: 1%;
        right: 1%;
        background: rgba(255, 255, 255, 0.8);
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        min-height: 90px;
    }
</style>
</head>
<body>
<?php $this->load->view('web-site/includes/top-section'); ?>
    <section id="theme-background">
        <div class="header-image-wrapper">
            <div class="bg" id="search-property-BG"></div>
            <div class="mask"></div>
            <div class="header-image-content offset-bottom">
                <h1 class="title text-center px-1 font-weight-bold">Prime Videos</h1>
            </div>
        </div>
    </section>
    <section id="content" class="py-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="card mx-4 mb-5">
                            <div class="card-body mx-4 p-2">
                                Check out Prime Property Turkey’s extensive collection of videos on all matters regarding real estate and moving to Turkey. You will find a variety of content that showcases what we do through our experts, who have been in the real estate industry for decades.
                                Whether you are a seasoned investor or a first-time buyer, our videos will provide you with regular news regarding residency and Turkish citizenship and keep you informed on the Turkish property market.
                                Our video content also includes steps to buy property in Turkey and customer testimonials.
                                Stay up to date with our services by subscribing to our <a href="https://www.youtube.com/@primepropertyturkey/videos" target="_blank">channel</a> and following us on
                                <a href="https://www.instagram.com/primepropertyturkey/" target="_blank">Instagram</a>.
                            </div>
                        </div>
                        <? foreach ($results as $value) { ?>
                            <div class="col-md-3">
                                <div class="item my-2">
                                    <div class="card feature-sm-back">
                                        <div class="card-body">
                                            <div id="top-image">
                                                <a href="<?= base_url(); ?>prime-videos/<?= $value->url_slug; ?>">
                                                    <img class="card-img-top img-fluid"
                                                         style="min-height: 280px;max-height: 280px"
                                                         src="<?= base_url(); ?><?= "assets/web-site/images/youtube-cover/" . $value->cover_image; ?>"
                                                         alt="<?= $value->title; ?>">
                                                </a>
                                            </div>
                                            <div id="title-section" >
                                                <a href="<?= base_url(); ?>prime-videos/<?= $value->url_slug; ?>"
                                                   class="text-reset text-left property-title font-weight-bold px-2 py-2 d-block blue-text">
                                                    <div style="font-size: 0.9rem;line-height: 1.5rem;word-break: break-all; font-weight: 900 !important;">
                                                        <?= $value->title; ?>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="row mx-2 mt-2" id="description-section">
                                                <p class="text-left">
                                                    <?= substr(strip_tags($value->description), 0, 100) . "...."; ?>
                                                </p>
                                            </div>
                                            <div class="row justify-content-around align-items-center py-2">
                                                <a href="<?= base_url(); ?>prime-videos/<?= $value->url_slug; ?>"
                                                   class="btn btn-outline-danger btn-sm  d-flex my-1">
                                                    Watch Video
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <? } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $this->load->view('web-site/includes/footer'); ?>
<?php $this->load->view('web-site/includes/foot-load'); ?>
</body>
</html>