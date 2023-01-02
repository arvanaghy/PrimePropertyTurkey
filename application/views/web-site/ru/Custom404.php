<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/404.css">
<title>404 СТРАНИЦА НЕ НАЙДЕНА | Prime Property Turkey</title>
<meta name="description" content="404 СТРАНИЦА НЕ НАЙДЕНА, Возможно, страница, которую вы ищете, была удалена или временно недоступна.
">
<link rel="canonical" href="https://www.primepropertyturkey.com/ru/Custom404"/>
</head>
<body class="d-flex justify-content-center align-items-center">
<section class="d-flex justify-content-center align-items-center">
    <div class="container align-items-center justify-content-center">
        <div class="row justify-content-center align-items-center">
            <div class="col justify-content-center text-center align-items-center">
                <div class="row justify-content-center text-center align-items-center">
                    <div class="col-md-10 justify-content-center text-center align-items-center">
                        <div class="magnifier justify-content-center text-center align-items-center">
                            <img src="<?= base_url(); ?>assets/web-site/images/base/404 mag.png" alt="404 page not found" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">

                    <div class="col-md-10 justify-content-center align-items-center">
                        <div class="box-footer">
                            <h3>
                                <b>
                                    СТРАНИЦА НЕ НАЙДЕНА
                                </b>
                            </h3>
                            <p class="text-justify-all">
                                <b>
                                    Возможно, страница, которую вы ищете, была удалена или временно недоступна.
                                </b>
                            </p>
                            <a href="<?php echo base_url(); ?>ru" class="m-1">
                                <i class="fas fa-home fa-2x"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('web-site/includes/foot-load'); ?>
</body>
</html>
