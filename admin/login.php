<?php require_once('../config.php') ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
 <?php require_once('inc/header.php') ?>
<head>
    <style>
        body {
            background: url('firstlook.jpg') center/cover fixed; /* Replace 'your-background-image.jpg' with the actual image file */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            max-width: 400px;
            width: 100%;
        }

        .card {
            background: rgba(255, 255, 255, 0.8);
            /* Semi-transparent white background */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007BFF; /* Blue header color */
            color: #fff; /* White text color */
        }

        .card-body {
            text-align: center;
        }

        .login-box-msg {
            margin-bottom: 20px;
        }

        .input-group-text {
            background-color: #007BFF; /* Blue input group text background color */
            color: #fff; /* White input group text color */
        }

        .btn-primary {
            background-color: #007BFF; /* Blue button color */
            color: #fff; /* White button text color */
        }

        a {
            color: #007BFF; /* Blue link color */
        }
    </style>
</head>
<body class="hold-transition login-page">
  <script>
    start_loader()
  </script>
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="./" class="h1"><b>Login</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form id="login-frm" action="" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <a href="<?php echo base_url ?>">Go to Website</a>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.login-box -->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script>
    $(document).ready(function(){
      end_loader();
    })
  </script>
</body>
</html>
