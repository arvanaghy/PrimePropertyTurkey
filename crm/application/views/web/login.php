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
  <body>
      
    <!-- .auth -->
    <main class="auth">     
      <!-- form -->
      <form class="auth-form" style="margin-top:150px;">
	    <h1 class="text-center mb-4">
          <span class="">Login</span>
        </h1>
        <!-- .form-group -->
        <div class="form-group">
          <div class="form-label-group">
            <input type="text" id="inputUser" class="form-control" placeholder="Username" required="" autofocus="">
            <label for="inputUser">Username</label>
          </div>
        </div>
        <!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group">
          <div class="form-label-group">
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
            <label for="inputPassword">Password</label>
          </div>
        </div>
        <!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group">
          <button class="btn btn-lg btn-success btn-block" type="submit">Sign In</button>
        </div>
        <!-- /.form-group -->
      </form>
      <!-- /.auth-form -->
    </main>
  </body>
</html>