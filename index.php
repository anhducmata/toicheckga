	<?php 
		session_start();
		error_reporting(0);
		include("query.php");
		require_once("para.php");
		if(!isset($_SESSION["username"])){
			header("Location: login.php");
		}
		
        $sql = 'SELECT b.username,b.email,b.package_type,b.type,a.eths FROM `address` a,`user` b WHERE b.username="'.$_SESSION["username"].'"'.' && a.username="'.$_SESSION["username"].'"';
		$user = '';
		$result = mysqli_query($conn, $sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$data = $row;
			}
		}
		$conn->close();
		$data = str_replace("=","MsULPXOqEXA",json_encode(join(array_reverse(str_split(base64_encode(json_encode($data)))))));	
		$data = str_replace('"','',$data);
	?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="Check nhiều ví ETH">
	<meta name="description" content="Check nhiều ví cùng lúc">
	<meta name="description" content="multiple check eth wallet">
	<title>Check nhiều ví ETH cùng lúc</title>
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

	.flex-container {
		display: -ms-flexbox;
		display: -webkit-flex;
		display: flex;
		width: 100%;
		height: 300px;
		-webkit-flex-direction: column;
		-ms-flex-direction: column;
		flex-direction: column;
		-webkit-flex-wrap: wrap;
		-ms-flex-wrap: wrap;
		flex-wrap: wrap;
		-webkit-justify-content: flex-start;
		-ms-flex-pack: start;
		justify-content: flex-start;
		-webkit-align-content: stretch;
		-ms-flex-line-pack: stretch;
		align-content: stretch;
		-webkit-align-items: flex-start;
		-ms-flex-align: start;
		align-items: flex-start;
		}

	.flex-item{
		-webkit-order: 0;
		-ms-flex-order: 0;
		order: 0;
		-webkit-flex: 0 1 auto;
		-ms-flex: 0 1 auto;
		flex: 0 1 auto;
		-webkit-align-self: auto;
		-ms-flex-item-align: auto;
		align-self: auto;
		}

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

	/* width */
	::-webkit-scrollbar {
		width: 7px;
	}

	/* Track */
	::-webkit-scrollbar-track {
		background: #f1f1f1; 
	}
	
	/* Handle */
	::-webkit-scrollbar-thumb {
		background: #c5ac61; 
	}

	/* Handle on hover */
	::-webkit-scrollbar-thumb:hover {
		background: #555; 
	}
	.btn-primary{
		max-width: 300px;
		display: inline-block;
	}
	.odd{
		background-color: rgba(72, 72, 72, 0.08)!important;
	}
	.even{
		background-color: #fff!important;
	}
	.card-body button{
		padding: 7px;
		background-color:#f47342!important;
	}
	</style>
	</head>

	<body class="bg-light">
	<script>
		function expand() {
				$('.collapse').collapse('show');
			}
		function collapse() {
				$('.collapse').collapse('hide');
			}
			function copyStringToClipboard(str) {
				// Create new element
				var el = document.createElement('textarea');
				// Set value (string to be copied)
				el.value = str;
				// Set non-editable to avoid focus and move outside of view
				el.setAttribute('readonly', '');
				el.style = {position: 'absolute', left: '-9999px'};
				document.body.appendChild(el);
				// Select text inside element
				el.select();
				// Copy text to clipboard
				document.execCommand('copy');
				// Remove temporary element
				document.body.removeChild(el);
			}   
	</script>
		<nav class="navbar navbar-expand-lg navbar-dark primary-color">
			<a class="navbar-brand" href="https://toicheck.ga">Toidev.Ga</a>
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
					<li class="nav-item">
						<a class="nav-link" href="shop.php">Shop</a>
					</li>
					<li class="nav-item" style="background-color: #ff3547;"><?php if($_SESSION["package_type"] != '') { ?><a class="nav-link" target="_blank" href="https://13.229.125.179:4200">Web check</a> <?php } else { ?><a class="nav-link" href="javascript:void(0)" onclick="alert('Bạn đang sử dụng gói thường. Vui lòng update lên gói Thánh Cheat')">Web check</a><?php } ?></li>
					<li class="nav-item">
						<a class="nav-link" href="https://www.facebook.com/ducmata">Liên hệ ADMIN</a>
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
					    <span class="badge badge-pill badge-secondary" style="margin-top: 8px;">286 Bình dân và 37 Thánh Cheat đã đăng đăng ký. </span>
					</li>
										<li>
					    <span class="badge badge-pill badge-secondary" style="margin-top: 8px;  color: white"><a href="https://www.facebook.com/ducmata" style="    color: white!important;">Trải Nghiệm Thánh Cheat với Số lượng ví vô hạn và tốc độ check rất cao.</a></span>
					</li>
			</ul>
			</div>
		</nav>
		<div id="progress-bar">
			<div class="progress" style="display: none; width: 100%">
				<div class="indeterminate"></div>
			</div>
		</div>
		<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<a href="https://www.facebook.com/ducmata">Admin Support</a>
	</div>
	<center><h3><span class="label label-info">Mã cá nhân. Nhập mã cá nhân này vào app để đăng nhập.</span></h3></center>
	<center><textarea name="" id="" cols="100" rows="10"><?php echo str_replace('"','',$data); ?></textarea>
	<?php if($_SESSION["can_check"]){ ?>
	<h3> <a  class="btn btn-success" href="https://drive.google.com/file/d/1OG7tkaEwx6VpP3pY7RUw0Wsu4KFVIs6Y/view?usp=sharing" target="_blank">Download APP Checkga-1.6 - 3/11/2019</a></h3>
	                <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Nội dung cập nhật</a>
                <div class="modal fade" id="modal-id">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="jumbotron">
                                    <p class="lead">Cập nhật chính</p>
                                    <hr class="my-4">
                                        <p>Xóa file rác giảm kích thước tool.</p>
                                        <p>Copy all ví sau khi lọc</p>
                                        <p>Fix bug mở etherium website không quay lại được</p>
                                        <p>Option ẩn ví 0ETH</p>
                                        <p>Tokens hiển thị theo chiều ngang</p>
                                    <p>Server check tạm cho thánh Cheat. đôi khi nó bị down. cảm thông nhá.</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
	
	<?php }else { ?>
	    <p>Mua gói để download: <a class="nav-link" href="https://www.facebook.com/ducmata">Liên hệ ADMIN</a></p>
	<?php }?>
	<p>Download và giải nén, chạy file checkga.exe rồi nhập mã cá nhân ở trên để đăng nhập</p>
	</center>
	
	</body>

	</html>
