<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<meta name="robots" content="noindex, nofollow">
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/login.css">
<link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<link rel="stylesheet" href="<?= base_url();?>assets/web-site/css/phone-input.css">
<script src="https://www.google.com/recaptcha/api.js"></script>
<title>Signup | Download our Buyer Guide</title>
</head>
<body>
<?php $this->load->view('web-site/includes/top-section'); ?>
<main>
    <section id="login">
        <div class="container-fluid my-md-5 my-3">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-9">
                    <div class="card">
                        <div class="card-body justify-content-center">
                            <div class="card-title text-center font-weight-bold">
                                Signup
                            </div>
                            <p class="text-center">
                                Download our Buyer Guide
                            </p>
                            <form action="<?= base_url(); ?>Signup/submitSignup" class="mx-1 px-1 my-1 py-1" method="post" onsubmit="return signupFormValidation();" autocomplete="on">
                                <div class="form-group">
                                    <label for="info">
                                        Name
                                        <sup class="require text-danger">*</sup>
                                    </label>
                                    <input type="text" class="form-control" required name="info" id="signupForm_info" autocomplete="on" <? if (isset($_COOKIE['userSignupName']) and $_COOKIE['userSignupName']!=''){?> value="<?= $_COOKIE['userSignupName'];?>" <?}?>>
                                    <span id="signupForm_info_error" style="display:none;font-size: 0.6rem;padding-top: 5px;color: red;text-shadow: 1px 1px 5px white;"
                                          class="vision">
                                       Please enter your first and last name separated by a space (e.g. Jane Miller)
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="email">
                                        Email
                                        <sup class="require text-danger">*</sup>
                                    </label>
                                    <input type="email" class="form-control" required name="email" id="signupForm_email" autocomplete="on" <? if (isset($_COOKIE['userSignupEmail']) and $_COOKIE['userSignupEmail']!=''){?> value="<?= $_COOKIE['userSignupEmail'];?>" <?}?>>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Mobile
                                        <sup class="require text-danger">*</sup>
                                    </label>
                                    <input type="tel" class="form-control" placeholder="phone number" id="signupForm_phone" name="phone[main]" required autocomplete="on" <? if (isset($_COOKIE['userSignupPhone']) and $_COOKIE['userSignupPhone']!=''){?> value="<?= $_COOKIE['userSignupPhone'];?>" <?}?>>
                                    <span id="signupForm_phone_error" style="display:none;font-size: 0.6rem;padding-top: 5px;color: red;text-shadow: 1px 1px 5px white;"
                                          class="vision">
                                       Please Write Your Full PhoneNumber
                                    </span>
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <div class="g-recaptcha"
                                         data-sitekey="6Leb_6MgAAAAALtcAlJS98nLXgm8RSA22-JzfnXN"></div>
                                </div>
                                <div class="form-check my-1">
                                    <input type="checkbox" class="form-check-input" id="termCheck" required
                                           name="terms">
                                    <label class="form-check-label" for="termCheck">
                                        <a class="text-center text-danger" data-toggle="modal"
                                           data-target="#termsModal">
                                            Terms and conditions
                                        </a>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn red-button btn-block" value="Signup">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<div class="modal fade" id="termsModal">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-center"> Terms and conditions</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <p class="text-justify">
                    This privacy policy sets out how Prime Property Turkey uses and protects any information that you
                    give Prime Property Turkey with your consent, when you Signup on this website
                    (www.primepropertyturkey.com) or engage in any of our services. Prime Property Turkey is committed
                    to ensuring that the privacy of our customers is always protected. Should we ask you to provide
                    certain information by which you can be personally identified when using this website, then you can
                    be assured that it will only be used in accordance with this privacy statement and in line with data
                    protection laws and policies.
                </p>
                <p class="text-justify">
                    Our website may place and access certain first-party Cookies on your computer or device. We use
                    Cookies to facilitate and improve your experience of our website and to provide and improve our
                    products and/or services. We have taken steps to ensure that your privacy and personal data is
                    protected and respected at all times in line with the usage of these cookies. By using our website,
                    you may also receive certain third-party Cookies on your computer or device. You can choose to
                    enable or disable Cookies in your internet browser.
                </p>
                <p class="text-justify">
                    <b>
                        “We do not share your personal data to 3rd parties or outside of Prime Property Turkey for any
                        sought of promotional services and we are committed to store it safely”
                    </b>
                </p>
                <p class="text-justify">
                    Prime Property Turkey as a company also undertake the responsibility to comply with applicable
                    Turkish Laws & Legislation from time to time in place.
                </p>
                <p>
                    For detailed information you can visit: <a href="https://www.primepropertyturkey.com/privacy_policy" target="_blank">www.primepropertyturkey.com/privacy_policy</a>
                </p>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<?php $this->load->view('web-site/includes/footer'); ?>
<?php $this->load->view('web-site/includes/foot-load'); ?>
<script type="text/javascript" src="<?= base_url(); ?>assets/web-site/js/user-register.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/web-site/js/phone-input.js"></script>
<script type="text/javascript">
    function signupFormValidation(){
        let signupFormFlag = true;
        let signupForm_info_error = document.getElementById('signupForm_info_error');
        let signupForm_phone_error = document.getElementById('signupForm_phone_error');
        signupForm_info_error.style.display = 'none';
        signupForm_phone_error.style.display = 'none';
        let signupForm_info = document.getElementById('signupForm_info').value;
        let signupForm_phone = document.getElementById('signupForm_phone').value;
        let signupForm_info_regex = new RegExp(/^\w+\s+\w+/i);
        let signupForm_phone_regex = new RegExp(/\d{5,20}/g);

        if (signupForm_info_regex.test(signupForm_info) != true) {
            signupFormFlag = false;
            signupForm_info_error.style.display = 'block';
        }
        if (signupForm_phone_regex.test(signupForm_phone) != true) {
            signupFormFlag = false;
            signupForm_phone_error.style.display = 'block';
        }
        return signupFormFlag;
    }

    const phoneInputFieldModalCoverVal = document.querySelector("#signupForm_phone");
    const phoneInputModalCoverVal = window.intlTelInput(phoneInputFieldModalCoverVal, {
        separateDialCode: true,
        preferredCountries:["<? if (isset($geolocation)){echo $geolocation;}else{echo 'us';} ?>"],
        hiddenInput: "full",
        utilsScript:
            "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
</script>
</body>

</html>