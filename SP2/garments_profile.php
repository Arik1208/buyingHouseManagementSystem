<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="./css/main.css">
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
  <?php include './header.php'; ?>

  <nav class="navbar navbar-inverse" >
      <div class="container-fluid">

        <div class="navbar-header" >
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

          </button>
          <a class="navbar-brand" href="./index.php">All Garments In One Place</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
          <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="./index.php"><span class="glyphicon glyphicon-home"> Home</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="./notifications.php"><span class="glyphicon glyphicon-envelope"> Notifications</a></li>
                    <li class="active"><a href="./logout.php"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
            </ul>
        </div>
      </div>
    </nav>
     <?php
      $sql1="select * from garments_information where email='".$_SESSION['email']."' ";
      $result = mysqli_query($conn, $sql1);
      if($row = mysqli_fetch_array($result)) {
      $_SESSION['gname'] = $row['gname'];
      }else {
      echo "Session data not saved";
      }
      ?>
        <?php
        $sql="select * from product_info where gname='".$_SESSION['gname']."' ";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)) {
            echo '
                <div class="product-box">
				<div class="card">
					<img src="./picture/product/'.$row['image'].'"  style="height:260px;" alt="...">
					<div class="caption">
					<h3 style="height:40px;overflow:hidden;"><a href="./productdetails.php?p_id='.$row['p_id'].'">'.$row['name'].'</a></h3>
					<p class="price">Price: '.$row['price'].' $</p>
					<p>Garments Name: '.$row['gname'].' </p>
					<p>Min Order: '.$row['min_order'].' </p>
					</div>
			        </div>
			         </div>
				';
        }
        ?>


   </body>
</html>
