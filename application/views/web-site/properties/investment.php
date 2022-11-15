<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php header('Cache-Control: no cache'); //disable validation of form by the browser ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/find-property.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/cities-property.css">
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/phone-input.css">
<title>Apartment for investment in turkey</title>
<meta name="description" content="apartment for investment in turkey">
<link rel="canonical" href="https://www.primepropertyturkey.com/apartment-for-investment-in-turkey"/>
<script src="https://www.google.com/recaptcha/api.js" ></script>
<style type="text/css">
    svg {
        cursor: pointer;
    }
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
    .is_commercial{
        position: absolute;
        left: 20px;
        top: 50px;
        background-color: #012169 ;
        color: white;
        padding: 5px 10px;
        border-radius: 10px;
        font-size: 0.7rem;
        font-weight: bold;
        color: white;
        opacity: 0.85;
    }
    .is_commercial-badge{
        background: #012169;
        color: white;

        border-radius: 10px;
        display: block;
        position: absolute;

        opacity: 0.95;
        font-weight: bold;
        font-size: 0.8rem;
        padding: 5px 10px;
        top: 9%;
        left: 3%;
    }
    .resale-badge{
        background: #012169;
        color: white;

        border-radius: 10px;
        display: block;
        position: absolute;

        opacity: 0.95;
        font-weight: bold;
        font-size: 0.8rem;
        padding: 5px 10px;
        top: 9%;
        right: 3%;
    }
    #price-section .col {
        padding-left: 5px;
        padding-right: 5px;
    }
    #description-section {
        min-height: 120px;
        align-items: center;
    }

    #description-section p {
        margin-bottom: 0;
        padding-bottom: 0;
    }
    #title-section {
        position: absolute;
        top: 188px;
        left: 1%;
        right: 1%;
        background: rgba(255, 255, 255, 0.8);
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        min-height: 90px;
    }
    .display-mah-element{
        display: inline-block !important;
    }
    .hide-mah-element{
        display: none;
    }
</style>
</head>
<body>
<?php $this->load->view('web-site/includes/top-section'); ?>
<section id="about-city" class="mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 py-3">
                    <div class="card py-3 city-card">
                        <div class="card-body py-2 px-1">
                            <h1 class="text-center py-3 px-2">
                                Apartment For Investment in Turkey
                            </h1>
                            <div class="border"></div>
                            <p class="px-3 pt-2 text-justify">
                                If you are looking for property for investment, Turkey is the best country to consider. Turkey has properties that are suitable for a Turkish residence permit and Turkish citizenship. Properties for 75.000 USD are suitable for a long-term residence permit while those for 400.000 USD give foreign buyers rights the same as those enjoyed by Turkish nationals. The citizenship package benefits the buyer’s spouse and children under the age of 18. Apartments for investment in Turkey vary in size, location, facilities and aesthetics.                             </p>
                                <button class="py-1 px-3 pb-3" id="read-more" style="position: absolute;right: 10px;bottom: 0px;">
                                    Read More
                                </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<section id="content" class="py-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row justify-content-center">
                    <? if ($property_result) { ?>
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
                            <div class="col-md-3">
                                <div class="item my-2">
                                    <div class="card feature-sm-back">
                                        <div class="card-body">
                                            <div id="top-image">
                                                <a href="<?= base_url(); ?>properties/<?= $value->url_slug; ?>">
                                                    <img class="card-img-top img-fluid" style="min-height: 280px;max-height: 280px"
                                                         src="<?= base_url(); ?><? if ($value->ReferenceLink!='0'){ echo "assets/web-site/images/resales/webps/"; }else{ echo "assets/web-site/images/properties/P_Thumb/";} ?><?=  $image_name_webp; ?>"
                                                         alt="<?= $value->Property_title; ?>" >
                                                </a>
                                            </div>
                                            <div id="badge-sections">
                                           <span class="card-type-badge">
                                              <?= $value->Property_type; ?>
                                           </span>
                                                <? if ($value->SoldOut) { ?>
                                                    <span class="sold-out-badge">
                                              Sold Out
                                            </span>
                                                <? } ?>
                                                <? if ($value->Property_type!='Commercial' and $value->is_commercial=='1'){ ?>
                                                    <span class="is_commercial-badge">
                                              Commercial
                                            </span>
                                                <?}?>
                                                <? if ($value->UserID!='admins'){ ?>
                                                    <span class="resale-badge">
                                                      Resale
                                                    </span>
                                                <? } ?>
                                                <span class="card-favorite">
                                                          <? if (is_favored($value->Property_id)) { ?>
                                                              <button onclick="delete_favorite('<?= $value->Property_id; ?>');" style="background-color: transparent !important;padding: 0; border: 0"
                                                                      class="red-text" >
                                                        <i class="fas fa-heart red-text"></i>
                                                    </button>
                                                          <? } else { ?>
                                                              <button onclick="set_favorite('<?= $value->Property_id; ?>');" style="background-color: transparent !important;padding: 0;border: 0"
                                                                      class="text-reset">
                                                        <i class="far fa-heart"></i>
                                                    </button>
                                                          <? } ?>
                                            </span>
                                            </div>
                                            <div id="title-section">
                                                <a href="<?= base_url(); ?>properties/<?= $value->url_slug; ?>"
                                                   class="text-reset text-left property-title font-weight-bold px-2 py-2 d-block blue-text"
                                                   title="<?= $value->Property_Bedrooms; ?> Bedroom <?= $value->Property_type; ?> For Sale In <?= $value->Property_location_city; ?>, <?= $value->Property_location; ?>, Turkey">
                                                    <h2 class="font-weight-bold" style="font-size: 0.9rem;line-height: 1.5rem">
                                                        <?= $value->Property_title; ?>
                                                    </h2>
                                                </a>
                                            </div>
                                            <div id="under-cover" class="row mx-2 my-2 justify-content-around align-items-center">
                                                <div id="price-section" class="col-5">
                                                      <span class="red-text font-weight-bold" style="font-size: 1.2rem">
                                                    <? if (!$value->SoldOut and $value->Property_price != 0) { ?>
                                                        <? if ($this->session->has_userdata('currency')) {
                                                            switch ($this->session->userdata('currency')) {
                                                                case 'USD': ?>
                                                                    <i class="fas fa-dollar-sign"></i>
                                                                    <?= number_format($value->Property_price); ?>
                                                                    <?
                                                                    break;
                                                                case 'TRY': ?>
                                                                    <i class="fas fa-lira-sign"></i>
                                                                    <?= number_format($value->Property_price * $currency_exchange_data->try); ?>

                                                                    <?
                                                                    break;
                                                                case 'EUR': ?>
                                                                    <i class="fas fa-euro-sign"></i>
                                                                    <?= number_format($value->Property_price * $currency_exchange_data->euro); ?>
                                                                    <?
                                                                    break;
                                                                case 'GBP': ?>
                                                                    <i class="fas fa-pound-sign"></i>
                                                                    <?= number_format($value->Property_price * $currency_exchange_data->gpt); ?>
                                                                    <?
                                                                    break;
                                                            }
                                                        } else { ?>
                                                            <i class="fas fa-dollar-sign"></i>
                                                            <?= number_format($value->Property_price); ?>
                                                        <? }
                                                    } else {
                                                        echo "Contact Us";
                                                    } ?>
                                                 </span>
                                                </div>
                                                <div class="col-7">
                                                    <div class="row justify-content-around align-items-center">
                                                        <div class="col-7 card-speciality">
                                                            <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico2.webp" class="img-fluid">
                                                            <span class="mx-1"> <?= $value->Property_location; ?></span></div>
                                                        <div class="col-5 card-speciality">
                                                            <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico3.webp" class="img-fluid">
                                                            <span class="mx-1"><?= $value->Property_Bedrooms; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-around align-items-center">
                                                        <div class="col-7 card-speciality">
                                                            <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico4.webp" class="img-fluid">
                                                            <span class="mx-1"><?= $value->Property_Bathrooms; ?></span>
                                                        </div>
                                                        <div class="col-5 card-speciality">
                                                            <img src="<?= base_url(); ?>assets/web-site/images/base/audition-svg/ico1.webp" class="img-fluid" >
                                                            <span><?= $value->Property_living_space; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mx-2 mt-2" id="description-section">
                                                <p class="text-left">
                                                    <?= substr(strip_tags($value->Property_overview), 0, 100) . "...."; ?>
                                                </p>
                                            </div>
                                            <div class="row justify-content-around align-items-center py-2">
                                                <a href="<?= base_url(); ?>properties/<?= $value->url_slug; ?>"
                                                   class="btn btn-outline-danger btn-sm  d-flex my-1">
                                                    View Details
                                                </a>
                                                <button class="btn btn-danger btn-sm d-flex font-weight-bold my-1"
                                                        data-toggle="modal"
                                                        data-whatever="<?= $value->Property_referenceID; ?>"
                                                        data-target="#quickEnquireModal">
                                                    Quick Enquiry
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <? } ?>
                        <? $cityValue = $this->uri->segment(2); ?>
                    <? }else { ?>
                        <div class="card">
                            <div class="card-body text-center">
                                <p>
                                    "Please get in touch with us to get consultation about properties in this neighborhood"
                                </p>
                                <a href="<?= base_url(); ?>contact_us" class="btn btn-primary">Contact Us</a>
                            </div>
                        </div>
                    <? } ?>
                </div>
            </div>
            <div class="col-lg-12 mb-3" id="collapse"></div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        Considering that many districts in Turkey are safe for foreigners, buyers only have to look out for important amenities which include schools, hospitals, grocery shops and main roads when choosing the location of their real estate investment. Some buyers pick their option due to its proximity to nature, for example, if the project is close to the beach, the forest or has a mountainous backdrop, and away from the noise of the city center. The cities in Turkey have endless investment apartments for sale to choose from. A foreigner is allowed to buy multiple properties and can get passive income by renting the properties annually or as holiday homes. Do not miss out on this opportunity to become a homeowner in Turkey, contact Prime Property today.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
                <form method="post" action="<?= base_url(); ?>Post/enquire" id="enquiry" onsubmit="return ModalEnquireFormValidation();">
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
                                <input type="text" id="modal_phone" class="form-control" placeholder="Phone" name="phone[main]"  form="enquiry" required>
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
                        <div class="col-md-12 text-center d-flex justify-content-center">
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
<script type="text/javascript">
    $(document).ready(function () {
        $("#read-more").click(function () {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#collapse").offset().top
            }, 2000);
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#quickEnquireModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var recipient = button.data('whatever');
            var modal = $(this);
            modal.find('#modal_reference_id').val(recipient);
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
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
</script>
<script src="<?= base_url();?>assets/web-site/js/istanbul-map.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        let ilce_name = "<?= $this->uri->segment(2); ?>";
        let ilce_id = istanbul_ilce_list.indexOf(ilce_name);
        document.getElementById(ilce_id).style.fill = '#012169';
        apearPopUp(ilce_id);
        showClosedArea(ilce_id);
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#city_value').change(function(){
            let City = $(this).val();
            let pro_type = $('#property_type').val();
            let pro_bed = $('#property_bed').val();
            if (City !='All'){
                $.ajax({
                    url:'<?=base_url()?>AjaxRequest/propertyType',
                    method: 'post',
                    data: {City: City},
                    dataType: 'json',
                    success: function(response){
                        $('#property_type').text('');
                        $('#property_type').append($('<option>', {
                            value: 'All',
                            text : 'Type'
                        }));
                        $('#property_type').append($('<option>', {
                            value: 'All',
                            text : 'All'
                        }));
                        $.each(response, function (i, item) {
                            $('#property_type').append($('<option>', {
                                value: item.Property_type,
                                text : item.Property_type
                            }));
                        });
                    }
                });
                $.ajax({
                    url:'<?=base_url()?>AjaxRequest/propertyBed',
                    method: 'post',
                    data: {City: City},
                    dataType: 'json',
                    success: function(response){
                        $('#property_bed').text('');
                        $('#property_bed').append($('<option>', {
                            value: 'All',
                            text : 'Bedrooms'
                        }));
                        $('#property_bed').append($('<option>', {
                            value: 'All',
                            text : 'All'
                        }));
                        $.each(response, function (i, item) {
                            $('#property_bed').append($('<option>', {
                                value: item.Property_Bedrooms,
                                text : item.Property_Bedrooms
                            }));
                        });
                    }
                });
            }else{
                $('#property_type').text('');
                $('#property_type').append($('<option>', {
                    value: 'All',
                    text : 'Type'
                }));
                $('#property_type').append($('<option>', {
                    value: 'All',
                    text : 'All'
                }));
                <? foreach ($ProType as $value){ ?>
                $('#property_type').append($('<option>', {
                    value: '<?= $value; ?>',
                    text : '<?= $value; ?>'
                }));
                <? } ?>
                $('#property_bed').text('');
                $('#property_bed').append($('<option>', {
                    value: 'All',
                    text : 'Bedrooms'
                }));
                $('#property_bed').append($('<option>', {
                    value: 'All',
                    text : 'All'
                }));
                <? foreach ($proBed as $value){ ?>
                $('#property_bed').append($('<option>', {
                    value: '<?= $value; ?>',
                    text : '<?= $value; ?>'
                }));
                <? } ?>
            }
        });
        $('#property_type').change(function(){
            let pro_type = $(this).val();
            let City = $('#city_value').val();
            if (pro_type !='All'){
                $.ajax({
                    url:'<?=base_url()?>AjaxRequest/propertyTypeBedroom',
                    method: 'post',
                    data: {City: City,pro_type:pro_type},
                    dataType: 'json',
                    success: function(response){
                        $('#property_bed').text('');
                        $('#property_bed').append($('<option>', {
                            value: 'All',
                            text : 'Bedrooms'
                        }));
                        $('#property_bed').append($('<option>', {
                            value: 'All',
                            text : 'All'
                        }));
                        $.each(response, function (i, item) {
                            $('#property_bed').append($('<option>', {
                                value: item.Property_Bedrooms,
                                text : item.Property_Bedrooms
                            }));
                        });
                    }
                });
            }else{
                if (City !='All'){
                    $.ajax({
                        url:'<?=base_url()?>AjaxRequest/propertyBed',
                        method: 'post',
                        data: {City: City},
                        dataType: 'json',
                        success: function(response){
                            $('#property_bed').text('');
                            $('#property_bed').append($('<option>', {
                                value: 'All',
                                text : 'Bedrooms'
                            }));
                            $('#property_bed').append($('<option>', {
                                value: 'All',
                                text : 'All'
                            }));
                            $.each(response, function (i, item) {
                                $('#property_bed').append($('<option>', {
                                    value: item.Property_Bedrooms,
                                    text : item.Property_Bedrooms
                                }));
                            });
                        }
                    });
                }else{
                    $('#property_bed').text('');
                    $('#property_bed').append($('<option>', {
                        value: 'All',
                        text : 'Bedrooms'
                    }));
                    $('#property_bed').append($('<option>', {
                        value: 'All',
                        text : 'All'
                    }));
                    <? foreach ($proBed as $value){ ?>
                    $('#property_bed').append($('<option>', {
                        value: '<?= $value; ?>',
                        text : '<?= $value; ?>'
                    }));
                    <? } ?>
                }
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        let city = '<?= $cityValue; ?>';
        if( city=='Istanbul')
        {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#istanbulMap").offset().top -100
            }, 2000);
        }else {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#padding-target").offset().top -100
            }, 2000);
        }
    });
</script>
<script type="text/javascript">
    function set_favorite(value){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            if (this.responseText){
                location.reload();
            }
        }
        xhttp.open("POST", "<?= base_url();?>Favorite/set_favorite");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("send_value="+value);
    }
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
</script>
</body>
</html>