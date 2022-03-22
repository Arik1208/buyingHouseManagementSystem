<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>
<body>
<?php include './header.php'; ?>
<div >
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
     <div>
        <main class="my-form">
            <div class="cotainer">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">Fill Up Information</div>
                                <div class="card-body">
                                    <form name="my-form"  method="post">
                                        <div class="form-group row">
                                            <label for="full_name" class="col-md-4 col-form-label text-md-right">Full Name</label>
                                            <div class="col-md-6">
                                                <input type="text" id="name" class="form-control" name="name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                            <div class="col-md-6">
                                                <input type="email" id="email" class="form-control" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="company" class="col-md-4 col-form-label text-md-right">Company Name</label>
                                            <div class="col-md-6">
                                                <input type="text" id="company_name" class="form-control" name="company_name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone Number</label>
                                            <div class="col-md-6">
                                                <input type="text" id="phone" class="form-control" name="phone">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="address" class="col-md-4 col-form-label text-md-right"> Address</label>
                                            <div class="col-md-6">
                                                <input type="text" id="address" class="form-control" name="address">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="licence" class="col-md-4 col-form-label text-md-right">Trade Licence</label>
                                            <div class="col-md-6">
                                                <input type="text" id="licence" class="form-control" name="licence">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nid_number" class="col-md-4 col-form-label text-md-right">NID  Number </label>
                                            <div class="col-md-6">
                                                <input type="text" id="nid_number" class="form-control" name="nid">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">Password </label>
                                            <div class="col-md-6">
                                                <input type="password" id="password" class="form-control" name="password">
                                            </div>
                                        </div>
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary" name="submit">Register</button>
                                            </div>
                                        </div>
    <?php
    if(isset($_POST['submit'])){

              $name=$_POST['name'];
              $address=$_POST['address'];
              $email=$_POST['email'];
              $phone=$_POST['phone'];
              $company_name=$_POST['company_name'];
              $licence=$_POST['licence'];
              $nid=$_POST['nid'];
              $password=$_POST['password'];

              $user_type='buyer';

              $sql="insert into buyers(name,address,email,phone,company_name,nid,identification_id,password) values('$name','$address','$email','$phone','$company_name','$nid','$licence','$password')";
              $query=mysqli_query($conn, $sql) or die(mysqli_error($conn));
              if($query==1){
               $sql1="insert into login(email,password,u_type) values('$email','$password','$user_type') ";
               $query1=mysqli_query($conn, $sql1) or die(mysqli_error($conn));
               if($query1==1){
                   $_SESSION['user_id']=mysqli_insert_id($conn);
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
                                <form  name="my-form"  method="get" action="./Garments_registration.php">
                                    <button type="submit" pading="20px;" class="btn btn-primary">Click for Garments Registration</button>
                                </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
