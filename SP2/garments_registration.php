<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/style.css">
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
                    <li class="active"><a href="./index.php"><span class="glyphicon glyphicon-home"> Home</a></li>
                    <li class="active"><a href="./login.php"><span class="glyphicon glyphicon-log-in"> LogIn</a></li>
            </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid bottomSection" style="margin-top: 35px;">
                  <div class="col-6">
                  <form method="post">
                 <div class="form-group">
                  <label for="name">Company Name</label>
                  <input type="text" class="form-control"   name="name" id="name" placeholder="Garments Name">
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control"   name="address" id="address" placeholder="Address">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control"   name="email" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="phone">Phone Number</label>
                  <input type="tel" class="form-control"   name="phone" id="phone" placeholder="Phone Number">
                </div>
                <div class="form-group">
                  <label for="country">Country</label>
                  <input type="text" class="form-control"   name="country" id="country" placeholder="Country">
                </div>
                <div class="form-group">
                  <label for="trade_license">Trade License</label>
                  <input type="number" class="form-control"   name="trade_license" id="trade_license" placeholder="Trade License">
                </div>
                <div class="form-group">
                  <label for="website">Website</label>
                  <input type="text" class="form-control"   name="website" id="website" placeholder="Website">
                </div>
                <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="exampleInputEmail1"  name="password" id="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
 <?php
      if(isset($_POST['submit'])){
           $name=$_POST['name'];
           $address=$_POST['address'];
           $email=$_POST['email'];
           $phone=$_POST['phone'];
           $country=$_POST['country'];
           $trade_license=$_POST['trade_license'];
           $password=$_POST['password'];
           $website=$_POST['website'];
           $user_type='garment';

                $sql="insert into garments_information(license_id,gname,address,email,phone,country,website,password) values('$trade_license','$name','$address','$email','$phone','$country','$website','$password')";
                $query=mysqli_query($conn, $sql) or die(mysqli_error($conn));
                if($query==1){
                          $sql1="insert into login(email,password,u_type) values('$email','$password','$user_type') ";
                          $query1=mysqli_query($conn, $sql1) or die(mysqli_error($conn));
                          if($query1==1){
                              $_SESSION['u_type']='garments';
                              echo "
                                <script>
                                alert('Registration Successfully');
                                window.location.href='./login.php';
                                </script>";
                          }else{
                              echo "Something Went Wrong. Try Again";
                          }
                      }}
                  ?>
              </form>
            </div>
        </div>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
  </body>
</html>
