<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url();?>assets/web-site/css/header-image-wrapper.css">
<link rel="stylesheet" href="<?= base_url();?>assets/web-site/css/Buying-Online.css">
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<link rel="stylesheet" href="<?= base_url();?>assets/web-site/css/phone-input.css">
<title>Buying Online</title>
<meta name="description" content="In the twenty-first century where the internet provides us with direct access,
                                purchasing a property overseas and becoming a property owner has become much easier.">
<link rel="canonical" href="https://www.primepropertyturkey.com/buying-online"/>

</head>
<body>
<?php $this->load->view('web-site/ru/includes/top-section'); ?>
<section id="theme-background">
    <div class="header-image-wrapper">
        <div class="bg" id="Buying-Online-BG"></div>
        <div class="mask"></div>
        <div class="header-image-content offset-bottom">
            <h1 class="title text-center font-weight-bold">Buying Online</h1>
        </div>
    </div>
</section>
<section id="content-buy-online">
    <div class="container">
        <div class="row justify-content-center py-2 py-md-5">
            <div class="col-lg-8 content">
                <div class="card my-2">
                    <div class="card-body">
                        <img src="<?= base_url();?>assets/web-site/images/base/buy-online/buy property online 1.jpg" alt="buy property online"
                             class="img-fluid">
                        <p class="p-2 text-justify">
                            In the twenty-first century where the internet provides us with direct access,
                            purchasing a property overseas and becoming a property owner has become much easier.
                            Prime Property Turkey is ready and honored to provide you with virtual real estate
                            services. Our virtual tour is an interactive program designed for you to explore and
                            visit properties in Turkey from the comfort of your home. In six simple steps, you can
                            become a property owner and have the option to become a Turkish citizen by investment in
                            a property in a matter of a few clicks.
                        </p>
                        <h4 class="content-tile p-2">
                            Step One: Introduction
                        </h4>
                        <p class="p-2 text-justify">
                            Let's get to know each other!
                            After you submit your inquiry, a representative at Prime Property Turkey will reach out
                            to discuss your goals. During our chat, we will have the opportunity to get to know you
                            and discuss your real estate goals in Turkey. Whether it is property for personal use or
                            investment, we are ready to guide you every step of the way!
                            Our team members are expats themselves and have resided in Turkey for a reasonable
                            amount of time, so they understand the ins and outs of the market and culture. How 's
                            the lifestyle? What are common cultural practices? What is the rental return on
                            properties? All questions and concerns will be answered with our sincere interest for
                            our clients.
                            Our team members at Prime Property Turkey are well trained and ready to provide
                            one-on-one guidance to ensure compliance with all applicable laws. Whether you plan to
                            relocate, have a holiday home, or invest in one of the leading financial and cultural
                            hubs in Europe and Asia, we are ready to help!
                        </p>
                        <img src="<?= base_url();?>assets/web-site/images/base/buy-online/buy-property-online-2.jpg" alt="buy property online 2" class="img-fluid">
                        <h4 class="content-tile p-2">
                            Step Two: Time to Schedule
                        </h4>
                        <p class="p-2 text-justify">
                            Once we understand your needs, one of our investment consultants at Prime Property
                            Turkey will guide you through the market in the location of your choice. The consultant
                            is a person with expertise in specific properties and obtains all around knowledge on
                            the market's performance and availability. Based on the information provided during our
                            'introduction call,' our team members at Prime Property Turkey will tailor options
                            suitable to your criteria.

                            And then, we are all ready to begin the process.
                        </p>
                    </div>
                </div>
                <div class="card my-3" style="background-color: #eaeaea">
                    <div class="card-body">
                        <div class="useful px-4 py-2">
                            <strong> Did You Find This Useful ? </strong>
                            <button id="like_button"
                                    <? if (is_buying_onlineDisliked()){ ?>style="pointer-events: none;border: 0;background-color: transparent;"
                                    <? }else{ ?>style="border: 0;background-color: transparent;" <?}?>
                            ><? if (is_buying_onlineLiked()) { ?><span class="pl-2"><i
                                        class="fas fa-thumbs-up"></i></span><? } else { ?><span class="pl-2"><i
                                        class="far fa-thumbs-up"></i></span><? } ?>
                            </button>
                            <button id="Dislike_button"
                                    <? if (is_buying_onlineLiked()){ ?>style="pointer-events: none;border: 0;background-color: transparent;"
                                    <? }else{ ?>style="border: 0;background-color: transparent;"<?}?> ><? if (is_buying_onlineDisliked()) { ?>
                                    <span class="pl-2"><i class="fas fa-thumbs-down"></i></span><? }else{ ?><span
                                    class="pl-2"><i class="far fa-thumbs-down"></i></span><?}?>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="card side contact my-2" id="side-contact-us">
                    <?php $this->load->view('web-site/includes/side-contact-us'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('web-site/ru/includes/footer'); ?>
<?php $this->load->view('web-site/includes/foot-load'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#like_button").on("click", function () {
            $.ajax({
                url: '<?= base_url();?>Like/buying_online',
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
                url: '<?= base_url();?>Dislike/buying_online',
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
