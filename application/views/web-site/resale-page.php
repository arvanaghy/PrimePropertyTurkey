<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/header-image-wrapper.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/short_term_residency_permit.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/frequently_asked_questions_faq.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/area_guide.css">
<title>Resale Property | Prime Property Turkey</title>
<meta name="description"
      content="Prime Property Turkey is here to give you an opportunity to advertise and sell your property. We are an acclaimed property consultancy that has sold hundreds of new and resale properties around Turkey.">


<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="<?= current_url(); ?>">
<meta property="og:title" content=">Resale Property | Prime Property Turkey">
<meta property="og:description"
      content="Prime Property Turkey is here to give you an opportunity to advertise and sell your property. We are an acclaimed property consultancy that has sold hundreds of new and resale properties around Turkey.">
<meta property="og:image" content="<?= base_url(); ?>assets/web-site/images/base/resale.webp">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="<?= current_url(); ?>">
<meta property="twitter:title" content=">Resale Property | Prime Property Turkey">
<meta property="twitter:description"
      content="Prime Property Turkey is here to give you an opportunity to advertise and sell your property. We are an acclaimed property consultancy that has sold hundreds of new and resale properties around Turkey.">
<meta property="og:image" content="<?= base_url(); ?>assets/web-site/images/base/resale.webp">
<link rel="canonical" href="https://www.primepropertyturkey.com/Resale"/>


</head>
<body>
<?php $this->load->view('web-site/includes/top-section'); ?>
<main>
    <section id="theme-background">
        <div class="header-image-wrapper">
            <div class="bg" id="area-guide-BG"></div>
            <div class="mask"></div>
            <div class="header-image-content offset-bottom">
                <h1 class="title text-center px-1 font-weight-bold">Resale Your Properties With Prime Property Turkey</h1>
                <p class="text-center px-1"> Upload your apartments, duplexes, villas, mansions, and various other
                    property types you want to sell on our user-friendly portal. </p>
            </div>
        </div>
    </section>
    <section id="content-buy-online">
        <div class="container">
            <div class="row justify-content-center py-2 py-md-5">
                <div class="col-lg-8 content">
                    <div class="card my-2">
                        <div class="card-body px-4 pt-4 pb-1 text-center">
                                <p class="p-4 text-justify">
                                    Prime Property Turkey is here to give you an opportunity to advertise and sell your
                                    property. We are an acclaimed property consultancy that has sold hundreds of new and
                                    resale properties around Turkey
                                </p>
                                <img src="<?= base_url(); ?>assets/web-site/images/base/resale.webp"
                                     alt="buyer guide"
                                     class="img-fluid px-3">
                                <p class="p-4 text-justify">
                                    Upload your apartments, duplexes, villas, mansions, and various other property types you
                                    want to sell on our user-friendly portal. All you have to do is insert the location of
                                    your property, its price, discount details, facilities, quality pictures, and all
                                    property specifications. Make use of our platform to sell your property and let our
                                    sales agents help you sell at a price that will make both the seller and buyer happy.
                                </p>
                                <div class="row justify-content-center align-items-center px-2">
                                    <div class="col-md-4 text-center">
                                            <img src="https://www.primepropertyturkey.com/assets/web-site/images/base/icon1.svg" class="img-fluid" style="width: 60%" alt="">
                                    </div>
                                    <div class="col-md-7 text-left">
                                        As users, you have the availability to add your property and after it is validated by
                                        Prime Property Turkey agents, it will be posted on your website for free.
                                    </div>
                                </div>
                                <div class="row justify-content-center align-items-center px-2">

                                    <div class="col-md-7 text-left">
                                        This platform will give you the ability to add your property, edit, sell and delete your advertisement whenever you want
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <img src="https://www.primepropertyturkey.com/assets/web-site/images/base/icon2.svg" class="img-fluid" style="width: 60%" alt="">
                                    </div>
                                </div>
                                <div class="row justify-content-center align-items-center px-2 py-2 mb-4">
                                    <div class="col-12 font-weight-bold">
                                        Get in touch with us for more information.
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card side contact my-2" style="position: sticky;top: 100px;">
                        <div class="card-body">
                            <img src="<?= base_url(); ?>assets/web-site/images/base/XaoQn8W15jyT.jpeg
"
                                 alt="buyers guide Prime"
                                 class="img-fluid">
                            <p class="text-center px-1 mt-4">
                                <? if ($this->session->has_userdata('username') && $this->session->has_userdata('user_info')) { ?>
                                    <a href="https://www.primepropertyturkey.com/user" class="btn red-button pulse-animation-high-blue"> Go to Your Panel </a>
                                <? } else { ?>
                                    <a href="<?= base_url(); ?>user_register" class="btn red-button pulse-animation-high-blue">
                                        Start Advertise & Sell Property </a>
                                <? } ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php $this->load->view('web-site/includes/footer'); ?>
<?php $this->load->view('web-site/includes/foot-load'); ?>
</body>
</html>
