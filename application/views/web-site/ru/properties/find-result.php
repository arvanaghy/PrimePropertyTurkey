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
<?php $this->load->view('web-site/ru/includes/top-section'); ?>
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
                    <form action="<?= base_url(); ?>Ru_Find" method="post"
                          class="justify-content-around text-right">
                        <div class="row my-2 justify-content-around text-right">
                            <div class="col-lg-2 my-1" id="City">
                                <select name="City" id="city_value" class="form-control">
                                    <option value="All" selected>City</option>
                                    <option value="All">All</option>
                                    <? foreach ($cityNames as $value) { ?>
                                        <option value="<?= $value; ?>" <? if ($value == $SEO_BAR['City']) {
                                            echo "selected";
                                        } ?> ><?= $value; ?></option>
                                    <? } ?>
                                </select>
                            </div>
                            <div class="col-lg-1 my-1" id="Type">
                                <select name="Type" id="property_type" class="form-control ">
                                    <option value="All" selected>Type</option>
                                    <option value="All">All</option>
                                    <? foreach ($ProType as $value) { ?>
                                        <option value="<?= $value; ?>" <? if ($value == $SEO_BAR['Type']) {
                                            echo "selected";
                                        } ?> ><?= $value; ?></option>
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
                                        <option value="<?= $value; ?>" <? if ($value == $SEO_BAR['bedroom']) {
                                            echo "selected";
                                        } ?> ><?= $value; ?></option>
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
                            <? if ($title == "Buy Villa For Sale In Gocek") { ?>
                                <div class="text-left my-4">
                                    <h2 style="font-size: 1.3rem; font-weight: 700">
                                        Invest in Luxurious Villas in Gocek
                                    </h2>
                                    <p class="text-justify">
                                        The Turquoise Coast of Turkey attracts investors with its high-quality property
                                        developments. With the stunning natural environment as the backdrop for holiday
                                        and year-round homes, most of the builds are villas. Luxury villas in Gocek
                                        offer spacious rooms, gardens, and more for wise investors looking for
                                        affordable prices.
                                    </p>
                                    <button class="py-1 px-3 pb-3" id="read-more"
                                            style="position: absolute;right: 10px;bottom: 0px;border: 0;background-color: inherit;font-size: 0.8rem;color: #012169;font-weight: bold;">
                                        Read More About <span class="red-text"><?= $title; ?></span>
                                    </button>
                                </div>
                            <? } ?>
                            <? if ($title == "Buy Villa For Sale In Istanbul") { ?>
                                <div class="text-left my-4">
                                    <h2 style="font-size: 1.3rem; font-weight: 700">
                                        Invest in Villas in Istanbul
                                    </h2>
                                    <p class="text-justify">
                                        With its vibrant blend of old and new, Istanbul offers villas to fit every
                                        lifestyle and taste. Whether you are drawn to a wooden mansion built along the
                                        Bosphorus in the days of the Ottoman Empire or to a contemporary build outfitted
                                        with the latest technological amenities, you can find it in this sprawling,
                                        dazzling city.
                                    </p>
                                    <button class="py-1 px-3 pb-3" id="read-more"
                                            style="position: absolute;right: 10px;bottom: 0px;border: 0;background-color: inherit;font-size: 0.8rem;color: #012169;font-weight: bold;">
                                        Read More About <span class="red-text"><?= $title; ?></span>
                                    </button>
                                </div>
                            <? } ?>
                            <? if ($title == "Buy Villa For Sale In Kalkan") { ?>
                                <div class="text-left my-4">
                                    <h2 style="font-size: 1.3rem; font-weight: 700">
                                        Invest in Villas in Charming Kalkan
                                    </h2>
                                    <p class="text-justify">
                                        Tasteful Kalkan retains much of its authentic character with whitewashed
                                        buildings covering steep hills and an emphasis on historic preservation and
                                        local businesses. With its deep blue open bay dotted with boats and islands in
                                        the distance, Kalkan is a charming town surrounded by natural beauty. Villas
                                        with coastal views set amongst fruit trees and bougainvillea blossoms beckon
                                        investors from around the world.
                                    </p>
                                    <button class="py-1 px-3 pb-3" id="read-more"
                                            style="position: absolute;right: 10px;bottom: 0px;border: 0;background-color: inherit;font-size: 0.8rem;color: #012169;font-weight: bold;">
                                        Read More About <span class="red-text"><?= $title; ?></span>
                                    </button>
                                </div>
                            <? } ?>
                            <? if ($title == "Buy Apartment For Sale In Istanbul") { ?>
                                <div class="text-left my-4">
                                    <h2 style="font-size: 1.3rem; font-weight: 700">
                                        Invest in Istanbul Apartments
                                    </h2>
                                    <p class="text-justify">
                                        Istanbul is one of the top places where investors buy property in Turkey and
                                        apartments dominate the market. From custom-built to turnkey apartments there
                                        are truly dream homes for everyone.
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
                                                    <a href="<?= base_url(); ?>ru/properties/<?= $value->url_slug; ?>">
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
                                                    <? if ($value->UserID!='admins'){ ?>
                                                        <span class="resale-badge">
                                                      Resale
                                                    </span>
                                                    <? } ?>
                                                    <span class="card-favorite">
                                                          <? if (is_favored($value->Property_id)) { ?>
                                                              <button onclick="delete_favorite('<?= $value->Property_id; ?>');" style="background-color: transparent !important;padding: 0; border: 0"
                                                                      class="red-text" >
                                                        <i class="fas fa-heart red-text"></i>
                                                    </button>
                                                          <? } else { ?>
                                                              <button onclick="set_favorite('<?= $value->Property_id; ?>');" style="background-color: transparent !important;padding: 0;border: 0"
                                                                      class="text-reset">
                                                        <i class="far fa-heart"></i>
                                                    </button>
                                                          <? } ?>
                                            </span>
                                                </div>
                                                <div id="title-section">
                                                    <a href="<?= base_url(); ?>ru/properties/<?= $value->url_slug; ?>"
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
                                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico2.webp" alt="Property_location"
                                                                     class="img-fluid">
                                                                <span class="mx-1"> <?= $value->Property_location; ?></span>
                                                            </div>
                                                            <div class="col-5 card-speciality">
                                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico3.webp" alt="Property_Bedrooms"
                                                                     class="img-fluid">
                                                                <span class="mx-1"><?= $value->Property_Bedrooms; ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-around align-items-center">
                                                            <div class="col-7 card-speciality">
                                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico4.webp" alt="Property_Bathrooms"
                                                                     class="img-fluid">
                                                                <span class="mx-1"><?= $value->Property_Bathrooms; ?></span>
                                                            </div>
                                                            <div class="col-5 card-speciality">
                                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico1.webp" alt="Property_living_space"
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
                                                    <a href="<?= base_url(); ?>ru/properties/<?= $value->url_slug; ?>"
                                                       class="btn btn-outline-danger btn-sm  d-flex my-1">
                                                        View Details
                                                    </a>
                                                    <button class="btn btn-danger btn-sm d-flex font-weight-bold my-1"
                                                       data-toggle="modal"
                                                       data-whatever="<?= $value->Property_referenceID; ?>"
                                                       data-target="#quickEnquireModal">
                                                        Quick Enquiry
                                                    </button>
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
                                    property for investment, <a
                                            href="https://www.primepropertyturkey.com/Citizenship-by-investment-in-turkey"
                                            target="_blank"> citizenship</a>, or a retirement home, you will be
                                    guaranteed
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
                                    Visit our Prime Property Turkey
                                    website to view villas for sale and contact us for more information about our sale
                                    and after-sell services.
                                </p>
                            <? endif; ?>
                            <? if ($title == "Buy Villa For Sale In Gocek"): ?>
                                <div class="card-title mb-4" style="font-size: 1.3rem;font-weight: 800">
                                    <span class="blue-text"> More Information About </span> <span
                                            class="red-text"> <?= $title; ?> </span> :
                                </div>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Location :
                                </h2>
                                <p class="text-justify">
                                    Few spots on the globe rival Gocek for upmarket living and natural beauty, making it
                                    a wonderful place to buy real estate in Turkey. Located among pine-clad mountains,
                                    Gocek is at the intersection of the dazzling Aegean and Mediterranean Seas making it
                                    one of the world's top yachting destinations. Located in Mugla province, Gocek is
                                    easily accessible by sea or car on the D400 highway. The closest airport is Dalaman,
                                    which is a mere 25 kilometers away. Its busy harbor is in a secluded bay surrounded
                                    by islands. The town moves at a relaxed pace and is fully serviced to provide for
                                    the many people who come to visit the chic hotels and enjoy the many boating
                                    opportunities. Gorgeous Gocek offers tranquil living for those with refined taste.
                                </p>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Sense of security :
                                </h2>
                                <p class="text-justify">
                                    Overall Turkey is a very safe place to live. Less populated than other areas of the
                                    coast, Gocek's small size offers serene secure living. Life here is more private.
                                </p>
                                <p class="text-justify">
                                    Most villas have home security systems and are in gated communities with guards and
                                    cameras for 24/7 protection
                                </p>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Amenities :
                                </h2>
                                <p class="text-justify">
                                    Villas offer consumers any imaginable amenity they may seek. Typically, villas are
                                    in gated communities offering top security. The majority have large gardens that
                                    include private parking, pools, and BBQ areas to maximize your outdoor living
                                    enjoyment. Some developments also have shared communal areas allowing residents to
                                    socialize with their neighbors.
                                </p>
                                <p class="text-justify">
                                    Villas offer the same lavish lifestyle you can find at five-star hotels. There are
                                    villas available with multiple bedrooms, ensuite options, modern kitchens and
                                    terraces, balconies, saunas, hammams, and more. Top-quality white goods and
                                    construction materials are used in newer builds including luxury goods like marble
                                    and name brands. Prime Property Turkey will help guide you to the perfect property
                                    to suit your needs in the Gocek area.
                                </p>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Property aesthetics :
                                </h2>
                                <p class="text-justify">
                                    From modern design to cozy wooden structures, with our guidance, you can find your
                                    favorite home aesthetic in Gocek. Newer villas are in excellent condition, and with
                                    Turkey's low construction costs, it is cost-effective to renovate older ones if
                                    necessary. There are excellent local architects for any changes you desire, and new
                                    builds are sleek with all the modern comforts you need. The location and outdoor
                                    living spaces enhance the beauty of the property by encapsulating everything that
                                    sea lovers, boaters and people who appreciate pristine nature want.
                                </p>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Affordable :
                                </h2>
                                <p class="text-justify">
                                    Compared to other elite yachting areas worldwide, Gocek is very affordable. It is a
                                    bit more expensive than some other coastal areas in Turkey because of the exclusive
                                    clientele that frequent its shores. On average you can find an exceptional villa for
                                    $350,000 USD that can suit a family of four while the top villas can run into the
                                    millions of dollars. On the lower end expect to pay around $150,000 USD for a villa.
                                    For a $400,000 property investment, you, your spouse, and children under 18 are
                                    eligible for Turkish citizenship. There is a steady trickle of international and
                                    domestic tourists that frequent Gocek so you can anticipate high demand if you
                                    choose to rent it out. Year-on-year price increases have been growing at high rates
                                    in the Gocek area.
                                </p>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Luxury living in the heart of the Turquoise Coast :
                                </h2>
                                <p class="text-justify">
                                    Gocek's pristine marina is full of yachts and surrounded by green islands attracting
                                    a wealthy clientele. Environmental protections ensure that the area's natural beauty
                                    and clean sea will remain for generations to come. The Gocek area features striking
                                    beaches, a top-notch marina, a gourmet food scene, and luxury hotels, making it a
                                    favorite with travelers and second homeowners. Its amenities are set among the
                                    sapphire blue waters of Turquoise Coast attracting those who love the access to
                                    luxury living with the benefits of access to nature.
                                </p>
                                <p>
                                    Visit our Prime Property Turkey
                                    website to view villas for sale and contact us for more information about our sale
                                    and after-sell services.
                                </p>
                            <? endif; ?>
                            <? if ($title == "Buy Villa For Sale In Istanbul"): ?>
                                <div class="card-title mb-4" style="font-size: 1.3rem;font-weight: 800">
                                    <span class="blue-text"> More Information About </span> <span
                                            class="red-text"> <?= $title; ?> </span> :
                                </div>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Sense of security :
                                </h2>
                                <p class="text-justify">
                                    Overall Turkey is a very safe place to live. Istanbul is one of the world's largest
                                    cities and despite its size is exceptionally safe when compared to other metropoles.
                                    Scams and theft would be the most likely issues you would encounter. Most crimes are
                                    not violent and with common sense and safety precautions you should not face any
                                    issues in Istanbul.
                                </p>
                                <p class="text-justify">
                                    Most villas have home security systems and are in gated communities with guards and
                                    cameras for 24/7 protection. Driving in Turkey can be challenging, and we recommend
                                    driving defensively.
                                </p>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Amenities :
                                </h2>
                                <p class="text-justify">
                                    Most villas have home security systems and are in gated communities with guards and
                                    cameras for 24/7 protection. Driving in Turkey can be challenging, and we recommend
                                    driving defensively.
                                </p>
                                <p class="text-justify">
                                    Villas offer the same lavish lifestyle you can find at five-star hotels. There are
                                    villas available with multiple bedrooms, ensuite options, modern kitchens and
                                    terraces, balconies, saunas, hammams, and more. Top-quality white goods and
                                    construction materials are used in newer builds including luxury goods like marble
                                    and name brands. Prime Property Turkey will help guide you to the perfect property
                                    to suit your needs in the Istanbul area.
                                </p>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Property Aesthetics :
                                </h2>
                                <p class="text-justify">
                                    Istanbul has villas for every taste. Unlike the villas found in southern Turkey,
                                    villa designs in Istanbul are less homogenous and include historical villas.
                                </p>
                                <p class="text-justify">
                                    Historical villas retain their original features and have distinct architectural
                                    details such as fine woodwork that are protected by law. Villas can be small with
                                    two levels or many levels depending on the buyers' needs and zoning. Tony new
                                    developments offer up all the mod cons one wants from sleek lighting design,
                                    fittings, and the latest technology seamlessly included in the villa.
                                </p>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Affordable :
                                </h2>
                                <p class="text-justify">
                                    Istanbul real estate prices have been increasing at record-breaking rates in the
                                    past year. The price depends on the district in Istanbul and the quality of the
                                    villa. Sought-after property features like Bosphorus views, large lots, swimming
                                    pools, design and construction by well-known developers and architects all factor
                                    into the pricing. Quality villa prices can easily reach into millions of dollars,
                                    while there is still opportunity to buy new villas on the outskirts of the city for
                                    300-400,000 USD. Renovated seaside villas called yali run into the millions as do
                                    Ottoman-era wooden homes. New villas will be made in the latest styles with all the
                                    amenities that you can imagine. Istanbul has a robust rental market, and you can
                                    expect a hefty rate if you choose to rent out the property. Some investment villas
                                    command prices of tens of thousands of dollars in monthly rent.
                                </p>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Living in a green oasis :
                                </h2>
                                <p class="text-justify">
                                    Villas offer premium space in the big city. Ottoman mansions cling to the Bosphorus
                                    shores while the Asian side of the city is home to many first-rate gated communities
                                    in its green hills. Outdoor entertaining, space for pools, and other lavish
                                    facilities are part of the villa lifestyle in Istanbul.
                                </p>
                                <p>
                                    Visit our Prime Property Turkey
                                    website to view villas for sale and contact us for more information about our sale
                                    and after-sell services.
                                </p>
                            <? endif; ?>
                            <? if ($title == "Buy Villa For Sale In Kalkan"): ?>
                                <div class="card-title mb-4" style="font-size: 1.3rem;font-weight: 800">
                                    <span class="blue-text"> More Information About </span> <span
                                            class="red-text"> <?= $title; ?> </span> :
                                </div>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Location:
                                </h2>
                                <p class="text-justify">
                                    Picturesque Kalkan is a small fishing village and tourist resort on the
                                    Mediterranean coast. Kalkan has two bays and has expanded up from the harbor to new
                                    developments in the hills. Located on the D400 highway, the closest airport to
                                    Kalkan is Dalaman airport which is 1.5 hours away. Some people use the Antalya
                                    airport located three hours away which has more international flights.
                                </p>
                                <p class="text-justify">
                                    The highway splits the town into roughly two areas, with older villas and homes near
                                    the harbor and beach coves, and with the newer villas built in the hills on larger
                                    lots affording wonderful panoramic views. The town center is compact and seafront
                                    properties are scarce. Moving up into the hills, the villas are more modern with
                                    larger lots and privacy.
                                </p>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Sense of security :
                                </h2>
                                <p class="text-justify">
                                    Overall, Turkey is a very safe place to live. Kalkan is a small seaside town of
                                    about 4000 people. Less populated than other areas of the coast and mostly protected
                                    from mass tourism, due to its distance from the airport and natural mountainous and
                                    seaside terrain, Kalkan has been able to avoid unchecked growth. Aside from some
                                    infrequent petty theft, Kalkan is truly safe. Most villas have home security systems
                                    and/or are in gated communities with guards and cameras for 24/7 protection. Driving
                                    in Turkey can be challenging, and we recommend driving defensively but the roads are
                                    well kept unless you travel to far off rural roads.
                                </p>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Amenities :
                                </h2>
                                <p class="text-justify">
                                    Most villas have home security systems and are in gated communities with guards and
                                    cameras for 24/7 protection. Driving in Turkey can be challenging, and we recommend
                                    driving defensively.
                                </p>
                                <p class="text-justify">
                                    Villas with any and all amenities the buyer wants can be found. Typically, villas
                                    are in gated communities offering top security. The majority have large gardens that
                                    include private parking, pools, and BBQ areas to maximize your outdoor living
                                    enjoyment. Some developments also have shared communal areas allowing for residents
                                    to socialize with their neighbors.
                                </p>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Property aesthetics :
                                </h2>
                                <p class="text-justify">
                                    Older parts of Kalkan have their own unique historical architecture. Conservation
                                    efforts have been made to protect the homes lining the narrow streets winding up
                                    from the harbor. Made of stone with wooden balconies and courtyards, these homes are
                                    usually two-three stories high. Whitewashed buildings are found throughout the hills
                                    moving up from the coast. Whereas sleek contemporary villas are found throughout the
                                    hills. The hills above Kalkan offer privacy and many spaces have pools and views of
                                    the sparkling lights of the town and sweeping sea vistas.
                                </p>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Affordability :
                                </h2>
                                <p class="text-justify">
                                    Kalkan has a range of villas available. From the modestly priced older villas to
                                    top-of-the-line seafront luxury villas the prices range from $200,000 to millions of
                                    dollars. Kalkan is one of the best places to buy to let in Turkey with the highest
                                    return on investment reported and a long high season running from May to October.
                                    Limited space has pushed up demand for those interested in investing in Kalkan and
                                    it will get more difficult to find affordable quality villas in the future.
                                </p>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Living along the sunny Mediterranean shores :
                                </h2>
                                <p class="text-justify">
                                    In the summer months, you could be shopping at the local boutiques, sailing,
                                    swimming, or indulging in seafood and meze alongside the harbor. Kalkan has 300 days
                                    of sunshine a year and is further south than other Turkish seaside resorts making it
                                    a year-round destination. There are many historical sites to explore, one of the
                                    most famous beaches of Turkey, Kaputas, and the beautiful Salkikent Gorge are there
                                    to discover all within a short distance of the town.
                                </p>
                                <p>
                                    Visit our Prime Property Turkey
                                    website to view villas for sale and contact us for more information about our sale
                                    and after-sell services.
                                </p>
                            <? endif; ?>
                            <? if ($title == "Buy Apartment For Sale In Istanbul"): ?>
                                <div class="card-title mb-4" style="font-size: 1.3rem;font-weight: 800">
                                    <span class="blue-text"> More Information About </span> <span
                                            class="red-text"> <?= $title; ?> </span> :
                                </div>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Location:
                                </h2>
                                <p class="text-justify">
                                    Populated with nearly 16 million people, Istanbul straddles Europe and Asia and
                                    connects the Mediterranean and Black seas via the Bosphorus. A mosaic of distinct
                                    neighborhoods spreads out over 5,300 square kilometers, each with its own identity.
                                    The city's blend of historic and modern architecture, cultural and business
                                    enterprises, and lively street culture pulse with energy. The surrounding green
                                    hills that spill down to the blue waters of the Bosphorus make Istanbul one of the
                                    most beautiful places in the world. Istanbul is the main transport hub of the
                                    country with two airports conveniently located on both the European and Asian side.
                                    It is home to much of the major economic activity in Turkey with multiple business
                                    districts catering to local and international firms. .
                                </p>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Sense of security :
                                </h2>
                                <p class="text-justify">
                                    Overall Turkey is a very safe place to live. Istanbul is one of the world's largest
                                    cities and despite its size is exceptionally safe when compared to other metropoles.
                                    Scams and theft would be the most likely issues you would encounter. Most crimes are
                                    not violent and with common sense and safety precautions you should not face any
                                    issues in Istanbul.
                                </p>
                                <p class="text-justify">
                                    Making sure you have top-of-the-line locks and doors will help prevent home theft in
                                    apartments. Do not let strangers in your building. There are good home alarm systems
                                    available with subscription service and if you have an apartment that is part of a
                                    gated community, there will be guards and cameras for 24/7 protection. Driving in
                                    Turkey can be challenging, and we recommend driving defensively.
                                </p>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Amenities :
                                </h2>
                                <p class="text-justify">
                                    Most villas have home security systems and are in gated communities with guards and
                                    cameras for 24/7 protection. Driving in Turkey can be challenging, and we recommend
                                    driving defensively.
                                </p>
                                <p class="text-justify">
                                    Apartments with any and all amenities the buyer wants can be found. First, you
                                    should decide if you want a secured building with a doorman or an apartment in a
                                    gated community. Your other option is to buy a stand-alone unit in a building.
                                    Apartments in gated communities have amenities like shared pools, gyms, playgrounds,
                                    and parking. Some developments also have shared communal areas allowing for
                                    residents to socialize with their neighbors and shopping malls and restaurants are
                                    part of the development. Apartments in the most exclusive developments have
                                    concierge services.
                                </p>
                                <p class="text-justify">
                                    Apartments can offer the same lavish lifestyle you can find at five-star hotels.
                                    There are apartments available with multiple bedrooms and floors, ensuite options,
                                    modern kitchens and terraces, balconies, saunas, hammams, and more. Top-quality
                                    white goods and construction materials are used in newer builds including luxury
                                    goods like marble and name brands. Prime Property Turkey will help guide you to the
                                    perfect property to suit your needs in Istanbul.
                                </p>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Property Aesthetics :
                                </h2>
                                <p class="text-justify">
                                    There are a multitude of apartment styles to choose from, consider different styles
                                    like lofts, studios, duplexes, and more. Historical areas of Istanbul will have
                                    apartments with original features like wooden floors, high ceilings and crown
                                    molding whereas there are many contemporary options in brand new developments. You
                                    can find spectacular views from the top of skyscrapers or choose something lower to
                                    the ground with green space. There are unique pockets of architectural styles
                                    throughout the city like wooden homes that have been divided into apartments and
                                    huge developments on the outskirts of the city. You also have the option of buying
                                    an older build and renovating it to suit your style.
                                </p>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Affordability :
                                </h2>
                                <p class="text-justify">
                                    Apartments in Istanbul vary widely in price. With just $75,000 USD you can gain
                                    residency and although it is becoming more unusual you can still find apartments for
                                    under $100,000 USD in the areas further away from the city center. From the lower
                                    price point, you could also pay millions of dollars for an apartment in Istanbul in
                                    the most desirable neighborhoods and projects. Budget-minded investors can also
                                    investigate off-project buys and older units in developing areas in the city.
                                </p>
                                <h2 style="font-size: 1.1rem; font-weight: 700">
                                    Urban living in Istanbul :
                                </h2>
                                <p class="text-justify">
                                    Settle into the fast-paced life of Turkey's largest city with your very own
                                    apartment unit. With excellent transportation, entertainment, and professional and
                                    educational opportunities Istanbul is really the epicenter of the country where you
                                    can find everything. A world-class city that offers up a diverse array of lifestyle
                                    options has been beckoning people from around the world for centuries.
                                </p>
                                <p>
                                    Visit our Prime Property Turkey
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
<?php $this->load->view('web-site/ru/includes/footer'); ?>
<?php $this->load->view('web-site/includes/foot-load'); ?>
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
        $("#read-more").click(function () {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#collapse").offset().top - 100
            }, 2000);
        });

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

        $('#quickEnquireModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var recipient = button.data('whatever');
            var modal = $(this);
            modal.find('#modal_reference_id').val(recipient)
        });
    });
</script>
<script type="text/javascript">
    function set_favorite(value){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            if (this.responseText){
                location.reload();
            }
        }
        xhttp.open("POST", "<?= base_url();?>Favorite/set_favorite");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("send_value="+value);
    }
    function delete_favorite(value){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            if (this.responseText){
                location.reload();
            }
        }
        xhttp.open("POST", "<?= base_url();?>Favorite/del_favorite");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("send_value="+value);
    }
</script>
</body>
</html>