<?php
    session_start();
    error_reporting(0);
    include('query.php');
    if(!isset($_SESSION["username"])){
        header("location: login.php");
    }
       $sql = 'SELECT eths FROM `address` WHERE username="'.$_SESSION["username"].'"';
            $data = '';
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $data = $row["eths"];
                }
            } 
            $conn->close();
            $data_orginal = $data;
            $data = trim($data);
            $data = preg_replace('/\s+/', '', $data);
            $data_arr = str_split($data,42);
            
    
?>
   <!DOCTYPE html>
<html lang="en">

<head> 
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Ví của tôi</title>
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
    width: 15px;
}
</style>
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
					<li class="nav-item active">
						<a class="nav-link " href="index.php">Check
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<a class="nav-link" href="account.php">My Wallet</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="chatroom.php">Thảo Luận</a>
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
          </ul>
        </div>
      </nav>
        
  <div class="container" style="width: 30%; margin-top: 30px;">
    <form action="updateEths.php" method="POST">
    <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">My Address - <?php echo count($data_arr); ?> address</h3>
        </div>
        <div class="panel-body">    
            <textarea name="eths" style="height: 50vh" name="myeths" id="input${1/(\w+)/\u\1/g}" class="form-control" rows="3" required="required"><?php 
                    
                    
                    foreach($data_arr as $o => $oi){
                        echo $oi."\r\n";    
                    }
                    ?></textarea>
            
        </div>
        
        <button style="margin: 20px" type="submit" class="btn btn-info">Update</button>
          	<?php 
	if(isset($_SESSION["mes"])){
	    ?>
        <div class="alert alert-success" style="    margin: 0 20px 20px 20px;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong><?php echo $_SESSION["mes"]; ?></strong>
        </div>

	    <?php
	    unset($_SESSION["mes"]);
	}
	?>

    </div>
    </form>
    
  </div>
<script>window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);</script>
    </body>
    </html>