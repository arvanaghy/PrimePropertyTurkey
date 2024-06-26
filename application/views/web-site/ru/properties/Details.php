<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php if (isset($_GET['reference']) and $_GET['reference']='newsletter'){
    $myfile = fopen("newsletter-statistics.txt", "a+") or die("Unable to open file!");
    $date = date('m/d/Y h:i:s a', time());
    $txt = $date."\n";
    fwrite($myfile, $txt);
    fclose($myfile);
} ?>
<?php header('Cache-Control: no cache'); //disable validation of form by the browser ?>
<?php $this->load->view('web-site/ru/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/find-property.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/cities-property.css">
<link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/phone-input.css">
<? if ($cityValue!='Search'){ ?>
<title>Объекты недвижимости на продажу в <?= $this->uri->segment(3); ?> - <?= $this->uri->segment(3); ?> Real Estate</title>

<meta name="description" content="Лучшее предложение  продажа недвижимости в  <?= $this->uri->segment(3); ?><? if ($this->uri->segment(3)!='Istanbul' and $cityValue == 'Istanbul' ): ?>, Istanbul <? endif; ?> выбирайте вашу будущую недвижимость с Prime Property Turkey">
<? if (isset($page_id)) {
    $page_id = $page_id;
    if ($page_id!=0){ ?>
        <link rel="canonical" href="https://www.primepropertyturkey.com/ru/properties/<?= $this->uri->segment(3); ?><? if ($page_id!=0){ echo '/'.$page_id;}?>"/>
        <link rel="alternate" hreflang="x-default" href="https://www.primepropertyturkey.com/properties/<?= $this->uri->segment(3); ?><? if ($page_id!=0){ echo '/'.$page_id;}?>" />
        <link rel="alternate" hreflang="en" href="https://www.primepropertyturkey.com/properties/<?= $this->uri->segment(3); ?><? if ($page_id!=0){ echo '/'.$page_id;}?>"" />
        <link rel="alternate" hreflang="ru" href="https://www.primepropertyturkey.com/ru/properties/<?= $this->uri->segment(3); ?><? if ($page_id!=0){ echo '/'.$page_id;}?>" />
    <?php }else{ ?>
        <link rel="canonical" href="https://www.primepropertyturkey.com/ru/Properties/<?= $this->uri->segment(3); ?>"/>
        <link rel="alternate" hreflang="x-default" href="https://www.primepropertyturkey.com/Properties/<?= $this->uri->segment(3); ?>" />
        <link rel="alternate" hreflang="en" href="https://www.primepropertyturkey.com/Properties/<?= $this->uri->segment(3); ?>" />
        <link rel="alternate" hreflang="ru" href="https://www.primepropertyturkey.com/ru/Properties/<?= $this->uri->segment(3); ?>" />
    <?php } ?>
<?php
} else {
    $page_id = 0; ?>
    <link rel="canonical" href="https://www.primepropertyturkey.com/ru/Properties/<?= $this->uri->segment(3); ?>"/>
        <link rel="alternate" hreflang="x-default" href="https://www.primepropertyturkey.com/Properties/<?= $this->uri->segment(3); ?>" />
        <link rel="alternate" hreflang="en" href="https://www.primepropertyturkey.com/Properties/<?= $this->uri->segment(3); ?>" />
        <link rel="alternate" hreflang="ru" href="https://www.primepropertyturkey.com/ru/Properties/<?= $this->uri->segment(3); ?>" />
<?php } ?>
<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://www.primepropertyturkey.com/ru/Properties/<?= $this->uri->segment(3); ?>/<? if ($page_id!=0){ echo $page_id.'/';}?>">
<meta property="og:title" content="Properties For Sale <?= $cityValue; ?> - Prime Property Turkey">
<meta property="og:description" content="the best suggestion about Property in  <?= $cityValue; ?> for sale in prime property turkey, pick your future real estate with Prime Property Turkey">
<meta property="og:image" content="https://www.primepropertyturkey.com/assets/web-site/images/base/Prime-Property-Turkey-build-logo.jpg">
<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://www.primepropertyturkey.com/Properties/<?= $this->uri->segment(3); ?>/<? if ($page_id!=0){ echo $page_id.'/';}?>">
<meta property="twitter:title" content="Properties For Sale <?= $cityValue; ?> - Prime Property Turkey">
<meta property="twitter:description" content="the best suggestion about Property in  <?= $cityValue; ?> for sale in prime property turkey, pick your future real estate with Prime Property Turkey">
<meta property="og:image" content="https://www.primepropertyturkey.com/assets/web-site/images/base/Prime-Property-Turkey-build-logo.jpg">
<?php }else{ ?>
    <title>Объекты недвижимости на продажу в <?= $this->uri->segment(3); ?> -  Недвижимость</title>

    <meta name="description" content="the best suggestion about Properties for sale in in prime property turkey, pick your future real estate with Prime Property Turkey">
    <? if (isset($page_id)) {
        $page_id = $page_id;
        if ($page_id!=0){ ?>
        <?php }else{ ?>
            <link rel="canonical" href="https://www.primepropertyturkey.com/ru/Properties/"/>
        <?php } ?>
        <?php
    } else {
        $page_id = 0; ?>
        <link rel="canonical" href="https://www.primepropertyturkey.com/ru/Properties/"/>
    <?php } ?>
<?php } ?>
<script src="https://www.google.com/recaptcha/api.js" ></script>
<style type="text/css">
    svg {
        cursor: pointer;
    }
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
    .display-mah-element{
        display: inline-block !important;
    }
    .hide-mah-element{
        display: none;
    }
</style>
</head>
<body>
<?php $this->load->view('web-site/ru/includes/top-section'); ?>
<section id="Find-Your-Property" class="Find-Your-Property m-3">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center my-2 py-3">
            <div class="find-title">
                <small>
                        <span class="pre">
                            Найти
                        </span>
                    <span class="pro red-text">
                          турецкую
                        </span>
                    <span class="pre">
                          недвижимость
                        </span>
                </small>
            </div>
            <div class="find-form">
                <form action="<?= base_url(); ?>Ru_Find" method="post"
                      class="justify-content-around text-right">
                    <div class="row my-2 justify-content-around text-right">
                        <div class="col-lg-2 my-1" id="City">
                            <select name="City" id="city_value" class="form-control">
                                <option value="All" selected>Город</option>
                                <option value="All">All</option>
                                <? foreach ($cityNames as $value) { ?>
                                    <option value="<?= $value; ?>"><?= $value; ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="col-lg-1 my-1" id="Type">
                            <select name="Type" id="property_type" class="form-control ">
                                <option value="All" selected>Вид недвижимости</option>
                                <option value="All">All</option>
                                <? foreach ($ProType as $value) { ?>
                                    <option value="<?= $value; ?>"><?= $value; ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="col-lg-2 my-1" id="min_price">
                            <select name="min_price" class="form-control ">
                                <option value="min" selected>Минимальная стоимость</option>
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
                                <option value="5000000" selected>Максимальная стоимость</option>
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
                                <option value="All" selected>Комнат</option>
                                <? foreach ($proBed as $value) { ?>
                                    <option value="<?= $value; ?>"><?= $value; ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="col-lg-2 my-1">
                            <input type="text" placeholder="ID объекта" class="form-control" name="referenceID">
                        </div>
                        <div class="col-lg-1 justify-content-center my-1">
                            <input type="submit" class="btn red-button btn-block" value="Поиск">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
    <? if ($city_description_show){ ?>
        <? if ($cityValue == 'Istanbul') { ?>
            <section id="istanbulMap" class="istanbulMap " style="background-color: white;margin-left: 15px;margin-right: 15px">
                <div class="container-fluid container-lg" >
                    <div class="row text-center justify-content-center">
                        <div class="col-12">
                            <div class="ui segment" id="canvas2"
                                 style="background-color:white;">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" baseProfile="full" viewBox="0 0 1024 600">
                                    <rect width="100%" height="100%" fill="#ffffff"/>
                                    <? $this->load->view('web-site/ru/properties/map/istanbul/map-shadow'); ?>
                                    <? $this->load->view('web-site/ru/properties/map/istanbul/surface'); ?>
                                    <? $this->load->view('web-site/ru/properties/map/istanbul/numbers-on-map'); ?>
                                    <? $this->load->view('web-site/ru/properties/map/istanbul/side-list'); ?>
                                    <? $this->load->view('web-site/ru/properties/map/istanbul/pop-up'); ?>
                                    <? $this->load->view('web-site/ru/properties/map/istanbul/kapali-mahalleler'); ?>
                                    <? $this->load->view('web-site/ru/properties/map/istanbul/kapali-text'); ?>
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
        <div id="padding-target"></div>
        <section id="about-city" class="mt-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 py-3">
                        <div class="card py-3 city-card">
                            <div class="card-body py-2 px-1">
                                <h1 class="text-center py-3 px-2">
                                    Недвижимость в <span class="red-text"><?= $this->uri->segment(3); ?></span><span class="blue-text"><? if ($this->uri->segment(3)!='Istanbul' and $cityValue == 'Istanbul' ): ?>, Istanbul <? endif; ?></span>, Turkey
                                </h1>
                                <div class="border"></div>
                                <p class="px-3 pt-2 text-justify">
                                    <?= $CityIntroduce['RUintroduce']; ?>
                                </p>

                                <? if ($CityIntroduce['RUmoreDescription']){ ?>
                                <button class="py-1 px-3 pb-3" id="read-more" style="position: absolute;right: 10px;bottom: 0px;">
                                    Читайте также о <span class="red-text"><?= $this->uri->segment(3); ?></span>
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
        <div class="container-fluid">
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
                               Покупайте <? if ($SEO_BAR['bedroom']!=null){ ?><?= $SEO_BAR['bedroom']; ?> спален <? } ?> <?= $SEO_BAR['Type']; ?> в <?= $SEO_BAR['City']; ?> по цене <?= $SEO_BAR['max_price']; ?>
                           </h2>
                       </div>
                   </div>
                <? } ?>
                <div class="col-lg-12">
                    <div class="row justify-content-center">
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
                                <div class="col-md-3">
                                    <div class="item my-2">
                                        <div class="card feature-sm-back">
                                            <div class="card-body">
                                                <div id="top-image">
                                                    <a href="<?= base_url(); ?>ru/properties/<?= $value->url_slug; ?>">
                                                        <img class="card-img-top img-fluid" style="min-height: 280px;max-height: 280px"
                                                             src="<?= base_url(); ?><? if ($value->ReferenceLink!='0'){ echo "assets/web-site/images/resales/webps/"; }else{ echo "assets/web-site/images/properties/P_Thumb/";} ?><?=  $image_name_webp; ?>"
                                                             alt="<?= $value->Property_title; ?>" >
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
                                                    <? if ($value->Property_type!='Commercial' and $value->is_commercial=='1'){ ?>
                                                        <span class="is_commercial-badge">
                                              Commercial
                                            </span>
                                                    <?}?>
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
                                                        <h2 class="font-weight-bold" style="font-size: 0.9rem;line-height: 1.5rem">
                                                            <?= $value->Property_title; ?>
                                                        </h2>
                                                    </a>
                                                </div>
                                                <div id="under-cover" class="row mx-2 my-2 justify-content-around align-items-center">
                                                    <div id="price-section" class="col-5">
                                                      <span class="red-text font-weight-bold" style="font-size: 1.2rem">
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
                                                          echo "Свяжитесь с нами";
                                                      } ?>
                                                 </span>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="row justify-content-around align-items-center">
                                                            <div class="col-7 card-speciality">
                                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico2.webp" alt="Property_location" class="img-fluid">
                                                                <span class="mx-1"> <?= $value->Property_location; ?></span></div>
                                                            <div class="col-5 card-speciality">
                                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico3.webp" alt="Property_Bedrooms" class="img-fluid">
                                                                <span class="mx-1"><?= $value->Property_Bedrooms; ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="row justify-content-around align-items-center">
                                                            <div class="col-7 card-speciality">
                                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico4.webp" alt="Property_Bathrooms" class="img-fluid">
                                                                <span class="mx-1"><?= $value->Property_Bathrooms; ?></span>
                                                            </div>
                                                            <div class="col-5 card-speciality">
                                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico1.webp" alt="Property_living_space" class="img-fluid" >
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
                                                        Показать детали
                                                    </a>
                                                    <button class="btn btn-danger btn-sm d-flex font-weight-bold my-1"
                                                       data-toggle="modal"
                                                       data-whatever="<?= $value->Property_referenceID; ?>"
                                                       data-target="#quickEnquireModal">
                                                        Оставить Заявку
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <? } ?>
                            <?
                            if ($cityValue!='Search'){
                                $cityValue = $this->uri->segment(3);
                            }
                            ?>
                        <? }else { ?>
                            <div class="card">
                                <div class="card-body text-center">
                                    <p>
                                        "Свяжитесь с нами, чтобы получить консультацию по недвижимости в этом районе"
                                    </p>
                                    <a href="<?= base_url(); ?>contact_us" class="btn btn-primary">Свяжитесь с нами</a>
                                </div>
                            </div>
                        <? } ?>
                    </div>
                    <? if ($pages>0){ ?>

                        <div class="row py-3 px-1 text-center justify-content-center">
                            <div class="col">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link"  href="<?= base_url(); ?>ru/Properties/<?= $cityValue; ?>" tabindex="-1" title="FIRST"> <i
                                                        class="fas fa-angle-double-left"></i> </a>
                                        </li>
                                        <? if ($page_id < 2) { ?>
                                            <? for ($i = 0; $i <= $page_id+2; $i++) { ?>
                                                <? if ($i>$pages){ break; } ?>
                                                <? if ((int)$page_id == $i) { ?>
                                                    <li class="page-item text-danger"><a  class="page-link text-danger"
                                                                                         href="<?= base_url(); ?>ru/properties/<?= $cityValue; ?>/<?= $i; ?>"><?= $i + 1; ?></a>
                                                    </li>
                                                <? } else { ?>
                                                    <li class="page-item"><a class="page-link"
                                                                             href="<?= base_url(); ?>ru/properties/<?= $cityValue; ?>/<?= $i; ?>"><?= $i + 1; ?></a>
                                                    </li>
                                                <? } ?>
                                            <? } ?>
                                        <? }elseif ($page_id > $pages-2){ ?>
                                            <? for ($i = (int)$page_id-2; $i <= $pages; $i++) { ?>
                                                <? if ($i>$pages){ break; } ?>
                                                <? if ((int)$page_id == $i) { ?>
                                                    <li class="page-item text-danger"><a class="page-link text-danger"
                                                                                         href="<?= base_url(); ?>ru/properties/<?= $cityValue; ?>/<?= $i; ?>"><?= $i + 1; ?></a>
                                                    </li>
                                                <? } else { ?>
                                                    <li class="page-item"><a class="page-link"
                                                                             href="<?= base_url(); ?>ru/properties/<?= $cityValue; ?>/<?= $i; ?>"><?= $i + 1; ?></a>
                                                    </li>
                                                <? } ?>
                                            <? } ?>
                                        <? } else {?>
                                            <? for ($i = (int)$page_id-2; $i <= $page_id+2; $i++) { ?>
                                                <? if ($i>$pages){ break; } ?>
                                                <? if ((int)$page_id == $i) { ?>
                                                    <li class="page-item text-danger"><a class="page-link text-danger"
                                                                                         href="<?= base_url(); ?>ru/properties/<?= $cityValue; ?>/<?= $i; ?>"><?= $i + 1; ?></a>
                                                    </li>
                                                <? } else { ?>
                                                    <li class="page-item"><a class="page-link"
                                                                             href="<?= base_url(); ?>ru/properties/<?= $cityValue; ?>/<?= $i; ?>"><?= $i + 1; ?></a>
                                                    </li>
                                                <? } ?>
                                            <? } ?>
                                        <? } ?>
                                        <li class="page-item">
                                            <a class="page-link"  href="<?= base_url(); ?>ru/properties/<?= $cityValue; ?>/<?= $pages; ?>" title="LAST"> <i
                                                        class="fas fa-angle-double-right"></i> </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    <? } ?>
                </div>
                <div class="col-lg-12 mb-3" id="collapse"></div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                                <? if (isset($CityIntroduce) and $CityIntroduce['RUmoreDescription']): ?>
                                    <h2 class="px-3 py-2"> Больше информации о <span class="red-text"> <?= $this->uri->segment(3);?> </span> :</h2>
                                     <p class="px-3 text-justify">
                                         <?= $CityIntroduce['RUmoreDescription']; ?>
                                     </p>
                                <? endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<div class="modal fade" id="quickEnquireModal" tabindex="-1" aria-labelledby="quickEnquireModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="quickEnquireModalLabel">Запрос о недвижимости</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url(); ?>Post/enquire" id="enquiry" onsubmit="return ModalEnquireFormValidation();">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Ваше имя" required  form="enquiry" name="info"  id="modalEnquireForm_info">
                                <span id="modalEnquireForm_info_error" style="display:none;font-size: 0.6rem;padding-top: 5px;color: white;text-shadow: 1px 1px 5px red;"
                                      class="vision">
                                   Ваше Имя и Фамилия, разделенные пробелом (например Джейн Миллер)
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="modal_phone" class="form-control" placeholder="Ваш номер телефона" name="phone[main]"  form="enquiry" required>
                                <span id="modalEnquireForm_phone_error" style="display:none;font-size: 0.6rem;padding-top: 5px;color: white;text-shadow: 1px 1px 5px red;"
                                      class="vision">
                                      Напишите ваш номер телефона
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Ваша электронная почта" name="email" form="enquiry" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="note" id="note" cols="30" rows="3" class="form-control" placeholder="Ваше сообщение" form="enquiry"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-center d-flex justify-content-center">
                            <div class="form-group">
                                <div class="g-recaptcha"
                                     data-sitekey="6Leb_6MgAAAAALtcAlJS98nLXgm8RSA22-JzfnXN"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="reference_id" id="modal_reference_id"  form="enquiry">
                <input type="submit" class="btn red-button btn-block" form="enquiry" value="ОТПРАВИТЬ">
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('web-site/ru/includes/footer'); ?>
<?php $this->load->view('web-site/includes/foot-load'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#read-more").click(function () {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#collapse").offset().top
            }, 2000);
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#quickEnquireModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var recipient = button.data('whatever');
            var modal = $(this);
            modal.find('#modal_reference_id').val(recipient);
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
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
    });
</script>
<script src="<?= base_url();?>assets/web-site/js/istanbul-map-ru.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        let ilce_name = "<?= $this->uri->segment(3); ?>";
        let ilce_id = istanbul_ilce_list.indexOf(ilce_name);
        document.getElementById(ilce_id).style.fill = '#012169';
        apearPopUp(ilce_id);
        showClosedArea(ilce_id);
    });
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
<script type="text/javascript">
    $(document).ready(function(){
        let city = '<?= $cityValue; ?>';
        if( city=='Istanbul')
        {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#istanbulMap").offset().top -100
            }, 2000);
        }else {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#padding-target").offset().top -100
            }, 2000);
        }
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