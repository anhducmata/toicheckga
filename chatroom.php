<?php
    session_start();
    error_reporting(0);
?>
   <!DOCTYPE html>
<html lang="en">

<head> 
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Chat Room</title>
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
          <div class="container" style="background-color: #fff;
    box-shadow: 0px 2px 0.05px 0.15px;max-width: 100%">
    <div class="fb-comments" style="" data-href="https://www.facebook.com/permalink.php?story_fbid=393445417728498&amp;id=393444571061916" data-width="1200" data-numposts="15" order_by="reverse_time"></div>
<div id="fb-root"></div>
</div>
    </div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0&appId=1759615927696097&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</div>
    
  </div>
<script>window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);</script>
    </body>
    </html>