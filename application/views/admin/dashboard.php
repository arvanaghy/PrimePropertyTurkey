<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/include/head-load'); ?>
<title>Admin panel</title>
<style>
    #main{
        background: #F5F5F5 !important;
    }
    .icon{
        color: #CF142B !important;
    }
    .title{
        font-size: 1.3rem;
        font-weight: bold;
    }
    .title a{
        text-decoration: none;
    }
</style>
</head>
<body class="vh-100">
	<?php $this->load->view('admin/include/top-menu');?>
    <section id="main" class="d-flex vh-100" >
        <div class="container">
            <div class="row mt-5 justify-content-around">
                <div class="card col-md-3 m-2 p-2 text-center">
                    <div class="card-body">
                        <div class="title">
                            <a href="<?= base_url();?>Admin/Manage_Property">
                                Manage Property
                            </a>
                        </div>
                        <div class="icon py-2">
                            <i class="far fa-building fa-2x"></i>

                        </div>
                    </div>
                </div>
                <div class="card col-md-3 m-2 p-2 text-center">
                    <div class="card-body">
                        <div class="title">
                            <a href="<?= base_url(); ?>Admin/Manage_Blog">
                                Manage Blog
                            </a>
                        </div>
                        <div class="icon py-2">
                            <i class="fas fa-blog fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="card col-md-3 m-2 p-2 text-center">
                    <div class="card-body">
                        <div class="title">
                            <a href="<?= base_url(); ?>Admin/Manage_News">
                                Manage News
                            </a>
                        </div>
                        <div class="icon py-2">
                            <i class="far fa-newspaper fa-2x"></i>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row justify-content-around">
                <div class="card col-md-2 m-1 p-2 text-center">
                    <div class="card-body">
                        <div class="title">
                            <a href="">
                                Manage Website
                            </a>
                        </div>
                        <div class="icon py-2">
                            <i class="fas fa-tasks fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="card col-md-2 m-1 p-2 text-center">
                    <div class="card-body">
                        <div class="title">
                            <a href="<?= base_url(); ?>Admin/Manage_Job">
                                Manage Job Requests
                            </a>
                        </div>
                        <div class="icon py-2">
                            <i class="fab fa-linkedin fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="card col-md-2 m-1 p-2 text-center">
                    <div class="card-body">
                        <div class="title">
                            <a href="<?= base_url(); ?>Admin/Manage_Resales">
                               Manage Resaler's
                            </a>
                        </div>
                        <div class="icon py-2">
                            <i class="fa fa-exchange fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="card col-md-2 m-1 p-2 text-center">
                    <div class="card-body">
                        <div class="title">
                            <a href="<?= base_url(); ?>Admin/Manage_Videos">
                                YouTube Videos
                            </a>
                        </div>
                        <div class="icon py-2">
                            <i class="fab fa-youtube fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="card col-md-2 m-1 p-2 text-center">
                    <div class="card-body">
                        <div class="title">
                            <a href="<?= base_url(); ?>Admin/Statistics">
                                Static Pages Statistics
                            </a>
                        </div>
                        <div class="icon py-2">
                            <i class="fas fa-bells fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $this->load->view('admin/include/footer'); ?>
    <?php $this->load->view('admin/include/foot-load'); ?>
</body>
</html>
