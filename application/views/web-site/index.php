<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<title>Prime Property for Sale in Turkey | Prime Property Turkey</title>
<meta name="description"
      content="Find your perfect property in Turkey at Prime Property Turkey. We have a wide range of properties for sale in Turkey. If you are looking for or have property for sale Istanbul, Altinkum, Bodrum, Fethiye, Kalkan in Turkey, then call us on (+90) 552 754 44 93.">
<meta name="keywords"
      content="Property for Sale in Turkey, Buy Property in Turkey, Citizenship By Investments in Turkey, Citizenship By Investments Program for Turkish citizenship.">
<link rel="canonical" href="https://www.primepropertyturkey.com/"/>
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta property="og:type" content="website">
<meta property="og:url" content="https://www.primepropertyturkey.com/">
<meta property="og:title" content="Prime Property for Sale in Turkey | Prime Property Turkey">
<meta property="og:description"
      content="Find your perfect property in Turkey at Prime Property Turkey. We have a wide range of properties for sale in Turkey. If you are looking for or have property for sale Istanbul, Altinkum, Bodrum, Fethiye, Kalkan in Turkey, then call us on (+90) 552 754 44 93.">
<meta property="og:image" content="<?= base_url(); ?>assets/web-site/images/PrimePropertyTurkeybuildlogo.webp">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="https://www.primepropertyturkey.com/">
<meta name="twitter:creator" content="Justin Mays">
<meta name="twitter:image:alt" content="Luxurious Property for Sale in Turkey | Prime Property Turkey">
<meta name="twitter:title"
      content="Prime Property for Sale in Turkey | Prime Property Turkey">
<meta name="twitter:description"
      content="Find your perfect property in Turkey at Prime Property Turkey. We have a wide range of properties for sale in Turkey. If you are looking for or have property for sale Istanbul, Altinkum, Bodrum, Fethiye, Kalkan in Turkey, then call us on (+90) 552 754 44 93.">
<meta name="twitter:image" content="<?= base_url(); ?>assets/web-site/images/PrimePropertyTurkeybuildlogo.webp">
<script src="https://www.google.com/recaptcha/api.js" ></script>
<link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>
<link rel="stylesheet" href="<?= base_url();?>assets/web-site/css/phone-input.css">
<link rel="stylesheet" href="<?= base_url();?>assets/web-site/css/homePage.css">
<style type="text/css">
    .resale-badge{
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
        right: 3%;
    }
</style>
</head>
<body>
<?php $this->load->view('web-site/includes/top-section'); ?>
<main>
    <section id="main-top-cover" class="main-top-cover">
        <div class="container-fluid">
            <div class="row justify-content-center d-md-none">
                <div class="col text-center" id="tops">
                    <p>ENJOY LIVING &</p>
                    <p>INVESTING IN TURKEY</p>
                </div>
            </div>
            <div class="row justify-content-end pt-5" id="slogan-box">
                <div class="col-md-5 mt-5 ">
                    <div class="card mt-5">
                        <div class="card-body">
                            <ul class="font-weight-bold">
                                <li class="li-small-font">
                                    <i class="fas fa-circle mx-md-2 mx-1"></i>
                                    WIDE & UPDATED REAL ESTATE PORTFOLIO
                                    <i class="fas fa-circle mx-md-2 mx-1"></i>
                                </li>
                                <li class="li-small-font">
                                    <i class="fas fa-circle mx-md-2 mx-1"></i>
                                    ORIGINAL PROJECT NAMES & EXACT LOCATIONS
                                    <i class="fas fa-circle mx-md-2 mx-1"></i>
                                </li>
                                <li>
                                    <i class="fas fa-circle mx-md-2 mx-1"></i>
                                    BEST TERMS AND PRICES
                                    <i class="fas fa-circle mx-md-2 mx-1"></i>
                                </li>
                                <li>
                                    <i class="fas fa-circle mx-md-2 mx-1"></i>
                                    ONLINE BUYING OPTIONS
                                    <i class="fas fa-circle mx-md-2 mx-1"></i>
                                </li>
                                <li>
                                    <i class="fas fa-circle mx-md-2 mx-1"></i>
                                    VIRTUAL TOURS
                                    <i class="fas fa-circle mx-md-2 mx-1"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-5" id="implement-button">
                <div class="col-md-3 col-7">
                    <button class="btn red-button btn-block" id="topCover"
                            data-toggle="modal" data-target="#topEnquireModal" rel="nofollow">ENQUIRE NOW ! </button>
                </div>
            </div>
        </div>
    </section>
    <section id="Find-Your-Property" class="Find-Your-Property m-3">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center my-2 py-3">
                <div class="find-title">
                     <span class="pre">
                          Find Your
                     </span>
                    <span class="pro">
                         Property
                    </span>
                </div>
                <div class="find-form">
                    <form action="<?= base_url(); ?>Find" method="post"
                          class="justify-content-around text-right">
                        <div class="row my-2 justify-content-around text-right">
                            <div class="col-lg-2 my-1" id="City">
                                <select name="City" id="city_value" class="form-control">
                                    <option value="All" selected>City</option>
                                    <option value="All">All</option>
                                    <? foreach ($cityNames as $value) { ?>
                                        <option value="<?= $value; ?>"><?= $value; ?></option>
                                    <? } ?>
                                </select>
                            </div>
                            <div class="col-lg-1 my-1" id="Type">
                                <select name="Type" id="property_type" class="form-control ">
                                    <option value="All" selected>Type</option>
                                    <option value="All">All</option>
                                    <? foreach ($ProType as $value) { ?>
                                        <option value="<?= $value; ?>"><?= $value; ?></option>
                                    <? } ?>
                                </select>
                            </div>
                            <div class="col-lg-2 my-1" id="min_price">
                                <select name="min_price" class="form-control ">
                                    <option value="min" selected>Min Price</option>
                                    <option value="100000">&#36; 100.000</option>
                                    <option value="200000">&#36; 200.000</option>
                                    <option value="300000">&#36; 300.000</option>
                                    <option value="400000">&#36; 400.000</option>
                                    <option value="500000">&#36; 500.000</option>
                                    <option value="1000000">&#36; 1 M</option>
                                </select>
                            </div>
                            <div class="col-lg-2 my-1" id="max_price">
                                <select class="form-control" name="max_price">
                                    <option value="5000000" selected>Max Price</option>
                                    <option value="100000">&#36; 100.000</option>
                                    <option value="200000">&#36; 200.000</option>
                                    <option value="300000">&#36; 300.000</option>
                                    <option value="400000">&#36; 400.000</option>
                                    <option value="500000">&#36; 500.000</option>
                                    <option value="1000000">&#36; 1 M</option>
                                    <option value="5000000">&#36; 1 M+</option>
                                </select>
                            </div>
                            <div class="col-lg-2 my-1" id="bedroom">
                                <select class="form-control" name="bedroom" id="property_bed">
                                    <option value="All" selected>Bedrooms</option>
                                    <? foreach ($proBed as $value) { ?>
                                        <option value="<?= $value; ?>"><?= $value; ?></option>
                                    <? } ?>
                                </select>
                            </div>
                            <div class="col-lg-2 my-1">
                                <input type="text" placeholder="Reference id" class="form-control" name="referenceID">
                            </div>
                            <div class="col-lg-1 justify-content-center my-1">
                                <input type="submit" class="btn red-button btn-block" value="SEARCH">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section id="PRIME-Property-Turkey" class="PRIME-Property-Turkey m-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="mt-md-4 mt-2">
                        <span class="red-text font-weight-bold">
                            PRIME
                        </span>
                        <span class="blue-text font-weight-bold">
                            Property Turkey
                        </span>
                    </h1>
                    <p id="slogan" class="mt-2 font-italic">
                        " Do It The Right Way "
                    </p>
                    <p class="text-justify mx-md-5 px-md-5 my-md-5 my-1 py-1">
                        Prime Property Turkey was created to meet an ever-growing need for a Turkish real estate company
                        to simply do things the right way. As Prime Property Turkey, we strive for the utmost
                        transparency and communication throughout the purchase and after-sales process of property,
                        ensuring our clients have been taken care of to the level they deserve. The real estate decision
                        is a difficult one, no matter where you are in the world. Our expertise and knowledge in the
                        Turkish market will ensure each purchase, whether for holiday, full-time, or investment will be
                        protected and valued. We here at Prime Property Turkey, strive to "do it the right way" every
                        time we speak, meet, and buy .
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section id="Recommended-Properties" class="Recommended-Properties py-3 py-md-5">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <h2 class="text-center font-weight-bold my-3 blue-text px-3">
                    Recommended Turkish Properties
                </h2>
            </div>
            <div class="row my-5 justify-content-center align-items-center">
                <a class="btn btn-outline-danger mx-1 my-1" onclick="show_recommended('all')" id="btn_all"
                   rel="nofollow">
                    All
                </a>
                <a class="btn btn-outline-danger mx-1 my-1" onclick="show_recommended('istanbul')" id="btn_ist"
                   rel="nofollow">
                    Istanbul
                </a>
                <a class="btn btn-outline-danger mx-1 my-1" onclick="show_recommended('kalkan')" id="btn_kal"
                   rel="nofollow">
                    Kalkan
                </a>
                <a class="btn btn-outline-danger mx-1 my-1" onclick="show_recommended('fethiye')" id="btn_feth"
                   rel="nofollow">
                    Fethiye
                </a>
                <a class="btn btn-outline-danger mx-1 my-1" onclick="show_recommended('kas')" id="btn_kas"
                   rel="nofollow">
                    Kas
                </a>
                <a class="btn btn-outline-danger mx-1 my-1" onclick="show_recommended('gocek')" id="btn_goc"
                   rel="nofollow">
                    Gocek
                </a>
            </div>
            <div id="all_recommended">
                <div class="row justify-content-center">
                    <div class="col-11">
                        <div class="recommended-owl owl-carousel owl-theme">
                            <? foreach ($recommended_properties_all as $city) { ?>
                                <? $image_name = str_replace('assets/thumbnail/', '', $city->Property_thumbnail);
                                $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpg')) . ".webp";
                                if ($image_name_webp == '') {
                                    $image_name_webp = substr($image_name, 0, strpos($image_name, '.png')) . ".webp";
                                }
                                if ($image_name_webp == '') {
                                    $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpeg')) . ".webp";
                                }
                                ?>
                                <div class="item">
                                    <div class="card">
                                        <a href="<?= base_url(); ?>properties/<?= $city->url_slug; ?>">
                                            <img class="card-img-top img-fluid"
                                                 src="<?= base_url(); ?><?= "assets/web-site/images/properties/P_Thumb/" . $image_name_webp; ?>"
                                                 alt="<?= $city->Property_title; ?>"
                                                 title="<?= $city->Property_title; ?>">
                                        </a>
                                        <div class="card-body">
                                            <div class="container-fluid">
                                                <div class="card-title text-center">
                                            <span class="card-type-badge">
                                                 <?= $city->Property_type; ?>
                                            </span>
                                                    <span class="card-favorite">
                                                <? if (is_favored($city->Property_id)) { ?>
                                                    <a href="<?= base_url(); ?>Favorite/del_favorite/<?= $city->Property_id; ?>"
                                                       class="red-text" rel="nofollow">
                                                        <i class="fas fa-heart red-text"></i>
                                                    </a>
                                                <? } else { ?>
                                                    <a href="<?= base_url(); ?>Favorite/set_favorite/<?= $city->Property_id; ?>"
                                                       class="text-reset" rel="nofollow">
                                                        <i class="far fa-heart"></i>
                                                    </a>
                                                <? } ?>
                                           </span>
                                                    <div id="item-card-title">
                                                        <a href="<?= base_url(); ?>properties/<?= $city->url_slug; ?>"
                                                           class="text-reset font-weight-bold blue-text">
                                                            <?= $city->Property_title; ?>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row my-2 justify-content-around align-items-center"
                                                     id="card-speciality">
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico2.webp"
                                                             alt=""
                                                             class="img-fluid">
                                                        <span class="mx-1"><?= $city->Property_location; ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center ">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico3.webp"
                                                             alt=""
                                                             class="img-fluid">
                                                        <span class="mx-1"><?= $city->Property_Bedrooms; ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico4.webp"
                                                             alt=""
                                                             class="img-fluid">
                                                        <span class="mx-1"><?= $city->Property_Bathrooms; ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico1.webp"
                                                             alt="" class="img-fluid"
                                                        >
                                                        <span class="mx-1"><?= $city->Property_living_space; ?></span>
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <p class="text-justify item-card-description">
                                                        <?= substr(strip_tags($city->Property_overview), 0, 100) . "...."; ?>
                                                    </p>
                                                </div>
                                                <div class="row justify-content-around align-items-center mx-1"
                                                     style="font-size: 1.2rem">
                                             <span class="red-text font-weight-bold">
                                               <? if (!$city->SoldOut and $city->Property_price != 0) { ?>
                                                   <? if ($this->session->has_userdata('currency')) {
                                                       switch ($this->session->userdata('currency')) {
                                                           case 'USD': ?>
                                                               <i class="fas fa-dollar-sign"></i>
                                                               <?= number_format($city->Property_price); ?>
                                                               <?
                                                               break;
                                                           case 'TRY': ?>
                                                               <i class="fas fa-lira-sign"></i>
                                                               <?= number_format($city->Property_price * $currency_exchange_data->try); ?>

                                                               <?
                                                               break;
                                                           case 'EUR': ?>
                                                               <i class="fas fa-euro-sign"></i>
                                                               <?= number_format($city->Property_price * $currency_exchange_data->euro); ?>
                                                               <?
                                                               break;
                                                           case 'GBP': ?>
                                                               <i class="fas fa-pound-sign"></i>
                                                               <?= number_format($city->Property_price * $currency_exchange_data->gpt); ?>
                                                               <?
                                                               break;
                                                       }
                                                   } else { ?>
                                                       <i class="fas fa-dollar-sign"></i>
                                                       <?= number_format($city->Property_price); ?>
                                                   <? }
                                               } else { ?>
                                                   Contact US
                                               <? } ?>
                                            </span>
                                                    <a class="btn btn-danger d-flex font-weight-bold btn-sm"
                                                       data-toggle="modal"
                                                       data-whatever="<?= $city->Property_referenceID; ?>"
                                                       data-target="#quickEnquireModal" rel="nofollow">
                                                        Quick Enquiry
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
            <div id="istanbul_recommended" style="display: none;">
                <div class="row justify-content-center">
                    <div class="col-11">
                        <div class="recommended-owl owl-carousel owl-theme">
                            <? foreach ($recommended_properties['istanbul'] as $city) { ?>
                                <? $image_name = str_replace('assets/thumbnail/', '', $city->Property_thumbnail);
                                $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpg')) . ".webp";
                                if ($image_name_webp == '') {
                                    $image_name_webp = substr($image_name, 0, strpos($image_name, '.png')) . ".webp";
                                }
                                if ($image_name_webp == '') {
                                    $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpeg')) . ".webp";
                                }
                                ?>
                                <div class="item">
                                    <div class="card">
                                        <a href="<?= base_url(); ?>properties/<?= $city->url_slug; ?>">

                                            <img class="card-img-top img-fluid" title="<?= $city->Property_title; ?>"
                                                 src="<?= base_url(); ?><?= "assets/web-site/images/properties/P_Thumb/" . $image_name_webp; ?>"
                                                 alt="<?= $city->Property_title; ?>"
                                            >
                                        </a>
                                        <div class="card-body">
                                            <div class="container-fluid">
                                                <div class="card-title text-center">
                                            <span class="card-type-badge">
                                                 <?= $city->Property_type; ?>

                                            </span>
                                                    <span class="card-favorite">
                                                <? if (is_favored($city->Property_id)) { ?>
                                                    <a href="<?= base_url(); ?>Favorite/del_favorite/<?= $city->Property_id; ?>"
                                                       class="red-text" rel="nofollow">
                                                        <i class="fas fa-heart red-text"></i>
                                                    </a>
                                                <? } else { ?>
                                                    <a href="<?= base_url(); ?>Favorite/set_favorite/<?= $city->Property_id; ?>"
                                                       class="text-reset" rel="nofollow">
                                                        <i class="far fa-heart"></i>
                                                    </a>
                                                <? } ?>
                                           </span>
                                                    <div id="item-card-title">
                                                        <a href="<?= base_url(); ?>properties/<?= $city->url_slug; ?>"
                                                           class="text-reset font-weight-bold">
                                                            <?= $city->Property_title; ?>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row my-2 justify-content-around align-items-center"
                                                     id="card-speciality">
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico2.webp"
                                                             alt=""
                                                             class="img-fluid">
                                                        <span class="mx-1"><?= $city->Property_location; ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center ">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico3.webp"
                                                             alt=""
                                                             class="img-fluid">
                                                        <span class="mx-1"><?= $city->Property_Bedrooms; ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico4.webp"
                                                             alt=""
                                                             class="img-fluid">
                                                        <span class="mx-1"><?= $city->Property_Bathrooms; ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico1.webp"
                                                             alt="" class="img-fluid"
                                                        >
                                                        <span class="mx-1"><?= $city->Property_living_space; ?></span>
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <p class="text-justify item-card-description">
                                                        <?= substr(strip_tags($city->Property_overview), 0, 100) . "...."; ?>
                                                    </p>
                                                </div>
                                                <div class="row justify-content-around align-items-center mx-1"
                                                     style="font-size: 1.2rem">
                                             <span class="red-text font-weight-bold">
                                                <? if (!$city->SoldOut and $city->Property_price != 0) { ?>
                                                    <? if ($this->session->has_userdata('currency')) {
                                                        switch ($this->session->userdata('currency')) {
                                                            case 'USD': ?>
                                                                <i class="fas fa-dollar-sign"></i>
                                                                <?= number_format($city->Property_price); ?>
                                                                <?
                                                                break;
                                                            case 'TRY': ?>
                                                                <i class="fas fa-lira-sign"></i>
                                                                <?= number_format($city->Property_price * $currency_exchange_data->try); ?>

                                                                <?
                                                                break;
                                                            case 'EUR': ?>
                                                                <i class="fas fa-euro-sign"></i>
                                                                <?= number_format($city->Property_price * $currency_exchange_data->euro); ?>
                                                                <?
                                                                break;
                                                            case 'GBP': ?>
                                                                <i class="fas fa-pound-sign"></i>
                                                                <?= number_format($city->Property_price * $currency_exchange_data->gpt); ?>
                                                                <?
                                                                break;
                                                        }
                                                    } else { ?>
                                                        <i class="fas fa-dollar-sign"></i>
                                                        <?= number_format($city->Property_price); ?>
                                                    <? }
                                                } else { ?>
                                                    Contact US
                                                <? } ?>
                                            </span>
                                                    <a class="btn btn-danger btn-sm d-flex font-weight-bold"
                                                       data-toggle="modal"
                                                       data-whatever="<?= $city->Property_referenceID; ?>"
                                                       data-target="#quickEnquireModal" rel="nofollow">
                                                        Quick Enquiry
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
            <div id="fethiye_recommended" style="display: none;">
                <div class="row justify-content-center">
                    <div class="col-11">
                        <div class="recommended-owl owl-carousel owl-theme">
                            <? foreach ($recommended_properties['fethiye'] as $city) { ?>
                                <? $image_name = str_replace('assets/thumbnail/', '', $city->Property_thumbnail);
                                $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpg')) . ".webp";
                                if ($image_name_webp == '') {
                                    $image_name_webp = substr($image_name, 0, strpos($image_name, '.png')) . ".webp";
                                }
                                if ($image_name_webp == '') {
                                    $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpeg')) . ".webp";
                                }
                                ?>
                                <div class="item">
                                    <div class="card">
                                        <a href="<?= base_url(); ?>properties/<?= $city->url_slug; ?>">

                                            <img class="card-img-top img-fluid" title="<?= $city->Property_title; ?>"
                                                 src="<?= base_url(); ?><?= "assets/web-site/images/properties/P_Thumb/" . $image_name_webp; ?>"
                                                 alt="<?= $city->Property_title; ?>"
                                            >
                                        </a>
                                        <div class="card-body">
                                            <div class="container-fluid">
                                                <div class="card-title text-center">
                                            <span class="card-type-badge">
                                                 <?= $city->Property_type; ?>

                                            </span>
                                                    <span class="card-favorite">
                                                <? if (is_favored($city->Property_id)) { ?>
                                                    <a href="<?= base_url(); ?>Favorite/del_favorite/<?= $city->Property_id; ?>"
                                                       class="red-text" rel="nofollow">
                                                        <i class="fas fa-heart red-text"></i>
                                                    </a>
                                                <? } else { ?>
                                                    <a href="<?= base_url(); ?>Favorite/set_favorite/<?= $city->Property_id; ?>"
                                                       class="text-reset" rel="nofollow">
                                                        <i class="far fa-heart"></i>
                                                    </a>
                                                <? } ?>
                                           </span>
                                                    <div id="item-card-title">
                                                        <a href="<?= base_url(); ?>properties/<?= $city->url_slug; ?>"
                                                           class="text-reset font-weight-bold">
                                                            <?= $city->Property_title; ?>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row my-2 justify-content-around align-items-center"
                                                     id="card-speciality">
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico2.webp"
                                                             alt=""
                                                             class="img-fluid">
                                                        <span class="mx-1"><?= $city->Property_location; ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center ">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico3.webp"
                                                             alt=""
                                                             class="img-fluid">
                                                        <span class="mx-1"><?= $city->Property_Bedrooms; ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico4.webp"
                                                             alt=""
                                                             class="img-fluid">
                                                        <span class="mx-1"><?= $city->Property_Bathrooms; ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico1.webp"
                                                             alt="" class="img-fluid"
                                                        >
                                                        <span class="mx-1"><?= $city->Property_living_space; ?></span>
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <p class="text-justify item-card-description">
                                                        <?= substr(strip_tags($city->Property_overview), 0, 100) . "...."; ?>
                                                    </p>
                                                </div>
                                                <div class="row justify-content-around align-items-center mx-1"
                                                     style="font-size: 1.2rem">
                                             <span class="red-text font-weight-bold">
                                                <? if (!$city->SoldOut and $city->Property_price != 0) { ?>
                                                    <? if ($this->session->has_userdata('currency')) {
                                                        switch ($this->session->userdata('currency')) {
                                                            case 'USD': ?>
                                                                <i class="fas fa-dollar-sign"></i>
                                                                <?= number_format($city->Property_price); ?>
                                                                <?
                                                                break;
                                                            case 'TRY': ?>
                                                                <i class="fas fa-lira-sign"></i>
                                                                <?= number_format($city->Property_price * $currency_exchange_data->try); ?>

                                                                <?
                                                                break;
                                                            case 'EUR': ?>
                                                                <i class="fas fa-euro-sign"></i>
                                                                <?= number_format($city->Property_price * $currency_exchange_data->euro); ?>
                                                                <?
                                                                break;
                                                            case 'GBP': ?>
                                                                <i class="fas fa-pound-sign"></i>
                                                                <?= number_format($city->Property_price * $currency_exchange_data->gpt); ?>
                                                                <?
                                                                break;
                                                        }
                                                    } else { ?>
                                                        <i class="fas fa-dollar-sign"></i>
                                                        <?= number_format($city->Property_price); ?>
                                                    <? }
                                                } else { ?>
                                                    Contact US
                                                <? } ?>
                                            </span>
                                                    <a class="btn btn-danger btn-sm d-flex font-weight-bold"
                                                       data-toggle="modal"
                                                       data-whatever="<?= $city->Property_referenceID; ?>"
                                                       data-target="#quickEnquireModal" rel="nofollow">
                                                        Quick Enquiry
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
            <div id="kas_recommended" style="display: none;">
                <div class="row justify-content-center">
                    <div class="col-11">
                        <div class="recommended-owl owl-carousel owl-theme">
                            <? foreach ($recommended_properties['kas'] as $city) { ?>
                                <? $image_name = str_replace('assets/thumbnail/', '', $city->Property_thumbnail);
                                $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpg')) . ".webp";
                                if ($image_name_webp == '') {
                                    $image_name_webp = substr($image_name, 0, strpos($image_name, '.png')) . ".webp";
                                }
                                if ($image_name_webp == '') {
                                    $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpeg')) . ".webp";
                                }
                                ?>
                                <div class="item">
                                    <div class="card">
                                        <img class="card-img-top img-fluid" title="<?= $city->Property_title; ?>"
                                             src="<?= base_url(); ?><?= "assets/web-site/images/properties/P_Thumb/" . $image_name_webp; ?>"
                                             alt="<?= $city->Property_title; ?>"
                                        >
                                        <div class="card-body">
                                            <div class="container-fluid">
                                                <div class="card-title text-center">
                                            <span class="card-type-badge">
                                                 <?= $city->Property_type; ?>

                                            </span>
                                                    <span class="card-favorite">
                                                <? if (is_favored($city->Property_id)) { ?>
                                                    <a href="<?= base_url(); ?>Favorite/del_favorite/<?= $city->Property_id; ?>"
                                                       class="red-text" rel="nofollow">
                                                        <i class="fas fa-heart red-text"></i>
                                                    </a>
                                                <? } else { ?>
                                                    <a href="<?= base_url(); ?>Favorite/set_favorite/<?= $city->Property_id; ?>"
                                                       class="text-reset" rel="nofollow">
                                                        <i class="far fa-heart"></i>
                                                    </a>
                                                <? } ?>
                                           </span>
                                                    <div id="item-card-title">
                                                        <a href="<?= base_url(); ?>properties/<?= $city->url_slug; ?>"
                                                           class="text-reset font-weight-bold">
                                                            <?= $city->Property_title; ?>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row my-2 justify-content-around align-items-center"
                                                     id="card-speciality">
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico2.webp"
                                                             alt=""
                                                             class="img-fluid">
                                                        <span class="mx-1"><?= $city->Property_location; ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center ">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico3.webp"
                                                             alt=""
                                                             class="img-fluid">
                                                        <span class="mx-1"><?= $city->Property_Bedrooms; ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico4.webp"
                                                             alt=""
                                                             class="img-fluid">
                                                        <span class="mx-1"><?= $city->Property_Bathrooms; ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico1.webp"
                                                             alt="" class="img-fluid"
                                                        >
                                                        <span class="mx-1"><?= $city->Property_living_space; ?></span>
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <p class="text-justify item-card-description">
                                                        <?= substr(strip_tags($city->Property_overview), 0, 100) . "...."; ?>
                                                    </p>
                                                </div>
                                                <div class="row justify-content-around align-items-center mx-1"
                                                     style="font-size: 1.2rem">
                                             <span class="red-text font-weight-bold">
                                            <? if (!$city->SoldOut and $city->Property_price != 0) { ?>
                                                <? if ($this->session->has_userdata('currency')) {
                                                    switch ($this->session->userdata('currency')) {
                                                        case 'USD': ?>
                                                            <i class="fas fa-dollar-sign"></i>
                                                            <?= number_format($city->Property_price); ?>
                                                            <?
                                                            break;
                                                        case 'TRY': ?>
                                                            <i class="fas fa-lira-sign"></i>
                                                            <?= number_format($city->Property_price * $currency_exchange_data->try); ?>

                                                            <?
                                                            break;
                                                        case 'EUR': ?>
                                                            <i class="fas fa-euro-sign"></i>
                                                            <?= number_format($city->Property_price * $currency_exchange_data->euro); ?>
                                                            <?
                                                            break;
                                                        case 'GBP': ?>
                                                            <i class="fas fa-pound-sign"></i>
                                                            <?= number_format($city->Property_price * $currency_exchange_data->gpt); ?>
                                                            <?
                                                            break;
                                                    }
                                                } else { ?>
                                                    <i class="fas fa-dollar-sign"></i>
                                                    <?= number_format($city->Property_price); ?>
                                                <? }
                                            } else { ?>
                                                Contact US
                                            <? } ?>
                                            </span>
                                                    <a class="btn btn-danger btn-sm d-flex font-weight-bold"
                                                       data-toggle="modal"
                                                       data-whatever="<?= $city->Property_referenceID; ?>"
                                                       data-target="#quickEnquireModal" rel="nofollow">
                                                        Quick Enquiry
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
            <div id="kalkan_recommended" style="display: none;">
                <div class="row justify-content-center">
                    <div class="col-11">
                        <div class="recommended-owl owl-carousel owl-theme">
                            <? foreach ($recommended_properties['kalkan'] as $city) { ?>
                                <? $image_name = str_replace('assets/thumbnail/', '', $city->Property_thumbnail);
                                $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpg')) . ".webp";
                                if ($image_name_webp == '') {
                                    $image_name_webp = substr($image_name, 0, strpos($image_name, '.png')) . ".webp";
                                }
                                if ($image_name_webp == '') {
                                    $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpeg')) . ".webp";
                                }
                                ?>
                                <div class="item">
                                    <div class="card">
                                        <a href="<?= base_url(); ?>properties/<?= $city->url_slug; ?>">

                                            <img class="card-img-top img-fluid" title="<?= $city->Property_title; ?>"
                                                 src="<?= base_url(); ?><?= "assets/web-site/images/properties/P_Thumb/" . $image_name_webp; ?>"
                                                 alt="<?= $city->Property_title; ?>"
                                            >
                                        </a>
                                        <div class="card-body">
                                            <div class="container-fluid">
                                                <div class="card-title text-center">
                                            <span class="card-type-badge">
                                                 <?= $city->Property_type; ?>

                                            </span>
                                                    <span class="card-favorite">
                                                <? if (is_favored($city->Property_id)) { ?>
                                                    <a href="<?= base_url(); ?>Favorite/del_favorite/<?= $city->Property_id; ?>"
                                                       class="red-text" rel="nofollow">
                                                        <i class="fas fa-heart red-text"></i>
                                                    </a>
                                                <? } else { ?>
                                                    <a href="<?= base_url(); ?>Favorite/set_favorite/<?= $city->Property_id; ?>"
                                                       class="text-reset" rel="nofollow">
                                                        <i class="far fa-heart"></i>
                                                    </a>
                                                <? } ?>
                                           </span>
                                                    <div id="item-card-title">
                                                        <a href="<?= base_url(); ?>properties/<?= $city->url_slug; ?>"
                                                           class="text-reset font-weight-bold">
                                                            <?= $city->Property_title; ?>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row my-2 justify-content-around align-items-center"
                                                     id="card-speciality">
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico2.webp"
                                                             alt=""
                                                             class="img-fluid">
                                                        <span class="mx-1"><?= $city->Property_location; ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center ">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico3.webp"
                                                             alt=""
                                                             class="img-fluid">
                                                        <span class="mx-1"><?= $city->Property_Bedrooms; ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico4.webp"
                                                             alt=""
                                                             class="img-fluid">
                                                        <span class="mx-1"><?= $city->Property_Bathrooms; ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico1.webp"
                                                             alt="" class="img-fluid"
                                                        >
                                                        <span class="mx-1"><?= $city->Property_living_space; ?></span>
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <p class="text-justify item-card-description">
                                                        <?= substr(strip_tags($city->Property_overview), 0, 100) . "...."; ?>
                                                    </p>
                                                </div>
                                                <div class="row justify-content-around align-items-center mx-1"
                                                     style="font-size: 1.2rem">
                                             <span class="red-text font-weight-bold">
                                                <? if (!$city->SoldOut and $city->Property_price != 0) { ?>
                                                    <? if ($this->session->has_userdata('currency')) {
                                                        switch ($this->session->userdata('currency')) {
                                                            case 'USD': ?>
                                                                <i class="fas fa-dollar-sign"></i>
                                                                <?= number_format($city->Property_price); ?>
                                                                <?
                                                                break;
                                                            case 'TRY': ?>
                                                                <i class="fas fa-lira-sign"></i>
                                                                <?= number_format($city->Property_price * $currency_exchange_data->try); ?>

                                                                <?
                                                                break;
                                                            case 'EUR': ?>
                                                                <i class="fas fa-euro-sign"></i>
                                                                <?= number_format($city->Property_price * $currency_exchange_data->euro); ?>
                                                                <?
                                                                break;
                                                            case 'GBP': ?>
                                                                <i class="fas fa-pound-sign"></i>
                                                                <?= number_format($city->Property_price * $currency_exchange_data->gpt); ?>
                                                                <?
                                                                break;
                                                        }
                                                    } else { ?>
                                                        <i class="fas fa-dollar-sign"></i>
                                                        <?= number_format($city->Property_price); ?>
                                                    <? }
                                                } else { ?>
                                                    Contact US
                                                <? } ?>
                                            </span>
                                                    <a class="btn btn-danger btn-sm d-flex font-weight-bold"
                                                       data-toggle="modal"
                                                       data-whatever="<?= $city->Property_referenceID; ?>"
                                                       data-target="#quickEnquireModal" rel="nofollow">
                                                        Quick Enquiry
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
            <div id="gocek_recommended" style="display: none;">
                <div class="row justify-content-center">
                    <div class="col-11">
                        <div class="recommended-owl owl-carousel owl-theme">
                            <? foreach ($recommended_properties['gocek'] as $city) { ?>
                                <? $image_name = str_replace('assets/thumbnail/', '', $city->Property_thumbnail);
                                $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpg')) . ".webp";
                                if ($image_name_webp == '') {
                                    $image_name_webp = substr($image_name, 0, strpos($image_name, '.png')) . ".webp";
                                }
                                if ($image_name_webp == '') {
                                    $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpeg')) . ".webp";
                                }
                                ?>
                                <div class="item">
                                    <div class="card">
                                        <a href="<?= base_url(); ?>properties/<?= $city->url_slug; ?>">
                                            <img class="card-img-top img-fluid" title="<?= $city->Property_title; ?>"
                                                 src="<?= base_url(); ?><?= "assets/web-site/images/properties/P_Thumb/" . $image_name_webp; ?>"
                                                 alt="<?= $city->Property_title; ?>"
                                            >
                                        </a>
                                        <div class="card-body">
                                            <div class="container-fluid">
                                                <div class="card-title text-center">
                                            <span class="card-type-badge">
                                                 <?= $city->Property_type; ?>

                                            </span>
                                                    <span class="card-favorite">
                                                <? if (is_favored($city->Property_id)) { ?>
                                                    <a href="<?= base_url(); ?>Favorite/del_favorite/<?= $city->Property_id; ?>"
                                                       class="red-text" rel="nofollow">
                                                        <i class="fas fa-heart red-text"></i>
                                                    </a>
                                                <? } else { ?>
                                                    <a href="<?= base_url(); ?>Favorite/set_favorite/<?= $city->Property_id; ?>"
                                                       class="text-reset" rel="nofollow">
                                                        <i class="far fa-heart"></i>
                                                    </a>
                                                <? } ?>
                                           </span>
                                                    <div id="item-card-title">
                                                        <a href="<?= base_url(); ?>properties/<?= $city->url_slug; ?>"
                                                           class="text-reset font-weight-bold">
                                                            <?= $city->Property_title; ?>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row my-2 justify-content-around align-items-center"
                                                     id="card-speciality">
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico2.webp"
                                                             alt=""
                                                             class="img-fluid">
                                                        <span class="mx-1"><?= $city->Property_location; ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center ">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico3.webp"
                                                             alt=""
                                                             class="img-fluid">
                                                        <span class="mx-1"><?= $city->Property_Bedrooms; ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico4.webp"
                                                             alt=""
                                                             class="img-fluid">
                                                        <span class="mx-1"><?= $city->Property_Bathrooms; ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico1.webp"
                                                             alt="" class="img-fluid"
                                                        >
                                                        <span class="mx-1"><?= $city->Property_living_space; ?></span>
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <p class="text-justify item-card-description">
                                                        <?= substr(strip_tags($city->Property_overview), 0, 100) . "...."; ?>
                                                    </p>
                                                </div>
                                                <div class="row justify-content-around align-items-center mx-1"
                                                     style="font-size: 1.2rem">
                                             <span class="red-text font-weight-bold">
                                                    <? if (!$city->SoldOut and $city->Property_price != 0) { ?>
                                                        <? if ($this->session->has_userdata('currency')) {
                                                            switch ($this->session->userdata('currency')) {
                                                                case 'USD': ?>
                                                                    <i class="fas fa-dollar-sign"></i>
                                                                    <?= number_format($city->Property_price); ?>
                                                                    <?
                                                                    break;
                                                                case 'TRY': ?>
                                                                    <i class="fas fa-lira-sign"></i>
                                                                    <?= number_format($city->Property_price * $currency_exchange_data->try); ?>

                                                                    <?
                                                                    break;
                                                                case 'EUR': ?>
                                                                    <i class="fas fa-euro-sign"></i>
                                                                    <?= number_format($city->Property_price * $currency_exchange_data->euro); ?>
                                                                    <?
                                                                    break;
                                                                case 'GBP': ?>
                                                                    <i class="fas fa-pound-sign"></i>
                                                                    <?= number_format($city->Property_price * $currency_exchange_data->gpt); ?>
                                                                    <?
                                                                    break;
                                                            }
                                                        } else { ?>
                                                            <i class="fas fa-dollar-sign"></i>
                                                            <?= number_format($city->Property_price); ?>
                                                        <? }
                                                    } else { ?>
                                                        Contact US
                                                    <? } ?>
                                            </span>
                                                    <a class="btn btn-danger btn-sm d-flex font-weight-bold"
                                                       data-toggle="modal"
                                                       data-whatever="<?= $city->Property_referenceID; ?>"
                                                       data-target="#quickEnquireModal" rel="nofollow">
                                                        Quick Enquiry
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
        </div>
    </section>
    <section id="Turkish-Citizenship" class="Turkish-Citizenship">
        <div class="container-fluid py-md-5">
            <div class="row py-2 py-md-5">
                <div class="col-md-8 text-center">
                    <h3 class="mx-md-5 px-md-5 mx-1 px-1 my-1 py-1 text-center">
                            <span class="font-weight-bold">
                                Turkish Citizenship
                            </span>
                        <span>
                             by Investment Programme
                        </span>
                    </h3>

                    <!--                    <div class="m-1 text-center text-danger" style="font-size: 1.5rem;"> Update! <span class="strikediag withpadding">$250.000</span> <i class="fas fa-arrow-alt-right"></i>  $400.000 <span style="font-size: 1.1rem"> (Changes to be implemented soon)</span> </div>-->
                    <div class="m-1 mx-md-5 text-center text-danger" style="font-size: 1.5rem;">Acquire Real estate
                        Investment worth at least $400.000 and get the benefit of obtaining the Turkish Citizenship
                    </div>
                    <!--                    <div class="m-1 text-center text-danger" style="font-size: 1.3rem;"> Buy Now and take Advantage of Present Rule before its too late.</div>-->
                    <!--                    <div class="m-1 text-center text-danger" id="blow" style="font-size: 1.3rem;" > Contact Us Today </div>-->
                    <p class="mx-1 px-1 mx-md-5 px-md-5 my-md-3 my-2 py-2 text-justify">
                        Turkish Citizenship is an advantageous option for those looking to invest $400K or more in
                        Turkey. Rather investing or buying your dream home along Turkey's Turquoise Coast, the
                        Citizenship by Investment program allows you the flexibility to build your life as a Turkish
                        Citizen. Additionally, you can take advantage of the countries medical and education services
                        all for free as a Turkish Citizen. Contact us today to find out how you can be apart of Turkey's
                        future.
                    </p>
                    <a href="<?= base_url(); ?>citizenship-by-investment-in-turkey" class="btn red-button mb-1 mt-md-3"> READ MORE </a>
                </div>
                <div class="col-md-4 text-center d-flex">
                    <img src="<?= base_url(); ?>assets/web-site/images/base/masters/PASSAPORT.webp"
                         alt="prime property turkey passport" class="img-fluid" title="prime property turkey passport">
                </div>
            </div>
        </div>
    </section>
    <section class="YouTubeVideos" id="YouTubeVideos">
        <div class="container-fluid my-3 ">
            <div class="row justify-content-center">
                <h4 class="text-center blue-text font-weight-bold">
                    YouTube - Prime Videos
                </h4>
            </div>
            <div class="row mt-3 mt-md-5 justify-content-around">
                <div class="col-11">
                    <div class="youtube-owl owl-carousel owl-theme">
                        <? foreach ($YoutubeVideos as $Video) { ?>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="<?= base_url();?>prime-videos/<?= $Video->url_slug;?>" title="<?= strip_tags($Video->description); ?>">
                                            <img src="<?= base_url();?>assets/web-site/images/youtube-cover/<?= $Video->cover_image;?>" alt="<?= $Video->title;?>">
                                            <i class="fas fa-play-circle"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <? } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-md-2 mt-md-2" id="testimonials" style="padding-top: 50px">
        <div class="container py-md-2 my-md-2">
            <div class="row">
                <div class="col-md-4 text-white text-center"
                     style="background-image: linear-gradient(90deg, #3a5cc4,#092976);height: 60px">
                    <div class="testimonial-header h5">
                        FROM OUR CLIENTS
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" style="margin-top: -15px">
                <div id="testimonialsCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-block w-100 px-2" style="min-height: 285px">
                                <div class="row justify-content-around pt-5 mt-3 mx-3 align-items-center">
                                    <div class="col-md-10">
                                        <div class="testimonial-title">
                                            <span class="mx-1"><i
                                                        class="fas fa-quote-left fa-3x text-danger"></i></span><span
                                                    style="font-size: 1.5rem;font-weight: 600; ">Helpful, trustworthy, and objective in their advice ...</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <div class="testimonial-stars text-warning">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                    class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                    class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-around pt-3 pb-2 ml-md-5 mx-md-3 mr-1 align-items-center">
                                    <div class="col">
                                        <p class="text-justify mx-1 ml-4 font-italic">
                                            I used Prime Property Turkey to look for residential investment options in
                                            Istanbul and found them very informed, helpful, trustworthy and objective in
                                            their advice on various options across the city. I have dealt with them for
                                            over 6 months on a sustained basis and my opinion of their professionalism
                                            remains the same. If you are looking at Turkey for real estate, I would
                                            recommend Prime Property to help you navigate the ecosystem.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end py-2 align-items-center text-right mx-2 mb-3 mr-4">
                                <div class="col-md-4">
                                    <div class="row  align-items-center">
                                        <div class="col-8">
                                            <div class="row">
                                                <div class="col font-weight-bold">
                                                    Todd Romaine
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    Canada
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <img src="<?= base_url(); ?>assets/web-site/images/base/masters/a2.webp"
                                                 alt="Canada's buy porperty in turkey" class="img-fluid"
                                                 title="Canada's buy porperty in turkey">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <div class="d-block w-100 px-2" style="min-height: 285px">
                                <div class="row justify-content-around pt-5 mt-3 mx-3 align-items-center">
                                    <div class="col-md-10">
                                        <div class="testimonial-title">
                                            <span class="mx-1"><i
                                                        class="fas fa-quote-left fa-3x text-danger"></i></span><span
                                                    style="font-size: 1.5rem;font-weight: 900 ">Seamlessly smooth property investment experience ...</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <div class="testimonial-stars text-warning">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                    class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                    class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-around pt-3 pb-2 ml-md-5 mx-md-3 mr-1 align-items-center">
                                    <div class="col">
                                        <p class="text-justify mx-1 ml-4 font-italic">
                                            Prime Property has provided us a seamlessly smooth property investment
                                            experience. From the time we were exploring options to the actual sale,
                                            Omran took care of everything. We were properly guided about all the
                                            paperwork that was needed to ensure efficient processing of our citizenship
                                            application. They gave us a range of options and showed us properties that
                                            met our criteria and other similar ones for comparison. We never expected
                                            such personalised and professional service, even "after sale" attentiveness,
                                            including connecting us with an I terror designer. I highly recommend Prime
                                            Property to any foreign investor who is looking to invest wisely in Turkey.

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end py-2 align-items-center text-right mx-2 mb-3 mr-4">
                                <div class="col-md-4">
                                    <div class="row  align-items-center">
                                        <div class="col-8">
                                            <div class="row">
                                                <div class="col font-weight-bold">
                                                    Sofia Shakil
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    Pakistan
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <img src="<?= base_url(); ?>assets/web-site/images/base/masters/a1.webp"
                                                 alt="Pakistan's buy porperty in turkey" class="img-fluid"
                                                 title="Pakistan's buy porperty in turkey">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <div class="d-block w-100 px-2" style="min-height: 285px">
                                <div class="row justify-content-around pt-5 mt-3 mx-3 align-items-center">
                                    <div class="col-md-10">
                                        <div class="testimonial-title">
                                            <span class="mx-1"><i
                                                        class="fas fa-quote-left fa-3x text-danger"></i></span><span
                                                    style="font-size: 1.5rem;font-weight: 900 ">I was lucky to come across the Prime Property agency ...</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-right">
                                        <div class="testimonial-stars text-warning">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                    class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                    class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-around pt-3 pb-2 ml-md-5 mx-md-3 mr-1 align-items-center">
                                    <div class="col">
                                        <p class="text-justify mx-1 ml-4 font-italic">
                                            I was lucky to come across the Prime Property agency, they made my search
                                            for an apartment much easier. I would recommend everyone to work with this
                                            agency. They are great professionals, they have shown me every kind of help
                                            and they are friendly in every way. I would recommend this agency to
                                            everyone. Thanks to this agency, I was able to find the apartment I had been
                                            looking for for a long time.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end py-2 align-items-center text-right mx-2 mb-3 mr-4">
                                <div class="col-md-4">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <div class="row">
                                                <div class="col font-weight-bold">
                                                    Alma Hajdarpasic
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    Bosnia
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 ">
                                            <img src="<?= base_url(); ?>assets/web-site/images/base/masters/a3.webp"
                                                 alt="Bosnia's buy porperty in turkey" class="img-fluid"
                                                 title="Bosnia's buy porperty in turkey">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-2">
                <div class="col">
                    <ol class="carousel-indicators">
                        <li data-target="#testimonialsCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#testimonialsCarousel" data-slide-to="1"></li>
                        <li data-target="#testimonialsCarousel" data-slide-to="2"></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="BuyingOnline" id="BuyingOnline">
        <div class="container pb-3 ">
            <div class="row px-md-3 justify-content-around" style="border-radius: 20px;background-color: white;">
                <div class="col-md-7 text-center py-2">
                    <h3 class="font-weight-bold mt-3 text-center">
                        <span class="red-text" style="font-weight: 900">
                            Buying Property in Turkey Online
                        </span>
                    </h3>
                    <p class="text-justify py-2">
                        In the twenty-first century where the internet provides us with direct access, purchasing a
                        property overseas and becoming a property owner has become much easier. Prime Property Turkey is
                        ready and honored to provide you with virtual real estate services. Our virtual tour is an
                        interactive program designed for you to explore and visit properties in Turkey from the comfort
                        of your home. In six simple steps, you can become a property owner and have the option to become
                        a Turkish citizen by investment in a property in a matter of a few clicks.
                    </p>
                    <a href="<?= base_url(); ?>buying-online" class="btn red-button"
                       style="display: block;width: 175px;text-align: center;border-radius: 20px;margin-bottom: 30px;">
                        Get to know more </a>

                </div>
                <div class="col-md-5 d-flex">
                    <img src="<?= base_url(); ?>assets/web-site/images/base/masters/buyingonlineproperty.webp"
                         alt="Buying Online Property in Turkey" title="Buying Online Property in Turkey"
                         class="img-fluid my-3 py-2 my-sm-0">
                </div>
            </div>
        </div>
    </section>
    <section class="RecentlyAddedProperties" id="RecentlyAddedProperties">
        <div class="container-fluid py-2 my-2 mt-md-5 pt-md-5">
            <div class="row justify-content-center">
                <h4 class="text-center blue-text font-weight-bold">
                    Recently Added Properties
                </h4>
            </div>
            <div class="row mt-3 mt-md-5 justify-content-around">
                <div class="col-11">
                    <div class="recently-owl owl-carousel owl-theme">
                        <? foreach ($recently_added as $recently_properties) { ?>
                            <? $image_name = str_replace('assets/thumbnail/', '', $recently_properties->Property_thumbnail);
                            $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpg')) . ".webp";
                            if ($image_name_webp == '') {
                                $image_name_webp = substr($image_name, 0, strpos($image_name, '.png')) . ".webp";
                            }
                            if ($image_name_webp == '') {
                                $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpeg')) . ".webp";
                            }
                            ?>
                            <div class="item">
                                <div class="card">
                                    <a href="<?= base_url(); ?>properties/<?= $recently_properties->url_slug; ?>" title="<?= $recently_properties->Property_Bedrooms.' Bedroom '.$recently_properties->Property_type.' For Sale In '.$recently_properties->Property_location; ?>">

                                        <img class="card-img-top img-fluid"

                                             src="<?= base_url(); ?><?= "assets/web-site/images/properties/P_Thumb/" . $image_name_webp; ?>"
                                             alt="<?= $recently_properties->Property_title; ?>">
                                    </a>
                                    <div class="card-body">
                                        <div class="container-fluid">
                                            <div class="card-title text-center">
                                            <span class="card-type-badge">
                                                 <?= $recently_properties->Property_type; ?>
                                            </span>
                                                <? if ($recently_properties->UserID!='admins'){ ?>
                                                    <span class="resale-badge">
                                                      Resale
                                                    </span>
                                                <? } ?>
                                                <span class="card-favorite">
                                                <? if (is_favored($recently_properties->Property_id)) { ?>
                                                    <a href="<?= base_url(); ?>Favorite/del_favorite/<?= $recently_properties->Property_id; ?>"
                                                       class="red-text" rel="nofollow">
                                                        <i class="fas fa-heart red-text"></i>
                                                    </a>
                                                <? } else { ?>
                                                    <a href="<?= base_url(); ?>Favorite/set_favorite/<?= $recently_properties->Property_id; ?>"
                                                       class="text-reset" rel="nofollow">
                                                        <i class="far fa-heart"></i>
                                                    </a>
                                                <? } ?>
                                                </span>
                                                <div id="item-card-title">
                                                    <a href="<?= base_url(); ?>properties/<?= $recently_properties->url_slug; ?>"
                                                       class="text-reset font-weight-bold blue-text"
                                                       title="<?= $recently_properties->Property_Bedrooms; ?> Bedroom <?= $recently_properties->Property_type; ?> For Sale In <?= $recently_properties->Property_location_city; ?>, <?= $recently_properties->Property_location; ?>, Turkey"
                                                    >
                                                        <?= $recently_properties->Property_title; ?>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row my-2 justify-content-around align-items-center"
                                                 id="card-speciality">
                                                <div class="d-flex align-items-center">
                                                    <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico2.webp"
                                                         alt=""
                                                         class="img-fluid">
                                                    <span class="mx-1"><?= $recently_properties->Property_location; ?></span>
                                                </div>
                                                <div class="d-flex align-items-center ">
                                                    <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico3.webp"
                                                         alt=""
                                                         class="img-fluid">
                                                    <span class="mx-1"><?= $recently_properties->Property_Bedrooms; ?></span>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico4.webp"
                                                         alt=""
                                                         class="img-fluid">
                                                    <span class="mx-1"><?= $recently_properties->Property_Bathrooms; ?></span>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico1.webp"
                                                         alt="" class="img-fluid"
                                                    >
                                                    <span class="mx-1"><?= $recently_properties->Property_living_space; ?></span>
                                                </div>
                                            </div>
                                            <div class="row my-2">
                                                <p class="text-justify item-card-description">
                                                    <?= substr(strip_tags($recently_properties->Property_overview), 0, 100) . "...."; ?>
                                                </p>
                                            </div>
                                            <div class="row justify-content-around align-items-center mx-1"
                                                 style="font-size: 1.2rem">
                                             <span class="red-text font-weight-bold">
                                               <? if (!$recently_properties->SoldOut and $recently_properties->Property_price != 0) { ?>
                                                   <? if ($this->session->has_userdata('currency')) {
                                                       switch ($this->session->userdata('currency')) {
                                                           case 'USD': ?>
                                                               <i class="fas fa-dollar-sign"></i>
                                                               <?= number_format($recently_properties->Property_price); ?>
                                                               <?
                                                               break;
                                                           case 'TRY': ?>
                                                               <i class="fas fa-lira-sign"></i>
                                                               <?= number_format($recently_properties->Property_price * $currency_exchange_data->try); ?>

                                                               <?
                                                               break;
                                                           case 'EUR': ?>
                                                               <i class="fas fa-euro-sign"></i>
                                                               <?= number_format($recently_properties->Property_price * $currency_exchange_data->euro); ?>
                                                               <?
                                                               break;
                                                           case 'GBP': ?>
                                                               <i class="fas fa-pound-sign"></i>
                                                               <?= number_format($recently_properties->Property_price * $currency_exchange_data->gpt); ?>
                                                               <?
                                                               break;
                                                       }
                                                   } else { ?>
                                                       <i class="fas fa-dollar-sign"></i>
                                                       <?= number_format($recently_properties->Property_price); ?>
                                                   <? }
                                               } else { ?>
                                                   Contact US
                                               <? } ?>
                                            </span>
                                                <a class="btn btn-danger btn-sm d-flex font-weight-bold"
                                                   data-toggle="modal" data-target="#quickEnquireModal"
                                                   data-whatever="<?= $recently_properties->Property_referenceID; ?>"
                                                   rel="nofollow">
                                                    Quick Enquiry
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
    <section class="recent" id="recent">
        <div class="container-fluid py-2 my-2 mb-md-4 pb-md-4">
            <div class="row mx-2 mx-md-5 px-1 px-md-3">
                <div class="col-md-8">
                    <div class="my-5 recent-title-after">
                        Popular Posts
                    </div>
                    <div class="row">
                        <? foreach ($blog_recent as $blog) { ?>
                            <div class="col-md-6 px-2 px-lg-5">
                                <a href="<?= base_url(); ?>blog/<?= $blog->url_slug; ?>" class="blog-item"
                                   title="<?= $blog->Blog_Title; ?>">
                                    <? $image_name = str_replace('assets/blog/', '', $blog->Blog_Image);
                                    $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpg')) . ".webp";
                                    if ($image_name_webp == '') {
                                        $image_name_webp = substr($image_name, 0, strpos($image_name, '.png')) . ".webp";
                                    }
                                    if ($image_name_webp == '') {
                                        $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpeg')) . ".webp";
                                    }
                                    ?>

                                    <img class="card-img-left" title="<?= $blog->Blog_Title; ?>"
                                         src="<?= base_url(); ?><?= "assets/web-site/images/blog/whatsapp/" . $image_name_webp; ?>"
                                         alt="<?= $blog->Blog_Image_Alt; ?>"/>
                                    <div class="card flex-row">
                                        <div class="card-body" style="background-color: white !important;">
                                            <div id="recent-blog-header">
                                                <?= $blog->Blog_Title; ?>
                                            </div>
                                            <div id="recent-blog-time"><i class="fas fa-calendar-alt"></i>
                                                <? $unix_time = mysql_to_unix($blog->Blog_Created_date);
                                                $date_string = '%d %M %Y';
                                                echo mdate($date_string, $unix_time);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <? } ?>
                    </div>
                    <div class="row justify-content-center">
                        <a href="<?= base_url(); ?>Blog" class="btn red-button"> VIEW ALL </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="my-5 recent-title-after">
                        Recent in our News
                    </div>
                    <div class="row">
                        <? foreach ($news_recent as $news) { ?>
                            <div class="col-md-12 px-2 px-lg-5 mx-xl-4 ">
                                <a href="<?= base_url(); ?>news/<?= $news->url_slug; ?>" class="blog-item"
                                   title="<?= $news->News_Title; ?>">
                                    <? $image_name = str_replace('assets/news/', '', $news->News_Image);
                                    $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpg')) . ".webp";
                                    if ($image_name_webp == '') {
                                        $image_name_webp = substr($image_name, 0, strpos($image_name, '.png')) . ".webp";
                                    }
                                    if ($image_name_webp == '') {
                                        $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpeg')) . ".webp";
                                    }
                                    ?>
                                    <img class="card-img-left" title="<?= $news->News_Title; ?>"
                                         src="<?= base_url(); ?><?= "assets/web-site/images/news/whatsapp/" . $image_name_webp; ?>"
                                         alt="<?= $news->News_Image_Alt; ?>"/>
                                    <div class="card flex-row">
                                        <div class="card-body" style="background-color: white !important;">
                                            <div id="recent-blog-header">
                                                <?= $news->News_Title; ?>
                                            </div>
                                            <div id="recent-blog-time"><i class="fas fa-calendar-alt"></i>
                                                <? $unix_time = mysql_to_unix($news->News_Created_date);
                                                $date_string = '%d %M %Y';
                                                echo mdate($date_string, $unix_time);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <? } ?>
                    </div>
                    <div class="row justify-content-center">
                        <a href="<?= base_url(); ?>News" class="btn red-button"> VIEW ALL </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<div class="modal fade" id="quickEnquireModal" tabindex="-1" aria-labelledby="quickEnquireModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="quickEnquireModalLabel">PROPERTY ENQUIRY</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url(); ?>Post/enquire" id="enquiry" onsubmit="return ModalEnquireFormValidation();">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Full Name" required form="enquiry"
                                       name="info"  id="modalEnquireForm_info">
                                <span id="modalEnquireForm_info_error" style="display:none;font-size: 0.6rem;padding-top: 5px;color: white;text-shadow: 1px 1px 5px red;"
                                      class="vision">
                                   Please enter your first and last name separated by a space (e.g. Jane Miller)
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="modal_phone" class="form-control" placeholder="Phone"
                                       name="phone[main]" form="enquiry" required>
                                <span id="modalEnquireForm_phone_error" style="display:none;font-size: 0.6rem;padding-top: 5px;color: white;text-shadow: 1px 1px 5px red;"
                                      class="vision">
                                      Please Write Your Full PhoneNumber
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" name="email"
                                       form="enquiry" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="note" id="note" cols="30" rows="3" class="form-control"
                                          placeholder="Note" form="enquiry"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                            <div class="form-group">
                                <div class="g-recaptcha"
                                     data-sitekey="6Leb_6MgAAAAALtcAlJS98nLXgm8RSA22-JzfnXN"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="reference_id" id="modal_reference_id" form="enquiry">
                <input type="submit" class="btn red-button btn-block" form="enquiry">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="topEnquireModal" tabindex="-1" aria-labelledby="topEnquireModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="topEnquireModalLabel">CONTACT US FOR FREE EXPERT CONSULTATION</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url(); ?>Post/enquire" id="enquiryit" onsubmit="return TopEnquireFormValidation();">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Full Name" required form="enquiryit"
                                       name="info"  id="TopEnquireForm_info">
                                <span id="TopEnquireForm_info_error" style="display:none;font-size: 0.6rem;padding-top: 5px;color: white;text-shadow: 1px 1px 5px red;"
                                      class="vision">
                                   Please enter your first and last name separated by a space (e.g. Jane Miller)
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="modal_phone_cover" class="form-control" placeholder="Phone"
                                       name="phone[main]" form="enquiryit" required>
                                <span id="TopEnquireForm_phone_error" style="display:none;font-size: 0.6rem;padding-top: 5px;color: white;text-shadow: 1px 1px 5px red;"
                                      class="vision">
                                      Please Write Your Full PhoneNumber
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" name="email"
                                       form="enquiryit" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="note" id="note" cols="30" rows="3" class="form-control"
                                          placeholder="Note" form="enquiry"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                            <div class="form-group">
                                <div class="g-recaptcha"
                                     data-sitekey="6Leb_6MgAAAAALtcAlJS98nLXgm8RSA22-JzfnXN"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="reference_id" value="mainPageTopCover" form="enquiryit">
                <input type="submit" class="btn red-button btn-block" form="enquiryit">
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('web-site/includes/footer'); ?>
<?php $this->load->view('web-site/includes/foot-load'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/web-site/js/main-page.js"></script>
<script type="text/javascript">
    $('#quickEnquireModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('whatever'); // Extract info from data-* attributes
        var modal = $(this);
        modal.find('#modal_reference_id').val(recipient)
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#city_value').change(function () {
            let City = $(this).val();
            if (City != 'All') {
                $.ajax({
                    url: '<?=base_url()?>AjaxRequest/propertyType',
                    method: 'post',
                    data: {City: City},
                    dataType: 'json',
                    success: function (response) {
                        $('#property_type').text('');
                        $('#property_type').append($('<option>', {
                            value: 'All',
                            text: 'Type'
                        }));
                        $('#property_type').append($('<option>', {
                            value: 'All',
                            text: 'All'
                        }));
                        $.each(response, function (i, item) {
                            $('#property_type').append($('<option>', {
                                value: item.Property_type,
                                text: item.Property_type
                            }));
                        });
                    }
                });
                $.ajax({
                    url: '<?=base_url()?>AjaxRequest/propertyBed',
                    method: 'post',
                    data: {City: City},
                    dataType: 'json',
                    success: function (response) {
                        $('#property_bed').text('');
                        $('#property_bed').append($('<option>', {
                            value: 'All',
                            text: 'Bedrooms'
                        }));
                        $('#property_bed').append($('<option>', {
                            value: 'All',
                            text: 'All'
                        }));
                        $.each(response, function (i, item) {
                            $('#property_bed').append($('<option>', {
                                value: item.Property_Bedrooms,
                                text: item.Property_Bedrooms
                            }));
                        });
                    }
                });
            } else {
                $('#property_type').text('');
                $('#property_type').append($('<option>', {
                    value: 'All',
                    text: 'Type'
                }));
                $('#property_type').append($('<option>', {
                    value: 'All',
                    text: 'All'
                }));
                <? foreach ($ProType as $value){ ?>
                $('#property_type').append($('<option>', {
                    value: '<?= $value; ?>',
                    text: '<?= $value; ?>'
                }));
                <? } ?>
                $('#property_bed').text('');
                $('#property_bed').append($('<option>', {
                    value: 'All',
                    text: 'Bedrooms'
                }));
                $('#property_bed').append($('<option>', {
                    value: 'All',
                    text: 'All'
                }));
                <? foreach ($proBed as $value){ ?>
                $('#property_bed').append($('<option>', {
                    value: '<?= $value; ?>',
                    text: '<?= $value; ?>'
                }));
                <? } ?>
            }
        });
        $('#property_type').change(function () {
            let pro_type = $(this).val();
            let City = $('#city_value').val();
            if (pro_type != 'All') {
                $.ajax({
                    url: '<?=base_url()?>AjaxRequest/propertyTypeBedroom',
                    method: 'post',
                    data: {City: City, pro_type: pro_type},
                    dataType: 'json',
                    success: function (response) {
                        $('#property_bed').text('');
                        $('#property_bed').append($('<option>', {
                            value: 'All',
                            text: 'Bedrooms'
                        }));
                        $('#property_bed').append($('<option>', {
                            value: 'All',
                            text: 'All'
                        }));
                        $.each(response, function (i, item) {
                            $('#property_bed').append($('<option>', {
                                value: item.Property_Bedrooms,
                                text: item.Property_Bedrooms
                            }));
                        });
                    }
                });
            } else {
                if (City != 'All') {
                    $.ajax({
                        url: '<?=base_url()?>AjaxRequest/propertyBed',
                        method: 'post',
                        data: {City: City},
                        dataType: 'json',
                        success: function (response) {
                            $('#property_bed').text('');
                            $('#property_bed').append($('<option>', {
                                value: 'All',
                                text: 'Bedrooms'
                            }));
                            $('#property_bed').append($('<option>', {
                                value: 'All',
                                text: 'All'
                            }));
                            $.each(response, function (i, item) {
                                $('#property_bed').append($('<option>', {
                                    value: item.Property_Bedrooms,
                                    text: item.Property_Bedrooms
                                }));
                            });
                        }
                    });
                } else {
                    $('#property_bed').text('');
                    $('#property_bed').append($('<option>', {
                        value: 'All',
                        text: 'Bedrooms'
                    }));
                    $('#property_bed').append($('<option>', {
                        value: 'All',
                        text: 'All'
                    }));
                    <? foreach ($proBed as $value){ ?>
                    $('#property_bed').append($('<option>', {
                        value: '<?= $value; ?>',
                        text: '<?= $value; ?>'
                    }));
                    <? } ?>
                }
            }
        });
    });
</script>
<script type="text/javascript">
    function ModalEnquireFormValidation(){
        let modalEnquireFormFlag = true;
        let modalEnquireForm_info_error = document.getElementById('modalEnquireForm_info_error');
        let modalEnquireForm_phone_error = document.getElementById('modalEnquireForm_phone_error');
        modalEnquireForm_info_error.style.display = 'none';
        modalEnquireForm_phone_error.style.display = 'none';
        let modalEnquireForm_info = document.getElementById('modalEnquireForm_info').value;
        let modalEnquireForm_phone = document.getElementById('modal_phone').value;
        let modalEnquireForm_info_regex = new RegExp(/^\w+\s+\w+/i);
        let modalEnquireForm_phone_regex = new RegExp(/\d{5,20}/g);

        if (modalEnquireForm_info_regex.test(modalEnquireForm_info) != true) {
            modalEnquireFormFlag = false;
            modalEnquireForm_info_error.style.display = 'block';
        }
        if (modalEnquireForm_phone_regex.test(modalEnquireForm_phone) != true) {
            modalEnquireFormFlag = false;
            modalEnquireForm_phone_error.style.display = 'block';
        }
        return modalEnquireFormFlag;
    }
    const phoneInputFieldModalPROVal = document.querySelector("#modal_phone");
    const phoneInputModalPROVal = window.intlTelInput(phoneInputFieldModalPROVal, {
        separateDialCode: true,
        preferredCountries:["<? if (isset($geolocation)){echo $geolocation;}else{echo 'us';} ?>"],
        hiddenInput: "full",
        utilsScript:
            "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });

    function TopEnquireFormValidation(){
        let TopEnquireFormFlag = true;
        let TopEnquireForm_info_error = document.getElementById('TopEnquireForm_info_error');
        let TopEnquireForm_phone_error = document.getElementById('TopEnquireForm_phone_error');
        TopEnquireForm_info_error.style.display = 'none';
        TopEnquireForm_phone_error.style.display = 'none';
        let TopEnquireForm_info = document.getElementById('TopEnquireForm_info').value;
        let TopEnquireForm_phone = document.getElementById('modal_phone_cover').value;
        let TopEnquireForm_info_regex = new RegExp(/^\w+\s+\w+/i);
        let TopEnquireForm_phone_regex = new RegExp(/\d{5,20}/g);

        if (TopEnquireForm_info_regex.test(TopEnquireForm_info) != true) {
            TopEnquireFormFlag = false;
            TopEnquireForm_info_error.style.display = 'block';
        }
        if (TopEnquireForm_phone_regex.test(TopEnquireForm_phone) != true) {
            TopEnquireFormFlag = false;
            TopEnquireForm_phone_error.style.display = 'block';
        }
        return TopEnquireFormFlag;
    }
    const phoneInputFieldModalCoverVal = document.querySelector("#modal_phone_cover");
    const phoneInputModalCoverVal = window.intlTelInput(phoneInputFieldModalCoverVal, {
        separateDialCode: true,
        preferredCountries:["<? if (isset($geolocation)){echo $geolocation;}else{echo 'us';} ?>"],
        hiddenInput: "full",
        utilsScript:
            "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
</script>
</body>
</html>