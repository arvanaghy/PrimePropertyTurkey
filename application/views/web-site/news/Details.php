<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url();?>assets/web-site/css/blog.css">
<title><?= $result->News_Meta_Title; ?></title>
<? $image_name = str_replace('assets/news/', '', $result->News_Image);
$image_name_webp = substr($image_name,0,strpos($image_name,'.jpg')).".webp";
if ($image_name_webp==''){
    $image_name_webp = substr($image_name,0,strpos($image_name,'.png')).".webp";
}
if ($image_name_webp==''){
    $image_name_webp = substr($image_name,0,strpos($image_name,'.jpeg')).".webp";
}
?>
<meta name="keywords" content="<?= $result->News_Meta_Keyword; ?>">
<meta name="description" content="<?= $result->News_Meta_Description; ?>">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="<?= base_url();?>news/<?= $result->url_slug; ?>">
<meta property="og:title" content="<?= $result->News_Meta_Title; ?>">
<meta property="og:description" content="<?= $result->News_Meta_Description; ?>">
<meta property="og:image" content="<?= base_url();?><?= "assets/web-site/images/news/whatsapp/".$image_name_webp; ?>">
<meta property="og:image:width" content="300" />
<meta property="og:image:height" content="300" />

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="<?= base_url();?>news/<?= $result->url_slug; ?>">
<meta name="twitter:creator" content="Justin Mays">
<meta name="twitter:image:alt" content="<?= $result->News_Meta_Title; ?>">
<meta name="twitter:title" content="<?= $result->News_Meta_Title; ?>">
<meta name="twitter:description" content="<?= $result->News_Meta_Description; ?>">
<meta name="twitter:image" content="<?= base_url();?><?= "assets/web-site/images/news/whatsapp/".$image_name_webp; ?>">
<link rel="canonical" href="<?= base_url();?>news/<?= $result->url_slug; ?>"/>
<script src="https://www.google.com/recaptcha/api.js" ></script>
<link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>
<link rel="stylesheet" href="<?= base_url();?>assets/web-site/css/phone-input.css">
<style type="text/css">
    .social-share ul li {
        border: none;
        padding: 2%;
    }
    #content .details img{
        width: 100% !important;
    }
    #blog_detail_content img {
        width: 100% !important;
    }
    #blog_detail_content p span {
        font-family: 'Open Sans' !important;
    }
    #blog_detail_content p {
        font-family: 'Open Sans' !important;
    }
    #blog_detail_content iframe{
        width: 100% !important;
        height: 380px !important;
    }
    #blog_detail_content h2{
        font-size: 16px !important;
        font-weight: bold !important;
    }
    #blog_detail_content h3{
        font-size: 14px !important;
        font-weight: bold !important;
    }
    #divider {
        content: '';
        width: 40%;
        height: 5px;
        border-radius: 50%;
        background-color: #cf142b;
        justify-content: center;
        text-align: center;
        margin: 2% 1% 2% 2% ;
    }
    @media  screen and (max-width: 430px){

        #blog_detail_content iframe{
            height: 210px !important;
        }
        #divider {
            width: 80%;
        }
    }
    .rate-star{
        position: absolute;
        top: 10px;
        right: 10px;
        text-shadow: 1px 1px 5px black;
    }
    .side-recommended-owl .item .card-body {
        padding: 1.25rem 0.25rem !important;
    }
    .side-recommended-owl .item .card img {
        border-top-left-radius: 20px !important;
        border-top-right-radius: 20px !important;
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
                        <a href="<?= base_url();?>news" class="red-text" rel="nofollow">
                           News
                        </a>
                    </span>
                    <span class="mx-2">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                    <span class="mx-2">
                        <a class="red-text" rel="nofollow">
                            <?= $result->News_Title; ?>
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
                        <h1 style="font-size: 2rem;"><?= $result->News_Title; ?></h1>
                    </div>
                    <div class="sub-head text-center text-md-left">
                        <span class="red-text">
                            <i class="far fa-clock"></i>
                        </span>
                        <span class="red-text font-weight-bold"> Created :  </span>
                        <span class="font-weight-bold">
                           <? $unix_time= mysql_to_unix($result->News_Created_date);
                           $date_string = '%d %M %Y';
                           echo mdate($date_string, $unix_time);
                           ?>
                        </span>
                    </div>
                </div>
                <div class="col-md-3 buttons py-2">
                    <div class="row justify-content-center justify-content-md-end">
                        <div class="col-4" style="cursor: pointer">
                            <a data-toggle="modal" data-target="#ShareModal" class="text-center" rel="nofollow">
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
                    <div class="card my-2">
                        <div class="card-body">
                            <div class="rate-star">
                                <? $star_rate =  star_rate($result->likeCount,$result->dislikeCount);
                                $remain_star = 5 - $star_rate; ?>
                                <? if ($star_rate > 0) {
                                    for ($i=1;$i<=$star_rate;$i++){ ?>
                                        <i class="fad fa-stars text-warning fa-2x"></i>
                                    <? } } ?>
                                <? for ($i=1;$i<=$remain_star;$i++){ ?>
                                    <i class="fal fa-stars fa-2x text-light"></i>
                                <? } ?>
                            </div>
                            <img
                                    src="<?= base_url();?><?= "assets/web-site/images/news/original/".$image_name_webp; ?>"
                                    alt="<?= $result->News_Image_Alt;?>"
                                 class="img-fluid">
                            <div class="px-4 py-2" id="blog_detail_content">
                                <p class="m-3 px-3" >
                                    <?= $result->News_Content; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="background-color: #efefef;">
                        <div class="card-body my-2">
                            <div class="useful px-4 py-2">
                                <strong> Did You Find This Useful ? </strong>
                                <a href="<?= base_url();?>Like/news/<?= $result->News_ID; ?>" <?if (is_newsDisliked($result->News_ID)){?> style="pointer-events: none;" <? } ?>  rel="nofollow" ><? if (is_newsLiked($result->News_ID)){ ?><span class="px-1" ><i class="fas fa-thumbs-up"></i></span><?}else {?><i class="far fa-thumbs-up"></i></span><?}?></a>
                                <a href="<?= base_url();?>Dislike/news/<?= $result->News_ID; ?>" <?if (is_newsLiked($result->News_ID)){?> style="pointer-events: none;" <? } ?>  rel="nofollow" ><? if (is_newsDisliked($result->News_ID)){ ?><span class="pl-2"  ><i class="fas fa-thumbs-down"></i></span><?}else {?><span class="pl-2" ><i class="far fa-thumbs-down"></i></span><?}?></a>
                            </div>
                        </div>
                    </div>
                    <? if ($comments): ?>
                        <div class="card my-2"  style="background-color: #efefef;">
                            <div class="card-body m-3 font-weight-bold">
                                <div class="card-title">
                                    Our Clients Comments About This Post
                                </div>
                                <div id="divider" style="
                                "></div>
                                <? foreach ($comments as $comment): ?>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row justify-content-center align-items-center">
                                                        <div class="col-md-3 d-none d-md-block">
                                                            <img src="<?= base_url(); ?>assets/web-site/images/comment.png" alt="comments" class="img-fluid">
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="row m-2 justify-content-center align-items-center">
                                                                <div class="col-6" style="font-size: 0.8rem;">
                                                                    <i class="fas fa-calendar-alt mx-2"></i>
                                                                    <? $unix_time = mysql_to_unix($comment->submitDate);
                                                                    $date_string = '%d %M %Y';
                                                                    echo mdate($date_string, $unix_time);
                                                                    ?>
                                                                </div>
                                                                <div class="col-6" style="font-size: 0.8rem;">
                                                                    <i class="fad fa-users mx-2"></i>
                                                                    <?= $comment->info; ?>
                                                                </div>
                                                            </div>
                                                            <div class="row m-2 text-justify justify-content-center align-items-center" style="font-weight: 200;font-size: 0.9rem">
                                                                <div class="col">
                                                                    <i class="fas fa-quote-left mx-2 "></i>
                                                                    <?= $comment->content; ?>
                                                                    <i class="fas fa-quote-right mx-2 "></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <? endforeach; ?>
                            </div>
                        </div>
                    <? endif; ?>
                    <div class="card my-2" id="comment-form" style="background-color: #efefef">
                        <div class="card-body">
                            <div class="card-title m-3 font-weight-bold">
                                Please Share Your Comments With Us
                                <div id="divider" style="
                                "></div>
                            </div>
                            <form action="<?= base_url(); ?>Post/Submit_Comment" method="post" class="m-3">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="info" style="font-size: 0.7rem;font-weight: 800;">Your Name :</label>
                                        <input type="text" name="info" id="info"  class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="contact" style="font-size: 0.7rem;font-weight: 800;">Email Or Phone Number <span class="text-danger">(Opitional)</span> :</label>
                                        <input type="text" name="contact" id="contact"  class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="content" style="font-size: 0.7rem;font-weight: 800;"> Your Comment : </label>
                                        <textarea name="content" id="content" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row align-items-center justify-content-around">
                                    <div class="form-group">
                                        <div class="g-recaptcha"
                                             data-sitekey="6Leb_6MgAAAAALtcAlJS98nLXgm8RSA22-JzfnXN"></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="reference_id" value="<?= $result->News_ID; ?>">
                                        <input type="hidden" name="kind" value="news">
                                        <input type="submit" class="btn btn-primary btn-block" value="Submit Your Comment">
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <? $this->load->view('web-site/includes/side-recommended-properties'); ?>
                    <?php $this->load->view('web-site/includes/side-popular-post'); ?>
                    <?php $this->load->view('web-site/includes/side-latest-news'); ?>
                </div>
            </div>
        </div>
    </section>
</main>
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
                        <a rel="nofollow" href="https://www.facebook.com/sharer.php?u=<?= current_url(); ?>&t=<?= $result->News_Title; ?>&p=<?= base_url();?><?= "assets/web-site/images/news/whatsapp/".str_replace('assets/news/','',$result->News_Image); ?>"
                           target="_blank" class="btn btn-primary btn-block">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>
                    <li  class="list-group-item">
                        <a rel="nofollow" href="https://twitter.com/intent/tweet?text=<?= current_url(); ?><?= substr(strip_tags($result->News_Content),0,200); ?>" target="_blank" class="btn btn-info btn-block">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a rel="nofollow" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?= current_url(); ?>&amp;title=<?= $result->News_Title; ?>&amp;ro=false&amp;summary=<?= strip_tags($result->News_Content); ?>&amp;source=" target="_blank" class="btn btn-primary btn-block">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a rel="nofollow" href="https://pinterest.com/pin/create/button/?url=<?= current_url(); ?>&amp;description=<?= strip_tags($result->News_Content); ?>" target="_blank" class="btn btn-danger btn-block">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </li>
                    <li  class="list-group-item">
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
        preferredCountries:["<? if (isset($geolocation)){echo $geolocation;}else{echo 'us';} ?>//"],
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
           responsive: {0: {items: 1}, 600: {items: 1}, 1000: {items: 1}}
       })
   });
</script>
</body>
</html>