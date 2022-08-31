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
<title>Properties For Sale In <?= $cityValue; ?> , Turkey</title>
<meta name="description" content="the best suggestion about Property in  <?= $cityValue; ?> for sale in prime property turkey, pick your future real estate with Prime Property Turkey">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="<?= current_url(); ?>">
<meta property="og:title" content="Properties For Sale <?= $cityValue; ?> - Prime Property Turkey">
<meta property="og:description" content="the best suggestion about Property in  <?= $cityValue; ?> for sale in prime property turkey, pick your future real estate with Prime Property Turkey">
<meta property="og:image" content="https://www.primepropertyturkey.com/assets/web-site/images/base/Prime-Property-Turkey-build-logo.jpg">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="<?= current_url(); ?>">
<meta property="twitter:title" content="Properties For Sale <?= $cityValue; ?> - Prime Property Turkey">
<meta property="twitter:description" content="the best suggestion about Property in  <?= $cityValue; ?> for sale in prime property turkey, pick your future real estate with Prime Property Turkey">
<meta property="og:image" content="https://www.primepropertyturkey.com/assets/web-site/images/base/Prime-Property-Turkey-build-logo.jpg">
<link rel="canonical" href="<?= current_url(); ?>"/>

<style>
    .sold-out{
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
    .sold-out-badge{
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
    .is_commercial{
        position: absolute;
        left: 20px;
        top: 50px;
        background-color: #012169 ;
        color: white;
        padding: 5px 10px;
        border-radius: 10px;
        font-size: 0.7rem;
        font-weight: bold;
        color: white;
        opacity: 0.85;
    }
    .is_commercial-badge{
        background: #012169;
        color: white;

        border-radius: 10px;
        display: block;
        position: absolute;

        opacity: 0.95;
        font-weight: bold;
        font-size: 0.8rem;
        padding: 5px 10px;
        top: 8%;
        left: 3%;
    }
</style>
<style>
    svg {
        cursor: pointer;
    }
</style>
</head>
<? if (isset($page_id)) {
    $page_id = $page_id;
} else {
    $page_id = 0;
} ?>
<body>
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
                                        <? foreach ($cityNames as $value){ ?>
                                            <option value="<?= $value;?>"><?= $value;?></option>
                                        <? } ?>
                                    </select>
                                </div>
                                <div class="col-lg-1 my-1" id="Type">
                                    <select name="Type" id="property_type" class="form-control ">
                                        <option value="All" selected>Type</option>
                                        <option value="All">All</option>
                                        <? foreach ($ProType as $value){ ?>
                                            <option value="<?= $value;?>"><?= $value;?></option>
                                        <? } ?>
                                    </select>
                                </div>
                                <div class="col-lg-2 my-1" id="min_price">
                                    <select name="min_price" class="form-control ">
                                        <option value="min" selected>Min Price</option>
                                        <option value="min">0</option>
                                        <option value="100000">&#36; 100.000 </option>
                                        <option value="150000">&#36; 150.000 </option>
                                        <option value="200000">&#36; 200.000  </option>
                                        <option value="250000">&#36; 250.000 </option>
                                        <option value="300000">&#36; 300.000 </option>
                                        <option value="500000">&#36; 500.000 </option>
                                        <option value="1000000">&#36; 1 M </option>
                                    </select>
                                </div>
                                <div class="col-lg-2 my-1" id="max_price">
                                    <select class="form-control" name="max_price">
                                        <option value="5000000" selected>Max Price</option>
                                        <option value="100000">&#36; 100.000 </option>
                                        <option value="150000">&#36; 150.000 </option>
                                        <option value="200000">&#36; 200.000  </option>
                                        <option value="250000">&#36; 250.000 </option>
                                        <option value="300000">&#36; 300.000  </option>
                                        <option value="500000">&#36; 500.000 </option>
                                        <option value="1000000">&#36; 1 M </option>
                                        <option value="5000000">&#36; 1 M+ </option>
                                    </select>
                                </div>
                                <div class="col-lg-2 my-1" id="bedroom">
                                    <select class="form-control" name="bedroom" id="property_bed">
                                        <option value="All" selected>Bedrooms</option>
                                        <? foreach ($proBed as $value){ ?>
                                            <option value="<?= $value;?>"><?= $value;?></option>
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
    <? if ($city_description_show){ ?>
        <? if ($cityValue == 'Istanbul') { ?>
            <section id="istanbulMap" class="istanbulMap ">
                <div class="container-fluid container-lg">
                    <div class="row text-center justify-content-center">
                        <div class="col-12">
                            <div class="ui segment" id="canvas2"
                                 style="background-color:white;">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" baseProfile="full" viewBox="0 0 1024 600">
                                    <rect width="100%" height="100%" fill="#ffffff"/>
                                    <? $this->load->view('web-site/properties/map/istanbul/map-shadow'); ?>
                                    <? $this->load->view('web-site/properties/map/istanbul/surface'); ?>
                                    <? $this->load->view('web-site/properties/map/istanbul/numbers-on-map'); ?>
                                    <? $this->load->view('web-site/properties/map/istanbul/side-list'); ?>
                                    <? $this->load->view('web-site/properties/map/istanbul/pop-up'); ?>

                                    <path d="M -5 -5 L 82.4785 -5 L 82.4785 43 L -5 43 L -5 -5 Z"
                                          fill="rgba(255,255,255,0)" fill-opacity="0" stroke="#ccc" stroke-width="0"
                                          paint-order="fill" stroke-opacity="1" stroke-dasharray=""
                                          stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                          transform="matrix(1,0,0,1,5,557)" clip-path="none"/>
                                    <path d="M -5 -5 L 5 -5 L 5 5 L -5 5 L -5 -5 Z" fill="none" fill-opacity="1"
                                          stroke="#ccc" stroke-width="0" paint-order="fill" stroke-opacity="1"
                                          stroke-dasharray="" stroke-linecap="butt" stroke-linejoin="miter"
                                          stroke-miterlimit="10" transform="matrix(1,0,0,1,895,300)" clip-path="none"/>
                                    <path fill="rgba(255,255,255,0)" fill-opacity="0" stroke="#ccc" stroke-width="0"
                                          paint-order="fill" stroke-opacity="1" stroke-dasharray=""
                                          stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                          transform="matrix(1,0,0,1,15,10)" clip-path="none"/>
                                    <defs>
                                        <filter id="f1" x="-100%" y="-100%" width="1000%" height="1000%">
                                            <feOffset result="offOut" in="SourceGraphic" dx="-3.5" dy="3.5"></feOffset>
                                            <feColorMatrix result="matrixOut" in="offOut" type="matrix"
                                                           values="0.2 0 0 0 0 0 0.2 0 0 0 0 0 0.2 0 0 0 0 0 1 0"></feColorMatrix>
                                            <feGaussianBlur result="blurOut" in="matrixOut"
                                                            stdDeviation="8"></feGaussianBlur>
                                            <feBlend in="SourceGraphic" in2="blurOut" mode="normal"></feBlend>
                                        </filter>
                                    </defs>
                                </svg>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        <? } ?>
        <section id="about-city">
            <div class="container">
                <div class="row">
                    <div class="col-12 py-3">
                        <div class="card py-3 city-card">
                            <div class="car-body py-2 px-1">
                                <h1 class="text-center py-3 px-2">
                                    Properties For Sale In <span class="red-text"><?= $cityValue; ?></span> , Turkey
                                </h1>
                                <div class="border"></div>
                                <p class="px-3 pt-2 text-justify">
                                    <?= $CityIntroduce['introduce']; ?>
                                </p>
                                <div id="collapse">
                                    <p class="px-3 text-justify">
                                        <?= $CityIntroduce['moreDescription']; ?>
                                    </p>
                                </div>
                                <? if ($cityValue!='Kalkan' and $cityValue!='Kas' and $cityValue!='Gocek' and $cityValue!='Izmir'){ ?>
                                <button class="py-1 px-3 pb-3" id="read-more">
                                    Read More
                                </button>
                                <? } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <? } ?>
    <section id="content" class="py-3">
        <div class="container">
            <div class="row">
                <? if (isset($SEO_BAR)){ ?>
                        <? if ($SEO_BAR['City']=='All') {$SEO_BAR['City']='Turkey';}?>
                        <? if ($SEO_BAR['Type']=='All') {$SEO_BAR['Type']='Property';}?>
                        <? if ($SEO_BAR['bedroom']=='All') {$SEO_BAR['bedroom']=null;}?>
                        <? if ($SEO_BAR['max_price']=='5000000') {$SEO_BAR['max_price']='$1+ Million  ';}?>
                        <? if ($SEO_BAR['max_price']=='1000000') {$SEO_BAR['max_price']='$1 Million  ';}?>
                        <? if ($SEO_BAR['max_price']=='500000') {$SEO_BAR['max_price']='$500.000  ';}?>
                        <? if ($SEO_BAR['max_price']=='300000') {$SEO_BAR['max_price']='$300.000  ';}?>
                        <? if ($SEO_BAR['max_price']=='250000') {$SEO_BAR['max_price']='$250.000  ';}?>
                        <? if ($SEO_BAR['max_price']=='200000') {$SEO_BAR['max_price']='$200.000  ';}?>
                        <? if ($SEO_BAR['max_price']=='150000') {$SEO_BAR['max_price']='$150.000  ';}?>
                        <? if ($SEO_BAR['max_price']=='100000') {$SEO_BAR['max_price']='$100.000  ';}?>
                   <div class="card col-12">
                       <div class="card-body text-center">
                           <h2 class="text-center">
                              Buy <? if ($SEO_BAR['bedroom']!=null){ ?><?= $SEO_BAR['bedroom']; ?> Bedroom <? } ?> <?= $SEO_BAR['Type']; ?> In <?= $SEO_BAR['City']; ?> Under <?= $SEO_BAR['max_price']; ?>
                           </h2>
                       </div>
                   </div>
                <? } ?>
                <div class="col-lg-8">
                    <? if ($property_result) { ?>
                    <? foreach ($property_result as $value) { ?>
                            <? $image_name = str_replace('assets/thumbnail/', '', $value->Property_thumbnail);
                            $image_name_webp = substr($image_name,0,strpos($image_name,'.jpg')).".webp";
                            if ($image_name_webp==''){
                                $image_name_webp = substr($image_name,0,strpos($image_name,'.png')).".webp";
                            }
                            if ($image_name_webp==''){
                                $image_name_webp = substr($image_name,0,strpos($image_name,'.jpeg')).".webp";
                            }
                            ?>
                        <div class="item mt-2 mb-4">
                            <div class="card d-md-none feature-sm-back">
                                <a href="<?= base_url(); ?>properties/<?= $value->url_slug; ?>" >
                                <img class="card-img-top img-fluid"
                                     src="<?= base_url(); ?><?= "assets/web-site/images/properties/P_Thumb/".$image_name_webp; ?>"
                                     alt="<?= $value->Property_title; ?>">
                                </a>
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <div class="card-title text-center">
                                            <span class="card-type-badge">
                                                <?= $value->Property_type; ?>
                                            </span>
                                                <? if ($value->SoldOut){ ?>
                                                   <span class="sold-out-badge">
                                                      Sold Out
                                                    </span>
                                                <?}?>
                                            <? if ($value->Property_type!='Commercial' and $value->is_commercial=='1'){ ?>
                                                <span class="is_commercial-badge">
                                                      Commercial
                                                    </span>
                                            <?}?>
                                            <span class="card-favorite">
                                                <? if (is_favored($value->Property_id)){ ?>
                                                    <a href="<?= base_url();?>Favorite/del_favorite/<?= $value->Property_id; ?>" class="red-text" rel="nofollow">
                                                        <i class="fas fa-heart red-text" ></i>
                                                    </a>
                                                <?}else{?>
                                                    <a href="<?= base_url();?>Favorite/set_favorite/<?= $value->Property_id; ?>" class="text-reset" rel="nofollow">
                                                        <i class="far fa-heart"></i>
                                                    </a>
                                                <? } ?>
                                        </span>
                                            <a href="<?= base_url(); ?>properties/<?= $value->url_slug; ?>" class="text-reset text-left font-weight-bold px-2 py-2 d-block blue-text">
                                                <h3 style="font-size: 1.1rem;line-height: 1.8rem">
                                                    <?= $value->Property_title; ?>
                                                </h3>
                                            </a>
                                        </div>
                                        <div class="row justify-content-around align-items-center card-speciality">
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico2.webp"
                                                     alt=""
                                                     class="img-fluid">
                                                <span class="mx-1"><?= $value->Property_location; ?></span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico3.webp"
                                                     alt=""
                                                     class="img-fluid">
                                                <span class="mx-1"><?= $value->Property_Bedrooms; ?></span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico4.webp"
                                                     alt=""
                                                     class="img-fluid">
                                                <span class="mx-1"><?= $value->Property_Bathrooms; ?></span>
                                            </div>
                                            <div class="align-items-center">
                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico1.webp"
                                                     alt="" class="img-fluid"
                                                >
                                                <span class="mx-1"><?= $value->Property_living_space; ?></span>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center my-2" style="font-size: 1.2rem">
                                            <span class="red-text font-weight-bold">
                                               <? if (!$value->SoldOut and $value->Property_price!=0){ ?>
                                                <? if ($this->session->has_userdata('currency')){
                                                    switch ($this->session->userdata('currency')){
                                                        case 'USD': ?>
                                                            <i class="fas fa-dollar-sign"></i>
                                                            <?=  number_format((int)ceil($value->Property_price)); ?>
                                                            <?
                                                            break;
                                                        case 'TRY': ?>
                                                            <i class="fas fa-lira-sign"></i>
                                                            <?=  number_format((int)ceil($value->Property_price) *$currency_exchange_data->try);?>

                                                            <?
                                                            break;
                                                        case 'EUR': ?>
                                                            <i class="fas fa-euro-sign"></i>
                                                            <?=  number_format((int)ceil($value->Property_price) *$currency_exchange_data->euro);?>
                                                            <?
                                                            break;
                                                        case 'GBP': ?>
                                                            <i class="fas fa-pound-sign"></i>
                                                            <?=  number_format((int)ceil($value->Property_price) *$currency_exchange_data->gpt);?>
                                                            <?
                                                            break;
                                                    }
                                                }else{ ?>
                                                    <i class="fas fa-dollar-sign"></i>
                                                    <?=  number_format((int)ceil($value->Property_price)); ?>
                                                <? }
                                               }else {?>
                                                        Contact US
                                                <?} ?>
                                            </span>
                                        </div>
                                        <div class="row my-2">
                                            <p class="text-left px-4">
                                                <?=  substr(strip_tags($value->Property_overview),0,100)."...."; ?>
                                            </p>
                                        </div>
                                        <div class="row justify-content-around align-items-center py-2">
                                            <a href="<?= base_url(); ?>properties/<?= $value->url_slug; ?>" class="btn btn-outline-danger btn-sm d-flex my-1">
                                                View Details
                                            </a>
                                            <a class="btn btn-danger font-weight-bold btn-sm d-flex my-1" data-toggle="modal"
                                               data-whatever="<?= $value->Property_referenceID; ?>" data-target="#quickEnquireModal" rel="nofollow">
                                                Quick Enquiry
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card d-none d-md-block">
                                <div class="card-body">
                                    <div class="row justify-content-around">
                                        <div class="col-5 d-flex">
                                            <a href="<?= base_url(); ?>properties/<?= $value->url_slug; ?>" >

                                            <img
                                                    src="<?= base_url(); ?><?= "assets/web-site/images/properties/P_Thumb/".$image_name_webp; ?>"
                                                    alt="<?= $value->Property_title; ?>"
                                                    class="img-fluid">
                                            </a>
                                            <div class="type">
                                                <?= $value->Property_type; ?>
                                            </div>
                                                <? if ($value->SoldOut){ ?>
                                                <div class="sold-out">
                                                    Sold Out
                                                </div>
                                                <?}?>
                                            <? if ($value->Property_type!='Commercial' and $value->is_commercial=='1'){ ?>
                                                <div class="is_commercial">
                                                    Commercial
                                                </div>
                                            <?}?>
                                            <div class="favorite">
                                                <? if (is_favored($value->Property_id)){ ?>
                                                    <a href="<?= base_url();?>Favorite/del_favorite/<?= $value->Property_id; ?>" class="red-text" rel="nofollow">
                                                        <i class="fas fa-heart red-text" ></i>
                                                    </a>
                                                <?}else{?>
                                                    <a href="<?= base_url();?>Favorite/set_favorite/<?= $value->Property_id; ?>" class="text-reset" rel="nofollow">
                                                        <i class="far fa-heart"></i>
                                                    </a>
                                                <? } ?>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="row my-3 justify-content-center px-4 text-center">
                                                <a href="<?= base_url(); ?>properties/<?= $value->url_slug; ?>"
                                                   class="text-reset font-weight-bold text-left blue-text" title="<?= $value->Property_title;  ?>" style="text-decoration: none">
                                                    <h3 style="font-size: 1.1rem;line-height: 1.8rem"><?= $value->Property_title; ?></h3>
                                                </a>
                                            </div>
                                            <div class="row my-2 justify-content-center align-items-center card-speciality">
                                                <div class="d-flex align-items-center mx-2">
                                                    <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico2.webp"
                                                         alt=""
                                                         class="img-fluid">
                                                    <span class="mx-1">
                                                        <?= $value->Property_location; ?>
                                                    </span>
                                                </div>
                                                <div class="d-flex align-items-center mx-2">
                                                    <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico3.webp"
                                                         alt=""
                                                         class="img-fluid">
                                                    <span class="mx-1"><?= $value->Property_Bedrooms; ?></span>
                                                </div>
                                                <div class="d-flex align-items-center mx-2">
                                                    <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico4.webp"
                                                         alt=""
                                                         class="img-fluid">
                                                    <span class="mx-1"><?= $value->Property_Bathrooms; ?></span>
                                                </div>
                                                <div class="align-items-center mx-2">
                                                    <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico1.webp"
                                                         alt="" class="img-fluid">
                                                    <span class="mx-1"><?= $value->Property_living_space; ?></span>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center my-3">
                                            <span class="red-text font-weight-bold">
                                                <? if (!$value->SoldOut and $value->Property_price!=0){ ?>
                                                <? if ($this->session->has_userdata('currency')){
                                                    switch ($this->session->userdata('currency')){
                                                        case 'USD': ?>
                                                            <i class="fas fa-dollar-sign"></i>
                                                            <?=  number_format((int)ceil($value->Property_price)); ?>
                                                            <?
                                                            break;
                                                        case 'TRY': ?>
                                                            <i class="fas fa-lira-sign"></i>
                                                            <?=  number_format((int)ceil($value->Property_price) *$currency_exchange_data->try);?>

                                                            <?
                                                            break;
                                                        case 'EUR': ?>
                                                            <i class="fas fa-euro-sign"></i>
                                                            <?=  number_format((int)ceil($value->Property_price) *$currency_exchange_data->euro);?>
                                                            <?
                                                            break;
                                                        case 'GBP': ?>
                                                            <i class="fas fa-pound-sign"></i>
                                                            <?=  number_format((int)ceil($value->Property_price) *$currency_exchange_data->gpt);?>
                                                            <?
                                                            break;
                                                    }
                                                }else{ ?>
                                                    <i class="fas fa-dollar-sign"></i>
                                                    <?=  number_format((int)ceil($value->Property_price)); ?>
                                                <? }
                                                }else { ?>
                                                    Contact Us
                                                <? }  ?>
                                            </span>
                                            </div>
                                            <div class="row my-2 px-2">
                                                <p class="text-left mx-3 px-1">
                                                    <?=  substr(strip_tags($value->Property_overview),0,190)."...."; ?>
                                                </p>
                                            </div>
                                            <div class="row justify-content-end align-items-center my-2 buttons">
                                                <a href="<?= base_url(); ?>properties/<?= $value->url_slug; ?>"
                                                   class="btn btn-outline-danger d-flex my-1 mx-1">
                                                    View Details
                                                </a>
                                                <a class="btn btn-danger d-flex my-1 mx-3 font-weight-bold" data-toggle="modal"
                                                   data-whatever="<?= $value->Property_referenceID; ?>" data-target="#quickEnquireModal" rel="nofollow">
                                                    Quick Enquiry
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <? } ?>
                        <? $cityValue = $this->uri->segment(2); ?>
                    <? if ($pages>0){ ?>
                        <div class="row py-3 px-1 text-center justify-content-center">
                            <div class="col">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" rel="nofollow" href="<?= base_url(); ?>Properties/<?= $cityValue; ?>" tabindex="-1" title="FIRST"> <i
                                                        class="fas fa-angle-double-left"></i> </a>
                                        </li>
                                        <? if ($page_id < 2) { ?>
                                            <? for ($i = 0; $i <= $page_id+2; $i++) { ?>
                                                <? if ($i>$pages){ break; } ?>
                                                <? if ((int)$page_id == $i) { ?>
                                                    <li class="page-item text-danger"><a rel="nofollow" class="page-link text-danger"
                                                                                         href="<?= base_url(); ?>properties/<?= $cityValue; ?>/<?= $i; ?>"><?= $i + 1; ?></a>
                                                    </li>
                                                <? } else { ?>
                                                    <li class="page-item"><a class="page-link" rel="nofollow"
                                                                             href="<?= base_url(); ?>properties/<?= $cityValue; ?>/<?= $i; ?>"><?= $i + 1; ?></a>
                                                    </li>
                                                <? } ?>
                                            <? } ?>
                                        <? }elseif ($page_id > $pages-2){ ?>
                                            <? for ($i = (int)$page_id-2; $i <= $pages; $i++) { ?>
                                                <? if ($i>$pages){ break; } ?>
                                                <? if ((int)$page_id == $i) { ?>
                                                    <li class="page-item text-danger"><a class="page-link text-danger" rel="nofollow"
                                                                                         href="<?= base_url(); ?>Properties/<?= $cityValue; ?>/<?= $i; ?>"><?= $i + 1; ?></a>
                                                    </li>
                                                <? } else { ?>
                                                    <li class="page-item"><a class="page-link" rel="nofollow"
                                                                             href="<?= base_url(); ?>Properties/<?= $cityValue; ?>/<?= $i; ?>"><?= $i + 1; ?></a>
                                                    </li>
                                                <? } ?>
                                            <? } ?>
                                        <? } else {?>
                                            <? for ($i = (int)$page_id-2; $i <= $page_id+2; $i++) { ?>
                                                <? if ($i>$pages){ break; } ?>
                                                <? if ((int)$page_id == $i) { ?>
                                                    <li class="page-item text-danger"><a class="page-link text-danger" rel="nofollow"
                                                                                         href="<?= base_url(); ?>properties/<?= $cityValue; ?>/<?= $i; ?>"><?= $i + 1; ?></a>
                                                    </li>
                                                <? } else { ?>
                                                    <li class="page-item"><a class="page-link" rel="nofollow"
                                                                             href="<?= base_url(); ?>properties/<?= $cityValue; ?>/<?= $i; ?>"><?= $i + 1; ?></a>
                                                    </li>
                                                <? } ?>
                                            <? } ?>
                                        <? } ?>
                                        <li class="page-item">
                                            <a class="page-link" rel="nofollow" href="<?= base_url(); ?>Properties/<?= $cityValue; ?>/<?= $pages; ?>" title="LAST"> <i
                                                        class="fas fa-angle-double-right"></i> </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    <? } ?>
                    <? }else { ?>
                            <div class="card">
                                <div class="card-body text-center">
                                    <p>
                                        "Please get in touch with us to get consultation about properties in this neighborhood"
                                    </p>
                                    <a href="<?= base_url(); ?>contact_us" class="btn btn-primary">Contact Us</a>
                                </div>
                            </div>
                    <? } ?>
                </div>
                <div class="col-lg-4">
                    <div class="card side contact my-2" id="side-contact-us" >
                        <?php $this->load->view('web-site/includes/side-contact-us'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- Modal -->
<div class="modal fade" id="quickEnquireModal" tabindex="-1" aria-labelledby="quickEnquireModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="quickEnquireModalLabel">PROPERTY ENQUIRY</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url(); ?>Post/enquire" id="enquiry" onsubmit="return checkPhone();">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Full Name:" required  form="enquiry" name="info">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="modal_phone" class="form-control" placeholder="Phone" name="phone"  form="enquiry" required>
                                <div id="modal_phone_error" style="display: none;color: white;font-size: 0.7rem;" class="text-center">
                                    <b>
                                        Please fill country code with + at beginning
                                    </b>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email:" name="email" form="enquiry" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="note" id="note" cols="30" rows="3" class="form-control" placeholder="Note" form="enquiry"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="reference_id" id="modal_reference_id"  form="enquiry">
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
    function checkPhone() {
        let phone_number = document.getElementById('modal_phone').value;
        if (phone_number.charAt(0)!='+'){
            document.getElementById('modal_phone').focus();
            document.getElementById('modal_phone_error').style.display='block';
            return false;
        }
    }
</script>
<script src="<?= base_url();?>assets/web-site/js/istanbul-map.js" type="text/javascript"></script>
<script type="text/javascript">
    let ilce_name = "<?= $this->uri->segment(2); ?>";
    let ilce_id = istanbul_ilce_list.indexOf(ilce_name);
    for (let i = 1; i <= 39;i++){
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
    $(document).ready(function(){
        $('#city_value').change(function(){
            let City = $(this).val();
            let pro_type = $('#property_type').val();
            let pro_bed = $('#property_bed').val();
            if (City !='All'){
                $.ajax({
                    url:'<?=base_url()?>AjaxRequest/propertyType',
                    method: 'post',
                    data: {City: City},
                    dataType: 'json',
                    success: function(response){
                        $('#property_type').text('');
                        $('#property_type').append($('<option>', {
                            value: 'All',
                            text : 'Type'
                        }));
                        $('#property_type').append($('<option>', {
                            value: 'All',
                            text : 'All'
                        }));
                        $.each(response, function (i, item) {
                            $('#property_type').append($('<option>', {
                                value: item.Property_type,
                                text : item.Property_type
                            }));
                        });
                    }
                });
                $.ajax({
                    url:'<?=base_url()?>AjaxRequest/propertyBed',
                    method: 'post',
                    data: {City: City},
                    dataType: 'json',
                    success: function(response){
                        $('#property_bed').text('');
                        $('#property_bed').append($('<option>', {
                            value: 'All',
                            text : 'Bedrooms'
                        }));
                        $('#property_bed').append($('<option>', {
                            value: 'All',
                            text : 'All'
                        }));
                        $.each(response, function (i, item) {
                            $('#property_bed').append($('<option>', {
                                value: item.Property_Bedrooms,
                                text : item.Property_Bedrooms
                            }));
                        });
                    }
                });
            }else{
                $('#property_type').text('');
                $('#property_type').append($('<option>', {
                    value: 'All',
                    text : 'Type'
                }));
                $('#property_type').append($('<option>', {
                    value: 'All',
                    text : 'All'
                }));
                <? foreach ($ProType as $value){ ?>
                $('#property_type').append($('<option>', {
                    value: '<?= $value; ?>',
                    text : '<?= $value; ?>'
                }));
                <? } ?>
                $('#property_bed').text('');
                $('#property_bed').append($('<option>', {
                    value: 'All',
                    text : 'Bedrooms'
                }));
                $('#property_bed').append($('<option>', {
                    value: 'All',
                    text : 'All'
                }));
                <? foreach ($proBed as $value){ ?>
                $('#property_bed').append($('<option>', {
                    value: '<?= $value; ?>',
                    text : '<?= $value; ?>'
                }));
                <? } ?>
            }
        });
        $('#property_type').change(function(){
            let pro_type = $(this).val();
            let City = $('#city_value').val();
            if (pro_type !='All'){
                $.ajax({
                    url:'<?=base_url()?>AjaxRequest/propertyTypeBedroom',
                    method: 'post',
                    data: {City: City,pro_type:pro_type},
                    dataType: 'json',
                    success: function(response){
                        $('#property_bed').text('');
                        $('#property_bed').append($('<option>', {
                            value: 'All',
                            text : 'Bedrooms'
                        }));
                        $('#property_bed').append($('<option>', {
                            value: 'All',
                            text : 'All'
                        }));
                        $.each(response, function (i, item) {
                            $('#property_bed').append($('<option>', {
                                value: item.Property_Bedrooms,
                                text : item.Property_Bedrooms
                            }));
                        });
                    }
                });
            }else{
                if (City !='All'){
                    $.ajax({
                        url:'<?=base_url()?>AjaxRequest/propertyBed',
                        method: 'post',
                        data: {City: City},
                        dataType: 'json',
                        success: function(response){
                            $('#property_bed').text('');
                            $('#property_bed').append($('<option>', {
                                value: 'All',
                                text : 'Bedrooms'
                            }));
                            $('#property_bed').append($('<option>', {
                                value: 'All',
                                text : 'All'
                            }));
                            $.each(response, function (i, item) {
                                $('#property_bed').append($('<option>', {
                                    value: item.Property_Bedrooms,
                                    text : item.Property_Bedrooms
                                }));
                            });
                        }
                    });
                }else{
                    $('#property_bed').text('');
                    $('#property_bed').append($('<option>', {
                        value: 'All',
                        text : 'Bedrooms'
                    }));
                    $('#property_bed').append($('<option>', {
                        value: 'All',
                        text : 'All'
                    }));
                    <? foreach ($proBed as $value){ ?>
                    $('#property_bed').append($('<option>', {
                        value: '<?= $value; ?>',
                        text : '<?= $value; ?>'
                    }));
                    <? } ?>
                }
            }
        });
    });
</script>
</body>
</html>