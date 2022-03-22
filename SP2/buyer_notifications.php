 <!DOCTYPE html>
 <html>
 <head>
   <link rel="stylesheet" href="./css/style.css">
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
   integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css"
    integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
   integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
     <style type="text/css">
 		#customers {
 			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
 			border-collapse: collapse;
 			width: 100%;
 		}
 		#customers td, #customers th {
 			border: 1px solid #ddd;
 			padding: 8px;
 		}
 		#customers tr:nth-child(even){background-color: #f2f2f2;}
 		#customers tr:hover {background-color: #ddd;}
 		#customers th {
 			padding-top: 12px;
 			padding-bottom: 12px;
 			text-align: left;
 			background-color: #4CAF50;
 			color: white;
 		}
 		img{
 			object-fit: cover;
 		}
 	</style>
 </head>
 <body>
 	<?php include './header.php';
 	$email=$_SESSION['email'];?>
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
                        <li class="active"><a href="./buyers_profile.php"><span class="glyphicon glyphicon-user">Profile</a></li>
                    <li class="active"><a href="./logout.php"><span class="glyphicon glyphicon-log-out"></span>LogOut</a></li>
            </ul>
        </div>
      </div>
    </nav>

    <div class="body" style="margin: 40px">
 		<table id="customers">
 			<tr>
 				<th>Name</th>
 				<th>Image</th>
 				<th>Offered Price</th>
                <th>Garment Email</th>
 			</tr>
 			<?php
				$sql="select s.*,o.image,o.name from submitted_offers s inner join offers o on s.offer_id=o.o_id where o.buyer_email='$email'";
				$result = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_array($result)) {

					echo '
					<tr>
		 				<td><a href="./offer_details.php?o_id='.$row['offer_id'].'">'.$row['name'].'</a></td>
		 				<td><img src="./picture/offer/'.$row['image'].'" width="100" height="100"/></td>
		 				<td>'.$row['price'].'</td>
		 				<td>'.$row['g_email'].'</td>

		 			</tr> ';
				}
			?>
 		</table>
 	</div>
 </body>
 </html>
