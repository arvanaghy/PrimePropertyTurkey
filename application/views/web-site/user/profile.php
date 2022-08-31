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
        color: #012169;
    }

    #menu_section ul li a i {
        padding-right: 15px;
        padding-left: 15px;
        color: #466ad8;
    }

    #menu_section ul li:last-child a i {
        padding-right: 15px;
        padding-left: 0;
    }

    .user-section-title {
        font-size: 2rem;
        font-weight: 500;
        margin: 2%;
    }
    .menu_activated{
        background-color: #eaeaea !important;
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
                    <div class="card-body">
                        <div class="user-section-title">
                            Edit Profile
                        </div>
                        <div class="user-section-description">
                            You can edit your profile info like <span class="text-danger font-weight-bold">Full Name </span> Or <span class="text-danger font-weight-bold">Phone Number </span> with submit this form
                        </div>
                        <hr width="75%">
                        <form action="<?= base_url(); ?>User/SubmitProfileUpdate" method="post" class="text-left">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="">
                                    <small>
                                        <strong>
                                            FullName :
                                        </strong>
                                    </small>
                                    <span class="required text-danger">*</span>
                                </label>
                                <input type="text" name="fullname" placeholder="" class="form-control" value="<?= $results->fullname; ?>" >

                            </div>
                            <div class="form-group col-md-6">
                                <label for="">
                                    <small>
                                        <strong>
                                            PhoneNumber :
                                        </strong>
                                    </small>
                                    <span class="required text-danger">*</span>
                                </label>
                                <input type="text" name="phone" placeholder="" class="form-control" value="<?= $results->phone; ?>" >

                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-8 form-group">
                                    <label for="">
                                        <small>
                                            <strong>
                                                Email :
                                            </strong>
                                        </small>
                                    </label>
                                    <input type="email" name="" placeholder="" class="form-control" value="<?= $results->email; ?>" disabled>

                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="">
                                        <small>
                                            <strong>
                                                Register Date :
                                            </strong>
                                        </small>
                                    </label>
                                    <?
                                    $unix_time= mysql_to_unix($results->registerDate);
                                    $date_string = '%d %M %Y';
                                    $created_date = mdate($date_string, $unix_time);
                                    ?>
                                    <input type="text" name="" placeholder="" class="form-control" value="<?= $created_date; ?>" disabled>

                                </div>
                            </div>
                        <div class="row justify-content-end">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-block btn-primary" value="Update Profile">
                                </div>
                            </div>
                        </div>
                        </form>
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
