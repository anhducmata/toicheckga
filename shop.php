<?php 
    error_reporting(0);
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Shop</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
  <script src="js/clipboard.min.js"></script>
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
<style>
    .navbar-dark .navbar-nav .nav-link {
        color: rgb(255, 255, 255);
    }
    .jumbotron{
        -webkit-box-shadow: none;
        box-shadow: none;
     }
     .badge{
    font-size: 15px;
    background-color: #7b7b7b;
    }
    #example span{
        font-size: 15px;
        font-weight: bold;
    }
    .btn-primary:hover {
    background-color: #333!important;
    }
    .modal-body {
        padding: 0!important;
    }
    #example_wrapper{
        padding-top: 33px;
        margin-top: 20px;
        border-top: 1px solid #dedede;            
    }
    table.table td, table.table th {
    padding-top: 1.1rem;
    padding-bottom: 1rem;
    font-size: 15px;
    font-weight: bold;
}
</style>
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
						<a class="nav-link" href="account.php">My Wallet</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="chatroom.php">Thảo Luận</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="download.php">Download</a>
					</li>
					
					<li class="nav-item" style="background-color: #ff3547;"><?php if($_SESSION["package_type"] != '') { ?><a class="nav-link" target="_blank" href="https://13.229.125.179:4200">Web check</a> <?php } else { ?><a class="nav-link" href="javascript:void(0)" onclick="alert('Bạn đang sử dụng gói thường. Vui lòng update lên gói Thánh Cheat')">Web check</a><?php } ?></li>
					<li class="nav-item">
						<a class="nav-link" href="shop.php">Shop</a>
					</li>

					<li>
						<?php 
					if(isset($_SESSION["username"])){
						$type_text = '';
						if($_SESSION["package_type"] != ''){
							$type_text = " <<b style='color: #ffc107'>Thánh Cheat</b>>";
						}else{
							$type_text = " <<b style='color: #ffc107'>Bình Dân</b>>";
						}
						?>
						<a class="nav-link" href="logout.php">Logout (
							<?php echo $_SESSION["username"] . $type_text;?>)</a>
						<?php
					}else{
						?>
						<a class="nav-link" href="login.php">Login</a>
						<?php
					}
				?>
					</li>
					<li>
					    <span class="badge badge-pill badge-secondary" style="margin-top: 8px;">285 Bình dân và 37 Thánh Cheat đã đăng đăng ký. </span>
					</li>
			</ul>
			</div>
		</nav>
      <div class="container mb-5 mt-5">
    <div class="pricing card-deck flex-column flex-md-row mb-3">
        <div class="card card-pricing text-center px-3 mb-4">
            <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Bình Dân</span>
            <div class="bg-transparent card-header pt-4 border-0">
                <h1 class="h1 font-weight-normal text-primary text-center mb-0" data-pricing-value="15">đ<span class="price">49.000</span><span class="h3 text-muted ml-2">/ 12 Tháng</span></h1>
            </div>
            <div class="card-body pt-0">
                <ul class="list-unstyled mb-4">
                    <li>Max 50 address</li>
                    <li>Tốc độ check tốt</li>
                    <li>Góp ý xây dựng tính năng riêng</li>
                    <li>Support 24/7</li>
                </ul>
            </div>
        </div>
        <div class="card card-pricing popular shadow text-center px-3 mb-4">
            <span class="h6 w-60 mx-auto px-4 py-1 rounded-bottom bg-primary text-white shadow-sm">Thánh Cheat</span>
            <div class="bg-transparent card-header pt-4 border-0">
                <h1 class="h1 font-weight-normal text-primary text-center mb-0" data-pricing-value="30">đ<span class="price">199.000</span><span class="h3 text-muted ml-2">/ 12 Tháng</span></h1>
            </div>
            <div class="card-body pt-0">
                <i style="color='red'">Đang code. Code xong mới tính thời gian.</i>
                <ul class="list-unstyled mb-4">
                    <li>Address vô hạn</li>
                    <li>Hỗ trợ code tool auto</li>
                    <li>Tốc độ gấp 5 lần. Multiple Sever</li>
                    
                </ul>
            </div>
        </div>
    </div>
</div>


</body>

</html>
