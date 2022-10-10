<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url();?>assets/web-site/css/find-property.css">
<link rel="stylesheet" href="<?= base_url();?>assets/web-site/css/cities-property.css">
<link rel="stylesheet" href="<?= base_url();?>assets/web-site/css/header-image-wrapper.css">

<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>
<script src="https://www.google.com/recaptcha/api.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<link rel="stylesheet" href="<?= base_url();?>assets/web-site/css/phone-input.css">
<title>Properties</title>
<style type="text/css">
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
</style>
</head>
<? if (isset($page_id)) {
    $page_id = $page_id;
} else {
    $page_id = 0;
} ?>
<body>
<?php $this->load->view('web-site/includes/top-section'); ?>
    <section id="theme-background">
        <div class="header-image-wrapper">
            <div class="bg" id="search-property-BG"></div>
            <div class="mask"></div>
            <div class="header-image-content offset-bottom">
                <h1 class="title text-center px-1 font-weight-bold">Your Favorites In Turkish Properties</h1>
            </div>
        </div>
    </section>
    <section id="content" class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
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
                                     alt="<?= $value->Property_title; ?>" >
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
                                            <span class="card-favorite">
                                               <button onclick="delete_favorite_sm('<?= $value->Property_id; ?>');" style="z-index:9999;border:0 !important; ;background-color: transparent !important;padding: 0"
                                                                                      class="red-text" >
                                                    <i class="fas fa-heart red-text"></i>
                                               </button>
                                            </span>
                                            <a href="<?= base_url(); ?>properties/<?= $value->url_slug; ?>" class="text-reset font-weight-bold px-2 py-2 d-block">
                                                <?= $value->Property_title; ?>
                                            </a>
                                        </div>
                                        <div class="row justify-content-center align-items-center card-speciality">
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico2.webp"
                                                     alt=""
                                                     class="img-fluid">
                                                <span class="mx-1"> <?= $value->Property_location; ?></span>
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
                                                <span><?= $value->Property_living_space; ?></span>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center my-2">
                                            <span class="red-text">
                                                <? if (!$value->SoldOut and $value->Property_price!=0){ ?>
                                                <? if ($this->session->has_userdata('currency')){
                                                    switch ($this->session->userdata('currency')){
                                                        case 'USD': ?>
                                                            <i class="fas fa-dollar-sign"></i>
                                                            <?=  number_format($value->Property_price); ?>
                                                            <?
                                                            break;
                                                        case 'TRY': ?>
                                                            <i class="fas fa-lira-sign"></i>
                                                            <?=  number_format($value->Property_price *$currency_exchange_data->try);?>

                                                            <?
                                                            break;
                                                        case 'EUR': ?>
                                                            <i class="fas fa-euro-sign"></i>
                                                            <?=  number_format($value->Property_price *$currency_exchange_data->euro);?>
                                                            <?
                                                            break;
                                                        case 'GBP': ?>
                                                            <i class="fas fa-pound-sign"></i>
                                                            <?=  number_format($value->Property_price *$currency_exchange_data->gpt);?>
                                                            <?
                                                            break;
                                                    }
                                                }else{ ?>
                                                    <i class="fas fa-dollar-sign"></i>
                                                    <?=  number_format($value->Property_price); ?>
                                                <? }
                                                }else {
                                                    echo "Contact Us";
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <div class="row my-2">
                                            <p class="text-justify px-2">
                                                <?=  substr(strip_tags($value->Property_overview),0,200)."...."; ?>
                                            </p>
                                        </div>
                                        <div class="row justify-content-around align-items-center py-2">
                                            <a href="<?= base_url(); ?>properties/<?= $value->url_slug; ?>" class="btn btn-outline-danger d-flex my-1">
                                                View Details
                                            </a>
                                            <a class="btn btn-outline-danger d-flex my-1" data-toggle="modal"
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
                                                    class="img-fluid" >
                                            </a>
                                            <div class="type">
                                                <?= $value->Property_type; ?>
                                            </div>
                                            <? if ($value->SoldOut){ ?>
                                                <div class="sold-out">
                                                    Sold Out
                                                </div>
                                            <?}?>
                                            <div class="favorite">
                                                <button onclick="delete_favorite('<?= $value->Property_id; ?>');" style="z-index:9999;border:0 !important; ;background-color: transparent !important;padding: 0"
                                                        class="red-text" >
                                                    <i class="fas fa-heart red-text"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="row my-3 justify-content-center px-4 text-center">
                                                <a href="<?= base_url(); ?>properties/<?= $value->url_slug; ?>"
                                                   class="text-reset font-weight-bold text-center">
                                                    <?= $value->Property_title; ?>
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
                                                    <span><?= $value->Property_living_space; ?></span>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center my-3">
                                            <span class="red-text font-weight-bold font-italic">
                                                <? if (!$value->SoldOut and $value->Property_price!=0){ ?>
                                                <? if ($this->session->has_userdata('currency')){
                                                    switch ($this->session->userdata('currency')){
                                                        case 'USD': ?>
                                                            <i class="fas fa-dollar-sign"></i>
                                                            <?=  number_format($value->Property_price); ?>
                                                            <?
                                                            break;
                                                        case 'TRY': ?>
                                                            <i class="fas fa-lira-sign"></i>
                                                            <?=  number_format($value->Property_price *$currency_exchange_data->try);?>

                                                            <?
                                                            break;
                                                        case 'EUR': ?>
                                                            <i class="fas fa-euro-sign"></i>
                                                            <?=  number_format($value->Property_price *$currency_exchange_data->euro);?>
                                                            <?
                                                            break;
                                                        case 'GBP': ?>
                                                            <i class="fas fa-pound-sign"></i>
                                                            <?=  number_format($value->Property_price *$currency_exchange_data->gpt);?>
                                                            <?
                                                            break;
                                                    }
                                                }else{ ?>
                                                    <i class="fas fa-dollar-sign"></i>
                                                    <?=  number_format($value->Property_price); ?>
                                                <? }
                                                }else {
                                                    echo "Contact Us";
                                                }
                                                ?>
                                            </span>
                                            </div>
                                            <div class="row my-2 px-2">
                                                <p class="text-justify mx-3 px-1">
                                                    <?=  substr(strip_tags($value->Property_overview),0,200)."...."; ?>
                                                </p>
                                            </div>
                                            <div class="row justify-content-end align-items-center my-2 buttons">
                                                <a href="<?= base_url(); ?>properties/<?= $value->url_slug; ?>"
                                                   class="btn btn-outline-danger d-flex my-1 mx-1">
                                                    View Details
                                                </a>
                                                <button class="btn btn-danger text-white d-flex my-1 mx-3" data-toggle="modal"
                                                   data-whatever="<?= $value->Property_referenceID; ?>" data-target="#quickEnquireModal">
                                                    Quick Enquiry
                                                </button>
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
                                        <a class="page-link" href="<?= base_url(); ?>Properties/Favorite" tabindex="-1" title="FIRST"> <i
                                                class="fas fa-angle-double-left"></i> </a>
                                    </li>
                                    <? if ($page_id < 2) { ?>
                                        <? for ($i = 0; $i <= $page_id+2; $i++) { ?>
                                            <? if ($i>$pages){ break; } ?>
                                            <? if ((int)$page_id == $i) { ?>
                                                <li class="page-item text-danger"><a class="page-link text-danger"
                                                                                     href="<?= base_url(); ?>properties/favorite/<?= $i; ?>"><?= $i + 1; ?></a>
                                                </li>
                                            <? } else { ?>
                                                <li class="page-item"><a class="page-link"
                                                                         href="<?= base_url(); ?>properties/favorite/<?= $i; ?>"><?= $i + 1; ?></a>
                                                </li>
                                            <? } ?>
                                        <? } ?>
                                    <? }elseif ($page_id > $pages-2){ ?>
                                        <? for ($i = (int)$page_id-2; $i <= $pages; $i++) { ?>
                                            <? if ($i>$pages){ break; } ?>
                                            <? if ((int)$page_id == $i) { ?>
                                                <li class="page-item text-danger"><a class="page-link text-danger"
                                                                                     href="<?= base_url(); ?>Properties/Favorite/<?= $i; ?>"><?= $i + 1; ?></a>
                                                </li>
                                            <? } else { ?>
                                                <li class="page-item"><a class="page-link"
                                                                         href="<?= base_url(); ?>Properties/Favorite/<?= $i; ?>"><?= $i + 1; ?></a>
                                                </li>
                                            <? } ?>
                                        <? } ?>
                                    <? } else {?>
                                        <? for ($i = (int)$page_id-2; $i <= $page_id+2; $i++) { ?>
                                            <? if ($i>$pages){ break; } ?>
                                            <? if ((int)$page_id == $i) { ?>
                                                <li class="page-item text-danger"><a class="page-link text-danger"
                                                                                     href="<?= base_url(); ?>properties/favorite/<?= $i; ?>"><?= $i + 1; ?></a>
                                                </li>
                                            <? } else { ?>
                                                <li class="page-item"><a class="page-link"
                                                                         href="<?= base_url(); ?>properties/favorite/<?= $i; ?>"><?= $i + 1; ?></a>
                                                </li>
                                            <? } ?>
                                        <? } ?>
                                    <? } ?>
                                    <li class="page-item">
                                        <a class="page-link" href="<?= base_url(); ?>Properties/Favorite/<?= $pages; ?>" title="LAST"> <i
                                                class="fas fa-angle-double-right"></i> </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <? } ?>
                </div>
                <div class="col-lg-4">
                    <div class="card side contact my-2" id="side-contact-us">
                        <?php $this->load->view('web-site/includes/side-contact-us'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                <form method="post" action="<?= base_url(); ?>Post/enquire" id="enquiry">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Full Name" required  form="enquiry" name="info"  id="modalEnquireForm_info">
                                <span id="modalEnquireForm_info_error" style="display:none;font-size: 0.6rem;padding-top: 5px;color: white;text-shadow: 1px 1px 5px red;"
                                      class="vision">
                                   Please enter your first and last name separated by a space (e.g. Jane Miller)
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="modal_phone" class="form-control" placeholder="Phone" name="phone"  form="enquiry" required>
                                <span id="modalEnquireForm_phone_error" style="display:none;font-size: 0.6rem;padding-top: 5px;color: white;text-shadow: 1px 1px 5px red;"
                                      class="vision">
                                      Please Write Your Full PhoneNumber
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" name="email" form="enquiry" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="note" id="note" cols="30" rows="3" class="form-control" placeholder="Note" form="enquiry"></textarea>
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
                <input type="hidden" name="reference_id" id="modal_reference_id"  form="enquiry">
                <input type="submit" class="btn red-button btn-block" form="enquiry">
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('web-site/includes/footer'); ?>
<?php $this->load->view('web-site/includes/foot-load'); ?>
<script type="text/javascript" src="/<?= base_url();?>assets/web-site/js/phone-input.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#read-more").click(function(){
            $("#collapse").toggle(1000, function(){
                if(document.getElementById('collapse').style.display=='none'){
                    document.getElementById('read-more').innerHTML=' Read More ';
                }else{
                    document.getElementById('read-more').innerHTML=' Read Less ';
                }
            });
        });
        $('#quickEnquireModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var recipient = button.data('whatever'); // Extract info from data-* attributes
            var modal = $(this);
            modal.find('#modal_reference_id').val(recipient)
        });
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
    function delete_favorite_sm(value){
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