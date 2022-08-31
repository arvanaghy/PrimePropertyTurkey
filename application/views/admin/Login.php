<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/include/head-load'); ?>
<title>Admin panel</title>
<style type="text/css">
    body{
        background: #f5f5f5;
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding-bottom: 60px;
        overflow-x: hidden;
        color: #797979;
    }
    .card{
        background-color: #001e3d;
        border-radius: 30px;
    }
    #captcha-image-id{
        width: 100% !important;
        border-radius: 0.25rem;
    }

</style>
</head>
<body>
<div class="container vh-100 align-items-center" style="display: grid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <div class="logo">
                        <img src="<?= base_url();?>assets/web-site/images/base/logo-new.png" alt="logo">
                    </div>
                    <hr>
                    <form action="<?= base_url();?>Admin/Submit_Login" method="post" autocomplete="on">
                        <div class="form-group text-left">
                            <label for="admin-username-login" class="text-light">Username : </label>
                            <input type="text" class="form-control" name="username" id="admin-username-login" required  autocomplete="on">
                        </div>
                        <div class="form-group text-left">
                            <label for="admin-password-login" class="text-light">Password : </label>
                            <input type="password" class="form-control" name="password" id="admin-password-login" required autocomplete="on" >
                        </div>
                        <div class="form-group">
                            <?= $captcha_image; ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="captcha"  required placeholder="captcha">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-block btn-danger" name="submitBtn" id="submitBtn" value="LOG IN">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/include/foot-load'); ?>
</body>
</html>
