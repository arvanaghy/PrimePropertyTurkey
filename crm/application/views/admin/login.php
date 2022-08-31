<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Login </title>
    <link rel="stylesheet" href="<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/vendor/font-awesome/css/fontawesome-all.min.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/stylesheets/main.min.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/stylesheets/custom.css");?>">
</head>
<body style="background-color: #fff;">

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0&appId=431739724935547&autoLogAppEvents=1" nonce="ABaa9F4Z"></script>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '431739724935547',
            xfbml      : true,
            version    : 'v12.0'
        });
        FB.AppEvents.logPageView();
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!-- .auth -->
<main class="auth" style="background-color: beige">

    <form class="auth-form" action="<?php echo base_url("User/admin_login");?>" style="margin-top:150px;" method="POST">
        <h1 class="mb-4" style="background-color: blue; display: flex; justify-content: center;">
            <img src="https://www.primepropertyturkey.com/assets/web-site/images/logo-new%20kopya.png" class="">
        </h1>
        <?php echo $this->session->flashdata('message'); ?>
        <!-- .form-group -->
        <div class="form-group">
            <div class="form-label-group">
                <input type="text" name="username" class="form-control" placeholder="Username" required="" autofocus="">
                <label for="inputUser">Username</label>
            </div>
        </div>
        <!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group">
            <div class="form-label-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required="">
                <label for="inputPassword">Password</label>
            </div>
        </div>
        <!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group">
            <button class="btn btn-block btn-dark" type="submit">Login</button>
        </div>
        <!-- /.form-group -->
    </form>
    <!-- /.auth-form -->

    <div class="fb-login-button" data-width="" data-size="medium" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false"></div>
</main>


<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '{431739724935547}',
            cookie     : true,
            xfbml      : true,
            version    : '{v12.0}'
        });

        FB.AppEvents.logPageView();

    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<div
        class="fb-like"
        data-share="true"
        data-width="450"
        data-show-faces="true">
</div>

</body>
</html>