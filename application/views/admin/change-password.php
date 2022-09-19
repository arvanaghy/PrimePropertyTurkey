<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/include/head-load'); ?>
<title>Admin panel</title>
<style>
    #main{
        background: #F5F5F5 !important;
    }
</style>
</head>
<body class="vh-100">
<?php $this->load->view('admin/include/top-menu');?>
<section id="main" class="d-flex pt-5 vh-100"  >
    <div class="container">
        <div class="row">
            <div class="card col-12">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="page-title col-md-12">
                            <b>
                                Change Password
                            </b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-around pt-2">
            <div class="card col-12">
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo base_url("Admin/password_change_submit"); ?>" method="POST">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <input type="password" placeholder="Old Password" required class="form-control" name="OldPassword">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="password" placeholder="New Password" required class="form-control" name="NewPassword">
                            </div>
                            <div class="form-group col-md-3">
                                <input type="password" required placeholder="Confirm Password" class="form-control"  name="ConfirmPassword">
                            </div>
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Change Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php $this->load->view('admin/include/footer'); ?>
<?php $this->load->view('admin/include/foot-load'); ?>
</body>
</html>