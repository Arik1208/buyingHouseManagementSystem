<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' href='./css/style.css'>
	<link rel='stylesheet' href='./css/product-info.css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>


</head>
<body>
	<div>
		<?php include './header.php'; ?>
			<nav class="navbar navbar-inverse" >
					<div class="container-fluid">

						<div class="navbar-header" >
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="./index.php">All Garments In One Place</a>
						</div>

						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
							<ul class="nav navbar-nav navbar-left">
								<li class="active"><a href="./index.php">Home</a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<?php
								if(isset($_SESSION['user_id']) ){
										if($_SESSION['u_type']=="garment"){
												echo '<li class="active"><a href="./Garments_profile.php"><span class="glyphicon glyphicon-user">Profile</a></li>';
												echo  '<li class="active"><a href="./logout.php"><span class="glyphicon glyphicon-log-out">LogOut</a></li>';

										}else{
											echo '<li class="active"><a href="./buyers_profile.php"><span class="glyphicon glyphicon-user">Profile</a></li>';
											echo  '<li class="active"><a href="./logout.php"><span class="glyphicon glyphicon-log-out">LogOut</a></li>';
										}} else {
										echo '<li class="active"><a href="./buyers_registration.php"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>';
										echo '<li class="active"><a href="./login.php"><span class="glyphicon glyphicon-log-in"></span>Log In</a></li>';
										}
								?>
								</ul>
						</div>
					</div>
				</nav>
	<?php
	$sql="select * from product_info where p_id=".$_GET['p_id'];
	$result = mysqli_query($conn, $sql);
	if(isset($_SESSION['user_id']) && $_SESSION['u_type']=="buyer"){
	 if($row = mysqli_fetch_array($result)) {
	    $_SESSION['price']=$row['price'];
		echo "
		<div>
			<main class='container'>
				<div class='left-column'>
					<img data-image='black' class='active' src='./picture/product/".$row['image']."' alt=''>
				</div>
				<div class='right-column'>
					<div class='product-description'>
						<h2>".$row['name']."</h2>
						<h4>Available Size: " .$row['size']."</h4>
						<h4>Available Colours: ".$row['colour']."</h4>
						<h4>Min Order Quantity:".$row['min_order']."</h4>
						<p>".$row['description']."</p>
					</div>
					<div class='product-price'>
						<span>".$row['price']." $</span>
						<a href='./buy-now.php?p_id=".$row['p_id']."' class='cart-btn'>Buy Now</a>
					</div>
				</div>
			</main>
		</div>
		";
	}}

	else{
		if($row = mysqli_fetch_array($result)) {
		    $_SESSION['price']=$row['price'];
			echo "
			<div>
				<main class='container'>
					<div class='left-column'>
						<img data-image='black' class='active' src='./picture/product/".$row['image']."' alt=''>
					</div>
					<div class='right-column'>
						<div class='product-description'>
							<h2>".$row['name']."</h2>
							<h4>Available Size: " .$row['size']."</h4>
							<h4>Available Colours: ".$row['colour']."</h4>
							<h4>Min Order Quantity:".$row['min_order']."</h4>
							<p>".$row['description']."</p>
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
