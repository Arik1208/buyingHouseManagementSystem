<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/style.css">
    <style type="text/css">
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
            font-family: arial;
            overflow: hidden;
        }
    </style>
</head>
<body>
<?php include "include/conn.php";?>
<?php include './header.php'; ?>
<div >
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
                  <li class="active"><a href="./index.php"><span class="glyphicon glyphicon-home"> Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="./Garments_profile.php"><span class="glyphicon glyphicon-user"> Profile</a></li>
                    <li class="active"><a href="./logout.php"><span class="glyphicon glyphicon-log-out"> LogOut</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div>

        <h2>Offers</h2>
        <?php
        $sql="select * from offers";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)) {
            echo '

				<div class="product-box">
					<div class="card">
					   <img src="./picture/offer/'.$row['image'].'"  style="height:260px;" alt="...">
					   <div class="caption">
					   <h3 style="height:50px;overflow:hidden;"><a href="./offer_details.php?o_id='.$row['o_id'].'">'.$row['name'].'</a></h3>
					   <p class="price">Price: '.$row['price'].' $</p>
					   <p>Size: '.$row['size'].' </p>
					   <p>Colour: '.$row['colour'].' </p>
					   <p>Quantity: '.$row['quantity'].' </p>
					   <p><button  class="btn btn-primary" onclick="window.location.href=\'./bid.php?o_id='.$row['o_id'].'\'">Bid</button></p>
					   </div>
			        </div>
			         </div>
				</div>';
        }

        ?>
    </div>

</body>
</html>
