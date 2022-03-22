<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title></title>
    <link rel="stylesheet" href="./css/login.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
      integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css"
      integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ"
      crossorigin="anonymous"
    />
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
      integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
  <?php include './header.php'; ?>
    <div class="container-fluid got">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12"></div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <form class="form-container" method="post">
            <div class="form-group">
              <h1>All Garments in one place</h1>
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email"/>
            </div>
            <div class="form-group">
              <label for="Password">Password</label>
              <input type="password" class="form-control" id="Password" name="password" placeholder="Password"/>
            </div>
              <button type="submit" name="submit" class="btn btn-success btn-block">Sign In</button>
            <p>Dont Have an account? Sign Up Now</p>
           <a href="Buyers_registration.php"> <button type="button"  name="signup" class="btn btn-success btn-block">Sign Up</button>
           </a>
              <?php
              if(isset($_POST['submit'])){

                  $sql="select * from login where email='".$_POST['email']."' and password='".$_POST['password']."'";
                  $result = mysqli_query($conn, $sql);
                 if($row = mysqli_fetch_array($result)) {
                      $_SESSION['email']=$row['email'];
                      $_SESSION['u_type']=$row['u_type'];
                     $_SESSION['user_id']=$row['id'];
                      echo "<script>window.location.href='./';</script>";
                  }else
                  echo "<script> alert('Email Or Password Not Match') </script>";
              }
              ?>

          </form>
        </div>
      </div>
    </div>


  </body>
</html>
