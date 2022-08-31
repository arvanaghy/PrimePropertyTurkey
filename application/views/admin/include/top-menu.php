<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="<?= base_url();?>" target="_blank">
        <img src="<?= base_url();?>assets/web-site/images/base/logo-new.png"  class="img-fluid" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav ml-md-auto pr-md-4 my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url();?>Admin/index">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="PropertyNAV" role="button" data-toggle="dropdown" aria-expanded="false">
                    Manage Property
                </a>
                <ul class="dropdown-menu" aria-labelledby="PropertyNAV">
                    <li><a class="dropdown-item" href="<?= base_url(); ?>Admin/Manage_Property">Manage Property</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?= base_url(); ?>Admin/Add_Property">Add Property</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?= base_url(); ?>Admin/Trash_Property">Trash Property</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="BlogNAV" role="button" data-toggle="dropdown" aria-expanded="false">
                    Manage Blog
                </a>
                <ul class="dropdown-menu" aria-labelledby="BlogNAV">
                    <li><a class="dropdown-item" href="<?= base_url(); ?>Admin/Manage_Blog">Manage Blog</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?= base_url(); ?>Admin/Add_Blog">Add Blog</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?= base_url(); ?>Admin/Trash_Blog">Trash Blog</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="NewsNAV" role="button" data-toggle="dropdown" aria-expanded="false">
                    Manage News
                </a>
                <ul class="dropdown-menu" aria-labelledby="NewsNAV">
                    <li><a class="dropdown-item" href="<?= base_url(); ?>Admin/Manage_News">Manage News</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?= base_url(); ?>Admin/Add_News">Add News</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?= base_url(); ?>Admin/Trash_News">Trash News</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="NewsNAV" role="button" data-toggle="dropdown" aria-expanded="false">
                    YouTube videos
                </a>
                <ul class="dropdown-menu" aria-labelledby="NewsNAV">
                    <li><a class="dropdown-item" href="<?= base_url(); ?>Admin/Manage_Videos">Manage videos</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?= base_url(); ?>Admin/Add_Videos">Add videos</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?= base_url(); ?>Admin/Trash_Videos">Trash videos</a></li>
                </ul>
            </li>
<!--            <li class="nav-item dropdown">-->
<!--                <a class="nav-link dropdown-toggle" href="" id="webNAV" role="button" data-toggle="dropdown" aria-expanded="false">-->
<!--                    Manage Website-->
<!--                </a>-->
<!--                <ul class="dropdown-menu" aria-labelledby="webNAV">-->
<!--                    <li><a class="dropdown-item" href="">Inform Details</a></li>-->
<!--                    <li><hr class="dropdown-divider"></li>-->
<!--                    <li><a class="dropdown-item" href="">Sliders</a></li>-->
<!--                    <li><hr class="dropdown-divider"></li>-->
<!--                    <li><a class="dropdown-item" href="">Contact Us Messages</a></li>-->
<!--                </ul>-->
<!--            </li>-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="webNAV" role="button" data-toggle="dropdown" aria-expanded="false">
                    Resaler's
                </a>
                <ul class="dropdown-menu" aria-labelledby="webNAV">
                    <li><a class="dropdown-item" href="<?= base_url(); ?>Admin/Manage_Users">Manage Users</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?= base_url(); ?>Admin/Manage_Resales">Manage Resale's </a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>Admin/Password_Change">Change Password</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=  base_url();?>Admin/Sign_Out">Log Out</a>
            </li>
        </ul>
    </div>
</nav>