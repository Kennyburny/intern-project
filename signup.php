<?php
//db Connection file
include('includes/config.php');
//code for signup
if(isset($_POST['signup']))
{
$username=$_POST['username'];
$password=md5($_POST['password']);

$office_name=$_POST['office_name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
   //checking email if already exists
    $query=mysqli_query($con,"call sp_signup('$username','$password','$office_name','$email','$phone')");
    if ($query) {
  
    echo "<script>alert('You have successfully registered');</script>";
    echo "<script>window.location.href='login.php'</script>";
  }
  else
    {
      
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}




?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UCU Phone System</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.password2.value)
{
alert('New Password and Repeat Password field does not match');
document.signup.password2.focus();
return false;
}
return true;
}   

</script>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h5 style="color:blue">UGANDA CHRISTIAN UNIVERSITY PHONE SYSTEM</h5>
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" name="signup" method="post" onsubmit="return checkpass();">
                                <div class="form-group">
                                    <input type="Username" class="form-control form-control-user" id="username" placeholder="Username" name="username" required="true">
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required="true">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Confirm Password" required="true">
                                    </div>
                                    
                                </div>
                                    
                                <div class="form-group row">
                                    <input type="name" class="form-control form-control-user" id="office_name" placeholder="Office_name" name="office_name" required="true">
                                </div>
                            
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email" placeholder="Email Address" name="email" required="true">
                                </div>
                                <div class="form-group">
                                    <input type="phone" class="form-control form-control-user" id="phone" placeholder="Phone Extension" name="phone" required="true">
                                </div>
                              
                                <button type="submit" name="signup" class="btn btn-primary btn-user btn-block" formaction="">
                                    Register Account 
                                </button>
                           
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="password-recovery.php">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="admin/index.php">Login as Admin? Admin Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>