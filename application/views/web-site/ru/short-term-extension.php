<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url();?>assets/web-site/css/header-image-wrapper.css">
<link rel="stylesheet" href="<?= base_url();?>assets/web-site/css/short_term_residency_permit.css">
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<link rel="stylesheet" href="<?= base_url();?>assets/web-site/css/phone-input.css">
<title>Краткосрочное продление срока проживания</title>
<meta name="description" content="Applications for an extension of the residence permit may be made to Governors’ Offices
                                within sixty days prior to its expiration, but under no circumstances should this be
                                done after the expiry date.">
<link rel="canonical" href="https://www.primepropertyturkey.com/ru/short-term-residency-extension" />
<style type="text/css">
    h2{
        font-size: 1.3rem;
        font-weight: 800;
    }
</style>
</head>
<body>
<?php $this->load->view('web-site/ru/includes/top-section'); ?>
<section id="theme-background">
    <div class="header-image-wrapper">
        <div class="bg" id="short_term_residency-BG"></div>
        <div class="mask"></div>
        <div class="header-image-content offset-bottom">
            <h1 class="title text-center px-1 font-weight-bold">Краткосрочное продление срока проживания</h1>
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
                            Заявление на продление краткосрочного пребывания
                        </h2>
                        <p class="p-4 text-justify">
                            Заявление о продлении срока действия вида на жительство может быть подано в канцелярии губернаторов в течение шестидесяти дней до истечения срока его действия, но ни в коем случае это не должно быть сделано после истечения срока его действия
                        </p>
                        <img src="<?= base_url();?>assets/web-site/images/base/renew -extension-citizenship.jpg"
                             alt="renew extension citizenship"
                             class="img-fluid p-3">
                        <p class="p-4 text-justify">
                            Чтобы получить продление, иностранцы должны подать заявление на получение вида на жительство через систему e-residence. Заполненное заявление и необходимые документы следует отправить по почте в течение пяти рабочих дней в один из соответствующих провинциальных офисов иммиграционной администрации (Göçİdaresi), расположенных в Адане, Анкаре, Анталье, Айдыне, Бурсе, Газиантепе, Стамбуле, Измире, Кайсери, Коджаэли, Мерсине, Мугле, Самсуне, Шанлыурфе или Текирдаге.
                        </p>
                        <h2 class="content-tile pt-4 pb-2 px-4">
                            Необходимые предметы
                        </h2>
                        <ul>
                            <li>Форма заявления на получение вида на жительство
                            </li>
                            <li>Нотариально заверенная копия паспорта или проездного документа
                            </li>
                            <li>Четыре биометрические фотографии
                            </li>
                            <li>Предоставление предыдущего документа о виде на жительство
                            </li>
                            <li>Доказательство наличия достаточных и устойчивых финансовых ресурсов на период пребывания в стране
                            </li>
                            <li>Документ о владении жильем заявителя*
                            </li>
                            <li>Письмо-приглашение или документы, выданные лицом/предприятием, с которым необходимо связаться**.
                            </li>
                            <li>Действительная медицинская страховка (достаточно одной из следующих):
                            </li>
                            <li>Доказательство доступа к медицинским услугам в Турции в рамках двусторонних соглашений о социальном обеспечении
                            </li>
                            <li>Документ о предоставлении, выданный учреждением социального обеспечения
                            </li>
                            <li>Частное медицинское страхование, включая период продления
                            </li>
                        </ul>
                        <h2 class="content-tile pt-4 pb-2 px-4">
                            Ключи
                        </h2>
                        <ul>
                            <li>Требуется для иностранцев, владеющих недвижимым имуществом в Турции
                            </li>
                            <li>Требуется для иностранцев, которые намерены установить деловые или коммерческие связи в Турции
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card my-3" style="background-color: #eaeaea">
                    <div class="card-body">
                        <div class="useful px-4 py-2">
                            <strong> Did You Find This Useful ? </strong>
                            <button id="like_button"
                                    <? if (is_extensionDisliked()){ ?>style="pointer-events: none;border: 0;background-color: transparent;"
                                    <? }else{ ?>style="border: 0;background-color: transparent;" <?}?>
                            ><? if (is_extensionLiked()) { ?><span class="pl-2"><i
                                        class="fas fa-thumbs-up"></i></span><? } else { ?><span class="pl-2"><i
                                        class="far fa-thumbs-up"></i></span><? } ?></button>
                            <button id="Dislike_button"
                                    <? if (is_extensionLiked()){ ?>style="pointer-events: none;border: 0;background-color: transparent;"
                                    <? }else{ ?>style="border: 0;background-color: transparent;"<?}?> ><? if (is_extensionDisliked()) { ?>
                                    <span class="pl-2"><i class="fas fa-thumbs-down"></i></span><? }else{ ?><span
                                    class="pl-2"><i class="far fa-thumbs-down"></i></span><? } ?></button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="card my-3">
                    <? $passed_data['type']='permit'; ?>
                    <? $this->load->view('web-site/includes/suitable-citizenship',$passed_data); ?>
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
<?php $this->load->view('web-site/ru/includes/footer'); ?>
<?php $this->load->view('web-site/includes/foot-load'); ?>
<script type="text/javascript" src="<?= base_url(); ?>assets/web-site/js/phone-input.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
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
        $("#like_button").on("click", function () {
            $.ajax({
                url: '<?= base_url();?>Like/extension',
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
                url: '<?= base_url();?>Dislike/extension',
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