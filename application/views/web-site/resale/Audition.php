<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/property-details.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/property-details-carousal.css">

<link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/phone-input.css">
<? $data_array = array();
foreach ($property_result as $value) {
    $data_array = $value;
}
?>
<?
$IIG = array();
foreach ($property_image_gallery as $key=>$image_in_gallery) {
    $IIG[$key]=$image_in_gallery->image;
}
?>

<title><?= $data_array->title; ?></title>
<meta name="keywords" content="<?= ''; ?>">
<meta name="description" content="<?= substr(strip_tags($data_array->description),0,200); ?>">
<link rel="canonical" href="https://www.primepropertyturkey.com/Resale/<?= $data_array->url_slug;?>" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="<?= current_url();?>">
<meta property="og:title" content="<?= $data_array->title; ?>">
<meta property="og:description" content="<?= substr(strip_tags($data_array->description),0,200); ?>">
<meta property="og:image:width" content="300" />
<meta property="og:image:height" content="300" />
<meta property="og:image" content="https://www.primepropertyturkey.com/assets/web-site/images/resales/webps/<?= str_replace('.jpg','.webp',$IIG[0]); ?>">
<meta property="og:image:width" content="300" />
<meta property="og:image:height" content="300" />
<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="<?= current_url();?>">
<meta name="twitter:creator" content="Justin Mays">
<meta name="twitter:image:alt" content="<?= $data_array->title; ?>">
<meta name="twitter:title" content="<?= $data_array->title; ?>">
<meta name="twitter:description" content="<?= substr(strip_tags($data_array->description),0,200); ?>">
<meta name="twitter:image" content="https://www.primepropertyturkey.com/assets/web-site/images/resales/webps/<?= str_replace('.jpg','.webp',$IIG[0]); ?>">
<meta property="twitter:image:width" content="300" />
<meta property="twitter:image:height" content="300" />

<style type="text/css">
    #Property-Features-icon .col-md-6 , #Property-Features-icon .col-md-3{
        padding-right: 2px !important;
        padding-left: 2px !important;
    }
    #inner_content{
        padding-left: 2% !important;
    }
    #inner_content iframe{
        width: 100% !important;
    }
    .P_desc img {
        width: 100% !important;
    }
    #reserveModal .modal-dialog{
        position: fixed;
        right: 10px;
        bottom: 0;
    }
    #carousel-thumbs .carousel-control-prev-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23808080' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5L4.25 4l2.5-2.5L5.25 0z'/%3e%3c/svg%3e");

    }
    #carousel-thumbs .carousel-control-next-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23808080' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M2.75 0l-1.5 1.5L3.75 4l-2.5 2.5L2.75 8l4-4-4-4z'/%3e%3c/svg%3e");
    }
    #myCarousel .carousel-control-prev-icon {
        background-image: url("https://www.primepropertyturkey.com/assets/web-site/images/base/left_arrow.png");
        background-color: #000;
        border-radius: 10px;

    }
    #myCarousel .carousel-control-next-icon {
        background-image: url("https://www.primepropertyturkey.com/assets/web-site/images/base/right_arrow.png");
        background-color: #000;
        border-radius: 10px;
    }
    .content-font ,.content-font p, .content-font p span, .content-font span{
        font-family: 'Open Sans' !important;
        font-size: 14px !important;
        text-align: justify;
    }
   .content-font p span b, .content-font p b,.content-font b{
        font-family: 'Open Sans' !important;
        font-size: 16px !important;
    }
   #enquire-gradiant{
       color: white;
       background-image: linear-gradient(140deg,#466ad8,#012169);
       border: none;
       position: sticky;
       top: 100px;
   }
    #enquire-gradiant .form-control{
        border-radius: 50px;
        font-weight: lighter;
        font-size: 0.9rem;
    }
    #enquire-gradiant #note .form-control{
        border-radius: 20px !important;
    }
    #enquire-gradiant select{
        background-position-x: 90%;
        background-position-y: 5px;
    }
    #enquire-gradiant .btn{
        border-radius: 50px;
        font-weight: bold;
    }
    #room-brief .head h1 {
        font-size: 1.3rem;
    }
    .thumb img {
        height: 100px !important;
    }
</style>
</head>
<body>
<?php $this->load->view('web-site/includes/top-section'); ?>
<main>

    <section id="bread-crumbs">
        <div class="container">
            <div class="row">
                <div class="col red-text py-3 text-center text-md-left">
                    <span class="mx-2">
                        <i class="fas fa-home"></i>
                    </span>
                    <span class="mx-2">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                    <span class="mx-2">
                        <a href="<?= base_url(); ?>Resale" class="red-text" rel="nofollow">
                            Resale
                        </a>
                    </span>
                    <span class="mx-2">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                    <span class="mx-2">
                        <a class="red-text" rel="nofollow">
                            <?= $data_array->title; ?>
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </section>
    <section id="room-brief">
        <div class="container">
            <div class="row">
                <div class="col-md-9 text-center text-md-left py-2">
                    <div class="head text-center text-md-left py-2">
                    <h1><? if ($data_array->status==3){ ?> <span class="text-danger font-weight-bold"> Pending </span> <span><del><?=$data_array->title;?></del></span> <? }else{ echo $data_array->title; } ?></h1>
                    </div>
                    <div class="sub-head text-center text-md-left">
                        <span class="red-text font-weight-bold"> Price :  </span>
                         <span class="font-weight-bold">
                         <? if (!$data_array->SoldOut and $data_array->price!=0){ ?>
                            <? if ($this->session->has_userdata('currency')) {
                                switch ($this->session->userdata('currency')) {
                                    case 'USD': ?>
                                        <i class="fas fa-dollar-sign"></i>
                                        <?= number_format((int)ceil($data_array->price)); ?>
                                        <?
                                        break;
                                    case 'TRY': ?>
                                        <i class="fas fa-lira-sign"></i>
                                        <?= number_format((int)ceil($data_array->price) * $currency_exchange_data->try); ?>

                                        <?
                                        break;
                                    case 'EUR': ?>
                                        <i class="fas fa-euro-sign"></i>
                                        <?= number_format((int)ceil($data_array->price) * $currency_exchange_data->euro); ?>
                                        <?
                                        break;
                                    case 'GBP': ?>
                                        <i class="fas fa-pound-sign"></i>
                                        <?= number_format((int)ceil($data_array->price) * $currency_exchange_data->gpt); ?>
                                        <?
                                        break;
                                }
                            } else { ?>
                                <i class="fas fa-dollar-sign"></i>
                                <?= number_format((int)ceil($data_array->price)); ?>
                            <? } ?>
                         <? }else{
                             echo "Contact Us ";
                         } ?>
                        </span>
                        <span class="red-text ml-2 font-weight-bold">  Ref :  </span>
                        <span class="font-weight-bold"> <?= $data_array->referenceID; ?> </span>
                        <? $passed_data=array();
                        $passed_data['reference_id']= $data_array->referenceID;
                        ?>
                    </div>
                    <div class="sub-head text-center text-md-left mt-2">
                        <span class="red-text">
                            <i class="far fa-clock"></i>
                        </span>
                        <span class="red-text font-weight-bold"> Created :  </span>
                        <span class="font-weight-bold">
                           <? $unix_time= mysql_to_unix($data_array->created);
                           $date_string = '%d %M %Y';
                           $created_date = mdate($date_string, $unix_time);
                            echo $created_date;
                           ?>
                        </span>
                        <? $update_date= null;
                        if ($data_array->update_date){
                            $unix_time= mysql_to_unix($data_array->update_date);
                            $date_string = '%d %M %Y';
                            $update_date = mdate($date_string, $unix_time);
                        }
                        ?>
                        <? if ($data_array->update_date and $created_date != $update_date) {?>
                            <span class="red-text">
                               <i class="fas fa-calendar-check"></i>
                            </span>
                            <span class="red-text font-weight-bold"> Updated :  </span>
                            <span class="font-weight-bold">
                               <? $unix_time= mysql_to_unix($data_array->update_date);
                               $date_string = '%d %M %Y';
                               echo mdate($date_string, $unix_time);
                               ?>
                            </span>
                        <? } ?>
                    </div>
                </div>
                <div class="col-md-3 buttons py-2">
                    <div class="row">
                        <div class="col">
                            <a href="<?= base_url(); ?>PrintPreview/setResalePrintView/<?= $data_array->id; ?>"
                               class="text-center" target="_blank" rel="nofollow">
                                <div class="ico d-block">
                                    <i class="fas fa-print fa-2x"></i>
                                </div>
                                <div class="text d-block">
                                    Print
                                </div>
                            </a>
                        </div>
                        <div class="col" style="cursor: pointer">
                            <a class="text-center" data-toggle="modal" data-target="#ShareModal" rel="nofollow">
                                <span class="ico d-block">
                                    <i class="fas fa-share-alt fa-2x"></i>
                                </span>
                                <span class="text d-block">
                                    Share
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="content">
        <div class="container my-3">
            <div class="row justify-content-center">
                <div class="col-lg-8 details">
                    <div class="slider mb-4">
                        <div class="carousel-container position-relative row">
                            <!-- Sorry! Lightbox doesn't work - yet. -->
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <? $i=0; ?>
                                    <? foreach ($property_image_gallery as $image_gallery){ ?>
                                        <? $image_name = $IIG[$i];
                                            $image_name_webp = str_replace('.jpg','.webp',$IIG[$i]);
                                        ?>
                                        <div class="carousel-item <? if($i==0){ echo 'active'; } ?>" data-slide-number="<?= $i; ?>">
                                            <img alt="<?= $data_array->title; ?>"
                                                    src="<?= base_url(); ?><?= "assets/web-site/images/resales/webps/".$image_name_webp; ?>"

                                                 class="d-block w-100"
                                                 data-remote="https://source.unsplash.com/Pn6iimgM-wo/" data-type="image"
                                                 data-toggle="lightbox" data-gallery="example-gallery" loading="lazy">
                                        </div>
                                    <?
                                        $i++;
                                    } ?>
                                </div>
                                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <!-- Carousel Navigation -->
                            <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
                                <?
                                    $gallery_image_count = count($property_image_gallery)-1;
                                    $gallery_image_array = range(0,$gallery_image_count);
                                    $gallery_image_chunk =  array_chunk($gallery_image_array,6);
                                ?>
                                <div class="carousel-inner">
                                    <? foreach ($gallery_image_chunk as $key=> $value ){ ?>
                                        <div class="carousel-item <? if ($key==0){echo 'active';} ?>">
                                                <div class="row mx-0 justify-content-center">
                                                    <?foreach ($value as $v){ ?>
                                                        <? $image_name = $IIG[$v];
                                                        $image_name_webp = str_replace('.jpg','.webp',$IIG[$v]);

                                                        ?>
                                                        <div id="carousel-selector-<?= $v; ?>" class="thumb col-4 col-sm-2 py-2 px-2 "
                                                             data-target="#myCarousel" data-slide-to="<?= $v; ?>">
                                                           <img
                                                                   src="<?= base_url(); ?><?= "assets/web-site/images/resales/webps/".$image_name_webp; ?>"
                                                                   class="img-fluid" loading="lazy">
                                                        </div>
                                                    <? } ?>
                                                </div>
                                        </div>
                                    <? } ?>
                                </div>
                                <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div> <!-- /row -->
                    </div>
                    <? if ($data_array->SoldOut){ ?>
                            <div class="SoldOut text-center">
                                <span class="badge badge-danger text-center p-3">SOLD OUT !</span>
                            </div>
                    <? } ?>
                    <div class="card my-2">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-2 font-weight-bold text-center">
                                    Overview
                                </div>
                                <div class="col-md-10 content-font">
                                    <p class="p-1 text-justify">
                                        <?= $data_array->description; ?>
                                    <div class="d-none d-md-block vertical-separate"></div>
                                    <div class="d-md-none horizontal-separate"></div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card my-2">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-2 font-weight-bold text-center">
                                    Property Features
                                </div>
                                <div class="col-md-10" id="Property-Features-icon">
                                    <div class="row justify-content-center px-2 py-4">
                                        <div class="col-md-6">
                                            <span class="d-block my-2 align-items-center justify-content-center">
                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico5.webp"
                                                     class="img-fluid" alt="">
                                                <b>Type:</b>  <?= $data_array->kind; ?>
                                            </span>
                                            <span class="d-block my-2 align-items-center">
                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico2.webp"
                                                     alt="">
                                                <b>Location:</b> <?= $data_array->location; ?>
                                            </span>
                                            <span class="d-block  my-2 align-items-center">
                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico4.webp"
                                                     alt="">
                                                  <b>Bathrooms:</b> <?= $data_array->location; ?>
                                            </span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="d-block  my-2 align-items-center">
                                                  <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico1.webp"
                                                       alt="">
                                                 <b>Space:</b> <?= $data_array->living_space; ?> Sq.m
                                            </span>
                                            <span class="d-block my-2 align-items-center">
                                                 <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico6.webp"
                                                      alt="">
                                                 <b>Pool:</b> <?= $data_array->pool; ?>
                                            </span>
                                            <span class="d-block my-2 align-items-center">
                                                 <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico3.webp"
                                                      alt="">
                                                  <b>Bedrooms:</b> <?= $data_array->bedroom; ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-block vertical-separate"></div>
                                    <div class="d-md-none horizontal-separate"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <? if ($data_array->map) {?>
                    <div class="card my-2">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-2 font-weight-bold text-center">
                                    Map Location
                                </div>
                                <div class="col-md-10">
                                    <p class="pt-4 pt-md-0">
                                        <iframe src="https://maps.google.com/maps?hl=en&q=<?= $data_array->map; ?>&z=11&output=embed" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                    </p>
                                    <div class="d-none d-md-block vertical-separate"></div>
                                    <div class="d-md-none horizontal-separate"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <? } ?>
                </div>
                <div class="col-lg-4">
                    <div class="card side contact mb-2" id="enquire-gradiant">
                        <?php $this->load->view('web-site/includes/side-enquire',$passed_data); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="RecentlyAddedProperties" id="RecentlyAddedProperties">
        <div class="container-fluid py-3 my-3 my-md-5 py-md-5">
            <div class="row justify-content-center">
                <h4 class="text-center blue-text font-weight-bold">
                        <div class="d-md-block d-none">
                            Recently Added Properties
                        </div>
                        <div class="d-block d-md-none">
                            Recently <br>
                            Added Properties <br>
                        </div>
                </h4>
                <br>
            </div>
            <div class="row mt-3 mt-md-5 justify-content-around">
                <div class="col-11">
                        <div class="recently-owl owl-carousel owl-theme">
                        <? foreach ($recently_added as $recently_properties){ ?>
                                <div class="item">
                                    <div class="card">
                                        <a href="<?= base_url(); ?>properties/<?= $recently_properties->url_slug; ?>" >
                                            <? $image_name = str_replace('assets/thumbnail/', '', $recently_properties->Property_thumbnail);
                                            $image_name_webp = substr($image_name,0,strpos($image_name,'.jpg')).".webp";
                                            if ($image_name_webp==''){
                                                $image_name_webp = substr($image_name,0,strpos($image_name,'.png')).".webp";
                                            }
                                            if ($image_name_webp==''){
                                                $image_name_webp = substr($image_name,0,strpos($image_name,'.jpeg')).".webp";
                                            }
                                            ?>
                                        <img class="card-img-top img-fluid"
                                             src="<?= base_url(); ?><?= "assets/web-site/images/properties/P_Thumb/".$image_name_webp; ?>"
                                             alt="<?= $recently_properties->Property_title; ?>" loading="lazy" >
                                        </a>
                                        <div class="card-body">
                                            <div class="container-fluid">
                                                <div class="card-title text-center">
                                            <span class="card-type-badge">
                                                 <?= $recently_properties->Property_type; ?>
                                            </span>
                                                    <span class="card-favorite">
                                                <? if (is_favored($recently_properties->Property_id)){ ?>
                                                    <a rel="nofollow" href="<?= base_url();?>Favorite/del_favorite/<?= $recently_properties->Property_id; ?>" class="red-text">
                                                        <i class="fas fa-heart red-text" ></i>
                                                    </a>
                                                <?}else{?>
                                                    <a  rel="nofollow" href="<?= base_url();?>Favorite/set_favorite/<?= $recently_properties->Property_id; ?>" class="text-reset">
                                                        <i class="far fa-heart" ></i>
                                                    </a>
                                                <? } ?>
                                           </span>
                                                    <div id="item-card-title">
                                                        <a href="<?= base_url(); ?>properties/<?= $recently_properties->url_slug; ?>" class="text-reset font-weight-bold" >
                                                            <?= $recently_properties->Property_title;  ?>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row my-2 justify-content-around align-items-center" id="card-speciality">
                                                    <div  class="d-flex align-items-center">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico2.webp"
                                                             alt=""
                                                             class="img-fluid">
                                                        <span class="mx-1"><?= $recently_properties->Property_location; ?></span>
                                                    </div>
                                                    <div  class="d-flex align-items-center ">
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
                                                    <div  class="d-flex align-items-center">
                                                        <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico1.webp"
                                                             alt="" class="img-fluid"
                                                        >
                                                        <span class="mx-1"><?= $recently_properties->Property_living_space; ?></span>
                                                    </div>
                                                </div>
                                                <div class="row my-2">
                                                    <p class="text-justify item-card-description">
                                                        <?=  substr(strip_tags($recently_properties->Property_overview),0,100)."...."; ?>
                                                    </p>
                                                </div>
                                                <div class="row justify-content-around align-items-center mx-1" style="font-size: 1.2rem">
                                             <span class="red-text font-weight-bold">
                                               <? if (!$recently_properties->SoldOut and $recently_properties->Property_price!=0){ ?>
                                                            <? if ($this->session->has_userdata('currency')){
                                                    switch ($this->session->userdata('currency')){
                                                        case 'USD': ?>
                                                            <i class="fas fa-dollar-sign"></i>
                                                            <?=  number_format($recently_properties->Property_price); ?>
                                                            <?
                                                            break;
                                                        case 'TRY': ?>
                                                            <i class="fas fa-lira-sign"></i>
                                                            <?=  number_format($recently_properties->Property_price *$currency_exchange_data->try);?>

                                                            <?
                                                            break;
                                                        case 'EUR': ?>
                                                            <i class="fas fa-euro-sign"></i>
                                                            <?=  number_format($recently_properties->Property_price *$currency_exchange_data->euro);?>
                                                            <?
                                                            break;
                                                        case 'GBP': ?>
                                                            <i class="fas fa-pound-sign"></i>
                                                            <?=  number_format($recently_properties->Property_price *$currency_exchange_data->gpt);?>
                                                            <?
                                                            break;
                                                    }
                                                }else{ ?>
                                                    <i class="fas fa-dollar-sign"></i>
                                                    <?=  number_format($recently_properties->Property_price); ?>
                                                <? }
                                                }else {?>
                                                    Contact US
                                                <?} ?>
                                            </span>
                                                    <a class="btn btn-danger btn-sm d-flex font-weight-bold" data-toggle="modal"
                                                       data-whatever="<?= $recently_properties->Property_referenceID; ?>" data-target="#quickEnquireModal" rel="nofollow">
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
</main>

<div class="modal fade" id="reserveModal" tabindex="-1" aria-labelledby="share-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="share-modal-label">
                    Are you interested in this Property</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <p class="text-center">
                            Get a 24 Hour Quote for this Property
                        </p>
                    </div>
                </div>
                <div class="row justify-content-center my-2">
                    <div class="col-12">
                        <a class="text-center btn btn-danger btn-block" id="reformRunner" rel="nofollow"> Reservation Form </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ReformModalModal" tabindex="-1" aria-labelledby="share-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="share-modal-label">Reserve Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <?  $attributes = ['onsubmit' => 'return reserveValidPhone();']; ?>
                <?php echo form_open_multipart(base_url().'Reserve/Submit_reserve',$attributes);?>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="full-name">
                                    <small>
                                        Full Name:
                                    </small>
                                    <sup class="text-danger"><small><b>*</b></small></sup></label>
                                <input type="text" class="form-control" name="full-name" id="full-name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="user-mail">
                                    <small>
                                        Email:
                                    </small>
                                    <sup class="text-danger"><small><b>*</b></small></sup></label>
                                <input type="email" class="form-control" name="user-mail" id="user-mail" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="phone-number">
                                    <small>
                                        Phone Number:
                                    </small>
                                    <sup class="text-danger"><small><b>*</b></small></sup></label>
                                <input type="text" class="form-control" name="phone-number" id="reserve-phone-number" required placeholder=" (+AreaCode) YourNumber">
                                <div id="reserve_phone_error" style="display: none;color: white;font-size: 0.7rem;" class="text-center">
                                    <b>
                                        Please fill country code with + at beginning
                                    </b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="user_file">
                                    <small>
                                        Passport: (Please upload your Passport in jpg/pdf/doc)
                                    </small>
                                    <sup class="text-danger"><small><b>optional</b></small></sup>
                                </label>
                                <input type="file" class="form-control" name="user_file" id="user_file" accept=".jpg,.png,.gif,.jpeg,.pdf,.doc">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 justify-content-center">
                            <div class="form-group">
                                <input type="hidden" value="<?= $data_array->url_slug; ?>" name="property_url">
                                <input type="hidden" value="<?= $data_array->title; ?>" name="property_title">
                                <input type="hidden" value="<?= $data_array->referenceID; ?>" name="property_refID">
                                <input type="submit" class="btn btn-danger btn-block" value="submit" >
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ShareModal" tabindex="-1" aria-labelledby="share-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="share-modal-label">Share Property In Social Media</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body social-share">
                <ul class="list-group list-group-horizontal-sm justify-content-center align-items-center">
                    <li class="list-group-item">
                        <a rel="nofollow" href="https://www.facebook.com/sharer.php?u=<?= current_url(); ?>&t=<?= $data_array->title; ?>&p=<?= base_url(); ?><?= "assets/web-site/images/properties/P_Thumb/"; ?>"
                           target="_blank" class="btn btn-primary btn-block">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a rel="nofollow" href="https://twitter.com/intent/tweet?text=<?= current_url(); ?><?= substr(strip_tags($data_array->description),0,200); ?>" target="_blank" class="btn btn-info btn-block">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a rel="nofollow" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?= current_url(); ?>&amp;title=<?= $data_array->title; ?>&amp;ro=false&amp;summary=<?= strip_tags($data_array->description); ?>&amp;source=" target="_blank" class="btn btn-primary btn-block">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a rel="nofollow" href="https://pinterest.com/pin/create/button/?url=<?= current_url(); ?>&amp;description=<?= strip_tags($data_array->description); ?>" target="_blank" class="btn btn-danger btn-block">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a rel="nofollow" href="https://www.instagram.com/primepropertyturkey/" target="_blank" class="btn btn-danger btn-block">
                            <i class="fab fa-instagram"></i>
                        </a></li>
                    <li class="list-group-item">
                        <a rel="nofollow" href="https://api.whatsapp.com/send?text=<?= current_url(); ?>" target="_blank" class="btn btn-success btn-block">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
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
<? $whatsapp_passed['property_reference'] = $data_array->referenceID; ?>
<? $whatsapp_passed['property_title'] = $data_array->title; ?>
<?php $this->load->view('web-site/includes/footer',$whatsapp_passed); ?>
<?php $this->load->view('web-site/includes/foot-load'); ?>
<script type="text/javascript"
        src="<?= base_url(); ?>assets/web-site/js/property-details-carousal.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/web-site/js/property-more-details.js"></script>
<script type="text/javascript">
    $(document).ready(function (){
        setTimeout(function (){
            $('#reserveModal').modal('show');
        }, 17000);

        $('#reformRunner').on('click',function () {
            $('#reserveModal').modal('hide');
            $('#ReformModalModal').modal('show');
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
    function reserveValidPhone() {
        let phone_number = document.getElementById('reserve-phone-number').value;
        if (phone_number.charAt(0)!='+'){
            document.getElementById('reserve-phone-number').focus();
            document.getElementById('reserve_phone_error').style.display='block';
            return false;
        }
    }
</script>
</body>
</html>