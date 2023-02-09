<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/header-image-wrapper.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/contact-us.css">
<link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/phone-input.css">
<title>Contact prime Property Turkey - Property Turkey</title>
<meta name="description"
      content="Contact Us, Having more than 10+ years of real estate experience, Prime Property Turkey delivers knowledge and expertise second to none in Turkey's ever evolving market.">
<link rel="canonical" href="https://www.primepropertyturkey.com/contact-us"/>
<script src="https://www.google.com/recaptcha/api.js"></script>

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="https://www.primepropertyturkey.com/contact-us">
<meta name="twitter:creator" content="Justin Mays">
<meta name="twitter:image:alt" content="Contact prime Property Turkey - Property Turkey">
<meta name="twitter:title"
      content="Contact prime Property Turkey - Property Turkey">
<meta name="twitter:description"
      content="Contact Us, Having more than 10+ years of real estate experience, Prime Property Turkey delivers knowledge and expertise second to none in Turkey's ever evolving market.">
<meta name="twitter:image" content="<?= base_url(); ?>assets/web-site/images/PrimePropertyTurkeybuildlogo.webp">
<link rel="alternate" hreflang="x-default" href="https://www.primepropertyturkey.com/contact-us" />
<link rel="alternate" hreflang="en" href="https://www.primepropertyturkey.com/contact-us" />
<link rel="alternate" hreflang="ru" href="https://www.primepropertyturkey.com/ru/contact-us" />


<style type="text/css">
    .contact-card {
        color: white;
        background-image: linear-gradient(140deg, #466ad8, #012169);
        border: none !important;
    }

    .contact-card .btn {
        border-radius: 50px;
        font-weight: bold;
    }

    #contact-us .border {
        border: none !important;
    }

    .border {
        border: none !important;
    }
    @media screen and (min-width: 426px) and (max-width:768px) {
        .info-card{
            font-size: 0.7rem;
        }
    }

</style>
</head>
<body>
<?php $this->load->view('web-site/includes/top-section'); ?>
<main>
    <section id="theme-background">
        <div class="header-image-wrapper">
            <div class="bg" id="contact-us-BG"></div>
            <div class="mask"></div>
            <div class="header-image-content offset-bottom">
                <h1 class="title text-center font-weight-bold">Contact Prime Property Turkey</h1>
            </div>
        </div>
    </section>
    <section id="contact-us">
        <div class="container">
            <div class="row justify-content-center py-2 py-md-5">
                <div class="col-md-4">
                    <div class="info-card mb-3">
                        <div class="row justify-content-center">
                            <div class="col-12 red-text my-1 pt-2 text-center ico">
                                <i class="fas fa-home"></i>
                            </div>
                            <div class="col-12 red-text my-1 text-center title">
                                ADDRESS :
                            </div>
                            <div class="col-12 font-weight-bold my-1 text-center">
                                Istanbul Office
                            </div>
                            <p class="text-justify my-1 py-2 px-5">
                                DAP Vadi, S-Blok, Ofis No:108-109, Merkez Mah, KAĞITHANE / İSTANBUL
                            </p>
                        </div>
                    </div>
                    <div class="info-card my-3">
                        <div class="row justify-content-center">
                            <div class="col-12 red-text my-1 pt-2 text-center ico">
                                <i class="fas fa-phone fa-flip-horizontal"></i>
                            </div>
                            <div class="col-12 red-text my-1 text-center title">
                                PHONES :
                            </div>
                            <p class="text-justify my-1 py-2 px-5">
                                (+90) 552 754 44 93
                            </p>
                        </div>
                    </div>
                    <div class="info-card my-3">
                        <div class="row justify-content-center">
                            <div class="col-12 red-text my-1 pt-2 text-center ico">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="col-12 red-text my-1 text-center title">
                                E-MAIL :
                            </div>
                            <p class="text-justify my-1 py-2 px-5">
                                info[at]PrimePropertyTurkey.com
                            </p>
                        </div>
                    </div>
                    <div class="info-card my-3">
                        <div class="row justify-content-center">
                            <div class="col-12 red-text my-1 pt-2 text-center ico">
                                <i class="fas fa-home"></i>
                            </div>
                            <div class="col-12 red-text my-1 text-center title">
                                ADDRESS :
                            </div>
                            <div class="col-12 font-weight-bold my-1 text-center">
                                US Office
                            </div>
                            <p class="text-justify my-1 py-2 px-5">
                                125 Helmsman Dr Wilmington, NC 28412
                            </p>
                        </div>
                    </div>
                    <div class="info-card my-3">
                        <div class="row justify-content-center">
                            <div class="col-12 red-text my-1 pt-2 text-center ico">
                                <i class="fas fa-phone fa-flip-horizontal"></i>
                            </div>
                            <div class="col-12 red-text my-1 text-center title">
                                PHONES :
                            </div>
                            <p class="text-justify my-1 py-2 px-5">
                                (+1) 910 747 3755
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="contact-card">
                        <div class="row">
                            <div class="col-12 py-3">
                                <div class="title text-center">
                                    Contact Us For Free Consultation
                                </div>
                                <div class="border"></div>
                            </div>
                            <form action="<?= base_url(); ?>/Post/contact_us" method="post"
                                  onsubmit="return sideContactFormValidation();">
                                <div class="col-12">
                                    <div class="row px-2 justify-content-center">
                                        <div class="col-lg-4 justify-content-center">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Full Name" required
                                                       name="info" id="sideContactForm_info">
                                                <span id="sideContactForm_info_error"
                                                      style="display:none;font-size: 0.6rem;padding-top: 5px;color: white;text-shadow: 1px 1px 5px red;"
                                                      class="vision">
                                                        Please enter your first and last name separated by a space (e.g. Jane Miller)
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 justify-content-center">
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Email" required
                                                       name="email">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 justify-content-center">
                                            <div class="form-group">
                                                <input type="tel" class="form-control" placeholder="Phone" id="phone"
                                                       name="phone[main]" required>
                                                <span id="sideContactForm_phone_error"
                                                      style="display:none;font-size: 0.6rem;padding-top: 5px;color: white;text-shadow: 1px 1px 5px red;"
                                                      class="vision">
                                                       Please Write Your Full PhoneNumber
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row px-2 justify-content-center">
                                        <div class="col-12">
                                            <textarea name="message" id="message" cols="30" rows="4"
                                                      class="form-control"
                                                      placeholder="Message" required></textarea>
                                        </div>
                                        <div class="my-2">
                                            <div class="g-recaptcha"
                                                 data-sitekey="6Leb_6MgAAAAALtcAlJS98nLXgm8RSA22-JzfnXN"></div>
                                        </div>
                                    </div>

                                    <div class="row px-2 py-2 justify-content-center align-items-center">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <input type="submit" class="btn red-button btn-block" value="SUBMIT"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="map-card">
                        <div class="row">
                            <div class="col-12 py-3">
                                <iframe src="https://www.google.com/maps?q=Prime+Property+Turkey&hl=es;z=15&amp;output=embed"
                                        width="100%" height="350" style="border:0;" allowfullscreen=""
                                        loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php $this->load->view('web-site/includes/footer'); ?>
<?php $this->load->view('web-site/includes/foot-load'); ?>
<script type="text/javascript">
    function sideContactFormValidation() {
        let sideContactFormFlag = true;
        let sideContactForm_info_error = document.getElementById('sideContactForm_info_error');
        let sideContactForm_phone_error = document.getElementById('sideContactForm_phone_error');
        sideContactForm_info_error.style.display = 'none';
        sideContactForm_phone_error.style.display = 'none';
        let sideContactForm_info = document.getElementById('sideContactForm_info').value;
        let sideContactForm_phone = document.getElementById('phone').value;
        let sideContactForm_info_regex = new RegExp(/^\w+\s+\w+/i);
        let sideContactForm_phone_regex = new RegExp(/\d{5,20}/g);

        if (sideContactForm_info_regex.test(sideContactForm_info) != true) {
            sideContactFormFlag = false;
            sideContactForm_info_error.style.display = 'block';
        }
        if (sideContactForm_phone_regex.test(sideContactForm_phone) != true) {
            sideContactFormFlag = false;
            sideContactForm_phone_error.style.display = 'block';
        }
        return sideContactFormFlag;
    }

    const phoneInputFieldModalVal = document.querySelector("#phone");
    const phoneInputModalVal = window.intlTelInput(phoneInputFieldModalVal, {
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
</body>
</html>