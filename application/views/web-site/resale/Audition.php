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
<?php $data_array = $result; ?>
<?php $property_image_gallery = $images; ?>
<?
$IIG = array();
foreach ($property_image_gallery as $key=>$image_in_gallery) {
    $IIG[$key]=$image_in_gallery['image'];
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
            </div>
        </div>
    </section>
    <section id="content">
        <div class="container my-3">
            <div class="row justify-content-center">
                <div class="col-lg-12 details">
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
            </div>
        </div>
    </section>
</main>
<? $whatsapp_passed['property_reference'] = ''; ?>
<? $whatsapp_passed['property_title'] = ''; ?>
<?php $this->load->view('web-site/includes/footer',$whatsapp_passed); ?>
<?php $this->load->view('web-site/includes/foot-load'); ?>

</body>
</html>