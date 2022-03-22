<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="./css/style.css">
  <style type="text/css">
    input[type=text]{
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;
    }
	#address{
	      width: 100%;
	      padding: 12px;
	      border: 1px solid #ccc;
	      border-radius: 4px;
	      box-sizing: border-box;
	      margin-top: 6px;
	      margin-bottom: 16px;
	      resize: vertical;
    }
    input[type=submit] {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    input[type=submit]:hover {
      background-color: #45a049;
    }
    .body {
      border-radius: 5px;
      padding-top: 20px;
      padding-left: 30%;
      padding-right: 30%;
    }
    input[type=number] {
        -moz-appearance: textfield;
    }
  </style>
</head>
<body>
	<?php include './header.php'; ?>
	<div>
			<nav class="navbar navbar-inverse" >
					<div class="container-fluid">

						<div class="navbar-header" >
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
							</button>
							<a class="navbar-brand" href="./index.php">All Garments In One Place</a>
						</div>

						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
							<ul class="nav navbar-nav navbar-left">
								<li class="active"><a href="./index.php"><span class="glyphicon glyphicon-home">Home</a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
									<?php
									if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']) ){
											if($_SESSION['u_type']=="garment"){
													echo '<li class="active"><a href="./Garments_profile.php"><span class="glyphicon glyphicon-user">Profile</a></li>';
													echo  '<li class="active"><a href="./logout.php"><span class="glyphicon glyphicon-log-out">LogOut</a></li>';
											}else{
												echo '<li class="active"><a href="./buyers_profile.php"><span class="glyphicon glyphicon-user">Profile</a></li>';
												echo  '<li class="active"><a href="./logout.php"><span class="glyphicon glyphicon-log-out">LogOut</a></li>';
											}}
									?>

								</ul>
						</div>
					</div>
				</nav>

	<?php

		if(!isset($_SESSION['user_id'])){
		   header("Location: /login.php");
		}
	?>
  <div class="body">
    <form method="post">
        <label id="price">Offered Price:</label>
        <input type="number" step="any" id="price" name="price" required placeholder="Offered Price For Per Product">
        <br>
      <input type="hidden" name="o_id" value="<?php echo $_GET['id']; ?>">
        <br>
      <input type="submit" value="Order" name="submit">


      <div style="margin-top: -3px;padding: 12px">
        <?php
          if(isset($_POST['submit'])){
              $offer_id=$_GET['id'];
              $price=$_POST['price'];
              $g_email=$_SESSION['email'];
              $sql="insert into submitted_offers(offer_id,g_email,price) values('$offer_id','$g_email','$price')";

              if($conn){
                if(mysqli_query($conn, $sql)){
                  echo "
                  <script>
                    alert('Bid Successfully');
                    window.location.href='./submitted_offers.php';
                  </script>";
                }else{
                  echo "Something Went Wrong. Try Again";
                }
              }
          }
        ?>
      </div>
    </form>
</form>
  </div>

</body>
</html>
