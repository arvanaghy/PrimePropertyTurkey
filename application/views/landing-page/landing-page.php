<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="M">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/landing-page/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/landing-page/fonts/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/landing-page/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/landing-page/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/landing-page/css/style.css">
    <link rel="icon" href="<?= base_url(); ?>assets/web-site/images/fab.ico"/>
    <style type="text/css">
        .block {
            padding-top: 2rem;
            padding-bottom: 2rem;
            overflow: hidden;
        }

        .block .block__title {
            margin-bottom: 3rem;
            margin-top: 3rem;
        }

        .navbar {
            padding: 0 3rem !important;
            background-color: #012169 !important;
        }

        .navbar-light .navbar-nav .show > .nav-link, .navbar-light .navbar-nav .active > .nav-link, .navbar-light .navbar-nav .nav-link.show, .navbar-light .navbar-nav .nav-link.active {
            color: rgba(255, 255, 255, 0.9);
        }

        .navbar-light .navbar-nav .nav-link {
            color: white;
        }

        .navbar-light .navbar-nav .nav-link:hover {
            color: white;
            transition: 1s;
        }

        .navbar .nav-link:after {
            background-color: #cf142b !important;
        }

        .navbar .nav-info {
            color: white;
            opacity: 1 !important;
            font-weight: 900 !important;
        }

        .owl-next, .owl-prev {
            color: #cf142b;
            margin: 0 1%;
        }

        .owl-next:hover, .owl-prev:hover {
            background-color: #012169;
            color: white;
            opacity: 1;
            transition: 1s;
        }

        #footer {
            background-color: #012169 !important;
        }

        .btn.btn-framed.btn-primary {
            border-color: #cf142b !important;
        }

        .btn.btn-framed.btn-primary:hover {
            background-color: #012169;
            border-color: #012169 !important;
            transition: 1s;
        }

        #btn-back-to-top {
            position: fixed;
            bottom: 20px;
            right: 30px;
            display: none;
            padding: 15px;
            border-radius: 50%;
            background-color: grey;
            color: white;
            line-height: 0;
            opacity: 0.7;
            z-index: 99999;
        }

        .blockquote p {
            font-size: 2rem;
            line-height: 3rem;
            margin-bottom: 0;
            opacity: .8;
        }

        .blockquote i {
            color: #012169 !important;
            font-size: 3rem !important;
            margin-bottom: 3rem !important;
        }

        .navbar-dark .navbar-nav .nav-link.active:after {
            opacity: 1;
        }

        #hero .hero__caption {
            background-color: rgba(0, 0, 0, 0.7);
        }

        h1 {
            font-size: 4rem;
            margin-bottom: 3rem;
            margin-top: 1rem;
            font-weight: 600;
        }

        #prime_slogan::after{
            content: '';
            display: block;
            position: absolute;
            bottom: 55%;
            left: 0;
            right: 0;
            width: 160px;
            margin: 0 auto;
            height: 3px;
            background: #cf142b;
        }

        select {
            border: 0.2rem solid rgba(0, 0, 0, .15);
            border-radius: 0.3rem;
            color: #363636;
            transition: .3s;
            transform-style: preserve-3d;
            -webkit-appearance: none;
            background-color: #fff;
            font-size: 2rem;
            outline: none !important;
            width: 100%;
            padding: 1.5rem;

        }

        .blockquote .blockquote-footer:before {
            left: unset;
            right: 22rem;
        }

        .blockquote .blockquote-footer {
            left: 0;
        }

        div#nz-phone-phoneIcon {
            bottom: 60px;
            right: 10px;
        }

        .nz-phone-phone {
            background-color: transparent;
            cursor: pointer;
            right: 0%;
            height: 100px;
            position: fixed;
            transition: visibility 0.5s ease 0s;
            visibility: hidden;
            width: 90px;
            z-index: 500 !important;
        }

        .nz-phone-phone.nz-phone-show {
            visibility: visible;
        }

        .nz-phone-phone.nz-phone-hover, .nz-phone-phone:hover {
            opacity: 1;
        }

        .nz-phone-ph-circle {
            animation: 1.2s ease-in-out 0s normal none infinite running nz-phone-circle-anim;
            background-color: transparent;
            border: 2px solid rgba(30, 30, 30, 0.4);
            border-radius: 100%;
            height: 70px;
            left: 10px;
            opacity: 0.1;
            position: absolute;
            top: 12px;
            transform-origin: 50% 50% 0;
            transition: all 0.5s ease 0s;
            width: 70px;
        }

        .nz-phone-phone.nz-phone-active .nz-phone-ph-circle {
            animation: 1.1s ease-in-out 0s normal none infinite running nz-phone-circle-anim !important;
        }

        .nz-phone-phone.nz-phone-static .nz-phone-ph-circle {
            animation: 2.2s ease-in-out 0s normal none infinite running nz-phone-circle-anim !important;
        }

        .nz-phone-phone.nz-phone-hover .nz-phone-ph-circle, .nz-phone-phone:hover .nz-phone-ph-circle {
            border-color: #f00;
            opacity: 0.5;
        }

        .nz-phone-phone.nz-phone-green.nz-phone-hover .nz-phone-ph-circle, .nz-phone-phone.nz-phone-green:hover .nz-phone-ph-circle {
            border-color: #baf5a7;
            opacity: 0.5;
        }

        .nz-phone-phone.nz-phone-green .nz-phone-ph-circle {
            border-color: #17b3a1;
            opacity: 0.5;
        }

        .nz-phone-ph-circle-fill {
            animation: 2.3s ease-in-out 0s normal none infinite running nz-phone-circle-fill-anim;
            background-color: #000;
            border: 2px solid transparent;
            border-radius: 100%;
            height: 30px;
            left: 30px;
            opacity: 0.1;
            position: absolute;
            top: 33px;
            transform-origin: 50% 50% 0;
            transition: all 0.5s ease 0s;
            width: 30px;
        }

        .nz-phone-phone.nz-phone-hover .nz-phone-ph-circle-fill, .nz-phone-phone:hover .nz-phone-ph-circle-fill {
            background-color: rgba(0, 175, 242, 0.5);
            opacity: 0.75 !important;
        }

        .nz-phone-phone.nz-phone-green.nz-phone-hover .nz-phone-ph-circle-fill, .nz-phone-phone.nz-phone-green:hover .nz-phone-ph-circle-fill {
            background-color: rgba(117, 235, 80, 0.5);
            opacity: 0.75 !important;
        }

        .nz-phone-phone.nz-phone-green .nz-phone-ph-circle-fill {
            background-color: rgba(0, 175, 242, 0.5);
            opacity: 0.75 !important;
        }

        .nz-phone-ph-img-circle {
            animation: 1s ease-in-out 0s normal none infinite running nz-phone-circle-img-anim;
            border: 2px solid transparent;
            border-radius: 100%;
            height: 50px;
            left: 20px;
            opacity: 1;
            position: absolute;
            top: 22px;
            transform-origin: 50% 50% 0;
            width: 50px;
        }

        .nz-phone-phone.nz-phone-hover .nz-phone-ph-img-circle, .nz-phone-phone:hover .nz-phone-ph-img-circle {
            background-color: #f00;
        }

        .nz-phone-phone.nz-phone-green.nz-phone-hover .nz-phone-ph-img-circle, .nz-phone-phone.nz-phone-green:hover .nz-phone-ph-img-circle {
            background-color: #75eb50;
        }

        .nz-phone-phone.nz-phone-green .nz-phone-ph-img-circle {
            background-color: #17b3a1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        @keyframes nz-phone-circle-anim {
            0% {
                opacity: 0.1;
                transform: rotate(0deg) scale(0.5) skew(1deg);
            }
            30% {
                opacity: 0.5;
                transform: rotate(0deg) scale(0.7) skew(1deg);
            }
            100% {
                opacity: 0.6;
                transform: rotate(0deg) scale(1) skew(1deg);
            }
        }

        @keyframes nz-phone-circle-img-anim {
            0% {
                transform: rotate(0deg) scale(1) skew(1deg);
            }
            10% {
                transform: rotate(-25deg) scale(1) skew(1deg);
            }
            20% {
                transform: rotate(25deg) scale(1) skew(1deg);
            }
            30% {
                transform: rotate(-25deg) scale(1) skew(1deg);
            }
            40% {
                transform: rotate(25deg) scale(1) skew(1deg);
            }
            50% {
                transform: rotate(0deg) scale(1) skew(1deg);
            }
            100% {
                transform: rotate(0deg) scale(1) skew(1deg);
            }
        }

        @keyframes nz-phone-circle-fill-anim {
            0% {
                opacity: 0.2;
                transform: rotate(0deg) scale(0.7) skew(1deg);
            }
            50% {
                opacity: 0.2;
                transform: rotate(0deg) scale(1) skew(1deg);
            }
            100% {
                opacity: 0.2;
                transform: rotate(0deg) scale(0.7) skew(1deg);
            }
        }

        .nz-phone-ph-img-circle a img {
            padding: 1px 0 0 1px;
            width: 25px;
            position: relative;
            top: 0px;
        }

        .nz-phone-ph-img-circle a {
            text-decoration: none !important;
        }

        .person .person__description {
            margin-left: 0;
        }

        .block .block__wrapper {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .form-group label {
            margin-bottom: 0.1rem;
        }

        .form-group {
            margin-bottom: 0.5rem;
        }

        .box.box--pricing.promoted .box__wrapper {
            background-color: #012169;
            color: white;
        }

        .btn.btn-blue {
            background-color: #012169;
            border-color: #012169;
        }

        .btn.btn-blue:hover {
            color: wheat;
        }

        .box.box--pricing ul {
            opacity: .9;
        }

        .feature_content {
            text-align: center;
            font-size: 2rem;
            line-height: 4rem;
            font-weight: 600;
            color: black;
            opacity: 1 !important;
            padding: 0 1rem 3rem 1rem;
        }
        .box.box--pricing .box__header{
            padding-top: 2rem;
        }
        .box.box--pricing .box__footer {
            padding-bottom: 2rem;
            padding-top: 0;
        }

        /*.slider-nav {*/
        /*    display: none;*/
        /*}*/

        .owl-carousel, .owl-carousel .owl-item {
            text-align: center;
        }
        .owl-nav{margin-top: 1%}
        .promoted .box__content {
            background-color: #052b81;
        }

        .promoted .box__header {
            background-color: #012169;
        }

        .promoted .box__wrapper {
            background-color: #052b81 !important;
        }

        .box.box--pricing .box__content {
            margin-bottom: 0;
        }

        .box .box--pricing .box__header {
            padding-top: 3rem
        }
        #hero .hero__caption {
            padding: 1rem 3rem;
        }
        #Recommended_slogan::after{
            content: '';
            display: block;
            position: absolute;
            top: 10%;
            left: 0;
            right: 0;
            width: 160px;
            margin: 0 auto;
            height: 3px;
            background: #cf142b;
        }
        @media screen and (max-width: 450px){
            #prime_slogan::after {
                top: 17rem;
            }
            #Recommended_slogan::after {
                top: 3%;
            }
            .feature_content{
                font-size: 1.5rem;
            }
            .box.box--pricing .box__header {
                padding-top: 18rem;
            }
            .background--image, .img-into-bg {
                height: 150%;
            }
        }

        @media screen and (max-width: 360px){
            #Recommended_slogan::after {
                top: 4%;
            }
            .feature_content{
                font-size: 1.3rem;
            }
            .box.box--pricing .box__header {
                padding-top: 10rem;
            }
            .background--image, .img-into-bg {
                height: 123%;
            }
        }
        .btn.btn-framed.btn-primary:hover, .btn.btn-framed.btn-primary:focus, .btn.btn-framed.btn-primary:active {
             background-color: #012169;
             border-color: #012169;
            box-shadow: none;
            color: #fff;
        }
        .vision{
            animation-name: example;
            animation-duration: 4s;
            animation-iteration-count: infinite;
            animation-direction: reverse;
        }
        @keyframes example {
            from {color: red;}
            to {color: yellow;}
        }
        .box.box--pricing.promoted {
            transform: scale(1);
        }
        .box.box--pricing.big {
            transform: scale(1.03);
        }
        .strikediag {
            background: linear-gradient(to left top, transparent 47.75%, currentColor 49.5%, currentColor 50.5%, transparent 52.25%);
        }
        .withpadding {
            padding: 0 0.15em;
        }
    </style>
    <title>Prime Property Turkey</title>
</head>
<body data-spy="scroll" data-target=".navbar">
<div class="page-wrapper" id="page-top">
    <header id="hero">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top justify-content-center">
            <a class="navbar-brand" href="#page-top">
                <img src="<?= base_url(); ?>assets/web-site/images/base/masters/logonew.webp" alt="">
            </a>
        </nav>
        <!--        back-->
        <div class="hero__background">
            <div class="background-wrapper" data-parallax="scroll" data-parallax-speed="3">
                <div class="background">
                    <img src="<?= base_url(); ?>assets/landing-page/img/shutterstock1.webp" class="d-none d-md-block" alt="">
                    <img src="<?= base_url(); ?>assets/landing-page/img/shutterstock2.webp" class="d-md-none" alt="">
                </div>
            </div>
            <!--end background-->
        </div>

        <div class="container">
            <div class="row">
                <div class="hero__outer-wrapper">
                    <div class="hero__inner-wrapper align-bottom">
                        <div class="col-xl-5 col-lg-5 col-md-7">
                            <div class="hero__caption has-dark-background">
                                <h1>Get Free Consultation</h1>
                                <form class="form" method="post"
                                      action="<?= base_url(); ?>Landing_Page/submitContactUSForm" id="top_contact"
                                      name="top_contact" onsubmit="return topContactUSValidation();">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input id="contactus_info" type="text" class="form-control"
                                                   name="contactus_info"
                                                   placeholder="Full Name" form="top_contact" required>
                                        </div>
                                        <span id="contactus_info_error" style="display:none; font-size: 1.4rem;" class="vision">
                                               Please enter your first and last name separated by a space (e.g. Jane Miller)
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input id="contactus_email" type="email" class="form-control"
                                                   name="contactus_email"
                                                   placeholder="Your Email" form="top_contact" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input id="contactus_phone" type="text" class="form-control"
                                                   name="contactus_phone"
                                                   placeholder="PhoneNumber +AreaCode 0000000 " form="top_contact"
                                                   required>
                                        </div>
                                        <span id="contactus_phone_error" style="display:none; font-size: 1.4rem;" class="vision">
                                                Please provide country code with "+" and full phone number
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" id="contactus_budget"
                                                style="height: calc(5.25rem + 2px);font-size: 1.4rem !important;"
                                                form="top_contact" name="contactus_budget">
                                            <option value="0">Budget</option>
                                            <option value="Up To $ 150K">Up To $ 150K</option>
                                            <option value="Up To $ 150K">Up To $ 200K</option>
                                            <option value="Up To $ 150K">Up To $ 300K</option>
                                            <option value="Up To $ 150K">Up To $ 400K</option>
                                            <option value="Up To $ 150K">Up To $ 500K</option>
                                            <option value="Up To $ 150K">Up To $ 1M</option>
                                            <option value="Up To $ 150K">Up To $ 1.5M</option>
                                            <option value="Up To $ 150K">Up To $ 2M</option>
                                        </select>
                                    </div>
                                    <span id="contactus_budget_error" style="display:none; font-size: 1.4rem;" class="vision">
                                               Please fill the maximum budget
                                        </span>
                                    <!--end form-group -->
                                    <hr>
                                    <div class="form-group text-right">
                                        <input type="submit" value="Submit" class="btn btn-primary btn-framed"
                                               form="top_contact">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="slider-nav"></div>
                    </div>
                    <!--end container-->
                </div>
                <!--end hero__inner-wrapper-->
                <!--                052b81-->
            </div>
        </div>
        <!--end hero__outer-wrapper-->
    </header>
    <!--    inner-->
    <div id="content">
        <section class="block" id="prime">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h1 class="text-center">
                        <span style="color: #cf142b; ">
                            PRIME
                        </span>
                            <span STYLE="color: #012169; ">
                             Property Turkey
                        </span>
                        </h1>
                        <h5 class="text-center" style="font-style: italic !important; margin-bottom: 5rem" id="prime_slogan">
                            " Do It The Right Way "
                        </h5>
                        <p class="text-justify" style="opacity: 1 !important; margin-bottom: 1.5rem !important;">
                            We strive for the utmost transparency and communication throughout the
                            purchase and after sales process, ensuring our clients have been taken care of to the level
                            they deserve.
                            Our expertise and knowledge in the Turkish market will ensure each purchase, whether for
                            holiday, full-time, or investment will be protected and valued. We here at Prime Property
                            Turkey, strive to "do it the right way" every time we speak, meet, and buy.

                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="block" id="pricing">
            <div class="container">
                <div class="block__wrapper">
                    <div class="block__title">
                         <h2 class="text-center" style="font-size: 2.5rem;color: #012169;margin-bottom: 5rem;" id="Recommended_slogan">Recommended Properties</h2>
                    </div>
                    <!--end block-title-->
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <div class="box box--pricing promoted"
                                 data-scroll-reveal="enter bottom and move 10px after 0.1s">
                                <div class="box__wrapper">
                                    <div class="box__image height-300px">
                                        <div class="img-into-bg">
                                            <img src="<?= base_url(); ?>assets/landing-page/img/LASm1.webp" alt="">
                                        </div>
                                    </div>
                                    <div class="box__header">
                                        <h4>Motivada Bomonti</h4>
                                        <h3 class="price">$217.000</h3>
                                    </div>
                                    <div class="box__content">
                                        <ul class="list-unstyled">
                                            <li>Sisli, Istanbul</li>
                                            <li>Area: 48 m<sup>2</sup></li>
                                            <li>Bedroom: 1</li>
                                            <li>Bathroom: 1</li>
                                            <li>Ready to move in</li>
                                            <li>6.5% - High Rental Yeild</li>
                                        </ul>
                                    </div>
                                    <div class="box__footer">
                                        <a href="#contact" class="btn btn-light">Contact Agent</a>
                                    </div>
                                </div>
                                <!--end box__wrapper-->
                            </div>
                            <!--end box-pricing-->
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <div class="box box--pricing big" data-scroll-reveal="enter bottom and move 10px">
                                <div class="box__wrapper">
                                    <div class="box__image height-300px">
                                        <div class="img-into-bg">
                                            <img src="<?= base_url(); ?>assets/landing-page/img/LASm3.webp" alt="">
                                        </div>
                                    </div>
                                    <div class="box__header">
                                        <h4>DKY Kartal</h4>
                                        <h3 class="price">$154.000</h3>
                                    </div>
                                    <div class="box__content">
                                        <ul class="list-unstyled">
                                            <li>Kartal, Istanbul</li>
                                            <li>Area: 98 m<sup>2</sup></li>
                                            <li>Bedroom: 2</li>
                                            <li>Bathroom: 1</li>
                                            <li>Stunning Island Views</li>
                                            <li>Family Oriented Compound</li>

                                        </ul>
                                    </div>
                                    <div class="box__footer">
                                        <a href="#contact" class="btn btn-blue">Contact Agent</a>
                                    </div>
                                </div>
                                <!--end box__wrapper-->
                            </div>
                            <!--end box-pricing-->
                        </div>
                        <!--end col-md-3-->
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <div class="box box--pricing promoted"
                                 data-scroll-reveal="enter bottom and move 10px after 0.1s">
                                <div class="box__wrapper">
                                    <div class="box__image height-300px">
                                        <div class="img-into-bg">
                                            <img src="<?= base_url(); ?>assets/landing-page/img/LASm2.webp" alt="">
                                        </div>
                                    </div>
                                    <div class="box__header">
                                        <h4>Konak Residence</h4>
                                        <h3 class="price">$120.000</h3>
                                    </div>
                                    <div class="box__content">
                                        <ul class="list-unstyled">
                                            <li>Kagithane, Istanbul</li>
                                            <li>Area: 70 m<sup>2</sup></li>
                                            <li>Bedroom: 2</li>
                                            <li>Bathroom: 1</li>
                                            <li>Pre-Launch Prices</li>
                                            <li>700m to Metro Station</li>
                                        </ul>
                                    </div>
                                    <div class="box__footer">
                                        <a href="#contact" class="btn btn-light">Contact Agent</a>
                                    </div>
                                </div>
                                <!--end box__wrapper-->
                            </div>
                            <!--end box-pricing-->
                        </div>
                        <!--end col-md-3-->
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 offset-md-3 offset-lg-0">
                            <div class="box box--pricing big" data-scroll-reveal="enter bottom and move 10px after 0.2s">
                                <div class="box__wrapper">
                                    <div class="box__image height-300px">
                                        <div class="img-into-bg">
                                            <img src="<?= base_url(); ?>assets/landing-page/img/LASm4.webp" alt="">
                                        </div>
                                    </div>
                                    <div class="box__header">
                                        <h4>Quattro</h4>
                                        <h3 class="price">$165.000</h3>
                                    </div>
                                    <div class="box__content">
                                        <ul class="list-unstyled">
                                            <li>Umraniye, Istanbul</li>
                                            <li>Area: 62 m<sup>2</sup></li>
                                            <li>Bedroom: 1</li>
                                            <li>Bathroom: 1</li>
                                            <li>High Capital Growth</li>
                                            <li>5 min to Finance Center</li>
                                        </ul>
                                    </div>
                                    <div class="box__footer">
                                        <a href="#contact" class="btn btn-primary btn-blue">Contact Agent</a>
                                    </div>
                                </div>
                                <!--end box__wrapper-->
                            </div>
                            <!--end box-pricing-->
                        </div>
                        <!--end col-md-4-->
                    </div>
                    <!--end row-->
                </div>
                <!--end block__wrapper-->
            </div>
            <!--end container-->
        </section>
        <section class="block" id="features">
            <div class="container">
                <div class="block__wrapper">
                    <div class="block__title text-center">
                        <h2>What You'll Get</h2>
                    </div>
                    <!--end block-title-->
                    <div class="row justify-content-center">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                            <div class="card bg-light">
                                <img src="<?= base_url(); ?>assets/landing-page/img/MAPblue.webp" alt=""
                                     class="img-fluid" style="width: 80%; margin: 0 auto;">
                                <div class="feature_content text-dark">
                                    Original Project <br>
                                    Location & Name
                                </div>
                            </div>

                            <!--end box__wrapper-->
                            <!--end box-image-->
                        </div>
                        <!--end col-xl-3-->
                        <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                            <div class="card bg-light">

                                <img src="<?= base_url(); ?>assets/landing-page/img/cashBLUE.webp" alt=""
                                     class="img-fluid" style="width: 80%; margin: 0 auto;">
                                <div class="feature_content text-dark">
                                    Bargained Price <br>
                                    than Market
                                </div>
                            </div>

                            <!--end box__wrapper-->
                            <!--end box-image-->
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                            <div class="card bg-light">

                                <img src="<?= base_url(); ?>assets/landing-page/img/onlinebuyingBLUE.webp" alt=""
                                     class="img-fluid" style="width: 80%; margin: 0 auto;">
                                <div class="feature_content text-dark">
                                    Online Buying <br>
                                    Options
                                </div>
                            </div>
                            <!--end box-image-->
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                            <div class="card bg-light">

                                <img src="<?= base_url(); ?>assets/landing-page/img/destination.webp" alt=""
                                     class="img-fluid" style="width: 80%; margin: 0 auto;">
                                <div class="feature_content text-dark">
                                    Virtual <br>
                                    Touring
                                </div>
                            </div>
                            <!--end box-image-->
                        </div>


                        <!--end col-xl-4-->

                    </div>
                    <!--end row-->
                </div>
                <!--end block__wrapper-->
            </div>
            <!--end container-->
            <div class="background-wrapper" data-background-color="#f9f9f9">
                <div class="background--image opacity-10 background--repeat-repeat">
                    <img src="<?= base_url(); ?>assets/landing-page/img/pattern-topo.webp" alt="">
                </div>
            </div>
            <!--end background-->
        </section>
        <section class="block" id="text-image-block">
            <div class="container">
                <div class="block__wrapper">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="text-align-right">
                                <h2 data-scroll-reveal="enter left and move 10px"
                                    style="font-size: 4rem;margin-bottom: 2rem">
                                    <span class="font-weight-bold">
                                Turkish Citizenship
                            </span>
                                    <span>
                             by Investment Programme
                        </span></h2>
                                <div class="m-1 text-center" style="font-size: 2rem;color: red"> Update! <span class="strikediag withpadding">$250.000</span> <i class="fas fa-arrow-alt-right"></i>  $400.000 <span style="font-size: 1.2rem"> (Changes to be implemented soon)</span> </div>
                                <div class="m-1 text-center" style="font-size: 1.65rem;color: red"> Buy Now & take Advantage of Present Rule before its too late.</div>
                                <div class="m-1 text-center" id="blow" style="font-size: 1.65rem;color: red" > Contact Us Today </div>
                                <p data-scroll-reveal="enter left and move 10px after 0.1s"
                                   style="font-size: 1.5rem;opacity: 0.9; margin-bottom: 2rem">
                                    Turkish Citizenship is an advantageous option for those looking to invest $250K USD
                                    or more in
                                    Turkey. Rather investing or buying your dream home along Turkey's Turquoise Coast,
                                    the
                                    Citizenship by Investment program allows you the flexibility to build your life as a
                                    Turkish
                                    Citizen. Additionally, you can take advantage of the countries medical and education
                                    services
                                    all for free as a Turkish Citizen. Contact us today to find out how you can be apart
                                    of Turkey's
                                    future.
                                </p>
                                <a href="#contact" class="btn btn-primary btn-framed">CONTACT US</a>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <img class="width-100 rounded-corners"
                                 src="<?= base_url(); ?>assets/web-site/images/base/masters/PASSAPORT.webp" alt="">
                        </div>
                    </div>
                    <!--end row-->
                    <div class="background-wrapper">
                        <div class="background background--image opacity-70 background--repeat-repeat height-50">
                            <img src="<?= base_url(); ?>assets/landing-page/img/pattern-dot.webp" alt="">
                        </div>
                    </div>
                    <!--end background-->
                </div>
                <!--end block__wrapper-->
            </div>
            <!--end container-->
        </section>
        <section class="block" id="blockquote">
            <div class="container">
                <div class="block__wrapper">
                    <blockquote class="blockquote text-justify" style="font-size: 0.8rem">

                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <i class="fa fa-quote-left"></i>
                                    <p>
                                        I used Prime Property Turkey to look for residential investment options in
                                        Istanbul and found them very informed, helpful, trustworthy and objective in
                                        their advice on
                                        various options across the city. I have dealt with them for over 6 months on a
                                        sustained
                                        basis and .....
                                    </p>
                                    <i class="fa fa-quote-right d-block text-right"></i>
                                    <br>
                                    <footer class="blockquote-footer d-block text-right">Todd Romaine (Canada)</footer>
                                </div>
                                <div class="carousel-item">
                                    <i class="fa fa-quote-left"></i>
                                    <p>
                                        Prime Property has provided us a seamlessly smooth property investment
                                        experience. From the time we were exploring options to the actual sale, Omran
                                        took care of everything. We were properly guided about all the paperwork that
                                        was needed to ensure efficient processing of our .....
                                    </p>
                                    <i class="fa fa-quote-right d-block text-right"></i>
                                    <br>
                                    <footer class="blockquote-footer d-block text-right">Sofia Shakil (Pakistan)
                                    </footer>
                                </div>
                                <div class="carousel-item">
                                    <i class="fa fa-quote-left"></i>
                                    <p>
                                        I was lucky to come across the Prime Property agency, they made my search for an
                                        apartment much easier. I would recommend everyone to work with this agency. They
                                        are great professionals, they have shown me every kind of help and they are
                                        friendly in every way .....
                                    </p>
                                    <i class="fa fa-quote-right d-block text-right"></i>
                                    <br>
                                    <footer class="blockquote-footer d-block text-right">Alma Hajdarpasic (Bosnia)
                                    </footer>
                                </div>
                            </div>
                        </div>

                    </blockquote>
                    <!--end blockquote-->
                </div>
                <!--end block__wrapper-->
            </div>
            <!--end container-->
            <div class="background-wrapper" data-parallax="scroll" data-parallax-speed="3"
                 data-background-color="#f1f1f1">
                <div class="background--image opacity-10 parallax-element">
                    <img src="<?= base_url(); ?>assets/landing-page/img/slide-02.webp" alt="">
                </div>
            </div>
            <!--end background-->
        </section>
        <section class="block" id="gallery">
            <div class="container">
                <div class="block__wrapper">
                    <div class="block__title">
                        <h2>Gallery</h2>
                    </div>
                    <!--end block-title-->
                </div>
                <!--end block__wrapper-->
            </div>
            <!--end container-->
            <div class="owl-carousel carousel-gallery" data-owl-items="5" data-owl-dots="1" data-owl-nav="0">
                <a href="<?= base_url(); ?>assets/landing-page/img/g4.webp"
                   class="carousel-gallery__image popup-image">
                    <div class="img-into-bg">
                        <img src="<?= base_url(); ?>assets/landing-page/img/g4.webp" alt="">
                    </div>
                </a>
                <a href="<?= base_url(); ?>assets/landing-page/img/g3.webp"
                   class="carousel-gallery__image popup-image">
                    <div class="img-into-bg">
                        <img src="<?= base_url(); ?>assets/landing-page/img/g3.webp" alt="">
                    </div>
                </a>
                <a href="<?= base_url(); ?>assets/landing-page/img/g2.webp"
                   class="carousel-gallery__image popup-image">
                    <div class="img-into-bg">
                        <img src="<?= base_url(); ?>assets/landing-page/img/g2.webp" alt="">
                    </div>
                </a>
                <a href="<?= base_url(); ?>assets/landing-page/img/g5.webp"
                   class="carousel-gallery__image popup-image">
                    <div class="img-into-bg">
                        <img src="<?= base_url(); ?>assets/landing-page/img/g5.webp" alt="">
                    </div>
                </a>
                <a href="<?= base_url(); ?>assets/landing-page/img/g6.webp"
                   class="carousel-gallery__image popup-image">
                    <div class="img-into-bg">
                        <img src="<?= base_url(); ?>assets/landing-page/img/g6.webp" alt="">
                    </div>
                </a>
                <a href="<?= base_url(); ?>assets/landing-page/img/g7.webp"
                   class="carousel-gallery__image popup-image">
                    <div class="img-into-bg">
                        <img src="<?= base_url(); ?>assets/landing-page/img/g7.webp" alt="">
                    </div>
                </a>
                <a href="<?= base_url(); ?>assets/landing-page/img/g8.webp"
                   class="carousel-gallery__image popup-image">
                    <div class="img-into-bg">
                        <img src="<?= base_url(); ?>assets/landing-page/img/g8.webp" alt="">
                    </div>
                </a>
                <a href="<?= base_url(); ?>assets/landing-page/img/g9.webp"
                   class="carousel-gallery__image popup-image">
                    <div class="img-into-bg">
                        <img src="<?= base_url(); ?>assets/landing-page/img/g9.webp" alt="">
                    </div>
                </a>
                <a href="<?= base_url(); ?>assets/landing-page/img/g10.webp"
                   class="carousel-gallery__image popup-image">
                    <div class="img-into-bg">
                        <img src="<?= base_url(); ?>assets/landing-page/img/g10.webp" alt="">
                    </div>
                </a>
                <a href="<?= base_url(); ?>assets/landing-page/img/g1.webp"
                   class="carousel-gallery__image popup-image">
                    <div class="img-into-bg">
                        <img src="<?= base_url(); ?>assets/landing-page/img/g1.webp" alt="">
                    </div>
                </a>
            </div>
            <div class="background-wrapper">
                <div class="background background--image background--repeat-repeat opacity-50">
                    <img src="<?= base_url(); ?>assets/landing-page/img/pattern-dot.webp" alt="">
                </div>
            </div>
            <!--end background-->
        </section>
        <section class="block" id="contact">
            <div class="container">
                <div class="block__wrapper">
                    <!--end block-title-->
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12">
                            <div class="person">
                                <div class="person__description">
                                    <figure>
                                        <label>Phone:</label>
                                        <div>(+90) 552 754 44 93</div>
                                    </figure>
                                    <figure>
                                        <label>E-mail:</label>
                                        <div>
                                            <a href="mailto:info@primepropertyturkey.com">info@primepropertyturkey.com</a>
                                        </div>
                                    </figure>
                                    <figure>
                                        <label>Address:</label>
                                        <div>DAP Vadi, S-Blok, Ofis No:108-109, Merkez Mah, KAĞITHANE / İSTANBUL</div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12">
                            <!--                            <h4>Contact Form</h4>-->
                            <form method="post" class="form" id="B_contact" name="B_contact"
                                  action="<?= base_url(); ?>Landing_Page/B_submitContactUSForm"
                                  onsubmit="return BottomContactUSValidation();">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="contact_name">Your Name</label>
                                            <input type="text" class="form-control" id="contact_name" form="B_contact"
                                                   name="contact_name"
                                                   placeholder="Full Name" required>
                                        </div>
                                        <div id="contact_name_error" style="display: none;font-size: 1.4rem;color: red;">
                                            Please enter your first and last name separated by a space (e.g. Jane Miller)
                                        </div>

                                        <!--end form-group -->
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="contact_mail">Your Email</label>
                                            <input type="email" class="form-control" id="contact_mail" form="B_contact"
                                                   name="contact_mail" placeholder="example@mail.com" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="contact_phone">Your PhoneNumber</label>
                                            <input type="text" class="form-control" id="contact_phone" form="B_contact"
                                                   name="contact_phone" placeholder="+AreaCode 0000" required>
                                        </div>
                                        <div id="contact_phone_error" style="display: none;font-size: 1.4rem;color: red;">
                                            Please provide country code with "+" and full phone number
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="contact_budget">Your Budget</label>
                                            <select class="form-control" id="contact_budget" form="B_contact"
                                                    style="height: calc(5.25rem + 2px);font-size: 1.4rem !important;"
                                                    form="top_contact" name="contact_budget">
                                                <option value="0">Budget</option>
                                                <option value="Up To $ 150K">Up To $ 150K</option>
                                                <option value="Up To $ 150K">Up To $ 200K</option>
                                                <option value="Up To $ 150K">Up To $ 300K</option>
                                                <option value="Up To $ 150K">Up To $ 400K</option>
                                                <option value="Up To $ 150K">Up To $ 500K</option>
                                                <option value="Up To $ 150K">Up To $ 1M</option>
                                                <option value="Up To $ 150K">Up To $ 1.5M</option>
                                                <option value="Up To $ 150K">Up To $ 2M</option>
                                            </select>
                                        </div>
                                        <span id="contact_budget_error" style="display:none; font-size: 1.4rem;color: red">
                                            Please fill the maximum budget
                                        </span>
                                    </div>

                                </div>
                                <!--end row -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="form-contact-message">Your Message</label>
                                            <textarea class="form-control" id="form-contact-message" rows="4" form="B_contact"
                                                      name="contact_message" placeholder="Your Message"
                                                      ></textarea>
                                        </div>
                                        <!--end form-group -->
                                    </div>
                                    <!--end col-md-12 -->
                                </div>
                                <!--end row -->
                                <div class="form-group clearfix">
                                    <input type="submit" class="btn pull-right btn-primary btn-framed" form="B_contact"
                                           value="Send a Message">
                                </div>
                                <!--end form-group -->
                                <div class="form-contact-status"></div>
                            </form>
                            <!--end form-contact -->
                        </div>
                        <!--end col-xl-7-->
                    </div>
                    <!--end row-->
                </div>
                <!--end block__wrapper-->
            </div>
            <!--end container-->
            <div class="background-wrapper">
                <div class="background background--image background--repeat-repeat opacity-50">
                    <img src="<?= base_url(); ?>assets/landing-page/img/pattern-dot.webp" alt="">
                </div>
            </div>
            <!--end background-->
        </section>
    </div>
    <footer id="footer">
        <div class="container">
            <span>© Prime Property Turkey, 2022</span>
        </div>
    </footer>
    <div class="nz-phone-phone nz-phone-green nz-phone-show" id="nz-phone-phoneIcon">
        <div class="nz-phone-ph-circle"></div>
        <div class="nz-phone-ph-circle-fill"></div>
        <div class="nz-phone-ph-img-circle">
            <a href="https://wa.me/905527544493/?text=PrimePropertyTurkey" target="_blank" rel="nofollow">
            <span class="round">
                <i class="fa fa-whatsapp faa-ring faa-slow animated text-white"
                   style="font-size: 2.3rem !important;"></i>
            </span>
            </a>
        </div>
    </div>
</div>

<button type="button" class="btn btn-floating btn-lg" id="btn-back-to-top"
        onclick='window.scrollTo({top: 0, behavior: "smooth"});'>
    <i class="fa fa-arrow-up"></i>
</button>

<script type="text/javascript" src="<?= base_url(); ?>assets/landing-page/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/landing-page/js/popper.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/landing-page/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/landing-page/js/isInViewport.jquery.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/landing-page/js/jquery.particleground.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/landing-page/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/landing-page/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/landing-page/js/scrollReveal.min.js"></script>
<script src="<?= base_url(); ?>assets/landing-page/js/custom.js"></script>
<script type="text/javascript">
    let mybutton = document.getElementById("btn-back-to-top");

    function scrollFunction() {
        document.body.scrollTop > 20 || document.documentElement.scrollTop > 20 ? mybutton.style.display = "block" : mybutton.style.display = "none"
    }

    window.onscroll = function () {
        scrollFunction()
    };

    function topContactUSValidation() {
        let flag = true;
        let contactus_info_error = document.getElementById('contactus_info_error');
        let contactus_phone_error = document.getElementById('contactus_phone_error');
        let contactus_budget_error = document.getElementById('contactus_budget_error');
        contactus_info_error.style.display = 'none';
        contactus_phone_error.style.display = 'none';
        contactus_budget_error.style.display = 'none';
        let contactus_info = document.getElementById('contactus_info').value;
        let contactus_phone = document.getElementById('contactus_phone').value;
        let contactus_budget = document.getElementById('contactus_budget').value;
        var contactus_info_regex = new RegExp(/^\w+\s+\w+/i);
        var contactus_phone_regex = new RegExp(/^['+']\d{7,20}/i);

        if (contactus_info_regex.test(contactus_info) != true) {
            flag = false;
            contactus_info_error.style.display = 'block';
        }
        if (contactus_phone_regex.test(contactus_phone) != true) {
            flag = false;
            contactus_phone_error.style.display = 'block';
        }
        if (contactus_budget == 0) {
            flag = false;
            contactus_budget_error.style.display = 'block';
        }
        return flag;
    }


    function BottomContactUSValidation() {
        let B_flag = true;
        let B_contactus_info_error = document.getElementById('contact_name_error');
        let B_contactus_phone_error = document.getElementById('contact_phone_error');
        let B_contact_budget_error = document.getElementById('contact_budget_error');
        B_contactus_info_error.style.display = 'none';
        B_contactus_phone_error.style.display = 'none';
        B_contact_budget_error.style.display = 'none';
        let B_contactus_info = document.getElementById('contact_name').value;
        let B_contactus_phone = document.getElementById('contact_phone').value;
        let B_contactus_budget = document.getElementById('contact_budget').value;
        var B_contactus_info_regex = new RegExp(/^\w+\s+\w+/i);
        var B_contactus_phone_regex = new RegExp(/^['+']\d{7,20}/i);

        if (B_contactus_info_regex.test(B_contactus_info) != true) {
            B_flag = false;
            B_contactus_info_error.style.display = 'block';
        }
        if (B_contactus_phone_regex.test(B_contactus_phone) != true) {
            B_flag = false;
            B_contactus_phone_error.style.display = 'block';
        }
        if (B_contactus_budget == 0) {
            B_flag = false;
            B_contact_budget_error.style.display = 'block';
        }
        return B_flag;
    }

    $('.carousel').carousel({
        interval: 2000
    })

</script>

</body>
</html>
