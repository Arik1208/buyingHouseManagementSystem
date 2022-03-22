<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./css/main.css">
	<link rel="stylesheet" href="./css/style.css">
	<link rel='stylesheet' href='./css/product-info.css'>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
	 integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css"
	integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
	integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>
<body>
	<?php include './header.php'; ?>
	<nav class="navbar navbar-inverse" >
      <div class="container-fluid">

        <div class="navbar-header" >
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

          </button>
          <a class="navbar-brand" href="./index.php">All Garments In One Place</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
          <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="./index.php"><span class="glyphicon glyphicon-home">Home</a></li>
				<?php
				        if($_SESSION['u_type']=="garment"){
				       echo '<li class="active"><a href="./Garments_profile.php"><span class="glyphicon glyphicon-user">Profile</a></li>';
						 }else {
							 echo '<li class="active"><a href="./buyers_profile.php"> <span class="glyphicon glyphicon-user">Profile</a></li>';
						 }
				?>
                    <li class="active"><a href="./logout.php"><span class="glyphicon glyphicon-log-out"></span>Log Out</a></li>
            </ul>
        </div>
      </div>
    </nav>
	<?php
	$sql="select * from offers where o_id=".$_GET['o_id'];
	$result = mysqli_query($conn, $sql);
	if($_SESSION['u_type']=="garment"){
	if($row = mysqli_fetch_array($result)) {
	    $_SESSION['price']=$row['price'];
		echo "
		<div>
			<main class='container'>
				<div class='left-column'>
					<img data-image='black' class='active' src='./picture/offer/".$row['image']."' alt=''>
				</div>
				<div class='right-column'>
					<div class='product-description'>
					    <h2>".$row['name']."</h2>
						<h4>Size: " .$row['size']."</h4>
						<h4>Colours: ".$row['colour']."</h4>
						<h4>Order Quantity:".$row['quantity']."</h4>
						<p>".$row['details']."</p>
					</div>
					<div class='product-price'>
						<span>".$row['price']." $</span>
						<a href='./bid.php?id=".$row['o_id']."' class='cart-btn'>Bid</a>
					</div>
				</div>
			</main>
		</div>
		";
	}}else {
		if($row = mysqli_fetch_array($result)) {
		    $_SESSION['price']=$row['price'];
			echo "
			<div>
				<main class='container'>
					<div class='left-column'>
						<img data-image='black' class='active' src='./picture/offer/".$row['image']."' alt=''>
					</div>
					<div class='right-column'>
						<div class='product-description'>
						    <h2>".$row['name']."</h2>
							<h4>Size: " .$row['size']."</h4>
							<h4>Colours: ".$row['colour']."</h4>
							<h4>Order Quantity:".$row['quantity']."</h4>
							<p>".$row['details']."</p>
						</div>
						<div class='product-price'>
							<span>".$row['price']." $</span>
						</div>
					</div>
				</main>
			</div>
			";

	}}
	?>
</body>
</html>
