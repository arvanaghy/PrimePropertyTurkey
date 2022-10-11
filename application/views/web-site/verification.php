<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/login.css">
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>assets/web-site/css/phone-input.css">
<title><?= $title; ?></title>
</head>
<body>
<?php $this->load->view('web-site/includes/top-section'); ?>
<main>
    <section id="login">
        <div class="container-fluid my-md-5 my-3">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-9">
                    <div class="card">
                        <a href="<?= base_url();?>assets/web-site/pdfs/basliksiz.pdf" download="PrimePropertyTurkey_buyersGuide">
                            <img src="<?= base_url();?>assets/web-site/images/base/ezgifc.webp" alt="buyers guide Prime" class="card-img-top">
                        </a>

                        <div class="card-body justify-content-center text-center" id="titleee">
                            <a id="down_button" href="<?= base_url();?>assets/web-site/pdfs/finalimsi4.pdf" download="PrimePropertyTurkey_buyersGuide" class="btn btn block px-3 btn-danger">Download Buyers Guide PDF</a>
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
    $(document).ready(function() {
        document.getElementById('down_button').click()
    );
</script>

</body>

</html>