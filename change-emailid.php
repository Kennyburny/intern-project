<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['uid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['update']))
{
$nemailid=$_POST['newemailid'];
  $ret=mysqli_query($con, "call sp_checkemailavailabilty('$nemailid')");
    $result=mysqli_num_rows($ret);
    if($result>0){

echo "<script>alert('This email id already associated with another account');</script>";
echo "<script>window.location.href='change-emailid.php'</script>";
    }else{
         $ret->close();
         $con->next_result();
$uid=$_SESSION['uid'];
$updatetTime = date( 'd-m-Y h:i:s A', time () );
$query=mysqli_query($con,"call sp_useremailupdation('$nemailid','$updatetTime','$uid')"); 
echo "<script>alert('Your Email id udated successfully');</script>";  
echo "<script>window.location.href='profile.php'</script>";
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
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
       <?php include_once('includes/sidebar.php');?>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                    <!-- Topbar Navbar -->
  <?php include_once('includes/topbar.php');?>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
 <h1 class="h3 mb-0 text-gray-800"><?php echo ucwords($_SESSION['username']);?>'s Profile | Update Email </h1>
                    </div>

                    <div class="row">

                        
                        <div class="col-lg-12">

<?php 
$uid=$_SESSION['uid'];
$query=mysqli_query($con,"call sp_userprofile($uid)");
while ($result=mysqli_fetch_array($query)) {

?>


                            <!-- Default Card Example -->
                            <div class="card mb-4">
                                <div class="card-header">
                                 Registration Date: <?php echo $result['RegDate'];?>
                                </div>
                                <div class="card-body">
<form method="post">
             <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                 
                 
                                        
                              
                                  
 <tr>
<th>Current Email Id</th>
<td>
 <input type="email" class="form-control form-control-user" id="email" value="<?php echo $result['Email'];?>" name="email" readonly="true"></td>
 </tr>

<tr>
<th>New Email id</th>
<td>
<input type="email" class="form-control form-control-user" id="newemailid" name="newemailid" required="true">
 </td>
</tr>

                            
                                </table>
                                    <button type="submit" name="update" class="btn btn-primary btn-user btn-block">
                                            Update
                                        </button>
                            </form>
                                </div>
                            </div>
<?php } ?>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
     <?php include_once('includes/footer.php');?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
     <?php include_once('includes/logout-modal.php');?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
<?php } ?>