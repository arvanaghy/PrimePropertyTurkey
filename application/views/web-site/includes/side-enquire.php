<div class="card side contact my-2" id="side-contact-us">
<div class="card-title mt-3 mb-1 text-center font-weight-bold text-white">
    <? if ($reference_id == 'Citizenship by investment') {?>
        Enquire About <br>
        Citizenship By
        <br>Investment Program
    <? }elseif($reference_id == 'after sale' or $reference_id == 'area guide' or $reference_id == 'blog' ){ ?>
        Contact Us For Free
        <br>Consultation
    <?} else {?>
    Enquire About
    <br />
    This Property
    <? } ?>
</div>
<link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<link rel="stylesheet" href="<?= base_url();?>assets/web-site/css/phone-input.css">
<script src="https://www.google.com/recaptcha/api.js"></script>
<div class="border"></div>
<div class="card-body" id="side-garde">
    <form action="<?= base_url(); ?>Post/enquire" method="post" onsubmit="return sideEnquireFormValidation();">
        <div class="form-group">
            <input type="text" class="form-control" required placeholder="Full Name" name="info" id="sideContactForm_info">
            <span id="sideContactForm_info_error" style="display:none;font-size: 0.6rem;padding-top: 5px;color: white;text-shadow: 1px 1px 5px red;"
                  class="vision">
               Please enter your first and last name separated by a space (e.g. Jane Miller)
            </span>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" required placeholder="Email" name="email">
        </div>
        <div class="form-group">
            <input type="tel" id="SideEnquirePhone" class="form-control" placeholder="Phone" name="phone[main]" required>
            <span id="sideContactForm_phone_error" style="display:none;font-size: 0.6rem;padding-top: 5px;color: white;text-shadow: 1px 1px 5px red;"
                  class="vision">
               Please Write Your Full PhoneNumber
            </span>
        </div>
        <div class="form-group" id="note">
            <textarea class="form-control" placeholder="Note" name="note" ></textarea>
        </div>
        <div class="form-group d-flex justify-content-center">
            <div class="g-recaptcha"
                 data-sitekey="6Leb_6MgAAAAALtcAlJS98nLXgm8RSA22-JzfnXN"></div>
        </div>
        <div class="form-group">
            <input type="hidden" value="<?= $reference_id; ?>" name="reference_id">
            <input type="submit"  class="btn btn-block red-button" value="<? if ($reference_id == 'after sale' or $reference_id == 'area guide'){echo 'REQUEST DETAIL';}else{echo 'SEND';} ?>">
        </div>
    </form>
</div>
</div>
<script type="text/javascript">
    function sideEnquireFormValidation(){
        let sideContactFormFlag = true;
        let sideContactForm_info_error = document.getElementById('sideContactForm_info_error');
        let sideContactForm_phone_error = document.getElementById('sideContactForm_phone_error');
        sideContactForm_info_error.style.display = 'none';
        sideContactForm_phone_error.style.display = 'none';
        let sideContactForm_info = document.getElementById('sideContactForm_info').value;
        let sideContactForm_phone = document.getElementById('SideEnquirePhone').value;
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
    const phoneInputFieldModalVal = document.querySelector("#SideEnquirePhone");
    const phoneInputModalVal = window.intlTelInput(phoneInputFieldModalVal, {
        separateDialCode: true,
        preferredCountries:["<? if (isset($geolocation)){echo $geolocation;}else{echo 'us';} ?>"],
        hiddenInput: "full",
        utilsScript:
            "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
</script>