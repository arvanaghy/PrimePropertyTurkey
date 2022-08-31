<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
header('Cache-Control: no cache'); //disable validation of form by the browser
?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/find-property.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/cities-property.css">
<link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/phone-input.css">
<? if (isset($SEO_BAR)) { ?>
    <? if ($SEO_BAR['City'] == 'All') {
        $SEO_BAR['City'] = 'Turkey';
    } ?>
    <? if ($SEO_BAR['Type'] == 'All') {
        $SEO_BAR['Type'] = 'Property';
    } ?>
    <? if ($SEO_BAR['bedroom'] == 'All') {
        $SEO_BAR['bedroom'] = null;
    } ?>
    <? if ($SEO_BAR['max_price'] == '5000000') {
        $SEO_BAR['max_price'] = null;
    } ?>
    <? if ($SEO_BAR['max_price'] == '1000000') {
        $SEO_BAR['max_price'] = '$1 Million ';
    } ?>
    <? if ($SEO_BAR['max_price'] == '500000') {
        $SEO_BAR['max_price'] = '$500.000 ';
    } ?>
    <? if ($SEO_BAR['max_price'] == '400000') {
        $SEO_BAR['max_price'] = '$400.000 ';
    } ?>
    <? if ($SEO_BAR['max_price'] == '300000') {
        $SEO_BAR['max_price'] = '$300.000 ';
    } ?>
    <? if ($SEO_BAR['max_price'] == '200000') {
        $SEO_BAR['max_price'] = '$200.000 ';
    } ?>
    <? if ($SEO_BAR['max_price'] == '100000') {
        $SEO_BAR['max_price'] = '$100.000 ';
    } ?>
<? } ?>
<script src="https://www.google.com/recaptcha/api.js"></script>
<title>
    <? if ($SEO_BAR['bedroom'] != null) {
        echo $SEO_BAR['bedroom']; ?> Bedroom<? } ?> <?= $SEO_BAR['Type']; ?> For Sale
    In <?= $SEO_BAR['City']; ?> <? if ($SEO_BAR['max_price']) {
        echo "Under " . $SEO_BAR['max_price'];
    } ?> | Prime Property Turkey
</title>
<meta name="description"
      content="Find <?= $SEO_BAR['Type']; ?> for sale in <?= $SEO_BAR['City']; ?> , luxury affordable <?= $SEO_BAR['Type']; ?> in <?= $SEO_BAR['City']; ?>. Prime property Turkey offer best property for you.">
<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="<?= current_url(); ?>">
<meta property="og:title" content="<? if ($SEO_BAR['bedroom'] != null) {
    echo $SEO_BAR['bedroom']; ?> Bedroom <? } ?> <?= $SEO_BAR['Type']; ?> For Sale In <?= $SEO_BAR['City']; ?> <? if ($SEO_BAR['max_price']) {
    echo "Under " . $SEO_BAR['max_price'];
} ?>">
<meta property="og:description"
      content="Find <?= $SEO_BAR['Type']; ?> for sale in  <?= $SEO_BAR['City']; ?>, luxury affordable <?= $SEO_BAR['Type']; ?> in <?= $SEO_BAR['City']; ?>. Prime property Turkey offer best property for you.">
<meta property="og:image"
      content="https://www.primepropertyturkey.com/assets/web-site/images/base/Prime-Property-Turkey-build-logo.jpg">
<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="<?= current_url(); ?>">
<meta property="twitter:title" content="<? if ($SEO_BAR['bedroom'] != null) {
    echo $SEO_BAR['bedroom']; ?> Bedroom <? } ?> <?= $SEO_BAR['Type']; ?> For Sale In <?= $SEO_BAR['City']; ?> <? if ($SEO_BAR['max_price']) {
    echo "Under " . $SEO_BAR['max_price'];
} ?>">
<meta property="twitter:description"
      content="Find <?= $SEO_BAR['Type']; ?> for sale in <?= $SEO_BAR['City']; ?> , luxury affordable <?= $SEO_BAR['Type']; ?> in <?= $SEO_BAR['City']; ?>. Prime property Turkey offer best property for you.">
<meta property="og:image"
      content="https://www.primepropertyturkey.com/assets/web-site/images/base/Prime-Property-Turkey-build-logo.jpg">
<link rel="canonical" href="<?= $page_url; ?>"/>
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

    #description-section {
        min-height: 120px;
        align-items: center;
    }

    #description-section p {
        margin-bottom: 0;
        padding-bottom: 0;
    }
</style>
<style>
    svg {
        cursor: pointer;
    }
</style>
</head>
<body>
<? if (isset($page_id)) {
    $page_id = $page_id;
} else {
    $page_id = 0;
} ?>
<?php $this->load->view('web-site/includes/top-section'); ?>
<main>
    <section id="Find-Your-Property" class="Find-Your-Property m-3">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center my-2 py-3">
                <div class="find-title">
                    <small>
                        <span class="pre">
                          Find
                        </span>
                        <span class="pro red-text">
                            Turkey
                        </span>
                        <span class="pre">
                           properties
                        </span>
                    </small>
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
                                        <option value="<?= $value; ?>" <? if( $value == $SEO_BAR['City']) {
                                            echo "selected"; } ?> ><?= $value; ?></option>
                                    <? } ?>
                                </select>
                            </div>
                            <div class="col-lg-1 my-1" id="Type">
                                <select name="Type" id="property_type" class="form-control ">
                                    <option value="All" selected>Type</option>
                                    <option value="All">All</option>
                                    <? foreach ($ProType as $value) { ?>
                                        <option value="<?= $value; ?>" <? if( $value == $SEO_BAR['Type']) {
                                            echo "selected"; } ?> ><?= $value; ?></option>
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
                            <div class="col-lg-2 my-1" id="bedroom" >
                                <select class="form-control" name="bedroom" id="property_bed">
                                    <option value="All" selected>Bedrooms</option>
                                    <? foreach ($proBed as $value) { ?>
                                        <option value="<?= $value; ?>" <? if( $value == $SEO_BAR['bedroom']) {
                                            echo "selected"; } ?> ><?= $value; ?></option>
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
    <section id="content" class="py-3">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h1 style="font-size: 2rem;font-weight: 600">
                                Buy <? if ($SEO_BAR['bedroom'] != null) {
                                    echo $SEO_BAR['bedroom']; ?> Bedroom <? } ?> <span
                                        style="color: darkblue"><?= $SEO_BAR['Type']; ?></span> For Sale In <span
                                        style="color: darkred"> <?= $SEO_BAR['City']; ?></span> <? if ($SEO_BAR['max_price']) {
                                    echo " Under " . $SEO_BAR['max_price'];
                                } ?>
                            </h1>
                            <? $title = "Buy " . $SEO_BAR['Type'] . " For Sale In " . $SEO_BAR['City']; ?>
                            <? if ($title == "Buy Villa For Sale In Turkey") { ?>
                                <div class="text-left my-4">
                                    <p class="text-justify">
                                        Villa is what you buy when you value quality life, privacy, luxury and freedom.
                                        Turkey is known for its breathtaking villas, with over-the-top ambience and
                                        aesthetics designed for those who appreciate good living standards. Villas come
                                        with different facilities, budgets and locations. There is a perfect villa for
                                        you whether you have a small or big family.
                                    </p>
                                    <button class="py-1 px-3 pb-3" id="read-more"
                                            style="position: absolute;right: 10px;bottom: 0px;border: 0;background-color: inherit;font-size: 0.8rem;color: #012169;font-weight: bold;">
                                        Read More About <span class="red-text"><?= $title; ?></span>
                                    </button>
                                </div>
                            <? } ?>
                            <? if ($title == "Buy Villa For Sale In Fethiye") { ?>
                                <div class="text-left my-4">
                                    <h2 style="font-size: 1.3rem; font-weight: 700">
                                        Invest in Affordable Villas in Fethiye
                                    </h2>
                                    <p class="text-justify">
                                        If you wish to live life to the fullest, investing in a property that increases
                                        your comfort is a priority. Among different property types, including
                                        apartments, duplexes, penthouses, and bungalows, villas come at the very top of
                                        the list when it comes to recommendations. There are various reasons why people
                                        prefer villas, and Turkey has luxurious, breathtaking villas that also come at
                                        an affordable price. Continue to read if you want to know more about the urban
                                        lifestyle offered by villas in Turkey's real estate-rich province, Fethiye.
                                    </p>
                                    <button class="py-1 px-3 pb-3" id="read-more"
                                            style="position: absolute;right: 10px;bottom: 0px;border: 0;background-color: inherit;font-size: 0.8rem;color: #012169;font-weight: bold;">
                                        Read More About <span class="red-text"><?= $title; ?></span>
                                    </button>
                                </div>
                            <? } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row justify-content-center">
                        <? if ($property_result) { ?>
                            <? foreach ($property_result as $value) { ?>
                                <? $image_name = str_replace('assets/thumbnail/', '', $value->Property_thumbnail);
                                $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpg')) . ".webp";
                                if ($image_name_webp == '') {
                                    $image_name_webp = substr($image_name, 0, strpos($image_name, '.png')) . ".webp";
                                }
                                if ($image_name_webp == '') {
                                    $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpeg')) . ".webp";
                                }
                                ?>
                                <div class="col-md-3">
                                    <div class="item my-2">
                                        <div class="card feature-sm-back">
                                            <div class="card-body">
                                                <div id="top-image">
                                                    <a href="<?= base_url(); ?>properties/<?= $value->url_slug; ?>">
                                                        <img class="card-img-top img-fluid"
                                                             style="min-height: 280px;max-height: 280px"
                                                             src="<?= base_url(); ?><? if ($value->ReferenceLink != '0') {
                                                                 echo "assets/web-site/images/resales/webps/";
                                                             } else {
                                                                 echo "assets/web-site/images/properties/P_Thumb/";
                                                             } ?><?= $image_name_webp; ?>"
                                                             alt="<?= $value->Property_title; ?>">
                                                    </a>
                                                </div>
                                                <div id="badge-sections">
                                           <span class="card-type-badge">
                                              <?= $value->Property_type; ?>
                                           </span>
                                                    <? if ($value->SoldOut) { ?>
                                                        <span class="sold-out-badge">
                                              Sold Out
                                            </span>
                                                    <? } ?>
                                                    <? if ($value->Property_type != 'Commercial' and $value->is_commercial == '1') { ?>
                                                        <span class="is_commercial-badge">
                                              Commercial
                                            </span>
                                                    <? } ?>
                                                    <span class="card-favorite">
                                                <? if (is_favored($value->Property_id)) { ?>
                                                    <a href="<?= base_url(); ?>Favorite/del_favorite/<?= $value->Property_id; ?>"
                                                       class="red-text" rel="nofollow">
                                                        <i class="fas fa-heart red-text"></i>
                                                    </a>
                                                <? } else { ?>
                                                    <a href="<?= base_url(); ?>Favorite/set_favorite/<?= $value->Property_id; ?>"
                                                       class="text-reset" rel="nofollow">
                                                        <i class="far fa-heart"></i>
                                                    </a>
                                                <? } ?>
                                            </span>
                                                </div>
                                                <div id="title-section">
                                                    <a href="<?= base_url(); ?>properties/<?= $value->url_slug; ?>"
                                                       class="text-reset text-left property-title font-weight-bold px-2 py-2 d-block blue-text"
                                                       title="<?= $value->Property_Bedrooms; ?> Bedroom <?= $value->Property_type; ?> For Sale In <?= $value->Property_location_city; ?>, <?= $value->Property_location; ?>, Turkey">
                                                        <h2 style="font-size: 0.9rem;line-height: 1.5rem;font-weight: bold">
                                                            <?= $value->Property_title; ?>
                                                        </h2>
                                                    </a>
                                                </div>
                                                <div id="under-cover"
                                                     class="row mx-2 my-2 justify-content-around align-items-center">
                                                    <div id="price-section" class="col-5">
                                                         <span class="red-text font-weight-bold"
                                                               style="font-size: 1.2rem">
                                                              <? if (!$value->SoldOut and $value->Property_price != 0) { ?>
                                                                  <? if ($this->session->has_userdata('currency')) {
                                                                      switch ($this->session->userdata('currency')) {
                                                                          case 'USD': ?>
                                                                              <i class="fas fa-dollar-sign"></i>
                                                                              <?= number_format($value->Property_price); ?>
                                                                              <?
                                                                              break;
                                                                          case 'TRY': ?>
                                                                              <i class="fas fa-lira-sign"></i>
                                                                              <?= number_format($value->Property_price * $currency_exchange_data->try); ?>

                                                                              <?
                                                                              break;
                                                                          case 'EUR': ?>
                                                                              <i class="fas fa-euro-sign"></i>
                                                                              <?= number_format($value->Property_price * $currency_exchange_data->euro); ?>
                                                                              <?
                                                                              break;
                                                                          case 'GBP': ?>
                                                                              <i class="fas fa-pound-sign"></i>
                                                                              <?= number_format($value->Property_price * $currency_exchange_data->gpt); ?>
                                                                              <?
                                                                              break;
                                                                      }
                                                                  } else { ?>
                                                                      <i class="fas fa-dollar-sign"></i>
                                                                      <?= number_format($value->Property_price); ?>
                                                                  <? }
                                                              } else {
                                                                  echo "Contact Us";
                                                              }
                                                              ?>
                                                        </span>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="row justify-content-around align-items-center">
                                                            <div class="col-7 card-speciality">
                                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico2.webp"
                                                                     class="img-fluid">
                                                                <span class="mx-1"> <?= $value->Property_location; ?></span>
                                                            </div>
                                                            <div class="col-5 card-speciality">
                                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico3.webp"
                                                                     class="img-fluid">
                                                                <span class="mx-1"><?= $value->Property_Bedrooms; ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-around align-items-center">
                                                            <div class="col-7 card-speciality">
                                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico4.webp"
                                                                     class="img-fluid">
                                                                <span class="mx-1"><?= $value->Property_Bathrooms; ?></span>
                                                            </div>
                                                            <div class="col-5 card-speciality">
                                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico1.webp"
                                                                     class="img-fluid">
                                                                <span><?= $value->Property_living_space; ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mx-2 mt-2" id="description-section">
                                                    <p class="text-left">
                                                        <?= substr(strip_tags($value->Property_overview), 0, 100) . "...."; ?>
                                                    </p>
                                                </div>
                                                <div class="row justify-content-around align-items-center py-2">
                                                    <a href="<?= base_url(); ?>properties/<?= $value->url_slug; ?>"
                                                       class="btn btn-outline-danger btn-sm  d-flex my-1">
                                                        View Details
                                                    </a>
                                                    <a class="btn btn-danger btn-sm d-flex font-weight-bold my-1"
                                                       data-toggle="modal"
                                                       data-whatever="<?= $value->Property_referenceID; ?>"
                                                       data-target="#quickEnquireModal" rel="nofollow">
                                                        Quick Enquiry
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <? } ?>
                        <? } else { ?>
                            <div class="card">
                                <div class="card-body text-center">
                                    <p>
                                        "Please get in touch with us to get consultation about properties in this
                                        neighborhood"
                                    </p>
                                    <a href="<?= base_url(); ?>contact_us" class="btn btn-primary">Contact Us</a>
                                </div>
                            </div>
                        <? } ?>
                    </div>
                    <? if ($pages > 0) { ?>
                        <div class="row py-3 px-1 text-center justify-content-center">
                            <div class="col">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" rel="nofollow" href="<?= $page_url; ?>" tabindex="-1"
                                               title="FIRST"> <i
                                                        class="fas fa-angle-double-left"></i> </a>
                                        </li>
                                        <? if ($page_id < 2) { ?>
                                            <? for ($i = 0; $i <= $page_id + 2; $i++) { ?>
                                                <? if ($i > $pages) {
                                                    break;
                                                } ?>
                                                <? if ((int)$page_id == $i) { ?>
                                                    <li class="page-item text-danger"><a rel="nofollow"
                                                                                         class="page-link text-danger"
                                                                                         href="<?= $page_url; ?>/<?= $i; ?>"><?= $i + 1; ?></a>
                                                    </li>
                                                <? } else { ?>
                                                    <li class="page-item"><a class="page-link" rel="nofollow"
                                                                             href="<?= $page_url; ?>/<?= $i; ?>"><?= $i + 1; ?></a>
                                                    </li>
                                                <? } ?>
                                            <? } ?>
                                        <? } elseif ($page_id > $pages - 2) { ?>
                                            <? for ($i = (int)$page_id - 2; $i <= $pages; $i++) { ?>
                                                <? if ($i > $pages) {
                                                    break;
                                                } ?>
                                                <? if ((int)$page_id == $i) { ?>
                                                    <li class="page-item text-danger"><a class="page-link text-danger"
                                                                                         rel="nofollow"
                                                                                         href="<?= $page_url; ?>/<?= $i; ?>"><?= $i + 1; ?></a>
                                                    </li>
                                                <? } else { ?>
                                                    <li class="page-item"><a class="page-link" rel="nofollow"
                                                                             href="<?= $page_url; ?>/<?= $i; ?>"><?= $i + 1; ?></a>
                                                    </li>
                                                <? } ?>
                                            <? } ?>
                                        <? } else { ?>
                                            <? for ($i = (int)$page_id - 2; $i <= $page_id + 2; $i++) { ?>
                                                <? if ($i > $pages) {
                                                    break;
                                                } ?>
                                                <? if ((int)$page_id == $i) { ?>
                                                    <li class="page-item text-danger"><a class="page-link text-danger"
                                                                                         rel="nofollow"
                                                                                         href="<?= $page_url; ?>/<?= $i; ?>"><?= $i + 1; ?></a>
                                                    </li>
                                                <? } else { ?>
                                                    <li class="page-item"><a class="page-link" rel="nofollow"
                                                                             href="<?= $page_url; ?>/<?= $i; ?>"><?= $i + 1; ?></a>
                                                    </li>
                                                <? } ?>
                                            <? } ?>
                                        <? } ?>
                                        <li class="page-item">
                                            <a class="page-link" rel="nofollow" href="<?= $page_url; ?>/<?= $pages; ?>"
                                               title="LAST"> <i
                                                        class="fas fa-angle-double-right"></i> </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    <? } ?>
                </div>
                <div class="col-lg-12 mb-5" id="collapse"></div>
                <div class="col-lg-12 my-3">
                    <div class="card">
                        <div class="card-body mt-3">
                            <? if ($title == "Buy Villa For Sale In Turkey"): ?>
                                <div class="card-title mb-4" style="font-size: 1.3rem;font-weight: 800">
                                    <span class="blue-text"> More Information About </span> <span
                                            class="red-text"> <?= $title; ?> </span> :
                                </div>
                                <h2 style="font-size: 1.3rem; font-weight: 700">
                                    How Much are Villas in Turkey?
                                </h2>
                                <p class="text-justify">
                                    Villas in Turkey range from 500.000 USD to 1.500.000 USD. Some unique amenities
                                    differ from indoor to outdoor swimming pools, saunas, Turkish baths, basketball and
                                    squash courts, guest room, barbeque area, indoor gym, gardens, jogging paths and
                                    other facilities for families to enjoy. Our villas have different payment methods,
                                    and buyers can reach us if they want a suitable plan.
                                </p>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Are Villas in Turkey a Profitable Investment ?
                                </h2>
                                <p class="text-justify">
                                    In Turkey, villas are perfect for all-year-round living and also for investment.
                                    Buyers who choose to live in villas can enjoy the picturesque sea views every day,
                                    peaceful neighbourhoods, and spacious sun-soaked rooms. Those who buy for investment
                                    rent them as holiday homes or Airbandb. Prime Property Turkey has after-sales
                                    services that help you with renting and maintenance services of your property.
                                </p>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Where to buy Villas in Turkey ?
                                </h2>
                                <p class="text-justify">
                                    The most favourable places to buy villas are coastal areas, away from the city's
                                    noise and where you can enjoy sea views, long beach walks day and night and privacy.
                                    Some districts to consider when buying villas in Turkey include Bodrum,
                                    Buyukcekmece, Mugla, Ovacik, Kalkan, Akarca and many others.
                                </p>
                            <? endif; ?>
                            <? if ($title == "Buy Villa For Sale In Fethiye"): ?>
                                <div class="card-title mb-4" style="font-size: 1.3rem;font-weight: 800">
                                    <span class="blue-text"> More Information About </span> <span
                                            class="red-text"> <?= $title; ?> </span> :
                                </div>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Location :
                                </h2>
                                <p class="text-justify">
                                    Fethiye has some of the best residents in Turkey, and investors have been interested
                                    in the province for some time, building more stunning villas with contemporary
                                    designs making this location a target for those who want elegance. If you buy
                                    property in Fethiye, you are guaranteed that those you share the neighborhood with
                                    have the same values as you, including class, privacy, and quality living standards.
                                </p>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Sense of security :
                                </h2>
                                <p class="text-justify">
                                    Fethiye is a province with high security. Whether the property is in a gated
                                    community or a secluded area, there is some form of security, either security guards
                                    or 24-hour CCTV security. The homes have innovative smart home systems that help
                                    record and regulate the people who come to the residence. Whether you are buying the
                                    property for investment, <a href="https://www.primepropertyturkey.com/Citizenship-by-investment-in-turkey" target="_blank"> citizenship</a>, or a retirement home, you will be guaranteed
                                    that your property and loved ones are safe at all times. These villas offer peace
                                    and serenity as their unique selling point.
                                </p>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Amenities :
                                </h2>
                                <p class="text-justify">
                                    Regarding amenities and luxury living, villas are the go-to. Some of the facilities
                                    that come with villas include a private swimming pool and private car park, library,
                                    barbeque area, flower garden, seasonal fruit trees, spacious balconies and terraces,
                                    guest bedroom, cleaner's bedroom, and sauna, to mention a few. All the luxuries one
                                    expects to find at a five-star hotel are found at villas in Fethiye to enjoy with
                                    family and friends any time of the day. Prime Property Turkey ensures that you
                                    invest in a property that ticks all your boxes, from the material used for the
                                    construction of the villa right to the onsite facilities the property has.
                                </p>
                                <p class="text-justify">
                                    To add to this, when you buy a villa, you have the freedom to decorate and enhance
                                    the ambiance of your property as you please, unlike apartments that might come with
                                    specific rules regarding the social areas, shared areas, and even the parking
                                    spaces. The outdoor area, up to 3.000m2, can be used for outdoor activities and
                                    family events.
                                </p>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Property aesthetics :
                                </h2>
                                <p class="text-justify">
                                    Villas in Turkey are becoming more and more advanced when it comes to aesthetics.
                                    The apartments have futuristic designs that proceed with standard exceptions. These
                                    world-class residents have lavish and thoughtful designs to meet the expectations of
                                    their different clientele. Whether looking for a furnished home or not, Fethiye has
                                    all kinds of cozy living spaces. Enjoy beautiful green hues from the balcony and
                                    incredible picturesque backdrops. Live in harmony with nature and the sea while
                                    enjoying life to the fullest in the tranquil neighborhoods of Fethiye.
                                </p>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Affordable :
                                </h2>
                                <p class="text-justify">
                                    Villas in Fethiye might be cheaper than you think. Typically villas start from 3
                                    bedrooms and 3 bathrooms to accommodate a medium size family at a value of 350.000
                                    USD. Considering the property's land area, neighborhood, and amenities, this is an
                                    investment not to miss. Property worth 400.000 USD is suitable for Citizenship in
                                    Turkey, and your spouse and children under 18 years are guaranteed Turkish
                                    Citizenship by making this investment. This property has a high return on investment
                                    if one wishes to rent their property or transform it into Airbnb. Considering the
                                    high number of tourists that visit Turkey and Fethiye in particular, investing in a
                                    villa for renting will bring significant benefits to the owner.
                                </p>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Incredible Views :
                                </h2>
                                <p class="text-justify">
                                    Fethiye has gorgeous views that residents can enjoy from their balconies, terraces,
                                    and home. Whether you want a forest, sea, or beach view, this city has it all.
                                    Fethiye is located southeast of Marmaris and has the most famous international
                                    marina. Tourists also enjoy visiting the area because of its incredible,
                                    jaw-dropping sites. The residents enjoy boat rides, museums, beaches, and nearby
                                    areas such as Saklikent, also known as the hidden city where you can have fun with
                                    the family while creating lifetime memories.
                                </p>
                                <p>
                                    Visit our <a href="<?= base_url(); ?>" target="_blank">Prime Property Turkey </a>
                                    website to view villas for sale and contact us for more information about our sale
                                    and after-sell services.
                                </p>
                            <? endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- Modal -->
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
                <form method="post" action="<?= base_url(); ?>Post/enquire" id="enquiry"
                      onsubmit="return ModalEnquireFormValidation();">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Full Name" required form="enquiry"
                                       name="info" id="modalEnquireForm_info">
                                <span id="modalEnquireForm_info_error"
                                      style="display:none;font-size: 0.6rem;padding-top: 5px;color: white;text-shadow: 1px 1px 5px red;"
                                      class="vision">
                                   Please enter your first and last name separated by a space (e.g. Jane Miller)
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="tel" id="modal_phone" class="form-control" placeholder="Phone"
                                       name="phone[main]" form="enquiry" required>
                                <span id="modalEnquireForm_phone_error"
                                      style="display:none;font-size: 0.6rem;padding-top: 5px;color: white;text-shadow: 1px 1px 5px red;"
                                      class="vision">
                                      Please Write Your Full PhoneNumber
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" name="email" form="enquiry"
                                       required>
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
<?php $this->load->view('web-site/includes/footer'); ?>
<?php $this->load->view('web-site/includes/foot-load'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#read-more").click(function () {
            $("#collapse").toggle(1000, function () {
                if (document.getElementById('collapse').style.display == 'none') {
                    document.getElementById('read-more').innerHTML = ' Read More ';
                } else {
                    document.getElementById('read-more').innerHTML = ' Read Less ';
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $('#quickEnquireModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('whatever'); // Extract info from data-* attributes
        var modal = $(this);
        modal.find('#modal_reference_id').val(recipient)
    });
</script>
<script type="text/javascript">
    function ModalEnquireFormValidation() {
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
        preferredCountries: ["<? if (isset($geolocation)) {
            echo $geolocation;
        } else {
            echo 'us';
        } ?>"],
        hiddenInput: "full",
        utilsScript:
            "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
</script>
<script type="text/javascript">
    let ilce_name = "<?= $this->uri->segment(2); ?>";
    let ilce_id = istanbul_ilce_list.indexOf(ilce_name);
    for (let i = 1; i <= 39; i++) {
        document.getElementById(i).style.fill = '#b4cbe5';
        document.getElementById(i + '-pop-1').style.display = 'none';
        document.getElementById(i + '-pop-2').style.display = 'none';
        document.getElementById(i + '-pop-3').style.display = 'none';
    }
    document.getElementById(ilce_id).style.fill = '#012169';
    document.getElementById(ilce_id + '-pop-1').style.display = 'inline-block';
    document.getElementById(ilce_id + '-pop-2').style.display = 'inline-block';
    document.getElementById(ilce_id + '-pop-3').style.display = 'inline-block';
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#city_value').change(function () {
            let City = $(this).val();
            let pro_type = $('#property_type').val();
            let pro_bed = $('#property_bed').val();
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
    $(document).ready(function () {
        $("#read-more").click(function () {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#collapse").offset().top
            }, 2000);
        });
    });
</script>
</body>
</html>