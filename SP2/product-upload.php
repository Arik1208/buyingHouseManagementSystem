<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/main.css">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

  <style type="text/css">
    input[type=text],input[type=email],input[type=file], select{
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-top: 6px;
      margin-bottom: 16px;
      resize: vertical;
    }
    input[type=number] {
        -moz-appearance: textfield;
    }
    input[type=submit] {
      background-color: #624CAF;
      color: white;
      padding: 15px 99px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      position: absolute;
      margin: 60px 130px;
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
  </style>
</head>
<body>
<?php include './header.php';
if($_SESSION['u_type']=="garment"){
    echo "";
}else{
    die();
}
?>
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
									<li class="active"><a href="./Garments_profile.php"><span class="glyphicon glyphicon-user">Profile</a></li>
									<li class="active"><a href="./logout.php"><span class="glyphicon glyphicon-log-out">LogOut</a></li>

					</ul>
			</div>
		</div>
	</nav>
<div class="body">
    <form method="post" enctype="multipart/form-data">

      <label for="name">Product Name</label>
      <input type="text" name="name" required placeholder="Product Name">

      <label for="description">Product Description</label>
      <input type="text" name="description" required placeholder="Product Description">

        <label for="colour">Colours</label>
        <input type="text" name="colour" required placeholder="Colours">
        <label for="size">Available Size</label>
        <input type="text" name="size" required placeholder="Available Size">

      <label for="price">Price</label>
      <input type="number" step="any" name="price" required placeholder="Your Price"> <br>

        <label for="min_order">Min Order</label>
        <input type="number"  name="min_order" required placeholder="Minimum Order Quantity">
<br>
        <label for="gname">Garments Name</label>
        <input type="text" name="gname" required placeholder="Garments Name">

      <label for="photos">Choose Image</label>
      <input type="file" name="photos" >
      <input type="submit" value=" Upload " align="center" name="submit">
        <div style="margin-top: -3px;padding: 12px">
        <?php
        if(isset($_POST['submit'])){
          $name=$_POST['name'];
          $description=$_POST['description'];
          $price=$_POST['price'];
          $size=$_POST['size'];
          $colour=$_POST['colour'];
          $gname=$_POST['gname'];
          $min_order=$_POST['min_order'];
          $photo_name=$_SESSION['user_id'].'_'.time().".png";
          $email=$_SESSION['email'];
          $sql="insert into product_info(name,description,price,image,size,colour,min_order,gname,email) values('$name','$description','$price','$photo_name','$size','$colour','$min_order','$gname','$email')";
          if($conn){
            print_r($_FILES);
            $tmp_name = $_FILES['photos']["tmp_name"];
            if(move_uploaded_file($tmp_name, "./picture/product/$photo_name")){
              if(mysqli_query($conn, $sql)){
                echo "
                <script>
                alert('Upload Successfully');
                window.location.href='./product-upload.php';
                </script>";
              }else{
                echo "Something Went Wrong. Try Again";
              }
            }else{
              echo "Invalid Image. Try Again";
            }
          }
        }
        ?>
        </div>

</form>
  </div>

</body>
</html>
