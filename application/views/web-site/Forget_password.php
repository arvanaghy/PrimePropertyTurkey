<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url();?>assets/web-site/css/login.css">
<script src="https://www.google.com/recaptcha/api.js"></script>
<title>Forget Password | Prime Property turkey</title>
</head>
<body>
<?php $this->load->view('web-site/includes/top-section'); ?>
<main>
    <section id="login">
        <div class="container-fluid my-md-5 my-3">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title text-center font-weight-bold">
                                Forget password
                            </div>
                            <p class="text-center mx-1 my-1">
                                Please fill your email to send you password reset link
                            </p>
                            <hr width="75%">
                            <form action="<?= base_url(); ?>/Post/forget_password" class="mx-1 px-1" method="post">
                                <div class="form-group">
                                    <label for="">Email :</label>
                                    <input type="text" class="form-control" required name="email">
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <div class="g-recaptcha"
                                         data-sitekey="6Leb_6MgAAAAALtcAlJS98nLXgm8RSA22-JzfnXN"></div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn red-button btn-block" value="SUBMIT" >
                                </div>
                            </form>
                            <div class="row justify-content-center">
                                <div class="col-md-12 text-center justify-content-center my-2">
                                    <a href="user_register" class="text-center text-reset">
                                        <span class="mx-1">
                                            <i class="fas fa-user-plus"></i>
                                        </span>
                                        <span>
                                            Not Registered yet !
                                        </span>
                                        <span class="text-success font-weight-bold">
                                            Sign Up
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php $this->load->view('web-site/includes/footer'); ?>
<?php $this->load->view('web-site/includes/foot-load'); ?>
</body>
</html>