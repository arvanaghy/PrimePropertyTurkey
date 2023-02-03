<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url();?>assets/web-site/css/header-image-wrapper.css">
<link rel="stylesheet" href="<?= base_url();?>assets/web-site/css/blogs.css">
<title>Turkish Properties Blog | Prime Property Turkey</title>
<meta name="description"
      content="Read our interesting blogs about properties lifestyle and leisure, latest updates on Turkish real estate, investment tips, guides to buying a home in Turkey">
<link rel="canonical" href="https://www.primepropertyturkey.com/Blog"/>
<style type="text/css">
    .Find-Your-Property .find-title {
        width: 40%;
        margin-right: 1%;
        margin-left: 1%;
    }
    .Find-Your-Property .find-form {
        width: 55%;
        margin-right: 1%;
    }
    .Find-Your-Property > .container >.row {
        border-radius: 30px;
        background: #efefef;
        border-top: 5px solid #cf1717;
    }

    @media screen and (max-width: 430px){
        .Find-Your-Property .find-title{
            width: 100% !important;
        }
        .Find-Your-Property .find-form{
            width: 100% !important;
        }
    }
    @media screen and (max-width: 320px){
        .side .card-img-left {
            width: 95px !important;
        }
    }
    @media screen and (max-width: 570px){
        h1{
            font-size: 25px !important;
            line-height: 35px !important;
        }
        h4{
            font-size: 1.2rem !important;
            line-height: 30px !important;
        }
    }
</style>
</head>
<body>
<? if (isset($page_id)){$page_id=$page_id;}else{$page_id = 0;} ?>
<?php $this->load->view('web-site/includes/top-section'); ?>
<main>
    <section id="theme-background">
        <div class="header-image-wrapper">
            <div class="bg" id="blogs-BG"></div>
            <div class="mask"></div>
            <div class="header-image-content offset-bottom">
                <h1 class="title text-center font-weight-bold px-1">Prime Property Turkey Blogs</h1>
                <h4 class="text-center my-2 px-1">Read our interesting blog about Turkish properties lifestyle and leisure </h4>
            </div>
        </div>
    </section>
    <section id="Find-Your-Property" class="Find-Your-Property m-3">
        <div class="container">
            <div class="row justify-content-center align-items-center my-2 py-3">
                <div class="find-title">
                     <span class="pre">
                          Find  In
                     </span>
                    <span class="pro">
                         Prime Property Turkey Posts
                    </span>
                </div>
                <div class="find-form">
                    <form action="https://www.primepropertyturkey.com/BlogFind" method="post" class="justify-content-around text-right">
                        <div class="row my-2 justify-content-end text-right">

                            <div class="col-lg-7 my-1">
                                <input type="text" placeholder="Please write your search words" class="form-control" name="searchWord" required>
                            </div>
                            <div class="col-lg-3 justify-content-center my-1">
                                <input type="submit" class="btn red-button btn-block" value="SEARCH">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section id="content-blogs">
        <div class="container">
            <div class="row justify-content-center py-2 py-md-5">
                <div class="col-lg-8 content">
                    <? if ($result){ ?>
                    <? foreach ($result as $value){ ?>
                        <div class="item mt-2 mb-4">
                            <div class="card d-md-none feature-sm-back">
                                <? $image_name = str_replace('assets/blog/', '', $value->Blog_Image);
                                $image_name_webp = substr($image_name,0,strpos($image_name,'.jpg')).".webp";
                                if ($image_name_webp==''){
                                    $image_name_webp = substr($image_name,0,strpos($image_name,'.png')).".webp";
                                }
                                if ($image_name_webp==''){
                                    $image_name_webp = substr($image_name,0,strpos($image_name,'.jpeg')).".webp";
                                }
                                ?>
                                <img class="card-img-top img-fluid"
                                     src="<?= base_url(); ?><?= "assets/web-site/images/blog/thumb/".$image_name_webp; ?>"
                                     alt="<?= $value->Blog_Image_Alt; ?>">
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <div class="py-3 justify-content-center text-center">
                                                <span class="blue-text">
                                                    <i class="far fa-clock"></i>
                                                </span>
                                            <span class="blue-text">
                                              <? if ($value->publish_date and $value->publish_date!='0000-00-00') {
                                                  $date_string = '%d %M %Y';
                                                  echo mdate($date_string, strtotime($value->publish_date));
                                              }elseif($value->status ==0){
                                                  $unix_time = mysql_to_unix($value->Blog_Created_date);
                                                  $date_string = '%d %M %Y';
                                                  echo mdate($date_string, $unix_time);
                                              }
                                              ?>
                                        </div>
                                        <div class="row mt-2 mx-3 mb-4 justify-content-center">
                                            <a href="<?= base_url();?>blog/<?= $value->url_slug;?>" class="text-reset font-weight-bold">
                                                <?= $value->Blog_Title; ?>
                                            </a>
                                        </div>
                                        <div class="row my-2">
                                            <p class="text-justify mx-3 px-3 blog-summarize">
                                                <b>By Justin Mays:</b> <br>
                                                <?= str_replace('By. Justin Mays','',str_replace('By Justin Mays', '', str_replace('By Justin Mays:', '', substr(strip_tags($value->Blog_Content), 0, 300)))); ?>
                                                ...
                                            </p>
                                        </div>
                                        <div class="row justify-content-end align-items-center my-2 buttons">
                                            <a href="<?= base_url();?>blog/<?= $value->url_slug;?>"
                                               class="d-flex my-1 mx-1 red-text font-weight-bold">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card d-none d-md-block">
                                <div class="card-body">
                                    <div class="row justify-content-around">
                                        <div class="col-5 d-flex">
                                            <? $image_name = str_replace('assets/blog/', '', $value->Blog_Image);
                                            $image_name_webp = substr($image_name,0,strpos($image_name,'.jpg')).".webp";
                                            if ($image_name_webp==''){
                                                $image_name_webp = substr($image_name,0,strpos($image_name,'.png')).".webp";
                                            }
                                            if ($image_name_webp==''){
                                                $image_name_webp = substr($image_name,0,strpos($image_name,'.jpeg')).".webp";
                                            }
                                            ?>
                                            <img src="<?= base_url(); ?><?= "assets/web-site/images/blog/thumb/".$image_name_webp; ?>"
                                                 alt="<?= $value->Blog_Image_Alt; ?>"
                                                 class="img-fluid">
                                        </div>
                                        <div class="col-7">
                                            <div class="date">
                                                    <span class="blue-text">
                                                        <i class="far fa-clock"></i>
                                                    </span>
                                                <span class="blue-text">
                                                       <? if ($value->publish_date and $value->publish_date!='0000-00-00') {
                                                           $date_string = '%d %M %Y';
                                                           echo mdate($date_string, strtotime($value->publish_date));
                                                       }elseif($value->status ==0){
                                                           $unix_time = mysql_to_unix($value->Blog_Created_date);
                                                           $date_string = '%d %M %Y';
                                                           echo mdate($date_string, $unix_time);
                                                       }
                                                       ?>
                                                </span>
                                            </div>
                                            <div class="row mt-5 mb-4 justify-content-start p-1">
                                                <a href="<?= base_url();?>blog/<?= $value->url_slug;?>" class="text-reset font-weight-bold blog-title-text">
                                                    <?= $value->Blog_Title; ?>
                                                </a>
                                            </div>
                                            <div class="row my-2">
                                                <p class="text-justify mx-3 px-3 blog-summarize">
                                                    <b>By Justin Mays:</b> <br>
                                                    <?= str_replace('By. Justin Mays','',str_replace('By Justin Mays', '', str_replace('By Justin Mays:', '', substr(strip_tags($value->Blog_Content), 0, 300)))); ?>
                                                    ...
                                                </p>
                                            </div>
                                            <div class="row justify-content-end align-items-center my-2 buttons">
                                                <a href="<?= base_url();?>blog/<?= $value->url_slug;?>"
                                                   class="d-flex my-1 mx-1 red-text font-weight-bold">
                                                    Read More
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <? } ?>
                    <? if ($pages>0){ ?>
                            <div class="row py-3 px-1 text-center justify-content-center">
                                <div class="col">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item">
                                                <a class="page-link" rel="nofollow" href="<?= base_url(); ?>BlogFind" tabindex="-1" title="FIRST"> <i
                                                            class="fas fa-angle-double-left"></i> </a>
                                            </li>
                                            <? if ($page_id < 2) { ?>
                                                <? for ($i = 0; $i <= $page_id+2; $i++) { ?>
                                                    <? if ($i>$pages){ break; } ?>
                                                    <? if ((int)$page_id == $i) { ?>
                                                        <li class="page-item text-danger"><a rel="nofollow" class="page-link text-danger"
                                                                                             href="<?= base_url(); ?>BlogFind/<?= $i; ?>"><?= $i + 1; ?></a>
                                                        </li>
                                                    <? } else { ?>
                                                        <li class="page-item"><a class="page-link" rel="nofollow"
                                                                                 href="<?= base_url(); ?>BlogFind/<?= $i; ?>"><?= $i + 1; ?></a>
                                                        </li>
                                                    <? } ?>
                                                <? } ?>
                                            <? }elseif ($page_id > $pages-2){ ?>
                                                <? for ($i = (int)$page_id-2; $i <= $pages; $i++) { ?>
                                                    <? if ($i>$pages){ break; } ?>
                                                    <? if ((int)$page_id == $i) { ?>
                                                        <li class="page-item text-danger"><a class="page-link text-danger" rel="nofollow"
                                                                                             href="<?= base_url(); ?>BlogFind/<?= $i; ?>"><?= $i + 1; ?></a>
                                                        </li>
                                                    <? } else { ?>
                                                        <li class="page-item"><a class="page-link" rel="nofollow"
                                                                                 href="<?= base_url(); ?>BlogFind/<?= $i; ?>"><?= $i + 1; ?></a>
                                                        </li>
                                                    <? } ?>
                                                <? } ?>
                                            <? } else {?>
                                                <? for ($i = (int)$page_id-2; $i <= $page_id+2; $i++) { ?>
                                                    <? if ($i>$pages){ break; } ?>
                                                    <? if ((int)$page_id == $i) { ?>
                                                        <li class="page-item text-danger"><a class="page-link text-danger" rel="nofollow"
                                                                                             href="<?= base_url(); ?>BlogFind/<?= $i; ?>"><?= $i + 1; ?></a>
                                                        </li>
                                                    <? } else { ?>
                                                        <li class="page-item"><a class="page-link" rel="nofollow"
                                                                                 href="<?= base_url(); ?>BlogFind/<?= $i; ?>"><?= $i + 1; ?></a>
                                                        </li>
                                                    <? } ?>
                                                <? } ?>
                                            <? } ?>
                                            <li class="page-item">
                                                <a class="page-link" rel="nofollow" href="<?= base_url(); ?>BlogFind/<?= $pages; ?>" title="LAST"> <i
                                                            class="fas fa-angle-double-right"></i> </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        <? } ?>
                    <? }else{ ?>
                        <div class="card">
                            <div class="card-body text-center">
                                <p>
                                    "Your Search Has No Result"
                                </p>
                            </div>
                        </div>
                    <? } ?>
                </div>
                <div class="col-lg-4">
                    <?php $this->load->view('web-site/includes/side-popular-post'); ?>
                    <?php $this->load->view('web-site/includes/side-latest-news'); ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php $this->load->view('web-site/includes/footer'); ?>
<?php $this->load->view('web-site/includes/foot-load'); ?>
</body>
</html>