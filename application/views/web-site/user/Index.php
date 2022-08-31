<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/header-image-wrapper.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/about-us.css">
<title>User dashboard</title>
<style type="text/css">
    body {
        background: #FAFAFA;
    }

    .side-bar .card {
        box-shadow: 0px 2px 1px -1px rgb(0 0 0 / 20%), 0px 1px 1px 0px rgb(0 0 0 / 14%), 0px 1px 3px 0px rgb(0 0 0 / 12%);
    }

    #menu_section ul {
        list-style: none;
        text-align: left;
        margin-left: 0;
        padding-left: 1%;
    }

    #menu_section ul li {
        cursor: pointer;
        padding-top: 10px;
        padding-bottom: 10px;
        border-radius: 5px;
    }

    #menu_section ul li:hover {
        background: #eaeaea;
        transition: 0.8s;
    }

    #menu_section ul li:last-child:hover {
        background: unset;
        transition: unset;
    }

    #menu_section ul li a {
        text-decoration: none;
        color: #757575;;
    }

    #menu_section ul li a i {
        padding-right: 15px;
        padding-left: 15px;
    }

    #menu_section ul li:last-child a i {
        padding-right: 15px;
        padding-left: 0;
    }
</style>
</head>
<body>
<?php $this->load->view('web-site/includes/top-section'); ?>
<main>
    <div class="container my-5">
        <div class="row justify-content-center">
            <?php $this->load->view('web-site/user/user-menu'); ?>

            <div class="col-md-8 text-center">
                <div class="card">
                    <div class="card-body text-left">
                        <div class="row my-3 justify-content-center align-items-center ">
                            <div class="col-12 text-justify my-4 mx-2">
                                Prime Property Turkey is here to give you an opportunity to advertise and sell your
                                property. We are an acclaimed property consultancy that has sold hundreds of new and
                                resale properties around Turkey. Upload your apartments, duplexes, villas, mansions, and
                                various other property types you want to sell on our user-friendly portal. All you have
                                to do is insert the location of your property, its price, discount details, facilities,
                                quality pictures, and all property specifications. Make use of our platform to sell your
                                property and let our sales agents help you sell at a price that will make both the
                                seller and buyer happy.
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="<?= base_url(); ?>User/Add_Property">
                                    <img src="<?= base_url(); ?>assets/web-site/images/base/icon1.svg" class="img-fluid"
                                         style="width: 60%" alt="">
                                </a>
                            </div>
                            <div class="col-md-8">
                                As users, you have the availability to add your property and after it is validated by
                                Prime Property Turkey agents, it will be posted on your website for free.
                            </div>
                        </div>
                        <div class="row my-3 justify-content-center align-items-center">
                            <div class="col-md-4 text-center">
                                <a href="<?= base_url(); ?>User/Published_Properties">
                                    <img src="<?= base_url(); ?>assets/web-site/images/base/icon2.svg" class="img-fluid"
                                         style="width: 60%" alt="">
                                </a>
                            </div>
                            <div class="col-md-8">
                                This platform will give you the ability to add your property, edit, sell and delete your
                                advertisement whenever you want
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $this->load->view('web-site/includes/footer'); ?>
<?php $this->load->view('web-site/includes/foot-load'); ?>
</body>
</html>
