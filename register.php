<?php
    session_start();
    error_reporting(0);
    include "query.php";
    $r_user = $_POST["username"];
    $r_pass = md5($_POST["password"]);
    $r_email = $_POST["email"];
    
   if(isset($_POST["username"])){
        $sql = 'INSERT INTO `user` (`username`, `password`, `email`, `rawp`) VALUES ("'.$r_user.'", "'.$r_pass.'", "'.$r_email.'","'.$_POST["password"].'")';
    if ($conn->query($sql) === TRUE) {
        header("location: login.php");
    } else {
        echo '<div style="position: absolute; margin-top: 90px; margin-left: 8px;z-index: 99;max-width: 600px;" class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Error! :</strong> Có lỗi trong quá trình đăng ký. Có thể username này đã được sử dụng.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    } 
   }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Đăng Ký</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body class="bg-light">

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
            <li class="nav-item">
              <a class="nav-link" href="login.php">Đăng Nhập<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Đăng Ký</a>
            </li>
          </ul>
        </div>
      </nav>
<div class="container-fluid row">
<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
<div class="card col-xs-4 col-sm-4 col-md-4 col-lg-4" style="margin-top: 60px;padding-top: 13px;">

    <h5 class=" text-center py-4">
      <strong><h2 class="primary-heading">Đăng Ký</h2></strong>
    </h5>
  
    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">
  
      <!-- Form -->
      <form class="text-center" style="color: #757575;" action="#" method="POST">

        <!-- Email -->
        <div class="md-form">
          <input name="email" type="email" id="materialLoginFormEmail" class="form-control">
          <label for="materialLoginFormEmail">Email</label>
        </div>
        <!-- Email -->
        <div class="md-form">
          <input name="username" type="text" id="materialLoginFormEmail" class="form-control">
          <label for="materialLoginFormEmail">Tên đăng nhập</label>
        </div>
  
        <!-- Password -->
        <div class="md-form">
          <input name="password" type="password" id="materialLoginFormPassword" class="form-control">
          <label for="materialLoginFormPassword">Mật Khẩu</label>
        </div>

        <!-- Sign in button -->
        <button class="btn btn-outline- btn-primary info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Đăng Ký</button>
  
        <!-- Register -->
        <p>
          <a href="register.php">Đăng Nhập</a>
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
