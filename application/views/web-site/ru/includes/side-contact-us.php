<div class="card-title my-2 text-center font-weight-bold text-white">
    Свяжитесь с нами для бесплатной консультации
</div>
<script src="https://www.google.com/recaptcha/api.js" ></script>
<div class="border"></div>
<div class="card-body">
    <form action="<?= base_url();?>Post/contact_us" method="post" onsubmit="return sideContactFormValidation();">
        <div class="form-group">
            <input type="text" class="form-control" required name="info" placeholder="Full Name" id="sideContactForm_info">
            <span id="sideContactForm_info_error" style="display:none;font-size: 0.6rem;padding-top: 5px;color: white;text-shadow: 1px 1px 5px red;"
                  class="vision">
               Please enter your first and last name separated by a space (e.g. Jane Miller)
            </span>
        </div>
        <div class="form-group">
            <input type="email" class="form-control"  name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <input type="tel" id="phone_contactus" class="form-control" name="phone[main]" placeholder="Phone" required>
            <span id="sideContactForm_phone_error" style="display:none;font-size: 0.6rem;padding-top: 5px;color: white;text-shadow: 1px 1px 5px red;"
                  class="vision">
               Please Write Your Full PhoneNumber
            </span>
        </div>
        <div class="form-group" id="message">
            <textarea type="text" class="form-control" name="message" placeholder="Message" required></textarea>
        </div>
        <div class="form-group d-flex justify-content-center">
            <div class="g-recaptcha"
                 data-sitekey="6Leb_6MgAAAAALtcAlJS98nLXgm8RSA22-JzfnXN"></div>
        </div>
        <div class="form-group">
            <input type="submit"  class="btn btn-block red-button" value="REQUEST DETAIL">
        </div>
    </form>
</div>
<script type="text/javascript">
    function sideContactFormValidation(){
        let sideContactFormFlag = true;
        let sideContactForm_info_error = document.getElementById('sideContactForm_info_error');
        let sideContactForm_phone_error = document.getElementById('sideContactForm_phone_error');
        sideContactForm_info_error.style.display = 'none';
        sideContactForm_phone_error.style.display = 'none';
        let sideContactForm_info = document.getElementById('sideContactForm_info').value;
        let sideContactForm_phone = document.getElementById('phone_contactus').value;
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
    const phoneInputFieldModalVal = document.querySelector("#phone_contactus");
    const phoneInputModalVal = window.intlTelInput(phoneInputFieldModalVal, {
        separateDialCode: true,
        preferredCountries:["<? if (isset($geolocation)){echo $geolocation;}else{echo 'us';} ?>"],
        hiddenInput: "full",
        utilsScript:
            "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
</script>
