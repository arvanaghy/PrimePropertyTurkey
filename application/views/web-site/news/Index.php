<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/header-image-wrapper.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/blogs.css">
<title>Turkish News | Prime Property Turkey</title>
<? if (isset($page_id)) {
    $page_id = $page_id;
} else {
    $page_id = 0;
} ?>
<meta name="description"
      content="Read latest news by Prime Property Turkey, find exciting news and updates from Turkish Real estate market, newest properties for sale and much more. ">
<link rel="canonical" href="https://www.primepropertyturkey.com/news<? if ($page_id != 0) {
    echo "/".$page_id ;
} ?>"/>
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

    .Find-Your-Property > .container > .row {
        border-radius: 30px;
        background: #efefef;
        border-top: 5px solid #cf1717;
    }
    @media screen and (max-width: 320px){
        .side .card-img-left{
            width: 95px !important;
        }
    }
    @media screen and (max-width: 570px){
        .header-image-content h1{
            line-height: 45px;
        }
        .header-image-content h4{
            font-size: 1.2rem;
            line-height: 30px;
        }
        .Find-Your-Property .find-title{width: 90%}
        .Find-Your-Property .find-form{width: 100%}
    }
</style>
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="https://www.primepropertyturkey.com/news<? if ($page_id != 0) {
    echo "/".$page_id ;
} ?>">
<meta name="twitter:creator" content="Justin Mays">
<meta name="twitter:image:alt" content="Turkish  News | Prime Property Turkey">
<meta name="twitter:title"
      content="Turkish  News | Prime Property Turkey">
<meta name="twitter:description"
      content="Read latest news by Prime Property Turkey, find exciting news and updates from Turkish Real estate market, newest properties for sale and much more.">
<meta name="twitter:image" content="<?= base_url(); ?>assets/web-site/images/PrimePropertyTurkeybuildlogo.webp">

<script src="https://www.google.com/recaptcha/api.js"></script>
<link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/phone-input.css">
</head>
<body>
<?php $this->load->view('web-site/includes/top-section'); ?>
<main>
    <section id="theme-background">
        <div class="header-image-wrapper">
            <div class="bg" id="blogs-BG"></div>
            <div class="mask"></div>
            <div class="header-image-content offset-bottom">
                <h1 class="title text-center font-weight-bold px-1">Latest Turkish News</h1>
                <h4 class="text-center my-2 px-1">Read all recent news about Turkish properties lifestyle and
                    leisure</h4>
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
                         Prime Property Turkey News
                    </span>
                </div>
                <div class="find-form">
                    <form action="https://www.primepropertyturkey.com/NewsFind" method="post" class="justify-content-around text-right">
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
            <div class="row justify-content-center py-2">
                <div class="col-lg-8 content">
                    <? foreach ($news as $value) { ?>
                        <? $image_name = str_replace('assets/news/', '', $value->News_Image);
                        $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpg')) . ".webp";
                        if ($image_name_webp == '') {
                            $image_name_webp = substr($image_name, 0, strpos($image_name, '.png')) . ".webp";
                        }
                        if ($image_name_webp == '') {
                            $image_name_webp = substr($image_name, 0, strpos($image_name, '.jpeg')) . ".webp";
                        }
                        ?>
                        <div class="item mt-2 mb-4">
                            <div class="card d-md-none feature-sm-back">
                                <img class="card-img-top img-fluid"
                                     src="<?= base_url(); ?><?= "assets/web-site/images/news/thumb/" . $image_name_webp; ?>"
                                     alt="<?= $value->News_Image_Alt; ?>"
                                >
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
                                                   $unix_time = mysql_to_unix($value->News_Created_date);
                                                   $date_string = '%d %M %Y';
                                                   echo mdate($date_string, $unix_time);
                                               }
                                               ?>
                                            </span>
                                        </div>
                                        <div class="row mt-2 mx-3 mb-4 justify-content-center">
                                            <a href="<?= base_url(); ?>news/<?= $value->url_slug; ?>"
                                               class="text-reset font-weight-bold">
                                                <?= $value->News_Title; ?>
                                            </a>
                                        </div>
                                        <div class="row my-2">
                                            <p class="text-justify mx-3 px-3 blog-summarize">
                                                <b>By Justin Mays:</b> <br>
                                                <?= str_replace('By. Justin Mays','',str_replace('By Justin Mays', '', str_replace('By Justin Mays:', '', substr(strip_tags($value->News_Content), 0, 300)))); ?>
                                                ...
                                            </p>
                                        </div>
                                        <div class="row justify-content-end align-items-center my-2 buttons">
                                            <a  href="<?= base_url(); ?>news/<?= $value->url_slug; ?>"
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
                                            <img
                                                    src="<?= base_url(); ?><?= "assets/web-site/images/news/thumb/" . $image_name_webp ?>"
                                                    alt="<?= $value->News_Image_Alt; ?>"
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
                                                   }elseif($value->status == 0){
                                                       $unix_time = mysql_to_unix($value->News_Created_date);
                                                       $date_string = '%d %M %Y';
                                                       echo mdate($date_string, $unix_time);
                                                   }
                                                   ?>
                                                </span>
                                            </div>
                                            <div class="row mt-5 mb-4 justify-content-start p-1">
                                                <a href="<?= base_url(); ?>news/<?= $value->url_slug; ?>"
                                                   class="text-reset font-weight-bold blog-title-text">
                                                    <?= $value->News_Title; ?>
                                                </a>
                                            </div>
                                            <div class="row my-2">
                                                <p class="text-justify mx-3 px-3 blog-summarize">
                                                    <b>By Justin Mays:</b> <br>
                                                    <?= str_replace('By. Justin Mays','',str_replace('By Justin Mays', '', str_replace('By Justin Mays:', '', substr(strip_tags($value->News_Content), 0, 300)))); ?>
                                                    ...
                                                </p>
                                            </div>
                                            <div class="row justify-content-end align-items-center my-2 buttons">
                                                <a  href="<?= base_url(); ?>news/<?= $value->url_slug; ?>"
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
                    <div class="row py-3 px-1 text-center justify-content-center">
                        <div class="col">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">
                                        <a  class="page-link" href="<?= base_url(); ?>news" tabindex="-1"
                                           title="FIRST"> <i
                                                    class="fas fa-angle-double-left"></i> </a>
                                    </li>
                                    <? if ($page_id < 2) { ?>
                                        <? for ($i = 0; $i <= $page_id + 3; $i++) { ?>
                                            <? if ((int)$page_id == $i) { ?>
                                                <li class="page-item text-danger"><a
                                                                                     class="page-link text-danger"
                                                                                     href="<?= base_url(); ?>news/<?= $i; ?>"><?= $i + 1; ?></a>
                                                </li>
                                            <? } else { ?>
                                                <li class="page-item"><a  class="page-link"
                                                                         href="<?= base_url(); ?>news/<?= $i; ?>"><?= $i + 1; ?></a>
                                                </li>
                                            <? } ?>
                                        <? } ?>
                                    <? } elseif ($page_id > $pages - 2) { ?>
                                        <? for ($i = (int)$page_id - 2; $i <= $pages; $i++) { ?>
                                            <? if ((int)$page_id == $i) { ?>
                                                <li class="page-item text-danger"><a
                                                                                     class="page-link text-danger"
                                                                                     href="<?= base_url(); ?>news/<?= $i; ?>"><?= $i + 1; ?></a>
                                                </li>
                                            <? } else { ?>
                                                <li class="page-item"><a  class="page-link"
                                                                         href="<?= base_url(); ?>news/<?= $i; ?>"><?= $i + 1; ?></a>
                                                </li>
                                            <? } ?>
                                        <? } ?>
                                    <? } else { ?>
                                        <? for ($i = (int)$page_id - 2; $i <= $page_id + 2; $i++) { ?>
                                            <? if ((int)$page_id == $i) { ?>
                                                <li class="page-item text-danger"><a
                                                                                     class="page-link text-danger"
                                                                                     href="<?= base_url(); ?>news/<?= $i; ?>"><?= $i + 1; ?></a>
                                                </li>
                                            <? } else { ?>
                                                <li class="page-item"><a  class="page-link"
                                                                         href="<?= base_url(); ?>news/<?= $i; ?>"><?= $i + 1; ?></a>
                                                </li>
                                            <? } ?>
                                        <? } ?>
                                    <? } ?>
                                    <li class="page-item">
                                        <a class="page-link"  href="<?= base_url(); ?>news/<?= $pages; ?>"
                                           title="LAST"> <i
                                                    class="fas fa-angle-double-right"></i> </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <? $this->load->view('web-site/includes/side-recommended-properties'); ?>
                    <? $this->load->view('web-site/includes/side-popular-post'); ?>
                    <? if ($page_id != 0) { ?>
                        <? $this->load->view('web-site/includes/side-latest-news'); ?>
                    <? } ?>
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
                                <input type="text" id="modal_phone" class="form-control" placeholder="Phone"
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
<?php $this->load->view('web-site/includes/footer'); ?>
<?php $this->load->view('web-site/includes/foot-load'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
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
    $(document).ready(function () {
        $(".side-recommended-owl").owlCarousel({
            loop: !0,
            margin: 10,
            nav: !0,
            navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
            responsiveClass: !0,
            responsive: {0: {items: 1}, 600: {items: 2}, 1000: {items: 1}}
        })
    });
</script>
</body>
</html>