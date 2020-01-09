<?php
    error_reporting(0);
    session_start();    
    if(isset($_SESSION["username"])){
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Đăng Nhập</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark primary-color">
        <a class="navbar-brand" href="#">Toidev.Ga</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Check</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="login.php">Đăng Nhập<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Đăng Ký</a>
            </li>
          </ul>
        </div>
      </nav>
      
 <div class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Note !</strong> Đã chuyển check tốc độ cao về cho tài khoản Thánh Cheat. <a href="https://www.facebook.com/ducmata">liên hệ admin</a>
</div>
</div>
<div class="container-fluid row">
<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
<div class="card col-xs-4 col-sm-4 col-md-4 col-lg-4" style="margin-top: 60px;padding-top: 13px;">

    <h5 class=" text-center py-4">
      <strong><h2 class="primary-heading">Đăng Nhập</h2></strong>
    </h5>
  
    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">
  
      <!-- Form -->
      <form class="text-center" style="color: #757575;" action="process.php" method="POST">
  
        <!-- Email -->
        <div class="md-form">
          <input name="username" type="text" id="materialLoginFormEmail" class="form-control">
          <label for="materialLoginFormEmail">Tên đăng nhập</label>
        </div>
  
        <!-- Password -->
        <div class="md-form">
          <input type="password" name="password" id="materialLoginFormPassword" class="form-control">
          <label for="materialLoginFormPassword">Mật Khẩu</label>
        </div>

        <!-- Sign in button -->
        <button class="btn btn-outline- btn-primary info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Đăng Nhập</button>
  
        <!-- Register -->
        <p>Chưa đăng ký?
          <a href="register.php">Đăng Ký</a>
        </p>
  
      </form>
      <!-- Form -->
  
    </div>
  
  </div>
  <!-- Material form login -->
</div>
  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>
