<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<script src="https://www.google.com/recaptcha/api.js"></script>
<link rel="stylesheet" href="<?= base_url();?>assets/web-site/css/login.css">
<title>login | prime property turkey</title>
</head>
<body>
<?php $this->load->view('web-site/includes/top-section'); ?>
<main>
    <section id="login">
        <div class="container-fluid my-md-5 my-3">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title text-center font-weight-bold">
                                LOGIN
                            </div>
                            <form action="<?= base_url(); ?>Post/login" class="mx-1 px-1" method="post">
                                <div class="form-group">
                                    <label for="email">Email :</label>
                                    <input type="email" class="form-control" required name="email" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password :</label>
                                    <input type="password" class="form-control" required name="password" id="password">
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <div class="g-recaptcha"
                                         data-sitekey="6Leb_6MgAAAAALtcAlJS98nLXgm8RSA22-JzfnXN"></div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn red-button btn-block" value="LOGIN" >
                                </div>
                            </form>
                            <div class="row justify-content-center my-2">
                                <div class="col-md-12 text-center justify-content-center my-2">
                                    <?= $login_button; ?>
                                </div>
                            </div>
                            <div class="row justify-content-center sign-alternative">
                                <div class="col-md-6  text-center justify-content-center my-2">
                                    <a href="<?= base_url();?>User/UserRegister" class="text-center text-reset">
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
                                <div class="col-md-6 text-center justify-content-center my-2">
                                    <a href="<?= base_url();?>User/forget_password" class="text-reset" >
                                        <span class="mx-1">
                                            <i class="fas fa-key"></i>
                                        </span>
                                        <span>
                                            Forget your password !
                                        </span>
                                        <span class="text-primary">
                                            Reset it
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