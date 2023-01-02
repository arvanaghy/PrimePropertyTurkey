<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<title>Элитная недвижимость на продажу в Турции | Prime Property Turkey</title>
<meta name="description"
      content="Найдите свою идеальную недвижимость в Турции в Prime Property Turkey. Мы предлагаем широкий выбор недвижимости для продажи в Турции. Если вы хотите купить или продать недвижимость в Стамбуле, Алтынкуме, Бодруме, Фетхие, Калкане, свяжитесь с нами.">
<meta name="keywords"
      content="Продажа недвижимости в Турции, Купить недвижимость в Турции, Гражданство за инвестиции в Турции, Программа для получения гражданства Турции по инвестициям.">
<link rel="canonical" href="https://www.primepropertyturkey.com/ru"/>
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta property="og:type" content="website">
<meta property="og:url" content="https://www.primepropertyturkey.com/ru">
<meta property="og:title" content="Элитная недвижимость на продажу в Турции | Prime Property Turkey">
<meta property="og:description"
      content="Найдите свою идеальную недвижимость в Турции в Prime Property Turkey. Мы предлагаем широкий выбор недвижимости для продажи в Турции. Если вы хотите купить или продать недвижимость в Стамбуле, Алтынкуме, Бодруме, Фетхие, Калкане, свяжитесь с нами.">
<meta property="og:image" content="<?= base_url(); ?>assets/web-site/images/PrimePropertyTurkeybuildlogo.webp">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="https://www.primepropertyturkey.com/ru">
<meta name="twitter:creator" content="Justin Mays">
<meta name="twitter:image:alt" content="Элитная недвижимость на продажу в Турции | Prime Property Turkey">
<meta name="twitter:title"
      content="Элитная недвижимость на продажу в Турции | Prime Property Turkey">
<meta name="twitter:description"
      content="Найдите свою идеальную недвижимость в Турции в Prime Property Turkey. Мы предлагаем широкий выбор недвижимости для продажи в Турции. Если вы хотите купить или продать недвижимость в Стамбуле, Алтынкуме, Бодруме, Фетхие, Калкане, свяжитесь с нами.">
<meta name="twitter:image" content="<?= base_url(); ?>assets/web-site/images/PrimePropertyTurkeybuildlogo.webp">
<script src="https://www.google.com/recaptcha/api.js"></script>
<link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/phone-input.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/homePage.css">
</head>
<style type="text/css">
    #YouTubeVideos .card-body a i {
        position: absolute;
        bottom: 130px;
        left: 42%;
        font-size: 65px;
        text-shadow: 1px 1px 2px black;
    }
    @media screen and (min-width: 1400px) {
        #PRIME-Property-Turkey .col-12 {
            height: 300px !important;
        }

        #Recommended-Properties .item a > img {
            height: 250px !important;
        }
    }

    @media screen and (min-width: 1200px) and (max-width: 1399px) {

        #PRIME-Property-Turkey .col-12 {
            height: 300px !important;
        }

        #Recommended-Properties .item a > img {
            height: 200px !important;
        }
    }

    @media screen and (min-width: 992px) and (max-width: 1199px) {

    }

    @media screen and (min-width: 768px) and (max-width: 991px) {

    }

    @media screen and (min-width: 576px) and (max-width: 766px) {

    }

    @media screen and (max-width: 575px) {

    }
</style>
<body>
<?php $this->load->view('web-site/ru/includes/top-section'); ?>
<section id="home-top-slider">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators d-none d-md-flex">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">

            <div class="carousel-item active ">
                <a href="https://www.primepropertyturkey.com/ru/properties/apartment-beyoglu-PPTV0056">
                    <img src="<?= base_url(); ?>assets/web-site/images/2022_12_06_16_29_12.webp" class="d-block w-100"
                         alt="Fethiye">
                </a>
                <div class="carousel-caption d-block">
                    <button class="btn red-button" id="topCover" data-toggle="modal" data-target="#topEnquireModal">
                        УЗНАТЬ БОЛЬШЕ !
                    </button>
                </div>
            </div>
            <div class="carousel-item ">
                <a href="https://www.primepropertyturkey.com/ru/properties/luxury-living-homes-move-in-ready-in-uskudar">
                    <img src="<?= base_url(); ?>assets/web-site/images/2022_10_07_15_41_43.webp" class="d-block w-100"
                         alt="Istanbul">
                </a>
                <div class="carousel-caption d-block">
                    <button class="btn red-button" id="topCover" data-toggle="modal" data-target="#topEnquireModal">
                        УЗНАТЬ БОЛЬШЕ !
                    </button>
                </div>
            </div>
            <div class="carousel-item">
                <a href="https://www.primepropertyturkey.com/ru/properties/Five-star-apartments-Istanbul">
                    <img src="<?= base_url(); ?>assets/web-site/images/2022_10_07_15_41_57.webp" class="d-block w-100"
                         alt="Fethiye">
                </a>
                <div class="carousel-caption d-block">
                    <button class="btn red-button" id="topCover" data-toggle="modal" data-target="#topEnquireModal">
                        УЗНАТЬ БОЛЬШЕ !
                    </button>
                </div>
            </div>
            <div class="carousel-item">
                <a href="https://www.primepropertyturkey.com/ru/properties/duplexes-therra-park">
                    <img src="<?= base_url(); ?>assets/web-site/images/2022_10_07_15_42_09.webp" class="d-block w-100"
                         alt="Fethiye">
                </a>
                <div class="carousel-caption d-block">
                    <button class="btn red-button" id="topCover" data-toggle="modal" data-target="#topEnquireModal">
                        УЗНАТЬ БОЛЬШЕ !
                    </button>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>
</section>
<section id="Find-Your-Property" class="Find-Your-Property m-3">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center my-2 py-3">
            <div class="find-title">
                 <span class="pre">
                     Найти подходящий объект
                 </span>
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
                    " Делайте Правильно "
                </p>
                <p class="text-justify mx-md-5 px-md-5 my-md-5 my-1 py-1">
                    Мы создали агентство Prime Property Turkey, чтобы работать на растущем турецком рынке недвижимости
                    правильно и эффективно. Наша компания стремится к максимально прозрачности всего процесса покупки и
                    послепродажного обслуживания. Мы гарантируем нашим клиентам заботу, которой они достойны. Покупая
                    недвижимость, мы принимаем довольно сложное решение, незасисимо от того, в какой точке мира мы
                    находимся. Наш опыт и знание турецкого рынка гарантируют Вам, что каждая покупка (совершаете ли вы
                    её для инвестиций или своего отдыха), будет полностью защищена. Мы в Prime Property Turkey стремимся
                    "делать это правильно" каждый раз, когда встречаемся, обсуждаем и помогаем Вам заключить сделку.
                </p>
            </div>
        </div>
    </div>
</section>
<section id="Main-inquiry" class="Main-inquiry m-3">
    <div class="container-fluid">
        <div class="row justify-content-between px-md-4 pr-md-5 align-items-center my-2 py-3">
            <div class="find-title">
                 <span class="pre">
                      Оставить Заявку
                 </span>
            </div>
            <div class="find-form">
                <form action="<?= base_url(); ?>Post/enquire" method="post"
                      class="justify-content-end text-right">
                    <div class="row my-2 justify-content-around text-right">
                        <div class="col-lg-3 my-1">
                            <input type="text" class="form-control" id="info" name="info" placeholder="Имя и фамилия">
                        </div>
                        <div class="col-lg-2 my-1">
                            <input type="email" class="form-control" id="email" name="email"
                                   placeholder="Электронная почта">
                        </div>
                        <div class="col-lg-3 my-1">
                            <input type="text" id="modal_phone" class="form-control" placeholder="Номер телефона"
                                   name="phone[main]">
                        </div>
                        <div class="col-lg-2 my-1">
                            <select class="form-control" id="budget" name="budget">
                                <option value="6" selected>Бюджет</option>
                                <option value="1">Up to &#36; 100.000</option>
                                <option value="2">Up to &#36; 200.000</option>
                                <option value="3">Up to &#36; 300.000</option>
                                <option value="4">Up to &#36; 500.000</option>
                                <option value="5">&#36; 1 M</option>
                                <option value="6">&#36; 1+ M</option>
                            </select>
                        </div>
                        <div class="col-lg-2 justify-content-center my-1">
                            <input type="submit" class="btn red-button btn-block" value="Оставить заявку">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section id="Recommended-Properties" class="Recommended-Properties py-3 py-md-5">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h2 class="text-center font-weight-bold my-3 blue-text px-3">
                Рекомендуемые Турецкие Объекты
            </h2>
        </div>
        <div id="all_recommended" class="mt-4">
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
                                <div class="slide-owl-wrap">
                                    <div class="card">
                                        <a href="<?= base_url(); ?>ru/properties/<?= $city->url_slug; ?>">
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
                                                <button onclick="delete_favorite('<?= $city->Property_id; ?>');"
                                                        style="border:0;background-color: transparent !important;padding: 0"
                                                        class="red-text">
                                                    <i class="fas fa-heart red-text"></i>
                                                </button>
                                            <? } else { ?>
                                                <button onclick="set_favorite('<?= $city->Property_id; ?>');"
                                                        style="border:0;background-color: transparent !important;padding: 0"
                                                        class="text-reset">
                                                    <i class="far fa-heart"></i>
                                                </button>
                                            <? } ?>
                                          </span>
                                                    <div id="item-card-title">
                                                        <a href="<?= base_url(); ?>ru/properties/<?= $city->url_slug; ?>"
                                                           class="text-reset font-weight-bold blue-text">
                                                            <?= $city->Property_title; ?>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row my-2 justify-content-around align-items-center"
                                                     id="card-speciality">
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico2.webp"
                                                             alt="Property_location"
                                                             class="img-fluid">
                                                        <span class="mx-1"><?= $city->Property_location; ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center ">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico3.webp"
                                                             alt="Property_Bedrooms"
                                                             class="img-fluid">
                                                        <span class="mx-1"><?= $city->Property_Bedrooms; ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico4.webp"
                                                             alt="Property_Bathrooms"
                                                             class="img-fluid">
                                                        <span class="mx-1"><?= $city->Property_Bathrooms; ?></span>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico1.webp"
                                                             alt="Property_living_space" class="img-fluid"
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
                                                    <button class="btn btn-danger d-flex font-weight-bold btn-sm"
                                                            data-toggle="modal"
                                                            data-whatever="<?= $city->Property_referenceID; ?>"
                                                            data-target="#quickEnquireModal">
                                                        Оставить Заявку
                                                    </button>
                                                </div>
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
                        Программа получения гражданства Турции за инвестиции
                    </span>
                </h3>
                <div class="m-1 mx-md-5 text-center text-danger" style="font-size: 1.5rem;">
                    Инвестируйте в недвижимость не менее $400.000 и получите всю выгоду от турецкого гражданства
                </div>
                <p class="mx-1 px-1 mx-md-5 px-md-5 my-md-3 my-2 py-2 text-justify">
                    Получение Турецкого гражданства - это очень выгодный вариант для тех, кто хочет инвестировать в
                    Турцию $400.000 и более. Благодаря программе гражданства через инвестиции, Вы не только покупаете
                    дом Вашей мечты на Бирюзовом побережье, но также сможете пользоваться привилегиями гражданина
                    Турции. Кроме того, вы будете бесплатно пользоваться медицинскими и образовательными услугами нашей
                    страны. Свяжитесь с нами уже сегодня, чтобы узнать, как Вы можете стать частью будущего Турции.
                </p>
                <a href="<?= base_url(); ?>ru/citizenship-by-investment-in-turkey" class="btn red-button mb-1 mt-md-3">
                    Подробнее </a>
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
            <h4 class="text-center blue-text font-weight-bold"> Prime-Видео на YouTube </h4>
        </div>
        <div class="row mt-3 mt-md-5 justify-content-around">
            <div class="col-11">
                <div class="youtube-owl owl-carousel owl-theme">
                    <? foreach ($YoutubeVideos as $Video) { ?>
                        <div class="item">
                            <div class="slide-owl-wrap">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="<?= base_url(); ?>ru/prime-videos/<?= $Video->url_slug; ?>"
                                           title="<?= strip_tags($Video->description); ?>">
                                            <img src="<?= base_url(); ?>assets/web-site/images/youtube-cover/<?= $Video->cover_image; ?>"
                                                 alt="<?= $Video->title; ?>">
                                            <i class="fas fa-play-circle"></i>
                                        </a>
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
<section class="pt-md-2 mt-md-2" id="testimonials" style="padding-top: 50px">
    <div class="container py-md-2 my-md-2">
        <div class="row">
            <div class="col-md-4 text-white text-center"
                 style="background-image: linear-gradient(90deg, #3a5cc4,#092976);height: 60px">
                <div class="testimonial-header h5">
                    Отзывы наших клиентов
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
                                                style="font-size: 1.5rem;font-weight: 600; ">Заслуживающие доверия и всегда объективны в своих советах...</span>
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
                                        Я обратился в агентство Prime Property Turkey для поиска вариантов
                                        инвестирования в жилье Стамбула и нашел их очень информированными, полезными,
                                        заслуживающими доверия и объективными в своих советах по различным вариантам по
                                        всему городу. Я сотрудничаю с ними более 6 месяцев на постоянной основе, и мое
                                        мнение об их профессионализме не изменилось. Если вы ищете недвижимость в
                                        Турции, я бы порекомендовал Prime Property, чтобы помочь вам ориентироваться в
                                        экосистеме турецкой недвижимости.
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
                                                style="font-size: 1.5rem;font-weight: 900 ">Безупречный опыт инвестиций в недвижимость...</span>
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
                                        Компания Prime Property сопровождала наш процесс инвестирования в недвижимость,
                                        с момента выбора объекта и до самой продажи, Омран заботился буквально обо всем.
                                        Нам должным образом помогли ознакомиться со всеми документами, необходимыми для
                                        успешной обработки нашего заявления на получение гражданства. Сотрудники
                                        агентства показали нам ряд вариантов недвижимости, которые соответствовали нашим
                                        критериям, а также другие аналогичные объекты для сравнения. Мы даже не ожидали
                                        такого личного и профессионального обслуживания, и внимательного отношения к нам
                                        после продажи, нам даже дали контакт дизайнера интерьеров. Я настоятельно
                                        рекомендую это агентство любому иностранному покупателю, который хочет разумно
                                        инвестировать в турецкую недвижимость.
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
                                                style="font-size: 1.5rem;font-weight: 900 ">Мне повезло встретить на своем пути агентство недвижимости Prime Property...</span>
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
                                        Мне повезло найти агентство Prime Property, которое значительно облегчило мой
                                        поиск квартиры. Они большие профессионалы! Сотрудники оказали мне всестороннюю
                                        помощь, к тому же они дружелюбны во всех отношениях. Я бы порекомендовала это
                                        агентство всем и каждому. Благодаря Prime Property я смогла найти квартиру,
                                        которую давно искала.
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
                            Покупка недвижимости в Турции онлайн
                        </span>
                </h3>
                <p class="text-justify py-2">
                    В 21 веке, когда мы имеем свободный доступ в Интернет, стать владельцем недвижимости в другой стране
                    стало намного проще. Prime Property Turkey готова предоставить Вам услугу виртуального подбора
                    недвижимости. Наш виртуальный тур - это интерактивная программа, позволяющая Вам знакомиться с
                    объектами недвижимости в Турции, не выходя из дома. За шесть простых шагов Вы можете не только стать
                    владельцем квартиры или дома, но и получить гражданство Турции, совершив покупку онлайн.
                </p>
                <a href="<?= base_url(); ?>ru/buying-online" class="btn red-button"
                   style="display: block;width: 175px;text-align: center;border-radius: 20px;margin-bottom: 30px;"> Узнать больше </a>

            </div>
            <div class="col-md-5 d-flex">
                <img src="<?= base_url(); ?>assets/web-site/images/base/masters/buyingonlineproperty.webp"
                     alt="Buying Online Property in Turkey" title="Buying Online Property in Turkey"
                     class="img-fluid my-3 py-2 my-sm-0">
            </div>
        </div>
    </div>
</section>
<section class="recent" id="recent">
    <div class="container-fluid py-2 my-2 mb-md-4 pb-md-4">
        <div class="row mx-2 mx-md-5 px-1 px-md-3">
            <div class="col-md-12">
                <div class="my-5 recent-title-after">
                    Популярные посты
                </div>
                <div class="row">
                    <? foreach ($blog_recent as $blog) { ?>
                        <div class="col-md-4 px-2 px-lg-5">
                            <a href="<?= base_url(); ?>ru/blog/<?= $blog->url_slug; ?>" class="blog-item"
                               title="<?= $blog->ru_title; ?>">
                                <? $image_name = str_replace('assets/blog/', '', $blog->Blog_Image);
                                $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpg')) . ".webp";
                                if ($image_name_webp == '') {
                                    $image_name_webp = substr($image_name, 0, strpos($image_name, '.png')) . ".webp";
                                }
                                if ($image_name_webp == '') {
                                    $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpeg')) . ".webp";
                                }
                                ?>

                                <img class="card-img-left" title="<?= $blog->ru_title; ?>"
                                     src="<?= base_url(); ?><?= "assets/web-site/images/blog/whatsapp/" . $image_name_webp; ?>"
                                     alt="<?= $blog->ru_image_alt; ?>"/>
                                <div class="card flex-row">
                                    <div class="card-body" style="background-color: white !important;">
                                        <div id="recent-blog-header">
                                            <?= $blog->ru_title; ?>
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
                    <a href="<?= base_url(); ?>ru/blog" class="btn red-button"> Посмотреть все </a>
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
                <h5 class="modal-title text-center" id="quickEnquireModalLabel">ЗАПРОС НЕДВИЖИМОСТИ</h5>
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
                                <input type="text" class="form-control" placeholder="Имя и фамилия" required form="enquiry"
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
                                <input type="text" id="modal_phone" class="form-control" placeholder="Номер телефона"
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
                                <input type="email" class="form-control" placeholder="Электронная почта" name="email"
                                       form="enquiry" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="note" id="note" cols="30" rows="3" class="form-control"
                                          placeholder="Сообщение" form="enquiry"></textarea>
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
                <input type="submit" class="btn red-button btn-block" form="enquiry" value="представить">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="topEnquireModal" tabindex="-1" aria-labelledby="topEnquireModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="topEnquireModalLabel">СВЯЖИТЕСЬ С НАМИ ДЛЯ БЕСПЛАТНОЙ КОНСУЛЬТАЦИИ ЭКСПЕРТА</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url(); ?>Post/enquire" id="enquiryit"
                      onsubmit="return TopEnquireFormValidation();">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Имя и фамилия" required
                                       form="enquiryit"
                                       name="info" id="TopEnquireForm_info">
                                <span id="TopEnquireForm_info_error"
                                      style="display:none;font-size: 0.6rem;padding-top: 5px;color: white;text-shadow: 1px 1px 5px red;"
                                      class="vision">
                                   Please enter your first and last name separated by a space (e.g. Jane Miller)
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="modal_phone_cover" class="form-control" placeholder="Номер телефона"
                                       name="phone[main]" form="enquiryit" required>
                                <span id="TopEnquireForm_phone_error"
                                      style="display:none;font-size: 0.6rem;padding-top: 5px;color: white;text-shadow: 1px 1px 5px red;"
                                      class="vision">
                                      Please Write Your Full PhoneNumber
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Электронная почта" name="email"
                                       form="enquiryit" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="note" id="note" cols="30" rows="3" class="form-control"
                                          placeholder="Сообщение" form="enquiry"></textarea>
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
                <input type="submit" class="btn red-button btn-block" form="enquiryit" value="представить">
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('web-site/ru/includes/footer'); ?>
<?php $this->load->view('web-site/includes/foot-load'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/web-site/js/main-page.js"></script>
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
        $('#quickEnquireModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var recipient = button.data('whatever'); // Extract info from data-* attributes
            var modal = $(this);
            modal.find('#modal_reference_id').val(recipient)
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

            // if (modalEnquireForm_info_regex.test(modalEnquireForm_info) != true) {
            //     modalEnquireFormFlag = false;
            //     modalEnquireForm_info_error.style.display = 'block';
            // }
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

        function TopEnquireFormValidation() {
            let TopEnquireFormFlag = true;
            let TopEnquireForm_info_error = document.getElementById('TopEnquireForm_info_error');
            let TopEnquireForm_phone_error = document.getElementById('TopEnquireForm_phone_error');
            TopEnquireForm_info_error.style.display = 'none';
            TopEnquireForm_phone_error.style.display = 'none';
            let TopEnquireForm_info = document.getElementById('TopEnquireForm_info').value;
            let TopEnquireForm_phone = document.getElementById('modal_phone_cover').value;
            let TopEnquireForm_info_regex = new RegExp(/^\w+\s+\w+/i);
            let TopEnquireForm_phone_regex = new RegExp(/\d{5,20}/g);

            // if (TopEnquireForm_info_regex.test(TopEnquireForm_info) != true) {
            //     TopEnquireFormFlag = false;
            //     TopEnquireForm_info_error.style.display = 'block';
            // }
            if (TopEnquireForm_phone_regex.test(TopEnquireForm_phone) != true) {
                TopEnquireFormFlag = false;
                TopEnquireForm_phone_error.style.display = 'block';
            }
            return TopEnquireFormFlag;
        }

        const phoneInputFieldModalCoverVal = document.querySelector("#modal_phone_cover");
        const phoneInputModalCoverVal = window.intlTelInput(phoneInputFieldModalCoverVal, {
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
    });

    function set_favorite(value) {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            if (this.responseText) {
                location.reload();
            }
        }
        xhttp.open("POST", "<?= base_url();?>Favorite/set_favorite");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("send_value=" + value);
    }

    function delete_favorite(value) {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            if (this.responseText) {
                location.reload();
            }
        }
        xhttp.open("POST", "<?= base_url();?>Favorite/del_favorite");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("send_value=" + value);
    }
</script>
</body>
</html>