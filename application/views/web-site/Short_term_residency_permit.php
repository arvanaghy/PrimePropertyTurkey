<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>

<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/header-image-wrapper.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/short_term_residency_permit.css">
<link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/phone-input.css">
<title>Short-Term Residency Permit in turkey</title>
<meta name="description"
      content="short-term residence permits are issued for a maximum of two years as a principle. (Note: A residence permit is invalidated if it is not used within six months.)">
<style type="text/css">
    h2 {
        font-size: 1.3rem;
        font-weight: 800;
    }

    .side-recommended-owl .item .card img {
        border-top-left-radius: 20px !important;
        border-top-right-radius: 20px !important;
    }
</style>
<link rel="canonical" href="https://www.primepropertyturkey.com/short-term-residency-permit"/>
</head>
<body>
<?php $this->load->view('web-site/includes/top-section'); ?>
    <section id="theme-background">
        <div class="header-image-wrapper">
            <div class="bg" id="short_term_residency-BG"></div>
            <div class="mask"></div>
            <div class="header-image-content offset-bottom">
                <h1 class="title text-center px-1 font-weight-bold">Short-Term Residency Permit</h1>
            </div>
        </div>
    </section>
    <section id="content-buy-online">
        <div class="container">
            <div class="row justify-content-center py-2 py-md-5">
                <div class="col-lg-8 content">
                    <div class="card my-2">
                        <div class="card-body py-4">
                            <h2 class="content-tile pt-4 pb-2 px-4">
                                Short-Term Residence Permit for Foreigners
                            </h2>
                            <p class="p-4 text-justify">
                                For most nationals on a Turkish tourist visa, they cannot stay more than 90 days out of
                                180 days. This time is enough time to choose whether one wants to stay in Turkey or not.
                                To apply for a short-term residence permit, foreigners must submit the relevant
                                documents to the Provincial Directorate of Immigration Administration (Göçİdaresi). Once
                                an application is submitted through the e-residence system, short-term residence permits
                                are issued for a maximum of two years as a principle. (Note: A residence permit is
                                invalidated if it is not used within six months.)
                                <br>
                                The Turkish residency permit does not allow one to work but does offer the right to
                                reside for the time period granted.

                            </p>
                            <img src="<?= base_url(); ?>assets/web-site/images/residencepermit.webp"
                                 alt="short term residential permit"
                                 class="img-fluid p-3">
                            <h2 class="content-tile pt-4 pb-2 px-4">
                                Who can apply for a Turkish Short Term Residence Permit?
                            </h2>
                            <p class="p-4 text-justify">
                                There are different categories of people who can apply for a Turkish short-term permit
                                and an example are
                            </p>
                            <ul>
                                <li> Foreigners who wish to stay for tourism purposes
                                </li>
                                <li> Foreigners who will own immovable property in Turkey
                                </li>
                                <li> Foreigners who will establish a business in Turkey
                                </li>
                                <li> Foreigners who wish to study a Turkish language course
                                </li>
                                <li> Foreigners who will attend an education program, research, or internship in Turkey
                                </li>
                                <li> Those who participate in on-job training
                                </li>
                                <li> Foreigners who transfer for a family residence permit
                                </li>
                            </ul>
                            <h2 class="content-tile pt-4 pb-2 px-4">
                                How to apply for a Turkish Residence Permit?
                            </h2>
                            <p class="p-4 text-justify">
                                To apply, research what paperwork is required and gather it before you begin the online
                                process on the E-ikamet website, <a href="https://e-ikamet.goc.gov.tr" target="_blank">https://e-ikamet.goc.gov.tr</a>
                                The site will not allow you
                                to go further if you do not have required items like your biometric digital passport
                                photo
                                ready. Double-check all of your documentation including spellings, it will prevent
                                problems during the process and for future renewals. Having private health insurance is
                                a requirement to stay more than 90 days in Turkey and there are many good policies
                                available from agents across the country.
                                <br>
                                Once the system has accepted your application you will receive a time, date, and
                                location
                                for your appointment via text message or email from the Goc Idaresi (Migration
                                Office). This will have your application number and state where you will submit your
                                paperwork to a provincial immigration agent at a local office. There is a fee for a
                                residency
                                permit that depends on your nationality and card. They will inform you if anything is
                                missing which you will be expected to provide within a given time.
                            </p>
                            <h2 class="content-tile pt-4 pb-2 px-4">
                                Collecting your Residence Permit
                            </h2>
                            <p class="p-4 text-justify">
                                Upon a successful application, you will receive a text message from the Goc Idaresi
                                letting
                                you know you have been approved. They will assign you a foreigner’s identification
                                number starting with 99 and send your identity card via the postal service to the
                                address
                                you provided on your application. If there are any problems you can contact the
                                Directorate of Migration Management by calling 157, the service has options for Arabic,
                                English, Farsi, German, Russian and Turkish speakers.
                            </p>
                        </div>
                    </div>
                    <div class="card my-3" style="background-color: #eaeaea">
                        <div class="card-body">
                            <div class="useful px-4 py-2">
                                <strong> Did You Find This Useful ? </strong>

                                <button id="like_button"
                                        <? if (is_permitDisliked()){ ?>style="pointer-events: none;border: 0;background-color: transparent;"
                                        <? }else{ ?>style="border: 0;background-color: transparent;" <?}?>
                                ><? if (is_permitLiked()) { ?><span class="pl-2"><i
                                                class="fas fa-thumbs-up"></i></span><? } else { ?><span class="pl-2"><i
                                                class="far fa-thumbs-up"></i></span><? } ?>
                                </button>
                                <button id="Dislike_button"
                                        <? if (is_permitLiked()){ ?>style="pointer-events: none;border: 0;background-color: transparent;"
                                        <? }else{ ?>style="border: 0;background-color: transparent;"<?}?> ><? if (is_permitDisliked()) { ?>
                                        <span class="pl-2"><i class="fas fa-thumbs-down"></i></span><? }else{ ?><span
                                            class="pl-2"><i class="far fa-thumbs-down"></i></span><?}?>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="card my-3">
                        <? $passed_data['type'] = 'permit'; ?>
                        <? $this->load->view('web-site/includes/suitable-citizenship', $passed_data); ?>
                    </div>
                    <div class="card side contact my-2" id="side-contact-us">
                        <?php $this->load->view('web-site/includes/side-contact-us'); ?>
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
<script type="text/javascript" src="<?= base_url(); ?>assets/web-site/js/phone-input.js"></script>
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
            responsive: {0: {items: 1}, 600: {items: 1}, 1000: {items: 1}}
        })
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#like_button").on("click", function () {
            $.ajax({
                url: '<?= base_url(); ?>Like/permit',
                method: 'POST',
                data: {value_data_posted: 'fag'},
                dataType: 'json',
                success: function (response) {
                    if (response) {
                        location.reload();
                    } else {
                        location.reload();
                    }
                }
            });
        });
        $("#Dislike_button").on("click", function () {
            $.ajax({
                url: '<?= base_url(); ?>Dislike/permit',
                method: 'POST',
                data: {value_data_posted: 'fag'},
                dataType: 'json',
                success: function (response) {
                    if (response) {
                        location.reload();
                    } else {
                        location.reload();
                    }
                }
            });
        });
    });
</script>
</body>
</html>

