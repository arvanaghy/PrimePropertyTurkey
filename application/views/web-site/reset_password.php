<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $this->load->view('web-site/includes/head-load'); ?>
<link rel="stylesheet" href="<?= base_url();?>assets/web-site/css/login.css">
<title><?= $title; ?></title>
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
                                Reset Password
                            </div>
                            <p class="text-center mx-1 my-1">
                                Please fill your new password
                            </p>
                            <hr width="75%">
                            <form action="<?= base_url(); ?>Post/reset_password_submit" class="mx-1 px-1" method="post">
                                <div class="form-group">
                                    <label for="password">new password :</label>
                                    <input type="password" class="form-control" required name="password">
                                </div>
                                <div class="form-group">
                                    <label for="renter">renter password :</label>
                                    <input type="password" class="form-control" required name="renter">
                                    <input type="hidden" name="hashCode" value="<?= $hashCode;?>">
                                </div>
                                <div class="form-group justify-content-center text-center">
                                    <?= $captcha_image; ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="captcha" id="captcha" class="form-control" placeholder="CAPTCHA Code" required minlength="4" maxlength="4" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn red-button btn-block" value="SUBMIT" >
                                </div>
                            </form>
                            <div class="row justify-content-center">
                                <div class="col-md-12  text-center justify-content-center my-2">
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